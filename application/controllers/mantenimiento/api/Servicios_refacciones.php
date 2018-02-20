<?php
require(APPPATH . 'libraries/REST_Controller.php');

use Restserver\Libraries\REST_Controller;


class Servicios_refacciones extends REST_Controller
{
    public function __construct()
    {
        parent::__construct();
        $this->load->model('mantenimiento/servicio_refaccion');
        $this->load->helper('url');
    }

    public function index_get()
    {
        $params = $this->refaccion_proveedor->obtener_parametros_where($this->get());
        if (isset($params['id']) || isset($params['id_refaccion']) || isset($params['id_proveedor'])) {
            $response['data'] = $this->refaccion_proveedor->obtener($params);
        } else {
            $response['data'] = $this->refaccion_proveedor->obtener_todos();
        }

        return $this->response($response, 200);
    }

    public function index_post()
    {
        $datos = array(
            'id_refaccion' => $this->post('id_refaccion'),
            'id_proveedor' => $this->post('id_proveedor'),
            'costo' => $this->post('costo'),
        );
        if ($this->refaccion_proveedor->existe_registro($datos['id_refaccion'], $datos['id_proveedor'])) {
            return $this->response(null, 409);
        }
        if ($result = $this->refaccion_proveedor->insertar($datos)) {
            return $this->response($result, 201);
        } else {
            return $this->response(null, 500);
        }
    }

    public function index_delete()
    {
        if (($id = $this->query('id')) && is_numeric($this->query('id'))) {
            if ($this->refaccion_proveedor->eliminar($id)) {
                return $this->response(array('result' => 'Success'), 200);
            } else {
                return $this->response(array('result' => 'Error'), 404);
            }
        }
    }

    public function index_put()
    {
        $datos = array(
            'id_refaccion' => $this->put('id_refaccion'),
            'id_proveedor' => $this->put('id_proveedor'),
            'costo' => $this->put('costo'),
        );

        if ($this->refaccion_proveedor->existe_registro($datos['id_refaccion'], $datos['id_proveedor'], $this->put('id'))) {
            return $this->response(null, 409);
        }

        if ($result = $this->refaccion_proveedor->actualizar(array('id' => $this->put('id')), $datos)) {
            return $this->response($result, 200);
        } else {
            return $this->response($result, 500);
        }
    }
}