<html>
    <head>
            <script src="jquery-3.3.1.min.js"></script>
            <script src="https://cdnjs.cloudflare.com/ajax/libs/sweetalert/2.1.2/sweetalert.min.js"></script>
    </head>
</html>
<?php 

include('connect.php');

if (isset($_GET['SAgent'])){
    $agent=$_GET['SAgent'];
    $req=$bdd->exec("DELETE FROM utilisateur where N_matricule='$agent' ");
    $rep=$bdd->exec("DELETE FROM controle where N_matricule='$agent' ");
    if ($rep || $req){
        echo '<script>
            swal({
                title: "Wow!",
                text: "l\'operation est faite avec succès !",
                icon: "success"
            }).then(function() {
                window.location = "espace agents.php";
            });
        </script>';

   
   
}}

else{
    echo '<script>
    swal({
        title: "ERROR!",
        text: "Veuillez selectionnez un utilisateur!",
        icon: "error"
    }).then(function() {
        window.location = "espace agents.php";
    });
</script>';
}


?>