<?php defined('BASEPATH') OR exit('No direct script access allowed');

class Cheqpropio extends CI_Controller {
  
  function __construct()
        {
    parent::__construct();
    $this->load->model('Cheqpropios');
  }

  public function index($permission){
    $data['list'] = $this->Cheqpropios->tarea_List();
    $data['permission'] = $permission;
    $this->load->view('chepropios/list', $data);
  }

  public function cargaremitidos($permission){ 
    
    $data['list'] = $this->Cheqpropios->traermes();
    $data['permission'] = $permission;    // envia permisos       
    $this->load->view('chepropios/view_',$data);
  } 
  
  public function getpencil(){

    $id=$_GET['id_cheq'];
    //print_r($id);
    $result = $this->Cheqpropios->getpencil($id);
    print_r(json_encode($result));

  }

  public function pagarCheque(){
    
    $cheqid = $this->input->post('idCHeque');      
    $datos = array('cheqestado'=>"2");  // corresponde al estado P (pagado)
		$result = $this->Cheqpropios->pagarCheques($cheqid,$datos);
    echo json_encode($result);
  }

  public function getche(){

    $idm=$_GET['datos'];
    $dat= $this->Cheqpropios->getdatos($idm); 
   
    echo json_encode($dat);
  }
 
  public function getproveedor(){

    
    
    $result = $this->Cheqpropios->getproveedors();
    print_r(json_encode($result));

  }

  public function edit_chequera(){

    $datos=$_POST['parametros'];
    $id=$_POST['ed'];
    
    $result = $this->Cheqpropios->update_editar($datos,$id);
    return true;
  }

  public function agregar_cheque(){

      
        $datos=$_POST['parametros']; //los datos a insertar
        $num=$_POST['numero']; //id de chequera
        

        $result = $this->Cheqpropios->agregar_cheques($datos);

        if ($result !='')
        {
            $cantidad=$this->Cheqpropios->cantidad($num); //la cantidad de cheques de esa chequera 
            $contador=$this->Cheqpropios->co_cheques($num); // el contador de esa chequera 
              
              if ($cantidad >= $contador){
                $co= $contador+1;
                $al=$this->Cheqpropios->update_tblcheq($num,$co);
                
              }

            else
              return 2; //leego al limite la chequera 
        //$al=$this->Cheqpropios->mo_cheques($num); //si esto es igual a 1 llego al limite d cheques esa chequera

      }
      return 1; //0
  }    

  public function getchequera(){

      if($_POST){
        $datos=$_POST['parametros'];

        $result = $this->Cheqpropios->getchequeras($datos);
         
          
          if($result)
            echo $this->db->insert_id();
          else echo 0;
      }
  }

  public function getpropio(){

      if($_POST){
        $datos=$_POST['id_cheq'];

        $result = $this->Cheqpropios->getpropio($datos);
          
          if($result){ 
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
         
        print_r(json_encode($result));
      
  }

  public function baja_cheque(){
  
      $idC=$_POST['idcheq'];
      
      $result = $this->Cheqpropios->eliminacion($idC);
      print_r($result);
  
  } 
  
  public function getBanco(){

    $response = $this->Cheqpropios->getBancos();
    print_r(json_encode($response));
  }
  
  public function getNumCheque(){

    $response = $this->Cheqpropios->getNumCheques();
    print_r(json_encode($response)) ;
  }
  
}
