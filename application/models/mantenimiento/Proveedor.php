<?php
/**
 * Created by PhpStorm.
 * User: intekel01
 * Date: 9/02/18
 * Time: 03:54 PM
 */

class Proveedor extends CI_Model
{
    public $id;
    public $nombre;
    public $direccion;
    public $telefono;

    public function __construct()
    {
        $this->load->database();
    }

    public function obtener($id)
    {
        return $this->db->get_where('proveedores', array('id' => $id))->row();
    }

    public function obtener_todos()
    {
        return $this->db->get('proveedores')->result_array();
    }

    public function insertar($datos)
    {
        if ($this->db->insert('proveedores', $datos)) {
            $datos ['id'] = $this->db->insert_id();
            return $datos;
        } else {
            return false;
        }
    }

    public function eliminar($id)
    {
        return $this->db->delete('proveedores', array('id' => $id));
    }

    public function actualizar($id, $datos)
    {
        $this->db->where('id', $id);
        if ($this->db->update('proveedores', $datos)) {
            $datos['id'] = $id;
            return $datos;
        } else {
            return false;
        }
    }
}