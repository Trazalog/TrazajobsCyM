<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');


class Cheqpropios extends CI_Model
{
	function __construct()
	{
		parent::__construct();
	}
	
	function tarea_List(){

		$sql= "SELECT tbl_chequera.cheqId, tbl_chequera.cheqinicio,tbl_chequera.cheqcantidad,tbl_chequera.bancid , tbl_cheques.cheqid, tbl_cheques.cheqnro, tbl_cheques.cheqvenc, tbl_cheques.cheqmonto, tbl_cheques.cheqestado , tbl_cheques.id_chequera, tbl_cheques.cheqfechae, abmproveedores.provid, abmproveedores.provnombre AS proveedor 
		FROM tbl_chequera 
		JOIN tbl_cheques ON tbl_cheques.id_chequera=tbl_chequera.cheqId
		JOIN abmproveedores ON abmproveedores.provid= tbl_cheques.provid";


		
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

		$sql= "SELECT tbl_cheques.cheqnro, tbl_cheques.cheqvenc, tbl_cheques.provid, tbl_cheques.cheqmonto, tbl_cheques.cheqestado, tbl_cheques.id_chequera, tbl_cheques.cheqfechae, abmproveedores.provid, abmproveedores.provnombre, tbl_chequera.cheqId, tbl_chequera.cheqinicio
		FROM tbl_cheques
		jOIN tbl_chequera ON tbl_chequera.cheqId=tbl_cheques.id_chequera
		jOIN abmproveedores ON abmproveedores.provid= tbl_cheques.provid

		WHERE tbl_cheques.cheqid=$id";

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
	
	function pagarCheques($cheqid, $datos){	

		$this->db->where('cheqid', $cheqid);
        $query = $this->db->update("tbl_cheques",$datos);
		return $query;
	}

	function getdatos($m){

		$sql= "SELECT tbl_cheques.cheqnro, tbl_cheques.cheqvenc, tbl_cheques.provid, tbl_cheques.cheqmonto, tbl_cheques.cheqestado, tbl_cheques.id_chequera, tbl_cheques.cheqfechae, abmproveedores.provid, abmproveedores.provnombre, tbl_chequera.cheqId, tbl_chequera.cheqinicio
		FROM tbl_cheques
		jOIN tbl_chequera ON tbl_chequera.cheqId=tbl_cheques.id_chequera
		jOIN abmproveedores ON abmproveedores.provid= tbl_cheques.provid

		WHERE MONTH(tbl_cheques.cheqvenc)= $m AND tbl_cheques.cheqestado = 1

		ORDER BY MONTH(tbl_cheques.cheqvenc) ";

		//ORDER BY MONTH(tbl_cheques.cheqfechae) ";

		$query= $this->db->query($sql);

		if($query->num_rows()>0){
            return $query->result();
        }
        else{
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

		$this->db->where('cheqid', $id);
		$query = $this->db->update("tbl_cheques",$data);
		return $query;
	}	

	function agregar_cheques($data){

		$query= $this->db->insert("tbl_cheques",$data);
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
    	$this->db->where('cheqid', $data);
    	$query =$this->db->delete('tbl_cheques');
    	return $query;
    }

     function traermes() {
       
        // $this->db->select('cheqid, 
        // 				   YEAR(cheqfechae) AS an,
        // 				   MONTH(cheqfechae) AS mes,
        // 				   sum(cheqmonto) AS monto ');
         $this->db->select('cheqid, 
        				   YEAR(cheqvenc) AS an,
        				   MONTH(cheqvenc) AS mes,
        				   sum(cheqmonto) AS monto ');

        $this->db->from('tbl_cheques');
         $this->db->group_by('MONTH(cheqvenc)');
         
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

	function getNumCheques(){
		
		$this->db->select('tbl_cheques.cheqnro,                            
                            tbl_cheques.cheqid');
        $this->db->from('tbl_cheques');
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

?>