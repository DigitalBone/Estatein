<?php
/**
 * Custom Breadcrumbs with Schema.org markup
 */
function estatein_breadcrumbs() {
    global $post;
    $sep = ' <span class="bc-sep">/</span> ';
    $home = '<a href="' . esc_url(home_url('/')) . '">Home</a>';
    $breadcrumbs = array();
    $schema = array();
    $position = 1;

    $breadcrumbs[] = $home;
    $schema[] = '{"@type": "ListItem", "position": ' . $position . ', "name": "Home", "item": "' . esc_url(home_url('/')) . '"}';
    $position++;

    if (is_singular('property')) {
        $breadcrumbs[] = '<a href="' . esc_url(get_post_type_archive_link('property')) . '">Properties</a>';
        $schema[] = '{"@type": "ListItem", "position": ' . $position . ', "name": "Properties", "item": "' . esc_url(get_post_type_archive_link('property')) . '"}';
        $position++;
        $breadcrumbs[] = get_the_title();
        $schema[] = '{"@type": "ListItem", "position": ' . $position . ', "name": "' . esc_js(get_the_title()) . '"}';
    } elseif (is_singular('post')) {
        $cat = get_the_category();
        if ($cat && isset($cat[0])) {
            $breadcrumbs[] = '<a href="' . esc_url(get_category_link($cat[0]->term_id)) . '">' . esc_html($cat[0]->name) . '</a>';
            $schema[] = '{"@type": "ListItem", "position": ' . $position . ', "name": "' . esc_js($cat[0]->name) . '", "item": "' . esc_url(get_category_link($cat[0]->term_id)) . '"}';
            $position++;
        }
        $breadcrumbs[] = get_the_title();
        $schema[] = '{"@type": "ListItem", "position": ' . $position . ', "name": "' . esc_js(get_the_title()) . '"}';
    } elseif (is_page() && !is_front_page()) {
        $ancestors = array_reverse(get_post_ancestors($post));
        foreach ($ancestors as $ancestor) {
            $breadcrumbs[] = '<a href="' . esc_url(get_permalink($ancestor)) . '">' . esc_html(get_the_title($ancestor)) . '</a>';
            $schema[] = '{"@type": "ListItem", "position": ' . $position . ', "name": "' . esc_js(get_the_title($ancestor)) . '", "item": "' . esc_url(get_permalink($ancestor)) . '"}';
            $position++;
        }
        $breadcrumbs[] = get_the_title();
        $schema[] = '{"@type": "ListItem", "position": ' . $position . ', "name": "' . esc_js(get_the_title()) . '"}';
    } elseif (is_archive()) {
        $breadcrumbs[] = post_type_archive_title('', false);
        $schema[] = '{"@type": "ListItem", "position": ' . $position . ', "name": "' . esc_js(post_type_archive_title('', false)) . '"}';
    } elseif (is_search()) {
        $breadcrumbs[] = 'Search results for "' . get_search_query() . '"';
        $schema[] = '{"@type": "ListItem", "position": ' . $position . ', "name": "Search results for ' . esc_js(get_search_query()) . '"}';
    }

    echo '<nav class="breadcrumbs" aria-label="Breadcrumbs">';
    echo implode($sep, $breadcrumbs);
    echo '</nav>';
    echo '<script type="application/ld+json">{"@context": "https://schema.org", "@type": "BreadcrumbList", "itemListElement": [' . implode(',', $schema) . ']}</script>';
}
