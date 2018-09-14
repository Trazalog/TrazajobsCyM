<input type="hidden" id="permission" value="<?php echo $permission;?>">
<section class="content">
  <div class="row">
    <div class="col-xs-12">
      <div class="box">
        <div class="box-header">
          <h3 class="box-title">Chequeras</h3>
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
                <th style="text-align: center">Banco</th>
                <th style="text-align: center">Nro.inicio</th>
                <th style="text-align: center">Cantidad</th>
                
              </tr>
            </thead>
            <tbody>
              <?php
                foreach($list as $z)
                {
                  $id=$z['cheqId'];
                
                    echo '<tr id="'.$id.'" class="'.$id.'" >';
                    echo '<td>';
                  if (strpos($permission,'Edit') !== false) {
                      echo '<i class="fa fa-fw fa-pencil" style="color: #f39c12; cursor: pointer; margin-left: 15px;" title="Editar" data-toggle="modal" data-target="#modaleditar"></i>';
                  }
                  if (strpos($permission,'Del') !== false) {
                      echo '<i class="fa fa-fw fa-times-circle"  title="Editar" style="color: #dd4b39; cursor: pointer; margin-left: 15px;"></i>';
                  }
                  
                      
                  echo '</td>';
                  echo '<td style="text-align: center">'.$z['banco'].'</td>';
                  echo '<td style="text-align: center">'.$z['cheqinicio'].'</td>';
                  echo '<td style="text-align: center">'.$z['cheqcantidad'].'</td>';
                  
                  
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
    console.log("ID de chequera");
    console.log(id_cheq);
    //console.log(ed);
    ed=id_cheq;
    $.ajax({
        type: 'GET',
        data: { id_cheq:id_cheq},
        url: 'index.php/Chequera/getpencil', //index.php/
        success: function(data){
                console.log("Estoy editando");           
                console.log(data);
               
               
                datos={
             
                  'numero':data[0]['cheqinicio'],
                  'cantidad':data[0]['cheqcantidad'],
                  'idbanco': data[0]['bancid'],
                  'banco':data[0]['de'],
                  'sucursal':data[0]['bancsucursal'],
               
                }

              
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
    console.log(idcheq);
    
    $.ajax({
            type: 'POST',
            data: { idcheq: idcheq},
            url: 'index.php/Chequera/baja_chequera', //index.php/
            success: function(data){
                    //var data = jQuery.parseJSON( data );
                    console.log(data);
                   
                    //$(tr).remove();
                    alert("CHEQUERA Eliminado");
                    regresa();
                  
                  },
              
            error: function(result){
                  
                  console.log(result);
                },
                dataType: 'json'
      });

   
    
  });

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



  $("#fecha").datepicker({
    dateFormat: 'dd/mm/yy',
    firstDay: 1
  }).datepicker("setDate", new Date());


  });
 

function completarEdit(datos){

  console.log("datos que llegaron");
  console.log(datos);

  $('select#banco1').append($('<option />', { value: datos['idbanco'],text: datos['banco']}));
  traer_banco2();
  
  //$('#banco1').val(datos['banco']);
  $('#numeroedit').val(datos['numero']);
  $('#cantidadedit').val(datos['cantidad']);
 
}
traer_banco();
function traer_banco(){
      $.ajax({
        type: 'POST',
        data: { },
        url: 'index.php/Chequera/getbanco', //index.php/
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
    url: 'index.php/Chequera/getbanco', //index.php/
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


  
function guardareditar(){
  console.log("Estoy editando");
  console.log("El id de banco es:"); 
  console.log(ed);
    
  var numero = $('#numeroedit').val();
  var banco = $('#banco1').val();
  var cantidad = $('#cantidadedit').val();
  
  
  var parametros = {
        'cheqinicio': numero,
        'cheqcantidad': cantidad,
       // 'chefecha': date('Y-m-d'),
        'bancid': banco

        
        
  };                                              
  console.log(parametros);
  var hayError = false; 

  if( parametros !=0)
    {                                     
    $.ajax({
      type:"POST",
      url: "index.php/Chequera/edit_chequera", //controlador /metodo
      data:{parametros:parametros, ed:ed},
      success: function(data){
        console.log("exito en editar");
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
    alert("Por favor complete la descripcion del grupo, es un campo obligatorio");
  }

}



function guardar(){
  console.log("Estoy guardando");
  var banco = $('#banco').val();
  var cantidad = $('#cantidad').val();
  var numero = $('#numero').val();
  //var fecha = $('#fecha').val();
 
  var parametros = {
    'cheqinicio': numero,
    'cheqcantidad': cantidad,
   // 'chefecha': fecha,
    'bancid': banco
   

  };                                              
  console.log(parametros);
  var hayError = false; 

  if( parametros !="")
    {                                     
    $.ajax({
      type:"POST",
      url: "index.php/Chequera/agregar_chequera", //controlador /metodo
      data:{parametros:parametros},
      success: function(data){
        console.log("exito en agregar una nueva chequera ");
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

  $("#content").load("<?php echo base_url(); ?>index.php/Chequera/index/<?php echo $permission; ?>");
   WaitingClose();
}

  

</script>


<!-- Modal alta de Tarea-->
 <div class="modal fade" id="modaltarea" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
  <div class="modal-dialog modal-lg" role="document" style="width: 60%">
    <div class="modal-content">

      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
        <h4 class="modal-title"  id="myModalLabel"><span id="modalAction" class="fa fa-plus-square" style="color: #008000" > </span>  Agregar chequera</h4>
       </div> <!-- /.modal-header  -->

      <div class="modal-body input-group ui-widget" id="modalBodyArticle">
        
        <div class="row" >
          <div class="col-sm-12 col-md-12">
            <div class="col-xs-8">Banco:
              <select type="text" id="banco" name="banco" class="form-control" >
              </select>
              </div>
              

              <div class="col-xs-8">Nro. Inicio:
             <input type="text" id="numero" name="numero" class="form-control" placeholder="Ingrese Nro inicio...">
              
            </div> 


             <div class="col-xs-8">Cantidad:
              <input type="text" id="cantidad" name="cantidad" class="form-control" placeholder="Ingrese cantidad...">
            </div> 

             

           
            </div>                   
          </div>
       
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
        <h4 class="modal-title"  id="myModalLabel"><span id="modalAction" class="fa fa-fw fa-pencil" style="color: #f39c12" > </span> Editar Chequera</h4>
       </div> <!-- /.modal-header  -->

      <div class="modal-body input-group ui-widget" id="modalBodyArticle">
        
        <div class="row" >
          <div class="col-sm-12 col-md-12">
        <div class="col-xs-8">Banco:
              <select type="text" id="banco1" name="banco1" class="form-control" >
              </select>
              </div>
              

            <div class="col-xs-8">Nro. Inicio:
             <!-- <input type="text" id="numero" name="numero" class="form-control" placeholder="Ingrese Nro inicio...">-->
              <input type="text" id="numeroedit" name="numeroedit" class="form-control">
            </div> 


             <div class="col-xs-8">Cantidad:
              <input type="text" id="cantidadedit" name="cantidadedit" class="form-control" placeholder="Ingrese cantidad...">
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