jQuery(document).ready(function ($) {

    $('.playeraduria-tabs-nav a').on('click', function () {

        const tab = $(this).data('tab');

        $('.playeraduria-tabs-nav a').removeClass('active');
        $(this).addClass('active');

        $('.tab-panel').removeClass('active');
        $('.tab-panel[data-tab="' + tab + '"]').addClass('active');
    });

});
