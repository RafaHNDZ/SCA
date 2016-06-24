<div class="page-content">
	<div class="row">
		<div class="box box-primary box-solid">
            <div class="box-header with-border">
              <h3 class="box-title"><?php echo $titulo;?></h3>
            	<div class="box-tools pull-right">
                	<a href="Generacion/Registrar_Generacion" class="btn btn-box-tool btn-success">Registrar Nueva Generación</a>
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
											<th>Contról</th>
										</tr>
									</thead>
									<tbody>
									<?php foreach($arrGen as $Gen){ ?>
										<tr>
											<td><?php echo $Gen["nombre"]; ?></td>
											<td class="center">
											<a href="Generacion/del_Generacion/<?php echo $Gen['id']; ?>" class="btn btn-danger">Eliminar</a>
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
