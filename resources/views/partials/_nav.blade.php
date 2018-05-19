<!-- Default Bootstrap Navbar -->
<nav class="navbar navbar-default">
  <div class="container-fluid">
    <!-- Brand and toggle get grouped for better mobile display -->
    <div class="navbar-header">
      <a class="navbar-brand" href="/">SEMB Toshiba</a>
    </div>

    <!-- Collect the nav links, forms, and other content for toggling -->
    <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
      <ul class="nav navbar-nav">
        <li class="{{ Request::is('home') ? "active" : "" }}"><a href="/home">Home</a></li>
      </ul>
      <li class="dropdown">
          <a href="/" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false" style="position:relative; padding-left:50px;">{{ Auth::user()->name }}
          <img src="/uploads/avatars/{{ Auth::user()->avatar }}" style="width:40px; height:40px; position:absolute; top:5px; left:5px; border-radius:50%;">
          <span class="caret"></span></a>
          <ul class="dropdown-menu">
            <li><a href="{{ url('/perfil') }}"><i class="fa fa-btn fa-user"></i>  Perfil</a></li>
            <li>
            <a href="{{ route('logout') }}"
                 onclick="event.preventDefault();
                 document.getElementById('logout-form').submit();"><i class="fa fa-btn fa-sign-out"></i>
                 Logout
            </a>
            <form id="logout-form" action="{{ route('logout') }}" method="get" style="display: none;">
            {{ csrf_field() }}
            </form>
            </li> 
            </ul>
        </li>

      </ul>
    </div><!-- /.navbar-collapse -->
  </div><!-- /.container-fluid -->
</nav>