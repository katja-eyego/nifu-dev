<?php

$prefix = 'nifu_';

$meta_box = array(
    'id' => 'my-meta-box',
    'title' => 'Page belongs to category',
    'page' => 'page',
    'context' => 'normal',
    'priority' => 'high',
    'fields' => array(
        array(
            'name' => 'Page category',
            'id' => $prefix . 'category',
            'type' => 'select',
			      'std' => ''
        )
    )
);

add_action('admin_menu', 'mytheme_add_box');

// Add meta box
function mytheme_add_box() {
    global $meta_box;

    add_meta_box($meta_box['id'], $meta_box['title'], 'mytheme_show_box', $meta_box['page'], $meta_box['context'], $meta_box['priority']);
} 

// Callback function to show fields in meta box
function mytheme_show_box() {
    global $meta_box, $post;

    // Use nonce for verification
    echo '<input type="hidden" name="mytheme_meta_box_nonce" value="', wp_create_nonce(basename(__FILE__)), '" />';

    echo '<table class="form-table">';

    foreach ($meta_box['fields'] as $field) {
        // get current post meta data
        $meta = get_post_meta($post->ID, $field['id'], true);
        echo '<tr>',
                '<td style="width:10%"><label for="', $field['id'], '">', $field['name'], '</label></td>',
                '<td>'; 
                echo '<select id="category_names" name="', $field['id'], '" value="', $meta ? $meta : $field['std'], '">
                  <option>Velg kategori</option>';
                  $cats = get_categories();
                    foreach ($cats as $cat) {
                      echo "<option class='cat_bg-option' value='" . $cat->slug . "'>" . $cat->name . "</option>\n";
                    }  
              echo "</select>
              <input type='hidden' name='slide_cat' id='slide_cat' value='" , $meta ? $meta : $field['std'] , "' />";
                
                break;
			  echo     '<td>',
            '</tr>';
    }
    echo '</table>';
    ?>
    <script type="text/javascript">   
    jQuery(document).ready(function(){	 
     jQuery('#category_names option').each( function(index) {
     console.log('||' +  jQuery(this).val() + '|| ||' + jQuery('#slide_cat').val() + '||')
     if( jQuery(this).val() == jQuery('#slide_cat').val() ){
       jQuery(this).attr('selected', 'selected');
     }
    });  
    jQuery('#category_names').change(function() {
       jQuery('#slide_cat').val(jQuery('#category_names option:selected').val());
     }); 
    });        
    </script>  
    <?php
} 

add_action('save_post', 'mytheme_save_data');

// Save data from meta box
function mytheme_save_data($post_id) {
    global $meta_box;

    // verify nonce
    if (!wp_verify_nonce($_POST['mytheme_meta_box_nonce'], basename(__FILE__))) {
        return $post_id;
    }

    // check autosave
    if (defined('DOING_AUTOSAVE') && DOING_AUTOSAVE) {
        return $post_id;
    }

    // check permissions
    if ('page' == $_POST['post_type']) {
        if (!current_user_can('edit_page', $post_id)) {
            return $post_id;
        }
    } elseif (!current_user_can('edit_post', $post_id)) {
        return $post_id;
    }

    foreach ($meta_box['fields'] as $field) {
        $old = get_post_meta($post_id, $field['id'], true);
        $new = $_POST[$field['id']];

        if ($new && $new != $old) {
            update_post_meta($post_id, $field['id'], $new);
        } elseif ('' == $new && $old) {
            delete_post_meta($post_id, $field['id'], $old);
        }
    }
}	

