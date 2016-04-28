<?php get_header(); ?>

	<section class="site-content">

		<div class="container">

			<div class="row">

				<div class="col s12 m12 l12">

					<main class="site-main" role="main">

						<?php if (have_posts()) : while (have_posts()) : the_post(); ?>

							<?php get_template_part( 'template-parts/content', 'page' ); ?>

						<?php endwhile; ?>

						<?php else: ?>

							<?php get_template_part( 'template-parts/content', 'none' ); ?>

						<?php endif; ?>

					</main>

				</div>

			</div>

		</div>

	</section>

<?php get_footer(); ?>