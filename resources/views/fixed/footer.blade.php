<?php ?>
<footer class="py-5">
    <div class="container py-md-5">
        <div class="footer-logo mb-5 text-center">
            <a class="navbar-brand" href="{{url('/')}}">In <span class="display"> Trend</span></a>
        </div>
        <div class="footer-grid">
            <div class="social mb-4 text-center">
                <ul class="d-flex justify-content-center">
                    <li class="mx-2"><a href="https://www.facebook.com/" target="_blank"><span class="fab fa-facebook-f"></span></a></li>
                    <li class="mx-2"><a href="https://twitter.com/" target="_blank"><span class="fab fa-twitter"></span></a></li>
                    <li class="mx-2"><a href="https://github.com/lukavasic4/Intrend" target="_blank"><span class="fab fa-github"></span></a></li>
                    <li class="mx-2"><a href="https://www.linkedin.com/in/luka-vasi%C4%87-a890751a3/" target="_blank"><span class="fab fa-linkedin-in"></span></a></li>
                    <li class="mx-2"><a href="https://www.instagram.com/" target="_blank"><span class="fab fa-instagram"></span></a></li>
                </ul>
            </div>
            <div class="list-footer">
                <ul class="footer-nav text-center">
                    @foreach($meni as $m)
                        @component("partials.link",[
                            "link" => $m
                        ]);
                        @endcomponent
                    @endforeach
                        <li class="nav-item">
                            <a class="nav-link" href="{{asset('PHP2Dokumentacija.pdf')}}" target="_blank">Documentation</a>
                        </li>
                </ul>
            </div>
            <div class="agileits_w3layouts-copyright mt-4 text-center">
                <p>© 2020 Intrend. All Rights Reserved | Design by Luka Vasić</p>
            </div>
        </div>
    </div>
</footer>
<!-- footer -->

<!-- js-scripts -->

<!-- js -->
<script type="text/javascript" src="{{asset('js/jquery-2.2.3.min.js')}}"></script>
<script type="text/javascript" src="{{asset('js/bootstrap.js')}}"></script> <!-- Necessary-JavaScript-File-For-Bootstrap -->
<!-- //js -->

<!-- banner js -->
<script src="{{asset('js/snap.svg-min.js')}}"></script>
<script src="{{asset('js/main.js')}}"></script> <!-- Resource jQuery -->
<!-- //banner js -->

<!-- flexSlider --><!-- for testimonials -->
<script defer src="{{asset('js/jquery.flexslider.js')}}"></script>
<script type="text/javascript">
    $(window).load(function(){
        $('.flexslider').flexslider({
            animation: "slide",
            start: function(slider){
                $('body').removeClass('loading');
            }
        });
    });
</script>
<!-- //flexSlider --><!-- for testimonials -->

<!-- start-smoth-scrolling -->
{{--<script src="{{asset('js/SmoothScroll.min.js')}}"></script>--}}
<script type="text/javascript" src="{{asset('js/move-top.js')}}"></script>
<script type="text/javascript" src="{{asset('js/easing.js')}}"></script>
<script type="text/javascript">
    jQuery(document).ready(function($) {
        $(".scroll").click(function(event){
            event.preventDefault();
            $('html,body').animate({scrollTop:$(this.hash).offset().top},1000);
        });
    });
</script>
<!-- here stars scrolling icon -->
<script type="text/javascript">
    $(document).ready(function() {
        /*
            var defaults = {
            containerID: 'toTop', // fading element id
            containerHoverID: 'toTopHover', // fading element hover id
            scrollSpeed: 1200,
            easingType: 'linear'
            };
        */

        $().UItoTop({ easingType: 'easeOutQuart' });

    });
</script>
<!-- //here ends scrolling icon -->
<!-- start-smoth-scrolling -->

<!-- //js-scripts -->

</body>
</html>
