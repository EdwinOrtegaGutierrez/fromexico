{% extends "navbar.php" %}
{% block content %}
  <!-- CONFIGURACIÓN -->
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
    <form class="row" action="/configuracion" method="post">
      <div class="col-12">
        <h1>DATOS GENERALES</h1>
        <hr>
      </div>
      <div class="col-6">
        <h5>Nombres</h5>    
        <input type="text" class="form-control" name="userName" id="userName" placeholder="{{myName}}" disabled>
      </div>
      <div class="col-6">    
        <h5>Apellidos</h5>
        <input type="text" class="form-control" name="userLastName" id="userLastName" placeholder="{{myLastName}}" disabled>
      </div>
      <div class="col-6">    
        <h5>Código de cuenta</h5>
        <input type="password" class="form-control" name="userAccountCode" id="userAccountCode" placeholder="{{myAccountCode}}" disabled>
      </div>
      <div class="col-6">    
        <h5>Nuevo código de cuenta</h5>
        <input type="password" class="form-control" name="newAccountCode" id="newAccountCode" placeholder="{{myAccountCode}}" disabled>
      </div>
      <div style="color: #19875400;">-</div>
      <div class="col-6">
        <button class="btn btn-outline-danger" type="button" onclick="editUser();">Editar Usuario</button>
      </div>
      <div class="col-6">
        <button class="btn btn-outline-info" type="submit">Guardar Datos</button>
      </div>
    </form>
    
    <form class="row" action="/configuracion" method="post">
      <div class="col-12">
        <h1>DATOS DE CONTACTO</h1>
        <hr>
      </div>
      <div class="col-6">
        <h5>Domicilio</h5>
        <input type="text" class="form-control" name="domicilio" id="domicilio" placeholder="{{domicilio}}" disabled>
      </div>
      <div class="col-6">
        <h5>Teléfono</h5>
        <input type="text" class="form-control" name="telefono" id="telefono" placeholder="{{telefono}}" disabled>
      </div>
      <div style="color: #19875400;">-</div>
      <div class="col">
        <button class="btn btn-outline-danger" type="button" onclick="editData();">Editar Datos</button>
      </div>
      <div class="col">
        <button class="btn btn-outline-info" type="submit">Guardar Datos</button>
      </div>
    </form>

    <form class="row" action="/configuracion" method="post">
      <div class="col-12">
        <h1>TIPO DE CUENTA</h1>
        <hr>
      </div>
      <div class="col-6">
        <h5>Tipo de cuenta</h5>
        <select class="form-select" name="newAccount" id="newAccount" disabled>
          <option value="" style="background-color: gray;">Cuenta actual: {{myAccount}}</option>
          <option name="1" value="cliente" class="selector">Cliente</option>
          <option name="2" value="vendedor" class="selector">Vendedor</option>
          <option name="3" value="admin" class="selector">Administrador</option>
      </select>
      </div>
      <div class="col-6">
        <h5>Codigo de Administrador</h5>
        <input type="password" class="form-control" name="adminCode" id="adminCode" placeholder="********" disabled>
      </div>
      
      <div style="color: #19875400;">-</div>
      <div class="col">
        <button class="btn btn-outline-danger" type="button" onclick="editAccount();">Editar Datos</button>
      </div>
      <div class="col">
        <button class="btn btn-outline-info" type="submit">Guardar Datos</button>
      </div>
    </form>

    <form class="row" action="/configuracion" method="post">
      <div class="col-12">
        <h1>Contraseña</h1>
        <hr>
      </div>
      <div class="col-6">    
        <h5>Contraseña actual</h5>
        <input type="password" class="form-control" name="userPassword" id="userPassword" placeholder="{{myPassword}}" disabled>
      </div>
      <div class="col-6">
        <h5>Nueva contraseña</h5>
        <input type="password" class="form-control" name="newPassword" id="newPassword" placeholder="{{myPassword}}" disabled>
      </div>
      <div style="color: #19875400;">-</div>
      <div class="col"> 
        <button class="btn btn-outline-danger" type="button" onclick="editPassword();">Editar Contraseña</button>
      </div>
      <div class="col">
        <button class="btn btn-outline-info" type="submit">Guardar</button>
      </div>
    </form>

    <form class="row" action="/configuracion" method="post">
      <div class="col-12">
        <h1>CREDITO</h1>
        <hr>
      </div>
      <div class="col-12">
        <h5>Numero de targeta</h5>
        <input type="text" class="form-control" name="tarjetaCredito" id="tarjetaCredito" placeholder="{{creditCard}}">
      </div> 
      <div style="color: #19875400;">-</div>
      <div class="col"> 
        <button class="btn btn-outline-warning" type="submit">Agregar tarjeta</button>
      </div>
    </form>
  </div>
  
  <script src="/static/script/configuracion.js"></script>
{% endblock %}