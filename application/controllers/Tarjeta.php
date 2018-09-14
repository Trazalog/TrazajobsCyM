<?php defined('BASEPATH') OR exit('No direct script access allowed');

class Tarjeta extends CI_Controller {
  function __construct()
        {
    parent::__construct();
    $this->load->model('Tarjetas');
  }

  public function index($permission)
  {
    $data['list'] = $this->Tarjetas->tarea_List();
    $data['permission'] = $permission;
    $this->load->view('tarjetas/list', $data);
  }
  
  
  public function getpencil(){

    $id=$_GET['id_tarj'];
    //print_r($id);
    $result = $this->Tarjetas->getpencil($id);
    print_r(json_encode($result));

  }

  public function edit_tarjeta(){

    $datos=$_POST['parametros'];
    $id=$_POST['ed'];
    
    $result = $this->Tarjetas->update_editar($datos,$id);
    return true;
    }

    public function agregar_tarjeta(){

      if($_POST){
        $datos=$_POST['parametros'];

        $result = $this->Tarjetas->agregar_tarjetas($datos);
          //print_r($this->db->insert_id());
          
        print_r($result);
      }
    }

    public function baja_tarjet(){
  
    $idtar=$_POST['idtar'];
    
    $result = $this->Tarjetas->eliminacion($idtar);
    print_r($result);
  
  }

  
  
}
