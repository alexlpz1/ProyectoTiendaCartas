<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="../estilos.css">    
    <style>
        .inicio_sesion{
            display: flex;
            justify-content: center;
            align-items: center;
        }
        @font-face {
            font-family: 'MiFuente2';
            src: url('Fuentes/Monomaniac_One/MonomaniacOne-Regular.ttf') format('truetype');
        }
        .inicio_sesion label{
            font-family: 'MiFuente2';
        }
        .inicio_sesion{
            font-family: 'MiFuente2';
        }
        .tabla-info {
            margin: 20px auto;
            border-collapse: collapse;
            font-family: 'MiFuente2';
        }
        .tabla-info th, .tabla-info td {
            border: 1px solid #ddd;
            padding: 8px;
            text-align: left;
        }
        .tabla-info th {
            background-color: #f2f2f2;
        }
        .oculto {
            display: none;
        }
    </style>
</head>
<body>
    <div id="arriba2">🃏 SOBRE DE CARTAS GRATIS EN TU 1º PEDIDO 🃏</div>
    <div id="arriba1">📦 ENVIO GRATIS EN PEDIDOS SUPERIORES A 50€ 📦</div>
    <header>
        <a href="../index.html"><h1>Rincón de las Cartas</h1></a>
        <nav>
            <a href="../pages/pokemon.html">Pokémon</a>
            <a href="../pages/fifa.html">FIFA</a>
            <a href="../pages/nfl.html">VARIEDAD</a>
            <a href="../pages/accesorios.html">Accesorios</a>
            <a href="../pages/cuenta.html">Cuenta</a>
        </nav>
    </header>

    <?php
    if (isset($_GET["nombreTxt"]) && isset($_GET["apellidosTxt"]) && isset($_GET["edad"]) && isset($_GET["emailTxt"]) && isset($_GET["contraseñaTxt"])) {
        $nombre = $_GET["nombreTxt"];
        $apellidos = $_GET["apellidosTxt"];
        $edad = $_GET["edad"];
        $email = $_GET["emailTxt"];
        $contraseña = $_GET["contraseñaTxt"];
        
        // Insertar en la base de datos
        $db_host ="localhost";
        $db_nombre ="ProyectoTienda";
        $db_usuario="root";
        $db_pssw="";
        $conexion = mysqli_connect($db_host, $db_usuario, $db_pssw, $db_nombre) or die("No se pudo conectar: " . mysqli_error($conexion) . "<br>");
        mysqli_set_charset($conexion, "utf8");
        $consulta = "INSERT INTO usuarios (nombre, apellidos, edad, email, contraseña) VALUES ('$nombre', '$apellidos', '$edad', '$email', '$contraseña')";
        $resultado = mysqli_query($conexion, $consulta);
        mysqli_close($conexion);
        
        // Mostrar la tabla con los datos
        echo '<div class="inicio_sesion oculto" id="formularioContainer">';
    } else {
        echo '<div class="inicio_sesion" id="formularioContainer">';
    }
    ?>
        <form action="" method="get" id="registroForm">
            <br>
            <h2>Formulario de registro</h2><br>
            <label for="nombreTxt">Nombre</label><br>
            <input type="text" name="nombreTxt" required id="nombreTxt"><br>
            <label for="apellidosTxt">Apellidos</label><br>
            <input type="text" name="apellidosTxt" required id="apellidosTxt"><br>
            <label for="edad">Edad</label><br>
            <input type="number" name="edad" required id="edad"><br>
            <label for="emailTxt">Correo</label><br>
            <input type="email" name="emailTxt" required id="emailTxt"><br>
            <label for="contraseñaTxt">Contraseña</label><br>
            <input type="password" name="contraseñaTxt" required id="contraseñaTxt"><br><br>
            <input type="submit" value="Enviar">
        </form>
    </div>

    <?php
    if (isset($_GET["nombreTxt"])) {
        echo '<div id="tablaContainer" class="inicio_sesion">
            <table class="tabla-info">
                <thead>
                    <tr>
                        <th>Campo</th>
                        <th>Valor</th>
                    </tr>
                </thead>
                <tbody>
                    <tr>
                        <td>Nombre</td>
                        <td>' . htmlspecialchars($_GET["nombreTxt"]) . '</td>
                    </tr>
                    <tr>
                        <td>Apellidos</td>
                        <td>' . htmlspecialchars($_GET["apellidosTxt"]) . '</td>
                    </tr>
                    <tr>
                        <td>Edad</td>
                        <td>' . htmlspecialchars($_GET["edad"]) . '</td>
                    </tr>
                    <tr>
                        <td>Email</td>
                        <td>' . htmlspecialchars($_GET["emailTxt"]) . '</td>
                    </tr>
                    <tr>
                        <td>Contraseña</td>
                        <td>********</td>
                    </tr>
                </tbody>
            </table>
        </div>';
    } else {
        echo '<div id="tablaContainer" class="oculto"></div>';
    }
    ?>

</body>
</html>