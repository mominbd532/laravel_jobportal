<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8" />
    <link rel="apple-touch-icon" sizes="76x76" href="{{asset('assets/img/apple-icon.png')}}">
    <link rel="icon" type="image/png" href="{{asset('assets/img/favicon.png')}}">
    <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1" />
    <title>
        @yield('title')
    </title>
    <meta content='width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=0, shrink-to-fit=no' name='viewport' />
    <!--     Fonts and icons     -->
    <link href="https://fonts.googleapis.com/css?family=Montserrat:400,700,200" rel="stylesheet" />
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.7.1/css/all.css" integrity="sha384-fnmOCqbTlWIlj8LyTjo7mOUStjsKC4pOpQbqyi7RrhN7udi9RwhKkMHpvLbHG9Sr" crossorigin="anonymous">
    <!-- CSS Files -->
    <link href="{{asset('assets/css/bootstrap.min.css')}}" rel="stylesheet" />
    <link href="{{asset('assets/css/now-ui-dashboard.css?v=1.3.0')}}" rel="stylesheet" />
    <!-- CSS Just for demo purpose, don't include it in your project -->
    <link href="{{asset('assets/demo/demo.css" rel="stylesheet')}}" />


</head>

<body class="">
<div class="wrapper ">
    <div class="sidebar" data-color="orange">
        <!--
          Tip 1: You can change the color of the sidebar using: data-color="blue | green | orange | red | yellow"
      -->
        <div class="logo">
            <a href="/" class="simple-text logo-mini">
                JF
            </a>
            <a href="/" class="simple-text logo-normal">
                Job Finder
            </a>
        </div>
        <div class="sidebar-wrapper" id="sidebar-wrapper">
            <ul class="nav">
                <li class="{{'admin' == request()->path() ? 'active':''}}">
                    <a href="/admin">
                        <i class="now-ui-icons design_app"></i>
                        <p>Dashboard</p>
                    </a>
                </li>
                <li class="{{'contactInfo/edit' ==request()->path() ? 'active':''}}">
                    <a href="{{route('admin.contactInfo')}}">
                        <i class="now-ui-icons education_atom"></i>
                        <p>Contact Info</p>
                    </a>
                </li>
                <li class="{{'aboutUs/edit' ==request()->path() ? 'active':''}}">
                    <a href="{{route('admin.aboutUs')}}">
                        <i class="now-ui-icons location_map-big"></i>
                        <p>About Us</p>
                    </a>
                </li>
                <li class="{{'our-team' ==request()->path() ? 'active':''}}">
                    <a href="{{route('admin.ourTeam')}}">
                        <i class="now-ui-icons ui-1_bell-53"></i>
                        <p>Our Team</p>
                    </a>
                </li>
                <li class="{{'registered-role' ==request()->path() ? 'active':''}}">
                    <a href="{{route('admin.registered')}}">
                        <i class="now-ui-icons users_single-02"></i>
                        <p>Users List</p>
                    </a>
                </li>
                <li class="{{'blog' == request()->path() ? 'active':''}}">
                    <a href="{{route('admin.blog')}}">
                        <i class="now-ui-icons design_bullet-list-67"></i>
                        <p>Blog</p>
                    </a>
                </li>

            </ul>
        </div>
    </div>
    <div class="main-panel" id="main-panel">
            @yield('navbar')

        <div class="content">
            @yield('content')

        </div>
        <footer class="footer">
            <div class="container-fluid">
                <nav>
                    <ul>
                        <li>
                            <a href="/">
                                Job Finder
                            </a>
                        </li>
                        <li>
                            <a href="http://presentation.creative-tim.com">
                                About Us
                            </a>
                        </li>
                        <li>
                            <a href="/about-us">
                                Blog
                            </a>
                        </li>
                    </ul>
                </nav>
                <div class="copyright" id="copyright">
                    &copy;
                    <script>
                        document.getElementById('copyright').appendChild(document.createTextNode(new Date().getFullYear()))
                    </script>, Designed by
                    <a href="https://www.invisionapp.com" target="_blank">Invision</a>. Coded by
                    <a href="https://mmtechbd.tk" target="_blank">MM TECH BD</a>.
                </div>
            </div>
        </footer>
    </div>
</div>



<!--   Core JS Files   -->
<script src="{{asset('assets/js/core/jquery.min.js')}}"></script>
<script src="{{asset('assets/js/core/popper.min.js')}}"></script>
<script src="{{asset('assets/js/core/bootstrap.min.js')}}"></script>
<script src="{{asset('assets/js/plugins/perfect-scrollbar.jquery.min.js')}}"></script>
<!--  Google Maps Plugin    -->
<script src="https://maps.googleapis.com/maps/api/js?key=YOUR_KEY_HERE"></script>
<!-- Chart JS -->
<script src="{{asset('assets/js/plugins/chartjs.min.js')}}"></script>
<!--  Notifications Plugin    -->
<script src="{{asset('assets/js/plugins/bootstrap-notify.js')}}"></script>
<!-- Control Center for Now Ui Dashboard: parallax effects, scripts for the example pages etc -->
<script src="{{asset('assets/js/now-ui-dashboard.min.js?v=1.3.0')}}" type="text/javascript"></script>
<!-- Now Ui Dashboard DEMO methods, don't include it in your project! -->
<script src="{{asset('assets/demo/demo.js')}}"></script>


@yield('script')
</body>

</html>