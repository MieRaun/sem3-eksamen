<!doctype html> 
<html lang="da">
    <head>
        <title>Horze Hillerød</title>
        <meta charset= "utf-8">
        <link rel="stylesheet" href="css.css">
        <link href="https://fonts.googleapis.com/css?family=Indie+Flower|Roboto" rel="stylesheet">
        
    </head>
    
    <body>
        
        
    <div class="indhold">
        <div class="grid grid-pad">
            
            


            <div class="col-1-1">
               <div class="content">
                   <a href="index.html"><img class="logo" src="logo.png" alt="billede tekst"></a> 
               </div>
            </div>
        </div>
                <!-- Menu -->
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
        </div>
    
        
        <!-- content --> 
        
     
       
<?php 
session_start();
// require_once forbinder til databasen db_con.php
require_once("db_con.php"); 

// form som oprettet dig som bruger hvis alle boksene er udfyldt korrekt
if (filter_input(INPUT_POST, 'submit')){
	
	$un = filter_input(INPUT_POST, 'username')
		or die('Missing/illegal username parameter');
	
	$email = filter_input(INPUT_POST, 'email')
		or die('Missing/illegal password parameter');
	
	$pw = filter_input(INPUT_POST, 'password')
		or die('Missing/illegal password parameter');
	
	$pw = password_hash($pw, PASSWORD_DEFAULT);
	
	echo 'Creating user '.$un.' with password: '.$pw;
	 
	$sql= 'INSERT INTO login_table (username, email, password) VALUES (?, ?, ?)';
	$stmt = $con->prepare($sql);
	$stmt->bind_param('sss', $un, $email, $pw);
	$stmt->execute(); 
	
	if ($stmt->affected_rows > 0) {  //fører videre til næste side som nu bliver: login.php
		echo 'user '.$un.' added ';
		$URL="login.php";
		echo "<script>location.href='$URL'</script>";
	}
	else {
		echo 'could not add user';
	}
}
?>

<!-- Dette er en placeholder til oprettelse af bruger -->
<form action="<?= $_SERVER['PHP_SELF'] ?>" method="post">
	<div class=login>
    <fieldset>
    	<legend class="mig-tekst">OPRET BRUGER</legend><br>
    	<input class="login-boks" name="username" type="text" placeholder="Brugernavn" required />
    	<input class="login-boks" name="email" type="email" placeholder="Email" required />
    	<input class="login-boks" name="password" type="password" placeholder="Adgangskode" required />
    	<input class="knap" name="submit" type="submit" value="OPRET BRUGER" />
	</fieldset>
    </div>
</form>

<div class="klik"><p>Allerede bruger?<a href="login.php"> Log in her</a></p></div>

          
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

                    <a href="https://www.facebook.com/Horze-Hiller%C3%B8d-1674910429464528/"><img class="facebook" src="facebook.png" alt="billede tekst"></a>
                    
                </div> 
            </div>

            <div class="col-1-4 footer">
                <div class="content">
                    
                     <a href="https://www.instagram.com/horzehillerod/?hl=da"><img class="insta" src="instagram.png" alt="billede tekst"></a>

                </div> 
             </div>  
        </div>
    </div>
        
        
        </div>
    </body>
</html>
                
                