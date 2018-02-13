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
        $this->db->select('a.id, a.nombre, a.descripcion, a.costo, a.tiempo_entrega, a.proveedor, b.nombre as nombre_proveedor');
        $this->db->from('refacciones as a');
        $this->db->join('proveedores as b', 'a.proveedor = b.id');
        $this->db->where('a.id', $id);
        return $this->db->get()->row();
    }

    public function obtener_todos()
    {
        $this->db->select('a.id, a.nombre, a.descripcion, a.costo, a.tiempo_entrega, a.proveedor, b.nombre as nombre_proveedor');
        $this->db->from('refacciones as a');
        $this->db->join('proveedores as b', 'a.proveedor = b.id');
        return $this->db->get()->result_array();
    }

    public function insertar($datos)
    {
        return $this->db->insert('refacciones', $datos) ? $this->obtener($this->db->insert_id()) : false;
    }

    public function eliminar($id)
    {
        return $this->db->delete('refacciones', array('id' => $id));
    }

    public function actualizar($id, $datos)
    {
        $this->db->where('id', $id);
        return $this->db->update('refacciones', $datos) ? $this->obtener($id) : false;
    }
}