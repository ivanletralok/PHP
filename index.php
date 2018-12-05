<?php
    require "conexion.php";

    $query = 'select * from colores';

    $setCon = $pdo->prepare($query);
    $setCon->execute();
    $resul = $setCon->fetchALL();

    // var_dump($resul);


    //agregar

    if($_POST){
        $color =  $_POST["color"];
        $descripcion = $_POST["descripcion"];

        $query_inserta = 'insert into colores (color,descripcion) values (?,?)';
        $insertar = $pdo->prepare($query_inserta);
        $insertar->execute(array($color, $descripcion));

        header('location:index.php');
    }

    //editar
    if($_GET){
        $id = $_GET['id'];
        $queryUni = 'select * from colores where id = ?';
        $edit = $pdo->prepare($queryUni);
        $edit->execute(array($id));
        $resultadoU = $edit->fetch();
    }

    //eliminar
    

?>

<!doctype html>
<html lang="en">
  <head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/css/bootstrap.min.css" integrity="sha384-MCw98/SFnGE8fJT3GXwEOngsV7Zt27NXFoaoApmYm81iuXoPkFOJwJ8ERdknLPMO" crossorigin="anonymous">
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.5.0/css/all.css" integrity="sha384-B4dIYHKNBt8Bc12p+WXckhzcICo0wtJAoU8YZTY5qE0Id1GSseTk6S+L3BlXeVIU" crossorigin="anonymous">



    <title>Hello, world!</title>
  </head>
  <body>
    
    <div class="container">
        <div class="row">
            <div class="col-md-6">
            <h3>consultando datos</h3>
                <?php foreach($resul as $data):  ?>
                <div class="alert alert-<?php echo $data['color'] ?> text-uppercase" role="alert" >
                   <?php echo $data['color'] ?>
                   -
                   <?php echo $data['descripcion'] ?>
                   <a href="eliminar.php?id=<?php echo $data['id']?>" class="float-right"> <i class="fas fa-trash"></i> </a>
                   <a href="index.php?id=<?php echo $data['id']?>" class="float-right"> <i class="fas fa-pencil-alt"></i> </a>
                   
                </div>
                <?php endforeach?>
            </div>

            <div class="col-md-6">
            <?php if(!$_GET): ?>
                <h3>Agregando datos</h3>
                    <form method="POST">
                        <input type="text" name="color" class="form-control">
                        <input type="text" name="descripcion" class="form-control">
                        <button type="submit" class="btn btn-primary mt-3">Agregar</button>
                    </form>
            <?php endif ?>
            <?php if($_GET): ?>
                <h3>Editar datos</h3>
                <form method="GET" action="editar.php"> 
                    <input type="hidden"  name="id" value="<?php echo $resultadoU['id']?>">
                    <input type="text" name="color" class="form-control" value="<?php echo $resultadoU['color']?>">
                    <input type="text" name="descripcion" class="form-control" value="<?php echo $resultadoU['descripcion']?>">
                    <button type="submit" class="btn btn-primary mt-3">Editar</button>
                </form>
            <?php endif ?>
            
            </div>
        </div>
    </div>
    <!-- Optional JavaScript -->
    <!-- jQuery first, then Popper.js, then Bootstrap JS -->
    <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.3/umd/popper.min.js" integrity="sha384-ZMP7rVo3mIykV+2+9J3UJ46jBk0WLaUAdn689aCwoqbBJiSnjAK/l8WvCWPIPm49" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/js/bootstrap.min.js" integrity="sha384-ChfqqxuZUCnJSK3+MXmPNIyE6ZbWh2IMqE241rYiqJxyMiZ6OW/JmZQ5stwEULTy" crossorigin="anonymous"></script>
  </body>
</html>