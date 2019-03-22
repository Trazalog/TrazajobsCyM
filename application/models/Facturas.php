<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Facturas extends CI_Model{

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
    function facturasList()
    {
        $this->db->select('
            tbl_factura.facId,
            tbl_factura.facNumero,
            tbl_factura.facTipo,
            abmproveedores.provnombre,
            tbl_factura.facTotal'
        );
        $this->db->from('abmproveedores');
        $this->db->join('tbl_factura', 'abmproveedores.provid = tbl_factura.facProveedorId', 'inner');

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
     * Devuelve los datos de proveedores necesarios para crear uns factura.
     *
     * @return  Array   Listado de proveedores.
     */
    function proveedoresList()
    {
        $this->db->select('
            abmproveedores.provid,
            abmproveedores.provnombre,
            abmproveedores.provcuit,
            abmproveedores.provestado'
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

    function guardar_facturas($data){

        $aux = array();
		for($i=0; $i<count($data['facnumero']); $i++)
		{ 
		  $factura = array(
            'facNumero'          => $data['facnumero'][$i],
            'facFecha'           => $data['facfecha'][$i],
            'facTipo'            => $data['factipo'][$i],
            'facProveedorId'     => $data['facproveedorid'][$i],
            'facSubtotal'        => $data['facsubtotal'][$i],
            'facIva'             => $data['faciva'][$i],
            'facIva2'            => $data['faciva2'][$i],
            'facIngresosBrutos'  => $data['facingresosbrutos'][$i],
            'facRetenciones'     => $data['facretenciones'][$i],
            'facTotal'           => $data['factotal'][$i],
            'facTipoComprobante' => $data['factipocomprobante'][$i],
            'facEstado'          => $data['facestado'][$i]

         );
		  $aux[] = $factura;
		}
		return $this->db->insert_batch('tbl_factura',$aux);
    }

    /**
     * Graba la factura en la base de datos.
     *
     * @param   Array   datos a guardar en la tabla tbl_factura.
     * @return  bolean  True si se insertaron correctamente los datos, False si no.
     */
    function setFacturas($data = null)
    {
        if($data == null)
        {
            return false;
        }
        else
        {
            $this->db->trans_start();

            $factura = array(
               'facNumero'          => $data['facnumero'],
               'facFecha'           => $data['facfecha'],
               'facTipo'            => $data['factipo'],
               'facProveedorId'     => $data['facproveedorid'],
               'facSubtotal'        => $data['facsubtotal'],
               'facIva'             => $data['faciva'],
               'facIva2'            => $data['faciva2'],
               'facIngresosBrutos'  => $data['facingresosbrutos'],
               'facRetenciones'     => $data['facretenciones'],
               'facTotal'           => $data['factotal'],
               'facTipoComprobante' => $data['factipocomprobante'],
               'facEstado'          => $data['facestado']

            );

            if($this->db->insert('tbl_factura', $factura) == false) {
                return false;
            }

            $this->db->trans_complete();

            if ($this->db->trans_status() === false)
            {
                $this->registerError('Error al agregar factura');
                return false;
            }
            $this->db->trans_off();
        }
    }

    /**
     * Elimina la factura con id dato.
     *
     * @param   Array   Id de factura.
     * @return  bolean  True si se eliminaron correctamente los datos, False si no.
     */
    function deleteFacturas($data = null)
    {
        if($data == null)
        {
            return false;
        }
        else
        {
            $this->db->trans_start();

            if($this->db->delete('tbl_factura', $data, array('facId'=>$data['facid'])) == false) {
                return false;
            }

            $this->db->trans_complete();

            if ($this->db->trans_status() === false)
            {
                $this->registerError('Error al eliminar factura');
                return false;
            }
            $this->db->trans_off();
        }
    }

    /**
     * Trae todos los datos de la factura a editar.
     *
     * @param   string  Id de factura.
     * @return  Array   Campos de la tabla facturas.
     */
    function editFacturas($idFactura = null)
    {
        //dump($idFactura);
        if($idFactura == null)
        {
            return false;
        }
        else
        {
            $this->db->select('
                abmproveedores.provid,
                abmproveedores.provnombre,
                abmproveedores.provcuit,
                abmproveedores.provestado,
                tbl_factura.facId,
                tbl_factura.facNumero,
                tbl_factura.facFecha,
                tbl_factura.facTipo,
                tbl_factura.facProveedorId,
                tbl_factura.facSubtotal,
                tbl_factura.facIva,
                tbl_factura.facIva2,
                tbl_factura.facIngresosBrutos,
                tbl_factura.facTotal,
                tbl_factura.facRetenciones,
                tbl_factura.facTipoComprobante,
                tbl_factura.facEstado'
            );
            $this->db->from('abmproveedores');
            $this->db->join('tbl_factura', 'abmproveedores.provid = tbl_factura.facProveedorId', 'inner');
            $this->db->where('tbl_factura.facId', $idFactura);

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

    /**
     * Actualiza la factura.
     *
     * @param   Array   Id de factura.
     * @return  Array   Campos de la tabla facturas.
     */
    function updateFacturas($data = null)
    {
        //dump($data);
        if($data == null)
        {
            return false;
        }
        else
        {
            $datta = array(
                'facNumero' => $data['facnumero'],
                'facFecha' => $data['facfecha'],
                'facTipo' => $data['factipo'],
                'facProveedorId' => $data['facproveedorid'],
                'facSubtotal' => $data['facsubtotal'],
                'facIva' => $data['faciva'],
                'facIva2' => $data['faciva2'],
                'facIngresosBrutos' => $data['facingresosbrutos'],
                'facTotal' => $data['factotal'],
                'facRetenciones' => $data['facretenciones'],
                'facTipoComprobante' => $data['factipocomprobante'],
                'facEstado' => $data['facestado']
            );

            //dump($datta);
            if($this->db->update('tbl_factura', $datta, array('facId'=>$data['facid'])) == false) {
                return false;
            }
        }

        return true;
    }

}