<?php

include('connect.php');

?>


<html>
    <head>
    <link rel="stylesheet" type="text/css" href="espace_agents_style.css">

    <script src='https://kit.fontawesome.com/a076d05399.js' crossorigin='anonymous'></script>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    </head>
    
    <body>
        <h1>Liste des materiels </h1>
    <div>
        <form action="<?php  $_SERVER['PHP_SELF'] ; ?>" method="POST">
        <label>TYPE</label>
        <select name="type" >
                    <option>Tout</option>
                    <option>EXTINCTEUR</option>
                    <option>R.I.A</option>
                    <option>Poteaux</option>
                    <option>Accessoire</option>
        </select>
        <label>N° Materiel</label>
        <input type="text" name="num">
        <button type="submit" name="rechercher">RECHERCHER</button>
        </form>
    <table cellpadding="0" cellspacing="0" border="0">
        <thead class="tbl-header">
            <tr>
                <th>N° Materiel</th> 
                <th>type</th>
                <th>Nom</th>
                <th>Emplacement</th>
                <th>Modifer</th>
                <th>supprimer</th>
            </tr>
        </thead>
</div>
<div>
        <tbody class="tbl-content">
<?php
if(isset($_POST['type'])){

$rep=req($_POST['type'],$_POST['num']);
$res=$bdd->query($rep);
 while($donnees = $res->fetch()): ?>
    <tr >
            <td><?php echo htmlspecialchars($donnees['N_mat']);?></td>
            <td><?php echo htmlspecialchars($donnees['type']);?></td>
            <td><?php echo htmlspecialchars($donnees['nom']);?></td>
            <td><?php echo htmlspecialchars($donnees['emplacement']);?></td>
            <td>&nbsp&nbsp<a href="modifm.php?Mmateriel=<?php echo $donnees['N_mat']; ?>&Mtype=<?php echo $donnees['type']; ?>"><i class='fas fa-wrench' style='font-size:20px;color:black'></i></a></td>
            <td><a href="suppM.php?Smateriel=<?php echo $donnees['N_mat'];?>&Stype=<?php echo $donnees['type']; ?>"><i class="fa fa-trash-o" aria-hidden="true" style="font-size:20px;color:black"></i></a></td>
    </tr>
</div>
    <?php endwhile; ?>

        </tbody>
        </table><br><br>
  <a href="ajoute materiel.html"><button class="ajo">Ajouter un materiel </button></a>
  <a href="home admin.html"> <button  class="ajo" type="submit" name="env" >Accueil</button></a>

</body>
</html>
 <?php 

 }
 function req($type,$num){
     if (isset($type) && isset($num)){
         if ($type==="Tout"){
            $req="SELECT * FROM materiel ORDER BY type ";

            return  $req;

         }else {
        
         $req="SELECT * FROM materiel where type='$type' AND N_mat='$num' ";

         return  $req;}
     }

     }



 
 ?>