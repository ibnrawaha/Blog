 <!-- Scripts -->
    <script src="{{ asset('js/app.js') }}"></script>


    <!-- Bootstrap core JavaScript -->
    <script src="{{ asset('js/jquery.min.js') }}"></script>
    <script src="{{ asset('js/bootstrap.bundle.min.js') }}"></script>


    <!-- Plugin JavaScript -->
    <script src="{{ asset('js/jquery.easing.min.js') }}"></script>

    <!-- Contact form JavaScript -->
    <script src="{{ asset('js/jqBootstrapValidation.js') }}"></script>
    <script src="{{ asset('js/contact_me.js') }}"></script>

    <!-- Custom scripts for this template -->
    <script src="{{ asset('js/agency.min.js') }}"></script>

    {{-- CK EDITOR --}}
    <script src="/vendor/unisharp/laravel-ckeditor/ckeditor.js"></script>
    

    {{-- Slick Slider --}}
    <script src="{{ asset('js/jquery-1.7.min.js') }}"></script>
    <script src="{{ asset('js/jquery-1.7.js') }}"></script>
    <script type="text/javascript" src="{{ asset('slick/slick.min.js') }}"></script>




<!-- Scripts initializor -->

    <script>
        CKEDITOR.replace( 'article-ckeditor' );
    </script>
    
    <script type="text/javascript"> 
        $(document).ready(function(){
          $('.kik-slider').slick({
            autoplay: true,
            dots: false,
            arrows: true,
            infinite: true
          });
        });
    </script>

<!--

    <script>
        $(document).ready(function(){
            $("#btn").click(function(){
                $("#ajaxTest").load("{{asset('/data.txt')}}" , alert("Are you sure?"));
            });
        });
    </script>
--> 

<script>
    
    // var btn = document.getElementById("btn");


    // btn.onclick = function(){document.getElementById("ajaxTest").innerHTML = "<p>Changed</p>";};

    function changeTXT(){
        document.getElementById("ajaxTest").innerHTML = "<p>Changed</p>";
    }

</script>
