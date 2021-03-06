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
                <a href="../Alumno">Lista de Alumnos</a>
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
            $attributes = array('class' => 'form-horizontal', 'id' => '', 'enctype' => 'multipart/form-data');
            echo form_open('Alumno/Regitrar_Ficha', $attributes); ?>

            <div class="form-group">
                    <label for="nombre" class="col-sm-3 control-label no-padding-right">Nombre <span class="required">*</span></label>
                    <?php echo form_error('nombre'); ?>
                    <input placeholder="Coloca aqui tu(s) nombre(s)" id="nombre" type="text" name="nombre" maxlength="30" value="<?php echo set_value('nombre'); ?>" class="col-xs-10 col-sm-5" />
            </div>

            <div class="form-group">
                    <label for="apellidoP" class="col-sm-3 control-label no-padding-right">Apellido Paterno <span class="required">*</span></label>
                    <?php echo form_error('apellidoP'); ?>
                    <input placeholder="Coloca aqui tu primer apellido" id="apellidoP" type="text" name="apellidoP" maxlength="40" value="<?php echo set_value('apellidoP'); ?>" class="col-xs-10 col-sm-5" />
            </div>

            <div class="form-group">
                    <label for="apellidoM" class="col-sm-3 control-label no-padding-right">Apellido Materno <span class="required">*</span></label>
                    <?php echo form_error('apellidoM'); ?>
                    <input placeholder="Coloca aqui tu segudo apellido" id="apellidoM" type="text" name="apellidoM" maxlength="40" value="<?php echo set_value('apellidoM'); ?>" class="col-xs-10 col-sm-5" />
            </div>
            <div class="form-group">
            <label for="imagen" class="ace-file-input"></label>
              <div class="col-sm-5">
                <input type="file" name="imagen" value="imagen" class="" id="id-input-file-2">
              </div>
            </div>
            <div class="form-group">
                    <label for="fechaNacimiento" class="col-sm-3 control-label no-padding-right">Fecha de Nacimiento</label>
                    <?php echo form_error('fechaNacimiento'); ?>
                    <input id="fechaNacimiento" type="date" name="fechaNacimiento"  value="<?php echo set_value('fechaNacimiento'); ?>" class="col-xs-10 col-sm-5" />
            </div>

            <div class="form-group">
                    <label for="telefono" class="col-sm-3 control-label no-padding-right">Telefono <span class="required">*</span></label>
                    <?php echo form_error('telefono'); ?>
                    <input placeholder="Coloca aqui tu numero telefonico" id="telefono" type="text" name="telefono" maxlength="10" value="<?php echo set_value('telefono'); ?>" class="col-xs-10 col-sm-5" />
            </div>

            <div class="form-group">
                    <label for="matricula" class="col-sm-3 control-label no-padding-right">Matricula <span class="required">*</span></label>
                    <?php echo form_error('matricula'); ?>
                    <input placeholder="Coloca aqui tu numero de matricula" id="matricula" type="text" name="matricula"  value="<?php echo set_value('matricula'); ?>" class="col-xs-10 col-sm-5" />
            </div>

            <div class="form-group">
                    <label for="grupo" class="col-sm-3 control-label no-padding-right">Grupo <span class="required">*</span></label>
                    <?php echo form_error('grupo'); ?>
                    <select name="grupo" id="grupo" class="col-xs-10 col-sm-2">
                          <option value="">Selecciona una Opcion</option>
                      <?php foreach($arrGrupo as $Grupo){ ?>
                          <option value="<?php echo $Grupo['id']?>"><?php echo $Grupo['grup']?></option>
                          option
                      <?php } ?>
                    </select>
            </div>

<!-- Formulario de Direccion ............................................................................................................ -->

            <div class="form-group">
                    <label for="calle" class="col-sm-3 control-label no-padding-right">Calle <span class="required">*</span></label>
                    <?php echo form_error('calle'); ?>
                    <input placeholder="Coloca en nombre de tu calle aqui" id="calle" type="text" name="calle" maxlength="45" value="<?php echo set_value('calle'); ?>" class="col-xs-10 col-sm-5" />
            </div>

            <div class="form-group">
                    <label for="numero" class="col-sm-3 control-label no-padding-right">Numero <span class="required">*</span></label>
                    <?php echo form_error('numero'); ?>
                    <input placeholder="Coloca el numero de tu casa aqui" id="numero" type="text" name="numero" maxlength="5" value="<?php echo set_value('numero'); ?>" class="col-xs-10 col-sm-5" />
            </div>

            <div class="form-group">
                    <label for="colonia" class="col-sm-3 control-label no-padding-right">Colonia <span class="required">*</span></label>
                    <?php echo form_error('colonia'); ?>
                    <input placeholder="Coloca el nombre de tu colonia aqui" id="colonia" type="text" name="colonia" maxlength="45" value="<?php echo set_value('colonia'); ?>" class="col-xs-10 col-sm-5" />
            </div>

            <div class="form-group">
                    <label for="codigoPostal" class="col-sm-3 control-label no-padding-right">Codigo Postal<span class="required">*</span></label>
                    <?php echo form_error('codigoPostal'); ?>
                    <input placeholder="Coloca el codigo postal de tu zona" id="codigoPostal" type="text" name="codigoPostal" maxlength="6" value="<?php echo set_value('codigoPostal'); ?>" class="col-xs-10 col-sm-5" />
            </div>


            <div class="form-group" class="col-sm-3 control-label no-padding-right">

            </div>

          </div>
          <div role="tabpanel" class="tab-pane" id="familiar">

            <div class="form-horizontal">
              <div class="form-group">
                      <label for="situacionesFamiliares" class="col-sm-3 control-label no-padding-right">Situaciones Familiares <span class="required">*</span></label>
                <?php echo form_error('situacionesFamiliares'); ?>


                <?php echo form_textarea( array( 'name' => 'situacionesFamiliares','class' => 'col-xs-10 col-sm-5 limited', 'rows' => '5', 'cols' => '80', 'value' => set_value('situacionesFamiliares') ) )?>
              </div>
              <div class="form-group">
                      <label for="integrantes" class="col-sm-3 control-label no-padding-right">Integrantes de tu familia <span class="required">*</span></label>
                <?php echo form_error('integrantes'); ?>


                <?php echo form_textarea( array( 'name' => 'integrantes', 'rows' => '5' ,'class'=>'col-xs-10 col-sm-5 limited', 'cols' => '80', 'value' => set_value('integrantes') ) )?>
              </div>
              <div class="form-group">
                      <label for="lugar" class="col-sm-3 control-label no-padding-right">Lugar que ocupas en la familia <span class="required">*</span></label>
                      <?php echo form_error('lugar'); ?>
                      <?php $options = array(
                                             ''  => 'Selecciona una Opcion',
                                             '1'    => 'Soy el hijo mayor',
                                             '2'    => 'Soy el hijo mediano',
                                             '3'    => 'Soy el hijo más joven'
                                             ); ?>

                      <?php echo form_dropdown('lugar', $options, set_value('lugar') ,'class="col-xs-10 col-sm-3"')?>
              </div>

              <div class="form-group" class="col-sm-3 control-label no-padding-right">
                      <label for="relacionPaterna" class="col-sm-3 control-label no-padding-right">Como calificas la relacion con tus padres <span class="required">*</span></label>
                      <?php echo form_error('relacionPaterna'); ?>
                      <?php $options = array(
                                             ''  => 'Selecciona una Opcion',
                                             '1'    => 'Muy Buena',
                                             '2'    => 'Buena',
                                             '3'    => 'Regular',
                                             '4'    => 'Mala',
                                             '5'    => 'Muy Mala'
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


                <?php echo form_textarea( array( 'name' => 'enfermedades', 'rows' => '5', 'class' =>'col-xs-10 col-sm-5 limited', 'cols' => '80', 'value' => set_value('enfermedades') ) )?>
              </div>
              <div class="form-group">
                      <label for="tratamiento" class="col-sm-3 control-label no-padding-right">¿Recibes algun tipo de tratamiento? <span class="required">*</span></label>
                      <?php echo form_error('tratamiento'); ?>

                      <?php $options = array(
                                             ''  => 'Elije una Opcion',
                                             '1' => 'Si',
                                             '2' => 'No'
                                             ); ?>

                      <?php echo form_dropdown('tratamiento', $options, set_value('tratamiento'),'class="col-xs-10 col-sm-3"')?>
              </div>

              <div class="form-group">
                      <label for="tratamientoAnterior" class="col-sm-3 control-label no-padding-right">Tratamientos Anteriores <span class="required">*</span></label>
                <?php echo form_error('tratamientoAnterior'); ?>


                <?php echo form_textarea( array( 'name' => 'tratamientoAnterior', 'rows' => '5','class' =>'col-xs-10 col-sm-5 limited', 'cols' => '80', 'value' => set_value('tratamientoAnterior') ) )?>
              </div>
              <div class="form-group">
                      <label for="tipoTratamiento" class="col-sm-3 control-label no-padding-right">Tipo de Tratamiento <span class="required">*</span></label>
                <?php echo form_error('tipoTratamiento'); ?>


                <?php echo form_textarea( array( 'name' => 'tipoTratamiento', 'rows' => '5','class' =>'col-xs-10 col-sm-5 limited', 'cols' => '80', 'value' => set_value('tipoTratamiento') ) )?>
              </div>
              <div class="form-group">
                      <label for="hospitalizacion" class="col-sm-3 control-label no-padding-right">Has tenido alguna Hospitalización <span class="required">*</span></label>
                      <?php echo form_error('hospitalizacion'); ?>
                      <?php $options = array(
                                             ''  => 'Elije una Opcion',
                                             '1' => 'Si',
                                             '2' => 'No'
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
                      <?php $options = array(
                                             ''  => 'Elije una Opcion',
                                             '1' => 'Si',
                                             '2' => 'No'
                                             ); ?>
                      <?php echo form_dropdown('operaciones', $options, set_value('operaciones'))?>
              </div>

              <div class="form-group">
                      <label for="motivoOperacion" class="col-sm-3 control-label no-padding-right">Motivo <span class="required">*</span></label>
                <?php echo form_error('motivoOperacion'); ?>


                <?php echo form_textarea( array( 'name' => 'motivoOperacion', 'rows' => '5','class' =>'col-xs-10 col-sm-5 limited', 'cols' => '80', 'value' => set_value('motivoOperacion') ) )?>
              </div>
              <div class="form-group">
                      <label for="padeceEnfermedad" class="col-sm-3 control-label no-padding-right">Enfermedad <span class="required">*</span></label>
                <?php echo form_error('padeceEnfermedad'); ?>


                <?php echo form_textarea( array( 'name' => 'padeceEnfermedad', 'rows' => '5','class' =>'col-xs-10 col-sm-5 limited', 'cols' => '80', 'value' => set_value('padeceEnfermedad') ) )?>
              </div>
              <div class="form-group">
                      <label for="enfermedadCronica" class="col-sm-3 control-label no-padding-right">Enfermedades Cronicas <span class="required">*</span></label>
                <?php echo form_error('enfermedadCronica'); ?>


                <?php echo form_textarea( array( 'name' => 'enfermedadCronica', 'rows' => '5','class' =>'col-xs-10 col-sm-5 limited', 'cols' => '80', 'value' => set_value('enfermedadCronica') ) )?>
              </div>
            </div>

          </div>
<!-- Registro Historial Social -->
          <div role="tabpanel" class="tab-pane" id="social">

            <div class="form-horizontal">
              <div class="form-group">
                      <label for="dependeDe" class="col-sm-3 control-label no-padding-right">Dependes economicamente de <span class="required">*</span></label>
                      <?php $options = array(
                                             ''  => 'Elije una Opcion',
                                             '1' => 'Mis padres',
                                             '2' => 'De mi mismo'
                                             ); ?>
                      <?php echo form_dropdown('dependeDe', $options, set_value('dependeDe'))?>
                      <?php echo form_error('dependeDe'); ?>
              </div>

              <div class="form-group">
                      <label for="viveCon" class="col-sm-3 control-label no-padding-right">Actualmente vives con <span class="required">*</span></label>
                      <?php $options = array(
                                             ''  => 'Elije una Opcion',
                                             '1' => 'Mi madre',
                                             '2' => 'Mi padre',
                                             '3' => 'Ambos',
                                             '4' => 'Otros parientes'
                                             ); ?>
                      <?php echo form_dropdown('viveCon', $options, set_value('viveCon'))?>
                      <?php echo form_error('viveCon'); ?>
              </div>

              <div class="form-group">
                      <label for="ingresoFamiliarMensual" class="col-sm-3 control-label no-padding-right">Ingresos Familiares <span class="required">*</span></label>
                      <input class="col-xs-10 col-sm-5" id="ingresoFamiliarMensual" type="text" name="ingresoFamiliarMensual" maxlength="6" value="<?php echo set_value('ingresoFamiliarMensual'); ?>"  />
                      <?php echo form_error('ingresoFamiliarMensual'); ?>
              </div>

              <div class="form-group">
                      <label for="trabajo" class="col-sm-3 control-label no-padding-right">Tienes algun trabajo <span class="required">*</span></label>
                      <?php $options = array(
                                             ''  => 'Elije una Opcion',
                                             '1' => 'Si',
                                             '2' => 'No'
                                             ); ?>
                      <?php echo form_dropdown('trabajo', $options, set_value('trabajo'))?>
                      <?php echo form_error('trabajo'); ?>
              </div>

              <div class="form-group">
                      <label for="necesitaTrabajo" class="col-sm-3 control-label no-padding-right">Necesitas de ese trabajo <span class="required">*</span></label>
                <?php echo form_error('necesitaTrabajo'); ?>


                <?php echo form_textarea( array( 'name' => 'necesitaTrabajo', 'rows' => '5', 'class' =>'col-xs-10 col-sm-5 limited', 'cols' => '80', 'value' => set_value('necesitaTrabajo') ) )?>
              </div>
              <div class="form-group">
                      <label for="causaTrabajo" class="col-sm-3 control-label no-padding-right">Cual es la causa <span class="required">*</span></label>
                <?php echo form_error('causaTrabajo'); ?>


                <?php echo form_textarea( array( 'name' => 'causaTrabajo', 'rows' => '5', 'class' =>'col-xs-10 col-sm-5 limited', 'cols' => '80', 'value' => set_value('causaTrabajo') ) )?>
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
<script src="<?php echo base_url();?>assets/js/jquery.inputlimiter.1.3.1.min.js"></script>
<script>
  $(document).ready(function() {
    $('textarea.limited').inputlimiter({
      limit: 200,
      remText: '%n caracteres%s restantes...',
      limitText: 'Maximo Permitido : %n.'
    });
  });
</script>
