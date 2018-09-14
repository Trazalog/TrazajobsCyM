 

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
      <input type="text" class="form-control" placeholder="Nombre" id="nro" value="<?php echo $data['cheques']['cheqnro'];?>" <?php echo ($data['read'] == true ? 'disabled="disabled"' : '');?>  >
    </div>
    
</div><br>
<div class="row">
<div class="col-xs-4">
      <label style="margin-top: 7px;">Monto <strong style="color: #dd4b39">*</strong>: </label>
    </div>
  <div class="col-xs-5">
      <input type="text" class="form-control" data-mask="999-99-999-9999-9"placeholder="Monto" id="mont" value="<?php echo $data['cheques']['cheqmonto'];?>" <?php echo ($data['read'] == true ? 'disabled="disabled"' : '');?>  >
    </div>
    
</div><br>



<div class="row">
<div class="col-xs-4">
      <label style="margin-top: 7px;">Proveedores <strong style="color: #dd4b39">*</strong>: </label>
    </div>
  <div class="col-xs-5">
      <select class="form-control select2" id="prov" style="width: 100%;">
        <?php 
            echo '<option value="-1"></option>';
          foreach ($data['proveedores'] as $p) {
           echo '<option value="'.$P['provid'].'">'.$p['provnombre'].', '.$c['provnombre'].'</option>';
          }
        ?>
      </select>
    </div>
</div><br>
<div class="row">
<div class="col-xs-4">
      <label style="margin-top: 7px;">Bancos <strong style="color: #dd4b39">*</strong>: </label>
    </div>
  <div class="col-xs-5">
      <select class="form-control select2" id="banc" style="width: 100%;">
        <?php 
            echo '<option value="-1"></option>';
          foreach ($data['bancos'] as $b) {
           echo '<option value="'.$b['bancid'].'">'.$b['bancdescrip'].', '.$b['bancdescrip'].'</option>';
          }
        ?>
      </select>
    </div>
</div><br>
<div class="row">
        <div class="col-xs-4">
            <label style="margin-top: 7px;">Fecha <strong style="color: #dd4b39">*</strong>: </label>
          </div>
        <div class="col-xs-5">
            <input type="text" class="form-control" id="vfech" placeholder="dd-mm-aaaa" value="<?php echo $data['cheques']['bancid'];?>" <?php echo ($data['read'] == true ? 'disabled="disabled"' : '');?> >
          </div>
      </div><br>



 <div class="row">
        <div class="col-xs-4">
            <label style="margin-top: 7px;">Estado: </label>
          </div>
        <div class="col-xs-5">
<select class="form-control" id="estado"  <?php echo ($data['read'] == true ? 'disabled="disabled"' : '');?> >
              <?php 
                  echo '<option value="8" '.($data['socio']['socEstado'] == '1' ? 'selected' : '').'>Curso</option>';
                  echo '<option value="9" '.($data['socio']['socEstado'] == '2' ? 'selected' : '').'>Terminado</option>';
                  echo '<option value="10" '.($data['socio']['socEstado'] == '3' ? 'selected' : '').'>PAgado</option>';
              ?>
            </select>
</div>

  