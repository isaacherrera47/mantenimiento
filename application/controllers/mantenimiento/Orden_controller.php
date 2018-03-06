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
		$this->load->database();
	}

	public function en_ruta()
	{

		$data['cajas'] = $this->db->get('cajas')->result_array();
		$data['tractores'] = $this->db->get('tractores')->result_array();
		$data['script'] = 'mantenimiento/ordenes/en_ruta';
		$this->load->view('templates/header');
		$this->load->view('mantenimiento/ordenes/en_ruta', $data);
		$this->load->view('templates/footer', $data);
	}

	public function manual_externo()
	{
		$data['cajas'] = $this->db->get('cajas')->result_array();
		$data['tractores'] = $this->db->get('tractores')->result_array();
		$data['proveedores'] = $this->db->get('proveedores')->result_array();
		$data['script'] = 'mantenimiento/ordenes/manual_externo';
		$this->load->view('templates/header');
		$this->load->view('mantenimiento/ordenes/manual_externo', $data);
		$this->load->view('templates/footer', $data);
	}

	public function manual_externo_detalle($id_orden, $id_proveedor) {
		$this->load->model('mantenimiento/servicio_proveedor');
		$this->load->model('mantenimiento/orden_manual_externo');
		$data['servicios'] = $this->servicio_proveedor->obtener(array('id_proveedor' => $id_proveedor));
		$data['orden'] = $this->orden_manual_externo->obtener($id_orden);
		$data['script'] = 'mantenimiento/ordenes/manual_externo_detalle';
		$this->load->view('templates/header');
		$this->load->view('mantenimiento/ordenes/manual_externo_detalle', $data);
		$this->load->view('templates/footer', $data);
	}


}
