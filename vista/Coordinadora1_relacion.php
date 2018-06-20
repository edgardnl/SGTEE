<?php
require_once "../ruta.php";
require_once $_SERVER['DOCUMENT_ROOT'] . ruta::ruta . "/controlador/MostrarTablaControlCoordinadorRelacion.php";
$tabla = new MostrarTablaControlCoordinadorRelacion();
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
<title>SGTE - Relacion Coordinador</title>
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
<script src="jquery/jquery.js"></script>
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
 <script src="jquery/jquery.min.js"></script>
<script src="js/jquery-1.10.2.min.js"></script>
<!-- Placed js at the end of the document so the pages load faster -->

<!-- DataTable-->

<script src="jquery/jquery.dataTables.js"></script>

<script src="js/eventosAlumnos.js"></script>

<style>
    .flotante{
        background: #27cce4;
        border-color: #27cce4;
        padding: 16px 20px;
        text-align: center;
        border-radius: 50%;
        display:scroll;
        position:fixed;
        bottom:55px;
        right:15px;
    }
    
    i{
        color: #fff;
        
    }
    
    .flotante:hover{
        background: #F44336;
    }

    .dataTables_filter {
    	float: right;
    	text-align: right;
	}
</style>

</head> 
   
 <body class="sticky-header left-side-collapsed"  onload="initMap()">
    <section>
    <!-- left side start-->
    <!-- left side start-->

		<?php

		require_once "../vista/CordMenu.php"

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
					
                                    <h1 class="blank1">Coordinador Institucional</h1>
   
                                        <h6 class="blank" style="color: #F8F8F8">...</h6>
                                        <h5 class="blank">Lista de Alumnos:</h5>
                                        
					 <div class="xs tabls">
                                            <div class="bs-example4" data-example-id="simple-responsive-table">
						<div class="table-responsive">

                                                    <?php
                                                    $tabla->tablaCoordindorRelacion();
                                                    ?>
                                                    
                                                </div>					   																						
                                            </div>
                                        </div>
          <!--<a class="flotante" href="AgregarAlumnos.php"><i class="fa fa-user"></i></a>-->
                                </div>
                        </div>
		
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