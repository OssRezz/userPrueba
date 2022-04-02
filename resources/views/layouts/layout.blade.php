<!doctype html>
<html lang="en">

<head>
    <meta name="csrf-token" content="{{ csrf_token() }}" />
    <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />

    <!-- Jquery -->
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>


    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" />

    <!-- FontAwesome-->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.1.0/css/all.min.css" />

    <title>@yield('title')</title>
</head>

<body class="bg-light">
    <nav class="navbar navbar-white shadow-sm bg-white">
        <div class="container-fluid">
            <a class="navbar-brand text-danger">IDCORP</a>
            <form action="login/logout" method="POST">
                @csrf
                <button class="btn btn-outline-primary" href="#" onclick="this.closest('form').submit()"
                    id="btn-salir">Cerrar
                    sesion <i class="fas fa-sign-out-alt"></i></button>
            </form>
        </div>
    </nav>
    <div id="respuesta"></div>
    @yield('content')


    <!-- Bootstrap js -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js"></script>
</body>

</html>
