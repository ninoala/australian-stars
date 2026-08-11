<?php
/**
 * Blog posts index.
 *
 * @package Australian_Stars
 */

get_header();

$posts_page_id = (int) get_option( 'page_for_posts' );
$blog_title    = $posts_page_id
	? get_the_title( $posts_page_id )
	: __( 'Blog', 'australian-stars' );
?>

<main id="primary" class="site-main blog-page">

	<section
		class="blog-hero"
		aria-labelledby="blog-heading"
	>
		<div class="container blog-hero__inner">

			<p class="section-eyebrow">
				<?php
				esc_html_e(
					'Tips & Advice',
					'australian-stars'
				);
			?>
			</p>

			<h1 id="blog-heading">
				<?php echo esc_html( $blog_title ); ?>
			</h1>

			<p class="blog-hero__description">
				<?php
					esc_html_e(
						'Helpful cleaning tips, property care advice and practical information from Australian Property Stars.',
						'australian-stars'
					);
				?>
			</p>

		</div>
	</section>

	<section class="blog-archive section">

		<div class="container">

			<?php if ( have_posts() ) : ?>

				<div class="blog-archive__grid">

					<?php while ( have_posts() ) : ?>

						<?php the_post(); ?>

						<article
							<?php post_class( 'blog-card' ); ?>
							id="post-<?php the_ID(); ?>"
						>

							<?php if ( has_post_thumbnail() ) : ?>

								<a
									class="blog-card__image"
									href="<?php the_permalink(); ?>"
									aria-hidden="true"
									tabindex="-1"
								>
									<?php
										the_post_thumbnail(
											'large',
											[
												'loading'  => 'lazy',
												'decoding' => 'async',
											]
										);
									?>
								</a>

							<?php endif; ?>

							<div class="blog-card__content">

								<p class="blog-card__date">
									<time
										datetime="<?php echo esc_attr(
											get_the_date( DATE_W3C )
										); ?>"
									>
										<?php echo esc_html( get_the_date() ); ?>
									</time>
								</p>

								<h2 class="blog-card__title">
									<a href="<?php the_permalink(); ?>">
										<?php the_title(); ?>
									</a>
								</h2>

								<div class="blog-card__excerpt">
									<?php the_excerpt(); ?>
								</div>

								<a
									class="blog-card__link"
									href="<?php the_permalink(); ?>"
								>
									<?php
										esc_html_e(
											'Read More',
											'australian-stars'
										);
									?>

									<span aria-hidden="true">→</span>
								</a>

							</div>

						</article>

					<?php endwhile; ?>

				</div>

				<nav
					class="blog-pagination"
					aria-label="<?php esc_attr_e(
						'Blog pagination',
						'australian-stars'
					); ?>"
				>
					<?php
						the_posts_pagination(
							[
								'mid_size'  => 1,
								'prev_text' => __(
									'← Previous',
									'australian-stars'
								),
								'next_text' => __(
									'Next →',
									'australian-stars'
								),
							]
						);
					?>
				</nav>

			<?php else : ?>

				<div class="blog-archive__empty">

					<h2>
						<?php
							esc_html_e(
								'No posts yet.',
								'australian-stars'
							);
						?>
					</h2>

					<p>
						<?php
							esc_html_e(
								'Check back soon for property care tips and advice.',
								'australian-stars'
							);
						?>
					</p>

				</div>

			<?php endif; ?>

		</div>

	</section>

</main>

<?php
get_footer();