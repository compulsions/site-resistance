<?php 

    require("../config.php"); 
	
	if(empty($_SESSION['user'])){
		header( "Location: login.php");
		die();
    }
?>
<!DOCTYPE html>
<html lang="pt">

	<head>
		<title>Manifesto</title>

		<meta charset="utf-8">
		<meta http-equiv="X-UA-Compatible" content="IE=edge">
    	<meta name="viewport" content="width=device-width, initial-scale=1">

		<link href="../css/font-awesome.min.css" rel="stylesheet" media="screen">
		<link href="../css/bootstrap.css" rel="stylesheet" media="screen">
		<link href="css/admin.css" rel="stylesheet" media="screen">
		<link href="css/adminn.css" rel="stylesheet" media="screen">
		<link href="logo.png" rel="shortcut icon">

		<!-- HTML5 shim and Respond.js for IE8 support of HTML5 elements and media queries -->
		<!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
		<!--[if lt IE 9]>
		<script src="https://oss.maxcdn.com/html5shiv/3.7.2/html5shiv.min.js"></script>
		<script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
		<![endif]-->
	</head>

	<body>
	
	
		<div id="wrap">
	
		<nav class="navbar navbar-default navbar-static-top">
		<div class="container-fluid">
			<!-- Brand and toggle get grouped for better mobile display -->
			<div class="navbar-header">
				<button type="button" class="navbar-toggle navbar-toggle-sidebar collapsed">
				MENU
				</button>
				<button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#bs-example-navbar-collapse-1">
					<span class="sr-only">Toggle navigation</span>
					<span class="icon-bar"></span>
					<span class="icon-bar"></span>
					<span class="icon-bar"></span>
				</button>
				<a class="navbar-brand" href="#">
					Resistance Admin
				</a>
			</div>

			<!-- Collect the nav links, forms, and other content for toggling -->
			<div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
				<ul class="nav navbar-nav navbar-right">
					<li><a href="http://resistance.pt" target="_blank">Ver site</a></li>
					<li class="dropdown ">
						<a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-expanded="false">
							Account
							<span class="caret"></span></a>
							<ul class="dropdown-menu" role="menu">
								<li class="dropdown-header">SETTINGS</li>
								<!--- <li class=""><a href="#">Link</a></li> -->
								<li class="divider"></li>
								<li><a href="login.php?off"><i class="fa fa-power-off"></i> Logout</a></li>
							</ul>
						</li>
					</ul>
				</div><!-- /.navbar-collapse -->
			</div><!-- /.container-fluid -->
		</nav>  	<div class="container-fluid main-container">
			<div class="col-md-2 sidebar">
				<div class="row">
		<!-- uncomment code for absolute positioning tweek see top comment in css -->
		<div class="absolute-wrapper"> </div>
		<!-- Menu -->
		<div class="side-menu">
			<nav class="navbar navbar-default" role="navigation">
				<!-- Main Menu -->
				<div class="side-menu-container">
					<ul class="nav navbar-nav">
						<li class="active"><a href="index.php"> Dashboard</a></li>
						
						<li><a href="equipa.php">A equipa</a></li>		
							<li class="panel panel-default" id="dropdown">
								<a data-toggle="collapse" href="#dropdown-lvl1">
									</span> Conteudos do Site<span class="caret"></span>
								</a>
								<div id="dropdown-lvl1" class="panel-collapse collapse">
									<div class="panel-body">
										<ul class="nav navbar-nav">
											<li><a href="pages.php?conteudo">Quem Somos</a></li>
											<li><a href="#">Departamentos</a></li>
											<li><a href="pages.php?contactos">Contactos</a></li>
										</ul>
									</div>
								</div>
							</li>
						<li><a href="recrutamento.php">Recrutamento</a></li>						
						<li><a href="report.php">Report Bug</a></li>

					</ul>
				</div><!-- /.navbar-collapse -->
			</nav>

		</div>
	</div>  		</div>
			<div class="col-md-10 content">
				  <div class="panel panel-default">
		<div class="panel-heading">			
			Dashboard
		</div>
		<div class="panel-body">
				Bem-vindo <?php echo $_SESSION['user']['name'];?>.
		</div>
	</div>
			</div>
		</div>
		</div>
	
	
	
		<footer>
			<p>ResistAdmin v0.2</p>
		</footer>

		<!-- jQuery (necessary for Bootstrap's JavaScript plugins) -->
		<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.2/jquery.min.js"></script>
		<!-- Include all compiled plugins (below), or include individual files as needed -->
		<script src="js/bootstrap.min.js"></script>

	</body>

</html>