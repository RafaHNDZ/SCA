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
							<button type="button" class="btn btn-primary btn-sm" data-toggle="modal" data-target="#myModal">
							  Ver Calendario
							</button>
						</div><!-- /.nav-search -->
					</div>
<?php } ?>

<?php 
	$ng =0;
	foreach($numGrupos as $g){
		$ng++;
	}

	$na =0;
	foreach($numAlumnos as $a){
		$na++;
	}
	$nt =0;
	foreach($numTutores as $t){
		$nt++;
	} ?>
<div class="page-content">
	<div class="row">
		<div class="page-header">
			<h1>Panel de Contról</h1>
		</div>
        <div class="col-xs-12">
          <div class="box box-primary box-solid">
            <div class="box-header with-border">
              <h3 class="box-title"><span class="fa fa-tasks"></span> Información del Sistema</h3>

              <div class="box-tools pull-right">
                <button type="button" class="btn btn-box-tool btn-primary" data-widget="collapse"><i class="fa fa-minus"></i>
                </button>
              </div>
            </div>
            <div class="box-body">
				<div class="row">
					<div class="col-xs-6 col-sm-6 col-md-4 col-lg-3">
						<div class="small-box bg-aqua">
							<div class="inner">
								<h3><?php echo $na ?></h3>
								<p>Alumnos Registrados</p>
							</div>
							<div class="icon">
								<i class="ion ion-person-add"></i>
							</div>
							<a href="Alumno" class="small-box-footer">
								 Más Información <i class="fa fa-arrow-circle-right"></i>
							</a>
						</div>
					</div>
					<div class="col-xs-6 col-sm-6 col-md-4 col-lg-3">
						<div class="small-box bg-aqua">
							<div class="inner">
								<h3><?php echo $ng ?></h3>
								<p>Grupos Registrados</p>
							</div>
							<div class="icon">
								<i class="ion ion-ios-people"></i>
							</div>
							<a href="Grupo" class="small-box-footer">
								 Más Información <i class="fa fa-arrow-circle-right"></i>
							</a>
						</div>
					</div>
					<div class="col-xs-6 col-sm-6 col-md-4 col-lg-3">
						<div class="small-box bg-aqua">
							<div class="inner">
								<h3><?php echo $nt ?></h3>
								<p>Tutores del Sistema</p>
							</div>
							<div class="icon">
								<i class="fa fa-graduation-cap"></i>
							</div>
							<a href="Personal" class="small-box-footer">
								 Más Información <i class="fa fa-arrow-circle-right"></i>
							</a>
						</div>
					</div>
					<div class="col-xs-6 col-sm-6 col-md-4 col-lg-3">
						<div class="small-box bg-orange">
							<div class="inner">
								<h3>20</h3>
								<p>Canalizaciones Registradas</p>
							</div>
							<div class="icon">
								<i class="fa fa-hdd-o"></i>
							</div>
							<a href="Canalizacion" class="small-box-footer">
								 Mas Información <i class="fa fa-arrow-circle-right"></i>
							</a>
						</div>
					</div>
					<div class="col-xs-12 col-sm-6 col-md-4 col-lg-3">
						<div class="info-box bg-red">
							<span class="info-box-icon">
								<i class="fa fa-exclamation"></i>
							</span>
							<div class="info-box-content">
								<span class="info-box-text">Canalizaciones</span>
								<span class="info-box-number">12,00</span>
								<div class="progress">
									<div class="progress-bar" style="width:70%"></div>
								</div>
								<span class="progress-description">
									<a href="SesionGrupal" class="small-box-footer white text-center">
										 Más Información <i class="fa fa-arrow-circle-right"></i>
									</a>
								</span>
							</div>
						</div>
					</div>
					<div class="col-xs-12 col-sm-6 col-md-4 col-lg-3">
						<div class="info-box bg-yellow">
							<span class="info-box-icon">
								<i class="fa fa-exclamation"></i>
							</span>
							<div class="info-box-content">
								<span class="info-box-text">Grupos Canalizados</span>
								<span class="info-box-number">12,00</span>
								<div class="progress">
									<div class="progress-bar" style="width:70%"></div>
								</div>
								<span class="progress-description">
									<a href="SesionGrupal" class="small-box-footer white text-center">
										 Más Información <i class="fa fa-arrow-circle-right"></i>
									</a>
								</span>
							</div>
						</div>
					</div>
					<div class="col-xs-12 col-sm-6 col-md-4 col-lg-3">
						<div class="info-box bg-blue">
							<span class="info-box-icon">
								<i class="fa fa-pencil-square-o"></i>
							</span>
							<div class="info-box-content">
								<span class="info-box-text">Entrevistas Grupales</span>
								<span class="info-box-number">12,00</span>
								<div class="progress">
									<div class="progress-bar" style="width:70%"></div>
								</div>
								<span class="progress-description">
									<a href="SesionGrupal" class="small-box-footer white text-center">
										 Más Información <i class="fa fa-arrow-circle-right"></i>
									</a>
								</span>
							</div>
						</div>
					</div>
					<div class="col-xs-12 col-sm-6 col-md-4 col-lg-3">
						<div class="info-box bg-green">
							<span class="info-box-icon">
								<i class="fa fa-check"></i>
							</span>
							<div class="info-box-content">
								<span class="info-box-text">Sesiónes de Tutoreo</span>
								<span class="info-box-number">12,00</span>
								<div class="progress">
									<div class="progress-bar" style="width:70%"></div>
								</div>
								<span class="progress-description">
									<a href="SesionGrupal" class="small-box-footer white text-center">
										 Más Información <i class="fa fa-arrow-circle-right"></i>
									</a>
								</span>
							</div>
						</div>
					</div>
				</div>
            </div><!-- box-body -->
          </div><!-- box -->
        </div>
<!-- Segundo Panel -->
        <div class="col-xs-12">
          <div class="box box-primary box-solid">
            <div class="box-header with-border">
              <h3 class="box-title"><span class="fa fa-check"><i></i></span> Control de Usuarios y Grupos</h3>

              <div class="box-tools pull-right">
                <button type="button" class="btn btn-box-tool btn-primary" data-widget="collapse"><i class="fa fa-minus"></i>
                </button>
              </div>
            </div>
            <div class="box-body">
				<div class="row">
			        <div class="col-xs-12 col-sm-6 col-md-6 col-lg-3">
			        <a href="Personal">
			          <div class="info-box">
			            <span class="info-box-icon bg-aqua"><i class="fa fa-user"></i></span>
			            <div class="info-box-content">
			              <span class="info-box-text">Tutor</span>
			              <span class="info-box-text">Control de Personal</span>
			            </div>
			          </div>
			        </a>
			        </div>
			        <div class="col-xs-12 col-sm-6 col-md-6 col-lg-3">
			        <a href="Grupo">
			          <div class="info-box">
			            <span class="info-box-icon bg-aqua"><i class="fa fa-users"></i></span>
			            <div class="info-box-content">
			              <span class="info-box-text">Grupos</span>
			              <span class="info-box-text">Control de Grupos</span>
			            </div>
			          </div>
			        </a>
			        </div>
			        <div class="col-xs-12 col-sm-6 col-md-6 col-lg-3">
			        <a href="Generacion">
			          <div class="info-box">
			            <span class="info-box-icon bg-aqua"><i class="fa fa-calendar"></i></span>
			            <div class="info-box-content">
			              <span class="info-box-text">Generaciónes</span>
			              <span class="info-box-text">Control de Generaciónes</span>
			            </div>
			          </div>
			        </a>
			        </div>
			        <div class="col-xs-12 col-sm-6 col-md-6 col-lg-3">
			        <a href="Especialidad">
			          <div class="info-box">
			            <span class="info-box-icon bg-aqua"><i class="fa fa-graduation-cap"></i></span>
			            <div class="info-box-content">
			              <span class="info-box-text">Especialidades</span>
			              <span class="info-box-text">Lista de Especialidades</span>
			            </div>
			          </div>
			        </a>
			        </div>
			        <div class="col-xs-12 col-sm-6 col-md-6 col-lg-3">
			        <a href="Semestre">
			          <div class="info-box">
			            <span class="info-box-icon bg-aqua"><i class="fa fa-clock-o"></i></span>
			            <div class="info-box-content">
			              <span class="info-box-text">Semestres</span>
			              <span class="info-box-text">Lista de Semestres</span>
			            </div>
			          </div>
			        </a>
			        </div>
				</div>
            </div><!-- box-body -->
          </div><!-- box -->
        </div>
	</div>
</div>

<!-- Modal -->
<div class="modal fade" id="myModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
        <h4 class="modal-title" id="myModalLabel">Calendario de Actividades</h4>
      </div>
      <div class="modal-body">
        <?php echo $Calendario; ?>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-danger" data-dismiss="modal">Cerrar</button>
        <button type="button" disabled="disabled" class="btn btn-primary">Nuevo Evento</button>
      </div>
    </div>
  </div>
</div>
