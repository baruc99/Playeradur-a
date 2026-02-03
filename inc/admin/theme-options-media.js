jQuery(document).ready(function ($) {

    $('.playeraduria-upload').on('click', function (e) {
        e.preventDefault();

        const button = $(this);
        const target = $(button.data('target'));

        const frame = wp.media({
            title: 'Seleccionar imagen',
            button: { text: 'Usar esta imagen' },
            multiple: false
        });

        frame.on('select', function () {
            const attachment = frame.state().get('selection').first().toJSON();

            // 1️⃣ Guardar URL en el input
            target.val(attachment.url);

            // 2️⃣ Buscar o crear preview
            let preview = button.closest('.playeraduria-media-field')
                                .find('.playeraduria-media-preview');

            if (!preview.length) {
                preview = $('<div class="playeraduria-media-preview" style="margin-top:10px;"></div>');
                button.closest('.playeraduria-media-field').append(preview);
            }

            preview.html(
                '<strong>Vista previa:</strong><br>' +
                '<img src="' + attachment.url + '" ' +
                'style="width:48px;height:48px;border:1px solid #ccc;padding:4px;background:#fff;">'
            );
        });

        frame.open();
    });

});
