<?php
/**
 * Window Cleaning page.
 *
 * @package Australian_Stars
 */

get_header();

$service = [
	'hero' => [
		'eyebrow' => __(
			'Interior & Exterior Window Cleaning',
			'australian-stars'
		),
		'title' => __(
			'Brighter Views Start With Cleaner Windows',
			'australian-stars'
		),
		'description' => __(
			'Professional interior and exterior window cleaning for homes and businesses across the Sunshine Coast & Hinterland.',
			'australian-stars'
		),
		'image' => [
			'480'  => 'window-cleaning-hero-480.webp',
			'768'  => 'window-cleaning-hero-768.webp',
			'1200' => 'window-cleaning-hero-1200.webp',
			'1600' => 'window-cleaning-hero-1600.webp',
		],
		'alt' => __(
			'Professional window cleaner working on a modern Sunshine Coast home',
			'australian-stars'
		),
	],

	'introduction' => [
		'eyebrow' => __(
			'Clearer Views, Professional Care',
			'australian-stars'
		),
		'title' => __(
			'Complete Window Cleaning Inside & Out',
			'australian-stars'
		),
		'paragraphs' => [
			__(
				'Clean windows can completely change the appearance and feel of your property. Australian Property Stars provides professional interior and exterior window cleaning for homes and businesses across the Sunshine Coast and Hinterland, helping remove dust, salt, dirt, fingerprints, water marks, cobwebs and everyday build-up.',
				'australian-stars'
			),

			__(
				'The Sunshine Coast environment can leave exterior glass looking dull surprisingly quickly, while fingerprints, dust and everyday household activity can affect the inside. Coastal air, rain, insects and airborne debris can also build up around frames, tracks, sills and screens.',
				'australian-stars'
			),

			__(
				'Whether you need exterior-only cleaning or a complete interior and exterior service, we use professional equipment and careful cleaning methods to deliver a clear, streak-free finish while treating your home, business and surrounding property with respect.',
				'australian-stars'
			),
		],
	],

	'inclusions' => [
		[
			'title' => __(
				'Interior & Exterior Glass',
				'australian-stars'
			),
			'text' => __(
				'Professional cleaning of interior and exterior glass for a clearer, streak-free finish throughout your property.',
				'australian-stars'
			),
		],
		[
			'title' => __(
				'Tracks, Sills & Screens',
				'australian-stars'
			),
			'text' => __(
				'Complete window cleaning can include tracks, sills and screens where dust, dirt and debris commonly collect.',
				'australian-stars'
			),
		],
		[
			'title' => __(
				'Hard-to-Reach Windows',
				'australian-stars'
			),
			'text' => __(
				'Professional equipment allows us to clean many elevated and difficult-to-reach windows safely and efficiently.',
				'australian-stars'
			),
		],
	],

	'benefits' => [
		__(
			'Clearer views and more natural light',
			'australian-stars'
		),
		__(
			'Interior and exterior cleaning available',
			'australian-stars'
		),
		__(
			'Tracks, sills and screens can be included',
			'australian-stars'
		),
		__(
			'Professional access to high and difficult windows',
			'australian-stars'
		),
		__(
			'Less time, effort and risk for you',
			'australian-stars'
		),
		__(
			'Removal of salt, dust, dirt and everyday build-up',
			'australian-stars'
		),
	],

	'cta' => [
		'eyebrow' => __(
			'Ready for a clearer view?',
			'australian-stars'
		),
		'title' => __(
			'Let’s Make Your Windows Shine',
			'australian-stars'
		),
		'text' => __(
			'Request your free, no-obligation window cleaning quote today.',
			'australian-stars'
		),
	],
];

get_template_part(
	'template-parts/service/service-page',
	null,
	[
		'service' => $service,
	]
);

get_footer();