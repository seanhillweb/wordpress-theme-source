<?php

// =============================================================================
// Previous and Next Post Pagination
// =============================================================================

// These two functions allow you to add a class to the Previous and Next Post Links for single.php
function posts_link_next_class($format){
	$format = str_replace('href=', 'class="next" href=', $format);
	return $format;
}

add_filter('next_post_link', 'posts_link_next_class');


function posts_link_prev_class($format) {
	$format = str_replace('href=', 'class="previous" href=', $format);
	return $format;
}

add_filter('previous_post_link', 'posts_link_prev_class');


// Function to create a containing element for the Previous and Next Post Links for single.php
function prev_next_post_pagination() {

	if( is_single() ) {

		// Stop execution if there's only 1 post
		if( get_previous_post() || get_next_post() ) {

			echo '<nav class="prev-next-post-pagination" role="navigation">' . "\n";

				printf( previous_post_link( '%link', '%title' ) );
				printf( next_post_link( '%link', '%title' ) );

			echo '</nav>' . "\n";

		}

	}

}

?>