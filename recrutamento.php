<?php require("config.php");
		$done = false;

if (!empty($_POST)) {
	
		date_default_timezone_set('Europe/London');
		
		$uploaddir = '.\files\cv\\';
		$uploadfile = $uploaddir . basename($_FILES['cv']['name']);

		if (move_uploaded_file($_FILES['cv']['tmp_name'], $uploadfile)) {
		 // echo "File is valid, and was successfully uploaded.\n";
		} else {
		//   echo "Upload failed";
}
		
		
		$query = "INSERT INTO sub_resistan ( date, name, type, course, tel, email, year_cur, activities, functions, communication, languages, cv) VALUES (:date, :name, :depar, :curso, :tel, :email, :ano, :act, :funcoes, :comu, :ling, :cv)"; 
		
		$query_params = array( 
            ':date' => date("Y-m-d H:i:s"),
            ':name' => $_POST['name'],
            ':depar' => $_POST['departamento'],
            ':curso' => $_POST['curso'],
            ':tel' => $_POST['telemovel'],
            ':email' => $_POST['email'],
            ':ano' => $_POST['ano'],
            ':act' => $_POST['actividades'],
            ':funcoes' => $_POST['funcoes'],
            ':comu' => $_POST['comunicacao'],
            ':ling' => $_POST['linguagens'],
			':cv' => $_FILES["cv"]["name"],
        );
		
		try 
        { 
            $stmt = $db->prepare($query); 
            $result = $stmt->execute($query_params); 
        } 
        catch(PDOException $ex) 
        {   
            die("Failed to run query: " . $ex->getMessage()); 
        }		
		
		
		$to = 'hr@resistance.pt';

		$subject = 'Recrutamento - Site Resistance';
		
		$headers = "From: resistance.pt\r\n";
		$headers .= "Content-Type: text/html; charset=ISO-8859-1\r\n";


		$message = '<html><body>';
		$message .= '<h1>Novo Recruta</h1><table rules="all" style="border-color: #666;" cellpadding="10">';
		$message .= '<tr><td style="background: #eee;" ><strong>Nome do Candidato:</strong></td><td>'. $_POST['name'] .'</td></tr>';
		$message .= '<tr><td style="background: #eee;" ><strong>Departamento:</strong></td><td>'. $_POST['departamento'] .'</td></tr>';
		$message .= '<tr><td style="background: #eee;" ><strong>Curso:</strong></td><td>'. $_POST['curso'] .'</td></tr>';
		$message .= '<tr><td style="background: #eee;" ><strong>Contacto Telefónico:</strong></td><td>'. $_POST['telemovel'] .'</td></tr>';
		$message .= '<tr><td style="background: #eee;" ><strong>Email:</strong></td><td>'. $_POST['email'] .'</td></tr>';
		$message .= '<tr><td style="background: #eee;" ><strong>Ano de final de Curso:</strong></td><td>'. $_POST['ano'] .'</td></tr>';
		$message .= '<tr><td style="background: #eee;" ><strong>Actividades Extracurriculares:</strong></td><td>'. $_POST['actividades'] .'</td></tr>';
		$message .= '<tr><td style="background: #eee;" ><strong>Funções Desempenhadas:</strong></td><td>'. $_POST['funcoes'] .'</td></tr>';
		$message .= '<tr><td style="background: #eee;" ><strong>Competências de Comunicação:</strong></td><td>'. $_POST['comunicacao'] .'</td></tr>';
		$message .= '<tr><td style="background: #eee;" ><strong>Linguagens de Programação:</strong></td><td>'. $_POST['linguagens'] .'</td></tr>';
		$message .= '</table><br/><br/><hr>email enviado automaticamente, não responder a este email</body></html>';



		mail($to, $subject, $message, $headers);
		
		$done = true;
		
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
	<link href="http://resistance.pt/logo.png" rel="shortcut icon">
	
			<style>
		
			.btn-file {
			  position: relative;
			  overflow: hidden;
			}
			.btn-file input[type=file] {
			  position: absolute;
			  top: 0;
			  right: 0;
			  min-width: 100%;
			  min-height: 100%;
			  font-size: 100px;
			  text-align: right;
			  filter: alpha(opacity=0);
			  opacity: 0;
			  background: red;
			  cursor: inherit;
			  display: block;
			}
			input[readonly] {
			  background-color: white !important;
			  cursor: text !important;
			}

		</style>

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
                        <li><a class="page-scroll" href="#"> RECRUTAMENTO</a></li>
                        <!--<li><a class="page-scroll" href="index.php#sectionParcerias">PARCERIAS</a></li>-->
                    </ul>
                </div>
            </div>
        </nav>

		
		<div class="container">

		<?php if ($done) {?>
				<div class="col-sm-8 col-sm-offset-2 main">
<center>
					<div class="title">
						<h2>Obrigado pela tua candidatura!</h2>
					</div>

					<div class="description">
						<p>Entraremos em contacto contigo o mais depressa possível. </p>
					</div>

</center>

					<div class="col-sm-12">
						
					</div>

				</div>
		<?php }else {?>
		<h1 class="titulo_team"> Recrutamento</h1>
			<form action="recrutamento.php" method="post" enctype="multipart/form-data" class="form-recrutamento">
								<div class="form-group">
									<label for="nome" class="control-label">Nome Completo</label>
									<input type="text" class="form-control" id="nome" required name="name" placeholder="Luke Skywalker">
								</div>

								<div class="form-group">
									<label for="departamento" class="control-label">Departamento pretendido</label>
									<select name="departamento" class="form-control" required>
										<option value="" >Seleciona Departamento</option>
										<?php $query = "SELECT * FROM departments"; 
											
										$stmt = $db->prepare($query); 
										$stmt->execute(); 
													 
										$rows = $stmt->fetchAll(); 

										foreach($rows as $row):  ?>
										
											<option value="<?php echo $row['id']; ?>" ><?php echo $row['name']; ?></option>
										
									<?php endforeach;  ?>
										<option value="99" >Sem Preferência</option>
									</select>
								</div>

								<div class="form-group">
									<label for="curso" class="control-label">Curso e Instituição (ex: "Direito - UC")</label>
									<input type="text" class="form-control" id="curso" name="curso" placeholder="Design e Multimédia - UC" required>
								</div>

								<div class="form-group">
									<label for="telemovel" class="control-label">Contacto telefónico</label>
									<input type="tel" class="form-control" id="telemovel" name="telemovel" pattern="[0-9]{9}" placeholder="912 345 678" required>
								</div>

								<div class="form-group">
									<label for="email" class="control-label">E-mail</label>
									<input type="email" class="form-control" id="email" name="email" pattern="[a-z0-9._%+-]+@[a-z0-9.-]+\.[a-z]{2,3}$" placeholder="luke@skywalker.org" data-error="Por favor insira um endereço de email válido" required>
								</div>

								<div class="form-group">
									<label for="ano" class="control-label">Ano de finalista de curso</label>
									<input type="number" class="form-control" max="2030" min="2014" id="ano" name="ano" placeholder="2016" data-error="Por favor insira um número" required>
								</div>

								<div class="form-group">
									<label for="actividades" class="control-label">Atividades extracurriculares em que estejas ou tenhas estado envolvido</label>
									<textarea class="form-control" rows="3" name="actividades" placeholder="Membro do Concelho Jedi, Líder do Esquadrão Red" required></textarea>
								</div>

								<div class="form-group">
									<label for="funcoes" class="control-label">Funções desempenhadas nessas actividades</label>
									<textarea class="form-control" rows="3" name="funcoes" placeholder="Mestre Jedi, Piloto" required></textarea>
								</div>

								<div class="form-group">
									<label for="comunicacao" class="control-label">Competências de Comunicação (explica também o contexto em que foram desenvolvidas)</label>
									<textarea class="form-control" rows="3" name="comunicacao" placeholder="Controlo da mente, leitura de emoções, premonições" required></textarea>
								</div>

								<div class="form-group">
									<label for="linguagens" class="control-label">(Opcional) Linguagens de Programação</label>
									<textarea class="form-control" rows="3" name="linguagens" placeholder="Jawa, X-WING5, VHS3, Ruby on Lightsabers"></textarea>
								</div>
								
								<div class="form-group">
									<label for="cv" class="control-label">(Opcional) Curriculum vitæ</label>
									 <div class="input-group">
										<span class="input-group-btn">
											<span class="btn btn-primary btn-file">
												Escolher Ficheiro <input  id="cv" name="cv" type="file">
											</span>
										</span>
										<input type="text" class="form-control" readonly>
									</div>
								</div>

								<button type="submit" class="btn btn-default btn-primary submeter">Submeter</button>

							</form>
		<?php } ?>
	</div>

	<!--é so porque me faz impressão nao ter scroll para baixo, depois é apra tirar
			-->
	<br><br>
<!-- jQuery (necessary for Bootstrap's JavaScript plugins) -->
		<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.2/jquery.min.js"></script>
		<!-- Include all compiled plugins (below), or include individual files as needed -->
		<script src="js/bootstrap.min.js"></script>
		<script>
		
			$(document).on('change', '.btn-file :file', function() {
			  var input = $(this),
				  numFiles = input.get(0).files ? input.get(0).files.length : 1,
				  label = input.val().replace(/\\/g, '/').replace(/.*\//, '');
			  input.trigger('fileselect', [numFiles, label]);
			});

			$(document).ready( function() {
				$('.btn-file :file').on('fileselect', function(event, numFiles, label) {
					
					var input = $(this).parents('.input-group').find(':text'),
						log = numFiles > 1 ? numFiles + ' files selected' : label;
					
					if( input.length ) {
						input.val(log);
					} else {
						if( log ) alert(log);
					}
					
				});
			});
		
		</script>
</body>

</html>