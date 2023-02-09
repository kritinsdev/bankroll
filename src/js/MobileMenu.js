class MobileMenu {
    
    constructor() {
        console.log('123');
        this.menuBtn = document.querySelector('#mobileMenu');
        this.navigation = document.querySelector('#nav');
        this.events();
    }

    events() {
        this.menuBtn.addEventListener('click', this.toggleMobileMenu.bind(this));
    }

    toggleMobileMenu() {
        if(!this.navigation.classList.contains('show')) {
            this.navigation.classList.add('show');
        } else {
            this.navigation.classList.remove('show');
        }
    }
}

export default MobileMenu;