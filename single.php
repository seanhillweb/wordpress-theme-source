<?php get_header(); ?>

	<section class="site-content">

		<div class="container">

			<div class="row">

				<div class="col s12 m8 l8">

					<main class="site-main" role="main">

						<?php if (have_posts()) : while (have_posts()) : the_post(); ?>

							<?php get_template_part( 'template-parts/content', get_post_format() ); ?>

							<?php prev_next_post_pagination(); ?>

							<?php comments_template(); ?>

						<?php endwhile; ?>

						<?php else: ?>

							<?php get_template_part( 'template-parts/content', 'none' ); ?>

						<?php endif; ?>

					</main>

				</div>

				<div class="col s12 m4 l4">

					<?php get_sidebar(); ?>

				</div>

			</div>

		</div>

	</section>

<?php get_footer(); ?>