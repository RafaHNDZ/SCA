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
              <h3 class="box-title">Grupo "X"</h3>
            	<div class="box-tools pull-right">
                	<a href="../../Alumno/Regitrar_Ficha" class="btn btn-box-tool btn-success">Registrar Nuevo Alumno</a>
              </div>
            </div>
            <div class="box-body">
		         <div class="row">
            <?php
        if($alumnos != null){
             foreach($alumnos as $alumno){ ?>
		           <div class="col-xs-12 col-sm-4 col-md-3 col-lg-2">
		            <div class="box box-primary box-solid">
		              <div class="box-header with-border">
		                <h4 class="box-title"><?php echo $alumno['nombre']." ".$alumno['apellidoP']." ".$alumno['apellidoM']; ?></h4>
		              </div>
		              <div class="box-body">
		                <img class="img-responsive img-thumbnail center" src="<?php echo base_url();?>/assets/avatars/profile-pic.jpg" alt="100%" width="100%">
		              </div>
		              <div class="separator"></div>
		              <p class="center">Matricula: <?php echo $alumno['matricula']; ?></p>
		              <div class="box-footer center">
						<div class="btn-group">
							<button data-toggle="dropdown" class="btn btn-primary dropdown-toggle"> Opciones: </button>
							<button data-toggle="dropdown" class="btn btn-primary dropdown-toggle">
								<i class="ace-icon fa fa-angle-down icon-only"></i>
							</button>
								<ul class="dropdown-menu dropdown-default">
									<li>
										<a href="../../Canalizacion/Registro_Canalizacion/<?php echo $alumno['id']; ?>">Generar Canalización</a>
									</li>
									<li>
										<a href="../../SesionPrivada/Registro_SesionPrivada/<?php echo $alumno['id']; ?>">Generar Entrevista Individual</a>
									</li>
									<li>
										<div class="divider"></div>
									</li>
									<li>
										<a href="" class="btn btn-danger btn-sm">Registrar a Baja</a>
									</li>
								</ul>
						</div>
		              </div>
		            </div>
		           </div>
		      <?php }
		      }else{ ?>
		      	<div class="callout callout-warning">
                <h4>I am a warning callout!</h4>

                <p>This is a yellow callout.</p>
              </div>
		      <?php	} ?>
		         </div>
      </div>
		</div>
	</div>
</div>
