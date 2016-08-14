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
											<th>Matricula</th>
											<th>Grupo</th>
											<th>Opciones</th>
											<th>Reporte</th>
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
														<li><a data-toggle="modal" data-target="#Medico" onclick="ver_hisMed(<?php echo $ficha['matricula']?>)">Ver Historial Medico</a></li>
														<li><a data-toggle="modal" data-target="#Economico" onclick="ver_hisEc(<?php echo $ficha['matricula']?>)">Ver Historial Social</a></li>
														<li class="divider"></li>
														<li><a onclick="deleteA(<?php echo $ficha['id']?>)">Eliminar</a></li>
													</ul>
											</div>
											</td>
											<td class="center">
											<div class="btn-group">
												<button data-toggle="dropdown" class="btn btn-primary dropdown-toogle">
													Reportes <i class="fa fa-angle-down icon-on-rigth"></i>
												</button>
													<ul class="dropdown-menu">
														<li><a href="<?php echo base_url()?>index.php/Alumno/toExcel/<?php echo $ficha['id']?>" >Generar Excel</a></li>
														<li><a href="<?php echo base_url()?>index.php/Alumno/toXML/<?php echo $ficha['id']?>" >Generar XML</a></li>
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
        <button type="button" class="btn btn-primary" data-dismiss="modal">Cerrar</button>
        <button type="button" class="btn btn-warning" onclick="guardarDetalles()">Guardar Cambios</button>
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
        <button type="button" class="btn btn-primary" data-dismiss="modal">Cerrar</button>
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
        <button type="button" class="btn btn-primary" data-dismiss="modal">Cerrar</button>
        <button type="button" class="btn btn-warning" id="btnHA" onclick="guardar_HA()">Guardar Cambios</button>
      </div>
    </div>
  </div>
</div>

<div class="modal fade" id="Medico" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
  <div class="modal-dialog modal-lg" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
        <h4 class="modal-title" id="myModalLabel">Historial Medico</h4>
      </div>
      <div class="modal-body">
       	<div id="detallesMed"></div>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-primary" data-dismiss="modal">Cerrar</button>
        <button type="button" class="btn btn-warning" id="btnHM" onclick="guardar_HM()">Guardar Cambios</button>
      </div>
    </div>
  </div>
</div>

<div class="modal fade" id="Economico" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
  <div class="modal-dialog modal-lg" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
        <h4 class="modal-title" id="myModalLabel">Historial Social</h4>
      </div>
      <div class="modal-body">
       	<div id="detallesEc"></div>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-primary" data-dismiss="modal">Cerrar</button>
        <button type="button" class="btn btn-warning" id="btnHE" onclick="guardar_HE()">Guardar Cambios</button>
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

	function guardarDetalles(){
		var r = confirm("¡Cuidado!\nVas a actualizar un registro.\n¿Estas seguro?");
		if (r == true){
				var id = $("#id").val();
				var nombre = $("#nombre").val();
				var apellidoP = $("#apellidoP").val();
				var apellidoM = $("#apellidoM").val();
				var fechaNacimiento = $("#fechaNacimiento").val();
				var matricula = $("#matricula").val();
				var telefono = $("#telefono").val();
				var calle = $("#calle").val();
				var numero = $("#numero").val();
				var colonia = $("#colonia").val();
				var codigoPostal = $("#codigoPostal").val();
				var idDireccion = $("#idDireccion").val();

				var parametros = {
					"id":id,
					"nombre":nombre,
					"apellidoP":apellidoP,
					"apellidoM":apellidoM,
					"fechaNacimiento":fechaNacimiento,
					"matricula":matricula,
					"telefono":telefono,
					"idDireccion":idDireccion,
					"calle":calle,
					"numero":numero,
					"colonia":colonia,
					"codigoPostal":codigoPostal,
					"alumno_id":matricula
				};
		        $.ajax({
		                data:  parametros,
		                url:   '<?php echo base_url();?>index.php/Alumno/update',
		                type:  'post',
		                beforeSend: function () {
		                        $("#resultado").html("Procesando, espere por favor...");
		                },
		                success:  function (response) {
		                        $("#resultado").html("Guardar Cambios");

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

	function guardar_HA(){
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

	function ver_hisMed(id){
		$.post("<?php echo base_url();?>index.php/Alumno/getHistorialMD", {id_alumno:id}, function(data){
			$("#detallesMed").html(data);
		});
	}

	function guardar_HM(){
		var r = confirm("¡Cuidado!\nVas a actualizar un registro.\n¿Estas seguro?");
		if (r == true){

				var id = $("#id").val();
				var enfermedades = $("#enfermedades").val();
				var tratamiento = $("#tratamiento").val();
				var tratamientoAnterior = $("#tratamientoAnterior").val();
				var tipoTratamiento = $("#tipoTratamiento").val();
				var hospitalizacion = $("#hospitalizacion").val();
				var motivoHospitalizacion = $("#motivoHospitalizacion").val();
				var operaciones = $("#operaciones").val();
				var motivoOperacion = $("#motivoOperacion").val();
				var padeceEnfermedad = $("#padeceEnfermedad").val();
				var enfermedadCronica = $("#enfermedadCronica").val();

				var parametros = {
					"id":id,
					"enfermedades":enfermedades,
					"tratamiento":tratamiento,
					"tratamientoAnterior":tratamientoAnterior,
					"tipoTratamiento":tipoTratamiento,
					"hospitalizacion":hospitalizacion,
					"motivoHospitalizacion":motivoHospitalizacion,
					"operaciones":operaciones,
					"motivoOperacion":motivoOperacion,
					"padeceEnfermedad":padeceEnfermedad,
					"enfermedadCronica":enfermedadCronica
				};
						$.ajax({
										data:  parametros,
										url:   '<?php echo base_url();?>index.php/HistorialMedico/updateHistorial',
										type:  'post',
										beforeSend: function () {
														$("#resultado").html("Procesando, espere por favor...");
										},
										success:  function (response) {
														$("#resultado").html("Guardar Cambios");
														$("#Modal").modal('hide');


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

	function ver_hisEc(id){
		$.post("<?php echo base_url();?>index.php/Alumno/getHistorialEC", {id_alumno:id}, function(data){
			$("#detallesEc").html(data);
		});
	}

	function guardar_HE(){
		var r = confirm("¡Cuidado!\nVas a actualizar un registro.\n¿Estas seguro?");
		if (r == true){

				var id = $("#id").val();
				var viveCon = $("#viveCon").val();
				var ingresoFamiliarMensual = $("#ingresoFamiliarMensual").val();
				var trabajo = $("#trabajo").val();
				var necesitaTrabajo = $("#necesitaTrabajo").val();
				var causaTrabajo = $("#causaTrabajo").val();

				var parametros = {
					"id":id,
					"viveCon":viveCon,
					"ingresoFamiliarMensual":ingresoFamiliarMensual,
					"trabajo":trabajo,
					"necesitaTrabajo":necesitaTrabajo,
					"causaTrabajo":causaTrabajo
				};
						$.ajax({
										data:  parametros,
										url:   '<?php echo base_url();?>index.php/HistorialEconomico/updateHistorial',
										type:  'post',
										beforeSend: function () {
														$("#resultado").html("Procesando, espere por favor...");
										},
										success:  function (response) {
														$("#resultado").html("Guardar Cambios");
														$("#Modal").modal('hide');


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

	function deleteA(id){
		var r = confirm("¡Cuidado!\nVas a BORRAR los datos de este alumno.\n¿Estas seguro?");
		if(r == true){
		$.post("<?php echo base_url();?>index.php/Alumno/delete", {id_alumno:id});
		location.reload();
		}else{

		}
	}
</script>
