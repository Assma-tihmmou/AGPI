<?php
try {
    $bdd = new PDO('mysql:host=localhost;dbname=controle_incendie', 'root', '');


}
catch(PDOException $e){
    die('error :' .$e->getMessage());

}
?>