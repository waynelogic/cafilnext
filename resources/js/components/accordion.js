class Accordion {
    constructor(element) {
        this.element = element;
        this.items = [];
        this.init();
    }
    init() {
        let buttons = this.element.querySelectorAll('[data-target]');
        console.log(buttons)
        buttons.forEach(button => {
            let target = button.dataset.target;
            let content = document.querySelector(button.dataset.target);
            this.items[target] = {
                button,
                content,
                isOpen: content.classList.contains('open')
            }
            button.addEventListener('click', () => {
                let action = button.dataset.action
                if (action === 'toggle') {
                    this.toggle(button.dataset.target);
                }
                if (action === 'collapse') {
                    this.collapse(button.dataset.target);
                }
            });
        });
        console.log(this.items)
    }
    toggleItem(item, state) {
        console.log(state);
        item.isOpen = state;
        item.button.classList.toggle('active', state);
        item.content.classList.toggle('open', state);
        item.content.style.maxHeight = state ? item.content.scrollHeight + 'px' : null;
    }
    toggle(target) {
        for (const [itemTarget, item] of Object.entries(this.items)) {
            if (itemTarget === target) {
                this.toggleItem(item, !item.isOpen)
            } else {
                this.toggleItem(item, false);
            }
        }
    }
    collapse(target) {
        console.log(target)
        // this.toggleItem(this.items[target], !this.items[target].isOpen);
    }
}

export default function init($element) {
    new Accordion($element);
}
