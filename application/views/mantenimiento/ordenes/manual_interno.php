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
				Catálogo de ordenes de servicio
			</h1>
		</section>

		<!-- Main content -->
		<section class="content">

			<div class="row">
				<div class="col-md-5 col-md-offset-7 col-sm-12">
					<div style="float: right; margin-bottom: 15px">
						<div class="btn-group">
							<button type="button" id="agregar-orden" class="btn btn-block btn-success"
									data-toggle="modal" data-action="Nuevo" data-target="#myModal">
								<i class="fa fa-fw fa-plus"></i> Nueva orden de mantenimiento interno
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
							<form id="form-orden" enctype="multipart/form-data">
								<div class="modal-body">
									<div class="box-body">
										<div class="row">
											<div class="col-md-6 hidden_edit">
												<div class="form-group">
													<label for="tipo">Tipo</label>
													<select class="form-control" name="tipo" id="tipo">
														<option value="1">Tractor</option>
														<option value="2">Caja</option>
													</select>
												</div>
											</div>
											<div class="col-md-6 hidden_edit" id="cb-tractor">
												<div class="form-group">
													<label for="tractor">Tractor</label>
													<select class="form-control" name="tractor" id="tractor">
														<? foreach ($tractores as $tractor): ?>
															<option value="<?= $tractor['idtractor'] ?>">
																<?= $tractor['tractor'] ?>
															</option>
														<? endforeach ?>
													</select>
												</div>
											</div>
											<div class="col-md-6 hidden_edit" id="cb-caja">
												<div class="form-group">
													<label for="caja">Caja</label>
													<select class="form-control" name="caja" id="caja">
														<? foreach ($cajas as $caja): ?>
															<option value="<?= $caja['idCaja'] ?>">
																<?= $caja['caja'] ?>
															</option>
														<? endforeach ?>
													</select>
												</div>
											</div>
											<div class="col-md-12 hidden_edit">
												<div class="form-group">
													<label for="servicios">Servicios</label>
													<select class="form-control" name="servicios[]" multiple
															data-placeholder="Servicios" style="width:100%;" id="servicios">
														<? foreach ($servicios as $servicio): ?>
															<option value="<?= $servicio['id'] ?>"><?= $servicio['nombre'] ?></option>
														<? endforeach ?>
													</select>
												</div>
											</div>
											<div class="col-md-12">
												<div class="form-group">
													<label for="notas">Notas</label>
													<textarea class="form-control" id="notas"
															  placeholder="Notas" name="notas"></textarea>
												</div>
											</div>
											<div class="col-md-12 hidden_edit">
												<div class="checkbox">
													<label>
														<input type="checkbox" id="orden-compra" name="orden-compra">
														Voy a generar una orden de compra de refacciones
													</label>
												</div>
											</div>
											<div class="col-md-12" id="cb-mecanico">
												<div class="form-group">
													<label for="id_mecanico">Mecanico</label>
													<select class="form-control" name="id_mecanico" id="id_mecanico">
														<? foreach ($mecanicos as $mecanico): ?>
															<option value="<?= $mecanico['id_mecanico'] ?>">
																<?= $mecanico['nombre'] . ' ' . $mecanico['apellido'] ?>
															</option>
														<? endforeach ?>
													</select>
													<p class="text-muted">Asignado temporalmente hasta que se apruebe la orden</p>
												</div>
											</div>
											<div class="col-md-12 hidden_edit" id="cb-refacciones">
												<div class="form-group">
													<label for="refacciones">Refacciones</label>
													<select class="form-control" name="refacciones[]" multiple
															data-placeholder="Refacciones" style="width:100%;" id="refacciones">
														<? foreach ($refacciones as $refaccion): ?>
															<option value="<?= $refaccion['id'] ?>"><?= $refaccion['nombre'] ?></option>
														<? endforeach ?>
													</select>
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
					<h3 class="box-title">Lista de ordenes de mantenimiento interno</h3>
				</div>
				<!-- /.box-header -->
				<div class="box-body">
					<table id="example1" class="table table-bordered table-striped">
						<thead>
						<tr>
							<th>ID</th>
							<th>Mecanico</th>
							<th>Notas</th>
							<th>Tipo</th>
							<th>Caja/Tractor</th>
							<th>Fecha de entrada</th>
							<th>Fecha de salida</th>
							<th>Acciones</th>
						</tr>
						</thead>
						<tbody>
						</tbody>
						<tfoot>
						<tr>
							<th>ID</th>
							<th>Mecanico</th>
							<th>Notas</th>
							<th>Tipo</th>
							<th>Caja/Tractor</th>
							<th>Fecha de entrada</th>
							<th>Fecha de salida</th>
							<th>Acciones</th>
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
	<button type="button" class="btn bg-light-blue btn-sm editar-orden" data-toggle="modal"
			data-target="#myModal" data-action="Editar">
		<i class="fa fa-pencil"></i>
	</button>
	<button type="button" class="btn btn-danger btn-sm eliminar-orden">
		<i class="fa fa-trash"></i>
	</button>
	<button type="button" class="btn btn-info btn-sm ver-detalle">
		<i class="fa fa-list-ul"></i>
	</button>
	<button type="button" class="btn btn-default btn-sm imprimir">
		<i class="fa fa-file-pdf-o"></i>
	</button>
</script>
<!-- ./wrapper -->
