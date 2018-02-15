<?php
require(APPPATH . 'libraries/REST_Controller.php');

use Restserver\Libraries\REST_Controller;


class Servicios extends REST_Controller
{
    public function __construct()
    {
        parent::__construct();
        $this->load->model('mantenimiento/servicio');
        $this->load->helper('url');
    }

    public function index_get()
    {
        if (($id = $this->get('id')) && is_numeric($this->get('id'))) {
            $response['data'] = $this->servicio->obtener($id);
        } else {
            $response['data'] = $this->servicio->obtener_todos();
        }

        return $this->response($response, 200);
    }

    public function index_post()
    {
        $datos = array(
            'nombre' => $this->post('nombre'),
        );
        if ($result = $this->servicio->insertar($datos)) {
            return $this->response($result, 201);
        } else {
            return $this->response(null, 500);
        }
    }

    public function index_delete()
    {
        if (($id = $this->query('id')) && is_numeric($this->query('id'))) {
            if ($this->servicio->eliminar($id)) {
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
        );

        if ($result = $this->servicio->actualizar($this->put('id'), $datos)) {
            return $this->response($result, 200);
        } else {
            return $this->response(null, 500);
        }
    }
}