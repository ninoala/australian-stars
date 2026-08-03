<section
	class="hero"
	aria-labelledby="hero-heading"
>
	<div class="hero__media">
		<img
			class="hero__image"
			src="<?php echo esc_url(
				get_theme_file_uri(
					'/assets/images/hero-home-1672.webp'
				)
			); ?>"
			srcset="<?php echo esc_url(
				get_theme_file_uri(
					'/assets/images/hero-home-480.webp'
				)
			); ?> 480w,
			<?php echo esc_url(
				get_theme_file_uri(
					'/assets/images/hero-home-768.webp'
				)
			); ?> 768w,
			<?php echo esc_url(
				get_theme_file_uri(
					'/assets/images/hero-home-1024.webp'
				)
			); ?> 1024w,
			<?php echo esc_url(
				get_theme_file_uri(
					'/assets/images/hero-home-1672.webp'
				)
			); ?> 1672w"
			sizes="100vw"
			width="1672"
			height="941"
			alt="<?php esc_attr_e(
				'Bright coastal home with clean windows',
				'australian-stars'
			); ?>"
			loading="eager"
			fetchpriority="high"
			decoding="async"
		>
	</div>

	<div class="container hero__inner">
		<div class="hero__content">

			<p class="section-eyebrow">
				<?php esc_html_e(
					'Crystal Clear. Every Time.',
					'australian-stars'
				); ?>
			</p>

			<h1
				class="hero__title"
				id="hero-heading"
			>
				<?php esc_html_e(
					'Window Cleaning',
					'australian-stars'
				); ?>

				<span class="hero__title-line">
					<?php esc_html_e(
						'on the',
						'australian-stars'
					); ?>

					<span class="hero__title-accent">
						<?php esc_html_e(
							'Sunshine Coast',
							'australian-stars'
						); ?>
					</span>
				</span>
			</h1>

			<p class="hero__description">
				<?php esc_html_e(
					'Professional care for your home or property, delivering sparkling results you can see and trust.',
					'australian-stars'
				); ?>
			</p>

			<div class="hero__actions">
				<a
					class="button button--primary"
					href="<?php echo esc_url(
						home_url( '/free-quote/' )
					); ?>"
				>
					<?php esc_html_e(
						'Get Your Free Quote',
						'australian-stars'
					); ?>
				</a>

				<a
					class="hero__phone"
					href="tel:+61XXXXXXXXX"
					aria-label="<?php esc_attr_e(
						'Call Australian Property Stars',
						'australian-stars'
					); ?>"
				>
					<?php esc_html_e(
						'04XX XXX XXX',
						'australian-stars'
					); ?>
				</a>
			</div>

		</div>
	</div>
</section>