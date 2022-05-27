{% extends "navbar.php" %}
{% block content %}
  <!-- CONTACTOS -->
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
    <div class="row">
      <div class="col-12">
        <h1>
          Contactos
        </h1> 
        <hr>
      </div>
    </div>
    <div class="row">
      <div class="col-4">  
        <div class="card">
          <img src="/static/img/edwin1.png" class="card-img-top" alt="...">
          <div class="card-body">
            <h5 class="card-title">Ortega Edwin</h5>
            <p class="card-text">Correo electronico: eddyded49@gmail.com</p>
            <p class="card-text">Teléfono celular: +52 3326526756</p>
            <p class="card-text">Programador full stack</p>
          </div>
        </div>
      </div>
      <div class="col-4">  
        <div class="card">
          <img src="/static/img/alan1.png" class="card-img-top" alt="...">
          <div class="card-body">
            <h5 class="card-title">Cervantes Alan</h5>
            <p class="card-text">Correo electronico: alanelecer10@gmail.com</p>
            <p class="card-text">Teléfono celular: +52 3314487207</p>
            <p class="card-text">Administrador de la base de datos</p>
          </div>
        </div>
      </div>
      <div class="col-4">  
        <div class="card">
          <img src="/static/img/Marcos1.png" class="card-img-top" alt="...">
          <div class="card-body">
            <h5 class="card-title">Esquivel Marcos</h5>
            <p class="card-text">Correo electronico: <br> marcosesquivelgalvan8@gmail.com</p>
            <p class="card-text">Teléfono celular: +52 3330213840</p>
            <p class="card-text">Consultor de la base de datos</p>
          </div>
        </div>
      </div>
    </div>
  </div>
{% endblock %}