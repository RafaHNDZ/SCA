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
                	<a href="Grupo/Registrar_Grupo" class="btn btn-box-tool btn-success">Nuevo Grupo</a>
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
											<th>Estado</th>
											<th>Especialidad</th>
											<th>Turno</th>
											<th>Semestre</th>
											<th>Tutor</th>
											<th>Generación</th>
											<th>Acciones</th>
										</tr>
									</thead>
									<tbody>
								<?php foreach($arrGrup as $Grupo){?>
										<tr>
											<td><?php echo $Grupo['grup'] ?></td>
											<td>
												<?php switch ($Grupo['estado']) {
													case '1':
														?> <button type="button" name="button" class="btn btn-success"> Activo </button> <?php
														break;

													default:
														?> <button type="button" name="button" class="btn btn-danger"> Inactivo </button> <?php
														break;
												} ?>
											</td>
											<td><?php echo $Grupo['esp'] ?></td>
											<td><?php echo $Grupo['nombreTurno'] ?></td>
											<td><?php echo $Grupo['nombreSemestre'] ?></td>
											<td><?php echo $Grupo['tut']." ".$Grupo['apellidoP']." ".$Grupo['apellidoM'] ?></td>
											<td><?php echo $Grupo['generacion'] ?></td>
											<td>
												<div class="btn-group">
													<a href="#" class="btn btn-warning" data-toggle="modal" data-target="#Modal"> Modificar </a>
													<a href="Grupo/del_Grupo/<?php echo $Grupo['id']?>" class="btn btn-danger"> Eliminar </a>
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
	<div class="">
        <div class="modal fade" id="Modal">
          <div class="modal-dialog">
            <div class="modal-content">
              <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                  <span aria-hidden="true">×</span></button>
                <h4 class="modal-title">Actualizar Registro</h4>
              </div>
              <div class="modal-body">
                <p></p>
              </div>
              <div class="modal-footer">
                <button type="button" class="btn btn-default pull-left" data-dismiss="modal">Cancelar</button>
                <button type="button" class="btn btn-primary">Guardar Cambios</button>
              </div>
            </div>
            <!-- /.modal-content -->
          </div>
          <!-- /.modal-dialog -->
        </div>
        <!-- /.modal -->
      </div>
</div>
