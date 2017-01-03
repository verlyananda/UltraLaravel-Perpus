<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ config('app.name', 'Laravel') }}</title>

    <!-- Styles --> 
    <link href="{{ asset('css/bootstrap.min.css') }}" rel='stylesheet' type='text/css'>
    <link href="{{ asset('css/app.css') }}" rel="stylesheet">
    <link href="{{ asset('css/jquery.dataTables.css') }}" rel='stylesheet' type='text/css'>
    <link href="{{ asset('css/dataTables.bootstrap.css') }}" rel='stylesheet' type='text/css'>
    <link href="{{ asset('css/selectize.css') }}" rel='stylesheet' type='text/css'>
    <link href="{{ asset('css/selectize.bootstrap3.css') }}" rel="stylesheet">
    <link href="{{ asset('css/theme/assets/css/zabuto_calendar.css') }}" rel='stylesheet' type='text/css'>
    <link href="{{ asset('css/theme/assets/js/gritter/css/jquery.gritter.css') }}" rel='stylesheet' type='text/css'>
    <link href="{{ asset('css/theme/assets/lineicons/style.css') }}" rel="stylesheet">
    <link href="{{ asset('css/theme/assets/css/style.css') }}" rel='stylesheet' type='text/css'>
    <link href="{{ asset('css/theme/assets/css/style-responsive.css') }}" rel='stylesheet' type='text/css'>


    <!-- Scripts -->
    <script>
        window.Laravel = <?php echo json_encode([
            'csrfToken' => csrf_token(),
        ]); ?>
    </script>
</head>
<body>
       <!--header start-->

      <header class="header black-bg">
              <div class="sidebar-toggle-box">
                  <div class="fa fa-bars tooltips" data-placement="right" data-original-title="Toggle Navigation"></div>
              </div>
            <!--logo start-->
            <a href="{{ url('')}} " class="logo"><b>UltraPerpus</b></a>
            <!--logo end-->
            <div class="nav notify-row" id="top_menu">
                <!--  notification start -->
               
                    
            
            </div>

            <div class="top-menu">
          
                <ul class="nav pull-right top-menu">
                   @if (Auth::guest())
                  <li><a class="logout" href="{{ url('/login') }}">Login</a></li>
                        <li> <a class="logout"  href="{{ url('/register') }}">Daftar</a></li>
                        @else
                   <li>
                                    <a class="logout" href="{{ url('/logout') }}"
                                        onclick="event.preventDefault();
                                                 document.getElementById('logout-form').submit();">
                                        Logout
                                    </a>

                                    <form id="logout-form" action="{{ url('/logout') }}" method="POST" style="display: none;">
                                        {{ csrf_field() }}
                                    </form>
                                </li>
                                @endif
                </ul>
            </div>
        </header>
      @if (Auth::check()) 
        <aside>
          <div id="sidebar"  class="nav-collapse ">
              <!-- sidebar menu start-->
              <ul class="sidebar-menu" id="nav-accordion">
              
                  <p class="centered"><a href="#"><img src="{{ asset('css/theme/assets/img/ui-sam.jpg') }}" class="img-circle" width="60"></a></p>
                  <h5 class="centered"> {{ Auth::user()->name }}</h5>
                    @if (Auth::check())
                  <li class="mt">
                      <a  href="{{ url('/Listbook') }}">
                          <i class="fa fa-dashboard"></i>
                          <span>List Buku</span>
                      </a>
                  </li>
                  @endif
@role('admin')
                  <li class="sub-menu">
                      <a href="javascript:;" >
                          <i class="fa fa-desktop"></i>
                          <span>Kelola Penulis</span>
                      </a>
                      <ul class="sub">
                          <li><a  href="{{ route('authors.index') }}">Penulis</a></li>
                      
                      </ul>
                  </li>

                
                  <li class="sub-menu">
                      <a href="javascript:;" >
                          <i class="fa fa-book"></i>
                          <span>Kelola Buku</span>
                      </a>
                      <ul class="sub">
                          <li><a href="{{ route('books.index') }}">Buku</a></li>
                        
                      </ul>
                  </li>
                  @endrole
                
              
                 

              </ul>
              <!-- sidebar menu end-->
          </div>
      </aside>
      @endif
      @include('layouts._flash')   
    @yield('content')
        


    <!-- Scripts -->
 
    <script src="{{ asset('js/jquery-3.1.0.min.js') }}"></script>
    <script src="{{ asset('js/bootstrap.min.js') }}"></script>
    <script src="{{ asset('js/jquery.dataTables.min.js') }}"></script>
    <script src="{{ asset('js/dataTables.bootstrap.min.js') }}"></script>
    <script src="{{ asset('js/selectize.min.js') }}"></script>
    <script src="{{ asset('js/custom.js') }}"></script>
    <script class="include" type="text/javascript" src="{{ asset('css/theme/assets/js/jquery.dcjqaccordion.2.7.js') }}"></script>
    <script src="{{ asset('css/theme/assets/js/jquery.scrollTo.min.js') }}"></script>
    <script src="{{ asset('css/theme/assets/js/jquery.nicescroll.js') }}" type="text/javascript"></script>
    <script src="{{ asset('css/theme/assets/js/jquery.sparkline.js') }}"></script>


    <!--common script for all pages-->
    <script src="{{ asset('css/theme/assets/js/common-scripts.js') }}"></script>
    
    <script type="text/javascript" src="{{ asset('css/theme/assets/js/gritter/js/jquery.gritter.js') }}"></script>
    <script type="text/javascript" src="{{ asset('css/theme/assets/js/gritter-conf.js') }}"></script>

    <!--script for this page-->
    <script src="{{ asset('css/theme/assets/js/sparkline-chart.js') }}"></script>    
    <script src="{{ asset('css/theme/assets/js/zabuto_calendar.js') }}"></script>    
    
  
    @yield('scripts')
</body>
</html>
