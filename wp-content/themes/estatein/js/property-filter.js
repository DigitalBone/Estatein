jQuery(document).ready(function($) {
    // Initialize price range slider
    if ($('#price-range').length) {
        $('#price-range').slider({
            range: true,
            min: 0,
            max: 1000000,
            values: [0, 1000000],
            slide: function(event, ui) {
                $('#price-min').val(ui.values[0]);
                $('#price-max').val(ui.values[1]);
                applyFilters();
            }
        });
    }

    // Initialize bedroom/bathroom filters
    $('.bedroom-filter, .bathroom-filter').change(function() {
        applyFilters();
    });

    function applyFilters() {
        var data = {
            action: 'estatein_filter_properties',
            nonce: estatein_ajax.nonce,
            filters: {}
        };

        // Add price range
        if ($('#price-min').val() && $('#price-max').val()) {
            data.filters.price_min = $('#price-min').val();
            data.filters.price_max = $('#price-max').val();
        }

        // Add bedroom filter
        if ($('.bedroom-filter:checked').length) {
            data.filters.bedrooms = $('.bedroom-filter:checked').map(function() {
                return $(this).val();
            }).get();
        }

        // Add bathroom filter
        if ($('.bathroom-filter:checked').length) {
            data.filters.bathrooms = $('.bathroom-filter:checked').map(function() {
                return $(this).val();
            }).get();
        }

        // Add property type filter
        if ($('.property-type-filter:checked').length) {
            data.filters.property_type = $('.property-type-filter:checked').map(function() {
                return $(this).val();
            }).get();
        }

        // Add location filter
        if ($('.location-filter:checked').length) {
            data.filters.location = $('.location-filter:checked').map(function() {
                return $(this).val();
            }).get();
        }

        $.ajax({
            url: estatein_ajax.ajax_url,
            type: 'POST',
            data: data,
            success: function(response) {
                $('.properties-grid').html(response);
            }
        });
    }
});
