<?php if ($this->session->userdata('login_ok') == TRUE){ ?>
			<div class="main-content">
				<div class="main-content-inner">
					<div class="breadcrumbs breadcrumbs-fixed" id="breadcrumbs">
						<ul class="breadcrumb">
							<li>
								<i class="ace-icon fa fa-home home-icon"></i>
								<a href="../Administrador">Home</a>
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
                	<a href="Canalizacion/Registro_Canalizacion" class="btn btn-box-tool btn-success">Registrar Nueva Canalizacion</a>
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
										</tr>
									</thead>
									<tbody>
										<?php foreach($arrCan as $can){ ?>
										<tr>
											<td><?php echo $cab['fecha']; ?></td>
											<td>2</td>
											<td>3</td>
											<td>4</td>
											<td class="center">
											<div class="btn-group">
												<button data-toggle="dropdown" class="btn btn-primary dropdown-toogle">
													Acciónes <i class="fa fa-angle-down icon-on-rigth"></i>
												</button>
													<ul class="dropdown-menu">
														<li><a href="">Action 1</a></li>
														<li><a href="">Action 2</a></li>
														<li><a href="">Action 3</a></li>
														<li class="divider"></li>
														<li><a href="">Action 4</a></li>
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
