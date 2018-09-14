<input type="hidden" id="permission" value="<?php echo $permission;?>">
<section class="content"> 
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
      <div class="box">
        <div class="box-header">
          <h3 class="box-title">Reporte Cheques</h3>
        </div>
	         
	      <form class="form-inline" id="formCheques">
					
					<div class="box-body">  
					  	<div class="form-group">
						    
						    <div class="checkbox" style="margin-left: 20px;">
							    <label>
							      <!-- <input type="checkbox" class="check" id="selNumero"> -->
							    </label>
  							</div>
  						    <label for="buscNumero">Número</label>
  						    <input type="text" name="buscNumero" class="form-control buscNumero" placeholder="Buscar Numero..." id="buscNumero" style="width: 80%;">  						    
                  <input type="text" name="idCheque" class="hidden idCheque" id="idCheque">							
					  	</div>

              <div class="form-group">
                <div class="checkbox" style="margin-left: 20px;">
                  <label>
                    <!-- <input type="checkbox" class="check" id="selBanco"> -->
                  </label>
                </div>
                <label for="banco">Banco</label>
                  <select class="form-control banco" id="banco" name="banco" placeholder="Seleccione banco...">
                  <option value=""></option>                      
                </select>
              </div>
              </br> </br>

              <div class="form-group">
                <div class="checkbox" style="margin-left: 20px;">
                  <label>
                    <!-- <input type="checkbox" class="check" id="selProveedor"> -->
                  </label>
                </div>
                <label for="proveedor">Proveedor</label>
                  <select class="form-control proveedor" name="proveedor" id="proveedor" placeholder="Seleccione tipo...">
                  <option value=""></option>                      
                </select>
              </div>

					  	<div class="form-group">
						    <div class="checkbox" style="margin-left: 20px;">
							    <label>
							      <!-- <input type="checkbox" class="check" id="selEstado"> -->
							    </label>
							   </div>
						    <label for="estado">Estado</label>
						    	<select class="form-control estado" name="estado" id="estado" placeholder="Seleccione tipo...">
                  <option value="0"></option> 
                  <option value="1">En Curso</option>						  			  
                  <option value="2">Pagados</option>
								</select>		
					  	</div>					  
							</br> </br>		  

            <hr>
            <h4>Emitidos</h4> 
					  	<div class="form-group">
						    <div class="checkbox">
							    <label>
							      <!-- <input type="checkbox" class="check" id="selFechaEmit"> -->
							    </label>
  							</div>             
						    <label for="desde_emit">Desde</label>
						    <input type="text" class="form-control fecha fecha_emit check" name="desde_emit" id="desde_emit" placeholder="">
  						</div>  

						<div class="form-group" style="margin-left: 20px;">
							    <label for="hasta">Hasta</label>
							    <input type="text" class="form-control fecha fecha_emit check" name="hasta_emit" id="hasta_emit" placeholder="">
						</div>

            <hr>
            <h4>Vencidos</h4> 
            <div class="form-group">
                
                <div class="checkbox">
                  <label>
                    <!-- <input type="checkbox" class="check" id="selFechaVenc"> -->
                  </label>
                </div>
                <label for="desde_ven">Desde</label>
                <input type="text" class="form-control fecha fecha_ven check" name="desde_ven" id="desde_ven" placeholder="">
            </div>  

            <div class="form-group" style="margin-left: 20px;">
                  <label for="hasta_ven">Hasta</label>
                  <input type="text" class="form-control fecha fecha_ven check" name="hasta_ven" id="hasta_ven" placeholder="">
            </div> </br> </br>

						<button type="button" class="btn btn-default" id="consulta" onClick="javascript=consReporte()">Consultar</button>   
					</div>

          
				</form>

				<div id="tablaReportes"></div>
 		  
      <div class="box-body"> 
        <div class="panel panel-default">
  
  <div class="panel-heading">
    <h3 class="panel-title">Consulta</h3>
  </div>
  
  <div class="panel-body ">    

    <table id="servicio" class="table table-bordered table-hover">
        <thead>
            <tr>                                
                <th>Nro.</th>
                <th>Fecha Emisión</th>
                <th>Fecha Vencimiento</th>
                <th>Banco</th>
                <th>Proveedor</th>
                <th>Monto</th>
                <th>Estado</th>
            </tr>
        </thead>
        <tbody>
         <!--  <tr>
            <td style="text-align: left" > <input type="text" class="nro"> </td>
            <td style="text-align: left" id="fechEmis"></td>
            <td style="text-align: left" id="fechVenc"></td>
            <td style="text-align: left" id="bco"></td>
            <td style="text-align: left" id="prov"></td>
            <td style="text-align: left" id="mon"></td>
            <td style="text-align: left" id="estate"></td>
          </tr> -->
        </tbody>
    </table>

  </div> <!-- / panel-body -->
</div>
      </div>  
 	  
    </div>
 	</div>
</div>
</section>



<!-- Modal Error-->
<div class="modal fade" id="modalError" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
        <h4 class="modal-title" id="myModalLabel"><span id="modalAction"> </span> Error</h4> 
      </div>
      <div class="modal-body" id="modalBodyabonos">
        <p>Hay un Error en la consulta....</p>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-default" data-dismiss="modal">Aceptar</button>       
      </div>
    </div>
  </div>
</div>


<!-- Datepicker -->
<script>  
  $(".fecha").datepicker();
</script>

<!-- Habilitar y deshabilitar fecha sector y equipo-->
<script>

 //  $(function() {
 //    enabDisabNumero();
 //    $("#selNumero").click(enabDisabNumero);
 //  });
 //  function enabDisabNumero() {
 //    if (this.checked) {
 //      $("input#buscNumero").removeAttr("disabled");
 //    } else {
 //      $("input#buscNumero").attr("disabled", true);
 //      $("input#buscNumero").val('');
 //      $("#idCheque").val('');
 //    }
 //  }

 //  $(function() {
 //    enabDisabBanco();
 //    $("#selBanco").click(enabDisabBanco);
 //  });
 //  function enabDisabBanco() {
 //    if (this.checked) {
 //      $("select.banco").removeAttr("disabled");
 //    } else {
 //      $("select.banco").attr("disabled", true);
 //      $("select.banco").val('');
 //    }
 //  }

 //  $(function() {
 //    enabDisabProv();
 //    $("#selProveedor").click(enabDisabProv);
 //  });
 //  function enabDisabProv() {
 //    if (this.checked) {
 //      $("select#proveedor").removeAttr("disabled");
 //    } else {
 //      $("select#proveedor").attr("disabled", true);
 //      $("select#proveedor").val('');
 //    }
 //  }



 //  $(function() {
 //    enabDisabEstado();
 //    $("#selEstado").click(enabDisabEstado);
 //  });
 //  function enabDisabEstado() {
 //    if (this.checked) {
 //      $("select#estado").removeAttr("disabled");
 //    } else {
 //      $("select#estado").attr("disabled", true);
 //      $("select#estado").val('');
 //    }
 //  }

	// $(function() {
	//   enabDisabFechaEmit();
	//   $("#selFechaEmit").click(enabDisabFechaEmit);
	// });
	// function enabDisabFechaEmit() {
	//   if (this.checked) {
	//     $("input.fecha_emit").removeAttr("disabled");
	//   } else {
	//     $("input.fecha_emit").attr("disabled", true);
	//     $("input.fecha_emit").val('');
	//   }
	// }

 //  $(function() {
 //      enabDisabFechaVen();
 //      $("#selFechaVenc").click(enabDisabFechaVen);
 //    });
 //    function enabDisabFechaVen() {
 //      if (this.checked) {
 //        $("input.fecha_ven").removeAttr("disabled");
 //      } else {
 //        $("input.fecha_ven").attr("disabled", true);
 //        $("input.fecha_ven").val('');
 //      }
 //    }	

</script>




<script> 
  
  //Trae bancos 
  $(function() {
        
    $.ajax({                
            'async': false,
            'type': "POST",
            'global': false,
            'dataType': 'json',
            'url': "Cheqpropio/getBanco",
            'success': function (data) {
                //console.info(data);
                var $select = $("#banco");
                for (var i = 0; i < data.length; i++) {

                  $select.append($('<option />', { value: data[i]['bancid'], text: data[i]['bancdescrip'] }));
                }
             },
            'error' : function (data){
              console.log('Error en getEquiSector');
              //alert('error');
             }
    });
  });

  //Trae proveedores 
  $(function() {
        
    $.ajax({                
            'async': false,
            'type': "POST",
            'global': false,
            'dataType': 'json',
            'url': "Cheqpropio/getproveedor",
            'success': function (data) {
                //console.info(data);
                var $select = $("#proveedor");
                for (var i = 0; i < data.length; i++) {

                  $select.append($('<option />', { value: data[i]['provid'], text: data[i]['provnombre'] }));
                }
             },
            'error' : function (data){
              console.log('Error en getEquiSector');
              //alert('error');
             }
    });
  });

</script>

<!-- Validacion de campos y Envio form -->
<script> 
  function consReporte() {    
        //limpCombo();
        //var datos = $('#formCheques').serializeArray();
        var num = $('#buscNumero').val();
        var id_prov = $('#proveedor').val();
        var id_bco = $('#banco').val();        
        var de_emit = $('#desde_emit').val();
        var a_emit = $('#hasta_emit').val();
        var de_ven = $('#desde_ven').val();
        var a_ven =$('#hasta_ven').val();
        var est = $('#estado').val();        
        
        WaitingOpen('Buscando...');
        
        $.ajax({    
            data:{            	
              buscNumero: num,
              proveedor: id_prov,
            	banco: id_bco,
            	desde_emit: de_emit,
            	hasta_emit: a_emit,
              desde_ven: de_ven,
              hasta_ven: a_ven,
              estado: est
            },
            //data: datos,
            type: 'POST',             
            dataType: 'json',
            url: 'index.php/Reporte/getReporte',                
            success: function(result){                      
                    
                    $("#buscNumero").val('');
                    $("#idCheque").val('');
                    $("#banco").val('');
                    $("#proveedor").val('');
                    $("#estado").val(0);
                    $(".fecha").val('');
                    WaitingClose();  
                    $('#servicio tbody tr').remove();
                    //console.log('result');
                   // console.log(result[0]['cheqnro']);
                  for(i=0; i<result.length; i++) {                 
                      var tabla ='<tr>'+                   
                      '<td style="text-align: left">'+ result[i]['cheqnro']+'</td>'+
                      '<td style="text-align: left">'+ result[i]['cheqfechae']+'</td>'+
                      '<td style="text-align: left">'+ result[i]['cheqvenc']+'</td>'+
                      '<td style="text-align: left">'+ result[i]['bancdescrip']+'</td>'+
                      '<td style="text-align: left">'+ result[i]['provnombre']+'</td>'+
                      '<td style="text-align: left">'+ result[i]['cheqmonto']+'</td>'+
                      '<td style="text-align: center">'+(result[i]['estado'] == 'C' ? '<small class="label pull-left bg-green">Curso</small>' :(result[i]['estado'] == 'P' ? '<small class="label pull-left bg-blue">Pagado</small>' : '<small class="label pull-left bg-red">Solicitado</small>'))+'</td>'
                     '</tr>';     
                      $('#servicio tbody').append(tabla);            
                  }                   
                    
            		    //alert('success');                     
            },
            error: function(result){                   
                    WaitingClose();                                              
                    setTimeout("$('#modalError').modal('show')",800);
                    //alert("Error en consulta Ordenes");
            }
        });
    
  }

  function limpCombo(){
    //$('#servicio').remove();
  		// $('.check').attr('checked',false);

    //   $("input.buscNumero").attr("disabled", true);
      //$("#buscNumero").val('');
      //$("#idCheque").val('');

      // $("select.banco").attr("disabled", true);
      $("#banco").val('');
      //$("#banco").html('');

       //$("#proveedor").attr("disabled", true);
      $("#proveedor").val('');
      //$("#proveedor").html('');

      // $("#estado").attr("disabled", true);
	    $("#estado").val('');	    
      //$("#estado").html(''); 
      // $("input.fecha").attr("disabled", true);
      $("#fecha").val(''); 
      //$("#fecha").html('');	    
  }
</script>
<!-- / Validacion de campos y Envio form -->


