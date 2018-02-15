<?php
/**
 * Created by PhpStorm.
 * User: intekel01
 * Date: 9/02/18
 * Time: 03:54 PM
 */

class Refaccion_proveedor extends CI_Model
{
    public $id;
    public $id_refaccion;
    public $id_proveedor;
    public $costo;
    private $where_clauses;

    public function __construct()
    {
        $this->load->database();
        $this->where_clauses = array('id', 'id_refaccion', 'id_proveedor');
    }

    public function obtener($array_id)
    {
        if (isset($array_id['id_refaccion']) && isset($array_id['id_proveedor']) || isset($array_id['id'])) {
            return $this->obtener_primero($array_id);
        }

        $tmp_array = $this->db->get_where('refacciones_proveedores', $array_id)->result_array();
        return !is_null($tmp_array) && $tmp_array ? $this->obtener_relaciones($tmp_array) : $tmp_array;
    }

    private function obtener_primero($array_id)
    {
        $tmp_item = $this->db->get_where('refacciones_proveedores', $array_id)->row();
        return !is_null($tmp_item) && !empty($tmp_item) ? $this->obtener_relaciones($tmp_item) : $tmp_item;
    }

    public function obtener_todos()
    {
        $tmp_array = $this->db->get('refacciones_proveedores')->result_array();
        return !is_null($tmp_array) && $tmp_array ? $this->obtener_relaciones($tmp_array) : $tmp_array;
    }

    public function insertar($datos)
    {
        return $this->db->insert('refacciones_proveedores', $datos) ? $this->obtener(array('id' => $this->db->insert_id())) : false;
    }

    public function eliminar($id)
    {
        return $this->db->delete('refacciones_proveedores', array('id' => $id));
    }

    public function actualizar($array_id, $datos)
    {
        $this->db->where($array_id);
        return $this->db->update('refacciones_proveedores', $datos) ? $this->obtener($array_id) : false;
    }

    private function obtener_relaciones($obj)
    {
        if (is_array($obj)) {
            foreach ($obj as $key => $item) {
                if ($obj[$key]['refaccion'] = $this->db->get_where('refacciones', array('id' => $item['id_refaccion']))->row()) {
                    unset($obj[$key]['id_refaccion']);
                }
                if ($obj[$key]['proveedor'] = $this->db->get_where('proveedores', array('id' => $item['id_proveedor']))->row()) {
                    unset($obj[$key]['id_proveedor']);
                }
            }
        } else {
            if ($obj->refaccion = $this->db->get_where('refacciones', array('id' => $obj->id_refaccion))->row()) {
                unset($obj->id_refaccion);
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
}