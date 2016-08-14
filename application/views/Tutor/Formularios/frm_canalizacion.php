<?php if ($this->session->userdata('login_ok') == TRUE){ ?>
      <div class="main-content">
        <div class="main-content-inner">
          <div class="breadcrumbs breadcrumbs-fixed" id="breadcrumbs">
            <ul class="breadcrumb">
              <li>
                <i class="ace-icon fa fa-home home-icon"></i>
                <a href="<?php echo base_url();?>">Home</a>
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
      <?php
      if($idA == null){
      $id = $this->input->post('id');
      }else{
        $id = $idA;
      }
      if($id != null){
      $data = $this->Modelo_Alumno->get_alumno_data($id);
      foreach($data as $dato);
      $fecha = $dato['fechaNacimiento'];
      function calculaedad($fechanacimiento){
      	list($ano,$mes,$dia) = explode("-",$fechanacimiento);
      	$ano_diferencia  = date("Y") - $ano;
      	$mes_diferencia = date("m") - $mes;
      	$dia_diferencia   = date("d") - $dia;
      	if ($dia_diferencia < 0 || $mes_diferencia < 0)
      		$ano_diferencia--;
      	return $ano_diferencia;
      }
      $edad= calculaedad($fecha);
      $attributes = array('class' => 'form-horizontal', 'id' => '');
      echo form_open('Canalizacion/Registro_Canalizacion', $attributes); ?>

      <div class="form-group">
              <label for="fecha" class="col-sm-3 control-label no-padding-right">Fecha <span class="required">*</span></label>
              <?php echo form_error('fecha'); ?>
              <input readonly="readonly" id="fecha" type="text" name="fecha"  value="<?php echo date('Y-m-d');?>" class="col-xs-10 col-sm-5" />
      </div>

      <div class="form-group">
              <label for="numeroControl" class="col-sm-3 control-label no-padding-right">Numero de Control <span class="required">*</span></label>
              <?php echo form_error('numeroControl'); ?>
              <input readonly="readonly" id="numeroControl" type="text" name="numeroControl" maxlength="10" value="<?php echo $dato['matricula'];?>" class="col-xs-10 col-sm-5" />
              <?php echo form_error('numeroControl'); ?>
      </div>

      <div class="form-group">
              <label for="nombreAlumno" class="col-sm-3 control-label no-padding-right">Nombre del Alumno <span class="required">*</span></label>
              <?php echo form_error('nombreAlumno'); ?>
              <input readonly="readonly" id="nombreAlumno" type="text" name="nombreAlumno" maxlength="110" value="<?php echo $dato['nombre']." ".$dato['apellidoP']." ".$dato['apellidoM'];?>" class="col-xs-10 col-sm-5" />
              <?php echo form_error('nombreAlumno'); ?>
      </div>

      <div class="form-group">
        <label for="semestre" class="col-sm-3 control-label no-padding-right">Semestre <span class="required">*</span></label>

        <input readonly="readonly" class="col-xs-10 col-sm-5" type="text" name="semestre" value="<?php echo $dato['nombreSemestre']?>">
        <?php echo form_error('nombreSemestre'); ?>
      </div>

      <div class="form-group">
              <label for="edad" class="col-sm-3 control-label no-padding-right">Edad <span class="required">*</span></label>
              <input id="edad" type="text" name="edad" maxlength="2" value="<?php echo $edad ?>" class="col-xs-10 col-sm-5" />
              <?php echo form_error('edad'); ?>
      </div>

      <div class="form-group">
              <label for="nonbreTutor" class="col-sm-3 control-label no-padding-right">Nonbre del Tutor <span class="required">*</span></label>
              <?php echo form_error('nonbreTutor'); ?>
              <input readonly="readonly" id="nonbreTutor" type="text" name="nonbreTutor" maxlength="110" value="<?php echo $dato['nombreT']." ".$dato['tutAP']." ".$dato['tutAM']?>" class="col-xs-10 col-sm-5" />
              <?php echo form_error('nombreTutor'); ?>
      </div>

      <div class="form-group">
              <label  for="especialidad" class="col-sm-3 control-label no-padding-right">Especialidad <span class="required">*</span></label>
              <input readonly="reeadonly" type="text" name="especialidad" value="<?php echo $dato['nombreEspecialidad'];?>">
              <?php echo form_error('especialidad'); ?>
      </div>

      <div class="form-group">
              <label for="problematica" class="col-sm-3 control-label no-padding-right">Problematica <span class="required">*</span></label>
      	<?php echo form_error('problematica'); ?>


      	<?php echo form_textarea( array('required' => 'required', 'name' => 'problematica','class' => 'col-xs-10 col-sm-5', 'rows' => '5', 'cols' => '80', 'value' => set_value('problematica') ) )?>
      </div>
      <div class="form-group">
              <label for="servicio" class="col-sm-3 control-label no-padding-right">Servicio Solicitado <span class="required">*</span></label>
      	<?php echo form_error('servicio'); ?>


      	<?php echo form_textarea( array('required' => 'required', 'name' => 'servicio','class' => 'col-xs-10 col-sm-5', 'rows' => '5', 'cols' => '80', 'value' => set_value('servicio') ) )?>
      </div>
      <div class="form-group">
              <label for="observaciones" class="col-sm-3 control-label no-padding-right">Observaciones <span class="required">*</span></label>
      	<?php echo form_error('observaciones'); ?>


      	<?php echo form_textarea( array('required' => 'required', 'name' => 'observaciones','class' => 'col-xs-10 col-sm-5 limited','id' => 'limited', 'maxlength' => '200', 'rows' => '5', 'cols' => '80', 'value' => set_value('observaciones') ) )?>
      </div>
      <div class="form-group">
        <input type="hidden" name="alumno_id" value="<?php echo $dato['id']?>">
      </div>

      <div class="form-group">
				<div class="col-sm-3 control-label no-padding-right">
					<?php echo form_submit( 'submit', 'Enviar', 'class="btn btn-success"','id="enviar"'); ?>
				</div>
      </div>

      <?php echo form_close();
    }else{
      echo "Sin Datos";
    }?>
		</div>
	</div>
</div>
<script src="<?php echo base_url();?>assets/js/jquery.inputlimiter.1.3.1.min.js"></script>
<script type="text/javascript">
   $(document).ready(function() {
     $('textarea.limited').inputlimiter({
       limit: 200,
       remText: '%n caracteres%s restantes...',
       limitText: 'Maximo Permitido : %n.'
     });
   });
   $(function(){
     $('#limited').inputlimiter({
       limit:200
     });
   });
</script>
