<?php
session_start();
if (isset($_SESSION['nom'])) {
    
}else{
    header("location:index.php");
}

require_once "../ruta.php";
require_once $_SERVER['DOCUMENT_ROOT'] . ruta::ruta . "/controlador/MostrarTablaControl.php";
$tabla = new MostrarTablaControl();
$id = $_GET['id'];
$objT = $tabla->mostrarDatosTutorId($id);
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

                $("#editar").click(function(){
                    //alert("Hola");

                    if ($("#clav").val() == "" || $("#nom").val() == "" || $("#apa").val() == "" || $("#ama").val() == "" || $("#carrera").val() == "" || $("#correo").val() == "" || $("#sexo").val() == "" || $("#tel").val() == "") {
                        alert("Algun campo esta vacio");
                        return false;
                    }

                    if (!/^([0-9])*$/.test($("#clav").val())){
                        alert("El campo Clave solo permiete numeros");
                        return false;
                    }

                    if (!isNaN($("#nom").val())) {
                        alert("El campo Nombre solo permite letras");
                        return false;
                    }

                    if (!isNaN($("#apa").val())) {
                        alert("El campo Apellido Paterno solo permite letras");
                        return false;
                    }

                    if (!isNaN($("#ama").val())) {
                        alert("El campo Apellido Materno solo permite letras");
                        return false;
                    }

                    if (!isNaN($("#carrera").val())) {
                        alert("El campo Carrera solo permite letras");
                        return false;
                    }

                    if (!isNaN($("#sexo").val())) {
                        alert("El campo Sexo solo permite letras");
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

                    var r = confirm("Estas seguro de actualizar este registro");
                    if (r == true) {
                        var datos = "action=editarTutor&" + $("#formEdit").serialize();
                        alert(datos);
                        $.post("../controlador/EditarDatosControl.php", datos, function (data) {
                           if (data == 1) {
                                alert("Error la clave existe en le sistema");
                            }else if (data == 2) {
                                alert("Actualizacion exitosa");
                                window.location.href = "Tutores.php";
                            }else if (data == 3) {
                                alert("Error al realizar la accion");
                                window.location.href = "Tutores.php";
                            }
                        });
                    } else if(r == false) {
                        return false;
                    }
                            
                });

                $("#eliminar").click(function(){
                    var r = confirm("Estas seguro de eliminar este registro");
                    if (r == true) {
                        var datos = "action=eliminarTutor&" + $("#formEdit").serialize();
                        alert(datos);
                        $.post("../controlador/EliminarDatos.php", datos, function (data) {
                            if (data == 1) {
                                alert("Error la clave existe en le sistema");
                            }else if (data == 2) {
                                alert("Eliminacion exitosa");
                                window.location.href = "Tutores.php";
                            }else if (data == 3) {
                                alert("Error al realizar la accion");
                                window.location.href = "Tutores.php";
                            }
                        });
                    } else if(r == false) {
                        return false;
                    }
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
                        <h3 class="blank1">Editar Tutores</h3>
                        <div class="tab-content">
                            <div class="tab-pane active" id="horizontal-form">


                                <form class="form-horizontal" name="formEdit" id="formEdit">                                    
                                    <div class="form-group">
                                        <!--inicio de los imput del formulario -->
                                        <input type="hidden" class="form-control1" id="focusedinput" placeholder="" value="<?php print $objT->matricula; ?>" name="id">
                                        <label for="focusedinput" class="col-sm-2 control-label">Matricula</label>
                                        <div class="col-sm-8">
                                            <input disabled="" type="text" class="form-control1" id="clav" placeholder="" value="<?php print $objT->matricula; ?>" name="clav">
                                        </div>

                                        <div class="col-sm-2 jlkdfj1">
                                            <p class="help-block"></p>
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <!--inicio de los imput del formulario -->
                                        <label for="focusedinput" class="col-sm-2 control-label">Nombre</label>
                                        <div class="col-sm-8">
                                            <input type="text" class="form-control1" id="nom" placeholder="" value="<?php print $objT->nombre; ?>" name="nom">
                                        </div>

                                        <div class="col-sm-2 jlkdfj1">
                                            <p class="help-block"></p>
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <!--dos-->
                                        <label for="focusedinput" class="col-sm-2 control-label">Apellido Paternos</label>
                                        <div class="col-sm-8">
                                            <input type="text" class="form-control1" id="apa" placeholder="" value="<?php print $objT->ap_p; ?>" name="apa">
                                        </div>

                                        <div class="col-sm-2 jlkdfj1">
                                            <p class="help-block"></p>
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <!--dos-->
                                        <label for="focusedinput" class="col-sm-2 control-label">Apellido Materno</label>
                                        <div class="col-sm-8">
                                            <input type="text" class="form-control1" id="ama" placeholder="" value="<?php print $objT->ap_m; ?>" name="ama">
                                        </div>

                                        <div class="col-sm-2 jlkdfj1">
                                            <p class="help-block"></p>
                                        </div>
                                    </div>                                    
                                    <div class="form-group">
                                        <!--dos-->
                                        <label for="focusedinput" class="col-sm-2 control-label">Sexo</label>
                                        <div class="col-sm-8">
                                            <input type="text" class="form-control1" id="sexo" placeholder="" value="<?php print $objT->sexo; ?>" name="sexo">
                                        </div>

                                        <div class="col-sm-2 jlkdfj1">
                                            <p class="help-block"></p>
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <!--dos-->
                                        <label for="focusedinput" class="col-sm-2 control-label">Carrera</label>
                                        <div class="col-sm-8">
                                            <input type="text" class="form-control1" id="carrera" placeholder="" value="<?php print $objT->carrera; ?>" name="carrera">
                                        </div>

                                        <div class="col-sm-2 jlkdfj1">
                                            <p class="help-block"></p>
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <!--dos-->
                                        <label for="focusedinput" class="col-sm-2 control-label">Correo</label>
                                        <div class="col-sm-8">
                                            <input type="text" class="form-control1" id="correo" placeholder="" value="<?php print $objT->correo; ?>" name="correo">
                                        </div>

                                        <div class="col-sm-2 jlkdfj1">
                                            <p class="help-block"></p>
                                        </div>
                                    </div>                                    
                                    <div class="form-group">
                                        <!--dos-->
                                        <label for="focusedinput" class="col-sm-2 control-label">Telefono</label>
                                        <div class="col-sm-8">
                                            <input type="text" class="form-control1" id="tel" placeholder="" value="<?php print $objT->telefono; ?>" name="tel">
                                        </div>

                                        <div class="col-sm-2 jlkdfj1">
                                            <p class="help-block"></p>
                                        </div>
                                    </div>                                    

                                </form>
                                <div class="panel-footer">

                                    <div class="row">
                                        <div class="col-sm-8 col-sm-offset-2">
                                            <button class="btn-success btn" onclick="" id="editar">Actualizar</button>
                                            <button class="btn-danger btn" onclick="" id="eliminar" >Eliminar</button>
                                            <button class="btn-warning btn" onclick="cambiaPassTuto(<?php print $id; ?>)">Contraseña</button>
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