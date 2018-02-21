<?php
/**
 * Created by PhpStorm.
 * User: intekel01
 * Date: 9/02/18
 * Time: 03:54 PM
 */

class Servicio_refaccion extends CI_Model
{
    public $id;
    public $id_servicio;
    public $id_refaccion;
    public $costo;
    private $where_clauses;

    public function __construct()
    {
        $this->load->database();
        $this->where_clauses = array('id', 'id_servicio', 'id_refaccion');
    }

    public function obtener($array_id)
    {
        if (isset($array_id['id_servicio']) && isset($array_id['id_refaccion']) || isset($array_id['id'])) {
            return $this->obtener_primero($array_id);
        }

        $tmp_array = $this->db->get_where('servicios_refacciones', $array_id)->result_array();
        return !is_null($tmp_array) && $tmp_array ? $this->obtener_relaciones($tmp_array) : $tmp_array;
    }

    private function obtener_primero($array_id)
    {
        $tmp_item = $this->db->get_where('servicios_refacciones', $array_id)->row();
        return !is_null($tmp_item) && !empty($tmp_item) ? $this->obtener_relaciones($tmp_item) : $tmp_item;
    }

    public function obtener_todos()
    {
        $tmp_array = $this->db->get('servicios_refacciones')->result_array();
        return !is_null($tmp_array) && $tmp_array ? $this->obtener_relaciones($tmp_array) : $tmp_array;
    }

    public function insertar($datos)
    {
        return $this->db->insert('servicios_refacciones', $datos) ? $this->obtener(array('id' => $this->db->insert_id())) : false;
    }

    public function eliminar($id)
    {
        return $this->db->delete('servicios_refacciones', array('id' => $id));
    }

    public function actualizar($array_id, $datos)
    {
        $this->db->where($array_id);
        return $this->db->update('servicios_refacciones', $datos) ? $this->obtener($array_id) : false;
    }

    private function obtener_relaciones($obj)
    {
        if (is_array($obj)) {
            foreach ($obj as $key => $item) {
                if ($obj[$key]['servicio'] = $this->db->get_where('servicios', array('id' => $item['id_servicio']))->row()) {
                    unset($obj[$key]['id_servicio']);
                }
                if ($obj[$key]['refaccion'] = $this->db->get_where('refacciones', array('id' => $item['id_refaccion']))->row()) {
                    unset($obj[$key]['id_refaccion']);
                }
            }
        } else {
            if ($obj->servicio = $this->db->get_where('servicios', array('id' => $obj->id_servicio))->row()) {
                unset($obj->id_servicio);
            }
            if ($obj->refaccion = $this->db->get_where('refacciones', array('id' => $obj->id_refaccion))->row()) {
                unset($obj->id_refaccion);
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

    public function existe_registro($id_servicio, $id_refaccion, $id_row = null)
    {
        $where_clause = array('id_servicio' => $id_servicio, 'id_refaccion' => $id_refaccion);
        if ($row = $this->db->get_where('servicios_refacciones', $where_clause)->row()) {
            if ($id_row === null || $row->id != $id_row) {
                return true;
            }
        }

        return false;
    }
}