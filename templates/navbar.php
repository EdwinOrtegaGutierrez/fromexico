<!DOCTYPE html>
<html lang="en">
<head>
      <meta charset="UTF-8">
      <meta http-equiv="X-UA-Compatible" content="IE=edge">
      <meta name="viewport" content="width=device-width, initial-scale=1.0">
      <title>FroMexico</title>

      <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" 
      integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
      <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js" 
      integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" 
      crossorigin="anonymous"></script>
      <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.10.2/dist/umd/popper.min.js" 
      integrity="sha384-7+zCNj/IqJ95wo16oMtfsKbZ9ccEh31eOz1HGyDuCQ6wgnyJNSYdrPa03rtR1zdB" 
      crossorigin="anonymous"></script>
      <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.min.js" 
      integrity="sha384-QJHtvGhmr9XOIpI6YVutG+2QOK9T+ZnN4kzFN1RtK3zEFEIsxhlmWl5/YESvpZ13" 
      crossorigin="anonymous"></script>
      <link rel="stylesheet" href="/static/css/style.css">
</head>
<body>
  <div class="navbar navbar-expand-lg navbar-dark bg-dark">
      <div class="container-fluid">
        <a class="navbar-brand" href="/home"><img src="/static/img/mexico.png" width="50" height="50"> FroMexico</a>
        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNavDropdown" aria-controls="navbarNavDropdown" aria-expanded="false" aria-label="Toggle navigation">
          <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarNavDropdown">
          <ul class="navbar-nav">
            <li class="nav-item">
              <!-- Productos -->
              <a class="nav-link" href="/productos" id="productos">Productos</a>
            </li>
            <li class="nav-item">
              <!-- Precios -->
              <a class="nav-link" href="/agregarProducto" id="agregarProducto">Agregar</a>
            </li>
            <li class="nav-item">
              <!-- Carrito -->
              <a class="nav-link" href="/carrito" id="carrito">Carrito</a>
            </li>
            <li class="nav-item">
              <!-- Carrito -->
              <a class="nav-link" href="/pedido" id="pedido">Pedidos</a>
            </li>
            <li class="nav-item">
              <!-- Factura -->
              <a class="nav-link" href="/factura" id="factura">Factura</a>
            </li>
            <li class="nav-item">
              <!-- Contactos -->
              <a class="nav-link" href="/contactos" id="contactos">Contactos</a>
            </li>
            <li class="nav-item">
              <!-- Configuracion -->
              <a class="nav-link" href="/configuracion" id="configuracion">Configuración</a>
            </li>
            <li class="nav-item">
              <a href="/" class="nav-link">Log Out</a>
            </li>
            <li class="nav-item">
              <p class="nav-link">Credito: {{creditUser}}</p>
            </li>
            <li class="nav-item">
              <p class="nav-link" id="accountTypeUser">Tipo de cuenta: {{accountType}}</p>
            </li>
          </ul>
        </div>
      </div>
    </div>
    {% block content %}
    {% endblock %}
    
    {% block footer %}
    {% endblock %}
</body>
</html>