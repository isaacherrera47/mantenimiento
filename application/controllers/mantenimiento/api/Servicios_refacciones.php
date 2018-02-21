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
        $params = $this->servicio_refaccion->obtener_parametros_where($this->get());
        if (isset($params['id']) || isset($params['id_servicio']) || isset($params['id_refaccion'])) {
            $response['data'] = $this->servicio_refaccion->obtener($params);
        } else {
            $response['data'] = $this->servicio_refaccion->obtener_todos();
        }

        return $this->response($response, 200);
    }

    public function index_post()
    {
        $datos = array(
            'id_servicio' => $this->post('id_servicio'),
            'id_refaccion' => $this->post('id_refaccion'),
            'piezas' => $this->post('piezas'),
        );
        if ($this->servicio_refaccion->existe_registro($datos['id_servicio'], $datos['id_refaccion'])) {
            return $this->response(null, 409);
        }
        if ($result = $this->servicio_refaccion->insertar($datos)) {
            return $this->response($result, 201);
        } else {
            return $this->response(null, 500);
        }
    }

    public function index_delete()
    {
        if (($id = $this->query('id')) && is_numeric($this->query('id'))) {
            if ($this->servicio_refaccion->eliminar($id)) {
                return $this->response(array('result' => 'Success'), 200);
            } else {
                return $this->response(array('result' => 'Error'), 404);
            }
        }
    }

    public function index_put()
    {
        $datos = array(
            'id_servicio' => $this->put('id_servicio'),
            'id_refaccion' => $this->put('id_refaccion'),
            'piezas' => $this->put('piezas'),
        );

        if ($this->servicio_refaccion->existe_registro($datos['id_servicio'], $datos['id_refaccion'], $this->put('id'))) {
            return $this->response(null, 409);
        }

        if ($result = $this->servicio_refaccion->actualizar(array('id' => $this->put('id')), $datos)) {
            return $this->response($result, 200);
        } else {
            return $this->response($result, 500);
        }
    }
}