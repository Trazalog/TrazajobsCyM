<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');


class Clientes extends CI_Model
{
	function __construct()
	{
		parent::__construct();
	}
	
	function tarea_List(){

		$query= $this->db->get('admcustomers');
		
		if ($query->num_rows()!=0)
		{
			return $query->result_array();	
		}
		else
		{
			return false;
		}
	}
	
    function agregar_clientes($data){
                   
        $query = $this->db->insert("admcustomers",$data);
    	return $query;        
    }
   
	function getzonas(){

		$query= $this->db->get_where('confzone');
		if($query->num_rows()>0){
		    return $query->result();
		}
		else{
		    return false;
		    }			
	}

	function getpencil($id){
		//$query= $this->db->get_where('admcustomers',array('cliId'=>$id));
	    $sql="SELECT *
	    	  FROM admcustomers
	    	  JOIN confzone ON confzone.zonaId=admcustomers.zonaId
	    		  

	    	  WHERE admcustomers.cliId=$id
	    	  ";  
	    $query= $this->db->query($sql);  
	    if( $query->num_rows() > 0)
	    {
	      return $query->result_array();	
	    } 
	    else {
	      return 0;
	    	}
	}

	function update_editar($data, $id){

        $this->db->where('cliId', $id);
        $query = $this->db->update("admcustomers",$data);
        return $query;        
    }

    function update_cliente($data, $idord){
    	
        $this->db->where('cliId', $idord);
        $query = $this->db->update("admcustomers",$data);
        return $query;
    }

}	

?>