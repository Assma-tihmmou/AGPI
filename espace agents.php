<?php
include('connect.php');

$res=$bdd->query('SELECT * from utilisateur  '); ?>

<html>
    <head>
    <link rel="stylesheet" type="text/css" href="espace_agents_style.css">
    <script src='https://kit.fontawesome.com/a076d05399.js' crossorigin='anonymous'></script>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    </head>
    <body>
     <h1>Liste des Agents </h1>
  
    <div>  
              <table cellpadding="0" cellspacing="0" border="0">  
                <thead class="tbl-header" border='0'>
                    <tr>
                        <th>N° Matricule</th> 
                        <th>Nom</th>
                        <th>Prenom</th>
                        <th>fonction</th>
                        <th>Password</th>
                        <th>Modifieer</th>
                        <th>Supprimer</th>


                    </tr>
                </thead>
    </div>
    <div class="tbl-content">
            <tbody>
                <?php while($donnees = $res->fetch()): ?>
                    <tr>
                        <td class="donne"><?php echo htmlspecialchars($donnees['N_matricule']);?></td>
                        <td><?php echo htmlspecialchars($donnees['nom']);?></td>
                        <td><?php echo htmlspecialchars($donnees['prenom']);?></td>
                        <td><?php echo htmlspecialchars($donnees['fonction']);?></td>
                        <td><?php echo htmlspecialchars($donnees['password']);?></td>
                        <td>&nbsp&nbsp<a href="modif.php?Magent=<?php echo $donnees['N_matricule']; ?>"><i class='fas fa-wrench' style='font-size:20px;color:black'></i></a></td>
                        <td><a href="supp.php?SAgent=<?php echo $donnees['N_matricule']; ?>"><i class="fa fa-trash-o" aria-hidden="true" style="font-size:20px;color:black"></i></a></td>

                     </tr>
    
    <?php endwhile; ?>

             </tbody>
                </table>
     </div>

        <a href="ajoute agent.html"><button class="ajo">Ajouter un utilisateur </button></a>
        <a href="home admin.html"> <button  class="ajo" type="submit" name="env" >Accueil</button></a>


    <body>
</html>