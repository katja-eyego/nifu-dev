<?php
load_theme_textdomain( 'nifu', TEMPLATEPATH . '/languages' );
$locale = get_locale();
$locale_file = TEMPLATEPATH . "/languages/$locale.php";
if ( is_readable($locale_file) )
require_once($locale_file);
require_once('functions/add_cat_select.php');
function nifu_get_page_number() {
if (get_query_var('paged')) {
print ' | ' . __( 'Page ' , 'nifu') . get_query_var('paged');
}
}
add_action( 'after_setup_theme', 'nifu_theme_setup' );
function nifu_theme_setup() {
add_theme_support( 'automatic-feed-links' );
}
function my_myme_types($mime_types){
	$mime_types['doc'] = 'application/msword'; //Adding avi extension
	unset($mime_types['doc|docx']); //Removing the pdf extension
	return $mime_types;
}
add_filter('upload_mimes', 'my_myme_types', 1, 1);
function get_user() {
  $current_user = wp_get_current_user();
  echo $current_user->ID;
}
function get_user_name() {
  $current_user = wp_get_current_user();
  echo $current_user->user_firstname . ' ' . $current_user->user_lastname; 
}
function head_files() {
  ?>
  <link rel="stylesheet" type="text/css" href="<?php bloginfo('template_url'); ?>/style/print.css" media="print" />
  <link rel="Shortcut icon" href="<?php bloginfo('template_url'); ?>/images/favicon.ico" type="image/x-icon" />
  <script type="text/javascript" src="http://www.google.com/jsapi"></script>
  <script type="text/javascript"> 
    google.load("jquery", "1.5.1");
    google.load("jqueryui", "1.8.3");
  </script>
  <script type="text/javascript" src="<?php bloginfo('template_url'); ?>/js/commons.js"></script>
  <?php
}
add_action('wp_head', 'head_files');
if ( function_exists( 'add_theme_support' ) ) {
add_theme_support( 'post-thumbnails' );
}
add_image_size( 'thumbs',  110, 9999 );
add_image_size( 'article', 595, 9999 );
add_image_size( 'sidebar', 180, 9999 );
update_option( 'date_format', 'd.m.Y' );
add_filter('body_class','browser_body_class');
function browser_body_class($classes) {
	global $is_lynx, $is_gecko, $is_IE, $is_opera, $is_NS4, $is_safari, $is_chrome, $is_iphone;

	if($is_lynx) $classes[] = 'lynx';
	elseif($is_gecko) $classes[] = 'gecko';
	elseif($is_opera) $classes[] = 'opera';
	elseif($is_NS4) $classes[] = 'ns4';
	elseif($is_safari) $classes[] = 'safari';
	elseif($is_chrome) $classes[] = 'chrome';
	elseif($is_IE) $classes[] = 'ie';
	else $classes[] = 'unknown';

	if($is_iphone) $classes[] = 'iphone';
	return $classes;
}
function excerpt($limit) {
  $excerpt = explode(' ', get_the_excerpt(), $limit);
  if (count($excerpt)>=$limit) {
    array_pop($excerpt);
    $excerpt = implode(" ",$excerpt).'...';
  } else {
    $excerpt = implode(" ",$excerpt);
  }	
  $excerpt = preg_replace('`\[[^\]]*\]`','',$excerpt);
  return $excerpt;
}
if ( ! isset( $content_width ) ) $content_width = 640;
add_filter('the_title', 'nifu_title');
function nifu_title($title) {
if ($title == '') {
return 'Untitled';
} else {
return $title;
}
}
function nifu_register_menus() {
register_nav_menus(
array( 
  'main-menu' => __( 'Main Menu', 'nifu' ),
  'acq_pro' => __( 'Akkvisisjon og Prosjekt', 'nifu' ),
  'lib' => __('Bibliotek', 'nifu'),
  'docs' => __('Dokumenter', 'nifu'),
  'personal' => __('Personal', 'nifu'),
  'ikt' => __('IKT', 'nifu'),
  'house' => __('Huset', 'nifu'),
  'org' => __('Organisasjon', 'nifu')
));
}
add_action( 'init', 'nifu_register_menus' );
function nifu_theme_widgets_init() {
register_sidebar( array (
'name' => 'Primary Widget Area',
'id' => 'primary-widget-area',
'before_widget' => '<li id="%1$s" class="widget-container %2$s">',
'after_widget' => "</li>",
'before_title' => '<h3 class="widget-title">',
'after_title' => '</h3>',
) );
}
add_action( 'init', 'nifu_theme_widgets_init' );
$preset_widgets = array (
'primary-aside'  => array( 'search', 'pages', 'categories', 'archives' ),
);
if ( isset( $_GET['activated'] ) ) {
update_option( 'sidebars_widgets', $preset_widgets );
}
function nifu_cats($glue) {
$current_cat = single_cat_title( '', false );
$separator = "\n";
$cats = explode( $separator, get_the_category_list($separator) );
foreach ( $cats as $i => $str ) {
if ( strstr( $str, ">$current_cat<" ) ) {
unset($cats[$i]);
break;
}
}
if ( empty($cats) )
return false;
return trim(join( $glue, $cats ));
}
function nifu_tags($glue) {
$current_tag = single_tag_title( '', '',  false );
$separator = "\n";
$tags = explode( $separator, get_the_tag_list( "", "$separator", "" ) );
foreach ( $tags as $i => $str ) {
if ( strstr( $str, ">$current_tag<" ) ) {
unset($tags[$i]);
break;
}
}
if ( empty($tags) )
return false;
return trim(join( $glue, $tags ));
}
function nifu_commenter_link() {
$commenter = get_comment_author_link();
if ( ereg( '<a[^>]* class=[^>]+>', $commenter ) ) {
$commenter = preg_replace( '/(<a[^>]* class=[\'"]?)/', '\\1url ' , $commenter );
} else {
$commenter = preg_replace( '/(<a )/', '\\1class="url "' , $commenter );
}
$avatar_email = get_comment_author_email();
$avatar = str_replace( "class='avatar", "class='photo avatar", get_avatar( $avatar_email, 20 ) );
echo $avatar . ' <span class="fn n">' . $commenter . '</span>';
}
function nifu_custom_comments($comment, $args, $depth) {
$GLOBALS['comment'] = $comment;
$GLOBALS['comment_depth'] = $depth;
?>
<li id="comment-<?php comment_ID() ?>" <?php comment_class() ?>>
<div class="comment-author vcard"><?php nifu_commenter_link() ?><?php printf(__('<span class="meta-sep"> | </span> Posted %1$s at %2$s ', 'nifu'),
get_comment_date(),
get_comment_time(),
'#comment-' . get_comment_ID() );
edit_comment_link(__('Edit', 'nifu'), ' <span class="meta-sep"> | </span> <span class="edit-link">', '</span>'); 
if($args['type'] == 'all' || get_comment_type() == 'comment') :
comment_reply_link(array_merge($args, array(
'reply_text' => __('Reply','nifu'),
'login_text' => __('Log in to reply.','nifu'),
'depth' => $depth,
'before' => '<span class="meta-sep"> | </span> ',
'after' => ''
)));
endif;
?></div>

<?php if ($comment->comment_approved == '0') _e("\t\t\t\t\t<span class='unapproved'>Your comment is awaiting moderation.</span>\n", 'nifu') ?>
<div class="comment-content">
<?php comment_text() ?>
</div>
<?php
/*
if($args['type'] == 'all' || get_comment_type() == 'comment') :
comment_reply_link(array_merge($args, array(
'reply_text' => __('Reply','nifu'),
'login_text' => __('Log in to reply.','nifu'),
'depth' => $depth,
'before' => '<div class="comment-reply-link">',
'after' => '</div>'
)));
endif;
*/
?>
<?php }
function nifu_custom_pings($comment, $args, $depth) {
$GLOBALS['comment'] = $comment;
?>
<li id="comment-<?php comment_ID() ?>" <?php comment_class() ?>>
<div class="comment-author"><?php printf(__('By %1$s on %2$s at %3$s', 'nifu'),
get_comment_author_link(),
get_comment_date(),
get_comment_time() );
edit_comment_link(__('Edit', 'nifu'), ' <span class="meta-sep"> | </span> <span class="edit-link">', '</span>'); ?></div>
<?php if ($comment->comment_approved == '0') _e('\t\t\t\t\t<span class="unapproved">Your trackback is awaiting moderation.</span>\n', 'nifu') ?>
<div class="comment-content">
<?php comment_text() ?>
</div>
<?php }
