<input type="hidden" id="permission" value="<?php echo $permission;?>">
<section class="content">
  <div class="row">
    <div class="col-xs-12">
      <div class="box">
        <div class="box-header">
          <h3 class="box-title">Cheques Terceros</h3>
          <?php
            if (strpos($permission,'Add') !== false) {
              echo '<button class="btn btn-block btn-success" style="width: 100px; margin-top: 10px;" data-toggle="modal" data-target="#modaltarea" id="btnAdd">Agregar</button>';
            }
          ?>
        </div><!-- /.box-header -->
        <div class="box-body">
          <table id="terceros" class="table table-bordered table-hover" style="text-align: center">
            <thead>
              <tr>
                <th  width="20%" style="text-align: center">Acciones</th>
                <th style="text-align: center">Nro de Cheque</th>
                <th style="text-align: center">Banco</th>
                <th style="text-align: center">Cliente</th>
                <th style="text-align: center">Monto</th>
                <th style="text-align: center">Fecha</th>
                

                
              </tr>
            </thead>
            <tbody>
              <?php
                foreach($list as $z)
                {
                  $id=$z['id_che'];
                
                    echo '<tr id="'.$id.'" class="'.$id.'" >';
                    echo '<td>';
                  if (strpos($permission,'Edit') !== false) {
                      echo '<i class="fa fa-fw fa-pencil" style="color: #f39c12; cursor: pointer; margin-left: 15px;" title="Editar" data-toggle="modal" data-target="#modaleditar"></i>';
                  }
                  if (strpos($permission,'Del') !== false) {
                      echo '<i class="fa fa-fw fa-times-circle"  title="Editar" style="color: #dd4b39; cursor: pointer; margin-left: 15px;"></i>';
                  }
                  
                      
                  echo '</td>';
                  echo '<td style="text-align: center">'.$z['numero'].'</td>';
                  echo '<td style="text-align: center">'.$z['bancdescrip'].'</td>';
                  echo '<td style="text-align: center">'.$z['cliLastName'].'   '.$z['cliName'].' </td>';
                  echo '<td style="text-align: center">'.$z['monto'].'</td>';
                  echo '<td style="text-align: center">'.$z['fecha_vto'].'</td>';
                 
                  
                  
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
var ed="";
$(document).ready(function(event) {

   //Editar
  $(".fa-pencil").click(function (e) { 
     
    var id_cheq = $(this).parent('td').parent('tr').attr('id');
    console.log("ID de cheque de tercero es :");
    console.log(id_cheq);
    ed=id_cheq;
    $.ajax({
        type: 'GET',
        data: { id_cheq:id_cheq},
        url: 'index.php/Cheqtercero/getpencil', //index.php/
        success: function(data){
                console.log("Estoy editando");           
                console.log(data);
                console.log(data[0]['numero']);
               
               
                datos={
             
                  'numero':data[0]['numero'],
                  'banco':data[0]['id_banco'],
                  'clienteid':data[0]['cliId'],
                  'clientenom':data[0]['cliName'],
                  'clienteap':data[0]['cliLastName'],
                  'monto':data[0]['monto'],
                  'estado':data[0]['estado'],
                  'fecha':data[0]['fecha_vto'],
                  'descripban':data[0]['bancdescrip'],

               
                }

               
                $('#cliedit').html('');
             

              
                completarEdit(datos);
                             
            
              },
          
        error: function(result){
              
              console.log(result);
            },
            dataType: 'json'
        });
  
  });

  //Cambio de estado a un equipo
  $(".fa-times-circle").click(function (e) { 
                 
         
    console.log("Esto eliminando"); 
    var idcheq = $(this).parent('td').parent('tr').attr('id');
    console.log("El ID de cheque de tercero es :");
    console.log(idcheq);
    
    $.ajax({
            type: 'POST',
            data: { idcheq: idcheq},
            url: 'index.php/Cheqtercero/baja_cheque', //index.php/
            success: function(data){
                    //var data = jQuery.parseJSON( data );
                    console.log(data);
                   
                    //$(tr).remove();
                    alert("CHEQUE Eliminado");
                    regresa();
                  
                  },
              
            error: function(result){
                  
                  console.log(result);
                },
                dataType: 'json'
      });

   
    
  });

  $('#terceros').DataTable({
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
 

function completarEdit(datos){

  console.log("datos que llegaron");


  $('select#banco1').append($('<option />', { value: datos['banco'],text: datos['descripban']}));
  traer_banco2();

  //$('#banco1').val(datos['numero']);
  $('#numedit').val(datos['numero']);
   $('select#cliedit').append($('<option />', { value: datos['clienteid'],text: datos['clienteap']+'.'+datos['clientenom']+'.'}));
  traer_cli2();
  //$('#cliedit').val(datos['cliente']);
  $('#fechaedit').val(datos['fecha']);
  $('#montoedit').val(datos['monto']);
 
}
traer_banco();
function traer_banco(){
      $.ajax({
        type: 'POST',
        data: { },
        url: 'index.php/Cheqtercero/getbanco', //index.php/
        success: function(data){
               
                 var opcion  = "<option value='-1'>Seleccione...</option>" ; 
                  $('#banco').append(opcion); 
                for(var i=0; i < data.length ; i++) 
                {    
                      var nombre = data[i]['bancdescrip'];
                      var opcion  = "<option value='"+data[i]['bancid']+"'>" +nombre+ "</option>" ; 

                    $('#banco').append(opcion); 
                                   
                }
              },
        error: function(result){
              
              console.log(result);
            },
            dataType: 'json'
        });
}

function traer_banco2(){

  $('#banco1').html(''); 
  $.ajax({
    type: 'POST',
    data: { },
    url: 'index.php/Cheqtercero/getbanco', //index.php/
    success: function(data){
           
              
              $('#banco1').append(opcion); 
            for(var i=0; i < data.length ; i++) 
            {    
                  var nombre = data[i]['bancdescrip'];
                  var opcion  = "<option value='"+data[i]['bancid']+"'>" +nombre+ "</option>" ; 

                $('#banco1').append(opcion); 
                               
            }
          },
    error: function(result){
          
          console.log(result);
        },
        dataType: 'json'
    });
}

traer_cli();
function traer_cli(){
      $.ajax({
        type: 'POST',
        data: { },
        url: 'index.php/Cheqtercero/traer_cli', //index.php/
        success: function(data){
               
                 var opcion  = "<option value='-1'>Seleccione...</option>" ; 
                  $('#cli').append(opcion); 
                for(var i=0; i < data.length ; i++) 
                {    
                      var nombre = data[i]['cliLastName']+' '+data[i]['cliName'];
                      var opcion  = "<option value='"+data[i]['cliId']+"'>" +nombre+ "</option>" ; 

                    $('#cli').append(opcion); 
                                   
                }
              },
        error: function(result){
              
              console.log(result);
            },
            dataType: 'json'
        });
}
function traer_cli2(){
  // $('#cliedit').html('');
      $.ajax({
        type: 'POST',
        data: { },
        url: 'index.php/Cheqtercero/traer_cli', //index.php/
        success: function(data){
          console.log(data);
               
                 //var opcion  = "<option value='-1'>Seleccione...</option>" ; 
                  $('#cliedit').append(opcion); 
                for(var i=0; i < data.length ; i++) 
                {    
                      var nombre = data[i]['cliLastName']+' '+data[i]['cliName'];
                      var opcion  = "<option value='"+data[i]['cliId']+"'>" +nombre+ "</option>" ; 

                    $('#cliedit').append(opcion); 
                                   
                }
              },
        error: function(result){
              
              console.log(result);
            },
            dataType: 'json'
        });
  } 
function guardareditar(){
  console.log("Estoy editando");
  console.log("El id de cheque es:"); 
  console.log(ed);
    
  var numero = $('#numedit').val();
  var banco = $('#banco1').val();
  var cliente = $('#cliedit').val();
  var monto = $('#montoedit').val();
  var fecha = $('#fechaedit').val();
  
  
  var parametros = {
        'numero': numero,
        'id_banco': banco,
        'cliente': cliente,
        'estado': 1,
        'monto': monto,
        'fecha_vto': fecha

        
        
  };                                              
  console.log(parametros);
  var hayError = false; 

  if( parametros !=0)
    {                                     
    $.ajax({
      type:"POST",
      url: "index.php/Cheqtercero/edit_cheque", //controlador /metodo
      data:{parametros:parametros, ed:ed},
      success: function(data){
        console.log("exito en editar");
        regresa();     
        },
      
      error: function(result){
          console.log("entro por el error");
          console.log(result);
      }
      // dataType: 'json'
    });
   
  }
  else 
  { 
    alert("Por favor complete la descripcion del grupo, es un campo obligatorio");
  }

}



function guardar(){
  console.log("Estoy guardando");
  var banco = $('#banco').val();
  var numero = $('#num').val();
  var cliente = $('#cli').val();
  var fecha = $('#fecha').val();
  var monto = $('#monto').val();
  //var descripcion = $('#descripcion').val();
  //var $nu = $("select#num option:selected").html();
  //console.log($nu);

  var parametros = {
    //'cheqnro': nu,
    'numero': numero,

    'id_banco': banco,
    'cliente': cliente,
    'estado': 1,
    'monto': monto,

    //'id_chequera': numero,
    'fecha_vto': fecha
    
   
  
  };                                              
  console.log(parametros);
  var hayError = false; 

  if( parametros !="")
    {                                     
    $.ajax({
      type:"POST",
      url: "index.php/Cheqtercero/agregar_cheque", //controlador /metodo
      data:{parametros:parametros},
      success: function(data){
        console.log("exito en agregar un nuevo cheque de tercero");
        regresa();

        },
      
      error: function(result){
          console.log("entro por el error");
          console.log(result);
      },
      // dataType: 'json'
    });
   
  }
  else 
  { 
    alert("Por favor complete toda la informacion para poder guardar");

  }

}

function regresa(){

  $("#content").load("<?php echo base_url(); ?>index.php/Cheqtercero/index/<?php echo $permission; ?>");
   WaitingClose();
}

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


</script>


<!-- Modal alta de Tarea-->
 <div class="modal fade" id="modaltarea" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
  <div class="modal-dialog modal-lg" role="document" style="width: 60%">
    <div class="modal-content">

      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
        <h4 class="modal-title"  id="myModalLabel"><span id="modalAction" class="fa fa-plus-square" style="color: #008000" > </span>  Agregar Cheques Tercero</h4>
       </div> <!-- /.modal-header  -->

      <div class="modal-body input-group ui-widget" id="modalBodyArticle">
        
        <div class="row" >
          <div class="col-sm-12 col-md-12">
                                    
            <div class="col-xs-8">Nro:
              <input type="text"   id="num" name="num" class="form-control" placeholder="Ingrese Numero de Cheque...">
              
            </div>
            <br>
            <br>
            <div class="col-xs-8">Banco:
              <select type="text" id="banco" name="banco" class="form-control" >
              </select>
            </div> 
            <br>
            <br>
            <div class="col-xs-8">Cliente:
              <select   type="text"  id="cli" name="cli" class="form-control"  >  </select>
            </div> 
            <br>
            <br>
            <div class="col-xs-8">Fecha:
              <input type="date" id="fecha" name="fecha" class="form-control" >
            </div>
            <br> 
            <br>
            <div class="col-xs-8">Monto:
              <input type="text" id="monto" name="monto" class="form-control" onkeyup="format(this)" onchange="format(this) " placeholder="Ingrese Monto...">
            </div> 
            <br>
            <div class="col-xs-8">Observacion
              <!--<input type="text" id="fechav" name="fechav" class="form-control" >-->
            </div> 
            <div class="col-xs-12">
              <textarea  class="form-control input-md" rows="6" cols="500" id="descripcion" name="descripcion" value=""  placeholder="Ingrese Observacion..."></textarea>
            </div>
          </div>                   
        </div>
        <br>
       
        <div class="modal-footer">
          <button type="button" class="btn btn-default" data-dismiss="modal">Cancelar</button>
          <button type="button" class="btn btn-primary" id="btnSave" data-dismiss="modal" onclick="guardar()" >Guardar</button>
        </div>  <!-- /.modal footer -->

      </div>
    </div>

  </div>  <!-- /.modal-body -->
</div> <!-- /.modal-content -->
</div>  <!-- /.modal-dialog modal-lg -->
</div>  <!-- /.modal fade -->
<!-- / Modal -->


<!-- Modal editar-->
 <div class="modal fade" id="modaleditar" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
  <div class="modal-dialog modal-lg" role="document" style="width: 60%">
    <div class="modal-content">

      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
        <h4 class="modal-title"  id="myModalLabel"><span id="modalAction" class="fa fa-fw fa-pencil" style="color: #f39c12" > </span> Editar Cheques Terceros</h4>
       </div> <!-- /.modal-header  -->

      <div class="modal-body input-group ui-widget" id="modalBodyArticle">
        
        <div class="row" >
          <div class="col-sm-12 col-md-12">
                        
            <div class="col-xs-8">Nro:
              <input type="text"   id="numedit" name="numedit" class="form-control" placeholder="Ingrese Numero de Cheque...">
            </div> 
            <br>
            <br>
             <div class="col-xs-8">Banco:
              <select type="text" id="banco1" name="banco1" class="form-control" >
              </select>
            </div>
            <br>
            <br>
            <div class="col-xs-8">Cliente:
              <select  type="text"  id="cliedit" name="cliedit" class="form-control" >
                
              </select>
            </div> 
            <br>
            <br>
            <div class="col-xs-8">Fecha:
              <input type="date" id="fechaedit" name="fechaedit" class="form-control" >
            </div>
            <br> 
            <br>
            <div class="col-xs-8">Monto:
                <input type="text" id="montoedit" name="montoedit" class="form-control" onkeyup="format(this)" onchange="format(this) " placeholder="Ingrese Monto...">
            </div> 
            <br>
              <div class="col-xs-8">Observacion
              <!--<input type="text" id="fechav" name="fechav" class="form-control" >-->
            </div> 

            <div class="col-xs-12">
                    <textarea  class="form-control input-md" rows="6" cols="500" id="descripcionedit" name="descripcionedit" value=""  placeholder="Ingrese Observacion..."></textarea>
                  </div>



           
            </div>                   
          </div>
      <div class="modal-footer">
       
        
        <button type="button" class="btn btn-primary" id="btnSave" data-dismiss="modal" onclick="guardareditar()" >Guardar</button>
      </div>  <!-- /.modal footer -->

      </div>
      </div>
      </div>

       </div>  <!-- /.modal-body -->
    </div> <!-- /.modal-content -->

  </div>  <!-- /.modal-dialog modal-lg -->
</div>  <!-- /.modal fade -->
<!-- / Modal -->