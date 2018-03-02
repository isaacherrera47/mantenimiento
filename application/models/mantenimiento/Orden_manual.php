<?php

class Orden_manual extends CI_Model
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
    public $costo;

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

    public function obtener($id)
    {
        $tmp_array = $this->db->get_where('ordenes_ruta', array('id' => $id))->row();
        return !is_null($tmp_array) && $tmp_array ? $this->obtener_relaciones($tmp_array) : $tmp_array;
    }

    public function obtener_todos()
    {
        $tmp_array = $this->db->get('ordenes_ruta')->result_array();
        return !is_null($tmp_array) && $tmp_array ? $this->obtener_relaciones($tmp_array) : $tmp_array;
    }

    public function insertar($datos)
    {
        return $this->db->insert('ordenes_ruta', $datos) ? $this->obtener($this->db->insert_id()) : false;
    }

    public function eliminar($id)
    {
        return $this->db->delete('ordenes_ruta', array('id' => $id));
    }

    public function actualizar($id, $datos)
    {
        $this->db->where(array('id' => $id));
        return $this->db->update('ordenes_ruta', $datos) ? $this->obtener($id) : false;
    }

    private function obtener_relaciones($obj)
    {
        if (is_array($obj)) {
            foreach ($obj as $key => $item) {
                if ($item['tipo'] == self::TRACTOR) {
                    if ($obj[$key]['tractor'] = $this->db->get_where('tractores', array('idtractor' => $item['id_objeto']))->row()) {
                        $obj[$key]['tractor']->id = $obj[$key]['tractor']->idtractor;
                        unset($obj[$key]['id_objeto']);
                    }
                } else {
                    if ($obj[$key]['caja'] = $this->db->get_where('cajas', array('idCaja' => $item['id_objeto']))->row()) {
                        $obj[$key]['caja']->id = $obj[$key]['caja']->idCaja;
                        unset($obj[$key]['id_objeto']);
                    }
                }
                $obj[$key]['tipo'] = $this->tipos[$item['tipo']];
            }
        } else {
            if ($obj->tipo == self::TRACTOR) {
                if ($obj->tractor = $this->db->get_where('tractores', array('idtractor' => $obj->id_objeto))->row()) {
                    $obj->tractor->id = $obj->tractor->idtractor;
                    unset($obj->id_objeto);
                }
            } else {
                if ($obj->caja = $this->db->get_where('cajas', array('idCaja' => $obj->id_objeto))->row()) {
                    $obj->caja->id = $obj->caja->idCaja;
                    unset($obj->id_objeto);
                }
            }
            $obj->tipo = $this->tipos[$obj->tipo];
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