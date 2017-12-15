<?php
require_once("db_con.php");
if(isset($_GET["opret"])){
    $onskeliste = $_POST["onskeliste"];
    mysqli_query($con, "INSERT INTO onskeliste (onskeliste, bruger_id, brugernavn) VALUES ('$onskeliste', '{$_SESSION["user_id"]}', '{$_SESSION["login_table"]}')");
}

if(isset($_GET["slet"])){
    mysqli_query($con, "DELETE FROM onskeliste WHERE id='{$_GET["slet"]}'");
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
        
        
        <div class="onskeliste">
            <form action="?opret" method="post">
                <textarea name="onskeliste" placeholder="Din ønskeliste"></textarea>
                <input type="submit" class="knap" name="opret" value="Send Ønskeliste">
            </form>
        </div>
        
        <div class="logud"><a href="logud.php">Log ud</a></div><br><br>
        <div class="liste">
        <?php
            $hentonskeliste = mysqli_query($con, "SELECT * FROM onskeliste ORDER BY id DESC");
        while($liste = mysqli_fetch_array($hentonskeliste)){
            ?>
        <div class="listepunkt">
            <span><?=$liste["brugernavn"]?></span>
            <?=$liste["onskeliste"]?><br>
            <?php
                if($liste["bruger_id"] == $_SESSION["user_id"]){
                    echo '<a href="rediger.php?id=' . $liste["id"] . '">Rediger</a> - <a href="?slet=' . $liste["id"] . '">Slet</a>';
                }
            ?>
        </div>
        <?
        }
        ?>
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
        
        
        </div>
    </body>
</html>
                
                