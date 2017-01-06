/**
 * Created by HolyAnger on 20.12.2016.
 */
$(document).ready(function() {
    setTimeout(function () {
        $('#myImage').css({'display':'block', 'animation':'left .9s linear'});
        $('#myInfo').css({'display':'block', 'animation':'right .9s linear'});
        $('#link').css({'display':'block', 'animation':'height .9s linear'});
    }, 150);


    $('#open_menu').click(function(){
        $('#open_menu').css({'animation':'rotate .7s infinite'});

        setTimeout(function () {
            $('#fade').css('display', 'block');
            $("body").addClass("fixed");
        },480);
    });

    $('#close_menu').click(function(){
        $('#fade').css('display', 'none');
        $("body").removeClass("fixed");
        $('#open_menu').css({'animation':'none'});
    });
});