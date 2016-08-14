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
              <h4 class="box-title"><span class="fa fa-tasks"></span> Mi Panel</h4>
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
								<h4>Grupo</h4>
								<p>Alumnos Integrados</p>
							</div>
							<div class="icon">
								<i class="ion ion-person"></i>
							</div>
							<a href="Grupo/Mi_Grupo" class="small-box-footer">
								 Ir a Mi Grupo <i class="fa fa-arrow-circle-right"></i>
							</a>
						</div>
					</div> <!--
					<div class="col-xs-6 col-sm-6 col-md-4 col-lg-3 col-xl-2">
						<div class="small-box bg-aqua">
							<div class="inner">
								<h4>Canalizaciones</h4>
								<p>Canalizaciones del Grupo</p>
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
								<h4>Sesiones con Alumno</h4>
								<p>Alumnos Canalizados</p>
							</div>
							<div class="icon">
								<i class="fa fa-graduation-cap"></i>
							</div>
							<a href="<?php echo base_url();?>index.php/SesionGrupal/ses_grupo" class="small-box-footer">
								 Mas Información <i class="fa fa-arrow-circle-right"></i>
							</a>
						</div>
					</div>
					<div class="col-xs-6 col-sm-6 col-md-4 col-lg-3 col-xl-2">
						<div class="small-box bg-aqua">
							<div class="inner">
								<h4>Canalizaciones</h4>
								<p>Alumnos Canalizados</p>
							</div>
							<div class="icon">
								<i class="fa fa-hdd-o"></i>
							</div>
							<a href="" class="small-box-footer">
								 Mas Información <i class="fa fa-arrow-circle-right"></i>
							</a>
						</div>
					</div>
				</div>
            </div> -->
          </div><!-- box -->
        </div>
	</div>
</div>
