<!DOCTYPE html>
<html lang="es">
<?php
    // Mostrar todos los errores (útil para debugging)
    ini_set('display_errors', 1);
    error_reporting(E_ALL);
    // Conectar a la base de datos
    // Cambiar el servername por el que proceda: localhost, IP, url, …
    $servername = "mysql";
    $username = "asirweb";
    $password = "qwe_123";
    $dbname = "webasir";
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
    <link rel="stylesheet" href="estgama.css">
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
        <section class="tablagam">
            <h2>Gamas Vehiculos</h2>
            <table>
                <thead>
                    <tr>
                        <th>Código de Gama</th>
                        <th>Nombre</th>
                        <th>Stock</th>
                        <th>Precio</th>
                        <th>Combustible</th>
                        <th>Motor</th>
                        <th>Plazas</th>
                        <th>Maletas</th>
                    </tr>
                </thead>
                <tbody>
                    <tr>
                        <td>T1</td>
                        <td>4 x 4</td>
                        <td>2</td>
                        <td>23,00€</td>
                        <td>E</td>
                        <td>A</td>
                        <td>7</td>
                        <td>4</td>
                    </tr>
                    <tr>
                        <td>L1</td>
                        <td>Lujo</td>
                        <td>4</td>
                        <td>28,00€</td>
                        <td>E</td>
                        <td>M</td>
                        <td>5</td>
                        <td>3</td>
                    </tr>
                    <tr>
                        <td>F1</td>
                        <td>Familiar</td>
                        <td>8</td>
                        <td>22,00€</td>
                        <td>H</td>
                        <td>A</td>
                        <td>7</td>
                        <td>5</td>
                    </tr>
                </tbody>
            </table>
        </section>
    </main>
</body>
</html>