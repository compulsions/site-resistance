<?php 

    require("../config.php"); 
	
	if(empty($_SESSION['user'])){
		header( "Location: login.php");
		die();
    } else {
	
		if(!empty($_POST)) {
				
				if (isset($_POST['edit'])){
					
					$query = "UPDATE people SET type = :depart, nr = :nr WHERE id=" . $_POST['edit']; 
					
					$query_params = array( 
						':nr' => $_POST['telemovel'],
						':depart' => $_POST['departamento'],
					); 
					
				}else{
					
				$target_dir = "../files/photos/";
				$target_file = $target_dir . basename($_FILES["avatar"]["name"]);
				$uploadOk = 1;
				$imageFileType = pathinfo($target_file,PATHINFO_EXTENSION);
				
				
				$check = getimagesize($_FILES["avatar"]["tmp_name"]);
				if($check == false) {
					header( "Location: ?add&error=1");
					die();
				}
				
				if (file_exists($target_file)) {
					header( "Location: ?add&error=2");
					die();
				}
				
				if ($_FILES["avatar"]["size"] > 1048576	) {
					header( "Location: ?add&error=3");
					die();
				}
				
				if($imageFileType != "jpg" && $imageFileType != "png" && $imageFileType != "jpeg" ) {
					header( "Location: ?add&error=4");
					die();
				}
				
				
				if (move_uploaded_file($_FILES["avatar"]["tmp_name"], $target_file)) {
					
				} else {
					header( "Location: ?add&error=5");
					die();
				}		
					
					$query = "INSERT INTO people ( type, name, email, nr, img ) VALUES ( :depart, :name, :email, :nr, :img )"; 
					
					$query_params = array( 
						':name' => $_POST['name'],
						':email' => $_POST['email'],
						':nr' => $_POST['telemovel'],
						':depart' => $_POST['departamento'],
						':img' => $_FILES["avatar"]["name"],
					); 
					
				}
				
					try 
					{ 
						$stmt = $db->prepare($query); 
						$result = $stmt->execute($query_params); 
					} 
					catch(PDOException $ex) 
					{   
						die("Failed to run query: " . $ex->getMessage()); 
					} 
				
		}
			
		if (isset($_GET['del'])){
			
			$query = "DELETE FROM people WHERE id=".$_GET['del'];
				
			try 
				{ 
					$db->query($query);
				} 
				catch(PDOException $ex) 
				{   
					die("Failed to run query: " . $ex->getMessage()); 
				}
				
		}
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
		<link href="css/fileinput.min.css" rel="stylesheet" media="screen">
		<link href="logo.png" rel="shortcut icon">
		<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.2/jquery.min.js"></script>
		<script src="js/fileinput.min.js"></script>

		<!-- HTML5 shim and Respond.js for IE8 support of HTML5 elements and media queries -->
		<!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
		<!--[if lt IE 9]>
		<script src="https://oss.maxcdn.com/html5shiv/3.7.2/html5shiv.min.js"></script>
		<script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
		<![endif]-->
		<style>
			.kv-avatar .file-preview-frame,.kv-avatar .file-preview-frame:hover {
				margin: 0;
				padding: 0;
				border: none;
				box-shadow: none;
				text-align: center;
			}
			.kv-avatar .file-input {
				display: table-cell;
				max-width: 220px;
			}
		</style>
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
			<?php if (isset($_GET['add'])) {  ?> 
						Novo Membro
					<?php } else if (isset($_GET['edit'])) {  ?> 
						Editar Membro
					<?php } else { ?> 
						A Equipa :)
					<?php  } ?>
		</div>
		<div class="panel-body">
						<div class="container">

				<div class="col-xs-12 col-sm-10 col-sm-offset-1">
					<?php if (isset($_GET['add'])) { ?>
						
						<form action="equipa.php" method="post" data-toggle="validator" enctype="multipart/form-data" role="form" id="contact-form">

							<div class="form-group">
								<label for="titulo">Nome</label>
								<input type="text" class="form-control" id="name" name="name" placeholder="Maria Jaquelina" required >
							</div>
							
							<div class="form-group">
								<label for="email" >E-mail</label>
								<input type="email" class="form-control" id="email" name="email" placeholder="maria.jaquelina@resistance.pt" data-error="Por favor insira um endereço de email válido" required>
							</div>
							
							<div class="col-md-4">
								<div id="kv-avatar-errors" class="center-block" style="width:800px;display:none"></div>
								<div class="text-center">
									<div class="kv-avatar center-block" style="width:200px">
										<input id="avatar" name="avatar" type="file" class="file-loading">
									</div>
								</div>
								<script>
								$("#avatar").fileinput({
									overwriteInitial: true,
									maxFileSize: 1500,
									showClose: false,
									showCaption: false,
									browseLabel: '',
									removeLabel: '',
									browseIcon: '<i class="fa fa-folder-open-o"></i>',
									removeIcon: '<i class="fa fa-times"></i>',
									removeTitle: 'Cancel or reset changes',
									elErrorContainer: '#kv-avatar-errors',
									msgErrorClass: 'alert alert-block alert-danger',
									defaultPreviewContent: '<img src="../img/avatar.png" alt="Your Avatar" style="width:160px">',
									layoutTemplates: {main2: '{preview} {remove} {browse}'},
									allowedFileExtensions: ["jpg", "png"]
								});
								</script>
							</div>
							
							<div class="col-md-8">
								<div class="form-group">
									<label for="telemovel">Contacto telefónico</label>
									<input type="tel" class="form-control" id="telemovel" name="telemovel" placeholder="+351 912 345 678, +351 912 345 678" required>
								</div>
								
								<div class="form-group">
									<label for="departamento" >Departamento</label>
									<select class="form-control" name="departamento" >
										<option value="0" >Selecionar departamento</option>
										<?php 
							
										$query = "SELECT * FROM departments"; 
											
										$stmt = $db->prepare($query); 
										$stmt->execute(); 
												 
										$rows = $stmt->fetchAll(); 

										foreach($rows as $row):  ?>
										
											<option value="<?php echo $row['id'] ?>"><?php echo $row['name'] ?></option>
										<?php endforeach;  ?>
									</select>
								</div>
							</div>
							
							<input class="btn btn-success" type="submit" value="Adicionar">

						</form>
						
						
					<?php } else if (isset($_GET['edit'])) { 
					
							$query = "SELECT * FROM people WHERE id=".$_GET['edit']; 
								
							$stmt = $db->prepare($query); 
							$stmt->execute(); 
									 
							$row = $stmt->fetch(); 
					?>
						
						<form action="equipa.php" method="post" data-toggle="validator" role="form" id="contact-form">

							<div class="form-group">
								<label for="titulo">Nome</label>
								<input type="text" disabled class="form-control" id="name" name="name" value="<?php echo $row['name']; ?>" >
							</div>
							
							<div class="form-group">
								<label for="email" >E-mail</label>
								<input type="email" disabled class="form-control" id="email" name="email" value="<?php echo $row['email']; ?>" >
							</div>
							
							<div class="form-group">
								<label for="telemovel">Contacto telefónico</label>
								<input type="tel" class="form-control" id="telemovel" name="telemovel" placeholder="+351 912 345 678, +351 912 345 678" value="<?php echo $row['nr']; ?>" required>
							</div>
							
							<div class="form-group" >
								<label for="departamento" >Departamento</label>
								<select class="form-control" name="departamento">
									<option value="0" >Selecionar departamento</option>
									<?php 
						
									$query1 = "SELECT * FROM departments"; 
										
									$stmt1 = $db->prepare($query1); 
									$stmt1->execute(); 
											 
									$rows1 = $stmt1->fetchAll(); 

									foreach($rows1 as $row1):  ?>
									
										<option <?php if($row1['id'] == $row['type']) { echo "selected"; } ?> value="<?php echo $row1['id'] ?>"><?php echo $row1['name'] ?></option>
										
									<?php endforeach;  ?>
								</select>
							</div>
							
							<input type="hidden" name="edit" value="<?php echo $row['id'] ?>">
							<input class="btn btn-success" type="submit" value="Actualizar">
							
							<?php if ($_SESSION['user']['vip'] == '1'){
								$query2 = "SELECT * FROM departments WHERE director =". $row['id']; 
									
								$stmt2 = $db->prepare($query2); 
								$stmt2->execute(); 
													 
								$row2 = $stmt2->fetch(); 
											
								if (!$row2){ ?>
										
									<a class="btn btn-danger" href="?del=<?php echo $row['id']; ?>" type="submit" onclick="return confirm('Tens a certeza que pretendes\neliminar o Membro <?php echo $row['name']; ?> ?')" >Apagar</a>	
			
							<?php } }	 ?>
							
						</form>
						
						
					<?php } else { ?>
						<center><input class="btn btn-success criar" value="Adicionar Novo Elemento" onclick="window.location='?add';" /></center>
					
					<div class="table-responsive">

						<table class="table table-striped table-bordered">
							<thead>
								<tr>
									<td>Nome</td>
									<td>Email</td>
									<td>Contacto</td>
									<td></td>
								</tr>
							</thead>
							<tbody>
						
							<?php
							$query = "SELECT * FROM people ORDER BY vip DESC,name"; 
								
							$stmt = $db->prepare($query); 
							$stmt->execute(); 
									 
							$rows = $stmt->fetchAll(); 
							$i = 1;
							foreach($rows as $row):  
							 
							$nr = str_replace(',', ' / ', $row['nr']); ?>
							
							
									<tr <?php if ($row['vip']) { ?> class="info" <?php } ?> >
										<td><?php echo $row['name']; ?></td>
										<td><?php echo $row['email']; ?></td>
										<td><?php echo $nr; ?></td>
										<td class="text-center"> 
											<a href="?edit=<?php echo $row['id']; ?>"><i class="fa fa-pencil"></i></a>
											<a href="?del=<?php echo $row['id']; ?>"><i class="fa fa-trash-o"></i></a>
										</td>
									</tr>
								
								<?php endforeach;  ?>
							</tbody>
						</table>
					</div>
					<?php } ?>

				</div>
		
			</div>
		
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