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