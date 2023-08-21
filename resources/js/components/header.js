class Header {
    constructor(element) {
        this.header = element;
        this.init();
    }
    init() {
        this.navbar = this.header.querySelector('.site-navbar');
        this.header.addEventListener('click', ({target}) => {
            if (target.dataset.action === 'toggle-menu') {
                this.toggleMenu();
            }
        });
    }

    toggleMenu() {
        this.navbar.classList.toggle('open');
    }
}

export default function init() {
    new Header(document.getElementById('site-header'));
}
