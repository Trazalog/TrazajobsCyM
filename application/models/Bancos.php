<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');


class Bancos extends CI_Model
{
	function __construct()
	{
		parent::__construct();
	}
	
	function tarea_List(){

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
	
	function getpencil($id){

		$query= $this->db->get_where('abmbancos',array('bancid'=>$id));
		if($query->num_rows()>0){
            return $query->result();
        }
        else{
            return false;
        }
	}


  	function update_editar($data, $id){
  		
        $this->db->where('bancid', $id);
        $query = $this->db->update("abmbancos",$data);
        return $query;
    }	

    function agregar_Bancos($data){
                   
        $query = $this->db->insert("abmbancos",$data);
    	return $query;
        
    }
    function eliminacion($data)
    {
       	$this->db->where('bancid', $data);
		$query =$this->db->delete('abmbancos');
        return $query;
    }


}	

?>