<!DOCTYPE html>
<html>
<head>
	<title>@yield('title')</title>
	  <!-- Required meta tags -->
	<meta charset="utf-8">
	<meta content="width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=0" name="viewport" />
	  <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1" />
	  <!--     Fonts and icons     -->
	  <link rel="stylesheet" type="text/css" href="https://fonts.googleapis.com/css?family=Roboto:300,400,500,700|Roboto+Slab:400,700|Material+Icons" />
	  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/latest/css/font-awesome.min.css">

	  <!-- CSS Links -->
	  <link rel="stylesheet" type="text/css" href="{{ asset('css/app.css') }}">
	  <link rel="stylesheet" type="text/css" href="{{ asset('css/style.css') }}">
	  	  <!-- Dashboard Style -->
	  <link rel="stylesheet" type="text/css" href="{{ asset('css/dashboard.min.css') }}">	  
</head>
<body>


	<div class="wrapper ">
    <div class="sidebar" data-color="purple" data-background-color="white">
      <!--
      Tip 1: You can change the color of the sidebar using: data-color="purple | azure | green | orange | danger"

      Tip 2: you can also add an image using data-image tag
  -->
      <div class="logo">
        <a href="http://www.creative-tim.com" class="simple-text logo-mini">
          LC
        </a>
        <a href="http://www.creative-tim.com" class="simple-text logo-normal">
          LearnCode
        </a>
      </div>
      <div class="sidebar-wrapper">
        <ul class="nav">
          <li class="nav-item {{ explode('.', \Request::route()->getName())[0] == 'admin' ? 'active' : '' }}  ">
            <a class="nav-link" href="/admin">
              <i class="material-icons">dashboard</i>
              <p>Dashboard</p>
            </a>
          </li>
          <li class="nav-item {{ explode('.', \Request::route()->getName())[0] == 'users' ? 'active' : '' }} ">
            <a class="nav-link" href="/admin/users">
              <i class="fa fa-users"></i>
              <p>Users</p>
            </a>
          </li>
          <li class="nav-item {{ explode('.', \Request::route()->getName())[0] == 'tracks' ? 'active' : '' }} ">
            <a class="nav-link" href="/admin/tracks">
              <i class="fa fa-globe"></i>
              <p>Tracks</p>
            </a>
          </li>
          <li class="nav-item {{ explode('.', \Request::route()->getName())[0] == 'courses' ? 'active' : '' }} ">
            <a class="nav-link" href="/admin/courses">
              <i class="fa fa-caret-square-o-right" aria-hidden="true"></i>
              <p>Courses</p>
            </a>
          </li>
          <li class="nav-item {{ explode('.', \Request::route()->getName())[0] == 'questions' ? 'active' : '' }} ">
            <a class="nav-link" href="/admin/questions">
              <i class="fa fa-question-circle"></i>
              <p>Questions</p>
            </a>
          </li>
          <li class="nav-item {{ explode('.', \Request::route()->getName())[0] == 'videos' ? 'active' : '' }} ">
            <a class="nav-link" href="/admin/videos">
              <i class="fa fa-play"></i>
              <p>Videos</p>
            </a>
          </li>
          <li class="nav-item {{ explode('.', \Request::route()->getName())[0] == 'photos' ? 'active' : '' }} ">
            <a class="nav-link" href="/admin/photos">
              <i class="fa fa-picture-o"></i>
              <p>Images</p>
            </a>
          </li>
          <!-- your sidebar here -->
        </ul>
      </div>
    </div>
    <div class="main-panel">
      <!-- Navbar -->
      <nav class="navbar navbar-expand-lg navbar-transparent navbar-absolute fixed-top ">
        <div class="container-fluid">
          <div class="navbar-wrapper">
            @yield('pagename')
          </div>
          <button class="navbar-toggler" type="button" data-toggle="collapse" aria-controls="navigation-index" aria-expanded="false" aria-label="Toggle navigation">
            <span class="sr-only">Toggle navigation</span>
            <span class="navbar-toggler-icon icon-bar"></span>
            <span class="navbar-toggler-icon icon-bar"></span>
            <span class="navbar-toggler-icon icon-bar"></span>
          </button>


          <div class="collapse navbar-collapse justify-content-end">
            <ul class="navbar-nav">
              <li class="nav-item">
                <a class="nav-link" href="#pablo">
                  <i class="material-icons">notifications</i> Notifications
                </a>
              </li>
              <!-- your navbar here -->
            </ul>
          </div>
        </div>
      </nav>
      <!-- End Navbar -->
      <div class="content">
        <div class="container-fluid">
          <!-- your content here -->
          @yield('content')
        </div>
      </div>
      <footer class="footer">
        <div class="container-fluid">
          <nav class="float-left">
            <ul>
              <li>
                <a href="">
                  Learn Code
                </a>
              </li>
            </ul>
          </nav>
          <div class="copyright float-right">
            &copy;
            <script>
              document.write(new Date().getFullYear())
            </script>, made with <i class="material-icons">favorite</i> by
            <a href="https://www.creative-tim.com" target="_blank">Ebrahem Samer</a> for a better Programmer.
          </div>
          <!-- your footer here -->
        </div>
      </footer>
    </div>
  </div>

  <script src="{{ asset('js/app.js') }}"></script>
  
  <!-- JQuery Script -->
  <script
  src="https://code.jquery.com/jquery-2.2.4.min.js"
  integrity="sha256-BbhdlvQf/xTY9gja0Dq3HiwQF8LaCRTXxZKRutelT44="
  crossorigin="anonymous"></script>


  <!-- Ajax Script -->
  <script  src="https://cdnjs.cloudflare.com/ajax/libs/jquery-ajaxy/1.6.1/scripts/jquery.ajaxy.min.js"></script>
  <!-- My Script -->
  <script src="{{ asset('js/script.js') }}"></script>

  @yield('ajaxcalls')
</body>
</html>