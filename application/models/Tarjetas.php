<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');


class Tarjetas extends CI_Model
{
	function __construct()
	{
		parent::__construct();
	}
	
	function tarea_List(){

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
	
	function getpencil($id){

		$query= $this->db->get_where('abmtarjetas',array('tarjetid'=>$id));
		if($query->num_rows()>0){
            return $query->result();
        }
        else{
            return false;
        }
	}


  	function update_editar($data, $id){
  		
        $this->db->where('tarjetid', $id);
        $query = $this->db->update("abmtarjetas",$data);
        return $query;
    }	

    function agregar_tarjetas($data){
                   
        $query = $this->db->insert("abmtarjetas",$data);
    	return $query;
        
    }
    function eliminacion($data)
    {
       	$this->db->where('tarjetid', $data);
		$query =$this->db->delete('abmtarjetas');
        return $query;
    }


}	

?>