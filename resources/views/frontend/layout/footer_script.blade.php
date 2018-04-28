<!-- Bootstrap core JavaScript
        ================================================== -->
<!-- Placed at the end of the document so the pages load faster -->
<script type="text/javascript" src="{{ asset('project/frontend/js/jquery.js')}}"></script>
<script type="text/javascript" src="{{ asset('project/common/js/bootstrap.min.js')}}"></script>
<script type="text/javascript" src="{{ asset('project/frontend/js/jquery-ui.js')}}"></script>
<script type="text/javascript" src="{{ asset('project/frontend/js/useful-gallery.js')}}"></script>
<script type="text/javascript" src="{{ asset('project/frontend/js/tabs.js')}}"></script>

<script type="text/javascript" src="{{ asset('project/frontend/js/cbpFWTabs.js')}}"></script>
<!--<script src="./vendor/chart.js/chart.min.js"></script>-->
<!--<script src="{{ asset('project/frontend/js/demo.js')}}"></script>-->
<script type="text/javascript" src="{{ asset('project/frontend/js/explore.js')}}"></script>
<script type="text/javascript" src="{{ asset('project/frontend/js/fixedSocialLink.js')}}"></script>
<script type="text/javascript" src="{{ asset('project/frontend/js/socialLink.js')}}"></script>
<script type="text/javascript" src="{{ asset('project/frontend/js/sliderArticlesToogles.js')}}"></script>
<script type="text/javascript" src="{{ asset('project/frontend/js/databank.js')}}"></script>
<script type="text/javascript" src="{{ asset('project/frontend/js/inside_tab_carousel.js')}}"></script>
<script type="text/javascript" src="{{ asset('project/frontend/js/bootstrap-slider.js')}}"></script>
<!-- slider js -->
<script>
new CBPFWTabs(document.getElementById('tabs'));
</script>
<script src="{{ asset('project/frontend/js/canvasjs.min.js')}}"></script>
<script>
$(document).ready(function () {
$('.dropdown-submenu a.test').on("click", function (e) {
$(this).next('ul').toggle();
e.stopPropagation();
e.preventDefault();
}); 
});
</script>
<script>(function ($) {
        //Function to animate slider captions 
        function doAnimations(elems) {
            //Cache the animationend event in a variable
            var animEndEv = 'webkitAnimationEnd animationend';
            elems.each(function () {
                var $this = $(this),
                        $animationType = $this.data('animation');
                $this.addClass($animationType).one(animEndEv, function () {
                    $this.removeClass($animationType);
                });
            });
        }
        //Variables on page load 
        var $myCarousel = $('#carousel-example-generic'),
                $firstAnimatingElems = $myCarousel.find('.item:first').find("[data-animation ^= 'animated']");
        //Initialize carousel 
        $myCarousel.carousel();
        //Animate captions in first slide on page load 
        doAnimations($firstAnimatingElems);
        //Pause carousel  
        $myCarousel.carousel('pause');
        //Other slides to be animated on carousel slide event 
        $myCarousel.on('slide.bs.carousel', function (e) {
            var $animatingElems = $(e.relatedTarget).find("[data-animation ^= 'animated']");
            doAnimations($animatingElems);
        });
        $('#carousel-example-generic').carousel({
            interval: true,
            pause: "true"
        });

    })(jQuery);
</script>
<script>
    $('.toggle').click(function (e) {
        e.preventDefault();

        var $this = $(this);
        if ($this.parent().hasClass('active')) {
            $this.parent().removeClass('active');
            $this.next().slideUp(350);
        } else {
            $this.parent().parent().find('.accordion_panelbox').removeClass('active');
            $this.parent().parent().find('.accordion_content').slideUp(350);
            $this.parent().toggleClass('active');
            $this.next().slideToggle(350);
        }

    });
</script>
<script type="text/javascript" src="{{ asset('project/frontend/js/popupdiv.js')}}"></script>


    <!--include common ajax method-->
<script type="text/javascript" src="{{ asset('project/common/js/common_ajax.js')}}"></script>
 <script src="https://maps.googleapis.com/maps/api/js?key=AIzaSyDQZHbQuUmnszDX6jFke6sCT2C1C2n5org&callback=initMap"
    async defer></script> 
    <script type="text/javascript" src="{{ asset('project/frontend/js/map_required_conf.js')}}"></script> 
