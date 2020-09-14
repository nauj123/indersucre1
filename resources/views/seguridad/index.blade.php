<!DOCTYPE html>
<html>

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title>Indersucre | Login</title>
    <!-- Tell the browser to be responsive to screen width -->
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- Font Awesome -->
    <link rel="stylesheet" href="{{asset("assets/$theme/plugins/fontawesome-free/css/all.min.css")}}">
    <!-- Ionicons -->
    <link rel="stylesheet" href="https://code.ionicframework.com/ionicons/2.0.1/css/ionicons.min.css">
    <!-- icheck bootstrap -->
    <link rel="stylesheet" href="{{asset("assets/$theme/plugins/icheck-bootstrap/icheck-bootstrap.min.css")}}">
    <!-- Theme style -->
    <link rel="stylesheet" href="{{asset("assets/$theme/dist/css/adminlte.min.css")}}">
    <!-- Google Font: Source Sans Pro -->
    <link href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700" rel="stylesheet">
</head>

<body class="hold-transition sidebar-mini layout-fixed">
    <div class="wrapper">
        <div>
            <div class="content-header">
                <div class="container-fluid">
                    <div class="row mb-2">
                        <div class="col-sm-6">
                            <h1 class="m-0 text-dark">INDERSUCRE</h1>
                        </div>
                    </div>
                </div>
            </div>
            <section class="content">
                <div class="container-fluid">
                    <div class="row">
                        <div class="col-lg-2 offset-lg-1 col-6">
                            <div class="small-box bg-info">
                                <div class="inner">
                                    <h3>150</h3>
                                    <p>Usuarios regsitrados</p>
                                </div>
                                <div class="icon">
                                    <i class="fas fa-chart-pie"></i>
                                </div>
                            </div>
                        </div>
                        <div class="col-lg-2 col-6">
                            <div class="small-box bg-success">
                                <div class="inner">
                                    <h3>53<sup style="font-size: 20px">%</sup></h3>
                                    <p>Escenarios deportivos</p>
                                </div>
                                <div class="icon">
                                    <i class="fas fa-signal"></i>
                                </div>
                            </div>
                        </div>
                        <div class="col-lg-2 col-6">
                            <div class="small-box bg-warning">
                                <div class="inner">
                                    <h3>44</h3>
                                    <p>Disciplinas deportivas</p>
                                </div>
                                <div class="icon">
                                    <i class="fas fa-chart-area"></i>
                                </div>
                            </div>
                        </div>
                        <div class="col-lg-2 col-6">
                            <div class="small-box bg-danger">
                                <div class="inner">
                                    <h3>65</h3>
                                    <p>Ligas</p>
                                </div>
                                <div class="icon">
                                    <i class="fas fa-users"></i>
                                </div>
                            </div>
                        </div>
                        <div class="col-lg-2 col-6">
                            <div class="small-box bg-secondary">
                                <div class="inner">
                                    <h3>23</h3>
                                    <p>Clubes</p>
                                </div>
                                <div class="icon">
                                    <i class="fas fa-sort-numeric-up-alt"></i>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <section class="col-lg-4 offset-lg-3">
                            <img src="https://upload.wikimedia.org/wikipedia/commons/thumb/c/c5/Colombia_Sucre_location_map_%28adm_colored%29.svg/400px-Colombia_Sucre_location_map_%28adm_colored%29.svg.png">
                            <!-- <div class="card bg-gradient-primary">
                <div class="card-header border-0">
                  <h3 class="card-title"><i class="fas fa-map-marker-alt mr-1"></i>Visitors</h3>
                  <div class="card-tools">
                    <button type="button" class="btn btn-primary btn-sm daterange" data-toggle="tooltip" title="Date range"><i class="far fa-calendar-alt"></i></button>
                    <button type="button" class="btn btn-primary btn-sm" data-card-widget="collapse" data-toggle="tooltip" title="Collapse"><i class="fas fa-minus"></i></button>
                  </div>
                </div>
                <div class="card-body">
                  <div id="world-map" style="height: 250px; width: 100%;"></div>
                </div>
              </div> -->
                        </section>
                        <section class="col-lg-4">
                            <div class="login-box">
                                <div class="login-logo">
                                    <a href="/">Indersucre</a>
                                </div>
                                <!-- /.login-logo -->
                                <div class="card">
                                    <div class="card-body login-card-body">
                                        <p class="login-box-msg">Inicio de Sessión</p>
                                        @if (session('status'))
                                        <div class="alert alert-success" role="alert">
                                            {{ session('status') }}
                                        </div>
                                        @endif
                                        @if ($errors->any())
                                        <div class="alert alert-danger alert-dismissible">
                                            <button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>
                                            <div class="alert-text">
                                                @foreach ($errors->all() as $error)
                                                <div>{{ $error }}</div>
                                                @endforeach
                                            </div>
                                        </div>
                                        @endif
                                        <form action="{{route('login_post')}}" method="POST" autocomplete="off">
                                            @csrf
                                            <div class="input-group mb-3">
                                                <input type="text" name="usuario" class="form-control" value="{{old('usuario')}}" placeholder="Usuario">
                                                <div class="input-group-append">
                                                    <div class="input-group-text">
                                                        <span class="fas fa-user"></span>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="input-group mb-3">
                                                <input type="password" name="password" class="form-control" placeholder="Contraseña">
                                                <div class="input-group-append">
                                                    <div class="input-group-text">
                                                        <span class="fas fa-lock"></span>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="row">
                                                <div class="col-8"></div>
                                                <!-- /.col -->
                                                <div class="col-4">
                                                    <button type="submit" class="btn btn-primary btn-block">Ingresar</button>
                                                </div>
                                                <!-- /.col -->
                                            </div>
                                        </form>
                                        <div class="social-auth-links text-center mb-3"></div>
                                        <p class="mb-1">
                                            @if (Route::has('password.request'))
                                            <a class="btn btn-link" href="{{ route('password.request') }}">
                                                {{ __('Forgot Your Password?') }}
                                            </a>
                                            @endif
                                        </p>
                                    </div>
                                    <!-- /.login-card-body -->
                                </div>
                            </div>
                        </section>
                    </div>
                </div>
                <!-- /.login-box -->
                <script src="{{asset("assets/$theme/plugins/jquery/jquery.min.js")}}"></script>
                <!-- Bootstrap 4 -->
                <script src="{{asset("assets/$theme/plugins/bootstrap/js/bootstrap.bundle.min.js")}}"></script>
                <!-- AdminLTE App -->
                <script src="{{asset("assets/$theme/dist/js/adminlte.min.js")}}"></script>
</body>

</html>