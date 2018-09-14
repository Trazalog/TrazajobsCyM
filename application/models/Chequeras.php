<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');


class Chequeras extends CI_Model
{
	function __construct()
	{
		parent::__construct();
	}
	
	function tarea_List(){

		$sql= "SELECT tbl_chequera.cheqId, tbl_chequera.cheqinicio,tbl_chequera.cheqcantidad,tbl_chequera.bancid ,abmbancos.bancdescrip AS banco 
		FROM tbl_chequera JOIN abmbancos ON abmbancos.bancid=tbl_chequera.bancid";


		//$this->db->get('tbl_chequera');
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
	
	function getpencil($id){

		$sql= "SELECT tbl_chequera.cheqId, tbl_chequera.cheqinicio, tbl_chequera.cheqcantidad, tbl_chequera.bancid, abmbancos.bancid, abmbancos.bancdescrip AS de
		FROM tbl_chequera
		jOIN abmbancos ON abmbancos.bancid=tbl_chequera.bancid
		WHERE tbl_chequera.cheqId=$id";

		$query= $this->db->query($sql);

		
		if ($query->num_rows()!=0)
		{
			return $query->result_array();	
		}
		else
		{
			return false;
		}

		/*$this->db->get_where('tbl_chequera',array('cheqId'=>$id));
		if($query->num_rows()>0){
            return $query->result();
        }
        else{
            return false;
        }*/
	}

	function getbancos(){

		$query= $this->db->get('abmbancos');
		
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
  		
        $this->db->where('cheqId', $id);
        $query = $this->db->update("tbl_chequera",$data);
        return $query;
    }	

    function agregar_chequeras($data){
                   
        $query = $this->db->insert("tbl_chequera",$data);
    	return $query;
        
    }
    function eliminacion($data)
    {
       	$this->db->where('cheqId', $data);
		$query =$this->db->delete('tbl_chequera');
        return $query;
    }


}	

?>