<?php if ($this->session->userdata('login_ok') == TRUE){ ?>
			<div class="main-content">
				<div class="main-content-inner">
					<div class="breadcrumbs breadcrumbs-fixed" id="breadcrumbs">
						<ul class="breadcrumb">
							<li>
								<i class="ace-icon fa fa-home home-icon"></i>
								<a href="<?php echo base_url();?>">Home</a>
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
								<table id="tabla" class="table table-responsive table-striped table-bordered table-hover">
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
													<a class="btn btn-warning" data-toggle="modal" data-target="#Modal" onclick="ver_detalles(<?php echo $Grupo['id']?>);"> Modificar </a>
													<a href="Grupo/del_Grupo/<?php echo $Grupo['id']?>" class="btn btn-danger"> Eliminar </a>
												</div>
												<div class="btn-group">
													<button data-toggle="dropdown" class="btn btn-primary dropdown-toggle" aria-expanded="true">
														Reportes
														<span class="ace-icon fa fa-caret-down icon-on-right"></span>
													</button>
														<ul class="dropdown-menu dropdown-warning">
															<li>
																<a href="<?php echo base_url();?>index.php/Grupo/toXML/<?php echo $Grupo['id']?>">Generar XML</a>
															</li>

															<li>
																<a href="<?php echo base_url();?>index.php/Grupo/toExcel/<?php echo $Grupo['id']?>">Generar Excel</a>
															</li>

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
                <div id="detalles"></div>
              </div>
              <div class="modal-footer">
                <button type="button" class="btn btn-primary pull-left" data-dismiss="modal">Cancelar</button>
                <button type="button" id="resultado" class="btn btn-warning" onclick="guardar();">Guardar Cambios</button>
              </div>
            </div>
            <!-- /.modal-content -->
          </div>
          <!-- /.modal-dialog -->
        </div>
        <!-- /.modal -->
      </div>
</div>
<script type="text/javascript">
	//alert("JS");
	function ver_detalles($id) {
		//saco el valor accediendo al id del input = nombre
		var id = $id;
		//alert(id);
			$.post("<?php echo base_url();?>index.php/Grupo/get_detalles", {id_grupo:id}, function(data){
				$("#detalles").html(data);
			});
		}

	function guardar(){
		var r = confirm("¡Cuidado!\nVas a actualizar un registro.\n¿Estas seguro?");
		if (r == true){

				var id = $("#idGrupo").val();
				var nombreGrupo = $("#nombre").val();
				var estado = $("#estado").val();
				var especialidad = $("#especialidad").val();
				var turno = $("#turno").val();
				var semestre = $("#semestre").val();
				var generacion = $("#generacion").val();
				var estado = $("#estado").val();
				var tutor = $("#tutor").val();

				var parametros = {
					"id_grupo":id,
					"nombreGrupo":nombreGrupo,
					"estado":estado,
					"especialidad":especialidad,
					"turno":turno,
					"semestre":semestre,
					"generacion":generacion,
					"estado":estado,
					"tutor":tutor
				};
		        $.ajax({
		                data:  parametros,
		                url:   '<?php echo base_url();?>index.php/Grupo/updateGrupo',
		                type:  'post',
		                beforeSend: function () {
		                        $("#resultado").html("Procesando, espere por favor...");
		                },
		                success:  function (response) {
		                        $("#resultado").html("Guardar Cambios");
		                        $("#Modal").modal('hide');
		                        location.reload();

		                },

		                error: function(response){
		                		$("#resultado").html("Guardar Cambios");
		                		alert("No se pudo actualizar el registro");
		                }

		        });
		    }else{
		    	$("#Modal").modal('hide');
		    }
	}
</script>
