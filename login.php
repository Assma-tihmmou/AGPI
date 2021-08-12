<html>
    <head>
            <script src="jquery-3.3.1.min.js"></script>
            <script src="https://cdnjs.cloudflare.com/ajax/libs/sweetalert/2.1.2/sweetalert.min.js"></script>
    </head>
</html>
<?php
  include('connect.php');
 
if (isset($_POST['user']) && isset($_POST['passwrd'])){

        if(empty($_POST['user']) || empty($_POST['passwrd'])){


            echo '<script>
            swal({
                title: "error!",
                text: "Veuillez remplir tous les chapms!!",
                icon: "error"
            }).then(function() {
                window.location = "login.html";
            });
        </script>';
            /*echo '<script>alert("Veuillez remplir tous les chapms! ");
        window.location.href=\'login.html\';</script>';       */ }
        else {

        $nmat=$_POST['user'];
        $pass=$_POST['passwrd'];
        $req=$bdd->query("SELECT * from utilisateur where N_matricule='$nmat' and password='$pass' ");
        $donnee=$req->fetch();

    if (!$donnee){


        echo '<script>
        swal({
            title: "error!",
            text: "N° Matricule ou mot de passe incorrecte ! ",
            icon: "error"
        }).then(function() {
            window.location = "login.html";
        });
    </script>';

     


    }
    else if ($donnee['fonction']=='AGENT'){
        session_start();
        $_SESSION['N_mat']=$donnee['N_matricule'];
        $_SESSION['password']=$donnee['password'];

    header("location: home agent.html");
    }
    else if  ($donnee['fonction']=='ADMIN'){
        header("location: home admin.html");

    }
    
   
    }}

if(isset($_POST['logout'])){
    session_start();
    session_destroy();
    header("location:login.html");

}

?>

