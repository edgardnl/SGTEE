

function enviarAsignarTutor(id) {
    alert(id);
    location.href = "Asignartutor.php?id=" + id;
}


function regresarTutoresInicio() {

    location.href = "Coordinadora1.php";
}


function agregarCordinador() {
    var datos = "action=agregarAlumnos&" + $("#FormAlumnos").serialize();
    alert(datos);
    $.post("../controlador/AgregarControlAlumnos.php", datos, function (resp) {
    //$.post("../controlador/AgregarControl.php", datos, function (resp) {
        if (resp === "1") {
            alert("Registro Exitoso" + resp);
            location.href = "#";
        } else {
            alert("No se realizo el registro" + resp);
            location.href = "#";
        }

    });
}


function editarAlumnos() {
    
    var r = confirm("Estas seguro de actualizar este registro");
    if (r == true) {
        var datos = "action=editarAlumnos&" + $("#formEditAlumnos").serialize();
        alert(datos);
        //$.post("../controlador/EditarDatosControl.php", datos, function (data) {
        $.post("../controlador/EditarDatosControlAlumnos.php", datos, function (data) {
            alert(data);
            location.href = "Alumnos.php";
        });
    } else if(r == false) {
        return false;
    }

}

function eliminarCoordinador(){
    var r = confirm("Estas seguro de actualizar este registro");
    if (r == true) {
        var datos = "action=eliminarAlumno&" + $("#formEditAlumnos").serialize();
        alert(datos);
        $.post("../controlador/EliminarDatosAlumno.php", datos, function (data) {
            alert(data);
            location.href = "Tutores.php";
        });
    } else if(r == false) {
        return false;
    }
}

