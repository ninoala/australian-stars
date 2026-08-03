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
            'Exterior Window Cleaning',
            'australian-stars'
        ),
        'title' => __(
            'Brighter Views Start With Cleaner Windows',
            'australian-stars'
        ),
        'description' => __(
            'Professional exterior window cleaning for homes and businesses across the Sunshine Coast.',
            'australian-stars'
        ),
        'image' => [
            '480'  => 'window-cleaning-hero-480.webp',
            '768'  => 'window-cleaning-hero-768.webp',
            '1200' => 'window-cleaning-hero-1200.webp',
            '1600' => 'window-cleaning-hero-1600.webp',
        ],
        'alt' => __(
            'Professional exterior window cleaner working on a modern Sunshine Coast home',
            'australian-stars'
        ),
    ],

	'introduction' => [
		'eyebrow' => __(
			'Clearer Views, Professional Care',
			'australian-stars'
		),
		'title'   => __(
			'Exterior Window Cleaning That Makes a Difference',
			'australian-stars'
		),
		'paragraphs' => [
			__(
				'Clean windows can completely change the appearance of your property. Australian Property Stars provides professional exterior window cleaning for homes and businesses across the Sunshine Coast, helping remove dust, salt, dirt, water marks, cobwebs, and everyday weather-related build-up.',
				'australian-stars'
			),

            __(
				'The Sunshine Coast environment can leave exterior glass looking dull surprisingly quickly. Coastal air, rain, insects, and airborne debris can all affect the clarity of your windows and gradually build up around frames and sills. Regular professional cleaning helps restore a brighter, clearer finish while improving the overall presentation of your property.',
				'australian-stars'
			),

            
			__(
				'We use professional equipment and careful cleaning methods to deliver a clear, streak-free finish while treating your home, landscaping, and surrounding property with respect.',
				'australian-stars'
			),
		],
	],

	'inclusions' => [
		[
			'title' => __(
				'Exterior Glass Cleaning',
				'australian-stars'
			),
			'text'  => __(
				'Professional cleaning for exterior glass affected by dust, salt, dirt, and weather-related build-up.',
				'australian-stars'
			),
		],
		[
			'title' => __(
				'Exterior Frames & Sills',
				'australian-stars'
			),
			'text'  => __(
				'Careful attention to exterior frames and sills where dirt and debris commonly collect.',
				'australian-stars'
			),
		],
		[
			'title' => __(
				'Hard-to-Reach Windows',
				'australian-stars'
			),
			'text'  => __(
				'Professional equipment allows us to clean many elevated and difficult-to-reach windows safely.',
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
			'A clean, streak-free exterior finish',
			'australian-stars'
		),
		__(
			'Professional access to high and difficult windows',
			'australian-stars'
		),
		__(
			'Less time, effort, and risk for you',
			'australian-stars'
		),
		__(
			'Careful service around your home and landscaping',
			'australian-stars'
		),
		__(
			'Removal of salt, dust, dirt, and weather build-up',
			'australian-stars'
		),
	],

	'cta' => [
		'eyebrow' => __(
			'Ready for a clearer view?',
			'australian-stars'
		),
		'title'   => __(
			'Let’s Make Your Windows Shine',
			'australian-stars'
		),
		'text'    => __(
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