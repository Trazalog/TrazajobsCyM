<?php defined('BASEPATH') OR exit('No direct script access allowed');

class Cheqtercero extends CI_Controller {
  function __construct()
        {
    parent::__construct();
    $this->load->model('Cheqterceros');
  }

  public function index($permission)
  {
    $data['list'] = $this->Cheqterceros->list_cheques();
    $data['permission'] = $permission;
    $this->load->view('cheqterceros/list', $data);
  }

  public function getbanco(){

    $result = $this->Cheqterceros->getbancos();
    print_r(json_encode($result));

  }
  
  public function getpencil(){

    $id=$_GET['id_cheq'];
    //print_r($id);
    $result = $this->Cheqterceros->getpencil($id);
    print_r(json_encode($result));

  }


  public function edit_cheque(){

    $datos=$_POST['parametros'];
    $id=$_POST['ed'];
    
    $result = $this->Cheqterceros->update_editar($datos,$id);
    return 1;
    }

    public function agregar_cheque(){

      
        $datos=$_POST['parametros']; //los datos a insertar
        $result = $this->Cheqterceros->agregar_cheques($datos);

       print_r($result);

    }

    public function getchequera(){

      if($_POST){
        $datos=$_POST['parametros'];

        $result = $this->Cheqpropios->getchequeras($datos);
          //print_r($this->db->insert_id());
          
          if($result)
            echo $this->db->insert_id();
          else echo 0;
      }
    }


    public function getpropio(){

      if($_POST){
        $datos=$_POST['id_cheq'];

        $result = $this->Cheqpropios->getpropio($datos);
          //print_r($this->db->insert_id());
          if($result)
          { 
              $arre=array();
                  foreach ($result as $row ) 
                  {   
                     $arre[]=$row;
                  }
              echo json_encode($arre);
            }
            else echo "nada";
                   //print_r(json_encode($result));
              }
    }

    public function getnumero(){

     

        $result = $this->Cheqpropios->getnumeros();
          //print_r($this->db->insert_id());
        print_r(json_encode($result));
      
    }

    public function baja_cheque(){
  
    $idC=$_POST['idcheq'];
    
    $result = $this->Cheqterceros->eliminacion($idC);
    print_r($result);
  
    }

    public function traer_cli(){
     
      $usuario = $this->Cheqterceros->traer_cli();
      //echo json_encode($Customers);

      if($usuario)
      { 
        $arre=array();
            foreach ($usuario as $row ) 
            {   
               $arre[]=$row;
            }
        echo json_encode($arre);
      }
      else echo "nada";
      
    }


  
}
