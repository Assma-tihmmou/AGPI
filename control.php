
<html>
    <head>
            <script src="jquery-3.3.1.min.js"></script>
            <script src="https://cdnjs.cloudflare.com/ajax/libs/sweetalert/2.1.2/sweetalert.min.js"></script>
    </head>
</html><?php
session_start();
include('connect.php');
    if (isset($_SESSION['N_mat']) && isset($_SESSION['password']))

    { 
            if (isset($_POST['env'])){
                $c=count($_POST['Nmat']);

                
            for ($i=0; $i < $c; $i++){

                $n=$_SESSION['N_mat'];
                $mas=$_POST['Nmat'][$i];
                $type=$_POST['typ'][$i];
                $conform=$_POST['conform'][$i];
                $observation=$_POST['observation'][$i];
                $da=date('y-m-d');                                                                                                               
 
               
                            $req=$bdd->exec("INSERT INTO `controle` (`N_matricule`, `N_materiel`, `type`, `date`, `etat`, `observation`) VALUES ('".$n."','".$mas."','".$type."','".$da."','".$conform."','".$observation."')");

            if(!$req){
              
                
                echo '<script>
                swal({
                    title: "error!",
                    text: "les données sont pas enregistrées ",
                    icon: "error"
                }).then(function() {
                    window.location = "home agent.html";
                });
            </script>';
            }
            else
            {
          
                echo '<script>
                swal({
                    title: "WOW!",
                    text: "les données sont bien enregistrées  ",
                    icon: "success"
                }).then(function() {
                    window.location = "home agent.html";
                });
            </script>';

            }

    }
     }else{

        echo '<script>alert("l\'Veuillez remplir tous les champs!");
        window.location.href=\'home agent.html\';</script>';        

     }


       }
       else{

        echo '<script>
        swal({
            title: "error!",
            text: "veuillez se conntecter  ",
            icon: "error"
        }).then(function() {
            window.location = "home agent.html";
        });
    </script>';
          
       }


?>


