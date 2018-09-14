<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class cheque extends CI_Controller {
	function __construct()
        {
		parent::__construct();
		$this->load->model('cheques');
	}

	public function index($permission)
	{
		$data['list'] = $this->cheques->cheques_List();
		$data['permission'] = $permission;
		$this->load->view('cheques/list', $data);
	}
	
	public function getcheque(){
		$data['data'] = $this->cheques->getcheques($this->input->post());
		$response['html'] = $this->load->view('cheques/view_', $data, true);

		echo json_encode($response);
	}
	
	public function setcheque(){
		$data = $this->proveedores->setproveedores($this->input->post());
		if($data  == false)
		{
			echo json_encode(false);
		}
		else
		{
			echo json_encode(true);	
		}
	}
	

	function vencimientos($data = null){
		if($data == null)
		{
			return false;
		}
		else
		{
			$month = $data['month'] + 1;
			$this->db->select('admvisits.*, admcustomers.cliName, admcustomers.cliLastName, admcustomers.cliColor');
			$this->db->from('admvisits');
			$this->db->join('admcustomers', 'admcustomers.cliId = admvisits.cliId');
			$this->db->where('admvisits.vstStatus','PN'); // Set Filter		
			$this->db->where('month(admvisits.vstDate)', $month);
			$this->db->or_where('month(admvisits.vstDate) = '.$data['month'].' and admvisits.vstStatus = \'PN\'' );
			$this->db->or_where('month(admvisits.vstDate) = '.($month+1).' and admvisits.vstStatus = \'PN\'');

			$query= $this->db->get();
			
			if ($query->num_rows()!=0)
			{
				return $query->result_array();	
			}
			else
			{
				return false;
			}
		}
	}
	

	
	
}
