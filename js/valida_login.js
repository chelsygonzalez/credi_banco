
// debido a que tenemos un required en los formularios estas validaciones pueden quedar desapercibidas
with(document.login){
	onsubmit = function(e){
		e.preventDefault();
		ok = true;

        //para el correo
		if(ok && correo.value==""){
			ok=false;
			alert("Debes escribir tu correo");
			correo.focus();
		}
		if(ok && contraseña.value==""){
			ok=false;
			alert("Debe escribir su password");
			contraseña.focus();
		}
		if(ok){ submit(); }
	}
}
