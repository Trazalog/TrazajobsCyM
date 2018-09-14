
<input type="hidden" id="permission" value="<?php echo $permission;?>">
<section class="content">
 
 
 <div class="row">
    <div class="col-xs-12">
      <div class="box">
        <div class="box-header">
          <h3 class="box-title">Entrega de Ordenes</h3>
         
        </div><!-- /.box-header -->
        <div class="box-body">
          <table id="envio" class="table table-bordered table-hover">
            <thead>
              <tr>
                <th width="20%">Acciones</th>
                <th>Numero</th>
                <th>Fecha Inicio</th>
                <th>Fecha Entrega</th>
                <th>Fecha Terminada</th>
                <th>Fecha Aviso</th>
                <th>Detalle</th>
                <th>Estado</th>

              </tr>
            </thead>
            <tbody>
              <?php
                if(count($list) > 0) {                  
                  foreach($list as $a)
                  { if ($a['estado'] == 'T') {
                    
                    $id=$a['id_orden'];
                    echo '<tr id="'.$id.'">';
                    echo '<td>';
                    if (strpos($permission,'Edit') !== false) {
                                        
                    //if (strpos($permission,'Finalizar') !== false) {
                      //echo '<i class="fa fa-fw fa-times-circle" style="color: #dd4b39; cursor: pointer; margin-left: 15px;" title="Eliminar"></i>'; 

                      echo '<i class="fa fa-thumbs-up" style="color: #3c8dbc; cursor: pointer; margin-left: 15px;" title="Entregar"></i>';
                    }
                    
                    echo '</td>';
                    //if ($a['estado'] == 'T') {
                     

                    echo '<td style="text-align: right">'.$a['nro'].'</td>';
                    echo '<td style="text-align: left">'.$a['fecha_inicio'].'</td>';
                    echo '<td style="text-align: right">'.$a['fecha_entrega'].'</td>';
                    echo '<td style="text-align: right">'.$a['fecha_terminada'].'</td>';
                    echo '<td style="text-align: right">'.$a['fecha_aviso'].'</td>';
                    echo '<td style="text-align: right">'.$a['descripcion'].'</td>';


                    
                   echo '<td style="text-align: center">'.($a['estado'] == 'T' ?  '<small class="label pull-left bg-blue">Terminado</small>':($a['estado'] == 'E' ? '<small class="label pull-left bg-red">Entregado</small>':'<small class="label pull-left bg-green">Curso</small>')) .'</td>';  


                    /*echo '<td style="text-align: center">'.($a['estado'] == 'C' ? '<small class="label pull-left bg-green">Curso</small>' : ($a['estado'] == 'P' ? '<small class="label pull-left bg-red">Pedido</small>' : ($a['estado'] == 'T' ? '<small class="label pull-left bg-red">Terminado</small>' :'<small class="label pull-left bg-yellow">Asignado</small>'))).'</td>';*/
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

$(document).ready(function(event) {

  $(".fa-thumbs-up").click(function (e) { 
               
        //var tr = $(this).parent('td').parent('tr');

        var id_orden = $(this).parent('td').parent('tr').attr('id');
        console.log(id_orden);
       
            $.ajax({
              type: 'POST',
              data: { id_orden: id_orden},
              url: 'index.php/Envio/entrega', //index.php/
              success: function(data){
                      //var data = jQuery.parseJSON( data );
                      
                      console.log(data);
                     
                      //$(tr).remove();

                    //$('#envio').append(data); 
                     
              

                    alert("Se Entrego Orden");
                    regresa();
                    },
                
              error: function(result){
                    
                    console.log(result);
                  }
                  //dataType: 'json'
              });
        
  
  });

  $('#envio').DataTable({
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
 function regresa(){
  
    $('#content').empty(); //listOrden
    
    $("#content").load("<?php echo base_url(); ?>index.php/Envio/index/<?php echo $permission; ?>");
    WaitingClose();
  }