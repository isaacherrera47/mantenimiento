<?php
/**
 * Created by PhpStorm.
 * User: intekel01
 * Date: 9/02/18
 * Time: 03:54 PM
 */

class Refaccion extends CI_Model
{
    public $id;
    public $nombre;
    public $descripcion;
    public $costo;
    public $tiempo_entrega;
    public $proveedor;

    public function __construct()
    {
        $this->load->database();
    }

    public function obtener($id)
    {
        return $this->db->get_where('refacciones', array('id' => $id))->result_array();
    }

    public function obtener_todos()
    {
        return $this->db->get('refacciones')->result_array();
    }

    public function insertar($datos)
    {
        if ($this->db->insert('refacciones', $datos)) {
            $datos ['id'] = $this->db->insert_id();
            return $datos;
        } else {
            return false;
        }
    }

    public function eliminar($id)
    {
        return $this->db->delete('refacciones', array('id' => $id));
    }

    public function actualizar($id, $datos)
    {
        $this->db->where('id', $id);
        if ($this->db->update('refacciones', $datos)) {
            $datos['id'] = $id;
            return $datos;
        } else {
            return false;
        }
    }
}