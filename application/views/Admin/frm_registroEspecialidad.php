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
			echo form_open('Especialidad/Registrar_Especialidad', $attributes); ?>                                        
			                        
			<div class="form-group">
			        <label for="nombre" class="col-sm-3 control-label no-padding-right">Nombre <span class="required">*</span></label>
			        <?php echo form_error('nombre'); ?>
			        <input id="nombre" type="text" name="nombre" maxlength="30" value="<?php echo set_value('nombre'); ?>" class="col-xs-10 col-sm-5" />
			</div>


			<div class="form-group">
				<div class="col-sm-3 control-label no-padding-right">
			        <?php echo form_submit( 'submit', 'Submit'); ?>					
				</div>
			</div>

			<?php echo form_close(); ?>
		</div>
	</div>
</div>