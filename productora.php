<!DOCTYPE html>
<html lang="en">

<head>

    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>LabMongo</title>
    <link href="css/bootstrap.min.css" rel="stylesheet">
    <link href="css/business-casual.css" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css?family=Open+Sans:300italic,400italic,600italic,700italic,800italic,400,300,600,700,800" rel="stylesheet" type="text/css">
    <link href="https://fonts.googleapis.com/css?family=Josefin+Slab:100,300,400,600,700,100italic,300italic,400italic,600italic,700italic" rel="stylesheet" type="text/css">
</head>

<body>
    <div class="brand">LabMongoDB</div>
    <!-- Navigation -->
    <nav class="navbar navbar-default" role="navigation">
        <div class="container">
            <!-- Brand and toggle get grouped for better mobile display -->
            <div class="navbar-header">
                <button type="button" class="navbar-toggle" data-toggle="collapse" data-target="#bs-example-navbar-collapse-1">
                    <span class="sr-only">Toggle navigation</span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                </button>
                <!-- navbar-brand is hidden on larger screens, but visible when the menu is collapsed -->
                <a class="navbar-brand" href="index.php">LabMongoDB</a>
            </div>
            <!-- Collect the nav links, forms, and other content for toggling -->
            <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
                <ul class="nav navbar-nav">
                    <li><a href="index.php">Inicio</a></li>
                </ul>
            </div>
        </div>
    </nav>

    <div class="container">

        <div class="row">
            <div class="box">
                <div class="col-lg-12 text-center">
                    <h2 class="brand-before">
                        <small>Registro</small>
                    </h2>
                    <h1 class="brand-name">Productoras</h1>
                    <hr class="tagline-divider">
                </div>
            </div>
        </div>

        <div class="row">
            <div class="box">
                <div class="col-lg-12">
                    <hr>
                    <h2 class="intro-text text-center">Informacion a Registrar
                    </h2>
                    <hr>
                    <hr class="visible-xs">
                    <form action="productora.php" method="POST">
                        <h5 class="intro-text text-center">¿Desea Registrar? (y/n)</h5> <input type="text" name="proregistro" class="center-block"><br>
                        <h6 class="intro-text text-center">Nombre:</h6> <input type="text" name="pronombre" class="center-block"><br>
                        <h6 class="intro-text text-center">Año Fundacion:</h6> <input type="text" name="proaño" class="center-block"><br>
                        <h6 class="intro-text text-center">Sitio Web:</h6> <input type="text" name="prositio" class="center-block"><br>
                        <input type="submit" name="bsubmit" class="center-block"><br>
                    </form>
                </div>
            </div>
        </div>
		
		<div class="row">
            <div class="box">
                <div class="col-lg-12">
                    <hr>
                    <h2 class="intro-text text-center">Productora a Eliminar
                    </h2>
                    <hr>
                    <hr class="visible-xs">
                    <form action="productora.php" method = "POST">
                        <h5 class="intro-text text-center">¿Desea Eliminar? (y/n)</h5> <input type="text" name="peliminar" class="center-block"><br>
						<h6 class="intro-text text-center">Nombre:</h6> <input type="text" name="peliminarnombre" class="center-block"><br>
                        <input type="submit" name="beliminarsubmit" class="center-block"><br>
                    </form>
                </div>
            </div>
        </div>
		
		<div class="row">
            <div class="box">
                <div class="col-lg-12">
                    <hr>
                    <h2 class="intro-text text-center">Actualizar Productora
                    </h2>
                    <hr>
                    <hr class="visible-xs">
                    <form action="productora.php" method = "POST">
                        <h5 class="intro-text text-center">¿Desea Actualizar? (y/n)</h5> <input type="text" name="pupd" class="center-block"><br>
						<h6 class="intro-text text-center">Productora a Actualizar (Nombre):</h6> <input type="text" name="pupdnombre" class="center-block"><br>
						<h5 class="intro-text text-center">Valores a Actualizar:</h6><br>
                        <h6 class="intro-text text-center">Año Fundacion:</h6> <input type="text" name="pupdgenero" class="center-block"><br>
                        <h6 class="intro-text text-center">Sitio Web:</h6> <input type="text" name="pupdactores" class="center-block"><br>
                        <input type="submit" name="bupdsubmit" class="center-block"><br>
                    </form>
                </div>
            </div>
        </div>

    </div>
    <!-- /.container -->

    <footer>
        <div class="container">
            <div class="row">
                <div class="col-lg-12 text-center">
                    <p>Gracias por usar mi sistema. </p>
                </div>
            </div>
        </div>
    </footer>

    <!-- jQuery -->
    <script src="js/jquery.js"></script>

    <!-- Bootstrap Core JavaScript -->
    <script src="js/bootstrap.min.js"></script>

    <!-- Script to Activate the Carousel -->
    <script>
    </script>
    <?php
        // put your code here
		require 'vendor/autoload.php'; 
		
		//find
		echo "<div class=\"row\">";
        echo    "<div class=\"box\">";
        echo        "<div class=\"col-lg-12\">";
        echo            "<hr>";
        echo            "<h2 class=\"intro-text text-center\">Productoras";
        echo            "</h2>";
        echo            "<hr>";
        echo            "<hr class=\"visible-xs\">";
		$clientr = new MongoDB\Client;
		$labdbr = $clientr->labdb;
		$pelicollecr= $labdbr->productoras;
		$read = $pelicollecr->find();
		foreach($read as $docs){
			print_r($docs);
			}
        echo        "</div>";
        echo    "</div>";
        echo"</div>";
		//all
		
		if(isset ($_POST['bsubmit'])){
				$registro = $_POST['proregistro'];
				if(strcmp($registro,"y")==0){
				$nombre = $_POST['pronombre'];
				$year = $_POST['proaño'];
				$sitio = $_POST['prositio'];
				
				$client = new MongoDB\Client;
				$labdb = $client->labdb;
				$producollec= $labdb->productoras;
				$insertOneResult = $producollec->insertOne(
				['nombre' => $nombre,'fundacion'=>$year, 'sitioWeb'=>$sitio]
				);
			}
		}
		
		if(isset ($_POST['beliminarsubmit'])){
			$eliminar = $_POST['peliminar'];
			if(strcmp($eliminar,"y")==0){
				$nombreeliminar = $_POST['peliminarnombre'];
				
				$client = new MongoDB\Client;
				$labdb = $client->labdb;
				$pelicollec= $labdb->productoras;
				$deleteresult = $pelicollec->deleteOne(
				['nombre'=>$nombreeliminar]
				);
			}
		}
		
		if(isset ($_POST['bupdsubmit'])){
			$actua = $_POST['pupd'];
			if(strcmp($actua,"y")==0){
				$nombreupd = $_POST['pupdnombre'];
				$generoupd = $_POST['pupdgenero'];
				$actoresupd = $_POST['pupdactores'];
				
				$client = new MongoDB\Client;
				$labdb = $client->labdb;
				$pelicollec= $labdb->productoras;
				$updateresult = $pelicollec->updateOne(
				['nombre'=>$nombreupd],
				['$set'=>['fundacion' => $generoupd,'sitioWeb'=>$actoresupd]]
				);
			}
		}
        ?>

</body>

</html>
