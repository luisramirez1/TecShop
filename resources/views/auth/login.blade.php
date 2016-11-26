@extends('principal')

@section('contenido')
    <div class="breadcrumbs">
        <div class="container">
            <ol class="breadcrumb breadcrumb1 animated wow slideInLeft" data-wow-delay=".5s">
                <li><a href="{{url('/')}}"><span class="glyphicon glyphicon-home" aria-hidden="true"></span>Inicio</a></li>
                <li class="active">Ingresar</li>
            </ol>
        </div>
    </div>
<div class="login-page">
        <div class="title-info wow fadeInUp animated" data-wow-delay=".5s">
            <h3 class="title"><span> Ingresar</span></h3>
        </div>
        @include('partials.flash')
        @if ($errors->has('email'))
            <div class="alert alert-danger alert-dismissible" id="alerta" role="alert">
                <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                <strong>Genial!</strong> Necesitas confirmar tu cuenta. Por favor consulta tu Correo Electrónico.
            </div>            
        @endif

          <script>
              $("#alerta").fadeTo(5000, 1000).slideUp(1000, function(){
              $("#alerta").slideUp(1000);
              });
          </script>

        <div class="widget-shadow">
            <div class="login-top wow fadeInUp animated" data-wow-delay=".7s">
                <h4>Bienvenido de nuevo a TecShop! <br> Nuevo en TecShop? <a href="{{ url('/register') }}">  Registrate Ahora »</a> </h4>
            </div>
            
            <div class="login-body">
    
                <form class="wow fadeInUp animated" data-wow-delay=".7s" class="form-horizontal" role="form" method="POST" action="{{url('/login') }} ">
                    {{ csrf_field() }}

                        <div class="form-group{{ $errors->has('email') ? ' has-error' : '' }}">
                            <div>
                                <input id="email" class="email" type="email" name="email" value="{{ old('email') }}" required placeholder="Email">

                                @if ($errors->has('email'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('email') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>

                        <div class="form-group{{ $errors->has('password') ? ' has-error' : '' }}">
                            <div>
                                <input id="password" type="password" name="password" required placeholder="Contraseña">

                                @if ($errors->has('password'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('password') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>
                    <input type="submit" name="Register" value="Entrar">
                    <div class="forgot-grid">
                        <label class="checkbox"><input type="checkbox" name="checkbox"><i></i>Recordarme</label>
                        <div class="forgot">
                            <a href="{{ url('/password/reset') }}">Olvidaste tu contraseña?</a>
                        </div>
                        <div class="clearfix"> </div>
                    </div>
                </form>
            </div>
        </div>
        <div class="login-page-bottom">
            <h5> - Ingresa con -</h5>
            <div class="btn btn-info" id="facebook"><a href="{{ url('/auth/facebook') }}"><i><img src="{{asset("images/f.png")}}" alt=""></i></a></div>
            <div class="btn btn-info" id="twitter"><a href="{{ url('/auth/twitter') }}"><i><img src="{{asset("images/t.png")}}" alt=""></i></a></div>
            <div class="btn btn-info" id="google"><a href="{{ url('/auth/google') }}"><i><img src="{{asset("images/g.png")}}" alt=""></i></a></div>

        </div>
    </div>
@endsection
