<div style="display:none"><!-- <?php comment_form(); ?> --></div>
<div id="comments">
<?php
$req = get_option('require_name_email');
if ( 'comments.php' == basename($_SERVER['SCRIPT_FILENAME']) )
die ( 'Please do not load this page directly.' );
if ( post_password_required() ) :
?>
<div class="nopassword"><?php _e('Denne artiklen er passordbeskyttet. Fyll inn passord for å vise kommentarer.', 'nifu') ?></div>
</div>
<?php
return;
endif;
?>
<?php if ( have_comments() ) : ?>
<?php
$ping_count = $comment_count = 0;
foreach ( $comments as $comment )
get_comment_type() == "comment" ? ++$comment_count : ++$ping_count;
?>
<?php if ( ! empty($comments_by_type['comment']) ) : ?>
<div id="comments-list" class="comments">
<h3><?php printf($comment_count > 1 ? __('%d Kommentarer', 'nifu') : __('En Kommentar', 'nifu'), $comment_count) ?></h3>
<?php $total_pages = get_comment_pages_count(); if ( $total_pages > 1 ) : ?>
<div id="comments-nav-above" class="comments-navigation">
<div class="paginated-comments-links"><?php paginate_comments_links(); ?></div>
</div>
<?php endif; ?>
<ul>
<?php wp_list_comments('type=comment&callback=nifu_custom_comments'); ?>
</ul>
<?php $total_pages = get_comment_pages_count(); if ( $total_pages > 1 ) : ?>
<div id="comments-nav-below" class="comments-navigation">
<div class="paginated-comments-links"><?php paginate_comments_links(); ?></div>
</div>
<?php endif; ?>
</div>
<?php endif; ?>
<?php if ( ! empty($comments_by_type['pings']) ) : ?>
<div id="trackbacks-list" class="comments">
<h3><?php printf($ping_count > 1 ? __('%d Trackbacks', 'nifu') : __('En Trackback', 'nifu'), $ping_count) ?></h3>
<ul>
<?php wp_list_comments('type=pings&callback=nifu_custom_pings'); ?>
</ul>
</div>
<?php endif ?>
<?php endif ?>
<?php if ( 'open' == $post->comment_status ) : ?>
<div id="respond">
<h3><?php comment_form_title( __('Legg til kommentar', 'nifu'), __('Legg til svar til %s', 'nifu') ); ?></h3>
<div id="cancel-comment-reply"><?php cancel_comment_reply_link() ?></div>
<?php if ( get_option('comment_registration') && !$user_ID ) : ?>
<p id="login-req"><?php printf(__('You must be <a href="%s" title="Log in">logged in</a> to Post a Comment.', 'nifu'),
get_option('siteurl') . '/wp-login.php?redirect_to=' . get_permalink() ) ?></p>
<?php else : ?>
<div class="formcontainer">
<form id="commentform" action="<?php echo get_option('siteurl'); ?>/wp-comments-post.php" method="post">
<div>
<?php if ( $user_ID ) : ?>

<?php else : ?>
<p id="comment-notes"><?php if ($req) _e('Felt som er påkrevd er markert med <span class="required">*</span>', 'nifu') ?></p>
<div class="input_holder">
<div id="form-section-author" class="form-section">
  <div class="form-label"><label for="author"><?php _e('Navn', 'nifu') ?></label> <?php if ($req) _e('<span class="required">*</span>', 'nifu') ?></div>
  <div class="form-input"><input id="author" name="author" type="text" value="<?php echo $comment_author ?>" size="30" maxlength="20" tabindex="3" /></div>
</div>
<div id="form-section-email" class="form-section">
  <div class="form-label"><label for="email"><?php _e('E-post', 'nifu') ?></label> <?php if ($req) _e('<span class="required">*</span>', 'nifu') ?></div>
  <div class="form-input"><input id="email" name="email" type="text" value="<?php echo $comment_author_email ?>" size="30" maxlength="50" tabindex="4" /></div>
</div>
<div id="form-section-url" class="form-section">
  <div class="form-label"><label for="url"><?php _e('Website', 'nifu') ?></label></div>
  <div class="form-input"><input id="url" name="url" type="text" value="<?php echo $comment_author_url ?>" size="30" maxlength="50" tabindex="5" /></div>
</div>
</div>
<?php endif ?>
<div id="form-section-comment" class="form-section">
<div class="form-label"><label for="comment"><?php _e('Kommentar', 'nifu') ?></label></div>
<div class="form-textarea"><textarea id="comment" name="comment" cols="50" rows="6" tabindex="6"></textarea></div>
</div>
<?php do_action('comment_form', $post->ID); ?>
<div class="form-submit"><input id="submit" name="submit" type="submit" value="<?php _e('Send', 'nifu') ?>" tabindex="7" /><input type="hidden" name="comment_post_ID" value="<?php echo $id; ?>" /></div>
<?php comment_id_fields(); ?>
</div>
</form>
</div>
<?php endif ?>
</div>
<?php endif ?>
</div>