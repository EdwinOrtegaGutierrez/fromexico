{% extends "navbar.php" %}
{% block content %}
  <!-- PEDIDOS -->
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
      <div class="col">
        <div class="datos">
          <h1>Pedidos</h1>
          <hr>
        </div>
      </div>
    </div>
    <div class="container bg-dark">
      <div class="row">
        <div class="col-6">
          <table class="table table-dark table-striped" id="dinamicTable">
              <tr class="title">
                  <th width="65px" height="65px">Código del cliente</th>
              </tr>
              <tr>
                {% for user in users %}
                  <th>{{user}}</th>
                  <tr></tr>
                {% endfor %}
              </tr>
          </table> 
        </div>
        <div class="col-6">
          <table class="table table-dark table-striped" id="dinamicTable">
            <tr class="title">
              <th width="65px" height="65px">ID del carrito</th>
            </tr>    
            <tr>
              {% for car in carrito %}
                <th>{{car}}</th>
                <tr></tr>
              {% endfor %}
            </tr>
          </table>
        </div>
      </div>
    </div>
    <div>
      <p><hr width="0"></p>
    </div>
  </div>
{% endblock %}