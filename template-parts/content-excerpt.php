<article id="post-<?php the_ID(); ?>" <?php post_class( 'post-article' ); ?> role="article">

	<div class="post-entry">

		<header class="post-header">

			<h1 class="post-title"><?php the_title(); ?></h1>

			<div class="post-excerpt"><?php the_excerpt(); ?></div>

		</header>

		<a href="<?php the_permalink(); ?>" class="button">Read More</a>

	</div>

</article>