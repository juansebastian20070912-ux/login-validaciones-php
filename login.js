document.getElementById("formulario_login").addEventListener("submit", function(a) {

  let email = document.getElementById("email").value.trim();
  let contrasena = document.getElementById("contrasena").value.trim();

  if (email === "") {
    alert("El correo no puede estar vacío");
    a.preventDefault();
    return;
  }

  if (contrasena === "") {
    alert("La contraseña no puede estar vacía");
    a.preventDefault();
    return;
  }

});