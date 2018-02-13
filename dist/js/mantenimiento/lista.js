var url_root = window.location.origin + '/fletes/index.php'
var api_url = url_root + '/api/mecanicos/'
var tabla = null;
var accion = null;
var datos_temp = null
var elemento_temp = null

$(document).ready(function () {
    llenarTabla()
    $('#myModal').on('show.bs.modal', function (e) {
        accion = $(e.relatedTarget).data('action')
        $(this).find('.modal-title').text(accion + ' Mecanico')
        if (accion == 'Nuevo') {
            $('#form-mecanico')[0].reset()
        } else {
            elemento_temp = e.relatedTarget
            datos_temp = tabla.row($(elemento_temp).parent()).data()
            for (item in datos_temp) {
                $('#form-mecanico').find('#' + item).val(datos_temp[item])
            }
        }
    })

    $('#form-mecanico').on('submit', function (e) {
        e.preventDefault()
        var data = $(this).serialize()
        var metodo = accion == 'Nuevo' ? 'POST' : 'PUT'
        data += accion == 'Nuevo' ? '' : '&id=' + datos_temp.id_mecanico
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

    $('#example1').on('click', '.eliminar-mecanico', function (e) {
        console.log('okdsd')
        elemento_temp = e.relatedTarget
        datos_temp = tabla.row($(elemento_temp).parent()).data()
        alertify.confirm('Borrar elemento', '¿Estas seguro?', function (e) {
            console.log('Okk')
        }, function (e) {
            console.log('accept')
        })
    })
})

function llenarTabla() {
    var botones_accion = $('#botones-accion').html()
    tabla = $('#example1').DataTable({
        "autoWidth": false,
        responsive: true,
        "ajax": api_url,
        "columns": [
            {'data': 'nombre'},
            {'data': 'apellido'},
            {'data': 'horas'},
            {
                "data": null,
                "defaultContent": botones_accion
            }
        ]
    });
}

function actualizarInterfaz(accion, datos) {
    if (accion == 'Nuevo') {
        tabla.row.add(datos).draw()
    } else {
        tabla.row($(elemento_temp).parent()).data(datos).draw()
        datos_temp = null
        elemento_temp = null
    }
    $('#myModal').modal('hide')
}