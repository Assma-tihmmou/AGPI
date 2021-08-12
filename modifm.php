<html>
    <head>
            <script src="jquery-3.3.1.min.js"></script>
            <script src="https://cdnjs.cloudflare.com/ajax/libs/sweetalert/2.1.2/sweetalert.min.js"></script>
    </head>
</html>
<?php 
include('connect.php');

if (isset($_GET['Mmateriel']) && isset($_GET['Mtype']) ){
$materiel=$_GET['Mmateriel'];
$type=$_GET['Mtype'];

  $rep= $bdd->query(" SELECT * FROM materiel where N_mat='$materiel' and type='$type'  ");
     if (!$rep){
        echo "pas de resultat";
     }
     else{
       while($donnees=$rep->fetch()) : ?>
        <head>
        <link rel="stylesheet" type="text/css" href="ajoute materiel style.css">
        </head>
        <div class="ajoutematériel-form">
        <h1>Modifier Un Materiel</h1>
        <form action="<?php  $_SERVER['PHP_SELF'] ; ?>" method="POST">
            <p>N_Materiel</p>
            <input type="text" name="N_Materiel"  value='<?php echo $donnees['N_mat'] ; ?>' >
            <p>type</p>

            <select name="type">
            <option><?php echo $donnees['type'] ; ?></option>
                    <option>EXTINCTEUR</option>
                    <option>R.I.A</option>
                    <option>Poteaux</option>
                    <option>Accessoire</option>

            </select>
            <p>nom</p>
            <input type="text" name="nom" value='<?php echo $donnees['nom'] ; ?>'>
            <p>emplacement</p>
            <input type="text" name="emplacement" value='<?php echo $donnees['emplacement'] ; ?>'>

            <button type="submit">Modifier</button>
        </form>
    </div>

        
        <?php endwhile; }
        }

if (isset($_POST['N_Materiel']) && isset($_POST['nom']) && isset($_POST['type'])){
$materiel=$_GET['Mmateriel'];
$req = $bdd->prepare('UPDATE  `materiel` SET nom=:nom, emplacement=:emplacement WHERE N_mat=:materiel and type=:typem ');
$req->execute(array(
    
     ":nom"=>$_POST['nom'],
     ":emplacement"=>$_POST['emplacement'],
     ":materiel"=>$_GET['Mmateriel'],
     ":typem"=>$_GET['Mtype'], 
     ));
     if($req){
         
        echo '<script>
        swal({
            title: "Wow!",
            text: "l\'operation est faite avec succès !",
            icon: "success"
        }).then(function() {
            window.location = "espace materiel.php";
        });
    </script>';
     }else{
         
        echo '<script>
        swal({
            title: "ERROR!",
            text: "Echec !",
            icon: "Error"
        }).then(function() {
            window.location = "espace materiel.php";
        });
    </script>';
     }
    

       

    }  ?>

