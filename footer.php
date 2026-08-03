<?php
/**
 * Site footer.
 *
 * @package Australian_Stars
 */

$quick_links = [
	[
		'label' => __( 'Home', 'australian-stars' ),
		'url'   => home_url( '/' ),
	],
	[
		'label' => __( 'Window Cleaning', 'australian-stars' ),
		'url'   => home_url( '/window-cleaning/' ),
	],
	[
		'label' => __( 'Other Services', 'australian-stars' ),
		'url'   => home_url( '/services/' ),
	],
	[
		'label' => __( 'Reviews', 'australian-stars' ),
		'url'   => home_url( '/#testimonials' ),
	],
	[
		'label' => __( 'Free Quote', 'australian-stars' ),
		'url'   => home_url( '/#contact' ),
	],
];

$service_areas = [
	__( 'Caloundra', 'australian-stars' ),
	__( 'Mooloolaba', 'australian-stars' ),
	__( 'Maroochydore', 'australian-stars' ),
	__( 'Coolum', 'australian-stars' ),
	__( 'Sunshine Beach', 'australian-stars' ),
	__( 'Noosa Heads & More', 'australian-stars' ),
];

$phone_display = '0436 341 757';
$phone_link    = '+61436341757';
$email         = 'info@australianpropertystars.com.au';
$location      = __( 'Palmview, Queensland, Australia', 'australian-stars' );

$facebook_url  = get_theme_mod( 'facebook_url' );
$instagram_url = get_theme_mod( 'instagram_url' );
?>

<footer class="site-footer">

	<div class="container site-footer__top">

		<div class="site-footer__brand">

			<div class="site-footer__logo">
				<?php if ( has_custom_logo() ) : ?>

					<?php the_custom_logo(); ?>

				<?php else : ?>

					<a href="<?php echo esc_url( home_url( '/' ) ); ?>">
						<?php echo esc_html( get_bloginfo( 'name' ) ); ?>
					</a>

				<?php endif; ?>
			</div>

			<p class="site-footer__tagline">
				<?php
				esc_html_e(
					'Professional window, gutter and solar panel cleaning across the Sunshine Coast.',
					'australian-stars'
				);
				?>
			</p>

			<?php if ( $facebook_url || $instagram_url ) : ?>

				<div class="site-footer__socials">

					<?php if ( $facebook_url ) : ?>
						<a
							href="<?php echo esc_url( $facebook_url ); ?>"
							target="_blank"
							rel="noopener noreferrer"
							aria-label="<?php esc_attr_e(
								'Visit Australian Property Stars on Facebook',
								'australian-stars'
							); ?>"
						>
							<i
								class="fa-brands fa-facebook-f"
								aria-hidden="true"
							></i>
						</a>
					<?php endif; ?>

					<?php if ( $instagram_url ) : ?>
						<a
							href="<?php echo esc_url( $instagram_url ); ?>"
							target="_blank"
							rel="noopener noreferrer"
							aria-label="<?php esc_attr_e(
								'Visit Australian Property Stars on Instagram',
								'australian-stars'
							); ?>"
						>
							<i
								class="fa-brands fa-instagram"
								aria-hidden="true"
							></i>
						</a>
					<?php endif; ?>

				</div>

			<?php endif; ?>

		</div>

		<nav
			class="site-footer__column"
			aria-labelledby="footer-quick-links"
		>
			<h2
				class="site-footer__heading"
				id="footer-quick-links"
			>
				<?php esc_html_e(
					'Quick Links',
					'australian-stars'
				); ?>
			</h2>

			<ul class="site-footer__links">
				<?php foreach ( $quick_links as $link ) : ?>
					<li>
						<a href="<?php echo esc_url( $link['url'] ); ?>">
							<?php echo esc_html( $link['label'] ); ?>
						</a>
					</li>
				<?php endforeach; ?>
			</ul>
		</nav>

		<div class="site-footer__column">
			<h2 class="site-footer__heading">
				<?php esc_html_e(
					'Service Areas',
					'australian-stars'
				); ?>
			</h2>

			<ul class="site-footer__links">
				<?php foreach ( $service_areas as $service_area ) : ?>
					<li>
						<?php echo esc_html( $service_area ); ?>
					</li>
				<?php endforeach; ?>
			</ul>
		</div>

		<div class="site-footer__column">
            <h2 class="site-footer__heading site-footer__contact-heading">
				<?php esc_html_e(
					'Get in Touch',
					'australian-stars'
				); ?>
			</h2>

			<ul class="site-footer__contact">

				<li>
					<i
						class="fa-solid fa-phone"
						aria-hidden="true"
					></i>

					<a href="<?php echo esc_url( 'tel:' . $phone_link ); ?>">
						<?php echo esc_html( $phone_display ); ?>
					</a>
				</li>

				<li>
					<i
						class="fa-regular fa-envelope"
						aria-hidden="true"
					></i>

					<a href="<?php echo esc_url( 'mailto:' . $email ); ?>">
						<?php echo esc_html( antispambot( $email ) ); ?>
					</a>
				</li>

				<li>
					<i
						class="fa-solid fa-location-dot"
						aria-hidden="true"
					></i>

					<span>
						<?php echo esc_html( $location ); ?>
					</span>
				</li>

			</ul>
		</div>

	</div>

	<div class="container site-footer__bottom">

		<p>
			&copy;
			<?php echo esc_html( wp_date( 'Y' ) ); ?>
			<?php esc_html_e(
				'All rights reserved.',
				'australian-stars'
			); ?>
		</p>

		<p class="site-footer__credit">
			<?php esc_html_e(
				'Website by',
				'australian-stars'
			); ?>

			<a
				href="https://ninoweb.net"
				target="_blank"
				rel="noopener noreferrer"
			>
				NinoWeb
			</a>
		</p>

	</div>

</footer>

<?php wp_footer(); ?>

</body>
</html>