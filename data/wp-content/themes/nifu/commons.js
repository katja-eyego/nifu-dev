$(function(){

    $('#topmenu li .sub-menu li:nth-child(6n)').css('border-right', 'none');
    
    $('.overlay').parent().css('position', 'relative');
    $('.overlay').each(function(){
      $(this).width($(this).parent().width());
    });
    
    $('#searchbox input[type="radio"]').hide();
    
    $('#searchbox a').click(function(){
      $(this).prev('input[type="radio"]').trigger('click');
      $('#searchbox a').removeClass('selected');
      $(this).addClass('selected');
      return false;
    });
    
    if($('body.page').length) {
      if($('body').hasClass('page-parent') && ! $('body').hasClass('page-child')) {
        $('.left-column .subs').hide();
      }
    }
    
    
    $('.left-column .linkages .current-menu-item').each(function(){
      $(this).closest('ul').find('li').not($(this).closest('ul').find('li li')).addClass('current-menu-item-sister');
    });
    
    $('.left-column .linkages .current-menu-ancestor').each(function(){
      $(this).closest('ul').find('li').not($(this).closest('ul').find('li li')).addClass('current-menu-ancestor-sister');
    });
    
    if($('p.user_def').length) {
    
      var user = $('#page').attr('class'),
      /*
news_check_state = $('.user_def input[name="userdef_news"]').attr('checked'),
      calls_check_state = $('.user_def input[name="userdef_calls"]').attr('checked'),
*/
      /*
news_check = $('.user_def input[name="userdef_news"]'),
      calls_check = $('.user_def input[name="userdef_calls"]'),
*/
      type = $('.user_def input').attr('name'),
      check_state = $('.user_def input[name="'+type+'"]').attr('checked'),
      check = $('.user_def input[name="'+type+'"]'),
      post_id = $('.user_def input').closest('div.post').attr('id').split('post-')[1],
      url = '/wp-content/themes/nifu/user.php?type='+type+'&state='+check_state+'&post_id='+post_id;
      //alert(post_id)
      
      $(check).change(function(){
        $.ajax({  
          type: "POST",  
          url: url, 
          success: function() { 
            console.log('success ' + url);
          },
          error: function() {  
            alert ("NO go");
          }, 
        });
      });
      
      /*
$(news_check).change(function(){
        $.ajax({  
          type: "POST",  
          url: url, 
          success: function() { 
            console.log('success ' + url);
          },
          error: function() {  
            alert ("NO go");
          }, 
        });
      });
*/
      
    }
    
});