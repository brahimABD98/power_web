<?php
require_once "../Core/AdminsC.php";
require_once "session.php";
//require_once "mail.php";

$var2 = $_SESSION["username"];
$var =  $_SESSION["role"];

?>
<div class="fh5co-loader"></div>
<script>
    var loaderPage = function() {
        $(".fh5co-loader").fadeOut("slow");
    };

    var counter = function() {
        $('.js-counter').countTo({
            formatter: function (value, options) {
                return value.toFixed(options.decimals);
            },
        });
    };

    $(function(){
        loaderPage();
    });
</script>
<div class="left-sidebar-pro" >
    <nav id="sidebar" class="" style="width:210px;">
        <div class="sidebar-header">
<!--            <a href="index.html"><img class="main-logo" src="img/lola.jpg" alt="" /></a>
            <strong><img src="img/logo/logosn.png" alt="" /></strong>-->
        </div>
        <div class="nalika-profile" style="" >
            <div class="profile-dtl">
                <a href="afficher_produits.php" class="fa fa-spin"><img class="main-logo" src="img/Lola.jpg" alt="" /></a>
                <h2 class="text-uppercase">GeoConcept.</h2>
            </div>
            <div class="profile-social-dtl">
                <ul class="dtl-social">
                    <li><a href="#"><i class="icon nalika-facebook"></i></a></li>
                </ul>
            </div>
        </div>
        <div class="left-custom-menu-adp-wrap comment-scrollbar">
            <nav class="sidebar-nav left-sidebar-menu-pro">
                <ul class="metismenu" id="menu1">
                    <?php if ($var=="admin") : ?>
                    <li class="active">
                        <a class="has-arrow" href="admins-edit.php">
                            <i class="icon nalika-paper-plane icon-wrap"></i>
                            <span class="mini-click-non">Admins</span>
                        </a>
                        <ul class="submenu-angle" aria-expanded="false">
                            <li><a title="Ajouter Admins" href="admins-edit.php"><span class="mini-sub-pro">Ajouter Admins</span></a>
                            </li>
                            <li><a title="Liste Admins" href="Afficher_admins.php"><span class="mini-sub-pro">Liste Admins</span></a>
                            </li>
                        </ul>
                    </li>
                    <?php endif; ?>
                    <li>
                        <a class="has-arrow"  aria-expanded="false"><i
                                    class="icon nalika-pie-chart icon-wrap"></i> <span
                                    class="mini-click-non">Produits</span></a>
                        <ul class="submenu-angle" aria-expanded="false">
                            <li><a title="Liste Produits" href="afficher_produits.php"><span class="mini-sub-pro">Liste Produits</span></a>
                            </li>
                            <li><a title="Ajouter Produits" href="product-edit.php"><span class="mini-sub-pro">Ajouter Produits</span></a>
                            </li>
                            <li><a title="Analytics" href="statistiques.php"><span class="mini-sub-pro">Stat Stock</span></a></li>
                            </li>
                        </ul>

                    <li>
                        <a class="has-arrow"  aria-expanded="false" ><i class="icon nalika-table icon-wrap"></i> <span
                                    class="mini-click-non">Commande</span></a>
                        <ul class="submenu-angle" aria-expanded="false">
                            <li><a title="Liste Produits" href="CommandeList.php"><span class="mini-sub-pro">Liste Commandes</span></a>
                            </li>
                            <li><a title="Liste Produits" href="REVENUE.php"><span class="mini-sub-pro">Revenue</span></a>
                            </li>
                          </ul>
                        </li>
                        <li>
                            <a class="has-arrow"  aria-expanded="false" ><i class="icon nalika-home icon-wrap"></i></i> <span
                                        class="mini-click-non">Users</span></a>
                            <ul class="submenu-angle" aria-expanded="false">
                                <li><a title="Liste Produits" href="Users.php"><span class="mini-sub-pro">Liste Users</span></a>
                                </li>
                                <li><a title="Liste Produits" href="SendMailForm.php"><span class="mini-sub-pro">Send Mail</span></a>
                                </li>
                              </ul>
                            </li>
                            <li>
                                <a class="has-arrow"  aria-expanded="false" ><i class="icon nalika-diamond icon-wrap"></i></i> <span
                                            class="mini-click-non">S.A.V</span></a>
                                <ul class="submenu-angle" aria-expanded="false">
                                    <li><a title="Liste Produits" href="demandeBACK.php"><span class="mini-sub-pro">Demandes</span></a>
                                    </li>
                                    <li><a title="Liste Produits" href="RDVBACK.php"><span class="mini-sub-pro">Rendez-vous</span></a>
                                    </li>
                                    <li><a title="Liste Produits" href="reclamationBACK.php"><span class="mini-sub-pro">Reclamations</span></a>
                                    </li>
                                  </ul>
                                </li>
                                <li>
                                    <a class="has-arrow" aria-expanded="false" ><i class="icon nalika-bar-chart icon-wrap"></i> <span
                                                class="mini-click-non">Location</span></a>
                                    <ul class="submenu-angle" aria-expanded="false">
                                        <li><a title="Liste Produits" href="locationBack.php"><span class="mini-sub-pro">Liste des locations</span></a>
                                        </li>

                                      </ul>
                                    </li>
                                    <li>
                                        <a class="has-arrow"  aria-expanded="false" ><i class="fa fa-truck icon-wrap"></i> <span
                                                    class="mini-click-non">Livraison</span></a>
                                        <ul class="submenu-angle" aria-expanded="false">
                                            <li><a title="Liste Produits" href="employeBACK.php"><span class="mini-sub-pro">Liste livreurs</span></a>
                                            </li>
                                            <li><a title="Liste Produits" href="AjouterEmployeBACK.php"><span class="mini-sub-pro">Ajouter Livreur</span></a>
                                            </li>
                                            <li><a title="Liste Produits" href="LivraisonBACK.php"><span class="mini-sub-pro">Liste Livraisons</span></a>
                                            </li>
                                            <li><a title="Liste Produits" href="AjouterLivraisonBACK.php"><span class="mini-sub-pro">Ajouter Livraison</span></a>
                                            </li>
                                          </ul>
                                        </li>
                </ul>
            </nav>
        </div>
    </nav>
</div>
<!-- Start Welcome area -->
<div class="all-content-wrapper">
    <div class="container-fluid">
        <div class="row">
            <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                <div class="logo-pro">
                    <a href="index.html"><img class="main-logo" src="img/logo/logo.png" alt="" /></a>
                </div>
            </div>
        </div>
    </div>
    <div class="header-advance-area">
        <div class="header-top-area">
            <div class="container-fluid">
                <div class="row" style="">
                    <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                        <div class="header-top-wraper">
                            <div class="row">
                                <div class="col-lg-1 col-md-0 col-sm-1 col-xs-12">
                                    <div class="menu-switcher-pro">
                                        <button type="button" id="sidebarCollapse" class="btn bar-button-pro header-drl-controller-btn btn-info navbar-btn">
                                            <i class="icon nalika-menu-task"></i>
                                        </button>
                                    </div>
                                </div>
                                <div class="col-lg-6 col-md-7 col-sm-6 col-xs-12">
                                    <div class="header-top-menu tabl-d-n">
                                        <div class="breadcome-heading">

                                        </div></div>
                                </div>
                                <div class="col-lg-5 col-md-5 col-sm-12 col-xs-12">
                                    <div class="header-right-info">
                                        <ul class="nav navbar-nav mai-top-nav header-right-menu">
                                            <li  class="nav-item"><a onmouseover="this.style.color='#85ffc7'" onmouseout="this.style.color='white'" href="../FrontOffice/index.php" role="button" ><i class="icon nalika-refresh-button" aria-hidden="true"></i></a>
                                                <div role="menu" class="notification-author dropdown-menu animated zoomIn">
                                                    <div class="notification-single-top">
                                                        <h1>Notifications</h1>
                                                    </div>
                                            </li>
                                            <li class="nav-item">
                                                <a href="#" data-toggle="dropdown" role="button" aria-expanded="false" class="nav-link dropdown-toggle">
                                                    <i class="icon nalika-user nalika-user-rounded header-riht-inf" aria-hidden="true"></i>

                                                    <span class="admin-name" style="font-size: 20px;text-decoration: underline;"><mark><?php echo $var2; ?></mark></span>

                                                </a>
                                                <a href="logout.php" class="fa fa-sign-out fa-2x "><!--<span class="icon nalika-unlocked author-log-ic"></span>--> </a>

                                            </li>

                                        </ul>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!-- Mobile Menu start -->
        <!-- Mobile Menu end -->
    </div>
