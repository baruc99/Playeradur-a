jQuery(function ($) {

    console.log('Theme options tabs script loaded');
    

    $('.playeraduria-tabs-nav a').on('click', function (e) {
        e.preventDefault();

        const tab = $(this).data('tab');

        $('.playeraduria-tabs-nav a').removeClass('active');
        $(this).addClass('active');

        $('.tab-panel').removeClass('active');
        $('.tab-panel[data-tab="' + tab + '"]').addClass('active');
    });

});
