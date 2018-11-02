<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');


class Otrabajos extends CI_Model
{
	function __construct()
	{
		parent::__construct();
	}
	
	function otrabajos_List(){

			$this->db->select('orden_trabajo.*, admcustomers.cliLastName,admcustomers.cliName, sisusers.usrName,sucursal.descripc');
			$this->db->from('orden_trabajo');
			$this->db->join('admcustomers', 'admcustomers.cliId = orden_trabajo.cliId');
			$this->db->join('sisusers', 'sisusers.usrId = orden_trabajo.id_usuario');
			$this->db->join('sucursal', 'sucursal.id_sucursal = orden_trabajo.id_sucursal');
			$this->db->group_by('orden_trabajo.id_orden');

			
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
	

	function getotrabajos($data = null){
		
		if($data == null){
			return false;
		}else{
			$action = $data['act'];
			$otid = $data['id'];
			$data = array();			
			$query= $this->db->get_where('orden_trabajo',array('id_orden'=>$otid));				

			if ($query->num_rows() != 0){				
				$f = $query->result_array();
				$data['ot'] = $f[0];
			} else {
				$ot = array();
				$ot['nro'] = '';
				$ot['fecha_inicio'] = '';
				$ot['fecha_fecha_entrega'] = '';
				$ot['descripcion'] = '';
				$ot['cliId'] = '';
				$ot['estado'] = '';
				$ot['id_usuario'] = '';
				$ot['id_sucursal'] = '';
				$data['ot'] = $ot;
			}

			//Readonly
			$readonly = false;
			if($action == 'Del' || $action == 'View'){
				$readonly = true;
			}
			$data['read'] = $readonly;
				$query= $this->db->get('sucursal');
			if ($query->num_rows() != 0)
			{
				$data['sucursal'] = $query->result_array();	
			}

				$query= $this->db->get('admcustomers');
			if ($query->num_rows() != 0)
			{
				$data['clientes'] = $query->result_array();	
			}		
			return $data;
		}
	}
	
	function setotrabajos($data = null)
	{
		if($data == null)
		{
			return false;
		}
		else
		{
			$id = $data['id'];
			$nro = $data['nro'];
			$fech = $data['fech'];
			$deta = $data['deta'];
			$sucid = $data['sucid'];
			$act = $data['act'];
			$cli=$data['cli'];
			$usu=1;
			$estado='C';

			$data = array(
					   'nro' => $nro,
					    'fecha_inicio' => $fech,
					    'descripcion' => $deta,
					    'id_sucursal' => $sucid,
						'cliId' => $cli,
						'id_usuario' => $usu,
						'id_usuario_a' => $usu,
						'id_usuario_e' => $usu,
						'estado' => $estado					   
					);

			switch($act)
			{
				case 'Add':
					//Agregar familia
					if($this->db->insert('orden_trabajo', $data) == false) {
						return false;
					}
					break;

				case 'Edit':
					//Actualizar nombre
					if($this->db->update('orden_trabajo', $data, array('id_orden'=>$id)) == false) {
						return false;
					}
					break;

				case 'Del':
					//Eliminar familia
					if($this->db->delete('orden_trabajo', $data, array('id_orden'=>$id)) == false) {
						return false;
					}
					
					break;
			}

			return true;

		}
	}

	function getasigna($id){
	    $sql="SELECT * 
	    	  FROM orden_trabajo
	    	  JOIN admcustomers ON admcustomers.cliId= orden_trabajo.cliId
	    	  WHERE id_orden=$id
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
	//PEDIDOS
	function getorden($id)
	{
	    $sql="SELECT * 
	    	  FROM orden_pedido
	    	  WHERE id_orden=$id
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

	//pediso a entregar x fecha
	function getpedidos($id)
	{
	    $sql="SELECT * 
	    	  FROM orden_trabajo
	    	  JOIN admcustomers ON admcustomers.cliId= orden_trabajo.cliId
	    	  WHERE id_orden=$id
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

	function getcliente($data = null){
		if($data == null)
		{
			return false;
		}
		else
		{
			
			$idcli = $data['idcliente'];

			//Datos del usuario
			$query= $this->db->get_where('admcustomers',array('cliId'=>$idcli));
			if($query->num_rows()>0){
                return $query->result();
            }
            else{
                return false;
            }
			
		}
		
	}

	//
	function getusuario(){

				$query= $this->db->get_where('sisusers');
				if($query->num_rows()>0){
					return $query->result();
				}
				else{
					return false;
				}
			

	}



	function traer_sucursal(){

				$query= $this->db->get_where('sucursal');
				if($query->num_rows()>0){
					return $query->result();
				}
				else{
					return false;
				}
			

	}

	function traer_cli(){

		$sql="SELECT * FROM admcustomers";
		
		$query= $this->db->query($sql);
		
		if( $query->num_rows() > 0)
		{
			return $query->result_array();	
		} 
		else {
			return false;
		}
	}

	function getnums($id){

		$query= "SELECT id_orden
				FROM orden_pedido
				WHERE nro_trabajo=$id";

		$query= $this->db->query($sql);

		if($query!=""){

			foreach ($query->result_array() as $row){		
				$data = $row['id_orden'];		
			}
			return $data;
		}else{
			return 0;
		}
	}

	function getproveedor(){

		$query= $this->db->get_where('abmproveedores',array('tipo' => 'T'));
		if($query->num_rows()>0){
			return $query->result();
		}
		else{
			return false;
		}
	}

	function agregar_usuario($data){
				
	$query = $this->db->insert("sisusers",$data);
	return $query;
	
}
	//nuevo
    //guardar_agregar
    
	function guardar_agregar($data){
                   
        $query = $this->db->insert("orden_trabajo",$data);
    	return $query;
    }

    function agregar_pedidos($data){
                   
        $query = $this->db->insert("orden_pedido",$data);
    	return $query;        
    }
        
    public function update_guardar($id, $datos){

        $this->db->where('id_orden', $id);
        $query = $this->db->update("orden_trabajo",$datos);
        return $query;
    }
		
		// seleccionar el grupo
		function getgrupo(){

			/*$query= "SELECT *
					 FROM sisusers 
					 JOIN sisgroups ON sisusers.grpId=sisgroups.grpId
					 WHERE usrId=$id";
			//$this->db->get_where('sisgroups');

            $result = $this->db->query($query);
			if($result->num_rows()>0){
                return $query->result_array();
            }
            else{
                return false;
            }*/
           $query= $this->db->get_where('sisgroups');
			if($query->num_rows()>0){
				 return $query->result();
            }
            else{
                return false;
            }
		
	}

	//insertar pedido 
	public function insert_pedido($data)
    {
        $query = $this->db->insert("orden_pedido",$data);
        return $query;
    }

   
	function get_pedido($id){

		$query= "SELECT *
				 FROM orden_pedido 
				 WHERE id_orden=$id";

        $result = $this->db->query($query);
		if($result->num_rows()>0){
            return $result->result_array();
        }
        else{
            return false;
        }
		
	}
	//agrega proveedor
	public function agregar_proveedor($data){
                   
        $query = $this->db->insert("proveedores",$data);
    	return $query;
        
    }

    function getdatos($m){

		$sql= "SELECT orden_pedido.*,abmproveedores.provnombre
		FROM orden_pedido
		jOIN abmproveedores ON abmproveedores.provid=orden_pedido.id_proveedor
		

		WHERE orden_pedido.id_trabajo= $m 
		 ";

		$query= $this->db->query($sql);

		if($query->num_rows()>0){
                return $query->result();
            }
            else{
                return false;
            }
		
	}

	  function eliminacion($data)
    {
       	$this->db->where('id_orden', $data);
		$query =$this->db->delete('orden_trabajo');
        return $query;
    }

     public function update_cambio($idequipo,$fecha)
    {
    	$consulta= "UPDATE orden_trabajo SET estado='T',
    										fecha_terminada='$fecha'
                               
				WHERE id_orden=$idequipo" ;

		$query= $this->db->query($consulta);
        
		return $query;

        /*$this->db->where('id_orden', $idequipo);
        $query = $this->db->update("orden_trabajo",$data);*/
        
    }

//nuevo
function update_edita($idequipo,$data)
    {
    	/*$consulta= "UPDATE orden_trabajo SET estado='E'
                               
				WHERE id_orden=$idequipo" ;

		$query= $this->db->query($consulta);
        
		return $query;*/

        $this->db->where('id_orden', $idequipo);
        $query = $this->db->update("orden_trabajo",$data);
        return $query;

    }
    function getpencil($id)
	{ //JOIN grupo ON grupo.id_grupo=equipos.id_grupo
	    $sql="SELECT orden_trabajo.nro, orden_trabajo.fecha_inicio,orden_trabajo.descripcion,orden_trabajo.cliId, orden_trabajo.estado, orden_trabajo.id_usuario, orden_trabajo.id_usuario_a, orden_trabajo.id_usuario, sucursal.descripc, admcustomers.cliName,admcustomers.cliLastName, sisusers.usrNick
	    	  FROM orden_trabajo
	    	  JOIN admcustomers ON admcustomers.cliId=orden_trabajo.cliId
	    	  JOIN sucursal ON sucursal.id_sucursal=orden_trabajo.id_sucursal
	    	  jOIN sisusers ON sisusers.usrId=orden_trabajo.id_usuario
	    	 
	    	  WHERE orden_trabajo.id_orden=$id
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



}	

?>