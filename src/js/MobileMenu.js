class MobileMenu {
    constructor() {
        this.header = document.querySelector('#header');
        this.menuBtn = header.querySelector('#mobileMenu');
        this.navigation = header.querySelector('#nav');
        this.searchBtn = header.querySelector('#siteSearch');
        this.searchInput = header.querySelector('#siteSearchInput');
        this.events();
    }

    events() {
        this.searchBtn.addEventListener('click', this.toggleSiteSearch.bind(this));
        this.menuBtn.addEventListener('click', this.toggleMobileMenu.bind(this));
    }

    toggleMobileMenu() {
        const icon = this.menuBtn.querySelector('i');
        
        if(!this.navigation.classList.contains('show')) {
            this.navigation.classList.add('show');
            icon.classList.remove('fa-bars');
            icon.classList.add('fa-xmark');
        } else {
            this.navigation.classList.remove('show');
            icon.classList.remove('fa-xmark');
            icon.classList.add('fa-bars');
        }
    }

    toggleSiteSearch() {
        if(!this.searchInput.classList.contains('show')) {
            this.searchInput.classList.add('show');
        } else {
            this.searchInput.classList.remove('show');
        }
    }
}

export {MobileMenu};