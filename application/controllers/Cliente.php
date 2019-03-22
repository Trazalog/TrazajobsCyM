<?php defined('BASEPATH') OR exit('No direct script access allowed');

class Cliente extends CI_Controller {
  function __construct()
        {
    parent::__construct();
    $this->load->model('Clientes');
  }

  public function index($permission) {
    
    $data['list'] = $this->Clientes->tarea_List();
    $data['permission'] = $permission;
    $this->load->view('clientes/list', $data);
  }
  
  
  public function getpencil(){

    $id=$_GET['idord'];
    $result = $this->Clientes->getpencil($id);
    echo json_encode($result);

  }

  public function update_editar(){

    $datos=$_POST['parametros'];
    $id=$_POST['ed']; 
    // var_dump($datos);
    // var_dump($id);
    $result = $this->Clientes->update_editar($datos,$id);
    echo json_encode($result);
    //return true;
  }

  public function agregar_cliente(){

      if($_POST){
        $datos=$_POST['parametros'];
        $result = $this->Clientes->agregar_clientes($datos);          
        if($result)
          echo $this->db->insert_id();
        else echo 0;
      }
  }

  public function getzona(){

    $empresa = $this->Clientes->getzonas();
    if($empresa) { 
      $arre=array();
      foreach ($empresa as $row ) {   
        $arre[]=$row;
      }
        echo json_encode($arre);
    }
    else echo "nada";

  }

  public function BajaCliente(){
  
    $idcli=$_POST['edelim'];    
    $datos = array('estado'=>"AN");
    $result = $this->Clientes->update_cliente($datos, $idcli);
    print_r($result);
  
  }


  
  
}
