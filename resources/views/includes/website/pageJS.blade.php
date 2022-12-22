
<!-- jQuery -->
<script src="{{ asset('assets/website/js/jquery-2.1.0.min.js')}}"></script>

<!-- Bootstrap -->
<script src="{{ asset('assets/website/js/popper.js')}}"></script>
<script src="{{ asset('assets/website/js/bootstrap.min.js')}}"></script>

<!-- Plugins -->
<script src="{{ asset('assets/website/js/owl-carousel.js')}}"></script>
<script src="{{ asset('assets/website/js/accordions.js')}}"></script>
<script src="{{ asset('assets/website/js/datepicker.js')}}"></script>
<script src="{{ asset('assets/website/js/scrollreveal.min.js')}}"></script>
<script src="{{ asset('assets/website/js/waypoints.min.js')}}"></script>
<script src="{{ asset('assets/website/js/jquery.counterup.min.js')}}"></script>
<script src="{{ asset('assets/website/js/imgfix.min.js')}}"></script> 
<script src="{{ asset('assets/website/js/slick.js')}}"></script> 
<script src="{{ asset('assets/website/js/lightbox.js')}}"></script> 
<script src="{{ asset('assets/website/js/isotope.js')}}"></script> 

<!-- Global Init -->
<script src="{{ asset('assets/website/js/custom.js')}}"></script>

<script>

    $(function() {
        var selectedClass = "";
        $("p").click(function(){
        selectedClass = $(this).attr("data-rel");
        $("#portfolio").fadeTo(50, 0.1);
            $("#portfolio div").not("."+selectedClass).fadeOut();
        setTimeout(function() {
          $("."+selectedClass).fadeIn();
          $("#portfolio").fadeTo(50, 1);
        }, 500);
            
        });
    });

</script>