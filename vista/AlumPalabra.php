<?php
session_start();
if (isset($_SESSION['nom'])) {
    
}else{
    header("location:index.php");
}
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
<title>SGTE - Agregar Tutores</title>
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
<script src="js/eventos.js"></script>

<script type="text/javascript">
	$(document).ready(function() {
    	console.log( "ready!" );

    	$("#agregar").click(function(){
    		//alert("Hola");

    		if ($("#pass").val() == "" || $("#pass1").val() == "") {
    			alert("Algun campo esta vacio");
    			return false;
    		}    		

    		if ($("#pass").val() != $("#pass1").val()) {
    			alert("Las contraseñas no son iguales");
    			return false;
    		}

    		var datos = "action=cambiaPassAlu&" + $("#FormPass").serialize();
		    alert(datos);
		    $.post("../controlador/EditarDatosControl.php", datos, function(data) {
		        console.log(data);
		        //alert(data);
		        if (data == 1) {
		        	alert("Cambio Realizado");
		        	window.location.href = "AlumInicio.php";
		        }else if (data == 2) {
		        	alert("Erro al realizar el cambio");
		        	window.location.href = "AlumInicio.php";
		        }
		        
		        //$("#FormTutores").html(data);
		    });
    		    	
    	});
    	
	});
</script>

</head> 
   
 <body class="sticky-header left-side-collapsed"  onload="initMap()">
    <section>
    <!-- left side start-->
    <!-- left side start-->

		<?php

		require_once "../vista/AlumMenu.php"

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
											<p><?php print $_SESSION["nom"]; ?><span>Alumno</span></p>
										 </div>										 
										<div class="clearfix"></div>	
									</div>	
								</a>
								
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
					<h3 class="blank1">Cambiar Contraseña</h3>
						<div class="tab-content">
						<div class="tab-pane active" id="horizontal-form">


                            <form class="form-horizontal" name="FormPass" id="FormPass">
								
                                    <div class="form-group">
									<!--dos-->
									<label for="focusedinput" class="col-sm-2 control-label">Nueva Contraseña</label>
									<div class="col-sm-8">
                                                                            <input type="password" class="form-control1" id="pass" placeholder="" name="pass">
									</div>

									<div class="col-sm-2 jlkdfj1">
										<p class="help-block"></p>
									</div>
								</div>
                                                                <div class="form-group">
									<!--dos-->
									<label for="focusedinput" class="col-sm-2 control-label">Confirma contraseña</label>
									<div class="col-sm-8">
                                                                            <input type="password" class="form-control1" id="pass1" placeholder="" name="pass1">
                                                                            <input type="hidden" class="form-control1" id="usu" placeholder="" name="usu" value="<?php print $_SESSION["id"]; ?>">
									</div>

									<div class="col-sm-2 jlkdfj1">
										<p class="help-block"></p>
									</div>
								</div>																

				
							</form>
							<div class="panel-footer">

	                                <div class="row">
	                                    <div class="col-sm-8 col-sm-offset-2">
	                                        <!--<button class="btn-success btn" onclick="agregarTutores()">Guardar</button>-->
	                                        <button class="btn-success btn" id="agregar">Guardar</button>                                        	                                        
	                                        <button class="btn-default btn" onclick="regresarVentana()">Cancelar</button>
	                                    </div>
	                                </div>
	                                
	                            </div>
                                                    
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
                <p>TESCHA - Tecnologico de Estudios Superiores de Chalco</p>                            
                <!--<p>&copy 2015 Easy Admin Panel. All Rights Reserved | Design by <a href="https://w3layouts.com/" target="_blank">w3layouts.</a></p> -->                           
            </footer>
        <!--footer section end-->
	</section>
	
<script src="js/jquery.nicescroll.js"></script>
<script src="js/scripts.js"></script>
<!-- Bootstrap Core JavaScript -->
   <script src="js/bootstrap.min.js"></script>
</body>
</html>