<?php

    require_once 'dbconfig.php';
    $conn = new PDO("mysql:host=$host;dbname=$dbname",$username, $password);

    $idCliente=$_GET['idcliente'];
 
    if (isset ($idCliente) && isset($_POST['actualizar']) ) {
        echo "entre ".  $idCliente. ' '.$_POST['apellido'];
        
        $sentencia = $conn->prepare("UPDATE clientes SET nombre = ?, apellido = ? , direccion = ?, dni = ?, email = ?, telefono = ?, observaciones = ? WHERE idcliente = ?;");
        $resultado = $sentencia->execute([$_POST['nombre'], $_POST['apellido'],$_POST['direccion'],$_POST['dni'],$_POST['email'],$_POST['telefono'], $_POST['observaciones'], $idCliente], ); # Pasar en el mismo orden de los ?

        if ($resultado === true) {

            header('location:BusquedaClientes.php', 'refresh');
            
        } else {
            echo "Algo salió mal.";
        }

    }
?>

<!DOCTYPE html>
<html>
<head><meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
    <title>Listado de clientes</title>
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous"></script>
</head>

<body>

<header>
    <div class="row d-flex justify-content-center">
        <div class="col d-flex justify-content-center  bg-warning">
        <h1 class="display-3">Modificacion de cliente id: <?php echo $idCliente ?></h1>
    </div>
    </div>
</header>
<div class="container">
  <div class="card mt-5">
    <div class="card-header">
      <h3>Datos</h3>
    </div>
    <div class="card-body">
      <form method="POST">
        <div class="form-group">
          <label for="nombre">Nombre</label>
          <input value="<?php echo $_GET['nombre']; ?>"  type="text" name="nombre" id="nombre" class="form-control">
        </div>
        <div class="form-group">
          <label for="apellido">Apellido</label>
          <input value="<?php echo $_GET['apellido']; ?>"  type="text" name="apellido" id="apellido" class="form-control">
        </div>
        <div class="form-group">
          <label for="direccion">Direccion</label>
          <input value="<?php echo $_GET['direccion']; ?>"  type="text" name="direccion" id="direccion" class="form-control">
        </div>
        <div class="form-group">
          <label for="dni">DNI</label>
          <input value="<?php echo $_GET['dni']; ?>"  type="number" name="dni" id="dni" class="form-control">
        </div>
        <div class="form-group">
          <label for="email">Email</label>
          <input type="email" value="<?php echo $_GET['email']; ?>" name="email" id="email" class="form-control">
        </div>
        <div class="form-group">
          <label for="telefono">Telefono</label>
          <input value="<?php echo $_GET['telefono']; ?>"  type="number" name="telefono" id="telefono" class="form-control">
        </div>
        <div class="form-group">
          <label for="observaciones">Observaciones</label>
          <input value="<?php echo $_GET['observaciones']; ?>"  type="text" name="observaciones" id="observaciones" class="form-control">
        </div>
        <div class="form-group">
          <button type="submit" class="btn btn-primary my-3" name="actualizar">Actualizar</button>
          <a href="BusquedaClientes.php"><input class="btn btn-danger my-3" name="volver" type="button" value="Volver"></a>
        </div>
      </form>
    </div>
  </div>
</div>




</body>
</html>
