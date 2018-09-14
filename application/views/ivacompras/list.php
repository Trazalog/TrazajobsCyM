<input type="hidden" id="permission" value="<?php echo $permission;?>">
<section class="content">
    <div class="row">
        <div class="col-xs-12">
            <div class="box">
                <div class="box-header">
                    <h3 class="box-title">IVA Compras</h3>
                </div><!-- /.box-header -->
                <div class="box-body">
                    <table id="facturas" class="table table-bordered table-hover">
                        <thead>
                            <tr>
                                <th>Comprobantes</th>
                                <th>Fecha</th>
                                <th>Proveedor</th>
                                <th>Tipo</th>
                                <th>Subtotal</th>
                                <th>IVA</th>
                                <th>Total</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php
                            foreach($ivacompras as $i)
                            {
                                echo '<tr>';
                                echo '<td style="text-align:left">'.$i['facNumero'].'</td>';
                                echo '<td style="text-align:left">'.$i['facFecha'].'</td>';
                                echo '<td style="text-align:left">'.$i['provnombre'].'</td>';
                                echo '<td style="text-align:left">'.$i['facTipo'].'</td>';
                                echo '<td style="text-align:left">'.$i['facSubtotal'].'</td>';
                                echo '<td style="text-align:left">'.($i['facIva']+$i['facIva2']).'</td>';
                                echo '<td style="text-align:left">'.$i['facTotal'].'</td>';
                                echo '</tr>';
                            }
                            ?>
                        </tbody>
                        <tfoot>
                            <tr>
                                <td colspan='7'> <span style="float:right;"id ='IVAtotal'></span> </td>
                            </tr>
                        </tfoot>
                    </table>
                </div><!-- /.box-body -->
            </div><!-- /.box -->
        </div><!-- /.col -->
    </div><!-- /.row -->
</section><!-- /.content -->

<script>
  $(function() {
    /* cargo plugin DataTable (debe ir al final de los script) */
    $("#facturas").DataTable({
        "aLengthMenu": [ 10, 25, 50, 100 ],
        "autoWidth": true,
        "info": true,
        "ordering": true,
        "order": [[0, "asc"]],
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
        "footerCallback": function ( row, data, start, end, display ) {
            var api = this.api(), data;
            // Elimino el formato para obtener el numero
            var intVal = function ( i ) {
                return typeof i === 'string' ? i.replace(/[\$,]/g, '')*1 : typeof i === 'number' ?  i : 0;
            };

            // IVAtotal para todas las páginas
            IvaTotal = api.column( 5 ).data().reduce( function (a, b) {
                return intVal(a) + intVal(b);
            },0 );
            // Ivatotal para la página actual
            IvaTotalPorPagina = api.column( 5, { page: 'current'} ).data().reduce( function (a, b) {
                return intVal(a) + intVal(b);
            }, 0 );
            IvaTotal = parseFloat(IvaTotal);
            IvaTotalPorPagina = parseFloat(IvaTotalPorPagina);

            // ImporteTotal para todas las páginas
            ImporteTotal = api.column( 6 ).data().reduce( function (a, b) {
                return intVal(a) + intVal(b);
            },0 );
            // Importetotal para la página actual
            ImporteTotalPorPagina = api.column( 6, { page: 'current'} ).data().reduce( function (a, b) {
                return intVal(a) + intVal(b);
            }, 0 );
            ImporteTotal = parseFloat(ImporteTotal);
            ImporteTotalPorPagina = parseFloat(ImporteTotalPorPagina);

            // Agrego el resultado en el footer de la tabla
            $('#IVAtotal').html("IVA Total en esta página: "+IvaTotalPorPagina.toFixed(2)+" - <b>IVA Total mes: "+IvaTotal.toFixed(2)+"</b><br />Importe Total en esta página: "+ImporteTotalPorPagina.toFixed(2)+" - <b>Importe Total mes: "+ImporteTotal.toFixed(2)+"</b>");
        },
    });

});
</script>