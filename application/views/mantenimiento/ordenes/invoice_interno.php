<section class="invoice">
	<!-- title row -->
	<div class="row">
		<div class="col-xs-12">
			<h2 class="page-header">
				<i class="fa fa-file-pdf-o"></i> Orden de mantenimiento
				<small class="pull-right">Fecha: <?= $now ?></small>
			</h2>
		</div>
		<!-- /.col -->
	</div>
	<!-- info row -->
	<div class="row invoice-info">
		<div class="col-sm-4 invoice-col">
			<address>
				<strong>Notas de la orden</strong><br>
				<?= $orden->notas ?>
			</address>
		</div>
		<!-- /.col -->
		<div class="col-sm-4 invoice-col">
			<b>Unidad</b><br>
			<br>
			<?php if (isset($orden->tractor)): ?>
				<b>ID Tractor:</b> <?= $orden->tractor->idtractor ?><br>
				<b>Tractor:</b> <?= $orden->tractor->tractor ?><br>
				<b># VIN:</b> <?= $orden->tractor->numerovin ?><br>
				<b>Placas:</b> <?= $orden->tractor->placasmx ?><br>
			<?php else: ?>
				<b>ID Caja:</b> <?= $orden->caja->idCaja ?><br>
				<b>Caja:</b> <?= $orden->caja->caja ?><br>
				<b># VIN:</b> <?= $orden->caja->numero_vin ?><br>
				<b>Placas:</b> <?= $orden->caja->placas_mx ?><br>
			<?php endif ?>
		</div>
		<!-- /.col -->
		<div class="col-sm-4 invoice-col">
			<b>Orden de compra de refacciones</b><br>
			<br>
			<b>ID Orden:</b> <?= $orden->id ?><br>
			<b>Estado de la Orden:</b>
			<?php if ($orden->estado == '0'): ?>
			Orden Rechazada
			<?php elseif ($orden->estado == '1'): ?>
			Orden Aprobada
			<?php else: ?>
			Orden pendiente de aprobación
			<?php endif ?>
			<br>
		</div>
		<!-- /.col -->
	</div>
	<!-- /.row -->

	<!-- Table row -->
	<div class="row">
		<div class="col-xs-12 table-responsive">
			<?php if (!empty($orden->refacciones)): ?>
				<table class="table table-striped">
				<thead>
				<tr>
					<th>Cantidad</th>
					<th>Nombre</th>
					<th>Descripcion</th>
				</tr>
				</thead>
				<tbody>
				<?php foreach ($orden->refacciones as $refaccion): ?>
					<tr>
						<td><?= $refaccion['piezas'] ?></td>
						<td><?= $refaccion['nombre'] ?></td>
						<td><?= $refaccion['descripcion'] ?></td>
					</tr>
				<?php endforeach; ?>
				</tbody>
			</table>
			<?php else: ?>
				<h4 class="text-center">Esta orden no contiene refacciones</h4>
			<?php endif ?>
		</div>
		<!-- /.col -->
	</div>
	<!-- /.row -->
</section>
