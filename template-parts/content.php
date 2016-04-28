<article id="post-<?php the_ID(); ?>" <?php post_class( 'post-article' ); ?> role="article">

	<?php
		// $format = get_post_format();
		// get_template_part( 'post-formats/format', $format ); 
	?>

	<div class="post-image">

		<?php
			if ( has_post_thumbnail() ) {
				the_post_thumbnail('post-preview');
			} 
			else {
				echo '<img src="' . get_bloginfo( 'stylesheet_directory' ) . '/assets/images/thumbnail-default.jpg" />';
			}
		?>

	</div>

	<div class="post-entry">

		<header class="post-header">
			
			<div class="post-meta">

				<div class="post-author-image">

					<?php echo get_avatar( get_the_author_meta('email'), '52' ); ?>

				</div>

				<ul class="post-info">
					<li><a href="<?php echo get_author_posts_url( get_the_author_meta( 'ID' ) ); ?>"><?php echo get_the_author_meta('display_name'); ?></a> in <?php the_category(', '); ?></li>
					<li><span><?php the_time('F j, Y', $post->ID); ?><span></li>
				</ul>

			</div>

			<h1 class="post-title"><?php the_title(); ?></h1>

			<div class="post-excerpt"><?php the_excerpt(); ?></div>

		</header>

		<div class="post-content"><?php the_content(); ?></div>

		<footer class="post-footer">
			<?php the_tags('<div class="post-tags">', ' ', '</div>'); ?>
		</footer>

	</div>

</article>