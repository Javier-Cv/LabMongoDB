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
                    <h1 class="brand-name">Consultas</h1>
                    <hr class="tagline-divider">
                </div>
            </div>
        </div>

        <div class="row">
            <div class="box">
                <div class="col-lg-12">
                    <hr>
                    <h2 class="intro-text text-center">Consultas Disponibles
                    </h2>
                    <hr>
                    <hr class="visible-xs">
                    <form method="POST">
                        <h6 class="intro-text text-center">Informacion Pelicula (Titulo)</h6> <input type="text" name="p2pelicula" placeholder="Titulo" class="center-block">
                        <input type="submit" name="titulosubmit" class="center-block"><br>
                        <h6 class="intro-text text-center">Informacion Peliculas (Franquicia)</h6> <input type="text" name="p2franquicia" placeholder="Franquicia" class="center-block">
                        <input type="submit" name="franquiciasubmit" class="center-block"><br>
                        <h6 class="intro-text text-center">Informacion Pelicula (Rango)</h6> <input type="text" name="p2añoinicio" placeholder="año inicio" class="center-block"><input type="text" name="p2añofin" placeholder="año fin" class="center-block">
                        <input type="submit" name="añossubmit" class="center-block"><br>
                        <h6 class="intro-text text-center">Informacion Peliculas (Productora)</h6> <input type="text" name="p2productora" placeholder="Productora" class="center-block">
                        <input type="submit" name="productorasubmit" class="center-block"><br>
                        <h6 class="intro-text text-center">Promedios Peliculas</h6> <input type="text" name="p2productora2" placeholder="Productora" class="center-block">
                        <input type="submit" name="productora2submit" class="center-block"><br>
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
        echo            "<h2 class=\"intro-text text-center\">Peliculas";
        echo            "</h2>";
        echo            "<hr>";
        echo            "<hr class=\"visible-xs\">";
		
		if(isset ($_POST['titulosubmit'])){
			$nombre = $_POST['p2pelicula'];

			$client = new MongoDB\Client;
			$labdb = $client->labdb;
			$pelicollec= $labdb->peliculas;
			$read = $pelicollec->findOne(
			['nombre'=>$nombre]
			);
			print_r($read);
		}
		
		if(isset ($_POST['franquiciasubmit'])){
			$nombre = $_POST['p2franquicia'];

			$client = new MongoDB\Client;
			$labdb = $client->labdb;
			$pelicollec= $labdb->peliculas;
			$read = $pelicollec->find(
			['franquicia'=>$nombre]
			);
			foreach($read as $docs){
			print_r($docs);
			}
		}
		
		if(isset ($_POST['añossubmit'])){
			$nombre = $_POST['p2añoinicio'];
			$nombre2= $_POST['p2añofin'];

			$client = new MongoDB\Client;
			$labdb = $client->labdb;
			$pelicollec= $labdb->peliculas;
			$read = $pelicollec->find(
			['$and'=>[['estreno'=>['$gte'=>$nombre]],['estreno'=>['$lte'=>$nombre2]]]]
			);
			foreach($read as $docs){
			print_r($docs);
			}
		}
		
		if(isset ($_POST['productorasubmit'])){
			$nombre = $_POST['p2productora'];

			$client = new MongoDB\Client;
			$labdb = $client->labdb;
			$pelicollec= $labdb->peliculas;
			$read = $pelicollec->find(
			['productora'=>$nombre],
			['projection' => ['nombre'=>1,'genero'=>2,'estreno'=>3]]
			);
			foreach($read as $docs){
			print_r($docs);
			}
		}
		
		if(isset ($_POST['productora2submit'])){
			$nombre = $_POST['p2productora2'];
			$cantPelis=0;
			$promedio=0;
			$duraciones =[];

			$client = new MongoDB\Client;
			$labdb = $client->labdb;
			$pelicollec= $labdb->peliculas;
			$read = $pelicollec->find(
			['productora'=>$nombre]
			);
			foreach($read as $docs){
			$cantPelis= $cantPelis+1;
			$promedio= $promedio+(int)$docs['duracion'];
			array_push($duraciones,(int)$docs['duracion']);
			}
			print_r("Cantidad de Peliculas => ".(string)$cantPelis."<br>");
			$promedio=$promedio/$cantPelis;
			print_r("Promedio de las Peliculas => ". (string)$promedio."<br>");

			$menor=$duraciones[0];
			$mayor=$duraciones[0];
			foreach($duraciones as $tiempo){
				if($menor>=(int)$tiempo){
					$menor=$tiempo;
				}
			}
			foreach($duraciones as $tiempo){
				if($mayor<=(int)$tiempo){
					$mayor=$tiempo;
				}
			}
			print_r("La pelicula con menor duracion => ".$menor."<br>");
			print_r("La pelicula con mayor duracion => ".$mayor."<br>");
		}
			
        echo        "</div>";
        echo    "</div>";
        echo"</div>";
		//all
		
        ?>

</body>

</html>
