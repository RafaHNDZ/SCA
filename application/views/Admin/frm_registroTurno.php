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
			echo form_open('Turno/Registrar_Turno', $attributes); ?>

			<div class="form-group">
			        <label for="nombreTurno" class="col-sm-3 control-label no-padding-right">Nombre <span class="required">*</span></label>
			        <input id="nombreTurno" type="text" name="nombreTurno" maxlength="20" value="<?php echo set_value('nombreTurno'); ?>" class="col-xs-10 col-sm-5" />
			        <?php echo form_error('nombreTurno'); ?>
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