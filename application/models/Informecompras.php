<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Informecompras extends CI_Model {

    /**
     * Clase constructora
     *
     * @return  void
     */
    function __construct()
    {
        parent::__construct();
    }

    /**
     * Devuelve los proveedores.
     *
     * @return  Array   Listado de proveedores.
     */
    function getProveedores()
    {
        $this->db->select('
            provid,
            provnombre'
        );
        $this->db->from('abmproveedores');

        $query = $this->db->get();

        if ($query->num_rows()!=0)
        {
            return $query->result_array();
        }
        else
        {
            return false;
        }
    }

    /**
     * Devuelve las Facturas de un determinado proveedor.
     *
     * @param   String  $idProveedor    Id de proveedor.
     * @return  Array   $data           Facturas de un determinado proveedor.
     */
    function listFacturas($data)
    {
        $this->db->select('
            tbl_factura.facNumero,
            tbl_factura.facId,
            tbl_factura.facTotal,
            tbl_factura.facFecha'
        );
        $this->db->from('tbl_factura');
        $this->db->where('tbl_factura.facProveedorId', $data['idProveedor']);
        $this->db->where('tbl_factura.facFecha >=', $data['fechaInicio']);
        $this->db->where('tbl_factura.facFecha <=', $data['fechaFin']);

        $query = $this->db->get();

        if ($query->num_rows()!=0)
        {
            return $query->result_array();
        }
        else
        {
            return false;
        }
    }

    /**
     * Devuelve las Ordenes de Pago de un determinado proveedor.
     *
     * @param   String  $idProveedor    Id de proveedor.
     * @return  Array   $data           Ordenes de Pago de un determinado proveedor.
     */
    function listOrdenesPagos($data)
    {
        $this->db->select('
            tbl_ordenpago.opid,
            tbl_ordenpago.opfecha,
            tbl_ordenpago.opmonto'
        );
        $this->db->from('tbl_ordenpago');
        $this->db->where('tbl_ordenpago.provid', $data['idProveedor']);
        $this->db->where('tbl_ordenpago.opfecha >=', $data['fechaInicio']);
        $this->db->where('tbl_ordenpago.opfecha <=', $data['fechaFin']);

        $query = $this->db->get();

        if ($query->num_rows()!=0)
        {
            return $query->result_array();
        }
        else
        {
            return false;
        }
    }

}