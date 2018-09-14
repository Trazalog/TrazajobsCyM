<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');


class Liquidaciones extends CI_Model
{
	function __construct()
	{
		parent::__construct();
	}
	
	function getList(){

		$sql= "SELECT * FROM tbl_liquida
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
    
    function guardardepositos($data){
                   
        $query = $this->db->insert("tbl_deposito",$data);
    	return $query;
        
    }
    
    function guardarLiquidas($data){
                   
        $query = $this->db->insert("tbl_liquida",$data);
    	return $query;
        
    }
    
     function agregar($data){
                   
        $query = $this->db->insert("tbl_liquida",$data);
    	return $query;
        
    }
    
     function insert_detaliq($data){
                   
        $query = $this->db->insert("tbl_detaliquida",$data);
    	return $query;
        
    }
    function eliminacion($data)
    {
       	$this->db->where('liquidaid', $data);
		$query =$this->db->delete('tbl_liquida');
        return $query;
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
	
	function getliquids(){

		$query= $this->db->get('tbl_liquida');
		
		if ($query->num_rows()!=0)
		{
			return $query->result_array();	
		}
		else
		{
			return false;
		}
	}

	function getconceptos(){

		$query= $this->db->get('tbl_concepto');
		
		if ($query->num_rows()!=0)
		{
			return $query->result_array();	
		}
		else
		{
			return false;
		}
	}
	
	function traerdescriptarjet($id){

		$sql= "SELECT tarjetdescrip FROM abmtarjetas
				
				WHERE tarjetid=$id ";

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
	
	function getcupons($tar){

		$sql= "SELECT * FROM tbl_cupon
				
				WHERE cuponestado='C' AND tarjetaid=$tar ";
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
	
	function getliquidas( $datos){

		$sql= "SELECT * FROM tbl_liquida
				JOIN abmtarjetas ON abmtarjetas.tarjetid=tbl_liquida.tarjetaid
				WHERE tbl_liquida.tarjetaid=$datos";
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
	
	function getdatoscupons( $datos){

		$sql= "SELECT * FROM tbl_cupon
				
				WHERE cuponid=$datos AND cuponestado='C' ";
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

	
	function getdatostra( $datos){

		$sql= "SELECT * FROM tbl_liquida
				JOIN abmtarjetas ON abmtarjetas.tarjetid=tbl_liquida.tarjetaid
				JOIN tbl_deposito ON tbl_deposito.liquidaid=tbl_liquida.liquidaid
				JOIN abmbancos ON abmbancos.bancid=tbl_deposito.bancid
				WHERE tbl_liquida.liquidaid=$datos";
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
	
	function gestdescrptliq( $datos){

		$sql= "SELECT * FROM tbl_liquida
				JOIN abmtarjetas ON abmtarjetas.tarjetid=tbl_liquida.tarjetaid
				
				WHERE tbl_liquida.liquidaid=$datos";
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
	

	function getdetaliquida($id){
	    
	    $sql= "SELECT *
	    		FROM tbl_detaliquida
    			JOIN tbl_cupon ON tbl_cupon.cuponid = tbl_detaliquida.cuponid
				JOIN tbl_liquida ON tbl_liquida.liquidaid = tbl_detaliquida.liquidaid
				
				WHERE tbl_detaliquida.liquidaid=$id AND tbl_cupon.cuponestado='L'
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

		function getmontoliquida($id){
	    
	    $sql= "SELECT SUM(cuponmonto) AS suma
	    		FROM tbl_cupon
    			JOIN tbl_detaliquida ON tbl_detaliquida.cuponid = tbl_cupon.cuponid  
			
				
				WHERE tbl_detaliquida.liquidaid=$id AND tbl_cupon.cuponestado='L'
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

/*function eliminacion($data){
    $this->db->where('liquidaid', $data);
	$query =$this->db->delete('tbl_liquida');
    return $query;
}*/
function getcomodatoConsult($id){
	    
	    $sql="SELECT * 
	    	  FROM tbl_liquida
	    	  JOIN abmtarjetas ON abmtarjetas.tarjetid=tbl_liquida.tarjetaid
	    	 	    	  
	    	  WHERE tbl_liquida.liquidaid=$id
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

	function getequipos($id){
	    
	    $sql= "SELECT  * 
	    		FROM tbl_detaliquida
    			JOIN tbl_liquida ON tbl_liquida.liquidaid = tbl_detaliquida.liquidaid
				JOIN tbl_cupon ON tbl_cupon.cuponid = tbl_detaliquida.cuponid
			
				WHERE tbl_detaliquida.liquidaid=$id
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
	
	function gettotal($id){
	    
	    $sql= "SELECT  SUM(cuponmonto) as suma
	    		FROM tbl_detaliquida
	    		JOIN tbl_liquida ON tbl_liquida.liquidaid = tbl_detaliquida.liquidaid
    			JOIN tbl_cupon ON tbl_cupon.cuponid = tbl_detaliquida.cuponid
			
				WHERE tbl_detaliquida.liquidaid=$id
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


	function getprintliquida($id){

//JOIN abmtarjetas ON abmtarjetas.tarjetid=tbl_liquida.tarjetaid
	    $sql="SELECT * 
	    	  FROM tbl_liquida
	    	  JOIN abmtarjetas ON abmtarjetas.tarjetid=tbl_liquida.tarjetaid
	    	  
	    	
	    	  WHERE tbl_liquida.liquidaid=$id
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

	
	function getdetaliqprint($id){
	    
	    $sql= "SELECT * 
	    	  FROM tbl_detaliquida
	    	  
	    	  JOIN tbl_cupon ON tbl_cupon.cuponid=tbl_detaliquida.cuponid
	    	  WHERE tbl_detaliquida.liquidaid=$id
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

    function update_cupon($i, $datos2){
//echo "estoy en el modelo ";
//echo $i;
    /*	$sql="UPDATE tbl_cupon
				SET cuponestado = 'L'				
				WHERE cuponid= $i
				";
		$query= $this->db->query($sql);*/

			
		$this->db->where('cuponid', $i);
        $query = $this->db->update("tbl_cupon",$datos2);
                 
        
        return $query;

		//if( $query->num_rows() > 0){

			//$query->result_array();	
			//return 1;
			
			//var_dump(1);
			//return 1;

		//} 

	//	else {

	//		return 0;
	//	}

       
    }


	function ActualizoTablas( $datos){

		$sql= "SELECT * FROM tbl_cupon
				
				WHERE cuponid=$datos AND cuponestado='L' ";

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
	
	function Actualizototalcupos($ta){

		$sql= "SELECT SUM(cuponmonto) as totalcup
				FROM tbl_cupon 
				WHERE tarjetaid=$ta AND cuponestado='L' ";

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

	function agregar_retenciones($data) {

        $query = $this->db->insert("tbl_retencion",$data);
        return $query;
    }

	function actualizarTotals($i){

		 $sql= "SELECT  SUM(monto) as total
	    		FROM tbl_retencion
	    		WHERE id_retencion=$i
    			
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

	
	function guardaretenciones($datos2){
                   
        $query = $this->db->insert("tbl_retencion",$datos2);
    	return $query;      
    }

    function traeretencion($liq, $acu){

       $sql= "SELECT  SUM(retencion + $acu) as totalr
	    		FROM tbl_liquida
	    		WHERE liquidaid=$liq
    			
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
    
  	function AcualizarLiquidacion($liq, $datos2){
 
    	$this->db->where('liquidaid', $liq);
        $query = $this->db->update("tbl_liquida",$datos2);
      
    } 




}	

?>