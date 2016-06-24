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
												<th>Privilegios</th>
												<th>Estado</th>
											</tr>
										</thead>
										<tbody>
											<?php foreach($arrTut as $Tut){ ?>
											<tr>
												<td><?php echo $Tut['nombre']." ".$Tut['apellidoP']." ".$Tut['apellidoM'] ?></td>
												<td>
													<?php switch ($Tut['privilegios']) {
														case '1':
															?> <button type="button" name="button" class="btn btn-warning">Administrador</button> <?php
															break;

														default:
															?> <button type="button" name="button" class="btn btn-primary">Tutor</button> <?php
															break;
													} ?>
												</td>
												<td>
													<?php switch ($Tut['estado']) {
														case '2':
															?> <button type="button" name="button" class="btn btn-success">Activo</button> <?php
															break;

														default:
															?> <button type="button" name="button" class="btn btn-default">Inactivo</button> <?php
															break;
													} ?>
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
