<?php
require(APPPATH . 'libraries/REST_Controller.php');

use Restserver\Libraries\REST_Controller;


class Refacciones extends REST_Controller
{
    public function __construct()
    {
        parent::__construct();
        $this->load->model('mantenimiento/refaccion');
        $this->load->helper('url');
    }

    public function index_get()
    {
        if (($id = $this->get('id')) && is_numeric($this->get('id'))) {
            return $this->response($this->refaccion->obtener($id));
        }
        return $this->response($this->refaccion->obtener_todos());
    }

    public function index_post()
    {
        $datos = array(
            'nombre' => $this->post('nombre'),
            'descripcion' => $this->post('descripcion'),
            'costo' => $this->post('costo'),
            'tiempo_entrega' => $this->post('tiempo_entrega'),
            'proveedor' => $this->post('proveedor')
        );
        if ($result = $this->refaccion->insertar($datos)) {
            return $this->response($result, 201);
        } else {
            return $this->response(null, 500);
        }
    }

    public function index_delete()
    {
        if (($id = $this->query('id')) && is_numeric($this->query('id'))) {
            if ($this->refaccion->eliminar($id)) {
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
            'costo' => $this->put('costo'),
            'tiempo_entrega' => $this->put('tiempo_entrega'),
            'proveedor' => $this->put('proveedor')
        );

        if ($result = $this->refaccion->actualizar($this->put('id'), $datos)) {
            return $this->response($result, 200);
        } else {
            return $this->response(null, 500);
        }
    }
}