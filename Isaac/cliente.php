<!DOCTYPE html>
<html lang="es">
<?php
    // Mostrar todos los errores (útil para debugging)
    ini_set('display_errors', 1);
    error_reporting(E_ALL);
    // Conectar a la base de datos
    // Cambiar el servername por el que proceda: localhost, IP, url, …
    $servername = "127.0.0.1";
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
    <link rel="stylesheet" href="estcli.css">
</head>
<body>
    <header class="navbar">
        <div class="logo">🚀 DRIVE & GO 🚀</div>
        <nav class="nav-links">
            <a href="vehiculos.html"><b>Vehículos 🚘</b></a>
            <a href="cliente.html">Clientes © </a>
            <a href="gamas.html">Gamas</a>
            <a href="reserva.html">Reservas ✆</a>
        </nav>
    </header>
    
    <main>
        <section class="tablacli">
            <h2>Lista Clientes</h2>
            <table>
                <thead>
                    <tr>
                        <th>Código</th>
                        <th>Nombre</th>
                        <th>Apellido</th>
                        <th>Dirección</th>
                        <th>Mail</th>
                    </tr>
                </thead>
                <tbody>
                <?php
                // Consultar los datos
                $sql = "SELECT * FROM cliente";
                $result = $conn->query($sql);
                if ($result === false) {
                die("Error en la consulta: " . $conn->error);
                }
                if ($result->num_rows > 0) {
                while($row = $result->fetch_assoc()) {
                echo " <tr>
                <td>{$row['codcli']}</td>
                <td>{$row['nombre']}</td>
                <td>{$row['apellido']}</td>
                <td>{$row['direccion']}</td>
                <td>{$row['mail']}</td>
                </tr>";
                }
                }
                ?>
                    <tr>
                        <td>1</td>
                        <td>Vicente</td>
                        <td>Valverde</td>
                        <td>Calle Mayor N4</td>
                        <td>v.valverde@gmail.com</td>
                    </tr>
                    <tr>
                        <td>2</td>
                        <td>Manuel</td>
                        <td>Domínguez</td>
                        <td>Calle Blasco Ibañez N2</td>
                        <td>m.d.m@gmail.com</td>
                    </tr>
                </tbody>
            </table>
        </section>
    </main>
</body>
</html>
