
<div class="row">
  <div class="col-xs-12">
    <div class="alert alert-danger alert-dismissable" id="error" style="display: none">
          <h4><i class="icon fa fa-ban"></i> Error!</h4>
          Revise que todos los campos esten completos

      </div>
  </div>
</div>
<div class="row">
  <div class="col-xs-4">
   
      <label style="margin-top: 7px;">Nro <strong style="color: #dd4b39">*</strong>: </label>
    </div>
  <div class="col-xs-5">
      <input type="text" class="form-control" placeholder="Nro Orden de trabajo" id="nro" value="<?php echo $data['ot']['nro'];?>" <?php echo ($data['read'] == true ? 'disabled="disabled"' : '');?>  >
    </div>
    
</div><br>
<div class="row">
<div class="col-xs-4">
      <label style="margin-top: 7px;">Cliente <strong style="color: #dd4b39">*</strong>: </label>
    </div>
  <div class="col-xs-5">
      <select class="form-control select2" id="cliid" style="width: 100%;">
        <?php 
            echo '<option value="-1"></option>';
          foreach ($data['clientes'] as $c) {
           echo '<option value="'.$c['cliId'].'">'.$c['cliLastName'].', '.$c['cliName']. (strlen($c['cliMovil'])!=0?' / Tel: '.$c['cliMovil']:'').'</option>';
          }
        ?>
      </select>
      <button class="btn btn-success" id="btn-add" data-toggle="collapse" data-target="#collapseExample" aria-expanded="false" aria-controls="collapseExample">Agregar Cliente</button>
      <br>
      <div class="collapse" id="collapseExample" sytle>
        <div class="card card-body">
        <form id="cliente">
          <div class="row" style="margin-left: 10%;">
                <div class="col-xs-12">
                  <input type="text" class="form-control" placeholder="Nombre" id="cliName" name="cliName" value="<?php echo $data['customer']['cliName'];?>" <?php echo ($data['read'] == true ? 'disabled="disabled"' : '');?>  >
                </div>
                <div class="col-xs-12">
                <br>
                   <input type="text" class="form-control" placeholder="Apellido" id="cliLastName"  name="cliLastName"value="<?php echo $data['customer']['cliLastName'];?>" <?php echo ($data['read'] == true ? 'disabled="disabled"' : '');?>  >
              </div>
              <div class="col-xs-12">
              <br>
                <input type="text" class="form-control" placeholder="Celular" id="cliMovil" name="cliMovil"value="<?php echo $data['customer']['cliMovil'];?>" <?php echo ($data['read'] == true ? 'disabled="disabled"' : '');?> >
              </div>
            </div>
            </form>
        </div>
      </div>
      
    </div>
</div><br>

 <div class="row">
        <div class="col-xs-4">
            <label style="margin-top: 7px;">Fecha <strong style="color: #dd4b39">*</strong>: </label>
          </div>
        <div class="col-xs-5">
            <input type="text" class="form-control" id="vfech" placeholder="dd-mm-aaaa" value="<?php echo $data['ot']['fecha_inicio'];?>" <?php echo ($data['read'] == true ? 'disabled="disabled"' : '');?> >
          </div>
      </div><br>

<div class="row">
  <div class="col-xs-4">
      <label style="margin-top: 7px;">Nota: </label>
  </div>
  <div class="col-xs-5">
      <textarea placeholder="Orden de trabajo" class="form-control" rows="10" id="vsdetalle" value=""></textarea>
  </div>
</div><br>


<div class="row">
<div class="col-xs-4">
      <label style="margin-top: 7px;">Sucursal <strong style="color: #dd4b39">*</strong>: </label>
    </div>
  <div class="col-xs-5">
      <select class="form-control select2" id="sucid" style="width: 100%;">
        <?php 
            echo '<option value="-1"></option>';
          foreach ($data['sucursal'] as $s) {
           echo '<option value="'.$s['id_sucursal'].'">'.$s['descripc'].', '.$s['descripc'].'</option>';
          }
        ?>
      </select>
    </div>
</div><br>

<script>
$('#collapseExample').on('hidden.bs.collapse', function () {
  $('#btn-add').html('Agregar Cliente');
  if($('#cliName').val()=='' || $('#cliLastName').val()=='' || $('#cliMovil').val()==''){alert("Campos Incompletos");return;}
  guardar();
})
$('#collapseExample').on('show.bs.collapse', function () {
  $('#btn-add').html('Guardar');
})

function guardar(){
  console.log("Guardando Cliente");
  var nombre = $('#cliName').val();
  var apellido = $('#cliLastName').val();
  var movil = $('#cliMovil').val();
  var parametros = {
    'cliName': nombre,
    'cliLastName': apellido,
    'cliMovil': movil,
    'estado': 'C'
  };                                                                        
  $.ajax({
    type:"POST",
    url: "index.php/Cliente/agregar_cliente", 
    data:{parametros:parametros},
    success: function(data){
      console.log("Guardado OK ");
      var html = '<option value="'+data+'" selected>'+$('#cliName').val()+' '+$('#cliLastName').val()+' / Tel: '+$('#cliMovil').val()+'</option>';
      $('#cliid').append(html);
      $('form#cliente')[0].reset();
     
    },
    error: function(result){
        console.log("entro por el error");
        console.log(result);
    }
  });
}
</script>