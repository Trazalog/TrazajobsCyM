<?php defined('BASEPATH') OR exit('No direct script access allowed');

class Envio extends CI_Controller {

	function __construct()
        {
		parent::__construct();
		$this->load->model('Envios');
	}

	public function index($permission)
	{
		$data['list'] = $this->Envios->envios_List();
		$data['permission'] = $permission;
		$this->load->view('envio/list', $data);
	}
	
	public function entrega()
	{
	
		$idequipo=$_POST['id_orden'];
		$fecha = date("Y-m-d");
		//$datos = array('estado'=>'E');

		//doy de baja
		$result = $this->Envios->entregas($idequipo, $fecha);
		print_r($result);
	
	}

	

}