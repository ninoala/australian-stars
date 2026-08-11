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
		'label' => __( 'Gutter Cleaning', 'australian-stars' ),
		'url'   => home_url( '/gutter-cleaning/' ),
	],
	[
		'label' => __( 'Pressure Washing', 'australian-stars' ),
		'url'   => home_url( '/pressure-washing/' ),
	],
	[
		'label' => __( 'Reviews', 'australian-stars' ),
		'url'   => home_url( '/#reviews' ),
	],
	[
		'label' => __( 'Blog', 'australian-stars' ),
		'url'   => home_url( '/blog/' ),
	],
	[
		'label' => __( 'Free Quote', 'australian-stars' ),
		'url'   => home_url( '/free-quote/' ),
	],
];

$phone_display = '0436 341 757';
$phone_link    = '+61436341757';
$email         = 'vasily@auspropertystars.com';
$location      = __( 'Palmview, Queensland, Australia', 'australian-stars' );

$whatsapp_number = '61436341757';

$whatsapp_url = 'https://wa.me/' . $whatsapp_number
	. '?text='
	. rawurlencode(
		'Hi Australian Property Stars, I would like to get a free quote.'
	);
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
					'Professional window cleaning, gutter cleaning and pressure washing across the Sunshine Coast & Hinterland.',
					'australian-stars'
				);
				?>
			</p>

		</div>

		<nav
			class="site-footer__column"
			aria-labelledby="footer-quick-links"
		>
			<h2
				class="site-footer__heading"
				id="footer-quick-links"
			>
				<?php
				esc_html_e(
					'Quick Links',
					'australian-stars'
				);
				?>
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
				<?php
				esc_html_e(
					'Get in Touch',
					'australian-stars'
				);
				?>
			</h2>

			<ul class="site-footer__contact">

				<li>
					<a href="<?php echo esc_url( 'tel:' . $phone_link ); ?>">
						<?php echo esc_html( $phone_display ); ?>
					</a>
				</li>

				<li>
					<a href="<?php echo esc_url( 'mailto:' . $email ); ?>">
						<?php echo esc_html( antispambot( $email ) ); ?>
					</a>
				</li>

				<li class="site-footer__contact-whatsapp">

					<span
						class="site-footer__whatsapp-icon"
						aria-hidden="true"
					></span>

					<a
						href="<?php echo esc_url( $whatsapp_url ); ?>"
						target="_blank"
						rel="noopener noreferrer"
					>
						<?php
						esc_html_e(
							'Message us on WhatsApp',
							'australian-stars'
						);
						?>
					</a>

				</li>

				<li>
					<span>
						<?php echo esc_html( $location ); ?>
					</span>
				</li>

			</ul>

		</div>

		<div class="site-footer__column">

			<h2 class="site-footer__heading">
				<?php
				esc_html_e(
					'Hours',
					'australian-stars'
				);
				?>
			</h2>

			<div class="site-footer__hours">

				<p>
					<strong>
						<?php
						esc_html_e(
							'Monday – Saturday',
							'australian-stars'
						);
						?>
					</strong>

					<span>
						<?php
						esc_html_e(
							'7AM – 7PM',
							'australian-stars'
						);
						?>
					</span>
				</p>

				<p>
					<strong>
						<?php
						esc_html_e(
							'Sunday',
							'australian-stars'
						);
						?>
					</strong>

					<span>
						<?php
						esc_html_e(
							'9AM – 12PM',
							'australian-stars'
						);
						?>
					</span>
				</p>

			</div>

		</div>

	</div>

	<div class="container site-footer__bottom">

		<p>
			&copy;
			<?php echo esc_html( wp_date( 'Y' ) ); ?>

			<?php
			esc_html_e(
				'All rights reserved.',
				'australian-stars'
			);
			?>
		</p>

		<p class="site-footer__credit">

			<?php
			esc_html_e(
				'Website by',
				'australian-stars'
			);
			?>

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