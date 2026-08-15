<?php
/**
 * Pressure Washing page.
 *
 * @package Australian_Stars
 */

get_header();

$service = [
	'hero' => [
		'eyebrow' => __(
			'Residential & Commercial Pressure Washing',
			'australian-stars'
		),
		'title' => __(
			'Pressure Washing on the Sunshine Coast',
			'australian-stars'
		),
		'description' => __(
			'Professional pressure washing for homes and businesses across the Sunshine Coast & Hinterland.',
			'australian-stars'
		),
		'image' => [
			'480'  => 'pressure-washing-hero-480.webp',
			'768'  => 'pressure-washing-hero-768.webp',
			'1200' => 'pressure-washing-hero-1200.webp',
			'1600' => 'pressure-washing-hero-1600.webp',
		],
		'alt' => __(
			'Professional pressure washing a driveway outside a modern Sunshine Coast home',
			'australian-stars'
		),
	],

	'introduction' => [
		'eyebrow' => __(
			'Cleaner Surfaces, Stronger First Impressions',
			'australian-stars'
		),
		'title' => __(
			'Pressure Washing That Brings Outdoor Areas Back to Life',
			'australian-stars'
		),
		'paragraphs' => [
			__(
				'Outdoor surfaces are constantly exposed to dirt, rain, dust, leaves, traffic, and changing weather conditions. Over time, driveways, pathways, patios, and other exterior areas can begin to look dull, stained, and neglected, even when the rest of the property is well maintained.',
				'australian-stars'
			),
			__(
				'The warm and humid Sunshine Coast climate can also encourage the build-up of mould, mildew, algae, and grime. Professional pressure washing helps remove this surface build-up, refresh the appearance of your property, and create cleaner, more welcoming outdoor spaces.',
				'australian-stars'
			),
			__(
				'Australian Property Stars uses professional equipment and cleaning methods suited to each surface being treated.',
				'australian-stars'
			),
		],
	],

	'inclusions_heading' => [
		'eyebrow' => __(
			'What’s Included',
			'australian-stars'
		),
		'title' => __(
			'A Thorough Exterior Surface Cleaning Service',
			'australian-stars'
		),
	],

	'inclusions' => [
		[
			'title' => __(
				'Driveways and Pathways',
				'australian-stars'
			),
			'text' => __(
				'Professional cleaning helps remove surface dirt, grime, stains, and weather-related build-up from driveways and paths.',
				'australian-stars'
			),
		],
		[
			'title' => __(
				'Patios and Outdoor Areas',
				'australian-stars'
			),
			'text' => __(
				'Patios, courtyards, and other outdoor living areas are cleaned to create a fresher and more inviting space.',
				'australian-stars'
			),
		],
		[
			'title' => __(
				'Careful Surface Treatment',
				'australian-stars'
			),
			'text' => __(
				'The cleaning approach is adjusted to suit the condition and material of the surface being treated.',
				'australian-stars'
			),
		],
	],

	'benefits_heading' => [
		'eyebrow' => __(
			'Why Pressure Wash Your Property?',
			'australian-stars'
		),
		'title' => __(
			'A Simple Way to Refresh and Maintain Outdoor Areas',
			'australian-stars'
		),
	],

	'benefits' => [
		__(
			'Improves the overall appearance of your property',
			'australian-stars'
		),
		__(
			'Removes built-up dirt, grime, mould, and algae',
			'australian-stars'
		),
		__(
			'Refreshes driveways, pathways, and outdoor areas',
			'australian-stars'
		),
		__(
			'Creates cleaner and more welcoming exterior spaces',
			'australian-stars'
		),
		__(
			'Saves you the time and effort of cleaning it yourself',
			'australian-stars'
		),
		__(
			'Uses professional equipment for consistent results',
			'australian-stars'
		),
	],

	'cta' => [
		'eyebrow' => __(
			'Ready to refresh your outdoor areas?',
			'australian-stars'
		),
		'title' => __(
			'Give Your Property a Cleaner, Brighter Finish',
			'australian-stars'
		),
		'text' => __(
			'Request your free, no-obligation pressure washing quote today.',
			'australian-stars'
		),
	],
];

get_template_part(
	'template-parts/service/service-page',
	null,
	[ 'service' => $service ]
);

get_footer();