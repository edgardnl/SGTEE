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
<?php
require_once "../ruta.php";
require_once $_SERVER['DOCUMENT_ROOT'] . ruta::ruta . "/controlador/MostrarTablaControl.php";
require_once $_SERVER['DOCUMENT_ROOT'] . ruta::ruta . "/modelo/objetos/TutoresObjeto.php";

$tabla = new MostrarTablaControl();
?>

<!DOCTYPE HTML>
<html>
    <head>
        <title>SGTE - Coordinador</title>
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

        <script src="js/eventosCoordinador1.js"></script>

        <script type="text/javascript">
            $(document).ready(function () {
                console.log("ready!");

                $("#add").click(function () {
                    //alert("Hola");

                    if ($("#observacion").val() == "" ) {
                        alert("Algun campo esta vacio");
                        return false;
                    }

                    if ($("#aprobacion").val() == "0" || $("#tutor").val() == "0") {
                        alert("Debes seleccionar alguna opcion");
                        return false;
                    }
                    
                    if (!isNaN($("#observacion").val())) {
                        alert("El campo Nombre solo permite letras");//FormCoordinador
                        return false;
                    }
                                                          
                    var datos = "action=agregarCoordinador&" + $("#FormCoordinador").serialize();
                    alert(datos);
                    $.post("../controlador/AgregarControlCoordinadorRelacion.php", datos, function (data) {                        
                        console.log(data);                        
                        if (data == 1) {
                            alert("El Tutor se a asignado correctamente");
                            window.location.href = "Coordinadora1.php"; 
                        } else if (data == 2) {
                            alert("Ocurrio un error en la accion");
                            window.location.href = "Coordinadora1.php";                        
                        }
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
        new UISearch(document.getElementById('sb-search'));
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
                                                    <p><?php print $_SESSION["nom"]; ?><span>Coordinador</span></p>
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
                        <h3 class="blank1">Asignar Tutor </h3>
                        <div class="tab-content">
                            <div class="tab-pane active" id="horizontal-form">


                                <form class="form-horizontal" name="FormCoordinador" id="FormCoordinador">
                                    <div class="form-group">
                                        <!--inicio de los imput del formulario -->
                                        <label for="focusedinput" class="col-sm-2 control-label">Matricula Alumno</label>
                                        <div class="col-sm-8">
                                            <input type="hidden" class="form-control1" id="idalu" name="idalu"  value="<?php print $id = $_GET['id']; ?>">
                                            <input disabled="" type="text" class="form-control1" id="" name=""  value="<?php print $id = $_GET['id']; ?>">
                                        </div>

                                        <div class="col-sm-2 jlkdfj1">
                                            <p class="help-block"></p>
                                        </div>
                                    </div>
                                    <?php $tabla->selectNombreTutores(); ?>
                                    <div class="form-group">
                                        <label for="problema" class="col-sm-2 control-label">Aprobacion</label>
                                        <div class="col-sm-8"><select name="aprobacion" id="aprobacion" class="form-control1">
                                                <option value="0">Selecciona una opcion</option>
                                                <option value="Si">Si</option>
                                                <option value="No">No</option>                                                
                                            </select></div>
                                    </div>
                                    <div class="form-group">
                                        <!--dos-->
                                        <label for="focusedinput" class="col-sm-2 control-label">Observacion</label>
                                        <div class="col-sm-8">
                                            <input type="text" class="form-control1" id="observacion" name="observacion">
                                        </div>

                                        <div class="col-sm-2 jlkdfj1">
                                            <p class="help-block"></p>
                                        </div>
                                    </div>                                    

                                </form>
                                <div class="panel-footer">

                                    <div class="row">
                                        <div class="col-sm-8 col-sm-offset-2">
                                            <button type="submit" class="btn-success btn" onclick="" id="add">Guardar</button>
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