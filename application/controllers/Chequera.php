<?php defined('BASEPATH') OR exit('No direct script access allowed');

class Chequera extends CI_Controller {
  function __construct()
        {
    parent::__construct();
    $this->load->model('Chequeras');
  }

  public function index($permission)
  {
    $data['list'] = $this->Chequeras->tarea_List();
    $data['permission'] = $permission;
    $this->load->view('chequera/list', $data);
  }
  
  
  public function getpencil(){

    $id=$_GET['id_cheq'];
    //print_r($id);
    $result = $this->Chequeras->getpencil($id);
    print_r(json_encode($result));

  }
public function getbanco(){

    
    //print_r($id);
    $result = $this->Chequeras->getbancos();
    print_r(json_encode($result));

  }


  public function edit_chequera(){

    $datos=$_POST['parametros'];
    $id=$_POST['ed'];
    
    $result = $this->Chequeras->update_editar($datos,$id);
    return true;
    }

    public function agregar_chequera(){

      if($_POST){
        $datos=$_POST['parametros'];

        $result = $this->Chequeras->agregar_chequeras($datos);
          //print_r($this->db->insert_id());
          
          if($result)
            echo $this->db->insert_id();
          else echo 0;
      }
    }

    public function baja_chequera(){
  
    $idC=$_POST['idcheq'];
    
    $result = $this->Chequeras->eliminacion($idC);
    print_r($result);
  
  }

  
  
}
