<!DOCTYPE html>
<html lang="es">
    <head>
        <meta charset="UTF-8">
        <title>Lista de Empleados</title>
    </head>
    <body>
        <h2>Listado de Empleados</h2>
        <form action="" method="GET">
            <label for="email">Buscar</label>
            <input type="text" name="email" placeholder="email" >
            <input type="submit" value="Buscar" />            
        </form>
        <table border="1">
            <thead>
            <th>Name</th>
            <th>Email</th>
            <th>Position</th>
            <th>Salary</th>
            <th></th>
        </thead>
        <tbody>
            <?php
            for ($i = 0; $i < count($lista); $i++) {
                echo '<tr>';
                echo '<td>' . $lista[$i]->name . '</td>';
                echo '<td>' . $lista[$i]->email . '</td>';
                echo '<td>' . $lista[$i]->position . '</td>';
                echo '<td>' . $lista[$i]->salary . '</td>';                  
                echo '<td><a href="ver/' . $lista[$i]->id . '">Ver</a></td>';
                echo '</tr>';
            }
            ?>
        </tbody>
    </table>
</body>
</html>