
function ingresar() {
    var datos = "action=login&" + $("#login").serialize();
    //alert(datos);
    console.log(datos);    
    $.post("../controlador/IngresarControl.php", datos, function(data) {        
        console.log(data);
        alert(data);
        location.href=""+data;
    });
    
}


