<?php get_header(); ?>

	<section class="site-content">

		<div class="container">

			<div class="row">

				<div class="col s12 m12 l12">

					<main class="site-main" role="main">

						<article class="post-article" role="article">

							<div class="post-entry post-not-found">

								<div class="post-content">

									<h2><?php esc_html_e( '404 - Sorry! We couldn&#39;t find what you were looking for.' ); ?></h2>

									<p><?php esc_html_e( 'We pretty much failed here. Our bad. Try looking again!' ); ?></p>

									<a class="button" href="<?php echo esc_url( home_url( '/' ) );?>">Go Home</a>

								</div>

							</div>

						</article>

					</main>

				</div>

			</div>

		</div>

	</section>

<?php get_footer(); ?>