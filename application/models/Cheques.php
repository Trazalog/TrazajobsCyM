<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');


class cheques extends CI_Model
{
	function __construct()
	{
		parent::__construct();
	}
	
	function cheques_List()
	{

		$query= $this->db->get('cheques');
		
		if ($query->num_rows()!=0)
		{
			return $query->result_array();	
		}
		else
		{
			return false;
		}
	}
	
	function getcheques($data = null)
	{
		if($data == null)
		{
			return false;
		}
		else
		{
			$action = $data['act'];
			$idrep = $data['id'];

			$data = array();

			//Datos de la familia
			$query= $this->db->get_where('cheques',array('cheqid'=>$idrep));
			if ($query->num_rows() != 0)
			{

				$f = $query->result_array();
				$data['cheques'] = $f[0];
			} else {
				$cheques = array();
				$cheques['cheqnro'] = '';
				$cheques['cheqvenc'] = '';
				$cheques['provid'] = '';
				$cheques['bancid'] = '';
				$cheques['cheqmonto'] = '';
				$cheques['cheqestado'] = '';
				$data['cheques'] = $cheques;
			}

			//Readonly
			$readonly = false;
			if($action == 'Del' || $action == 'View'){
				$readonly = true;
			}
			$data['read'] = $readonly;

			$query= $this->db->get('abmproveedores');
			if ($query->num_rows() != 0)
			{
				$data['proveedores'] = $query->result_array();	
			}
			$query= $this->db->get('abmbancos');
			if ($query->num_rows() != 0)
			{
				$data['bancos'] = $query->result_array();	
			}

			return $data;
		}
	}
	
	function setproveedores($data = null)
	{
		if($data == null)
		{
			return false;
		}
		else
		{
			$id = $data['id'];
			$name = $data['name'];
			$cuit = $data['cuit'];
			$dir = $data['dir'];
			$mail = $data['mai'];
			$tel = $data['tel'];
			
			$est = $data['est'];
			
			$act = $data['act'];

			$data = array(
					   'provnombre' => $name,
					   'provcuit' => $cuit,
					   'provdomicilio' => $dir,
					   'provmail' => $mail,
					   'provtelefono' => $tel,
					   
					   'provestado' => $est



					  
					   
					);

			switch($act)
			{
				case 'Add':
					//Agregar familia
					if($this->db->insert('abmproveedores', $data) == false) {
						return false;
					}
					break;

				case 'Edit':
					//Actualizar nombre
					if($this->db->update('abmproveedores', $data, array('provid'=>$id)) == false) {
						return false;
					}
					break;

				case 'Del':
					//Eliminar familia
					if($this->db->delete('abmproveedores', $data, array('socid'=>$id)) == false) {
						return false;
					}
					
					break;
			}

			return true;

		}
	}

}	

?>