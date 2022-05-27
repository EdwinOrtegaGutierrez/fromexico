{% extends "navbar.php" %}
{% block content %}
  <!-- CARRITO -->
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
          <h1>Carrito</h1>
          <hr>
        </div>
      </div>
    </div>
    
    <div class="container bg-dark">
      <div class="row">
        <div class="col-3">
          <table class="table table-dark table-striped" id="dinamicTable">
              <tr class="title">
                  <th width="65px" height="65px">Productos</th>
              </tr>
              <tr>
                {% for p in producto %}
                  <th>{{p}}</th>
                  <tr></tr>
                {% endfor %}
              </tr>
          </table> 
        </div>
        <div class="col-3">
          <table class="table table-dark table-striped" id="dinamicTable">
            <tr class="title">
              <th width="65px" height="65px">Cantidad</th>
            </tr>    
            <tr>
              {% for c in cantidad %}
                <th>{{c}}</th>
                <tr></tr>
              {% endfor %}
            </tr>
          </table>
        </div>
        <div class="col-3">
        <table class="table table-dark table-striped" id="dinamicTable">
            <tr class="title">  
              <th><img src="/static/img/peso.png" alt="" width="50px" height="50px"></th>
            </tr>    
            <tr>
              {% for t in total %}
                <th>${{t}}</th>
                <tr></tr>
              {% endfor %}
            </tr>
          </table>
        </div>
        <div class="col-3">
        <table class="table table-dark table-striped" id="dinamicTable">
            <tr class="title">  
              <th width="65px" height="65px">Entrega</th>
            </tr>    
            <tr>
              {% for e in entrega %}
                <th>{{e}}</th>
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