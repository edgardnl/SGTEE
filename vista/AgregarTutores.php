<?php
session_start();
if (isset($_SESSION['nom'])) {
	
}else{
	header("location:index.php");
}
?>

<!DOCTYPE HTML>
<html>
<head>
<title>SGTE</title>
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

    		if ($("#clave").val() == "" || $("#nombre").val() == "" || $("#ap_p").val() == "" || $("#ap_m").val() == "" || $("#carrera").val() == "" || $("#correo").val() == "" || $("#sexo").val() == "" || $("#pass").val() == "" || $("#pass1").val() == "" || $("#tel").val() == "") {
    			alert("Algun campo esta vacio");
    			return false;
    		}

    		if (!/^([0-9])*$/.test($("#clave").val())){
      			alert("El campo Clave solo permiete numeros");
      			return false;
    		}

    		if (!isNaN($("#nombre").val())) {
    			alert("El campo Nombre solo permite letras");
    			return false;
    		}

    		if (!isNaN($("#ap_p").val())) {
    			alert("El campo Apellido Paterno solo permite letras");
    			return false;
    		}

    		if (!isNaN($("#ap_m").val())) {
    			alert("El campo Apellido Materno solo permite letras");
    			return false;
    		}

    		if (!isNaN($("#carrera").val())) {
    			alert("El campo Carrera solo permite letras");
    			return false;
    		}

    		if (!isNaN($("#sexo").val())) {
    			alert("El campo Carrera solo permite letras");
    			return false;
    		}

    		expr = /^([a-zA-Z0-9_\.\-])+\@(([a-zA-Z0-9\-])+\.)+([a-zA-Z0-9]{2,4})+$/;
    		if (!expr.test($("#correo").val())){
      			alert("El correo no es valido");
      			return false;
    		}    		

			if (!/^([0-9])*$/.test($("#tel").val())){
      			alert("El campo Telefono solo permiete numeros");
      			return false;
    		}

    		var n = $("#tel").val();
    		//alert(n.length);
    		if (n.length != 10) {    			
    			alert("El telefono debe ser de 10 digitos");
    			return false;
    		}

    		if ($("#pass").val() != $("#pass1").val()) {
    			alert("Las contraseñas no son iguales");
    			return false;
    		}

    		var datos = "action=agregarTutor&" + $("#FormTutores").serialize();
		    alert(datos);
		    $.post("../controlador/AgregarControl.php", datos, function(data) {
		        console.log(data);
		        //alert(data);
		        if (data == 1) {
		        	alert("Error la clave existe en le sistema");
		        }else if (data == 2) {
		        	alert("Registro exitoso");
		        	window.location.href = "Tutores.php";
		        }else if (data == 3) {
		        	alert("Erro al realizar el registro");
		        	window.location.href = "Tutores.php";
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
											<p><?php print $_SESSION["nom"]; ?><span>Administrator</span></p>
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
					<h3 class="blank1">Agregar Tutores</h3>
						<div class="tab-content">
						<div class="tab-pane active" id="horizontal-form">


                                                    <form class="form-horizontal" name="FormTutores" id="FormTutores">
								<div class="form-group">
									<!--inicio de los imput del formulario -->
									<label for="focusedinput" class="col-sm-2 control-label">Clave</label>
									<div class="col-sm-8">
                                                                            <input type="text" class="form-control1" id="clave" placeholder="" name="clave">
									</div>

									<div class="col-sm-2 jlkdfj1">
										<p class="help-block"></p>
									</div>
								</div>
								<div class="form-group">
									<!--inicio de los imput del formulario -->
									<label for="focusedinput" class="col-sm-2 control-label">Nombre</label>
									<div class="col-sm-8">
                                                                            <input type="text" class="form-control1" id="nombre" placeholder="" name="nombre">
									</div>

									<div class="col-sm-2 jlkdfj1">
										<p class="help-block"></p>
									</div>
								</div>
								<div class="form-group">
									<!--dos-->
									<label for="focusedinput" class="col-sm-2 control-label">Apellido Paternos</label>
									<div class="col-sm-8">
										<input type="text" class="form-control1" id="ap_p" placeholder="" name="ap_p">
									</div>

									<div class="col-sm-2 jlkdfj1">
										<p class="help-block"></p>
									</div>
								</div>
								<div class="form-group">
									<!--dos-->
									<label for="focusedinput" class="col-sm-2 control-label">Apellido Materno</label>
									<div class="col-sm-8">
										<input type="text" class="form-control1" id="ap_m" placeholder="" name="ap_m">
									</div>

									<div class="col-sm-2 jlkdfj1">
										<p class="help-block"></p>
									</div>
								</div>								
								<div class="form-group">
									<!--dos-->
									<label for="focusedinput" class="col-sm-2 control-label">Carrera</label>
									<div class="col-sm-8">
										<input type="text" class="form-control1" id="carrera" placeholder="" name="carrera">
									</div>

									<div class="col-sm-2 jlkdfj1">
										<p class="help-block"></p>
									</div>
								</div>								
                                <div class="form-group">
									<!--dos-->
									<label for="focusedinput" class="col-sm-2 control-label">Correo</label>
									<div class="col-sm-8">
										<input type="text" class="form-control1" id="correo" placeholder="ejemplo@tescha.com" name="correo">
									</div>

									<div class="col-sm-2 jlkdfj1">
										<p class="help-block"></p>
									</div>
								</div>
								<div class="form-group">
									<!--dos-->
									<label for="focusedinput" class="col-sm-2 control-label">Sexo</label>
									<div class="col-sm-8">
										<input type="text" class="form-control1" id="sexo" placeholder="" name="sexo">
									</div>

									<div class="col-sm-2 jlkdfj1">
										<p class="help-block"></p>
									</div>
								</div>
								<div class="form-group">
									<!--dos-->
									<label for="focusedinput" class="col-sm-2 control-label">Telefono</label>
									<div class="col-sm-8">
										<input type="text" class="form-control1" id="tel" placeholder="" name="tel">
									</div>

									<div class="col-sm-2 jlkdfj1">
										<p class="help-block"></p>
									</div>
								</div>
                                                                <div class="form-group">
									<!--dos-->
									<label for="focusedinput" class="col-sm-2 control-label">Contraseña</label>
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
	                                        <button class="btn-default btn" onclick="regresarTutoresInicio()">Cancelar</button>
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