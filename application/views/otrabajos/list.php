<input type="hidden" id="permission" value="<?php echo $permission;?>">
<section class="content">
  <div class="row">
    <div class="col-xs-12">
      <div class="box">
        <div class="box-header">
          <h3 class="box-title">Orden de trabajo</h3>
          <?php
          if (strpos($permission,'Add') !== false) {
            echo '<button class="btn btn-block btn-success" style="width: 100px; margin-top: 10px;" data-toggle="modal" onclick="LoadOT(0,\'Add\')" id="btnAdd">Agregar</button>';
          }
          ?>
        </div><!-- /.box-header -->
        <div class="box-body">
          <table id="otrabajo" class="table table-bordered table-hover">
            <thead>
              <tr>
                <th width="20%">Acciones</th>
                <th>Nro</th>
                <th>Fecha</th>
                <th>Fecha Entrega</th>
                <th>Fecha Terminada </th>
                <th>Detalle </th>
                <th>cliente </th>
                <th>Solicita </th>
                <th>estado </th>

              </tr>
            </thead>
            <tbody>
              <?php
                if(count($list) > 0) {  

                	foreach($list as $a)
      		        {

                    if (($a['estado'] !='T') && ($a['estado'] !='E' )) {
                    
                      $id=$a['id_orden'];
                      echo '<tr id="'.$id.'" class="'.$id.'">';
    	                echo '<td>';

                      //  if ($a['estado']!='E'){
                        if (strpos($permission,'Edit') !== false) {
      	                	echo '<i class="fa fa-fw fa-pencil" style="color: #f39c12; cursor: pointer; margin-left: 15px;" title="Editar" data-toggle="modal" data-target="#modaleditar" ></i>';
                        }
                        if (strpos($permission,'Del') !== false) {
      	                	echo '<i class="fa fa-fw fa-times-circle" style="color: #dd4b39; cursor: pointer; margin-left: 15px;" title="Eliminar"></i>';
                        }
                       
                        if (strpos($permission,'Asignar') !== false) {
                          echo '<i class="fa fa-thumb-tack " style="color: #006400; cursor: pointer; margin-left: 15px;" title="Asignar a Taller"></i>';
                        }
                       /* if (strpos($permission,'Finalizar') !== false) {
                          echo '<i class="fa fa-thumbs-up" style="color: #3c8dbc; cursor: pointer; margin-left: 15px;" title="Finalizar Orden" onclick="finalOT('.$a['id_orden'].',\'View\')"></i>';
                        }*/
                        if (strpos($permission,'OP') !== false) {
                          echo '<i class="fa fa-tags" style="color: #3c8dbc; cursor: pointer; margin-left: 15px;"  title="Cargar Pedido " data-toggle="modal" data-target="#modalpedido"></i>';
                        }
                        if (strpos($permission,'Pedidos') !== false) {
                          echo '<i class="fa fa-truck" style="color: #3c8dbc; cursor: pointer; margin-left: 15px;"  title="Mostrar Perdido " data-toggle="modal" data-target="#modallista"></i>';
                        }

                        if($a['estado'] == 'As'){
                          echo '<i  href="#"class="fa fa-fw fa fa-toggle-on" style="color: #3c8dbc; cursor: pointer; margin-left: 15px;" title="Finalizar Orden"></i>';
                        }
                            
      	                echo '</td>';
                        echo '<td style="text-align: right">'.$a['nro'].'</td>';
      	                echo '<td style="text-align: left">'.$a['fecha_inicio'].'</td>';
                        echo '<td style="text-align: right">'.$a['fecha_entrega'].'</td>';
                        echo '<td style="text-align: right">'.$a['fecha_terminada'].'</td>';
                        echo '<td style="text-align: right">'.$a['descripcion'].'</td>';
                        echo '<td style="text-align: left">'.$a['cliLastName'].' , '.$a['cliName'].'</td>';
                        echo '<td style="text-align: right">'.$a['usrName'].'</td>';
                        echo '<td style="text-align: center">'.($a['estado'] == 'C' ? '<small class="label pull-left bg-green">Curso</small>' : ($a['estado'] == 'P' ? '<small class="label pull-left bg-red">Pedido</small>' : ($a['estado'] == 'As' ? '<small class="label pull-left bg-yellow">Asignado</small>' : '<small class="label pull-left bg-blue">Terminado</small>'))).'</td>';
      	                echo '</tr>';                    
      		          }
                  }
                  
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

var ido="";
var iop="";
var idp="";
var idArt = 0;
var acArt = '';
var i="";
$(document).ready(function(event) {    

  //Asignar 
  $(".fa-thumb-tack").click(function (e) { 
          
          $('#modalAsig').modal('show');

          var id_orden = $(this).parent('td').parent('tr').attr('id');
          
          $.ajax({
            type: 'GET',
            data: { id_orden: id_orden},
            url: 'index.php/Otrabajo/getasigna', //index.php/
            success: function(data){  
                    
                    datos={
                      'id_orden':id_orden,
                      'nro':data['datos'][0]['nro'],
                      'fecha_inicio':data['datos'][0]['fecha_inicio'],
                      'estado':data['datos'][0]['estado'],
                      'descripcion':data['datos'][0]['descripcion'],                      
                      'cliente': data['datos'][0]['cliLastName']+' '+data['datos'][0]['cliName'],                  
                      'cliId':data['datos'][0]['cliId'],
                      'id_usuario':data['datos'][0]['id_usuario'],
                    };

                    var arre = new Array();
                    arre=datos['fecha_inicio'].split(' ');

                    //edit=1;
                    $('#id_orden').val(datos['id_orden']);
                    $('#nro').val(datos['nro']);
                    $('#fecha_inicio').val(arre[0]);                    
      
                    $('#estado').val(datos['estado']);
                    $('#cliente').val(datos['cliente']);
                    $('#id_cliente').val(datos['cliId']);

                    $('#descripcion').val(datos['descripcion']);
                    $('#id_usuario').val(datos['id_usuario']);

                    click_pedent();
                  },
              
            error: function(result){
                  
                  console.log(result);
                },
            dataType: 'json'
            });    
  });

  //cargar pedido
  $(".fa-tags").click(function (e) { 

    var id_orden = $(this).parent('td').parent('tr').attr('id');
    ido=id_orden;
    console.log("el id de orden para la carga de pedido es :");
    console.log(ido);
    i=1;
    var opcion =i; 

    $('#num1').append(opcion);
    i=i+1;     
  });

  $(".fa-truck").click(function (e) { 

     $("#modallista tbody tr").remove();
      var idorden = $(this).parent('td').parent('tr').attr('id');
      console.log("ID de orden de trabajo es :");
      console.log(idorden);
      $.ajax({
          type: 'GET',
          data: { idorden:idorden},
          url: 'index.php/Otrabajo/getmostrar', //index.php/
          success: function(data){
            console.log("llego el detalle");
            console.log(data);
            console.log(data[0]['id_trabajo']);
            console.log(data['id_trabajo']);
            console.log(data.id_trabajo);
            for (var i = 0; i < data.length; i++) {

              if (data[i]['estado']== 'P'){
              var estado= '<small class="label pull-left bg-green">Pedido</small>';
              }
              else 
                if (data[i]['estado']== 'C'){
                var estado= '<small class="label pull-left bg-blue">Curso</small>';
                }
                else
                  if (data[i]['estado']== 'E'){ 

                  var estado= '<small class="label pull-left bg-red">Entregado</small>';
                }

                else 
                  var estado= '<small class="label pull-left bg-yellow">Terminado</small>';

                var tr = "<tr >"+
                  "<td ></td>"+
                  "<td>"+data[i]['nro_trabajo']+"</td>"+
                  "<td>"+data[i]['fecha']+"</td>"+
                  "<td>"+data[i]['fecha_entrega']+"</td>"+
                  "<td>"+data[i]['provnombre']+"</td>"+
                  "<td>"+data[i]['descripcion']+"</td>"+
                  "<td>"+estado+"</td>"+
                  "</tr>";
                  $('#tabladetalle tbody').append(tr);

             }

            console.log(tr);

                },
            
          error: function(result){
                console.log("Entro x el error de detalle");
                
                console.log(result);
              },
              dataType: 'json'
          });
    
  });

  $('#btnSave').click(function(){

      // if(acArt == 'View')
      // {
      //   $('#modalOT').modal('hide');
      //   return;
      // }
      var hayError = false;
      if($('#nro').val() == '')
      {
        hayError = true;
      }
      if($('#vfech').val() == '')
      {
        hayError = true;
      }
      if($('#vsdetalle').val() == '')
      {
        hayError = true;
      }
      if($('#sucid').val() == '')
      {
        hayError = true;
      }
      // $('#error').fadeOut();
      // $('#modalOT').modal('hide');
      
      if (hayError == true) {
        return;
      } else {
      $('#modalOT').modal('hide')

        var d = $('#vfech').val();      
        var f = d.split("-");
        var año = f[2];
        var mes = f[1];
        var dia = f[0];
        var fecha = año + "-" + mes + "-" + dia;

        $.ajax({
            type: 'POST',
            data: { 
                    id : idArt, 
                    act: acArt, 
                    nro: $('#nro').val(),
                    fech: fecha,
                    deta: $('#vsdetalle').val(),
                    sucid: $('#sucid').val(),
                    cli: $('#cliid').val()                      
                  },
            url: 'index.php/otrabajo/setotrabajo', 
            success: function(result){
                          //WaitingClose();
                          $('.modal-backdrop').hide();
                          //setTimeout("cargarView('otrabajos', 'index', '"+$('#permission').val()+"');",1000);
                          regresa1();
                  },
            error: function(result){
                  WaitingClose();
                  alert("error");
                },
                dataType: 'json'
        });
      }
      
  });

  $(".fa-times-circle").click(function (e) {                   
           
      console.log("Esto eliminando"); 
      var idord = $(this).parent('td').parent('tr').attr('id');
      console.log(idord);      
      $.ajax({
              type: 'POST',
              data: { idord: idord},
              url: 'index.php/Otrabajo/baja_orden', //index.php/
              success: function(data){
                      console.log("ORDEN DE TRABAJO ELIMINADA");
                      console.log(data);
                     
                      //$(tr).remove();
                      alert("ORDEN DE TRABAJO Eliminada");
                      regresa();
                    
                    },                
              error: function(result){                    
                    console.log(result);
                  }
                 // dataType: 'json'
        });
  });      

  $(".fa-toggle-on").click(function (e) { 

      var idord = $(this).parent('td').parent('tr').attr('id');
      console.log(idord);      
      $.ajax({
        type: 'POST',
        data: { idord: idord},
        url: 'index.php/Otrabajo/cambio_estado', //index.php/
        success: function(data){
                //var data = jQuery.parseJSON( data );                
                console.log(data);               
                //$(tr).remove();
                alert("Se Finalizando la ORDEN TRABAJO");              
                regresa();            
              },          
        error: function(result){              
                console.log(result);
              }
            //dataType: 'json'
        });
  });
  
  $('#vfech').datepicker({
      // changeMonth: true,
      // changeYear: true
  }); 

    //Editar
  $(".fa-pencil").click(function (e) { 
     
    console.log("Estoy editado ");
    var idord = $(this).parent('td').parent('tr').attr('id');
    idp=idord;
    console.log(idord);    
    $.ajax({
        type: 'GET',
        data: { idord: idord},
        url: 'index.php/Otrabajo/getpencil', //index.php/
        success: function(data){
                                  
                console.log(data);
                //console.log(data['descripcion']);
                console.log(data[0]['nro']);
                //console.log(data['datos'][0]['descripcion']);               
                datos={
                  'nro':data[0]['nro'],
                  'cli' :data[0]['cliId'],
                  'clientena':data[0]['cliName'],
                  'cliap':data[0]['cliLastName'],
                  'fecha_inicio':data[0]['fecha_inicio'],
                  'idusuario':data[0]['id_usuario'],
                  'nota':data[0]['descripcion'],
                  'id_sucu':data[0]['id_sucursal'],
                  'sucursal':data[0]['descripc']   
                }
                console.log("datos a enviar");
                console.log(datos);
                $('#cliidedit').html('');
                $('#sucidedit').html('');
                completarEdit(datos);
                OpenSale();       
              },
          
        error: function(result){              
              console.log(result);
            },
            dataType: 'json'
        });  
  });

  $('#otrabajo').DataTable({
        "paging": true,
        "lengthChange": true,
        "searching": true,
        "ordering": true,
        "info": true,
        "autoWidth": true,
        "language": {
              "lengthMenu": "Ver _MENU_ filas por página",
              "zeroRecords": "No hay registros",
              "info": "Mostrando pagina _PAGE_ de _PAGES_",
              "infoEmpty": "No hay registros disponibles",
              "infoFiltered": "(filtrando de un total de _MAX_ registros)",
              "sSearch": "Buscar:  ",
              "oPaginate": {
                  "sNext": "Sig.",
                  "sPrevious": "Ant."
                }
          }
  });      

  $('#tabladetalle').DataTable({
        "paging": true,
        "lengthChange": true,
        "searching": true,
        "ordering": true,
        "info": true,
        "autoWidth": true,
        "language": {
              "lengthMenu": "Ver _MENU_ filas por página",
              "zeroRecords": "No hay registros",
              "info": "Mostrando pagina _PAGE_ de _PAGES_",
              "infoEmpty": "",
              "infoFiltered": "(filtrando de un total de _MAX_ registros)",
              "sSearch": "Buscar:  ",
              "oPaginate": {
                  "sNext": "Sig.",
                  "sPrevious": "Ant."
                }
          }
  });

});

 function completarEdit(datos){
    console.log("datos que llegaron");
    console.log(datos);

    $('#nroedit').val(datos['nro']);

    $('select#cliidedit').append($('<option />', { value: datos['cli'],text: datos['cliap']+'.'+datos['clientena']+'.'}));
    traer_cli2();
    $('#vfecha').val(datos['fecha_inicio']);
    $('#vsdetalleedit').val(datos['nota']);

     $('select#sucidedit').append($('<option />', { value: datos['id_sucu'],text: datos['sucursal']+'.'}));
   // $('#sucidedit').val(datos['descripc']);
     traer_sucursal2(); 
}  
  
function LoadOT(id_, action){
  	idArt = id_;
  	acArt = action;
  	LoadIconAction('modalAction',action);
  	WaitingOpen('Cargando Orden de trabajo');
      $.ajax({
          	type: 'POST',
          	data: { id : id_, act: action },
    		url: 'index.php/otrabajo/getotrabajo', 
    		success: function(result){
                  WaitingClose();
                  $("#modalBodyOT").html(result.html);
                  $('#vfech').datepicker({
                    changeMonth: true,
                    changeYear: true
                  });
                  setTimeout("$('#modalOT').modal('show')",0);                      
    					},
    		error: function(result){
    					WaitingClose();
    					alert("error");
    				},
        dataType: 'json'
    		});
} 

function traer_clientes(idcliente){
    $.ajax({
          type: 'POST',
          data: { idcliente: idcliente},
          url: 'index.php/Otrabajo/getcliente',  //index.php/
          async:false,
          success: function(data){
                  //var data = jQuery.parseJSON( data );
                  
                  //console.log(data);
                  $('#cliente option').remove();
                   var opcion  = "<option value='-1'>Seleccione...</option>" ; 
                  $('#cliente').append(opcion); 
                  for(var i=0; i < data.length ; i++) 
                  {   
                    //console.log( data[i]);
                        var apellido = data[i]['cliLastName']; 
                        var opcion  = "<option value='"+data[i]['cliId']+"'>" +apellido+ "</option>" ; 

                      $('#cliente').append(opcion);                
                  }
                },
          error: function(result){
                
                console.log(result);
              },
              dataType: 'json'
          });
}

function finalOT(id_, action){ //esto es nuevo 
    idot = id_;
    ac = action;
    est='T';
    LoadIconAction('modalAction',action);
    WaitingOpen('Finalizando');
      $.ajax({
            type: 'POST',
            data: { id : id_, act: action,estado:est },
        url: 'index.php/otrabajo/setfinal', 
        success: function(data){
                      WaitingClose();
                    
                    
              },
        error: function(result){
              WaitingClose();
              alert("error");
            },
            dataType: 'json'
        });
}  
 
traer_usuario();   
function traer_usuario(){
      $.ajax({
        type: 'POST',
        data: { },
        url: 'index.php/Otrabajo/getusuario', //index.php/
        success: function(data){
               
                 var opcion  = "<option value='-1'>Seleccione...</option>" ; 
                  $('#usuario').append(opcion); 
                for(var i=0; i < data.length ; i++) 
                {    
                      var nombre = data[i]['usrName'];
                      var opcion  = "<option value='"+data[i]['usrId']+"'>" +nombre+ "</option>" ; 

                    $('#usuario').append(opcion); 
                                   
                }
              },
        error: function(result){
              
              console.log(result);
            },
            dataType: 'json'
        });
  }
   
function traer_cli2(){
   //$('#cli').html('');
      $.ajax({
        type: 'POST',
        data: { },
        url: 'index.php/Otrabajo/traer_cli', 
        success: function(data){
                  console.log(data);               
                 //var opcion  = "<option value='-1'>Seleccione...</option>" ; 
                  $('#cliidedit').append(opcion); 
                  for(var i=0; i < data.length ; i++){    
                    
                      var nombre = data[i]['cliLastName']+' '+data[i]['cliName'];
                      var opcion  = "<option value='"+data[i]['cliId']+"'>" +nombre+ "</option>" ;
                      $('#cliidedit').append(opcion);                                    
                  }
              },
        error: function(result){
              
              console.log(result);
            },
            dataType: 'json'
        });
}

function traer_sucursal2(){
 // $('#sucidedit').html('');
    $.ajax({
      type: 'POST',
      data: { },
      url: 'index.php/Otrabajo/traer_sucursal', //index.php/
      success: function(data){
             
               //var opcion  = "<option value='-1'>Seleccione...</option>" ; 
                $('#sucidedit').append(opcion); 
              for(var i=0; i < data.length ; i++) 
              {    
                    var nombre = data[i]['descripc'];
                    var opcion  = "<option value='"+data[i]['id_sucursal']+"'>" +nombre+ "</option>" ; 

                  $('#sucidedit').append(opcion); 
                                 
              }
            },
      error: function(result){
            
            console.log(result);
          },
          dataType: 'json'
      });
} 
      
traer_proveedor();
function traer_proveedor(){
    //var id_proveedor = $(this).val();
    //console.log(id_proveedor);
    //var id_proveedor= $("#proveedor").val()
      $.ajax({
        type: 'POST',
        data: {},
        url: 'index.php/Otrabajo/getproveedor', //index.php/
        success: function(data){
               
                 var opcion  = "<option value='-1'>Seleccione...</option>" ; 
                  $('#proveedor').append(opcion); 
                for(var i=0; i < data.length ; i++) 
                {    
                      var nombre = data[i]['provnombre'];
                      var opcion  = "<option value='"+data[i]['provid']+"'>" +nombre+ "</option>" ; 

                    $('#proveedor').append(opcion);                
                }
              },
        error: function(result){
              
              console.log(result);
            },
            dataType: 'json'
        });


} 

function click_pedent(){  var fechai= $("#fecha_inicio").val(); //optengo el valor del campo fecha 
   $.ajax({
        type: 'GET',
        data: {fechai:fechai }, /* destinodo*/
        url: 'index.php/Otrabajo/getpedidos', //index.php/
        success: function(data){
                //var data = jQuery.parseJSON( data );
                
                console.log(data);
              
              
                var direccion = data[0]['destinodireccion']; 
                var contacto = data[0]['destinocontacto']; 


                $('#domicilio').val(direccion);       
                $('#contacto').val(contacto);                

                
              },
         error: function(result){
              
              console.log(result);
            },
            dataType: 'json'
        });

   /* $("#pedent").click(function(){ 

         bootbox.dialog({
          backdrop: true,
          title: "Pedidos a Entregar",
          message: '<label>hoolaaaa</label>',
            buttons: {
                  success: {
                      label: "Aceptar",
                className:"btn-primary guardar" ,
                      callback: function (e) {
                        var fechai= $("#fecha_inicio").val(); //optengo el valor del campo fecha 
     
                        //aca se mete una peticion ajax los valores del formularios dentro del sucess
                        //aca va el arreglo 

                        // armar un strping que simula un option y se agrega el select con el id del select .append 
                          return ;
                                    
                      }//fin calback
                  }//fin success
              },//fin Buttons
              onEscape: function() {return ;},
          });  //FIN DIALOG

    }); */ 
}

//guardar asignacion
function orden(){

     console.log("si guardo ");
        var id_orden = $('#id_orden').val();
        var nro = $('#nro').val();
        var fecha_inicio = $('#fecha_inicio').val();
        var fecha_entrega = $('#fecha_entrega').val();
        var usuario= $('#usuario').val();
        var estado= $('#estado').val();
        var cliente = $('#id_cliente').val();
        
        //id_usuario_a. guarda a quien se lo asigno

        var parametros = {
            //'id_orden': id_orden,
            'nro': nro,
            'fecha_inicio': fecha_inicio,
            'fecha_entrega': fecha_entrega,
            'id_usuario_a': usuario,
            'estado': 'As',     
            'cliId': cliente,
        };
        console.log(parametros);
        console.log(id_orden);
          $.ajax({
              type: 'POST',
              data: {data:parametros, id_orden:id_orden},
              url: 'index.php/Otrabajo/guardar',  //index.php/
              success: function(data){
                     // var data = jQuery.parseJSON( result );
                      console.log(data);
                     /* $('#modalAsig').modal('hide');

                       setTimeout(function(){
                             var permisos = '<?php //echo $permission; ?>';
                            cargarView('otrabajos', 'index', permisos) ; 
                      },3000); // 3000ms = 3s*/
                      regresa();
                     
                    },
              error: function(result){
                    
                    console.log(result);
                   // $('#modalAsig').modal('hide');
                  },
                  dataType: 'json'
              });
                 
  }


function guardareditar(){

     console.log("estoy guardando lo editado ");
        var id_orden = $('#id_orden').val();
        var nro = $('#nroedit').val();
        var fecha_inicio = $('#vfecha').val();
        var descripcion = $('#vsdetalleedit').val();
       // var usuario= $('#usuario').val();
        var id_sucu= $('#sucidedit').val();
        var cliente = $('#cliidedit').val();
        
        //id_usuario_a. guarda a quien se lo asigno

        var parametros = {
            //'id_orden': id_orden,
            'nro': nro,
            'fecha_inicio': fecha_inicio, 
            'descripcion': descripcion,    
            'cliId': cliente,
            'id_sucursal': id_sucu,

        };
        console.log(parametros);
        console.log(idp);
          $.ajax({
              type: 'POST',
              data: {parametros:parametros, idp:idp},
              url: 'index.php/Otrabajo/guardar_editar',  //index.php/
              success: function(data){
                     // var data = jQuery.parseJSON( result );
                     console.log("Exito en la edicion");
                      console.log(data);
                     /* $('#modalAsig').modal('hide');

                       setTimeout(function(){
                             var permisos = '<?php //echo $permission; ?>';
                            cargarView('otrabajos', 'index', permisos) ; 
                      },3000); // 3000ms = 3s*/
                     // regresa();
                     regresa1();
                     
                    },
              error: function(result){
                    
                    console.log(result);
                   // $('#modalAsig').modal('hide');
                  }
                 // dataType: 'json'
              });
                 
  }

function guardarpedido(){

     console.log("si guardo pedido");
     var id_orden = $(this).parent('td').parent('tr').attr('id');
    
        var numero = $('#num1').val();
        var fecha = $('#fecha1').val();
        var fecha_entrega = $('#fecha_entrega2').val();
        var proveedor= $('#proveedor').val();
        //var estado= $('#estado').val();
        var descripcion2 = $('#descripcion2').val();
        

        var parametros = {
            //'id_orden': id_orden,
            'id_proveedor': proveedor,
            'nro_trabajo': numero,
            'descripcion': descripcion2,
            'id_trabajo' :ido,
            'fecha' : fecha,
            'fecha_entrega': fecha_entrega,
            'estado': 'P',     
            
        };
        console.log(parametros);
        console.log(ido);
          $.ajax({
              type: 'POST',
              data: {data:parametros},
              url: 'index.php/Otrabajo/agregar_pedido',  //index.php/
              success: function(data){
                     console.log("Estoy guardando pedido");
                      regresa();
                     
                    },
              error: function(result){
                    
                    console.log(result);
                   // $('#modalAsig').modal('hide');
                  },
                  dataType: 'json'
              });
                 
  }       
  function regresa(){
  
    $('#content').empty();
    
    $("#content").load("<?php echo base_url(); ?>index.php/Otrabajo/listOrden/<?php echo $permission; ?>");
    WaitingClose();
  }
      
  
function regresa1(){
  
  $('#content').empty();
  //$('#modalOT').empty();
  //$('#modalAsig').empty();
  $("#content").load("<?php echo base_url(); ?>index.php/Otrabajo/listOrden/<?php echo $permission; ?>");
  // WaitingClose();
  WaitingClose();
} 

</script>



<!-- Modal Agregar Nueva ot-->
<div class="modal fade" id="modalOT" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
        <h4 class="modal-title" id="myModalLabel"><span id="modalAction"> </span> Orden trabajo</h4> 
      </div>
      <div class="modal-body" id="modalBodyOT">
        
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-default" data-dismiss="modal">Cancelar</button>
        <button type="button" class="btn btn-primary" id="btnSave">Guardar</button>
      </div>
    </div>
  </div>
</div>

<!-- Modal ASIGNA-->
<div id="modalAsig" class="modal fade" role="dialog">
  <div class="modal-dialog">

    <!-- Modal content-->
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal">&times;</button>
        <h4 class="modal-title"><span  class="fa fa-thumb-tack " style="color: #006400"></span>   Asignacion Orden de trabajo</h4>
      </div>
      <div class="modal-body">
      <div class="row" >
          <div class="col-sm-12 col-md-12">
            <fieldset> </fieldset>
              <br>
              <!-- <div class="col-md-3 col-md-offset-9">Nro:
                  <input type="text" align=\"right\"  class="form-control" id="nro"  name="nro"  min="1" size="35" disabled >
                </div>-->
                <div class="col-xs-8">Nro:
                  <input type="text" class="form-control" id="nro"  name="nro"   disabled >
                </div>
                <input type="hidden" id="id_orden" name="id_orden">

                <div class="col-xs-8">Fecha de inicio:
                  <input type="date" class="form-control" id="fecha_inicio" name="fecha_inicio" disabled>
                </div>

                <div class="row" >
                  <div class="col-sm-12 col-md-12">
                    <div class="col-xs-8">Cliente:
                      <input type="text"  id="cliente" name="cliente" class="form-control " disabled >
                      <input type="hidden" id="id_cliente" name="id_cliente">

                    </div>
                    <div class="col-xs-8">Descripcion:
                      
                    </div>
                  <div class="col-xs-12">
                    <textarea  class="form-control" rows="6" cols="500" id="descripcion" name="descripcion" value="" disabled ></textarea>
                  </div>
                 <!-- <div class="col-xs-8">Estado:
                    <input type="text"  id="estado" name="estado" class="form-control " disabled >
                  </div>-->

                    

                </div>
              </div>
                

  
           <div class="row" >
              <div class="col-sm-12 col-md-12">
                  
                          
                  <div class="col-xs-8">Fecha de entrega:
                  <input type="date" id="fecha_entrega" name="fecha_entrega" class="form-control input-md" / >
                  </div>

                  <!--<br>
                  <div class="btn-group">
                    <button type="button" class="btn btn-success" id="pedent">Pedidos a Entregar</button>
                  </div>-->
                  <br>
                  <br>
                  <div  class="col-xs-8">Usuario:
                  <select id="usuario" name="usuario" class="form-control " placeholder="Seleccione usuario"></select>
                  <input type="hidden" id="id_usuario" name="id_usuario">
                  </div>
                  <br>
                  <br>
                  <div class="col-xs-3">
                    
                  </div>
                 <!-- <div class="col-xs-2">
                  <div class="btn-group">--> <!--<span class="glyphicon glyphicon-plus"></span>-->
                  <!--<button type="button" class="btn btn-success" id="add" value="agregar">Agregar</button>
                  </div>
                  </div>-->

                  

                   
            
              </div>
          </div>    
      </div>

    </div>

      </div>
   

   
     
    <div class="modal-footer">
       <button type="button" class="btn btn-default" data-dismiss="modal" onclick="cerro()">Cancelar</button>
        <button type="button" class="btn btn-primary" id="reset" data-dismiss="modal" onclick="orden()">Guardar</button>
    </div>

  </div>
</div>
 </div>
<!-- Modal asigna -->
<!--<div class="modal fade" id="modalAsig" tabindex="2000" aria-labelledby="myModalLabel" >
  <div class="modal-dialog" role="document" style="width: 60%">
    <div class="modal-content">
      
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal" aria-label="Close" onclick="cerro()"><span aria-hidden="true">&times;</span></button>
        <h4 class="modal-title" id="myModalLabel"><span id="modalActionSale" class="fa fa-thumb-tack " style="color: #006400"></span>  Asignacion Orden de trabajo</h4> 
      </div>

      <div class="modal-body" id="modalBodySale">
        
       <div class="row" >
          <div class="col-sm-12 col-md-12">
            <fieldset> </fieldset>
              <br>
                <div class="col-md-3 col-md-offset-9">Nro:
                  <input type="text" align=\"right\"  class="form-control" id="nro"  name="nro"  min="1" size="35" disabled >
                </div>
                <input type="hidden" id="id_orden" name="id_orden">

                <div class="col-md-3 col-md-offset-9">Fecha de inicio:
                  <input type="date" align=\"right\" class="form-control" id="fecha_inicio" name="fecha_inicio" min="1" size="35" >
                </div>

                <div class="row" >
                  <div class="col-sm-12 col-md-12">
                    <div class="col-xs-8">Cliente:
                      <input type="text"  id="cliente" name="cliente" class="form-control " disabled >
                      <input type="hidden" id="id_cliente" name="id_cliente">

                    </div>
                    <div class="col-xs-8">Descripcion:
                      
                    </div>
                  <div class="col-xs-12">
                    <textarea  class="form-control" rows="6" cols="500" id="descripcion" name="descripcion" value="" disabled ></textarea>
                  </div>
                  <div class="col-xs-8">Estado:
                    <input type="text"  id="estado" name="estado" class="form-control " disabled >
                  </div>

                    

                </div>
              </div>
                

  
           <div class="row" >
              <div class="col-sm-12 col-md-12">
                  
                          
                  <div class="col-xs-8">Fecha de entrega:
                  <input type="date" id="fecha_entrega" name="fecha_entrega" class="form-control input-md" / >
                  </div>-->

                  <!--<br>
                  <div class="btn-group">
                    <button type="button" class="btn btn-success" id="pedent">Pedidos a Entregar</button>
                  </div>-->
                <!--  <br>
                  <br>
                  <div  class="col-xs-8">Usuario:
                  <select id="usuario" name="usuario" class="form-control " placeholder="Seleccione usuario"></select>
                  <input type="hidden" id="id_usuario" name="id_usuario">
                  </div>
                  <br>
                  <br>
                  <div class="col-xs-3">
                    
                  </div>-->
                 <!-- <div class="col-xs-2">
                  <div class="btn-group">--> <!--<span class="glyphicon glyphicon-plus"></span>-->
                  <!--<button type="button" class="btn btn-success" id="add" value="agregar">Agregar</button>
                  </div>
                  </div>-->

                  

                   
            
            <!--  </div>
          </div>    
      </div>

    </div>
    </div>

     <div class="modal-footer">
          <button type="button" class="btn btn-default" data-dismiss="modal" >Cancelar</button>
          <button type="button" class="btn btn-primary" onclick="orden()">Guardar</button>
        </div>

      </div>--><!-- fin modal conteiner -->
  <!--</div>--> <!-- fin modal - dialog -->
<!--</div>--><!-- fin modal asigna -->

<!-- Modal editar-->
<div class="modal fade" id="modaleditar" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
  <div class="modal-dialog modal-lg" role="document" style="width: 60%">
    <div class="modal-content">

      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
        <h4 class="modal-title"  id="myModalLabel"><span id="modalAction" class="fa fa-fw fa-pencil" style="color: #f39c12" > </span> Editar Orden de Trabajo</h4>
       </div> <!-- /.modal-header  -->

      <div class="modal-body input-group ui-widget" id="modalBodyArticle">

        <div class="row">
          <div class="col-xs-4">
           <label style="margin-top: 7px;">Nro <strong style="color: #dd4b39">*</strong>: </label>
          </div>
          <div class="col-xs-8">
            <input type="text" class="form-control" placeholder="Nro Orden de trabajo" id="nroedit" name="nroedit">
          </div>
        </div><br>
        <div class="row">
          <div class="col-xs-4">
            <label style="margin-top: 7px;">Cliente <strong style="color: #dd4b39">*</strong>: </label>
          </div>
          <div class="col-xs-8">
            <select class="form-control select2" id="cliidedit" name="cliidedit" style="width: 100%;">
               
            </select>
          </div>
        </div><br>

        <div class="row">
          <div class="col-xs-4">
              <label style="margin-top: 7px;">Fecha <strong style="color: #dd4b39">*</strong>: </label>
          </div>
          <div class="col-xs-8">
              <input type="text" class="form-control" id="vfecha" placeholder="dd-mm-aaaa" name="vfecha">
          </div>
        </div><br>

        <div class="row">
          <div class="col-xs-4">
             <label style="margin-top: 7px;">Nota: </label>
          </div>
          <div class="col-xs-8">
            <textarea placeholder="Orden de trabajo" class="form-control" rows="10" id="vsdetalleedit" name="vsdetalleedit" value=""></textarea>
          </div>
        </div>
        <br>


        <div class="row">
          <div class="col-xs-4">
              <label style="margin-top: 7px;">Sucursal <strong style="color: #dd4b39">*</strong>: </label>
          </div>
          <div class="col-xs-8">
            <select class="form-control select2" id="sucidedit" name="sucidedit" style="width: 100%;">
              
            </select>
          </div>
        </div>
        <br>
     
      
     

      <div class="modal-footer">
          <button type="button" class="btn btn-default" data-dismiss="modal" onclick="cerro()">Cancelar</button>
        <button type="button" class="btn btn-primary" id="reset" data-dismiss="modal" onclick="guardareditar()">Guardar</button> 
        
      </div>  <!-- /.modal footer -->
     </div>

       </div>  <!-- /.modal-body -->
    </div> <!-- /.modal-content -->

  </div>  <!-- /.modal-dialog modal-lg -->
</div>  <!-- /.modal fade -->
<!-- / Modal -->

<!-- Modal Pedido-->
<div class="modal fade" id="modalpedido" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
  <div class="modal-dialog modal-lg" role="document" style="width: 45%">
    <div class="modal-content">

      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
        <h4 class="modal-title"  id="myModalLabel"><span id="modalAction" class="fa fa-tags" style="color: #3c8dbc" > </span> Orden de Pedido</h4>
       </div> <!-- /.modal-header  -->

      <div class="modal-body input-group ui-widget" id="modalBodyArticle">
        
        <div class="row" >
          <div class="col-sm-12 col-md-12">
            <fieldset> </fieldset>
            <br>
            <div class="col-xs-8">Nro:
              <input type="text"  class="form-control" id="num1" name="num1" placeholder="Ingrese nro de orden de pedido..">
              <!--align=\"right\" -->
            </div>
            <div class="col-xs-8">Fecha:
              <input type="date"   class="form-control input-md" id="fecha1"  name="fecha1" />
            </div>
            <div class="col-xs-8">Fecha de Entrega:
              <input type="date"  class="form-control input-md" id="fecha_entrega2" name="fecha_entrega2" />
            </div>
            <div class="col-xs-8">Proveedor:
              <select type="text"  id="proveedor" name="proveedor" class="form-control" ></select>
              <input type="hidden" id="id_proveedor" name="id_proveedor">
            </div>
            
            <div class="col-xs-8">Detalle del pedido:                    
            </div>
            <div class="col-xs-12">
              <textarea  class="form-control input-md" rows="6" cols="500" id="descripcion2" name="descripcion2" value="" placeholder="Ingrese detalle del pedido..."></textarea>
            </div>

          </div>
        </div>
      </div>
      
     

      <div class="modal-footer">
       <button type="button" class="btn btn-default" data-dismiss="modal" onclick="cerro()">Cancelar</button>
        
        <button type="button" class="btn btn-primary" id="btnSave" data-dismiss="modal" onclick="guardarpedido()" >Guardar</button>
      </div>  <!-- /.modal footer -->

       </div>  <!-- /.modal-body -->
    </div> <!-- /.modal-content -->

  </div>  <!-- /.modal-dialog modal-lg -->
</div>  <!-- /.modal fade -->
<!-- / Modal -->


<!-- Modal mostrar pedido-->
<div class="modal fade" id="modallista" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
  <div class="modal-dialog modal-lg" role="document" style="width: 70%">
    <div class="modal-content">

      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
        <h4 class="modal-title"  id="myModalLabel"><span id="modalAction" class="fa fa-truck" style="color: #3c8dbc" > </span> Lista de Orden de Pedido</h4>
       </div> <!-- /.modal-header  -->

      <div class="modal-body input-group ui-widget" id="modalBodyArticle">
        
        <div class="row" >
          <div class="col-sm-12 col-md-12">
            <fieldset> </fieldset>
            <br>

            <table class="table table-bordered table-hover" id="tabladetalle">
            <thead>
              <tr>
                <th width="10%"></th>                  
                <th>Nro de orden</th>
                <th>Fecha</th>
                <th>Fecha de Entrega</th>
                <th>Proveedor</th>
                <th>Descripcion</th>
                <th>Estado</th>

              </tr>
            </thead>
            <tbody>
                    
            </tbody>
          </table>
            
          </div>
        </div>
      </div>
      
     

       </div>  <!-- /.modal-body -->
    </div> <!-- /.modal-content -->

  </div>  <!-- /.modal-dialog modal-lg -->
</div>  <!-- /.modal fade -->
<!-- / Modal -->

