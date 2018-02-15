<?php
require(APPPATH . 'libraries/REST_Controller.php');

use Restserver\Libraries\REST_Controller;


class Refacciones_proveedores extends REST_Controller
{
    public function __construct()
    {
        parent::__construct();
        $this->load->model('mantenimiento/refaccion_proveedor');
        $this->load->helper('url');
    }

    public function index_get()
    {
        if ($this->get('id') || $this->get('id_refaccion') || $this->get('id_proveedor')) {
            $response['data'] = $this->refaccion_proveedor->obtener($this->get());
        } else {
            $response['data'] = $this->refaccion_proveedor->obtener_todos();
        }

        return $this->response($response, 200);
    }

    public function index_post()
    {
        $datos = array(
            'nombre' => $this->post('nombre'),
            'descripcion' => $this->post('descripcion'),
            'tiempo_entrega' => $this->post('tiempo_entrega'),
        );
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
            'nombre' => $this->put('nombre'),
            'descripcion' => $this->put('descripcion'),
            'tiempo_entrega' => $this->put('tiempo_entrega'),
        );

        if ($result = $this->refaccion_proveedor->actualizar($this->put('id'), $datos)) {
            return $this->response($result, 200);
        } else {
            return $this->response(null, 500);
        }
    }
}