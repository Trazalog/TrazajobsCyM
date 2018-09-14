<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');


class cobradors extends CI_Model
{
	function __construct()
	{
		parent::__construct();
	}
	
	function cobrador_List()
	{

		$query= $this->db->get('abmcobrador');
		
		if ($query->num_rows()!=0)
		{
			return $query->result_array();	
		}
		else
		{
			return false;
		}
	}
	
	function getcobrador($data = null)
	{
		if($data == null)
		{
			return false;
		}
		else
		{
			$action = $data['act'];
			$idcobrador = $data['id'];

			$data = array();

			//Datos de la familia
			$query= $this->db->get_where('abmcobrador',array('id_cobrador'=>$idcobrador));
			if ($query->num_rows() != 0)
			{

				$f = $query->result_array();
				$data['cobrador'] = $f[0];
			} else {
				$cobrador = array();
				$cobrador['nombre'] = '';
				$cobrador['direccion'] = '';
				$cobrador['mail'] = '';
				$cobrador['telefono'] = '';
				$data['cobrador'] = $cobrador;
			}

			//Readonly
			$readonly = false;
			if($action == 'Del' || $action == 'View'){
				$readonly = true;
			}
			$data['read'] = $readonly;

			return $data;
		}
	}
	
	function setcobrador($data = null)
	{
		if($data == null)
		{
			return false;
		}
		else
		{
			$id = $data['id'];
			$name = $data['name'];
			$dir = $data['dir'];
			$mail = $data['mai'];
			$tel = $data['tel'];
			
			$act = $data['act'];

			$data = array(
					   'nombre' => $name,
					    'direccion' => $dir
					   
					);

			switch($act)
			{
				case 'Add':
					//Agregar familia
					if($this->db->insert('abmcobrador', $data) == false) {
						return false;
					}
					break;

				case 'Edit':
					//Actualizar nombre
					if($this->db->update('abmcobrador', $data, array('id_cobrador'=>$id)) == false) {
						return false;
					}
					break;

				case 'Del':
					//Eliminar familia
					if($this->db->delete('abmcobrador', $data, array('id_cobrador'=>$id)) == false) {
						return false;
					}
					
					break;
			}

			return true;

		}
	}

}	

?>