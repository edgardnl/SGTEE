<?php
require_once "../ruta.php";
require_once $_SERVER['DOCUMENT_ROOT'] . ruta::ruta . "/controlador/MostrarTablaControlAlumno.php";
$tabla = new MostrarTablaControlAlumnos();
$id = $_GET['id'];
$obj = $tabla->mostrarDatosalumId($id);
?>
<!--
Author: W3layouts
Author URL: http://w3layouts.com
License: Creative Commons Attribution 3.0 Unported
License URL: http://creativecommons.org/licenses/by/3.0/
-->
<!DOCTYPE HTML>
<html>
<head>
<title>SGTE - Editar Alumnos</title>
<meta name="viewport" content="width=device-width, initial-scale=1">
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<meta name="keywords" content="Easy Admin Panel Responsive web template, Bootstrap Web Templates, Flat Web Templates, Android Compatible web template, 
Smartphone Compatible web template, free webdesigns for Nokia, Samsung, LG, SonyEricsson, Motorola web design" />
<script type="application/x-javascript"> addEventListener("load", function() { setTimeout(hideURLbar, 0); }, false); function hideURLbar(){ window.scrollTo(0,1); } </script>
 <!-- Bootstrap Core CSS -->
<link href="css/bootstrap.min.css" rel='stylesheet' type='text/css' />
<!-- Custom CSS -->
<link href="css/style.css" rel='stylesheet' type='text/css' />
<!-- Graph CSS -->
<link href="css/font-awesome.css" rel="stylesheet"> 
<!-- jQuery -->
<!-- lined-icons -->
<link rel="stylesheet" href="css/icon-font.min.css" type='text/css' />
<!-- //lined-icons -->
<!-- chart -->
<script src="js/Chart.js"></script>
<!-- //chart -->
<!--animate-->
<link href="css/animate.css" rel="stylesheet" type="text/css" media="all">
<script src="js/wow.min.js"></script>
	<script>
		 new WOW().init();
	</script>
<!--//end-animate-->
<!----webfonts--->
<link href='//fonts.googleapis.com/css?family=Cabin:400,400italic,500,500italic,600,600italic,700,700italic' rel='stylesheet' type='text/css'>
<!---//webfonts---> 
 <!-- Meters graphs -->
<script src="js/jquery-1.10.2.min.js"></script>
<!-- Placed js at the end of the document so the pages load faster -->
<script src="js/eventosAlumnos.js"></script>

</head> 
   
 <body class="sticky-header left-side-collapsed"  onload="initMap()">
    <section>
    <!-- left side start-->
    <!-- left side start-->

		<?php

		require_once "../vista/menu.php"

		?>
    <!-- left side end-->
    
    <!-- main content start-->
		<div class="main-content main-content4">
			<!-- header-starts -->
			<div class="header-section">
			 
			<!--toggle button start-->
			<a class="toggle-btn  menu-collapsed"><i class="fa fa-bars"></i></a>
			<!--toggle button end-->

			<!--notification menu start -->
			<div class="menu-right">
				<div class="user-panel-top">  	
					<div class="profile_details_left">
						<ul class="nofitications-dropdown">							
							<li class="login_box" id="loginContainer">
									<div class="search-box">
										
									</div>
										<!-- search-scripts -->
										<script src="js/classie.js"></script>
										<script src="js/uisearch.js"></script>
											<script>
												new UISearch( document.getElementById( 'sb-search' ) );
											</script>
										<!-- //search-scripts -->
							</li>	

							
						</ul>
					</div>
					<div class="profile_details">		
						<ul>
							<li class="dropdown profile_details_drop">
								<a href="#" class="dropdown-toggle" data-toggle="dropdown" aria-expanded="false">
									<div class="profile_img">											
										 <div class="user-name">
											<p>Michael<span>Administrator</span></p>
										 </div>
										 <i class="lnr lnr-chevron-down"></i>
										 <i class="lnr lnr-chevron-up"></i>
										<div class="clearfix"></div>	
									</div>	
								</a>
								<ul class="dropdown-menu drp-mnu">									
									<li> <a href="sign-up.html"><i class="fa fa-sign-out"></i>Salir</a> </li>
								</ul>
							</li>
							<div class="clearfix"> </div>
						</ul>
					</div>		
					
				</div>
			</div>
			<!--notification menu end -->
			</div>
	<!-- //header-ends -->
			<div id="page-wrapper">
				<div class="graphs">
					<h3 class="blank1">Editar Alumnos</h3>
						<div class="tab-content">
						<div class="tab-pane active" id="horizontal-form">


                <form class="form-horizontal" name="formEditAlumnos" id="formEditAlumnos">
					<div class="form-group">
									<!--inicio de los imput del formulario -->
                 <input type="hidden" class="form-control1" id="focusedinput" placeholder="" value="<?php print $obj->id; ?>" name="id_alumno">
							<label for="focusedinput" class="col-sm-2 control-label">Matricula</label>
						<div class="col-sm-8">
       <input type="text" class="form-control1" id="focusedinput" value="<?php print $obj->matricula; ?>" name="matricula">
									</div>

									<div class="col-sm-2 jlkdfj1">
										<p class="help-block"></p>
									</div>
								</div>
								<div class="form-group">
									<!--inicio de los imput del formulario -->
									<label for="focusedinput" class="col-sm-2 control-label">Nombre</label>
									<div class="col-sm-8">
                              <input type="text" class="form-control1" id="focusedinput" placeholder="" value="<?php print $obj->nombre; ?>" name="nombre">
									</div>

									<div class="col-sm-2 jlkdfj1">
										<p class="help-block"></p>
									</div>
								</div>
								<div class="form-group">
									<!--dos-->
									<label for="focusedinput" class="col-sm-2 control-label">Apellido Paternos</label>
									<div class="col-sm-8">
                              <input type="text" class="form-control1" id="focusedinput" placeholder="" value="<?php print $obj->ap_p; ?>" name="ap_p">
									</div>

									<div class="col-sm-2 jlkdfj1">
										<p class="help-block"></p>
									</div>
								</div>
								<div class="form-group">
									<!--dos-->
									<label for="focusedinput" class="col-sm-2 control-label">Apellido Materno</label>
									<div class="col-sm-8">
        <input type="text" class="form-control1" id="focusedinput" placeholder="" value="<?php print $obj->ap_m; ?>" name="ap_m">
									</div>

									<div class="col-sm-2 jlkdfj1">
										<p class="help-block"></p>
									</div>
								</div>
								<div class="form-group">
									<!--dos-->
									<label for="focusedinput" class="col-sm-2 control-label">Grupo</label>
									<div class="col-sm-8">
              <input type="text" class="form-control1" id="focusedinput" placeholder="" value="<?php print $obj->grupo; ?>" name="grupo">
									</div>

									<div class="col-sm-2 jlkdfj1">
										<p class="help-block"></p>
									</div>
								</div>
								<div class="form-group">
									<!--dos-->
									<label for="focusedinput" class="col-sm-2 control-label">Carrera</label>
									<div class="col-sm-8">
   <input type="text" class="form-control1" id="focusedinput" placeholder="Horario disponible" value="<?php print $obj->carrera; ?>" name="carrera">
									</div>

									<div class="col-sm-2 jlkdfj1">
										<p class="help-block"></p>
									</div>
								</div>
								<div class="form-group">
									<!--dos-->
									<label for="focusedinput" class="col-sm-2 control-label">Telefono</label>
									<div class="col-sm-8">
   <input type="text" class="form-control1" id="focusedinput" placeholder="Horario disponible" value="<?php print $obj->telefono; ?>" name="telefono">
									</div>

									<div class="col-sm-2 jlkdfj1">
										<p class="help-block"></p>
									</div>
								</div>
								<div class="form-group">
									<!--dos-->
									<label for="focusedinput" class="col-sm-2 control-label">Celular</label>
									<div class="col-sm-8">
   <input type="text" class="form-control1" id="focusedinput" placeholder="Horario disponible" value="<?php print $obj->telefono_cel; ?>" name="telefono_cel">
									</div>

									<div class="col-sm-2 jlkdfj1">
										<p class="help-block"></p>
									</div>
								</div>
								<div class="form-group">
									<!--dos-->
									<label for="focusedinput" class="col-sm-2 control-label">Semestre</label>
									<div class="col-sm-8">
   <input type="text" class="form-control1" id="focusedinput" placeholder="Horario disponible" value="<?php print $obj->semestre; ?>" name="semestre">
									</div>

									<div class="col-sm-2 jlkdfj1">
										<p class="help-block"></p>
									</div>
								</div>
								<div class="form-group">
									<!--dos-->
									<label for="focusedinput" class="col-sm-2 control-label">Correo</label>
									<div class="col-sm-8">
   <input type="text" class="form-control1" id="focusedinput" placeholder="Horario disponible" value="<?php print $obj->correo; ?>" name="correo">
									</div>

									<div class="col-sm-2 jlkdfj1">
										<p class="help-block"></p>
									</div>
								</div>
								<div class="form-group">
									<!--dos-->
									<label for="focusedinput" class="col-sm-2 control-label">Sexo</label>
									<div class="col-sm-8">
   <input type="text" class="form-control1" id="focusedinput" placeholder="Horario disponible" value="<?php print $obj->sexo; ?>" name="sexo">
									</div>

									<div class="col-sm-2 jlkdfj1">
										<p class="help-block"></p>
									</div>
								</div>
								
								
								<div class="panel-footer">

                   <div class="row">
                        <div class="col-sm-8 col-sm-offset-2">
                            <button class="btn-success btn" onclick="editarAlumnos()">Actualizar</button>
                            <button class="btn-success btn" onclick="eliminarAlumnos()">Eliminar</button>
                            <button class="btn-inverse btn">Reset</button>
                        </div>
                    </div>
                                                                    
                </div>

				
							</form>
                                                    <button class="btn-default btn" onclick="regresarTutoresInicio()">Cancelar</button>
						</div>
					</div>
					
					
  
						
				</div>
	
			</div>
		</div>
		<!--toggle button start-->
			<a class="toggle-btn  menu-collapsed"><i class="fa fa-bars"></i></a>
			<!--toggle button end-->
		<!--footer section start-->
			<footer>
			   <p>&copy 2015 Easy Admin Panel. All Rights Reserved | Design by <a href="https://w3layouts.com/" target="_blank">w3layouts.</a></p>
			</footer>
        <!--footer section end-->
	</section>
	
<script src="js/jquery.nicescroll.js"></script>
<script src="js/scripts.js"></script>
<!-- Bootstrap Core JavaScript -->
   <script src="js/bootstrap.min.js"></script>
</body>
</html>