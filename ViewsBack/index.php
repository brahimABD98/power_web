

<?php
session_start();

$bdd = new PDO('mysql:host=localhost;dbname=mybase', 'root', '');


if( isset($_SESSION['Id_admin']) AND isset($_SESSION['Email_admin']) ) {

   $getid = intval($_SESSION['Id_admin']);
   $requser = $bdd->prepare('SELECT * FROM admin WHERE id = ?');
   $requser->execute(array($getid));
   $userinfo = $requser->fetch();
 
?>

<?PHP include("include/header.php"); 
       include "../Core/produitCore.php";
            

       
      
      
      
           $produitCoreInstance=new produitCore();
$listProduits = $produitCoreInstance->afficherListProduits();
?>

<style>

.divewi{
  position: absolute;
  top: 50%;
  left: 50%;
  transform: translate(-50%,-50%);
  display: flex;
  flex-wrap: wrap;
  justify-content: center;
}

.enzel{
  width: 110px;
  height: 36px;
  background: #6a89cc;
  margin: 23px;
  border: none;
  outline: none;
  cursor: pointer;
  color: #fff;
  font-family: "montserrat",sans-serif;
  text-transform: uppercase;
  font-size: 13px;
  transition: 0.4s;
  transform-style: preserve-3d;
  perspective: 800px;
}

.enzel::after{
  content: '';
  position: absolute;
  background: #4a69bd;
  transition: 0.4s;
}

.enzel1:hover{
  transform: rotateX(-20deg);
}
.enzel1:after{
  width: 100%;
  height: 24px;
  top: -24px;
  left: 0;
  transform-origin: 0 100%;
  transform: rotateX(90deg);
}



</style>

          <div class="card-header">
            <i class="fas fa-table"></i>
            Liste des produits
<br>
            <button style="margin-left: 0px;" class="enzel enzel1" onclick="window.location.href='register.php'"><i class="fa fa-plus">&nbsp;&nbsp;&nbsp;</i>produit</button>
            <button style="margin-left: 0px;" class="enzel enzel1" onclick="window.location.href='ajouterphoto.php'"><i class="fa fa-plus">&nbsp;&nbsp;&nbsp;</i>photo</button>

          </div>

 
      
      


  <?php  
 $connect = mysqli_connect("localhost", "root", "", "mybase");  
 $query = "
SELECT produit.type as types, count(type)  AS somme FROM produit group by type";  
 $result = mysqli_query($connect, $query);  
 ?>  
 
      <head>  


     <script>
$(document).ready(function(){
    $('.search').on('keyup',function(){
        var searchTerm = $(this).val().toLowerCase();
        $('.table tbody tr').each(function(){
            var lineStr = $(this).text().toLowerCase();
            if(lineStr.indexOf(searchTerm) === -1){
                $(this).hide();
            }else{
                $(this).show();
            }
        });
    });
});
</script>  
           
           <script type="text/javascript" src="https://www.gstatic.com/charts/loader.js"></script>  
           <script type="text/javascript">  
           google.charts.load('current', {'packages':['corechart']});  
           google.charts.setOnLoadCallback(drawChart);  
           function drawChart()  
           {  
                var data = google.visualization.arrayToDataTable([  
                          ['types', 'somme'],  
                          <?php  
                          while($row = mysqli_fetch_array($result))  
                          {  
                               echo "['".$row["types"]."', ".$row["somme"]."],";  
                          }  
                          ?>  
                     ]);  
                var options = {  
                      
                      is3D:true,  
                       pieHole: 0.4 
                     };  
                var chart = new google.visualization.PieChart(document.getElementById('piechart'));  
                chart.draw(data, options);  
           }  
           </script>  
      </head>  
      <body> 
           <div >  
                <h3 align="center">Les types les plus utilisés</h3>  
                 
                <div id="piechart" style="width: 1000px; height: 300px;"></div>  
           </div>
            <div class="table-responsive">
              <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                <thead>
                  <tr>
                    <th>id</th>
                    <th>quantite</th>
                    <th>marque</th>
                    <th>type</th>
                    <th>prix</th>
                    <th>categorie</th>
                    <th>description</th>
                    <th>Modifier</th>
                    <th>Supprimer</th>
                    <th>Details</th>

                  </tr>
                </thead>

                <tbody>
                <?php       
                  foreach($listProduits as $row){
                  ?>
                  <tr>
                    <td><?PHP echo $row['id']; ?></td>
                    <td><?PHP echo $row['quantite']; ?></td>
                    <td><?PHP echo $row['marque']; ?></td>
                    <td><?PHP echo $row['type']; ?></td>
                    <td><?PHP echo $row['prix']; ?></td>
                    <td><?PHP echo $row['categorie']; ?></td>
                    <td><?PHP echo $row['description']; ?></td>
                    <td>
                      <button style=" background: transparent;
                      border: none !important;
                      font-size:0;">
                                <a name="modifier" class="btn delicious-btn" href="ModifProduit.php?id=<?PHP echo $row['id']; ?>"  value="" style="background-image: url('img/edit-button.png') ; background-repeat: no-repeat;  background-size: 32px; height: 45; width: 45;">
                        </a>
                      </button>
                    </td>
                    <td>
                      <form method="POST" action="deleteProduit.php">
                    <input type="hidden" value="<?PHP echo $row['id']; ?>" name="id">
                    <input type="submit" id="delete" name="supprimer" class="btn delicious-btn"' value="" style="background-image: url('img/delete-button.png') ; background-repeat: no-repeat;  background-size: 29px;  height: 32; width: 32;">
                      </form>
                    </td>
                    <td>
                      <form method="POST" action="afficherphoto.php?id=<?PHP echo $row['id']; ?>">
                      <input type="submit" id="gphoto" name="view" class="btn delicious-btn"' value="" style="background-image: url('img/more.png') ; background-repeat: no-repeat;  background-size: 32px; height: 32; width: 32;">
                      </form>
                  </tr>
              <?PHP
               }
               ?> 

                </tbody>
              </table>
            </div>
          </div>

        </div>

      </div>
      <!-- /.container-fluid -->

      <!-- Sticky Footer -->
      ?> 





    <?PHP include("include/footer.php") ;?>  
<?php   
}
else {
     header('Location: login.php');
}

?>
</body>


