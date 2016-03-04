<?php
/**
 * @package WordPress
 * @subpackage theme1918
 */

// Do not delete these lines
if (!empty($_SERVER['SCRIPT_FILENAME']) && 'comments.php' == basename($_SERVER['SCRIPT_FILENAME']))
	die ('Please do not load this page directly. Thanks!');

if ( post_password_required() ) { ?>
	<p class="nocomments"><?php echo __('This post is password protected. Enter the password to view comments.', 'theme1918'); ?></p>
	<?php return;
} ?>

<!-- You can start editing here. -->

<?php if ( have_comments() ) : ?>
	<h2 class="space" id="comments">
		<?php printf( _n( '1 Comment', '%1$s Comments', get_comments_number(), 'theme1918' ), number_format_i18n( get_comments_number() ));?>
	</h2>

	<ol class="commentlist rlist">
		<?php wp_list_comments('type=comment&callback=mytheme_comment'); ?>
	</ol>

<?php else : // this is displayed if there are no comments so far 
	if ( comments_open() ) : ?>
		<!-- If comments are open, but there are no comments. -->
		<p class="nocomments"><?php echo __('No Comments Yet.', 'theme1918'); ?></p>
	<?php else : // comments are closed ?>
		<!-- If comments are closed. -->
		<p class="nocomments"><?php echo __('Comments are closed.', 'theme1918'); ?></p>
	<?php endif;
endif;

if ( comments_open() ) : ?>
	<div id="respond">
		<h2><?php comment_form_title( _e('Leave a Comment','theme1918')); ?></h2>
		<div class="cancel-comment-reply">
			<small><?php cancel_comment_reply_link(); ?></small>
		</div>

		<?php if ( get_option('comment_registration') && !is_user_logged_in() ) : ?>
			<p><?php _e('You must be', 'theme1918'); ?> <a href="<?php echo wp_login_url( get_permalink() ); ?>"><?php _e('logged in', 'theme1918'); ?></a> <?php _e('to post a comment.', 'theme1918'); ?></p>
		<?php else : ?>
			<form action="<?php echo get_option('siteurl'); ?>/wp-comments-post.php" method="post" id="commentform">
				<?php if ( is_user_logged_in() ) : ?>
					<p><?php _e('Logged in as', 'theme1918'); ?> <a href="<?php echo get_option('siteurl'); ?>/wp-admin/profile.php"><?php echo $user_identity; ?></a>. <a href="<?php echo wp_logout_url(get_permalink()); ?>" title="<?php _e('Log out of this account', 'theme1918'); ?>"><?php _e('Log out &rsaquo;', 'theme1918'); ?></a></p>
				<?php else : ?>
					<p class="field">
						<label for="author">
							<input type="text" name="author" id="author" value="<?php _e('Name*', 'theme1918'); ?>" size="22" tabindex="1" <?php if ($req) echo "aria-required='true'"; ?> onfocus="if(this.value =='<?php _e('Name*', 'theme1918'); ?>' ) this.value=''" onblur="if(this.value=='') this.value='<?php _e('Name*', 'theme1918'); ?>'">
						</label>
					</p>
					<p class="field">
						<label for="email">
							<input type="text" name="email" id="email" value="<?php _e('Email (will not be published)*', 'theme1918'); ?>" size="22" tabindex="2" <?php if ($req) echo "aria-required='true'"; ?> onfocus="if(this.value =='<?php _e('Email (will not be published)*', 'theme1918'); ?>' ) this.value=''" onblur="if(this.value=='') this.value='<?php _e('Email (will not be published)*', 'theme1918'); ?>'">
						</label>
					</p>
					<p class="field">
						<label for="url">
							<input type="text" name="url" id="url" value="<?php _e('Website', 'theme1918'); ?>" size="22" tabindex="3" onfocus="if(this.value =='<?php _e('Website', 'theme1918'); ?>' ) this.value=''" onblur="if(this.value=='') this.value='<?php _e('Website', 'theme1918'); ?>'">
						</label>
					</p>
				<?php endif; ?>
				<!--<p><small><strong>XHTML:</strong> You can use these tags: <code><?php echo allowed_tags(); ?></code></small></p>-->
				<p>
					<label for="comment">
						<textarea name="comment" id="comment" cols="58" rows="10" tabindex="4" onfocus="if(this.value =='<?php _e('Your comment*', 'theme1918'); ?>' ) this.value=''" onblur="if(this.value=='') this.value='<?php _e('Your comment*', 'theme1918'); ?>'"><?php _e('Your comment*', 'theme1918'); ?></textarea>
					</label>
				</p>
				<p>
					<input name="submit" type="submit" id="submit" tabindex="5" value="<?php _e('Submit Comment', 'theme1918'); ?>">
					<?php comment_id_fields(); ?>
				</p>
				<?php do_action('comment_form', $post->ID); ?>
			</form>
		<?php endif; // If registration required and not logged in ?>
	</div>
<?php endif; // if you delete this the sky will fall on your head ?>