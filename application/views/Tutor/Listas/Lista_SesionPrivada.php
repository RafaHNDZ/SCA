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
											<th>Detalles</th>
										</tr>
									</thead>
									<tbody>
										<?php foreach($arrSesP as $SP){ ?>
										<tr>
											<td><?php echo $SP['nombreAlumno']; ?></td>
											<td><?php echo $SP['nombreGrupo']; ?></td>
											<td><?php echo $SP['fecha']; ?></td>
											<td class="center">
											<div class="btn-group">
												<button class="btn btn-success" name="ver_detalles" id="ver_detalles" data-toggle="modal" data-target="#myModal" onClick="ver_detalles(<?php echo $SP['idSesPri']?>);">Ver Detalles</button>
												<a type="button" class="btn btn-primary" href="<?php echo base_url();?>index.php/SesionPrivada/toExcel/<?php echo $SP['idSesPri']?>"><i class="ace-icon fa fa-file-excel-o" aria-hidden="true"></i>Generar Excel</a>
												<a type="button" class="btn btn-primary" href="<?php echo base_url();?>index.php/SesionPrivada/toXML/<?php echo $SP['idSesPri']?>"><i class="ace-icon fa fa-download" aria-hidden="true"></i>Generar XML</a>
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
		<!-- Modal -->
		<div class="modal fade" id="myModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
		  <div class="modal-dialog modal-lg" role="document">
		    <div class="modal-content">
		      <div class="modal-header">
		        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
		        <h4 class="modal-title" id="myModalLabel">Detalles de la Sesión</h4>
		      </div>
		      <div class="modal-body" id="detalles"></div>
		      <div class="modal-footer">
		        <button type="button" class="btn btn-danger" data-dismiss="modal">Cerrar</button>
		        <button type="post" id="resultado" class="btn btn-primary" onclick="guardar()"><i class=" ace-icon fa fa-floppy-o" aria-hidden="true"></i>Guardar Cambios</button>
		      </div>
		    </div>
		  </div>
		</div>
	</div>
</div>
<!-- JavaScript -->
<script type="text/javascript">
	//alert("JS");
	function ver_detalles($id) {
		//saco el valor accediendo al id del input = nombre
		var id = $id;
		//alert(id);
			$.post("<?php echo base_url();?>index.php/SesionPrivada/get_detalles", {id_sesion:id}, function(data){
				$("#detalles").html(data);
			});
		}

	function guardar(){
		var id = $("#idSesion").val();
		var seguimiento = $("#seguimiento").val();
		var resultados = $("#resultados").val();
		var observaciones = $("#observaciones").val();

		var parametros = {
			"id_sesion":id,
			"seguimiento":seguimiento,
			"resultados":resultados,
			"observaciones":observaciones
		};
        $.ajax({
                data:  parametros,
                url:   '<?php echo base_url();?>index.php/SesionPrivada/updateSesion',
                type:  'post',
                beforeSend: function () {
                        $("#resultado").html("Procesando, espere por favor...");
                },
                success:  function (response) {
                        $("#resultado").html("Guardar Cambios");
                        alert("Actualizado");
                        $('#myModal').modal('hide');
                },

                error: function(response){
                		alert("No se pudo actualizar el registro");
                }

        });
	}
</script>
