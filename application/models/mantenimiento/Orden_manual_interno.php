<?php

class Orden_manual_interno extends CI_Model
{
	const TRACTOR = 1;
	const CAJA = 2;

	public function __construct()
	{
		parent::__construct();
		$this->load->database();
		$this->tipos = array(
			self::TRACTOR => array('id' => self::TRACTOR, 'descripcion' => 'Tractor'),
			self::CAJA => array('id' => self::CAJA, 'descripcion' => 'Caja')
		);
	}

	public function obtener($id)
	{
		$tmp_array = $this->db->get_where('ordenes_minterno', array('id' => $id))->row();
		return !is_null($tmp_array) && $tmp_array ? $this->obtener_relaciones($tmp_array) : $tmp_array;
	}

	public function obtener_todos()
	{
		$tmp_array = $this->db->get('ordenes_minterno')->result_array();
		return !is_null($tmp_array) && $tmp_array ? $this->obtener_relaciones($tmp_array) : $tmp_array;
	}

	public function insertar($datos)
	{
		$servicios = $datos['servicios'];
		$refacciones = $datos['refacciones'];
		unset($datos['servicios']);
		unset($datos['refacciones']);
		$result = $this->db->insert('ordenes_minterno', $datos) ? $this->obtener($this->db->insert_id()) : false;
		if ($result && $servicios) {
			foreach ($servicios as $servicio) {
				$this->db->insert('minterno_servicio', array('id_minterno' => $result->id, 'id_servicio' => $servicio));
			}
		}
		if ($result && $refacciones) {
			foreach ($refacciones as $refaccion) {
				$this->db->insert('minterno_refaccion', array('id_minterno' => $result->id, 'id_refaccion' => $refaccion));
			}
		}
		return $result;
	}

	public function eliminar($id)
	{
		return $this->db->delete('ordenes_minterno', array('id' => $id));
	}

	public function actualizar($id, $datos)
	{
		$this->db->where(array('id' => $id));
		return $this->db->update('ordenes_minterno', $datos) ? $this->obtener($id) : false;
	}

	private function obtener_relaciones($obj)
	{
		if (is_array($obj)) {
			foreach ($obj as $key => $item) {
				if ($item['tipo'] == self::TRACTOR) {
					if ($obj[$key]['tractor'] = $this->db->get_where('tractores', array('idtractor' => $item['id_objeto']))->row()) {
						$obj[$key]['tractor']->id = $obj[$key]['tractor']->idtractor;
						unset($obj[$key]['id_objeto']);
					}
				} else {
					if ($obj[$key]['caja'] = $this->db->get_where('cajas', array('idCaja' => $item['id_objeto']))->row()) {
						$obj[$key]['caja']->id = $obj[$key]['caja']->idCaja;
						unset($obj[$key]['id_objeto']);
					}
				}
				if ($obj[$key]['mecanico'] = $this->db->get_where('mecanicos', array('id_mecanico' => $item['id_mecanico']))->row()) {
					$obj[$key]['mecanico']->id = $obj[$key]['mecanico']->id_mecanico;
					unset($obj[$key]['id_mecanico']);
				}
				$obj[$key]['tipo'] = $this->tipos[$item['tipo']];
			}
		} else {
			if ($obj->tipo == self::TRACTOR) {
				if ($obj->tractor = $this->db->get_where('tractores', array('idtractor' => $obj->id_objeto))->row()) {
					$obj->tractor->id = $obj->tractor->idtractor;
					unset($obj->id_objeto);
				}
			} else {
				if ($obj->caja = $this->db->get_where('cajas', array('idCaja' => $obj->id_objeto))->row()) {
					$obj->caja->id = $obj->caja->idCaja;
					unset($obj->id_objeto);
				}
			}
			if ($obj->mecanico = $this->db->get_where('mecanicos', array('id_mecanico' => $obj->id_mecanico))->row()) {
				$obj->mecanico->id = $obj->mecanico->id_mecanico;
				unset($obj->id_mecanico);
			}
			$obj->servicios = $this->obtener_servicios($obj->id);
			$obj->refacciones = $this->obtener_refacciones($obj->id);
			$obj->tipo = $this->tipos[$obj->tipo];
		}
		return $obj;
	}

	private function obtener_servicios($id_mantenimiento)
	{
		$this->db->select('b.id, a.id as id_servicio, a.nombre, a.descripcion, a.tiempo_entrega, a.tipo, a.categoria');
		$this->db->from('minterno_servicio as b');
		$this->db->join('servicios as a', 'b.id_servicio = a.id');
		$this->db->where(array('id_minterno' => $id_mantenimiento));

		return $this->db->get()->result_array();
	}

	private function obtener_refacciones($id_mantenimiento)
	{
		$this->db->select('b.id, a.id as id_refaccion, a.nombre, a.descripcion, b.piezas');
		$this->db->from('minterno_refaccion as b');
		$this->db->join('refacciones as a', 'b.id_refaccion = a.id');
		$this->db->where(array('id_minterno' => $id_mantenimiento));

		return $this->db->get()->result_array();
	}

	private function obtener_refaccion($id)
	{
		$this->db->select('b.id, a.id as id_refaccion, a.nombre, a.descripcion, b.piezas');
		$this->db->from('minterno_refaccion as b');
		$this->db->join('refacciones as a', 'b.id_refaccion = a.id');
		$this->db->where(array('b.id' => $id));

		return $this->db->get()->row();
	}

	private function obtener_servicio($id_mantenimiento, $id_servicio)
	{
		$this->db->select('b.id, a.id as id_servicio, a.nombre, a.descripcion, a.tiempo_entrega, a.tipo, a.categoria');
		$this->db->from('minterno_servicio as b');
		$this->db->join('servicios as a', 'b.id_servicio = a.id');
		$this->db->where(array('id_minterno' => $id_mantenimiento, 'id_servicio' => $id_servicio));

		return $this->db->get()->row();
	}

	public function insertar_servicio($datos)
	{
		if (!$this->db->get_where('minterno_servicio', $datos)->row()) {
			return $this->db->insert('minterno_servicio', $datos) ? $this->obtener_servicio($datos['id_minterno'], $datos['id_servicio']) : false;
		} else {
			return $result = 'error';
		}
	}

	public function insertar_refaccion($datos)
	{
		$where_clauses = array(
			'id_minterno' => $datos['id_minterno'],
			'id_refaccion' => $datos['id_refaccion']
		);

		if (!$this->db->get_where('minterno_refaccion', $where_clauses)->row()) {
			return $this->db->insert('minterno_refaccion', $datos) ? $this->obtener_refaccion($this->db->insert_id()) : false;
		} else {
			return $result = 'error';
		}
	}

	public function actualizar_refaccion($id, $piezas) //Solo modificar el numero de piezas
	{
		$this->db->where(array('id' => $id));
		return $this->db->update('minterno_refaccion', array('piezas' => $piezas)) ? $this->obtener_refaccion($id) : false;
	}

	public function eliminar_servicio($id)
	{
		return $this->db->delete('minterno_servicio', array('id' => $id));
	}

	public function eliminar_refaccion($id)
	{
		return $this->db->delete('minterno_refaccion', array('id' => $id));
	}
}
