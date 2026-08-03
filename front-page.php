<?php
/**
 * Front page template.
 *
 * @package Australian_Stars
 */

get_header();
?>

<main id="main-content">
	<?php
	get_template_part(
		'template-parts/sections/hero',
		null,
		[
			'eyebrow' => __(
				'Crystal Clear. Every Time.',
				'australian-stars'
			),

			'title' => sprintf(
				'%1$s <span class="hero__title-line">%2$s <span class="hero__title-accent">%3$s</span></span>',
				esc_html__(
					'Window Cleaning',
					'australian-stars'
				),
				esc_html__(
					'on the',
					'australian-stars'
				),
				esc_html__(
					'Sunshine Coast',
					'australian-stars'
				)
			),

			'description' => __(
				'Professional care for your home or property, delivering sparkling results you can see and trust.',
				'australian-stars'
			),

			'image' => 'hero-home',

			'image_alt' => __(
				'Bright coastal home with clean windows',
				'australian-stars'
			),

			'image_width'  => 1672,
			'image_height' => 941,

			'button_label' => __(
				'Get Your Free Quote',
				'australian-stars'
			),

			'button_url' => home_url( '/free-quote/' ),
		]
	);
	?>

	<?php get_template_part( 'template-parts/sections/trust-strip' ); ?>
	<?php get_template_part( 'template-parts/sections/services' ); ?>
	<?php get_template_part( 'template-parts/sections/about' ); ?>
	<?php get_template_part( 'template-parts/sections/process' ); ?>
	<?php get_template_part( 'template-parts/sections/testimonials' ); ?>

</main>

<?php get_footer(); ?>