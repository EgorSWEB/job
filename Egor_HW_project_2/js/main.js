$(document).ready(function(){
    var allEl = $(".a");
    var header = $("header");
    var targetIndex = 0;
    var sect = $(".sup");
    
    var a = $("header nav a");
    a.click(function(e){
        e.preventDefault();
        var hrefAttr = $(this).attr('href');
        targetsec = $(hrefAttr);
        console.log(targetsec.offset().top);
        $('html,body').animate({
            scrollTop: targetsec.offset().top
        }, 1000)
    });
    $(window).scroll(function(){
        targetIndex = -1;
        sect.each(function(index){
            var top = $(this)[0].getBoundingClientRect().top - 300;
            console.log($("#preim").length);
            if (top <= 0){
                targetIndex = index;
            }
        });
        a.removeClass('active');
        if (targetIndex != -1){
            a.eq(targetIndex).addClass('active');
        }
        allEl.each(function(index){
            if(($(this)[0].getBoundingClientRect().top > ($(this).height() * -1)) && ($(this)[0].getBoundingClientRect().top < $(window).height())){
                $(this).addClass("anim");
            }
        })
        if ($(".start_information")[0].getBoundingClientRect().top < ($(".start_information").height()*-1)){
            header.css("position","fixed");
            header.css("top","0");
            header.css("width","100%");
            $(".intro").css("margin-top","50px");
        }else {
            header.removeAttr("style");
            $(".intro").css("margin-top","0");
        }
    });
    $(window).scroll();
    var buttons = $(".buts");
    var numSlider = 0;
    var box = $(".box");
    var mojno = false;
    var widthP = box.find(".review").width();
    var pmas = box.find(".review");
    var dlina = pmas.length;
    box.css('width',(dlina)*widthP + "px"); 
    var x_position, left_position, slide_distance, left_pos_now, left_pos_2, left_pos_3;
    box.tapstart(function(e, move){
        mojno = true;
        x_position = move.offset.x;
        left_position = box.css('left');
        left_position = parseInt(left_position, 10);
        left_pos_2 = left_position;
    })
    box.tapmove(function(e, move){
        if (mojno) {
            slide_distance = move.offset.x - x_position;
            left_position = box.css('left');
            left_position = parseInt(left_position, 10);
            if ((slide_distance < 0 )&&(left_position < -1*(box.width() - widthP))){

            }else if ((slide_distance > 0)&&(left_position > 0)) {

            }else{
                left_pos_now = left_position + slide_distance;
                left_pos_3 = left_pos_now;
                left_pos_now = String(left_pos_now) + "px";
                box.css('left',left_pos_now);
            }
        }
    });
    var animleft;
    box.mouseleave(function() {
        if(mojno){
            mojno = false;
            if (Math.abs(left_pos_3 - left_pos_2) > 100){
                if((numSlider < (dlina - 1))&&(slide_distance < 0)){
                    numSlider = numSlider + 1;
                }else if ((numSlider > 0)&&(slide_distance > 0)){
                    numSlider = numSlider - 1;
                }
                animleft = numSlider*widthP;
                animleft = "-"+String(animleft) + "px";
                box.animate({
                    'left':animleft
                },200);
            }else {
                animleft = numSlider*widthP;
                animleft = "-"+String(animleft) + "px";
                box.animate({
                    'left':animleft
                },200);
            }
        }
        buttons.css('background','#3eb0f7a4');
        buttons.eq(numSlider).css('background','#3eb0f7');
    });
    box.tapend(function (){
        if(mojno){
            mojno = false;
            console.log(Math.abs(left_pos_3 - left_pos_2));
            if (Math.abs(left_pos_3 - left_pos_2) > 100){
                if((numSlider < (dlina - 1))&&(slide_distance < 0)){
                    numSlider = numSlider + 1;
                }else if ((numSlider > 0)&&(slide_distance > 0)){
                    numSlider = numSlider - 1;
                }
                animleft = numSlider*widthP;
                animleft = "-"+String(animleft) + "px";
                box.animate({
                    'left':animleft
                },200);
            }else {
                animleft = numSlider*widthP;
                animleft = "-"+String(animleft) + "px";
                box.animate({
                    'left':animleft
                },200);
            }
        }
        buttons.css('background','#3eb0f7a4');
        buttons.eq(numSlider).css('background','#3eb0f7');
    });
    buttons.click(function(e){
        e.preventDefault();
        numSlider = buttons.index($(this));
        box.animate({
            'left': "-"+numSlider*widthP+"px"
        },500)
        buttons.css('background','#3eb0f7a4');
        $(this).css('background','#3eb0f7');
    });
});
(function(){
    document.addEventListener('DOMContentLoaded',function(){
        var form = document.querySelector('form');
        form.addEventListener('submit', function(e){
            e.preventDefault();
            var request = {
                fio:this.fio.value,
                email:this.email.value
            }
            var xhr = new XMLHttpRequest();
            xhr.open(this.method, this.action);
            xhr.setRequestHeader('Content-Type','application/x-www-form-urlencoded');
            xhr.send('data=' + JSON.stringify(request));
            xhr.onreadystatechange = function(){
                if(xhr.status == 200 && xhr.readyState == 4){
                    var okey = xhr.responseText;
                    if (okey){
                        var div = document.querySelector('#nice');
                        div.style.height = "50px";
                        setTimeout(function(){
                            div.style.height = "0px";
                        },2000);
                    }else{
                        var div = document.querySelector('#notnice');
                        div.style.height = "50px";
                        setTimeout(function(){
                            div.style.height = "0px";
                        },3000);
                    }
                }
            }
        });
    });
    document.body.onload = function(){
        setTimeout(function(){
            var pr = document.body.querySelector(".preloader");
            pr.style.opacity = "0";
            pr.style.zIndex = "-10";
        }, 100)
    }
})();
