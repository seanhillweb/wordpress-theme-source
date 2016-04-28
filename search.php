<?php get_header(); ?>

	<section class="site-content">

		<div class="container">

			<div class="row">

				<div class="col s12 m8 l8">

					<header class="search-header">

						<div class="search-details">

							<h2>Here is everything related to: <span>"<?php the_search_query(); ?>"</span></h2>

							<p>Not what you were looking for? Try searching again!</p>

						</div>

						<?php get_search_form(); ?>

					</header>

					<main class="site-main" role="main">

						<?php if (have_posts()) : while (have_posts()) : the_post(); ?>

							<?php get_template_part( 'template-parts/content', 'excerpt' ); ?>

						<?php endwhile; ?>

						<?php else: ?>

							<?php get_template_part( 'template-parts/content', 'none' ); ?>
							
						<?php endif; ?>

					</main>

					<?php numeric_pagination(); ?>

				</div>

				<div class="col s12 m4 l4">

					<?php get_sidebar(); ?>

				</div>

			</div>

		</div>

	</section>

<?php get_footer(); ?>