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
		</div>
		<div class="col-xs-12">
			<?php // Change the css classes to suit your needs

			$attributes = array('class' => 'form-horizontal', 'id' => '');
			echo form_open('Grupo/Registrar_Grupo', $attributes); ?>

			<div class="form-group">
			        <label for="nombre" class="col-sm-3 control-label no-padding-right">Nombre <span class="required">*</span></label>
			        <?php echo form_error('nombre'); ?>
			        <input id="nombre" type="text" name="nombre" maxlength="40" value="<?php echo set_value('nombre'); ?>" class="col-xs-10 col-sm-5" required="required" />
			</div>

			<div class="form-group">
			        <label for="estado" class="col-sm-3 control-label no-padding-right">Estado <span class="required">*</span></label>
			        <?php echo form_error('estado'); ?>
			        <?php $options = array(
			                              ''  => 'Selecciona un Estado',
			                              '1'    => 'Activo',
																		'0' => 'Inactivo'
			                              ); ?>

			        <?php echo form_dropdown('estado', $options, set_value('estado'),'class="col-xs-10 col-sm-3"','required="required"')?>
			</div>

			<div class="form-group">
			        <label for="especialidad" class="col-sm-3 control-label no-padding-right">Especialidad <span class="required">*</span></label>
								<select name="especialidad" class="col-xs-10 col-sm-3" required="required">
									<option value="">Elije una Especialidad</option>
									<?php foreach($arrEsp as $Esp){ ?>
											<option value="<?php echo $Esp['id'] ?>"><?php echo $Esp['nombre'] ?></option>
										<?php } ?>
								</select>
			</div>

			<div class="form-group">
			        <label for="turno" class="col-sm-3 control-label no-padding-right">Turno <span class="required">*</span></label>
							<select class="col-xs-10 col-sm-3" name="turno" required="required">
								<option value="">Elije un Turno</option>
								<?php foreach($arrTur as $Tur){ ?>
										<option value="<?php echo $Tur['id'] ?>"><?php echo $Tur['nombreTurno'] ?></option>
									<?php } ?>
							</select>
			</div>

			<div class="form-group">
			        <label for="semestre" class="col-sm-3 control-label no-padding-right">Semestre <span class="required">*</span></label>
							<select class="col-xs-10 col-sm-3" name="semestre" required="required">
								<option value="">Elije un Semestre</option>
								<?php foreach($arrSem as $Sem){ ?>
										<option value="<?php echo $Sem['id'] ?>"><?php echo $Sem['nombreSemestre'] ?></option>
									<?php } ?>
							</select>
			</div>

			<div class="form-group">
			        <label for="Generacion" class="col-sm-3 control-label no-padding-right">Generacion <span class="required">*</span></label>
							<select class="col-xs-10 col-sm-3" name="generacion" required="required">
								<option value="">Elije una Generacion</option>
								<?php foreach($arrGen as $Gen){ ?>
										<option value="<?php echo $Gen['id'] ?>"><?php echo $Gen['nombre']?></option>
									<?php } ?>
							</select>
							<?php echo form_error('generacion'); ?>
			</div>

			<div class="form-group">
			        <label for="tutor" class="col-sm-3 control-label no-padding-right">Tutor <span class="required">*</span></label>
							<select class="col-xs-10 col-sm-3" name="tutor" required="required">
								<option value="">Elije un Tutor</option>
								<?php foreach($arrTut as $Tut){ ?>
										<option value="<?php echo $Tut['id'] ?>"><?php echo $Tut['nombre']." ".$Tut['apellidoP']." ".$Tut['apellidoM'] ?></option>
									<?php } ?>
							</select>

			</div>

			<div class="form-group">
				<div class="col-sm-3 control-label no-padding-right">
			        <?php echo form_submit( 'submit', 'Registrar','class="btn btn-primary"'); ?>
			    </div>
			</div>

			<?php echo form_close(); ?>
		</div>
	</div>
</div>
