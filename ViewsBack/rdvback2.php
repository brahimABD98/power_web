<?php
session_start();

$bdd = new PDO('mysql:host=localhost;dbname=mybase', 'root', '');


if( isset($_SESSION['Id_admin']) AND isset($_SESSION['Email_admin']) ) {

   $getid = intval($_SESSION['Id_admin']);
   $requser = $bdd->prepare('SELECT * FROM admin WHERE id = ?');
   $requser->execute(array($getid));
   $userinfo = $requser->fetch();
 
?>
<html class="no-js" lang="en">
<?php include "../Core/RdvC.php";
$rdvC = new RdvC();
$dd= date_create()->format('Y-m-d');
$listerdv = $rdvC->afficherRDVs();
?>
<?php include("include/header.php");?>

<head>

  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <meta name="description" content="">
  <meta name="author" content="">

  <title>SB Admin - Dashboard</title>

  <!-- Custom fonts for this template-->
  <link href="vendor/fontawesome-free/css/all.min.css" rel="stylesheet" type="text/css">

  <!-- Page level plugin CSS-->
  <link href="vendor/datatables/dataTables.bootstrap4.css" rel="stylesheet">

  <!-- Custom styles for this template-->
  <link href="css/sb-admin.css" rel="stylesheet">

</head>

<body id="page-top">

 

  <div id="wrapper">

    <!-- Sidebar -->
    
    <div id="content-wrapper">

      <div class="container-fluid">

        <!-- Breadcrumbs-->
        <ol class="breadcrumb">
          <li class="breadcrumb-item">
            <a href="#">Dashboard</a>
          </li>
          <li class="breadcrumb-item active">Rendez-vous</li>
        </ol> 
        
        <form action="rdvback2.php" method="GET">
                              <div style="display: flex; margin-bottom:10px">
                          <div class="input-group mb-3" >
                            <input type="text" class="form-control"placeholder="Search..." aria-label="" aria-describedby="basic-addon1" style="color:black;" name="search">
                          </div>
                          <div class=" mb-2" style="margin-left:6px; margin-top:5px;">
                             <input type="submit" name="recherche" value="OK" style="
                          background-color:#6090;
                          border-style: outset;

                          border-radius: 5px;
                          border-color: black;

                          padding: 6px;
                          background-color: rgb(255, 255, 255); " >

                          </div>
                          </div>
                          </form>
<div>
  <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                                <tr><th>user id </th>
                                    <th>Date depot rdv</th>
                                    <th>Date rdv</th>
                                    <th>Sujet rdv</th>
                                    <th>Etat rdv </th>
                             

                                </tr>


                                <?PHP

                                if (isset($_GET["search"]) && $_GET["search"]!=""){

                                //  var_dump($_GET["cin"]);

                                  $listerdv=$rdvC->RechercheRDV($_GET["search"]);

                                }
                                foreach($listerdv as $row){
                                if ($dd >= $row['NOW_RDV']) {
                                  if($row['ETAT_RDV'] == 'en attente'){

                                     ?>
                                                                   <tr style="background-color:#3B6B9A;">

                                   <?PHP } else if($row['ETAT_RDV'] == "Acceptee") {
                                      ?>

                                                                   <tr style="background-color:#365D84;">
                                       <?php }      ?>
                                        <td><?PHP echo $row['USER_ID']; ?></td>
                                    <td><?PHP echo $row['NOW_RDV']; ?></td>
                                    <td><?PHP echo $row['DATE_RDV']; ?></td>
                                    <td><?PHP echo $row['OBJET_RDV']; ?></td>
                                    <td><?PHP echo $row['ETAT_RDV']; ?></td>
                              

                                    <td> <form method="post" action="accepterRDV.php">
                                            <input type="hidden" value="<?PHP echo $row['ID_RDV']; ?>" name="ID_RDV">
                                        <button class="btn btn-sm" style="background-color: #85ffc7;"><i class="fa fa-check-circle"></i></button>
                                        </form>
                                    </td>

                                    <td> <form method="post" action="refuserRDV.php">
                                            <input type="hidden" value="<?PHP echo $row['ID_RDV']; ?>" name="ID_RDV">
                                            <button class="btn btn-sm" style="background-color: #e8ddb5;" ><i class="
fa fa-times-circle"></i></button>
                                        </form>
                                    </td>

                                    <!-- <button data-toggle="tooltip" title="Trash" ><i class="fa fa-trash-o" aria-hidden="true" ></i></button>-->
                                    <!-- <a href="deletedemande.php?sup=<?php //echo $row['ID_D'];?>" class="fa fa-trash-o"></a>-->
                                    <td> <form method="post" action="deleteRDV.php">
                                            <button data-toggle="tooltip" title="Trash" class="btn btn-sm" style="background-color: #fe5f55;"><i class="fa fa-trash-o" aria-hidden="true" ></i></button>
                                            <!-- <input type="submit" name="supprimer" class="nalika-delete-button" value="Supprimer">-->
                                            <input type="hidden" value="<?PHP echo $row['ID_RDV']; ?>" name="ID_RDV">
                                        </form>

                                    </td>
                                </tr>

                                <?php }}?>
                            </table>
                            <div class="custom-pagination">
                            <ul class="pagination">
                                <li class="page-item"><a class="page-link" href="#">Previous</a></li>
                                <li class="page-item"><a class="page-link" href="#">1</a></li>
                                <li class="page-item"><a class="page-link" href="#">2</a></li>
                                <li class="page-item"><a class="page-link" href="#">3</a></li>
                                <li class="page-item"><a class="page-link" href="#">Next</a></li>
                            </ul>
                        </div>
</div>

        <!-- Icon Cards-->
        <!--<div class="row">
          <div class="col-xl-3 col-sm-6 mb-3">
            <div class="card text-white bg-primary o-hidden h-100">
              <div class="card-body">
                <div class="card-body-icon">
                  <i class="fas fa-fw fa-comments"></i>
                </div>
                <div class="mr-5">26 New Messages!</div>
              </div>
              <a class="card-footer text-white clearfix small z-1" href="#">
                <span class="float-left">View Details</span>
                <span class="float-right">
                  <i class="fas fa-angle-right"></i>
                </span>
              </a>
            </div>
          </div>
          <div class="col-xl-3 col-sm-6 mb-3">
            <div class="card text-white bg-warning o-hidden h-100">
              <div class="card-body">
                <div class="card-body-icon">
                  <i class="fas fa-fw fa-list"></i>
                </div>
                <div class="mr-5">11 New Tasks!</div>
              </div>
              <a class="card-footer text-white clearfix small z-1" href="#">
                <span class="float-left">View Details</span>
                <span class="float-right">
                  <i class="fas fa-angle-right"></i>
                </span>
              </a>
            </div>
          </div>
          <div class="col-xl-3 col-sm-6 mb-3">
            <div class="card text-white bg-success o-hidden h-100">
              <div class="card-body">
                <div class="card-body-icon">
                  <i class="fas fa-fw fa-shopping-cart"></i>
                </div>
                <div class="mr-5">123 New Orders!</div>
              </div>
              <a class="card-footer text-white clearfix small z-1" href="#">
                <span class="float-left">View Details</span>
                <span class="float-right">
                  <i class="fas fa-angle-right"></i>
                </span>
              </a>
            </div>
          </div>
          <div class="col-xl-3 col-sm-6 mb-3">
            <div class="card text-white bg-danger o-hidden h-100">
              <div class="card-body">
                <div class="card-body-icon">
                  <i class="fas fa-fw fa-life-ring"></i>
                </div>
                <div class="mr-5">13 New Tickets!</div>
              </div>
              <a class="card-footer text-white clearfix small z-1" href="#">
                <span class="float-left">View Details</span>
                <span class="float-right">
                  <i class="fas fa-angle-right"></i>
                </span>
              </a>
            </div>
          </div>
        </div>

         Area Chart Example-->
        <!--<div>
          <div class="card mb-3">
          <div class="card-header">
            <i class="fas fa-chart-area"></i>-->
            <!--<div>
              <h4 class="text-left text-uppercase" style="color:black;"><b>Sommee Partenariat</b></h4>
                          <div class="row vertical-center-box vertical-center-box-tablet">
                              <div class="col-xs-9 cus-gh-hd-pro">
                                  <h2 class="text-right no-margin" style="color:green;font-size:20px;"><?php $ClientFidele=$demandeC->NBRPART();
                                  {
                                    foreach($ClientFidele as $row){
                                      echo $row["nbr"];
                                    }
                                  }?></h2>
                              </div>
                          </div>
                          <div class="progress progress-mini">
                              <div style="width: 100%;" class="progress-bar bg-green"></div>
                          </div>
                      </div>
                  </div>
                  <div class="col-lg-3 col-md-3 col-sm-3 col-xs-12" style="margin-bottom:1px;">
                      <div class="admin-content analysis-progrebar-ctn res-mg-t-30" style="background-color:white;color:black;">
                        <div class="stats-icon pull-right">
                              <i class="fa fa-star-o" aria-hidden="true"></i>
                          </div>
                          <h4 class="text-left text-uppercase" style="color:black;"><b>Somme sponsoring</b></h4>
                          <div class="row vertical-center-box vertical-center-box-tablet">
                              <div class="col-xs-9 cus-gh-hd-pro">
                                  <h2 class="text-right no-margin" style="color:#3B6B9A;font-size:20px; "><?php $ClientFidele=$demandeC->NBRSPON();
                                  {
                                    foreach($ClientFidele as $row){
                                      echo $row["nbr"];
                                    }
                                  }?></h2>
                              </div>
                          </div>
                          <div class="progress progress-mini">
                              <div style="width: 100%;" class="progress-bar bg-blue"></div>
                          </div>
                      </div>
                  </div>



              </div>
          </div>
      </div>
  </div>
            </div>-->
            <!--Area Chart Example</div>
          <div class="card-body">
            <canvas id="myAreaChart" width="100%" height="30"></canvas>
          </div>
          <div class="card-footer small text-muted">Updated yesterday at 11:59 PM</div>
        </div>

         DataTables Example -->
         
        <div class="card mb-3">
          <div class="card-header">
            <i class="fas fa-table"></i>
            <h4>Liste des Demandes</h4>

  <!--<form action="demandeBACK.php" method="GET">
    <div style="display: flex;margin-bottom:10px;">
<div class="input-group mb-3" >
  <input type="text" class="form-control"placeholder="Search..." aria-label="" aria-describedby="basic-addon1" style="color:black;" name="search">
</div>
<div class=" mb-2" style="margin-left:6px; margin-top:5px;">
   <input type="submit" name="recherche" value="OK" style="
background-color:#6090;
border-style: outset;

border-radius: 5px;
border-color: black;

padding: 6px;
background-color: rgb(255, 255, 255); " >-->

</div>
            <div>
            <table>
                                <tr> <th>user id</th>
                                    <th>Date depot rdv</th>
                                    <th>Date rdv</th>
                                    <th>Sujet rdv</th>
                                    <th>Etat rdv </th>
                                   
                                </tr>


                                <?PHP

                                if (isset($_GET["search"]) && $_GET["search"]!=""){

                                //  var_dump($_GET["cin"]);

                                  $listerdv=$rdvC->RechercheRDV($_GET["search"]);

                                }
                                foreach($listerdv as $row){
                                if ($dd >= $row['NOW_RDV']) {
                                  if($row['ETAT_RDV'] == 'en attente'){

                                     ?>
                                                                   <tr style="background-color:#3B6B9A;">

                                   <?PHP } else if($row['ETAT_RDV'] == "Acceptee") {
                                      ?>

                                                                   <tr style="background-color:#365D84;">
                                       <?php }      ?>
                                       <td><?PHP echo $row['USER_ID']; ?></td>
                                    <td><?PHP echo $row['NOW_RDV']; ?></td>
                                    <td><?PHP echo $row['DATE_RDV']; ?></td>
                                    <td><?PHP echo $row['OBJET_RDV']; ?></td>
                                    <td><?PHP echo $row['ETAT_RDV']; ?></td>
                           

                                    <td> <form method="post" action="accepterRDV.php">
                                            <input type="hidden" value="<?PHP echo $row['ID_RDV']; ?>" name="ID_RDV">
                                        <button class="btn btn-sm" style="background-color: #85ffc7;"><i class="fa fa-check-circle"></i></button>
                                        </form>
                                    </td>

                                    <td> <form method="post" action="refuserRDV.php">
                                            <input type="hidden" value="<?PHP echo $row['ID_RDV']; ?>" name="ID_RDV">
                                            <button class="btn btn-sm" style="background-color: #e8ddb5;" ><i class="
fa fa-times-circle"></i></button>
                                        </form>
                                    </td>

                                    <!-- <button data-toggle="tooltip" title="Trash" ><i class="fa fa-trash-o" aria-hidden="true" ></i></button>-->
                                    <!-- <a href="deletedemande.php?sup=<?php //echo $row['ID_D'];?>" class="fa fa-trash-o"></a>-->
                                    <td> <form method="post" action="deleteRDV.php">
                                            <button data-toggle="tooltip" title="Trash" class="btn btn-sm" style="background-color: #fe5f55;"><i class="fa fa-trash-o" aria-hidden="true" ></i></button>
                                            <!-- <input type="submit" name="supprimer" class="nalika-delete-button" value="Supprimer">-->
                                            <input type="hidden" value="<?PHP echo $row['ID_RDV']; ?>" name="ID_RDV">
                                        </form>

                                    </td>
                                </tr>

                                <?php }}?>
                            </table>


                            <br>
                            <br>
                            <div>
                              <div>
              <h4 class="text-left text-uppercase" class="card-header"style="color:black;"><b>Somme Partenariat</b></h4>
                          <div class="row vertical-center-box vertical-center-box-tablet">
                              <div  class="card-header">
                                  <h2 class="text-right no-margin" style="color:green;font-size:20px;"><?php $ClientFidele=$demandeC->NBRPART();
                                  {
                                    foreach($ClientFidele as $row){
                                      echo $row["nbr"];
                                    }
                                  }?></h2>
                              </div>
                          </div>
                          <!--<div class="progress progress-mini">
                              <div style="width: 100%;" class="progress-bar bg-green"></div>
                          </div>-->
                      </div>
                  </div>
                  <div class="col-lg-3 col-md-3 col-sm-3 col-xs-12" style="margin-bottom:1px;">
                      <div class="admin-content analysis-progrebar-ctn res-mg-t-30" style="background-color:white;color:black;">
                        <div class="stats-icon pull-right">
                              <i class="fa fa-star-o" aria-hidden="true"></i>
                          </div>
                          <h4 class="text-left text-uppercase" style="color:black;"><b>Somme sponsoring</b></h4>
                          <div class="row vertical-center-box vertical-center-box-tablet">
                              <div class="col-xs-9 cus-gh-hd-pro">
                                  <h2 class="text-right no-margin" style="color:#3B6B9A;font-size:20px; "><?php $ClientFidele=$demandeC->NBRSPON();
                                  {
                                    foreach($ClientFidele as $row){
                                      echo $row["nbr"];
                                    }
                                  }?></h2>
                              </div>
                          </div>
                          <!--<div class="progress progress-mini">
                              <div style="width: 100%;" class="progress-bar bg-blue"></div>
                          </div>-->
                      </div>
                  </div>



              </div>
          <!--</div>
      </div>
  </div>
            </div>
            </div>-->

           <!-- Data Table Example</div>
          <div class="card-body">
            <div class="table-responsive">
              <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                <thead>
                  <tr>
                    <th>Name</th>
                    <th>Position</th>
                    <th>Office</th>
                    <th>Age</th>
                    <th>Start date</th>
                    <th>Salary</th>
                  </tr>
                </thead>
                <tfoot>
                  <tr>
                    <th>Name</th>
                    <th>Position</th>
                    <th>Office</th>
                    <th>Age</th>
                    <th>Start date</th>
                    <th>Salary</th>
                  </tr>
                </tfoot>
                <tbody>
                  <tr>
                    <td>Tiger Nixon</td>
                    <td>System Architect</td>
                    <td>Edinburgh</td>
                    <td>61</td>
                    <td>2011/04/25</td>
                    <td>$320,800</td>
                  </tr>
                  <tr>
                    <td>Garrett Winters</td>
                    <td>Accountant</td>
                    <td>Tokyo</td>
                    <td>63</td>
                    <td>2011/07/25</td>
                    <td>$170,750</td>
                  </tr>
                  <tr>
                    <td>Ashton Cox</td>
                    <td>Junior Technical Author</td>
                    <td>San Francisco</td>
                    <td>66</td>
                    <td>2009/01/12</td>
                    <td>$86,000</td>
                  </tr>
                  <tr>
                    <td>Cedric Kelly</td>
                    <td>Senior Javascript Developer</td>
                    <td>Edinburgh</td>
                    <td>22</td>
                    <td>2012/03/29</td>
                    <td>$433,060</td>
                  </tr>
                  <tr>
                    <td>Airi Satou</td>
                    <td>Accountant</td>
                    <td>Tokyo</td>
                    <td>33</td>
                    <td>2008/11/28</td>
                    <td>$162,700</td>
                  </tr>
                  <tr>
                    <td>Brielle Williamson</td>
                    <td>Integration Specialist</td>
                    <td>New York</td>
                    <td>61</td>
                    <td>2012/12/02</td>
                    <td>$372,000</td>
                  </tr>
                  <tr>
                    <td>Herrod Chandler</td>
                    <td>Sales Assistant</td>
                    <td>San Francisco</td>
                    <td>59</td>
                    <td>2012/08/06</td>
                    <td>$137,500</td>
                  </tr>
                  <tr>
                    <td>Rhona Davidson</td>
                    <td>Integration Specialist</td>
                    <td>Tokyo</td>
                    <td>55</td>
                    <td>2010/10/14</td>
                    <td>$327,900</td>
                  </tr>
                  <tr>
                    <td>Colleen Hurst</td>
                    <td>Javascript Developer</td>
                    <td>San Francisco</td>
                    <td>39</td>
                    <td>2009/09/15</td>
                    <td>$205,500</td>
                  </tr>
                  <tr>
                    <td>Sonya Frost</td>
                    <td>Software Engineer</td>
                    <td>Edinburgh</td>
                    <td>23</td>
                    <td>2008/12/13</td>
                    <td>$103,600</td>
                  </tr>
                  <tr>
                    <td>Jena Gaines</td>
                    <td>Office Manager</td>
                    <td>London</td>
                    <td>30</td>
                    <td>2008/12/19</td>
                    <td>$90,560</td>
                  </tr>
                  <tr>
                    <td>Quinn Flynn</td>
                    <td>Support Lead</td>
                    <td>Edinburgh</td>
                    <td>22</td>
                    <td>2013/03/03</td>
                    <td>$342,000</td>
                  </tr>
                  <tr>
                    <td>Charde Marshall</td>
                    <td>Regional Director</td>
                    <td>San Francisco</td>
                    <td>36</td>
                    <td>2008/10/16</td>
                    <td>$470,600</td>
                  </tr>
                  <tr>
                    <td>Haley Kennedy</td>
                    <td>Senior Marketing Designer</td>
                    <td>London</td>
                    <td>43</td>
                    <td>2012/12/18</td>
                    <td>$313,500</td>
                  </tr>
                  <tr>
                    <td>Tatyana Fitzpatrick</td>
                    <td>Regional Director</td>
                    <td>London</td>
                    <td>19</td>
                    <td>2010/03/17</td>
                    <td>$385,750</td>
                  </tr>
                  <tr>
                    <td>Michael Silva</td>
                    <td>Marketing Designer</td>
                    <td>London</td>
                    <td>66</td>
                    <td>2012/11/27</td>
                    <td>$198,500</td>
                  </tr>
                  <tr>
                    <td>Paul Byrd</td>
                    <td>Chief Financial Officer (CFO)</td>
                    <td>New York</td>
                    <td>64</td>
                    <td>2010/06/09</td>
                    <td>$725,000</td>
                  </tr>
                  <tr>
                    <td>Gloria Little</td>
                    <td>Systems Administrator</td>
                    <td>New York</td>
                    <td>59</td>
                    <td>2009/04/10</td>
                    <td>$237,500</td>
                  </tr>
                  <tr>
                    <td>Bradley Greer</td>
                    <td>Software Engineer</td>
                    <td>London</td>
                    <td>41</td>
                    <td>2012/10/13</td>
                    <td>$132,000</td>
                  </tr>
                  <tr>
                    <td>Dai Rios</td>
                    <td>Personnel Lead</td>
                    <td>Edinburgh</td>
                    <td>35</td>
                    <td>2012/09/26</td>
                    <td>$217,500</td>
                  </tr>
                  <tr>
                    <td>Jenette Caldwell</td>
                    <td>Development Lead</td>
                    <td>New York</td>
                    <td>30</td>
                    <td>2011/09/03</td>
                    <td>$345,000</td>
                  </tr>
                  <tr>
                    <td>Yuri Berry</td>
                    <td>Chief Marketing Officer (CMO)</td>
                    <td>New York</td>
                    <td>40</td>
                    <td>2009/06/25</td>
                    <td>$675,000</td>
                  </tr>
                  <tr>
                    <td>Caesar Vance</td>
                    <td>Pre-Sales Support</td>
                    <td>New York</td>
                    <td>21</td>
                    <td>2011/12/12</td>
                    <td>$106,450</td>
                  </tr>
                  <tr>
                    <td>Doris Wilder</td>
                    <td>Sales Assistant</td>
                    <td>Sidney</td>
                    <td>23</td>
                    <td>2010/09/20</td>
                    <td>$85,600</td>
                  </tr>
                  <tr>
                    <td>Angelica Ramos</td>
                    <td>Chief Executive Officer (CEO)</td>
                    <td>London</td>
                    <td>47</td>
                    <td>2009/10/09</td>
                    <td>$1,200,000</td>
                  </tr>
                  <tr>
                    <td>Gavin Joyce</td>
                    <td>Developer</td>
                    <td>Edinburgh</td>
                    <td>42</td>
                    <td>2010/12/22</td>
                    <td>$92,575</td>
                  </tr>
                  <tr>
                    <td>Jennifer Chang</td>
                    <td>Regional Director</td>
                    <td>Singapore</td>
                    <td>28</td>
                    <td>2010/11/14</td>
                    <td>$357,650</td>
                  </tr>
                  <tr>
                    <td>Brenden Wagner</td>
                    <td>Software Engineer</td>
                    <td>San Francisco</td>
                    <td>28</td>
                    <td>2011/06/07</td>
                    <td>$206,850</td>
                  </tr>
                  <tr>
                    <td>Fiona Green</td>
                    <td>Chief Operating Officer (COO)</td>
                    <td>San Francisco</td>
                    <td>48</td>
                    <td>2010/03/11</td>
                    <td>$850,000</td>
                  </tr>
                  <tr>
                    <td>Shou Itou</td>
                    <td>Regional Marketing</td>
                    <td>Tokyo</td>
                    <td>20</td>
                    <td>2011/08/14</td>
                    <td>$163,000</td>
                  </tr>
                  <tr>
                    <td>Michelle House</td>
                    <td>Integration Specialist</td>
                    <td>Sidney</td>
                    <td>37</td>
                    <td>2011/06/02</td>
                    <td>$95,400</td>
                  </tr>
                  <tr>
                    <td>Suki Burks</td>
                    <td>Developer</td>
                    <td>London</td>
                    <td>53</td>
                    <td>2009/10/22</td>
                    <td>$114,500</td>
                  </tr>
                  <tr>
                    <td>Prescott Bartlett</td>
                    <td>Technical Author</td>
                    <td>London</td>
                    <td>27</td>
                    <td>2011/05/07</td>
                    <td>$145,000</td>
                  </tr>
                  <tr>
                    <td>Gavin Cortez</td>
                    <td>Team Leader</td>
                    <td>San Francisco</td>
                    <td>22</td>
                    <td>2008/10/26</td>
                    <td>$235,500</td>
                  </tr>
                  <tr>
                    <td>Martena Mccray</td>
                    <td>Post-Sales support</td>
                    <td>Edinburgh</td>
                    <td>46</td>
                    <td>2011/03/09</td>
                    <td>$324,050</td>
                  </tr>
                  <tr>
                    <td>Unity Butler</td>
                    <td>Marketing Designer</td>
                    <td>San Francisco</td>
                    <td>47</td>
                    <td>2009/12/09</td>
                    <td>$85,675</td>
                  </tr>
                  <tr>
                    <td>Howard Hatfield</td>
                    <td>Office Manager</td>
                    <td>San Francisco</td>
                    <td>51</td>
                    <td>2008/12/16</td>
                    <td>$164,500</td>
                  </tr>
                  <tr>
                    <td>Hope Fuentes</td>
                    <td>Secretary</td>
                    <td>San Francisco</td>
                    <td>41</td>
                    <td>2010/02/12</td>
                    <td>$109,850</td>
                  </tr>
                  <tr>
                    <td>Vivian Harrell</td>
                    <td>Financial Controller</td>
                    <td>San Francisco</td>
                    <td>62</td>
                    <td>2009/02/14</td>
                    <td>$452,500</td>
                  </tr>
                  <tr>
                    <td>Timothy Mooney</td>
                    <td>Office Manager</td>
                    <td>London</td>
                    <td>37</td>
                    <td>2008/12/11</td>
                    <td>$136,200</td>
                  </tr>
                  <tr>
                    <td>Jackson Bradshaw</td>
                    <td>Director</td>
                    <td>New York</td>
                    <td>65</td>
                    <td>2008/09/26</td>
                    <td>$645,750</td>
                  </tr>
                  <tr>
                    <td>Olivia Liang</td>
                    <td>Support Engineer</td>
                    <td>Singapore</td>
                    <td>64</td>
                    <td>2011/02/03</td>
                    <td>$234,500</td>
                  </tr>
                  <tr>
                    <td>Bruno Nash</td>
                    <td>Software Engineer</td>
                    <td>London</td>
                    <td>38</td>
                    <td>2011/05/03</td>
                    <td>$163,500</td>
                  </tr>
                  <tr>
                    <td>Sakura Yamamoto</td>
                    <td>Support Engineer</td>
                    <td>Tokyo</td>
                    <td>37</td>
                    <td>2009/08/19</td>
                    <td>$139,575</td>
                  </tr>
                  <tr>
                    <td>Thor Walton</td>
                    <td>Developer</td>
                    <td>New York</td>
                    <td>61</td>
                    <td>2013/08/11</td>
                    <td>$98,540</td>
                  </tr>
                  <tr>
                    <td>Finn Camacho</td>
                    <td>Support Engineer</td>
                    <td>San Francisco</td>
                    <td>47</td>
                    <td>2009/07/07</td>
                    <td>$87,500</td>
                  </tr>
                  <tr>
                    <td>Serge Baldwin</td>
                    <td>Data Coordinator</td>
                    <td>Singapore</td>
                    <td>64</td>
                    <td>2012/04/09</td>
                    <td>$138,575</td>
                  </tr>
                  <tr>
                    <td>Zenaida Frank</td>
                    <td>Software Engineer</td>
                    <td>New York</td>
                    <td>63</td>
                    <td>2010/01/04</td>
                    <td>$125,250</td>
                  </tr>
                  <tr>
                    <td>Zorita Serrano</td>
                    <td>Software Engineer</td>
                    <td>San Francisco</td>
                    <td>56</td>
                    <td>2012/06/01</td>
                    <td>$115,000</td>
                  </tr>
                  <tr>
                    <td>Jennifer Acosta</td>
                    <td>Junior Javascript Developer</td>
                    <td>Edinburgh</td>
                    <td>43</td>
                    <td>2013/02/01</td>
                    <td>$75,650</td>
                  </tr>
                  <tr>
                    <td>Cara Stevens</td>
                    <td>Sales Assistant</td>
                    <td>New York</td>
                    <td>46</td>
                    <td>2011/12/06</td>
                    <td>$145,600</td>
                  </tr>
                  <tr>
                    <td>Hermione Butler</td>
                    <td>Regional Director</td>
                    <td>London</td>
                    <td>47</td>
                    <td>2011/03/21</td>
                    <td>$356,250</td>
                  </tr>
                  <tr>
                    <td>Lael Greer</td>
                    <td>Systems Administrator</td>
                    <td>London</td>
                    <td>21</td>
                    <td>2009/02/27</td>
                    <td>$103,500</td>
                  </tr>
                  <tr>
                    <td>Jonas Alexander</td>
                    <td>Developer</td>
                    <td>San Francisco</td>
                    <td>30</td>
                    <td>2010/07/14</td>
                    <td>$86,500</td>
                  </tr>
                  <tr>
                    <td>Shad Decker</td>
                    <td>Regional Director</td>
                    <td>Edinburgh</td>
                    <td>51</td>
                    <td>2008/11/13</td>
                    <td>$183,000</td>
                  </tr>
                  <tr>
                    <td>Michael Bruce</td>
                    <td>Javascript Developer</td>
                    <td>Singapore</td>
                    <td>29</td>
                    <td>2011/06/27</td>
                    <td>$183,000</td>
                  </tr>
                  <tr>
                    <td>Donna Snider</td>
                    <td>Customer Support</td>
                    <td>New York</td>
                    <td>27</td>
                    <td>2011/01/25</td>
                    <td>$112,000</td>
                  </tr>
                </tbody>
              </table>
            </div>
          </div>
          <div class="card-footer small text-muted">Updated yesterday at 11:59 PM</div>
        </div>

      </div>
      <!-- /.container-fluid -->

      <!-- Sticky Footer -->
      <!--<footer class="sticky-footer">
        <div class="container my-auto">
          <div class="copyright text-center my-auto">
            <span>Copyright © Your Website 2019</span>
          </div>
        </div>
      </footer>

    </div>
    <!-- /.content-wrapper -->

  </div>
  <!-- /#wrapper -->

  <!-- Scroll to Top Button-->
  <a class="scroll-to-top rounded" href="#page-top">
    <i class="fas fa-angle-up"></i>
  </a>

  <!-- Logout Modal-->
  <div class="modal fade" id="logoutModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title" id="exampleModalLabel">Ready to Leave?</h5>
          <button class="close" type="button" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">×</span>
          </button>
        </div>
        <div class="modal-body">Select "Logout" below if you are ready to end your current session.</div>
        <div class="modal-footer">
          <button class="btn btn-secondary" type="button" data-dismiss="modal">Cancel</button>
          <a class="btn btn-primary" href="login.html">Logout</a>
        </div>
      </div>
    </div>
  </div>

  <!-- Bootstrap core JavaScript-->
  <script src="vendor/jquery/jquery.min.js"></script>
  <script src="vendor/bootstrap/js/bootstrap.bundle.min.js"></script>

  <!-- Core plugin JavaScript-->
  <script src="vendor/jquery-easing/jquery.easing.min.js"></script>

  <!-- Page level plugin JavaScript-->
  <script src="vendor/chart.js/Chart.min.js"></script>
  <script src="vendor/datatables/jquery.dataTables.js"></script>
  <script src="vendor/datatables/dataTables.bootstrap4.js"></script>

  <!-- Custom scripts for all pages-->
  <script src="js/sb-admin.min.js"></script>

  <!-- Demo scripts for this page-->
  <script src="js/demo/datatables-demo.js"></script>
  <script src="js/demo/chart-area-demo.js"></script>

</body>

</html>
  <?php   
}
else {
     header('Location: login.php');
}

?>
