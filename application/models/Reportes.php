<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Reportes extends CI_Model
{
	function __construct()
	{
		parent::__construct();
	}

    function getReportes($data){

        $numCheque = $data['buscNumero'];
        $id_proveedor = $data['proveedor'];
        $id_banco = $data['banco'];
        $estado = $data['estado'];

        if ($data['desde_emit'] !== "") {
        //if ($data['desde_emit'] || $data['hasta_emit'] !== "")    
            $datDesde = $data['desde_emit'];
            $datDesde = explode('-', $datDesde);
            $desde_emit = $datDesde[2].'-'.$datDesde[1].'-'.$datDesde[0];

            $datHasta = $data['hasta_emit'];
            $datHasta = explode('-', $datHasta);
            $hasta_emit = $datHasta[2].'-'.$datHasta[1].'-'.$datHasta[0];
        } 

        if ($data['desde_ven'] !== "") {
        //if ($data['desde_ven'] || $data['hasta_ven'] !== "")    
            $datDesde = $data['desde_ven'];
            $datDesde = explode('-', $datDesde);
            $desde_ven = $datDesde[2].'-'.$datDesde[1].'-'.$datDesde[0];

            $datHasta = $data['hasta_ven'];
            $datHasta = explode('-', $datHasta);
            $hasta_ven = $datHasta[2].'-'.$datHasta[1].'-'.$datHasta[0];
        }
    
        $this->db->select('tbl_cheques.cheqnro,
                            tbl_cheques.cheqestado,
                            tbl_cheques.cheqfechae,
                            tbl_cheques.cheqvenc,
                            tbl_cheques.cheqmonto,
                            tbl_cheques.provid,
                            abmproveedores.provnombre,
                            abmbancos.bancdescrip,
                            tbl_estados.estado');
        $this->db->from('tbl_cheques');
        $this->db->join('abmproveedores', 'tbl_cheques.provid = abmproveedores.provid');
        $this->db->join('tbl_chequera', 'tbl_cheques.id_chequera = tbl_chequera.cheqId');
        $this->db->join('abmbancos', 'tbl_chequera.bancid = abmbancos.bancid');        
        $this->db->join('tbl_estados', 'tbl_cheques.cheqestado = tbl_estados.estadoid');
       
        if ($id_proveedor !== "") {            
            $this->db->where('abmproveedores.provid', $id_proveedor);
        }

        if ($id_banco !== "") {            
            $this->db->where('abmbancos.bancid', $id_banco);
        }

        if ($estado !== "0") {
            $this->db->where('tbl_cheques.cheqestado', $estado);
        }

        if ($numCheque !== "") {
            $this->db->where('tbl_cheques.cheqnro', $numCheque);
        }

        //emitidos entre fechas
        if ($data['desde_emit'] || $data['hasta_emit'] !== "") {
            $this->db->where('tbl_cheques.cheqfechae >=',$desde_emit);
            $this->db->where('tbl_cheques.cheqfechae <=',$hasta_emit);
        }  

        //vencidos entre fechas
        if ($data['desde_ven'] || $data['hasta_ven'] !== "") {
            $this->db->where('tbl_cheques.cheqvenc >=',$desde_ven);
            $this->db->where('tbl_cheques.cheqvenc <=',$hasta_ven);
        }  


        $query = $this->db->get(); 

        if ($query->num_rows()!=0)
        {
            return $query->result_array();  
        }
        else
        {   
            return array();
        }  
    }

}