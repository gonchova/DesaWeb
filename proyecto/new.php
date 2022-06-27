<?php

    require_once 'dbconfig.php';
    $conn = new PDO("mysql:host=$host;dbname=$dbname",$username, $password);
 
    if (isset($_POST['crear']) && isset($conn) && isset($_POST['nombre'])) {
            
        $nombre = $_POST['nombre'];
        $apellido = $_POST['apellido'];
        $direccion = $_POST['direccion'];
        $dni = $_POST['dni'];
        $email = $_POST['email'];
        $telefono = $_POST['telefono'];
        $observaciones = $_POST['observaciones'];

        $sql = 'INSERT INTO clientes(nombre, apellido, direccion, dni, email, telefono, observaciones) VALUES(:nombre, :apellido, :direccion, :dni, :email, :telefono, :observaciones)';
        $statement = $conn->prepare($sql);
        if ($statement->execute([':nombre' => $nombre, ':apellido' => $apellido,':direccion' => $direccion,':dni' => $dni,':email' => $email,':telefono' => $telefono, ':observaciones' => $observaciones ])) {
            ?>
            <div class="alert alert-success" role="alert">
                <?php echo 'Registro creado'; ?>
            </div>
            <?php
        }
        else {
            ?>
            <div class="alert alert-danger" role="alert">
                <?php echo 'Algo salió mal, no se creo el registro'; ?>
            </div>
            <?php
            
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
        <h1 class="display-3">Alta de cliente </h1>
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
          <input value=""  type="text" name="nombre" id="nombre" class="form-control" required>
        </div>
        <div class="form-group">
          <label for="apellido">Apellido</label>
          <input value=""  type="text" name="apellido" id="apellido" class="form-control">
        </div>
        <div class="form-group">
          <label for="direccion">Direccion</label>
          <input value=""  type="text" name="direccion" id="direccion" class="form-control">
        </div>
        <div class="form-group">
          <label for="dni">DNI</label>
          <input value=""  type="number" name="dni" id="dni" class="form-control">
        </div>
        <div class="form-group">
          <label for="email">Email</label>
          <input type="email" value="" name="email" id="email" class="form-control">
        </div>
        <div class="form-group">
          <label for="telefono">Telefono</label>
          <input value=""  type="text" name="telefono" id="telefono" class="form-control">
        </div>
        <div class="form-group">
          <label for="observaciones">Observaciones</label>
          <input value=""  type="text" name="observaciones" id="observaciones" class="form-control">
        </div>
        <div class="form-group">
          <button type="submit" class="btn btn-primary my-3" name="crear">Crear</button>
          <a href="index.php"><input class="btn btn-danger my-3" name="volver" type="button" value="Volver"></a>
        </div>
      </form>
    </div>
  </div>
</div>
</body>
</html>
