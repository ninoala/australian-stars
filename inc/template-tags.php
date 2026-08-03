<?php
/**
 * Small reusable template helpers.
 *
 * @package Australian_Stars
 */

if ( ! defined( 'ABSPATH' ) ) {
    exit;
}

function austalian_stars_posted_on(): void {
    printf(
        '<time class="entry-date published" datetime="%1$s">%2$s</time>',
        esc_attr( get_the_date( DATE_W3C ) ),
        esc_html( get_the_date() )
    );
}
