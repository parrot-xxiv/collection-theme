<?php
/**
 * WordPress React App Manager - Refactored Implementation
 *
 * Manages React apps by creating dedicated WordPress pages and using a page template.
 * Add to your theme's functions.php file.
 * IMPORTANT: template-react.php
 */

class WP_React_Manager_Refactored {

    /**
     * The slug for the custom page template.
     * @var string
     */
    private $template_slug = 'template-react.php';

    public function __construct() {
        // Admin actions
        add_action('admin_menu', [$this, 'admin_menu']);
        add_action('admin_enqueue_scripts', [$this, 'admin_scripts']);

        // AJAX handlers
        add_action('wp_ajax_upload_react_zip', [$this, 'handle_upload']);
        add_action('wp_ajax_delete_react_app', [$this, 'handle_delete']);

        // Frontend asset enqueueing
        add_action('wp_enqueue_scripts', [$this, 'enqueue_frontend_assets']);
        
        // Page template integration
        add_filter('theme_page_templates', [$this, 'register_page_template'], 10, 1);
        add_filter('template_include', [$this, 'use_fallback_template'], 10, 1);
    }

    //======================================================================
    // Admin Area Setup
    //======================================================================

    public function admin_menu() {
        add_menu_page(
            'React Pages',
            'React Pages',
            'manage_options',
            'react-pages',
            [$this, 'render_admin_page'],
            'dashicons-code-standards'
        );
    }

    public function admin_scripts($hook) {
        if ('toplevel_page_react-pages' !== $hook) {
            return;
        }

        // It's better to create a separate admin.js file instead of inline scripts
        // For simplicity in this example, we'll keep it inline but use wp_localize_script
        
        // Enqueue a placeholder script handle to attach our data to
        wp_enqueue_script('wp-react-manager-admin', 'data:text/javascript;base64,', [], null, true);
        
        // Pass data to the frontend script
        wp_localize_script('wp-react-manager-admin', 'wpReactManager', [
            'ajax_url' => admin_url('admin-ajax.php'),
            'nonce' => wp_create_nonce('react_nonce')
        ]);

        // You could also enqueue a separate CSS file here
        add_action('admin_head', function() {
            ?>
            <style>
                .upload-area { border: 2px dashed #ccc; padding: 40px; text-align: center; margin: 20px 0; border-radius: 8px; cursor: pointer; }
                .upload-area.dragover { border-color: #0073aa; background: #f0f8ff; }
                .react-pages-table { margin-top: 30px; }
            </style>
            <?php
        });
    }

    public function render_admin_page() {
        $apps = get_option('wp_react_apps', []);
        ?>
        <div class="wrap">
            <h1>React Pages</h1>
            
            <form id="upload-form">
                <table class="form-table">
                    <tbody>
                        <tr>
                            <th scope="row"><label for="page_title">Page Title</label></th>
                            <td><input type="text" id="page_title" name="title" class="regular-text" required></td>
                        </tr>
                        <tr>
                            <th scope="row"><label for="page_slug">Page Slug</label></th>
                            <td><input type="text" id="page_slug" name="slug" class="regular-text" required></td>
                        </tr>
                        <tr>
                            <th scope="row"><label for="meta_description">Meta Description</label></th>
                            <td><textarea name="meta" id="meta_description" class="large-text" rows="2"></textarea></td>
                        </tr>
                        <tr>
                            <th scope="row"><label for="react_zip">React App (.zip)</label></th>
                            <td>
                                <div id="upload-area" class="upload-area">
                                    <input type="file" id="react_zip" name="zip" accept=".zip" style="display: none;" required>
                                    <p>Drop ZIP file here or click to select</p>
                                </div>
                            </td>
                        </tr>
                    </tbody>
                </table>
                <p class="submit">
                    <input type="submit" class="button-primary" value="Upload React App">
                </p>
            </form>

            <?php if (!empty($apps)): ?>
            <div class="react-pages-table">
                <h2>Uploaded React Pages</h2>
                <table class="wp-list-table widefat fixed striped">
                    <thead>
                        <tr><th>Title</th><th>Slug</th><th>URL</th><th>Actions</th></tr>
                    </thead>
                    <tbody>
                        <?php foreach ($apps as $slug => $app): ?>
                        <tr>
                            <td><?php echo esc_html($app['title']); ?></td>
                            <td><?php echo esc_html($slug); ?></td>
                            <td><a href="<?php echo esc_url(get_permalink($app['page_id'])); ?>" target="_blank">View Page</a></td>
                            <td>
                                <button class="button delete-btn" data-slug="<?php echo esc_attr($slug); ?>">Delete</button>
                            </td>
                        </tr>
                        <?php endforeach; ?>
                    </tbody>
                </table>
            </div>
            <?php endif; ?>
        </div>

        <script>
        document.addEventListener('DOMContentLoaded', () => {
            if (typeof jQuery === 'undefined') return;

            jQuery(document).ready(function($) {
                const $uploadArea = $('#upload-area');
                const $fileInput = $('#react_zip');

                $fileInput.on('click', (e) => {
                    e.stopPropagation();
                });
                $uploadArea.on('click', () => $fileInput.click());
                $uploadArea.on('dragover dragenter', (e) => {
                    e.preventDefault();
                    $uploadArea.addClass('dragover');
                }).on('dragleave dragend drop', (e) => {
                    e.preventDefault();
                    $uploadArea.removeClass('dragover');
                }).on('drop', (e) => {
                    const files = e.originalEvent.dataTransfer.files;
                    if (files.length) {
                        $fileInput[0].files = files;
                        $uploadArea.find('p').text(files[0].name);
                    }
                });
                 $fileInput.on('change', (e) => {
                    if (e.target.files.length) {
                        $uploadArea.find('p').text(e.target.files[0].name);
                    }
                 });

                $('#page_title').on('input', function() {
                    const slug = $(this).val().toLowerCase().replace(/\s+/g, '-').replace(/[^a-z0-9-]/g, '');
                    $('#page_slug').val(slug);
                });

                $('#upload-form').on('submit', function(e) {
                    e.preventDefault();
                    const formData = new FormData(this);
                    formData.append('action', 'upload_react_zip');
                    formData.append('nonce', wpReactManager.nonce);

                    $.ajax({
                        url: wpReactManager.ajax_url,
                        type: 'POST',
                        data: formData,
                        processData: false,
                        contentType: false,
                        success: (response) => {
                            if (response.success) {
                                alert('App uploaded successfully!');
                                location.reload();
                            } else {
                                alert('Error: ' + response.data);
                            }
                        },
                        error: () => alert('Upload failed due to a server error.')
                    });
                });

                $('.delete-btn').on('click', function() {
                    if (!confirm('Are you sure you want to delete this React app and its page? This cannot be undone.')) return;
                    
                    const slug = $(this).data('slug');
                    $.post(wpReactManager.ajax_url, {
                        action: 'delete_react_app',
                        slug: slug,
                        nonce: wpReactManager.nonce
                    }, (response) => {
                        if (response.success) {
                            location.reload();
                        } else {
                            alert('Delete failed: ' + response.data);
                        }
                    });
                });
            });
        });
        </script>
        <?php
    }

    //======================================================================
    // AJAX Handlers (Upload/Delete)
    //======================================================================

    public function handle_upload() {
        if (!current_user_can('manage_options') || !check_ajax_referer('react_nonce', 'nonce', false)) {
            wp_send_json_error('Unauthorized access.', 403);
        }

        if (!isset($_FILES['zip']) || $_FILES['zip']['error'] !== UPLOAD_ERR_OK) {
            wp_send_json_error('File upload failed. Please try again.');
        }

        $title = sanitize_text_field($_POST['title']);
        $slug = sanitize_title($_POST['slug']);
        $meta_desc = sanitize_textarea_field($_POST['meta']);

        if (empty($title) || empty($slug)) {
            wp_send_json_error('Title and slug are required.');
        }
        
        $apps = get_option('wp_react_apps', []);
        if (isset($apps[$slug]) || get_page_by_path($slug, OBJECT, 'page')) {
            wp_send_json_error('A page with this slug already exists.');
        }

        // Initialize WP_Filesystem
        if (!$this->init_filesystem()) {
            wp_send_json_error('Could not initialize WordPress Filesystem.');
        }
        global $wp_filesystem;

        $upload_dir = wp_upload_dir();
        $target_dir = $upload_dir['basedir'] . '/react-apps/' . $slug;

        // Create the directory using WP_Filesystem
        if (!$wp_filesystem->mkdir($target_dir, FS_CHMOD_DIR)) {
            wp_send_json_error('Failed to create app directory.');
        }

        // Unzip the file using WordPress API
        $unzip_result = unzip_file($_FILES['zip']['tmp_name'], $target_dir);
        if (is_wp_error($unzip_result)) {
            $wp_filesystem->rmdir($target_dir, true); // Cleanup
            wp_send_json_error('Failed to extract ZIP file: ' . $unzip_result->get_error_message());
        }

        // Find the main JS and CSS assets based on Vite config
        $assets = $this->find_vite_assets($target_dir);
        if (empty($assets['js'])) {
            $wp_filesystem->rmdir($target_dir, true); // Cleanup
            wp_send_json_error('Could not find the main JS asset (assets/index.js) in the ZIP file.');
        }

        // Create a WordPress page for this app
        $page_data = [
            'post_title'    => $title,
            'post_name'     => $slug,
            'post_status'   => 'publish',
            'post_type'     => 'page',
            'post_content'  => '',
            'meta_input'    => [
                '_wp_page_template'       => $this->template_slug,
                '_wp_react_app_slug'      => $slug,
                '_wp_react_meta_desc'     => $meta_desc, // Store meta in a custom field
            ],
        ];
        $page_id = wp_insert_post($page_data, true);

        if (is_wp_error($page_id)) {
            $wp_filesystem->rmdir($target_dir, true); // Cleanup
            wp_send_json_error('Failed to create WordPress page: ' . $page_id->get_error_message());
        }

        // Save app info
        $apps[$slug] = [
            'title'   => $title,
            'assets'  => $assets,
            'page_id' => $page_id,
            'created' => current_time('mysql'),
        ];
        update_option('wp_react_apps', $apps);

        wp_send_json_success('React app uploaded and page created successfully.');
    }

    public function handle_delete() {
        if (!current_user_can('manage_options') || !check_ajax_referer('react_nonce', 'nonce', false)) {
            wp_send_json_error('Unauthorized access.', 403);
        }

        $slug = sanitize_title($_POST['slug']);
        $apps = get_option('wp_react_apps', []);

        if (!isset($apps[$slug])) {
            wp_send_json_error('App not found.');
        }
        
        // Initialize WP_Filesystem
        if (!$this->init_filesystem()) {
            wp_send_json_error('Could not initialize WordPress Filesystem.');
        }
        global $wp_filesystem;

        // Delete the directory
        $upload_dir = wp_upload_dir();
        $target_dir = $upload_dir['basedir'] . '/react-apps/' . $slug;
        $wp_filesystem->rmdir($target_dir, true);

        // Delete the associated page
        wp_delete_post($apps[$slug]['page_id'], true); // true = force delete

        // Remove from options
        unset($apps[$slug]);
        update_option('wp_react_apps', $apps);

        wp_send_json_success('App and associated page deleted.');
    }

    //======================================================================
    // Frontend and Template Handling
    //======================================================================
    
    public function enqueue_frontend_assets() {
        // Only run on singular pages using our template
        if (!is_page_template($this->template_slug)) {
            return;
        }

        $slug = get_post_meta(get_the_ID(), '_wp_react_app_slug', true);
        if (!$slug) return;
        
        $apps = get_option('wp_react_apps', []);
        if (!isset($apps[$slug])) return;

        $app = $apps[$slug];
        $upload_dir = wp_upload_dir();
        $app_base_url = $upload_dir['baseurl'] . '/react-apps/' . $slug;

        // Enqueue main JS file
        if (!empty($app['assets']['js'])) {
            wp_enqueue_script_module(
                "react-app-$slug",
                $app_base_url . $app['assets']['js'],
                [], // dependencies
                null, // version
                true // in_footer
            );
        }

        // Enqueue main CSS file
        if (!empty($app['assets']['css'])) {
            wp_enqueue_style(
                "react-app-$slug",
                $app_base_url . $app['assets']['css'],
                [], // dependencies
                null // version
            );
        }
        
        // Hook to add meta description
        add_action('wp_head', function() {
            $meta_desc = get_post_meta(get_the_ID(), '_wp_react_meta_desc', true);
            if (!empty($meta_desc)) {
                echo '<meta name="description" content="' . esc_attr($meta_desc) . '">' . "\n";
            }
        });
    }

    public function register_page_template($templates) {
        $templates[$this->template_slug] = 'React App Host';
        return $templates;
    }

    public function use_fallback_template($template) {
        if (is_page_template($this->template_slug)) {
            $theme_template = get_stylesheet_directory() . '/' . $this->template_slug;
            if (!file_exists($theme_template)) {
                // You should create this fallback file inside your plugin/theme directory
                // For this example, we assume it's in the theme's root.
                // A better implementation would have the plugin provide its own file.
                // For now, let's just point to a file you should create.
                $fallback_template = get_stylesheet_directory() . '/template-react.php'; 
                if (file_exists($fallback_template)) {
                    return $fallback_template;
                }
            }
        }
        return $template;
    }

    //======================================================================
    // Utility Methods
    //======================================================================
    
    private function init_filesystem() {
        if (function_exists('WP_Filesystem')) {
            require_once(ABSPATH . 'wp-admin/includes/file.php');
            return WP_Filesystem();
        }
        return false;
    }
    
    private function find_vite_assets($dir) {
        // Based on the provided vite.config.js
        $assets = ['js' => null, 'css' => null];
        $js_file = '/assets/index.js';
        $css_file = '/assets/index.css';

        if (file_exists($dir . $js_file)) {
            $assets['js'] = $js_file;
        }
        if (file_exists($dir . $css_file)) {
            $assets['css'] = $css_file;
        }
        return $assets;
    }
}

new WP_React_Manager_Refactored();