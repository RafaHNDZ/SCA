<?php if ($this->session->userdata('login_ok') == TRUE){ ?>
      <div class="main-content">
        <div class="main-content-inner">
          <div class="breadcrumbs breadcrumbs-fixed" id="breadcrumbs">
            <ul class="breadcrumb">
              <li>
                <i class="ace-icon fa fa-home home-icon"></i>
                <a href="../Administrador">Home</a>
              </li>

              <li>
                <a class="../SesionPrivada">Lista de Sesiones Privadas</a>
              </li>
              <li>
                <a class="active"><?php echo $titulo; ?></a>
              </li>
            </ul><!-- /.breadcrumb -->

            <div class="nav-search" id="nav-search">
              <form class="form-search">
                <span class="input-icon">
                  <input type="text" placeholder="Buscar ..." class="nav-search-input" id="nav-search-input" autocomplete="off" />
                  <i class="ace-icon fa fa-search nav-search-icon"></i>
                </span>
              </form>
            </div><!-- /.nav-search -->
          </div>
<?php } ?>
<div class="page-content">
<?php $id = $this->input->post('id');
  if($id != null){
    $data = $this->Modelo_Alumno->get_alumno_data($id);
    foreach($data as $dato){

    } ?>
	<div class="row">
		<div class="page-header">
			<h1 class="page-title"><?php echo $titulo;?></h1>
		</div>

		<div class="col-xs-12">
      <?php // Change the css classes to suit your needs

      $attributes = array('class' => 'form-horizontal', 'id' => '');
      echo form_open('SesionPrivada/Registro_SesionPrivada', $attributes); ?>

      <div class="form-group">
        <label for="nombreAlumno" class="col-sm-3 control-label no-padding-right">Nombre del Alumno <span class="required">*</span></label>
        <?php echo form_error('nombreAlumno'); ?>
        <input class="col-xs-10 col-sm-5" readonly="readonly" id="nombreAlumno" type="text" name="nombreAlumno" maxlength="110" value="<?php echo $dato['nomAlu']." ".$dato['apellidoP']." ".$dato['apellidoM']; ?>"  />
      </div>

      <div class="form-group">
        <label for="nombreGrupo" class="col-sm-3 control-label no-padding-right">Grupo <span class="required">*</span></label>
        <input class="col-xs-10 col-sm-5" readonly="readonly" id="nombreGrupo" type="text" name="nombreGrupo" maxlength="110" value="<?php echo $dato['nombreGrupo']; ?>"  />
        <?php echo form_error('nombreGrupo'); ?>
      </div>

      <div class="form-group">
        <label for="nombreTurno" class="col-sm-3 control-label no-padding-right">Turno <span class="required">*</span></label>
        <?php echo form_error('nombreTurno'); ?>
        <input class="col-xs-10 col-sm-5" readonly="readonly" id="nombreTurno" type="text" name="nombreTurno" maxlength="110" value="<?php echo $dato['nombreTurno'];?>"  />
      </div>

      <div class="form-group">
        <label for="fecha" class="col-sm-3 control-label no-padding-right">Fecha <span class="required">*</span></label>
        <?php echo form_error('fecha'); ?>
        <input class="col-xs-10 col-sm-5" readonly="readonly" id="fecha" type="text" name="fecha"  value="<?php echo date('Y-m-d'); ?>"  />
      </div>

      <div class="form-group">
        <label for="objetivo" class="col-sm-3 control-label no-padding-right">Objetivo <span class="required">*</span></label>
      	<?php echo form_error('objetivo'); ?>


      	<?php echo form_textarea( array('required' => 'required', 'name' => 'objetivo', 'rows' => '5', 'class' => 'col-xs-10 col-sm-5', 'cols' => '80', 'value' => set_value('objetivo') ) )?>
      </div>
      <div class="form-group">
        <label for="problematica" class="col-sm-3 control-label no-padding-right">Problematica <span class="required">*</span></label>
      	<?php echo form_error('problematica'); ?>


      	<?php echo form_textarea( array('required' => 'required', 'name' => 'problematica', 'rows' => '5', 'class' => 'col-xs-10 col-sm-5', 'cols' => '80', 'value' => set_value('problematica') ) )?>
      </div>
      <div class="form-group">
        <label for="seguimiento" class="col-sm-3 control-label no-padding-right">Seguimiento <span class="required">*</span></label>
      	<?php echo form_error('seguimiento'); ?>


      	<?php echo form_textarea( array('required' => 'required', 'name' => 'seguimiento', 'rows' => '5', 'class' => 'col-xs-10 col-sm-5', 'cols' => '80', 'value' => set_value('seguimiento') ) )?>
      </div>
      <div class="form-group">
        <label for="resultados" class="col-sm-3 control-label no-padding-right">Resultados <span class="required">*</span></label>
      	<?php echo form_error('resultados'); ?>


      	<?php echo form_textarea( array('required' => 'required', 'name' => 'resultados', 'rows' => '5', 'class' => 'col-xs-10 col-sm-5', 'cols' => '80', 'value' => set_value('resultados') ) )?>
      </div>
      <div class="form-group">
        <label for="observaciones" class="col-sm-3 control-label no-padding-right">Observaciones <span class="required">*</span></label>
      	<?php echo form_error('observaciones'); ?>


      	<?php echo form_textarea( array('required' => 'required', 'name' => 'observaciones', 'rows' => '5', 'class' => 'col-xs-10 col-sm-5', 'cols' => '80', 'value' => set_value('observaciones') ) )?>
      </div>

      <div class="form-group">
        <div class="col-sm-3 control-label no-padding-right">
          <?php echo form_submit( 'submit', 'Enviar','class="btn btn-primary"'); ?>
        </div>
      </div>

      <?php echo form_close();
    }else{
      echo '<script>  sec_Warning(); </script>';
      ?> <a class="btn btn-primary" href="javascript:window.history.back();">&laquo; Volver atrás</a> <?php
    } ?>

		</div>
	</div>
</div>
</div>
<script>

$(document).ready(function() {
    $("#resultadoBusqueda").html('<p>JQUERY VACIO</p>');
});
  function buscar() {
      var textoBusqueda = $("input#busqueda").val();

       if (textoBusqueda != "") {

          $.post("<?php echo base_url();?>index.php/SesionPrivada/alumno_data", {id: textoBusqueda}, function(data) {
              $("#resultadoBusqueda").html(data);
              $("#nombreAlumno").val(data);
              });
       } else {
          $("#resultadoBusqueda").html('<p>JQUERY VACIO</p>');
          $("#nombreAlumno").val();
          };
    };

</script>
