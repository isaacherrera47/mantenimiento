var url_root = window.location.origin + '/fletes/index.php' // Base url
var api_url = url_root + '/api/ordenes/?tipo_orden=manual_interno' // URL API Ordenes en ruta.
var api_servicios = url_root + '/api/servicios/?getby=unidad&tipo=Interno'
var accion = null; // Accion a ejecutar en modal
var datos_temp = null // Referencia a datos temporales en edicion
var elemento_temp = null // Referencia temporal de boton de edicion
var ls = 'es' //Lenguaje del sistema
var image_path = window.location.origin + '/fletes/uploads/' //Ajustar al path real

var elementos = {
	modal: $('#myModal'),
	form_modal: $('#form-orden'),
	tabla: $('#example1'),
	servicios: $('#servicios'),
	template_botones: $('#botones-accion').html(),
	cajas: $('#cb-caja'),
	tractores: $('#cb-tractor'),
	cb_mecanico: $('#cb-mecanico'),
	cb_refacciones: $('#cb-refacciones'),
	tipo_objeto: $('#tipo'),
	no_editable: $('.hidden_edit'),
	files_input: ['factura'],
	refacciones: $('#refacciones'),
	orden_compra: $('#orden-compra'),
}

$(document).ready(function () {
	llenarTabla()
	elementos.refacciones.select2()
	elementos.servicios.select2()
	$(elementos.modal).on('show.bs.modal', function (e) {
		if (e.namespace == 'bs.modal') {
			accion = $(e.relatedTarget).data('action')
			$(this).find('.modal-title').text(accion + ' ' + lenguaje[ls]['orden_manual_in'])
			$('.actual').remove()  //Remueve enlaces existentes a facturas.
			reiniciarFormulario()
			alternarCombo()
			if (accion != 'Nuevo') {
				elementos.no_editable.fadeOut()
				elemento_temp = e.relatedTarget
				datos_temp = elementos.datatable.row($(elemento_temp).parent()).data()
				console.log(datos_temp)
				for (item in datos_temp) {
					if (datos_temp[item] instanceof Object) {
						$(elementos.form_modal).find('#' + item).val(datos_temp[item].id) // Sirve solo para select
						$(elementos.form_modal).find('#id_' + item).val(datos_temp[item].id) // Para asignar id a objetos
					} else if (elementos.files_input.indexOf(item) == -1) {
						$(elementos.form_modal).find('#' + item).val(datos_temp[item])
					} else if (datos_temp[item] != null) {
						var el = '<a class="actual" target="_blank" href="' + image_path + datos_temp[item] + '"> Factura actual </a>'
						$(elementos.form_modal).find('#' + item).after(el)
					}
				}
			}
		}
	})

	elementos.form_modal.on('submit', function (e) {
		e.preventDefault()
		var method = accion == 'Nuevo' ? 'POST' : 'PUT'
		var data = new $(this).serialize()

		if (accion != 'Nuevo') {
			data += '&id=' + datos_temp.id + '&estado=' + datos_temp.estado
		}

		$.ajax({
			url: api_url,
			data: data,
			method: method,
			success: function (data) {
				actualizarInterfaz(accion, data)
			},
			error: function (e, d) {
				console.log(d)
				console.log(e)
			}
		})
	})


	$(elementos.tabla).on('click', '.eliminar-orden', function (e) {
		elemento_temp = e.currentTarget
		datos_temp = elementos.datatable.row($(elemento_temp).parent()).data()
		alertify.confirm(lenguaje[ls]['borrar_titulo'], lenguaje[ls]['borrar_mensaje'], function (e) {
			// Por estandar, el metodo DELETE solo recibe parametros en URL
			$.ajax({
				url: api_url + '&id=' + datos_temp.id,
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

	$(elementos.tipo_objeto).on('change', function (e) {
		alternarCombo()
		var id_unidad = $(this).val()

		if (id_unidad != '0') {
			$.ajax({
				url: api_servicios,
				data: {'value': id_unidad},
				method: 'GET',
				success: function (result) {
					elementos.servicios.empty()
					$.each(result, function (key, value) {
						elementos.servicios.append($('<option></option>').attr('value', value.id).text(value.nombre))
					})
					elementos.servicios.select2()
				}
			})
		}
	})

	elementos.orden_compra.on('change', function (e) {
		if ($(this).is(':checked')) {
			elementos.cb_mecanico.fadeOut();
			elementos.cb_refacciones.fadeIn();
		} else {
			elementos.cb_mecanico.fadeIn();
			elementos.cb_refacciones.fadeOut();
		}
	})

	elementos.tabla.on('click', '.imprimir', function (e) {
		elemento_temp = e.currentTarget
		datos_temp = elementos.datatable.row($(elemento_temp).parent()).data()
		window.location.href = url_root + '/mantenimiento/ordenes/imprimir/interno/' + datos_temp.id
	})


})

function alternarCombo() {
	if (elementos.tipo_objeto.val() == "1") {
		elementos.cajas.fadeOut()
		elementos.tractores.fadeIn()
	} else {
		elementos.cajas.fadeIn()
		elementos.tractores.fadeOut()
	}
}

function llenarTabla() {
	elementos.datatable = $(elementos.tabla).DataTable({
		"autoWidth": false,
		responsive: true,
		"ajax": api_url,
		"columns": [
			{'data': 'id'},
			{'data': null},
			{'data': 'notas'},
			{'data': 'tipo.descripcion'},
			{'data': null},
			{'data': 'fecha_entrada'},
			{'data': 'fecha_salida'},
			{
				"data": null,
				"defaultContent": elementos.template_botones
			}
		],
		columnDefs: [
			{
				targets: [1],
				render: function (data, type, row) {
					return data.mecanico ? data.mecanico.nombre + ' ' + data.mecanico.apellido : lenguaje[ls]['no_asignado']
				}
			},
			{
				targets: [4],
				render: function (data, type, row) {
					return data.tractor ? data.tractor.tractor : data.caja.caja;
				}
			}
		]
	});

	$(elementos.tabla).on('click', '.ver-detalle', function (e) {
		elemento_temp = e.currentTarget
		datos_temp = elementos.datatable.row($(elemento_temp).parent()).data()
		window.location.href = window.location + '/' + datos_temp.id
	})
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

function reiniciarFormulario() {
	elementos.no_editable.fadeIn()
	$(elementos.form_modal)[0].reset()
	elementos.refacciones.select2()
	elementos.servicios.select2()
	elementos.orden_compra.trigger('change')
}
