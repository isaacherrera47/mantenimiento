<?php
require(APPPATH . 'libraries/REST_Controller.php');

use Restserver\Libraries\REST_Controller;


class Mecanicos extends REST_Controller
{
    public function __construct()
    {
        parent::__construct();
        $this->load->model('mantenimiento/mecanico');
        $this->load->helper('url');
    }

    public function index_get()
    {
        if (($id_mecanico = $this->get('id')) && is_numeric($this->get('id'))) {
            $response['data'] = $this->response($this->mecanico->obtener($id_mecanico));
        } else {
            $response['data'] = $this->mecanico->obtener_todos();
        }

        return $this->response($response, 200);
    }

    public function index_post()
    {
        $datos = array(
            'nombre' => $this->post('nombre'),
            'apellido' => $this->post('apellido'),
            'horas' => $this->post('horas')
        );
        if ($result = $this->mecanico->insertar($datos)) {
            return $this->response($result, 201);
        } else {
            return $this->response(null, 500);
        }
    }

    public function index_delete()
    {
        if (($id_mecanico = $this->query('id')) && is_numeric($this->query('id'))) {
            if ($this->mecanico->eliminar($id_mecanico)) {
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
            'apellido' => $this->put('apellido'),
            'horas' => $this->put('horas')
        );

        if ($result = $this->mecanico->actualizar($this->put('id'), $datos)) {
            return $this->response($result, 200);
        } else {
            return $this->response(null, 500);
        }
    }

    public function index_patch()
    {
        return $this->response(array('array' => $this->patch('nombre')));
    }
}