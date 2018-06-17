function validar(FormAlumnos){
//validar campo con numeros.
	//matricula
var ok="yes";
var temp;
var valid="0123456789";
var valor2=document.FormAlumnos.matricula.value;
for (var i=0; i<valor2.length; i++){
	temp=""+valor2.substring(i,i+1);
	if(valid.indexOf(temp)=="-1"){
		ok="no";
	}
	if(ok=="no"){
alert("Debe ingresar solo numeros en el campo teléfono")
document.FormAlumnos.matricula.focus();
return false;
	}
	
}


//validacion campos texto
	//nombre
var ok1="yes";
var temp1;
var valid1=" abcdefghijklmnñopqrstuvwxyzABCDEFGHIJKLMNÑOPQRSTUVWXYZáéíóúÁÉÍÓÚ";
var valor3=document.FormAlumnos.nombre.value;
for (var i=0; i<valor3.length; i++){
	temp1=""+valor3.substring(i,i+1);
	if(valid1.indexOf(temp1)=="-1"){
		ok="no";
	}
	if(ok=="no"){
alert("Debe ingresar solo letras en el campo nombre")
document.FormAlumnos.nombre.focus();
return false;
	}
	
}

	//apellido paterno
	var ok1="yes";
var temp1;
var valid1=" abcdefghijklmnñopqrstuvwxyzABCDEFGHIJKLMNÑOPQRSTUVWXYZáéíóúÁÉÍÓÚ";
var valor3=document.FormAlumnos.ap_p.value;
for (var i=0; i<valor3.length; i++){
	temp1=""+valor3.substring(i,i+1);
	if(valid1.indexOf(temp1)=="-1"){
		ok="no";
	}
	if(ok=="no"){
alert("Debe ingresar solo letras en el campo apellido paterno")
document.FormAlumnos.ap_p.focus();
return false;
	}
	
}

	//apellido materno
var ok1="yes";
var temp1;
var valid1=" abcdefghijklmnñopqrstuvwxyzABCDEFGHIJKLMNÑOPQRSTUVWXYZáéíóúÁÉÍÓÚ";
var valor3=document.FormAlumnos.ap_m.value;
for (var i=0; i<valor3.length; i++){
	temp1=""+valor3.substring(i,i+1);
	if(valid1.indexOf(temp1)=="-1"){
		ok="no";
	}
	if(ok=="no"){
alert("Debe ingresar solo letras en el campo apellido materno")
document.FormAlumnos.ap_m.focus();
return false;
	}
	
}
	//grupo
var ok1="yes";
var temp;
var valid="0123456789";
var valor2=document.FormAlumnos.grupo.value;
for (var i=0; i<valor2.length; i++){
	temp=""+valor2.substring(i,i+1);
	if(valid.indexOf(temp)=="-1"){
		ok1="no";
	}
	if(ok1=="no"){
alert("Debe ingresar solo numeros en el campo teléfono")
document.FormAlumnos.grupo.focus();
return false;
	}
	
}

	//carrera
		var ok1="yes";
var temp1;
var valid1=" abcdefghijklmnñopqrstuvwxyzABCDEFGHIJKLMNÑOPQRSTUVWXYZáéíóúÁÉÍÓÚ";
var valor3=document.FormAlumnos.carrera.value;
for (var i=0; i<valor3.length; i++){
	temp1=""+valor3.substring(i,i+1);
	if(valid1.indexOf(temp1)=="-1"){
		ok="no";
	}
	if(ok=="no"){
alert("Debe ingresar solo letras en el campo quien otorga la beca")
document.FormAlumnos.carrera.focus();
return false;
	}
}

	//telefono
var ok1="yes";
var temp;
var valid="0123456789";
var valor2=document.FormAlumnos.telefono.value;
for (var i=0; i<valor2.length; i++){
	temp=""+valor2.substring(i,i+1);
	if(valid.indexOf(temp)=="-1"){
		ok="no";
	}
	if(ok=="no"){
alert("Debe ingresar solo numeros en el campo teléfono")
document.FormAlumnos.telefono.focus();
return false;
	}
	
}
	//telefono cel
var ok1="yes";
var temp;
var valid="0123456789";
var valor2=document.FormAlumnos.telefono_cel.value;
for (var i=0; i<valor2.length; i++){
	temp=""+valor2.substring(i,i+1);
	if(valid.indexOf(temp)=="-1"){
		ok="no";
	}
	if(ok=="no"){
alert("Debe ingresar solo numeros en el campo teléfono")
document.FormAlumnos.telefono_cel.focus();
return false;
	}
	
}
//semestre
var ok1="yes";
var temp1;
var valid1=" abcdefghijklmnñopqrstuvwxyzABCDEFGHIJKLMNÑOPQRSTUVWXYZáéíóúÁÉÍÓÚ";
var valor3=document.FormAlumnos.semestre.value;
for (var i=0; i<valor3.length; i++){
	temp1=""+valor3.substring(i,i+1);
	if(valid1.indexOf(temp1)=="-1"){
		ok="no";
	}
	if(ok=="no"){
alert("Debe ingresar solo letras en el campo zona indigena")
document.FormAlumnos.semestre.focus();
return false;
	}

}

//correo
var ok1="yes";
var temp1;
var valid1=" abcdefghijklmnñopqrstuvwxyzABCDEFGHIJKLMNÑOPQRSTUVWXYZáéíóúÁÉÍÓÚ_@-.1234567890";
var valor3=document.FormAlumnos.correo.value;
for (var i=0; i<valor3.length; i++){
	temp1=""+valor3.substring(i,i+1);
	if(valid1.indexOf(temp1)=="-1"){
		ok="no";
	}
	if(ok=="no"){
alert("Debe ingresar solo letras en el campo zona indigena")
document.FormAlumnos.correo.focus();
return false;
	}

}
//sexo
var ok1="yes";
var temp1;
var valid1=" abcdefghijklmnñopqrstuvwxyzABCDEFGHIJKLMNÑOPQRSTUVWXYZáéíóúÁÉÍÓÚ";
var valor3=document.FormAlumnos.sexo.value;
for (var i=0; i<valor3.length; i++){
	temp1=""+valor3.substring(i,i+1);
	if(valid1.indexOf(temp1)=="-1"){
		ok="no";
	}
	if(ok=="no"){
alert("Debe ingresar solo letras en el campo zona indigena")
document.FormAlumnos.sexo.focus();
return false;
	}

}

//contraseña
var ok1="yes";
var temp1;
var valid1=" abcdefghijklmnñopqrstuvwxyzABCDEFGHIJKLMNÑOPQRSTUVWXYZáéíóúÁÉÍÓÚ1234567890";
var valor3=document.FormAlumnos.contrasena.value;
for (var i=0; i<valor3.length; i++){
	temp1=""+valor3.substring(i,i+1);
	if(valid1.indexOf(temp1)=="-1"){
		ok="no";
	}
	if(ok=="no"){
alert("Debe ingresar solo letras en el campo zona indigena")
document.FormAlumnos.contrasena.focus();
return false;
	}

}
//confirmar contraseña
var ok1="yes";
var temp1;
var valid1=" abcdefghijklmnñopqrstuvwxyzABCDEFGHIJKLMNÑOPQRSTUVWXYZáéíóúÁÉÍÓÚ123456789";
var valor3=document.FormAlumnos.confirmar_contrasena.value;
for (var i=0; i<valor3.length; i++){
	temp1=""+valor3.substring(i,i+1);
	if(valid1.indexOf(temp1)=="-1"){
		ok="no";
	}
	if(ok=="no"){
alert("Debe ingresar solo letras en el campo zona indigena")
document.FormAlumnos.confirmar_contrasena.focus();
return false;
	}

}	
var fecha_formulario=document.datos_Personales.fecha_Nac.value;
var fecha_hoy=new Date();

if (hecha_hoy>=fecha_formulario) {
	alert("La fecha es correcta")
	return true;
}

else{
	alert("La fecha introducida es demasiado reciente")
	return false;
}

}
