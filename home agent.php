<?php 
if (isset($_SESSION['id']) AND isset($_SESSION['pseudo']))
{
?>
<html>
    <head>
        <title>Home agent</title>
        <link rel="stylesheet" type="text/css" href="home agent style.css">
        
    </head>
    <body>
        <div class="homeagent-form">
            <h1>Accueil</h1>
           
                
                <a href="list.php?choix=Extincteur "><button>Extincteur</button></a>
                <a href="list.php?choix=RIA" ><button>R.I.A</button></a>
                <a href="list.php?choix=Poteaux" ><button>Poteaux</button></a>
                <a href="list.php?choix=Accessoire"><button>Accessoire</button></a>
                
        
        </div>
        <div class=btn5-form>
            <button  type="submit" >Valider</button>
           
        </div>
        <div class=btn6-form>
            <button  type="submit" >Se deconnecter</button>
        </div>
    </body>
</html>
<?php }
?>