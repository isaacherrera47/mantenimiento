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

    public function __construct()
    {
        $this->load->database();
    }

    public function obtener_todos()
    {
        return $this->db->get('servicios')->row();
    }

    public function obtener($id)
    {
        return $this->db->get_where('servicios', array('id' => $id))->row();
    }

    public function insertar($datos)
    {
        if ($this->db->insert('servicios', $datos)) {
            $datos ['id'] = $this->db->insert_id();
            return $datos;
        } else {
            return false;
        }
    }

    public function eliminar($id)
    {
        return $this->db->delete('servicios', array('id' => $id));
    }

    public function actualizar($id, $datos)
    {
        $this->db->where('id', $id);
        if ($this->db->update('servicios', $datos)) {
            $datos['id'] = $id;
            return $datos;
        } else {
            return false;
        }
    }
}

