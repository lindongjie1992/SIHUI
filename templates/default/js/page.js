$(function(){

    /**
     * 头部导航高亮
     */
    (function(){
        var href = window.location.href.split('/')[window.location.href.split('/').length-1].substr(0,4);
        if(href == ''){
            $('.head-nav a[href^=index]').addClass('active');
        } else {
            $('.head-nav a[href^='+ href +']').addClass('active');
        }
    })();


    /**
     * 内页侧边导航高亮
     */
    (function(){
        if($('.m-page-nav').length < 1) return;
        var id = $('#active-nav-id').val();
        var name = $('#active-nav-name').val();
        $('.m-page-nav a[href^='+ name +'-'+ id +']').addClass('active');
    })();

});