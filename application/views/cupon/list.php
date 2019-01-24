<input type="hidden" id="permission" value="<?php echo $permission;?>">
<section class="content">
  <div class="row">
    <div class="col-xs-12">
      <div class="box">
        <div class="box-header">
          <h3 class="box-title">Cupon</h3>
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
                <th width="20%" style="text-align: center">Acciones</th>
                <th style="text-align: center">Fecha</th>
                <th style="text-align: center">Cupon</th>
                <th style="text-align: center">Lote</th>
                <th style="text-align: center">Factura</th>
                <th style="text-align: center">Cliente</th>
                <th style="text-align: center">Monto</th>
                <th style="text-align: center">Tarjeta</th>
                <th style="text-align: center">Estado</th>




              </tr>
            </thead>
            <tbody>
              <?php
                foreach($list as $z)
                {
                  $id=$z['cuponid'];
                
                    echo '<tr id="'.$id.'" class="'.$id.'" >';
                    echo '<td>';
                  if (strpos($permission,'Edit') !== false) {
                      echo '<i class="fa fa-fw fa-pencil" style="color: #f39c12; cursor: pointer; margin-left: 15px;" title="Editar" data-toggle="modal" data-target="#modaleditar"></i>';
                  }
                  if (strpos($permission,'Del') !== false) {
                      echo '<i class="fa fa-fw fa-times-circle"  title="Editar" style="color: #dd4b39; cursor: pointer; margin-left: 15px;"></i>';
                  }
                  
                      
                  echo '</td>';
                  echo '<td style="text-align: center">'.$z['cuponfech'].'</td>';
                  echo '<td style="text-align: center">'.$z['cuponnro'].'</td>';
                  echo '<td style="text-align: center">'.$z['cuponlote'].'</td>';
                  echo '<td style="text-align: center">'.$z['cuponfactura'].'</td>';
                  echo '<td style="text-align: center">'.$z['cuponcliente'].'</td>';
                  echo '<td style="text-align: center">'.$z['cuponmonto'].'</td>';
                  echo '<td style="text-align: center">'.$z['tarjetdescrip'].'</td>';
                  // echo '<td style="text-align: center">'.$z['cuponestado'].'</td>';
                    echo '<td style="text-align: center">'.($z['cuponestado'] == 'C' ? '<small class="label pull-left bg-green" style="text-align: center">Curso</small>' :($z['cuponestado'] == 'L' ? '<small class="label pull-left bg-blue" style="text-align: center">Liquidado</small>' : '<small class="label pull-left bg-red" style="text-align: center">Pagado</small>')).'</td>';
                               
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
  var ed = "";
  $(document).ready(function (event) {

    //Editar
    $(".fa-pencil").click(function (e) {

      var idcu = $(this).parent('td').parent('tr').attr('id');
      console.log("ID de cupon");
      console.log(idcu);
      ed = idcu;
      $.ajax({
        type: 'POST',
        data: { idcu: idcu },
        url: 'index.php/Cupon/getpencil', //index.php/
        success: function (data) {
          console.log("Estoy editando");
          console.log(data);
          console.log(data[0]['cuponfech']);

          datos = {

            'fecha': data[0]['cuponfech'],
            'cupon': data[0]['cuponnro'],
            'factura': data[0]['cuponfecha'],
            'cliente': data[0]['cuponcliente'],
            'monto': data[0]['cuponmonto'],
            'tarjetaid': data[0]['tarjetaid'],
            'tarjetadescrip': data[0]['tarjetdescrip'],

          }


          completarEdit(datos);


        },

        error: function (result) {

          console.log(result);
        },
        dataType: 'json'
      });

    });

    //Cambio de estado a un equipo
    $(".fa-times-circle").click(function (e) {

      console.log("Esto eliminando");
      var idcupo = $(this).parent('td').parent('tr').attr('id');
      console.log(idcupo);

      $.ajax({
        type: 'POST',
        data: { idcupo: idcupo },
        url: 'index.php/Cupon/baja_cupon', //index.php/
        success: function (data) {
          //var data = jQuery.parseJSON( data );
          console.log(data);

          //$(tr).remove();
          alert("CUPON Eliminado");
          regresa();

        },

        error: function (result) {

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

  traer_tarjeta();
  function traer_tarjeta() {
    $.ajax({
      type: 'POST',
      data: {},
      url: 'Cupon/gettarjeta', //index.php/
      success: function (data) {

        var opcion = "<option value='-1'>Seleccione...</option>";
        $('#tarjeta').append(opcion);
        for (var i = 0; i < data.length; i++) {
          var nombre = data[i]['tarjetdescrip'];
          var opcion = "<option value='" + data[i]['tarjetid'] + "'>" + nombre + "</option>";

          $('#tarjeta').append(opcion);

        }
      },
      error: function (result) {

        console.log(result);
      },
      dataType: 'json'
    });
  }

  function completarEdit(datos) {

    console.log("datos que llegaron");
    $('#cuponedit').val(datos['cupon']);
    $('#fechaedit').val(datos['fecha']);
    $('#clienteedit').val(datos['cliente']);
    $('#montoedit').val(datos['monto']);

    $('select#tarjetaedit').append($('<option />', { value: datos['tarjetaid'], text: datos['tarjetadescrip'] }));
    traer_tarjeta2();

  }


  function traer_tarjeta2() {
    $('#tarjetaedit').html("");
    $.ajax({
      type: 'POST',
      data: {},
      url: 'Cupon/gettarjeta', //index.php/
      success: function (data) {


        $('#tarjetaedit').append(opcion);
        for (var i = 0; i < data.length; i++) {
          var nombre = data[i]['tarjetdescrip'];
          var opcion = "<option value='" + data[i]['tarjetid'] + "'>" + nombre + "</option>";

          $('#tarjetaedit').append(opcion);

        }
      },
      error: function (result) {

        console.log(result);
      },
      dataType: 'json'
    });
  }

  function guardareditar() {
    console.log("Estoy editando");
    console.log("El id decupon es:");
    console.log(ed);

    var nro = $('#cuponedit').val();
    var fecha = $('#fechaedit').val();
    var cliente = $('#clienteedit').val();
    var monto = $('#montoedit').val();
    var factura = $('#facturaedit').val();
    var tarjeta = $('#tarjetaedit').val();

    var parametros = {
      'cuponfech': fecha,
      'cuponnro': nro,
      'cuponfactura': factura,
      'cuponcliente': cliente,
      'cuponmonto': monto,
      'tarjetaid': tarjeta,

    };
    console.log(parametros);
    var hayError = false;

    if (parametros != 0) {
      $.ajax({
        type: "POST",
        url: "index.php/Cupon/edit_cupon", //controlador /metodo
        data: { parametros: parametros, ed: ed },
        success: function (data) {
          console.log("exito en editar");
          regresa();
        },

        error: function (result) {
          console.log("entro por el error");
          console.log(result);
        }
        // dataType: 'json'
      });

    }
    else {
      alert("Por favor complete la descripcion del grupo, es un campo obligatorio");
    }

  }



  function guardar() {
    console.log("Estoy guardando");
    var numero = $('#cupon').val();
    var fecha = $('#fecha').val();
    var lote = $('#lote').val();
    var cliente = $('#cliente').val();
    var factura = $('#factura').val();
    var monto = $('#monto').val();
    var tarjeta = $('#tarjeta').val();
    // var codigo = $('#codigo').val();

    var parametros = {
      'cuponfech': fecha,
      'cuponnro': numero,
      'cuponlote': lote,
      'cuponfactura': factura,
      'cuponcliente': cliente,
      'cuponmonto': monto,
      'cuponestado': 'C',
      'tarjetaid': tarjeta,



    };
    console.log(parametros);
    var hayError = false;

    if (parametros != "") {
      $.ajax({
        type: "POST",
        data: { parametros: parametros },
        url: "index.php/Cupon/agregar_cupon", //controlador /metodo

        success: function (data) {
          console.log("exito en agregar una nueva Tarjeta ");
          regresa();

        },

        error: function (result) {
          console.log("entro por el error");
          console.log(result);
        }
        // dataType: 'json'
      });

    }
    else {
      alert("Por favor complete toda la informacion para poder guardar");

    }

  }

  function regresa() {

    //WaitingOpen();
    //$('#modaldeposito').empty();
    //$('#modaleditar').empty(); 
    //$('#content').empty();
    $("#content").load("<?php echo base_url(); ?>index.php/Cupon/index/<?php echo $permission; ?>");
    WaitingClose();
  }

  function format(input) {
    var num = input.value.replace(/\./g, '');
    if (!isNaN(num)) {
      num = num.toString().split('').reverse().join('').replace(/(?=\d*\.?)(\d{3})/g, '$1.');
      num = num.split('').reverse().join('').replace(/^[\.]/, '');
      input.value = num;
    }

    else {
      alert('Solo se permiten numeros');
      input.value = input.value.replace(/[^\d\.]*/g, '');
    }
  }

  // Arma tabla dinamica
var contador = 0;         // variable incrementable en func, para diferenciar los inputs
function add_cupon(){   // inserta valores de inputs en la tabla
  // var errorVal = validarCampos();
  // if (errorVal == true) {

  //   alert('campo vacio');
  //   return;
  // }else{
   

    //tabla = $('.tabModInsum').DataTable();
    //$( $.fn.dataTable.tables( true ) ).DataTable().columns.adjust();
  if(!ValidarCampos()){alert('Campos Incompletos');return;}
  $("table#cupones tbody").append(
    '<tr id="'+$('#cupon').val()+'">'+
      '<td><input class="hidden" name="tarjeta['+contador+']" value="'+$('#tarjeta').val()+'">'+$('select#tarjeta option:selected').text()+'</td>'+
      '<td><input class="hidden" name="fecha['+contador+']" value="'+$('#fecha').val()+'">'+$('#fecha').val()+'</td>'+
      '<td><input class="hidden" name="cupon['+contador+']" value="'+$('#cupon').val()+'">'+$('#cupon').val()+'</td>'+
      '<td><input class="hidden" name="cliente['+contador+']" value="'+$('#cliente').val()+'">'+$('#cliente').val()+'</td>'+
      '<td><input class="hidden" name="lote['+contador+']" value="'+$('#lote').val()+'">'+$('#lote').val()+'</td>'+
      '<td><input class="hidden" name="monto['+contador+']" value="'+$('#monto').val()+'">'+$('#monto').val()+'</td>'+
      '<td><input class="hidden" name="factura['+contador+']" value="'+$('#factura').val()+'">'+$('#factura').val()+'</td>'+
      '<td><i class="fa fa-fw fa-times-circle" title="Eliminar Cupon" style="color: #dd4b39; cursor: pointer;" onclick="eliminar_cupon(this)"></i></td>'
    +'<tr>');

    contador++;
    $('.reset').val('');
    //$('#form_articulos').data('bootstrapValidator').resetForm();
  //}
}

function cargar_cupones(){
  var datos = $("#cupones_form").serializeArray();
  if (datos.length==0) {alert('No hay cupones cargados'); return;}
  $.ajax({
    type: 'post',
    data: datos,
    // dataType: 'json',
    url:'index.php/Cupon/guardar_cupones',
    success: function(result){
      contador = 0;
      $("table#cupones tbody").html('');
      regresa();
    },
    error: function(result){
      alert('Al Cargar los cupones. Intente Nuevamente');
    }
  });
  
}

function eliminar_cupon(o){
  $(o).parent().parent().remove();
}

function ValidarCampos(){
  var isValid = true;
  $('#cupones_inputs .form-control').each(function() {
    if ( $(this).val() === '' ||  $(this).val()==-1 )
        isValid = false;
  });
  return isValid;
}


</script>


<!-- Modal alta de Tarea-->
<div class="modal fade" id="modaltarea" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
  <div class="modal-dialog modal-lg" role="document" style="width: 50%">
    <div class="modal-content">

      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
        <h4 class="modal-title" id="myModalLabel"><span id="modalAction" class="fa fa-plus-square" style="color: #008000">
          </span> Agregar Cupon</h4>
      </div> <!-- /.modal-header  -->

      <div class="modal-body input-group ui-widget" id="modalBodyArticle">
        <div class="row">
          <div class="col-sm-12 col-md-12">
              <br>
              <form id="cupones_inputs">
              <div class="col-xs-6">Tarjeta<strong style="color: #dd4b39">*</strong>:
                  <select type="text" id="tarjeta" class="form-control"></select>
              </div>
              <div class="col-xs-6">Fecha<strong style="color: #dd4b39">*</strong>:
                  <input type="date" id="fecha" class="form-control">
              </div>
      
              <div class="col-xs-12">Cupon<strong style="color: #dd4b39">*</strong>:
                  <input type="text" id="cupon" class="form-control reset" placeholder="Ingrese Cupon...">
              </div>
          
              <div class="col-xs-12">Cliente<strong style="color: #dd4b39">*</strong>:
                  <input type="text" id="cliente"  class="form-control reset" placeholder="Ingrese Cliente...">
      
              </div>
              <div class="col-xs-12">Lote<strong style="color: #dd4b39">*</strong>:
                  <input type="text" id="lote" class="form-control reset" placeholder="Ingrese Lote...">
      
              </div>
              <div class="col-xs-12">Monto<strong style="color: #dd4b39">*</strong>:
                  <input type="text" id="monto" class="form-control reset" onkeyup="format(this)" onchange="format(this) "
                      placeholder="Ingrese Monto...">
              </div>
              <div class="col-xs-12">Factura<strong style="color: #dd4b39">*</strong>:
                  <input type="text" id="factura" class="form-control reset" placeholder="Ingrese Factura...">
              </div></form><br>
              <button class="btn btn-success"style="float: right;margin-top:10px;" onclick="add_cupon()">+Agregar</button>
          </div>
      </div>

      <!-- tabla-->
      <div class="row" >
          <div class="col-xs-12">
            <form id="cupones_form">
              <table class="table table-bordered " id="cupones" border="1px">
                <thead>
                  <tr>
                    <th width="2%">Tarjeta</th>
                    <!-- <th width="3%">Fecha</th>
                    <th width="3%">Cliente</th>
                    <th width="3%">Lote</th>
                    <th width="3%">Monto</th>
                    <th width="2%">Factura</th> -->
                  </tr>
                </thead>
                <tbody>
                  <!--Contenido de la Tabla -->
                </tbody>
              </table>
            </form>
          </div>
        </div>

      </div>
      <br>
      <div class="modal-footer">
        <br>
        <button type="button" class="btn btn-default" data-dismiss="modal" onclick="$('table#cupones tbody').html('');$('#cupones_inputs')[0].reset();">Cancelar</button>
        <button type="button" class="btn btn-primary" id="btnSave" data-dismiss="modal" onclick="cargar_cupones()">Guardar</button>
      </div> <!-- /.modal footer -->




    </div> <!-- /.modal-body -->
  </div> <!-- /.modal-content -->
</div> <!-- /.modal-dialog modal-lg -->
</div> <!-- /.modal fade -->
<!-- / Modal -->


<!-- Modal editar-->
<div class="modal fade" id="modaleditar" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
  <div class="modal-dialog modal-lg" role="document" style="width: 50%">
    <div class="modal-content">

      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
        <h4 class="modal-title" id="myModalLabel"><span id="modalAction" class="fa fa-fw fa-pencil" style="color: #f39c12">
          </span> Editar Tarjeta</h4>
      </div> <!-- /.modal-header  -->

      <div class="modal-body input-group ui-widget" id="modalBodyArticle">

        <div class="row">
          <div class="col-sm-12 col-md-12">
            <div class="col-xs-12">Cupon:
              <input type="text" id="cuponedit" name="cuponedit" class="form-control" placeholder="Ingrese Cupon...">
            </div>
            <div class="col-xs-12">Fecha:
              <input type="date" id="fechaedit" name="fechaedit" class="form-control" />
            </div>
            <div class="col-xs-12">Cliente:
              <input type="text" id="clienteedit" name="clienteedit" class="form-control" placeholder="Ingrese Cliente...">

            </div>
            <div class="col-xs-12">Monto:
              <input type="text" id="montoedit" name="montoedit" class="form-control" onkeyup="format(this)" onchange="format(this) "
                placeholder="Ingrese Monto...">
            </div>
            <div class="col-xs-12">Factura:
              <input type="text" id="facturaedit" name="facturaedit" class="form-control" placeholder="Ingrese Factura...">
            </div>

            <div class="col-xs-12">Tarjeta:
              <select id="tarjetaedit" name="tarjetaedit" class="form-control"></select>
            </div>

          </div>
        </div>
      </div>



      <div class="modal-footer">


        <button type="button" class="btn btn-primary" id="btnSave" data-dismiss="modal" onclick="guardareditar()">Guardar</button>
      </div> <!-- /.modal footer -->

    </div> <!-- /.modal-body -->
  </div> <!-- /.modal-content -->

</div> <!-- /.modal-dialog modal-lg -->
</div> <!-- /.modal fade -->
<!-- / Modal -->