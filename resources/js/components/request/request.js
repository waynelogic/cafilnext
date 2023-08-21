import Form from "./form.js";
import FlashMessage from "./flash.js";
export default new class AJAX {
    constructor() {
        this.obResponseStore = undefined;
        this.obForm = undefined;
        this.obOptions = {};
    }
    sendData(handler, options, form = null) {
        fetch(handler, {
            method: 'POST',
            headers: {
                'Content-Type': 'application/json',
                "X-CSRF-Token": options.token
            },
            body: options.data
        }).then(r => {
            form.reset();
            FlashMessage.flashMsg({
                'text': 'Ваша форма отправлена',
                'class': 'success',
                'interval': 3
            });
        });
    }
    form(obForm) {
        if (obForm.tagName !== 'FORM') {
            console.log('Это не элемент типа FORM');
            return;
        }
        this.obForm = obForm;
        this.obForm.addEventListener('submit', (event) => {
            event.preventDefault();
            let options = new Form(obForm);
            this.sendData(this.obForm.dataset.request, options, obForm);
        });
    };
}();
