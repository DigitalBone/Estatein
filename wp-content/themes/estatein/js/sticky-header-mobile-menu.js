// Sticky header and mobile menu script

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
