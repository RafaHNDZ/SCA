<div class="page-content">
	<div class="row">
		<div class="box box-primary box-solid">
            <div class="box-header with-border">
              <h3 class="box-title"><?php echo $titulo;?></h3>
            	<div class="box-tools pull-right">
                	<a href="SesionPrivada/Registro_SesionPrivada" class="btn btn-box-tool btn-success">Registrar Nueva Sesión Privada</a>
              </div>
            </div>
            <div class="box-body">
				<div class="row">
					<div class="col-xs-12">
						<div class="row">
							<div class="col-xs-12">
								<table id="tabla" class="table table-striped table-bordered table-hover">
									<thead>
										<tr>
											<th>Nombre del Alumno</th>
											<th>Grupo</th>
											<th>Fecha</th>
										</tr>
									</thead>
									<tbody>
										<?php foreach($arrSesP as $SP){ ?>
										<tr>
											<td><?php echo $SP['nombreAlumno']; ?></td>
											<td><?php echo $SP['grupo']; ?></td>
											<td><?php echo $SP['fecha']; ?></td>
											<td class="center">
											<div class="btn-group">
												<button data-toggle="dropdown" class="btn btn-primary dropdown-toogle">
													Acciónes <i class="fa fa-angle-down icon-on-rigth"></i>
												</button>
													<ul class="dropdown-menu">
														<li><a href="">Action 1</a></li>
														<li><a href="">Action 2</a></li>
														<li><a href="">Action 3</a></li>
														<li class="divider"></li>
														<li><a href="">Action 4</a></li>
													</ul>
											</div>
											</td>
										</tr>
										<?php }?>
									</tbody>
								</table>
							</div>
						</div>
					</div>
				</div>
      </div>
		</div>
	</div>
</div>
