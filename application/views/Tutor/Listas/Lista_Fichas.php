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
                	<a href="Alumno/Regitrar_Ficha" class="btn btn-box-tool btn-success">Nueva Ficha de Alumno</a>
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
											<th>Nombre Alumno</th>
											<th>Fecha de Nacimiento</th>
											<th>Telefono</th>
											<th>Matricula</th>
											<th>Grupo</th>
											<th>Opciones</th>
										</tr>
									</thead>
									<?php if($arrFicha == null){ ?>
										<h4>Sin registros</h4>
									<?php }else{?>
									<tbody>
										<?php foreach($arrFicha as $ficha){ ?>
										<tr>
											<td><?php echo $ficha['nombre']." ".$ficha['apellidoP']." ".$ficha['apellidoM']; ?></td>
											<td><?php echo $ficha['fechaNacimiento'] ?></td>
											<td><?php echo $ficha['telefono'] ?></td>
											<td><?php echo $ficha['matricula'] ?></td>
											<td><?php echo $ficha['nombreGrupo'] ?></td>
											<td class="center">
											<div class="btn-group">
												<button data-toggle="dropdown" class="btn btn-primary dropdown-toogle">
													Opciones <i class="fa fa-angle-down icon-on-rigth"></i>
												</button>
													<ul class="dropdown-menu">
														<li><a data-toggle="modal" data-target="#Detalles" onclick="ver_detalles(<?php echo $ficha['id']?>)">Ver Detalles del Alumno</a></li>
														<li><a data-toggle="modal" data-target="#Familiar" onclick="ver_hisFam(<?php echo $ficha['matricula']?>)">Ver Historial Familiar</a></li>
														<li><a data-toggle="modal" data-target="#Academico" onclick="ver_hisAc(<?php echo $ficha['matricula']?>)">Ver Historial Academico</a></li>
														<li><a href="">Ver Historial Medico</a></li>
														<li><a href="">Ver Historial Social</a></li>
														<li class="divider"></li>
														<li><a href="">Action 4</a></li>
													</ul>
											</div>
											</td>
										</tr>
										<?php }?>
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
<!-- Modal -->
<div class="modal fade" id="Detalles" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
  <div class="modal-dialog modal-lg" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
        <h4 class="modal-title" id="myModalLabel">Ver Detalles</h4>
      </div>
      <div class="modal-body">
       	<div id="detalles"></div>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-primary" data-dismiss="modal">Close</button>
        <button type="button" class="btn btn-warning">Guardar Cambios</button>
      </div>
    </div>
  </div>
</div>

<div class="modal fade" id="Familiar" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
  <div class="modal-dialog modal-lg" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
        <h4 class="modal-title" id="myModalLabel">Historial Familiar</h4>
      </div>
      <div class="modal-body">
       	<div id="detallesF"></div>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-primary" data-dismiss="modal">Close</button>
        <button type="button" class="btn btn-warning" onclick="guardar_HF()">Guardar Cambios</button>
      </div>
    </div>
  </div>
</div>

<div class="modal fade" id="Academico" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
  <div class="modal-dialog modal-lg" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
        <h4 class="modal-title" id="myModalLabel">Historial Academico</h4>
      </div>
      <div class="modal-body">
       	<div id="detallesAc"></div>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-primary" data-dismiss="modal">Close</button>
        <button type="button" class="btn btn-warning" onclick="guardar_HA()">Guardar Cambios</button>
      </div>
    </div>
  </div>
</div>
<!-- JavaScript -->
<script src="<?php echo base_url();?>assets/js/jquery.inputlimiter.1.3.1.min.js"></script>
<script src="<?php echo base_url();?>assets/js/jquery-ui.custom.min.js"></script>

<script>
	function ver_detalles(id){
		event.preventDefault();
		//alert(id);
			$.post("<?php echo base_url();?>index.php/Alumno/alumno_data", {id_alumno:id}, function(data){
				$("#detalles").html(data);
			});
	}

	function ver_hisFam(id){
			$.post("<?php echo base_url();?>index.php/Alumno/getHistorial", {id_alumno:id}, function(data){
				$("#detallesF").html(data);
			});
	}

	function guardar_HF(){
		var r = confirm("¡Cuidado!\nVas a actualizar un registro.\n¿Estas seguro?");
		if (r == true){

				var id = $("#id").val();
				var situacionesFamiliares = $("#situacionesFamiliares").val();
				var integrantes = $("#integrantes").val();
				var lugar = $("#lugar").val();
				var relacion = $("#relacion").val();
				var alumno_id = $("#alumno_id").val();

				var parametros = {
					"id_hHF":id,
					"situacionesFamiliares":situacionesFamiliares,
					"integrantes":integrantes,
					"lugar":lugar,
					"relacion":relacion,
					"alumno_id":alumno_id
				};
		        $.ajax({
		                data:  parametros,
		                url:   '<?php echo base_url();?>index.php/HistorialFamiliar/updateHistorial',
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

	function guardar_HF(){
		var r = confirm("¡Cuidado!\nVas a actualizar un registro.\n¿Estas seguro?");
		if (r == true){

				var id = $("#id").val();
				var promedioPrimaria = $("#promedioPrimaria").val();
				var promedioSecundariParcialUno = $("#promedioSecundariParcialUno").val();
				var promedioSecundariParcialDos = $("#promedioSecundariParcialDos").val();
				var promedioSecundariParcialTres = $("#promedioSecundariParcialTres").val();
				var promedioCicloAnterior = $("#promedioCicloAnterior").val();

				var parametros = {
					"id":id,
					"promedioPrimaria":promedioPrimaria,
					"promedioSecundariParcialUno":promedioSecundariParcialUno,
					"promedioSecundariParcialDos":promedioSecundariParcialDos,
					"promedioSecundariParcialTres":promedioSecundariParcialTres,
					"promedioCicloAnterior":promedioCicloAnterior
				};
						$.ajax({
										data:  parametros,
										url:   '<?php echo base_url();?>index.php/HistorialAcademico/updateHistorial',
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

	function ver_hisAc(id){
			$.post("<?php echo base_url();?>index.php/Alumno/getHistorialAC", {id_alumno:id}, function(data){
				$("#detallesAc").html(data);
			});
	}
</script>
