<input type="hidden" id="permission" value="<?php echo $permission;?>">
<section class="content">
  <div class="row">
    <div class="col-xs-12">
      <div class="box">
        <div class="box-header">
          <h3 class="box-title">Cheques Propios</h3>
          <?php
            if (strpos($permission,'Add') !== false) {
              echo '<button class="btn btn-block btn-success" style="width: 100px; margin-top: 10px;" data-toggle="modal" data-target="#modaltarea" id="btnAdd">Agregar</button>';
              echo '<button class="btn btn-block btn-success" style="width: 100px; margin-top: 10px; text-align: center;"  id="btnemitidos"> Cheq.Emitidos  </button>';


            }
          ?>
        </div><!-- /.box-header -->
        <div class="box-body">
          <table id="deposito" class="table table-bordered table-hover" style="text-align: center">
            <thead>
              <tr>
                <th  width="20%" style="text-align: center">Acciones</th>
                <th style="text-align: center">Nro de Cheque</th>
                <th style="text-align: center">Proveedores</th>
                <!-- <th style="text-align: center">Fecha de Emision</th> -->
                <th style="text-align: center">Fecha de vencimiento</th>
                <th style="text-align: center">Monto</th>
                <th style="text-align: center">Estado</th>
                
              </tr>
            </thead>
            <tbody>
              <?php
              //echo"<pre>";
              //var_dump($list);
                foreach($list as $z)
                {
                  $id=$z['cheqid'];
                
                    echo '<tr id="'.$id.'" class="'.$id.'" >';
                    echo '<td>';
                  if (strpos($permission,'Edit') !== false) {
                      echo '<i class="fa fa-fw fa-pencil" style="color: #f39c12; cursor: pointer; margin-left: 15px;" title="Editar" data-toggle="modal" data-target="#modaleditar"></i>';
                  }
                  if (strpos($permission,'Del') !== false) {
                      echo '<i class="fa fa-fw fa-times-circle"  title="Editar" style="color: #dd4b39; cursor: pointer; margin-left: 15px;"></i>';
                  }

                  if (strpos($permission,'Edit') !== false) {
                    
                    if( ($z['cheqestado'] == '1')){     // corresponde al estado P (pagado)
                      echo '<i  href="#"class="fa fa-fw fa fa-toggle-on" style="color: #f39c12; cursor: pointer; margin-left: 15px;" title="Pagar"></i>';
                    }else{
                      echo '<i class="fa fa-fw fa fa-toggle-off" title="Pagado" style="color: #A4A4A4; cursor: pointer; margin-left: 15px;"></i>';
                    }
                  }
                      
                  echo '</td>';
                  echo '<td style="text-align: center">'.$z['cheqnro'].'</td>';
                  echo '<td style="text-align: center">'.$z['proveedor'].'</td>';
                  //echo '<td style="text-align: center">'.$z['cheqfechae'].'</td>';
                  echo '<td style="text-align: center">'.$z['cheqvenc'].'</td>';
                  
                 // echo '<td style="text-align: center">'.$z['cheqmonto'].'</td>';
                  echo '<td style="text-align: center">'.number_format($z['cheqmonto'], 2, ',', '.').'</td>';
                  echo '<td style="text-align: center">'.($z['cheqestado'] == '1' ? '<small class="label pull-left bg-green" >Curso</small>' :'<small class="label pull-left bg-blue">Pagado</small>' ).'</td>';                  
                  
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

  $('#btnemitidos').click( function cargarVista(){
    WaitingOpen();
    $('#content').empty();
    $("#content").load("<?php echo base_url(); ?>index.php/Cheqpropio/cargaremitidos/<?php echo $permission; ?>");
    WaitingClose();
  });

   //Editar
  $(".fa-pencil").click(function (e) { 
     
    var id_cheq = $(this).parent('td').parent('tr').attr('id');
    console.log("ID de cheque");
    console.log(id_cheq);
    ed=id_cheq;
    $.ajax({
        type: 'GET',
        data: { id_cheq:id_cheq},
        url: 'index.php/Cheqpropio/getpencil', //index.php/
        success: function(data){
                console.log("Estoy editando");           
                console.log(data);
               
               
                datos={
             
                  'numero':data[0]['cheqnro'],
                  'fechav':data[0]['cheqvenc'],
                  'monto':data[0]['cheqmonto'],
                  'fechae':data[0]['cheqfechae'],
                  'chequera':data[0]['cheqinicio'],
                  'idchequera':data[0]['cheqId'],
                  'idproveedor':data[0]['provid'],
                  'proveedor':data[0]['provnombre'],

               
                }

                $('#chequeraedit').html('');
                $('#provedit').html('');
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
            url: 'index.php/Cheqpropio/baja_cheque', //index.php/
            success: function(data){
                    console.log("Cheque eliminado");
                    console.log(data);
                   
                    //$(tr).remove();
                    alert("CHEQUE Eliminado");
                    regresa();
                  
                  },
              
            error: function(result){
                  
                  console.log(result);
                }
               // dataType: 'json'
      });

   
    
  });

idcheq="";

$('#num').change(function(){
  
  var id_cheq = $(this).val();
  console.log("el Id de cheques es :");
  console.log(id_cheq);
  idcheq=id_cheq;
  console.log(idcheq);

   /*cuando elijo chequera , mando el id de cheque mando ese id y me fijo en q chequera esta y la cantidad y e*/

      $.ajax({
            type: 'POST',
            data: { id_cheq: id_cheq},
            url: 'index.php/Cheqpropio/getpropio', //index.php/
            success: function(data){
                     console.log("datos que llegan al cheque propio");
                     console.log(data);
                
                   // for(var i=0; i < data.length ; i++){
                   // var i=0
                    //hile (i<data.length){
                      console.log(data[0]);
                      console.log(data[1]);
                      console.log(data[2]);
                      datos={
             
                            'numero':data[0],
                            'cantidad':data[1],
                            'contador':data[2]
                            
                         
                          }
                          console.log(datos.numero);
                          var nu1=datos.numero;
                          var con= datos.contador;
                          var ca= datos.cantidad;


                          console.log(con);
                          console.log(ca);
                          if(con==null)
                          {

                         // $('#nu').append(datos.numero);
                           $('#nu').val(nu1); 

                        }
                        else 
                          {  
                            if(ca >con){  //aca tengo q logragr sumar uno al final  
                              var sum1= parseInt(nu1);
                             // alert(sum1);
                             var con1=parseInt(con);
                              var su1=sum1+con1;
                             //var su= nu1+con;
                              //var su= nu1+00000001;
                              $('#nu').val(su1); 
                            }
                            else 
                            {
                              alert("Llego al limite de cheques en su chequera");
                            }
                          

                          }
                   // } 
                  },
              
            error: function(result){
                  console.log("Entre por el error en cheques propios");
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
 
$(document).on("click", ".fa-toggle-on", function() {
  
  var idCHeque = $(this).parent('td').parent('tr').attr('id');
  console.log(idCHeque);
  $.ajax({
    type: 'POST',
    data: { idCHeque: idCHeque},
    url: 'index.php/Cheqpropio/pagarCheque', 
    success: function(data){
          
            console.log(data);
            alert("Se cambio el estado del cheque a Pagado");            
            regresa();          
          },
      
    error: function(result){
          
          console.log(result);
        },
        dataType: 'json'
    });
});

function completarEdit(datos){

  console.log("datos que llegaron");
  
  $('select#chequeraedit').append($('<option />', { value: datos['idchequera'],text: datos['chequera']}));
  traer_chequera();
  //$('#chequeraedit').val(datos['chequera']);
  $('#numedit').val(datos['numero']);
  $('select#provedit').append($('<option />', { value: datos['idproveedor'],text: datos['proveedor']}));
  traer_provee();
  //$('#provedit').val(datos['proveedor']);
  $('#fechaedit').val(datos['fechae']);
  $('#fechavedit').val(datos['fechav']);
  $('#montoedit').val(datos['monto']);
  //$('#descripcionedit').val(datos['descripcion']);
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

traer_proveeedor();
function traer_proveeedor(){
      $.ajax({
        type: 'POST',
        data: { },
        url: 'index.php/Cheqpropio/getproveedor', //index.php/
        success: function(data){
               
                 var opcion  = "<option value='-1'>Seleccione...</option>" ; 
                  $('#prov').append(opcion); 
                for(var i=0; i < data.length ; i++) 
                {    
                      var nombre = data[i]['provnombre'];
                      var opcion  = "<option value='"+data[i]['provid']+"'>" +nombre+ "</option>" ; 

                    $('#prov').append(opcion); 
                                   
                }
              },
        error: function(result){
              
              console.log(result);
            },
            dataType: 'json'
        });
}

traer_numero();
function traer_numero(){
      $.ajax({
        type: 'POST',
        data: { },
        url: 'index.php/Cheqpropio/getnumero', //index.php/
        success: function(data){
               
                 var opcion  = "<option value='-1'>Seleccione...</option>" ; 
                  $('#num').append(opcion); 
                for(var i=0; i < data.length ; i++) 
                {    
                      var nombre = data[i]['cheqinicio'];
                      var opcion  = "<option value='"+data[i]['cheqId']+"'>" +nombre+ "</option>" ; 

                    $('#num').append(opcion); 
                                   
                }
              },
        error: function(result){
              
              console.log(result);
            },
            dataType: 'json'
        });
}

function traer_chequera(){

  //$('#chequeraedit').html(''); 
  $.ajax({
    type: 'POST',
    data: { },
    url: 'index.php/Cheqpropio/getnumero', //index.php/
    success: function(data){
           
            
              $('#chequeraedit').append(opcion); 
            for(var i=0; i < data.length ; i++) 
            {    
                  var nombre = data[i]['cheqinicio'];
                  var opcion  = "<option value='"+data[i]['cheqId']+"'>" +nombre+ "</option>" ; 

                $('#chequeraedit').append(opcion); 
                               
            }
          },
    error: function(result){
          
          console.log(result);
        },
        dataType: 'json'
    });
}

function traer_provee(){

 // $('#provedit').html(''); 
  $.ajax({
    type: 'POST',
    data: { },
    url: 'index.php/Cheqpropio/getproveedor', //index.php/
    success: function(data){

            $('#provedit').append(opcion); 
            for(var i=0; i < data.length ; i++) 
            {    
                  var nombre = data[i]['provnombre'];
                  var opcion  = "<option value='"+data[i]['provid']+"'>" +nombre+ "</option>" ; 

                $('#provedit').append(opcion); 
                               
            }
          },
    error: function(result){
          
          console.log(result);
        },
        dataType: 'json'
    });
}
  
function guardareditar(){
  console.log("Estoy guardando lo editado");
  console.log("El id de cheque es:"); 
  console.log(ed);
    
  var cheq = $('#chequeraedit').val();
  var nume = $('#numedit').val();
  var  proveed= $('#provedit').val();
  var fece = $('#fechaedit').val();
  var fecv = $('#fechavedit').val();
  var mon = $('#montoedit').val();
  
  
  var parametros = {
        'cheqnro': nume,
        'cheqvenc': fecv,
        'provid': proveed,
        'cheqmonto': mon,
        'id_chequera': cheq,
        'cheqfechae': fece 
        
  };                                              
  console.log(parametros);
  var hayError = false; 

  if( parametros !=0)
    {                                     
    $.ajax({
      type:"POST",
      url: "index.php/Cheqpropio/edit_chequera", //controlador /metodo
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
  
  var numero = $('#num').val();
  var proveedor = $('#prov').val();
  var fechae = $('#fechae').val();
  var fechav = $('#fechav').val();
  var monto = $('#monto').val();
  var montoFinal = monto.replace(",", "");
   console.log('monto: ');
   console.log(montoFinal);
  var nu = $('#nu').val();  

  var parametros = {'cheqnro': nu,   
                    'cheqvenc': fechav,
                    'provid': proveedor,
                    'cheqmonto': montoFinal,
                    'cheqestado': '1',  // id coresponde a estado C (curso)
                    'id_chequera': numero,
                    'cheqfechae': fechae   
                    };                                              
  console.log(parametros);
  var hayError = false; 

  if( parametros !=""){                                     
    
    $.ajax({
      type:"POST",
      url: "index.php/Cheqpropio/agregar_cheque", //controlador /metodo , numero:numero
      data:{parametros:parametros, numero:numero},
      success: function(data){
        console.log("exito en agregar un nuevo cheque propio ");
        console.log(data);   
        regresa();
        },      
      error: function(result){
          console.log("entro por el error");
          console.log(result);
          }
     // dataType: 'json'
      });
   
    }
  else{ 
    alert("Por favor complete toda la informacion para poder guardar");
  }

}

function regresa(){
  WaitingOpen('');
  $("#content").load("<?php echo base_url(); ?>index.php/Cheqpropio/index/<?php echo $permission; ?>");
   WaitingClose('Cargando lista...');
}


 /// formato de numero con separador de mil y 2 lugares decimales
$("#monto").on({
  "focus": function(event) {
    $(event.target).select();
  },
  "keyup": function(event) {
    $(event.target).val(function(index, value) {
      return value.replace(/\D/g, "")
        .replace(/([0-9])([0-9]{2})$/, '$1.$2')
        .replace(/\B(?=(\d{3})+(?!\d)\.?)/g, ",");
    });
  }
});
///////
  // function format(input)
   // {
   //   var num = input.value.replace(/\./g,'');
   //   if(!isNaN(num)){
   //   num = num.toString().split('').reverse().join('').replace(/(?=\d*\.?)(\d{3})/g,'$1.');
   //   num = num.split('').reverse().join('').replace(/^[\.]/,'');
   //   input.value = num;
   //   }
     
   //   else{ alert('Solo se permiten numeros');
   //   input.value = input.value.replace(/[^\d\.]*/g,'');
   //   }
   // }

  // $("#monto").inputmask("decimal", {
  //     placeholder: "0",
  //     digits: 2,
  //     digitsOptional: false,
  //     radixPoint: ",",
  //     groupSeparator: ".",
  //     autoGroup: true,
  //     allowPlus: false,
  //     allowMinus: false,
  //     clearMaskOnLostFocus: false,
  //     removeMaskOnSubmit: true,
  //     autoUnmask: true,
  //     onUnMask: function(maskedValue, unmaskedValue) {
  //         var x = maskedValue.split(',');
  //         return x[0].replace(/\./g, '') + '.' + x[1];
  //     }
  // });

  // $(document).ready(function(){
  //   Inputmask("(.999){+|1},00", {
  //         positionCaretOnClick: "radixFocus",
  //         radixPoint: ",",
  //         _radixDance: true,
  //         numericInput: true,
  //         placeholder: "0",
  //         definitions: {
  //             "0": {
  //                 validator: "[0-9\uFF11-\uFF19]"
  //             }
  //         }
  //    }).mask("#monto");
  // });

///////  

</script>


<!-- Modal Agregar Cheques Propios -->
 <div class="modal fade" id="modaltarea" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
  <div class="modal-dialog modal-lg" role="document" style="width: 60%">
    <div class="modal-content">

      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
        <h4 class="modal-title"  id="myModalLabel"><span id="modalAction" class="fa fa-plus-square" style="color: #008000" > </span>  Agregar Cheques Propios</h4>
       </div> <!-- /.modal-header  -->

      <div class="modal-body input-group ui-widget" id="modalBodyArticle">
        
        <div class="row" >
          <div class="col-sm-12 col-md-12">            
            <div class="col-xs-8">Chequera:
              <select    id="num" name="num" class="form-control" >
              </select>
            </div> 
            <div class="col-xs-8">Nro:
              <input type="text"   id="nu" name="nu" class="form-control" >              
            </div> 
            <br><br>
            <div class="col-xs-8">Proveedor:
              <select  id="prov" name="prov" class="form-control" ></select>
            </div> 
            <br>
            <br>

            <div class="col-xs-8">Fecha de Emision:
              <input type="date" id="fechae" name="fechae" class="form-control" >
            </div>
            <br> 
            <br>

            <div class="col-xs-8">Fecha de Vencimiento:
              <input type="date" id="fechav" name="fechav" class="form-control" >
            </div> 
            <br>
            <br>
            <div class="col-xs-8">Monto:
              <!-- <input type="text" id="monto" name="monto" class="form-control" onkeyup="format(this)" onchange="format(this) "> -->
              <input type="text" id="monto" name="monto" class="form-control" >
            </div> 
            <br>
            <div class="col-xs-8">Observacion
              <!--<input type="text" id="fechav" name="fechav" class="form-control" >-->
            </div> 
            <div class="col-xs-12">
              <textarea  class="form-control input-md" rows="6" cols="500" id="descripcion" name="descripcion" value=""></textarea>
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
        <h4 class="modal-title"  id="myModalLabel"><span id="modalAction" class="fa fa-fw fa-pencil" style="color: #f39c12" > </span> Editar Cheques</h4>
       </div> <!-- /.modal-header  -->

      <div class="modal-body input-group ui-widget" id="modalBodyArticle">
        
        <div class="row" >
          <div class="col-sm-12 col-md-12">
       <div class="col-xs-8">Chequera:
              <select type="text" id="chequeraedit" name="chequeraedit" class="form-control" >
              </select>
              </div>
              <br>

              <div class="col-xs-8">Nro:
              <input type="text"   id="numedit" name="numedit" class="form-control" placeholder="Ingrese numero de cheque..."  >
              
              </div> 
             <br>
            <br>

             <div class="col-xs-8">Proveedor:
              <select  id="provedit" name="provedit" class="form-control" ></select>
            </div> 
            <br>
            <br>

             <div class="col-xs-8">Fecha de Emision:
              <input type="date" id="fechaedit" name="fechaedit" class="form-control">
            </div>
            <br> 
            <br>

             <div class="col-xs-8">Fecha de Vencimiento:
              <input type="date" id="fechavedit" name="fechavedit" class="form-control" >
            </div> 
            <br>
            <br>
             <div class="col-xs-8">Monto:
              <input type="text" id="montoedit" name="montoedit" class="form-control" placeholder="Ingrese Monto..." >
            </div> 
            <br>
              <div class="col-xs-8">Observacion
              <!--<input type="text" id="fechav" name="fechav" class="form-control" >-->
            </div> 

            <div class="col-xs-12">
                    <textarea  class="form-control input-md" rows="6" cols="500" id="descripcionedit" name="descripcionedit" value="" placeholder="Ingrese Observacion..." ></textarea>
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