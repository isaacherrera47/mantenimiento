var url_root = window.location.origin + '/fletes/index.php' // Base url
var api_url = url_root + '/api/ordenes/?tipo_orden=manual_externo' // URL API servicioes
var api_servicios = url_root + '/api/servicios-proveedores/' // URL API servicioes
var accion = null; // Accion a ejecutar en modal
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
		accion = $(e.relatedTarget).data('action')
		$(this).find('.modal-title').text(accion + ' ' + lenguaje[ls]['servicio_proveedor'])
		if (accion == 'Nuevo') {
			$(elementos.form_modal)[0].reset()
		} else {
			elemento_temp = e.relatedTarget
			datos_temp = elementos.datatable.row($(elemento_temp).parent()).data()
			for (item in datos_temp) {
				if (datos_temp[item] instanceof Object) {
					$(elementos.form_modal).find('#' + item).val(datos_temp[item].id) // Sirve solo para select
					$(elementos.form_modal).find('#id_' + item).val(datos_temp[item].id) // Para asignar id a objetos
				} else {
					$(elementos.form_modal).find('#' + item).val(datos_temp[item])
				}
			}
		}
	})

	$(elementos.form_modal).on('submit', function (e) {
		e.preventDefault()
		var data = $(this).serialize()
		var metodo = accion == 'Nuevo' ? 'POST' : 'PUT'
		data += accion == 'Nuevo' ? '&id_mexterno=' + elementos.id_mexterno : '&id_mexterno=' + elementos.id_mexterno + '&id=' + datos_temp.id
		$.ajax({
			url: api_url,
			data: data,
			method: metodo,
			success: function (data) {
				actualizarInterfaz(accion, data)
			},
			error: function (e, d) {
				if (e.status) {
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
		alertify.confirm(lenguaje[ls]['borrar_titulo'], lenguaje[ls]['borrar_mensaje'], function (e) {
			// Por estandar, el metodo DELETE solo recibe parametros en URL
			$.ajax({
				url: api_url + '?id=' + datos_temp.id,
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
			"url" :  api_url + '&id=' + elementos.id_mexterno,
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

function actualizarInterfaz(accion, datos) {
	var texto = accion == 'Nuevo' ? lenguaje[ls]['agregar_exito'] : lenguaje[ls]['actualizar_exito']
	if (accion == 'Nuevo') {
		elementos.datatable.row.add(datos).draw()
	} else {
		elementos.datatable.row($(elemento_temp).parent()).data(datos).draw()
		datos_temp = null
		elemento_temp = null
	}
	alertify.success(texto)
	$(elementos.modal).modal('hide')
}
