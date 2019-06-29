
/**
 * select menu background
 */
jQuery(document).ready(function ($) {
    var tgm_media_frame;
    var id = 0;
    jQuery('body').on('click', '.background_dropdown_menu', function () {
        id = jQuery(this).data('id');
        if (tgm_media_frame) {
            tgm_media_frame.open();
            return;
        }
        tgm_media_frame = wp.media.frames.tgm_media_frame = wp.media({
            multiple: true,
            library: {
                type: 'image'
            },
        });
        tgm_media_frame.on('select', function () {
            att = tgm_media_frame.state().get('selection').first().toJSON();
            jQuery('#image_link_' + id).val(att.url);
            jQuery("#image_preview_" + id).html('<a href="" class="remove_image" data-id="' + id + '"><span class="dashicons dashicons-dismiss"></span></a>'
                    + '<img  style="max-width: 200px" src="' + att.url + '" />');

        });
        tgm_media_frame.open();

    });

    jQuery('body').on('click', '.remove_image', function (event) {
        event.preventDefault();
        var id = jQuery(this).data('id');
        jQuery("#image_preview_" + id).html('No image selected');
        jQuery('#image_link_' + id).val('');

    });
});