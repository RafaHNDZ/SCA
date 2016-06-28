<div class="page-content">
	<div class="row">
		<div class="page-header">
			<h1 class="page-title"><?php echo $titulo;?></h1>
		</div class="form-group">
		<div class="col-xs-12">
      <?php // Change the css classes to suit your needs

      $attributes = array('class' => 'form-horizontal', 'id' => '');
      echo form_open('SesionPrivada', $attributes); ?>

      <div class="form-group">
              <label for="nombreAlumno" class="col-sm-3 control-label no-padding-right">Nombre del Alumno <span class="required">*</span></label>
              <?php echo form_error('nombreAlumno'); ?>
              <input class="col-xs-10 col-sm-5" id="nombreAlumno" type="text" name="nombreAlumno" maxlength="110" value="<?php echo set_value('nombreAlumno'); ?>"  />
      </div>

      <div class="form-group">
              <label for="grupo" class="col-sm-3 control-label no-padding-right">Grupo <span class="required">*</span></label>
              <?php echo form_error('grupo'); ?>

              <?php // Change the values in this array to populate your dropdown as required ?>
              <?php $options = array(
                                                        ''  => 'Please Select',
                                                        'example_value1'    => 'example option 1'
                                                      ); ?>

              <?php echo form_dropdown('grupo', $options, set_value('grupo'),'class="col-xs-10 col-sm-5"')?>
      </div>

      <div class="form-group">
              <label for="turno" class="col-sm-3 control-label no-padding-right">Turno <span class="required">*</span></label>
              <?php echo form_error('turno'); ?>

              <?php // Change the values in this array to populate your dropdown as required ?>
              <?php $options = array(
                                                        ''  => 'Please Select',
                                                        'example_value1'    => 'example option 1'
                                                      ); ?>

              <?php echo form_dropdown('turno', $options, set_value('turno'),'class="col-xs-10 col-sm-5"')?>
      </div>

      <div class="form-group">
              <label for="fecha" class="col-sm-3 control-label no-padding-right">Fecha <span class="required">*</span></label>
              <?php echo form_error('fecha'); ?>
              <input class="col-xs-10 col-sm-5" id="fecha" type="text" name="fecha"  value="<?php echo set_value('fecha'); ?>"  />
      </div>

      <div class="form-group">
              <label for="objetivo" class="col-sm-3 control-label no-padding-right">Objetivo <span class="required">*</span></label>
      	<?php echo form_error('objetivo'); ?>


      	<?php echo form_textarea( array( 'name' => 'objetivo', 'rows' => '5', 'class' => 'col-xs-10 col-sm-5', 'cols' => '80', 'value' => set_value('objetivo') ) )?>
      </div>
      <div class="form-group">
              <label for="problematica" class="col-sm-3 control-label no-padding-right">Problematica <span class="required">*</span></label>
      	<?php echo form_error('problematica'); ?>


      	<?php echo form_textarea( array( 'name' => 'problematica', 'rows' => '5', 'class' => 'col-xs-10 col-sm-5', 'cols' => '80', 'value' => set_value('problematica') ) )?>
      </div>
      <div class="form-group">
              <label for="seguimiento" class="col-sm-3 control-label no-padding-right">Seguimiento <span class="required">*</span></label>
      	<?php echo form_error('seguimiento'); ?>


      	<?php echo form_textarea( array( 'name' => 'seguimiento', 'rows' => '5', 'class' => 'col-xs-10 col-sm-5', 'cols' => '80', 'value' => set_value('seguimiento') ) )?>
      </div>
      <div class="form-group">
              <label for="resultados" class="col-sm-3 control-label no-padding-right">Resultados <span class="required">*</span></label>
      	<?php echo form_error('resultados'); ?>


      	<?php echo form_textarea( array( 'name' => 'resultados', 'rows' => '5', 'class' => 'col-xs-10 col-sm-5', 'cols' => '80', 'value' => set_value('resultados') ) )?>
      </div>
      <div class="form-group">
              <label for="observaciones" class="col-sm-3 control-label no-padding-right">Observaciones <span class="required">*</span></label>
      	<?php echo form_error('observaciones'); ?>


      	<?php echo form_textarea( array( 'name' => 'observaciones', 'rows' => '5', 'class' => 'col-xs-10 col-sm-5', 'cols' => '80', 'value' => set_value('observaciones') ) )?>
      </div>

      <div class="form-group">
        <div class="col-sm-3 control-label no-padding-right">
          <?php echo form_submit( 'submit', 'Enviar','class="btn btn-primary"'); ?>
        </div>
      </div>

      <?php echo form_close(); ?>

		</div class="form-group">
	</div class="form-group">
</div class="form-group">
