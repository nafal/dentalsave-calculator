<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="description" content="">
    <meta name="author" content="Dashboard">
    <meta name="keyword" content="Dashboard, Bootstrap, Admin, Template, Theme, Responsive, Fluid, Retina">

 <!--    <title>Dental Save - Calculator</title> -->
     <title>Dental-Calculator - @yield('title')</title>
 

    <link rel="stylesheet" type="text/css" href="https://cdnjs.cloudflare.com/ajax/libs/jqueryui/1.12.1/jquery-ui.min.css">
    <script src="https://code.jquery.com/jquery-3.2.1.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jqueryui/1.12.1/jquery-ui.min.js"></script> 
    <!-- Bootstrap core CSS -->
    <link href="{{ asset('css/assets/css/bootstrap.css') }}" rel="stylesheet">
    <!--external css-->
    <link href="{{ asset('css/assets/font-awesome/css/font-awesome.css') }}" rel="stylesheet" />
    <link rel="stylesheet" type="text/css" href="{{ asset('css/assets/css/zabuto_calendar.css') }}">
    <link href="{{ asset('css/assets/css/lineicons/style.css') }}" rel="stylesheet">   
    
    <!-- Custom styles for this template -->
    
    <link href="{{ asset('css/assets/css/style.css') }}" rel="stylesheet">
    

    <link href="{{ asset('css/assets/css/style-responsive.css') }}" rel="stylesheet" type="text/css" >
    
    
    
  
       
  </head>

  <body>

  <section id="container" >
      <!-- **********************************************************************************************************************************************************
      TOP BAR CONTENT & NOTIFICATIONS
      *********************************************************************************************************************************************************** -->
      <!--header start-->
       @include('includes.adminheader')
      <!--header end-->
      <!-- **********************************************************************************************************************************************************
      MAIN SIDEBAR MENU
      *********************************************************************************************************************************************************** -->
       @include('includes.adminsidebar')
      
      <!-- **********************************************************************************************************************************************************
       MAIN SIDEBAR MENU end
      *********************************************************************************************************************************************************** -->
      <!--main content start-->
      <section id="main-content">
            @yield('content')
      </section>

      <!--main content end-->
       <footer class="site-footer">
        @include('includes.adminfooter')
          </footer>
  </section>

    <!-- js placed at the end of the document so the pages load faster -->
   
    
   
    <script class="include" type="text/javascript" src="{{ asset('js/jquery.dcjqaccordion.2.7.js') }}"></script>
   
      <script src="{{ asset('css/assets/js/jquery.scrollTo.min.js') }}"></script>
    
    <script src="{{ asset('css/assets/js/jquery.nicescroll.js') }}" type="text/javascript"></script>
   
     <script src="{{ asset('css/assets/js/jquery.sparkline.js') }}"></script>


    <!--common script for all pages-->
   
     <script src="{{ asset('css/assets/js/common-scripts.js') }}"></script>
    
    
     

    <!--script for this page-->
  
     
    <script src="{{ asset('css/assets/js/zabuto_calendar.js') }}"></script>    
    
       <!---
    <script type="application/javascript">
        $(document).ready(function () {
            $("#date-popover").popover({html: true, trigger: "manual"});
            $("#date-popover").hide();
            $("#date-popover").click(function (e) {
                $(this).hide();
            });
        
            $("#my-calendar").zabuto_calendar({
                action: function () {
                    return myDateFunction(this.id, false);
                },
                action_nav: function () {
                    return myNavFunction(this.id);
                },
                ajax: {
                    url: "show_data.php?action=1",
                    modal: true
                },
                legend: [
                    {type: "text", label: "Special event", badge: "00"},
                    {type: "block", label: "Regular event", }
                ]
            });
        });
        
        
        function myNavFunction(id) {
            $("#date-popover").hide();
            var nav = $("#" + id).data("navigation");
            var to = $("#" + id).data("to");
            console.log('nav ' + nav + ' to: ' + to.month + '/' + to.year);
        }
    </script>
  -->

  </body>
</html>
