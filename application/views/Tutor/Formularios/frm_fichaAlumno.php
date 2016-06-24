<div class="page-content">
	<div class="row">
		<div class="page-header">
			<h1 class="page-title"><?php echo $titulo;?></h1>
		</div>
		<div class="col-xs-12">
      <div class="form-group">

        <!-- Nav tabs -->
        <ul class="nav nav-tabs" role="tablist">
          <li role="presentation" class="active"><a href="#home" aria-controls="home" role="tab" data-toggle="tab">Infomación Personal</a></li>
          <li role="presentation"><a href="#familiar" aria-controls="familiar" role="tab" data-toggle="tab">Historial Familiar</a></li>
          <li role="presentation"><a href="#medico" aria-controls="medico" role="tab" data-toggle="tab">Historial Medico</a></li>
          <li role="presentation"><a href="#social" aria-controls="social" role="tab" data-toggle="tab">Información Social</a></li>
          <li role="presentation"><a href="#academico" aria-controls="academico" role="tab" data-toggle="tab">Historial academico</a></li>
        </ul>

        <!-- Tab panes -->
        <div class="tab-content">
          <div role="tabpanel" class="tab-pane active" id="home">
            <?php
            $attributes = array('class' => 'form-horizontal', 'id' => '');
            echo form_open('FichaAlumno/Regitrar_Ficha', $attributes); ?>

            <div class="form-group">
                    <label for="nombre" class="col-sm-3 control-label no-padding-right">Nombre <span class="required">*</span></label>
                    <?php echo form_error('nombre'); ?>
                    <input id="nombre" type="text" name="nombre" maxlength="30" value="<?php echo set_value('nombre'); ?>" class="col-xs-10 col-sm-5" />
            </div>

            <div class="form-group">
                    <label for="apellidoP" class="col-sm-3 control-label no-padding-right">Apellido Paterno <span class="required">*</span></label>
                    <?php echo form_error('apellidoP'); ?>
                    <input id="apellidoP" type="text" name="apellidoP" maxlength="40" value="<?php echo set_value('apellidoP'); ?>" class="col-xs-10 col-sm-5" />
            </div>

            <div class="form-group">
                    <label for="apellidoM" class="col-sm-3 control-label no-padding-right">Apellido Materno <span class="required">*</span></label>
                    <?php echo form_error('apellidoM'); ?>
                    <input id="apellidoM" type="text" name="apellidoM" maxlength="40" value="<?php echo set_value('apellidoM'); ?>" class="col-xs-10 col-sm-5" />
            </div>

            <div class="form-group">
                    <label for="fechaNacimiento"class="col-sm-3 control-label no-padding-right">Fecha de Nacimiento</label>
                    <?php echo form_error('fechaNacimiento'); ?>
                    <input id="fechaNacimiento" type="text" name="fechaNacimiento"  value="<?php echo set_value('fechaNacimiento'); ?>" class="col-xs-10 col-sm-5" />
            </div>

            <div class="form-group">
                    <label for="telefono" class="col-sm-3 control-label no-padding-right">Telefono <span class="required">*</span></label>
                    <?php echo form_error('telefono'); ?>
                    <input id="telefono" type="text" name="telefono" maxlength="10" value="<?php echo set_value('telefono'); ?>" class="col-xs-10 col-sm-5" />
            </div>

            <div class="form-group">
                    <label for="matricula" class="col-sm-3 control-label no-padding-right">Matricula <span class="required">*</span></label>
                    <?php echo form_error('matricula'); ?>
                    <input id="matricula" type="text" name="matricula"  value="<?php echo set_value('matricula'); ?>" class="col-xs-10 col-sm-5" />
            </div>

            <div class="form-group">
                    <label for="grupo" class="col-sm-3 control-label no-padding-right">Grupo <span class="required">*</span></label>
                    <?php echo form_error('grupo'); ?>

                    <?php // Change the values in this array to populate your dropdown as required ?>
                    <?php $options = array(
                                                              ''  => 'Please Select',
                                                              'example_value1'    => 'example option 1'
                                                            ); ?>

                    <?php echo form_dropdown('grupo', $options, set_value('grupo'),'class="col-xs-10 col-sm-3"')?>
            </div>

<!-- Formulario de Direccion ............................................................................................................ -->

            <div class="form-group">
                    <label for="calle" class="col-sm-3 control-label no-padding-right">Calle <span class="required">*</span></label>
                    <?php echo form_error('calle'); ?>
                    <input id="calle" type="text" name="calle" maxlength="45" value="<?php echo set_value('calle'); ?>" class="col-xs-10 col-sm-5" />
            </div>

            <div class="form-group">
                    <label for="numero" class="col-sm-3 control-label no-padding-right">Numero <span class="required">*</span></label>
                    <?php echo form_error('numero'); ?>
                    <input id="numero" type="text" name="numero" maxlength="5" value="<?php echo set_value('numero'); ?>" class="col-xs-10 col-sm-5" />
            </div>

            <div class="form-group">
                    <label for="colonia" class="col-sm-3 control-label no-padding-right">Colonia <span class="required">*</span></label>
                    <?php echo form_error('colonia'); ?>
                    <input id="colonia" type="text" name="colonia" maxlength="45" value="<?php echo set_value('colonia'); ?>" class="col-xs-10 col-sm-5" />
            </div>

            <div class="form-group">
                    <label for="codigoPostal" class="col-sm-3 control-label no-padding-right">Codigo Postal<span class="required">*</span></label>
                    <?php echo form_error('codigoPostal'); ?>
                    <input id="codigoPostal" type="text" name="codigoPostal" maxlength="6" value="<?php echo set_value('codigoPostal'); ?>" class="col-xs-10 col-sm-5" />
            </div>


            <div class="form-group" class="col-sm-3 control-label no-padding-right">
                    
            </div>

          </div>
          <div role="tabpanel" class="tab-pane" id="familiar">

            <div class="form-horizontal">
              <div class="form-group">
                      <label for="situacionesFamiliares" class="col-sm-3 control-label no-padding-right">Situaciones Familiares <span class="required">*</span></label>
                <?php echo form_error('situacionesFamiliares'); ?>


                <?php echo form_textarea( array( 'name' => 'situacionesFamiliares', 'rows' => '5', 'cols' => '80', 'value' => set_value('situacionesFamiliares') ) )?>
              </div>
              <div class="form-group">
                      <label for="integrantes" class="col-sm-3 control-label no-padding-right">Integrantes de tu familia <span class="required">*</span></label>
                <?php echo form_error('integrantes'); ?>


                <?php echo form_textarea( array( 'name' => 'integrantes', 'rows' => '5' ,'class'=>'"col-xs-10 col-sm-5"', 'cols' => '80', 'value' => set_value('integrantes') ) )?>
              </div>
              <div class="form-group">
                      <label for="lugar" class="col-sm-3 control-label no-padding-right">Lugar que ocupas en la familia <span class="required">*</span></label>
                      <?php echo form_error('lugar'); ?>

                      <?php // Change the values in this array to populate your dropdown as required ?>
                      <?php $options = array(
                                                                ''  => 'Please Select',
                                                                'example_value1'    => 'example option 1'
                                                              ); ?>

                      <?php echo form_dropdown('lugar', $options, set_value('lugar') ,'class="col-xs-10 col-sm-5"')?>
              </div>

              <div class="form-group" class="col-sm-3 control-label no-padding-right">
                      <label for="relacionPaterna" class="col-sm-3 control-label no-padding-right">Como calificas la relacion con tus padres <span class="required">*</span></label>
                      <?php echo form_error('relacionPaterna'); ?>

                      <?php // Change the values in this array to populate your dropdown as required ?>
                      <?php $options = array(
                                                                ''  => 'Please Select',
                                                                'example_value1'    => 'example option 1'
                                                              ); ?>

                      <?php echo form_dropdown('relacionPaterna', $options, set_value('relacionPaterna') ,'class="col-xs-10 col-sm-5"')?>
              </div>
            </div>

          </div>
<!-- Registro de Historial Medico .............................................................................................................................. -->
          <div role="tabpanel" class="tab-pane" id="medico">

            <div class="form-horizontal">
              <div class="form-group">
                      <label for="enfermedades" class="col-sm-3 control-label no-padding-right">Enfermedades Padecidas <span class="required">*</span></label>
                <?php echo form_error('enfermedades'); ?>


                <?php echo form_textarea( array( 'name' => 'enfermedades', 'rows' => '5', 'class' =>'col-xs-10 col-sm-5', 'cols' => '80', 'value' => set_value('enfermedades') ) )?>
              </div>
              <div class="form-group">
                      <label for="tratamiento" class="col-sm-3 control-label no-padding-right">Tratamiento <span class="required">*</span></label>
                      <?php echo form_error('tratamiento'); ?>

                      <?php // Change the values in this array to populate your dropdown as required ?>
                      <?php $options = array(
                                                                ''  => 'Please Select',
                                                                'example_value1'    => 'example option 1'
                                                              ); ?>

                      <?php echo form_dropdown('tratamiento', $options, set_value('tratamiento'))?>
              </div>

              <div class="form-group">
                      <label for="tratamientoAnterior" class="col-sm-3 control-label no-padding-right">Tratamientos Anteriores <span class="required">*</span></label>
                <?php echo form_error('tratamientoAnterior'); ?>


                <?php echo form_textarea( array( 'name' => 'tratamientoAnterior', 'rows' => '5','class' =>'col-xs-10 col-sm-5', 'cols' => '80', 'value' => set_value('tratamientoAnterior') ) )?>
              </div>
              <div class="form-group">
                      <label for="tipoTratamiento" class="col-sm-3 control-label no-padding-right">Tipo de Tratamiento <span class="required">*</span></label>
                <?php echo form_error('tipoTratamiento'); ?>


                <?php echo form_textarea( array( 'name' => 'tipoTratamiento', 'rows' => '5','class' =>'col-xs-10 col-sm-5', 'cols' => '80', 'value' => set_value('tipoTratamiento') ) )?>
              </div>
              <div class="form-group">
                      <label for="hospitalizacion" class="col-sm-3 control-label no-padding-right">Has tenido alguna Hospitalización <span class="required">*</span></label>
                      <?php echo form_error('hospitalizacion'); ?>

                      <?php // Change the values in this array to populate your dropdown as required ?>
                      <?php $options = array(
                                                                ''  => 'Please Select',
                                                                'example_value1'    => 'example option 1'
                                                              ); ?>

                      <?php echo form_dropdown('hospitalizacion', $options, set_value('hospitalizacion'))?>
              </div>

              <div class="form-group">
                      <label for="motivoHospitalizacion" class="col-sm-3 control-label no-padding-right">Motivo <span class="required">*</span></label>
                <?php echo form_error('motivoHospitalizacion'); ?>


                <?php echo form_textarea( array( 'name' => 'motivoHospitalizacion', 'rows' => '5','class' =>'col-xs-10 col-sm-5', 'cols' => '80', 'value' => set_value('motivoHospitalizacion') ) )?>
              </div>
              <div class="form-group">
                      <label for="operaciones" class="col-sm-3 control-label no-padding-right">Has tenido alguna intervencion quirurjica <span class="required">*</span></label>
                      <?php echo form_error('operaciones'); ?>

                      <?php // Change the values in this array to populate your dropdown as required ?>
                      <?php $options = array(
                                                                ''  => 'Please Select',
                                                                'example_value1'    => 'example option 1'
                                                              ); ?>

                      <?php echo form_dropdown('operaciones', $options, set_value('operaciones'))?>
              </div>

              <div class="form-group">
                      <label for="motivoOperacion" class="col-sm-3 control-label no-padding-right">Motivo <span class="required">*</span></label>
                <?php echo form_error('motivoOperacion'); ?>


                <?php echo form_textarea( array( 'name' => 'motivoOperacion', 'rows' => '5','class' =>'col-xs-10 col-sm-5', 'cols' => '80', 'value' => set_value('motivoOperacion') ) )?>
              </div>
              <div class="form-group">
                      <label for="padeceEnfermedad" class="col-sm-3 control-label no-padding-right">Enfermedad <span class="required">*</span></label>
                <?php echo form_error('padeceEnfermedad'); ?>


                <?php echo form_textarea( array( 'name' => 'padeceEnfermedad', 'rows' => '5','class' =>'col-xs-10 col-sm-5', 'cols' => '80', 'value' => set_value('padeceEnfermedad') ) )?>
              </div>
              <div class="form-group">
                      <label for="enfermedadCronica" class="col-sm-3 control-label no-padding-right">Enfermedades Cronicas <span class="required">*</span></label>
                <?php echo form_error('enfermedadCronica'); ?>


                <?php echo form_textarea( array( 'name' => 'enfermedadCronica', 'rows' => '5','class' =>'col-xs-10 col-sm-5', 'cols' => '80', 'value' => set_value('enfermedadCronica') ) )?>
              </div>
            </div>

          </div>
<!-- Registro Historial Social -->
          <div role="tabpanel" class="tab-pane" id="social">

            <div class="form-horizontal">
              <div class="form-group">
                      <label for="dependeDe" class="col-sm-3 control-label no-padding-right">Dependes economicamente de <span class="required">*</span></label>
                      <?php echo form_error('dependeDe'); ?>

                      <?php // Change the values in this array to populate your dropdown as required ?>
                      <?php $options = array(
                                                                ''  => 'Please Select',
                                                                'example_value1'    => 'example option 1'
                                                              ); ?>

                      <?php echo form_dropdown('dependeDe', $options, set_value('dependeDe'))?>
              </div>

              <div class="form-group">
                      <label for="viveCon" class="col-sm-3 control-label no-padding-right">Actualmente vives con <span class="required">*</span></label>
                      <?php echo form_error('viveCon'); ?>

                      <?php // Change the values in this array to populate your dropdown as required ?>
                      <?php $options = array(
                                                                ''  => 'Please Select',
                                                                'example_value1'    => 'example option 1'
                                                              ); ?>

                      <?php echo form_dropdown('viveCon', $options, set_value('viveCon'))?>
              </div>

              <div class="form-group">
                      <label for="ingresoFamiliarMensual" class="col-sm-3 control-label no-padding-right">Ingresos Familiares <span class="required">*</span></label>
                      <?php echo form_error('ingresoFamiliarMensual'); ?>
                      <input id="ingresoFamiliarMensual" type="text" name="ingresoFamiliarMensual" maxlength="6" value="<?php echo set_value('ingresoFamiliarMensual'); ?>"  />
              </div>

              <div class="form-group">
                      <label for="trabajo" class="col-sm-3 control-label no-padding-right">Tienes algun trabajo <span class="required">*</span></label>
                      <?php echo form_error('trabajo'); ?>

                      <?php // Change the values in this array to populate your dropdown as required ?>
                      <?php $options = array(
                                                                ''  => 'Please Select',
                                                                'example_value1'    => 'example option 1'
                                                              ); ?>

                      <?php echo form_dropdown('trabajo', $options, set_value('trabajo'))?>
              </div>

              <div class="form-group">
                      <label for="necesitaTrabajo" class="col-sm-3 control-label no-padding-right">Necesitas de ese trabajo <span class="required">*</span></label>
                <?php echo form_error('necesitaTrabajo'); ?>


                <?php echo form_textarea( array( 'name' => 'necesitaTrabajo', 'rows' => '5', 'class' =>'col-xs-10 col-sm-5', 'cols' => '80', 'value' => set_value('necesitaTrabajo') ) )?>
              </div>
              <div class="form-group">
                      <label for="causaTrabajo" class="col-sm-3 control-label no-padding-right">Cual es la causa <span class="required">*</span></label>
                <?php echo form_error('causaTrabajo'); ?>


                <?php echo form_textarea( array( 'name' => 'causaTrabajo', 'rows' => '5', 'class' =>'col-xs-10 col-sm-5', 'cols' => '80', 'value' => set_value('causaTrabajo') ) )?>
              </div>
            </div>
          </div>
<!-- Registro de Historial Academico -->
          <div role="tabpanel" class="tab-pane" id="academico">
            <div class="form-horizontal">

              <div class="form-group">
                      <label for="promedioPrimaria" class="col-sm-3 control-label no-padding-right">Promedio de la Primaria <span class="required">*</span></label>
                      <?php echo form_error('promedioPrimaria'); ?>
                      <input id="promedioPrimaria" type="text" name="promedioPrimaria" maxlength="2" value="<?php echo set_value('promedioPrimaria'); ?>" class="col-xs-10 col-sm-5"  />
              </div>

              <div class="form-group">
                      <label for="promedioSecundariParcialUno" class="col-sm-3 control-label no-padding-right">Promedio de Primer año de Secundaria <span class="required">*</span></label>
                      <?php echo form_error('promedioSecundariParcialUno'); ?>
                      <input id="promedioSecundariParcialUno" type="text" name="promedioSecundariParcialUno" maxlength="2" value="<?php echo set_value('promedioSecundariParcialUno'); ?>" class="col-xs-10 col-sm-5" />
              </div>

              <div class="form-group">
                      <label for="promedioSecundariParcialDos" class="col-sm-3 control-label no-padding-right">Promedio de Segundo año de Secundaria <span class="required">*</span></label>
                      <?php echo form_error('promedioSecundariParcialDos'); ?>
                      <input id="promedioSecundariParcialDos" type="text" name="promedioSecundariParcialDos" maxlength="2" value="<?php echo set_value('promedioSecundariParcialDos'); ?>" class="col-xs-10 col-sm-5" />
              </div>

              <div class="form-group">
                      <label for="promedioSecundariParcialTres" class="col-sm-3 control-label no-padding-right">Promedio de Tercer año de Secundaria <span class="required">*</span></label>
                      <?php echo form_error('promedioSecundariParcialTres'); ?>
                      <input id="promedioSecundariParcialTres" type="text" name="promedioSecundariParcialTres" maxlength="2" value="<?php echo set_value('promedioSecundariParcialTres'); ?>" class="col-xs-10 col-sm-5" />
              </div>

              <div class="form-group">
                      <label for="promedioCicloAnterior" class="col-sm-3 control-label no-padding-right">Promedio del Ciclo Anterior <span class="required">*</span></label>
                      <?php echo form_error('promedioCicloAnterior'); ?>
                      <input id="promedioCicloAnterior" type="text" name="promedioCicloAnterior" maxlength="2" value="<?php echo set_value('promedioCicloAnterior'); ?>" class="col-xs-10 col-sm-5" />
              </div>


              <div class="form-group">
                <div class="col-sm-3 control-label no-padding-right">
                  <?php echo form_submit( 'submit', 'Enviar', 'class="btn btn-primary"'); ?>
                </div>
              </div>
            </div>

            <?php echo form_close(); ?>
          </div>
        </div>

      </div>
		</div>
	</div>
</div>
