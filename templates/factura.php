{% extends "navbar.php" %}
{% block content %}
  <!--FACTURA-->
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
    <form class="row" action="/factura" method="post">
      <div class="col-12">
        <h1>FACTURAR USUARIO</h1>
        <hr>
      </div>
      <div class="col-6">
        <h5>ID del cliente</h5>    
        <input type="text" class="form-control" name="idCliente" id="idCliente">
      </div>
      <div class="col-6">    
        <h5>Fecha de vencimiento</h5>
        <input type="date" class="form-control" name="vencimiento" id="vencimiento">
      </div>  
      <div style="color: #19875400;">.</div>
      <div class="col">
        <button class="btn btn-outline-info" type="submit" id="agregarDatos">Facturar</button>
      </div>
    </form> 
  </div>

  <div class="myContainer container text-center">
    <div class="invoice">
      <div id="PDF">
        
        <div class="row">
          <div class="col">
            <div class="datos">
              <h1>Factura</h1>
              <hr>
              <div class="text-start">  
                <h6>Cliente: {{clientUser}}</h6>
                <h6>Codigo(s) del pedido: {% for cP in codigoPedido %} {{cP}}, {% endfor %}</h6>
                <h6>Productos: {% for p in productos %} {{p}}, {% endfor %}</h6>
                <h6>Total: {{total}}</h6>
                <h6>Fecha de vencimiento: {{fechaVencimiento}}</h6>
              </div>
            </div>
          </div>
        </div>
    
      </div>
      <div class="row">
        <div class="col-12">
          <form class="d-flex">
            <div class="col">
              <button class="btn btn-outline-info" type="button" onclick="generatePDF()" id="facturar">Descargar</button>
            </div>
          </form>
        </div>
      </div>
    </div>
  </div>  
  <script src="/static/script/factura-PDF.js"></script>
  <script src="/static/script/factura-tablas.js"></script>
{% endblock %}