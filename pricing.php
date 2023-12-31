<?php
session_start();


$isLoggedIn = isset($_SESSION['username']);


if ($isLoggedIn && isset($_POST['logout'])) {

    $_SESSION = array();


    session_destroy();

  
    header('Location: index.php');
    exit();
}
?>

<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>BOARD.GG</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootswatch/4.5.2/flatly/bootstrap.min.css">
    <link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=Ubuntu:wght@400;700&display=swap">
    <style>
        body {
            font-family: 'Ubuntu', sans-serif;
        }
    </style>
    <link rel="stylesheet" href="footer.css">
</head>

<body>
    <nav class="navbar navbar-expand-lg navbar-dark bg-primary">
        <a class="navbar-brand" href="index.php">BOARD.GG</a>
        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNav"
            aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarNav">
            <ul class="navbar-nav ml-auto">
                <li class="nav-item">
                    <a class="nav-link" href="games.php">Ver Juegos</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="pricing.php">Planes</a>
                </li>
                <?php
                if ($isLoggedIn) {
                   
                    echo '<li class="nav-item"><a class="nav-link" href="profile.php">' . $_SESSION['username'] . '</a></li>';
                    echo '<form method="post" class="nav-item"><button type="submit" name="logout" class="btn btn-link nav-link">Logout</button></form>';
                } else {
                    
                    echo '<li class="nav-item"><a class="nav-link" href="login.php">Login/Sign-up</a></li>';
                }
                ?>
                <li class="nav-item">
                    <a class="nav-link" href="contact.php">Contactanos</a>
                </li>
            </ul>
        </div>
    </nav>

    <div class="container my-5">
        <h1>BIENVENIDO A BOARD.GG</h1>
        <br>
        <h3>AQUÍ TIENES LOS TIPOS DE CUENTA QUE MANEJAMOS</h3>
        <br>
        <div class="row">
            <div class="col-lg-4 col-md-6 col-sm-12">
                <div class="card mb-4">
                    <img src="https://via.placeholder.com/350x150" class="card-img-top" alt="Card image">
                    <div class="card-body">
                        <h5 class="card-title">CASUAL</h5>
                        <p class="card-text">
                            - Acceso a la mayoría de juegos<br>
                            - Regeneración de fichas (100 fichas/hora)<br>
                            - Una mesa privada diaria<br>
                            - Precio: Gratuito
                        </p>
                    </div>
                </div>
            </div>
            <div class="col-lg-4 col-md-6 col-sm-12">
                <div class="card mb-4">
                    <img src="https://via.placeholder.com/350x150" class="card-img-top" alt="Card image">
                    <div class="card-body">
                        <h5 class="card-title">CRUPIER</h5>
                        <p class="card-text">
                            - Acceso a todos los juegos<br>
                            - Regeneración de fichas (250 fichas/hora)<br>
                            - 5 mesas privadas diarias<br>
                            - Precio: $70 MXM
                        </p>
                    </div>
                </div>
            </div>
            <div class="col-lg-4 col-md-6 col-sm-12">
                <div class="card mb-4">
                    <img src="https://via.placeholder.com/350x150" class="card-img-top" alt="Card image">
                    <div class="card-body">
                        <h5 class="card-title">AZ</h5>
                        <p class="card-text">
                            - Acceso a todos los juegos<br>
                            - Regeneración de fichas (500 fichas/hora)<br>
                            - Mesas privadas ilimitadas<br>
                            - Precio: $110 MXM
                        </p>
                    </div>
                </div>
            </div>
        </div>
        <br>
    </div>
    <footer class="bg-dark text-white text-center py-3">
        <div class="container">
            <p>&copy; 2023 BOARD.GG. Todos los derechos reservados.</p>
        </div>
    </footer>

    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.6/dist/umd/popper.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
</body>

</html>
