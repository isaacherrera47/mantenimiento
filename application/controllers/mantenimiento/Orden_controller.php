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

	public function manual_interno()
	{
		$data['cajas'] = $this->db->get('cajas')->result_array();
		$data['tractores'] = $this->db->get('tractores')->result_array();
		$data['mecanicos'] = $this->db->get('mecanicos')->result_array();
		$data['servicios'] = $this->db->get_where('servicios', array('tipo' => 'Interno'))->result_array();
		$data['refacciones'] = $this->db->get('refacciones')->result_array();
		$data['script'] = 'mantenimiento/ordenes/manual_interno';
		$this->load->view('templates/header');
		$this->load->view('mantenimiento/ordenes/manual_interno', $data);
		$this->load->view('templates/footer', $data);
	}

	public function manual_interno_detalle($id_orden, $id_mecanico) {
		$this->load->model('mantenimiento/orden_manual_interno');
		$data['servicios'] = $this->db->get_where('servicios', array('tipo' => 'Interno'))->result_array();
		$data['refacciones'] = $this->db->get('refacciones')->result_array();
		$data['orden'] = $this->orden_manual_interno->obtener($id_orden);
		$data['script'] = 'mantenimiento/ordenes/manual_interno_detalle';
		$this->load->view('templates/header');
		$this->load->view('mantenimiento/ordenes/manual_interno_detalle', $data);
		$this->load->view('templates/footer', $data);
	}

	public function revision()
	{
		$this->load->model('mantenimiento/orden_manual_interno');
		$data['servicios'] = $this->db->get_where();
	}


}
