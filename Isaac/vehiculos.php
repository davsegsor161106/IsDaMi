<!DOCTYPE html>
<html lang="es">
<?php
    // Mostrar todos los errores (útil para debugging)
    ini_set('display_errors', 1);
    error_reporting(E_ALL);
    // Conectar a la base de datos
    // Cambiar el servername por el que proceda: localhost, IP, url, …
    $servername = "mysql";
    $username = "usuario";
    $password = "p@ssw0rd";
    $dbname = "alquiler_coches";
    $conn = new mysqli($servername, $username, $password, $dbname);
    // Verificar la conexión
    if ($conn->connect_error) {
    die("Conexión fallida: " . $conn->connect_error);
    }
    ?>
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>DRIVE & GO - Alquiler de Vehículos</title>
    <link rel="stylesheet" href="estilos.css">
</head>
<body>
    <header class="navbar">
        <div class="logo">🚀 DRIVE & GO 🚀</div>
        <nav class="nav-links">
          <a href="vehiculos.php"><b>Vehículos 🚘</b></a>
          <a href="cliente.php">Clientes © </a>
          <a href="gamas.php">Gamas</a>
          <a href="reserva.php">Reservas ✆</a>
        </nav>
    </header>
    
    <main>
        <section class="tabla-vehiculos">
            <h2>Coches Disponibles</h2>
            <table>
                <thead>
                    <tr>
                        <th>Matrícula</th>
                        <th>Modelo</th>
                        <th>Foto</th>
                        <th>CodGama</th>
                        <th>Coste/Día</th>
                    </tr>
                </thead>
                <tbody>
                <?php
                // Consultar los datos
                $sql = "SELECT * FROM coche";
                $result = $conn->query($sql);
                if ($result === false) {
                die("Error en la consulta: " . $conn->error);
                }
                if ($result->num_rows > 0) {
                while($row = $result->fetch_assoc()) {
                echo " <tr>
                <td>{$row['matrícula']}</td>
                <td>{$row['modelo']}</td>
                <td>{$row['foto']}</td>
                <td>{$row['codgama']}</td>
                <td>{$row['coste']}</td>
                </tr>";
                }
                }
                ?>
                    <tr>
                        <td>1234ABC</td>
                        <td>Audi A4</td>
                        <td><img src="audi1.jpg" alt="Audi A4" class="foto-vehiculo"></td>
                        <td>A1</td>
                        <td>50</td>
                    </tr>
                    <tr>
                        <td>5678DEF</td>
                        <td>BMW X5</td>
                        <td><img src="bmw1.jpg" alt="BMW X5" class="foto-vehiculo"></td>
                        <td>B2</td>
                        <td>80</td>
                    </tr>
                    <tr>
                        <td>9876GHI</td>
                        <td>Mercedes Clase C</td>
                        <td><img src="Mercedes1.jpg" alt="Mercedes Clase C" class="foto-vehiculo"></td>
                        <td>C3</td>
                        <td>65</td>
                    </tr>
                </tbody>
            </table>
        </section>
    </main>
</body>
</html>
