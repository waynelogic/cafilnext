// import './bootstrap';
import AOS from 'aos';
AOS.init();

import ajax from "./components/request/request.js";
window.Request = Request;

document.querySelectorAll('[data-request]').forEach(element => {
    ajax.form(element);
});

window.accordion = function(object){
    import('./components/accordion').then(({ default : init }) => init(object) );
}

window.onload = () => {
    import('./components/header').then(({ default : init }) => init() );

    const lazyLoader = new IntersectionObserver(
        (entries, observer) => entries.forEach(entry => {
            if (entry.isIntersecting) {
                window[entry.target.dataset.lazy](entry.target);
                observer.unobserve(entry.target);
            }
        }),
        { rootMargin: '50px' }
    );
    document.querySelectorAll('[data-lazy]').forEach(element => {
        let fnName = element.dataset.lazy;
        if (window[fnName] === undefined || typeof window[fnName] !== 'function') return console.log(`Lazy функция ${fnName} не найдена`);
        lazyLoader.observe(element);
    });

    document.querySelectorAll('.vibrate').forEach(button => {
        button.addEventListener('click',() =>  {
            navigator.vibrate(20);
        });
    });
}
