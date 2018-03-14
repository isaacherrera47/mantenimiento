<?php
require(APPPATH . 'libraries/REST_Controller.php');

use Restserver\Libraries\REST_Controller;


class Ordenes extends REST_Controller
{
	public function __construct()
	{
		parent::__construct();
		$this->load->model('mantenimiento/orden_ruta');
		$this->load->model('mantenimiento/orden_manual_externo');
		$this->load->model('mantenimiento/orden_manual_interno');
		$this->load->helper('url');
	}

	public function index_get()
	{
		switch ($this->query('tipo_orden')) {
			case 'ruta':
				$this->get_ruta();
				break;
			case 'manual_externo':
				$this->get_manual_externo();
				break;
			case 'manual_interno':
				$this->get_manual_interno();
				break;
			case 'refaccion':
				$this->get_refaccion();
				break;
			default:
				return $this->response(null, 400);
		}
	}

	public function index_post()
	{
		switch ($this->query('tipo_orden')) {
			case 'ruta':
				$this->post_ruta();
				break;
			case 'manual_externo':
				$this->post_manual_externo();
				break;
			case 'manual_interno':
				$this->post_manual_interno();
				break;
			case 'servicio_ex':
				$this->post_servicio_ex();
				break;
			case 'servicio_in':
				$this->post_servicio_in();
				break;
			case 'refaccion':
				$this->post_refaccion();
				break;
			default:
				return $this->response(null, 400);
		}
	}

	public function index_delete()
	{
		switch ($this->query('tipo_orden')) {
			case 'ruta':
				$this->delete_ruta();
				break;
			case 'manual_externo':
				$this->delete_manual_externo();
				break;
			case 'manual_interno':
				$this->delete_manual_interno();
				break;
			case 'servicio_ex':
				$this->delete_servicio_ex();
				break;
			case 'servicio_in':
				$this->delete_servicio_in();
				break;
			case 'refaccion':
				$this->delete_refaccion();
				break;
			default:
				return $this->response(null, 400);
		}
	}

	public function index_put()
	{
		switch ($this->query('tipo_orden')) {
			case 'refaccion':
				$this->put_refaccion();
				break;
			default:
				return $this->response(null, 400);
		}
	}

	private function get_ruta()
	{
		if (($id = $this->get('id')) && is_numeric($this->get('id'))) {
			$response['data'] = $this->orden_ruta->obtener($id);
		} else {
			$response['data'] = $this->orden_ruta->obtener_todos();
		}

		return $this->response($response, 200);
	}

	private function post_ruta()
	{
		$config = array();
		$config['upload_path'] = './uploads/';
		$config['allowed_types'] = 'gif|jpg|png';
		$config['overwrite'] = true;
		$this->load->library('upload');
		$this->upload->initialize($config);

		$datos = array(
			'tipo' => $this->post('tipo'),
			'servicio' => $this->post('servicio'),
			'descripcion' => $this->post('descripcion'),
			'fecha_entrada' => $this->post('fecha_entrada'),
			'fecha_salida' => $this->post('fecha_salida'),
			'costo' => $this->post('costo'),
		);

		$datos['id_objeto'] = $this->post('tipo') == 2 ? $this->post('caja') : $this->post('tractor');

		if ($this->upload->do_upload('factura')) {
			$datos['factura'] = $this->upload->data('file_name'); //TODO: Implementar operaciones de borrado
		}

		if ($id = $this->post('id')) {
			if ($result = $this->orden_ruta->actualizar($id, $datos)) {
				return $this->response($result, 200);
			}
		} else {
			if ($result = $this->orden_ruta->insertar($datos)) {
				return $this->response($result, 201);
			}
		}
		return $this->response(null, 500);
	}

	private function delete_ruta()
	{
		if (($id = $this->query('id')) && is_numeric($this->query('id'))) {
			if ($this->orden_ruta->eliminar($id)) {
				return $this->response(array('result' => 'Success'), 200);
			} else {
				return $this->response(array('result' => 'Error'), 404);
			}
		}
	}

	private function get_manual_externo()
	{
		if (($id = $this->get('id')) && is_numeric($this->get('id'))) {
			$response['data'] = $this->orden_manual_externo->obtener($id);
		} else {
			$response['data'] = $this->orden_manual_externo->obtener_todos();
		}

		return $this->response($response, 200);
	}

	private function post_manual_externo()
	{
		$config = array();
		$config['upload_path'] = './uploads/';
		$config['allowed_types'] = 'gif|jpg|png';
		$config['overwrite'] = true;
		$this->load->library('upload');
		$this->upload->initialize($config);

		$datos = array(
			'tipo' => $this->post('tipo'),
			'notas' => $this->post('notas'),
			'fecha_entrada' => $this->post('fecha_entrada'),
			'fecha_salida' => $this->post('fecha_salida'),
		);

		$datos['id_objeto'] = $this->post('tipo') == 2 ? $this->post('caja') : $this->post('tractor');

		if ($this->upload->do_upload('factura')) {
			$datos['factura'] = $this->upload->data('file_name'); //TODO: Implementar operaciones de borrado
		}

		if ($id = $this->post('id')) {
			if ($result = $this->orden_manual_externo->actualizar($id, $datos)) {
				return $this->response($result, 200);
			}
		} else {
			$datos['id_proveedor'] = $this->post('id_proveedor');
			$datos['servicios'] = $this->post('servicios');
			if ($result = $this->orden_manual_externo->insertar($datos)) {
				return $this->response($result, 201);
			}
		}
		return $this->response(null, 500);
	}

	private function delete_manual_externo()
	{
		if (($id = $this->query('id')) && is_numeric($this->query('id'))) {
			if ($this->orden_manual_externo->eliminar($id)) {
				return $this->response(array('result' => 'Success'), 200);
			} else {
				return $this->response(array('result' => 'Error'), 404);
			}
		}

		return $this->response(null, 400);
	}

	private function get_manual_interno()
	{
		if (($id = $this->get('id')) && is_numeric($this->get('id'))) {
			$response['data'] = $this->orden_manual_interno->obtener($id);
		} else {
			$response['data'] = $this->orden_manual_interno->obtener_todos();
		}

		return $this->response($response, 200);
	}

	private function post_manual_interno()
	{
		/*$config = array();
		$config['upload_path'] = './uploads/';
		$config['allowed_types'] = 'gif|jpg|png';
		$config['overwrite'] = true;
		$this->load->library('upload');
		$this->upload->initialize($config);*/ //Deshabilitado temporalmente

		$datos = array(
			'tipo' => $this->post('tipo'),
			'notas' => $this->post('notas'),
			'id_mecanico' => $this->post('id_mecanico')
		);

		$datos['id_objeto'] = $this->post('tipo') == 2 ? $this->post('caja') : $this->post('tractor');

		/*if ($this->upload->do_upload('factura')) {
			$datos['factura'] = $this->upload->data('file_name'); //TODO: Implementar operaciones de borrado
		}*/ // Deshabilitado temporalmente

		if ($id = $this->post('id')) {
			if ($result = $this->orden_manual_interno->actualizar($id, $datos)) {
				return $this->response($result, 200);
			}
		} else {
			$datos['servicios'] = $this->post('servicios');
			$datos['refacciones'] = $this->post('refacciones');
			if ($result = $this->orden_manual_interno->insertar($datos)) {
				return $this->response($result, 201);
			}
		}
		return $this->response(null, 500);
	}

	private function delete_manual_interno()
	{
		if (($id = $this->query('id')) && is_numeric($this->query('id'))) {
			if ($this->orden_manual_interno->eliminar($id)) {
				return $this->response(array('result' => 'Success'), 200);
			} else {
				return $this->response(array('result' => 'Error'), 404);
			}
		}

		return $this->response(null, 400);
	}

	private function post_servicio_ex()
	{
		if (!$this->post('id_mexterno') || !$this->post('id_servicio')) {
			return $this->response(null, 400);
		}

		$datos = array(
			'id_mexterno' => $this->post('id_mexterno'),
			'id_servicio' => $this->post('id_servicio')
		);

		if ($result = $this->orden_manual_externo->insertar_servicio($datos)) {
			return $result !== 'error' ? $this->response($result, 201) : $this->response(null, 409);
		} else {
			return $this->response(null, 500);
		}
	}

	private function delete_servicio_ex()
	{
		if (($id = $this->query('id')) && is_numeric($this->query('id'))) {
			if ($this->orden_manual_externo->eliminar_servicio($id)) {
				return $this->response(array('result' => 'Success'), 200);
			} else {
				return $this->response(array('result' => 'Error'), 404);
			}
		}
	}

	private function post_servicio_in()
	{
		if (!$this->post('id_minterno') || !$this->post('id_servicio')) {
			return $this->response(null, 400);
		}

		$datos = array(
			'id_minterno' => $this->post('id_minterno'),
			'id_servicio' => $this->post('id_servicio')
		);

		if ($result = $this->orden_manual_interno->insertar_servicio($datos)) {
			return $result !== 'error' ? $this->response($result, 201) : $this->response(null, 409);
		} else {
			return $this->response(null, 500);
		}
	}

	private function delete_servicio_in()
	{
		if (($id = $this->query('id')) && is_numeric($this->query('id'))) {
			if ($this->orden_manual_interno->eliminar_servicio($id)) {
				return $this->response(array('result' => 'Success'), 200);
			} else {
				return $this->response(array('result' => 'Error'), 404);
			}
		}
	}

	private function post_refaccion()
	{
		if (!$this->post('id_minterno') || !$this->post('id_refaccion')) {
			return $this->response(null, 400);
		}

		$datos = array(
			'id_minterno' => $this->post('id_minterno'),
			'id_refaccion' => $this->post('id_refaccion'),
			'piezas' => $this->post('piezas'),
		);

		if ($result = $this->orden_manual_interno->insertar_refaccion($datos)) {
			return $result !== 'error' ? $this->response($result, 201) : $this->response(null, 409);
		} else {
			return $this->response(null, 500);
		}
	}

	private function put_refaccion()
	{
		if (($id = $this->put('id')) && is_numeric($this->put('id'))) {
			if ($result = $this->orden_manual_interno->actualizar_refaccion($id, $this->put('piezas'))) {
				return $this->response($result, 200);
			} else {
				return $this->response(array('result' => 'Error'), 409);
			}
		}
	}

	private function delete_refaccion()
	{
		if (($id = $this->query('id')) && is_numeric($this->query('id'))) {
			if ($this->orden_manual_interno->eliminar_refaccion($id)) {
				return $this->response(array('result' => 'Success'), 200);
			} else {
				return $this->response(array('result' => 'Error'), 404);
			}
		}
	}

	private function get_refaccion()
	{

	}
}
