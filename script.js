const icon = document.getElementById('togglePassword');
let password = document.getElementById('password');

icon.addEventListener('click', function() {
  if(password.type === "password") {
    password.type = "text";
    icon.innerHTML='<img src="img/ojo-off.png" style="width:100%;"/>'
  }
  else {
    password.type = "password";
    icon.innerHTML='<img src="img/ojo-on.png" style="width:100%;"/>'

  }
});