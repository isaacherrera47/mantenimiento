<?php
require(APPPATH . 'libraries/REST_Controller.php');

use Restserver\Libraries\REST_Controller;


class Ordenes extends REST_Controller
{
    public function __construct()
    {
        parent::__construct();
        $this->load->model('mantenimiento/orden');
        $this->load->helper('url');
    }

    public function index_get()
    {
        if (($id = $this->get('id')) && is_numeric($this->get('id'))) {
            $response['data'] = $this->orden->obtener($id);
        } else {
            $response['data'] = $this->orden->obtener_todos();
        }

        return $this->response($response, 200);
    }

    public function index_post()
    {
        $datos = array(
            'nombre' => $this->post('nombre'),
            'direccion' => $this->post('direccion'),
            'telefono' => $this->post('telefono'),
        );
        if ($result = $this->orden->insertar($datos)) {
            return $this->response($result, 201);
        } else {
            return $this->response(null, 500);
        }
    }

    public function index_delete()
    {
        if (($id = $this->query('id')) && is_numeric($this->query('id'))) {
            if ($this->orden->eliminar($id)) {
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
            'direccion' => $this->put('direccion'),
            'telefono' => $this->put('telefono'),
        );

        if ($result = $this->orden->actualizar($this->put('id'), $datos)) {
            return $this->response($result, 200);
        } else {
            return $this->response(null, 500);
        }
    }
}