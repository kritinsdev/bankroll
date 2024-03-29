import {createBackdrop, overflowHidden} from '../js/helpers';

class MobileMenu {
    constructor() {
        this.header = document.querySelector('#header');
        this.menuBtn = header.querySelector('#mobileMenu');
        this.navigation = header.querySelector('#headerNav');
        this.searchBtn = header.querySelector('#siteSearch');
        this.searchInput = header.querySelector('#siteSearchInput');
        this.submenuParentItem = header.querySelectorAll('.has-submenu');
        this.menuOpen = false;
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
            const icon = submenuParent.querySelector('.submenu-icon');
            const submenu = submenuParent.querySelector('.submenu');
    
            if(!submenu.classList.contains('show')) {
                icon.classList.remove('fa-angle-down');
                icon.classList.add('fa-angle-up');
                submenu.classList.add('show');
            } else {
                icon.classList.remove('fa-angle-up');
                icon.classList.add('fa-angle-down');
                submenu.classList.remove('show');
            }
        }
        

    }

    toggleMobileMenu() {
        const icon = this.menuBtn.querySelector('i');
        
        if(!this.navigation.classList.contains('show')) {
            overflowHidden();
            this.navigation.classList.add('show');
            icon.classList.remove('fa-bars');
            icon.classList.add('fa-xmark');
            this.menuOpen = true;
        } else {
            overflowHidden();
            this.navigation.classList.remove('show');
            icon.classList.remove('fa-xmark');
            icon.classList.add('fa-bars');
            this.menuOpen = false;
        }
    }

    toggleSiteSearch(e) {
        if(e.target.closest('#siteSearch')) {
            createBackdrop();
        }
    }
}

export {MobileMenu};