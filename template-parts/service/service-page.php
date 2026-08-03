 <?php
/**
 * Reusable service-page layout.
 *
 * @package Australian_Stars
 */

if (
	empty( $args['service'] ) ||
	! is_array( $args['service'] )
) {
	return;
}

$service   = $args['service'];
$theme_uri = get_template_directory_uri();
$quote_url = home_url( '/free-quote/' );
$hero_images = $service['hero']['image'];
$hero_path   = $theme_uri . '/assets/images/';
?>

<main id="primary" class="site-main service-page">

	<section
		class="service-hero"
		aria-labelledby="service-hero-heading"
	>
		<div class="service-hero__media">
            <img
                src="<?php echo esc_url(
                    $hero_path . $hero_images['1600']
                ); ?>"
                srcset="<?php
                    echo esc_url( $hero_path . $hero_images['480'] ) . ' 480w, ';
                    echo esc_url( $hero_path . $hero_images['768'] ) . ' 768w, ';
                    echo esc_url( $hero_path . $hero_images['1200'] ) . ' 1200w, ';
                    echo esc_url( $hero_path . $hero_images['1600'] ) . ' 1600w';
                ?>"
                sizes="100vw"
                alt="<?php echo esc_attr(
                    $service['hero']['alt']
                ); ?>"
                width="1600"
                height="900"
                fetchpriority="high"
                decoding="async"
            >
        </div>

		<div class="service-hero__overlay"></div>

		<div class="container service-hero__inner">
			<div class="service-hero__content">

				<p class="section-eyebrow service-hero__eyebrow">
					<?php echo esc_html(
						$service['hero']['eyebrow']
					); ?>
				</p>

				<h1 id="service-hero-heading">
					<?php echo esc_html(
						$service['hero']['title']
					); ?>
				</h1>

				<p class="service-hero__description">
					<?php echo esc_html(
						$service['hero']['description']
					); ?>
				</p>

				<div class="service-hero__actions">
					<a
						class="button button--primary"
						href="<?php echo esc_url( $quote_url ); ?>"
					>
						<?php esc_html_e(
							'Get a Free Quote',
							'australian-stars'
						); ?>
					</a>

					<a
						class="button button--outline-light"
						href="tel:+61436341757"
					>
						<?php esc_html_e(
							'Call 0436 341 757',
							'australian-stars'
						); ?>
					</a>
				</div>
			</div>
		</div>
	</section>

	<section
		class="service-intro section"
		aria-labelledby="service-intro-heading"
	>
		<div class="container service-intro__content">

			<p class="section-eyebrow">
				<?php echo esc_html(
					$service['introduction']['eyebrow']
				); ?>
			</p>

			<h2 id="service-intro-heading">
				<?php echo esc_html(
					$service['introduction']['title']
				); ?>
			</h2>

			<div class="service-intro__text">
				<?php
				foreach (
					$service['introduction']['paragraphs']
					as $paragraph
				) :
					?>
					<p>
						<?php echo esc_html( $paragraph ); ?>
					</p>
				<?php endforeach; ?>
			</div>

			<a
				class="button button--primary"
				href="<?php echo esc_url( $quote_url ); ?>"
			>
				<?php esc_html_e(
					'Request Your Free Quote',
					'australian-stars'
				); ?>
			</a>

		</div>
	</section>

	<section
		class="service-inclusions section section--soft"
		aria-labelledby="service-inclusions-heading"
	>
		<div class="container">

			<div class="section-heading">
				<p class="section-eyebrow">
					<?php esc_html_e(
						'A Complete Window Cleaning Service',
						'australian-stars'
					); ?>
				</p>

				<h2 id="service-inclusions-heading">
					<?php esc_html_e(
						'What’s Included',
						'australian-stars'
					); ?>
				</h2>
			</div>

			<div class="service-inclusions__grid">
                <?php
                foreach (
                    $service['inclusions']
                    as $index => $inclusion
                ) :
                    ?>

                    <article class="service-inclusion-card">

                        <span
                            class="service-inclusion-card__number"
                            aria-hidden="true"
                        >
                            <?php echo esc_html( $index + 1 ); ?>
                        </span>

                        <h3>
                            <?php echo esc_html(
                                $inclusion['title']
                            ); ?>
                        </h3>

                        <p>
                            <?php echo esc_html(
                                $inclusion['text']
                            ); ?>
                        </p>

                    </article>

                <?php endforeach; ?>
            </div>

		</div>
	</section>

	<section
		class="service-benefits section"
		aria-labelledby="service-benefits-heading"
	>
		<div class="container service-benefits__inner">

			<div class="service-benefits__heading">
				<p class="section-eyebrow">
					<?php esc_html_e(
						'The Benefits',
						'australian-stars'
					); ?>
				</p>

				<h2 id="service-benefits-heading">
					<?php esc_html_e(
						'Why Professional Window Cleaning Makes a Difference',
						'australian-stars'
					); ?>
				</h2>
			</div>

			<ul class="service-benefits__list">
				<?php foreach ( $service['benefits'] as $benefit ) : ?>
					<li>
						<span aria-hidden="true">✓</span>

						<?php echo esc_html( $benefit ); ?>
					</li>
				<?php endforeach; ?>
			</ul>

		</div>
	</section>

	<section class="service-cta section">
		<div class="container">
			<div class="service-cta__inner">

				<div class="service-cta__content">
					<p class="service-cta__eyebrow">
						<?php echo esc_html(
							$service['cta']['eyebrow']
						); ?>
					</p>

					<h2>
						<?php echo esc_html(
							$service['cta']['title']
						); ?>
					</h2>

					<p>
						<?php echo esc_html(
							$service['cta']['text']
						); ?>
					</p>
				</div>

				<a
					class="button service-cta__button"
					href="<?php echo esc_url( $quote_url ); ?>"
				>
					<?php esc_html_e(
						'Get Your Free Quote',
						'australian-stars'
					); ?>
				</a>

			</div>
		</div>
	</section>

</main>