const open = document.getElementById('open');
const modal_container = document.getElementById('modal_container');
const Close = document.getElementById('Close');


//preparamos el evento click
//agregar
open.addEvenListener('click', () => {
    modal_container.classList.add('show');
    alert("Funcionando");
});


//remover
close.addEvenListener('click', () => {
    modal_container.classList.remove('show');
    alert("Funcionando");
});