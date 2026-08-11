<?php
/**
 * Service areas section.
 *
 * @package Australian_Stars
 */

$service_areas = [
	'Caloundra',
	'Mooloolaba',
	'Maroochydore',
	'Marcoola',
	'Coolum',
	'Sunshine Beach',
	'Noosa Heads',
	'Gympie',
	'Eumundi',
	'Yandina',
	'Nambour',
	'Mapleton',
	'Montville',
	'Maleny',
];

?>

<section
	class="service-areas"
	aria-labelledby="service-areas-title"
>
	<div class="container service-areas__inner">

		<div class="service-areas__header">

			<p class="section-eyebrow">
				<?php esc_html_e( 'Areas We Service', 'australian-stars' ); ?>
			</p>

			<h2
				class="service-areas__title"
				id="service-areas-title"
			>
				<?php
				esc_html_e(
					'Proudly serving the Sunshine Coast & Hinterland',
					'australian-stars'
				);
				?>
			</h2>

			<p class="service-areas__description">
				<?php
				esc_html_e(
					'We provide professional window cleaning, gutter cleaning and pressure washing across the Sunshine Coast, Hinterland and surrounding areas.',
					'australian-stars'
				);
				?>
			</p>

		</div>

		<ul
			class="service-areas__list"
			aria-label="<?php esc_attr_e( 'Service areas', 'australian-stars' ); ?>"
		>
			<?php foreach ( $service_areas as $area ) : ?>

				<li class="service-areas__item">
					<span
						class="service-areas__marker"
						aria-hidden="true"
					></span>

					<span>
						<?php echo esc_html( $area ); ?>
					</span>
				</li>

			<?php endforeach; ?>
		</ul>

	</div>
</section>