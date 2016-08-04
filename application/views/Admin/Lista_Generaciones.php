<?php 
if ($this->session->userdata('login_ok') == TRUE){ ?>
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
											<th>Control</th>
										</tr>
									</thead>
									<tbody>
									<?php foreach($arrGen as $Gen){ ?>
										<tr>
											<td><?php echo $Gen["nombre"]; ?></td>
											<td class="center">
											<a href="Generacion/del_Generacion/<?php echo $Gen['id'];?>" class="btn btn-danger">Eliminar</a>
											<a data-toggle="modal" data-target="#Detalles" class="btn btn-warning" onclick="detalles(<?php echo $Gen['id'];?>)">Modificar</a>
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
<!-- Modal -->
<div class="modal fade" id="Detalles" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
        <h4 class="modal-title" id="myModalLabel">Modal title</h4>
      </div>
      <div class="modal-body">
        <div id="detalles"></div>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-default" data-dismiss="modal">Cerrar</button>
        <button type="button" id="resultado" class="btn btn-primary" onclick="guardar();">Guardar Cambios</button>
      </div>
    </div>
  </div>
</div>
<!-- JavaScript -->
<script>
	function detalles(id){
		//alert(id);
			$.post("<?php echo base_url();?>index.php/Generacion/get_detalles", {id_generacion:id}, function(data){
				$("#detalles").html(data);
			});
	}
	function guardar(){
		var r = confirm("¡Cuidado!\nVas a actualizar un registro.\n¿Estas seguro?");
		if (r == true){

				var id = $("#id").val();
				var nombre = $("#ciclo").val();

				var parametros = {
					"id":id,
					"nombre":nombre
				};
		        $.ajax({
		                data:  parametros,
		                url:   '<?php echo base_url();?>index.php/Generacion/updateGeneracion',
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
		                		alert("Ocurrio un error en la comunicacion.");
		                }

		        });
		    }else{
		    	$("#Modal").modal('hide');
		    }
	}
</script>
