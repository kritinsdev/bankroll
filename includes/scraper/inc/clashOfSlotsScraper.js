const puppeteer = require('puppeteer');
const { getRandomTimeout, sleep } = require('./helpers');
const { saveToDatabase } = require('./saveToDb');

async function clashOfSlotsScraper(url) {
    const browser = await puppeteer.launch({
        headless: false,
    });

    const page = await browser.newPage();

    await page.goto(url);

    let click = 0;
    while (click < 5) { //await page.$('.js-filter-load-more')
        const randomTimeout = getRandomTimeout(2, 5);
        const loadMoreButton = await page.$('.js-filter-load-more');
        if (loadMoreButton) {
            await loadMoreButton.click();
            await page.waitForResponse(response => response.url().includes('https://clashofslots.com/wp-admin/admin-ajax.php') && response.status() === 200);
            await sleep(randomTimeout);
            click++;
        } else {
            console.log('Load more button not found');
            break;
        }
    }

    const links = await page.$$eval('.slots_top_rating_year_item_title', (anchors) =>
        anchors.map((anchor) => {
            return {
                href: anchor.href,
                textContent: anchor.textContent
            };
        })
    );

    for (const link of links) {
        const delay = getRandomTimeout(3, 5);
        await scrapeSlotCatalogSlot(link.href, link.textContent);
        await sleep(delay);
    }

    await browser.close();
}

async function scrapeSlotCatalogSlot(url, title = '') {
    const browser = await puppeteer.launch({
        headless: false,
    });

    const page = await browser.newPage();

    await page.goto(url);

    const slotData = await page.evaluate((title) => {
        const slotObject = {};

        slotObject.name = title;
        slotObject.features = [];
        slotObject.iframe = '';
        slotObject.image = '';
        slotObject.slotRtp = '';
        slotObject.releaseDate = '';
        slotObject.volitality = '';
        slotObject.maxMultiplier = '';
        slotObject.minBet = '';
        slotObject.maxBet = '';
        slotObject.reels = '';
        slotObject.betways = '';
        slotObject.providers = [];
        slotObject.site = 'clashofslots.com';

        const slotImage = document.querySelector('.slot_header_thumb img');
        const iframe = document.querySelector('.btn_single_slot_new.fancy_game_show');

        if (slotImage) {
            const src = (slotImage.getAttribute('src')) ? slotImage.getAttribute('src') : null;
            slotObject.image = src;
        }

        if(iframe) {
            const iframeSrc = iframe.getAttribute('data-game');
            slotObject.iframe = iframeSrc.trim();
        }

        let slotProps = document.querySelectorAll('.addit_block_row');

        for (let i = 0; i < slotProps.length; i++) {
            const propName = slotProps[i].querySelector('.addit_block_col:first-child');
            const propValue = slotProps[i].querySelector('.addit_block_col:nth-child(2)');

            if (propName.textContent.includes('Date')) {
                let date = propValue.textContent.trim();

                if (date) {
                    // const [day, month, year] = date.split('.');
                    // const dateObject = new Date(`${year}-${month}-${day}`);
                    slotObject.releaseDate = date;
                }
            }

            if (propName.textContent.includes('Volatility')) {
                let volitality = propValue.textContent.trim();
                slotObject.volitality = volitality.toLocaleLowerCase();
            }

            if (propName.textContent.includes('Max Win')) {
                let maxMultiplier = propValue.textContent.trim();
                slotObject.maxMultiplier = parseInt(maxMultiplier.match(/[\d.]+/)[0]);
            }

            if (propName.textContent.includes('Bet Range')) {
                let string = propValue.textContent.trim();
                const [min, max] = string.split(" - ");

                slotObject.minBet = parseFloat(min);
                slotObject.maxBet = parseFloat(max);
            }

            if (propName.textContent.includes('Software')) {
                const providers = propValue.querySelectorAll('a');

                if (providers.length > 0) {
                    providers.forEach((el) => {
                        const key = el.textContent.toLowerCase()
                            .replace(/[\W_]+/g, ' ')
                            .trim()
                            .replace(/\s+/g, '-');

                        slotObject.providers.push(key);
                    });
                }
            }

            if (propName.textContent.includes('RTP')) {
                let rtp = propValue.textContent.trim();
                let multiVal = rtp.match(/\d+\.\d+/g);

                if (multiVal) {
                    multiVal = multiVal.map(Number);
                    slotObject.rtp = multiVal;
                } else {
                    slotObject.rtp = rtp.match(/[\d.]+/)[0];
                }
            }

            if (propName.textContent.includes('Number of Reels')) {
                let reels = propValue.textContent.trim();
                slotObject.reels = parseInt(reels);
            }

            if (propName.textContent.includes('Betways')) {
                let betways = propValue.textContent.trim();
                slotObject.betways = parseInt(betways);
            }

            if(propName.textContent.includes('Features')) {
                const features = propValue.querySelectorAll('a');

                if (features.length > 0) {
                    features.forEach((el) => {
                        const key = el.textContent.toLowerCase()
                            .replace(/[\W_]+/g, ' ')
                            .trim()
                            .replace(/\s+/g, '-');

                        slotObject.features.push(key);
                    });
                }
            }
        }

        return {
            name: slotObject.name,
            releaseDate: slotObject.releaseDate,
            image: slotObject.image,
            iframe: slotObject.iframe,
            rtp: slotObject.rtp,
            volitality: slotObject.volitality,
            maxMultiplier: slotObject.maxMultiplier,
            minBet: slotObject.minBet,
            maxBet: slotObject.maxBet,
            reels: slotObject.reels,
            betways: slotObject.betways,
            providers: slotObject.providers,
            features: slotObject.features,
            site: slotObject.site, 
        }
    }, title);

    if (slotData) {
        try {
            await saveToDatabase(slotData);
        } catch (error) {
            console.error('Error while saving data to MongoDB:', error);
        }
    } else {
        console.log('No data to save to MongoDB');
    }

    await browser.close();
}

module.exports = clashOfSlotsScraper;

// scrapeSlotCatalogSlot('https://clashofslots.com/slots/bgaming/aztec-magic-bonanza/', 'Aztec Magic Bonanza');