<?php if ( is_active_sidebar( 'primary-sidebar' )  ) : ?>
	<aside class="site-sidebar" role="sidebar">
		<?php dynamic_sidebar( 'primary-sidebar' ); ?> 
	</aside>
<?php endif; ?>