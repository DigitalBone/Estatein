<?php
/**
 * The template for displaying the footer
 */
?>
    <footer id="colophon" class="site-footer">
        <div class="container">
            <div class="footer-content">
                <div class="row">
                    <div class="col-md-4">
                        <div class="footer-logo">
                            <?php
                            if (has_custom_logo()) {
                                the_custom_logo();
                            }
                            ?>
                        </div>
                    </div>
                    <div class="col-md-4">
                        <nav class="footer-navigation">
                            <?php
                            wp_nav_menu(array(
                                'theme_location' => 'primary',
                                'menu_class' => 'footer-menu',
                                'container' => false,
                                'fallback_cb' => false,
                            ));
                            ?>
                        </nav>
                    </div>
                    <div class="col-md-4">
                        <div class="footer-contact">
                            <h3><?php esc_html_e('Contact Us', 'estatein'); ?></h3>
                            <?php
                            if (is_active_sidebar('footer-contact')) {
                                dynamic_sidebar('footer-contact');
                            }
                            ?>
                        </div>
                    </div>
                </div>
            </div>
            <div class="site-info">
                <div class="row">
                    <div class="col-12">
                        <?php
                        printf(
                            /* translators: 1: Theme name, 2: Theme author. */
                            esc_html__('Theme: %1$s by %2$s.', 'estatein'),
                            'Estatein',
                            '<a href="https://estatein.com">Estatein Team</a>'
                        );
                        ?>
                    </div>
                </div>
            </div>
        </div>
    </footer>
</div>
<?php wp_footer(); ?>
</body>
</html>
