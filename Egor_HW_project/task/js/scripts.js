$(document).ready(function(){
    $(".header .menu1").click(function(){
        $(".header .menu").slideDown(1000);
    });
    $(".header .menu").mouseleave(function(){
        $(".header .menu").slideUp(1000);
    });
    $(".header .menu1").mouseleave(function(){
        $(".header .menu").slideUp(1000);
    });
    $("a").click(function(){
        $(".menu-mob").removeClass("active");
        $(".menu-button").css("display","inline");
        $(".menu-button").removeAttr("style");
    });
    $(".check").click(function(){
        if($(this).parents(".question").find(".main-p").css("display") == "none"){
            $(this).parents(".question").find(".main-p").slideDown(500,function(){
                $(this).parents(".question").find(".check").find(".arrow").css({
                    "transform":"scaleY(-1)"
                });
                $(this).parents(".question").find(".check").find(".check-text").html("СКРЫТЬ ОТВЕТ");
            });
            $(this).css("padding-top","15px");
            $(this).parents(".question").find(".header-question").css("padding-bottom","15px");
        }else{
            $(this).parents(".question").find(".main-p").slideUp(500,function(){
                $(this).parents(".question").find(".check").find(".arrow").css({
                    "transform":"scaleY(1)"
                });
                $(this).parents(".question").find(".check").find(".check-text").html("ПОКАЗАТЬ ОТВЕТ");
            });
            $(this).css("padding-top","5px");
            $(this).parents(".question").find(".header-question").css("padding-bottom","10px");
        }
    }); 
    var topMenu; 
    $(".menu-button").click(function(){
        console.log();
        if ($(".menu-button").css("height") !== "0px") {
            topMenu = $("body")[0].getBoundingClientRect().top * -1;
            stopMenu = String(topMenu) + "px";
            $(".menu-button").addClass("active");
            $(".menu_flag").css('top', stopMenu);
            $(".menu_flag").addClass("active");
            $(".menu-mob").addClass("active");
        }else{
            $(".menu-mob").removeClass("active");
            $(".menu_flag").removeClass("active");
            $(".menu-button").removeClass("active");
            $(".menu-button").removeAttr("style");
        }
    });
    $(".link").click(function(){
        $(".menu-mob").removeClass("active");
        $(".menu_flag").removeClass("active");
        $(".menu-button").removeClass("active");
        $(".menu-button").removeAttr("style");
    });
});
console.log("Привет, друг, что надо?");