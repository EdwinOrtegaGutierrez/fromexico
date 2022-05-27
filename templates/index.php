<!DOCTYPE html>
<html lang="en">
<head>
    
    {% block head %}
    <!-- Librerias para correr html -->
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
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

    <svg xmlns="http://www.w3.org/2000/svg" style="display: none;">
        <symbol id="check-circle-fill" fill="currentColor" viewBox="0 0 16 16">
          <path d="M16 8A8 8 0 1 1 0 8a8 8 0 0 1 16 0zm-3.97-3.03a.75.75 0 0 0-1.08.022L7.477 9.417 5.384 7.323a.75.75 0 0 0-1.06 1.06L6.97 11.03a.75.75 0 0 0 1.079-.02l3.992-4.99a.75.75 0 0 0-.01-1.05z"/>
        </symbol>
        <symbol id="info-fill" fill="currentColor" viewBox="0 0 16 16">
          <path d="M8 16A8 8 0 1 0 8 0a8 8 0 0 0 0 16zm.93-9.412-1 4.705c-.07.34.029.533.304.533.194 0 .487-.07.686-.246l-.088.416c-.287.346-.92.598-1.465.598-.703 0-1.002-.422-.808-1.319l.738-3.468c.064-.293.006-.399-.287-.47l-.451-.081.082-.381 2.29-.287zM8 5.5a1 1 0 1 1 0-2 1 1 0 0 1 0 2z"/>
        </symbol>
        <symbol id="exclamation-triangle-fill" fill="currentColor" viewBox="0 0 16 16">
          <path d="M8.982 1.566a1.13 1.13 0 0 0-1.96 0L.165 13.233c-.457.778.091 1.767.98 1.767h13.713c.889 0 1.438-.99.98-1.767L8.982 1.566zM8 5c.535 0 .954.462.9.995l-.35 3.507a.552.552 0 0 1-1.1 0L7.1 5.995A.905.905 0 0 1 8 5zm.002 6a1 1 0 1 1 0 2 1 1 0 0 1 0-2z"/>
        </symbol>
    </svg>

    <!-- Titulo de la pagina -->
    <title>FroMexico</title>

    <!-- Librerias -->
    <link rel="stylesheet" href="/static/css/style.css">

    {% endblock %}
</head>
<body>
    <div class="body m-0 row justify-content-center">
        <nav class="navbar-container navbar navbar-light" style="margin-bottom: 25px;">

            <nav class="navbar navbar-light">
                <div class="container-fluid">
                <h1 style="font-weight: bold;">
                    <img src="/static/img/mexico.png" alt="" width="50" height="50">
                    FroMexico
                </h1>
                </div>
            </nav>
            
            <form class="row" style="margin: 0;"  action="/" method="post">
                <div class="col-auto">
                    <input type="email" class="form-control" name="email" id="email" placeholder="email@gmail.com" required>
                </div>
                <div class="col-auto">
                <input type="password" class="form-control" name="password" id="password" placeholder="Password" required>
                </div>
                <div class="col-auto">
                <button type="submit" class="btn" name="" style="background-color: #198754; color: aliceblue;" 
                            id="login" onclick="validarLogin();">Login</button>
                </div>
            </form>
        </nav>

        
        {% with messages = get_flashed_messages(with_categories=true) %}
            {% if messages %}
                <ul class=flashes>
                {% for category, message in messages %}
                    <div class="alert alert-{{category}}" role="alert">
                        <h4>{{message}}</h4>
                    </div>
                {% endfor %}
                </ul>
            {% endif %}
        {% endwith %}

        <div class="body-center col-auto text-center">
            <h2 style="font-weight: bold;">Sign Up</h2>
            <span>It’s quick and easy.</span>
            <form class="col" action="/" method="post">
                <input type="text" name="name" id="name" class="form-control" placeholder="Name" required>
                <input type="text" name="lastName" id="lastName" class="form-control" placeholder="Last name" required>
                <input type="email" name="newEmail" id="newEmail" class="form-control" placeholder="Email" required>
                <input type="password" name="newPassword" id="newPassword" class="form-control" placeholder="Password" required>
                <select class="form-select" name="cargo" id="cargo" onchange="disabledInput();" required>
                    <option value="" style="background-color: gray;">Tipo de cuenta</option>
                    <option name="1" value="cliente" class="selector">Cliente</option>
                    <option name="2" value="vendedor" class="selector">Vendedor</option>
                    <option name="3" value="admin" class="selector">Administrador</option>
                </select>
                <input type="password" name="codigo" id="codigo" class="form-control" placeholder="Código de Administrador" disabled required>                    
                <input type="submit" name="" id="registrar" class="btn" style="background-color: #198754; color: aliceblue;" 
                        onclick="validarSingUp();">
            </form>
        </div>
        <footer class="text-dark pt-1 pb-1">
            <div class="container text-center text-md-left">
                <div class="row text-center text-md-left">
                    <!-- Cómo se creo la página -->
                    <div class="col col-md-3 col-lg-3 col-xl-3 mx-auto mt-4">
                        <a href="/about"><h5 class="text-uppercase mb-3 font-weight-bold">About us</h5></a>
                        <hr class="mb-4">
                        <p class="text-uppercase mb-3 font-weight-bold">Conoce acerca de la tienda</p>
                    </div>
                    <!-- Nombre, edad, gustos, correo, pasatiempos: lenguajes, habilidades -->
                    <div class="col col-md-3 col-lg-3 col-xl-3 mx-auto mt-4">
                        <a href="/desarrolladores"><h5 class="text-uppercase mb-3 font-weight-bold">Desarrolladores</h5></a>
                        <hr class="mb-4">
                        <p class="text-uppercase mb-3 font-weight-bold">Conoce a los programadores</p>
                    </div>
                </div>
            </div>
        </footer>
    </div>

    {% block footer %}
    <script type="text/javascript" src="{{url_for('static', filename='/script/index.js')}}"></script>
    {% endblock %}
</body>
</html>
