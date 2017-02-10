<!DOCTYPE html>
<html lang="es">
    <head>
        <meta charset="UTF-8">
        <title>Detalle de Empleado</title>
    </head>
    <body>	
        <table border="0">
            <?php
            echo '<tr><td style="font-weight:bold;">Name: </td><td>' . $obj->name . '</td></tr>';

            echo '<tr><td style="font-weight:bold;">Email: </td><td>' . $obj->email . '</td></tr>';

            echo '<tr><td style="font-weight:bold;">Phone: </td><td>' . $obj->phone . '</td></tr>';

            echo '<tr><td style="font-weight:bold;">Address: </td><td>' . $obj->address . '</td></tr>';

            echo '<tr><td style="font-weight:bold;">Position: </td><td>' . $obj->position . '</td></tr>';

            echo '<tr><td style="font-weight:bold;">Salary: </td><td>' . $obj->salary . '</td></tr>';

            echo '<tr><td style="font-weight:bold;">Skills: </td><td>';
            echo '<ul>';
            for ($i = 0; $i < count($obj->skills); $i++) {
                echo '<li>' . $obj->skills[$i]['skill'] . '</li>';
            }
            echo '</ul></td></tr>';
            ?>
        </table>
        <a href="../">Regresar</a>
    </body>
</html>