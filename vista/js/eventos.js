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

