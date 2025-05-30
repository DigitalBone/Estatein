<?php
/**
 * The template for displaying the footer
 */
?>
<footer id="colophon" class="site-footer">
    <!-- CTA Section -->
    <div class="footer-cta-section">
        <div class="container">
            <div class="footer-cta-content">
                <h2 class="footer-cta-title">Start Your Real Estate Journey Today</h2>
                <p class="footer-cta-desc">Your dream property is just a click away. Whether you're looking for a new home, a strategic investment, or expert real estate advice, Estatein is here to assist you every step of the way. Take the first step towards your real estate goals and explore our available properties or get in touch with our team for personalized assistance.</p>
                <a href="<?php echo esc_url(get_post_type_archive_link('property')); ?>" class="footer-cta-btn">Explore Properties</a>
            </div>
        </div>
        <div class="footer-cta-bg"></div>
    </div>
    <!-- Main Footer -->
    <div class="footer-main">
        <div class="container">
            <div class="footer-main-row">
                <div class="footer-logo-newsletter">
                    <div class="footer-logo">
                        <?php if (has_custom_logo()) { the_custom_logo(); } ?>
                    </div>
                    <form class="footer-newsletter-form" action="#" method="post">
                        <input type="email" name="email" placeholder="Enter Your Email" required />
                        <button type="submit" class="newsletter-btn" aria-label="Subscribe"><span>&#10148;</span></button>
                    </form>
                </div>
                <div class="footer-links">
                    <div class="footer-col">
                        <h4>Home</h4>
                        <ul>
                            <li><a href="#hero">Hero Section</a></li>
                            <li><a href="#features">Features</a></li>
                            <li><a href="#properties">Properties</a></li>
                            <li><a href="#testimonials">Testimonials</a></li>
                            <li><a href="#faqs">FAQs</a></li>
                        </ul>
                    </div>
                    <div class="footer-col">
                        <h4>About Us</h4>
                        <ul>
                            <li><a href="#story">Our Story</a></li>
                            <li><a href="#how">How It Works</a></li>
                            <li><a href="#clients">Our Clients</a></li>
                        </ul>
                    </div>
                    <div class="footer-col">
                        <h4>Properties</h4>
                        <ul>
                            <li><a href="<?php echo esc_url(get_post_type_archive_link('property')); ?>">Portfolio</a></li>
                            <li><a href="#categories">Categories</a></li>
                        </ul>
                    </div>
                    <div class="footer-col">
                        <h4>Services</h4>
                        <ul>
                            <li><a href="#valuation">Valuation Mastery</a></li>
                            <li><a href="#marketing">Strategic Marketing</a></li>
                            <li><a href="#negotiation">Negotiation Wizardry</a></li>
                            <li><a href="#closing">Closing Success</a></li>
                            <li><a href="#management">Property Management</a></li>
                        </ul>
                    </div>
                    <div class="footer-col">
                        <h4>Contact Us</h4>
                        <ul>
                            <li><a href="#contact">Contact Form</a></li>
                            <li><a href="#offices">Our Offices</a></li>
                        </ul>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- Bottom Bar -->
    <div class="footer-bottom-bar">
        <div class="container">
            <div class="footer-bottom-content">
                <div class="footer-copyright">
                    &copy;<?php echo date('Y'); ?> Estatein. All Rights Reserved.
                </div>
                <div class="footer-terms">
                    <a href="#terms">Terms &amp; Conditions</a>
                </div>
                <div class="footer-social">
                    <a href="#" class="footer-social-icon" aria-label="LinkedIn"><svg width="20" height="20" fill="currentColor"><use xlink:href="#icon-linkedin" /></svg></a>
                    <a href="#" class="footer-social-icon" aria-label="Facebook"><svg width="20" height="20" fill="currentColor"><use xlink:href="#icon-facebook" /></svg></a>
                    <a href="#" class="footer-social-icon" aria-label="Twitter"><svg width="20" height="20" fill="currentColor"><use xlink:href="#icon-twitter" /></svg></a>
                    <a href="#" class="footer-social-icon" aria-label="YouTube"><svg width="20" height="20" fill="currentColor"><use xlink:href="#icon-youtube" /></svg></a>
                </div>
            </div>
        </div>
    </div>
</footer>
<?php wp_footer(); ?>
</body>
</html>
