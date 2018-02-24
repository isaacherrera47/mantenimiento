<?php
/**
 * Created by PhpStorm.
 * User: intekel01
 * Date: 13/02/18
 * Time: 12:36 PM
 */

class Orden_controller extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
        $this->load->helper('url');
        $this->load->model('mantenimiento/orden');
        $this->load->database();
    }

    public function en_ruta()
    {

        $data['cajas'] = $this->db->get('cajas')->result_array();
        $data['tractores'] = $this->db->get('tractores')->result_array();
        $data['script'] = 'mantenimiento/ordenes/lista';
        $this->load->view('templates/header');
        $this->load->view('mantenimiento/ordenes/lista', $data);
        $this->load->view('templates/footer', $data);
    }



}