//variables para ver o no ver la contraseña en el login
const icon = document.getElementById("togglePassword");
let password = document.getElementById("password");

try {
  icon.addEventListener("click", function () {
    //si la contraseña no se ve entonces se muestra la contraseña al presionar el boton ademas de que el ojo se muestra
    if (password.type === "password") {
      password.type = "text";
      icon.innerHTML = '<img src="img/ojo-off.png" style="width:100%;"/>';
    }
    //si la contraseña se ve entonces se esconde la contraseña al presionar el boton ademas de que el ojo se tacha
    else {
      password.type = "password";
      icon.innerHTML = '<img src="img/ojo-on.png" style="width:100%;"/>';
    }
  });
} catch {}

//File upload
const fileInput = document.getElementById("fileInput");
const uploadBtn = document.getElementById("uploadBtn");
const fileName = document.getElementById("fileName");
const dropArea = document.getElementById("dropArea");

try {
  uploadBtn.addEventListener("click", function () {
    fileInput.click();
  });

  fileInput.addEventListener("change", function () {
    if (fileInput.files.length > 0) {
      fileName.textContent = fileInput.files[0].name;
    } else {
      fileName.textContent = "Sin archivo";
    }
  });

  ["dragenter", "dragover", "dragleave", "drop"].forEach((eventName) => {
    dropArea.addEventListener(eventName, preventDefaults, false);
  });

  function preventDefaults(e) {
    e.preventDefault();
    e.stopPropagation();
  }

  ["dragenter", "dragover"].forEach((eventName) => {
    dropArea.addEventListener(eventName, () =>
      dropArea.classList.add("dragover")
    );
  });

  ["dragleave", "drop"].forEach((eventName) => {
    dropArea.addEventListener(eventName, () =>
      dropArea.classList.remove("dragover")
    );
  });

  dropArea.addEventListener("drop", handleDrop, false);

  function handleDrop(e) {
    const dt = e.dataTransfer;
    const files = dt.files;

    if (files.length > 0) {
      fileInput.files = files;
      fileName.textContent = files[0].name;
    }
  }
} catch {}
