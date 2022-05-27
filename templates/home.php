{% extends "navbar.php" %}
{% block content %}  
  {% if accountType == "admin" %}
    <script src="/static/script/admin.js"></script>
  {% endif %}  
  {% if accountType == "vendedor" %}
    <script src="/static/script/vendedor.js"></script>
  {% endif %}  
  {% if accountType == "cliente" %}
    <script src="/static/script/cliente.js"></script>
  {% endif %}

  <!-- Publicidad -->
  <div id="carouselExampleCaptions" class="carousel slide" data-bs-ride="carousel">
    <div class="carousel-indicators">
      <button type="button" data-bs-target="#carouselExampleCaptions" data-bs-slide-to="0" class="active" aria-current="true" aria-label="Slide 1"></button>
      <button type="button" data-bs-target="#carouselExampleCaptions" data-bs-slide-to="1" aria-label="Slide 2"></button>
      <button type="button" data-bs-target="#carouselExampleCaptions" data-bs-slide-to="2" aria-label="Slide 3"></button>
      <button type="button" data-bs-target="#carouselExampleCaptions" data-bs-slide-to="3" aria-label="Slide 4"></button>
      <button type="button" data-bs-target="#carouselExampleCaptions" data-bs-slide-to="4" aria-label="Slide 5"></button>
      <button type="button" data-bs-target="#carouselExampleCaptions" data-bs-slide-to="5" aria-label="Slide 6"></button>
      <button type="button" data-bs-target="#carouselExampleCaptions" data-bs-slide-to="6" aria-label="Slide 7"></button>
      <button type="button" data-bs-target="#carouselExampleCaptions" data-bs-slide-to="7" aria-label="Slide 8"></button>
      <button type="button" data-bs-target="#carouselExampleCaptions" data-bs-slide-to="8" aria-label="Slide 9"></button>
      <button type="button" data-bs-target="#carouselExampleCaptions" data-bs-slide-to="9" aria-label="Slide 10"></button>
    </div>
    <div class="carousel-inner">
      <div class="carousel-item active">
        <img src="/static/img/background.png" class="d-block w-100" alt="..." height="620">
        <div class="carousel-caption d-md-block">
          <h1>BIENVENIDO</h1>
        </div>
      </div>
      <div class="carousel-item">
        <img src="/static/img/microprocesador-1.jpg" class="d-block w-100" alt="..." height="620">
        <div class="carousel-caption d-md-block">
          <h5>Microprocesador-1</h5>
          <p>Descubre las maravillas del modelo M1</p>
        </div>
      </div>
      <div class="carousel-item">
        <img src="/static/img/microprocesador-2.jpg" class="d-block w-100" alt="..." height="620">
        <div class="carousel-caption d-md-block">
          <h5>Microprocesador-2</h5>
          <p>Descubre las maravillas del modelo M2</p>
        </div>
      </div>
      <div class="carousel-item">
        <img src="/static/img/microprocesador-3.jpg" class="d-block w-100" alt="..." height="620">
        <div class="carousel-caption d-md-block">
          <h5>Microprocesador-3</h5>
          <p>Descubre las maravillas del modelo M3</p>
        </div>
      </div>
      <div class="carousel-item">
        <img src="/static/img/microprocesador-4.jpg" class="d-block w-100" alt="..." height="620">
        <div class="carousel-caption d-md-block">
          <h5>Microprocesador-3</h5>
          <p>Descubre las maravillas del modelo M3</p>
        </div>
      </div>
      <div class="carousel-item">
        <img src="/static/img/microprocesador-5.jpg" class="d-block w-100" alt="..." height="620">
        <div class="carousel-caption d-md-block">
          <h5>Microprocesador-3</h5>
          <p>Descubre las maravillas del modelo M3</p>
        </div>
      </div>
      <div class="carousel-item">
        <img src="/static/img/microprocesador-6.jpg" class="d-block w-100" alt="..." height="620">
        <div class="carousel-caption d-md-block">
          <h5>Microprocesador-3</h5>
          <p>Descubre las maravillas del modelo M3</p>
        </div>
      </div>
      <div class="carousel-item">
        <img src="/static/img/microprocesador-7.jpg" class="d-block w-100" alt="..." height="620">
        <div class="carousel-caption d-md-block">
          <h5>Microprocesador-3</h5>
          <p>Descubre las maravillas del modelo M3</p>
        </div>
      </div>
      <div class="carousel-item">
        <img src="/static/img/Microprocesador-AMD.jpg" class="d-block w-100" alt="..." height="620">
        <div class="carousel-caption d-md-block">
          <h5>Microprocesador-AMD</h5>
          <p>Descubre las maravillas del M-AMD</p>
        </div>
      </div>
      <div class="carousel-item">
        <img src="/static/img/Microprocesador-INTEL.jpg" class="d-block w-100" alt="..." height="620">
        <div class="carousel-caption d-md-block">
          <h5>Microprocesador-INTEL</h5>
          <p>Descubre las maravillas del M-INTEL</p>
        </div>
      </div>
    </div>
    <button class="carousel-control-prev" type="button" data-bs-target="#carouselExampleCaptions" data-bs-slide="prev">
      <span class="carousel-control-prev-icon" aria-hidden="true"></span>
      <span class="visually-hidden">Previous</span>
    </button>
    <button class="carousel-control-next" type="button" data-bs-target="#carouselExampleCaptions" data-bs-slide="next">
      <span class="carousel-control-next-icon" aria-hidden="true"></span>
      <span class="visually-hidden">Next</span>
    </button>
  </div>
{% endblock %}