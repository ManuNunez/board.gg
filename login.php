<?php

session_start();
$username = "";
$json_users = file_get_contents('sources/db/users.json');
$users = json_decode($json_users, true);

if(isset($_GET["username"]) && isset($_GET["pwd"]))
{
    $username = $_GET["username"];
	$pwd = $_GET["pwd"];
	
	if (array_key_exists($username, $users))
    {
		if ($pwd == $users[$username]["pwd"]) 
        {
			$_SESSION["logged"] = true;
			$_SESSION["username"] = $username;
			header("Location: index.php");
			exit();
		}
		else 
		{
			echo "Usuario u  contraseña incorrecta no encontrado";
		}
	}
	else
	{
		echo "Usuario u  contraseña incorrecta no encontrado";
	}
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
    <div class="container mt-5">
        <div class="row justify-content-center">
            <div class="col-md-6">
                <h2 class="mb-4">Iniciar Sesión</h2>
                <form>
                    <div class="form-group">
                        <label for="username">Usuario:</label>
                        <input type="text" class="form-control" id="username" name="username" required>
                    </div>
                    <div class="form-group">
                        <label for="password">Contraseña:</label>
                        <input type="password" class="form-control" id="pwd" name="pwd" required>
                    </div>
                    <button type="submit" class="btn btn-primary">Iniciar Sesión</button>
                </form>
                <br>
                <p>aun no tienes cuenta? <a href="signup.php">REGISTRATE AQUÍ</a></p>
            </div>
        </div>
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