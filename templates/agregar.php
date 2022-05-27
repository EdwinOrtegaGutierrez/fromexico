{% extends "navbar.php" %}
{% block content %}
  <!--PRECIOS-->
  <link rel="stylesheet" href="/static/css/extends.css">

  {% if accountType == "admin" %}
    <script src="/static/script/admin.js"></script>
  {% endif %}  
  {% if accountType == "vendedor" %}
    <script src="/static/script/vendedor.js"></script>
  {% endif %}  
  {% if accountType == "cliente" %}
    <script src="/static/script/cliente.js"></script>
  {% endif %}
  <div class="myContainer container text-center">
    <form class="row" action="/agregarProducto" method="post">
      <div class="col-12">
        <h1>PRECIOS Y PRODUCTOS</h1>
        <hr>
      </div>
      <div class="col-6">
        <h5>Producto nuevo</h5>    
        <input type="text" class="form-control" name="productoNuevo" id="productoNuevo">
      </div>
      <div class="col-6">    
        <h5>Precio</h5>
        <input type="text" class="form-control" name="precioNuevo" id="precioNuevo">
      </div>
      <div style="color: #19875400;">.</div>
      <div class="col">
        <button class="btn btn-outline-info" type="submit">Agregar Producto</button>
      </div>
    </form>
     
    
    <form class="row" action="/agregarProducto" method="post">
      <div class="col-12">
        <h1>CAMBIAR PRECIOS</h1>
        <hr>
      </div>
      <div class="col-6">    
        <h5>Producto</h5>
        <input type="text" class="form-control" name="producto" id="producto">
      </div>
      <div class="col-6">    
        <h5>Precio</h5>
        <input type="text" class="form-control" name="precioCambiado" id="precioCambiado">
      </div>
      <div style="color: #19875400;">-</div>
      <div class="col">
        <button class="btn btn-outline-warning" type="submit">Cambiar Precio</button>
      </div>
    </form>

    
    <form class="row" action="/agregarProducto" method="post">
      <div class="col-12">
        <h1>ELIMINAR PRODUCTO</h1>
        <hr>
      </div>
      <div class="col-6">    
        <h5>ID del producto</h5>
        <input type="text" class="form-control" name="idProducto" id="idProducto">
      </div>
      <div class="col-6">    
        <h5>Código de administrador</h5>
        <input type="text" class="form-control" name="codigoAdministrador" id="codigoAdministrador">
      </div>
      <div style="color: #19875400;">-</div>
      <div class="col">
        <button class="btn btn-outline-danger" type="submit">Eliminar Producto</button>
      </div>
    </form>
  </div>  
{% endblock %}