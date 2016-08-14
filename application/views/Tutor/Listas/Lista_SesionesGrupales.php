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
            	<div class="box-tools pull-right"> <!--
                	<a href="SesionGrupal/Registro_SesionGrupal" class="btn btn-box-tool btn-success">Registrar Nueva Sesión Grupal</a> -->
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
											<th>Opciones</th>
										</tr>
									</thead>
									<tbody>
										<?php foreach($arrSesG as $SG){ ?>
										<tr>
											<td><?php echo $SG->nombre; ?></td>
											<td><?php echo $SG->nombreGrupo; ?></td>
											<td><?php echo $SG->fecha; ?></td>
											<td class="center">
											<div class="btn-group">
												<button data-toggle="dropdown" class="btn btn-primary dropdown-toogle">
													Acciónes <i class="fa fa-angle-down icon-on-rigth"></i>
												</button>
													<ul class="dropdown-menu">
														<li><a data-toggle="modal" data-target="#myModal" onclick="detalles(<?php echo $SG->sesGrupId;?>);">Ver Detalles</a></li>
														<li><a href="<?php echo base_url();?>index.php/SesionGrupal/toExcel/<?php echo $SG->sesGrupId;?>">Generar Excel</a></li>
														<li><a href="<?php echo base_url();?>index.php/SesionGrupal/toXML/<?php echo $SG->sesGrupId;?>">Generar XML</a></li>
														<li class="divider"></li>
														<li><a onclick="eliminar(<?php echo $SG->sesGrupId?>);">Eliminar</a></li>
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
<!-- Modal -->
<div class="modal fade" id="myModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
  <div class="modal-dialog modal-lg" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
        <h4 class="modal-title" id="myModalLabel">Detalles de Canalización</h4>
      </div>
      <div class="modal-body">
       	<div id="detalles"></div>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-primary" data-dismiss="modal">Cerrar</button>
        <button type="button" class="btn btn-warning" onclick="guardar();">Guardar Cambios</button>
      </div>
    </div>
  </div>
</div>
<script>
	function detalles(id){
		$.post("<?php echo base_url();?>index.php/SesionGrupal/detalles", {id:id}, function(data){
			$("#detalles").html(data);
		});
	}
	function guardar(){
		var r = confirm("¡Cuidado!\nVas a actualizar un registro.\n¿Estas seguro?");
		if (r == true){

				var id = $("#id").val();
				var objetivo = $("#objetivo").val();
				var problematica = $("#problematica").val();
				var remediales = $("#remediales").val();
				var resultados = $("#resultados").val();
				var observaciones = $("#observaciones").val();
				var parametros = {
					"id":id,
					"objetivo":objetivo,
					"problematica":problematica,
					"remediales":remediales,
					"resultados":resultados,
					"observaciones":observaciones
				};
		        $.ajax({
		                data:  parametros,
		                url:   '<?php echo base_url();?>index.php/SesionGrupal/update',
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
		                		alert("Ocurrio un error en la comunicacion. \n Intente denuevo mas tarde.");
		                }

		        });
		    }else{
		    	$("#Modal").modal('hide');
		    }
	}

	function eliminar(id){
		r = confirm("¡Cuidado!\nVas a Eliminar un registro.\n¿Estas seguro?");
		if(r == true){
			$.post("<?php echo base_url();?>index.php/SesionGrupal/delete", {id:id});
		}else{
			alert("Cancelado");
		}
	}
</script>
