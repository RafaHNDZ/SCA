<div class="page-content">
	<div class="row">
		<div class="box box-primary box-solid">
            <div class="box-header with-border">
              <h3 class="box-title"><?php echo $titulo;?></h3>
            	<div class="box-tools pull-right">
                	<a href="Semestre/Registrar_Semestre" class="btn btn-box-tool btn-success">Registrar Nuevo Semestre</a>
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
														<th>Nombre</th>
														<th>Control</th>
													</tr>
												</thead>
												<tbody>
											<?php foreach($arrSem as $Sem){ ?>
													<tr>
														<td><?php echo $Sem['nombreSemestre'] ?></td>
														<td class="center">
														<a href="Semestre/del_Semestre/<?php echo $Sem['id']; ?>" class="btn btn-danger">Eliminar</a>
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
	</div>
</div>
