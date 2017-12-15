<?php
ob_start();
require_once("db_con.php");
?>
<!DOCTYPE html>
<html lang="da">
<head>
	<title>Horze Hillerød</title>
	<meta charset="utf-8">
	<link href="css.css" rel="stylesheet">
	<link href="https://fonts.googleapis.com/css?family=Indie+Flower|Roboto" rel="stylesheet">
</head>
<body>
	<div class="indhold">
		<div class="grid grid-pad">
			<div class="col-1-1">
				<div class="content">
					<a href="index.html"><img alt="billede tekst" class="logo" src="logo.png"></a>
				</div>
			</div>
		</div><!-- Menu -->
		<div class="menu">
			<div class="grid grid-pad menupadding">
				<div class="col-1-4 menumargin">
					<div class="content menupunkt">
						<a href="index.html">Forside</a>
					</div>
				</div>
				<div class="col-1-4">
					<div class="content menupunkt">
						<a href="hest.html">Hest</a>
					</div>
				</div>
				<div class="col-1-4">
					<div class="content menupunkt">
						<a href="rytter.html">Rytter</a>
					</div>
				</div>
				<div class="col-1-4">
					<div class="content menupunkt">
						<a href="login.php">Login</a>
					</div>
				</div>
			</div>
		</div><!-- content -->
        <?php
		if(filter_input(INPUT_POST, 'submit')){
		    $un = filter_input(INPUT_POST, 'un') 
		        or die('Missing/illegal un parameter');
		    $pw = filter_input(INPUT_POST, 'pw')
		        or die('Missing/illegal pw parameter');
		    
		    $sql = 'SELECT id, username, password FROM login_table WHERE username=?';
		    $stmt = $con->prepare($sql);
		    $stmt->bind_param('s', $un);
		    $stmt->execute();
		    $stmt->bind_result($id, $username, $password);
		    $stmt->store_result(); //gemmer resultaterne til senere brug 
		    
		    
		    if($stmt->num_rows == 1) { // Henter antallet af resultater, og ser om det er lige med 1
		        while($stmt->fetch()){ //henter daterne 
		            if (password_verify($pw, $password)){  //fører videre til næste side 
		                $_SESSION["login_table"] = $username;
		                $_SESSION["user_id"] = $id;
                        
		                
		                echo "<script language='javascript' type='text/javascript'>";
		                echo "alert('Du er logget ind')";
		                echo "</script>";
		                header("Location: secret.php");
		                exit();
		            }
		            
		            else{ // boks som kommer frem hvis kodeord ikke passer til brugernavnet
		                echo "<script language='javascript' type='text/javascript'>";
		                echo "alert('Forkert kodeord. Prøv en anden kombination.')";
		                echo "</script>";
		            }
		        }
		    } else { // boks som kommer frem hvis brugernavnet ikke findes
		        echo "<script language='javascript' type='text/javascript'>";
		                echo "alert('Brugeren findes ikke')";
		                echo "</script>";
		    }
		}
		    
		?><!-- Log ind bokse -->
		<div class="background">
			<div class="form">
				<form action="<?=$_SERVER['PHP_SELF']?>" method="post">
					<div class="login"><br><br>
						<legend class="mig-tekst">Log ind for at komme til din ønskeliste.</legend><br><br>
                        
						<input class="login-boks" name="un" placeholder="Brugernavn" size="30" type="text"><br>
                        
                        <input class="login-boks" name="pw" placeholder="Password" required="" size="30" type="password"><br><br><br>
                        
                        <input class="knap" name="submit" type="submit" value="LOG IND">
                        
						<div class="klik">
							<p>Har du ikke en bruger? <a href="opret.php"><b>Opret bruger her</b></a></p>
						</div>
					</div>
				</form>
			</div>
		</div>
		<div class="container">    
            <!-- footer -->
			<div class="menu footer1">
				<div class="grid grid-pad">
					<div class="col-1-4 footer">
						<div class="content kontakt">
							Fupvej 20, 3400 Hillerød.
						</div>
					</div>
					<div class="col-1-4 footer">
						<div class="content kontakt">
							Tlf: 12 34 56 78.
						</div>
					</div>
					<div class="col-1-4 footer">
						<div class="content">
							<a href="https://www.facebook.com/Horze-Hiller%C3%B8d-1674910429464528/"><img alt="billede tekst" class="facebook" src="facebook.png"></a>
						</div>
					</div>
					<div class="col-1-4 footer">
						<div class="content">
							<a href="https://www.instagram.com/horzehillerod/?hl=da"><img alt="billede tekst" class="insta" src="instagram.png"></a>
						</div>
					</div>
				</div>
			</div>
		</div>
	</div>
</body>
</html>