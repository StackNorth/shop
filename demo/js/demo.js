/**
 * Created by DASLINK01 on 2016/8/16.
 */

$(function () {
   $('#type').click(function () {

       var type = $(this).data('type');

       if (type == 'off'){

           $('.menu strong').html("<i class='iconfont'>&#x343c;</i>");
           $('.panel-title a span').hide();


           $('.container-sidebar').css({
               'width' : '5%'
           });
           $('.main-content').css({
               'margin-left' : '5%'
           });

           $(this).html("<strong><i class='iconfont'>&#xe66a;</i></strong>");
           $(this).data('type', 'on');

       }else {

           $('.menu strong').html("<strong>菜单&nbsp;<i class='iconfont'>&#x343c;</i><strong>");
           $('.panel-title a span').show();


           $('.container-sidebar').css({
               'width' : '15%'
           });
           $('.main-content').css({
               'margin-left' : '15%'
           });

           $(this).html("<strong><i class='iconfont' style='font-size: 22px; '>&#xe66b;</i></strong>");
           $(this).data('type', 'off');
       }
   }) ;

    
    $(".list-group-item").mouseenter(function(){
        $(this).css({
            'background-color' : 'rgb(247,144,129)',
            'color': '#fff'
        });
    });
    $(".list-group-item").mouseleave(function(){
        $(this).css({
            'background-color' : 'rgb(248,247,242)',
            'color': 'rgb(189,189,189)'
        });
    });
});