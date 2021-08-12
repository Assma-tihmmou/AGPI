<?php
include('connect.php');


$req = $bdd->prepare('INSERT INTO `materiel`(`N_mat`,`type`, `nom`, `emplacement`) VALUES(:N_mat,:typem, :nom, :emplacement)');
$req->execute(array(
    ":N_mat"=>$_POST['N_mat'],
    ":typem"=>$_POST['type'],
    ":nom"=> $_POST['Nom'],
    ":emplacement"=> $_POST['emplacement']
	));

/*
$bdd -> exec('INSERT INTO `materiel`(`type`, `nom`, `emplacement`) VALUES (\'RIA\',\'pp123\',\'SERVICE mzcanique\')');
*/

echo "<script>alert(\"le materiel est ajouté avec succès! \");</script> ";
header("location: espace materiel.php");

?>
