<?php defined('BASEPATH') OR exit('No direct script access allowed');

class Cupon extends CI_Controller {
  function __construct()
        {
    parent::__construct();
    $this->load->model('Cupones');
  }

  public function index($permission)
  {
    $data['list'] = $this->Cupones->tarea_List();
    $data['permission'] = $permission;
    $this->load->view('cupon/list', $data);
  }

  function guardar_cupones(){
    $data = $this->input->post();
    $result = $this->Cupones->guardar_cupones($data);
    echo $result;
  }

  public function gettarjeta(){

    
    //print_r($id);
    $result = $this->Cupones->gettarjetas();
    print_r(json_encode($result));

  }
  
  
  public function getpencil(){

    $id=$_POST['idcu'];
    //print_r($id);
    $result = $this->Cupones->getpencils($id);
    print_r(json_encode($result));

  }

  public function edit_cupon(){

    $datos=$_POST['parametros'];
    $id=$_POST['ed'];
    
    $result = $this->Cupones->update_editar($datos,$id);
    return true;
    }

    public function agregar_cupon(){

      if($_POST){
        $datos=$_POST['parametros'];

        $result = $this->Cupones->agregar_cupones($datos);
          //print_r($this->db->insert_id());
          
          if($result)
            echo $this->db->insert_id();
          else echo 0;
      }
    }

    public function baja_cupon(){
  
    $idcupo=$_POST['idcupo'];
    
    $result = $this->Cupones->eliminacion($idcupo);
    print_r($result);
  
  }

  
  
}
