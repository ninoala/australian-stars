<?php
/**
 * Why Choose Us section.
 *
 * Expected image files:
 * - why-choose-us-480.webp
 * - why-choose-us-768.webp
 * - why-choose-us-1024.webp
 * - why-choose-us-1448.webp
 *
 * @package Australian_Stars
 */

$theme_uri = get_template_directory_uri();
$image_uri = $theme_uri . '/assets/images/';
$icon_uri  = $image_uri . 'icons/';
?>

<section
	class="about section section--soft"
	id="about"
	aria-labelledby="about-heading"
>
	<div class="container split-layout">

		<div class="split-layout__media">
			<img
				class="split-layout__image"
				src="<?php echo esc_url(
					$image_uri . 'why-choose-us-1448.webp'
				); ?>"
				srcset="<?php echo esc_url(
					$image_uri . 'why-choose-us-480.webp'
				); ?> 480w,
				<?php echo esc_url(
					$image_uri . 'why-choose-us-768.webp'
				); ?> 768w,
				<?php echo esc_url(
					$image_uri . 'why-choose-us-1024.webp'
				); ?> 1024w,
				<?php echo esc_url(
					$image_uri . 'why-choose-us-1448.webp'
				); ?> 1448w"
				sizes="(max-width: 48rem) calc(100vw - 2.5rem),
					50vw"
				width="1448"
				height="1086"
				alt="<?php esc_attr_e(
					'Bright modern room with spotless windows',
					'australian-stars'
				); ?>"
				loading="lazy"
				decoding="async"
			>
		</div>

		<div class="split-layout__content">

			<p class="section-eyebrow">
				<?php esc_html_e(
					'Why Choose Us',
					'australian-stars'
				); ?>
			</p>

			<h2 id="about-heading">
				<?php esc_html_e(
					'Your Local Sunshine Coast Experts',
					'australian-stars'
				); ?>
			</h2>

			<p class="split-layout__description">
				<?php esc_html_e(
					'We combine attention to detail with friendly, reliable service to deliver exceptional results that brighten your home and enhance your lifestyle.',
					'australian-stars'
				); ?>
			</p>

			<p class="split-layout__description">
				<?php esc_html_e(
					'At Australian Property Stars, we specialise in residential and commercial window cleaning across the Sunshine Coast and Hinterland. We take pride in every job and work hard to deliver outstanding results, backed by our 100% workmanship guarantee.',
					'australian-stars'
				); ?>
			</p>


			<ul class="check-list">

				<li class="check-list__item">
					<span
						class="check-list__icon"
						aria-hidden="true"
					>
						<img
							src="<?php echo esc_url(
								$icon_uri . 'icon-insured.webp'
							); ?>"
							width="48"
							height="48"
							alt=""
							decoding="async"
						>
					</span>

					<span>
						<?php esc_html_e(
							'Experienced & fully insured',
							'australian-stars'
						); ?>
					</span>
				</li>

				<li class="check-list__item">
					<span
						class="check-list__icon"
						aria-hidden="true"
					>
						<img
							src="<?php echo esc_url(
								$icon_uri . 'icon-equipment.webp'
							); ?>"
							width="48"
							height="48"
							alt=""
							decoding="async"
						>
					</span>

					<span>
						<?php esc_html_e(
							'Modern equipment & pure water systems',
							'australian-stars'
						); ?>
					</span>
				</li>

				<li class="check-list__item">
					<span
						class="check-list__icon"
						aria-hidden="true"
					>
						<img
							src="<?php echo esc_url(
								$icon_uri . 'icon-respectful.webp'
							); ?>"
							width="48"
							height="48"
							alt=""
							decoding="async"
						>
					</span>

					<span>
						<?php esc_html_e(
							'Respectful of your home & property',
							'australian-stars'
						); ?>
					</span>
				</li>

				<li class="check-list__item">
					<span
						class="check-list__icon"
						aria-hidden="true"
					>
						<img
							src="<?php echo esc_url(
								$icon_uri . 'icon-local.webp'
							); ?>"
							width="48"
							height="48"
							alt=""
							decoding="async"
						>
					</span>

					<span>
						<?php esc_html_e(
							'Locally owned & operated',
							'australian-stars'
						); ?>
					</span>
				</li>

			</ul>

			<a
				class="button button--primary about__cta"
				href="<?php echo esc_url(
					home_url( '/free-quote/' )
				); ?>"
			>
				<?php esc_html_e(
					'Get a Free Quote',
					'australian-stars'
				); ?>
			</a>

		</div>

	</div>
</section>