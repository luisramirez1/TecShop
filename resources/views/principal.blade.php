<!DOCTYPE html>
<html lang="es">
<head>
  <link rel="icon" type="image/ico" sizes="32x32" href="{{asset("images/favicon.ico")}}" />
	<meta charset="UTF-8">
	<title>TecShop</title>

	<script src="{{asset("js/jquery.js")}}"></script>

  <!--........................................................................................................-->
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
  <meta name="keywords" content="Modern Shoppe Responsive web template, Bootstrap Web Templates, Flat Web Templates, Android Compatible web template, 
  Smartphone Compatible web template, free webdesigns for Nokia, Samsung, LG, SonyEricsson, Motorola web design" />
  <script type="application/x-javascript"> addEventListener("load", function() { setTimeout(hideURLbar, 0); }, false);
      function hideURLbar(){ window.scrollTo(0,1); } </script>
  <!--//for-mobile-apps -->
  <!--Custom Theme files -->
  <link href="{{asset("css/bootstrap.css")}}" rel="stylesheet" type="text/css" media="all" />
  <link href="{{asset("css/style.css")}}" rel="stylesheet" type="text/css" media="all" />
  <!--//Custom Theme files -->
  <!--js-->
  <script src="{{asset("js/jquery-1.11.1.min.js")}}"></script>
  <!--//js-->
  <!--cart-->
  <script src="{{asset("js/simpleCart.min.js")}}"></script>
  <!--cart-->
  <!--web-fonts-->
  <link href='//fonts.googleapis.com/css?family=Raleway:400,100,100italic,200,200italic,300,400italic,500,500italic,600,600italic,700,700italic,800,800italic,900,900italic' rel='stylesheet' type='text/css'><link href='//fonts.googleapis.com/css?family=Open+Sans:400,300,300italic,400italic,600,600italic,700,700italic,800,800italic' rel='stylesheet' type='text/css'>
  <link href='//fonts.googleapis.com/css?family=Pompiere' rel='stylesheet' type='text/css'>
  <link href='//fonts.googleapis.com/css?family=Fascinate' rel='stylesheet' type='text/css'>
  <!--web-fonts-->
  <!--animation-effect-->
  <link href="{{asset("css/animate.min.css")}}" rel="stylesheet"> 
  <script src="{{asset("js/wow.min.js")}}"></script>
    <script>
     new WOW().init();
    </script>
  <!--//animation-effect-->
  <!--start-smooth-scrolling-->
  <script type="text/javascript" src="{{asset("js/move-top.js")}}"></script>
  <script type="text/javascript" src="{{asset("js/easing.js")}}"></script> 
  <script type="text/javascript">
      jQuery(document).ready(function($) {
        $(".scroll").click(function(event){   
          event.preventDefault();
          $('html,body').animate({scrollTop:$(this.hash).offset().top},1000);
        });
      });
  </script>
  <link rel="stylesheet" href="{{asset("css/estilos.css")}}">
  
  <!--........................................................................................................-->
</head>
<body>
  <div class="header">
    <div class="top-header navbar navbar-default"><!--header-one-->
      <div class="container">
        <div class="nav navbar-nav wow fadeInLeft animated" data-wow-delay=".5s">
          @if (Auth::guest())
            <p>Bienvenido a TecShop <a href="{{url('/register')}}">Registrar </a> | <a href="{{url('/login')}}">Ingresar </a></p>
          @else
            <p>Bienvenido a TecShop <a href="{{ url('/logout') }}"
                                            onclick="event.preventDefault();
                                                     document.getElementById('logout-form').submit();">
                                            Salir
                                        </a>

                                        <form id="logout-form" action="{{ url('/logout') }}" method="POST" style="display: none;">
                                            {{ csrf_field() }}
                                        </form></p>
          @endif
        </div>

        <div class="nav navbar-nav navbar-right social-icons wow fadeInRight animated" data-wow-delay=".5s">
          <ul>
            @if (Auth::guest())
              <li><a href="http://www.facebook.com" target="_blank"> </a></li>
            @else
              <li><a href="http://www.facebook.com/{{Auth::user()->facebook}}" target="_blank"> </a></li>
            @endif
            <li><a href="http://www.youtube.com" class="you" target="_blank"> </a></li>
            <li style="margin-right: -30px; font-size: 0.9em; color: #353F49; line-height: 1.8em; margin-top: .8em; font-weight: 500; font-family: 'Raleway', sans-serif;">
                <script>
                  var meses = new Array ("Enero","Febrero","Marzo","Abril","Mayo","Junio","Julio","Agosto","Septiembre","Octubre","Noviembre","Diciembre");
                  var diasSemana = new Array("Domingo","Lunes","Martes","Miércoles","Jueves","Viernes","Sábado");
                  var f=new Date();
                  document.write(diasSemana[f.getDay()] + ", " + f.getDate() + " de " + meses[f.getMonth()] + " de " + f.getFullYear());
                </script>
            </li>
          </ul>
        </div>
        <div class="clearfix"> </div>
      </div>
    </div>
    <div class="header-two navbar navbar-default"><!--header-two-->
      <div class="container">
        <div class="nav navbar-nav header-two-left">
          <ul>
            @if (Auth::guest())
              <li></i>Sesion no iniciada</li>
            @else
            @if(Auth::user()->imagen == null)
            <a href="#" data-toggle="modal" data-target="#myModal89"><img id="imagen" src="{{asset("images/usuarios/user.png")}}" alt=""></a> 
            @else
              <a href="#" data-toggle="modal" data-target="#myModal89"><img id="imagen" src="{{asset("images/usuarios")}}/{{Auth::user()->imagen}}" alt=""></a> 
            @endif
              <div id="nombre">
                <li ></i>{{Auth::user()->name}}</li> <br>
            @if(Auth::user()->tipoUsuario == 1)
                <li ><i></i><a>Administrador</a></li> 
            @else
                <li ><i></i><a>Invitado</a></li>
            @endif
              </div>
            @endif     
          </ul>
        </div>
        <div class="nav navbar-nav logo wow zoomIn animated" data-wow-delay=".7s">
          <h1><a href="{{url('/')}}">Tec<b>Shop</b><span class="tag">Tecnologia a la Moda</span> </a></h1>
        </div>
        <div class="nav navbar-nav navbar-right header-two-right">
          <div class="header-right my-account">
            <a href="#" data-toggle="modal" data-target="#myModalCon"><span class="glyphicon glyphicon-map-marker" aria-hidden="true"></span>CONTÁCTANOS</a>

          </div>
          
          @if (Auth::guest())
          @else
          <div class="header-right cart">
            <a href="{{url('/carrito')}}/{{Auth::user()->id}}"><span class="glyphicon glyphicon-shopping-cart" aria-hidden="true"></span></a>
            <h4><a href="{{url('/carrito')}}/{{Auth::user()->id}}">
                <span> ${{$cantidadPagar}}.00 </span> (<span id="simpleCart_quantity"> {{$cantidadPro}} </span>) 
            </a></h4>
            <div class="cart-box">
              @if($cantidadPro == 0)
              @else
                <p><a href="{{url('/comprar')}}/{{Auth::user()->id}}" class="simpleCart_empty">Finalizar Compra</a></p>
              @endif
              <div class="clearfix"> </div>
            </div>
          </div>
          @endif

          <div class="clearfix"> </div>
        </div>
        <div class="clearfix"> </div>
      </div>
    </div>
    <div class="top-nav navbar navbar-default"><!--header-three-->
      <div class="container">
        <nav class="navbar" role="navigation">
          <div class="navbar-header">
            <button type="button" class="navbar-toggle" data-toggle="collapse" data-target="#bs-example-navbar-collapse-1">
              <span class="sr-only">Toggle navigation</span>
              <span class="icon-bar"></span>
              <span class="icon-bar"></span>
              <span class="icon-bar"></span>
            </button>
          </div>
          <!--navbar-header-->
          @if(Auth::guest())
          @else
          @if(Auth::user()->imagen == null)
            <div class="alert alert-danger alert-dismissible" id="alerta" role="alert">
                <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                <strong>Espera!</strong> Se recomienda editar tu información <a href="{{url('editar')}}/{{Auth::user()->id}}">Ir a editar</a>.
            </div>  
          @endif
          <script>
              $("#alerta").fadeTo(5000, 1000).slideUp(1000, function(){
              $("#alerta").slideUp(1000);
              });
          </script>
          @endif
        
<!--............................................................................................... No logueado -->
          @if (Auth::guest())
            <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
            <ul class="nav navbar-nav top-nav-info">
              <li><a href="{{url('/')}}" class="active">Inicio</a></li>
              <li class="dropdown">
                <a href="#" class="dropdown-toggle" data-toggle="dropdown">Marcas<b class="caret"></b></a>
                <ul class="dropdown-menu multi-column multi-column1">
                  <div class="row">
                    <div class="col-sm-4 menu-grids menulist1">
                      <h4>Computadoras</h4>
                      <ul class="multi-column-dropdown ">
                        @foreach($marcas1 as $m)
                          <li><a class="list" href="{{url('/marcas')}}/{{$m->id}}">{{$m->name}}</a></li>
                        @endforeach
                      </ul>
                      <ul class="multi-column-dropdown">
                        @foreach($marcas2 as $m)
                          <li><a class="list" href="{{url('/marcas')}}/{{$m->id}}">{{$m->name}}</a></li>
                        @endforeach
                        <li><h6><a class="list" href="">Promociones</a></h6></li>
                      </ul>
                    </div>                                    
                    <div class="col-sm-2 menu-grids">
                      <h4>Smartphone's</h4>
                      <ul class="multi-column-dropdown">
                        @foreach($celulares1 as $c)
                        <li><a class="list" href="{{url('/marcas')}}/{{$c->id}}">{{$c->name}}</a></li>
                        @endforeach
                      </ul>
                    </div>
                    <div class="col-sm-3 menu-grids">
                      <ul class="multi-column-dropdown">
                        @foreach($celulares2 as $c)
                          <li><a class="list" href="{{url('/marcas')}}/{{$c->id}}">{{$c->name}}</a></li>
                        @endforeach
                        <h4>Electronica</h4>
                        @foreach($electronica as $e)
                          <li><a class="list" href="{{url('/marcas')}}/{{$e->id}}">{{$e->name}}</a></li>
                        @endforeach
                      </ul>
                    </div>
                    <div class="col-sm-3 menu-grids">
                      <ul class="multi-column-dropdown">
                        <li><h6><a class="list" href="">Promociones</a></h6></li>
                        <h4>Consolas</h4>
                        @foreach($consola as $c)
                          <li><a class="list" href="{{url('/marcas')}}/{{$c->id}}">{{$c->name}}</a></li>
                        @endforeach
                      </ul>
                    </div>
                    <div class="clearfix"> </div>
                  </div>
                </ul>
              </li>

              <li class="dropdown grid">
                <a href="#" class="dropdown-toggle list1" data-toggle="dropdown">Categorias<b class="caret"></b></a>
                <ul class="dropdown-menu multi-column menu-two multi-column3">
                  <div class="row">
                    <div class="col-sm-4 menu-grids">
                      <ul class="multi-column-dropdown">
                        @foreach($categorias as $c)
                          <li><a class="list" href="{{url('/categorias')}}/{{$c->id}}">{{$c->name}}</a></li>
                        @endforeach
                      </ul>
                    </div>
                    <div class="col-sm-8 menu-grids">
                      <a href="">
                        <div class="new-add">
                        </div>  
                      </a>
                    </div>  
                    <div class="clearfix"> </div>
                  </div>  
                </ul>
              </li>       
            
            </ul> 
            <div class="clearfix"> </div>
            <!--//navbar-collapse-->
            <header class="cd-main-header">
              <ul class="cd-header-buttons">
                <li><a class="cd-search-trigger" href="#cd-search"> <span></span></a></li>
              </ul> <!-- cd-header-buttons -->
            </header>
          </div>
          <!--//navbar-header-->
        </nav>
        <div id="cd-search" class="cd-search">
          <form>
            <input type="search" placeholder="Buscar...">
          </form>
        </div>
      </div>
    </div>
  </div>
          @else
<!--............................................................................................... Administrador -->
          @if(Auth::user()->tipoUsuario == 1)
          <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
            <ul class="nav navbar-nav top-nav-info">
              <li><a href="{{url('/')}}" class="active">Inicio</a></li>
              <li class="dropdown">
                <a href="#" class="dropdown-toggle" data-toggle="dropdown">Marcas<b class="caret"></b></a>
                <ul class="dropdown-menu multi-column multi-column1">
                  <div class="row">
                    <div class="col-sm-4 menu-grids menulist1">
                      <h4>Computadoras</h4>
                      <ul class="multi-column-dropdown ">
                        @foreach($marcas1 as $m)
                          <li><a class="list" href="{{url('/marcas')}}/{{$m->id}}">{{$m->name}}</a></li>
                        @endforeach
                      </ul>
                      <ul class="multi-column-dropdown">
                        @foreach($marcas2 as $m)
                          <li><a class="list" href="{{url('/marcas')}}/{{$m->id}}">{{$m->name}}</a></li>
                        @endforeach
                        <li><h6><a class="list" href="">Promociones</a></h6></li>
                      </ul>
                    </div>                                    
                    <div class="col-sm-2 menu-grids">
                      <h4>Smartphone's</h4>
                      <ul class="multi-column-dropdown">
                        @foreach($celulares1 as $c)
                        <li><a class="list" href="{{url('/marcas')}}/{{$c->id}}">{{$c->name}}</a></li>
                        @endforeach
                      </ul>
                    </div>
                    <div class="col-sm-3 menu-grids">
                      <ul class="multi-column-dropdown">
                        @foreach($celulares2 as $c)
                          <li><a class="list" href="{{url('/marcas')}}/{{$c->id}}">{{$c->name}}</a></li>
                        @endforeach
                        <h4>Electronica</h4>
                        @foreach($electronica as $e)
                          <li><a class="list" href="{{url('/marcas')}}/{{$e->id}}">{{$e->name}}</a></li>
                        @endforeach
                      </ul>
                    </div>
                    <div class="col-sm-3 menu-grids">
                      <ul class="multi-column-dropdown">
                        <li><h6><a class="list" href="">Promociones</a></h6></li>
                        <h4>Consolas</h4>
                        @foreach($consola as $c)
                          <li><a class="list" href="{{url('/marcas')}}/{{$c->id}}">{{$c->name}}</a></li>
                        @endforeach
                      </ul>
                    </div>
                    <div class="clearfix"> </div>
                  </div>
                </ul>
              </li>
              <li class="dropdown grid">
                <a href="#" class="dropdown-toggle list1" data-toggle="dropdown">Categorias<b class="caret"></b></a>
                <ul class="dropdown-menu multi-column menu-two multi-column3">
                  <div class="row">
                    <div class="col-sm-4 menu-grids">
                      <ul class="multi-column-dropdown">
                        @foreach($categorias as $c)
                        <li><a class="list" href="{{url('/categorias')}}/{{$c->id}}">{{$c->name}}</a></li>
                        @endforeach                        
                      </ul>
                    </div>
                    <div class="col-sm-8 menu-grids">
                      <a href="">
                        <div class="new-add">
                        </div>  
                      </a>
                    </div>  
                    <div class="clearfix"> </div>
                  </div>  
                </ul>
              </li>       
            
<!--............................................................................................... Compras -->
              <li class="dropdown grid">
                <a href="#" class="dropdown-toggle list1" data-toggle="dropdown">Compras<b class="caret"></b></a>
                <ul class="dropdown-menu multi-column menu-two multi-column3">
                  <div class="row">
                    <div class="col-sm-4 menu-grids">
                      <ul class="multi-column-dropdown">
                        @if(Auth::user()->compras == 0)
                          <li><a class="list">Por el momento no has realizado ninguna compra.    No esperes mas, ¡COMPRA YA!</a></li>
                        @else
                        @for ($i = 1; $i < Auth::user()->compras+1; $i++)
                          <li><a class="list" href="{{url('/compras')}}/{{Auth::user()->id}}/{{$i}}">Compra#: {{$i}}</a></li>
                        @endfor
                        @endif            
                      </ul>
                    </div>
                    <div class="clearfix"> </div>
                  </div>  
                </ul>
              </li>  
              <!-- <li>
                <a href="{{url('/compras')}}/{{Auth::user()->id}}">Compras</a>
              </li> -->
              <li class="dropdown grid">
                <a href="#" class="dropdown-toggle list1" data-toggle="dropdown">Configuraciones<b class="caret"></b></a>
                <ul class="dropdown-menu multi-column menu-two multi-column3">
                  <div class="row">
                    <div class="col-sm-12 menu-grids">
                      <ul class="multi-column-dropdown">
                        <li><a class="list" href="{{url('/registrarProductos')}}">Registrar Productos</a></li>
                        <li><a class="list" href="{{url('/registrarCategorias')}}">Registrar Categorias</a></li>
                        <li><a class="list" href="{{url('/registrarMarcas')}}">Registrar Marcas</a></li>
                        <li><a class="list" href="{{url('/consultaUsuarios')}}">Consulta Usuarios</a></li>
                        <li><a class="list" href="{{url('/consultaProductos')}}">Consulta Productos</a></li>
                      </ul>
                    </div>
                    <div class="clearfix"> </div>
                  </div>  
                </ul>
              </li>       

            </ul> 
            <div class="clearfix"> </div>
            <!--//navbar-collapse-->
            <header class="cd-main-header">
              <ul class="cd-header-buttons">
                <li><a class="cd-search-trigger" href="#cd-search"> <span></span></a></li>
              </ul> <!-- cd-header-buttons -->
            </header>
          </div>
          <!--//navbar-header-->
        </nav>
        <div id="cd-search" class="cd-search">
          <form>
            <input type="search" placeholder="Buscar...">
          </form>
        </div>
      </div>
    </div>
  </div>
          @else
<!--............................................................................................... Invitado -->
          <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
            <ul class="nav navbar-nav top-nav-info">
              <li><a href="{{url('/')}}" class="active">Inicio</a></li>
              <li class="dropdown">
                <a href="#" class="dropdown-toggle" data-toggle="dropdown">Marcas<b class="caret"></b></a>
                <ul class="dropdown-menu multi-column multi-column1">
                  <div class="row">
                    <div class="col-sm-4 menu-grids menulist1">
                      <h4>Computadoras</h4>
                      <ul class="multi-column-dropdown ">
                        @foreach($marcas1 as $m)
                          <li><a class="list" href="{{url('/marcas')}}/{{$m->id}}">{{$m->name}}</a></li>
                        @endforeach
                      </ul>
                      <ul class="multi-column-dropdown">
                        @foreach($marcas2 as $m)
                          <li><a class="list" href="{{url('/marcas')}}/{{$m->id}}">{{$m->name}}</a></li>
                        @endforeach
                        <li><h6><a class="list" href="">Promociones</a></h6></li>
                      </ul>
                    </div>                                    
                    <div class="col-sm-2 menu-grids">
                      <h4>Smartphone's</h4>
                      <ul class="multi-column-dropdown">
                        @foreach($celulares1 as $c)
                        <li><a class="list" href="{{url('/marcas')}}/{{$c->id}}">{{$c->name}}</a></li>
                        @endforeach
                      </ul>
                    </div>
                    <div class="col-sm-3 menu-grids">
                      <ul class="multi-column-dropdown">
                        @foreach($celulares2 as $c)
                          <li><a class="list" href="{{url('/marcas')}}/{{$c->id}}">{{$c->name}}</a></li>
                        @endforeach
                        <h4>Electronica</h4>
                        @foreach($electronica as $e)
                          <li><a class="list" href="{{url('/marcas')}}/{{$e->id}}">{{$e->name}}</a></li>
                        @endforeach
                      </ul>
                    </div>
                    <div class="col-sm-3 menu-grids">
                      <ul class="multi-column-dropdown">
                        <li><h6><a class="list" href="">Promociones</a></h6></li>
                        <h4>Consolas</h4>
                        @foreach($consola as $c)
                          <li><a class="list" href="{{url('/marcas')}}/{{$c->id}}">{{$c->name}}</a></li>
                        @endforeach
                      </ul>
                    </div>
                    <div class="clearfix"> </div>
                  </div>
                </ul>
              </li>

              <li class="dropdown grid">
                <a href="#" class="dropdown-toggle list1" data-toggle="dropdown">Categorias<b class="caret"></b></a>
                <ul class="dropdown-menu multi-column menu-two multi-column3">
                  <div class="row">
                    <div class="col-sm-4 menu-grids">
                      <ul class="multi-column-dropdown">
                        @foreach($categorias as $c)
                        <li><a class="list" href="{{url('/categorias')}}/{{$c->id}}">{{$c->name}}</a></li>
                        @endforeach
                      </ul>
                    </div>
                    <div class="col-sm-8 menu-grids">
                      <a href="">
                      </a>
                    </div>  
                    <div class="clearfix"> </div>
                  </div>  
                </ul>
              </li>       
            
<!--............................................................................................... Compras -->
              
              <li class="dropdown grid">
                <a href="#" class="dropdown-toggle list1" data-toggle="dropdown">Compras<b class="caret"></b></a>
                <ul class="dropdown-menu multi-column menu-two multi-column3">
                  <div class="row">
                    <div class="col-sm-4 menu-grids">
                      <ul class="multi-column-dropdown">
                        @if(Auth::user()->compras == 0)
                          <li><a class="list">Por el momento no has realizado ninguna compra.    No esperes mas, ¡COMPRA YA!</a></li>
                        @else
                        @for ($i = 1; $i < Auth::user()->compras+1; $i++)
                          <li><a class="list" href="{{url('/compras')}}/{{Auth::user()->id}}/{{$i}}">Compra#: {{$i}}</a></li>
                        @endfor
                        @endif            
                      </ul>
                    </div>
                    <div class="clearfix"> </div>
                  </div>  
                </ul>
              </li>  

            </ul> 
            <div class="clearfix"> </div>
            <!--//navbar-collapse-->
            <header class="cd-main-header">
              <ul class="cd-header-buttons">
                <li><a class="cd-search-trigger" href="#cd-search"> <span></span></a></li>
              </ul> <!-- cd-header-buttons -->
            </header>
          </div>
          <!--//navbar-header-->
        </nav>
        <div id="cd-search" class="cd-search">
          <form>
            <input type="search" placeholder="Buscar...">
          </form>
        </div>
      </div>
    </div>
  </div>
  @endif
  @endif
<!--............................................................................................... Yield -->
  <article>
    @yield('contenido')
  </article>

<!--............................................................................................... Footer -->
  <div class="footer">
    <div class="container">
      <div class="footer-info">
        <div class="col-md-4 footer-grids wow fadeInUp animated" data-wow-delay=".5s">
          <h4 class="footer-logo"><a href="{{url('/')}}">Tec<b>Shop</b> <span class="tag">Tecnología a la Moda</span></a></h4>
          <br>© 2016 TecShop.<br>
          Todos los derechos reservados.
          <br><br>
          <i class="glyphicon glyphicon-map-marker" aria-hidden="true"></i><a>  Culiacan, Sinaloa.</a><br>
          <i class="glyphicon glyphicon-envelope" aria-hidden="true"></i><a>  tecShop2@gmail.com </a><br>
          <i class="glyphicon glyphicon-earphone" aria-hidden="true"></i><a>  6671234567 </a>
        </div>
        <div class="col-md-4 footer-grids wow fadeInUp animated" data-wow-delay=".7s">
          <h4 class="footer-logo"><b>Empresa</b></h4>
          <br>
          <ul>
            <li><a href="#" data-toggle="modal" data-target="#myModalA">Acerca de</a></li>
            <li><a href="#" data-toggle="modal" data-target="#myModalCon">Contáctanos</a></li>
            <li><a href="#" data-toggle="modal" data-target="#myModalF">FAQ's</a></li>
          </ul>
        </div>
        <div class="col-md-4 footer-grids wow fadeInUp animated" data-wow-delay=".9s">
          <h4 class="footer-logo"><b>Subscríbete</b></h4>
          <br>Regístrese ahora para obtener más información <br> Sobre nuestra compañía. <br> 
          <form>
            <input type="text" placeholder="Introduce tu email" required="">
            <input type="submit" value="Enviar">
          </form>
        </div>
        <div class="clearfix"></div>
      </div>
    </div>
  </div>

  <!--.................................................................................................................-->
  <!--.............................................  A C E R C A   D E   ..............................................-->
  <!--.................................................................................................................-->

   <div class="modal fade lg" id="myModalA" tabindex="-1" role="dialog" aria-labelledby="myModalA" aria-hidden="true">
    <div class="modal-dialog modal-lg">
      <div class="modal-content">
        <div class="modal-header">
          <button type="button" class="close" data-dismiss="modal" aria-hidden="true"> &times;</button>
           <h2>Acerca de TecShop:</h2>  
        </div>
        <div class="modal-body modal-body-sub">
          <div class="row">
            <div class="col-md-12 modal_body_left modal_body_left1">
              <div class="sap_tabs">  
                <div id="horizontalTab" style="display: block; width: 100%; margin: 0px;">
                  <div class="col-md-12">
                    <section id="seccion1">
                      <strong>Nuestra Pagina</strong>
                        <h3><p>.- Muchas personas en el pais utilizan TecShop para mantenerse en contacto con las nuevas tecnologias.</p></h3><br>
                      <strong>Nuestra Misión</strong>
                        <h3><p>.- TecShop comenzó como una nueva alternativa para la compra de aparatos tecnologicos. nuestros productos ahora son de la mas alta calidad en el mercado internacional.</p></h3><br>
                      <strong>Nuestro Equipo</strong>
                        <h3><p>.- TecShop es una empresa fundada por Luis Ramirez y Mario Sanz, quienes trabajaron en conjunto para el desarrollo de la pagina, enfocada a ser un servicio rapido y confiable en cualquier parte.</p></h3>
                        <br>
                        <hr>
                        <div class="text-center">TecShop &copy; 2016 .</div>
                    </section>
                  </div>
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>

   <!--.................................................................................................................-->
  <!--..........................................  C O N T Á C T A N O S  ..............................................-->
  <!--.................................................................................................................-->

  <div class="modal fade lg" id="myModalCon" tabindex="-1" role="dialog" aria-labelledby="myModalCon" aria-hidden="true">
    <div class="modal-dialog modal-lg">
      <div class="modal-content">
        <div class="modal-header">
          <button type="button" class="close" data-dismiss="modal" aria-hidden="true"> &times;</button>
           <h2>Contáctanos:</h2>  
        </div>
        <div class="modal-body modal-body-sub">
          <div class="row">
            <div class="col-md-12 modal_body_left modal_body_left1">
              <div class="sap_tabs">  
                <div id="horizontalTab" style="display: block; width: 100%; margin: 0px;">
                  <div class="col-md-12">
                    <section>
                      <strong>Soporte técnico</strong>
                        <h3><p>.- Por favor, contacta con nuestro soporte técnico: <a>support@tecshop.com</a></p></h3><br>
                      <strong>Preguntas sobre la privacidad</strong>
                        <h3><p>.- Si tienes preguntas sobre nuestra Política de privacidad, por favor contáctanos.</p></h3><br>
                      <strong>Consultas empresariales</strong>
                        <h3><p>.- Por favor, contacta con nuestro equipo de negocios: <a>bd@tecshop.com</a></p></h3><br>
                      <strong>Dirección corporativa</strong>
                        <h3><p>TecShop Inc.<br>
                        Culiacan, Sinaloa México.</p></h3>
                        <br>
                        <hr>
                        <div class="text-center">TecShop &copy; 2016 .</div>
                    </section>
                  </div>
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>

  <!--.................................................................................................................-->
  <!--.............................................  P R E G U N T A S  ...............................................-->
  <!--.................................................................................................................-->

<div class="modal fade lg" id="myModalF" tabindex="-1" role="dialog" aria-labelledby="myModalF" aria-hidden="true">
    <div class="modal-dialog modal-lg">
      <div class="modal-content">
        <div class="modal-header">
          <button type="button" class="close" data-dismiss="modal" aria-hidden="true"> &times;</button>
           <h2>Preguntas Más Frecuentes:</h2>  
        </div>
        <div class="modal-body modal-body-sub">
          <div class="row">
            <div class="col-md-12 modal_body_left modal_body_left1">
              <div class="sap_tabs">  
                <div id="horizontalTab" style="display: block; width: 100%; margin: 0px;">
                  <div class="col-md-12">
                    <section>
                      <strong>¿Que es TecShop?</strong>
                        <h3><p>.- Somos una tienda virtual, es un negocio electronico que basicamente se encarga de publicar productos de diferentes proveedores para que dichos proveedores puedan llamar la atencion de usuarios registrados.</p></h3><br>
                      <strong>¿Requisitos para vender en TecShop?</strong>
                        <h3><p>.- Cualquier vendedor internacional puede registrarse para vender en TecShop a través de la plataforma. Sin embargo, nosotros colocamos ciertos límites en nuevas cuentas, y nuestras herramientas y sistemas actuales están dirigidos a los vendedores de mayor volumen en comparación con los individuos.</p></h3><br>
                      <strong>¿Que paises son compatibles?</strong>
                       <h3><p>.- El programa está abierto a los vendedores en todo el mundo.</p></h3><br>
                      <strong>¿Como puedo vender mas en TecShop?</strong>
                        <h3><p>Hay varias cosas que puede hacer para mejorar sus ventas en TecShop. Estas son algunas de las estrategias que han funcionado para algunos de nuestros vendedores:</p><br>

                        <p>.- Encontrar el método óptimo para el envío / venta.</p><br>

                        <p>.- Responder a las preguntas de pre-venta rápido: Culturalmente, los compradores latinoamericanos gusta hacer preguntas antes de comprar. vendedores exitosos locales a responder a las preguntas en cuestión de minutos.
                        Cuanto más rápido se puede responder a las preguntas, mayor será la probabilidad de conversión. </p></h3>
                        <br>
                        <hr>
                        <div class="text-center">TecShop &copy; 2016 .</div>
                    </section>
                  </div>
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
  

  @if (Auth::guest())
  @else
  <div class="modal fade md" id="myModal89" tabindex="-1" role="dialog" aria-labelledby="myModal89"
    aria-hidden="true">
    <div class="modal-dialog modal-md">
      <div class="modal-content">
        <div class="modal-header">
          <button type="button" class="close" data-dismiss="modal" aria-hidden="true">
            &times;</button>
          <h3 class="modal-title" id="nombrem">
            <b>{{ Auth::user()->name }}</b> <br>
          </h3>
        </div>
        <div class="modal-body modal-body-sub">
          <div class="row">
            <div class="col-md-12 modal_body_left modal_body_left1">
              <div class="sap_tabs">  
                <div id="horizontalTab" style="display: block; width: 100%; margin: 0px;">
                  <div class="col-md-6">
                    <ul>
                      <b>Tipo de Usuario:</b>   @if(Auth::user()->tipoUsuario==1)
                                  Administrador
                                @endif
                                @if(Auth::user()->tipoUsuario==2)
                                  Invitado
                                @endif<br>
                      <b>Correo:</b> {{Auth::user()->email}} <br>
                      <b>Celular:</b> {{Auth::user()->tel}}<br>
                      <b>Domicilio:</b> {{Auth::user()->domicilio}}<br>
                      <b>Usuario FB:</b> {{Auth::user()->facebook}}<br>
                    </ul>
                    <a href="{{url('/editar')}}/{{Auth::user()->id}}" class="btn btn-info btn-sm" id="editar">Editar</a>
                    @if(Auth::user()->tipoUsuario==2)
                    <a href="{{url('/eliminarUsuariosI')}}/{{Auth::user()->id}}" class="btn btn-info btn-sm" id="editar">Eliminar Cuenta</a>
                    @endif
                  </div>
                  <div>
                    @if(Auth::user()->imagen == null)
                      <a href="#" data-toggle="modal" data-target="#myModal89"><img id="imagen2" src="{{asset("images/usuarios/user.png")}}" alt=""></a> 
                    @else
                      <a href="#" data-toggle="modal" data-target="#myModal89"><img id="imagen2" src="{{asset("images/usuarios")}}/{{Auth::user()->imagen}}" alt=""></a> 
                    @endif
                  </div>
                </div>
              </div>
            </div>
          </div>
        </div>

  @endif

  <!--//footer-->   
  <!--search jQuery-->

  <!--smooth-scrolling-of-move-up-->
  <script type="text/javascript">
    $(document).ready(function() {
    
      var defaults = {
        containerID: 'toTop', // fading element id
        containerHoverID: 'toTopHover', // fading element hover id
        scrollSpeed: 1200,
        easingType: 'linear' 
      };
      
      $().UItoTop({ easingType: 'easeOutQuart' });
      
    });
  </script>
  <!--//smooth-scrolling-of-move-up-->
  <!--Bootstrap core JavaScript
    ================================================== -->
    <!--Placed at the end of the document so the pages load faster -->
    <script src="{{asset("js/bootstrap.js")}}"></script>

</body>
</html>