@extends('principal')

@section('contenido')
<div class="breadcrumbs">
        <div class="container">
            <ol class="breadcrumb breadcrumb1 animated wow slideInLeft" data-wow-delay=".5s">
                <li><a href="{{url('/')}}"><span class="glyphicon glyphicon-home" aria-hidden="true"></span>Inicio</a></li>
                <li class="active">Registrar</li>
            </ol>
        </div>
    </div>
    <!--//breadcrumbs-->
    <!--login-->
    <div class="login-page">
        <div class="title-info wow fadeInUp animated" data-wow-delay=".5s">
            <h3 class="title"><span>Registrar</span></h3>
        </div>
            @include('partials.flash')
        <div class="widget-shadow">
            <div class="login-top wow fadeInUp animated" data-wow-delay=".7s">
                <h4>Ya tienes cuenta?<a href="{{url('/login')}}">  Ingresar »</a> </h4>
            </div>
            <div class="login-body">
                <form class="wow fadeInUp animated" data-wow-delay=".7s" class="form-horizontal" role="form" method="POST" action="{{ url('/register') }}">
                    {{ csrf_field() }}
                    <div class="form-group{{ $errors->has('name') ? ' has-error' : '' }}">
                            <div>
                                <input id="name" type="text" name="name" value="{{ old('name') }}" required autofocus placeholder="Nombre">

                                @if ($errors->has('name'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('name') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>

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

                        <div class="form-group{{ $errors->has('celular') ? ' has-error' : '' }}">
                            <div>
                                <input id="name" class="tel" type="tel" name="tel" required placeholder="Celular" pattern="[0-9]{10}" onkeypress="return justNumbers(event);">

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

                        <div class="form-group">
                            <div>
                                <input id="password-confirm" type="password" name="password_confirmation" required placeholder="Confirmar Contraseña">
                            </div>
                        </div>
                    <input type="submit" name="Register" value="Register">
                </form>
            </div>
        </div>
    </div>
@endsection
