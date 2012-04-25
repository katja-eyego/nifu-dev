$(function(){

    /*
var maxHeight = -1;

     $('#topmenu li li .sub-menu').not($('#topmenu li li li .sub-menu')).each(function() {
       maxHeight = maxHeight > $(this).height() ? maxHeight : $(this).height();
     });
  
     $('#topmenu li li .sub-menu').not($('#topmenu li li li .sub-menu')).each(function() {
       $(this).height(maxHeight);
     });
*/
    
    //$('#header').css('margin-top', maxHeight+20);
    
    /*
$('#menuhide.show a').live('click', function(){
      $('#topmenu .sub-menu').hide();
      $('#header').animate({'margin-top': '16px'});
      $(this).text('Vis meny');
      $(this).parent().removeClass('show').addClass('hide');
      return false;
    });
    
    $('#menuhide.hide a').live('click', function(){
      $('#topmenu .sub-menu').slideDown('slow');
      $('#header').animate({'margin-top': maxHeight+20});
      $(this).text('Skjul meny');
      $(this).parent().removeClass('hide').addClass('show');
      return false;
    });
*/

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
    /*

    $($('#topmenu ul:first li .sub-menu:first')).each(function(){
      $(this).addClass('closed');
    });
    
    $('#topmenu ul:first li').mouseenter(function(){
      if($(this).find('.sub-menu.opened').length) {
        $('.sub-menu.opened').removeClass('opened').addClass('closed').slideUp('fast');
      }
      $(this).find('.sub-menu:first').slideDown('slow').removeClass('closed').addClass('opened');
      $(this).find('.sub-menu:first').closest('li').css('background', '#E4E8EB');
      $(this).find('a').css('color', '#878D91');
    });
    
    $('.sub-menu.opened').live('mouseleave', function(){
      $(this).slideUp('fast').removeClass('opened').addClass('closed');
      $(this).closest('li').css('background', 'none');
      $(this).closest('li').find('a').css('color', '#fff');
    });
*/
    
    
    $('.left-column .linkages .current-menu-item').each(function(){
      $(this).closest('ul').find('li').not($(this).closest('ul').find('li li')).addClass('current-menu-item-sister');
    });
    
    $('.left-column .linkages .current-menu-ancestor').each(function(){
      $(this).closest('ul').find('li').not($(this).closest('ul').find('li li')).addClass('current-menu-ancestor-sister');
    });
    
    if($('p.user_def').length) {
    
      var user = $('#page').attr('class'),
      news_check_state = $('.user_def input[name="userdef_news"]').attr('checked'),
      calls_check_state = $('.user_def input[name="userdef_calls"]').attr('checked'),
      news_check = $('.user_def input[name="userdef_news"]'),
      calls_check = $('.user_def input[name="userdef_calls"]'),
      type = $('.user_def input').attr('name'),
      post_id = $('.user_def input').closest('div.post').attr('id').split('post-')[1],
      url = '';
      //alert(post_id)
      
      /*
$(calls_check).change(function(){
        $.ajax({  
          type: "POST",  
          url: url, 
          success: function() { 
            console.log('success');
          },
          error: function() {  
            alert ("NO go");
          }, 
        });
      });
      
      $(news_check).change(function(){
        $.ajax({  
          type: "POST",  
          url: url, 
          success: function() { 
            console.log('success');
          },
          error: function() {  
            alert ("NO go");
          }, 
        });
      });
*/
      
    }
    
});