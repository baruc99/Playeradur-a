jQuery(document).ready(function ($) {

    $('.playeraduria-upload').on('click', function (e) {
        e.preventDefault();

        const target = $($(this).data('target'));

        const frame = wp.media({
            title: 'Seleccionar imagen',
            button: { text: 'Usar esta imagen' },
            multiple: false
        });

        frame.on('select', function () {
            const attachment = frame.state().get('selection').first().toJSON();
            target.val(attachment.url);
        });

        frame.open();
    });

});
