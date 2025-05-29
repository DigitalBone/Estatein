<?php
if (!defined('ESTATEIN_VERSION')) {
    define('ESTATEIN_VERSION', '1.0.0');
}

if (!function_exists('estatein_setup')) {
    function estatein_setup() {
        // Add theme support
        add_theme_support('title-tag');
        add_theme_support('post-thumbnails');
        add_theme_support('automatic-feed-links');
        add_theme_support('html5', array(
            'search-form',
            'comment-form',
            'comment-list',
            'gallery',
            'caption',
        ));
        // Enable custom logo support
        add_theme_support('custom-logo', array(
            'height'      => 60,
            'width'       => 240,
            'flex-height' => true,
            'flex-width'  => true,
            'header-text' => array('site-title', 'site-description'),
        ));
        // Register navigation menus
        register_nav_menus(array(
            'primary' => esc_html__('Primary', 'estatein'),
        ));

        // Register custom post type for Properties
        estatein_register_post_types();
        
        // Register custom taxonomies
        estatein_register_taxonomies();
    }
    add_action('after_setup_theme', 'estatein_setup');
}

if (!function_exists('estatein_scripts')) {
    function estatein_scripts() {
        // Enqueue Google Fonts
        wp_enqueue_style('estatein-google-fonts', 'https://fonts.googleapis.com/css2?family=Urbanist:wght@400;500;600&display=swap', array(), null);
        
        // Enqueue main stylesheet
        wp_enqueue_style('estatein-style', get_stylesheet_uri(), array(), ESTATEIN_VERSION);
        
        // Enqueue JavaScript
        wp_enqueue_script('estatein-navigation', get_template_directory_uri() . '/js/navigation.js', array(), ESTATEIN_VERSION, true);
        
        // Enqueue property filter script
        wp_enqueue_script('estatein-property-filter', get_template_directory_uri() . '/js/property-filter.js', array('jquery'), ESTATEIN_VERSION, true);
    }
    add_action('wp_enqueue_scripts', 'estatein_scripts');
}

if (!function_exists('estatein_content_width')) {
    function estatein_content_width() {
        $GLOBALS['content_width'] = apply_filters('estatein_content_width', 1140);
    }
    add_action('after_setup_theme', 'estatein_content_width', 0);
}

// Register Custom Post Types
if (!function_exists('estatein_register_post_types')) {
    function estatein_register_post_types() {
        $args = array(
            'public' => true,
            'has_archive' => true,
            'supports' => array('title', 'editor', 'thumbnail', 'excerpt', 'custom-fields'),
            'menu_icon' => 'dashicons-building',
            'rewrite' => array('slug' => 'properties'),
            'labels' => array(
                'name' => esc_html__('Properties', 'estatein'),
                'singular_name' => esc_html__('Property', 'estatein'),
            ),
        );
        register_post_type('property', $args);
    }
}

// Register Custom Taxonomies
if (!function_exists('estatein_register_taxonomies')) {
    function estatein_register_taxonomies() {
        // Property Type Taxonomy
        register_taxonomy('property_type', 'property', array(
            'hierarchical' => true,
            'labels' => array(
                'name' => esc_html__('Property Types', 'estatein'),
                'singular_name' => esc_html__('Property Type', 'estatein'),
            ),
            'show_ui' => true,
            'show_admin_column' => true,
            'query_var' => true,
            'rewrite' => array('slug' => 'property-type'),
        ));

        // Location Taxonomy
        register_taxonomy('property_location', 'property', array(
            'hierarchical' => true,
            'labels' => array(
                'name' => esc_html__('Locations', 'estatein'),
                'singular_name' => esc_html__('Location', 'estatein'),
            ),
            'show_ui' => true,
            'show_admin_column' => true,
            'query_var' => true,
            'rewrite' => array('slug' => 'location'),
        ));
    }
}

// Add custom meta boxes for properties
if (!function_exists('estatein_add_property_meta_boxes')) {
    function estatein_add_property_meta_boxes() {
        add_meta_box(
            'estatein_property_details',
            esc_html__('Property Details', 'estatein'),
            'estatein_render_property_details',
            'property',
            'normal',
            'high'
        );
    }
    add_action('add_meta_boxes', 'estatein_add_property_meta_boxes');
}

if (!function_exists('estatein_render_property_details')) {
    function estatein_render_property_details($post) {
        wp_nonce_field('estatein_property_details', 'estatein_property_details_nonce');
        
        $price = get_post_meta($post->ID, '_estatein_property_price', true);
        $bedrooms = get_post_meta($post->ID, '_estatein_property_bedrooms', true);
        $bathrooms = get_post_meta($post->ID, '_estatein_property_bathrooms', true);
        ?>
        <div class="property-details">
            <p>
                <label for="property_price"><?php esc_html_e('Price:', 'estatein'); ?></label>
                <input type="number" id="property_price" name="property_price" value="<?php echo esc_attr($price); ?>">
            </p>
            <p>
                <label for="property_bedrooms"><?php esc_html_e('Bedrooms:', 'estatein'); ?></label>
                <input type="number" id="property_bedrooms" name="property_bedrooms" value="<?php echo esc_attr($bedrooms); ?>">
            </p>
            <p>
                <label for="property_bathrooms"><?php esc_html_e('Bathrooms:', 'estatein'); ?></label>
                <input type="number" id="property_bathrooms" name="property_bathrooms" value="<?php echo esc_attr($bathrooms); ?>">
            </p>
        </div>
        <?php
    }
}

if (!function_exists('estatein_save_property_meta')) {
    function estatein_save_property_meta($post_id) {
        if (!isset($_POST['estatein_property_details_nonce']) || !wp_verify_nonce($_POST['estatein_property_details_nonce'], 'estatein_property_details')) {
            return;
        }

        if (defined('DOING_AUTOSAVE') && DOING_AUTOSAVE) {
            return;
        }

        if (!current_user_can('edit_post', $post_id)) {
            return;
        }

        if (isset($_POST['property_price'])) {
            update_post_meta($post_id, '_estatein_property_price', sanitize_text_field($_POST['property_price']));
        }

        if (isset($_POST['property_bedrooms'])) {
            update_post_meta($post_id, '_estatein_property_bedrooms', sanitize_text_field($_POST['property_bedrooms']));
        }

        if (isset($_POST['property_bathrooms'])) {
            update_post_meta($post_id, '_estatein_property_bathrooms', sanitize_text_field($_POST['property_bathrooms']));
        }
    }
    add_action('save_post_property', 'estatein_save_property_meta');
}
