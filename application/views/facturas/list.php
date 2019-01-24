<input type="hidden" id="permission" value="<?php echo $permission;?>">
<section class="content">
    <div class="row">
        <div class="col-xs-12">
            <div class="box">
                <div class="box-header">
                    <h3 class="box-title">Facturas</h3>
                    <?php
                    if (strpos($permission,'Add') !== false) {
                        echo '<button class="btn btn-block btn-success" style="width: 100px; margin-top: 10px;" id="btnAdd">Agregar</button>';
                    }
                    ?>
                </div><!-- /.box-header -->
                <div class="box-body">
                    <table id="facturas" class="table table-bordered table-hover">
                        <thead>
                            <tr>
                                <th width="20%">Acciones</th>
                                <th>Número</th>
                                <th>Tipo</th>
                                <th>Proveedor</th>
                                <th>Total</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php
                            foreach($facturas as $f)
                            {
                                echo '<tr>';
                                echo '<td>';
                                if (strpos($permission,'Edit') !== false) {
                                    echo '<i class="fa fa-fw fa-pencil btnEdit" style="color: #f39c12; cursor: pointer; margin-left: 15px;" title="Editar" data-idfac="'.$f['facId'].'"></i>';
                                }
                                if (strpos($permission,'Del') !== false) {
                                    echo '<i class="fa fa-fw fa-times-circle btnDelete" style="color: #dd4b39; cursor: pointer; margin-left: 15px;" title="Eliminar" data-idfac="'.$f['facId'].'"></i>';
                                }
                                echo '</td>';
                                echo '<td style="text-align:left">'.$f['facNumero'].'</td>';
                                echo '<td style="text-align:left">'.$f['facTipo'].'</td>';
                                echo '<td style="text-align:left">'.$f['provnombre'].'</td>';
                                echo '<td style="text-align:left">'.$f['facTotal'].'</td>';
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


    /* carga la vista agregar factura */
    $("#btnAdd").on("click", function(){
        cargarView("Factura", "getProveedoresFactura", $('#permission').val() );
    });


    var factura_seleccionada;
    /* elimina la factura a la que se le hace click */
    $(".btnDelete").on("click", function(){
        
        $('#modaleliminar').modal('show');
        factura_seleccionada = $(this);
    });

    function eliminar_factura(){
        WaitingOpen('Eliminando factura');
        $.ajax({
            data: {
                facid : factura_seleccionada.data("idfac"),
            },
            dataType: 'json',
            type: 'POST',
            url: 'index.php/Factura/deleteFactura',
            success: function(result){
                WaitingClose();
                $(factura_seleccionada).parent().parent().remove();
                //alert("ok"+result);
             //   cargarView('Factura', 'index', $('#permission').val() );
            },
            error: function(result){
                WaitingClose();
                alert("error"+result);
            }
        });
    }

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
        "order": [[1, "asc"]],
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
                "targets": [0, 4], //no busco en acciones ni en total
                "searchable": false
            },
            {
                "targets": [ 0 ], //no ordena columna 0
                "orderable": false
        } ]
    });



</script>


<!-- Modal eliminar-->
<div class="modal fade" id="modaleliminar" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
  <div class="modal-dialog modal-lg" role="document" style="width: 50%">
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
        <h4 class="modal-title"  id="myModalLabel"><span id="modalAction" class="fa fa-fw fa-times-circle" style="color: #dd4b39" > </span> Eliminar Cliente</h4>
      </div> <!-- /.modal-header  -->

      <div class="modal-body input-group ui-widget" id="modalBodyArticle">
             
        <label >¿Realmente desea el Registro de Factura?  </label>
            
      </div>  <!-- /.modal-body -->
      <div class="modal-footer">         
        <button type="button" class="btn btn-default" data-dismiss="modal">No</button>
        <button type="button" class="btn btn-primary" data-dismiss="modal" onclick="eliminar_factura()" >SI</button>
      </div>  <!-- /.modal footer -->     
    </div> <!-- /.modal-content -->
  </div>  <!-- /.modal-dialog modal-lg -->
</div>  <!-- /.modal fade -->
<!-- / Modal -->