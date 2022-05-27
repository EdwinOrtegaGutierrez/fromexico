var table = document.getElementById("dinamicTable");

class Usuario{
    constructor(producto, cantidad, precio){
        this.producto = producto;
        this.cantidad = cantidad;
        this.precio = precio;
    }
}

function printTable(usuario){
    var row = table.insertRow(-1); //-1 inserta al final de la tabla
    row.id = Math.random(); //id random de la fila

    let array = Object.values(usuario);

    for(let i = 0; i<array.length; i++){
        var celda = row.insertCell(-1);
        celda.innerHTML = array[i];
    }

    var botonEliminar = row.insertCell(-1);
    botonEliminar.innerHTML = "<button class='btn btn-outline-danger' type='button'  id'="+row.id+
                                "' onclick="+"'borrar("+row.id+")'> Eliminar </button>"
}

function agregarProducto(){
    var producto = document.getElementById("producto").value;
    var cantidad = document.getElementById("cantidad").value;
    precioProducto = 0
    var precio = precioProducto;

    let usuario = new Usuario(producto, cantidad, precio);

    printTable(usuario);
}

function borrar(id){
    let row = document.getElementById(id);
    row.parentNode.removeChild(row);
}