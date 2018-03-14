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
				Detalle de orden de mantenimiento interno manual no. <?= $orden->id ?>
			</h1>
		</section>

		<!-- Main content -->
		<section class="content">

			<div class="box collapsed-box">
				<div class="box-header with-border">
					<h3 class="box-title">Detalles de la orden</h3>
					<div class="box-tools pull-right">
						<!-- Collapse Button -->
						<button type="button" class="btn btn-box-tool" data-widget="collapse">
							<i class="fa fa-plus"></i>
						</button>
					</div>
					<!-- /.box-tools -->
				</div>
				<!-- /.box-header -->
				<div class="box-body">
					<div class="col-sm-6">
						<strong><i class="fa fa-key"></i> ID</strong>
						<p class="text-muted"><?= $orden->id ?></p>
						<hr>
					</div>
					<div class="col-sm-6">
						<strong><i class="fa fa-file-text"></i> Notas</strong>
						<p class="text-muted"><?= $orden->notas ?></p>
						<hr>
					</div>
					<div class="col-sm-6">
						<strong><i class="fa fa-calendar"></i> Fecha de entrada</strong>
						<p class="text-muted"><?= $orden->fecha_entrada ?></p>
						<hr>
					</div>
					<div class="col-sm-6">
						<strong><i class="fa fa-calendar"></i> Fecha de salida</strong>
						<p class="text-muted"><?= $orden->fecha_salida ?></p>
						<hr>
					</div>
					<div class="col-md-3 col-sm-6">
						<strong><i class="fa fa-asterisk"></i> Tipo</strong>
						<p class="text-muted"><?= $orden->tipo['descripcion'] ?></p>
						<hr>
					</div>
					<?php if (isset($orden->tractor)): ?>
						<div class="col-md-3 col-sm-6">
							<strong><i class="fa fa-truck"></i> Identificador </strong>
							<p class="text-muted"><?= $orden->tractor->tractor ?></p>
							<hr>
						</div>
						<div class="col-md-3 col-sm-6">
							<strong><i class="fa fa-barcode"></i> # VIN </strong>
							<p class="text-muted"><?= $orden->tractor->numerovin ?></p>
							<hr>
						</div>
						<div class="col-md-3 col-sm-6">
							<strong><i class="fa fa-barcode"></i> Placas MX </strong>
							<p class="text-muted"><?= $orden->tractor->placasmx ?></p>
							<hr>
						</div>
					<?php else : ?>
						<div class="col-md-3 col-sm-6">
							<strong><i class="fa fa-truck"></i> Identificador </strong>
							<p class="text-muted"><?= $orden->caja->caja ?></p>
							<hr>
						</div>
						<div class="col-md-3 col-sm-6">
							<strong># VIN </strong>
							<p class="text-muted"><?= $orden->caja->numero_vin ?></p>
							<hr>
						</div>
						<div class="col-md-3 col-sm-6">
							<strong><i class="fa fa-barcode"></i> Placas MX </strong>
							<p class="text-muted"><?= $orden->caja->placas_mx ?></p>
							<hr>
						</div>
					<?php endif ?>
					<div class="col-sm-6">
						<strong><i class="fa fa-male"></i> Mecanico a cargo</strong>
						<p class="text-muted"><?= $orden->mecanico->nombre . ' ' . $orden->mecanico->apellido ?></p>
					</div>
					<div class="col-sm-6">
						<strong><i class="fa fa-file-image-o"></i> Estado de la orden </strong>
						<? if ($orden->estado === '0'): ?>
							<p class="text-muted">Orden de compra rechazada</p>
						<?php elseif($orden->estado === '1'): ?>
							<a href="<?= base_url('uploads/' . $orden->mecanico->horas) ?>"
							   class="btn btn-default btn-block" target="_blank">
								Ver orden de compra
							</a>
						<?php else: ?>
							<p class="text-muted">Aún no se generado ninguna orden de compra</p>
						<?php endif ?>
					</div>

				</div>
				<!-- /.box-body -->
			</div>
			<!-- /.box -->

			<div class="row">
				<div class="col-md-5 col-md-offset-7 col-sm-12">
					<div style="float: right; margin-bottom: 15px">
						<div class="btn-group">
							<button type="button" id="agregar-mecanico" class="btn btn-block btn-success"
									data-toggle="modal" data-action="Nuevo" data-target="#myModal">
								<i class="fa fa-fw fa-plus"></i> Agregar servicio a orden
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
							<form id="form-orden-servicio">
								<div class="modal-body">
									<div class="box-body">
										<div class="row">
											<div class="col-md-12">
												<div class="form-group">
													<label for="id_servicio">Servicios disponibles</label>
													<select class="form-control" name="id_servicio" id="id_servicio">
														<?php foreach ($servicios as $servicio): ?>
															<option value="<?= $servicio['id'] ?>">
																<?= $servicio['nombre'] ?>
															</option>
														<? endforeach ?>
													</select>
												</div>
											</div>
										</div>
									</div>
								</div>
								<div class="modal-footer">
									<button type="button" class="btn btn-danger" data-dismiss="modal">Cancelar</button>
									<button type="submit" class="btn btn-success">Agregar</button>
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

			<div class="example-modal">
				<div class="modal fade bs-example-modal-lg" id="myModal2" tabindex="-1" role="dialog"
					 aria-labelledby="myModalLabel">
					<div class="modal-dialog">
						<div class="modal-content">
							<div class="modal-header">
								<button type="button" class="close" data-dismiss="modal" aria-label="Close">
									<span aria-hidden="true">&times;</span>
								</button>
								<h4 class="modal-title"></h4>
							</div>
							<form id="form-orden-refaccion">
								<div class="modal-body">
									<div class="box-body">
										<div class="row">
											<div class="col-md-12">
												<div class="form-group">
													<label for="id_refaccion">Refacciones disponibles</label>
													<select class="form-control" name="id_refaccion" id="id_refaccion">
														<?php foreach ($refacciones as $refaccion): ?>
															<option value="<?= $refaccion['id'] ?>">
																<?= $refaccion['nombre'] ?>
															</option>
														<? endforeach ?>
													</select>
												</div>
											</div>
											<div class="col-md-12">
												<div class="form-group">
													<label for="piezas">Piezas</label>
													<input id="piezas" name="piezas" class="form-control" type="number">
												</div>
											</div>
										</div>
									</div>
								</div>
								<div class="modal-footer">
									<button type="button" class="btn btn-danger" data-dismiss="modal">Cancelar</button>
									<button type="submit" class="btn btn-success">Agregar</button>
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
					<h3 class="box-title">
						Lista de servicios asignados para la orden.
					</h3>
				</div>
				<!-- /.box-header -->
				<div class="box-body">
					<table data-id="<?= $orden->id ?>" id="example1"
						   class="table table-bordered table-striped">
						<thead>
						<tr>
							<th>Nombre</th>
							<th>Descripcion</th>
							<th>Tiempo de entrega</th>
							<th>Acciones</th>
						</tr>
						</thead>
						<tbody>
						</tbody>
						<tfoot>
						<tr>
							<th>Nombre</th>
							<th>Descripcion</th>
							<th>Tiempo de entrega</th>
							<th>Acciones</th>
						</tr>
						</tfoot>
					</table>
				</div>
				<!-- /.box-body -->
			</div>
			<!-- /.box -->
			<div class="row">
				<div class="col-md-5 col-md-offset-7 col-sm-12">
					<div style="float: right; margin-bottom: 15px">
						<div class="btn-group">
							<button type="button" id="agregar-refaccion" class="btn btn-block btn-success"
									data-toggle="modal" data-action="Nuevo" data-target="#myModal2">
								<i class="fa fa-fw fa-plus"></i> Agregar refaccion a orden
							</button>
						</div>
					</div>
				</div>
			</div>
			<div class="box">
				<div class="box-header">
					<h3 class="box-title">
						Lista de refacciones asignadas para la orden.
					</h3>
				</div>
				<!-- /.box-header -->
				<div class="box-body">
					<table id="example2"
						   class="table table-bordered table-striped">
						<thead>
						<tr>
							<th>Nombre</th>
							<th>Descripcion</th>
							<th>Piezas</th>
							<th>Acciones</th>
						</tr>
						</thead>
						<tbody>
						</tbody>
						<tfoot>
						<tr>
							<th>Nombre</th>
							<th>Descripcion</th>
							<th>Piezas</th>
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
	<button type="button" class="btn btn-danger btn-sm eliminar-servicio">
		<i class="fa fa-trash"></i>
	</button>
	<button type="button" class="btn btn-info btn-sm ver-refacciones">
		<i class="fa fa-wrench"></i>
	</button>
</script>

<script id="botones-accion-refaccion" type="text/x-custom-template">
	<button type="button" class="btn bg-light-blue btn-sm editar-refaccion" data-toggle="modal"
			data-target="#myModal2" data-action="Editar">
		<i class="fa fa-pencil"></i>
	</button>
	<button type="button" class="btn btn-danger btn-sm eliminar-refaccion">
		<i class="fa fa-trash"></i>
	</button>
</script>
<!-- ./wrapper -->
