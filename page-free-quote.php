<?php
/**
 * Template Name: Free Quote
 *
 * @package Australian_Stars
 */

get_header();

$theme_uri    = get_template_directory_uri();
$phone_label  = '0436 341 757';
$phone_number = '+61436341757';
$email        = get_option( 'admin_email' );

$form_status = isset( $_GET['quote-status'] )
	? sanitize_key( wp_unslash( $_GET['quote-status'] ) )
	: '';
?>

<main id="primary" class="site-main">

	<section
		class="quote-page section section--soft"
		aria-labelledby="quote-heading"
	>
		<div class="container quote-page__grid">

			<div class="quote-page__content">

				<p class="section-eyebrow">
					<?php esc_html_e( 'Contact Us', 'australian-stars' ); ?>
				</p>

				<h1 id="quote-heading">
					<?php esc_html_e(
						'Get a Free Quote',
						'australian-stars'
					); ?>
				</h1>

				<p class="quote-page__intro">
					<?php esc_html_e(
						'Tell us a little about your property and the service you need. We’ll get back to you with a clear, no-obligation quote.',
						'australian-stars'
					); ?>
				</p>

				<div class="quote-page__image">
					<img
						src="<?php echo esc_url(
							$theme_uri . '/assets/images/free-quote-1122.webp'
						); ?>"
						srcset="
							<?php echo esc_url(
								$theme_uri . '/assets/images/free-quote-480.webp'
							); ?> 480w,
							<?php echo esc_url(
								$theme_uri . '/assets/images/free-quote-768.webp'
							); ?> 768w,
							<?php echo esc_url(
								$theme_uri . '/assets/images/free-quote-1122.webp'
							); ?> 1122w
						"
						sizes="
							(max-width: 52rem) calc(100vw - 2rem),
							42vw
						"
						alt="<?php esc_attr_e(
							'Professional exterior window cleaning at a Sunshine Coast home',
							'australian-stars'
						); ?>"
						decoding="async"
					>
				</div>

				<ul class="quote-contact">

					<li class="quote-contact__item">
						<span
							class="quote-contact__icon"
							aria-hidden="true"
						>
							<i class="fa-solid fa-phone"></i>
						</span>

						<div class="quote-contact__content">
							<span class="quote-contact__label">
								<?php esc_html_e(
									'Call Us',
									'australian-stars'
								); ?>
							</span>

							<a href="<?php echo esc_url(
								'tel:' . $phone_number
							); ?>">
								<?php echo esc_html( $phone_label ); ?>
							</a>
						</div>
					</li>

					<li class="quote-contact__item">
						<span
							class="quote-contact__icon"
							aria-hidden="true"
						>
							<i class="fa-regular fa-envelope"></i>
						</span>

						<div class="quote-contact__content">
							<span class="quote-contact__label">
								<?php esc_html_e(
									'Email Us',
									'australian-stars'
								); ?>
							</span>

							<a href="<?php echo esc_url(
								'mailto:' . $email
							); ?>">
								<?php echo esc_html(
									antispambot( $email )
								); ?>
							</a>
						</div>
					</li>

				</ul>

			</div>

			<div class="quote-form-card" id="quote-form">

				<div class="quote-form-card__heading">

					<p class="section-eyebrow">
						<?php esc_html_e(
							'Request Your Quote',
							'australian-stars'
						); ?>
					</p>

					<h2>
						<?php esc_html_e(
							'How Can We Help?',
							'australian-stars'
						); ?>
					</h2>

					<p>
						<?php esc_html_e(
							'Complete the form and we’ll get back to you as soon as possible.',
							'australian-stars'
						); ?>
					</p>

				</div>

				<?php if ( 'success' === $form_status ) : ?>

					<div
						class="form-message form-message--success"
						role="status"
					>
						<?php esc_html_e(
							'Thank you. Your quote request has been sent successfully.',
							'australian-stars'
						); ?>
					</div>

				<?php elseif ( 'invalid' === $form_status ) : ?>

					<div
						class="form-message form-message--error"
						role="alert"
					>
						<?php esc_html_e(
							'Please check the required fields and try again.',
							'australian-stars'
						); ?>
					</div>

				<?php elseif ( 'rate-limited' === $form_status ) : ?>

					<div
						class="form-message form-message--error"
						role="alert"
					>
						<?php esc_html_e(
							'Please wait a moment before submitting the form again.',
							'australian-stars'
						); ?>
					</div>

				<?php elseif ( 'error' === $form_status ) : ?>

					<div
						class="form-message form-message--error"
						role="alert"
					>
						<?php esc_html_e(
							'Your message could not be sent. Please try again or contact us directly.',
							'australian-stars'
						); ?>
					</div>

				<?php endif; ?>

				<form
					class="quote-form"
					action="<?php echo esc_url(
						admin_url( 'admin-post.php' )
					); ?>"
					method="post"
				>

					<input
						type="hidden"
						name="action"
						value="australian_stars_quote_form"
					>

					<?php wp_nonce_field(
						'australian_stars_quote_form',
						'australian_stars_quote_nonce'
					); ?>

					<div
						class="form-honeypot"
						aria-hidden="true"
					>
						<label for="company-website">
							<?php esc_html_e(
								'Company website',
								'australian-stars'
							); ?>
						</label>

						<input
							type="text"
							id="company-website"
							name="company_website"
							tabindex="-1"
							autocomplete="off"
						>
					</div>

					<div class="quote-form__row">

						<div class="form-field">
							<label for="quote-name">
								<?php esc_html_e(
									'Name',
									'australian-stars'
								); ?>
								<span aria-hidden="true">*</span>
							</label>

							<input
								type="text"
								id="quote-name"
								name="quote_name"
								autocomplete="name"
								maxlength="100"
								required
							>
						</div>

						<div class="form-field">
							<label for="quote-phone">
								<?php esc_html_e(
									'Phone',
									'australian-stars'
								); ?>
								<span aria-hidden="true">*</span>
							</label>

							<input
								type="tel"
								id="quote-phone"
								name="quote_phone"
								autocomplete="tel"
								maxlength="40"
								required
							>
						</div>

					</div>

					<div class="quote-form__row">

						<div class="form-field">
							<label for="quote-email">
								<?php esc_html_e(
									'Email',
									'australian-stars'
								); ?>
								<span aria-hidden="true">*</span>
							</label>

							<input
								type="email"
								id="quote-email"
								name="quote_email"
								autocomplete="email"
								maxlength="150"
								required
							>
						</div>

						<div class="form-field">
							<label for="quote-suburb">
								<?php esc_html_e(
									'Suburb',
									'australian-stars'
								); ?>
							</label>

							<input
								type="text"
								id="quote-suburb"
								name="quote_suburb"
								autocomplete="address-level2"
								maxlength="100"
							>
						</div>

					</div>

					<div class="form-field">
						<label for="quote-service">
							<?php esc_html_e(
								'Service Required',
								'australian-stars'
							); ?>
							<span aria-hidden="true">*</span>
						</label>

						<select
							id="quote-service"
							name="quote_service"
							required
						>
							<option value="">
								<?php esc_html_e(
									'Select a service',
									'australian-stars'
								); ?>
							</option>

							<option value="window-cleaning">
								<?php esc_html_e(
									'Window Cleaning',
									'australian-stars'
								); ?>
							</option>

							<option value="gutter-cleaning">
								<?php esc_html_e(
									'Gutter Cleaning',
									'australian-stars'
								); ?>
							</option>

							<option value="pressure-washing">
								<?php esc_html_e(
									'Pressure Washing',
									'australian-stars'
								); ?>
							</option>

							<option value="multiple-services">
								<?php esc_html_e(
									'Multiple Services',
									'australian-stars'
								); ?>
							</option>

							<option value="something-else">
								<?php esc_html_e(
									'Something Else',
									'australian-stars'
								); ?>
							</option>

						</select>
					</div>

					<div class="form-field">
						<label for="quote-address">
							<?php esc_html_e(
								'Property Address',
								'australian-stars'
							); ?>
						</label>

						<input
							type="text"
							id="quote-address"
							name="quote_address"
							autocomplete="street-address"
							maxlength="200"
						>
					</div>

					<div class="form-field">
						<label for="quote-message">
							<?php esc_html_e(
								'Tell Us About the Job',
								'australian-stars'
							); ?>
						</label>

						<textarea
							id="quote-message"
							name="quote_message"
							rows="5"
							maxlength="3000"
							placeholder="<?php esc_attr_e(
								'Include any useful details about your property or the work required.',
								'australian-stars'
							); ?>"
						></textarea>
					</div>

					<button
						class="button button--primary quote-form__submit"
						type="submit"
					>
						<?php esc_html_e(
							'Request My Free Quote',
							'australian-stars'
						); ?>
					</button>

					<p class="quote-form__privacy">
						<?php esc_html_e(
							'Your details will only be used to respond to your quote request.',
							'australian-stars'
						); ?>
					</p>

				</form>

			</div>

		</div>
	</section>

	<section
		class="quote-trust"
		aria-label="<?php esc_attr_e(
			'Our service promises',
			'australian-stars'
		); ?>"
	>
		<div class="container quote-trust__inner">

			<div class="quote-trust__item">
				
				<img
					src="<?php echo esc_url(
						get_template_directory_uri() .
						'/assets/images/icons/icon-trust-quote.webp'
					); ?>"
					alt=""
                >

				<span>
					<?php esc_html_e(
						'Fully Insured',
						'australian-stars'
					); ?>
				</span>
			</div>

			<div class="quote-trust__item">

				<img
					src="<?php echo esc_url(
						get_template_directory_uri() .
						'/assets/images/icons/icon-quote.webp'
					); ?>"
					alt=""
                >

				<span>
					<?php esc_html_e(
						'Free, No-Obligation Quotes',
						'australian-stars'
					); ?>
				</span>
			</div>

			<div class="quote-trust__item">
				
				<img
					src="<?php echo esc_url(
						get_template_directory_uri() .
						'/assets/images/icons/icon-local-quote.webp'
					); ?>"
					alt=""
                >

				<span>
					<?php esc_html_e(
						'Local Sunshine Coast Team',
						'australian-stars'
					); ?>
				</span>
			</div>

		</div>
	</section>

</main>

<?php
get_footer();