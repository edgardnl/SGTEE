<?php
session_start();
if (isset($_SESSION['nom'])) {
    
}else{
    header("location:index.php");
}

require_once "../ruta.php";
require_once $_SERVER['DOCUMENT_ROOT'] . ruta::ruta . "/controlador/MostrarTablaControl.php";
$id = $_GET['id'];
$tabla = new MostrarTablaControl();
$objCa = $tabla->objetoCalificacionesPorId($id)
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
        <title>SGTE - Tutor</title>
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
        <!--Datapicker-->
        <link rel="stylesheet" href="//code.jquery.com/ui/1.12.1/themes/base/jquery-ui.css">
        <link rel="stylesheet" href="/resources/demos/style.css">
        <script src="https://code.jquery.com/jquery-1.12.4.js"></script>
        <script src="https://code.jquery.com/ui/1.12.1/jquery-ui.js"></script>
        <script>

            $(document).ready(function () {
                console.log("ready!");


                $("#parcial").val(<?php print $objCa->id_parcial; ?>);
                $("#asignatura").val(<?php print $objCa->id_asignatura; ?>);
                $("#profesor").val(<?php print $objCa->id_profesor; ?>);

                $("#upd").click(function () {

                    if ($("#calificacion").val() == "") {
                        alert("Algun campo esta vacio");
                        return false;
                    }

                    if ($("#parcial").val() == "0" || $("#asignatura").val() == "0" || $("#profesor").val() == "0") {
                        alert("Selecciona una opcion");
                        return false;
                    }

                    var expr = /^[0-9]+([.][0-9]+)?$/;
                    if (!expr.test($("#calificacion").val())) {
                        alert("El campo Calificaciones solo permiete numeros");
                        return false;
                    }

                    var r = confirm("Estas seguro de actualizar este registro");
                    if (r == true) {
                        var datos = "action=actualizaCalificaciones&" + $("#FormCalificaciones").serialize();
                        alert(datos);
                        $.post("../controlador/EditarDatosControl.php", datos, function (data) {
                            console.log(data);
                            if (data == 1) {
                                alert("Atualizacion Exitosoa");
                                window.history.go(-1);
                            } else if (data == 2) {
                                alert("Error al realizar la actualizacion");
                                window.history.go(-1);
                            }

                        });

                    } else if (r == false) {
                        return false;
                    }



                });
                
                $("#eliminar").click(function(){
                    var r = confirm("Estas seguro de Eliminar este registro");
                    if (r == true) {
                        var datos = "action=eliminarCalificacion&" + $("#FormCalificaciones").serialize();
                        alert(datos);
                        $.post("../controlador/EliminarDatos.php", datos, function(data) {
                            console.log(data);
                            if (data == 1) {
                                alert("Elimicacion Exitosa");
                                window.history.go(-1);
                            }else if(data == 2){
                                alert("Error al realizar la acciion");
                                window.history.go(-1);
                            }
                                                            
                        });  
                    } else if(r == false) {
                        return false;
                    }
                });


            });


        </script>

        <!--timepicker-->
        <link rel="stylesheet" href="//cdnjs.cloudflare.com/ajax/libs/timepicker/1.3.5/jquery.timepicker.min.css">
        <script src="//cdnjs.cloudflare.com/ajax/libs/timepicker/1.3.5/jquery.timepicker.min.js"></script>


        <script src="js/eventos.js"></script>

    </head> 

    <body class="sticky-header left-side-collapsed"  onload="initMap()">
        <section>
            <!-- left side start-->
            <!-- left side start-->

            <?php
            require_once "../vista/TutoMenu.php"
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
                                                    <p><?php print $_SESSION["nom"]; ?><span>Tutor</span></p>
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
                        <h3 class="blank1">Edita Calificaciones</h3>
                        <div class="tab-content">
                            <div class="tab-pane active" id="horizontal-form">


                                <form class="form-horizontal" name="FormCalificaciones" id="FormCalificaciones">

                                    <?php
                                    $tabla->selectParcial();
                                    $tabla->selectAsignatura();
                                    $tabla->selectProfesores();
                                    ?>

                                    <div class="form-group">                                        
                                        <label for="focusedinput" class="col-sm-2 control-label">Calificacion</label>
                                        <div class="col-sm-8">
                                            <input type="hidden" class="form-control1" id="" placeholder="" name="idcal" value="<?php print $objCa->id_calificiones; ?>">
                                            <input type="text" class="form-control1" id="calificacion" placeholder="" name="calificacion" value="<?php print $objCa->calificaciones; ?>" >
                                        </div>

                                        <div class="col-sm-2 jlkdfj1">
                                            <p class="help-block"></p>
                                        </div>
                                    </div>     

                                </form>

                                <div class="panel-footer">

                                    <div class="row">
                                        <div class="col-sm-8 col-sm-offset-2">
                                            <button class="btn-success btn" onclick="" id="upd">Actualizar</button>
                                            <button class="btn-danger btn" onclick="" id="eliminar">Eliminar</button>
                                            <button class="btn-default btn" onclick="regresarCalifica()">Cancelar</button>

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