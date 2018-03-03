<?php
require(APPPATH . 'libraries/REST_Controller.php');

use Restserver\Libraries\REST_Controller;


class Ordenes extends REST_Controller
{
    public function __construct()
    {
        parent::__construct();
        $this->load->model('mantenimiento/orden_ruta');
        $this->load->model('mantenimiento/orden_manual');
        $this->load->helper('url');
    }

    public function index_get()
    {
        switch ($this->query('tipo_orden')) {
            case 'ruta':
                $this->get_ruta();
                break;
            case 'manual':
                break;
            default:
                return $this->response(null, 400);
        }
    }

    public function index_post()
    {
        switch ($this->query('tipo_orden')) {
            case 'ruta':
                $this->post_ruta();
                break;
            case 'manual':
                break;
            default:
                return $this->response(null, 400);
        }
    }

    public function index_delete()
    {
        switch ($this->query('tipo_orden')) {
            case 'ruta':
                $this->delete_ruta();
                break;
            case 'manual':
                break;
            default:
                return $this->response(null, 400);
        }
    }

    private function get_ruta()
    {
        if (($id = $this->get('id')) && is_numeric($this->get('id'))) {
            $response['data'] = $this->orden_ruta->obtener($id);
        } else {
            $response['data'] = $this->orden_ruta->obtener_todos();
        }

        return $this->response($response, 200);
    }

    private function post_ruta()
    {
        $config = array();
        $config['upload_path'] = './uploads/';
        $config['allowed_types'] = 'gif|jpg|png';
        $config['overwrite'] = true;
        $this->load->library('upload');
        $this->upload->initialize($config);

        $datos = array(
            'tipo' => $this->post('tipo'),
            'servicio' => $this->post('servicio'),
            'descripcion' => $this->post('descripcion'),
            'fecha_entrada' => $this->post('fecha_entrada'),
            'fecha_salida' => $this->post('fecha_salida'),
            'costo' => $this->post('costo'),
        );

        $datos['id_objeto'] = $this->post('tipo') == 2 ? $this->post('caja') : $this->post('tractor');

        if ($this->upload->do_upload('factura')) {
            $datos['factura'] = $this->upload->data('file_name'); //TODO: Implementar operaciones de borrado
        }

        if ($id = $this->post('id')) {
            if ($result = $this->orden_ruta->actualizar($id, $datos)) {
                return $this->response($result, 200);
            }
        } else {
            if ($result = $this->orden_ruta->insertar($datos)) {
                return $this->response($result, 201);
            }
        }
        return $this->response(null, 500);
    }

    private function delete_ruta()
    {
        if (($id = $this->query('id')) && is_numeric($this->query('id'))) {
            if ($this->orden_ruta->eliminar($id)) {
                return $this->response(array('result' => 'Success'), 200);
            } else {
                return $this->response(array('result' => 'Error'), 404);
            }
        }
    }
}
