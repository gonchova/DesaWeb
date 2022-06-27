<?php

   require_once 'dbconfig.php';

   if(isset($_GET['idcliente'])){
        
     try {
        $conn = new PDO("mysql:host=$host;dbname=$dbname",$username, $password);
        ////////////// Eliminar registro de la tabla /////////
        $consulta = 'DELETE FROM clientes WHERE idcliente=:id';
        $sql = $conn->prepare($consulta);
        $id=trim($_GET['idcliente']);
        $sql -> bindParam(':id', $id, PDO::PARAM_INT);
            
        $sql->execute();
   
        } catch (PDOException $p) {
            die("No se ha podido conectar a las BD $dbname :" . $p->getMessage());
        }
    
           if($sql->rowCount() > 0)
        {
        ?>
            <!DOCTYPE html>
            <html>
            <head><meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
                <title>Listado de clientes</title>
                <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
                <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous"></script>
            </head>
            <body>
                <h2 class="my-3 mx-3">Registro eliminado</h2>
                <a href="BusquedaClientes.php"><input class="btn btn-primary my-3 mx-3" name="volver" type="button" value="Volver"></a>
            </body>
        <?php
        }
        else{
            echo "<div class='content alert alert-danger'> No se pudo eliminar el registro  </div>";
            print_r($sql->errorInfo()); 
        }
    }
?>


