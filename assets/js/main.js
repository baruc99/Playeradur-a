jQuery(document).ready(function ($) {
    console.log('Playeraduría listo 🚀');

    // Scroll to top (botón del footer)
    $('.scroll-top').on('click', function () {
        $('html, body').animate(
            { scrollTop: 0 },
            600
        );
    });

    // Mostrar / ocultar botón según scroll
    $(window).on('scroll', function () {
        if ($(this).scrollTop() > 200) {
            $('.scroll-top').fadeIn();
        } else {
            $('.scroll-top').fadeOut();
        }
    });

});
