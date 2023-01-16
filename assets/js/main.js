$(function () {
    let preloader = $('#preloader');
    if (preloader.length) {
        $(window).on('load', () => {
            preloader.remove();
        });
    }
});

