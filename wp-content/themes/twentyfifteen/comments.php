<?php
/**
 * The template for displaying comments
 *
 * The area of the page that contains both current comments
 * and the comment form.
 *
 * @package WordPress
 * @subpackage Twenty_Fifteen
 * @since Twenty Fifteen 1.0
 */

/*
 * If the current post is protected by a password and
 * the visitor has not yet entered the password we will
 * return early without loading the comments.
 */
if ( post_password_required() ) {
	return;
}
?>

<div id="comments" class="comments-area">
    <div class="inner">
	<?php if ( have_comments() ) : ?>
		<ol class="comment-list">
			<?php
				wp_list_comments( array(
                                        'type' => 'comment',
					'style'       => 'ol',
					'short_ping'  => true,
					'avatar_size' => 56,
                                        'callback' => 'jadis_theme_comment'
				) );
			?>
		</ol><!-- .comment-list -->
                <nav class="pagination">
                    <div class="pager-links">
                        <?php paginate_comments_links( array('prev_text' => '<i class="fa fa-angle-left"></i>Précédent', 'next_text' => 'Suivant<i class="fa fa-angle-right"></i>')); ?>
                    </div>
                </nav>

	<?php endif; // have_comments() ?>

	<?php
		// If comments are closed and there are comments, let's leave a little note, shall we?
		if ( ! comments_open() && get_comments_number() && post_type_supports( get_post_type(), 'comments' ) ) :
	?>
		<p class="no-comments"><?php _e( 'Comments are closed.', 'twentyfifteen' ); ?></p>
	<?php endif; ?>
    </div>            
</div><!-- .comments-area -->
<div class="wrap-comment">
    <?php comment_form(); ?>
</div>