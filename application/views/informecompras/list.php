<input type="hidden" id="permission" value="<?php echo $permission;?>">
<section class="content">
    <div class="row">
        <div class="col-xs-12">
            <div class="box">
                <div class="box-header">
                    <h3 class="box-title">Informe de Compras</h3>
                </div>
                <div class="box-body">



                    <div class="panel panel-default">
                        <div class="panel-heading">
                            &nbsp;
                        </div>
                        <div class="panel-body">
                            <div class="row">
                                <div class="col-xs-12 col-md-6">
                                    <div class="form-group">
                                        <label>Seleccione el Proveedor: </label>
                                        <select id="selectProveedor" name="Proveedor" class="form-control input-sm select2">
                                            <option value="-1">Seleccione...</option>
                                            <?php
                                            foreach($proveedores as $prov)
                                            {
                                                echo '<option value="'.$prov['provid'].'"
                                                >'.$prov['provnombre'].'</option>';
                                            }
                                            ?>
                                        </select>
                                    </div>
                                </div><!-- /.col -->
                                <div class="col-xs-12 col-md-3">
                                    <div class="form-group">
                                        <label>Fecha inicio: </label>
                                        <input type="text" class="form-control input" id="fecha_inicio" name="fecha_inicio" value="<?php echo date('Y-m-j', strtotime( '-1 month', strtotime(date('Y-m-d')) ));?>"
                                        >
                                    </div>
                                </div>
                                <div class="col-xs-12 col-md-3">
                                    <div class="form-group">
                                        <label>Fecha fin: </label>
                                        <input type="text" class="form-control input" id="fecha_fin" name="fecha_fin" value="<?php echo date('Y-m-d');?>">
                                    </div>
                                </div><!-- /.col -->
                            </div><!-- /.row -->

                            <!--<button class="btn btn-default disabled" style="width: 100px; margin-top: 10px;" id="btnExcel">Excel</button>-->
                        </div><!-- /.panel-body -->
                    </div><!-- /.panel-default -->



                    <div class="row">
                        <div class="col-xs-12 col-md-6">
                            <div class="panel panel-default">
                                <div class="panel-heading">
                                    <h3 class="panel-title">Facturas</h3>
                                </div>
                                <div class="panel-body">
                                    <table id="tbl-facturas" class="table table-bordered table-hover">
                                        <thead>
                                            <tr>
                                                <th>Número</th>
                                                <th>Fecha</th>
                                                <th>Monto</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                        </tbody>
                                    </table>
                                </div><!-- /.panel-body -->
                            </div><!-- /.panel-default -->
                        </div><!-- /.col -->

                        <div class="col-xs-12 col-md-6">
                            <div class="panel panel-default">
                                <div class="panel-heading">
                                    <h3 class="panel-title">Pagos</h3>
                                </div>
                                <div class="panel-body">
                                    <table id="tbl-ordenespago" class="table table-bordered table-hover">
                                        <thead>
                                            <tr>
                                                <th>Número</th>
                                                <th>Fecha</th>
                                                <th>Monto</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                        </tbody>
                                    </table>
                                </div><!-- /.panel-body -->
                            </div><!-- /.panel-default -->
                        </div><!-- /.col -->
                    </div><!-- /.row -->

                    <div class="row">
                        <div class="col-xs-12 col-md-4">
                            <div id="total_facturas"></div>
                        </div><!-- /.col -->
                        <div class="col-xs-12 col-md-4">
                            <div id="total_pagos"></div>
                        </div><!-- /.col -->
                        <div class="col-xs-12 col-md-4">
                            <div id="resto"></div>
                        </div><!-- /.col -->
                    </div><!-- /.row -->



                </div><!-- /.box-body -->
            </div><!-- /.box -->
        </div><!-- /.col -->
    </div><!-- /.row -->
</section><!-- /.content -->

<script>
$(function() {
    totalF = 0.00;
    totalP = 0.00;

    /* habilita plugin datepicker en campo fecha */
    $( "#fecha_inicio, #fecha_fin" ).datepicker({
        dateFormat: 'yy-mm-dd',
    });

    /* acciones al elegir proveedor */
    $("#selectProveedor").on("change", function() {
        // elimino la opcion seleccionar al cargar proveedor
        // (para no tener que validar al guardar si hay proveedor)
        $("#selectProveedor option[value='-1']").remove();
    });

    /* acciones al cambiar info de la parte superior */
    $("#selectProveedor, #fecha_inicio, #fecha_fin").on("change", function() {
        //carga tabla facturas
        WaitingOpen();
        $('#btnExcel').removeClass('disabled');
        //limpio los totales
        $('#resto').empty();
        $('#total_facturas').empty();
        $('#total_pagos').empty();
        //carga tabla facturas
        $.ajax({
            data: {
                fechaInicio: $("#fecha_inicio").val(),
                fechaFin: $("#fecha_fin").val(),
                idProveedor: $("#selectProveedor").val()
            },
            dataType: 'json',
            type: 'POST',
            url: 'index.php/Informecompra/listFactura',
            success: function(Mydata){
                //alert("ok"+data);
                tbl_factura.clear().draw();
                tbl_factura.rows.add(Mydata); // Add new data
                tbl_factura.columns.adjust().draw(); // Redraw the DataTable
                calcularMonto();
                WaitingClose();
            },
            error: function(result){
                WaitingClose();
                //alert("error"+result);
                alert("Ups!! Hubo un error en la consulta. Por favor informe del fallo al soporte!");
            }
        });

        //carga tabla ordenes de pagos
        $.ajax({
            data: {
                fechaInicio: $("#fecha_inicio").val(),
                fechaFin: $("#fecha_fin").val(),
                idProveedor: $("#selectProveedor").val()
            },
            dataType: 'json',
            type: 'POST',
            url: 'index.php/Informecompra/listOrdenesPago',
            success: function(Mydata){
                //alert("ok"+data);
                tbl_ordenpago.clear();
                tbl_ordenpago.rows.add(Mydata); // Add new data
                tbl_ordenpago.columns.adjust().draw(); // Redraw the DataTable
                calcularMonto();
                WaitingClose();
            },
            error: function(result){
                WaitingClose();
                //alert("error"+result);
                alert("Ups!! Hubo un error en la consulta. Por favor informe del fallo al soporte!");
            }
        });

    });

    /* cargo datatable tabla facturas */
    tbl_factura = $("#tbl-facturas").DataTable({
        "columns": [
            { "data": "facNumero" },
            { "data": "facFecha" },
            { "data": "facTotal" }
        ],
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
            "sInfo":           "Mostrando del _START_ al _END_, de _TOTAL_ registros",
            "sInfoEmpty":      "Mostrando del 0 al 0, de 0 registros",
            "sInfoFiltered":   "(filtrado de un total de _MAX_ registros)",
            "sInfoPostFix":    "",
            "sSearch":         "Buscar:",
            "sUrl":            "",
            "sInfoThousands":  ",",
            "sLoadingRecords": "Cargando...",
            "oPaginate": {
                "sFirst":    "Prim",
                "sLast":     "Últi",
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
                "targets": [], //no busco en acciones ni en total
                "searchable": false
            },
            {
                "targets": [], //no ordena columna 0
                "orderable": false
        } ],
        "footerCallback": function ( row, data, start, end, display ) {
                var api = this.api(), data;
                // Elimino el formato para obtener el numero
                var intVal = function ( i ) {
                    return typeof i === 'string' ? i.replace(/[\$,]/g, '')*1 : typeof i === 'number' ?  i : 0;
                };

                // IVAtotal para todas las páginas
                FacturaTotal = api.column( 2 ).data().reduce( function (a, b) {
                    return intVal(a) + intVal(b);
                },0 );

                FacturaTotal = parseFloat(FacturaTotal);
                totalF = FacturaTotal;
                // Agrego el resultado en el id TotalFactura
                $('#total_facturas').html("<b>Total Facturas: <span>"+FacturaTotal.toFixed(2)+"</span></b>");
                console.log("escribo total facturas");
            },
    });

    /* cargo datatable tabla ordenes de pago */
    tbl_ordenpago = $("#tbl-ordenespago").DataTable({
        "columns": [
            { "data": "opid" },
            { "data": "opfecha" },
            { "data": "opmonto" }
        ],
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
            "sInfo":           "Mostrando del _START_ al _END_, de _TOTAL_ registros",
            "sInfoEmpty":      "Mostrando del 0 al 0, de 0 registros",
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
                "targets": [], //no busco en acciones ni en total
                "searchable": false
            },
            {
                "targets": [], //no ordena columna 0
                "orderable": false
        } ],
        "footerCallback": function ( row, data, start, end, display ) {
            var api = this.api(), data;
            // Elimino el formato para obtener el numero
            var intVal = function ( i ) {
                return typeof i === 'string' ? i.replace(/[\$,]/g, '')*1 : typeof i === 'number' ?  i : 0;
            };

            // IVAtotal para todas las páginas
            OrdenPagoTotal = api.column( 2 ).data().reduce( function (a, b) {
                return intVal(a) + intVal(b);
            },0 );

            OrdenPagoTotal = parseFloat(OrdenPagoTotal);
            totalP = OrdenPagoTotal;
            // Agrego el resultado en el id TotalFactura
            $('#total_pagos').html("<b>Total Pagos: <span>"+OrdenPagoTotal.toFixed(2)+"</span></b>");
            console.log("escribo total pagos");
        },
        //buttons: ['copy', 'excel'],
    });

    function calcularMonto() {
        $('#resto').html('<b>Resto: '+( totalF - totalP )+'</b>');
        $('#resto').toggleClass( 'text-red', $('#resto').text().indexOf('-') != -1 );
    }

    /*$("#btnExcel").on("click", function(){
        //saco los datos de la tabla
        /*var data = $('table#tbl-facturas tr').get().map(function(row) {
            return $(row).find('td').get().map(function(cell) {
                return $(cell).html();
            });
        });/** /
        var data = $('#table#tbl-facturas').tableToJSON();
        console.log(data);
        console.log( JSON.stringify(data) );
        //data = JSON.stringify(data);
        /*cargarView("exportexcel", "informeDeCompra", data);


        $.ajax({
            data: {
                fechaInicio: $("#fecha_inicio").val(),
                fechaFin: $("#fecha_fin").val(),
                idProveedor: $("#selectProveedor").val()
            },
            dataType: 'json',
            type: 'POST',
            url: 'index.php/InformeCompra/listFactura',
            success: function(Mydata){
                //alert("ok"+data);
                tbl_factura.clear().draw();
                tbl_factura.rows.add(Mydata); // Add new data
                tbl_factura.columns.adjust().draw(); // Redraw the DataTable
                calcularMonto();
                WaitingClose();
            },
            error: function(result){
                WaitingClose();
                //alert("error"+result);
                alert("Ups!! Hubo un error en la consulta. Por favor informe del fallo al soporte!");
            }
        });
        /** /

    });/**/

});
</script>