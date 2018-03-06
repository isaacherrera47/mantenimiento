<?php
/**
 * Created by PhpStorm.
 * User: intekel01
 * Date: 9/02/18
 * Time: 03:54 PM
 */

class Servicio_proveedor extends CI_Model
{
    public $id;
    public $id_servicio;
    public $id_proveedor;
    public $costo;
    private $where_clauses;

    public function __construct()
    {
        $this->load->database();
        $this->where_clauses = array('id', 'id_servicio', 'id_proveedor');
    }

    public function obtener($array_id)
    {
        if ((isset($array_id['id_servicio']) && isset($array_id['id_proveedor'])) || isset($array_id['id'])) {
            return $this->obtener_primero($array_id);
        }

        $tmp_array = $this->db->get_where('servicios_proveedores', $array_id)->result_array();
        return !is_null($tmp_array) && $tmp_array ? $this->obtener_relaciones($tmp_array) : $tmp_array;
    }

    private function obtener_primero($array_id)
    {
        $tmp_item = $this->db->get_where('servicios_proveedores', $array_id)->row();
        return !is_null($tmp_item) && !empty($tmp_item) ? $this->obtener_relaciones($tmp_item) : $tmp_item;
    }

    public function obtener_todos()
    {
        $tmp_array = $this->db->get('servicios_proveedores')->result_array();
        return !is_null($tmp_array) && $tmp_array ? $this->obtener_relaciones($tmp_array) : $tmp_array;
    }

    public function insertar($datos)
    {
        return $this->db->insert('servicios_proveedores', $datos) ? $this->obtener(array('id' => $this->db->insert_id())) : false;
    }

    public function eliminar($id)
    {
        return $this->db->delete('servicios_proveedores', array('id' => $id));
    }

    public function actualizar($array_id, $datos)
    {
        $this->db->where($array_id);
        return $this->db->update('servicios_proveedores', $datos) ? $this->obtener($array_id) : false;
    }

    private function obtener_relaciones($obj)
    {
        if (is_array($obj)) {
            foreach ($obj as $key => $item) {
                if ($obj[$key]['servicio'] = $this->db->get_where('servicios', array('id' => $item['id_servicio']))->row()) {
                    unset($obj[$key]['id_servicio']);
                }
                if ($obj[$key]['proveedor'] = $this->db->get_where('proveedores', array('id' => $item['id_proveedor']))->row()) {
                    unset($obj[$key]['id_proveedor']);
                }
            }
        } else {
            if ($obj->servicio = $this->db->get_where('servicios', array('id' => $obj->id_servicio))->row()) {
                unset($obj->id_servicio);
            }
            if ($obj->proveedor = $this->db->get_where('proveedores', array('id' => $obj->id_proveedor))->row()) {
                unset($obj->id_proveedor);
            }
        }
        return $obj;
    }

    public function obtener_parametros_where($get_params)
    {
        $clean_array = array();
        foreach ($this->where_clauses as $clause) {
            if (isset($get_params[$clause]) && !empty($get_params[$clause])) {
                $clean_array[$clause] = $get_params[$clause];
            }
        }
        return $clean_array;
    }

    public function existe_registro($id_servicio, $id_proveedor, $id_row = null)
    {
        $where_clause = array('id_servicio' => $id_servicio, 'id_proveedor' => $id_proveedor);
        if ($row = $this->db->get_where('servicios_proveedores', $where_clause)->row()) {
            if ($id_row === null || $row->id != $id_row) {
                return true;
            }
        }

        return false;
    }
}
