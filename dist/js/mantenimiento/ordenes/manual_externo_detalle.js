var url_root = window.location.origin + '/fletes/index.php' // Base url
var api_url = url_root + '/api/ordenes/?tipo_orden=manual_externo' // URL API servicioes
var api_servicios = url_root + '/api/ordenes/?tipo_orden=servicio' // URL API servicioes
var datos_temp = null // Referencia a datos temporales en edicion
var elemento_temp = null // Referencia temporal de boton de edicion
var ls = 'es' //Lenguaje del sistema

var elementos = {
	modal: $('#myModal'),
	form_modal: $('#form-servicio-proveedor'),
	tabla: $('#example1'),
	template_botones: $('#botones-accion').html(),
	id_mexterno: 0,
	id_proveedor: 0
}

$(document).ready(function () {
	llenarTabla()
	$(elementos.modal).on('show.bs.modal', function (e) {
		$(this).find('.modal-title').text(lenguaje[ls]['nuevo_servicio_oexterna'])
	})

	$(elementos.form_modal).on('submit', function (e) {
		e.preventDefault()
		var data = $(this).serialize()
		data += '&id_mexterno=' + elementos.id_mexterno
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

	$(elementos.tabla).on('click', '.eliminar-servicio', function (e) {
		elemento_temp = e.currentTarget
		datos_temp = elementos.datatable.row($(elemento_temp).parent()).data()
		console.log(datos_temp)
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
})

function llenarTabla() {
	elementos.id_mexterno = elementos.tabla.data('id')
	elementos.id_proveedor = elementos.tabla.data('id-proveedor')
	elementos.datatable = $(elementos.tabla).DataTable({
		"autoWidth": false,
		responsive: true,
		"ajax": {
			"url": api_url + '&id=' + elementos.id_mexterno,
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
}

function actualizarInterfaz(datos) {
	elementos.datatable.row.add(datos).draw()
	alertify.success(lenguaje[ls]['agregar_exito'])
	$(elementos.modal).modal('hide')
}
