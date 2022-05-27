function editUser(){
    document.getElementById("userName").disabled = false;
    document.getElementById("userLastName").disabled = false;
    document.getElementById("userAccountCode").disabled = false;
    document.getElementById("newAccountCode").disabled = false;
    console.log("Habilitar edición");
}

function editAccount(){
    document.getElementById("newAccount").disabled = false;
    document.getElementById("adminCode").disabled = false;
}


function editPassword(){
    document.getElementById("userPassword").disabled = false;
    document.getElementById("newPassword").disabled = false;
}


function editData(){
    document.getElementById("telefono").disabled = false;
    document.getElementById("domicilio").disabled = false;
}