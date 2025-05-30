<?php
/**
 * The header for our theme
 */
?>
<!doctype html>
<html <?php language_attributes(); ?>>
<head>
    <meta charset="<?php bloginfo('charset'); ?>">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta http-equiv="Content-Language" content="<?php bloginfo('language'); ?>">
    <title><?php wp_title('|', true, 'right'); bloginfo('name'); ?></title>
    <meta name="description" content="<?php bloginfo('description'); ?>">
    <meta name="keywords" content="real estate, properties, homes, investment, estatein">
    <meta name="robots" content="index, follow">
    <link rel="canonical" href="<?php echo esc_url( (is_singular() ? get_permalink() : home_url(add_query_arg(array(),$wp->request)) )); ?>">
    <link rel="icon" type="image/png" href="<?php echo get_template_directory_uri(); ?>/images/favicon.png">
    <!-- Open Graph / Facebook -->
    <meta property="og:title" content="<?php wp_title('|', true, 'right'); bloginfo('name'); ?>">
    <meta property="og:description" content="<?php bloginfo('description'); ?>">
    <meta property="og:type" content="website">
    <meta property="og:url" content="<?php echo esc_url( (is_singular() ? get_permalink() : home_url(add_query_arg(array(),$wp->request)) )); ?>">
    <meta property="og:image" content="<?php echo get_template_directory_uri(); ?>/images/og-image.jpg">
    <!-- Twitter Card -->
    <meta name="twitter:card" content="summary_large_image">
    <meta name="twitter:title" content="<?php wp_title('|', true, 'right'); bloginfo('name'); ?>">
    <meta name="twitter:description" content="<?php bloginfo('description'); ?>">
    <meta name="twitter:image" content="<?php echo get_template_directory_uri(); ?>/images/og-image.jpg">
    <!-- Schema.org Organization -->
    <script type="application/ld+json">
    {
      "@context": "https://schema.org",
      "@type": "Organization",
      "name": "Estatein",
      "url": "<?php echo esc_url( home_url('/') ); ?>",
      "logo": "<?php echo get_template_directory_uri(); ?>/images/logo.svg",
      "contactPoint": [{
        "@type": "ContactPoint",
        "telephone": "+1-555-555-5555",
        "contactType": "customer service",
        "areaServed": "ZA"
      }],
      "sameAs": [
        "https://www.facebook.com/estatein",
        "https://www.instagram.com/estatein"
      ]
    }
    </script>
    <?php if (is_singular('property')) : global $post; ?>
    <script type="application/ld+json">
    {
      "@context": "https://schema.org",
      "@type": "Residence",
      "name": "<?php echo esc_js(get_the_title($post)); ?>",
      "description": "<?php echo esc_js(wp_strip_all_tags(get_the_excerpt($post))); ?>",
      "url": "<?php echo esc_url(get_permalink($post)); ?>",
      "image": "<?php if (has_post_thumbnail($post)) { $img = wp_get_attachment_image_src(get_post_thumbnail_id($post),'full'); echo esc_url($img[0]); } ?>",
      "address": {
        "@type": "PostalAddress",
        "addressCountry": "ZA"
      }
    }
    </script>
    <?php endif; ?>
    <?php wp_head(); ?>
    <script src="<?php echo get_template_directory_uri(); ?>/js/property-slider.js" defer></script>
</head>
<body <?php body_class(); ?>>
<?php wp_body_open(); ?>
<div id="page" class="site">

    <!-- Announcement Bar -->
    <div class="announcement-bar" id="announcement-bar">
        <div class="container announcement-content">
            <span class="announcement-text">✨Discover Your Dream Property with Estatein <a href="#" class="announcement-link">Learn More</a></span>
            <button class="announcement-close" aria-label="Close announcement" onclick="document.getElementById('announcement-bar').style.display='none';">&times;</button>
        </div>
    </div>
    <!-- Main Header -->
    <header id="masthead" class="site-header">
        <div class="container header-flex" style="justify-content:space-between;">

            <!-- Logo -->
            <div class="site-branding">
                <a href="<?php echo esc_url(home_url('/')); ?>" class="site-logo-link">
                    <div class="site-logo">
                        <?php
                        if (has_custom_logo()) {
                            the_custom_logo();
                        } else {
                            echo '<img src="' . get_template_directory_uri() . '/images/logo.svg" alt="Estatein Logo" class="default-logo" style="height:40px;">';
                        }
                        ?>
                    </div>
                    <!-- <span class="site-title">Estatein</span> -->
                </a>
            </div>
            <!-- Desktop Navigation & Contact (Right Aligned) -->
            <div class="header-nav-group">
                <nav id="site-navigation" class="main-navigation" aria-label="Main Navigation">
                    <?php
                    wp_nav_menu(array(
                        'theme_location' => 'primary',
                        'menu_id' => 'primary-menu',
                        'container' => false,
                        'menu_class' => 'nav-menu',
                        'fallback_cb' => false,
                        'items_wrap' => '<ul id="%1$s" class="%2$s">%3$s</ul>',
                    ));
                    ?>
                </nav>
                <div class="header-contact">
                    <a href="<?php echo esc_url(home_url('/contact')); ?>" class="button header-contact-btn">Contact Us</a>
                </div>
            </div>
            <!-- Hamburger Button for Mobile (moved to far right) -->
            <button class="mobile-menu-toggle" id="mobile-menu-toggle" aria-label="Open menu" aria-controls="mobile-menu" aria-expanded="false">
                <span class="hamburger"></span>
            </button>
            <!-- Mobile Menu Overlay -->
            <div class="mobile-menu" id="mobile-menu" aria-hidden="true">
                <div class="mobile-menu-header">
                    <span class="site-title">Estatein</span>
                    <button class="mobile-menu-close" id="mobile-menu-close" aria-label="Close menu">&times;</button>
                </div>
                <?php
                wp_nav_menu(array(
                    'theme_location' => 'primary',
                    'menu_id' => 'mobile-menu-list',
                    'container' => false,
                    'menu_class' => 'mobile-nav-menu',
                    'fallback_cb' => false,
                    'items_wrap' => '<ul id="%1$s" class="%2$s">%3$s</ul>',
                ));
                ?>
                <a href="<?php echo esc_url(home_url('/contact')); ?>" class="button mobile-contact-btn">Contact Us</a>
            </div>
        </div>
    <script>
// Page fade-in effect
window.addEventListener('DOMContentLoaded', function() {
    document.body.classList.add('page-fade-in');
});
</script>
</header>
    

    <div class="site-content">
        <div class="container">

<script src="<?php echo get_template_directory_uri(); ?>/js/sticky-header-mobile-menu.js" defer></script>

            <?php if (is_front_page()) {
                get_template_part('template-parts/content', 'hero');
            } ?>
        </div>
    </div>
    </div>
</div>
