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
                <a href="../Canalizacion">LIsta de Canalizaciones</a>
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
	<div class="row">
		<div class="page-header">
			<h1 class="page-title"><?php echo $titulo;?></h1>
		</div>
		<div class="col-xs-12">
      <?php // Change the css classes to suit your needs

      $attributes = array('class' => 'form-horizontal', 'id' => '');
      echo form_open('Canalizacion/Registro_Canalizacion', $attributes); ?>

      <div class="form-group">
              <label for="fecha" class="col-sm-3 control-label no-padding-right">Fecha <span class="required">*</span></label>
              <?php echo form_error('fecha'); ?>
              <input id="fecha" type="text" name="fecha"  value="<?php echo set_value('fecha'); ?>" class="col-xs-10 col-sm-5" />
      </div>

      <div class="form-group">
              <label for="numeroControl" class="col-sm-3 control-label no-padding-right">Numero de Control <span class="required">*</span></label>
              <?php echo form_error('numeroControl'); ?>
              <input id="numeroControl" type="text" name="numeroControl" maxlength="10" value="<?php echo set_value('numeroControl'); ?>" class="col-xs-10 col-sm-5" />
      </div>

      <div class="form-group">
              <label for="nombreAlumno" class="col-sm-3 control-label no-padding-right">Nombre del Alumno <span class="required">*</span></label>
              <?php echo form_error('nombreAlumno'); ?>
              <input id="nombreAlumno" type="text" name="nombreAlumno" maxlength="110" value="<?php echo set_value('nombreAlumno'); ?>" class="col-xs-10 col-sm-5" />
      </div>

      <div class="form-group">
              <label for="semestre" class="col-sm-3 control-label no-padding-right">Semestre <span class="required">*</span></label>
              <?php echo form_error('semestre'); ?>

              <?php // Change the values in this array to populate your dropdown as required ?>
              <?php $options = array(
                                                        ''  => 'Please Select',
                                                        'example_value1'    => 'example option 1'
                                                      ); ?>

              <?php echo form_dropdown('semestre', $options, set_value('semestre'),'class="col-xs-10 col-sm-5"')?>
      </div>

      <div class="form-group">
              <label for="edad" class="col-sm-3 control-label no-padding-right">Edad <span class="required">*</span></label>
              <?php echo form_error('edad'); ?>
              <input id="edad" type="text" name="edad" maxlength="2" value="<?php echo set_value('edad'); ?>" class="col-xs-10 col-sm-5" />
      </div>

      <div class="form-group">
              <label for="nonbreTutor" class="col-sm-3 control-label no-padding-right">Nonbre del Tutor <span class="required">*</span></label>
              <?php echo form_error('nonbreTutor'); ?>
              <input id="nonbreTutor" type="text" name="nonbreTutor" maxlength="110" value="<?php echo set_value('nonbreTutor'); ?>" class="col-xs-10 col-sm-5" />
      </div>

      <div class="form-group">
              <label for="especialidad" class="col-sm-3 control-label no-padding-right">Especialidad <span class="required">*</span></label>
              <?php echo form_error('especialidad'); ?>

              <?php // Change the values in this array to populate your dropdown as required ?>
              <?php $options = array(
                                                        ''  => 'Please Select',
                                                        'example_value1'    => 'example option 1'
                                                      ); ?>

              <?php echo form_dropdown('especialidad', $options, set_value('especialidad'), 'class="col-xs-10 col-sm-5"')?>
      </div>

      <div class="form-group">
              <label for="problematica" class="col-sm-3 control-label no-padding-right">Problematica <span class="required">*</span></label>
      	<?php echo form_error('problematica'); ?>


      	<?php echo form_textarea( array( 'name' => 'problematica','class' => 'col-xs-10 col-sm-5', 'rows' => '5', 'cols' => '80', 'value' => set_value('problematica') ) )?>
      </div>
      <div class="form-group">
              <label for="servicio" class="col-sm-3 control-label no-padding-right">Servicio Solicitado <span class="required">*</span></label>
      	<?php echo form_error('servicio'); ?>


      	<?php echo form_textarea( array( 'name' => 'servicio','class' => 'col-xs-10 col-sm-5', 'rows' => '5', 'cols' => '80', 'value' => set_value('servicio') ) )?>
      </div>
      <div class="form-group">
              <label for="observaciones" class="col-sm-3 control-label no-padding-right">Observaciones <span class="required">*</span></label>
      	<?php echo form_error('observaciones'); ?>


      	<?php echo form_textarea( array( 'name' => 'observaciones','class' => 'col-xs-10 col-sm-5', 'rows' => '5', 'cols' => '80', 'value' => set_value('observaciones') ) )?>
      </div>

      <div class="form-group">
				<div class="col-sm-3 control-label no-padding-right">
					<?php echo form_submit( 'submit', 'Enviar', 'class="btn btn-success"'); ?>
				</div>              
      </div>

      <?php echo form_close(); ?>
		</div>
	</div>
</div>
