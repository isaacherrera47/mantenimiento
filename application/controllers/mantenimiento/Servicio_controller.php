<?php
/**
 * Created by PhpStorm.
 * User: intekel01
 * Date: 12/02/18
 * Time: 10:43 AM
 */

class Servicio_controller extends CI_Controller
{
    const INTERNOS = 1;
    const EXTERNOS = 2;

    public function __construct()
    {
        parent::__construct();
        $this->load->helper('url');
        $this->load->model('mantenimiento/servicio');
        $this->load->model('mantenimiento/proveedor');
    }

    public function internos()
    {
        $data['script'] = 'mantenimiento/servicios/lista_internos';
        $this->load->view('templates/header');
        $this->load->view('mantenimiento/servicios/lista_internos');
        $this->load->view('templates/footer', $data);
    }

    public function externos()
    {
        $data['script'] = 'mantenimiento/servicios/lista_externos';
        $this->load->view('templates/header');
        $this->load->view('mantenimiento/servicios/lista_externos');
        $this->load->view('templates/footer', $data);
    }

    public function servicio_detalle($id) {
        if (! $data['servicio'] = $this->servicio->obtener($id)) {
            $this->internos();
            return true; // Raise 404
        }
        $data['proveedores'] = $this->proveedor->obtener_todos();
        $data['script'] = 'mantenimiento/servicios/servicio_proveedor';
        $this->load->view('templates/header');
        $this->load->view('mantenimiento/servicios/servicio_proveedor', $data);
        $this->load->view('templates/footer');
    }
}