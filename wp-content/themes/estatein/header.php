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

<?php // Sticky header and mobile menu script ?>
<script>
document.addEventListener('DOMContentLoaded', function() {
    // Sticky header
    window.addEventListener('scroll', function() {
        var header = document.querySelector('.site-header');
        if(window.scrollY > 10) {
            header.classList.add('is-sticky');
        } else {
            header.classList.remove('is-sticky');
        }
    });
    // Mobile menu toggle
    var mobileToggle = document.getElementById('mobile-menu-toggle');
    var mobileMenu = document.getElementById('mobile-menu');
    var mobileClose = document.getElementById('mobile-menu-close');
    if (mobileToggle && mobileMenu && mobileClose) {
        mobileToggle.addEventListener('click', function() {
            mobileMenu.classList.add('open');
            mobileMenu.setAttribute('aria-hidden', 'false');
            mobileToggle.setAttribute('aria-expanded', 'true');
            document.body.classList.add('mobile-menu-open');
        });
        mobileClose.addEventListener('click', function() {
            mobileMenu.classList.remove('open');
            mobileMenu.setAttribute('aria-hidden', 'true');
            mobileToggle.setAttribute('aria-expanded', 'false');
            document.body.classList.remove('mobile-menu-open');
        });
        // ESC key closes menu
        document.addEventListener('keydown', function(e) {
            if (e.key === 'Escape' && mobileMenu.classList.contains('open')) {
                mobileMenu.classList.remove('open');
                mobileMenu.setAttribute('aria-hidden', 'true');
                mobileToggle.setAttribute('aria-expanded', 'false');
                document.body.classList.remove('mobile-menu-open');
            }
        });
    }
});
</script>

            <?php if (is_front_page()) {
                get_template_part('template-parts/content', 'hero');
            } ?>
        </div>
    </div>
    </div>
</div>
