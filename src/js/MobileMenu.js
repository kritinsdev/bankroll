class MobileMenu {
    constructor() {
        this.header = document.querySelector('#header');
        this.menuBtn = header.querySelector('#mobileMenu');
        this.navigation = header.querySelector('#navWrap');
        this.searchBtn = header.querySelector('#siteSearch');
        this.searchInput = header.querySelector('#siteSearchInput');
        this.submenuParentItem = header.querySelectorAll('.has-submenu');
        this.events();
    }

    events() {
        this.header.addEventListener('click', this.toggleSiteSearch.bind(this));
        this.menuBtn.addEventListener('click', this.toggleMobileMenu.bind(this));
        this.submenuParentItem.forEach(item => item.addEventListener('click', this.toggleSubmenu.bind(this)));
    }

    toggleSubmenu(e) {
        if(e.target.closest('.has-submenu')) {
            const submenuParent = e.target.closest('.has-submenu');
            const icon = submenuParent.querySelector('i');
            const submenu = submenuParent.querySelector('.submenu');
    
            if(!submenu.classList.contains('show')) {
                icon.classList.remove('fa-caret-down');
                icon.classList.add('fa-caret-up');
                submenu.classList.add('show');
            } else {
                icon.classList.remove('fa-caret-up');
                icon.classList.add('fa-caret-down');
                submenu.classList.remove('show');
            }
        }
        

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

    toggleSiteSearch(e) {
        if(e.target.closest('#siteSearch')) {
            this.searchInput.classList.add('show');
        }

        if(e.target.closest('#closeSearchInput')) {
            this.searchInput.classList.remove('show');
        }
    }
}

export {MobileMenu};