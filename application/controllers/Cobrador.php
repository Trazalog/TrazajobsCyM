<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class cobrador extends CI_Controller {
	function __construct()
        {
		parent::__construct();
		$this->load->model('cobradors');
	}

	public function index($permission)
	{
		$data['list'] = $this->cobradors->cobrador_List();
		$data['permission'] = $permission;
		$this->load->view('cobradores/list', $data);
	}
	
	public function getCobrador(){
		$data['data'] = $this->cobradors->getcobrador($this->input->post());
		$response['html'] = $this->load->view('cobradores/view_', $data, true);

		echo json_encode($response);
	}
	
	public function setCobrador(){
		$data = $this->cobradors->setcobrador($this->input->post());
		if($data  == false)
		{
			echo json_encode(false);
		}
		else
		{
			echo json_encode(true);	
		}
	}
	
	

	
	
}
