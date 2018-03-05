var url_root = window.location.origin + '/fletes/index.php' // Base url
var api_url = url_root + '/api/ordenes/?tipo_orden=manual' // URL API Ordenes en ruta.
var api_servicios = url_root + '/api/servicios-proveedores/'
var accion = null; // Accion a ejecutar en modal
var datos_temp = null // Referencia a datos temporales en edicion
var elemento_temp = null // Referencia temporal de boton de edicion
var ls = 'es' //Lenguaje del sistema
var image_path = window.location.origin + '/fletes/uploads/' //Ajustar al path real

var elementos = {
	modal: $('#myModal'),
	form_modal: $('#form-orden'),
	tabla: $('#example1'),
	proveedor: $('#id_proveedor'),
	servicios: $('#servicios'),
	template_botones: $('#botones-accion').html(),
	datepicker: $('.datepicker'),
	cajas: $('#cb-caja'),
	tractores: $('#cb-tractor'),
	tipo_objeto: $('#tipo'),
	no_editable: $('#hidden_edit'),
	files_input: ['factura'],
}

$(document).ready(function () {
	llenarTabla()
	elementos.datepicker.datepicker({
		format: 'yyyy-mm-dd',
	})
	$(elementos.modal).on('show.bs.modal', function (e) {
		if (e.namespace == 'bs.modal') {
			accion = $(e.relatedTarget).data('action')
			$(this).find('.modal-title').text(accion + ' ' + lenguaje[ls]['orden_manual_ex'])
			$('.actual').remove()  //Remueve enlaces existentes a facturas.
			if (accion == 'Nuevo') {
				elementos.no_editable.fadeIn()
				$(elementos.form_modal)[0].reset()
			} else {
				elementos.no_editable.fadeOut()
				elemento_temp = e.relatedTarget
				datos_temp = elementos.datatable.row($(elemento_temp).parent()).data()
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
			alternarCombo()
		}
	})

	elementos.form_modal.on('submit', function (e) {
		e.preventDefault()
		var data = new FormData($(this)[0])
		if (accion != 'Nuevo') {
			data.append('id', datos_temp.id)
		}

		$.ajax({
			url: api_url,
			data: data,
			processData: false,
			contentType: false,
			method: 'POST',
			success: function (data) {
				actualizarInterfaz(accion, data)
			},
			error: function (e, d) {
				console.log(d)
				console.log(e)
			}
		})
	})

	elementos.proveedor.on('change', function (e) {
		var id_proveedor = $(this).val()

		if (id_proveedor != '0') {
			$.ajax({
				url: api_servicios,
				data: {'id_proveedor': id_proveedor},
				method: 'GET',
				success: function (result) {
					elementos.servicios.empty()
					$.each(result.data, function (key, value) {
						elementos.servicios.append($('<option></option>').
						attr('value', value.servicio.id).text(value.servicio.nombre))
					})
				}
			})
		}
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
			{'data': 'proveedor.nombre'},
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
				targets: [3],
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
