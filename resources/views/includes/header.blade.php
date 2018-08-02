 <!-- Fixed navbar -->
  <nav class="navbar navbar-default navbar-fixed-top navbar-custom">
    <div class="container">

      <div class="navbar-header">
        <button type="button" class="navbar-toggle collapsed"  data-toggle="collapse" data-target="#navbar" aria-expanded="false" aria-controls="navbar">
          <span class="sr-only">Toggle navigation</span>
          <span class="icon-bar"></span>
          <span class="icon-bar"></span>
          <span class="icon-bar"></span>
        </button>
         <!-- logo -->
      <a class="navbar-brand logo" href="{{url('/')}}">
            <img class="customlogo" src="{{url('images/deharilogo.png')}}" alt="logo" />
          </a>
      <!-- /logo -->
      </div>
      <div id="navbar" class="navbar-collapse collapse">
        <ul class="nav navbar-nav navbar-left">

        </ul>
        <ul class="nav navbar-nav navbar-right">
           <li class="dropdown main-dropdown">
             <a class="dropdown-toggle" data-toggle="dropdown" href="#"><span class="fa fa-angle-down"></span>  English
             </a>
             <ul class="dropdown-menu">
                 <li class="dropdown-submenu"><a href="">Urdu</a></li>
                 <li class="dropdown-submenu"><a href="">Arabic</a></li>
             </ul>
         </li>

         @if(\Session::has('u_session'))
          <!-- {{Session('ses')}} -->
          <li id="logout_show"><a href="{{url('logout')}}"><i class="fa fa-sign-out"></i>Logout</a></li>
          <li style="margin-top: 5px;"><button class="btn" style="background: black; color: white;">Place your Ads<i class="fa fa-arrow-circle-o-right" aria-hidden="true" style="padding-left: 7px;"></i></button></li>

          @else
          <li id="login_show"><a href="{{url('/accounts/login')}}"><i class="fa fa-user"></i>Login</a></li>
          <li id="signup_show"><a href="{{url('/accounts/signup')}}"><i class="fa fa-user-plus"></i>Sign Up</a></li>

          @endif

        </ul>
      </div><!--/.nav-collapse -->
    </div>
  </nav>
