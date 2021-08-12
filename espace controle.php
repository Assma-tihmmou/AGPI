<?php
include('connect.php');

$res=$bdd->query('SELECT * from controle '); ?>

<html>
    <head>
    <link rel="stylesheet" type="text/css" href="espace_agents_style.css">
    <script src='https://kit.fontawesome.com/a076d05399.js' crossorigin='anonymous'></script>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    </head>
    <body>
     <h1>Liste des Controles </h1>
     <form action="rech.php" method="POST" class="login-form">
         <label >DATE</label>
        <input type="date" name="dat">

       
        <button type="submit">RECHERCHER</button>
</form>
  
    <div>  
              <table cellpadding="0" cellspacing="0" border="0">  
                <thead class="tbl-header" border='0'>
                    <tr>
                        <th>N° Matricule</th> 
                        <th>N° materiel</th>
                        <th>type</th>
                        <th>date</th>
                        <th>Etat</th>
                        <th>Observation</th>
                        


                    </tr>
                </thead>
    </div>
    <div class="tbl-content">
            <tbody>
                <?php while($donnees = $res->fetch()): ?>
                    <tr>
                        <td class="donne"><?php echo htmlspecialchars($donnees['N_matricule']);?></td>
                        <td><?php echo htmlspecialchars($donnees['N_materiel']);?></td>
                        <td><?php echo htmlspecialchars($donnees['type']);?></td>
                        <td><?php echo htmlspecialchars($donnees['date']);?></td>
                        <td><?php echo htmlspecialchars($donnees['etat']);?></td>
                        <td><?php echo htmlspecialchars($donnees['observation']);?></td>


                     </tr>
    
    <?php endwhile; ?>

             </tbody>
                </table>
                <a href="home admin.html"> <button  class="ajo" type="submit" name="env" >Accueil</button></a>

     </div>


    <body>
</html>

