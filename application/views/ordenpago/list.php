<input type="hidden" id="permission" value="<?php echo $permission;?>">
<section class="content">
  <div class="row">
    <div class="col-xs-12">
      <div class="box">
        <div class="box-header">
          <h3 class="box-title">Ordenes de Pago</h3>
          <?php
          if (strpos($permission,'Add') !== false) {
            echo '<button class="btn btn-block btn-success" style="width: 100px; margin-top: 10px;" id="btnAdd">Agregar</button>';
          }
          ?>
        </div><!-- /.box-header -->
        <div class="box-body">
          <table id="ordenes_pago" class="table table-bordered table-hover">
            <thead>
              <tr>                
                <th>Número</th>
                <th>Fecha</th>
                <th>Proveedor</th>
                <th>Monto</th>
                <th>Estado</th>
              </tr>
            </thead>
            <tbody>
              <?php
                foreach($list as $f)
                {
                  echo '<tr>';
                  //echo '<td>';
                  // if (strpos($permission,'Edit') !== false) {
                  //   echo '<i class="fa fa-fw fa-pencil btnEdit" style="color: #f39c12; cursor: pointer; margin-left: 15px;" title="Editar" data-idfac="'.$f['facId'].'"></i>';
                  // }
                  // if (strpos($permission,'Del') !== false) {
                  //  echo '<i class="fa fa-fw fa-times-circle btnDelete" style="color: #dd4b39; cursor: pointer; margin-left: 15px;" title="Eliminar" data-idfac="'.$f['facId'].'"></i>';
                  // }
                  //echo '</td>';
                  echo '<td style="text-align:left">'.$f['opid'].'</td>';
                  echo '<td style="text-align:left">'.$f['opfecha'].'</td>';
                  echo '<td style="text-align:left">'.$f['provnombre'].'</td>';
                  echo '<td style="text-align:left">'.$f['opmonto'].'</td>';
                  echo '<td style="text-align: center">'.($f['opestado'] == 'P' ? '<small class="label pull-left bg-green">Pagado</small>' : ($f['opestado'] == '' ? '<small class="label pull-left bg-red">Pedido</small>' : ($f['opestado'] == '' ? '<small class="label pull-left bg-yellow">Asignado</small>' : '<small class="label pull-left bg-blue">Terminado</small>'))).'</td>';
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
  $(function() {

    /* carga la vista agregar factura */
    $("#btnAdd").on("click", function(){
      cargarView("Ordenpago", "getProveedoresFactura", $('#permission').val() );
    });


    /* carga la vista editar factura */
    $(".btnEdit").on("click", function(){
      WaitingOpen();
      //var url = "index.php/factura/editFactura/"+$(this).data("idfac");
      $('#content').empty();
      $("#content").load("<?php echo base_url(); ?>index.php/factura/editFactura/"+$(this).data("idfac"));
      WaitingClose();
    });//*/

    /* cargo plugin DataTable (debe ir al final de los script) */
    $("#facturas").DataTable({
      "aLengthMenu": [ 10, 25, 50, 100 ],
      "autoWidth": true,
      "info": true,
      "ordering": true,
      "order": [[1, "asc"],[3, "asc"]],
      "paging": true,
      "language": {
        "sProcessing":     "Procesando...",
        "sLengthMenu":     "Mostrar _MENU_ registros",
        "sZeroRecords":    "No se encontraron resultados",
        "sEmptyTable":     "Ningún dato disponible en esta tabla",
        "sInfo":           "Mostrando registros del _START_ al _END_ de un total de _TOTAL_ registros",
        "sInfoEmpty":      "Mostrando registros del 0 al 0 de un total de 0 registros",
        "sInfoFiltered":   "(filtrado de un total de _MAX_ registros)",
        "sInfoPostFix":    "",
        "sSearch":         "Buscar:",
        "sUrl":            "",
        "sInfoThousands":  ",",
        "sLoadingRecords": "Cargando...",
        "oPaginate": {
          "sFirst":    "Primero",
          "sLast":     "Último",
          "sNext":     "Sig.",
          "sPrevious": "Ant."
        },
        "oAria": {
          "sSortAscending":  ": Activar para ordenar la columna de manera ascendente",
          "sSortDescending": ": Activar para ordenar la columna de manera descendente"
        }
      },
      "lengthChange": true,
      "searching": true,
      "sPaginationType": "full_numbers",
      "columnDefs": [ {
          "targets": [0, 4], //no busco en acciones ni en subtotal
          "searchable": false
      },
      {
        "targets": [ 0, 4 ], //no ordena columna 0 ni 4
        "orderable": false
      } ]
    });

  });
</script>
