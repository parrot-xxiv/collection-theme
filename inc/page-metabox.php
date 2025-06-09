<?php 

add_action('add_meta_boxes', 'add_page_image_meta_box');
function add_page_image_meta_box() {
    add_meta_box(
        'page_image_meta_box',
        'Page Image',
        'render_page_image_meta_box',
        'page',
        'side',
        'low'
    );
}

function render_page_image_meta_box($post) {
    $image_id = get_post_meta($post->ID, '_page_image_id', true);
    $image_src = $image_id ? wp_get_attachment_image_src($image_id, 'medium')[0] : '';

    wp_nonce_field('save_page_image_meta_box', 'page_image_meta_box_nonce');
    ?>
    <div id="page-image-preview">
        <?php if ($image_src): ?>
            <img src="<?php echo esc_url($image_src); ?>" style="max-width:100%;" />
        <?php endif; ?>
    </div>
    <input type="hidden" id="page_image_id" name="page_image_id" value="<?php echo esc_attr($image_id); ?>" />
    <p>
        <button type="button" class="button" id="select-page-image">Select Image</button>
        <button type="button" class="button" id="remove-page-image">Remove</button>
    </p>
    <script>
        jQuery(document).ready(function ($) {
            var frame;

            $('#select-page-image').on('click', function (e) {
                e.preventDefault();

                if (frame) {
                    frame.open();
                    return;
                }

                frame = wp.media({
                    title: 'Select or Upload Image',
                    button: {
                        text: 'Use this image'
                    },
                    multiple: false
                });

                frame.on('select', function () {
                    var attachment = frame.state().get('selection').first().toJSON();
                    $('#page_image_id').val(attachment.id);
                    $('#page-image-preview').html('<img src="' + attachment.sizes.medium.url + '" style="max-width:100%;" />');
                });

                frame.open();
            });

            $('#remove-page-image').on('click', function () {
                $('#page_image_id').val('');
                $('#page-image-preview').empty();
            });
        });
    </script>
    <?php
}

add_action('save_post_page', 'save_page_image_meta_box');
function save_page_image_meta_box($post_id) {
    if (!isset($_POST['page_image_meta_box_nonce']) || !wp_verify_nonce($_POST['page_image_meta_box_nonce'], 'save_page_image_meta_box')) {
        return;
    }

    if (defined('DOING_AUTOSAVE') && DOING_AUTOSAVE) return;

    if (!current_user_can('edit_page', $post_id)) return;

    if (isset($_POST['page_image_id'])) {
        $image_id = intval($_POST['page_image_id']);
        update_post_meta($post_id, '_page_image_id', $image_id);
    }
}
