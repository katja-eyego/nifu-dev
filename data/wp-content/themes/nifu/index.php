<?php get_header(); ?>

<?php $internal = query_posts( array( 'category_name' => 'internal', 'category__not_in' => get_category_by_slug('internal-ad')->term_id, 'posts_per_page' => 5, 'orderby' => 'title', 'order' => 'ASC', 'depth' => 1 ) ); if (have_posts()) : ?>

<div class="section">
  <h1><?php $Title=get_category_by_slug('internal'); echo $Title->cat_name; ?></h1>
  <?php $i = 1; while (have_posts()) : the_post(); if ( $i == 1 ) { ?>
  <div id="post-<?php the_ID(); ?>" <?php post_class('article-first'); ?>>
    <?php if ( has_post_thumbnail() ) { the_post_thumbnail('thumb'); } ?>
    <p class="date"><?php the_time( get_option( 'date_format' ) ); ?></p>
    <h1><a href="<?php the_permalink(); ?>"><?php the_title(); ?></a></h1>
    <?php if ( has_post_thumbnail() ) { echo '<p class="imgBefore">'; } else { echo '<p>'; } echo excerpt(35); echo '</p>'; ?>
  </div>
  <ul>
  <?php } else { ?>
    <li id="post-<?php the_ID(); ?>" <?php post_class(); ?>>
      <span class="date"><?php the_time( get_option( 'date_format' ) ); ?></span> - <p><a href="<?php the_permalink(); ?>"><?php the_title(); ?></a></p>.
    </li>  
  <?php } $i++; endwhile; ?>
  </ul>
  <a class="more" href="<?php $Lenke=get_category_by_slug('internal'); echo esc_url(get_category_link( $Lenke->term_id )); ?>">Flere artikler</a>
</div>
<?php endif; wp_reset_query(); ?>

<?php $external = query_posts( array( 'category_name' => 'external', 'category__not_in' => get_category_by_slug('external-ad')->term_id, 'posts_per_page' => 5, 'orderby' => 'title', 'order' => 'ASC', 'depth' => 1 ) ); if (have_posts()) : ?>

<div class="section">
  <h1><?php $Title=get_category_by_slug('external'); echo $Title->cat_name; ?></h1>
  <?php $i = 1; while (have_posts()) : the_post(); if ( $i == 1 ) { ?>
  <div id="post-<?php the_ID(); ?>" <?php post_class('article-first'); ?>>
    <?php if ( has_post_thumbnail() ) { the_post_thumbnail('thumb'); } ?>
    <p class="date"><?php the_time( get_option( 'date_format' ) ); ?></p>
    <h1><a href="<?php the_permalink(); ?>"><?php the_title(); ?></a></h1>
    <?php if ( has_post_thumbnail() ) { echo '<p class="imgBefore">'; } else { echo '<p>'; } echo excerpt(35); echo '</p>'; ?>
  </div>
  <ul>
  <?php } else { ?>
    <li id="post-<?php the_ID(); ?>" <?php post_class(); ?>>
      <span class="date"><?php the_time( get_option( 'date_format' ) ); ?></span> - <p><a href="<?php the_permalink(); ?>"><?php the_title(); ?></a></p>.
    </li>  
  <?php } $i++; endwhile; ?>
  </ul>
  <a class="more" href="<?php $Lenke=get_category_by_slug('external'); echo esc_url(get_category_link( $Lenke->term_id )); ?>">Flere artikler</a>
</div>
<?php endif; wp_reset_query(); ?>


<?php get_sidebar(); ?>
<?php get_footer(); ?>