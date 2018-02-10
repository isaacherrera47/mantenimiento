<?php


class Mecanico extends CI_Model
{

    public $id_mecanico;
    public $nombre;
    public $apellido;
    public $horas;

    public function __construct()
    {
        $this->load->database();
    }

    public function obtener_todos()
    {
        return $this->db->get('mecanicos')->result_array();
    }

    public function obtener($id)
    {
        return $this->db->get_where('mecanicos', array('id_mecanico' => $id))->result_array();
    }

    public function insertar($datos)
    {
        if ($this->db->insert('mecanicos', $datos)) {
            $datos ['id'] = $this->db->insert_id();
            return $datos;
        } else {
            return false;
        }
    }

    public function eliminar($id)
    {
        return $this->db->delete('mecanicos', array('id_mecanico' => $id));
    }

    public function actualizar($id, $datos)
    {
        $this->db->where('id_mecanico', $id);
        if ($this->db->update('mecanicos', $datos)) {
            $datos['id'] = $id;
            return $datos;
        } else {
            return false;
        }
    }
}

