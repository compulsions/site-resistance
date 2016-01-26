<?php 

    require("../config.php"); 
   
    $submitted_username = ''; 
     
    if(!empty($_POST)) { 
        $query = "SELECT * FROM people WHERE username = :username"; 
         
        $query_params = array( 
            ':username' => $_POST['username'] 
        ); 
         
        try 
        { 
            $stmt = $db->prepare($query); 
            $stmt->execute($query_params); 
        } 
        catch(PDOException $ex) 
        {  
            die("Failed to run query: " . $ex->getMessage()); 
        } 
         
        $login_ok = false; 
         
        $row = $stmt->fetch(); 
        if($row) 
        { 
            $check_password = hash('sha256', $_POST['password'] . $row['salt']); 
            for($round = 0; $round < 65536; $round++) 
            { 
                $check_password = hash('sha256', $check_password . $row['salt']); 
            } 
             
            if($check_password === $row['password']) 
            { 
                $login_ok = true; 
            } 
        } 
         
        if($login_ok) 
        {  
            unset($row['salt']); 
            unset($row['password']); 
             
            $_SESSION['user'] = $row; 
              
            header("Location: index.php");
            die(); 
        } 
        else {
			header( "Location: ?error=1");
			die();
		}
             
        $submitted_username = htmlentities($_POST['username'], ENT_QUOTES, 'UTF-8'); 
    } 
	
	
	 if (isset($_GET['off'])) { 
	 
		unset($_SESSION['logged_in']);
		session_destroy();
	 
	 }  
 
     
?> 

<!DOCTYPE html>
<html lang="pt">

	<head>
		<title>Login</title>

		<meta charset="utf-8">
		<meta http-equiv="X-UA-Compatible" content="IE=edge">
    	<meta name="viewport" content="width=device-width, initial-scale=1">

		<link href="../css/font-awesome.min.css" rel="stylesheet" media="screen">
		<link href="../css/bootstrap.css" rel="stylesheet" media="screen">
		<link href="css/admin.css" rel="stylesheet" media="screen">
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
	
			
			<div class="container">

				<div class="col-xs-12 col-sm-10 col-sm-offset-1">

                    <div class="row login">
                    
                        <div class="col-xs-12 col-sm-6">
                            <img src="logo.png" alt="Resistance Logo" class="logo">
                        </div>
                        
                        <div class="col-xs-12 col-sm-6">
                            <h1>Login</h1> 
							<?php if (isset($_GET['error'])) { if ($_GET['error'] == 1) { ?>
								<div class="alert alert-danger" role="alert">Falha no login!</div>
							<?php } } ?>
                            <form action="login.php" method="post" class="flp"> 
                                                                
                                <div class="form-group">
									<input type="text" class="form-control" id="user" required name="username" placeholder="Luke" value="<?php echo $submitted_username; ?>"/>
									<label for="user">Username</label>
								</div>
								
								<div class="form-group">
									<input type="password" id="pass"  type="password" class="form-control" required name="password" placeholder="*********" value=""/>
									<label for="pass">Password</label>
								</div>
                                
                                <div class="form-group">
                                    <button type="submit" value="Login" class="btn btn-default btn-primary submeter">Login</button>
                                </div>
                                
                            </form>     
                        </div>
    				</div>

                </div>
                
                
			</div>

		</div>

		<footer>
			<p>ResistAdmin v0.1</p>
		</footer>

		<!-- jQuery (necessary for Bootstrap's JavaScript plugins) -->
		<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.2/jquery.min.js"></script>
		<!-- Include all compiled plugins (below), or include individual files as needed -->
		<script src="http://cdnjs.cloudflare.com/ajax/libs/jquery-easing/1.3/jquery.easing.min.js" type="text/javascript"></script>
		<script src="assets/js/vendor/bootstrap.min.js"></script>

		
		<script>

		$(".flp label").each(function(){
			var sop = '<span class="ch">'; 
			var scl = '</span>'; 
			$(this).html(sop + $(this).html().split("").join(scl+sop) + scl);
			$(".ch:contains(' ')").html("&nbsp;");
		})

		var d;
		$(".flp input").focus(function(){
			var tm = $(this).outerHeight()/2 *-1 + "px";
			$(this).next().addClass("focussed").children().stop(true).each(function(i){
				d = i*50;
				$(this).delay(d).animate({top: tm}, 200, 'easeOutBack');
			})
		})
		$(".flp input").blur(function(){
			if($(this).val() == "")
			{
				$(this).next().removeClass("focussed").children().stop(true).each(function(i){
					d = i*50;
					$(this).delay(d).animate({top: 0}, 500, 'easeInOutBack');
				})
			}
		})

		</script>

		
	</body>

</html>