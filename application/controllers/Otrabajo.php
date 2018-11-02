<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Otrabajo extends CI_Controller {

	function __construct()
        {
		parent::__construct();
		$this->load->model('Otrabajos');
	}

	public function index($permission){
		
		$data['list'] = $this->Otrabajos->otrabajos_List();
		$data['permission'] = $permission;
		$this->load->view('otrabajos/list_home', $data);
	}

	public function listOrden($permission){
		$data['list'] = $this->Otrabajos->otrabajos_List();
		$data['permission'] = $permission;
		$this->load->view('otrabajos/list', $data);
	}
	
	public function getotrabajo(){
		$data['data'] = $this->Otrabajos->getotrabajos($this->input->post());
		$response['html'] = $this->load->view('otrabajos/view_', $data, true);

		echo json_encode($response);
	}
	
	public function setotrabajo(){
		$data = $this->Otrabajos->setotrabajos($this->input->post());
		if($data  == false){
			echo json_encode(false);
		}else{
			echo json_encode(true);	
		}
	}

	public function getasigna()
		{

			$id=$_GET['id_orden'];

			$result = $this->Otrabajos->getasigna($id);
			if($result)
			{	
				$arre['datos']=$result;

				/*$equipos = $this->Comodatos->getequiposBycomodato($id);
				if($equipos)
				{
					$arre['equipos']=$equipos;
				}
				else $arre['equipos']=0;*/


				echo json_encode($arre);
			}
			else echo "nada";
		}

		//pedidos
		public function getorden()
		{

			$id=$_POST['id_orden'];

			$result = $this->Otrabajos->getorden($id);
			if($result)
			{	
				$arre['datos']=$result;

				/*$equipos = $this->Comodatos->getequiposBycomodato($id);
				if($equipos)
				{
					$arre['equipos']=$equipos;
				}
				else $arre['equipos']=0;*/


				echo json_encode($arre);
			}
			else echo "nada";
		}

		//pedidos a entregar x fecha
		public function getpedidos()
		{

			$id=$_GET['fechai'];

			$result = $this->Otrabajos->getpedidos($id);
			if($result)
			{	
				$arre['datos']=$result;

				echo json_encode($arre);
			}
			else echo "nada";
		}
		// boton agregar

		public function agregar(){//ajax
			if($_POST){
				$agregar = $this->Otrabajos->agregar($_POST);
				echo ($agregar===true)?"bien":"mal";
			}
		}

		public function guardar()
		{
			
			
			$id=$_POST['id_orden'];
			$datos=$_POST['data'];
			//print_r($datos['id_orden']); die();



			$result = $this->Otrabajos->update_guardar($id, $datos);
			
			if($result >0)
			{   echo 1;
				
			}
			else echo "error al insertar";
		}

				/*$agregar=$_POST['data'];
			$equipos=$_POST['idsequipos'];

			$result = $this->Comodatos->insert_comodato($agregar);
			
			if($result)
			{
				$ultimoId=$this->db->insert_id(); 
				
				$arre=array();
					if(count($equipos) > 0 )
							foreach ($equipos as $row ) 
							{   
								$datos2 = array(
								'comodatoid'=>$ultimoId, 
								'equipid'=>$row
								);	
									$this->Comodatos->insert_detacomodato($datos2);
							}

						echo 1;
				
			}
			else echo "error al insertar";
	*/

	public function getcliente(){
		//$this->load->model('Customers');
		$cliente = $this->Otrabajos->getcliente($this->input->post());
		if($cliente)
		{	
			$arre=array();
					foreach ($cliente as $row ) 
					{   
						$arre[]=$row;
					}
			echo json_encode($arre);
		}
		else echo "nada";
	}


	public function getusuario(){
		
		$usuario = $this->Otrabajos->getusuario();
		//echo json_encode($Customers);

		if($usuario)
		{	
			$arre=array();
	        foreach ($usuario as $row ) 
	        {   
	           $arre[]=$row;
	        }
			echo json_encode($arre);
		}
		else echo "nada";
	}

	

	public function traer_cli(){
		
		$usuario = $this->Otrabajos->traer_cli();
		//echo json_encode($Customers);

		if($usuario)
		{	
			$arre=array();
	        foreach ($usuario as $row ) 
	        {   
	           $arre[]=$row;
	        }
			echo json_encode($arre);
		}
		else echo "nada";
	}

	//traer grupo
	public function getgrupo(){
		
		//$id=$_POST['id_usuario'];
		
		$grupo = $this->Otrabajos->getgrupo();
		
		if($grupo)
		{	
			$arre=array();
	        foreach ($grupo as $row ) 
	        {   
	           $arre[]=$row;
	        }
			echo json_encode($arre);
		}
		else echo "nada";
	}

	

	public function getnum(){
		//$id=$_GET['id_orden'];
		$id=$_POST['id_orden'];		
		$grupo = $this->Otrabajos->getnums();
		
		echo json_encode($grupo);
	}


	//GUARDAR PEDIDO
	public function guardarorden()
	{
		
		$datos=$_POST['datos'];

		$result = $this->Otrabajos->insert_pedido($datos);
		
		$id=$this->db->insert_id();
		
		$result2 = $this->Otrabajos->get_pedido($id);

		echo json_encode($result2);

	}

	public function agregar_usuario()
	{

	    if($_POST)
	    {
	    	$datos=$_POST['datos'];

	     	$result = $this->Otrabajos->agregar_usuario($datos);
	      	//print_r($this->db->insert_id());
	      	if($result)
	      		echo $this->db->insert_id();
	      	else echo 0;
	    }
  	}

  	//traer proveedor
  	public function getproveedor(){
		
		$proveedor= $this->Otrabajos->getproveedor();	

		if($proveedor)
		{	
			$arre=array();
	        foreach ($proveedor as $row ) 
	        {   
	           $arre[]=$row;
	        }
			echo json_encode($arre);
		}
		else echo "nada";
	}

	//argegar un proveedor
	public function agregar_proveedor()
	{

	    if($_POST)
	    {
	    	$datos=$_POST['datos'];

	     	$result = $this->Otrabajos->agregar_proveedor($datos);
	      	//print_r($this->db->insert_id());
	      	if($result)
	      		echo $this->db->insert_id();
	      	else echo 0;
	    }
  	}

  	public function agregar_pedido()
	{

	    $datos=$_POST['data'];

	    $result = $this->Otrabajos->agregar_pedidos($datos);
	      	//print_r($this->db->insert_id());
	    if($result)
	      echo $this->db->insert_id();
	     else echo 0;
	   
  	}

  	public function getmostrar(){

    $idm=$_GET['idorden'];
    $dat= $this->Otrabajos->getdatos($idm); //traigo todos los datos
   
    echo json_encode($dat);
  	}

  	 public function baja_orden(){
  
    $idO=$_POST['idord'];
    $result = $this->Otrabajos->eliminacion($idO);
    print_r($result);
  
  }

  public function cambio_estado()
	{
	
		$idequipo=$_POST['idord'];
		$fecha = date("Y-m-d H:i:s");
		//$datos = array('estado'=>'E');

		//doy de baja
		$result = $this->Otrabajos->update_cambio($idequipo, $fecha);
		print_r($result);
	
	}


	public function getpencil()
	{

		$id=$_GET['idord'];
		//print_r($id);
		$result = $this->Otrabajos->getpencil($id);
		print_r(json_encode($result));

	}

	

	public function guardar_editar()
	{
	
		$idequipo=$_POST['idp'];
		$datos=$_POST['parametros'];
		//$datos = array('estado'=>'E');

		//doy de baja
		$result = $this->Otrabajos->update_edita($idequipo,$datos);
		print_r($result);
	
	}

	public function traer_sucursal(){
		
		$usuario = $this->Otrabajos->traer_sucursal();	

		if($usuario)
		{	
			$arre=array();
	        foreach ($usuario as $row ) 
	        {   
	           $arre[]=$row;
	        }
			echo json_encode($arre);
		}
		else echo "nada";
	}


}