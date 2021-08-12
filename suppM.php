<html>
    <head>
            <script src="jquery-3.3.1.min.js"></script>
            <script src="https://cdnjs.cloudflare.com/ajax/libs/sweetalert/2.1.2/sweetalert.min.js"></script>
    </head>
</html>
<?php 

include('connect.php');

if (isset($_GET['Smateriel']) && isset($_GET['Stype'])){
    $materiel=$_GET['Smateriel'];  
   $type=$_GET['Stype'];
    $req=$bdd->exec("DELETE FROM materiel WHERE N_mat='$materiel' AND type='$type' ");
    $rep=$bdd->exec("DELETE FROM controle WHERE N_materiel='$materiel' AND type='$type' ");
if($req){

                echo '<script>
                swal({
                    title: "Wow!",
                    text: "Supprimé dans la table materiel !",
                    icon: "success"
                }).then(function() {
                    window.location = "espace materiel.php";
                });
            </script>';

} else if( $rep){
    echo '<script>
    swal({
        title: "Wow!",
        text: "Supprimé dans la table controle !",
        icon: "success"
    }).then(function() {
        window.location = "espace materiel.php";
    });
</script>';


}
else {


    
    echo '<script>
    swal({
        title: "Error!",
        icon: "error"
    }).then(function() {
        window.location = "espace materiel.php";
    });
</script>';

}

}



?>