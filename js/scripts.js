
// ventana modal
//aqui le damos la animacion de cierre y tambien el target fuera de la seccion
        let cerrar = document.querySelectorAll(".close")[0];
        let abrir = document.querySelectorAll(".cta")[0];
        let modal = document.querySelectorAll(".modal")[0];
        let modalC = document.querySelectorAll(".modal-container")[0];



        abrir.addEventListener("click", function abrir(e){
            e.preventDefault();
            modalC.style.opacity = "1";
            modalC.style.visibility = "visible";
            //cada que se seleccione va a quitar o a poner la clase
            modal.classList.toggle("modal-close");

        })

        cerrar.addEventListener("click", function cerrar(){
            modal.classList.toggle("modal-close");

            //para que no desaparezca todo de golpe
            setTimeout(function(){
                modalC.style.opacity = "0";
                modalC.style.visibility = "hidden";
            },850)
        })

        window.addEventListener("click", function(e){
            console.log(e.target)
            if(e.target == modalC){

                modal.classList.toggle("modal-close");

                //para que no desaparezca todo de golpe
                setTimeout(function(){
                modalC.style.opacity = "0";
                modalC.style.visibility = "hidden";
            },900)   
            }
        })







//Ejecutando funciones
//Scripts para los formularios
document.getElementById("btn__iniciar-sesion").addEventListener("click", iniciarSesion);
document.getElementById("btn__registrarse").addEventListener("click", register);
window.addEventListener("resize", anchoPage);

//Declarando variables
var formulario_login = document.querySelector(".formulario_login");
var formulario_register = document.querySelector(".formulario_register");
var contenedor_login_register = document.querySelector(".contenedor_login_register");
var caja_trasera_login = document.querySelector(".caja__trasera-login");
var caja_trasera_register = document.querySelector(".caja__trasera-register");

    //FUNCIONES

function anchoPage(){

    if (window.innerWidth > 850){
        caja_trasera_register.style.display = "block";
        caja_trasera_login.style.display = "block";
    }else{
        caja_trasera_register.style.display = "block";
        caja_trasera_register.style.opacity = "1";
        caja_trasera_login.style.display = "none";
        formulario_login.style.display = "block";
        contenedor_login_register.style.left = "0px";
        formulario_register.style.display = "none";   
    }
}

anchoPage();


    function iniciarSesion(){
        if (window.innerWidth > 850){
            formulario_login.style.display = "block";
            contenedor_login_register.style.left = "10px";
            formulario_register.style.display = "none";
            caja_trasera_register.style.opacity = "1";
            caja_trasera_login.style.opacity = "0";
        }
        else {
            formulario_login.style.display = "block";
            contenedor_login_register.style.left = "0px";
            formulario_register.style.display = "none";
            caja_trasera_register.style.display = "block";
            caja_trasera_login.style.display = "none";
        }
    }

    function register(){
        if (window.innerWidth > 850){
            formulario_register.style.display = "block";
            contenedor_login_register.style.left = "410px";
            formulario_login.style.display = "none";
            caja_trasera_register.style.opacity = "0";
            caja_trasera_login.style.opacity = "1";
        }
        else {
            formulario_register.style.display = "block";
            contenedor_login_register.style.left = "0px";
            formulario_login.style.display = "none";
            caja_trasera_register.style.display = "none";
            caja_trasera_login.style.display = "block";
            caja_trasera_login.style.opacity = "1";
        }
}

