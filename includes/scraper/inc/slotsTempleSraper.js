const fs = require('fs');
const puppeteer = require('puppeteer');
const { MongoClient } = require('mongodb');
const {getRandomTimeout, sleep} = require('./helpers');
const connectionString = 'mongodb://0.0.0.0:27017';

async function saveToDatabase(slotData) {
    const client = new MongoClient(connectionString, { useNewUrlParser: true, useUnifiedTopology: true });

    try {
        await client.connect();
        const db = client.db('slotsdb'); // Change 'slotsDatabase' to the desired database name
        const collection = db.collection('slots'); // Change 'slots' to the desired collection name

        const result = await collection.insertOne(slotData);
        console.log('Data saved to MongoDB with id:', result.insertedId);
    } catch (error) {
        console.error('Error while saving data to MongoDB:', error);
    } finally {
        await client.close();
    }
}

async function slotsTempleScraper(url) {
    const browser = await puppeteer.launch({
        headless: false,
    });

    const page = await browser.newPage();

    await page.goto(url);

    while (await page.$('.loadmore-button')) {
        const randomTimeout = getRandomTimeout(3, 7);
        await page.click('.loadmore-button');
        await page.waitForResponse(response => response.url().includes('https://www.slotstemple.com/gameindexajax') && response.status() === 200);
        await page.waitForTimeout(randomTimeout);
    }

    const links = await page.$$eval('.game-title', (anchors) =>
        anchors.map((anchor) => anchor.href)
    );


    for (const link of links) {
        const delay = getRandomTimeout(2,5);
        await scrapeSlotsTempleSlot(link);
        await sleep(delay);
    }

    await browser.close();
}

async function scrapeSlotsTempleSlot(url) {
    const browser = await puppeteer.launch({
        headless: false,
    });

    const page = await browser.newPage();

    await page.goto(url);

    const slotData = await page.evaluate(() => {
        const slotObject = {};

        slotObject.slotName = '';
        slotObject.slotRtp = '';
        slotObject.releaseYear = '';
        slotObject.slotVolitality = '';
        slotObject.slotMaxMultiplier = '';
        slotObject.slotMinBet = '';
        slotObject.slotMaxBet = '';
        slotObject.layout = '';
        slotObject.image = '';
        slotObject.slotProviders = [];
        slotObject.slotFeatures = [];
        slotObject.slotThemes = [];

        let slotTitle = document.querySelector('.slotAttrReview h3');

        if(slotTitle) {
            let titleArray = slotTitle.textContent.split(' ');
            titleArray.pop();
            slotObject.slotTitle = titleArray.join(' ');
        }

        let slotProps = document.querySelectorAll('.slotAttrReview table tr');

        for(let i = 0; i < slotProps.length; i++) {
            const propName = slotProps[i].querySelector('.propLeft');
            const propValue = slotProps[i].querySelector('.propRight');
            
            if(propName && propValue) {
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

                if(propName.textContent.includes('Release Date')) {
                    const content = propValue.textContent.trim();
                    let year = null;
                    if(content && content.textContent !== 'N/A') {
                        year = content.match(/\d{4}/)[0];
                    }

                    slotObject.releaseYear = parseInt(year);
                }

                if(propName.textContent.includes('RTP')) {
                    if (propValue.textContent && propValue.textContent.trim() !== 'N/A') {
                        slotObject.slotRtp = parseFloat(propValue.textContent.match(/[\d.]+/)[0]);
                    }
                }

                if (propName.textContent.includes('Variance')) {
                    if (propValue.textContent && propValue.textContent.trim() !== 'N/A') {
                        slotObject.slotVolitality = propValue.textContent.trim().toLowerCase().replace(/\s+/g, '-');
                    }
                }

                if(propName.textContent.includes('Max Win')) {
                    if(propValue.textContent && propValue.textContent.trim() !== 'N/A') {
                        slotObject.slotMaxMultiplier = parseFloat(propValue.textContent.match(/[\d.]+/)[0])
                    }
                }

                if(propName.textContent.includes('Min bet')) {
                    if(propValue.textContent && propValue.textContent.trim() !== 'N/A') {
                        slotObject.slotMinBet = parseFloat(propValue.textContent.match(/[\d.]+/)[0])
                    }
                }
                
                if(propName.textContent.includes('Max bet')) {
                    if(propValue.textContent && propValue.textContent.trim() !== 'N/A') {
                        slotObject.slotMaxBet = parseFloat(propValue.textContent.match(/[\d.]+/)[0])
                    }
                }

                if(propName.textContent.includes('Layout')) {
                    if(propValue.textContent && propValue.textContent.trim() !== 'N/A') {
                        slotObject.layout = propValue.textContent.trim();
                    }
                }
            }

            if(!propName && propValue) {
                if(propValue.textContent.includes('Features')) {
                    const arr = propValue.querySelectorAll('a');
        
                    if(arr.length > 0) {
                        arr.forEach((el) => {
                            const key = el.textContent.toLowerCase()
                            .replace(/[\W_]+/g, ' ')
                            .trim()
                            .replace(/\s+/g, '-');

                            slotObject.slotFeatures.push(key);
                        })
                    }
                }
                
                if(propValue.textContent.includes('Theme')) {
                    const arr = propValue.querySelectorAll('a');
        
                    if(arr.length > 0) {
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
            slotName: slotObject.slotTitle,
            releaseYear: slotObject.releaseYear,
            image: slotObject.image,
            slotRtp: slotObject.slotRtp,
            slotVolitality: slotObject.slotVolitality,
            slotMaxMultiplier: slotObject.slotMaxMultiplier,
            slotMinBet: slotObject.slotMinBet,
            slotMaxBet: slotObject.slotMaxBet,
            layout: slotObject.layout,
            slotProviders: slotObject.slotProviders,
            slotFeatures: slotObject.slotFeatures,
            slotThemes: slotObject.slotThemes,
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

module.exports = slotsTempleScraper;