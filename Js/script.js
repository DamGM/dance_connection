// Carusel de imagenes
const swiper = new Swiper(".swiper", {
    autoplay: {
        delay: 3000,
      },
     
    slidesPerview:1,
    spaceBetween: 100,
    grabCursor: true,
    loop:true,
    breakpoints:{
       991: { 
        slidesPerview:3
       }
    }

});

//inicio de sesión
document.addEventListener("DOMContentLoaded", function() {
    var formLog = document.getElementById("formLogin");

    formLog.addEventListener("submit", function(event) {
        event.preventDefault();

        const email = document.getElementById("email").value;
        const password = document.getElementById("password").value;

        //simulación de inicio de sesión

        if (email === "usuario@exmaple.com" && password === "12345") {
            alert("Iniciando sesión")
        //va a su sesion
        } else {
            alert("email o contrasña incorrecta")
        }
    });
});

let content;
if (isLoggedIn) {
  content = <AdminPanel />;
} else {
  content = <LoginForm />;
}
return (
  <div>
    {content}
  </div>
);


// Calendario de eventos