<?php
/**
 * Testimonials section.
 *
 * @package Australian_Stars
 */

$testimonials = [
	[
		'quote' => 'Just had my windows cleaned by Shaun and he did a fantastic job. Friendly service and great results.',
		'name'  => 'Ashlea Kellner',
		'date'  => '13/08/2021',
		'url'   => '',
	],
	[
		'quote' => 'Had our windows cleaned today. Very thorough job and excellent results. Highly recommended.',
		'name'  => 'Nicky Young',
		'date'  => '25/05/2021',
		'url'   => '',
	],
	[
		'quote' => 'Vasily just did our two storey home and did an amazing job. Very happy with the result.',
		'name'  => 'Jim Di Pietra',
		'date'  => '20/11/2022',
		'url'   => '',
	],
	[
		'quote' => 'Vasily arrived on time, very friendly and thorough. Excellent service and beautifully clean windows.',
		'name'  => 'Beverly Murphy',
		'date'  => '15/06/2022',
		'url'   => '',
	],
	[
		'quote' => 'Very happy with our house and window clean. Very reliable and a great result.',
		'name'  => 'Carmen Rooke',
		'date'  => '20/12/2021',
		'url'   => '',
	],
	[
		'quote' => 'A job well done. Many windows to clean and everything was completed with care and attention.',
		'name'  => 'Helen Horne',
		'date'  => '17/02/2021',
		'url'   => '',
	],
	[
		'quote' => 'Fantastic service. Vasily is very professional, efficient, and easy to deal with.',
		'name'  => 'Marie Engel-Caves',
		'date'  => '12/02/2024',
		'url'   => '',
	],
	[
		'quote' => 'Vasily did an amazing job at our place. He was professional and the result looked great.',
		'name'  => 'Esha G Sharma',
		'date'  => '08/06/2023',
		'url'   => '',
	],
];
?>

<section
	class="testimonials section section--soft"
	id="reviews"
	aria-labelledby="testimonials-heading"
>
	<div class="container">
		<div class="section-heading">
			<p class="section-eyebrow">
				<?php esc_html_e( 'What Our Customers Say', 'australian-stars' ); ?>
			</p>

			<h2 id="testimonials-heading">
				<?php esc_html_e( 'Trusted by Locals', 'australian-stars' ); ?>
			</h2>
		</div>

		<div
			class="testimonials-slider"
			data-testimonials-slider
		>
			<button
				class="testimonials-slider__button testimonials-slider__button--prev"
				type="button"
				aria-label="<?php esc_attr_e( 'Previous testimonials', 'australian-stars' ); ?>"
				data-slider-prev
			>
				<span aria-hidden="true">←</span>
			</button>

			<div class="testimonials-slider__viewport" data-slider-viewport>
				<div class="testimonials-slider__track" data-slider-track>
					<?php foreach ( $testimonials as $testimonial ) : ?>
						<article class="testimonial-card">
							<div class="testimonial-card__stars" aria-hidden="true">
								<span>★</span>
								<span>★</span>
								<span>★</span>
								<span>★</span>
								<span>★</span>
							</div>

							<blockquote class="testimonial-card__quote">
								<p>
									“<?php echo esc_html( $testimonial['quote'] ); ?>”
								</p>
							</blockquote>

							<footer class="testimonial-card__footer">
								<strong class="testimonial-card__name">
									<?php echo esc_html( $testimonial['name'] ); ?>
								</strong>

								<span class="testimonial-card__date">
									<?php echo esc_html( $testimonial['date'] ); ?>
								</span>

								<?php if ( ! empty( $testimonial['url'] ) ) : ?>
									<a
										class="testimonial-card__link"
										href="<?php echo esc_url( $testimonial['url'] ); ?>"
										target="_blank"
										rel="noopener noreferrer"
									>
										<?php esc_html_e( 'Read full review', 'australian-stars' ); ?>
									</a>
								<?php endif; ?>
							</footer>
						</article>
					<?php endforeach; ?>
				</div>
			</div>

			<button
				class="testimonials-slider__button testimonials-slider__button--next"
				type="button"
				aria-label="<?php esc_attr_e( 'Next testimonials', 'australian-stars' ); ?>"
				data-slider-next
			>
				<span aria-hidden="true">→</span>
			</button>
		</div>

		<div class="testimonials-slider__dots" data-slider-dots></div>
	</div>

	<div class="testimonials__cta-banner">

	<div class="testimonials__cta-content">

		<p class="testimonials__cta-eyebrow">
			<?php
			esc_html_e(
				'Ready for sparkling results?',
				'australian-stars'
			);
			?>
		</p>

		<h3>
			<?php
			esc_html_e(
				'Let’s make your property shine.',
				'australian-stars'
			);
			?>
		</h3>

		<p class="testimonials__cta-description">
			<?php
			esc_html_e(
				'Get in touch today for a free, no-obligation quote.',
				'australian-stars'
			);
			?>
		</p>

		</div>

			<a
				class="testimonials__cta-button"
				href="<?php echo esc_url( home_url( '/free-quote/' ) ); ?>"
			>
				<?php
				esc_html_e(
					'Get Your Free Quote',
					'australian-stars'
				);
				?>
			</a>

	</div>
</section>