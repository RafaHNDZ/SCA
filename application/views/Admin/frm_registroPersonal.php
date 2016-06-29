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
	<div class="page-header">
		<h1 class="box-title"><?php echo $titulo; ?></h1>
	</div>
	<div class="row">
		<div class="col-xs-12">
			<?php // Change the css classes to suit your needs

			$attributes = array('class' => 'form-horizontal', 'id' => '');
			echo form_open('Personal/Registrar_Personal', $attributes); ?>

			<div class="form-group">
			        <label for="nombre" class="col-sm-3 control-label no-padding-right">Nombre <span class="required">*</span></label>
							<div class="col-sm-9">
			        <input required="required" id="nombre" type="text" name="nombre" maxlength="30" value="<?php echo set_value('nombre'); ?>" class="col-xs-10 col-sm-5" />
							<?php echo form_error('nombre'); ?>
						</div>
			</div>

			<div class="form-group">
			        <label for="apellido_paterno" class="col-sm-3 control-label no-padding-right">Apellido Paterno <span class="required">*</span></label>
							<div class="col-sm-9">
			        <input required="required" id="apellido_paterno" type="text" name="apellido_paterno" maxlength="40" value="<?php echo set_value('apellido_paterno'); ?> "class="col-xs-10 col-sm-5"  />
							<?php echo form_error('apellido_paterno'); ?>
						</div>
			</div>

			<div class="form-group">
			        <label for="apellido_materno" class="col-sm-3 control-label no-padding-right">Apellido Materno <span class="required">*</span></label>
							<div class="col-sm-9">
			        <input required="required" id="apellido_materno" type="text" name="apellido_materno" maxlength="40" value="<?php echo set_value('apellido_materno'); ?> "class="col-xs-10 col-sm-5"  />
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

			        <br /><?php echo form_dropdown('estado', $options, set_value('estado'),'class="col-xs-10 col-sm-3"','required="required"')?>
							<?php echo form_error('estado'); ?>
			</div>

			<div class="form-group">
			        <label for="email" class="col-sm-3 control-label no-padding-rigth">Email <span class="required">*</span></label>
							<div class="col-sm-9">
			        <input required="required" id="email" type="text" name="email" maxlength="40" value="<?php echo set_value('email'); ?>" class="col-xs-10 col-sm-5"  />
							<?php echo form_error('email'); ?>
						</div>
			</div>

			<div class="form-group">
			        <label for="password" class="col-sm-3 control-label no-padding-right">Contraseña <span class="required">*</span></label>
							<div class="col-sm-9">
			        <input required="required" id="password" type="password" name="password" maxlength="30" value="<?php echo set_value('password'); ?> "class="col-xs-10 col-sm-5"  />
							<?php echo form_error('password'); ?>
						</div>
			</div>


			<div class="form-group">
				<div class="col-sm-3 control-label no-padding-right">
			        <?php echo form_submit( 'submit', 'Registrar', 'class = "btn btn-primary"'); ?>
				</div>
			</div>

			<?php echo form_close(); ?>
		</div>
	</div>
</div>
