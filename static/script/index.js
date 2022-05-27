var codigoDisabled;
var singUp;

function validarLogin(){
    var email = document.getElementById("email").value;
    var password = document.getElementById("password").value;
    var confirmation = ""+password
    if((email == "") || (confirmation == "")){
        alert("Error al iniciar sesión, por favor verifica que los datos no esten vacios");
    }
}

function disabledInput(){
    var selectBox = document.getElementById("cargo");
    var selectedValue = selectBox.options[selectBox.selectedIndex].value;
    alert(selectedValue);

    if(selectedValue == "cliente"){
        document.getElementById('codigo').disabled = true;
        codigoDisabled = true;
    }
    else{
        document.getElementById('codigo').disabled = false;
        codigoDisabled = false;
    }
}

function validarSingUp(){
    var name = document.getElementById("name").value;
    var lastName = document.getElementById("lastName").value;
    var newEmail = document.getElementById("newEmail").value;
    var newPassword = document.getElementById("newPassword").value;
    var cargo = document.getElementById("cargo").value;
    var codigo = document.getElementById("codigo").value;

    var confirmation1 = ""+newPassword;
    var confirmation2 = ""+codigo;

    if(codigoDisabled == true)
    {
        if ((name == "") || (lastName == "") || (newEmail == "") || (confirmation1 == "") || 
            (cargo == "")){
            alert("Verifica que todos los campos esten completos");
            singUp = false;
        }
        else{
            alert("Tipo de cuenta: "+cargo);
            singUp = true;
        }
    }
    else if (codigoDisabled == false){
        if ((name == "") || (lastName == "") || (newEmail == "") || (confirmation1 == "") || 
            (cargo == "") || (confirmation2 == "")){
            alert("Verifica que todos los campos esten completos");
            singUp = false;
        }
        else{
            alert("Tipo de cuenta: "+cargo);
            singUp = true;
        }
    } else {
        alert("Verifica que todos los campos esten completos");
        singUp = false;
    }
}