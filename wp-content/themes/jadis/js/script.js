jQuery(document).ready(function(){
    var widthWindow = jQuery(window).width();
    // jQuery('#primary-menu').append('<li class="hide-desktop show-tablet more"><a class="link-more" href="#">More</a></li>')
    // var arr = [];
    // jQuery('#primary-menu li').each(function(key, val){
    //     arr.push({
    //              'href' : jQuery(this).find('a').attr('href'),
    //              'title' :jQuery(this).find('a').text(),
    //          })
    // });
    // jQuery('#primary-menu li').each(function(key, val){
    //     if(jQuery(this).find('a').text() == arr[arr.length - 2].title || jQuery(this).find('a').text() == arr[arr.length - 3].title){
    //         jQuery(this).addClass('hide-tablet');
    //     }
    // })
    // jQuery('#primary-menu li.more').append('<ul class="submenu"><li><a title="'+ arr[arr.length - 3].title+'" href="'+ arr[arr.length - 3].href+'">'+ arr[arr.length - 3].title+'</a></li><li><a title="'+ arr[arr.length - 2].title+'" href="'+ arr[arr.length - 2].href +'">'+ arr[arr.length - 2].title +'</a></li></ul>');
    // jQuery('li.more').click(function(){
    //     jQuery(this).find('ul').toggle();
    // })
    jQuery('.menu-button').click(function(){
        jQuery('#primary-menu').toggle();
    })
    if(widthWindow < 1200){
        jQuery('li.menu-item-has-children > a').click(function(e){
            e.preventDefault();
            jQuery(this).next('ul.sub-menu').toggle();
        })
    }

})
jQuery( window ).resize(function() {
    var widthWindow = jQuery(window).width();
    if(widthWindow > 768){
        jQuery('.main-nav > ul').attr('style','');
    }
    if(widthWindow < 1200){
        jQuery('li.menu-item-has-children > a').click(function(e){
            e.preventDefault();
            jQuery(this).next('ul.sub-menu').toggle();
        })
    }
});