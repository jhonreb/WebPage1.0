


document.getElementById("registrarse").onclick = function(event) {
    event.preventDefault(); 
    var loginBody = document.getElementById("form1");
    var registroBody = document.getElementById("form2");
    loginBody.style.display = "none";
    registroBody.style.display = "block";
    
  };
function validarForm() {
  var usuario = document.forms["form1"]["usuario"].value;
  var contrasena = document.forms["form1"]["contrasena"].value;

  if (usuario == "" || contrasena == "") {
    Swal.fire({
      icon: 'error',
      title: 'Oops...',
      text: 'Por favor ingrese un usuario y contraseña válidos',
    });
    return false;
  }
  return true;
}

function validarForm2() {
  var usuario = document.forms["form2"]["usuario"].value;
  var contrasena = document.forms["form2"]["contrasena"].value;

  if (usuario == "" || contrasena == "") {
    Swal.fire({
      icon: 'error',
      title: 'Oops...',
      text: 'Por favor ingrese un usuario y contraseña válidos',
    });
    return false;
  }
  return true;
}
