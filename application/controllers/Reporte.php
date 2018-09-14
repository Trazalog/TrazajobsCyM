<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Reporte extends CI_Controller {

	function __construct(){

		parent::__construct();
		$this->load->model('Reportes');
	}

	public function index($permission){

		$data['permission'] = $permission;
		$this->load->view('reportes/view_', $data);
	}
	
	public function getReporte(){

        $data = $this->Reportes->getReportes($this->input->post());   
        //$response['html'] = $this->load->view('reportes/cheque_list', $data,TRUE);  
        print_r(json_encode($data));
        //echo json_encode($response);
        // echo "respuestas  ";
        // var_dump($data);
  }

}