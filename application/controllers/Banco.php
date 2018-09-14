<?php defined('BASEPATH') OR exit('No direct script access allowed');

class Banco extends CI_Controller {
  function __construct()
        {
    parent::__construct();
    $this->load->model('Bancos');
  }

  public function index($permission)
  {
    $data['list'] = $this->Bancos->tarea_List();
    $data['permission'] = $permission;
    $this->load->view('bancos/list', $data);
  }
  
  
  public function getpencil(){

    $id=$_GET['id_banco'];
    //print_r($id);
    $result = $this->Bancos->getpencil($id);
    print_r(json_encode($result));

  }

  public function edit_banco(){

    $datos=$_POST['parametros'];
    $id=$_POST['ed'];
    
    $result = $this->Bancos->update_editar($datos,$id);
    return true;
    }

    public function agregar_banco(){

      if($_POST){
        $datos=$_POST['parametros'];

        $result = $this->Bancos->agregar_bancos($datos);
          //print_r($this->db->insert_id());
          
          if($result)
            echo $this->db->insert_id();
          else echo 0;
      }
    }

    public function baja_banco(){
  
    $idbanco=$_POST['idbanco'];
    
    $result = $this->Bancos->eliminacion($idbanco);
    print_r($result);
  
  }

  
  
}
