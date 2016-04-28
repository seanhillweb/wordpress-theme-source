<article id="post-<?php the_ID(); ?>" <?php post_class( 'page-article' ); ?> role="article">

	<div class="page-image">

		<?php
			if ( has_post_thumbnail() ) {
				the_post_thumbnail('post-preview');
			} 
			else {
				echo '<img src="' . get_bloginfo( 'stylesheet_directory' ) . '/assets/images/thumbnail-default.jpg" />';
			}
		?>

	</div>

	<div class="page-entry">
		
		<h1 class="page-title"><?php the_title(); ?></h1>

		<div class="page-content"><?php the_content(); ?></div>

	</div>

</article>