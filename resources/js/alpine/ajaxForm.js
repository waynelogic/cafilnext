export default function ajaxForm(formType = null) {
    return {
        data: {},
        errors: {},
        successMessage: false,
        init() {
            this.form = this.$root;
            this.url = this.form.action;
            this.method = this.form.attributes.method ? this.form.attributes.method.value : 'POST';
            this.successMessage = this.form.attributes['data-success-message'] ? this.form.attributes['data-success-message'].value : null;
            this.form.addEventListener('submit', (event) => {
                event.preventDefault()
                this.submit()
            })
        },
        submit() {
            fetch(this.url, {
                method: this.method,
                headers: {
                    'Accept': 'application/json',
                    'Content-Type': 'application/json',
                    'X-CSRF-TOKEN': document.querySelector('meta[name="csrf-token"]').getAttribute('content'),
                    'Form-Type': formType
                },
                body: JSON.stringify(this.data),
            }).then((response) => response.json()).then((data) => {
                this.errors = data.errors || {};
                if (data.message) {
                    flashMsg({message: data.message, type: 'error'});
                }
                if (data.success) {
                    this.success(data);
                }
            });
        },
        success(data) {
            const message = this.successMessage || data.success;
            if (message) {
                flashMsg({message, type: 'success'});
            }
             if (this.form.dataset.hasOwnProperty('clear')) {
                this.data = {};
            }
        }
    }
}
