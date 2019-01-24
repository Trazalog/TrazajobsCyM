<input type="hidden" id="permission" value="<?php echo $permission;?>">
<section class="content">
  <div class="row">
    <div class="col-xs-12">
      <div class="box">
        <div class="box-header">
          <h3 class="box-title">Clientes</h3>
          <?php
            if (strpos($permission,'Add') !== false) {
              echo '<button class="btn btn-block btn-success" style="width: 100px; margin-top: 10px;" data-toggle="modal" data-target="#modaltarea" id="btnAdd">Agregar</button>';
            }
          ?>
        </div><!-- /.box-header -->
        <div class="box-body">
          <table id="deposito" class="table table-bordered table-hover" style="text-align: center">
            <thead>
              <tr>
                <th  width="20%" style="text-align: center">Acciones</th>
                <th style="text-align: center">Cliente</th>
                <!-- <th style="text-align: center">CUIT/DNI</th>
                <th style="text-align: center">Domicilio</th> -->
                <th style="text-align: center">Tel. Celular</th>
                <!-- <th style="text-align: center">Tel. Fijo</th> -->
                
              </tr>
            </thead>
            <tbody>
              <?php
                foreach($list as $z){

                  if ($z['estado'] != "AN") {

                    $id=$z['cliId']; 
                    echo '<tr id="'.$id.'" class="'.$id.'" >';
                    echo '<td>';

                    if (strpos($permission,'Edit') !== false) {
                      echo '<i class="fa fa-fw fa-pencil" style="color: #f39c12; cursor: pointer; margin-left: 15px;" title="Editar" data-toggle="modal" data-target="#modaleditar"></i>';
                      echo '<i class="fa fa-fw fa-times-circle" style="color: #dd4b39; cursor: pointer; margin-left: 15px;" title="Eliminar" data-toggle="modal" data-target="#modaleliminar"></i>';
                    }
                            
                    echo '</td>';
                    echo '<td style="text-align: center">'.$z['cliLastName'].'  '.$z['cliName'].'</td>';
                    //echo '<td style="text-align: center">'.$z['cliDni'].'</td>';
                    //echo '<td style="text-align: center">'.$z['cliAddress'].'</td>';     
                    echo '<td style="text-align: center">'.$z['cliMovil'].'</td>';
                    //echo '<td style="text-align: center">'.$z['cliPhone'].'</td>';
                    echo '</tr>';
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
var ed="";
var edelim="";
$(document).ready(function(event) {
   //Editar
  $(".fa-pencil").click(function (e) { 
     
    var idord = $(this).parent('td').parent('tr').attr('id');
    alert(idord);
    ed=idord;
    $.ajax({
        type: 'GET',
        data: { idord:idord},
        url: 'index.php/Cliente/getpencil', //index.php/
        success: function(data){
                console.log("Estoy editando");           
                console.log(data);  
               
                datos={
             
                  'nom':data[0]['cliName'],
                  'ape':data[0]['cliLastName'],
                  'cel':data[0]['cliMovil'],
                
    
                }
              completarEdit(datos);
                             
              },
          
        error: function(result){
              
              console.log(result);
            },
            dataType: 'json'
        });
  
  });

  //Cambio de estado a un cliente/ estado=AN
  $(".fa-times-circle").click(function (e) { 
                        
    console.log("Esto eliminando"); 
    var ord = $(this).parent('td').parent('tr').attr('id');
    console.log("El id de Cliente es:");
    console.log(ord);
    edelim=ord;
  
  });

  //Datatable
  $('#deposito').DataTable({
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

});

  traer_zona();
  function traer_zona(){

    $('#zonaId').html(""); 
    $.ajax({
        type: 'POST',
        data: { },
        url: 'index.php/Cliente/getzona', //index.php/
        success: function(data){
               
                 //var opcion  = "<option value='-1'>Seleccione...</option>" ; 
                $('#zonaId').append(opcion); 
                for(var i=0; i < data.length ; i++) 
                {    
                  var nombre = data[i]['zonaName'];
                  var opcion  = "<option value='"+data[i]['zonaId']+"'>" +nombre+ "</option>" ; 

                  $('#zonaId').append(opcion); 
                                   
                }
                
              },
        error: function(result){
              
              console.log(result);
            },
            dataType: 'json'
    });
  }

  function traer_zona1(){

    $('#zona').val("");
    $.ajax({ 
        type: 'POST',
        data: { },
        url: 'index.php/Cliente/getzona', //index.php/
        success: function(data){
               
                 //var opcion  = "<option value='-1'>Seleccione...</option>" ; 
                $('#zona').append(opcion); 
                for(var i=0; i < data.length ; i++) 
                {    
                  var nombre = data[i]['zonaName'];
                  var opcion  = "<option value='"+data[i]['zonaId']+"'>" +nombre+ "</option>" ; 

                  $('#zona').append(opcion); 
                                   
                }
                
              },
        error: function(result){
              
              console.log(result);
            },
            dataType: 'json'
    });
  }

  function completarEdit(datos,fecha){

    console.log("datos que llegaron");
    $('#nombre1').val(datos['nom']);
    $('#Apellido1').val(datos['ape']);
    $('#cel').val(datos['cel']);
  }

  function guardar(){

    console.log("Estoy guardando");
    var nombre = $('#cliName').val();
    var apellido = $('#cliLastName').val();
    var movil = $('#cliMovil').val();
    var parametros = {
      'cliName': nombre,
      'cliLastName': apellido,
      'cliMovil': movil,
      'estado': 'C'
    };                                                                        
    $.ajax({
      type:"POST",
      url: "index.php/Cliente/agregar_cliente", 
      data:{parametros:parametros},
      success: function(data){
        console.log("exito en agregar un nuevo cliente ");
        regresa();
        },
      error: function(result){
          console.log("entro por el error");
          console.log(result);
      }
    
    });

  }

  function guardareditar(){
    console.log("Estoy editando");
    console.log("El id de Cliente es:"); 
    console.log(ed);
      
    var nomb = $('#nombre1').val();
    var apell = $('#Apellido1').val();
    var cel = $('#cel').val();  
    var parametros = {
          'cliName': nomb,
          'cliLastName': apell,
          'cliMovil': cel
    };                                              
    console.log(parametros);
    var hayError = false; 

    if( parametros !=0)
      {                                     
      $.ajax({
        type:"POST",
        url: "index.php/Cliente/edit_banco", //controlador /metodo
        data:{parametros:parametros, ed:ed},
        success: function(data){
          console.log("exito en editar");
          regresa();     
          },
        
        error: function(result){
            console.log("entro por el error");
            console.log(result);
        }
       
      });
     
    }
    else 
    { 
      alert("Por favor complete todos los campos solicitados");
    }

  }

  function guardareliminar(){
    console.log("Estoy guardando el eliminar , el id de cliente es:");
    console.log(edelim);
    $.ajax({
            type: 'POST',
            data: { edelim: edelim},
            url: 'index.php/Cliente/BajaCliente', //index.php/
            success: function(data){
                    console.log(data);
                    alert("CLIENTE Eliminado");
                    regresa();
                  
                  },
              
            error: function(result){
                  
                  console.log(result);
                }
      });  
  } 

  function regresa(){

    $("#content").load("<?php echo base_url(); ?>index.php/Cliente/index/<?php echo $permission; ?>");
     WaitingClose();

  }

</script>
<script>     

</script>
<!-- Modal alta de cliente-->
<div class="modal fade" id="modaltarea" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
  <div class="modal-dialog modal-lg" role="document" style="width: 50%">
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
        <h4 class="modal-title"  id="myModalLabel"><span id="modalAction" class="fa fa-plus-square" style="color: #008000" > </span>  Agregar Cliente</h4>
      </div> <!-- /.modal-header  -->

      <div class="modal-body ui-widget" id="modalBodyArticle">
        
        <!-- <div class="row" > -->
          <!-- <div class="col-sm-12 col-md-12"> -->
            <div class="row">
              <div class="col-xs-4">
                <label style="margin-top: 7px;">Nombre <strong style="color: #dd4b39">*</strong>: </label>
              </div>
              <div class="col-xs-8">
                <input type="text" class="form-control" placeholder="Nombre" id="cliName" name="cliName" value="<?php echo $data['customer']['cliName'];?>" <?php echo ($data['read'] == true ? 'disabled="disabled"' : '');?>  >
              </div>
            </div><br>
            <div class="row">
              <div class="col-xs-4">
                <label style="margin-top: 7px;">Apellido <strong style="color: #dd4b39">*</strong>: </label>
              </div>
              <div class="col-xs-8">
                <input type="text" class="form-control" placeholder="Apellido" id="cliLastName"  name="cliLastName"value="<?php echo $data['customer']['cliLastName'];?>" <?php echo ($data['read'] == true ? 'disabled="disabled"' : '');?>  >
              </div>
         
            </div><br>
          
            <div class="row">
              <div class="col-xs-4">
                <label style="margin-top: 7px;">Celular: </label>
              </div>
              <div class="col-xs-8">
                <input type="text" class="form-control" placeholder="0264 - 155095888" id="cliMovil" name="cliMovil"value="<?php echo $data['customer']['cliMovil'];?>" <?php echo ($data['read'] == true ? 'disabled="disabled"' : '');?> >
              </div>
            </div><br>
         
        <div class="modal-footer">
          <button type="button" class="btn btn-default" data-dismiss="modal">Cancelar</button>
          <button type="button" class="btn btn-primary" id="btnSave" data-dismiss="modal" onclick="guardar()" >Guardar</button>
        </div>  <!-- /.modal footer -->
      </div>  <!-- /.modal-body -->
    </div> <!-- /.modal-content -->
  </div>  <!-- /.modal-dialog modal-lg -->
</div>  <!-- /.modal fade -->
<!-- / Modal -->

<!-- Modal editar-->
<div class="modal fade" id="modaleditar" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
  <div class="modal-dialog modal-lg" role="document" style="width: 40%">
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
        <h4 class="modal-title"  id="myModalLabel"><span id="modalAction" class="fa fa-fw fa-pencil" style="color: #f39c12" > </span> Editar Cliente</h4>
      </div> 
      <div class="modal-body input-group ui-widget" id="modalBodyArticle">  
        <div class="row" >
          <div class="col-sm-12 col-md-12">
            <div class="row">
              <div class="col-xs-4">
                  <label style="margin-top: 7px;">Nombre <strong style="color: #dd4b39">*</strong>: </label>
              </div>
              <div class="col-xs-8">
                <input type="text" class="form-control" placeholder="Nombre" id="nombre1" name="nombre1" value="<?php echo $data['customer']['cliName'];?>" <?php echo ($data['read'] == true ? 'disabled="disabled"' : '');?>  >
              </div>
            </div><br>
            <div class="row">
              <div class="col-xs-4">
                <label style="margin-top: 7px;">Apellido <strong style="color: #dd4b39">*</strong>: </label>
              </div>
              <div class="col-xs-8">
                <input type="text" class="form-control" placeholder="Apellido" id="Apellido1"  name="Apellido1" value="<?php echo $data['customer']['cliLastName'];?>" <?php echo ($data['read'] == true ? 'disabled="disabled"' : '');?>  >
              </div>
            </div><br>
           
            <div class="row">
              <div class="col-xs-4">
                <label style="margin-top: 7px;">Celular: </label>
              </div>
              <div class="col-xs-8">
                <input type="text" class="form-control" placeholder="0264 - 155095888" id="cel" name="cel" value="<?php echo $data['customer']['cliMovil'];?>" <?php echo ($data['read'] == true ? 'disabled="disabled"' : '');?> >
              </div>
            </div><br>
          </div>  
        </div>
        <div class="modal-footer">  
          <button type="button" class="btn btn-primary" id="btnSave" data-dismiss="modal" onclick="guardareditar()" >Guardar</button>
        </div>  <!-- /.modal footer -->

      </div> <!-- /.modal-body -->
    </div> <!-- /.modal-content -->
  </div> <!-- /.modal-dialog modal-lg -->
</div> <!-- /.modal fade -->
<!-- / Modal -->

<!-- Modal eliminar-->
<div class="modal fade" id="modaleliminar" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
  <div class="modal-dialog modal-lg" role="document" style="width: 50%">
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
        <h4 class="modal-title"  id="myModalLabel"><span id="modalAction" class="fa fa-fw fa-times-circle" style="color: #dd4b39" > </span> Eliminar Cliente</h4>
      </div> <!-- /.modal-header  -->

      <div class="modal-body input-group ui-widget" id="modalBodyArticle">
             
        <label >¿Realmente desea ELIMINAR CLIENTE?  </label>
            
      </div>  <!-- /.modal-body -->
      <div class="modal-footer">         
        <button type="button" class="btn btn-default" data-dismiss="modal">No</button>
        <button type="button" class="btn btn-primary" id="btnSave" data-dismiss="modal" onclick="guardareliminar()" >SI</button>
      </div>  <!-- /.modal footer -->     
    </div> <!-- /.modal-content -->
  </div>  <!-- /.modal-dialog modal-lg -->
</div>  <!-- /.modal fade -->
<!-- / Modal -->