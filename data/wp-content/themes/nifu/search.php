<?php get_header(); ?>
<div class="section search">
<?php if ( have_posts() ) : ?>
<h1 class="page-title"><?php _e( 'Search Results for ', 'nifu' ); ?><span><?php the_search_query(); ?></span></h1>

<?php while ( have_posts() ) : the_post() ?>
<div id="post-<?php the_ID(); ?>" <?php post_class('article-first'); ?>>
  <p class="date"><?php the_time( get_option( 'date_format' ) ); ?></p>
  <h1 class="entry-title"><a href="<?php the_permalink(); ?>" title="<?php printf( __('Read', 'nifu'), the_title_attribute('echo=0') ); ?>" rel="bookmark"><?php the_title(); ?></a></h1>
  <?php if ( has_post_thumbnail() ) { the_post_thumbnail('thumbs'); echo '<p class="imgBefore">'; } else { echo '<p>'; } echo excerpt(35); echo '</p>'; ?>
</div>
<?php endwhile; ?>
<?php global $wp_query; $total_pages = $wp_query->max_num_pages; if ( $total_pages > 1 ) { 
$big = 999999999; // need an unlikely integer
echo paginate_links( array(
	'base' => str_replace( $big, '%#%', get_pagenum_link( $big ) ),
	'format' => '?paged=%#%',
	'mid_size'     => 4,
	'current' => max( 1, get_query_var('paged') ),
	'total' => $wp_query->max_num_pages,
	'prev_next'    => True,
	'next_text'    => '&raquo;',
	'prev_text'    => '&laquo;'
)); } ?>
<?php else : ?>
<div id="post-0" class="post no-results not-found">
<h2 class="entry-title"><?php _e( 'Nothing Found', 'nifu' ) ?></h2>
<div class="entry-content">
<p><?php _e( 'Sorry, nothing matched your search. Please try again.', 'nifu' ); ?></p>
<?php get_search_form(); ?>
</div>
</div>
<?php endif; ?>
</div>
<?php get_sidebar(); ?>
<?php get_footer(); ?>