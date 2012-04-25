<?php get_header(); ?>
  <div class="section folder">
  <?php the_post(); ?>
    <h1 class="page-title"><?php $title = get_category(get_query_var('cat')); echo $title->cat_name; ?></h1>
    <?php $categorydesc = category_description(); if ( !empty($categorydesc) ) echo apply_filters( 'archive_meta', '<div class="archive-meta">' . $categorydesc . '</div>' ); ?>
    <?php rewind_posts(); ?>
    <?php if(!is_category('latest_calls')) { global $wp_query; $total_pages = $wp_query->max_num_pages; if ( $total_pages > 1 ) { 
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
      )); }} wp_reset_query(); 
    if(is_category('latest_calls')) { ?>
      <div id="latest_wrapper">
        <a href="<?php $Link_def = get_category_by_slug('userdef_calls'); echo esc_url(get_category_link($Link_def->term_id)); ?>"><?php echo get_category_by_slug('userdef_calls')->name; ?></a>
        <a href="<?php $Link_all = get_category_by_slug('latest_calls'); echo esc_url(get_category_link($Link_all->term_id)); ?>"><?php echo get_category_by_slug('latest_calls')->name; ?></a>
      </div>
    <?php } ?>
    <?php $childCat = get_term_children(get_query_var('cat'), 'category'); 
    //print_r(array_merge((array)$childCat));
    query_posts(array('cat' => get_query_var('cat'), 'category__not_in' => array_merge((array)$childCat)));
    while ( have_posts() ) : the_post(); ?>
    
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
    )); } wp_reset_query(); ?>
  </div>
<?php get_sidebar(); ?>
<?php get_footer(); ?>