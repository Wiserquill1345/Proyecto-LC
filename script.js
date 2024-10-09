//variables para ver o no ver la contraseña en el login
const icon = document.getElementById('togglePassword');
let password = document.getElementById('password');

//funcion para el boton de mostrar la contraseña
icon.addEventListener('click', function() {

  //si la contraseña no se ve entonces se muestra la contraseña al presionar el boton ademas de que el ojo se muestra
  if(password.type === "password") {
    password.type = "text";
    icon.innerHTML='<img src="img/ojo-off.png" style="width:100%;"/>'
  }
  //si la contraseña se ve entonces se esconde la contraseña al presionar el boton ademas de que el ojo se tacha
  else {
    password.type = "password";
    icon.innerHTML='<img src="img/ojo-on.png" style="width:100%;"/>'

  }
});