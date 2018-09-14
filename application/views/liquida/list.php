<input type="hidden" id="permission" value="<?php echo $permission; ?>">
<section class="content">
  <div class="row">
    <div class="col-xs-12">
      <div class="box">
        <div class="box-header">
          <h3 class="box-title">Conciliar Liquidación</h3>
          <?php
          if (strpos($permission,'Add') !== false) {
            
              echo '<button class="btn btn-block btn-success" style="width: 100px; margin-top: 10px;" data-toggle="modal" id="btnAgre" title="Agregar">Agregar</button>';
           
          }
          ?>
        </div><!-- /.box-header -->
        <div class="box-body">
          <table id="sales" class="table table-bordered table-hover">
            <thead>
              <tr>
                <th width="20%" style="text-align: center">Acciones</th>
                <th style="text-align: center">Fecha</th>
                <th width="10%" style="text-align: center">Codigo</th>
                <th style="text-align: center">Monto</th>
                
                <!--<th style="text-align: center">Tarjeta</th>-->
               
                

              </tr>
            </thead>
            <tbody>
              <?php
                foreach($list as $z)
                {
                  $id=$z['liquidaid'];
                  echo '<tr id="'.$id.'" class="'.$id.'" >';
                    echo '<td>';
  	                /*if (strpos($permission,'Del') !== false) {
                     
                        echo '<i class="fa fa-fw fa-times-circle" style="color: #dd4b39; cursor: pointer; margin-left: 15px;" ></i>';
                    }*/
                   // if (strpos($permission,'Add') !== false) {
                       
                        echo '<i class="fa fa-fw fa-times-circle" style="color: #dd4b39; cursor: pointer; margin-left: 15px;" title="Eliminar" ></i>'; 
                        echo '<i class="fa fa-fw fa-pencil" style="color: #f39c12; cursor: pointer; margin-left: 15px;" title="Editar"></i> ';  
                         echo '<i class="fa fa-fw fa-search-plus" style="color: #0000FF; cursor: pointer; margin-left: 15px;" data-toggle="modal" data-target="#modalvista" title="Consultar"></i> ';                    
                        
                       

                 //  }
  	                		
  	                echo '</td>';
  	                
                   // $date = date_create($s['fecha']);
                    //echo '<td style="text-align: center">'.date_format($date, 'd-m-Y').'</td>';
                    echo '<td style="text-align: center">'.date_format(date_create($z['fecha']), 'd-m-Y').'</td>';
                    echo '<td style="text-align: center">'.$z['codigo'].'</td>';
                    echo '<td style="text-align: center">'.$z['monto'].'</td>';
                    
                   // echo '<td style="text-align: center">'.$z['tarjetdescrip'].'</td>';
                    
                   
  	                echo '</tr>';
      		        }
                
              ?>
            </tbody>
          </table>
        </div><!-- /.box-body -->
      </div><!-- /.box -->
    </div><!-- /.col -->
  </div><!-- /.row -->
</section><!-- /.content -->

<script>

var isOpenWindow = false;

var liq="";
$(document).ready(function(event) {

    edit=0;  datos=Array();

    $('#btnAgre').click( function cargarVista(){
      WaitingOpen();
      $('#content').empty();
      $("#content").load("<?php echo base_url(); ?>index.php/Liquida/cargar/<?php echo $permission; ?>");
      WaitingClose();
    });

    //MODIFICAR
$(".fa-pencil").click(function (e) { 
        
       // $('#modalSale').modal('show');

        var idliquida = $(this).parent('td').parent('tr').attr('id');
        console.log("El id de liquidacion para editar es:");
        console.log(idliquida);
        liq=idliquida;

        WaitingOpen();
        $('#content').empty();
        $("#content").load("<?php echo base_url(); ?>index.php/Liquida/cargareditar/<?php echo $permission; ?>/"+liq+"");
        WaitingClose();  


        // $.ajax({

        //   type: 'POST',
        //   data: { idliquida: idliquida},
        //   url: 'index.php/Liquida/getprintliquida', //index.php/
        //   success: function(data){
                  
                  
        //           console.log(data);
        //           console.log(data['datos'][0]['codigo']);
                 
        //           datos={
        //             'idcomodato':idcomodato,

        //             'destinoid':data['datos'][0]['destinoid'],
        //             'destinodireccion':data['datos'][0]['destinodireccion'],
        //             'destinocontacto':data['datos'][0]['destinocontacto'],
                    
        //             'abonoid':data['datos'][0]['abonoid'],
        //             'abonocantidad':data['datos'][0]['abonocantidad'],
        //             'abonodescrip':data['datos'][0]['abonodescrip'],
        //             'abonoprecio':data['datos'][0]['abonoprec'],
        //             'articulo':data['datos'][0]['artBarCode'],
                              

        //             'fecha':data['datos'][0]['fecha'],

        //             'cliId':data['datos'][0]['cliId'],

        //           } 

        //           var equipos = data['equipos'];
        //           edit=1;

        //           completarEdit(datos, equipos ,edit);
        //           OpenSale();  

              
        //         },
            
        //   error: function(result){
                
        //         console.log(result);
        //       },
        //       dataType: 'json'
        // });
  
});

    // Eliminar
$(".fa-times-circle").click(function (e) { 
                 
         
      console.log("Esto eliminando"); 
      var idliquid = $(this).parent('td').parent('tr').attr('id');
      console.log(idliquid);
      
      $.ajax({
              type: 'POST',
              data: { idliquid: idliquid},
              url: 'index.php/Liquida/baja_liquid', //index.php/
              success: function(data){
                    
                      console.log(data);
                     
                      //$(tr).remove();
                      alert("LIQUIDA Eliminado");
                     regresa();
                    
                    },
                
              error: function(result){
                    
                    console.log(result);
                  }
                 // dataType: 'json'
        });   
 });
   
$(".fa-search-plus").click(function (e) { 

       // $("#modalvista tbody tr").remove();
       
        $('#codliq').val('');
        $('#tar').val('');                
        $('#montoliq').val('');
        $('#reteliq').val('');
        $('#montotal').val('');
        
        $("#modalvista tbody tr").remove(); 
                       
        console.log("Esto Consultando"); 
        var idliq = $(this).parent('td').parent('tr').attr('id');
        console.log(idliq);
        
        $.ajax({
                type: 'POST',
                data: { idliq: idliq},
                url: 'index.php/Liquida/consultar_liquida', //index.php/
                success: function(data){
                        //var data = jQuery.parseJSON( data );
                        console.log("Estoy Consultando");
                        console.log(data);
                        //console.log(data['datos'][0]['monto']);
                        // console.log(data['equipos'][0]['codigo']);
                       // console.log(data.datos.abonodescrip);
                        //console.log(data['datos']['abonodescrip']);
                        //console.log(data['datos'][1]['abonodescrip']);

                        datos={
                              'codigo':data['datos'][0]['codigo'],

                              'fecha':data['datos'][0]['fecha'],
                              'retencion':data['datos'][0]['retencion'],
                              
                              'monto':data['datos'][0]['monto'],
                              'descriptarj':data['datos'][0]['tarjetdescrip'],
                              

                              }
                  
                    $('#codliq').val(datos['codigo']);
                    $('#tar').val(datos['descriptarj']);
                    $('#montoliq').val(datos['monto']);
                    $('#reteliq').val(datos['direccion']);
                    $('#fechaliq').val(datos['fecha']);
                    
                    $('#montotal').val(data['total'][0]['suma']);
                    
                   

                    for (var i = 0; i < data['equipos'].length; i++) {  
                    var tabla = "<tr >"+
                              "<td ></td>"+
                              "<td>"+data['equipos'][i]['cuponnro']+"</td>"+
                              "<td>"+data['equipos'][i]['detaliqfecha']+"</td>"+
                              "<td>"+data['equipos'][i]['cuponmonto']+"</td>"+
                            
                              
                              "</tr>";
                  $('#tablaconsulta tbody').append(tabla);

                  }
                  console.log(tabla);

                                
                      },
                  
                error: function(result){
                      
                      console.log(result);
                    },
                    dataType: 'json'
          });   
 });

$('#tarjeta').change(function(){

    $('#liquida').html('');
    var tarjetaid = $(this).val();
    console.log("El id de tarjeta es:");
    console.log(tarjetaid);
    $.ajax({
      type: 'POST',
      data: { tarjetaid:tarjetaid}, 
      url: 'index.php/Liquida/getliquida', //index.php/
      success: function(data){
 
              console.log(data);
              console.log(data[0]['codigo']);

              for(var i=0; i < data.length ; i++) 
              {     

               // $('select#liquida').append($('<option />', { value: data[0]['tarjetaid'], text: data[0]['codigo']}));
                var nombre = data[i]['codigo'];
                var opcion  = "<option value='"+data[i]['liquidaid']+"'>" +nombre+ "</option>" ; 

                $('#liquida').append(opcion); 
                                   
              }
             /* var descrip = data[0]['artDescription']; 

              $('#liquida').val(descrip);   */    
          
      },
      error: function(result){
                
              console.log(result);
            },
            dataType: 'json'
      });
    
});

$('#liquida').change(function(){

    $('#fechali').val('');
    $('#monto').val('');
    $('#retencion').val('');
    $('#montode').val('');
    $('#fechade').val('');
    $('#bancode').val('');
    $('#totalcupo').val(' ');
    var liquida = $(this).val();
    console.log("El id de liquidacion es:");
    console.log(liquida);
    $.ajax({
      type: 'POST',
      data: { liquida:liquida}, 
      url: 'index.php/Liquida/getdatos', //index.php/
      success: function(data){
 
              console.log(data);
             // console.log(data['equipos'][0]['detaliqfecha']);
              //console.log(data['datos'][0]['codigo']);
             $('#fechali').val(data['datos'][0]['fecha']);
              $('#monto').val(data['datos'][0]['monto']);
              $('#retencion').val(data['datos'][0]['monto']);
              $('#montode').val(data['deposito'][0]['depmonto']);
              $('#fechade').val(data['deposito'][0]['depfecha']);
              $('#bancode').val(data['deposito'][0]['bancdescrip']);
              $('#totalcupo').val(data['monto'][0]['suma']);

              for (var i = 0; i < data['equipos'].length; i++) {  
                    var tabla = "<tr >"+
                              "<td ></td>"+
                              "<td>"+data['equipos'][i]['cuponnro']+"</td>"+
                              "<td>"+data['equipos'][i]['detaliqfecha']+"</td>"+
                              "<td>"+data['equipos'][i]['cuponmonto']+"</td>"+
                              
                              
                              "</tr>";
                  $('#tablac tbody').append(tabla);

                  }
             /* var descrip = data[0]['artDescription']; 

              $('#liquida').val(descrip);   */    
          
      },
      error: function(result){
                
              console.log(result);
            },
            dataType: 'json'
      });
    traer_cupon(liquida);//traer cupones sobre esa liquidacion
});

$('#cuponc').change(function(){
 
   $('#tablacupon tbody tr').remove();
   // $('#cuponc').html('');
    var cuponid = $(this).val();
    console.log("El id de cupon es:");
    console.log(cuponid);
    $.ajax({
      type: 'POST',
      data: { cuponid:cuponid}, 
      url: 'index.php/Liquida/getdatoscupon', //index.php/
      success: function(data){
 
              console.log(data);
              console.log(data[0]['cuponnro']);
              for (var i = 0; i < data.length; i++) {  
                    var tabla = "<tr  id='"+cuponid+"' >"+
                              "<td ></td>"+
                              "<td>"+data[i]['cuponnro']+"</td>"+
                              "<td>"+data[i]['cuponfech']+"</td>"+
                              "<td>"+data[i]['cuponmonto']+"</td>"+
                              
                              
                              "</tr>";
                  $('#tablacupon tbody').append(tabla);

                  }
               
          
      },
      error: function(result){
                
              console.log(result);
            },
            dataType: 'json'
      });
    
});

$('#agregarli').click(function (e) {
   // $('#cuponc').html('');
    //var tarjeta = $(this).val();
    var tarjeta= $('#tarjeta').val();
    globlir=tarjeta;
    console.log("El id de tarjeta de la nueva liquidacion es:");
    console.log(tarjeta);
    

    $.ajax({
      type: 'POST',
      data: { tarjeta:tarjeta}, 
      url: 'index.php/Liquida/traerdescrip', //index.php/
      success: function(data){
 
            console.log(data);
             console.log(data[0]['tarjetdescrip']);
              
              $('#tarjetaliq').val(data[0]['tarjetdescrip']);
          
      },
      error: function(result){
                
              console.log(result);
            },
            dataType: 'json'
      });
    
});


$('#codigo').change(function(){

  var artId = $(this).val();
  console.log(artId);
    $.ajax({
      type: 'POST',
      data: {artId:artId }, 
      url: 'index.php/Ordeninsumo/getdescrip', //index.php/
      success: function(data){
 
              console.log(data);
              var descrip = data[0]['artDescription']; 

              $('#descripcion').val(descrip);       
          
      },
      error: function(result){
                
              console.log(result);
            },
            dataType: 'json'
      });
    traer_deposito(artId);
});



$('#sales').DataTable({
  "paging": true,
  "lengthChange": true,
  "searching": true,
  "ordering": true,
  "info": true,
  "autoWidth": true,
  "language": {
        "lengthMenu": "Ver _MENU_ filas por página",
        "zeroRecords": "No hay registros",
        "info": "Mostrando página _PAGE_ de _PAGES_",
        "infoEmpty": "No hay registros disponibles",
        "infoFiltered": "(filtrando de un total de _MAX_ registros)",
        "sSearch": "Buscar:  ",
        "oPaginate": {
            "sNext": "Sig.",
            "sPrevious": "Ant."
                      }
          }
});


});


function completarEdit(datos, equipos ,edit){


    $('#numero').val(datos['idcomodato']);
    $('#fecha').val(datos['fecha']);
    
    $('#abono').val(datos['abonoid']);
    $('#cantidad').val(datos['abonocantidad']);
    $('#descrip').val(datos['abonodescrip']);
    $('#precio').val(datos['abonoprecio']);
    $('#articulo').val(datos['articulo']);
    
    $('#clientes').val(datos['cliId']);
    traer_destinos(datos['cliId']);
    $('#destinos').val(datos['destinoid']);
    traer_codigo();

    $('#domicilio').val(datos['destinodireccion']);
    $('#contacto').val(datos['destinocontacto']);

    $('#tablaequipos tbody tr').remove();
    for (var i = 0; i < equipos.length; i++) 
    {                                              //class=quitarEquipo
       
        var tr = "<tr id='"+equipos[i]['equipid']+"'>"+
                    "<td ><i class='quitarEquipo'>X</i></td>"+
                    "<td>"+equipos[i]['equipcodigo']+"</td>"+
                    "<td>"+equipos[i]['equipmarca']+"</td>"+
                    "<td>"+equipos[i]['descripid']+"</td>"+
                    "<td>"+equipos[i]['tipodescrp']+"</td>"+
                "</tr>";

        $('#tablaequipos tbody').append(tr);
    }

    $(".quitarEquipo").click(function (e) {
          //alert('quitar');
          $(this).parent('td').parent('tr').remove();
        
    });



}



function OpenSale(){

    var btn = $('#btnAgre');
    if(btn.is(':enabled')){
      //Abrir ventana de facturación
      if(isOpenWindow == false){
        isOpenWindow = true;
        LoadIconAction('modalActionSale','Add');
        WaitingOpen('Cargando...');
        $('#modalSale').modal({ backdrop: 'static', keyboard: false });
        $('#modalSale').modal('show');
        setTimeout(function () { $('#artId').focus(); }, 1000);
        $('#saleDetail > tbody').html('');
       
        WaitingClose();
        //$("#pagaConInput").maskMoney({allowNegative: false, thousands:'', decimal:'.'});
      }
    }
}

function cerro(){
  
  isOpenWindow = false;
}



 function traer_codigo(){
      $.ajax({
        type: 'POST',
        data: { },
        url: 'index.php/Comodato/traercodigo', //index.php/
        success: function(data){
               // var data = jQuery.parseJSON( result );
                //console.log(data);
                var opcion  = "<option value='-1'>Seleccione...</option>" ; 
                $('#codigo').append(opcion); 
                for(var i=0; i < data.length ; i++) 
                {    
                      var nombre = data[i]['equipcodigo']; 
                      var opcion  = "<option value='"+data[i]['equipid']+"'>" +nombre+ "</option>" ; 

                    $('#codigo').append(opcion);                
                }
              },
        error: function(result){
              
              console.log(result);
            },
            dataType: 'json'
        });
  }

traer_tarjeta();

var idslote = new Array(); 

function traer_tarjeta(){
  $.ajax({
    type: 'POST',
    data: { },
    url: 'index.php/Liquida/gettarjeta', //index.php/
    success: function(data){
      var opcion  = "<option value='-1'>Seleccione...</option>" ; 
      $('#tarjeta').append(opcion);

       
      for(var i=0; i < data.length ; i++) 
      {   
         
          var nombre = data[i]['tarjetdescrip'];
          var opcion  = "<option value='"+data[i]['tarjetid']+"'>" +nombre+ "</option>" ;
          $('#tarjeta').append(opcion); 
      }
         
    },
    error: function(result){
              
        console.log(result);
    },
        dataType: 'json'
  });

}
traer_liquidacion1();
function traer_liquidacion1(){
  $.ajax({
    type: 'POST',
    data: { },
    url: 'index.php/Liquida/getliquid', //index.php/
    success: function(data){
      var opcion  = "<option value='-1'>Seleccione...</option>" ; 
      $('#liquiddep').append(opcion);

       
      for(var i=0; i < data.length ; i++) 
      {   
         
          var nombre = data[i]['codigo'];
          var opcion  = "<option value='"+data[i]['liquidaid']+"'>" +nombre+ "</option>" ;
          $('#liquiddep').append(opcion); 
      }
         
    },
    error: function(result){
              
        console.log(result);
    },
        dataType: 'json'
  });

}
traer_tarjeta2();
function traer_tarjeta2(){
  $.ajax({
    type: 'POST',
    data: { },
    url: 'index.php/Liquida/gettarjeta', //index.php/
    success: function(data){
      var opcion  = "<option value='-1'>Seleccione...</option>" ; 
      $('#tarjetaliq').append(opcion);

       
      for(var i=0; i < data.length ; i++) 
      {   
         
          var nombre = data[i]['tarjetdescrip'];
          var opcion  = "<option value='"+data[i]['tarjetid']+"'>" +nombre+ "</option>" ;
          $('#tarjetaliq').append(opcion); 
      }
         
    },
    error: function(result){
              
        console.log(result);
    },
        dataType: 'json'
  });

}
traer_banco();
function traer_banco(){
  $.ajax({
    type: 'POST',
    data: { },
    url: 'index.php/Liquida/getbanco', //index.php/
    success: function(data){
      var opcion  = "<option value='-1'>Seleccione...</option>" ; 
      $('#bancodep').append(opcion);

       
      for(var i=0; i < data.length ; i++) 
      {   
         
          var nombre = data[i]['bancdescrip'];
          var opcion  = "<option value='"+data[i]['bancid']+"'>" +nombre+ "</option>" ;
          $('#bancodep').append(opcion); 
      }
         
    },
    error: function(result){
              
        console.log(result);
    },
        dataType: 'json'
  });

}
traer_cupon();

function traer_cupon(){

  $('#cuponc').html(''); 
  $.ajax({
    type: 'POST',
    data: { },
    url: 'index.php/Liquida/getcupon', //index.php/
    success: function(data){
         
        var opcion  = "<option value='-1'>Seleccione...</option>" ; 
        $('#cuponc').append(opcion); 
        for(var i=0; i < data.length ; i++) 
        {    
          var nombre = data[i]['cuponnro'];
          var opcion  = "<option value='"+data[i]['cuponid']+"'>" +nombre+ "</option>" ; 

          $('#cuponc').append(opcion); 
                                   
        }
    },
    error: function(result){
              
        console.log(result);
    },
        dataType: 'json'
  });
}

traer_deposito();

function traer_deposito(artId){

  $('#deposito').html(""); 
  $.ajax({
    type: 'POST',
    data: {artId:artId },
    url: 'index.php/Ordeninsumo/getdeposito', //index.php/
    success: function(data){
         
        var opcion  = "<option value='-1'>Seleccione...</option>" ; 
        $('#deposito').append(opcion); 
        for(var i=0; i < data.length ; i++) 
        {    
          var nombre = data[i]['depositodescrip'];
          var opcion  = "<option value='"+data[i]['depositoId']+"'>" +nombre+ "</option>" ; 

          $('#deposito').append(opcion); 
                                   
        }
    },
    error: function(result){
              
        console.log(result);
    },
    dataType: 'json'
  });
}


function limpiar(){
      $("#comprobante").val("");
      $("#fecha").val("");
      $("#solicitante").val("");
      $("#destino").val("");
      $("#codigo").val("");
      $("#descripcion").val("");
      $("#cantidad").val("");
      $("#deposito").val("");
      $('#tablainsumo tbody tr').remove();

}

function guardar(){ 
       
    console.log("Estoy guardando");
   
    
  //  var $cod = $("select#liquida option:selected").html();
    var $idliq=  $('#liquida').val();
  /*  var parametros = {
        
        'fecha': $('#fecha1').val(),
        'codigo': $cod,
        'tarjetaid': $('#tarjeta').val(),
        'retencion': $('#retencion').val()       
    };*/

   var idscon = new Array();     
    $("#tablacupon tbody tr").each(function (index) 
    {
        var i= $(this).attr('id');
        idscon.push(i);            

    }); 
        

  //console.log("parametros ");
  //console.log(parametros);
  console.log("Cupon ");
  console.log(idscon);
  console.log("Id de liquidacion");
  console.log($idliq);
 
    //&& depo !=0 && idsinsumo >0 && comp >0
    //parametros:parametros,
    $.ajax({
      type: 'POST',
      data: { idscon:idscon, $idliq: $idliq},
      url: 'index.php/Liquida/guardar',  //index.php/
      success: function(data){
              console.log("exito");
              console.log(data);
              alert("LIQUIDACION GUARDADA");
              regresa();
                                    
              },
      error: function(result){
              console.log("entro por el error");
              console.log(result);

            }
           // dataType: 'json'
    });

}


function guardardepos(){ 
       
  console.log("estoy guardando deposito");
  var parametros = {
        'depfecha': $('#fechadep').val(),
        
        'liquidaid': $('#liquiddep').val(),    
        'bancid': $('#bancodep').val(),
        'depestado': 'C',
        'depmonto': $('#montodep').val(),
        'codigo': $('#codigodep').val(),   
        
        
    };


  console.log("parametros de DESPOSITO");
  console.log(parametros);
  
  var hayError = false;

  if(parametros !=0){
    //&& depo !=0 && idsinsumo >0 && comp >0
    $.ajax({
      type: 'POST',
      data: {parametros:parametros},
      url: 'index.php/Liquida/guardardeposito',  //index.php/
      success: function(data){
              console.log("exito");
              console.log(data);
              regresa();
                                    
              },
      error: function(result){
              console.log("entro por el error");
              console.log(result);

            },
           // dataType: 'json'
    });
    limpiar();
  }
  else {
    var hayError = true;
    $('#error').fadeIn('slow');
    return;
  }

  if(hayError == false){
    
    $('#error').fadeOut('slow');
  }

}





 // function guardar(datos,  idsequipos)
function guardarLiquida(){ 
       
  console.log("estoy guardando liquidacion");
  var parametros = {
        'fecha': $('#fechaliq').val(),       
        'monto': $('#montoliq').val(),
        'codigo': $('#codigoliq').val(), 
        'tarjetaid': globlir
        
  };

  console.log("parametros de Liquidacion");
  console.log(parametros);
  
  var hayError = false;

  if(parametros !=0){
    //&& depo !=0 && idsinsumo >0 && comp >0
    $.ajax({
      type: 'POST',
      data: {parametros:parametros},
      url: 'index.php/Liquida/guardarLiquida',  //index.php/
      success: function(data){
              console.log("exito");
              console.log(data);
              //alert("Liquidacion guardada");
              regresa();
                                    
              },
      error: function(result){
              console.log("entro por el error");
              console.log(result);

            }
           // dataType: 'json'
    });
   
  }
  else {
    var hayError = true;
    $('#error').fadeIn('slow');
    return;
  }

  if(hayError == false){
    
    $('#error').fadeOut('slow');
  }

}

function regresa(){

  WaitingOpen();
  $('#content').empty();
  $("#content").load("<?php echo base_url(); ?>index.php/Liquida/index/<?php echo $permission; ?>");
  WaitingClose();
}



</script>



<!-- Modal -->
<div class="modal fade" id="modaleditar" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
  <div class="modal-dialog modal-lg" role="document" style="width: 60%">
    <div class="modal-content">

      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
        <h4 class="modal-title"  id="myModalLabel"><span id="modalAction" class="fa fa-fw fa-pencil" style="color: #f39c12" > </span> Editar Conciliacion</h4>
       </div> <!-- /.modal-header  -->

      <div class="modal-body input-group ui-widget" id="modalBodyArticle">
          <div class="row" >
            <div class="col-sm-12 col-md-12">
              <div role="tabpanel" class="tab-pane">
                <div class="form-group">
                  <div class="panel panel-default">
                      <div class="panel-heading">
                        <h4 class="panel-title">Conciliacion Liquidacion</h4>
                      </div>
                      <div class="panel-body">
                                               
                        <div class="col-xs-4">Tarjeta: <strong style="color: #dd4b39">*</strong> :
                          <select type="text"  id="tarjeta" name="tarjeta" class="form-control "  value="" ></select>
                        </div>

                        <div class="col-xs-4">Liquidacion en Curso: <strong style="color: #dd4b39">*</strong> :
                          <select  id="liquida" name="liquida" class="form-control "  value="" ></select>
                        </div>
                        
                        <div class="col-xs-4">
                        <br>
                          <button type="button" class="btn btn-success" id="agregarli" data-toggle="modal" data-target="#modalaliquida"><i class="fa fa-plus">  Nueva Liquidacion</i></button>
                        </div>   

                      </div>
                       

                        <div>

                          <!--tabs -->
                          <ul class="nav nav-tabs" role="tablist">
                            <li role="presentation" class="active"><a href="#resum" aria-controls="home" role="tab" data-toggle="tab">Resumen de liquidacion</a></li>
                            <li role="presentation"><a href="#cupocu" aria-controls="messages" role="tab" data-toggle="tab">Cupones en Curso</a></li>
                                                       
                          </ul>
                         
                          

                          <!-- Tab panes -->
                          <div class="tab-content">

                              <div role="tabpanel" class="tab-pane active" id="resum">
                                <div class="row" >
                                  <div class="col-sm-12 col-md-12">
                                  <br>
                                  <fieldset><legend></legend></fieldset>

                                    <div class="col-xs-3">Fecha de Liquidacion :
                                      <input type="date" id="fechali" name="fechali" class="form-control"  disabled  />  
                                    </div>
                                    <div class="col-xs-3">Monto Liquidado:
                                      <input type="text" id="monto" name="monto" class="form-control" disabled >  
                                    </div>
                                    <div class="col-xs-3">Retencion:
                                      <input  type="text" id="retencion" name="retencion" class="form-control"  />  
                                    </div>
                                    <div class="col-xs-3">Monto deposito:
                                      <input  type="text" id="montode" name="montode" class="form-control" disabled  />  
                                    </div>
                                    <div class="col-xs-3">Fecha de Deposito:
                                      <input type="date" id="fechade" name="fechade" class="form-control"  disabled  />  
                                    </div>
                                    <div class="col-xs-3">Banco Deposito:
                                      <input type="text" id="bancode" name="bancode" class="form-control"  disabled  />  
                                    </div>

                                    <div class="col-xs-3"><label></label> 
                                      <br>
                                      <button type="button" class="btn btn-success" id="agregar"  data-toggle="modal" data-target="#modalagregar"><i class="fa fa-plus">    Nuevo Deposito</i></button>
                                    </div>
                                
                                     <div class="col-xs-3">Total de cupones liquidados 
                                      <br>
                                      <input type="text" id="totalcupo" name="totalcupo" class="form-control"  disabled  />  
                                    </div>

                                    
                                   
                                  </div>
                                </div>
                              </div>
                          

                              <div role="tabpanel" class="tab-pane" id="cupocu">
                                <br>
                                <fieldset><legend></legend></fieldset>
                                        
                                       
                                <div class="row">
                                  <div class="col-xs-9 col-md-7 "> <!--col-xs-10 col-xs-offset-1-->
                                    <div class="col-xs-8">Cupones en Curso<strong style="color: #dd4b39">*</strong> :
                                     
                                        <select  id="cuponc" name="cuponc" class="form-control" value="" ></select>
                                    </div>
                                    <table class="table table-bordered" id="tablacupon"> 
                                      <thead>
                                      <tr>                            
                                      <br>
                                      <th width="35px"></th>
                                      <th colspan="3" class="text-center">Cupones en curso</th>
              
                                      </tr>
                                      <tr>
                                      <br>
                                      <th></th>
                                      <th>Cupon</th>
                                      <th>Fecha</th>
                                      <th>Monto</th>
                                          
                                      </tr>
                                                          
                                      </thead>
                                      <tbody></tbody>
                                    </table>
                                  </div>
                                  <br>
                                  <div class=" col-xs-3 col-md-5 "> <!--col-xs-10 col-xs-offset-1-->
                                    <table class="table table-bordered" id="tablac"> 
                                      <thead>
                                        <tr>                            
                                          <br>
                                          
                                          <th width="35px"></th>
                                          <th colspan="3" class="text-center">Cupones Liquidados</th>

                                        <!-- th colspan="2">Descarga</th>-->
                                       
                                        </tr>
                                        <tr>
                                        <br>
                                        <th></th>
                                          <th>Cupon</th>
                                          <th>Fecha</th>
                                          <th>Monto</th>
                                         
                                         
                                        </tr>
                                        
                                          
                                      </thead>
                                      <tbody></tbody>
                                    </table>
                                  </div>
                                </div>

                              </div><!--cierre div insum-->
                          </div>
                                
                        </div><!-- div que cierra la pestaña-->      
                   <!-- </div>-->

                  </div>
                </div>
              </div>
            </div>
          </div>
      </div>
      <div class="modal-footer">
       
        
        <button type="button" class="btn btn-primary" id="btnSave" data-dismiss="modal" onclick="guardar()" >Guardar</button>
      </div>  <!-- /.modal footer -->

       </div>  <!-- /.modal-body -->
    </div> <!-- /.modal-content -->
  </div>  <!-- /.modal-dialog modal-lg -->
</div>  <!-- /.modal fade -->

<!-- Modal CONSULTA-->
 <div class="modal fade" id="modalvista" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
  <div class="modal-dialog modal-lg" role="document" style="width: 60%">
    <div class="modal-content">

      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
        <h4 class="modal-title"  id="myModalLabel"><span id="modalAction" class="fa fa-fw fa-search-plus" style="color: #0000FF" > </span> Consulta</h4>
      </div> <!-- /.modal-header  -->

      <div class="modal-body input-group ui-widget" id="modalBodyArticle">

      <div class="panel panel-default">
          <div class="panel-heading">
            <h2 class="panel-title  ">   Datos de liquidacion</h2>
          </div>
          <div class="panel-body">
            <div class="row" >
              <div class="col-sm-12 col-md-12">
                <div class="col-xs-4">Liquidacion:
                  <input type="text" id="codliq" name="codliq" class="form-control" >
                </div> 
                 <div class="col-xs-4">Fecha:
                  <input type="date" id="fechaliq" name="fechaliq" class="form-control" >
                </div> 
                <div class="col-xs-4">Tarjeta:
                  <input type="text" id="tar" name="tar" class="form-control" >
                </div>
                <div class="col-xs-4">Monto:
                  <input type="text" id="montoliq" name="montoliq" class="form-control">
                </div> 
                <div class="col-xs-4">Retencion:
                  <input type="text" id="reteliq" name="reteliq" class="form-control" >
                </div> 
                
             
            </div>
          </div>
        </div>
      </div>
      
      <div class="panel panel-default">
        <div class="panel-heading">
          <h2 class="panel-title "> Cupones Liquidados</h2>
        </div>
        <div class="panel-body">
          <div class="row">
            <div class="col-xs-10 col-xs-offset-1">
               <table class="table table-bordered" id="tablaconsulta"> 
                <thead>
                  <tr>                           
                    <br>
                    <th width="35px"></th>
                    <th width="10%">Nro cupon</th>
                    <th>Fecha</th>
                    <th width="10%">Monto</th>
                   
                  </tr>
                </thead>
                <tbody>
                  
                </tbody>
              </table>
            </div>
            <div class="col-sm-12 col-md-12">
             <div class="col-xs-4">Monto total:
                <input type="text" id="montotal" name="montotal" class="form-control" >
              </div>
          </div> 
        </div>
      </div>


     
       </div>  <!-- /.modal-body -->
    </div> <!-- /.modal-content -->

  </div>  <!-- /.modal-dialog modal-lg -->
</div>  <!-- /.modal fade -->
<!-- / Modal -->
