<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <title>@yield('title') | StarkTicket</title>

    {!!Html::style('css/bootstrap.min.css')!!}
    {!!Html::style('css/font-awesome.min.css')!!}
    {!!Html::style('css/admin.css')!!}
    @yield('style')
    <!--
    <style type="text/css">
         @media(max-width:765px) {
            body{
                padding-top: 50px; 

            }
        }
       @media(max-width:864px) {
            body{
                padding-top: 150px; 

            }
        }
        @media(max-width:963px) {
            body{
                padding-top: 75px; 

            }
        }
    </style>-->
</head>
<body>
    <nav class="navbar navbar-inverse navbar-fixed-top" role="navigation">
        <div class="container-fluid">
            <!-- Brand and toggle get grouped for better mobile display -->
            <div class="navbar-header">
                <button type="button" class="navbar-toggle" data-toggle="collapse" data-target="#bs-example-navbar-collapse-1">
                    <span class="sr-only">Toggle navigation</span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                </button>
                <a class="navbar-brand" href="{{url('admin')}}">Telecticke </a>
            </div>
            <!-- Collect the nav links, forms, and other content for toggling -->
            <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
                <ul class="nav navbar-nav navbar-left">
                    <li>
                        <a href="" class="dropdown-toggle" data-toggle="dropdown">Categorias <b class="caret"></b></a>
                        <ul class="dropdown-menu">
                            <li><a href="{{url('admin/category')}}">Listar</a></li>
                            <li><a href="{{url('admin/category/new')}}">Nuevo</a></li>
                        </ul>
                    </li>
                    <li>
                        <a href="#" class="dropdown-toggle" data-toggle="dropdown">Regalos <b class="caret"></b></a>
                        <ul class="dropdown-menu">
                            <li><a href="{{url('admin/gifts')}}">Listar</a></li>
                            <li><a href="{{url('admin/gifts/new')}}">Nuevo</a></li>
                            <li><a href="{{url('admin/exchange_gift')}}">Canjear</a></li>
                        </ul>
                    </li>
                    <li>
                        <a href="#" class="dropdown-toggle" data-toggle="dropdown">Trabajadores <b class="caret"></b></a>
                        <ul class="dropdown-menu">
                            <li><a href="{{url('admin/user/new')}}">Nuevo</a></li>
                            <li class="divider"></li>
                            <li><a href="{{url('admin/promoter')}}">Promotores de ventas</a></li>
                            <li><a href="{{url('admin/salesman')}}">Vendedores</a></li>
                            <li><a href="{{url('admin/admin')}}">Administradores</a></li>
                        </ul>
                    </li>
                    <li>
                        <a href="#" class="dropdown-toggle" data-toggle="dropdown">Puntos de Venta <b class="caret"></b></a>
                        <ul class="dropdown-menu">
                            <li><a href="{{url('admin/modules')}}">Listar</a></li>
                            <li><a href="{{url('admin/modules/new')}}">Nuevo</a></li>
                        </ul>
                    </li>
                    <li>
                        <a href="#" class="dropdown-toggle" data-toggle="dropdown">Negocio <b class="caret"></b></a>
                        <ul class="dropdown-menu">
                            <li><a href="{{url('admin/ticket_return')}}">Devoluciones </a></li>
                            <li><a href="{{url('admin/ticket_return/new')}}">Nueva Devolucion </a></li>
                            <li class="divider"></li>
                            <li><a href="{{url('admin/politics')}}">Politicas </a></li>
                            <li><a href="{{url('admin/politics/new')}}">Nueva Politica </a></li>
                        </ul>
                    </li>
                    <li>
                        <a href="#" class="dropdown-toggle" data-toggle="dropdown">Reportes <b class="caret"></b></a>
                        <ul class="dropdown-menu">
                            <li class="active">
                                <a href="{{url('admin/report/sales')}}">Reporte Ventas</a>
                            </li>
                             <li>
                                <a href="{{url('admin/report/assistance')}}">Reporte de Asistencias</a>
                            </li>
                            <li>
                                <a href="{{url('admin/report/assignment')}}">Reporte de Asignación</a>
                            </li>
                        </ul>
                    </li>
                    <li class="dropdown">
                        <a href="#" class="dropdown-toggle" data-toggle="dropdown">Configuración  <b class="caret"></b></a>
                        <ul class="dropdown-menu">
                            <li><a href="{{url('admin/config/exchange_rate')}}">Tipo de cambio</a></li>
                            <li><a href="{{url('admin/config/about')}}">Acerca de</a></li>
                            <li><a href="{{url('admin/config/system')}}">Sistema</a></li>
                        </ul>
                    </li>

                </ul>

                <ul class="nav navbar-nav navbar-right">
                    <li><a href="">Administrador</a></li>
                    <li><a href="{{url('auth/logout')}}">Salir</a></li>
              </ul>
            </div>
            <!-- /.navbar-collapse -->
        </div>
        <!-- /.container -->
    </nav>
    <div class="container">
        <h1>@yield('title')</h1>
        <hr>
        @yield('content')
    </div>
    <div class="container">
        <hr>
        <p><b>Desarrollado por Stark</b></p>
    </div>


    {!!Html::script('js/jQuery-2.1.4.min.js')!!}
    {!!Html::script('js/bootstrap.min.js')!!}
    {!!Html::script('js/jquery.validate.min.js')!!}
    <script type="text/javascript">
    $(document).ready(function(){
        $('#form').validate({
        errorElement: "span",
        rules: {
        },
        highlight: function(element) {
            $(element).closest('.form-group')
            .removeClass('has-success').addClass('has-error');
        },
        success: function(element) {
            $(element)
            .addClass('help-inline')
            .closest('.form-group')
            .removeClass('has-error').addClass('has-success');
            }
        });
    });
    </script>
    @yield('javascript')

</body>
</html>