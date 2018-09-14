<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Ivacompras extends CI_Model{

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
     * Devuelve los datos necesarios para el listado de facturas.
     *
     * @return  Array   Listado de facturas.
     */
    function ivaComprasList()
    {
        $this->db->select('
            tbl_factura.facId,
            tbl_factura.facNumero,
            tbl_factura.facFecha,
            tbl_factura.facTipo,
            abmproveedores.provnombre,
            tbl_factura.facIva,
            tbl_factura.facIva2,
            tbl_factura.facSubtotal,
            tbl_factura.facIngresosBrutos,
            tbl_factura.facTotal'
        );
        $this->db->from('tbl_factura');
        $this->db->join('abmproveedores', 'abmproveedores.provid = tbl_factura.facProveedorId', 'inner');
        $this->db->where('tbl_factura.facFecha >= DATE_SUB(NOW(), INTERVAL 1 MONTH)', NULL, FALSE);
        $this->db->order_by('tbl_factura.facFecha', 'ASC');
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
