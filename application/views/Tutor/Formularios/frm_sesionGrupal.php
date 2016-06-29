<?php if ($this->session->userdata('login_ok') == TRUE){ ?>
      <div class="main-content">
        <div class="main-content-inner">
          <div class="breadcrumbs breadcrumbs-fixed" id="breadcrumbs">
            <ul class="breadcrumb">
              <li>
                <i class="ace-icon fa fa-home home-icon"></i>
                <a href="Administrador">Home</a>
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
		</div class="form-group">
		<div class="col-xs-12">
      <?php // Change the css classes to suit your needs

      $attributes = array('class' => 'form-horizontal', 'id' => '');
      echo form_open('SesionGrupal/Registro_SesionGrupal', $attributes); ?>

      <div class="form-group">
              <label for="nombreTutor" class="col-sm-3 control-label no-padding-right">Nombre del Tutor <span class="required">*</span></label>
              <?php echo form_error('nombreTutor'); ?>

              <?php // Change the values in this array to populate your dropdown as required ?>
              <?php $options = array(
                                                        ''  => 'Please Select',
                                                        'example_value1'    => 'example option 1'
                                                      ); ?>

              <?php echo form_dropdown('nombreTutor', $options, set_value('nombreTutor'))?>
      </div>

      <div class="form-group">
              <label for="grupo" class="col-sm-3 control-label no-padding-right">Grupo <span class="required">*</span></label>
              <?php echo form_error('grupo'); ?>

              <?php // Change the values in this array to populate your dropdown as required ?>
              <?php $options = array(
                                                        ''  => 'Please Select',
                                                        'example_value1'    => 'example option 1'
                                                      ); ?>

              <?php echo form_dropdown('grupo', $options, set_value('grupo'))?>
      </div>

      <div class="form-group">
              <label for="turno" class="col-sm-3 control-label no-padding-right">Turno <span class="required">*</span></label>
              <?php echo form_error('turno'); ?>

              <?php // Change the values in this array to populate your dropdown as required ?>
              <?php $options = array(
                                                        ''  => 'Please Select',
                                                        'example_value1'    => 'example option 1'
                                                      ); ?>

              <?php echo form_dropdown('turno', $options, set_value('turno'))?>
      </div>

      <div class="form-group">
              <label for="mes" class="col-sm-3 control-label no-padding-right">Mes <span class="required">*</span></label>
              <?php echo form_error('mes'); ?>

              <?php // Change the values in this array to populate your dropdown as required ?>
              <?php $options = array(
                                                        ''  => 'Please Select',
                                                        'example_value1'    => 'example option 1'
                                                      ); ?>

              <?php echo form_dropdown('mes', $options, set_value('mes'))?>
      </div>

      <div class="form-group">
              <label for="numeroSesion" class="col-sm-3 control-label no-padding-right">Numero de la Sesión <span class="required">*</span></label>
              <?php echo form_error('numeroSesion'); ?>
              <input id="numeroSesion" type="text" name="numeroSesion" maxlength="2" value="<?php echo set_value('numeroSesion'); ?>" class="col-xs-10 col-sm-5" />
      </div>

      <div class="form-group">
              <label for="fecha" class="col-sm-3 control-label no-padding-right">Fecha <span class="required">*</span></label>
              <?php echo form_error('fecha'); ?>
              <input id="fecha" type="text" name="fecha"  value="<?php echo set_value('fecha'); ?>" class="col-xs-10 col-sm-5" />
      </div>

      <div class="form-group">
              <label for="objetivo" class="col-sm-3 control-label no-padding-right">Objetivo <span class="required">*</span></label>
      	<?php echo form_error('objetivo'); ?>


      	<?php echo form_textarea( array( 'name' => 'objetivo', 'rows' => '5', 'cols' => '80', 'value' => set_value('objetivo') ) )?>
      </div>
      <div class="form-group">
              <label for="problematica" class="col-sm-3 control-label no-padding-right">Problematica <span class="required">*</span></label>
      	<?php echo form_error('problematica'); ?>


      	<?php echo form_textarea( array( 'name' => 'problematica', 'rows' => '5', 'cols' => '80', 'value' => set_value('problematica') ) )?>
      </div>
      <div class="form-group">
              <label for="remediales" class="col-sm-3 control-label no-padding-right">Actividades Remediales <span class="required">*</span></label>
      	<?php echo form_error('remediales'); ?>


      	<?php echo form_textarea( array( 'name' => 'remediales', 'rows' => '5', 'cols' => '80', 'value' => set_value('remediales') ) )?>
      </div>
      <div class="form-group">
              <label for="resultados" class="col-sm-3 control-label no-padding-right">Resultados <span class="required">*</span></label>
      	<?php echo form_error('resultados'); ?>


      	<?php echo form_textarea( array( 'name' => 'resultados', 'rows' => '5', 'cols' => '80', 'value' => set_value('resultados') ) )?>
      </div>
      <div class="form-group">
              <label for="observaciones" class="col-sm-3 control-label no-padding-right">Observaciones<span class="required">*</span></label>
      	<?php echo form_error('observaciones'); ?>


      	<?php echo form_textarea( array( 'name' => 'observaciones', 'rows' => '5', 'cols' => '80', 'value' => set_value('observaciones') ) )?>
      </div>

      <div class="form-group">
				<div class="col-sm-3 control-label no-padding-right">
					<?php echo form_submit( 'submit', 'Registrar','class="btn btn-primary"'); ?>
				</div>
      </div>

      <?php echo form_close(); ?>
		</div class="form-group">
	</div class="form-group">
</div class="form-group">
