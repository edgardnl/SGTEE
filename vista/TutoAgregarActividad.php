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

            $(document).ready(function(){
                console.log( "ready!" );
                $("#cana").hide();
                
                $("#datepicker").datepicker({
                    dateFormat: "yy-mm-dd",
                    dayNamesMin: ["Do", "Lu", "Ma", "Mi", "Ju", "Vi", "Sa"],
                    monthNames: ["Enero", "Febrero", "Marzo", "Abril", "Mayo", "Junio", "Julio", "Agosto", "Septiembre", "Octubre", "Noviembre", "Diciembre"]
                });

                $("#timepicker").timepicker({
                    timeFormat: 'HH:mm:ss',
                    interval: 15,
                    minTime: '9',
                    maxTime: '8:00pm',
                    defaultTime: '13',
                    startTime: '9:00',
                    dynamic: false,
                    dropdown: true,
                    scrollbar: true
                });
                
                //$("#selector1").val(<?//php print '2';?>);
                
                $("#add").click(function(){
                    if ($("#datepicker").val() == "" || $("#timepicker").val() == "" || $("#lugar").val() == "" || $("#avance").val() == "" ) {
    			alert("Algun campo esta vacio");
    			return false;
                    }
                    if ($("#selector1").val() == "0" || $("#problema").val() == "0") {
                        alert("Selecciona una opcion");
                        return false;
                    }
                    //Validaciones canalizacion inicio
                    if ($("#selector1").val() == "3") {
                        if ($("#area").val() == "" || $("#encargado").val() == "" || $("#observacion").val() == "") {
                            alert("Algun campo esta vacio en Canalizacion");
                            return false;
                        }
                        
                        if (!isNaN($("#area").val())) {
                            alert("El campo Area de Canalizacion solo permite letras");
                            return false;
                        }

                        if (!isNaN($("#encargado").val())) {
                                alert("El campo Encargado solo permite letras");
                                return false;
                        }

                        if (!isNaN($("#observacion").val())) {
                                alert("El campo Observacion solo permite letras");
                                return false;
                        }
                    }
                    //Validaciones canalizacion fin
                    
                    if (!isNaN($("#lugar").val())) {
    			alert("El campo Lugar solo permite letras");
    			return false;
                    }                    

                    if (!isNaN($("#avance").val())) {
                            alert("El campo Apellido Materno solo permite letras");
                            return false;
                    }
                    
                    var datos = "action=agregarActividad&" + $("#FormActividades").serialize();
                    alert(datos);
                    $.post("../controlador/AgregarControl.php", datos, function(data) {
                        console.log(data);
                        if (data == 1) {
                            alert("Registro Exitoso");
                            window.location.href = "TutoSeguimientoAlumnos.php";
                        }else if(data == 2){
                            alert("Error al realizar el registro");
                            window.location.href = "TutoSeguimientoAlumnos.php";
                        }
                                                        
                    });  
                    
                });
                
                $("#selector1").change(function(){
                    if ($("#selector1").val()== "3") {
                        $("#cana").show();
                    }else{
                        $("#cana").hide();
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
                        <h3 class="blank1">Agregar Actividades</h3>
                        <div class="tab-content">
                            <div class="tab-pane active" id="horizontal-form">


                                <form class="form-horizontal" name="FormActividades" id="FormActividades">
                                    <div class="form-group">
                                        <!--inicio de los imput del formulario -->
                                        <label for="focusedinput" class="col-sm-2 control-label">Fecha</label>
                                        <div class="col-sm-8">
                                            <input type="hidden" class="form-control1" id="" placeholder="" name="seg" value="<?php print $_GET['id']; ?>">
                                            <input type="text" class="form-control1" id="datepicker" placeholder="" name="fecha">
                                        </div>

                                        <div class="col-sm-2 jlkdfj1">
                                            <p class="help-block"></p>
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <!--inicio de los imput del formulario -->
                                        <label for="focusedinput" class="col-sm-2 control-label">Hora</label>
                                        <div class="col-sm-8">
                                            <input type="text" class="form-control1" id="timepicker" placeholder="" name="hora">
                                        </div>

                                        <div class="col-sm-2 jlkdfj1">
                                            <p class="help-block"></p>
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <!--dos-->
                                        <label for="focusedinput" class="col-sm-2 control-label">Lugar</label>
                                        <div class="col-sm-8">
                                            <input type="text" class="form-control1" id="lugar" placeholder="" name="lugar">
                                        </div>

                                        <div class="col-sm-2 jlkdfj1">
                                            <p class="help-block"></p>
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <label for="problema" class="col-sm-2 control-label">Detecto Problematica</label>
                                        <div class="col-sm-8"><select name="problema" id="problema" class="form-control1">
                                                <option value="0">Selecciona una opcion</option>
                                                <option value="Si">Si</option>
                                                <option value="No">No</option>                                                
                                            </select></div>
                                    </div>
                                    <div class="form-group">
                                        <!--dos-->
                                        <label for="focusedinput" class="col-sm-2 control-label">Materias con Avance</label>
                                        <div class="col-sm-8">
                                            <input type="text" class="form-control1" id="avance" placeholder="" name="avance">
                                        </div>

                                        <div class="col-sm-2 jlkdfj1">
                                            <p class="help-block"></p>
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <label for="selector1" class="col-sm-2 control-label">Motivo</label>
                                        <div class="col-sm-8"><select name="selector1" id="selector1" class="form-control1">
                                                <option value="0">Selecciona una opcion</option>
                                                <option value="1">Problemas Academicos</option>
                                                <option value="2">Problemas Economicos</option>
                                                <option value="3">Canalizacion</option>
                                                <option value="4">Informacion General</option>
                                                <option value="5">Asesoria Academica</option>
                                                <option value="6">Problemas Interpersonales</option>
                                            </select></div>
                                    </div>
                                    <div id="cana">
                                        <div class="form-group"><h5 class="blank">Datos de Canalizacion (Llenar solo si el <strong>Motivo</strong>  es <strong>Canalizacion</strong>)</h5></div>
                                        <div class="form-group">
                                            <!--dos-->
                                            <label for="focusedinput" class="col-sm-2 control-label">Area de Canalizacion</label>
                                            <div class="col-sm-8">
                                                <input type="text" class="form-control1" id="area" placeholder="" name="area">
                                            </div>

                                            <div class="col-sm-2 jlkdfj1">
                                                <p class="help-block"></p>
                                            </div>
                                        </div>
                                        <div class="form-group">
                                            <!--dos-->
                                            <label for="focusedinput" class="col-sm-2 control-label">Encargado</label>
                                            <div class="col-sm-8">
                                                <input type="text" class="form-control1" id="encargado" placeholder="" name="encargado">
                                            </div>

                                            <div class="col-sm-2 jlkdfj1">
                                                <p class="help-block"></p>
                                            </div>
                                        </div>
                                        <div class="form-group">
                                            <!--dos-->
                                            <label for="focusedinput" class="col-sm-2 control-label">Observacion</label>
                                            <div class="col-sm-8">
                                                <input type="text" class="form-control1" id="observacion" placeholder="" name="observacion">
                                            </div>

                                            <div class="col-sm-2 jlkdfj1">
                                                <p class="help-block"></p>
                                            </div>
                                        </div>
                                    </div>
                                    
                                </form>
                                
                                <div class="panel-footer">

                                    <div class="row">
                                        <div class="col-sm-8 col-sm-offset-2">
                                            <button class="btn-success btn" onclick="" id="add">Guardar</button>
                                            <button class="btn-default btn" onclick="regresarSegAlum()">Cancelar</button>
                                            
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