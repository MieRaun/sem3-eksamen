<?php
require_once("db_con.php");
if(isset($_GET["rediger"])){
    $onskeliste = $_POST["onskeliste"];
    $onskelisteid = $_POST["onskelisteid"];
    mysqli_query($con, "UPDATE onskeliste SET onskeliste='$onskeliste' WHERE id='{$onskelisteid}'");
    header("Location: secret.php");
    exit();
}

if(isset($_GET["id"])){
    $hentOnskeliste = mysqli_query($con, "SELECT * FROM onskeliste WHERE id='{$_GET["id"]}'");
    $onskeliste = mysqli_fetch_assoc($hentOnskeliste);
}
?>
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
                   <div class="content me   nupunkt">
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
        

        Du kan skrive tekst her
        
        <div class="onskeliste">
            <form action="?rediger" method="post">
                <textarea name="onskeliste" placeholder="Din ønskeliste"><?=$onskeliste["onskeliste"]?></textarea>
                <input type="hidden" name="onskelisteid" value="<?=$_GET["id"]?>">
                <input type="submit" class="knap" name="opret" value="Rediger Ønskeliste">
            </form>
        </div>
        </div>
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
    </body>
</html>