<div class="page-content">
	<div class="row">
		<div class="col-xs-12">
			<div class="main-content">
				<div class="row">
					<div class="col-sm-10 col-sm-offset-1">
						<div class="login-container">
							<div class="center">
								<h1>
									<i class="ace-icon fa fa-leaf green"></i>
									<span class="red">SCA</span>
									<span class="white" id="id-text2">Applicación</span>
								</h1>
								<h4 class="blue" id="id-company-text">&copy; Webs MX</h4>
							</div>

							<div class="space-6"></div>

							<div class="position-relative">
								<div id="login-box" class="login-box visible widget-box">
									<div class="widget-body">
										<div class="widget-main">
											<h4 class="header blue lighter bigger">
												<i class="ace-icon fa fa-coffee green"></i>
												Introduce tu información
											</h4>

											<div class="space-6"></div>

											<?php echo form_open('Principal/inicio_sesion'); ?>
												<fieldset>
													<label class="block clearfix">
														<span class="required"></span>
														<span class="block input-icon input-icon-right">
															<?php echo form_error('email'); ?>
															<input type="email" class="form-control" placeholder="Correo" name="email" autocomplete="on" value="<?php echo set_value('email'); ?>" required="required"/>
															<i class="ace-icon fa fa-envelope"></i>
														</span>
													</label>

													<label class="block clearfix"><span class=""></span>
														<span class="block input-icon input-icon-right required">
															<?php echo form_error('password'); ?>
															<input type="password" class="form-control" placeholder="Contraseña" name="password" required="required"/>
															<i class="ace-icon fa fa-lock"></i>
														</span>
													</label>

													<div class="space"></div>

													<div class="clearfix">
														<button type="submit" class="width-35 pull-right btn btn-sm btn-primary">
															<i class="ace-icon fa fa-key"></i>
															<span class="bigger-110">Entrar</span>
														</button>
													</div>

													<div class="space-4"></div>
												</fieldset>
											<?php echo form_close(); ?>
											<?php if($alerta == TRUE){
												echo "<script> notificacion(); </script>";
											} ?>
											<div class="space-6"></div>
										</div><!-- /.widget-main -->

									</div><!-- /.widget-body -->
								</div><!-- /.login-box -->

							</div><!-- /.position-relative -->
						</div>
					</div><!-- /.col -->
				</div><!-- /.row -->
			</div><!-- /.main-content -->
		</div><!-- /.col -->
	</div><!-- /.row -->
</div><!-- /.page-content -->
