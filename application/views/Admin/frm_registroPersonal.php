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
								<a href="../Personal">Lista de Tutores</a>
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
	<div class="page-header">
		<h1 class="box-title"><?php echo $titulo; ?></h1>
	</div>
	<div class="row">
		<div class="col-xs-12">
			<?php // Change the css classes to suit your needs
		$id = $this->input->post('idTutor');
		if($id == null){
			$attributes = array('class' => 'form-horizontal', 'id' => '');
			echo form_open('Personal/Registrar_Personal', $attributes); ?>

			<div class="form-group">
			        <label for="nombre" class="col-sm-3 control-label no-padding-right">Nombre <span class="required">*</span></label>
							<div class="col-sm-9">
			        <input required="required" id="nombre" onkeyup="valid_nombre();" type="text" name="nombre" maxlength="30" value="<?php echo set_value('nombre'); ?>" class="col-xs-10 col-sm-5" />
							<?php echo form_error('nombre'); ?>
						</div>
			</div>

			<div class="form-group">
			        <label for="apellido_paterno" class="col-sm-3 control-label no-padding-right">Apellido Paterno <span class="required">*</span></label>
							<div class="col-sm-9">
			        <input required="required" id="apellido_paterno" onkeyup="valid_apelidoP();" type="text" name="apellido_paterno" maxlength="40" value="<?php echo set_value('apellido_paterno'); ?> "class="col-xs-10 col-sm-5"  />
							<?php echo form_error('apellido_paterno'); ?>
						</div>
			</div>

			<div class="form-group">
			        <label for="apellido_materno" class="col-sm-3 control-label no-padding-right">Apellido Materno <span class="required">*</span></label>
							<div class="col-sm-9">
			        <input required="required" id="apellido_materno" onkeyup="valid_apelidoM();" type="text" name="apellido_materno" maxlength="40" value="<?php echo set_value('apellido_materno'); ?> "class="col-xs-10 col-sm-5"  />
			        <?php echo form_error('apellido_materno'); ?>
						</div>
			</div>

			<div class="form-group">
			        <label for="privilegios" class="col-sm-3 control-label no-padding-right">Privilegios <span class="required">*</span></label>
			        <?php // Change the values in this array to populate your dropdown as required ?>
			        <?php $options = array(
			                                                  ''  => 'Selecciona un Estado',
			                                                  '1'    => 'Activo',
			                                                  '0' => 'Inactivo'
			                                                ); ?>

			        <?php echo form_dropdown('privilegios', $options, set_value('privilegios'),'class="col-xs-10 col-sm-3"','required="required"')?>
							<?php echo form_error('privilegios'); ?>
			</div>

			<div class="form-group">
			        <label for="estado" class="col-sm-3 control-label no-padding-right">Estado <span class="required">*</span></label>
			        <?php // Change the values in this array to populate your dropdown as required ?>
			        <?php $options = array(
			                                                  ''  => 'Selecciona los Privilegios',
			                                                  '1'    => 'Tutor',
			                                                  '2' => 'Administrador'
			                                                ); ?>

			        <br /><?php echo form_dropdown('estado', $options, set_value('estado'),'required="required"','class="col-xs-10 col-sm-3"')?>
							<?php echo form_error('estado'); ?>
			</div>

			<div class="form-group">
			        <label for="email" class="col-sm-3 control-label no-padding-rigth">Email <span class="required">*</span></label>
							<div class="col-sm-9">
			        <input required="required" id="email" onkeyup="valid_email();" type="text" name="email" maxlength="40" value="<?php echo set_value('email'); ?>" class="col-xs-10 col-sm-5"  />
							<?php echo form_error('email'); ?>
						</div>
			</div>

			<div class="form-group">
			        <label for="password" class="col-sm-3 control-label no-padding-right">Contraseña <span class="required">*</span></label>
							<div class="col-sm-9">
			        <input required="required" id="password" onkeyup="valid_pass();" type="password" name="password" maxlength="30" value="<?php echo set_value('password'); ?> "class="col-xs-10 col-sm-5"  />
							<?php echo form_error('password'); ?>
						</div>
			</div>


			<div class="form-group">
				<div class="col-sm-3 control-label no-padding-right">
			        <?php echo form_submit( 'submit', 'Registrar', 'class = "btn btn-primary"','id="enviar"','onclick="validar();"'); ?>
				</div>
			</div>

			<?php echo form_close();
			}else{

// FOrmulario de Actualización de Datos de Tutor
			foreach($arrTut as $Dato)
			$attributes = array('class' => 'form-horizontal', 'id' => '', 'enctype' => 'multipart/form-data');
			echo form_open('Personal/mod_Personal', $attributes); ?>

			<div class="form-group">
					<input type="hidden" name="idTutor" value="<?php echo $Dato['id'];?>">
			        <label for="nombre" class="col-sm-3 control-label no-padding-right">Nombre <span class="required">*</span></label>
							<div class="col-sm-9">
			        <input required="required" id="nombre" type="text" name="nombre" maxlength="30" value="<?php echo $Dato['nombre'] ?>" class="col-xs-10 col-sm-5" />
							<?php echo form_error('nombre'); ?>
						</div>
			</div>

			<div class="form-group">
			        <label for="apellido_paterno" class="col-sm-3 control-label no-padding-right">Apellido Paterno <span class="required">*</span></label>
							<div class="col-sm-9">
			        <input required="required" id="apellido_paterno" type="text" name="apellido_paterno" maxlength="40" value="<?php echo $Dato['apellidoP']; ?> "class="col-xs-10 col-sm-5"  />
							<?php echo form_error('apellido_paterno'); ?>
						</div>
			</div>

			<div class="form-group">
			        <label for="apellido_materno" class="col-sm-3 control-label no-padding-right">Apellido Materno <span class="required">*</span></label>
							<div class="col-sm-9">
			        <input required="required" id="apellido_materno" type="text" name="apellido_materno" maxlength="40" value="<?php echo $Dato['apellidoM'];?> "class="col-xs-10 col-sm-5"  />
			        <?php echo form_error('apellido_materno'); ?>
						</div>
			</div>
			<div class="form-group">
				<label for="imagen" class="col-sm-3 control-label no-padding-right">Imagen a Subir:</label>
				<div class="col-sm-9">
					<input type="file" name="imagen" id="imagen">
				</div>
			</div>
			<div class="form-group">
			        <label for="privilegios" class="col-sm-3 control-label no-padding-right">Privilegios <span class="required">*</span></label>

			        <?php
			        	switch ($Dato['privilegios']) {
			        		case '1':
			        						$options = array(
			                                                  '1'    => 'Tutor',
			                                                  '2' => 'Administrador'
			                                                  );
			        			break;

			        		case '2':
			        						$options = array(
			                                                  '2' => 'Administrador',
			                                                  '1'    => 'Tutor'
			                                                  );
			        			break;
			        	}
			                                                 ?>
			        <?php echo form_dropdown('privilegios', $options, set_value('privilegios'),'class="col-xs-10 col-sm-3"','required="required"')?>
							<?php echo form_error('privilegios'); ?>
			</div>

			<div class="form-group">
			        <label for="estado" class="col-sm-3 control-label no-padding-right">Estado <span class="required">*</span></label>
			        <?php
			        	switch ($Dato['estado']) {
			        		case '1':
			        						$options = array(
			                                                  '1'    => 'Activo',
			                                                  '0' => 'Inactivo'
			                                                );
			        			break;

			        		default:
			        						$options = array(
			                                                  '0' => 'Inactivo',
			                                                  '1'    => 'Activo'
			                                                );
			        			break;
			        	}

			        ?>
			        <br /><?php echo form_dropdown('estado', $options, set_value('estado'),'class="col-xs-10 col-sm-3"','required="required"')?>
							<?php echo form_error('estado'); ?>
			</div>

			<div class="form-group">
			        <label for="email" class="col-sm-3 control-label no-padding-rigth">Email <span class="required">*</span></label>
							<div class="col-sm-9">
			        <input required="required" id="email" type="text" name="email" maxlength="40" class="col-xs-10 col-sm-5" value="<?php echo $Dato['email'];?>"/>
							<?php echo form_error('email'); ?>
						</div>
			</div>

			<div class="form-group">
			        <label for="password" class="col-sm-3 control-label no-padding-right">Contraseña <span class="required">*</span></label>
							<div class="col-sm-9">
			        <input required="required" id="password" type="text" name="password" maxlength="30" class="col-xs-10 col-sm-5" value="<?php echo $Dato['password']?>" />
							<?php echo form_error('password'); ?>
						</div>
			</div>


			<div class="form-group">
				<div class="col-sm-3 control-label no-padding-right">
			        <?php echo form_submit( 'submit', 'Actualizar', 'class = "btn btn-success"'); ?>
				</div>
			</div>

			<?php echo form_close();
				}	?>
		</div>
	</div>
</div>
<script>

	function valid_nombre(){
		var nombre = $("#nombre").val();
		if(nombre.length >= 30){
			$("#nombre").css("border-color", "#F60E0E");
		}else{
			$("#nombre").css("border-color", "");
		}
		if(nombre.length <= 0){
			$("#nombre").css("border-color", "#F60E0E");
		}
	};
	function valid_apelidoP(){
		var apeP = $("#apellido_paterno").val();
		if(apeP.length >= 30){
			$("#apellido_paterno").css("border-color", "#F60E0E");
		}else{
			$("#apellido_paterno").css("border-color", "");
		}
		if(apeP.length <= 0){
			$("#apellido_paterno").css("border-color", "#F60E0E");
		}
	};
	function valid_apelidoM(){
		var apeM = $("#apellido_materno").val();
		if(apeM.length >= 30){
			$("#apellido_materno").css("border-color", "#F60E0E");
		}else{
			$("#apellido_materno").css("border-color", "");
		}
		if(apeM.length <= 0){
			$("#apellido_materno").css("border-color", "#F60E0E");
		}
	};
	function valid_email(){
		var email = $("#email").val();
		if(email.length >= 30){
			$("#email").css("border-color", "#F60E0E");
		}else{
			$("#email").css("border-color", "");
		}
		if(email.length <= 0){
			$("#email").css("border-color", "#F60E0E");
		}
	};
	function valid_pass(){
		var pass = $("#password").val();
		if(pass.length >= 30){
			$("#password").css("border-color", "#F60E0E");
		}else{
			$("#password").css("border-color", "");
		}
		if(pass.length <= 0){
			$("#password").css("border-color", "#F60E0E", "box-shadow", "2px 2px 5px #999");
		}
	};

</script>
