jQuery(function ($) {

    console.log('Product video media script loaded');

    let frame;

    $('#upload_product_video').on('click', function (e) {

        e.preventDefault();

        frame = wp.media({
            title: 'Seleccionar video',
            button: { text: 'Usar este video' },
            library: { type: 'video' },
            multiple: false
        });

        frame.on('select', function () {

            const attachment = frame.state().get('selection').first().toJSON();

            // 👉 Guardamos DIRECTO la URL
            $('#product_video_url').val(attachment.url);

            $('#product-video-wrapper video').remove();

            $('#product-video-wrapper').prepend(
                '<video controls style="width:100%;max-width:400px;margin-bottom:10px">' +
                '<source src="' + attachment.url + '">' +
                '</video>'
            );
        });

        frame.open();
    });

    $('#remove_product_video').on('click', function () {

        $('#product_video_url').val('');
        $('#product-video-wrapper video').remove();

    });

});
