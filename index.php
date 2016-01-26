<?php require("config.php"); 

	if (!empty($_POST)) {
		
	/*	date_default_timezone_set('Europe/London');
		
		$query = "INSERT INTO contact_resistan ( date, name, email, title, msg ) VALUES (:date, :name, :email, :title, :msg )"; */
		
		$msg = ereg_replace( "\n",'<br/>', htmlentities($_POST['mensagem'], ENT_QUOTES, 'UTF-8'));
		
	/*	$query_params = array( 
            ':date' => date("Y-m-d H:i:s"),
            ':name' => $_POST['name'],
            ':email' => $_POST['email'],
            ':title' => $_POST['assunto'],
            ':msg' => $msg,
        );
		
		try 
        { 
            $stmt = $db->prepare($query); 
            $result = $stmt->execute($query_params); 
        } 
        catch(PDOException $ex) 
        {   
            die("Failed to run query: " . $ex->getMessage()); 
        }*/
		
		
		$to = 'geral@resistance.pt'; 

		$subject = 'Contacto - Site Resistance';
		
		$headers = "From: Site Resistance< no-reply@resistance.pt >\r\n";
		$headers .= "Content-Type: text/html; charset=ISO-8859-1\r\n";


		$message = '<html><body>';
		$message .= '<h1>Nova Parceria :)</h1><table rules="all" style="border-color: #666;" cellpadding="10">';
		$message .= '<tr><td style="background: #eee;" ><strong>Nome do Sujeito:</strong></td><td>'. $_POST['name'] .'</td></tr>';
		$message .= '<tr><td style="background: #eee;" ><strong>Email:</strong></td><td>'. $_POST['email'] .'</td></tr>';
		$message .= '<tr><td style="background: #eee;" ><strong>Assunto:</strong></td><td>'. $_POST['assunto'] .'</td></tr>';
		$message .= '<tr><td style="background: #eee;" ><strong>Mensagem:</strong></td><td>'. $msg .'</td></tr>';
		$message .= '</table><br/><br/><hr>email enviado automaticamente, não responder a este email</body></html>';

		mail($to, $subject, $message, $headers);		
		
	}		
	
?>
<html>
<head>
	<meta charset="UTF-8" />
	<meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1"> 
	<link rel="stylesheet" type="text/css" href="css/normalize.css" />
	<link rel="stylesheet" type="text/css" href="css/demo.css" />
	<link rel="stylesheet" type="text/css" href="css/icons.css" />
	<link rel="stylesheet" type="text/css" href="css/component.css" />

	<link rel="stylesheet" type="text/css" href="css/bootstrap.css" />
	<link rel="stylesheet" type="text/css" href="css/style.css" />
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.4.0/css/font-awesome.min.css">
	
	<title>Resistance</title>
	<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.3/jquery.min.js"></script>
	<script src="js/modernizr.custom.js"></script>
	<script src="js/bootstrap.min.js"></script>
    <script src="js/jquery.easing.min.js"></script>
	<link href="http://resistance.pt/logo.png" rel="shortcut icon">


	<link href='https://fonts.googleapis.com/css?family=Montserrat:400,700' rel='stylesheet' type='text/css'>

</head>
<body data-spy="scroll" data-target="#navbar-collapse">
	<nav class="navbar navbar-default navbar-inverse navbar-sectionInicial" role="navigation">
		<div class="container">
			<div class="navbar-header page-scroll">
				<button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#navbar-collapse" aria-expanded="false">
					<i class="fa fa-bars"></i>
				</button>
				<a class="navbar-brand page-scroll" href="#sectionInicial"></a>
			</div>
			<div class="collapse navbar-collapse" id="navbar-collapse">
				<ul class="nav navbar-nav" role="tablist">
					<li><a class="page-scroll" href="#sectionInicial"><img class="logo_nav" src="img/logo_nav.png" alt="background"></a></li>
					<li><a class="page-scroll" href="#sectionSobre">SOBRE NÓS</a></li>
					<li><a class="page-scroll" href="#sectionfazemos">O QUE FAZEMOS</a></li>
					<li><a class="page-scroll" href="#sectionWork"> TRABALHOS</a></li>
					<li><a class="page-scroll" href="#sectionContactos">CONTACTOS</a></li>
					<li><a class="page-scroll" href="recrutamento.php"> RECRUTAMENTO</a></li>
					<!--- <li><a class="page-scroll" href="#sectionParcerias">PARCERIAS</a></li> -->
				</ul>
			</div>
		</div>
	</nav>

	<div id="sectionInicial" class="container_sections">
		<section class="sectionInicial" id="sectionInicial">
			<div class="fundo" >
				<img class="logo" src="img/logo_big.png" alt="background">
			</div>
			<img class="fundo" src="img/fundo.jpg" alt="background">
			<img class="logo" src="img/logo_big.png" alt="background">
			
		</section>

		<section id="sectionSobre" class="separador white col-3 ss-style-doublediagonal">
				<h1 class="titulo text_color_gray"> SOBRE NÓS</h1>
				<div class="texto">
					<p><?php 					
								$query = "SELECT * FROM inform WHERE id = 1"; 
									
								$stmt = $db->prepare($query); 
								$stmt->execute(); 
										 
								$row = $stmt->fetch();
								
								echo $row['text']; ?>
					</p>
				</div>
				<div class="btn_more">
					<a href="team.php">Ver Equipa</a>
				</div>
		</section>

		<section id="sectionfazemos" class="separador ss-style-multitriangles padrao remove_padding">
			<div class="container">
				<h1 class="titulo text_color_white"> O QUE FAZEMOS </h1>
				<div class="col-md-4 col-sm-6 col-xs-6 col-xxs-12 container_do">
					<img src="img/web_white.png">
					<h3> Web Design</h3>
				</div>
				<div class="col-md-4 col-sm-6 col-xs-6 col-xxs-12 container_do">
					<img src="img/design_white.png">
					<h3> Design</h3>
				</div>
				<div class="col-md-4 col-sm-6 col-xs-6 col-xxs-12 container_do">
					<img src="img/branding_white.png">
					<h3> Branding</h3>
				</div>
			</div>
			
		</section>

		<section id="sectionWork" class="separador ss-style-bigtriangle">
			<h1 class="titulo text_color_gray"> ENCONTRA OS NOSSO TRABALHOS</h1>

			<!--
			<svg id="bigTriangleColor" xmlns="http://www.w3.org/2000/svg" version="1.1" width="100%" height="100" viewBox="0 0 100 102" preserveAspectRatio="none">
				<path d="M0 0 L50 100 L100 0 Z" />
			</svg>
			-->
			<div class="works_icons">
				<a href="https://github.com/weareresistance" target="_blank"> <img src="img/git_res.png"> </a>
				<a href="https://www.behance.net/weareresistance" target="_blank"> <img src="img/behance_res.png"> </a>
			</div>
		</section>

		<section id="sectionContactos" class="separador color col-3 ss-style-triangles">
			<h1 class="titulo text_color_white"> CONTACTOS</h1>
								<form action="index.php" method="post" data-toggle="validator" role="form" id="contact-form">

									<div class="form-group">
										<label for="nome" class="control-label" style="color:#FFF">Nome</label>
										<input type="text" class="form-control" id="nome" required name="name" placeholder="Luke Skywalker">
									</div>

									<div class="form-group">
										<label for="email" class="control-label"style="color:#FFF">Email</label>
										<input type="email" class="form-control" id="email" required name="email" placeholder="luke@jo.org">
									</div>

									<div class="form-group">
										<label for="assunto" class="control-label" style="color:#FFF">Assunto</label>
										<input type="text" class="form-control" id="assunto" required name="assunto" placeholder="Proposta de parceria">
									</div>

									<div class="form-group">
										<label for="mensagem" class="control-label" style="color:#FFF">Mensagem</label>
										<textarea class="form-control" rows="3" name="mensagem" placeholder="" required style="max-width: 100%;"></textarea>
									</div>

									<center><button type="submit" class="btn btn-default btn-primary submeter" style="    color: #FFF;    border: 3px solid #FFF;">Enviar</button></center>										
									
								</form><br/><br/>
								
				<div class="row">
					<div class="col-sm-8 col-sm-offset-2 fisico">

						<div class="row">
			                <div class="col-sm-8 mapa">
			                    
			                    <iframe src="https://www.google.com/maps/embed?pb=!1m14!1m8!1m3!1d3047.056055923508!2d-8.424461999999998!3d40.207816!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0xd22f9098f98004b%3A0xf74b13602c7f2de3!2sDepartamento+de+F%C3%ADsica+da+Universidade+de+Coimbra!5e0!3m2!1sen!2spt!4v1425159556258" class="map" width="100%" height="250" frameborder="0" style="border:1"></iframe> 
			                </div>    
			                    
						    <div class="col-sm-4 morada text-left">
								<address><?php 					
									$query = "SELECT * FROM inform WHERE id = 9"; 
										
									$stmt = $db->prepare($query); 
									$stmt->execute(); 
											 
									$row = $stmt->fetch();
									
									echo $row['text']; ?>
								</address>
						    </div>
						</div>

				    </div>
	        	</div>
		</section>

<!---
		<section id="sectionRecrutamento" class="separador">
			<h1 class="titulo text_color_gray"> RECRUTAMENTO</h1>
			<div class="linha"> </div>
			<div id="recrutamento_off">
				<h3 class="recrutar"> De momento não estamos a recrutar </h3>
			</div>
			<div id="recrutamento_on">
				<h3 class="recrutar">Inscrições abertas!</h3>
				<div class="btn_more">
					<a href="recrutamento.html"> Fazer Inscrição</a>
				</div>

			</div>
		</section>

		<section id="sectionParcerias" class="separador color col-3 ss-style-triangles">
			<h1 class="titulo text_color_white"> PARCERIAS</h1>
			<div class="linha"> </div>	
		</section>	
-->	<footer>
			<div class="container">
				<div class="col-sm-12" style="    padding: 15px 0;">
					<p style="float:left;">© Resistance 2013-<?php echo date("Y"); ?></p>
					<p style="float:right">geral@resistance.pt</p>
				</div>
			</div>
		</footer>
	</div>
    <script src="js/script.js"></script>

</body>
</html>