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
    <link rel="stylesheet" href="estres.css">
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
        <section class="tablares">
            <h2>Lista Reservas</h2>
            <table>
                <thead>
                    <tr>
                        <th>Código Reserva</th>
                        <th>Fecha Reserva</th>
                        <th>Fecha Inicio</th>
                        <th>Fecha Final</th>
                        <th>Dias</th>
                        <th>Lugar</th>
                        <th>Importe</th>
                        <th>Gama</th>
                        <th>Código Cliente</th>
                        <th>Fecha Devolución</th>
                    </tr>
                </thead>
                <tbody>
                <?php
                // Consultar los datos
                $sql = "SELECT * FROM reserva";
                $result = $conn->query($sql);
                if ($result === false) {
                die("Error en la consulta: " . $conn->error);
                }
                if ($result->num_rows > 0) {
                while($row = $result->fetch_assoc()) {
                echo " <tr>
                <td>{$row['codreserva']}</td>
                <td>{$row['fecha_res']}</td>
                <td>{$row['f_inicio']}</td>
                <td>{$row['f_fin']}</td>
                <td>{$row['dias']}</td>
                <td>{$row['lugar']}</td>
                <td>{$row['importe']}</td>
                <td>{$row['gama']}</td>
                <td>{$row['cod_cliente']}</td>
                <td>{$row['f_devolucion']}</td>
                </tr>";
                }
                }
                ?>
                    <tr>
                        <td>1</td>
                        <td>02-05-2025</td>
                        <td>05-05-2025</td>
                        <td>07-05-2025</td>
                        <td>2</td>
                        <td>Valencia</td>
                        <td>25.00€</td>
                        <td>4 x 4</td>
                        <td>2</td>
                        <td>08-05-2025</td>
                    </tr>
                </tbody>
            </table>
        </section>
    </main>
</body>
</html>
