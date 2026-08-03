<?php
/**
 * Services section.
 *
 * Expected service image files:
 * - {image}-480.webp
 * - {image}-768.webp
 * - {image}-1024.webp
 *
 * @package Australian_Stars
 */

$image_uri = get_template_directory_uri() . '/assets/images/';

$services = [
	[
		'number'      => '01',
		'title'       => __( 'Window Cleaning', 'australian-stars' ),
		'description' => __( 'Interior and exterior window cleaning for homes, businesses, and everything in between.', 'australian-stars' ),
		'image'       => 'service-window-cleaning',
		'image_alt'   => __( 'Professional cleaning a residential window', 'australian-stars' ),
		'url'         => home_url( '/window-cleaning/' ),
	],
	[
		'number'      => '02',
		'title'       => __( 'Gutter Cleaning', 'australian-stars' ),
		'description' => __( 'Removal of leaves, debris, and blockages to protect your property and prevent costly damage.', 'australian-stars' ),
		'image'       => 'service-gutter-cleaning',
		'image_alt'   => __( 'Professional residential gutter cleaning', 'australian-stars' ),
		'url'         => home_url( '/gutter-cleaning/' ),
	],
	[
		'number'      => '03',
		'title'       => __( 'Pressure Washing', 'australian-stars' ),
		'description' => __( 'Restore driveways, patios, paths, and exterior surfaces with professional high-pressure cleaning.', 'australian-stars' ),
		'image'       => 'service-pressure-washing',
		'image_alt'   => __( 'Professional pressure washing a residential driveway', 'australian-stars' ),
		'url'         => home_url( '/pressure-washing/' ),
	],
];
?>

<section
	class="services section"
	id="services"
	aria-labelledby="services-heading"
>
	<div class="container">

		<header class="section-heading">
			<p class="section-eyebrow">
				<?php esc_html_e(
					'Our Services',
					'australian-stars'
				); ?>
			</p>

			<h2 id="services-heading">
				<?php esc_html_e(
					'Care for Every Surface',
					'australian-stars'
				); ?>
			</h2>
		</header>

		<div class="services__grid">

			<?php foreach ( $services as $service ) : ?>
				<?php
				$image_480 = $image_uri
					. $service['image']
					. '-480.webp';

				$image_768 = $image_uri
					. $service['image']
					. '-768.webp';

				$image_1024 = $image_uri
					. $service['image']
					. '-1024.webp';
				?>

				<article class="service-card">

					<div class="service-card__media">
						<img
							class="service-card__image"
							src="<?php echo esc_url(
								$image_1024
							); ?>"
							srcset="<?php echo esc_url(
								$image_480
							); ?> 480w,
							<?php echo esc_url(
								$image_768
							); ?> 768w,
							<?php echo esc_url(
								$image_1024
							); ?> 1024w"
							sizes="(max-width: 48rem) calc(100vw - 2.5rem),
								(max-width: 64rem) calc(50vw - 2rem),
								33vw"
							width="1024"
							height="768"
							alt="<?php echo esc_attr(
								$service['image_alt']
							); ?>"
							loading="lazy"
							decoding="async"
						>

						<div
							class="service-card__number"
							aria-hidden="true"
						>
							<?php echo esc_html(
								$service['number']
							); ?>
						</div>
					</div>

					<div class="service-card__content">
						<h3 class="service-card__title">
							<?php echo esc_html(
								$service['title']
							); ?>
						</h3>

						<p class="service-card__description">
							<?php echo esc_html(
								$service['description']
							); ?>
						</p>

						<a
							class="service-card__link"
							href="<?php echo esc_url(
								$service['url']
							); ?>"
							aria-label="<?php
								echo esc_attr(
									sprintf(
										/* translators: %s is the service name. */
										__(
											'Learn more about %s',
											'australian-stars'
										),
										$service['title']
									)
								);
							?>"
						>
							<?php esc_html_e(
								'Learn More',
								'australian-stars'
							); ?>

							<span aria-hidden="true">→</span>
						</a>
					</div>

				</article>

			<?php endforeach; ?>

		</div>
	</div>
</section>