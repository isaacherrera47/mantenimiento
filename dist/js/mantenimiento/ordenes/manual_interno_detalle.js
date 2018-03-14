var url_root = window.location.origin + '/fletes/index.php' // Base url
var api_url = url_root + '/api/ordenes/?tipo_orden=manual_interno' // URL API servicioes
var api_servicios = url_root + '/api/ordenes/?tipo_orden=servicio_in' // URL API servicioes
var api_refacciones = url_root + '/api/ordenes/?tipo_orden=refaccion' // URL API servicioes
var datos_temp = null // Referencia a datos temporales en edicion
var elemento_temp = null // Referencia temporal de boton de edicion
var ls = 'es' //Lenguaje del sistema

var elementos = {
	modal: $('#myModal'),
	modal_refaccion: $('#myModal2'),
	form_modal: $('#form-orden-servicio'),
	form_modal_refaccion: $('#form-orden-refaccion'),
	tabla: $('#example1'),
	tabla_refaccion: $('#example2'),
	template_botones: $('#botones-accion').html(),
	template_botones_refaccion: $('#botones-accion-refaccion').html(),
	id_minterno: 0,
}

$(document).ready(function () {
	llenarTabla()
	$(elementos.modal).on('show.bs.modal', function (e) {
		$(this).find('.modal-title').text(lenguaje[ls]['nuevo_servicio_oexterna'])
	})
	elementos.modal_refaccion.on('show.bs.modal', function (e) {
		accion = $(e.relatedTarget).data('action')
		$(this).find('.modal-title').text(accion + ' ' + lenguaje[ls]['refaccion_ointerna'])
		if (accion == 'Nuevo') {
			$(elementos.form_modal_refaccion)[0].reset()
		} else {
			elemento_temp = e.relatedTarget
			datos_temp = elementos.datatable_refaccion.row($(elemento_temp).parent()).data()
			for (item in datos_temp) {
				$(elementos.form_modal_refaccion).find('#' + item).val(datos_temp[item])
			}
		}
	})

	$(elementos.form_modal).on('submit', function (e) {
		e.preventDefault()
		var data = $(this).serialize()
		data += '&id_minterno=' + elementos.id_minterno
		$.ajax({
			url: api_servicios,
			data: data,
			method: 'POST',
			success: function (data) {
				actualizarInterfaz(data)
			},
			error: function (e, d) {
				if (e.status == '409') {
					alertify.error(lenguaje[ls]['duplicado_error'])
					$(elementos.modal).modal('hide')
				}
				console.log(d)
				console.log(e)
			}
		})
	})

	elementos.form_modal_refaccion.on('submit', function (e) {
		e.preventDefault()
		var data = $(this).serialize()
		var metodo = accion == 'Nuevo' ? 'POST' : 'PUT'
		data += accion == 'Nuevo' ? '&id_minterno=' + elementos.id_minterno : '&id=' + datos_temp.id
		$.ajax({
			url: api_refacciones,
			data: data,
			method: metodo,
			success: function (data) {
				var texto = accion == 'Nuevo' ? lenguaje[ls]['agregar_exito'] : lenguaje[ls]['actualizar_exito']
				if (accion == 'Nuevo') {
					elementos.datatable_refaccion.row.add(data).draw()
				} else {
					elementos.datatable_refaccion.row($(elemento_temp).parent()).data(data).draw()
					datos_temp = null
					elemento_temp = null
				}
				alertify.success(texto)
				elementos.modal_refaccion.modal('hide')
			},
			error: function (e, d) {
				if (e.status == '409') {
					alertify.error(lenguaje[ls]['duplicado_error'])
					elementos.modal_refaccion.modal('hide')
				}
				console.log(d)
				console.log(e)
			}
		})
	})

	$(elementos.tabla).on('click', '.eliminar-servicio', function (e) {
		elemento_temp = e.currentTarget
		datos_temp = elementos.datatable.row($(elemento_temp).parent()).data()
		alertify.confirm(lenguaje[ls]['borrar_titulo'], lenguaje[ls]['borrar_mensaje'], function (e) {
			// Por estandar, el metodo DELETE solo recibe parametros en URL
			$.ajax({
				url: api_servicios + '&id=' + datos_temp.id,
				method: 'DELETE',
				success: function () {
					elementos.datatable.row($(elemento_temp).parent()).remove().draw()
					alertify.success(lenguaje[ls]['borrar_exito'])
				},
				error: function (e) {
					alertify.error(lenguaje[ls]['borrar_error'])
				}
			})
		}, function (e) {
		})
	})

	elementos.tabla_refaccion.on('click', '.eliminar-refaccion', function (e) {
		elemento_temp = e.currentTarget
		datos_temp = elementos.datatable_refaccion.row($(elemento_temp).parent()).data()
		alertify.confirm(lenguaje[ls]['borrar_titulo'], lenguaje[ls]['borrar_mensaje'], function (e) {
			// Por estandar, el metodo DELETE solo recibe parametros en URL
			$.ajax({
				url: api_refacciones + '&id=' + datos_temp.id,
				method: 'DELETE',
				success: function () {
					elementos.datatable_refaccion.row($(elemento_temp).parent()).remove().draw()
					alertify.success(lenguaje[ls]['borrar_exito'])
				},
				error: function (e) {
					alertify.error(lenguaje[ls]['borrar_error'])
				}
			})
		}, function (e) {
		})
	})

	$(elementos.tabla).on('click', '.ver-refacciones', function (e) {
		elemento_temp = e.currentTarget
		datos_temp = elementos.datatable.row($(elemento_temp).parent()).data()
		window.location.href = url_root + '/mantenimiento/servicios/' + datos_temp.id_servicio
	})
})

function llenarTabla() {
	elementos.id_minterno = elementos.tabla.data('id')
	elementos.datatable = $(elementos.tabla).DataTable({
		"autoWidth": false,
		responsive: true,
		"ajax": {
			"url": api_url + '&id=' + elementos.id_minterno,
			"dataSrc": "data.servicios"
		},
		"columns": [
			{'data': 'nombre'},
			{'data': 'descripcion'},
			{'data': 'tiempo_entrega'},
			{
				"data": null,
				"defaultContent": elementos.template_botones
			}
		]
	});

	elementos.datatable_refaccion = elementos.tabla_refaccion.DataTable({
		"autoWidth": false,
		responsive: true,
		"ajax": {
			"url": api_url + '&id=' + elementos.id_minterno,
			"dataSrc": "data.refacciones"
		},
		"columns": [
			{'data': 'nombre'},
			{'data': 'descripcion'},
			{'data': 'piezas'},
			{
				"data": null,
				"defaultContent": elementos.template_botones_refaccion
			}
		]
	});
}

function actualizarInterfaz(datos) {
	elementos.datatable.row.add(datos).draw()
	alertify.success(lenguaje[ls]['agregar_exito'])
	$(elementos.modal).modal('hide')
}
