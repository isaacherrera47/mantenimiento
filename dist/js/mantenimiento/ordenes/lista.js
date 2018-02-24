var url_root = window.location.origin + '/fletes/index.php' // Base url
var api_url = url_root + '/api/ordenes/en-ruta' // URL API Proveedores
var accion = null; // Accion a ejecutar en modal
var datos_temp = null // Referencia a datos temporales en edicion
var elemento_temp = null // Referencia temporal de boton de edicion
var ls = 'es' //Lenguaje del sistema

var elementos = {
    modal: $('#myModal'),
    form_modal: $('#form-proveedor'),
    tabla: $('#example1'),
    template_botones: $('#botones-accion').html(),
    datepicker : $('.datepicker'),
    cajas: $('#cb_cajas'),
    tractores: $('#cb_tractores'),
}

$(document).ready(function () {
    llenarTabla()
    elementos.datepicker.datepicker()
    elementos.cajas.fadeOut()
    $(elementos.modal).on('show.bs.modal', function (e) {
        accion = $(e.relatedTarget).data('action')
        $(this).find('.modal-title').text(accion + ' ' + lenguaje[ls]['orden_ruta'])
        if (accion == 'Nuevo') {
            $(elementos.form_modal)[0].reset()
        } else {
            elemento_temp = e.relatedTarget
            datos_temp = elementos.datatable.row($(elemento_temp).parent()).data()
            for (item in datos_temp) {
                $(elementos.form_modal).find('#' + item).val(datos_temp[item])
            }
        }
    })

    $(elementos.form_modal).on('submit', function (e) {
        e.preventDefault()
        var data = $(this).serialize()
        var metodo = accion == 'Nuevo' ? 'POST' : 'PUT'
        data += accion == 'Nuevo' ? '' : '&id=' + datos_temp.id
        $.ajax({
            url: api_url,
            data: data,
            method: metodo,
            success: function (data) {
                actualizarInterfaz(accion, data)
            },
            error: function (e, d) {
                console.log(d)
                console.log(e)
            }
        })
    })

    $(elementos.tabla).on('click', '.eliminar-proveedor', function (e) {
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
    elementos.datatable = $(elementos.tabla).DataTable({
        "autoWidth": false,
        responsive: true,
        "ajax": api_url,
        "columns": [
            {'data': 'servicio'},
            {'data': 'descripcion'},
            {'data': 'tipo.descripcion'},
            {'data': null},
            {'data': 'fecha_entrada'},
            {'data': 'fecha_salida'},
            {
                "data": null,
                "defaultContent": elementos.template_botones
            }
        ],
        columnDefs : [
            {
                targets: [3],
                render: function (data, type, row) {
                    return data.tractor ? data.tractor.tractor : data.caja.caja;
                }
            }
        ]
    });

    $(elementos.tabla).on('click', '.ver-refacciones', function (e) {
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