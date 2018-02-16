<?php
/**
 * Created by PhpStorm.
 * User: intekel01
 * Date: 13/02/18
 * Time: 12:36 PM
 */

class Proveedor_controller extends CI_Controller
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
        $data['script'] = 'mantenimiento/proveedores/lista';
        $this->load->view('templates/header');
        $this->load->view('mantenimiento/proveedores/lista');
        $this->load->view('templates/footer', $data);
    }

    public function proveedor_refaccion($id)
    {
        if (!$data['proveedor'] = $this->proveedor->obtener($id)) {
            $this->index();
            return true; // Raise 404
        }
        $data['refacciones'] = $this->refaccion->obtener_todos();
        $data['script'] = 'mantenimiento/proveedores/proveedor_refaccion';
        $this->load->view('templates/header');
        $this->load->view('mantenimiento/proveedores/proveedor_refaccion', $data);
        $this->load->view('templates/footer');
    }
}