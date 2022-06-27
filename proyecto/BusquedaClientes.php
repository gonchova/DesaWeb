<?php
require_once 'dbconfig.php';

try {

$conn = new PDO("mysql:host=$host;dbname=$dbname",$username, $password);

// Realizamos la consulta SQL
$sql = 'SELECT idcliente, nombre, apellido, direccion, dni, email, telefono, observaciones
        FROM clientes';
if (isset($_POST['textoBusqueda'])){
    if ($_POST['textoBusqueda'] != '')
    {$sql = $sql . ' WHERE '.$_POST['filtro'].' LIKE \'%' . $_POST['textoBusqueda']. '%\''; 
    }
}

$resultados = $conn->query($sql);

$resultados->setFetchMode(PDO::FETCH_ASSOC);

} catch (PDOException $p) {
 die("No se ha podido conectar a las BD $dbname :" . $p->getMessage());
}


?>
<!DOCTYPE html>
<html>
<head><meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
    <title>Listado de clientes</title>
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous"></script>
</head>

<header>
    <div class="row d-flex justify-content-center">
        <div class="col d-flex justify-content-center  bg-warning">
            <h1 class="display-3">Busqueda de Clientes</h1>
        </div>
    </div>
</header>
<body>
<div class="row d-flex">
    <div class="col col-12 d-flex bg-warning">
		<div class="col justify-content-start col-sm-4">
			<a href="index.php"><input class="btn btn-primary my-3 mx-3" name="volver" type="button" value="Volver"></a>
		</div>
        <form action="BusquedaClientes.php" method="POST">
        <div class="form-group row">
			
            <div class="col justify-content-center px-8">
                <label for="Filtro">
                    <select class="form-select form-select-lg  btn-secondary btn-md " name="filtro">
                        <option value="nombre">Nombre</option>
                        <option value="apellido">Apellido</option>
                        <option value="dni">Dni</option>
                        <option value="idcliente">Idcliente</option>
                    </select>
            
                </label>
        		<label for="textoBusqueda">
					<input type="text" class="form-control"  name="textoBusqueda"  id="textoBusqueda" autofocus>
				</label>
				<button class="btn  btn-primary my-3 mx-3" type="submit" name ="submit" onclick="">Buscar</button>
			</div>
        </div>
        
        </form>
    </div>
</div>
<tbody>
        <table class="table table-striped">
            <thead>
                <tr>
                <th scope="col">#</th>
                <th scope="col">Nombre</th>
                <th scope="col">Apellido</th>
                <th scope="col">Direccion</th>
                <th scope="col">Dni</th>
                <th scope="col">Email</th>
                <th scope="col">Telefono</th>
                <th scope="col">Observaciones</th>
                <th scope="col" style="width: 15%"></th>                              
                </tr>
            </thead>
            
            <form name="clientes" method="POST">
                <?php 
                    while ($row = $resultados->fetch()): 
                ?>
                <tr>
                    <th scope="row"><?php echo htmlspecialchars($row['idcliente'])?></th>
                    <td><?php echo htmlspecialchars($row['nombre'])?></td>
                    <td><?php echo htmlspecialchars($row['apellido']); ?></td>
                    <td><?php echo htmlspecialchars($row['direccion']); ?></td>
                    <td><?php echo htmlspecialchars($row['dni'])?></td>
                    <td><?php echo htmlspecialchars($row['email']); ?></td>
                    <td><?php echo htmlspecialchars($row['telefono']); ?></td>
                    <td><?php echo htmlspecialchars($row['observaciones']); ?></td>
                    <td>
                       <a class="btn btn-warning btn-sm" type="submit" href="update.php?idcliente=<?php echo $row['idcliente'].'&nombre='.$row['nombre'].'&apellido='.$row['apellido'].'&direccion='.$row['direccion'].'&dni='.$row['dni'].'&telefono='.$row['telefono'].'&email='.$row['email'].'&observaciones=' .$row['observaciones'];?>">Editar</a>
                       <a class="btn btn-danger btn-sm" type="submit" name ="eliminar" href="delete.php?idcliente=<?php echo $row['idcliente'];?>">Eliminar</a>
                    </td>

                </tr>
                <?php  endwhile; ?>
            </form>  
        </tbody>
    </table>
</body>
</html>
