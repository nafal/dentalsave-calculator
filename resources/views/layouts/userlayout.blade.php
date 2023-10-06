<!DOCTYPE html>
<html lang="en">
    <head>

        <title>DentalSave</title>
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <!-- Google Tag Manager -->
		<script>(function(w,d,s,l,i){w[l]=w[l]||[];w[l].push({'gtm.start':
		new Date().getTime(),event:'gtm.js'});var f=d.getElementsByTagName(s)[0],
		j=d.createElement(s),dl=l!='dataLayer'?'&l='+l:'';j.async=true;j.src=
		'https://www.googletagmanager.com/gtm.js?id='+i+dl;f.parentNode.insertBefore(j,f);
		})(window,document,'script','dataLayer','GTM-PVKVK9W');</script>
		<!-- End Google Tag Manager -->

        <!-- Bootstrap -->
        <link href="{{ URL::asset('userassets/css/bootstrap.min.css') }}" rel="stylesheet">
        <!-- font awesome for icons -->
        <link href="{{ URL::asset('userassets/css/font-awesome.min.css') }}" rel="stylesheet">

        <!-- animated css  -->
        <link href="{{ URL::asset('userassets/css/animate.css') }}" rel="stylesheet" type="text/css" media="screen">
        <!--owl carousel css-->


        <link rel="stylesheet" href="{{ URL::asset('userassets/css/header-banner.css') }}" media="all">

        <script src="{{ URL::asset('userassets/js/jquery.min.js') }}"></script> 
		<script>
		 $(document).ready(function(){
			 $('#burger').click(function(){
				
				$('#cssmenu').toggle();
				 
			 });
		 });
		</script>

        <link href="{{ URL::asset('userassets/css/extracss.css') }}" rel="stylesheet" type="text/css" media="screen">

        <link rel="stylesheet" type="text/css" href="https://cdnjs.cloudflare.com/ajax/libs/jqueryui/1.12.1/jquery-ui.min.css">

        <!-- custom css-->
        <link href="{{ URL::asset('userassets/css/style.css') }}" rel="stylesheet" type="text/css" media="screen">
        <link href="{{ asset('css/assets/css/header-banner.css') }}" rel="stylesheet" type="text/css" >
    </head>
    <body>
    	<!-- Google Tag Manager (noscript) -->
<noscript><iframe src="https://www.googletagmanager.com/ns.html?id=GTM-PVKVK9W"
height="0" width="0" style="display:none;visibility:hidden"></iframe></noscript>
<!-- End Google Tag Manager (noscript) -->
    <section id="container" >
        <!-- **********************************************************************************************************************************************************
        TOP BAR CONTENT & NOTIFICATIONS
        *********************************************************************************************************************************************************** -->
        <!--header start-->
        @include('includes.userheader')
        <!--header end-->
        <!-- **********************************************************************************************************************************************************
        MAIN SIDEBAR MENU
        *********************************************************************************************************************************************************** -->


        <!-- **********************************************************************************************************************************************************
         MAIN SIDEBAR MENU end
        *********************************************************************************************************************************************************** -->
        <!--main content start-->
        <section id="main-content">
            @yield('content')
        </section>

        <!--main content end-->
        <footer class="site-footer">
            @include('includes.userfooter')
        </footer>
    </section>
    <!--scripts and plugins --> 
    <!--must need plugin jquery--> 
    <!--bootstrap js plugin--> 
    <script src="{{ URL::asset('userassets/js/bootstrap.min.js') }}" type="text/javascript"></script> 
    <!--easing plugin for smooth scroll--> 
    <script src="{{ URL::asset('userassets/js/jquery.easing.1.3.min.js') }}" type="text/javascript"></script> 
    <!--flex slider plugin--> 
    <!--digit countdown plugin--> 
   


    <script>
$(document).ready(function () {
    $('body').append('<div id="toTop" class="backtotop"><i class="fa fa-angle-up"></i></div>');
    $(window).scroll(function () {
        if ($(this).scrollTop() != 0) {
            $('#toTop').fadeIn();
        } else {
            $('#toTop').fadeOut();
        }
    });
    $('#toTop').click(function () {
        $("html, body").animate({scrollTop: 0}, 600);
        return false;
    });
});

    </script><!--back to top button-->



    <script src="https://cdnjs.cloudflare.com/ajax/libs/jqueryui/1.12.1/jquery-ui.min.js"></script>

</body>
</html>
