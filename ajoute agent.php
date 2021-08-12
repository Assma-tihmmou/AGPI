<?php

include('connect.php');

$req = $bdd->prepare('INSERT INTO `utilisateur`(`N_matricule`, `nom`, `prenom`, `fonction`, `password`) VALUES(:N_matricule, :nom, :prenom, :function, :mdp)');
$req->execute(array(
    
    'N_matricule'=>$_POST['N_matricule'],
    'nom'=> $_POST['nom'],
    'prenom'=> $_POST['prenom'],
    'function'=> $_POST['fonction'],
    'mdp'=> $_POST['password']
	));

    echo "<script>alert(\"l'utilisateur est ajouté avec succès! \");</script> ";
    header("location: espace agents.php");

    ?>











