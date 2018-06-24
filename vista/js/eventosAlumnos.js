

function enviarEditarAlumnos(id) {
    alert(id);
    location.href = "EditarAlumnos.php?id=" + id;
}

function regresarAlumnosInicio() {

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
            location.href = "Alumnos.php";
        });
    } else if(r == false) {
        return false;
    }

}

function enviaridCoordinador(id){
    alert(id);
    location.href = "AgregarCoordindor.php?id=" + id;
}

function agregarCoordinador() {
    var datos = "action=agregarCoordinador&" + $("#FormCoordinador").serialize();
    alert(datos);
    $.post("../controlador/AgregarControlCoordinadorRelacion.php", datos, function (resp) {
    //$.post("../controlador/AgregarControl.php", datos, function (resp) {
        if (resp === "1") {
            alert("Registro Exitoso" + resp);
            location.href = "Coordinadora1_relacion.php";
        } else {
            alert("No se realizo el registro" + resp);
            location.href = "Coordinadora1_relacion.php";
        }

    });
}
function EnviarEditarCoordinadorR(id) {
    alert(id);
    location.href = "CordEditarCoordinador.php?id=" + id;
}

function EditarCoordinador() {
    
    var r = confirm("Estas seguro de actualizar este registro");
    if (r == true) {
        var datos = "action=EditarCoordinador&" + $("#formEditCoordinador").serialize();
        alert(datos);
        //$.post("../controlador/EditarDatosControl.php", datos, function (data) {
        $.post("../controlador//EditarDatosControlCoordinador.php", datos, function (data) {
            alert(data);
            location.href = "Coordinadora1.php";
        });
    } else if(r == false) {
        return false;
    }

}

function EliminarCoordinador(){
    var r = confirm("Estas seguro de eliminar este registro");
    if (r == true) {
        alert("se cumplio");
        var datos = "action=eliminarCoordinador&" + $("#formEditCoordinador").serialize();
        alert(datos);
        $.post("../controlador/EliminarCoordinador.php", datos, function (data) {
            alert(data);
            location.href = "Coordinadora1.php";
        });
    } else if(r == false) {
        alert("no se cumple");
        return false;
    }
}
function eliminarsinmvc(id) {
    alert(id);
    location.href = "eliminarCR.php?id=" + id;
}

