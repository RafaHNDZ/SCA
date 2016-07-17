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
					<div class="col-xs-6 col-sm-6 col-md-4 col-lg-3 col-xl-2">
						<div class="small-box bg-aqua">
							<div class="inner">
								<h3>20</h3>
								<p>Alumnos Registrados</p>
							</div>
							<div class="icon">
								<i class="ion ion-person-add"></i>
							</div>
							<a href="Grupo/Mi_Grupo" class="small-box-footer">
								 Ir a Mi Grupo <i class="fa fa-arrow-circle-right"></i>
							</a>
						</div>
					</div>
					<div class="col-xs-6 col-sm-6 col-md-4 col-lg-3 col-xl-2">
						<div class="small-box bg-aqua">
							<div class="inner">
								<h3>20</h3>
								<p>Canalizaciónes del Grupo</p>
							</div>
							<div class="icon">
								<i class="ion ion-ios-people"></i>
							</div>
							<a href="Canalizacion/lista_canalizaciones" class="small-box-footer">
								 Ver Lista <i class="fa fa-arrow-circle-right"></i>
							</a>
						</div>
					</div>
					<div class="col-xs-6 col-sm-6 col-md-4 col-lg-3 col-xl-2">
						<div class="small-box bg-aqua">
							<div class="inner">
								<h3>20</h3>
								<p>Alumnos Canalizados</p>
							</div>
							<div class="icon">
								<i class="fa fa-graduation-cap"></i>
							</div>
							<a href="" class="small-box-footer">
								 Mas Información <i class="fa fa-arrow-circle-right"></i>
							</a>
						</div>
					</div>
					<div class="col-xs-6 col-sm-6 col-md-4 col-lg-3 col-xl-2">
						<div class="small-box bg-orange">
							<div class="inner">
								<h3>20</h3>
								<p>Canalizaciones Registradas</p>
							</div>
							<div class="icon">
								<i class="fa fa-hdd-o"></i>
							</div>
							<a href="" class="small-box-footer">
								 Mas Información <i class="fa fa-arrow-circle-right"></i>
							</a>
						</div>
					</div>
					<div class="col-xs-12 col-sm-6 col-md-4 col-lg-3 col-xl-2">
						<div class="info-box bg-blue">
							<span class="info-box-icon">
								<i class="fa fa-pencil-square-o"></i>
							</span>
							<div class="info-box-content">
								<span class="info-box-text">Entrevistas al Grupo</span>
								<span class="info-box-number">12,00</span>
								<div class="progress">
									<div class="progress-bar" style="width:70%"></div>
								</div>
								<span class="progress-description">
									Descripcion de la Barra de Progreso
								</span>
							</div>
						</div>
					</div>
					<div class="col-xs-12 col-sm-6 col-md-4 col-lg-3 col-xl-2">
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
									Descripcion de la Barra de Progreso
								</span>
							</div>
						</div>
					</div>
				</div>
            </div><!-- box-body -->
          </div><!-- box -->
        </div>
	</div>
</div>
