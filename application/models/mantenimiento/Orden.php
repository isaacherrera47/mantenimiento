<?php
/**
 * Created by PhpStorm.
 * User: intekel01
 * Date: 9/02/18
 * Time: 03:54 PM
 */

class Orden extends CI_Model
{
    public $id;
    public $tipo;
    public $id_objeto;
    public $servicio;
    public $descripcion;
    public $fecha_entrada;
    public $fecha_salida;
    public $factura;
    public $tipos;

    const TRACTOR = 1;
    const CAJA = 2;

    private $where_clauses;

    public function __construct()
    {
        parent::__construct();
        $this->load->database();
        $this->where_clauses = array('id', 'tipo');
        $this->tipos = array(
            self::TRACTOR => array('id' => self::TRACTOR, 'descripcion' => 'Tractor'),
            self::CAJA => array('id' => self::CAJA, 'descripcion' => 'Caja')
        );
    }

    public function obtener($array_id)
    {
        if (isset($array_id['id'])) {
            return $this->obtener_primero($array_id);
        }

        $tmp_array = $this->db->get_where('ordenes_ruta', $array_id)->result_array();
        return !is_null($tmp_array) && $tmp_array ? $this->obtener_relaciones($tmp_array) : $tmp_array;
    }

    private function obtener_primero($array_id)
    {
        $tmp_item = $this->db->get_where('ordenes_ruta', $array_id)->row();
        return !is_null($tmp_item) && !empty($tmp_item) ? $this->obtener_relaciones($tmp_item) : $tmp_item;
    }

    public function obtener_todos()
    {
        $tmp_array = $this->db->get('ordenes_ruta')->result_array();
        return !is_null($tmp_array) && $tmp_array ? $this->obtener_relaciones($tmp_array) : $tmp_array;
    }

    public function insertar($datos)
    {
        return $this->db->insert('ordenes_ruta', $datos) ? $this->obtener(array('id' => $this->db->insert_id())) : false;
    }

    public function eliminar($id)
    {
        return $this->db->delete('ordenes_ruta', array('id' => $id));
    }

    public function actualizar($array_id, $datos)
    {
        $this->db->where($array_id);
        return $this->db->update('ordenes_ruta', $datos) ? $this->obtener($array_id) : false;
    }

    private function obtener_relaciones($obj)
    {
        if (is_array($obj)) {
            foreach ($obj as $key => $item) {
                if ($item['tipo'] == self::TRACTOR) {
                    if ($obj[$key]['tractor'] = $this->db->get_where('tractores', array('idtractor' => $item['id_objeto']))->row()) {
                        unset($obj[$key]['id_objeto']);
                    }
                } else {
                    if ($obj[$key]['caja'] = $this->db->get_where('cajas', array('idCaja' => $item['id_objeto']))->row()) {
                        unset($obj[$key]['id_objeto']);
                    }
                }
                $obj[$key]['tipo'] = $this->tipos[$item['tipo']];
            }
        } else {
            if ($obj->tipo == self::TRACTOR) {
                if ($obj->tractor = $this->db->get_where('tractores', array('idtractor' => $obj->id_objeto))->row()) {
                    unset($obj->id_objeto);
                }
            } else {
                if ($obj->caja = $this->db->get_where('cajas', array('idCaja' => $obj->id_objeto))->row()) {
                    unset($obj->id_objeto);
                }
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

    public function existe_registro($id_refaccion, $id_proveedor, $id_row = null)
    {
        $where_clause = array('id_refaccion' => $id_refaccion, 'id_proveedor' => $id_proveedor);
        if ($row = $this->db->get_where('ordenes_ruta', $where_clause)->row()) {
            if ($id_row === null || $row->id != $id_row) {
                return true;
            }
        }

        return false;
    }
}