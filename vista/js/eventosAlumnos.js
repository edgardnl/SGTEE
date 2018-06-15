

function enviarEditarAlumnos(id) {
    alert(id);
    location.href = "EditarAlumnos.php?id=" + id;
}

function regresarTutoresInicio() {

    location.href = "Alumnos.php";
}


function agregarAlumnos() {
    var datos = "action=agregarAlumnos&" + $("#FormAlumnos").serialize();
    alert(datos);
    $.post("../controlador/AgregarControlAlumnos.php", datos, function (resp) {
    //$.post("../controlador/AgregarControl.php", datos, function (resp) {
        if (resp === "1") {
            alert("Registro Exitoso" + resp);
            location.href = "Alumnos.php";
        } else {
            alert("No se realizo el registro" + resp);
            location.href = "Alumnos.php";
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

function eliminarAlumnos(){
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

