export default function flash() {
    return {
        messages: [],
        init() {
            window.flashMsg = this.flashMsg.bind(this);
        },
        flashMsg(options) {
            let item = { ...{
                id: Math.random(),
                type: 'success',
                message: '',
                duration: 3000
            }, ...options };
            this.messages.push(item);

            setTimeout(() => {
                this.remove(item.id);
            }, item.duration);
        },
        remove(id) {
            this.messages = this.messages.filter(item => item.id !== id);
        }
    }
}
