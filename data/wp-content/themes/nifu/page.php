<?php get_header(); ?>
<?php the_post(); ?>
  <div id="post-<?php the_ID(); ?>" <?php post_class('section page'); ?>>
    <h1 class="entry-title"><?php the_title(); ?></h1>
    <div class="entry-content">
    <?php if ( has_post_thumbnail() ) { echo '<div class="img_holder">'; the_post_thumbnail('article'); echo '</div>'; } the_content(); ?>
    <?php wp_link_pages('before=<div class="page-link">' . __( 'Pages:', 'nifu' ) . '&after=</div>') ?>
    </div>
  </div>
  <?php comments_template( '', true ); ?>
<?php// get_sidebar(); ?>
<?php get_footer(); ?>