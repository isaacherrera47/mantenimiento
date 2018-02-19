<div class="wrapper">

    <header class="main-header">
        <!-- Logo -->
        <a href="index.html" class="logo">
            <!-- mini logo for sidebar mini 50x50 pixels -->
            <span class="logo-mini">
                    <img src="<?php echo base_url('dist/img/ramlwmini.png') ?>">
                </span>
            <!-- logo for regular state and mobile devices -->
            <span class="logo-lg">
                    <img src="<?php echo base_url('dist/img/ramlw.png') ?>">
                </span>
        </a>
        <!-- Header Navbar: style can be found in header.less -->
        <nav class="navbar navbar-static-top">
            <!-- Sidebar toggle button-->
            <a href="#" class="sidebar-toggle" data-toggle="offcanvas" role="button">
                <span class="sr-only">Toggle navigation</span>
            </a>

            <div class="navbar-custom-menu">
                <ul class="nav navbar-nav">
                    <!-- User Account: style can be found in dropdown.less -->
                    <li class="dropdown user user-menu">
                        <a href="#" class="dropdown-toggle" data-toggle="dropdown">
                            <!--<img src="dist/img/user2-160x160.jpg" class="user-image" alt="User Image">-->
                            <!-- use class="hidden-xs" to hide username in mobile -->
                            <span>Usuario</span>
                        </a>
                    </li>
                    <!-- Control Sidebar Toggle Button -->
                    <li>
                        <a href="#" data-toggle="control-sidebar">
                            <i class="fa fa-bell"></i>
                        </a>
                    </li>
                </ul>
            </div>
        </nav>
    </header>

    <aside class="main-sidebar">
        <section class="sidebar">
            <ul class="sidebar-menu">
                <li class="header">MENU PRINCIPAL</li>
                <li class="active treeview">
                    <a href="#">
                        <i class="fa fa-calendar-check-o"></i>
                        <span>PREPROGRAMACIÓN</span>
                    </a>
                </li>
                <li class="treeview">
                    <a href="#">
                        <i class="fa fa-truck"></i>
                        <span>EMBARQUES</span>
                    </a>
                </li>
                <li class="treeview">
                    <a href="#">
                        <i class="fa fa-file-text"></i>
                        <span style="width: 320px;">FACTURACIÓN</span>
                        <span class="pull-right-container pull-right-container-fctrcn">
                                <i class="fa fa-angle-left pull-right"></i>
                            </span>
                    </a>
                    <ul class="treeview-menu fctrcn">
                        <li>
                            <a href="#">
                                <i class="fa fa-circle-o"></i> VALIDAR DOCUMENTO DE ENTREGA</a>
                        </li>
                        <li>
                            <a href="#">
                                <i class="fa fa-circle-o"></i> VIAJES DENEGADOS</a>
                        </li>
                        <li>
                            <a href="#">
                                <i class="fa fa-circle-o"></i> VIAJES A FACTURAR</a>
                        </li>
                        <li>
                            <a href="#">
                                <i class="fa fa-circle-o"></i> FACTURAS PROCESADAS</a>
                        </li>
                        <li>
                            <a href="#">
                                <i class="fa fa-circle-o"></i> FACTURAS PROCESADAS CORREO ENVIADO</a>
                        </li>
                        <li>
                            <a href="#">
                                <i class="fa fa-circle-o"></i> FACTURAS CANCELADAS</a>
                        </li>
                    </ul>
                </li>
                <li class="treeview">
                    <a href="#">
                        <i class="fa fa-user"></i>
                        <span style="width: 225px;">NÓMINA</span>
                        <span class="pull-right-container pull-right-container-nmn">
                                <i class="fa fa-angle-left pull-right"></i>
                            </span>
                    </a>
                    <ul class="treeview-menu nmn">
                        <li>
                            <a href="#">
                                <i class="fa fa-circle-o"></i> TABULADOR PAGOS</a>
                        </li>
                        <li>
                            <a href="#">
                                <i class="fa fa-circle-o"></i> IMPORTAR ARCHIVO DIESEL</a>
                        </li>
                        <li>
                            <a href="#">
                                <i class="fa fa-circle-o"></i> PRÉSTAMOS</a>
                        </li>
                        <li>
                            <a href="#">
                                <i class="fa fa-circle-o"></i> APROBAR GASTOS</a>
                        </li>
                        <li>
                            <a href="#">
                                <i class="fa fa-circle-o"></i> REPORTE</a>
                        </li>
                        <li>
                            <a href="#">
                                <i class="fa fa-circle-o"></i> DESCARGAR NÓMINA</a>
                        </li>
                    </ul>
                </li>
                <li class="treeview">
                    <a href="#">
                        <i class="fa fa-book"></i>
                        <span style="width: 220px;">CATÁLOGO</span>
                        <span class="pull-right-container pull-right-container-ctlg">
                                <small class="label pull-right bg-green">0</small>
                            </span>
                    </a>
                    <ul class="treeview-menu ctlg">
                        <li>
                            <a href="#">
                                <i class="fa fa-circle-o"></i> USUARIOS</a>
                        </li>
                        <li>
                            <a href="#">
                                <i class="fa fa-circle-o"></i> CLIENTES</a>
                        </li>
                        <li>
                            <a href="#">
                                <i class="fa fa-circle-o"></i> OFICINAS</a>
                        </li>
                        <li>
                            <a href="#">
                                <i class="fa fa-circle-o"></i> LBL_SITIOS_SITIOS</a>
                        </li>
                        <li>
                            <a href="#">
                                <i class="fa fa-circle-o"></i> TRACTORES</a>
                        </li>
                        <li>
                            <a href="#">
                                <i class="fa fa-circle-o"></i> TRACTORES TRANSFER</a>
                        </li>
                        <li>
                            <a href="#">
                                <i class="fa fa-circle-o"></i> CAJAS</a>
                        </li>
                        <li>
                            <a href="#">
                                <i class="fa fa-circle-o"></i> CHOFERES</a>
                        </li>
                        <li>
                            <a href="#">
                                <i class="fa fa-circle-o"></i> CHOFERES TRANSFER</a>
                        </li>
                        <li>
                            <a href="#">
                                <i class="fa fa-circle-o"></i> CATEGORÍAS</a>
                        </li>
                        <li>
                            <a href="#">
                                <i class="fa fa-circle-o"></i> GEOCERCAS</a>
                        </li>
                        <li>
                            <a href="#">
                                <small class="label bg-green"
                                       style="padding: .2em .6em; vertical-align: 25%; margin-right: 3px;">0
                                </small>
                                SOLICITUD DE GEOCERCAS</a>
                        </li>
                        <li>
                            <a href="#">
                                <i class="fa fa-circle-o"></i> CRUCES</a>
                        </li>
                    </ul>
                </li>
                <li class="treeview">
                    <a href="#">
                        <i class="fa fa-edit"></i>
                        <span style="width: 285px;">REPORTES</span>
                        <span class="pull-right-container pull-right-container-rprts">
                                <i class="fa fa-angle-left pull-right"></i>
                            </span>
                    </a>
                    <ul class="treeview-menu rprts">
                        <li>
                            <a href="#">
                                <i class="fa fa-circle-o"></i> ARCHIVOS FALTANTES DE CHOFERES</a>
                        </li>
                        <li>
                            <a href="#">
                                <i class="fa fa-circle-o"></i> ARCHIVOS FALTANTES DE TRACTORES</a>
                        </li>
                        <li>
                            <a href="#">
                                <i class="fa fa-circle-o"></i> ARCHIVOS FALTANTES DE CAJAS</a>
                        </li>
                        <li>
                            <a href="#">
                                <i class="fa fa-circle-o"></i> REPORTEADOR</a>
                        </li>
                        <li>
                            <a href="#">
                                <i class="fa fa-circle-o"></i> EVALUACIÓN DE CHOFERES</a>
                        </li>
                    </ul>
                </li>
                <li class="treeview">
                    <a href="#">
                        <i class="fa fa-tablet"></i>
                        <span style="width: 250px;">APP MÓVIL</span>
                        <span class="pull-right-container pull-right-container-ppmvl">
                                <i class="fa fa-angle-left pull-right"></i>
                            </span>
                    </a>
                    <ul class="treeview-menu ppmvl">
                        <li>
                            <a href="#">
                                <i class="fa fa-circle-o"></i> NOTIFICACIONES</a>
                        </li>
                        <li>
                            <a href="#">
                                <i class="fa fa-circle-o"></i> NÓMINA</a>
                        </li>
                        <li>
                            <a href="#">
                                <i class="fa fa-circle-o"></i> USUARIOS VÁLIDOS APLICACIÓN</a>
                        </li>
                        <li>
                            <a href="#">
                                <i class="fa fa-circle-o"></i> VIAJES CONFIRMADOS</a>
                        </li>
                    </ul>
                </li>
                <li class="treeview">
                    <a href="#">
                        <i class="fa fa-cog"></i>
                        <span style="width: 200px;">CONFIGURACIÓN</span>
                        <span class="pull-right-container pull-right-container-cnfgrcn">
                                <i class="fa fa-angle-left pull-right"></i>
                            </span>
                    </a>
                    <ul class="treeview-menu cnfgrcn">
                        <li>
                            <a href="#">
                                <i class="fa fa-circle-o"></i> CONFIGURACIÓN</a>
                        </li>
                        <li>
                            <a href="#">
                                <i class="fa fa-circle-o"></i> ACTIVAR EMBARQUES</a>
                        </li>
                        <li>
                            <a href="#">
                                <i class="fa fa-circle-o"></i> ADMIN REPORT</a>
                        </li>
                        <li>
                            <a href="#">
                                <i class="fa fa-circle-o"></i> NOTIFICACIONES</a>
                        </li>
                        <li>
                            <a href="#">
                                <i class="fa fa-circle-o"></i> BITACORA DE USUARIO</a>
                        </li>
                    </ul>
                </li>
                <li class="treeview">
                    <a href="#">
                        <i class="fa fa-sign-out"></i>
                        <span>LOGOUT</span>
                    </a>
                </li>
            </ul>
        </section>
        <!-- /.sidebar -->
    </aside>

    <!-- Content Wrapper. Contains page content -->
    <div class="content-wrapper">
        <!-- Content Header (Page header) -->
        <section class="content-header">
            <h1>
                Catálogo de servicios externos
            </h1>
        </section>

        <!-- Main content -->
        <section class="content">

            <div class="row">
                <div class="col-md-5 col-md-offset-7 col-sm-12">
                    <div style="float: right; margin-bottom: 15px">
                        <div class="btn-group">
                            <button type="button" id="agregar-servicio" class="btn btn-block btn-success"
                                    data-toggle="modal" data-action="Nuevo" data-target="#myModal">
                                <i class="fa fa-fw fa-plus"></i> Agregar servicio externo
                            </button>
                        </div>
                    </div>
                </div>
            </div>

            <div class="example-modal">
                <div class="modal fade bs-example-modal-lg" id="myModal" tabindex="-1" role="dialog"
                     aria-labelledby="myModalLabel">
                    <div class="modal-dialog">
                        <div class="modal-content">
                            <div class="modal-header">
                                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                    <span aria-hidden="true">&times;</span>
                                </button>
                                <h4 class="modal-title"></h4>
                            </div>
                            <form id="form-servicio">
                                <input type="hidden" value="Externo" id="tipo" name="tipo">
                                <div class="modal-body">
                                    <div class="box-body">
                                        <div class="row">
                                            <div class="col-md-6">
                                                <div class="form-group">
                                                    <label for="nombre">Nombre</label>
                                                    <input type="text" class="form-control" id="nombre"
                                                           placeholder="Nombre" name="nombre">
                                                </div>
                                            </div>
                                            <div class="col-md-6">
                                                <div class="form-group">
                                                    <label for="descripcion">Descripcion</label>
                                                    <input type="text" class="form-control" id="descripcion"
                                                           placeholder="Descripcion" name="descripcion">
                                                </div>
                                            </div>
                                            <div class="col-md-6">
                                                <div class="form-group">
                                                    <label for="tiempo_entrega">Tiempo de entrega</label>
                                                    <input type="text" class="form-control" id="tiempo_entrega"
                                                           placeholder="Tiempo de entrega" name="tiempo_entrega">
                                                </div>
                                            </div>
                                            <div class="col-md-6">
                                                <div class="form-group">
                                                    <label for="categoria">Categoria</label>
                                                    <input type="text" class="form-control" id="categoria"
                                                           placeholder="Categoria" name="categoria">
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="modal-footer">
                                    <button type="button" class="btn btn-danger" data-dismiss="modal">Cancelar</button>
                                    <button type="submit" class="btn btn-success">Guardar</button>
                                </div>
                            </form>
                        </div>
                        <!-- /.modal-content -->
                    </div>
                    <!-- /.modal-dialog -->
                </div>
                <!-- /.modal -->
            </div>
            <!-- /.example-modal -->

            <div class="box">
                <div class="box-header">
                    <h3 class="box-title">Lista de servicios externos</h3>
                </div>
                <!-- /.box-header -->
                <div class="box-body">
                    <table id="example1" class="table table-bordered table-striped">
                        <thead>
                        <tr>
                            <th>Nombre</th>
                            <th>Descripcion</th>
                            <th>Categoria</th>
                            <th>Tiempo</th>
                            <th>Acciones</th>
                        </tr>
                        </thead>
                        <tbody>
                        </tbody>
                        <tfoot>
                        <tr>
                            <th>Nombre</th>
                            <th>Descripcion</th>
                            <th>Categoria</th>
                            <th>Tiempo</th>
                            <th>Acciones</th
                        </tr>
                        </tfoot>
                    </table>
                </div>
                <!-- /.box-body -->
            </div>
            <!-- /.box -->

        </section>
        <!-- /.content -->
    </div>
    <!-- /.content-wrapper -->
    <footer class="main-footer">
        <div class="pull-right hidden-xs">

        </div>

    </footer>
    <!-- /.control-sidebar -->
    <!-- Add the sidebar's background. This div must be placed
   immediately after the control sidebar -->
    <div class="control-sidebar-bg"></div>
</div>
<script id="botones-accion" type="text/x-custom-template">
    <button type="button" class="btn bg-light-blue btn-sm editar-servicio" data-toggle="modal"
            data-target="#myModal" data-action="Editar">
        <i class="fa fa-pencil"></i>
    </button>
    <button type="button" class="btn btn-danger btn-sm eliminar-servicio">
        <i class="fa fa-trash"></i>
    </button>
    <button type="button" class="btn btn-info btn-sm ver-proveedores">
        <i class="fa fa-truck"></i>
    </button>
</script>
<!-- ./wrapper -->
