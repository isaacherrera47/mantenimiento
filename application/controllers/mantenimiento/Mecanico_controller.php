<?php
/**
 * Created by PhpStorm.
 * User: intekel01
 * Date: 12/02/18
 * Time: 10:43 AM
 */

class Mecanico_controller extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
        $this->load->helper('url');
    }

    public function index()
    {
        $data['script'] = 'mantenimiento/mecanicos/lista';
        $this->load->view('templates/header');
        $this->load->view('mantenimiento/mecanicos/lista');
        $this->load->view('templates/footer', $data);
    }
}