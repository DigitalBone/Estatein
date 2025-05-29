jQuery(document).ready(function($) {
    // Add smooth scrolling to all links
    $("a[href*='#']:not([href='#'])").click(function() {
        if (location.pathname.replace(/^\//,'') == this.pathname.replace(/^\//,'') && location.hostname == this.hostname) {
            var target = $(this.hash);
            target = target.length ? target : $('[name=' + this.hash.slice(1) + ']');
            if (target.length) {
                $('html, body').animate({
                    scrollTop: target.offset().top
                }, 1000);
                return false;
            }
        }
    });

    // Mobile menu toggle
    $('.menu-toggle').click(function() {
        $(this).toggleClass('toggled-on');
        $('.main-navigation').toggleClass('toggled-on');
    });

    // Property filter functionality
    $('.property-filter').on('change', function() {
        var filters = {};
        $('.property-filter').each(function() {
            var value = $(this).val();
            if (value) {
                filters[$(this).data('filter')] = value;
            }
        });

        $.ajax({
            url: estatein_ajax.ajax_url,
            type: 'POST',
            data: {
                action: 'estatein_filter_properties',
                filters: filters,
                nonce: estatein_ajax.nonce
            },
            success: function(response) {
                $('.properties-grid').html(response);
            }
        });
    });
});
