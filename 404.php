<?php
/**
 * 404 template.
 *
 * @package Australian_Stars
 */

get_header();
?>

<main id="main-content" class="section error-404">
    <div class="container content-narrow">
        <p class="section-eyebrow">404</p>
        <h1><?php esc_html_e( 'Page not found', 'starter-theme' ); ?></h1>
        <p><?php esc_html_e( 'The page you are looking for may have moved or no longer exists.', 'starter-theme' ); ?></p>
        <a class="button" href="<?php echo esc_url( home_url( '/' ) ); ?>">
            <?php esc_html_e( 'Return home', 'starter-theme' ); ?>
        </a>
    </div>
</main>

<?php get_footer(); ?>
