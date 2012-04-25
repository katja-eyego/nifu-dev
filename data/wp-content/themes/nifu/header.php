<!DOCTYPE html>
<html <?php language_attributes(); ?>>
<head>
<meta http-equiv="content-type" content="<?php bloginfo('html_type'); ?>; charset=<?php bloginfo('charset'); ?>" />
<title><?php wp_title(' | ', true, 'right'); ?><?php bloginfo('name'); ?></title>
<link rel="stylesheet" type="text/css" href="<?php bloginfo('stylesheet_url'); ?>" />
<?php if ( is_singular() ) wp_enqueue_script( 'comment-reply' ); ?>
<?php wp_head(); ?>
</head>
<body <?php body_class(); ?>>
<div id="page" class="<?php get_user(); ?>">
  
  <div id="topmenu">
    <ul>
    <?php wp_nav_menu(array('menu' => 'Akkvisisjon og prosjekt', 'container' => false, 'items_wrap' => '%3$s', 'depth' => 3)); ?>
    <?php wp_nav_menu(array('menu' => 'Bibliotek', 'container' => false, 'items_wrap' => '%3$s', 'depth' => 3)); ?>
    <?php wp_nav_menu(array('menu' => 'Dokumenter', 'container' => false, 'items_wrap' => '%3$s', 'depth' => 3)); ?>
    <?php wp_nav_menu(array('menu' => 'Personal', 'container' => false, 'items_wrap' => '%3$s', 'depth' => 3)); ?>
    <?php wp_nav_menu(array('menu' => 'IKT', 'container' => false, 'items_wrap' => '%3$s', 'depth' => 3)); ?>
    <?php wp_nav_menu(array('menu' => 'Huset', 'container' => false, 'items_wrap' => '%3$s', 'depth' => 3)); ?>
    <?php wp_nav_menu(array('menu' => 'Organisasjon', 'container' => false, 'items_wrap' => '%3$s', 'depth' => 3)); ?>
    </ul>
  </div>
  <ul id="topmenu-firstlevel">
  </ul>
  <div id="header">
    <?php get_search_form(); ?>       
    <div id="logo">
    <?php if ( is_singular() ) {} else {echo '<h1>';} ?><a href="<?php echo home_url() ?>/" title="<?php bloginfo( 'name' ) ?>" rel="home"><img src="<?php bloginfo('template_url'); ?>/images/design/logo_main.png" alt="logo" /></a><?php if ( is_singular() ) {} else {echo '</h1>';} ?></div>
    <p id="blog-description">Velkommen <?php get_user_name(); echo date(' / j.m.Y'); ?></p>
  </div>
  <div id="columns">
    <div id="main"<?php if(is_home()) { ?> class="frontpage"<?php } ?>>
      <?php { include (TEMPLATEPATH . "/left_column.php"); } ?>
      <div class="center-column">
      