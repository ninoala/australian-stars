<?php
/**
 * Single blog post template.
 *
 * @package Australian_Stars
 */

get_header();
?>

<main id="primary" class="site-main single-post-page">

	<?php while ( have_posts() ) : ?>

		<?php the_post(); ?>

		<article
			id="post-<?php the_ID(); ?>"
			<?php post_class( 'single-article' ); ?>
		>

			<header class="single-article__header">

				<div class="container single-article__header-inner">

					<p class="section-eyebrow">
						<?php
						esc_html_e(
							'Australian Property Stars Blog',
							'australian-stars'
						);
						?>
					</p>

					<h1 class="single-article__title">
						<?php the_title(); ?>
					</h1>

					<p class="single-article__date">
						<time
							datetime="<?php echo esc_attr(
								get_the_date( DATE_W3C )
							); ?>"
						>
							<?php echo esc_html( get_the_date() ); ?>
						</time>
					</p>

				</div>

			</header>

			<?php if ( has_post_thumbnail() ) : ?>

				<div class="container single-article__featured-wrap">

					<figure class="single-article__featured">
						<?php
						the_post_thumbnail(
							'full',
							[
								'loading'  => 'eager',
								'decoding' => 'async',
							]
						);
						?>
					</figure>

				</div>

			<?php endif; ?>

			<div class="single-article__body">

				<div class="container">

					<div class="single-article__content">
						<?php the_content(); ?>
					</div>

				</div>

			</div>

			<section
				class="single-article__cta"
				aria-labelledby="article-cta-title"
			>
				<div class="container single-article__cta-inner">

					<div>

						<p class="single-article__cta-eyebrow">
							<?php
							esc_html_e(
								'Need a hand?',
								'australian-stars'
							);
							?>
						</p>

						<h2 id="article-cta-title">
							<?php
							esc_html_e(
								'Let us take care of the cleaning.',
								'australian-stars'
							);
							?>
						</h2>

						<p>
							<?php
							esc_html_e(
								'Get a free, no-obligation quote from your local Sunshine Coast team.',
								'australian-stars'
							);
							?>
						</p>

					</div>

					<a
						class="single-article__cta-button"
						href="<?php echo esc_url(
							home_url( '/free-quote/' )
						); ?>"
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

		</article>

	<?php endwhile; ?>

</main>

<?php
get_footer();