<?php get_header(); ?>

	<section class="site-content">

		<div class="container">

			<div class="row">

				<div class="col s12 m8 l8">

					<?php $curauth = (isset($_GET['author_name'])) ? get_user_by('slug', $author_name) : get_userdata(intval($author)); ?>

					<header class="author-header">

						<div class="author-profile">

							<div class="author-image">
								<?php echo get_avatar($curauth->user_email, 73); ?>
							</div>

							<div class="author-info">

								<h2 class="author-name"><?php echo $curauth->nickname; ?></h2>

								<ul class="author-meta">
									<li><a href="<?php echo $curauth->user_url; ?>"><?php echo $curauth->user_url; ?></a></li>
								</ul>

							</div>

						</div>

						<p class="author-description"><?php echo $curauth->user_description; ?></p>

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