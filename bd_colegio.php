<?php
// Conexión a la base de datos
$conexion = new mysqli("localhost", "root", "", "bd_colegio");

// Verificar conexión
if ($conexion->connect_error) {
    die("Error de conexión: " . $conexion->connect_error);
}

// Consulta para obtener todos los registros
$sql = "SELECT * FROM personas";
$resultado = $conexion->query($sql);

// Mostrar los datos en una tabla HTML
echo "<h2>Listado de Personas</h2>";

if ($resultado->num_rows > 0) {
    echo "<table border='1' cellpadding='8' cellspacing='0'>";
    echo "<tr>
            <th>ID</th>
            <th>Nombre</th>
            <th>Apellido</th>
            <th>Correo</th>
            <th>Teléfono</th>
            <th>Fecha de Nacimiento</th>
            <th>Ciudad</th>
            <th>Promedio</th>
          </tr>";

    while ($fila = $resultado->fetch_assoc()) {
        echo "<tr>";
        echo "<td>" . $fila["id"] . "</td>";
        echo "<td>" . $fila["nombre"] . "</td>";
        echo "<td>" . $fila["apellido"] . "</td>";
        echo "<td>" . $fila["correo"] . "</td>";
        echo "<td>" . $fila["telefono"] . "</td>";
        echo "<td>" . $fila["fecha_nacimiento"] . "</td>";
        echo "<td>" . $fila["ciudad"] . "</td>";
        echo "<td>" . $fila["promedio"] . "</td>";
        echo "</tr>";
    }

    echo "</table>";
} else {
    echo "No hay registros en la tabla.";
}

// Cerrar conexión
$conexion->close();
?>

<style>
        body {
            background-color: #b15674ff;
            color: #e0e0e0;
            font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;
            margin: 0;
            padding: 30px;
        }
        .container {
            max-width: 1000px;
            margin: auto;
            background-color: #1e1e1eff;
            padding: 25px 30px;
            border-radius: 10px;
            box-shadow: 0 0 20px #000;
        }
        h2 {
            text-align: center;
            margin-bottom: 25px;
            font-weight: 700;
            color: #0e2f6bff;
        }
        table {
            width: 100%;
            border-collapse: collapse;
            border-radius: 8px;
            overflow: hidden;
        }
        th, td {
            padding: 14px 18px;
            border-bottom: 1px solid #333;
            text-align: left;
        }
        th {
            background-color: #333;
            color: #bb86fc;
            text-transform: uppercase;
            letter-spacing: 0.07em;
        }
        tr:hover {
            background-color: #8b2b2bff;
            cursor: default;
        }
        p {
            text-align: center;
            font-size: 18px;
            color: #888;
            margin-top: 40px;
        }
    </style>
