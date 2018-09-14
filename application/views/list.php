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
     
    var id_banco = $(this).parent('td').parent('tr').attr('id');
    console.log("ID de banco");
    console.log(id_banco);
    ed=id_banco;
    $.ajax({
        type: 'GET',
        data: { id_banco:id_banco},
        url: 'index.php/Banco/getpencil', //index.php/
        success: function(data){
                console.log("Estoy editando");           
                console.log(data);
               
               
                datos={
             
                  'descripcion':data[0]['bancdescrip'],
                  'contacto':data[0]['banccontacto'],
                  'direccion':data[0]['bancdir'],
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
    var idbanco = $(this).parent('td').parent('tr').attr('id');
    console.log(idbanco);
    
    $.ajax({
            type: 'POST',
            data: { idbanco: idbanco},
            url: 'index.php/Banco/baja_banco', //index.php/
            success: function(data){
                    //var data = jQuery.parseJSON( data );
                    console.log(data);
                   
                    //$(tr).remove();
                    alert("BANCO Eliminado");
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

  });
 

function completarEdit(datos){

  console.log("datos que llegaron");
  $('#descripcionedit').val(datos['descripcion']);
  $('#direccionedit').val(datos['direccion']);
  $('#sucursaledit').val(datos['sucursal']);
  $('#contactoedit').val(datos['contacto']);
}
  
function guardareditar(){
  console.log("Estoy editando");
  console.log("El id de banco es:"); 
  console.log(ed);
    
  var descripcion = $('#descripcionedit').val();
  var direccion = $('#direccionedit').val();
  var sucursal = $('#sucursaledit').val();
  var contacto = $('#contactoedit').val();
  
  var parametros = {
        'bancdescrip': descripcion,
        'bancid': direccion,
        'banccontacto': contacto,
        'bancsucursal': sucursal

        
        
  };                                              
  console.log(parametros);
  var hayError = false; 

  if( parametros !=0)
    {                                     
    $.ajax({
      type:"POST",
      url: "index.php/Banco/edit_banco", //controlador /metodo
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
  var descripcion = $('#descripcion').val();
  var direccion = $('#direccion').val();
  var contacto = $('#contacto').val();
  var sucursal = $('#sucursal').val();
  var parametros = {
    'bancdescrip': descripcion,
    'bancdir': direccion,
    'banccontacto': contacto,
    'bancsucursal': sucursal,

  };                                              
  console.log(parametros);
  var hayError = false; 

  if( parametros !="")
    {                                     
    $.ajax({
      type:"POST",
      url: "index.php/Banco/agregar_banco", //controlador /metodo
      data:{parametros:parametros},
      success: function(data){
        console.log("exito en agregar un nuevo banco ");
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

  //WaitingOpen();
  //$('#modaldeposito').empty();
  //$('#modaleditar').empty(); 
  //$('#content').empty();
  $("#content").load("<?php echo base_url(); ?>index.php/Banco/index/<?php echo $permission; ?>");
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
            <div class="col-xs-12">Banco:
              <select type="text" id="descripcion" name="descripcion" class="form-control" placeholder="Ingrese Nombre de Banco...">
              </select>
              </div>

              <div class="col-xs-12">Nro. Inicio:
              <input type="text" id="direccion" name="direccion" class="form-control" placeholder="Ingrese Direccion...">
            </div> 

             <div class="col-xs-12">Cantidad:
              <input type="text" id="contacto" name="contacto" class="form-control" placeholder="Ingrese contacto...">
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
        <h4 class="modal-title"  id="myModalLabel"><span id="modalAction" class="fa fa-fw fa-pencil" style="color: #f39c12" > </span> Editar Banco</h4>
       </div> <!-- /.modal-header  -->

      <div class="modal-body input-group ui-widget" id="modalBodyArticle">
        
        <div class="row" >
          <div class="col-sm-12 col-md-12">
        <div class="col-xs-12">Descripcion:
              <input type="text" id="descripcionedit" name="descripcionedit" class="form-control" placeholder="Ingrese Nombre de Banco...">
              </div>

              <div class="col-xs-12">Direccion:
              <input type="text" id="direccionedit" name="direccionedit" class="form-control" placeholder="Ingrese Direccion...">
            </div> 

             <div class="col-xs-12">Contacto:
              <input type="text" id="contactoedit" name="contactoedit" class="form-control" placeholder="Ingrese contacto...">
            </div> 

            <div class="col-xs-12">Sucursal:
              <input type="text" id="sucursaledit" name="sucursaledit" class="form-control" placeholder="Ingrese Sucursal...">
            </div> 
        
      </div>
      </div>
      </div>
      
     

      <div class="modal-footer">
       
        
        <button type="button" class="btn btn-primary" id="btnSave" data-dismiss="modal" onclick="guardareditar()" >Guardar</button>
      </div>  <!-- /.modal footer -->

       </div>  <!-- /.modal-body -->
    </div> <!-- /.modal-content -->

  </div>  <!-- /.modal-dialog modal-lg -->
</div>  <!-- /.modal fade -->
<!-- / Modal -->