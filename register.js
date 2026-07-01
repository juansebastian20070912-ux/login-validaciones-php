document.getElementById("formulario_registro").addEventListener("submit", function(a) { 
  console.log("Formulario enviado");
  let nombre = document.getElementById("nombre").value.trim(); 
  let apellido = document.getElementById("apellido").value.trim();
  let email = document.getElementById("email").value.trim();
  let documento = document.getElementById("documento").value.trim();
  let telefono = document.getElementById("telefono").value.trim();
  let fecha = document.getElementById("fecha_nacimiento").value;
  let generoSeleccionado = document.querySelector('input[name="genero"]:checked');
  let contrasena = document.getElementById("contrasena").value.trim();

  if (nombre === "") { 
    alert("El nombre de usuario no puede estar vacio"); 
    a.preventDefault(); 
    return;
  } 

  if (apellido === "") { 
    alert("El apellido no puede estar vacio"); 
    a.preventDefault(); 
    return; 
  } 

  if (email === "") { 
    alert("El correo no puede estar vacio"); 
    a.preventDefault(); 
    return; 
  }

  if (documento === "") {
    alert("El documento no puede estar vacío");
    a.preventDefault();
    return;
  }

  if (telefono === "") {
    alert("El teléfono no puede estar vacío");
    a.preventDefault();
    return;
  }

  if (fecha === "") {
    alert("Debes seleccionar tu fecha de nacimiento");
    a.preventDefault();
    return;
  }

  if (generoSeleccionado === null) {
    alert("Debes seleccionar un género");
    a.preventDefault();
    return;
  }

  if (contrasena === "") {
    alert("La contraseña no puede estar vacía");
    a.preventDefault();
    return;
  }

  if (contrasena.length < 8) {
    alert("La contraseña debe tener mínimo 8 caracteres");
    a.preventDefault();
    return;
  }

});


// Esto está AFUERA del submit, al mismo nivel:

let inputContrasena = document.getElementById("contrasena");

inputContrasena.addEventListener("input", function() {
  let valor = inputContrasena.value;

  let tieneLongitud = valor.length >= 8;
  let tieneLetra = /[a-zA-Z]/.test(valor);
  let tieneNumero = /[0-9]/.test(valor);
  let tieneEspecial = /[^a-zA-Z0-9]/.test(valor);

  actualizarRequisito("req-longitud", tieneLongitud);
  actualizarRequisito("req-letra", tieneLetra);
  actualizarRequisito("req-numero", tieneNumero);
  actualizarRequisito("req-especial", tieneEspecial);
});

function actualizarRequisito(id, cumplido) {
  let parrafo = document.getElementById(id);
  let circulo = parrafo.querySelector(".circulo");

  if (cumplido) {
    parrafo.classList.add("cumplido");
    circulo.textContent = "✓";
  } else {
    parrafo.classList.remove("cumplido");
    circulo.textContent = "";
  }
}