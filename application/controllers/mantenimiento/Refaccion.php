<?php
/**
 * Created by PhpStorm.
 * User: intekel01
 * Date: 13/02/18
 * Time: 12:36 PM
 */

class Refaccion extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
        $this->load->helper('url');
        $this->load->model('mantenimiento/proveedor');
    }

    public function index()
    {
        $data['proveedores'] = $this->proveedor->obtener_todos();
        $data['script'] = 'mantenimiento/refacciones/lista';
        $this->load->view('templates/header');
        $this->load->view('mantenimiento/refacciones/lista', $data);
        $this->load->view('templates/footer', $data);
    }

}