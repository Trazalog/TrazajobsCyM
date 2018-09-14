<?php defined('BASEPATH') OR exit('No direct script access allowed');

class Liquida extends CI_Controller {
  function __construct()
        {
    parent::__construct();
    $this->load->model('Liquidaciones');
  }

  /*public function index($permission)
  {
   
   $data['permission'] = $permission;
    $this->load->view('liquida/view_' , $data);
  }*/

  public function index($permission){
      $data['list'] = $this->Liquidaciones->getList();
        $data['permission'] = $permission;    // envia permisos     
        $this->load->view('liquida/list',$data);// view_
  }

  public function cargavista($permission){
      
        $data['permission'] = $permission;    // envia permisos     
        $this->load->view('liquida/view_',$data);// view_
  }
  
  public function cargareditar($permission,$liq){ 
    $data['list'] = $this->Liquidaciones->getprintliquida($liq);
    //var_dump($idglob);
    $data['liquidaid'] = $liq; 
    $data['permission'] = $permission;    // envia permisos       
    $this->load->view('liquida/editar',$data); //equipo controlador 
    }
    
  public function cargar($permission){ 
        $data['permission'] = $permission;    // envia permisos       
        $this->load->view('liquida/view_',$data);
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

  public function gettarjeta(){

    $result = $this->Liquidaciones->gettarjetas();
    print_r(json_encode($result));

  }
  
  public function getliquid(){

    $result = $this->Liquidaciones->getliquids();
    print_r(json_encode($result));

  }

  public function getconcepto(){

    $result = $this->Liquidaciones->getconceptos();
    print_r(json_encode($result));

  }
  
  public function getbanco(){

    $result = $this->Liquidaciones->getbancos();
    print_r(json_encode($result));

  }
  
  public function getliquida(){

    $datos=$_POST['tarjetaid'];
    $result = $this->Liquidaciones->getliquidas($datos);
    print_r(json_encode($result));

  }
  
  public function getdatoscupon(){

    $datos=$_POST['cuponid'];
    $result = $this->Liquidaciones->getdatoscupons($datos);
    print_r(json_encode($result));

  }
  
  public function getcupon(){
    $tar=$_POST['tar'];

    $result = $this->Liquidaciones->getcupons($tar);
    print_r(json_encode($result));

  }
  
  public function traerdescrip(){
    
    $datos=$_POST['tarjeta'];
    $result = $this->Liquidaciones->traerdescriptarjet($datos);
    print_r(json_encode($result));

  }

  public function getdatos(){

    $datos=$_POST['liquida'];

    $result = $this->Liquidaciones->gestdescrptliq($datos);
    if($result)
    { 
      $arre['datos']=$result;

      $deposito = $this->Liquidaciones->getdatostra($datos);
      if($deposito)
      {
        $arre['deposito']=$deposito;
      }
      else $arre['deposito']=0;

      $equipos = $this->Liquidaciones->getdetaliquida($datos);
      if($equipos)
      {
        $arre['equipos']=$equipos;
      }
      else $arre['equipos']=0;
      
       $monto = $this->Liquidaciones->getmontoliquida($datos);
      if($monto)
      {
        $arre['monto']=$monto;
      }
      else $arre['monto']=0;


      echo json_encode($arre);
    }
    else echo "nada";
  }

  public function guardardeposito(){

      if($_POST){
        $datos=$_POST['parametros'];

        $result = $this->Liquidaciones->guardardepositos($datos);
          //print_r($this->db->insert_id());
          
          if($result)
            echo $this->db->insert_id();
          else echo 0;
      }
    }
    
  public function guardarLiquida(){

      if($_POST){
        $datos=$_POST['parametros'];

        $result = $this->Liquidaciones->guardarLiquidas($datos);
          //print_r($this->db->insert_id());
          
          if($result)
            echo $this->db->insert_id();
          else echo 0;
      }
  }
  
  public function guardar(){
      
        $equipos=$_POST['idscon'];
        $idliquid=$_POST['$idliq'];
        $arre=array();
        if(count($equipos) > 0 )
         {
            foreach ($equipos as $row ) 
            {   
              $datos2 = array(
               'liquidaid'=>$idliquid, 
               'detaliqfecha'=>date('Y-m-d'),
               'cuponid'=>$row
              );  
              //print_r($datos2);
                $this->Liquidaciones->insert_detaliq($datos2);
            }
        }
 
      return true;    
  }

  
public function guardar_cupon(){
      
        $cupon=$_POST['idscon'];
       // $idcupo=$_POST['cuponid'];
      //  $arre=array();
        $i=0;
        if(count($cupon) > 0 ) {
            foreach ($cupon as $row )  { 
              
              $datos2 = array(
               'cuponestado'=> 'L' 
               
              );  
              $i=$row;
              //var_dump($i);
              // $in= intval($i);
              //print_r($datos2);
                $this->Liquidaciones->update_cupon($i, $datos2);
               //return $in;
              //var_dump($i);
               echo  json_decode($i); 
            }
          
         
        }

       
  }

  public function baja_liquid(){
  
    $idbanco=$_POST['idliquid'];
    
    $result = $this->Liquidaciones->eliminacion($idbanco);
    print_r($result);
  
  } 
  public function consultar_liquida(){

    $id=$_POST['idliq'];

    $result = $this->Liquidaciones->getcomodatoConsult($id);
    
    if($result)
    { 
      $arre['datos']=$result;

     $equipos = $this->Liquidaciones->getequipos($id);
      if($equipos)
      {
        $arre['equipos']=$equipos;
      }
      else $arre['equipos']=0;

      $total = $this->Liquidaciones->gettotal($id);
      if($total)
      {
        $arre['total']=$total;
      }
      else $arre['total']=0;


      echo json_encode($arre);
    }

    else echo "nada";
  }
  
 /* public function getprintliquida(){

    $id=$_POST['idliquida'];

    $result = $this->Liquidaciones->getdatosprint($id);
    if($result)
    { 
      $arre['datos']=$result;

     $equipos = $this->Liquidaciones->getdetaliqprint($id);
      if($equipos)
      {
        $arre['equipos']=$equipos;
      }
      else $arre['equipos']=0;


      echo json_encode($arre);
    }
    else echo "nada";
  }*/

  public function ActualizoTabla(){

    $datos=$_POST['data'];
    //$liq=$_POST['globliq'];

    if($datos>0){
    
      $result = $this->Liquidaciones->ActualizoTablas($datos);

    }
   
    print_r(json_encode($result));

  }
  
  public function Actualizototalcupo(){
  //$liq=$_POST['globliq'];
  $ta=$_POST['tar'];

    if($ta>0){

      $result2 = $this->Liquidaciones->Actualizototalcupos($ta);
    }
    echo json_encode($result2);
  }


  public function agregar_retencion(){
  
    $datos=$_POST['parametros']; 
    $indice=$_POST['idscon'];
    $i=0;
    $result = $this->Liquidaciones->agregar_retenciones($datos);
    $ultimoId=$this->db->insert_id(); 
        //print_r($this->db->insert_id());
   
    // if($result)
    //       echo $this->db->insert_id();
    //     else echo 0;  
    
    // if(count($indice) > 0 ){
    //   foreach ($indice as $row ){ 
    //     $i=$row;  
    //     $result2 = $this->Liquidaciones->actualizarTotals($ultimoId); 
    // }

     //print_r(json_encode($result2));

      if(count($indice) >0){ 

          foreach ($indice as $row ){ 
            $i=$row;  
           

            $result2 = $this->Liquidaciones->actualizarTotals($i);  
            $arre['datos']=$result2;
            echo json_encode($arre);
          }
      }      



     
      else echo "nada";
       

  }
  
  /*public function actualizarTotal(){

    $datos=$_POST['idscon'];
    $i=0;

    if(count($datos) > 0 ){
      foreach ($lote as $row ){   
        $i= $row;  
        $result = $this->Liquidaciones->actualizarTotals($i);      
                  
      }

    }

     
    $result = $this->Liquidaciones->actualizarTotals($datos);
    print_r(json_encode($result));

  }*/

  
  public function guardaretencion(){
  
    $comp=$_POST['comp']; //Arreglo con id de conceptos 
    $liq=$_POST['globliq']; //id de liquidacion 
    $acu=$_POST['acum']; //Monto total
    
    if(count($comp) >0){ 

        foreach ($comp as $row ){ 
          //$i=$row; //id de concepto                   
          $datos2 = array(
           'id_liquida'=>$liq, 
           'id_concepto'=>$row,
           'monto'=>$acu
           
          );       

        }

        $result= $this->Liquidaciones->guardaretenciones($datos2);//Inserto en la tabla retencion         
    }
       
    $result2= $this->Liquidaciones->traeretencion($liq, $acu);
   // var_dump($result2);  

    echo json_encode($result2);           
  }

  

 public function AcualizarLiquida(){
  
    
    $liq=$_POST['globliq']; //id de liquidacion 
    $tol=$_POST['totalr']; //Monto total a actualizar
    
    if($tol >0){ 

      $datos2 = array(
                 'retencion'=>$tol 
                          
                );


      $result= $this->Liquidaciones->AcualizarLiquidacion($liq, $datos2);//actualizo la tabla liquidacion 

      return $result;         
    }
       
          
  }

  
}
