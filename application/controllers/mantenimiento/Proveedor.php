<?php
/**
 * Created by PhpStorm.
 * User: intekel01
 * Date: 13/02/18
 * Time: 12:36 PM
 */

class Proveedor extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
        $this->load->helper('url');
    }

    public function index()
    {
        $data['script'] = 'mantenimiento/proveedores/lista';
        $this->load->view('templates/header');
        $this->load->view('mantenimiento/proveedores/lista');
        $this->load->view('templates/footer', $data);
    }

}