<?php
/**
 * Enqueue theme assets.
 *
 * @package Australian_Property_Stars
 */

if ( ! defined( 'ABSPATH' ) ) {
	exit;
}

/**
 * Enqueue stylesheets and scripts.
 */

function australian_stars_enqueue_assets(): void {
	$style_path = get_stylesheet_directory()
		. '/style.css';

	$script_path = get_template_directory()
		. '/assets/js/main.js';

	wp_enqueue_style(
		'australian-stars-style',
		get_stylesheet_uri(),
		[],
		file_exists( $style_path )
			? (string) filemtime( $style_path )
			: null
	);

	wp_enqueue_script(
		'australian-stars-main',
		get_template_directory_uri()
			. '/assets/js/main.js',
		[],
		file_exists( $script_path )
			? (string) filemtime( $script_path )
			: null,
		true
	);
}

add_action(
	'wp_enqueue_scripts',
	'australian_stars_enqueue_assets'
);

function australian_stars_preload_font(): void {
	$font_uri = get_template_directory_uri()
		. '/assets/fonts/poppins-latin-400-normal.woff2';
	?>
	<link
		rel="preload"
		href="<?php echo esc_url( $font_uri ); ?>"
		as="font"
		type="font/woff2"
		crossorigin
	>
	<?php
}

add_action(
	'wp_head',
	'australian_stars_preload_font',
	1
);

/**
 * Disable WordPress emoji assets on the public site.
 */
function australian_stars_disable_emojis(): void {
	remove_action(
		'wp_head',
		'print_emoji_detection_script',
		7
	);

	remove_action(
		'wp_print_styles',
		'print_emoji_styles'
	);
}

add_action(
	'init',
	'australian_stars_disable_emojis'
);

/**
 * Return the visitor to the Free Quote page with a form status.
 *
 * @param string $status Form submission status.
 */
function australian_stars_quote_redirect( $status ) {
	$fallback_url = home_url( '/free-quote/' );
	$return_url   = wp_get_referer();

	if ( ! $return_url ) {
		$return_url = $fallback_url;
	}

	$return_url = wp_validate_redirect(
		$return_url,
		$fallback_url
	);

	$return_url = remove_query_arg(
		'quote-status',
		$return_url
	);

	$return_url = add_query_arg(
		'quote-status',
		sanitize_key( $status ),
		$return_url
	);

	wp_safe_redirect( $return_url . '#quote-form' );
	exit;
}


/**
 * Process Free Quote form submissions.
 */
function australian_stars_handle_quote_form() {
	if (
		! isset( $_SERVER['REQUEST_METHOD'] ) ||
		'POST' !== strtoupper(
			sanitize_text_field(
				wp_unslash( $_SERVER['REQUEST_METHOD'] )
			)
		)
	) {
		australian_stars_quote_redirect( 'error' );
	}

	if (
		! isset( $_POST['australian_stars_quote_nonce'] ) ||
		! wp_verify_nonce(
			sanitize_text_field(
				wp_unslash(
					$_POST['australian_stars_quote_nonce']
				)
			),
			'australian_stars_quote_form'
		)
	) {
		australian_stars_quote_redirect( 'error' );
	}

	/*
	 * Honeypot field.
	 *
	 * Pretend the submission succeeded so automated bots do not
	 * learn that the spam trap caught them.
	 */
	$honeypot = isset( $_POST['company_website'] )
		? sanitize_text_field(
			wp_unslash( $_POST['company_website'] )
		)
		: '';

	if ( ! empty( $honeypot ) ) {
		australian_stars_quote_redirect( 'success' );
	}

	$name = isset( $_POST['quote_name'] )
		? sanitize_text_field(
			wp_unslash( $_POST['quote_name'] )
		)
		: '';

	$phone = isset( $_POST['quote_phone'] )
		? sanitize_text_field(
			wp_unslash( $_POST['quote_phone'] )
		)
		: '';

	$email = isset( $_POST['quote_email'] )
		? sanitize_email(
			wp_unslash( $_POST['quote_email'] )
		)
		: '';

	$suburb = isset( $_POST['quote_suburb'] )
		? sanitize_text_field(
			wp_unslash( $_POST['quote_suburb'] )
		)
		: '';

	$service = isset( $_POST['quote_service'] )
		? sanitize_key(
			wp_unslash( $_POST['quote_service'] )
		)
		: '';

	$address = isset( $_POST['quote_address'] )
		? sanitize_text_field(
			wp_unslash( $_POST['quote_address'] )
		)
		: '';

	$message = isset( $_POST['quote_message'] )
		? sanitize_textarea_field(
			wp_unslash( $_POST['quote_message'] )
		)
		: '';

	$services = [
		'window-cleaning'   => __(
			'Window Cleaning',
			'australian-stars'
		),
		'gutter-cleaning'   => __(
			'Gutter Cleaning',
			'australian-stars'
		),
		'pressure-washing'  => __(
			'Pressure Washing',
			'australian-stars'
		),
		'multiple-services' => __(
			'Multiple Services',
			'australian-stars'
		),
		'something-else'    => __(
			'Something Else',
			'australian-stars'
		),
	];

	if (
		empty( $name ) ||
		empty( $phone ) ||
		empty( $email ) ||
		empty( $service ) ||
		! is_email( $email ) ||
		! isset( $services[ $service ] )
	) {
		australian_stars_quote_redirect( 'invalid' );
	}

	/*
	 * Basic submission rate limiting.
	 */
	$visitor_ip = isset( $_SERVER['REMOTE_ADDR'] )
		? sanitize_text_field(
			wp_unslash( $_SERVER['REMOTE_ADDR'] )
		)
		: 'unknown';

	$rate_limit_key = 'aps_quote_' . hash(
		'sha256',
		$visitor_ip
	);

	if ( get_transient( $rate_limit_key ) ) {
		australian_stars_quote_redirect( 'rate-limited' );
	}

	set_transient(
		$rate_limit_key,
		true,
		45
	);

	$recipient = get_option( 'admin_email' );

	$subject = sprintf(
		/* translators: %s is the customer's name. */
		__( 'New quote request from %s', 'australian-stars' ),
		$name
	);

	$email_body = implode(
		"\n",
		[
			__( 'New Free Quote Request', 'australian-stars' ),
			'',
			sprintf(
				/* translators: %s is the customer's name. */
				__( 'Name: %s', 'australian-stars' ),
				$name
			),
			sprintf(
				/* translators: %s is the customer's phone number. */
				__( 'Phone: %s', 'australian-stars' ),
				$phone
			),
			sprintf(
				/* translators: %s is the customer's email address. */
				__( 'Email: %s', 'australian-stars' ),
				$email
			),
			sprintf(
				/* translators: %s is the requested service. */
				__( 'Service: %s', 'australian-stars' ),
				$services[ $service ]
			),
			sprintf(
				/* translators: %s is the customer's suburb. */
				__( 'Suburb: %s', 'australian-stars' ),
				$suburb ? $suburb : '-'
			),
			sprintf(
				/* translators: %s is the property address. */
				__( 'Property address: %s', 'australian-stars' ),
				$address ? $address : '-'
			),
			'',
			__( 'Job details:', 'australian-stars' ),
			$message ? $message : '-',
		]
	);

	$headers = [
		'Content-Type: text/plain; charset=UTF-8',
		sprintf(
			'Reply-To: %s <%s>',
			$name,
			$email
		),
	];

	$sent = wp_mail(
		$recipient,
		$subject,
		$email_body,
		$headers
	);

	if ( ! $sent ) {
		delete_transient( $rate_limit_key );
		australian_stars_quote_redirect( 'error' );
	}

	australian_stars_quote_redirect( 'success' );
}

add_action(
	'admin_post_nopriv_australian_stars_quote_form',
	'australian_stars_handle_quote_form'
);

add_action(
	'admin_post_australian_stars_quote_form',
	'australian_stars_handle_quote_form'
);

/**
 * Add transparent-header styling to service pages.
 *
 * @param array $classes Existing body classes.
 * @return array
 */
function australian_stars_service_page_body_class( $classes ) {
	if (
		is_page(
			[
				'window-cleaning',
				'gutter-cleaning',
				'pressure-washing',
			]
		)
	) {
		$classes[] = 'has-transparent-header';
	}

	return $classes;
}

add_filter(
	'body_class',
	'australian_stars_service_page_body_class'
);

/**
 * Prevent homepage anchor links from being marked as the current page.
 *
 * @param array    $classes Menu-item classes.
 * @param WP_Post  $item    Current menu item.
 * @return array
 */
function australian_stars_remove_anchor_current_classes(
	$classes,
	$item
) {
	if (
		isset( $item->url ) &&
		false !== strpos( $item->url, '#' )
	) {
		$classes = array_diff(
			$classes,
			[
				'current-menu-item',
				'current_page_item',
				'current-menu-ancestor',
				'current_page_ancestor',
			]
		);
	}

	return array_values( $classes );
}

add_filter(
	'nav_menu_css_class',
	'australian_stars_remove_anchor_current_classes',
	10,
	2
);

/**
 * Remove aria-current from homepage anchor links.
 *
 * @param array    $attributes Link attributes.
 * @param WP_Post  $item       Current menu item.
 * @return array
 */
function australian_stars_remove_anchor_aria_current(
	$attributes,
	$item
) {
	if (
		isset( $item->url ) &&
		false !== strpos( $item->url, '#' )
	) {
		unset( $attributes['aria-current'] );
	}

	return $attributes;
}

add_filter(
	'nav_menu_link_attributes',
	'australian_stars_remove_anchor_aria_current',
	10,
	2
);

/**
 * Redirect legacy blog URLs from the previous website.
 */
function australian_stars_legacy_redirects() {

	$request_path = isset( $_SERVER['REQUEST_URI'] )
		? wp_parse_url(
			sanitize_text_field(
				wp_unslash( $_SERVER['REQUEST_URI'] )
			),
			PHP_URL_PATH
		)
		: '';

	$request_path = untrailingslashit( $request_path );

	$redirects = [
		'/f/when-did-people-start-cleaning-windows'
			=> '/when-did-people-start-cleaning-windows/',

		'/f/diy-window-cleaning'
			=> '/diy-window-cleaning/',

		'/f/how-much-does-it-cost-to-get-your-windows-cleaned-in-brisbane'
			=> '/window-cleaning-cost-sunshine-coast/',
	];

	if ( isset( $redirects[ $request_path ] ) ) {

		wp_safe_redirect(
			home_url( $redirects[ $request_path ] ),
			301
		);

		exit;
	}
}

add_action(
	'template_redirect',
	'australian_stars_legacy_redirects'
);