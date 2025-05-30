<?php
/**
 * Template Name: Services
 * Description: Custom template for the Services page
 * @package Estatein
 */
get_header();
?>
<div class="container services-page">
    <h1 class="page-title">Our Services</h1>
    <?php if (function_exists('estatein_breadcrumbs')) estatein_breadcrumbs(); ?>
    <div class="services-intro">
        <p>At Estatein, we offer a comprehensive suite of real estate services tailored to meet your needs. Explore what we can do for you below.</p>
    </div>
    <div class="row services-list">
        <div class="col-lg-4 col-md-6 col-12 service-card">
            <div class="service-icon">🏠</div>
            <h2 class="service-title">Property Sales</h2>
            <p class="service-desc">We help you buy or sell your property quickly and at the best price, with expert guidance every step of the way.</p>
        </div>
        <div class="col-lg-4 col-md-6 col-12 service-card">
            <div class="service-icon">🔑</div>
            <h2 class="service-title">Rentals & Leasing</h2>
            <p class="service-desc">Find the perfect rental or tenant with our extensive network and professional management services.</p>
        </div>
        <div class="col-lg-4 col-md-6 col-12 service-card">
            <div class="service-icon">📈</div>
            <h2 class="service-title">Investment Consulting</h2>
            <p class="service-desc">Maximize your returns with our property investment analysis, market insights, and portfolio management.</p>
        </div>
        <div class="col-lg-4 col-md-6 col-12 service-card">
            <div class="service-icon">🏗️</div>
            <h2 class="service-title">Development & Projects</h2>
            <p class="service-desc">From concept to completion, we manage and consult on property development and construction projects.</p>
        </div>
        <div class="col-lg-4 col-md-6 col-12 service-card">
            <div class="service-icon">📝</div>
            <h2 class="service-title">Valuations & Appraisals</h2>
            <p class="service-desc">Get accurate, market-driven valuations for your property from our certified professionals.</p>
        </div>
        <div class="col-lg-4 col-md-6 col-12 service-card">
            <div class="service-icon">🤝</div>
            <h2 class="service-title">Advisory & Support</h2>
            <p class="service-desc">Benefit from ongoing support, legal advice, and personalized service throughout your real estate journey.</p>
        </div>
    </div>
</div>
<?php get_footer(); ?>
