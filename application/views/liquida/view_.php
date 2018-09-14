<input type="hidden" id="permission" value="<?php echo $permission;?>">
<div class="row">
  <div class="col-xs-12">
    <div class="alert alert-danger alert-dismissable" id="error" style="display: none">
          <h4><i class="icon fa fa-ban"></i> Error!</h4>
          Revise que todos los campos obligatorios esten seleccionados
      </div>
  </div>
</div>
<div class="row">
  <div class="col-xs-12">
    <div class="alert alert-danger alert-dismissable"  id="error1" style="display: none">
          <h4><i class="icon fa fa-ban"></i> Error!</h4>
          NO HAY INSUMOS SUFICIENTES
      </div>
  </div>
</div>
<div class="row">
  <div class="col-xs-12">
    <div class="alert alert-success" id="error2" style="display: none">
          <h4></h4>
          HAY INSUMOS SUFICIENTES
      </div>
  </div>
</div>
<section class="content">
  <div class="row">
    <div class="col-xs-12">
      <div class="box">
        <div class="box-header">
          <br>
          <h3 class="box-title"> Conciliar Liquidación</h3> 
          <?php
           if (strpos($permission,'Add') !== false) {
            echo '<button class="btn btn-block btn-success" style="width: 100px; margin-top: 10px;" id="listado">Ver Listado</button>';
        
          }
          ?>
        </div><!-- /.box-header -->
           
        <div class="box-body">
          <div class="row" >
            <div class="col-sm-12 col-md-12">
              <div role="tabpanel" class="tab-pane">
                <div class="form-group">
                  <div class="panel panel-default">
                      <div class="panel-heading">
                        <h4 class="panel-title">Conciliación </h4>
                      </div>
                      <div class="panel-body">
                                               
                        <div class="col-xs-4">
                          <label style="display:block">Tarjeta <strong style="color: #dd4b39">*</strong> :
                            <select type="text"  id="tarjeta" name="tarjeta" class="form-control "  value="" ></select>
                          </label>
                        </div>

                        <div class="col-xs-4">
                          <label style="display:block">Liquidación en Curso: <strong style="color: #dd4b39">*</strong> :
                            <select  id="liquida" name="liquida" class="form-control "  value="" ></select>
                          </label>
                        </div>
                        
                        <div class="col-xs-4">
                        <br>
                          <button type="button" class="btn btn-success" id="agregarli" data-toggle="modal" data-target="#modalaliquida"><label><i class="fa fa-plus">  Nueva Liquidación</i></label></button>
                        </div>   

                      </div>
                       

                      <div>

                          <!--tabs -->
                          <ul class="nav nav-tabs" role="tablist">
                            <li role="presentation" class="active"><a href="#resum" aria-controls="home" role="tab" data-toggle="tab">Resumen de liquidación</a></li>
                            <li role="presentation"><a href="#cupocu" aria-controls="messages" role="tab" data-toggle="tab">Cupones en Curso</a></li>
                                                       
                          </ul>
                         
                          

                          <!-- Tab panes -->
                        <div class="tab-content">

                          <div role="tabpanel" class="tab-pane active" id="resum">
                            <fieldset><legend></legend></fieldset>
                              <div class="row">
                                <div class="col-sm-12 col-md-12">
                                  <div class="col-xs-3" >
                                    <label style="display:block">Fecha de Liquidación:</label> 
                                            
                                  </div>
                                  <div class="col-xs-5">
                                    <input type="date" id="fechali" name="fechali" class="form-control"  disabled  />  
                                  </div>
                                </div>
                              </div>
                              <div class="row">
                                <br>
                                <div class="col-sm-12 col-md-12">
                                  <div class="col-xs-3">
                                    <label style="display:block">Total de cupones liquidados: </label> 
                                  </div>
                                  <div class="col-xs-5">
    
                                    <input type="text" id="totalcupo" name="totalcupo" class="form-control"  disabled  /> 
                                  </div>
                                </div>
                              </div>
                              <div class="row">
                                <br>
                                <div class="col-sm-12 col-md-12">
                                  <div class="col-xs-3">
                                    <label style="display:block">Monto Liquidado:</label>            
                                  </div>
                                  <div class="col-xs-5">
                                    <input type="text" id="monto" name="monto" class="form-control" disabled >  
                                  </div>
                                </div>
                              </div>
                              <div class="row">
                                <br>
                                <div class="col-sm-12 col-md-12">
                                  <div class="col-xs-3">
                                    <label style="display:block">Monto deposito:</label> 
                                         
                                  </div>
                                  <div class="col-xs-5">
                                    <input  type="text" id="montode" name="montode" class="form-control" disabled  />  
                                  </div>
                                </div>
                              </div>
                              <div class="row">
                                <br>
                                <div class="col-sm-12 col-md-12">
                                  <div class="col-xs-3">
                                    <label style="display:block">Retención:</label>                       
                                  </div>
                                  <div class="col-xs-5">
                                    <input  type="text" id="retencion" name="retencion" class="form-control"  disabled />      
                                  </div>
                                  <div class="col-xs-3">
                                    <button type="button" class="btn btn-success"   data-toggle="modal" data-target="#modalretencion"><i class="fa fa-plus">    Nueva Retención</i></button>
                                  </div>
                                </div>
                              </div>
                              <div class="row">
                                <br>
                                <div class="col-sm-12 col-md-12">
                                  <div class="col-xs-3"> 
                                    <label style="display:block">Fecha de Deposito: </label>      
                                  </div>
                                  <div class="col-xs-5">
                                    <input type="date" id="fechade" name="fechade" class="form-control"  disabled  />  
                                  </div>
                                </div>
                              </div>
                              <div class="row">
                                <br>
                                <div class="col-sm-12 col-md-12">
                                  <div class="col-xs-3">
                                    <label style="display:block">Banco Deposito: </label> 
                                  </div>
                                  <div class="col-xs-5">
                                    <input type="text" id="bancode1" name="bancode1" class="form-control"  disabled  />    
                                  </div>
                                  <div class="col-xs-3">
                                    <button type="button" class="btn btn-success" id="agregar"  data-toggle="modal" data-target="#modalagregar"><i class="fa fa-plus">  Nuevo Deposito</i></button>
                                  </div>
                                </div>
                              </div>
                             <!--</div>-->
                              <br>
                              <br>
                          </div><!--cierre de resum-->
                          <div role="tabpanel" class="tab-pane" id="cupocu">
                            <div class="container">
                              <div class="col-sm-12 col-md-12">
                                <div class="row">
                                <br>
                                  <div class="col-lg-4">
                                    
                                   
                                      <label style="display:block">Cupones en Curso: 
                                        <select  id="cuponc" name="cuponc" class="form-control" value="" ></select>
                                      </label>

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
                                        <th>Cupón</th>
                                        <th>Fecha</th>
                                        <th>Monto</th>
                                            
                                        </tr>
                                                                
                                      </thead>
                                      <tbody></tbody>
                                    </table>
                                  </div>
                                
                                  <div class="col-xs-4 col-md-4">
                                    <br>
                                   

                                    <button type="button" class="btn btn-danger btn-sm delete" onclick="pasar_liquidado()">Pasar a liquidado</button>
                                  
                                  </div>

                                  <div class="col-xs-4 col-xs-offset-2">
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
                                          <th>Cupón</th>
                                          <th>Fecha</th>
                                          <th>Monto</th> 
                                        </tr>   
                                      </thead>
                                      <tbody></tbody>
                                    </table>
                                  </div>
                                </div><!--cierro el div del row-->
                              </div><!--cierro el div del 1onteiner-->
                            </div>
                          </div><!-- cierro cupocu-->
                        </div><!-- cierro Tab panes-->

                      </div><!--cierre div de las pestañas-->
                           
      

                  </div>
                </div>
              </div>
            </div>
          </div>
        </div><!-- /.box-body -->
        <div class="modal-footer">
        
        <!--  <button type="button" class="btn btn-danger btn-sm delete" onclick="limpiar()">Cancelar</button>
       
          <button type="button" class="btn btn-primary btn-sm" data-dismiss="modal" onclick="guardar()" >Guardar</button>-->
        </div>  <!-- /.modal footer -->
 

      </div><!-- /.box -->
    </div><!-- /.col -->
  </div><!-- /.row -->
</section><!-- /.content -->
<script>
var globlir= "";
var tar= "";
var globliq= "";
var acum=0;


 $('#listado').click( function cargarVista(){
    WaitingOpen();
    $('#content').empty();
    $("#content").load("<?php echo base_url(); ?>index.php/Liquida/index/<?php echo $permission; ?>");
    WaitingClose();
  });

$('#tarjeta').change(function(){

    $('#liquida').html('');
    var tarjetaid = $(this).val();
    tar= tarjetaid;
    console.log("El id de tarjeta es:");
    console.log(tarjetaid);
    console.log(tar);
    $.ajax({
      type: 'POST',
      data: { tarjetaid:tarjetaid}, 
      url: 'index.php/Liquida/getliquida', //index.php/
      success: function(data){
 
              console.log(data);
              console.log(data[0]['codigo']);
              var opcion  = "<option value='-1'>Seleccione...</option>" ; 
              $('#liquida').append(opcion);
              for(var i=0; i < data.length ; i++) 
              {     

               // $('select#liquida').append($('<option />', { value: data[0]['tarjetaid'], text: data[0]['codigo']}));
                var nombre = data[i]['codigo'];
                var opcion  = "<option value='"+data[i]['liquidaid']+"'>" +nombre+ "</option>" ; 

                $('#liquida').append(opcion); 
                                   
              }
           
          
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
    globliq= liquida;
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
              $('#retencion').val(data['datos'][0]['retencion']);
              $('#montode').val(data['deposito'][0]['depmonto']);
              $('#fechade').val(data['deposito'][0]['depfecha']);
              $('#bancode1').val(data['deposito'][0]['bancdescrip']);
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
          
            traer_cupon(tar);//traer cupones en curso sobre esa tarjeta
           
      },
      error: function(result){
                
              console.log(result);
            },
            dataType: 'json'
      });
}); 

$('#cuponc').change(function(){
 
 $('#tablacupon tbody tr').remove(); //ESTE PERMITE UNA SOLO TR 
   
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
                  //<i class='fa fa-times-circle' style='color: #A9A9A9 '; cursor: 'pointer' title='Eliminar'></i>

          /*  $(document).on("click",".fa-times-circle",function(){
                  
              $.ajax({
                      type: 'POST',
                      data: { idtarea: idtarea},
                      url: 'index.php/Otrabajo/EliminarTarea', //index.php/
                      success: function(data){
                              console.log("TAREA ELIMINADA");
                              console.log(data);
                              //alert("ORDEN DE TRABAJO Eliminada");
                              regresa1();
                            
                            },
                        
                      error: function(result){
                            console.log(result);
                         }
              });
            });*/

         /*   var idscon = new Array();     
            $("#tablacupon tbody tr").each(function (index) 
            {
                var i= $(this).attr('id');
                idscon.push(i);            

            }); 

            $.ajax({
              type: 'POST',
              data: { idscon:idscon, cuponid:cuponid },
              url: 'index.php/Liquida/guardar_cupon',  //index.php/
              success: function(data){
                      console.log("exito");
                      console.log(data);
                     // alert("LIQUIDACION GUARDADA");
                      regresa1();
                                            
                      },
              error: function(result){
                      console.log("entro por el error");
                      console.log(result);

                    }
                   // dataType: 'json'
            });*/
               
          
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


$('#agregar').click(function (e) {
  
    var $liq = $("select#liquida option:selected").html(); 
    console.log("El id de liquidacion es:");
    console.log(globlir);
    console.log("El codigo de liquidacion es:");
    console.log($liq);

    $('#liquiddep').val($liq);  
    
});

  
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
//traer_cupon();

function traer_cupon(tar){
  console.log("Estoy trayecd todo los cuponesen curso ");
  console.log("El id de tarjeta es:");
  console.log(tar);
  $('#cuponc').html(''); 
  $.ajax({
    type: 'POST',
    data: { tar:tar },
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

traer_concepto();
function traer_concepto(){
  $.ajax({
    type: 'POST',
    data: { },
    url: 'index.php/Liquida/getconcepto', //index.php/
    success: function(data){
      var opcion  = "<option value='-1'>Seleccione...</option>" ; 
      $('#concepto').append(opcion);

       
      for(var i=0; i < data.length ; i++) 
      {   
         
          var nombre = data[i]['descripcion'];
          var opcion  = "<option value='"+data[i]['id_concepto']+"'>" +nombre+ "</option>" ;
          $('#concepto').append(opcion); 
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

function guardardepos(){ 
       
  console.log("estoy guardando deposito");
  var bancoid= $('#bancodep').val();
  var bancode = $("select#bancodep option:selected").html(); 
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
  console.log(bancode);
  
  var hayError = false;

  if(parametros !=0){
    //&& depo !=0 && idsinsumo >0 && comp >0
    $.ajax({
      type: 'POST',
      data: {parametros:parametros},
      url: 'index.php/Liquida/guardardeposito',  //index.php/
      success: function(data){
              console.log("exito en guardar deposito");
              console.log(data);
              //regresa1(); var depo 
            // $('select#bancodep').append($('<option />', { text: bancode }));
            $('#bancode1').val(bancode);
                                    
              },
      error: function(result){
              console.log("entro por el error");
              console.log(result);

            }
           // dataType: 'json'
    });
    //limpiar();
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
              regresa1();
                                    
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

function pasar_liquidado(){ 

  var idscon = new Array();     
  $("#tablacupon tbody tr").each(function (index){
      var i= $(this).attr('id');
      idscon.push(i);            

  });
  console.log(idscon);  
  $.ajax({
            type: 'POST',
            data: { idscon:idscon },
            url: 'index.php/Liquida/guardar_cupon',  //index.php/
            success: function(data){
                    console.log("exito");
                    
                    
                     console.log(data);
                     //alert(data);

                    // var datos= parseInt(data);
                    // alert("LIQUIDACION GUARDADA");
                    //regresa1();
                    //actualizar_cupon(idscon);
                  cupon_liquidado(data);
                                          
                    },
            error: function(result){
                    console.log("entro por el error");
                    console.log(result);
                    //cupon_liquidado(result);



                  },
                  dataType: 'json'
  });
 
}

function cupon_liquidado(data){ 

  //$('#cuponc').val('-1'); 
 // $('#cuponc').html(""); 
  $('#tablacupon tbody tr').remove();
 // traer_cupon();
  $.ajax({
        type: 'POST',
        data: { data:data},
        url: 'index.php/Liquida/ActualizoTabla',  //index.php/
        success: function(data){
                console.log("exito");
                                     
               //var datos= parseInt(data);
                console.log(data);
                for (var i = 0; i < data.length; i++) {  
                     var tabla = "<tr  id='"+data+"' >"+
                                  "<td ></td>"+
                                   "<td>"+data[i]['cuponnro']+"</td>"+
                                   "<td>"+data[i]['cuponfech']+"</td>"+
                                    "<td>"+data[i]['cuponmonto']+"</td>"+

                                "</tr>";
                $('#tablac tbody').append(tabla);
                }
                $.ajax({
                    type: 'POST',
                    data: { tar:tar},
                    url: 'index.php/Liquida/Actualizototalcupo',  //index.php/
                    success: function(data){
                            console.log("exito en actualizzar total de cupon ");
                                                 
                           //var datos= parseInt(data);
                            console.log(data[0]['totalcup']);

                            $('#totalcupo').val(data[0]['totalcup']);
                           
                                                  
                            },
                    error: function(result){
                            console.log("entro por el error");
                            console.log(result);

                          },
                          dataType: 'json'
                });

               
                                      
                },
        error: function(result){
                console.log("entro por el error");
                console.log(result);

              },
              dataType: 'json'
    });

}


function guardarretencion(){ 
      
  console.log("estoy guardando retencion");
  console.log("Talbla concepto y monto");
  console.log(comp);
  console.log("Id liquida");
  console.log(globliq);
  console.log("Suma total");
  console.log(acum);
  $('#tablaretencion').remove();
  
  $.ajax({
    
        type: 'POST',
        data: {comp:comp, globliq:globliq, acum:acum},
        url: 'index.php/Liquida/guardaretencion',  //index.php/
       success: function(data){
              console.log("exito en guardar retencion ");
              console.log(data[0]['totalr']);
              var totalr= data[0]['totalr'];
              $('#retencion').val(totalr);   
             $.ajax({
                      type: 'POST',
                      data: {globliq:globliq, totalr:totalr},
                      url: 'index.php/Liquida/AcualizarLiquida',  //Actualizo el monto total de liquidacion 
                     success: function(data){
                            console.log("exito en actualizar liquidacion ");
                            console.log(data);
                  
                              },
                     error: function(result){
                             console.log("entro por el error");
                             console.log(result);

                           }
                          // dataType: 'json'
              });                   
                },
       error: function(result){
               console.log("entro por el error");
               console.log(result);

             },
             dataType: 'json'
    });
    
}

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

//agrega insumos a la tabla detainsumos
var i=1;


$('#agregarete').click(function (e) {
   
  var $concepto = $("select#concepto option:selected").html(); 
  var id_concepto= $('#concepto').val();
  var montor = $('#montorete').val();
  
  var tr = "<tr id='"+id_concepto+"'>"+
              "<td ><i class='fa fa-ban elirow' style='color: #f39c12'; cursor: 'pointer' title='Eliminar'></i></td>"+
              "<td>"+$concepto+"</td>"+ //$codigo
              "<td>"+montor+"</td>"+
                
            "</tr>";
           
  console.log(tr);
  console.log("El id de concepto es :"+ id_concepto);
  console.log("La descripcion de concepto es:" +$concepto);
  console.log("Monto:" + montor);
  $('#tablaretencion tbody').append(tr);
  comp = {};
  acum=0;
  //var i=1;
    $("#tablaretencion tbody tr").each(function (index) 
        {
            var campo1, campo2, campo3, campo4, campo5;
             var i=1;

            
              var id_c= $(this).attr('id'); 
              console.log(id_c);
              
              
            $(this).children("td").each(function (index2) 
            {
               
                if (index2) {
                  //campo5 = $(this).text();
                 comp[id_c]=$(this).text();
              

                }

                
            });
            campo1= comp[i];
            acum= (parseInt(acum) + parseInt(campo1));
            i++;

       
          
          
         // console.log(comp);


    });
  console.log(comp);
  console.log(acum);
  $('#totalret').val(acum);
  $('#concepto').val('');
  $('#montorete').val(''); 
   
  $(document).on("click",".elirow",function(){
    var parent = $(this).closest('tr');
    $(parent).remove();
    $('#totalret').val('');
    acum=0;
    $("#tablaretencion tbody tr").each(function (index) {
          var campo1, campo2, campo3, campo4, campo5;
          var i=1;
          //acum=0;
          
          var id_c= $(this).attr('id'); 
          console.log(id_c);
               
          $(this).children("td").each(function (index2) {
             
              if (index2) {

               comp[id_c]=$(this).text();
          
              }

              
          });
          campo1= comp[i];
          acum= (parseInt(acum) + parseInt(campo1));
          i++;

    });
    $('#totalret').val(acum);
    console.log("El arreglo es:");
    console.log(comp);
    console.log("El total de la retencion es:");
    console.log(acum); 

  });
  
});

function format(input)
{
  var num = input.value.replace(/\./g,'');
  if(!isNaN(num)){
  num = num.toString().split('').reverse().join('').replace(/(?=\d*\.?)(\d{3})/g,'$1.');
  num = num.split('').reverse().join('').replace(/^[\.]/,'');
  input.value = num;
  }
   
  else{ alert('Solo se permiten numeros');
  input.value = input.value.replace(/[^\d\.]*/g,'');
  }
}

function regresa(){

  WaitingOpen();
  $('#content').empty();
  $("#content").load("<?php echo base_url(); ?>index.php/Liquida/index/<?php echo $permission; ?>");
  WaitingClose();
}

function regresa1(){

  WaitingOpen();
  $('#content').empty();
  $("#content").load("<?php echo base_url(); ?>index.php/Liquida/cargavista/<?php echo $permission; ?>");
  WaitingClose();
}


</script>
<!-- Modal deposito-->
 <div class="modal fade" id="modalagregar" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
  <div class="modal-dialog modal-lg" role="document" style="width: 40%">
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
        <h4 class="modal-title"  id="myModalLabel"><span id="modalAction" class="fa fa-plus-square" style="color: #008000"> </span>  Agregar Deposito </h4>
       </div> <!-- /.modal-header  -->

      <div class="modal-body input-group ui-widget" id="modalBodyArticle">     
        <div class="row" >
          <div class="col-sm-12 col-md-12">                              
            <div class="col-xs-12"><h4>Código <strong style="color: #dd4b39">*</strong>: </h4>
              <input type="text"  id="codigodep"  name="codigodep" placeholder="Ingrese Codigo" class="form-control input-md" size="30"/>
            </div>
            <div class="col-xs-12"><h4>Fecha <strong style="color: #dd4b39">*</strong>: </h4>
              <input type="date"  id="fechadep"  name="fechadep" class="form-control input-md" size="30"/>
            </div>
            <div class="col-xs-12"><h4>Monto <strong style="color: #dd4b39">*</strong>: </h4>
              <input type="text"  id="montodep"  name="montodep" onkeyup="format(this)" onchange="format(this) " placeholder="Ingrese Monto..." class="form-control input-md" size="30"/>
            </div>
             <div class="col-xs-12"><h4>Banco <strong style="color: #dd4b39">*</strong>: </h4>
              <select  id="bancodep"  name="bancodep"  class="form-control " value="" ></select>
            </div>
             <div class="col-xs-12"><h4>Liquidación <strong style="color: #dd4b39">*</strong>: </h4>
              <!--<select  id="liquiddep"  name="liquiddep" class="form-control" ></select>-->
              <input type="text" id="liquiddep"  name="liquiddep"  class="form-control " disabled>
            </div>                    
          </div>
        </div>
      </div>
       

      <div class="modal-footer">  
        <button type="button" class="btn btn-primary btn-sm" data-dismiss="modal" onclick="guardardepos()" >Guardar</button>
      </div>  <!-- /.modal footer -->
    </div>  <!-- /.modal-body -->
  </div> <!-- /.modal-content -->
</div>  <!-- /.modal-dialog modal-lg -->
</div>  <!-- /.modal fade -->
<!-- / Modal -->

<!-- Modal nueva liquidacion-->
 <div class="modal fade" id="modalaliquida" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
  <div class="modal-dialog modal-lg" role="document" style="width: 40%">
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
        <h4 class="modal-title"  id="myModalLabel"><span id="modalAction" class="fa fa-plus-square" style="color: #008000"> </span>  Agregar Nueva Liquidación </h4>
      </div> <!-- /.modal-header  -->

      <div class="modal-body input-group ui-widget" id="modalBodyArticle">      
        <div class="row" >
          <div class="col-sm-12 col-md-12">
            <div class="col-xs-12"><h4>Tarjeta <strong style="color: #dd4b39">*</strong>: </h4>
              <input type="text" id="tarjetaliq"  name="tarjetaliq"  class="form-control " disabled>
            </div>                          
            <div class="col-xs-12"><h4>Código <strong style="color: #dd4b39">*</strong>: </h4>
              <input type="text"  id="codigoliq"  name="codigoliq" placeholder="Ingrese Codigo" class="form-control input-md" size="30"/>
            </div>
            <div class="col-xs-12"><h4>Fecha <strong style="color: #dd4b39">*</strong>: </h4>
              <input type="date"  id="fechaliq"  name="fechadep" class="form-control input-md" size="30"/>
            </div>
            <div class="col-xs-12"><h4>Monto <strong style="color: #dd4b39">*</strong>: </h4>
              <input type="text"  id="montoliq"  name="montodep" onkeyup="format(this)" onchange="format(this) " placeholder="Ingrese Monto..." class="form-control input-md" size="30"/>
            </div>
            <!-- <div class="col-xs-12"><h4>Tarjeta <strong style="color: #dd4b39">*</strong>: </h4>
              <select  id="tarjetaliq"  name="tarjetaliq"  class="form-control "></select>
            </div>-->
    
          </div>
        </div>
      </div>
      <div class="modal-footer">      
        <button type="button" class="btn btn-primary btn-sm" data-dismiss="modal" onclick="guardarLiquida()" >Guardar</button>
      </div>  <!-- /.modal footer -->
    </div>  <!-- /.modal-body -->
  </div> <!-- /.modal-content -->
</div>  <!-- /.modal-dialog modal-lg -->
</div>  <!-- /.modal fade -->
<!-- / Modal -->

<!-- Modal nueva retencion-->
 <div class="modal fade" id="modalretencion" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
  <div class="modal-dialog modal-lg" role="document" style="width: 40%">
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
        <h4 class="modal-title"  id="myModalLabel"><span id="modalAction" class="fa fa-plus-square" style="color: #008000"> </span>  Agregar Nueva Retención </h4>
      </div> <!-- /.modal-header  -->

      <div class="modal-body input-group ui-widget" id="modalBodyArticle">      
        <div class="row" >
          <div class="col-sm-12 col-md-12">
            <div class="col-xs-4"><h4><label>Concepto <strong style="color: #dd4b39">*</strong>:</label> </h4>
              <select  id="concepto"  name="concepto"  class="form-control " value=""></select>
            </div>                          
            
            <div class="col-xs-4"><h4><label>Monto <strong style="color: #dd4b39">*</strong>: </label></h4>
              <input type="text"  id="montorete"  name="montorete" onkeyup="format(this)" onchange="format(this) " placeholder="Ingrese Monto..." class="form-control input-md" size="30"/>
            </div>
            <br>
            <br>
            <div class="col-xs-4">
              <button type="button" class="btn btn-success" id="agregarete" ><i class="fa fa-plus">   Agregar </i></button>
            </div>
            <br>
            <br>
           
              <div class="text-center">
                <!--<div class="row">
                  <div class="col-xs-10 col-xs-offset-1">-->
                    <table class="table table-bordered " id="tablaretencion" align="text-center"> 
                      <thead >
                        <tr>                      
                        <br>
                          <th width="10%"></th>
                          <th width="35%" style="text-align: center">Concepto</th>
                          <th width="35%" style="text-align: center">Monto</th>
                       
                        </tr>
                      </thead>
                      <tbody></tbody>
                    </table>  
                    </div>
                  <!--</div>
                </div>-->
           
            <div class="col-xs-12"><h4><label>TOTAL:</label> </h4>
               <!-- <input type="text"  id="montoliq"  name="montodep" placeholder="Ingrese Monto" class="form-control input-md" size="30"/>
              </div>-->  
              <div class="input-group">
                <span class="input-group-addon">$</span>
                <input type="text" class="form-control" id="totalret"  name="totalret"  placeholder="0.00" aria-label="Amount (to the nearest dollar)">
                
              </div>
            </div>
    
          </div>
        </div>
      </div>
      <div class="modal-footer">               
        <button  type="button" class="btn btn-primary"  data-dismiss="modal" onclick="guardarretencion()" >Guardar</button>     
      </div>  <!-- /.modal footer -->
    </div>  <!-- /.modal-body -->
  </div> <!-- /.modal-content -->
</div>  <!-- /.modal-dialog modal-lg -->
</div>  <!-- /.modal fade -->
<!-- / Modal -->