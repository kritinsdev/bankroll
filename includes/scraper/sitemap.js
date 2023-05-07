const slotCatalogScraper = require('./inc/slotCatalogScraper');
const clashOfSlotsScraper = require('./inc/clashOfSlotsScraper');

const sitemap = {
  'slotcatalog': slotCatalogScraper,
  'clashofslots': clashOfSlotsScraper,
  'slotstemple': null,
  'johnslots': null,
  'vegasslotsonline': null,
  'casinoguru': null,
};

module.exports = sitemap;