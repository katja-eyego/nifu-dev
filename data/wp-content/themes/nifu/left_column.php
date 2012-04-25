      <div class="left-column">
        <!-- Content: START -->
        <?php
        if(is_home()) { 
          $announce = query_posts( array( 'category_name' => 'announcements', 'posts_per_page' => 1, 'orderby' => 'title', 'order' => 'DESC' ) ); while (have_posts()) : the_post(); ?>
          <div class="inner-head">
            <div class="box">
              <?php 
                  echo '<a class="post-' , the_ID() , '" href="' , the_permalink() , '"><h1>' , the_title() , '</h1></a><p>' , excerpt(20) , '</p>';
             ?>    
            </div>
          </div>
          <?php endwhile;  wp_reset_query(); ?>
          
          <?php $faceOfWeek = query_posts( array( 'category_name' => 'face_ofthe_week', 'posts_per_page' => 1, 'orderby' => 'title', 'order' => 'DESC' ) ); while (have_posts()) : the_post(); ?>
          <div class="outer-head">
            <h2><?php $Title=get_category_by_slug('face_ofthe_week'); echo $Title->cat_name; ?></h2>
            <div class="box">
              <a href="<?php the_permalink(); ?>"><?php if ( has_post_thumbnail() ) { the_post_thumbnail('sidebar'); } ?></a>
              <h3 class="overlay"><a href="<?php the_permalink(); ?>"><?php the_title(); ?></a><span><a href="mailto:sveinung.skule@nifu.no?subject=Ukas&nbsp;Ansikt&nbsp;Tips!">Tips!</a></span></h3>
            </div>
          </div>
          <?php endwhile; wp_reset_query(); ?>
          
          <?php $interPro = query_posts( array( 'category_name' => 'interne-prosjekter', 'posts_per_page' => 3, 'orderby' => 'title', 'order' => 'DESC' ) ); ?>
          <div class="outer-head">
            <h2><?php $Title=get_category_by_slug('interne-prosjekter'); echo $Title->cat_name; ?></h2>
            <div class="box">
              <ul class="bullet">
                <?php  while (have_posts()) : the_post(); ?>
                  <li><a href="<?php the_permalink(); ?>"><?php the_title(); ?></a></li>
                <?php endwhile; ?>
              </ul>
              <?php $Lenke=get_category_by_slug('interne-prosjekter');  ?>
              <a href="<?php echo esc_url(get_category_link( $Lenke->term_id )); ?>" class="all">Se alle...</a>
            </div>
          </div>
          <?php wp_reset_query();
           
        } else { 
        
          if(is_category(array('internal', 'external')) || in_category(array('internal', 'external'))) {
            echo '<div class="outer-head"><h2>Nyheter</h2><ul class="linkages">
                  <!-- <li><a class="visible" href="', esc_url(get_category_link(get_category_by_slug('all_news'))) ,'">',get_category_by_slug('all_news')->name,'</a></li> -->
                  <li><a class="visible" href="', esc_url(get_category_link(get_category_by_slug('internal'))) ,'">',get_category_by_slug('internal')->name,'</a></li>
                  <li><a class="visible" href="', esc_url(get_category_link(get_category_by_slug('external'))) ,'">',get_category_by_slug('external')->name,'</a></li>';
                  if(get_posts('category_name=userdef_news')) {
                  echo '<li><a class="visible" href="', esc_url(get_category_link(get_category_by_slug('userdef_news'))) ,'">',get_category_by_slug('userdef_news')->name,'</a></li>';
                  }
                  echo '</ul></div>';
          }
          
          if (is_category()) { 
            $active = get_category(get_query_var('cat')); $barn = $active->slug . '-ad'; 
          } else if(is_page()) {
            $active = get_category_by_slug(get_post_meta($post->ID, 'nifu_category', true)); $barn = $active->slug . '-ad'; 
            echo '<div class="subs">';
            echo '<div class="outer-head"><h2>' , $active->name , '</h2>'; ?>
            <!-- //if ( is_page($post->ID) || $post->post_parent==$post->ID ) { -->
              
                <?php wp_nav_menu(array('menu' => 'Akkvisisjon og prosjekt', 'container_class' => 'leftmenu outer-head', 'menu_class' => 'linkages' )); ?>
                <?php wp_nav_menu(array('menu' => 'Bibliotek', 'container_class' => 'leftmenu outer-head', 'menu_class' => 'linkages')); ?>
                <?php wp_nav_menu(array('menu' => 'Dokumenter', 'container_class' => 'leftmenu outer-head', 'menu_class' => 'linkages')); ?>
                <?php wp_nav_menu(array('menu' => 'Personal', 'container_class' => 'leftmenu outer-head', 'menu_class' => 'linkages')); ?>
                <?php wp_nav_menu(array('menu' => 'IKT', 'container_class' => 'leftmenu outer-head', 'menu_class' => 'linkages')); ?>
                <?php wp_nav_menu(array('menu' => 'Huset', 'container_class' => 'leftmenu outer-head', 'menu_class' => 'linkages')); ?>
                <?php wp_nav_menu(array('menu' => 'Organisasjon', 'container_class' => 'leftmenu outer-head', 'menu_class' => 'linkages')); ?>
               
              <?php
              echo '</div>';
            //} 
            echo '</div>'; 
          } else { 
            $active = get_the_category(); $barn = $active[0]->slug . '-ad'; 
          } $barnID = get_category_by_slug($barn)->term_id; ?>
          <?php $ads = query_posts( array( 'cat' => $barnID, 'posts_per_page' => 1, 'orderby' => 'title', 'order' => 'DESC' ) ); while (have_posts()) : the_post(); ?>
          <div class="outer-head ad">
            <div class="box">
              <?php if ( has_post_thumbnail() ) { the_post_thumbnail('sidebar'); } ?>
              <h3><?php the_title(); ?></h3>
              <p><?php the_content(); ?></p>
            </div>
          </div>
          <?php endwhile; 
          wp_reset_query(); 
        } ?>
      <!-- Content: END -->
      </div>