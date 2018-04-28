/* 
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */
$(document).ready(function () {
    $('a[href*="#"].checkClass')
            // Remove links that don't actually link to anything
            .not('[href="#"]')
            .not('[href="#0"]')
            .click(function (event) {
                // On-page links
                if (
                        location.pathname.replace(/^\//, '') == this.pathname.replace(/^\//, '')
                        &&
                        location.hostname == this.hostname
                        ) {
                    // Figure out element to scroll to
                    var target = $(this.hash);
                    target = target.length ? target : $('[name=' + this.hash.slice(1) + ']');
                    // Does a scroll target exist?
                    if (target.length) {
                        // Only prevent default if animation is actually gonna happen
                        event.preventDefault();
                        $('html, body').animate({
                            scrollTop: target.offset().top
                        }, 1000);
                    }
                }
            });
});
function showDetailsSliderArticles(div_id){
    $("#showDetailsSliderArticles").show();
    if(div_id==1){
        $("#showDetailsSliderArticles_"+div_id).css('display','inline-block');
        $("#showDetailsSliderArticles_2").css('display','none');
        $("#showDetailsSliderArticles_3").css('display','none');
    }else if(div_id==2){
        $("#showDetailsSliderArticles_"+div_id).css('display','inline-block');
        $("#showDetailsSliderArticles_3").css('display','none');
        $("#showDetailsSliderArticles_1").css('display','none');
    }else if(div_id==3){
        $("#showDetailsSliderArticles_"+div_id).css('display','inline-block');
        $("#showDetailsSliderArticles_1").css('display','none');
        $("#showDetailsSliderArticles_2").css('display','none');
    }
    
}
