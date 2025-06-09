<?php

add_action('admin_menu', 'register_frontend_settings_menu');

function register_frontend_settings_menu() {
    add_menu_page(
        'Frontend Settings',
        'Frontend Settings',
        'manage_options',
        'frontend-settings',
        'render_frontend_settings_page',
        'dashicons-admin-generic',
        80
    );
}

function render_frontend_settings_page() {
    $options = get_option('frontend_settings_pages', []);

    if (isset($_POST['save_frontend_settings'])) {
        check_admin_referer('save_frontend_settings');

        $pages = isset($_POST['pages']) ? array_map('intval', $_POST['pages']) : [];

        // Remove empty and duplicate entries
        $pages = array_unique(array_filter($pages));

        update_option('frontend_settings_pages', $pages);
        $options = $pages; // ✅ Refresh options to reflect saved data

        echo '<div class="updated"><p>Settings saved.</p></div>';
    }
    ?>
    <div class="wrap">
        <h1>Frontend Page Selector</h1>
        <form method="post" id="frontend-settings-form">
            <?php wp_nonce_field('save_frontend_settings'); ?>

            <div id="repeater">
                <?php if (!empty($options)): ?>
                    <?php foreach ($options as $page_id): ?>
                        <div class="repeater-item">
                            <?php wp_dropdown_pages([
        'name' => 'pages[]',
        'selected' => $page_id,
        'show_option_none' => '-- Select Page --',
        'class' => 'page-select',
    ]); ?>
                            <button type="button" class="button remove-row">Remove</button>
                        </div>
                    <?php endforeach; ?>
                <?php else: ?>
                    <div class="repeater-item">
                        <?php wp_dropdown_pages([
        'name' => 'pages[]',
        'show_option_none' => '-- Select Page --',
        'class' => 'page-select',
    ]); ?>
                        <button type="button" class="button remove-row">Remove</button>
                    </div>
                <?php endif; ?>
            </div>

            <p><button type="button" class="button" id="add-row">+ Add Page</button></p>
            <p><input type="submit" name="save_frontend_settings" class="button button-primary" value="Save Settings"></p>
        </form>
    </div>

    <style>
        #repeater .repeater-item {
            margin-bottom: 10px;
            display: flex;
            align-items: center;
            gap: 10px;
        }
        #repeater select {
            min-width: 300px;
        }
        .notice.error {
            color: #a00;
        }
    </style>

    <script>
        document.addEventListener('DOMContentLoaded', function () {
            const form = document.getElementById('frontend-settings-form');
            const repeater = document.getElementById('repeater');
            const addRowBtn = document.getElementById('add-row');

            addRowBtn.addEventListener('click', () => {
                const firstItem = repeater.querySelector('.repeater-item');
                const newItem = firstItem.cloneNode(true);
                newItem.querySelector('select').value = '';
                repeater.appendChild(newItem);
                updateRemoveButtons();
            });

            repeater.addEventListener('click', function (e) {
                if (e.target.classList.contains('remove-row')) {
                    const rows = repeater.querySelectorAll('.repeater-item');
                    if (rows.length > 1) {
                        e.target.closest('.repeater-item').remove();
                    }
                    updateRemoveButtons();
                }
            });

            form.addEventListener('submit', function (e) {
                const selects = Array.from(repeater.querySelectorAll('.page-select'));
                const values = selects.map(select => select.value).filter(val => val !== '');

                const duplicates = values.filter((item, index) => values.indexOf(item) !== index);
                if (duplicates.length > 0) {
                    e.preventDefault();
                    alert('Duplicate pages selected. Please choose unique pages.');
                }
            });

            function updateRemoveButtons() {
                const rows = repeater.querySelectorAll('.repeater-item');
                rows.forEach(row => {
                    row.querySelector('.remove-row').disabled = rows.length <= 1;
                });
            }

            updateRemoveButtons();
        });
    </script>
    <?php
}


