<input type="hidden" id="permission" value="<?php echo $permission; ?>">
<section class="content">
  <div class="row">
    <div class="col-sm-12 col-md-12">

      <div class="box">
        <div class="box-header">
          <h3 class="box-title">Orden de Pago</h3>
          <!-- <button class="btn btn-block btn-success" style="width: 100px; margin-top: 10px;" id="listado">Ver Listado</button> -->
        </div><!-- /.box-header -->
        <div class="box-body">

          <div role="tabpanel" class="tab-panel">
            <div class="form-group">
              <div class="panel panel-default">
                <div class="panel-heading">
                  <h2 class="panel-title">Proveedores</h2>
                </div>
                <div class="panel-body">
                  <form id="proveedor">  
                    <div class="tab-content">
                      <div role="tabpanel" class="tab-pane active" id="tabpanelProveedores">
                        <div class="row">
                          <div class="col-xs-12">
                            <div class="col-xs-6"><label>Proveedor: </label>
                              <select id="selectProveedor" name="Proveedor" class="form-control input-sm select2">
                                <option value="-1">Seleccione...</option>
                                <?php
                                foreach($proveedores as $prov)
                                {
                                  echo '<option value="'.$prov['provid'].'"
                                    data-cuit="'.$prov['provcuit'].'"
                                    data-estado="'.$prov['provestado'].'"
                                  >'.$prov['provnombre'].'</option>';
                                }
                                ?>
                              </select>
                              <!-- <input type="hidden" id="id_proveedor" name="id_proveedor"> -->
                            </div><!-- /.col-xs-6 -->
                            <div class="col-xs-6">
                              <label style="display:block">Razón social:
                                <input type="text" class="form-control input-sm" id="razonSocial">
                              </label>
                            </div><!-- /.col-xs-6 -->
                          </div><!-- /.col-xs-12 -->
                          <div class="col-xs-12">
                            <div class="col-xs-6">
                              <label style="display:block">CUIT:
                                <input type="text" class="form-control input-sm" id="cuit">
                              </label>
                            </div><!-- /.col-xs-6 -->
                            <div class="col-xs-6">
                              <label style="display:block">Condición:
                                <input type="text" class="form-control input-sm" id="condicion">
                              </label>
                            </div><!-- /.col-xs-6 -->
                          </div><!-- /.col-xs-12 -->
                        </div><!-- /.row -->
                      </div><!-- /.tabpanel -->
                    </div><!-- /.tab-content -->
                  </form>  
                </div><!-- /.panel-body -->
              </div><!-- /.panel-default -->
            </div><!-- /.form-group -->
          </div><!-- /.tab-panel -->

           <div role="tabpanel" class="tab-panel">
            <div class="form-group">
              <div class="panel panel-default">
                <div class="panel-heading">
                  <h2 class="panel-title">Facturas Asociadas</h2>
                </div>
                <div class="panel-body">
                  <div class="tab-content">
                    <div role="tabpanel" class="tab-pane active" id="tabpanelFactura">
                      <!-- tabla-->
                        <div class="row" >
                          <div class="col-sm-12 col-md-12">
                            <form id = "form_factura">
                              <table class="table table-bordered tabFacturas" id="tabFacturas" border="1px">
                                <thead>
                                   <tr>   
                                    <th width="2%"></th>                   
                                    <th>Nº Factura</th>
                                    <th>Fecha</th>
                                    <th>Tipo</th>                                            
                                    <th>Tipo comprobante</th>
                                    <th>Total</th> 
                                    <!-- <th>Estado</th>  -->                                          
                                  </tr>
                                </thead>
                                <tbody>
                                </tbody>
                              </table>
                            </form>  
                          </div>
                        </div>
                      <!-- / tabla--> 
                    </div><!-- /.tabpanel -->
                  </div><!-- /.tab-content -->
                </div><!-- /.panel-body -->

                <!-- <div id="suma" class="row">
                    <div class="col-lg-12">
                      <h4 class="col-md-3 pull-right" id="monto"></h4>
                      
                    </div>
                    <div class="clearfix"></div>
                </div> -->

                <div class="row">
                  <div class="col-md-offset-9">  
                    <form class="form-inline">
                      <div class="form-group">
                        <label for="montoTotal">TOTAL $</label>
                        <input type="text" class="form-control" id="monto" placeholder="0.00">
                      </div>
                    </form>
                  </div>  
                </div>



                <div class="modal-footer">
                  <button type="button" class="btn btn-success btn-sm" onclick="javascript:Sumar()">Total Facturas</button>
                  <!-- <button type="button" class="btn btn-default" id="btnCancelarForm">Cancelar</button>
                  <button type="button" class="btn btn-primary" id="btnGuardarForm">Guardar</button> -->
                </div>

              </div><!-- /.panel-default -->
            </div><!-- /.form-group -->
          </div><!-- /.tab-panel -->

          <div class="row">
            <div class="col-xs-12">
              <div class="alert alert-danger alert-dismissable" id="error" style="display: none">
                    <h4><i class="icon fa fa-ban"></i> Error!</h4>
                    Revise que todos los campos esten completos                    
                </div>
            </div>
          </div>

          <div class="row">
            <div class="col-xs-12">
              <div class="alert alert-danger alert-dismissable" id="error_totales" style="display: none">
                    <h4><i class="icon fa fa-ban"></i> Error!</h4>
                    Los Totales de Facturas y de Pagos deben coincidir...                    
                </div>
            </div>
          </div>



          <!-- Cheques -->                                          
          <div class="col-sm-6 col-md-6">
            <div class="panel-group" id="accordion" role="tablist" aria-multiselectable="true">
              <div class="panel panel-default">
                <div class="panel-heading" role="tab" id="headingOne">
                  <h4 class="panel-title">
                    <a role="button" data-toggle="collapse" data-parent="#accordion" href="#collapseOne" aria-expanded="true" aria-controls="collapseOne">
                      Cheques de Terceros
                    </a>
                  </h4>
                </div>
                <div id="collapseOne" class="panel-collapse collapse in" role="tabpanel" aria-labelledby="headingOne">
                  <div class="panel-body">
                    <div class="col-xs-6"><label>Cheque Nº: </label>
                        <select id="cheqterc" name="" class="form-control select2" />
                    </div>
                    <table class="table table-bordered tabcheqTerc" id="tabcheqTerc" border="1px">
                      <thead>
                         <tr>   
                          <th width="2%"></th>                   
                          <th>Nº</th>
                          <th>Banco</th>
                          <th>Cliente</th>                                            
                          <th>fecha</th>
                          <th>Importe</th> 
                          <!-- <th>Estado</th>  -->                                          
                        </tr>
                      </thead>
                      <tbody>
                      </tbody>
                    </table>
                    <!-- <div class="modal-footer">
                      <button type="button" class="btn btn-success btn-sm" onclick="javascript:SumarTblCheqTerc()">Total Cheques</button>
                    </div> -->
                  </div>
                </div>
                
              </div>
              <div class="panel panel-default">
                <div class="panel-heading" role="tab" id="headingTwo">
                  <h4 class="panel-title">
                    <a class="collapsed" role="button" data-toggle="collapse" data-parent="#accordion" href="#collapseTwo" aria-expanded="false" aria-controls="collapseTwo">
                      Cheques Propios
                    </a>
                  </h4>
                </div>
                <div id="collapseTwo" class="panel-collapse collapse" role="tabpanel" aria-labelledby="headingTwo">
                  <div class="panel-body">
                    
                    <div class="col-xs-6"><label>Cheque Nº: </label>
                        <select id="cheqprop" name="" class="form-control select2" />
                    </div>
                    <table class="table table-bordered tabcheqPropio" id="tabcheqPropio" border="1px">
                      <thead>
                         <tr>   
                          <th width="2%"></th>                   
                          <th>Nº</th>                                                                     
                          <th>Fecha Venc.</th>
                          <th>Importe</th> 
                          <th>Estado</th>                                          
                        </tr>
                      </thead>
                      <tbody>
                      </tbody>
                    </table>
                    <!-- <div class="modal-footer">
                      <button type="button" class="btn btn-success btn-sm" onclick="javascript:SumarTblCheqPropios()">Total Cheques</button>
                    </div> -->


                  </div>
                </div>
              </div>  
            </div>
          </div>
          <!-- / Cheques -->

          <!-- Inputs de Sumas -->
          <div class="col-sm-6 col-md-6">
            <label for="basic-url">Cheques de Terceros</label>
            <div class="input-group">
              <span class="input-group-addon" id="basic-addon3">$</span>
              <input type="text" class="form-control" id="totalCheqTerceros" value="0.00" aria-describedby="basic-addon3">
            </div>
            <label for="basic-url">Cheques Propios</label>
            <div class="input-group">
              <span class="input-group-addon" id="basic-addon3">$</span>
              <input type="text" class="form-control" id="totalCheqPropios" value="0.00" aria-describedby="basic-addon3">
            </div>
            <label for="basic-url">Efectivo</label>
            <div class="input-group">
              <span class="input-group-addon" id="basic-addon3">$</span>
              <input type="text" class="form-control" id="efectivo" value="0.00" aria-describedby="basic-addon3">
            </div><br>
            <div class="row">
              <div class="col-md-offset-6">  
                <form class="form-inline">
                  <div class="form-group">
                    <label for="montoTotal">TOTAL $</label>
                    <input type="text" class="form-control" id="montoTotal" placeholder="0.00">
                  </div>
                </form>
              </div>  
            </div>
          <div class="modal-footer">

              <button type="button" class="btn btn-success btn-sm" onclick="javascript:sumarSubtotales()">Monto Total</button>
          </div>
          </div>
          <!-- / Inputs de Sumas -->

          <div class="col-sm-12 col-md-12">
            <div class="modal-footer">
              
              <button type="button" class="btn btn-default" id="btnCancelarForm">Cancelar</button>
              <button type="button" class="btn btn-primary" id="btnGuardarForm" onclick="javascript:guardar()">Guardar</button>
            </div>
          </div>

        </div><!-- /.box-body -->
      </div><!-- /.box -->

    </div><!-- /.col-sm-12 .col-md-12 -->
  </div><!-- /.row -->
</section><!-- /.content -->

<script>
$(function() {
  /* habilita plugin datepicker en campo fecha */
  $( "#dateFecha" ).datepicker({
    dateFormat: 'yy-mm-dd',
  });

    /* cargo parametros al seleccionar el proveedor */
  $("#selectProveedor").on("change", function() {
      //si option value != -1
      $("#razonSocial").val( $("#selectProveedor option:selected").text() );
      $("#cuit").val( $("#selectProveedor option:selected").data("cuit") );

      // elimino la opcion seleccionar (para no tener que validar al guardar si hay proveedor)
      $("#selectProveedor option[value='-1']").remove();

      var estadoText = $("#selectProveedor option:selected").data("estado");
      if (estadoText == '8') {
        estadoText = 'Activo';
      } else if (estadoText == '9') { estadoText = 'Inactivo'; }
        else { estadoText = 'Suspendida';
      }
      $("#condicion").val( estadoText );

      var id = $("#selectProveedor").val();

        // trae factura del proveedor y llena tabla
      $.ajax({
            'data' : {idproveedor : id },
            'async': true,
            'type': "POST",
            'global': false,
            'dataType': 'json',
            'url': "Ordenpago/factPorProveedorList",
            'success': function (data) {
               //alert(data[0]['facNumero']);
               llenarTabla(data);                                 
            },
            'error': function(data){
              console.log("No hay componentes asociados en BD");
            }
      });
  });
  
  // Trae Cheques de terceros y llena Select
  $(function(){  

      $.ajax({
            type: 'POST',
            //data: { },
            url: 'index.php/Ordenpago/getChequesTercero', 
            success: function(data){               
                    
                    var opcion  = "<option value='-1'>Seleccione Nº Cheque...</option>" ; 
                    $('#cheqterc').append(opcion);                 
                    
                    for(var i=0; i < data.length ; i++){ 
                        //var nombre = data[i]['codigo'];
                        var opcion  = "<option value='"+data[i]['id_che']+"'>" +data[i]['numero']+ "</option>" ; 
                        $('#cheqterc').append(opcion);                                   
                    }
                  },
            error: function(result){              
                  console.log(result);
                },
               dataType: 'json'
      });
  }); 

  // Al seleccionar cheque de terceros trae datos llena tabla cheques terceros 
  $("#cheqterc").on("change", function() {
      var id = $("#cheqterc").val();
      $.ajax({
            type: 'POST',
            data: {id},
            url: 'index.php/Ordenpago/getChequesTerceroPorId', 
            success: function(data){               
                    llenarTblCheTerceros(data);
                    
                  },
            error: function(result){              
                  console.log(result);
                },
               dataType: 'json'
      });    
  });  

  // Trae Cheques Propios
  $(function(){  

      $.ajax({
            type: 'POST',
            url: 'index.php/Ordenpago/getChequePropio', 
            success: function(data){               
                    
                    var opcion  = "<option value='-1'>Seleccione Nº Cheque...</option>" ; 
                    $('#cheqprop').append(opcion);                 
                    
                    for(var i=0; i < data.length ; i++){ 
                        var opcion  = "<option value='"+data[i]['cheqid']+"'>" +data[i]['cheqnro']+ "</option>" ; 
                        $('#cheqprop').append(opcion);                                   
                    }
                  },
            error: function(result){              
                  console.log(result);
                },
               dataType: 'json'
      });
  });
  
  // Al seleccionar cheque Propios trae datos llena tabla cheques propios 
  $("#cheqprop").on("change", function() {
      var id = $("#cheqprop").val();
      $.ajax({
            type: 'POST',
            data: {id},
            url: 'index.php/Ordenpago/getChequePropioPorId', 
            success: function(data){ 

                    llenarTblChePropios(data);                    
                  },
            error: function(result){              
                  console.log(result);
                },
               dataType: 'json'
      });    
  });

  // Limpia el input efectivo
  $("#efectivo").on("click", function() {
    $(this).val("");
  });
});

  // Lena tabla con Facturas Segun Id de Proveedor
function llenarTabla(data){
  $("tr.tbl_facturas").remove();
  var tabla = $(".tabFacturas tbody");
  
  for (var i = 0; i<data.length ;  i++) {
    tabla.append(
      '<tr class="tbl_facturas">'+
      
      '<td><input type="checkbox" class="seleccionado" value="unchecked"  style="margin-left: 15px;"></input></td>'+
         //'<td class="hidden"><input name="id '+ i +'"></input></td>'+
         '<td class="hidden id_fact">'+data[i]['facId']+'</td>'+
         '<td class="">'+data[i]['facNumero']+'</td>'+
         '<td class="">'+data[i]['facFecha']+'</td>'+
         '<td class="">'+data[i]['facTipo']+'</td>'+         
         '<td class="">'+data[i]['facTipoComprobante']+'</td>'+
         '<td class="monto">'+data[i]['facTotal']+'</td>'+
      '<tr>'
    );
  }
}

  // Suma facturas 
var $montoTotal = 0;
function Sumar() {  

  var $row = $('#tabFacturas .seleccionado:checked').parents("tr").children("td.monto");
  //var $row = $("#tablacomprobante tbody").children("td.monto");       
  $("input#monto").val("");
  
  var $acumulador = 0;
  $row.each( function(){
    $acumulador += parseFloat($(this).html());
  });        
  console.log($acumulador);     
  $montoTotal = $acumulador.toFixed(2);
  $("input#monto").val($montoTotal);                      
} 

/////////////////   CHEQUES TERCEROS   ////////////////////
  // Llena la tabla ch de terceros y la suma
function llenarTblCheTerceros(data){
 
  var tabla = $(".tabcheqTerc tbody");
  
  for (var i = 0; i<data.length ;  i++) {
    tabla.append(
      '<tr class="tr_chqTerc">'+      
          '<td><i class="fa fa-ban elimrow" style="color: #f39c12; cursor: pointer; margin-left: 5px;"></i></td>'+
          '<td class="hidden id_che">'+data[i]['id_che']+'</td>'+
          '<td class="">'+data[i]['numero']+'</td>'+
          '<td class="">'+data[i]['bancdescrip']+'</td>'+
          '<td class="">'+data[i]['cliente']+'</td>'+         
          '<td class="">'+data[i]['fecha_vto']+'</td>'+
          '<td class="montoCheter">'+data[i]['monto']+'</td>'+                   
      '<tr>'
    );
  }  
  SumarTblCheqTerc();
}

  // Evento que selecciona la fila y la elimina, Suma nuevamnete la tabla 
$(document).on("click",".elimrow",function(){
    var parent = $(this).closest('tr');
    $(parent).remove();
    SumarTblCheqTerc();
});

  // Suma tabla cheques de terceros
var $montoChTerc = 0;
function SumarTblCheqTerc() {      
      
  var $row = $('#tabcheqTerc .elimrow').parents("tr").children("td.montoCheter");
  
  $("input#totalCheqTerceros").val("");
  var $acumulador = 0;
  $row.each( function(){
    $acumulador += parseFloat($(this).html());
  });        
  //console.log($acumulador);     
  $montoChTerc = $acumulador.toFixed(2);
  $("input#totalCheqTerceros").val($montoChTerc);                      
}

/////////////////   CHEQUES PROPIOS   ////////////////////
  // Llena la tabla ch propios y la suma
function llenarTblChePropios(data){

  var tabla = $(".tabcheqPropio tbody");
  
  for (var i = 0; i<data.length ;  i++) {
    tabla.append(
      '<tr class="tr_chqProp">'+      
          '<td><i class="fa fa-ban elimrow_chProp" style="color: #f39c12; cursor: pointer; margin-left: 5px;"></i></td>'+
          '<td class="hidden id_chPropio">'+data[i]['cheqid']+'</td>'+
          '<td class="">'+data[i]['cheqnro']+'</td>'+
          '<td class="">'+data[i]['cheqvenc']+'</td>'+
          '<td class="montoChepro">'+data[i]['cheqmonto']+'</td>'+      
          '<td class="">'+data[i]['cheqestado']+'</td>'+                  
      '<tr>'
    );
  } 
  SumarTblCheqPropios();
} 

 // Evento que selecciona la fila y la elimina, Suma nuevamnete la tabla
$(document).on("click",".elimrow_chProp",function(){
    var parent = $(this).closest('tr');
    $(parent).remove();
    SumarTblCheqPropios();
});

// Suma tabla cheques propios
var $montoChProp = 0;
function SumarTblCheqPropios() {      
  
  var $row_prop = $('#tabcheqPropio .elimrow_chProp').parents("tr").children("td.montoChepro");
  
  $("input#totalCheqPropios").val("");
  var $acumuProp = 0;
  $row_prop.each( function(){
    $acumuProp += parseFloat($(this).html());
  });        
  //console.log($acumuProp);     
  $montoChProp = $acumuProp.toFixed(2);
  $("input#totalCheqPropios").val($montoChProp);                      
}

//////// SUMA TOTALES, ARMA ARRAY Y ENVIA DATOS  ///////

function sumarSubtotales(){
  
  if ($("#efectivo").val()==""){
    $("#efectivo").val(0.00);
  } 
  var $totalPago = 0.00;
  var chPropios = $("input#totalCheqPropios").val(); 
  var chTerceros = $("input#totalCheqTerceros").val();
  var efect = $("input#efectivo").val();
  $totalPago = parseFloat(chPropios) + parseFloat(chTerceros) + parseFloat(efect);  
  $montoTotal = $totalPago.toFixed(2);
  parseFloat($montoTotal);
  $("input#montoTotal").val($montoTotal);
}

function factToArray() {  

  var arrayTable = []; // array para devolver
  var $row = $('#tabFacturas .seleccionado:checked').parents("tr").children("td.id_fact");
  
  $row.each( function(){
    var id_fact = $(this).html();
    item = {};
    item = id_fact;
    arrayTable.push(item);
  });   
  return arrayTable;   
} 

function cheqTercToArray(){
        
      var arrayTable = []; // array para devolver
      var tabla = $(".tabcheqTerc tbody tr");

      tabla.each(function(i){
         
          var id_chTercero = $(this).find("td.id_che ").html();
          var monto = $(this).find("td.montoCheter").html();          

          item = {};

          item["id_chTercero"] = id_chTercero;
          item["monto"] = monto;           

          arrayTable.push(item);
      });  
      return arrayTable;  
}

function cheqPropToArray(){
        
      var arrayTable = []; // array para devolver
      var tabla = $(".tabcheqPropio tbody tr");

      tabla.each(function(i){
         
          var id_chPropio= $(this).find("td.id_chPropio ").html();
          var monto = $(this).find("td.montoChepro").html();          

          item = {};

          item["id_chPropio"] = id_chPropio;
          item["monto"] = monto;           

          arrayTable.push(item);
      });  
      return arrayTable;
}

function guardar(){

  hayError = false;
  noCoincide = false;

    // si no selecciona facturas
  if($('#selectProveedor').val() == '-1'){
      //alert("tipo factura= -1");
      hayError = true;
  }
    // si no se sumaron las facturas seleccionadas
  if ($("#monto").val() == ""){
    hayError = true;
  } 
    // si los montos de factura y pago no coinciden
  if ( $("input#monto").val() !== $("input#montoTotal").val() ){    
    noCoincide = true;
  } 

  if(hayError == true){
      $('#error').fadeIn('slow');
      return;
  }

  $('#error').fadeOut('slow');

  if(noCoincide == true){
      $('#error_totales').fadeIn('slow');
      return;
  }

  $("#error_totales").fadeOut('slow');  
    

  if ($("#efectivo").val()==""){
    $("#efectivo").val(0.00);
  }  

  var fact = factToArray();
  var id_proveedor = $("select#selectProveedor").val();
  var monto = $("#monto").val();
  var efectivo = $("input#efectivo").val();
  var cheq_tercero = cheqTercToArray();
  var cheq_propio = cheqPropToArray();

  WaitingOpen("Guardando...");
  $.ajax({    
        data: {fact,
               id_proveedor,
               monto,
               efectivo,
               cheq_tercero,
               cheq_propio
             },
        type: 'POST',             
        dataType: 'json',
        url: 'index.php/Ordenpago/setOrdenPago',                
        success: function(result){                                                    
                WaitingClose("Guardado con Exito...");
                setTimeout("cargarView('Ordenpago', 'index', '"+$('#permission').val()+"');",0);
        },
        error: function(result){
                WaitingClose();                                                    
                alert("Error en guardado...");
        },
      });
}


</script>