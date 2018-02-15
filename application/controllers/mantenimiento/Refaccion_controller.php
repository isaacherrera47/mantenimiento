<?php
/**
 * Created by PhpStorm.
 * User: intekel01
 * Date: 13/02/18
 * Time: 12:36 PM
 */

class Refaccion_controller extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
        $this->load->helper('url');
        $this->load->model('mantenimiento/proveedor');
        $this->load->model('mantenimiento/refaccion');
    }

    public function index()
    {
        $data['proveedores'] = $this->proveedor->obtener_todos();
        $data['script'] = 'mantenimiento/refacciones/lista';
        $this->load->view('templates/header');
        $this->load->view('mantenimiento/refacciones/lista', $data);
        $this->load->view('templates/footer', $data);
    }

    public function refaccion_proveedor($id)
    {
        if (! $data['refaccion'] = $this->refaccion->obtener($id)) {
            $this->index();
            return true; // Raise 404
        }
        $data['proveedores'] = $this->proveedor->obtener_todos();
        $data['script'] = 'mantenimiento/refacciones/refaccion_proveedor';
        $this->load->view('templates/header');
        $this->load->view('mantenimiento/refacciones/refaccion_proveedor', $data);
        $this->load->view('templates/footer');
    }

}