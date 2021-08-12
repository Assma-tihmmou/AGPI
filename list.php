<?php 
session_start();

include('connect.php');

if(isset($_GET['choix'])){
    $choix=$_GET['choix'];
    $rep=$bdd->query("SELECT * FROM materiel where type='$choix' ");

}
?>
<html>
    <head>
    <link rel="stylesheet" type="text/css" href="espace_agents_style.css">
    <script src='https://kit.fontawesome.com/a076d05399.js' crossorigin='anonymous'></script>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    </head>
    <body>
     <h1>Liste des Materiels </h1>
  
    <div>  
              <table cellpadding="0" cellspacing="0" border="0">  
                <thead class="tbl-header" border='0'>
                    <tr>
                        <th>N° Materiel</th> 
                        <th>type</th>
                        <th>nom</th>
                        <th>conforme</th>
                        <th>Observation</th>
                        


                    </tr>
                </thead>
    </div>
    <div class="tbl-content">
            <tbody>
                
                <?php 
                ;
                

                while($donnees = $rep->fetch()): 
?>
                    <tr>   
                     <form action="control.php" method="post">

                        <td class="donne"><input type="text"  name="Nmat[]" value="<?php echo htmlspecialchars($donnees['N_mat']);?>"  class="ma" ></td>
                        <td><input type="text"  name="typ[]" value="<?php echo htmlspecialchars($donnees['type']);?>"   class="ma" ></td>
                        <td><?php echo htmlspecialchars($donnees['nom']);?></td>
                        <td><select name="conform[]"><option>OUI</option>
                                    <option>NON</option>
                            </select>
                        </td>
                        <td><input type='text' name="observation[]"></td>

                        
                    </tr>  <?php endwhile; ?>
            </tbody>
         </table>                    
                       <button  class="ajo" type="submit" name="env" >ENREGISTRER</button>
                                        </form>
                                       <a href="home agent.html"> <button  class="ajo" type="submit" name="env" >ACCUEIL</button></a>



    
                

     </div>


                </body>
</html>

