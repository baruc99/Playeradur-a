jQuery(document).ready(function ($) {

    console.log('Playeraduría listo 🚀');

    /* =========================
       Scroll to top
       ========================= */

    $('.scroll-top').on('click', function () {
        $('html, body').animate(
            { scrollTop: 0 },
            600
        );
    });

    $(window).on('scroll', function () {
        if ($(this).scrollTop() > 200) {
            $('.scroll-top').fadeIn();
        } else {
            $('.scroll-top').fadeOut();
        }
    });

    /* =========================
       Page transition (menu)
       ========================= */

        $('.section-menu a').on('click', function (e) {

        const href = $(this).attr('href');

        if (!href || href.indexOf(window.location.host) === -1) return;

        e.preventDefault();

        $('#page-wrapper').addClass('page-slide-out');

        setTimeout(function () {
            window.location.href = href;
        }, 700);

    });


});

/* Entrada al cargar */

window.addEventListener('DOMContentLoaded', function () {

    const page = document.getElementById('page-wrapper');

    if (!page) return;

    page.classList.add('page-slide-in');

    requestAnimationFrame(function () {
        page.classList.add('page-slide-active');
    });

});
