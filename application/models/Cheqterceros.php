<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');


class Cheqterceros extends CI_Model
{
	function __construct()
	{
		parent::__construct();
	}
	
	function list_cheques(){

		$sql= "SELECT tbl_chequesterceros.*, abmbancos.bancid, abmbancos.bancdescrip, admcustomers.cliId, admcustomers.cliName, admcustomers.cliLastName 
		FROM tbl_chequesterceros 
		JOIN abmbancos ON abmbancos.bancid=tbl_chequesterceros.id_banco
		JOIN admcustomers ON admcustomers.cliId=tbl_chequesterceros.cliente
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
	
	function getpencil($id){

		$sql= "SELECT tbl_chequesterceros.*, abmbancos.bancid, abmbancos.bancdescrip, admcustomers.cliId, admcustomers.cliName, admcustomers.cliLastName 
		FROM tbl_chequesterceros 
		JOIN abmbancos ON abmbancos.bancid=tbl_chequesterceros.id_banco
		JOIN tbl_estados ON tbl_estados.estadoid=tbl_chequesterceros.estado
		JOIN admcustomers ON admcustomers.cliId=tbl_chequesterceros.cliente

		WHERE tbl_chequesterceros.id_che=$id";

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

	

	function getpropio($id){

		$sql= "SELECT tbl_chequera.cheqinicio, tbl_chequera.cheqcantidad, tbl_chequera.cont
		FROM tbl_chequera
		WHERE tbl_chequera.cheqid=$id
		";

		$query= $this->db->query($sql);
		
        foreach ($query->result_array() as $row)
		{		
			
		        $data['cheqinicio'] = $row['cheqinicio'];
		        $data['cheqcantidad'] = $row['cheqcantidad'];
		        $data['cont'] = $row['cont'];
		  
		}

		return $data;    
		       
	}

	function getproveedors(){

		$query= $this->db->get('abmproveedores');
		
		if ($query->num_rows()!=0)
		{
			return $query->result_array();	
		}
		else
		{
			return false;
		}
	}
	

	function getnumeros(){

		$sql= "SELECT *
		FROM tbl_chequera
		";

		$query= $this->db->query($sql);

		//$query= $this->db->get('tbl_chequera');
		
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
  		
        $this->db->where('id_che', $id);
        $query = $this->db->update("tbl_chequesterceros",$data);
        return $query;
    }	

    function agregar_cheques($data){
         
         $query= $this->db->insert("tbl_chequesterceros",$data);
    	return $query;
        
    }


  	function co_cheques($nu){

         $sql="SELECT cont FROM tbl_chequera
         WHERE cheqId=$nu";
         $query= $this->db->query($sql);
         foreach ($query->result() as $row){   
                   
            $datos= $row->cont;
                 
        }
		
	    return $datos;
             
    }

    function cantidad($nu){

        $sql="SELECT cheqcantidad FROM tbl_chequera
         WHERE cheqId=$nu";
         $query= $this->db->query($sql);
         foreach ($query->result() as $row){   
                   
        $datos= $row->cheqcantidad;
                 
        }
	
	    return $datos;  
    }
   
    
   function update_tblcheq($id,$co){
    	$sql=" UPDATE tbl_chequera
				SET cont = $co
				WHERE cheqId=$id";
		$query= $this->db->query($sql);


        /*$this->db->where('cheqId', $id);
        $query = $this->db->update("tbl_chequera",$co);*/
        return $query;
    }

    function eliminacion($data)
    {
       	$this->db->where('id_che', $data);
		$query =$this->db->delete('tbl_chequesterceros');
        return $query;
    }

    function traer_cli(){

        $sql="SELECT * 
	    	  FROM admcustomers ";
	    
	    $query= $this->db->query($sql);
	    
	    if( $query->num_rows() > 0)
	    {
	      return $query->result_array();	
	    } 
	    else {
	      return false;
		} 
	}


}	

?>