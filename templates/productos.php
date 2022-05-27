{% extends "navbar.php" %}
{% block content %}
  <!--PRODUCTOS-->
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
          Productos
        </h1> 
        <hr>
      </div>
    </div>
    <div class="row">
      <div class="col-6">
        <div class="card">
          <img src="/static/img/microprocesador-1.jpg" class="card-img-top">
          <div class="card-body">
            <h5 class="card-title">{{dic[1]['name']}}</h5>
            <p class="card-text">{{dic[1]['descripcion']}}</p>
            <li class="card-text">Con un precio unico de ${{dic[1]['precio']}} pesos mexicanos</li>
            <hr>
            <button type="button" class="btn btn-outline-warning" data-bs-toggle="modal" data-bs-target="#exampleModal">
              Agregar al carrito
            </button>      
          </div>
        </div>
      </div>
      <div class="col-6">    
        <div class="card">
          <img src="/static/img/microprocesador-2.jpg" class="card-img-top">
          <div class="card-body">
            <h5 class="card-title">{{dic[2]['name']}}</h5>
            <p class="card-text">{{dic[2]['descripcion']}}</p>
            <li class="card-text">Con un precio unico de ${{dic[2]['precio']}} pesos mexicanos</li>
            <hr>
            <button type="button" class="btn btn-outline-warning" data-bs-toggle="modal" data-bs-target="#exampleModal">
              Agregar al carrito
            </button>
          </div>
        </div>
      </div>
    </div>

    <div class="row">
      <div class="col-6">
        
        <div class="card">
          <img src="/static/img/microprocesador-3.jpg" class="card-img-top">
          <div class="card-body">
            <h5 class="card-title">{{dic[3]['name']}}</h5>
            <p class="card-text">{{dic[3]['descripcion']}}</p>
            <li class="card-text">Con un precio unico de ${{dic[3]['precio']}} pesos mexicanos</li>
            <hr>
            <button type="button" class="btn btn-outline-warning" data-bs-toggle="modal" data-bs-target="#exampleModal">
              Agregar al carrito
            </button>
          </div>
        </div>

      </div>
      <div class="col-6">
        
        <div class="card">
          <img src="/static/img/microprocesador-4.jpg" class="card-img-top">
          <div class="card-body">
            <h5 class="card-title">{{dic[4]['name']}}</h5>
            <p class="card-text">{{dic[4]['descripcion']}}</p>
            <li class="card-text">Con un precio unico de ${{dic[4]['precio']}} pesos mexicanos</li>
            <hr>
            <button type="button" class="btn btn-outline-warning" data-bs-toggle="modal" data-bs-target="#exampleModal">
              Agregar al carrito
            </button>
          </div>
        </div>
      </div>
    </div>

    <div class="row">
      <div class="col-6">
        
        <div class="card">
          <img src="/static/img/microprocesador-5.jpg" class="card-img-top">
          <div class="card-body">
            <h5 class="card-title">{{dic[5]['name']}}</h5>
            <p class="card-text">{{dic[5]['descripcion']}}</p>
            <li class="card-text">Con un precio unico de ${{dic[5]['precio']}} pesos mexicanos</li>
            <hr>
            <button type="button" class="btn btn-outline-warning" data-bs-toggle="modal" data-bs-target="#exampleModal">
              Agregar al carrito
            </button>
          </div>
        </div>

      </div>
      <div class="col-6">
        
        <div class="card">
          <img src="/static/img/microprocesador-6.jpg" class="card-img-top">
          <div class="card-body">
            <h5 class="card-title">{{dic[6]['name']}}</h5>
            <p class="card-text">{{dic[6]['descripcion']}}</p>
            <li class="card-text">Con un precio unico de ${{dic[6]['precio']}} pesos mexicanos</li>
            <hr>
            <button type="button" class="btn btn-outline-warning" data-bs-toggle="modal" data-bs-target="#exampleModal">
              Agregar al carrito
            </button>
          </div>
        </div>

      </div>
    </div>

    <div class="row">
      <div class="col-6">
        
        <div class="card">
          <img src="/static/img/microprocesador-7.jpg" class="card-img-top">
          <div class="card-body">
            <h5 class="card-title">{{dic[7]['name']}}</h5>
            <p class="card-text">{{dic[7]['descripcion']}}</p>
            <li class="card-text">Con un precio unico de ${{dic[7]['precio']}} pesos mexicanos</li>
            <hr>
            <button type="button" class="btn btn-outline-warning" data-bs-toggle="modal" data-bs-target="#exampleModal">
              Agregar al carrito
            </button>
          </div>
        </div>

      </div>
      <div class="col-6">
        
        <div class="card">
          <img src="/static/img/Microprocesador-AMD.jpg" class="card-img-top">
          <div class="card-body">
            <h5 class="card-title">{{dic[8]['name']}}</h5>
            <p class="card-text">{{dic[8]['descripcion']}}</p>
            <li class="card-text">Con un precio unico de ${{dic[8]['precio']}} pesos mexicanos</li>
            <hr>
            <button type="button" class="btn btn-outline-warning" data-bs-toggle="modal" data-bs-target="#exampleModal">
              Agregar al carrito
            </button>
          </div>
        </div>

      </div>
      <div class="row">
        <div class="col-6">  
          <div class="card">
            <img src="/static/img/Microprocesador-INTEL.jpg" class="card-img-top">
            <div class="card-body">
              <h5 class="card-title">{{dic[9]['name']}}</h5>
              <p class="card-text">{{dic[9]['descripcion']}}</p>
              <li class="card-text">Con un precio unico de ${{dic[9]['precio']}} pesos mexicanos</li>
              <hr>
              <button type="button" class="btn btn-outline-warning" data-bs-toggle="modal" data-bs-target="#exampleModal">
                Agregar al carrito
              </button>
            </div>
          </div>
        </div>
      </div>
    </div>

    <!-- Modal -->
    <form class="modal fade" id="exampleModal" tabindex="-1" 
        aria-labelledby="exampleModalLabel" aria-hidden="true" action="/productos" method="post">
      <div class="modal-dialog">
        <div class="modal-content bg-dark">
          <div class="modal-header">
            <h5 class="modal-title text-white" id="exampleModalLabel">AGREGANDO AL CARRITO</h5>
            <button type="button" class="btn-close btn-close-white" data-bs-dismiss="modal" aria-label="Close"></button>
          </div>
          <div class="modal-body">
            <div class="row">
              <div class="col">    
                <input type="text" class="form-control" name="producto" id="producto" placeholder="Producto" required>
              </div>
              <div class="col">  
                <input type="number" class="form-control" name="cantidad" id="cantidad" placeholder="Cantidad" required>
              </div>
            </div>
            <select class="form-select" name="entrega" id="entrega" required>
              <option value="" style="background-color: gray;">Modo de entrega</option>
              <option name="1" value="domiciliar" class="selector">Domiciliar</option>
              <option name="2" value="tienda" class="selector">En tienda</option>
            </select>
          </div>
          <div class="modal-footer">
            <button type="button" class="btn btn-warning text-white" data-bs-dismiss="modal">Cancelar</button>
            <button type="submit" class="btn btn-primary text-white">Agregar carrito</button>
          </div>
        </div>
      </div>
    </form>
  </div>
{% endblock %}