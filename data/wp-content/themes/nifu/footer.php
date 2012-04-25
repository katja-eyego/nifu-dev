    </div>
    <div class="right-column">
      <!-- Content: START -->
      <?php wp_nav_menu( array( 'menu' => 'Brukermeny', 'container_id' => 'usermenu', 'menu_id' => 'usercontrol', 'depth' => 1 ) ); ?>
      <div class="outer-head">
      
        <?php $latest = query_posts( array( 'category_name' => 'latest_calls', 'posts_per_page' => 1, 'orderby' => 'title', 'order' => 'DESC' ) ); while (have_posts()) : the_post(); ?>
        <div class="outer-head">
          <h2><?php $Title=get_category_by_slug('latest_calls'); echo $Title->cat_name; ?></h2>
          <div class="box">
            <h3><?php the_title(); ?></h3>
            <a class="ads" href="<?php the_permalink(); ?>">Les mer</a>
            <?php $Lenke=get_category_by_slug('latest_calls');  ?>
            <a class="ads" href="<?php echo esc_url(get_category_link($Lenke->term_id)) ?>">Se alle utlysninger</a>
          </div>
        </div>
        <?php endwhile; wp_reset_query(); ?>
  
      </div>
      <div class="outer-head">
        <h2>Min status</h2>
        <div class="box">
          <ul>
            <li>Faktureringsmål: 1320</li>
            <li>Utfakturert til nå: 750</li>
            <li class="important">Flexitid: 5 timer</li>
          </ul>
        </div>
      </div>
      <!-- Content: END -->
    </div>
  </div>
</div>
<div id="footer">
<p id="copyright">
&copy; <?php echo date("Y") ?> <?php bloginfo( 'name' ) ?>. All Rights Reserved.</a>
</p>
</div>

</div>
<?php wp_footer(); ?>
</body>
</html>