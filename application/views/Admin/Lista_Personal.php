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
		<div class="box box-primary box-solid">
            <div class="box-header with-border">
              <h3 class="box-title"><?php echo $titulo;?></h3>
            	<div class="box-tools pull-right">
                	<a href="Personal/Registrar_Personal" class="btn btn-box-tool btn-success">Nuevo Tutor</a>
              </div>
            </div>
            <div class="box-body">
							<div class="row">
								<div class="col-xs-12">
									<table id="tabla" class="table table-responsive">
										<thead>
											<tr>
												<th>Nombre</th>
												<th>E-Mail</th>
												<th>Privilegios</th>
												<th>Estado</th>
												<th>Control</th>
											</tr>
										</thead>
										<tbody>
											<?php foreach($arrTut as $Tut){ ?>
											<tr>
												<td>
												<?php echo $Tut['nombre']." ".$Tut['apellidoP']." ".$Tut['apellidoM'] ?>
													
												</td>
																								<td>
												<?php echo $Tut['email'];?>
												</td>
												<td>
													<?php switch ($Tut['privilegios']) {
														case '2':
															?> <button type="button" name="button" class="btn btn-warning">Administrador</button> <?php
															break;

														default:
															?> <button type="button" name="button" class="btn btn-primary">Tutor</button> <?php
															break;
													} ?>
												</td>
												<td>
													<?php switch ($Tut['estado']) {
														case '1':
															?> <button type="button" name="button" class="btn btn-success">Activo</button> <?php
															break;

														default:
															?> <button type="button" name="button" class="btn btn-default">Inactivo</button> <?php
															break;
													} ?>
												</td>
												<td>
												<form action="Personal/mod_Personal" method="POST">
												<input type="hidden" name="idTutor" id="idTutor" value="<?php echo $Tut['id'];?>">
												<button class="btn btn-primary">Editar Información</button>
												</form>
												</td>
											</tr>
											<?php } ?>
										</tbody>
									</table>
								</div>
							</div>
            </div>
		</div>
	</div>
</div>
