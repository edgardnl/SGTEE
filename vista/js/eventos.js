function enviarEditarTutor(id) {
    alert(id);
    location.href = "EditarTutores.php?id=" + id;
}

function regresarTutoresInicio() {

    location.href = "Tutores.php";
}

function agregarTutores() {
    var datos = "action=agregarTutor&" + $("#FormTutores").serialize();
    alert(datos);
    $.post("../controlador/AgregarControl.php", datos, function (resp) {
        console.log(resp);
        location.href = "Tutores.php";
    });
}

function editarTutores() {
    
    var r = confirm("Estas seguro de actualizar este registro");
    if (r == true) {
        var datos = "action=editarTutor&" + $("#formEdit").serialize();
        alert(datos);
        $.post("../controlador/EditarDatosControl.php", datos, function (data) {
            alert(data);
            location.href = "Tutores.php";
        });
    } else if(r == false) {
        return false;
    }

}

function eliminarTutor(){
    var r = confirm("Estas seguro de eliminar este registro");
    if (r == true) {
        var datos = "action=eliminarTutor&" + $("#formEdit").serialize();
        alert(datos);
        $.post("../controlador/EliminarDatos.php", datos, function (data) {
            alert(data);
            location.href = "Tutores.php";
        });
    } else if(r == false) {
        return false;
    }
}

function buscarTutor(){
    var datos = $('#focusedinput').val();
    alert(datos);
}

function enviarMostrarActiv(id){
    alert(id);
    location.href = "MostrarActividadesAlumnos.php?id=" + id;
}

function regresarActividadesAlumnos(){
    location.href = "ConsultaActividades.php";
}

function enviarDetalleAlu(id){
    alert(id);
    location.href = "TutoAlumnosDetalle.php?id=" + id;
}

function regresarTutorAlumnos(){
    location.href ="TutoAlumnos.php";
}

function regresarSegAlum(){
    location.href="TutoSeguimientoAlumnos.php";
}

function enviarSeguimiento(id){
    alert(id);
    location.href = "TutoSeguimientoTutorial.php?id=" + id;   
}

function agregaActividad(){
    var datos = "action=agregarActividad&" + $("#FormActividades").serialize();
    alert(datos);
    $.post("../controlador/AgregarControl.php", datos, function(resp) {
        console.log(resp);
        location.href = "";
    });   
}

function regresarTutoSeg(){
    location.href = "TutoSeguimientoAlumnos.php";
}

function addActividad(id){
    alert(id);
    location.href = "TutoAgregarActividad.php?id=" + id;   
}

function enviarCanaliza(id){
    alert(id);
    location.href = "TutoCanalizacionDetalle.php?id=" + id;
}

function enviarEdicionAct(id){
   alert(id) ;
   location.href = "TutoEditarActividad.php?id=" + id;
}

function enviarScoreAlu(id){
    alert(id) ;
   location.href = "TutoAlumnosCalificacionesIndividual.php?id=" + id;   
}

function regresarAlumnosAvance(){
    location.href = "TutoCalificacionesAlumnos.php";   
}

function agregarCalificaciones(id){
    alert(id);
    location.href = "TutoAgregarCalificaciones.php?id="+id;
}

function regresarCalifica(){
    window.history.go(-1);
}

function enviarEdicionCal(id){
    location.href = "TutoEditaCalificaciones.php?id="+id;
}