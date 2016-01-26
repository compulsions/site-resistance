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
			Recrutamento
		</div>
		<div class="panel-body">
				<div class="container">
				<?php if (isset($_GET['datedit'])) { 
				
				$query1 = "SELECT * FROM inform WHERE id=5" ;
				$query2 = "SELECT * FROM inform WHERE id=6" ;
				
				try 
				{  
					$stmt1 = $db->prepare($query1); 
					$stmt1->execute(); 
					$stmt2 = $db->prepare($query2); 
					$stmt2->execute(); 
				} 
				catch(PDOException $ex) 
				{ 
					die("Failed to run query: " . $ex->getMessage()); 
				} 
													 
				$row1 = $stmt1->fetch(); 			 
				$row2 = $stmt2->fetch(); 
		?>
				
				<div class="row">
					<div class="col-sm-12 title">
						<h2>Definir datas para ao Recrutamento</h2>
					</div>
				</div>
				<div class="col-xs-4 col-sm-4 col-sm-offset-4">
					<form action="recrutamento.php" method="post" role="form" >
						<div class="form-group">
							<label for="data">1º Semestre</label>
							<input type="date" class="form-control" id="data" value="<?php echo $row1['text']; ?>" name="data" required>
						</div>
						<input type="hidden" name="semes1" >
						<center><input class="btn btn-success" type="submit" value="Enviar"></center>

					</form>
					
					<form action="recrutamento.php" method="post" role="form">
						<div class="form-group">
							<label for="data">2º Semestre</label>
							<input type="date" class="form-control" id="data" value="<?php echo $row2['text']; ?>" name="data" required>
						</div>
						<input type="hidden" name="semes2" >
						<center><input class="btn btn-success" type="submit" value="Enviar"></center>

					</form>
				</div>
				
				<?php }else if (isset($_GET['see'])) { 

						$query = "SELECT * FROM sub_resistan WHERE id=". $_GET['see']; 
						
						try{  
							$stmt = $db->prepare($query); 
							$stmt->execute(); 
						} 
						catch(PDOException $ex) { 
							die("Failed to run query: " . $ex->getMessage()); 
						} 
									 
						$row = $stmt->fetch();  
						
						$query2 = "SELECT * FROM departments WHERE id =". $row['type']; 
						
						$stmt2 = $db->prepare($query2); 
						$stmt2->execute(); 
													 
						$row2 = $stmt2->fetch(); ?>
						
					<div class="row">
						<div class="col-sm-12 title">
							<h2>Recruta Nº <?php echo $row['id']; ?></h2>
							<p><?php echo $row['date']; ?></p>
						</div>
					</div>
					
					<div class="col-xs-12 col-sm-10 col-sm-offset-1">
						<div class="table-responsive">
							<table class="table table-striped table-bordered" rules="all" style="border-color: #666;" cellpadding="10">
								<tr><td style="background: #eee;" ><strong>Nome:</strong></td><td><?php echo $row['name']; ?></td></tr>
								<tr><td style="background: #eee;" ><strong>Telemovel:</strong></td><td><?php echo $row['tel']; ?></td></tr>
								<tr><td style="background: #eee;" ><strong>Email:</strong></td><td><?php echo $row['email']; ?></td></tr>
								<tr><td style="background: #eee;" ><strong>Curos / Ano Finalista:</strong></td><td><?php echo $row['course'] ." - ". $row['year_cur']; ?></td></tr>
								<tr><td style="background: #eee;" ><strong>Departamento:</strong></td><td><?php if($row['type']==99) {echo "Sem Preferência"; }else { echo $row2['name']; }?></td></tr>
								<tr><td style="background: #eee;" ><strong>Actividades:</strong></td><td><?php echo $row['activities']; ?></td></tr>
								<tr><td style="background: #eee;" ><strong>Funções:</strong></td><td><?php echo $row['functions']; ?></td></tr>
								<tr><td style="background: #eee;" ><strong>Comunicação:</strong></td><td><?php echo $row['communication']; ?></td></tr>
								<tr><td style="background: #eee;" ><strong>Linguagens:</strong></td><td><?php echo $row['languages']; ?></td></tr>
								<tr><td style="background: #eee;" ><strong>Curriculum vitæ:</strong></td><td><a href="../files/cv/<?php echo $row['cv']; ?>"><?php echo $row['cv']; ?></a></td></tr>
							</table>
						</div>
					</div>
				
				<?php } else { ?>

				<div class="col-xs-12 col-sm-10 col-sm-offset-1">
				
					<?php 
								$query = "SELECT * FROM sub_resistan ORDER by id DESC"; 
					
								try 
								{  
									$stmt = $db->prepare($query); 
									$stmt->execute(); 
								} 
								catch(PDOException $ex) 
								{ 
									die("Failed to run query: " . $ex->getMessage()); 
								} 
									 
								$rows = $stmt->fetchAll();
							
								$i=1;
						?>
				
				
					<div class="table-responsive">

						<table class="table table-striped table-bordered">
							<thead>
								<tr>
									<td>ID</td>
									<td>Nome</td>
									<td>Departamento</td>
									<td>E-mail</td>
									<td>Tel</td>
									<td></td>
								</tr>
							</thead>
							<tbody>
						
							<?php foreach($rows as $row):  
							
									$query2 = "SELECT * FROM departments WHERE id =". $row['type']; 
									
									$stmt2 = $db->prepare($query2); 
									$stmt2->execute(); 
													 
									$row2 = $stmt2->fetch(); ?>
							
							
								<tr>
									<td class="text-center"><?php echo $i++; ?></td>
									<td><?php echo $row['name']; ?></td>
									<td><?php if($row['type']==99) {echo "-"; }else { echo $row2['name']; }?></td>
									<td><?php echo $row['email']; ?></td>
									<td><?php echo $row['tel']; ?></td>
									<td class="text-center"><a href="?see=<?php echo $row['id']; ?>"><i class="fa fa-eye"></i></a></td>
								</tr>
								
								<?php endforeach;  ?>
							</tbody>
						</table>
					</div>
					
				</div>
				
				<?php } ?>
		
			</div>
		
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