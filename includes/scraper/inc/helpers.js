function sleep(ms) {
    return new Promise((resolve) => setTimeout(resolve, ms));
}

function getRandomTimeout(min, max) {
    return Math.floor(Math.random() * (max - min + 1) + min) * 1000;
}

module.exports = {
    sleep,
    getRandomTimeout,
}