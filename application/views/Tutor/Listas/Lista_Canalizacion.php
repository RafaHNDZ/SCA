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
                	<a href="Canalizacion/Registro_Canalizacion" class="btn btn-box-tool btn-success">Registrar Nueva Canalizacion</a> -->
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
											<th>Fecha</th>
											<th>Nombre Alumno</th>
											<th>Nombre del Tutor</th>
											<th>Opciones</th>
										</tr>
									</thead>
									<tbody>
										<?php foreach($arrCan as $can){ 
											$id= $can['id'];?>
										<tr>
											<td><?php echo $can['fecha']; ?></td>
											<td><?php echo $can['nombreAlumno']; ?></td>
											<td><?php echo $can['nombreTutor']?></td>
											<td class="center">
											<div class="btn-group">
												<button data-toggle="dropdown" class="btn btn-primary dropdown-toogle">
													Acciónes <i class="fa fa-angle-down icon-on-rigth"></i>
												</button>
													<ul class="dropdown-menu">
														<li><a data-toggle="modal" data-target="#myModal" onclick="detalles(<?php echo $id?>);">Modificar</a></li>
														<li><a href="<?php echo base_url();?>index.php/Canalizacion/toXML/<?php echo $can['id']?>">Generar XML</a></li>
														<li><a href="<?php echo base_url();?>index.php/Canalizacion/toExcel/<?php echo $can['id']?>">Generar Excel</a></li>
														<li class="divider"></li>
														<li><a onclick="del(<?php echo $can['id'];?>)">Eliminar</a></li>
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
		//alert(id);
			$.post("<?php echo base_url();?>index.php/Canalizacion/get_detalles", {id:id}, function(data){
				$("#detalles").html(data);
			});
	}
	function guardar(){
		var r = confirm("¡Cuidado!\nVas a actualizar un registro.\n¿Estas seguro?");
		if (r == true){

				var id = $("#id").val();
				var numeroControl = $('#numeroControl').val();
				var nombreAlumno = $('#nombreAlumno').val();
				var semestre = $('#semestre').val();
				var edad = $('#edad').val();
				var nombreTutor = $('#nombreTutor').val();
				var especialidad = $('#especialidad').val();
				var problematica = $('#problematica').val();
				var solicitud = $('#solicitud').val();
				var observaciones = $('#observaciones').val();
				var parametros = {
					"id":id,
					"numeroControl":numeroControl,
					"nombreAlumno":nombreAlumno,
					"semestre":semestre,
					"edad":edad,
					"nombreTutor":nombreTutor,
					"especialidad":especialidad,
					"problematica":problematica,
					"solicitud":solicitud,
					"observaciones":observaciones,
					"parametros":parametros
				};
		        $.ajax({
		                data:  parametros,
		                url:   '<?php echo base_url();?>index.php/Canalizacion/update',
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
		                		alert("Ocurrio un error en la comunicacion.");
		                }

		        });
		    }else{
		    	$("#Modal").modal('hide');
		    }
	}

	function del(id){
		var res = $.post("<?php echo base_url();?>index.php/Canalizacion/delete", {id:id});
		location.reload();
	}
</script>