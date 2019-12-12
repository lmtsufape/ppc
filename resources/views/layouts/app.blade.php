<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <!-- Titulo -->
    <title>@yield('titulo') | Nome do Sistema</title>

    <!-- Scripts -->
    <script defer="defer" src="//barra.brasil.gov.br/barra.js" type="text/javascript"></script>
    <script src="{{ asset('js/app.js') }}" defer></script>

    <!-- Fonts -->
    <link rel="dns-prefetch" href="//fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css?family=Nunito" rel="stylesheet">
    <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">

    <!-- Styles -->
    <script src="https://kit.fontawesome.com/3cf63845d6.js" crossorigin="anonymous"></script>
    <link href="{{ asset('css/app.css') }}" rel="stylesheet">
    <link href="{{ asset('css/lmts-app.css') }}" rel="stylesheet">
    <link href="{{ asset('css/field-animation.css') }}" rel="stylesheet">
    <link href="{{ asset('css/stylelmts.css') }}" rel="stylesheet">
    <link href="{{ asset('css/styleppc.css') }}" rel="stylesheet">

    <!-- Scripts -->
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.0/js/bootstrap.min.js"></script>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
</head>
<body>
  <div class="">
    <div id="barra-brasil" style="background:#7F7F7F; height: 20px; padding:0 0 0 10px;display:block;">
      <ul id="menu-barra-temp" style="list-style:none;">
        <li style="display:inline; float:left;padding-right:10px; margin-right:10px; border-right:1px solid #EDEDED">
          <a href="http://brasil.gov.br" style="font-family:sans,sans-serif; text-decoration:none; color:white;">Portal do Governo Brasileiro</a>
        </li>
        <li>
          <a style="font-family:sans,sans-serif; text-decoration:none; color:white;" href="http://epwg.governoeletronico.gov.br/barra/atualize.html">Atualize sua Barra de Governo</a>
        </li>
      </ul>
    </div>

    <!-- Barra de Logos -->
    <div id="barra-logos" class-"container" style="background:#ffffff; margin-top: 1px; height: 200px; padding: 10px 10px 10px 10px">
        <ul id="logos" style="list-style:none;">
            <li style="margin-right:140px; margin-left:110px; border-right:1px">
                <!-- @if(Auth::check() && (Auth::user()->username == 'adelino.lmts' || Auth::user()->username == 'alana.lmts' || Auth::user()->username == 'mateus.lmts' || Auth::user()->username == 'eberson.lmts'))
                    <a href="{{ route("home") }}"><img src="{{asset('images/pikachinho.png')}}" style = "margin-left: 8px; margin-top:5px " height="170px" align = "left" ></a>
                @else
                    <a href="{{ route("home") }}"><img src="{{asset('images/logo.png')}}" style = "margin-left: 8px; margin-top:5px " height="170px" align = "left" ></a>
                @endif -->

                <a target="_blank" href="http://lmts.uag.ufrpe.br/">
                  <img src="{{asset('images/lmts.jpg')}}" style = "margin-left: 8px; margin-top:65px " height="80" align = "right" >
                </a>
                <img src="{{asset('images/separador.png')}}" style = "margin-left: 15px; margin-top: 65px" height="70" align = "right">

                <a target="_blank" href="http://www.preg.ufrpe.br/">
                  <img src="{{asset('images/logoPreg.png')}}" style = "margin-left: 10px; margin-top: 65px" height="80" width="150" align = "right" >
                </a>
                <img src="{{asset('images/separador.png')}}" style = "margin-left: 15px; margin-top: 65px" height="70" align = "right">

                <a target="_blank" href="http://ww3.uag.ufrpe.br/">
                  <img src="{{asset('images/uag.png')}}" style = "margin-left: 10px; margin-top: 65px" height="80" width="70" align = "right" >
                </a>
                <img src="{{asset('images/separador.png')}}" style = "margin-left: 15px; margin-top: 65px" height="70" align = "right" >

                <a target="_blank" href="http://www.ufrpe.br/">
                  <img src="{{asset('images/ufrpe.png')}}" style = "margin-left: 15px; margin-right: -10px; margin-top: 65px " height="80" width="70" align = "right">
                </a>

            </li>
        </ul>
    </div>

<!-- NAVBAR -->
    <nav class="navbar navbar-expand-lg" style="background-color: #1B2E4F; border-color: #d3e0e9; box-shadow: 0 0 6px rgba(0,0,0,0.5);" role="navigation">
      <a class="navbar-brand" href="{{ route('login') }}" style="color: white; font-weight: bold;">
        <img src="{{asset('images/home.png')}}" height="20" class="d-inline-block align-top" alt="">
      @auth
      @endauth
      </a>
        <div class="collapse navbar-collapse" >
          <ul class="navbar-nav mr-auto">
          </ul>
        </div>
        <div class="nav navbar-nav navbar-right" >
          <ul class="nav navbar-nav">
              @if(Auth::check())
              <li>
              <a class="nav-link"  href="{{ route('login') }}"
                 onclick="event.preventDefault();
                               document.getElementById('usuario-form').submit();"style="color:white;">
                 Bem vindo, {{Auth::user()->name}}
              </a>
              <form id="usuario-form" action="{{ route('login') }}" method="GET" style="display: none;">
                  @csrf
              </form>
            </li>
              @endif
          </ul>
          <ul class="nav navbar-nav navbar-right">
              @if(Auth::check())
                <li> <!--  logout   -->
                    <a class="nav-link"  href="{{ route('logout') }}"
                       onclick="event.preventDefault();
                                     document.getElementById('logout-form').submit();"style="color:white;margin-right:20px">
                       {{ __('Sair') }}
                    </a>
                    <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                        @csrf
                    </form>
                </li>
            @endif
          </ul>
        </div>
      </nav>
    <!-- @php($url = str_replace(URL::to('/'),'',URL::current())) -->
<!-- NAVBAR -->

    <div id="page-container" style="background-color:#FFFFFF">
      <div id="content-wrap">
        @yield('content')
        <br>
        <!-- <br><br><br> -->
      </div>

      <div id="footer-brasil"></div>

    </div>

  </div>

</body>
</html>
