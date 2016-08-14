<?php if ($this->session->userdata('login_ok') == TRUE){ ?>

		<div id="navbar" class="navbar navbar-default navbar-fixed-top">
			<div class="navbar-container" id="navbar-container navbar-fixed">
				<div class="navbar-header pull-left">
					<a class="navbar-brand">
						<small>
							SCA
						</small>
					</a>
				</div>

				<div class="navbar-buttons pull-right" role="navigation">
					<ul class="nav ace-nav">
						<li class="light-blue">
							<a data-toggle="dropdown" href="#" class="dropdown-toggle">
								<img class="nav-user-photo" src="<?php echo base_url();?>imagenes/<?php echo $this->session->userdata('imagen');?>" alt="Jason's Photo" />
								<span class="user-info">
									<small>Biemvenido,</small>
									<?php echo $this->session->userdata('nombre'); ?>
								</span>

								<i class="ace-icon fa fa-caret-down"></i>
							</a>

							<ul class="user-menu dropdown-menu-right dropdown-menu dropdown-yellow dropdown-caret dropdown-close">

								<li>
									<a href="<?php echo base_url();?>index.php/Grupo/Mi_Grupo">
										<i class="ace-icon fa fa-group"></i>
										Mi Grupo
									</a>
								</li>

								<li class="divider"></li>

								<li>
									<a href="<?php echo base_url();?>index.php/Principal/logout">
										<i class="ace-icon fa fa-power-off"></i>
										Cerrar Sesión
									</a>
								</li>
							</ul>
						</li>
					</ul>
				</div>
			</div><!-- /.navbar-container -->
		</div>
<?php }?>
		<div class="main-container" id="main-container">
