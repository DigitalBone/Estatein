<?php
/**
 * Template Name: Homepage
 */
get_header(); ?>

<main id="main" class="site-main">
    <?php
    // Hero Section
    // get_template_part('template-parts/content', 'hero');
    // Features Row
    get_template_part('template-parts/content', 'features');
    // Featured Properties
    get_template_part('template-parts/content', 'properties');
    // Testimonials
    get_template_part('template-parts/content', 'testimonials');
    // FAQs
    get_template_part('template-parts/content', 'faqs');
    // CTA Banner
    // get_template_part('template-parts/content', 'cta');
    ?>
</main>

<?php get_footer(); ?>
