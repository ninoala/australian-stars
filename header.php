<?php
/**
 * Site header.
 *
 * @package Australian_Stars
 */

$home_url = home_url( '/' );

if ( has_custom_logo() ) {
	$brand_markup = get_custom_logo();
} else {
	$brand_markup = sprintf(
		'<a class="site-title" href="%1$s">%2$s</a>',
		esc_url( $home_url ),
		esc_html( get_bloginfo( 'name' ) )
	);
}

?><!doctype html>
<html <?php language_attributes(); ?>>
<head>
	<meta charset="<?php bloginfo( 'charset' ); ?>">
	<meta
		name="viewport"
		content="width=device-width, initial-scale=1"
	>

	<?php wp_head(); ?>
</head>

<body <?php body_class(); ?>>
<?php wp_body_open(); ?>

<a
	class="skip-link screen-reader-text"
	href="#main-content"
>
	<?php esc_html_e( 'Skip to content', 'australian-stars' ); ?>
</a>

<header
	class="site-header"
	id="site-header"
>
	<div class="container site-header__inner">

		<div class="site-header__brand">
			<?php echo wp_kses_post( $brand_markup ); ?>
		</div>

		<button
			class="nav-toggle"
			type="button"
			aria-expanded="false"
			aria-controls="primary-navigation"
			aria-label="<?php esc_attr_e( 'Open navigation', 'australian-stars' ); ?>"
		>
			<span
				class="nav-toggle__line"
				aria-hidden="true"
			></span>

			<span
				class="nav-toggle__line"
				aria-hidden="true"
			></span>

			<span
				class="nav-toggle__line"
				aria-hidden="true"
			></span>
		</button>

		<nav
			class="primary-navigation"
			id="primary-navigation"
			aria-label="<?php esc_attr_e( 'Primary navigation', 'australian-stars' ); ?>"
		>
			<div class="primary-navigation__drawer-header">

				<div class="primary-navigation__drawer-logo">
					<?php echo wp_kses_post( $brand_markup ); ?>
				</div>

				<button
					class="primary-navigation__close"
					type="button"
					aria-label="<?php esc_attr_e( 'Close navigation', 'australian-stars' ); ?>"
				>
					<span
						class="primary-navigation__close-line"
						aria-hidden="true"
					></span>

					<span
						class="primary-navigation__close-line"
						aria-hidden="true"
					></span>
				</button>

			</div>

			<?php
			wp_nav_menu(
				[
					'theme_location' => 'primary',
					'container'      => false,
					'menu_class'     => 'primary-navigation__menu',
					'fallback_cb'    => false,
				]
			);
			?>

			<a
				class="button button--small primary-navigation__cta"
				href="<?php echo esc_url( home_url( '/free-quote/' ) ); ?>"
			>
				<?php esc_html_e( 'Get a Free Quote', 'australian-stars' ); ?>
			</a>

		</nav>

		<button
			class="nav-backdrop"
			type="button"
			tabindex="-1"
			aria-label="<?php esc_attr_e( 'Close navigation', 'australian-stars' ); ?>"
		></button>

	</div>
</header>