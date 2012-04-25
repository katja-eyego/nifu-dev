<?php get_header(); ?>
<div id="content">
<?php if ( have_posts() ) : ?>
<h1 class="page-title"><?php _e( 'Search Results for ', 'blankslate' ); ?><span><?php the_search_query(); ?></span></h1>
<?php global $wp_query; $total_pages = $wp_query->max_num_pages; if ( $total_pages > 1 ) { ?>
<div id="nav-above" class="navigation">
<p class="nav-previous"><?php next_posts_link(__( '<span class="meta-nav">&laquo;</span> older articles', 'blankslate' )) ?></p>
<p class="nav-next"><?php previous_posts_link(__( 'newer articles <span class="meta-nav">&raquo;</span>', 'blankslate' )) ?></p>
</div>
<?php } ?>
<?php while ( have_posts() ) : the_post() ?>
<div id="post-<?php the_ID(); ?>" <?php post_class(); ?>>
<h2 class="entry-title"><a href="<?php the_permalink(); ?>" title="<?php printf( __('Read', 'blankslate'), the_title_attribute('echo=0') ); ?>" rel="bookmark"><?php the_title(); ?></a></h2>
<?php if ( $post->post_type == 'post' ) { ?>
<div class="entry-meta">
<span class="meta-prep meta-prep-author"><?php _e('By ', 'blankslate'); ?></span>
<span class="author vcard"><a class="url fn n" href="<?php echo get_author_posts_url(get_the_author_meta('ID')); ?>" title="<?php printf( __( 'View all articles by %s', 'blankslate' ), $authordata->display_name ); ?>"><?php the_author(); ?></a></span>
<span class="meta-sep"> | </span>
<span class="meta-prep meta-prep-entry-date"><?php _e('Published ', 'blankslate'); ?></span>
<span class="entry-date"><abbr class="published" title="<?php the_time('Y-m-d\TH:i:sO') ?>"><?php the_time( get_option( 'date_format' ) ); ?></abbr></span>
<?php edit_post_link( __( 'Edit', 'blankslate' ), "<span class=\"meta-sep\"> | </span>\n\t\t\t\t\t\t<span class=\"edit-link\">", "</span>\n\t\t\t\t\t" ) ?>
</div>
<?php } ?>
<div class="entry-summary">
<?php the_excerpt( __( 'continue reading <span class="meta-nav">&raquo;</span>', 'blankslate' )  ); ?>
<?php wp_link_pages('before=<div class="page-link">' . __( 'Pages:', 'blankslate' ) . '&after=</div>') ?>
</div>
<?php if ( $post->post_type == 'post' ) { ?>
<div class="entry-utility">
<span class="cat-links"><span class="entry-utility-prep entry-utility-prep-cat-links"><?php _e( 'Posted in ', 'blankslate' ); ?></span><?php echo get_the_category_list(', '); ?></span>
<span class="meta-sep"> | </span>
<?php the_tags( '<span class="tag-links"><span class="entry-utility-prep entry-utility-prep-tag-links">' . __('Tagged ', 'blankslate' ) . '</span>', ", ", "</span>\n\t\t\t\t\t\t<span class=\"meta-sep\"> | </span>\n" ) ?>
<span class="comments-link"><?php comments_popup_link( __( 'Leave a comment', 'blankslate' ), __( '1 Comment', 'blankslate' ), __( '% Comments', 'blankslate' ) ) ?></span>
<?php edit_post_link( __( 'Edit', 'blankslate' ), "<span class=\"meta-sep\"> | </span>\n\t\t\t\t\t\t<span class=\"edit-link\">", "</span>\n\t\t\t\t\t\n" ) ?>
</div>
<?php } ?>
</div>
<?php endwhile; ?>
<?php global $wp_query; $total_pages = $wp_query->max_num_pages; if ( $total_pages > 1 ) { ?>
<div id="nav-below" class="navigation">
<p class="nav-previous"><?php next_posts_link(__( '<span class="meta-nav">&laquo;</span> older articles', 'blankslate' )) ?></p>
<p class="nav-next"><?php previous_posts_link(__( 'newer articles <span class="meta-nav">&raquo;</span>', 'blankslate' )) ?></p>
</div>
<?php } ?>
<?php else : ?>
<div id="post-0" class="post no-results not-found">
<h2 class="entry-title"><?php _e( 'Nothing Found', 'blankslate' ) ?></h2>
<div class="entry-content">
<p><?php _e( 'Sorry, nothing matched your search. Please try again.', 'blankslate' ); ?></p>
<?php get_search_form(); ?>
</div>
</div>
<?php endif; ?>
</div>
<?php get_sidebar(); ?>
<?php get_footer(); ?>