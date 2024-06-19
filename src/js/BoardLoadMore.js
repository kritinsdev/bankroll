import {spinner} from './helpers';

class BoardLoadMore {
    constructor() {
        this.boards = document.querySelectorAll('.board');

        if(this.boards) {
            this.events();
        }
    }

    events() {
        for(const board of this.boards) {
            board.addEventListener('click', this.loadMorePosts);
        }
    }

    loadMorePosts = (e) => {
        const loadMoreWrap = e.target.closest('#boardLoadMore');

        if(loadMoreWrap) {
            const button = loadMoreWrap.querySelector('button');
            const postsToLoad = JSON.parse(loadMoreWrap.getAttribute('data-remaining-posts'));
        }
    }
}

export {BoardLoadMore};