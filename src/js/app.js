document.addEventListener('DOMContentLoaded',function(){
    eventListeners();
    darkMode();
});

function darkMode(){
    const prefiereDarkMode = window.matchMedia('(prefers-color-scheme: dark)');
    if(prefiereDarkMode.matches){
        document.body.classList.add('dark-mode');
    }else{
        document.body.classList.remove('dark-mode');
    }
    prefiereDarkMode.addEventListener('change',()=>{
        if(prefiereDarkMode.matches){
            document.body.classList.add('dark-mode');
        }else{
            document.body.classList.remove('dark-mode');
        }
    });
    const botonDarkMode = document.querySelector('.dark-mode-boton');
    botonDarkMode.addEventListener('click',() => {
        document.body.classList.toggle('dark-mode');
    });
}

function eventListeners(){
    const mobileMenu=document.querySelector('.mobile-menu');
    mobileMenu.addEventListener('click',navegacionResponsive);
    //Muestra campos condicionales
    const metodoContacto = document.querySelectorAll('input[name="contacto[contacto]"]');
    metodoContacto.forEach(input=>input.addEventListener("click",mostrarMetodosContacto));
    // metodoContacto.addEventListener("click",mostrarMetodosContacto);
    
}

function navegacionResponsive(){
    const navegacion = document.querySelector('.navegacion');
    // if(navegacion.classList.contains('mostrar')){
    //     navegacion.classList.remove('mostrar');
    // }else{
    //     navegacion.classList.add('mostrar');
    // }
    navegacion.classList.toggle('mostrar');
}

function mostrarMetodosContacto(e){
    const contactoDiv = document.querySelector("#contacto");
    if(e.target.value==="telefono"){
         contactoDiv.innerHTML = `
                <p></p>         
                <label for="telefono">Número de Teléfono</label>
                <input id="telefono" type="tel" placeholder="Tu teléfono" name="contacto[telefono]">
                <p>Elija la fecha y la hora para la llamada</p>
                <label for="fecha">Fecha</label>
                <input id="fecha" type="date" name="contacto[fecha]">
                <label for="hora">Hora</label>
                <input id="hora" type="time" min="09:00" max="18:00" name="contacto[hora]">
         `;
    }else{
        contactoDiv.innerHTML = `
                <p></p>
                <label for="email">E-mail</label>
                <input id="email" type="email" placeholder="Tu email" name="contacto[email]" required>
         `;
    }
}