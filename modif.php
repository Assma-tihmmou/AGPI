
<html>
    <head>
            <script src="jquery-3.3.1.min.js"></script>
            <script src="https://cdnjs.cloudflare.com/ajax/libs/sweetalert/2.1.2/sweetalert.min.js"></script>
    </head>
</html><?php 
include('connect.php');

if (isset($_GET['Magent'])){
$agent=$_GET['Magent'];

  $rep= $bdd->query("SELECT * FROM utilisateur where N_matricule='$agent' ");?>
     
        <?php while($donnees=$rep->fetch()): ?>
        <head>
        <link rel="stylesheet" type="text/css" href="ajoute agent style.css">
        <div class="ajouteagent-form">
        <h1>Modifier Un Agent</h1>
        <form action="<?php  $_SERVER['PHP_SELF'] ; ?>" method="POST">
            <p>N_Matricule</p>
            <input type="text" name="N_matricule" placeholder="Matricule" value='<?php echo $donnees['N_matricule'] ; ?>' >
            <p>Nom</p>
            <input type="text" name="nom" placeholder="Nom" value='<?php echo $donnees['nom'] ; ?>'>
            <p>Prenom</p>
            <input type="text" name="prenom" placeholder="Prenom" value='<?php echo $donnees['prenom'] ; ?>'>
            <p>Mote de passe</p>
            <input type="text" name="password" placeholder="Mot de passe" value='<?php echo $donnees['password'] ; ?>'>
            <p>fonction</p>
            <select name="fonction">
                    <option><?php echo $donnees['fonction'] ; ?></option>
                    <option>ADMIN</option>
                    <option>AGENT</option>
                    

            </select>
            <button type="submit">Modifier</button>
        </form>
    </div>;

        
        <?php endwhile; 
}
if (isset($_POST['nom']) && isset($_POST['prenom']) && isset($_POST['fonction'])){
$agent=$_GET['Magent'];
$req = $bdd->prepare('UPDATE  `utilisateur` SET N_matricule=:N_matricule, nom=:nom, prenom=:prenom,fonction=:fonction, password=:password WHERE N_matricule=:agent ');
$req->execute(array(
    ":N_matricule"=>$_POST['N_matricule'],
     ":nom"=>$_POST['nom'], 
     ":prenom"=>$_POST['prenom'],
     ":fonction"=>$_POST['fonction'],
     ":password"=>$_POST['password'],
     ":agent"=>$_GET['Magent']));
     if($req){

         echo '<script>
        swal({
            title: "Wow!",
            text: "l\'operation est faite avec succès !",
            icon: "success"
        }).then(function() {
            window.location = "espace agents.php";
        });
    </script>';


       }else{
        echo '<script>
        swal({
            title: "error!",
            text: "Echec !",
            icon: "error"
        }).then(function() {
            window.location = "espace agents.php";
        });
    </script>';;
                
            } }
   
    ?>

