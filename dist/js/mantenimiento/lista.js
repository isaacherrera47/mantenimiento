var url_root = window.location.origin + '/fletes/index.php'
var api_url = url_root + '/api/mecanicos/'
$(document).ready(function () {
    llenarTabla()
})

function llenarTabla() {
    $('#example1').DataTable({
        "ajax": api_url,
        "columns": [
            {'data': 'nombre'},
            {'data': 'apellido'},
            {'data': 'horas'}
        ]
    });
}