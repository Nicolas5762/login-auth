<!DOCTYPE html>
<html>
<head>
    <h1 style="color: white;">Parcial 2 Corte</h1>
    <title>Login Page</title>
    <meta name="Nombre" content="Nicolas, Alfonso, Manrique, Martinez">
    <meta name="Fecha" content="29-abril-2024">
    <meta name="semestre" content="4">
    <meta name="programa" content="Tec desarrollo de software">
    <meta name="profesor" content="mario porras">
    <!--Made with love by Mutiullah Samim -->
    <!--Bootsrap 4 CDN-->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/css/bootstrap.min.css" integrity="sha384-MCw98/SFnGE8fJT3GXwEOngsV7Zt27NXFoaoApmYm81iuXoPkFOJwJ8ERdknLPMO" crossorigin="anonymous">
    <!--Fontawesome CDN-->
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.3.1/css/all.css" integrity="sha384-mzrmE5qonljUremFsqc01SB46JvROS7bZs3IO2EmfFsd15uHvIt+Y8vEf7N7fWAU" crossorigin="anonymous">
    <!--Custom styles-->
    <link rel="stylesheet" type="text/css" href="{{ asset ('assets/styles.css') }}">
</head>
<body>
    <div class="container">
        <div class="d-flex justify-content-center h-100">
            <div class="card">
                <div class="card-header">
                    <h3>Sign In</h3>
                    <div class="d-flex justify-content-end social_icon">
                        <span><i class="fab fa-facebook-square"></i></span>
                        <span><i class="fab fa-google-plus-square"></i></span>
                        <span><i class="fab fa-twitter-square"></i></span>
                    </div>
                </div>
                <div class="card-body">
                    <form id="loginForm">
                        <div class="input-group form-group">
                            <div class="input-group-prepend">
                                <span class="input-group-text"><i class="fas fa-user"></i></span>
                            </div>
                            <input type="text" class="form-control" placeholder="username" name="username">
                        </div>
                        <div class="input-group form-group">
                            <div class="input-group-prepend">
                                <span class="input-group-text"><i class="fas fa-key"></i></span>
                            </div>
                            <input type="password" class="form-control" placeholder="password" name="password">
                        </div>
                        <div class="row align-items-center remember">
                            <input type="checkbox">Remember Me
                        </div>
                        <div class="form-group">
                            <input type="submit" value="Login" class="btn float-right login_btn">
                        </div>
                    </form>
                    <!-- Mensaje de logueo exitoso -->
                    <div id="loginMessage" style="display: none;" class="alert alert-success" role="alert">
                        ¡Has iniciado sesión correctamente!
                    </div>
                    <!-- Mensaje de contraseña corta -->
                    <div id="passwordLengthMessage" style="display: none;" class="alert alert-danger" role="alert">
                        La contraseña debe tener al menos 8 caracteres.
                    </div>
                </div>
                <div class="card-footer">
                    <div class="d-flex justify-content-center links">
                        ¿No tienes una cuenta? <a href="{{ route('register') }}">Regístrate</a>
                    </div>
                    <div class="d-flex justify-content-center">
                        <a href="#">¿Olvidaste tu contraseña?</a>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- jQuery CDN -->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
    <!-- Bootstrap JS -->
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/js/bootstrap.min.js" integrity="sha384-ChfqqxuZUCnJSK3+MXmPNIyE6ZbWh2IMqE241rYiqJxyMiZ6OW/JmZQ5stwEULTy" crossorigin="anonymous"></script>
    <script>
        $(document).ready(function() {
            $('#loginForm').submit(function(event) {
                event.preventDefault(); // Evitar que el formulario se envíe normalmente

                // Obtener la contraseña
                var password = $('input[name="password"]').val();

                // Verificar la longitud de la contraseña
                if (password.length < 8) {
                    $('#passwordLengthMessage').show(); // Mostrar el mensaje de contraseña corta
                    return; // Detener la ejecución del resto del código
                }

                // Simulación de inicio de sesión exitoso con nombre de usuario "Nicolas"
                var username = $('input[name="username"]').val();
                if (username === "Nicolas") {
                    $('#loginMessage').show(); // Mostrar el mensaje de logueo exitoso
                    localStorage.setItem('loggedInUser', username); // Almacenar el usuario logueado en localStorage
                    $('#loggedInUser').text("¡Bienvenido, " + username + "!");
                    $('#logoutButton').show();
                }
            });

            // Manejador de clic para el botón de salir de la sesión
            $('#logoutButton').click(function() {
                localStorage.removeItem('loggedInUser'); // Eliminar el usuario logueado de localStorage
                location.reload(); // Recargar la página para simular cerrar sesión
            });

            // Comprobar si hay un usuario logueado al cargar la página
            var loggedInUser = localStorage.getItem('loggedInUser');
            if (loggedInUser) {
                $('#loggedInUser').text("¡Bienvenido, " + loggedInUser + "!");
                $('#logoutButton').show();
            }
        });
    </script>
    <!-- Encabezado para mostrar el usuario logueado y botón de salir de la sesión -->
    <div id="loggedInHeader" style="text-align: center; margin-top: 20px;">
        <h4 id="loggedInUser"></h4>
        <button id="logoutButton" style="display: none;" class="btn btn-danger">Salir de sesión</button>
    </div>
</body>
</html>
