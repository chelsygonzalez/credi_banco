//debido a los required, practicamente el condicional que funciona en este script es el de la validacion de las 
//dos contraseñas
with(document.registro){
	onsubmit = function(e){
		e.preventDefault();
		ok = true;
        //para los nombres
		if(ok && nombres.value==""){
			ok=false;
			alert("Debes escribir tu nombre");
			nombres.focus();
		}
        //para los apellidos
		if(ok && apellidos.value==""){
			ok=false;
			alert("Debe escribir un apellido, no puede ir vacío");
			apellidos.focus();
		}
        //para la identificacion
		if(ok && identificacion.value==""){
			ok=false;
			alert("Debes escribir tu documento de identificación");
			identificacion.focus();
		}
        //para el correo
		if(ok && correo.value==""){
			ok=false;
			alert("Debes escribir una direccion de correo");
			correo.focus();
		}
        //para la contraseña
		if(ok && contraseña.value==""){
			ok=false;
			alert("Debe escribir su password");
			contraseña.focus();
		}
		if(ok && c_contraseña.value==""){
			ok=false;
			alert("Debe reconfirmar su password");
			c_contraseña.focus();
		}



		if(ok && contraseña.value!= c_contraseña.value){
			ok=false;
			alert("Los passwords no coinciden");
			c_contraseña.focus();
		}
		if(ok){ submit(); }
	}
}
