<input type="hidden" id="permission" value="<?php echo $permission; ?>">
<section class="content">
  <div class="row">
    <div class="col-sm-12 col-md-12">

      <div class="box">
        <div class="box-header">
          <h3 class="box-title">Nueva Factura</h3>
          <button class="btn btn-block btn-success" style="width: 100px; margin-top: 10px;" id="listado">Ver Listado</button>
        </div><!-- /.box-header -->
        <div class="box-body">

          <div role="tabpanel" class="tab-panel">
            <div class="form-group">
              <div class="panel panel-default">
                <div class="panel-heading">
                  <h2 class="panel-title">Proveedores</h2>
                </div>
                <div class="panel-body">
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
                            <input type="hidden" id="id_proveedor" name="id_proveedor">
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
                </div><!-- /.panel-body -->
              </div><!-- /.panel-default -->
            </div><!-- /.form-group -->
          </div><!-- /.tab-panel -->

          <div role="tabpanel" class="tab-panel">
            <div class="form-group">
              <div class="panel panel-default">
                <div class="panel-heading">
                  <h2 class="panel-title">Factura</h2>
                </div>
                <div class="panel-body">
                  <div class="tab-content">
                    <div role="tabpanel" class="tab-pane active" id="tabpanelFactura">

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
                          <!--
                          NC = nota de compra
                          ND = nota de debito
                          RE = remito
                          -->
                          <div class="col-xs-2">
                            <input type="radio" name="radioTipoComprobante" value="FA" checked> Factura<br>
                          </div><!-- /.col-xs-2 -->
                          <div class="col-xs-2">
                            <input type="radio" name="radioTipoComprobante" value="NC"> Nota de Crédito<br>
                          </div><!-- /.col-xs-2 -->
                          <div class="col-xs-2">
                            <input type="radio" name="radioTipoComprobante" value="ND"> Nota de Débito<br>
                          </div><!-- /.col-xs-2 -->
                          <div class="col-xs-2">
                            <input type="radio" name="radioTipoComprobante" value="RE"> Remito<br>
                          </div><!-- /.col-xs-2 -->
                          <div class="col-xs-2 col-xs-offset-1">
                            <input type="checkbox" id="chkPagado" name="ckeckPagado" value="Pagada"> Pagado<br>
                          </div><!-- /.col-xs-2 -->
                        </div><!-- /.col-xs-12 -->

                      </div><!-- /.row -->
                      <br>
                      <div class="row">

                        <div class="col-xs-12">

                          <div class="col-xs-3">
                            <label style="display:block">Número:
                              <input type="text" id="txtNumeroFac" class="form-control input-sm" placeholder="<?php //echo
                              $lastIdFactura+1; ?>">
                            </label>
                          </div><!-- /.col-xs-3 -->
                          <div class="col-xs-3">
                            <label style="display:block">Tipo:
                              <select id="SelectTipoFac" name="SelectTipoFac" class="form-control input-sm select2">
                                <option value="-1">Seleccione...</option>
                                <option value="A">A</option>
                                <option value="B">B</option>
                                <option value="C">C</option>
                              </select>
                            </label>
                            <input type="hidden" id="id_equipo" name="id_equipo">
                          </div><!-- /.col-xs-3 -->
                          <div class="col-xs-3 col-xs-offset-3">
                            <label style="display:block">Fecha:
                              <input type="date" id="dateFecha" class="form-control input-sm" value='<?php echo date("Y-m-d");?>'>
                            </label>
                          </div><!-- /.col-xs-3 -->
                        </div><!-- /.col-xs-12 -->

                      </div><!-- /.row -->
                      <br>
                      <div class="row">

                        <div class="col-xs-12">
                          <div class="col-xs-6">
                            <label style="display:block">Subtotal ($):
                              <input type="number" class="form-control input-sm" id="txtSubtotal" placeholder="0">
                            </label>
                          </div><!-- /.col-xs-6 -->
                        </div><!-- /.col-xs-12 -->

                      </div><!-- /.row -->
                      <br>
                      <div class="row">

                        <div class="col-xs-12">
                          <div class="col-xs-3" style="display:inline-block; float:none;">
                            <label style="display:block">IVA (%):
                              <input type="number" class="form-control input-sm" id="txtIva" value="0">
                            </label>
                          </div><!-- /.col-xs-3 -->
                          <div class="col-xs-3" style="display:inline-block; float:none;">
                            <label style="display:block">IVA ($):
                              <input type="number" class="form-control input-sm" id="txtIva2" value="0">
                            </label>
                          </div><!-- /.col-xs-3 -->
                          <div class="col-xs-3" style="vertical-align:bottom; display:inline-block; float:none;">
                            <input type="button" class="btn btn-primary" id="btnIva2" value="+" >
                          </div><!-- /.col-xs-3 -->
                        </div><!-- /.col-xs-12 -->

                      </div><!-- /.row -->
                      <br>
                      <div class="row" id="RowIva2" style="display:none">

                        <div class="col-xs-12">
                          <div class="col-xs-3" style="display:inline-block; float:none;">
                            <label style="display:block">IVA2 (%):
                              <input type="number" class="form-control input-sm" id="txtOtroIva" value="0">
                            </label>
                          </div><!-- /.col-xs-3 -->
                          <div class="col-xs-3" style="display:inline-block; float:none;">
                            <label style="display:block">IVA2 ($):
                              <input type="number" class="form-control input-sm" id="txtOtroIva2" value="0">
                            </label>
                          </div><!-- /.col-xs-3 -->
                        </div><!-- /.col-xs-12 -->

                      </div><!-- /.row -->
                      <br>
                      <div class="row">

                        <div class="col-xs-12">
                          <div class="col-xs-3">
                            <label style="display:block">Ing. Brutos (%):
                              <input type="number" class="form-control input-sm" id="txtIngresosBrutos" value="0">
                            </label>
                          </div><!-- /.col-xs-3 -->
                          <div class="col-xs-3">
                            <label style="display:block">Ing. Brutos ($):
                              <input type="number" class="form-control input-sm" id="txtIngresosBrutos2" value="0">
                            </label>
                          </div><!-- /.col-xs-3 -->
                        </div><!-- /.col-xs-12 -->

                      </div><!-- /.row -->
                      <br>
                      <div class="row">
                        <div class="col-xs-12">
                          <div class="col-xs-3">
                            <label style="display:block">Retenciones (%):
                              <input type="number" class="form-control input-sm" id="txtRetenciones" value="0">
                            </label>
                          </div><!-- /.col-xs-3 -->
                          <div class="col-xs-3">
                            <label style="display:block">Retenciones ($):
                              <input type="number" class="form-control input-sm" id="txtRetenciones2" value="0">
                            </label>
                          </div><!-- /.col-xs-3 -->
                        </div><!-- /.col-xs-12 -->

                      </div><!-- /.row -->
                      <br>
                      <div class="row">

                        <div class="col-xs-12">
                          <div class="col-xs-12">
                            <label style="display:block">Neto ($):
                              <input type="number" class="form-control input-sm" id="txtTotal">
                            </label>
                          </div><!-- /.col-xs-6 -->
                        </div><!-- /.col-xs-12 -->

                      </div><!-- /.row -->

                    </div><!-- /.tabpanel -->
                  </div><!-- /.tab-content -->
                </div><!-- /.panel-body -->

                <div class="modal-footer">
                  <button type="button" class="btn btn-default" id="btnCancelarForm">Cancelar</button>
                  <button type="button" class="btn btn-primary" id="btnGuardarForm">Guardar</button>
                </div>

              </div><!-- /.panel-default -->
            </div><!-- /.form-group -->
          </div><!-- /.tab-panel -->

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

  /* desabilito los inputs de la seccion factura */
  $("#tabpanelFactura input, #tabpanelFactura select, #btnGuardarForm, #btnCancelarForm").attr("disabled", "disabled");


  /* cargo la vista que lista facturas */
  $("#listado, #btnCancelarForm").on("click", function(){
    cargarView('Factura', 'index', 'Add-Edit-Del-');
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

    // y activo la factura
    /*$("#tabpanelFactura input, #tabpanelFactura select, #btnGuardarForm, #btnCancelarForm").removeAttr("disabled");*/
    $("#tabpanelFactura input[type='radio'], #chkPagado, #tabpanelFactura select, #btnGuardarForm, #btnCancelarForm, #txtNumeroFac, #dateFecha, #txtSubtotal, #txtIva, #txtOtroIva, #txtIngresosBrutos, #txtRetenciones, #txtTotal, #btnIva2").removeAttr("disabled");
  });

  /* ver/ocultar iva2 */
  $("#btnIva2").on("click", function(){
    if( $("#RowIva2").css('display') === 'none' ) {
      $("#RowIva2").show(200);
      $(this).val("-");
    } else {
      $("#RowIva2").hide(200);
      $(this).val("+");
      $("#txtOtroIva, #txtOtroIva2").val(0);
      calcularMonto();
    }
  });

  /* permito solo un checkbox checkeado * /
  $("input:checkbox").on("click", function() {
    $("input:checkbox").not(this).prop('checked', false);
  });*/


  /* cargo parametros al seleccionar el proveedor */
  $('#txtSubtotal, #txtIva, #txtOtroIva, #txtIngresosBrutos, #txtRetenciones').keyup( function() {
    calcularMonto();
  });

  function calcularMonto(){
    //Obtengo el valor de los txt
    var subTotal       = parseFloat( $('#txtSubtotal').val() );
    var iva            = parseFloat( $('#txtIva').val() );
    var otroIva        = parseFloat( $('#txtOtroIva').val() );
    var ingresosBrutos = parseFloat( $('#txtIngresosBrutos').val() );
    var retenciones    = parseFloat( $('#txtRetenciones').val() );
    //Hago la operaciones matemáticas
    var iva2            = (iva/100)*subTotal;
    var otroIva2        = (otroIva/100)*subTotal;
    var ingresosBrutos2 = (ingresosBrutos/100)*subTotal;
    var retenciones2    = (retenciones/100)*subTotal;
    var total           = subTotal + iva2 + otroIva2 + ingresosBrutos2 + retenciones2;
    //Uso solo dos decimales
    subTotal            = subTotal.toFixed(2);
    iva2                = iva2.toFixed(2);
    otroIva2            = otroIva2.toFixed(2);
    ingresosBrutos2     = ingresosBrutos2.toFixed(2);
    retenciones2        = retenciones2.toFixed(2);
    total               = total.toFixed(2);
    //Cambio el textbox total
    $('#txtIva2').val(iva2);
    $('#txtOtroIva2').val(otroIva2);
    $('#txtIngresosBrutos2').val(ingresosBrutos2);
    $('#txtRetenciones2').val(retenciones2);
    $('#txtTotal').val(total);
  }


  /* guardo la factura */
  $("#btnGuardarForm").on("click", function(){

    hayError = false;
    if( ($('#txtNumeroFac').val() == '') || ($('#txtNumeroFac').val() == '0') )
    {
      //alert("nro factura= 0");
      hayError = true;
    }
    if($('#SelectTipoFac').val() == '-1')
    {
      //alert("tipo factura= -1");
      hayError = true;
    }
    if($('#dateFecha').val() == '')
    {
      //alert("fecha= vacia");
      hayError = true;
    }
    if( ($('#txtSubtotal').val() == '0') || ($('#txtSubtotal').val() == '') )
    {
      //alert("monto= vacia");
      hayError = true;
    }
    if( ($('#txtTotal').val() == '0') || ($('#txtTotal').val() == '') )
    {
      //alert("total= vacia");
      hayError = true;
    }

    if(hayError == true){
      $('#error').fadeIn('slow');
      return;
    }

    $('#error').fadeOut('slow');

    WaitingOpen('Guardando cambios');

    $.ajax({
      data: {
        facnumero          : $('#txtNumeroFac').val(),
        facfecha           : $('#dateFecha').val(),
        factipo            : $('#SelectTipoFac').val(),
        facproveedorid     : $('#selectProveedor').val(),
        facsubtotal        : $('#txtSubtotal').val(),
        faciva             : $('#txtIva2').val(),
        faciva2            : $('#txtOtroIva2').val(),
        facingresosbrutos  : $('#txtIngresosBrutos2').val(),
        facretenciones     : $('#txtRetenciones2').val(),
        factotal           : $('#txtTotal').val(),
        factipocomprobante : $('input[name=radioTipoComprobante]:checked').val(),
        facestado          : $('#chkPagado').prop('checked') ? 'P' : 'C'
      },
      dataType: 'json',
      type: 'POST',
      url: 'index.php/Factura/setFactura',
      success: function(result){
        WaitingClose();
        //alert("ok"+result);
        cargarView('Factura', 'index', $('#permission').val() );
      },
      error: function(){
        WaitingClose();
        alert("Error al guardar la factura");
      }
    });
  });

});
</script>