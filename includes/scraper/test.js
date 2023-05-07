const puppeteer = require('puppeteer');
const { saveToDatabase } = require('./inc/saveToDb');

async function scrapeSlotCatalogSlot(url) {
    const browser = await puppeteer.launch({
        headless: false,
    });

    const page = await browser.newPage();

    await page.goto(url);

    const slotData = await page.evaluate(() => {
        const slotObject = {};

        slotObject.slotName = '';
        slotObject.slotRtp = '';
        slotObject.releaseDate = '';
        slotObject.volitality = '';
        slotObject.hitFrequency = '';
        slotObject.slotMaxMultiplier = '';
        slotObject.slotMinBet = '';
        slotObject.slotMaxBet = '';
        slotObject.layout = '';
        slotObject.image = '';
        slotObject.slotProviders = [];
        slotObject.slotFeatures = [];
        slotObject.slotThemes = [];

        let slotTitle = document.querySelector('.slotAttrReview h3');
        const slotImage = document.querySelector('.hotcoldSpeedBlock .pngBlock img');

        if (slotTitle) {
            let titleArray = slotTitle.textContent.split(' ');
            titleArray.pop();
            slotObject.slotTitle = titleArray.join(' ');
        }

        if(slotImage) {
            const src = (slotImage.getAttribute('src')) ? slotImage.getAttribute('src') : slotImage.getAttribute('data-src');
            slotObject.image = src;
        }

        let slotProps = document.querySelectorAll('.slotAttrReview table tr');

        for (let i = 0; i < slotProps.length; i++) {
            const propName = slotProps[i].querySelector('.propLeft');
            const propValue = slotProps[i].querySelector('.propRight');

            if (propName && propValue) {
                if (propName.textContent.includes('Provider')) {
                    const arr = propValue.querySelectorAll('a');

                    if (arr.length > 0) {
                        arr.forEach((el) => {
                            const key = el.textContent.toLowerCase()
                                .replace(/[\W_]+/g, ' ')
                                .trim()
                                .replace(/\s+/g, '-');

                            slotObject.slotProviders.push(key);
                        });
                    }
                }

                if (propName.textContent.includes('Release Date')) {
                    let date = propValue.textContent.trim();

                    if(date.includes('[ i ]')); {
                        date = date.replace(/\[ i \]/g, "");
                        date = date.trim();
                    }

                    if(date === 'N/A') {
                        date = '';
                    }

                    if (date) {
                        const [day, month, year] = date.split('.');
                        const dateObject = new Date(`${year}-${month}-${day}`);
                        slotObject.releaseDate = dateObject;
                    }
                }

                if (propName.textContent.includes('RTP')) {
                    let rtp = propValue.textContent.trim();

                    if(rtp === 'N/A') {
                        rtp = '';
                    }

                    if (rtp) {
                        slotObject.slotRtp = parseFloat(rtp.match(/[\d.]+/)[0]);
                    }
                }

                if (propName.textContent.includes('Hit Frequency')) {
                    let hitFreq = propValue.textContent.trim();

                    if(hitFreq.includes('[ i ]')); {
                        hitFreq = hitFreq.replace(/\[ i \]/g, "");
                        hitFreq = hitFreq.trim();
                    }

                    if(hitFreq === 'N/A') {
                        hitFreq = '';
                    }

                    if (hitFreq) {
                        slotObject.hitFrequency = parseFloat(hitFreq.match(/[\d.]+/)[0]);
                    }
                }

                if (propName.textContent.includes('Variance')) {
                    let volitality = propValue.textContent.trim();

                    if(volitality.includes('[ i ]')); {
                        volitality = volitality.replace(/\[ i \]/g, "");
                        volitality = volitality.trim();
                    }

                    if(volitality === 'N/A') {
                        volitality = '';
                    }

                    if (volitality) {
                        slotObject.volitality = volitality.toLowerCase().replace(/\s+/g, '-');
                    }
                }

                if (propName.textContent.includes('Max Win') || propName.textContent.includes('Max. win')) {
                    let maxWin = propValue.textContent.trim();

                    if(maxWin.includes('[ i ]')); {
                        maxWin = maxWin.replace(/\[ i \]/g, "");
                        maxWin = maxWin.trim();
                    }

                    if(maxWin === 'N/A') {
                        maxWin = '';
                    }

                    if (maxWin) {
                        slotObject.slotMaxMultiplier = parseFloat(maxWin.match(/[\d.]+/)[0])
                    }
                }

                if (propName.textContent.includes('Min bet')) {
                    let minBet = propValue.textContent.trim();

                    if(minBet.includes('[ i ]')); {
                        minBet = minBet.replace(/\[ i \]/g, "");
                        minBet = minBet.trim();
                    }

                    if(minBet === 'N/A') {
                        minBet = '';
                    }

                    if (minBet) {
                        slotObject.slotMinBet = parseFloat(minBet.match(/[\d.]+/)[0]);
                    }
                }

                if (propName.textContent.includes('Max bet')) {
                    let maxBet = propValue.textContent.trim();

                    if(maxBet.includes('[ i ]')); {
                        maxBet = maxBet.replace(/\[ i \]/g, "");
                        maxBet = maxBet.trim();
                    }

                    if(maxBet === 'N/A') {
                        maxBet = '';
                    }
                    
                    if (maxBet) {
                        slotObject.slotMaxBet = parseFloat(maxBet.match(/[\d.]+/)[0])
                    }
                }

                if (propName.textContent.includes('Layout')) {
                    let layout = propValue.textContent.trim();

                    if(layout.includes('[ i ]')); {
                        layout = layout.replace(/\[ i \]/g, "");
                        layout = layout.trim();
                    }

                    if(layout === 'N/A') {
                        layout = '';
                    }

                    if (layout) {
                        slotObject.layout = layout;
                    }
                }
            }

            if (!propName && propValue) {
                if (propValue.textContent.includes('Features')) {
                    const arr = propValue.querySelectorAll('a');

                    if (arr.length > 0) {
                        arr.forEach((el) => {
                            const key = el.textContent.toLowerCase()
                                .replace(/[\W_]+/g, ' ')
                                .trim()
                                .replace(/\s+/g, '-');

                            slotObject.slotFeatures.push(key);
                        })
                    }
                }

                if (propValue.textContent.includes('Theme')) {
                    const arr = propValue.querySelectorAll('a');

                    if (arr.length > 0) {
                        arr.forEach((el) => {
                            const key = el.textContent.toLowerCase()
                                .replace(/[\W_]+/g, ' ')
                                .trim()
                                .replace(/\s+/g, '-');

                            slotObject.slotThemes.push(key);
                        })
                    }
                }
            }
        }

        return {
            name: slotObject.slotTitle,
            releaseDate: slotObject.releaseDate,
            image: slotObject.image,
            rtp: slotObject.slotRtp,
            volitality: slotObject.volitality,
            hitFrequency: slotObject.hitFrequency,
            maxMultiplier: slotObject.slotMaxMultiplier,
            minBet: slotObject.slotMinBet,
            maxBet: slotObject.slotMaxBet,
            layout: slotObject.layout,
            providers: slotObject.slotProviders,
            features: slotObject.slotFeatures,
            themes: slotObject.slotThemes,
        }
    });

    if (slotData) {
        try {
            await saveToDatabase(slotData);
            console.log('Data saved to MongoDB');
        } catch (error) {
            console.error('Error while saving data to MongoDB:', error);
        }
    } else {
        console.log('No data to save to MongoDB');
    }

    await browser.close();
}

const url = 'https://slotcatalog.com/en/slots/Joker-The-Thief';

scrapeSlotCatalogSlot(url);