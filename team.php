<?php require("config.php"); ?>
<html>
<head>
	<meta charset="UTF-8" />
	<meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1"> 
	<link rel="stylesheet" type="text/css" href="css/normalize.css" />
	<link rel="stylesheet" type="text/css" href="css/demo.css" />
	<link rel="stylesheet" type="text/css" href="css/icons.css" />
	<link rel="stylesheet" type="text/css" href="css/component.css" />
	<link rel="stylesheet" type="text/css" href="css/caption_hover.css" />

	<link rel="stylesheet" type="text/css" href="css/bootstrap.css" />
	<link rel="stylesheet" type="text/css" href="css/style.css" />
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.4.0/css/font-awesome.min.css">
	
	<title>Resistance</title>
	<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.3/jquery.min.js"></script>
	<script src="js/modernizr.custom.js"></script>
	<script src="js/bootstrap.js"></script>
	<link href='https://fonts.googleapis.com/css?family=Montserrat:400,700' rel='stylesheet' type='text/css'>
	<script src="js/toucheffects.js"></script>

</head>
<body>
 	<nav class="navbar navbar-default navbar-inverse" role="navigation">
            <div class="container">
                <div class="navbar-header page-scroll">
                    <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#navbar-collapse" aria-expanded="false">
                    	<i class="fa fa-bars"></i>
                    </button>
                    <a class="navbar-brand page-scroll" href="#sectionInicial"></a>
                </div>
                <div class="collapse navbar-collapse" id="navbar-collapse">
                    <ul class="nav navbar-nav" role="tablist">
                    	<li><a class="page-scroll" href="index.php"><img class="logo_nav" src="img/logo_nav.png" alt="background"></a></li>
                        <li><a class="page-scroll" href="index.php#sectionSobre">SOBRE NÓS</a></li>
                        <li><a class="page-scroll" href="index.php#sectionfazemos">O QUE FAZEMOS</a></li>
                        <li><a class="page-scroll" href="index.php#sectionWork"> TRABALHOS</a></li>
                        <li><a class="page-scroll" href="index.php#sectionContactos">CONTACTOS</a></li>
                        <li><a class="page-scroll" href="recrutamento.php"> RECRUTAMENTO</a></li>
                     <!---   <li><a class="page-scroll" href="index.php#sectionParcerias">PARCERIAS</a></li> -->
                    </ul>
                </div>
            </div>
        </nav>

	<div class="container demo-3">
		<h1 class="titulo_team"> Equipa</h1>
		<ul class="grid cs-style-3">
			<?php
				$query = "SELECT * FROM people ORDER BY vip DESC,name"; 
								
				$stmt = $db->prepare($query); 
				$stmt->execute(); 
									 
				$rows = $stmt->fetchAll(); 
				$i = 1;
				foreach($rows as $row):  
				
				$query1 = "SELECT * FROM departments WHERE id = " . $row['type']; 
						
								$stmt1 = $db->prepare($query1); 
								$stmt1->execute(); 
										 
								$row1 = $stmt1->fetch();   ?>
				
					<li>
						<figure>
							<img src="files/photos/<?php echo $row['img']; ?>">
							<figcaption>
								<h3><?php echo $row['name']; ?></h3>
								<span><?php if ($row['vip'] ==1) echo "Presidente"; else {echo $row1['name']; } ?></span>
								<a href="" target="_blank"> <img src="img/linked.png"> </a>
								<a href="" target="_blank"> <img src="img/behance.png"> </a>
								<a href="" target="_blank"> <img src="img/git.png"> </a>
							</figcaption>
						</figure>
					</li>			
			<?php endforeach;  ?>
		</ul>
	</div>
	
</body>

</html>