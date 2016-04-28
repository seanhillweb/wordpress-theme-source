<?php

	// Don't load comments if you can't comment
	if ( post_password_required() ) {
		return;
	}

?>

<section id="comments" class="comments">

	<div class="comments-content">

		<?php if ( have_comments() ) : ?>

			<h3 class="comment-title">
				<?php
					printf( // WPCS: XSS OK.
						esc_html( _nx( 'One comment on &ldquo;%2$s&rdquo;', '%1$s comments on &ldquo;%2$s&rdquo;', get_comments_number(), 'comments title' ) ),
						number_format_i18n( get_comments_number() ),
						'<span>' . get_the_title() . '</span>'
					);
				?>
			</h3>

			<?php if ( get_comment_pages_count() > 1 && get_option( 'page_comments' ) ) : // Are there comments to navigate through? ?>

			<nav id="comment-nav-above" class="comment-navigation" role="navigation">

				<h3 class="screen-reader-text"><?php esc_html_e( 'Comment navigation' ); ?></h3>

				<div class="comment-nav-links">

					<div class="previous"><?php previous_comments_link( esc_html__( '« Older Comments' ) ); ?></div>
					<div class="next"><?php next_comments_link( esc_html__( 'Newer Comments »' ) ); ?></div>

				</div>

			</nav>

			<?php endif; // Check for comment navigation. ?>

			<ol class="comment-list">
				<?php
					wp_list_comments( array(
						'style'      	=> 'ol',
						'type'			=> 'all',
						'reply_text'	=> __('Reply'),
						'avatar_size'	=> 52,
						'short_ping' 	=> true
					) );
				?>
			</ol>

			<?php if ( get_comment_pages_count() > 1 && get_option( 'page_comments' ) ) : // Are there comments to navigate through? ?>

			<nav id="comment-nav-below" class="comment-navigation" role="navigation">

				<h3 class="screen-reader-text"><?php esc_html_e( 'Comment navigation' ); ?></h3>

				<div class="comment-nav-links">

					<div class="previous"><?php previous_comments_link( esc_html__( '« Older Comments' ) ); ?></div>
					<div class="next"><?php next_comments_link( esc_html__( 'Newer Comments »' ) ); ?></div>

				</div>

			</nav>

			<?php endif; // Check for comment navigation. ?>

		<?php endif; // Check for have_comments(). ?>

		<?php
		// If comments are closed and there are comments, let's leave a little note, shall we?
		if ( ! comments_open() && get_comments_number() && post_type_supports( get_post_type(), 'comments' ) ) : ?>

			<p class="no-comments"><?php esc_html_e( 'Comments are closed.' ); ?></p>

		<?php endif; ?>

		<?php comment_form(); ?>

	</div>

</section>