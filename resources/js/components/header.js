class Header {
    constructor(element) {
        this.header = element;
        this.sections = [];
        this.init();
    }
    init() {
        document.querySelectorAll('.content-section').forEach((section) => {
            let link = document.querySelector('a[href="#' + section.id + '"]');
            this.sections[section.id] = {
                menuItem: link,
                section
            }
        })
        window.addEventListener('scroll', () => this.setActiveMenuItem());
        window.addEventListener('load', () => this.setActiveMenuItem());

        this.navbar = this.header.querySelector('.site-navbar');
        this.header.addEventListener('click', ({target}) => {
            if (target.dataset.action === 'toggle-menu') {
                this.navbar.classList.toggle('open');
            }
        });
    }

    setActiveMenuItem() {
        for (const [name, item] of Object.entries(this.sections)) {
            let state = this.isElementInViewport(item.section);
            item.menuItem.classList.toggle('text-primary', state)
        }
    }

    isElementInViewport(el) {
        let rect = el.getBoundingClientRect();
        return (
            rect.top >= 0 &&
            rect.bottom <= (window.innerHeight || document.documentElement.clientHeight)
        );
    }
}

export default function init() {
    new Header(document.getElementById('site-header'));
}
