<input type="hidden" id="permission" value="<?php echo $permission;?>">
<section class="content">
  <div class="row">
    <div class="col-xs-12">
      <div class="box">
        <div class="box-header">
          <h3 class="box-title">Cobradores</h3>
          <?php
          if (strpos($permission,'Add') !== false) {
            echo '<button class="btn btn-block btn-success" style="width: 100px; margin-top: 10px;" data-toggle="modal" onclick="Loadcobrador(0,\'Add\')" id="btnAdd" title="Nueva">Agregar</button>';
          }
          ?>
        </div><!-- /.box-header -->
        <div class="box-body">
          <table id="cobrador" class="table table-bordered table-hover">
            <thead>
              <tr>
                <th width="20%">Acciones</th>
                <th>Descripción</th>
                <th>Direccion</th>
                <th>Email</th>
                <th>telefono</th>
              </tr>
            </thead>
            <tbody>
              <?php
              	foreach($list as $f)
    		        {
                  //var_dump($u);

                  echo '<tr>';
                  echo '<td>';
                  

                  if (strpos($permission,'Edit') !== false) {
	              
                   echo '<i class="fa fa-fw fa-pencil" style="color: #f39c12; cursor: pointer; margin-left: 15px;" title="Editar" onclick="Loadcobrador('.$f['id_cobrador'].',\'Edit\')"></i>';
                  
                  }
                  if (strpos($permission,'Del') !== false) {
	                 echo '<i class="fa fa-fw fa-times-circle" style="color: #dd4b39; cursor: pointer; margin-left: 15px;" title="Eliminar" onclick="Loadcobrador('.$f['id_cobrador'].',\'Del\')"></i>';
                  }
                  if (strpos($permission,'View') !== false) {
	                	echo '<i class="fa fa-fw fa-search" style="color: #3c8dbc; cursor: pointer; margin-left: 15px;" title="Consultar" onclick="Loadcobrador('.$f['id_cobrador'].',\'View\')"></i>';
                  }
	                echo '</td>';
	                echo '<td style="text-align: left">'.$f['nombre'].'</td>';
                  echo '<td style="text-align: left">'.$f['direccion'].'</td>';
                  echo '<td style="text-align: left">'.$f['mail'].'</td>';
                  echo '<td style="text-align: left">'.$f['telefono'].'</td>';
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
  $(function () {
    //$("#groups").DataTable();
    $('#cobradores').DataTable({
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

  
  var idFamily = 0;
  var acFamily = '';
  
  function Loadcobrador(id_, action){
  	idCobrador = id_;
  	acCobrador = action;
  	LoadIconAction('modalAction',action);
  	WaitingOpen('Cargando cobrador');
      $.ajax({
          	type: 'POST',
          	data: { id : id_, act: action },
    		url: 'index.php/cobrador/getcobrador', 
    		success: function(result){
			                WaitingClose();
			                $("#modalBodycobradores").html(result.html);
			                setTimeout("$('#modalCobrador').modal('show')",800);
    					},
    		error: function(result){
    					WaitingClose();
    					alert("error");
    				},
          	dataType: 'json'
    		});
  }

  
  $('#btnSave').click(function(){
  	
  	if(acCobrador== 'View')
  	{
  		$('#modalCobrador').modal('hide');
  		return;
  	}

  	var hayError = false;
    if($('#nombre').val() == '')
    {
    	hayError = true;
    }
    if($('#direccion').val() == '')
    {
      hayError = true;
    }
    if($('#mail').val() == '')
    {
      hayError = true;
    }
    if($('#telefono').val() == '')
    {
      hayError = true;
    }

    if(hayError == true){
    	$('#error').fadeIn('slow');
    	return;
    }

    $('#error').fadeOut('slow');
    WaitingOpen('Guardando cambios');
    	$.ajax({
          	type: 'POST',
          	data: { 
                    id : idCobrador, 
                    act: acCobrador, 
                    name: $('#nombre').val(),
                    dir: $('#direccion').val(),
                    mai: $('#mail').val(),
                    tel: $('#telefono').val()
                  },
    		url: 'index.php/Cobrador/setcobrador', 
    		success: function(result){
                			WaitingClose();
                			$('#modalCobrador').modal('hide');
                			setTimeout("cargarView('Cobrador', 'index', '"+$('#permission').val()+"');",1000);
    					},
    		error: function(result){
    					WaitingClose();
    					alert("error");
    				},
          	dataType: 'json'
    		});
  });

</script>


<!-- Modal -->
<div class="modal fade" id="modalCobrador" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
        <h4 class="modal-title" id="myModalLabel"><span id="modalAction"> </span> Conbrador</h4> 
      </div>
      <div class="modal-body" id="modalBodycobradores">
        
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-default" data-dismiss="modal">Cancelar</button>
        <button type="button" class="btn btn-primary" id="btnSave">Guardar</button>
      </div>
    </div>
  </div>
</div>