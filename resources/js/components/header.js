class Header {
    constructor($element) {
        this.$header = $element;
        this.navbar = this.$header.querySelector('.site-navbar');
        this.navItems = [];
        this.init();
    }
    init() {
        this.$header.querySelectorAll('.nav-item').forEach(obItem => {
            let name = obItem.querySelector('a').getAttribute('href');
            this.navItems[name] = obItem;
        })
        const sectionObserver = new IntersectionObserver(
            (entries, observer) => entries.forEach(entry => {
                let id = entry.target.getAttribute('id');
                if (id) {
                    this.navItems["#" + id].classList.toggle('active', entry.isIntersecting);
                }
            }), { threshold: 0.5 }
        );
        document.querySelectorAll('section').forEach(section => sectionObserver.observe(section));

        this.$header.addEventListener('click', ({target}) => {
            target.dataset.action === 'toggle-menu' && this.navbar.classList.toggle('open');
        });
    }
}

export default function init() {
    new Header(document.getElementById('site-header'));
}
