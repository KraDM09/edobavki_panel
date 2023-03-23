class Preloader {
    constructor() {
        this.preloader = document.querySelector('#preloader');
    }

    start() {
        this.preloader.classList.add('loading');
    }

    stop() {
        this.preloader.classList.remove('loading');
    }
}

document.addEventListener("DOMContentLoaded", (event) => {
    window.preloader = new Preloader();
});
