<?php


class Servicio extends CI_Model
{

    public $id;
    public $nombre;
    public $descripcion;
    public $tipo;
    public $categoria;
    public $tiempo;
    public $costo;
    public $refacciones;
    public $proveedores;

    const TRACTOR = 1;
    const CAJA = 2;

    public function __construct()
    {
        $this->load->database();
		$this->tipos_unidades = array(
			self::TRACTOR => array('id' => self::TRACTOR, 'descripcion' => 'Tractor'),
			self::CAJA => array('id' => self::CAJA, 'descripcion' => 'Caja')
		);
    }

    public function obtener_todos($tipo = false)
    {
        return $tipo ? $this->_parse_data($this->db->get_where('servicios', array('tipo' => $tipo))->result_array()) : $this->_parse_data($this->db->get('servicios')->result_array());
    }

    public function obtener($id)
    {
        return $this->_parse_data($this->db->get_where('servicios', array('id' => $id))->row());
    }

    public function insertar($datos)
    {
		return $this->db->insert('servicios', $datos) ? $this->obtener($this->db->insert_id()) : false;
    }

    public function eliminar($id)
    {
        return $this->db->delete('servicios', array('id' => $id));
    }

    public function actualizar($id, $datos)
    {
        $this->db->where('id', $id);
		return $this->db->update('servicios', $datos) ? $this->obtener($id) : false;
    }

    private function _parse_data($obj)
	{
		if (is_array($obj)) {
			foreach ($obj as $key => $item) {
				$obj[$key]['unidad'] = $this->tipos_unidades[$item['unidad']];
			}
		} else {
			$obj->unidad = $this->tipos_unidades[$obj->unidad];
		}

		return $obj;
	}
}

