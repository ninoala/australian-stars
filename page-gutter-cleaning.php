<?php
/**
 * Gutter Cleaning page.
 *
 * @package Australian_Stars
 */

get_header();

$service = [
	'hero' => [
		'eyebrow' => __(
			'Professional Gutter Cleaning',
			'australian-stars'
		),
		'title' => __(
			'Protect Your Property With Clean, Free-Flowing Gutters',
			'australian-stars'
		),
		'description' => __(
			'Professional gutter cleaning for homes and businesses across the Sunshine Coast.',
			'australian-stars'
		),
		'image' => [
			'480'  => 'gutter-cleaning-hero-480.webp',
			'768'  => 'gutter-cleaning-hero-768.webp',
			'1200' => 'gutter-cleaning-hero-1200.webp',
			'1600' => 'gutter-cleaning-hero-1600.webp',
		],
		'alt' => __(
			'Professional gutter cleaner removing leaves from a Sunshine Coast home',
			'australian-stars'
		),
	],

	'introduction' => [
		'eyebrow' => __(
			'Clear Gutters, Better Protection',
			'australian-stars'
		),
		'title' => __(
			'Gutter Cleaning That Helps Prevent Costly Problems',
			'australian-stars'
		),
		'paragraphs' => [
			__(
				'Gutters play an important role in directing rainwater away from your roof, walls, and foundations. When they become blocked with leaves, dirt, twigs, and other debris, water can overflow and collect in places where it may cause staining, moisture damage, and unnecessary wear around your property.',
				'australian-stars'
			),
			__(
				'The Sunshine Coast climate can cause gutters to fill quickly, particularly around properties surrounded by trees or exposed to regular wind and storms. Routine professional cleaning helps keep water moving freely and reduces the chance of blocked gutters becoming a larger and more expensive problem.',
				'australian-stars'
			),
			__(
				'Australian Property Stars provides careful gutter cleaning for homes and businesses across the Sunshine Coast. We remove built-up debris, check accessible drainage areas, and leave the immediate work area tidy so your guttering can continue doing its job properly.',
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
			'A Thorough Gutter Cleaning Service',
			'australian-stars'
		),
	],

	'inclusions' => [
		[
			'title' => __(
				'Leaves and Debris Removed',
				'australian-stars'
			),
			'text' => __(
				'Leaves, twigs, dirt, and other loose debris are carefully removed from accessible guttering.',
				'australian-stars'
			),
		],
		[
			'title' => __(
				'Drainage Areas Checked',
				'australian-stars'
			),
			'text' => __(
				'Accessible downpipe openings and drainage areas are checked to help rainwater move away from the roofline.',
				'australian-stars'
			),
		],
		[
			'title' => __(
				'Work Area Left Tidy',
				'australian-stars'
			),
			'text' => __(
				'Removed debris is collected and the immediate area is left clean and tidy when the work is complete.',
				'australian-stars'
			),
		],
	],

	'benefits_heading' => [
		'eyebrow' => __(
			'Why Clean Your Gutters?',
			'australian-stars'
		),
		'title' => __(
			'Simple Maintenance That Helps Protect Your Property',
			'australian-stars'
		),
	],

	'benefits' => [
		__(
			'Helps reduce gutter overflow during heavy rain',
			'australian-stars'
		),
		__(
			'Supports proper drainage away from your property',
			'australian-stars'
		),
		__(
			'Helps protect roof edges, walls, and foundations',
			'australian-stars'
		),
		__(
			'Saves you the time and risk of doing it yourself',
			'australian-stars'
		),
		__(
			'Removes leaves, dirt, twigs, and organic build-up',
			'australian-stars'
		),
		__(
			'Keeps gutters and surrounding areas looking tidier',
			'australian-stars'
		),
	],

	'cta' => [
		'eyebrow' => __(
			'Are your gutters due for a clean?',
			'australian-stars'
		),
		'title' => __(
			'Keep Rainwater Moving in the Right Direction',
			'australian-stars'
		),
		'text' => __(
			'Request your free, no-obligation gutter cleaning quote today.',
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