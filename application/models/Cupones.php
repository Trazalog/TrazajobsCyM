<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');


class Cupones extends CI_Model
{
	function __construct()
	{
		parent::__construct();
	}
	
	function tarea_List(){


		$sql= "SELECT *
		FROM tbl_cupon 
		JOIN abmtarjetas ON abmtarjetas.tarjetid=tbl_cupon.tarjetaid
		";

		$query= $this->db->query($sql);

		
		
		if ($query->num_rows()!=0)
		{
			return $query->result_array();	
		}
		else
		{
			return false;
		}
	}
	
	function gettarjetas(){

		$query= $this->db->get('abmtarjetas');
		
		if ($query->num_rows()!=0)
		{
			return $query->result_array();	
		}
		else
		{
			return false;
		}
	}
	
	function getpencils($id){

		
        $sql= "SELECT tbl_cupon.cuponfech, tbl_cupon.cuponnro, tbl_cupon.cuponlote, tbl_cupon.cuponfactura, tbl_cupon.cuponcliente, tbl_cupon.cuponmonto, tbl_cupon.tarjetaid, abmtarjetas.tarjetdescrip
		FROM tbl_cupon
		jOIN abmtarjetas ON abmtarjetas.tarjetid=tbl_cupon.tarjetaid
		
		WHERE tbl_cupon.cuponid=$id";

		$query= $this->db->query($sql);

		
		if ($query->num_rows()!=0)
		{
			return $query->result_array();	
		}
		else
		{
			return false;
		}
	}


  	function update_editar($data, $id){
  		
        $this->db->where('cuponid', $id);
        $query = $this->db->update("tbl_cupon",$data);
        return $query;
    }	

    function agregar_cupones($data){
                   
        $query = $this->db->insert("tbl_cupon",$data);
    	return $query;
        
    }
    function eliminacion($data)
    {
       	$this->db->where('cuponid', $data);
		$query =$this->db->delete('tbl_cupon');
        return $query;
    }


}	

?>