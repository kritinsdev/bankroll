const sitemap = require('./sitemap');

(async () => {
    const url = 'https://clashofslots.com/best-online-slots/';
    const sitename = new URL(url).hostname.split('.')[0];

    if (sitemap[sitename]) {
        await sitemap[sitename](url);
    }
})();
