<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');


class Ordeninsumos extends CI_Model
{
	function __construct()
	{
		parent::__construct();
	}
	
	public function index(){

		echo "cargo modelo OrdenInsumo";
	}

   function getcodigo(){

   /*$query= "SELECT articles.artId, articles.artDescription. tbl_lote.loteid
   	FROM articles 
   	JOIN tbl_lote ON tbl_lote.codigo=articles.artBarCode";
   	$query= $this->db->query($sql);

	//$query= $this->db->get_where('articles');
		if($query->num_rows()>0){
	    return $query->result();
	    }
	    else{
	    return false;
	    }*/
   	


	$sql="SELECT articles.artId, tbl_lote.loteid,articles.artBarCode, articles.artDescription
	FROM articles
	JOIN tbl_lote ON tbl_lote.artId= articles.artId AND tbl_lote.lotestado='AC' 
	WHERE tbl_lote.artId=articles.artId
	";
	$query= $this->db->query($sql);

	//$query= $this->db->get_where('articles');
		if($query->num_rows()>0){
	    return $query->result();
	    }
	    else{
	    return false;
	    }
	    
	}
	


	function getdescrip($data = null){
		if($data == null)
		{
			return false;
		}
		else
		{
			
			$id = $data['artId'];

			//Datos del usuario
			$query= $this->db->get_where('articles',array('artId'=>$id));
			if($query->num_rows()>0){
                return $query->result();
            }
            else{
                return false;
            }
			
		}
	}

	function getsolicitante(){

		$query= $this->db->get_where('solicitud_reparacion');
			if($query->num_rows()>0){
	   	 	return $query->result();
	    }
	    else{
	    	return false;
	    }
	}

	 public function insert_orden($data)
    {
        $query = $this->db->insert("orden_insumos",$data);
        return $query;
    }

    public function insert_detaordeninsumo($data2)
    {
        $query = $this->db->insert("deta_ordeninsumos",$data2);
        return $query;
    }

    function getdeposito($data = null){

    	

	    if($data == null)
		{
			return false;
		}
		else
		{
			
			$id= $data['artId'];

			
			$sql= "SELECT articles.artId, abmdeposito.depositoId, abmdeposito.depositodescrip
			FROM articles
			JOIN tbl_lote ON tbl_lote.artId=articles.artId
			JOIN abmdeposito ON abmdeposito.depositoId=tbl_lote.depositoid
			WHERE tbl_lote.artId=$id"; //
			$query= $this->db->query($sql);
			if($query->num_rows()>0){
                return $query->result();
            }
            else{
                return false;
            }

			
			
		}
	}


 function getlotecant($id){
	$sql="SELECT  tbl_lote.cantidad
	FROM tbl_lote
	WHERE tbl_lote.depositoid=$id AND tbl_lote.lotestado='AC'
	";
	$query= $this->db->query($sql);

	/*if($query->num_rows()>0){
	   	 	return $query->result();
	    }
	    else{
	    	return false;
	    }*/

	$i=0;
               foreach ($query->result_array() as $row)
               {   
                   
                   $datos[$i]= $row['cantidad'];
                   $i++;
               }

		
	    return $datos;
	    
	}


    function lote($val,$co,$d){

    	if ($val!=0) {
    	 	$cant= $this->lotecantidad($val); //obtengo la cantidad segun el lote
    	 	print_r($cant);
    	}
    	if ($cant >=$co) {
    		$res=$cant - $co;
    		
		}	
		else {
			echo  "No hay insumos suficientes"; 
			//$res=$co - $cant;
			
		}	

		$datos3 = array(
					        			
			'cantidad'=>$res
		);

						        	
		print_r($datos3);
					        	
		$this->update_tbllote($val,$datos3);

	
	}

	function lotecantidad($v){

		$sql="SELECT  tbl_lote.cantidad
				FROM tbl_lote
				WHERE tbl_lote.loteid=$v";
		$query= $this->db->query($sql);

	  	foreach ($query->result() as $row){   
                   
            $datos= $row->cantidad;
                 
        }

		
	    return $datos;

	}


    public function update_tbllote($id,$data3)
    {
        $this->db->where('loteid', $id);
        $query = $this->db->update("tbl_lote",$data3);
        return $query;
    }

    public function alerta($codigo,$de)
    {
        $sql="SELECT  tbl_lote.cantidad
				FROM tbl_lote
				WHERE tbl_lote.artId=$codigo AND tbl_lote.depositoid=$de
				";

		$query= $this->db->query($sql);

	  	foreach ($query->result() as $row){   
                   
            $datos= $row->cantidad;
                 
        }

		
	    return $datos;
    }



}
?>