

  <?php 
  include("include/header.php"); 
   ?> 

         <!-- Mobile Menu Start -->
    <div class="mobile-menu-area">
      <div class="container">
        <div class="row">
            <div class="col-md-9 col-sm-12 hidden-xs">
                <div class="mainmenu text-center">
                    <nav>
                        <ul id="nav">
                            <li><a href="index.html">HOME</a></li>
                            <li><a href="#">CATALOGUE</a>
                                <ul class="sub-menu">
                                    <li><a href="about.html">About Us</a></li>
                                    <li><a href="cart.html">Cart Page</a></li>
                                </ul></li>
                            <li><a href="#">ESPACE LECTEUR</a>
                                <ul class="sub-menu">
                                    <li><a href="about.html">About Us</a></li>
                                    <li><a href="cart.html">Cart Page</a></li>
                                </ul></li>
                            <li><a href="#">MAISSON D'EDITION</a>
                                <ul class="sub-menu">
                                    <li><a href="about.html">About Us</a></li>
                                    <li><a href="cart.html">Cart Page</a></li>
                                </ul></li>
                            <li><a href="#">CONTACT</a>
                                <ul class="sub-menu">
                                    <li><a href="about.html">About Us</a></li>
                                    <li><a href="contact.html">Contact</a></li>
                                    <li><a href="demande_produit.html">Demande produit specifie</a></li>
                                </ul></li>
                        </ul>
                    </nav>
                </div>
            </div>
        </div>
      </div>
    </div>    
    <!-- Mobile Menu End -->   
        <!-- Breadcrumbs Area Start -->
        <div class="breadcrumbs-area">
      <div class="container">
        <div class="row">
          <div class="col-md-12">
              <div class="breadcrumbs">
                 <h2>Les demandes</h2> 
                 <ul class="breadcrumbs-list">
                    <li>
                        <a title="Return to Home" href="index.html">Home</a>
                    </li>
                    <li>My Request</li>
                </ul>
              </div>
          </div>
        </div>
      </div>
    </div> 
    <!-- Breadcrumbs Area Start -->
    <!-- My Account Area Start -->
    <div class="my-account-area section-padding">
      <div class="container">
        <div class="section-title2">
          <h2>Proceed to send a request</h2>
          <p>Welcome to your account. Here you can manage all of your personal information and orders.</p>
        </div>
        <div class="row">
          <div class="addresses-lists">
           
                 
                  <div id="collapseTwo" class="panel-collapse collapse" role="tabpanel" aria-labelledby="headingTwo">
                    <div class="panel-body">
                      <div class="coupon-info">
                       
                        <p class="coupon-text">Here are the orders you've placed since your account was created.</p>
                        <div class="order-history">
                          <p class="alert">You have not placed any orders.</p>
                        </div>
                      </div>
                    </div>
                  </div>
                </div>
               
                  <div id="collapseThree" class="panel-collapse collapse" role="tabpanel" aria-labelledby="headingThree">
                    <div class="panel-body">
                      <div class="coupon-info">
                        <h1 class="heading-title">Order history </h1>
                        <p class="coupon-text">Here are the orders you've placed since your account was created.</p>
                        <div class="order-history">
                          <p class="alert">You have not placed any orders.</p>
                        </div>
                      </div>
                    </div>
                  </div>
                </div>
                   <div id="collapseOne" class="panel-collapse collapse in" role="tabpanel" aria-labelledby="headingOne">
                        <div class="anel-body">
                            <div class="coupon-info">
                                <h1 class="heading-title">Your Request </h1>
                  <p class="coupon-text">To add a new request, please fill out the form below.</p>
                 <p class="required">*Required field</p>
                                
                                <p class="form-row">
                                    <form method="post" name="formular" action="ajouterDemande.php">
                                    	 <p class="form-row">
                                <input type="text" placeholder="Nom  *"name="lname" id="lname" onblur="CheckNom()">
                                   <label id="meriem" style="color:#b7a868;" ></label>
                                </p>
                                 <p class="form-row">
                                <input type="num" placeholder="Numéro de Tel°"name="num"id="num" onblur="CheckNum()">
                                     <label id="ip" style="color:#b7a868;" ></label>

                                </p>
                           
                                                    
                                <div class="shop-select">
                            <label>Objet<span class="required"></span></label>
                                <select name="subject" id="subject">
                                <option value="Partenariat">Partenariat</option>
                                <option value="Sponsoring">Sponsoring</option>
                                
                                </select>                                       
                                </div>  
                                   <p class="required">Ajouter une description </p>
                            <p class="form-row order-notes">
                            <textarea placeholder="Details" name="message" id="message"></textarea>
                             </p>
                             
     						   <input type="Date" name="dateajout" id="dateajout" placeholder="Date demande">
                                </p>
                           
                  
                                <div class="p-t-20">
                        <input type="submit" id ="envoyer" name="envoyer" onclick="saisie()" class="btn btn-primary" value="envoyer" />
                                   </div>
                             <!--<input type="submit"  id ="envoyer" name="envoyer" class="fa fa-chevron-right" value="  Envoyer">-->
                              
                            
                        
                            </form>
                                    </div>                                          
                            </div>
                        </div>
                    </div>
        <div class="row">
          <div class="col-md-12">
            <div class="create-account-button pull-left">
              <a href="index.html" class="btn button button-small" title="Home">
                <span>
                  <i class="fa fa-chevron-left"></i>
                    Home
                </span>
              </a>
            </div>
          </div>
        </div>
      </div>
    </div>
    <!-- My Account Area End -->
    <!-- Footer Area Start -->
    <footer>
        <div class="footer-top-area">
            <div class="container">
                <div class="row">
                    <div class="col-md-3 col-sm-8">
                        <div class="footer-left">
                            <a href="index.html">
                                <img src="img/logo-2.png" alt="">
                            </a>
                            <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore.</p>
                            <ul class="footer-contact">
                                <li>
                                    <i class="flaticon-location"></i>
                                    450 fifth Avenue, 34th floor. NYC
                                </li>
                                <li>
                                    <i class="flaticon-technology"></i>
                                    (+800) 123 4567 890
                                </li>
                                <li>
                                    <i class="flaticon-web"></i>
                                    info@bookstore.com
                                </li>
                            </ul>
                        </div>
                    </div>
                    <div class="col-md-2 col-sm-4">
                        <div class="single-footer">
                            <h2 class="footer-title">Information</h2>
                            <ul class="footer-list">
                                <li><a href="about.html">About Us</a></li>
                                <li><a href="#">auteur</a></li>
                                <li><a href="#">Maison d'edition</a></li>
                            </ul>
                        </div>
                    </div>
                    <div class="col-md-2 hidden-sm">
                        <div class="single-footer">
                            <h2 class="footer-title">My Account</h2>
                            <ul class="footer-list">
                                <li><a href="my-account.html">My Account</a></li>
                                <li><a href="cart.html">My Cart</a></li>
                                <li><a href="wishlist.html">Wishlist</a></li>
                                <li><a href="checkout.html">Checkout</a></li>
                            </ul>
                        </div>
                    </div>
                    <div class="col-md-2 hidden-sm">
                        <div class="single-footer">
                            <h2 class="footer-title">Cataloge</h2>
                            <ul class="footer-list">
                                <li><a href="#">Cataloge1</a></li>
                                <li><a href="#">Cataloge2</a></li>
                                <li><a href="#">Cataloge3</a></li>
                                <li><a href="#">Cataloge4</a></li>
                                <li><a href="#">Cataloge5</a></li>
                            </ul>
                        </div>
                    </div>
                    <div class="col-md-3 col-sm-8">
                        <div class="single-footer footer-newsletter">
                            <h2 class="footer-title">Our Newsletter</h2>
                            <p>Consectetur adipisicing elit se do eiusm od tempor incididunt ut labore et dolore magnas aliqua.</p>
                        
                            <ul class="social-icon">
                                <li>
                                    <a href="#">
                                        <i class="flaticon-social"></i>
                                    </a>
                                </li>
                                <li>
                                    <a href="#">
                                        <i class="flaticon-social-1"></i>
                                    </a>
                                </li>
                                <li>
                                    <a href="#">
                                        <i class="flaticon-social-2"></i>
                                    </a>
                                </li>
                                <li>
                                    <a href="#">
                                        <i class="flaticon-video"></i>
                                    </a>
                                </li>
                            </ul>
                        </div>
                    </div>
                    <div class="col-md-2 col-sm-4 visible-sm">
                        <div class="single-footer">
                            <h2 class="footer-title">Cataloge</h2>
                            <ul class="footer-list">
                                <li><a href="#">Cataloge1</a></li>
                                <li><a href="#">Cataloge2</a></li>
                                <li><a href="#">Cataloge3</a></li>
                                <li><a href="#">Cataloge4</a></li>
                                <li><a href="#">Cataloge5</a></li>
                            </ul>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="footer-bottom">
            <div class="container">
                <div class="row">
                    <div class="col-md-6">
                        <div class="footer-bottom-left pull-left">
                            <p>Copyright &copy; 2019 <span><a href="#">Tech Army</a></span>. All Right Reserved.</p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </footer>
    <!-- Footer Area End -->
        <!-- all js here -->
        <!-- jquery latest version -->
       
        <script src="js/vendor/jquery-1.12.0.min.js"></script>
        <!-- bootstrap js -->
        <script src="js/bootstrap.min.js"></script>
        <!-- owl.carousel js -->
        <script src="js/owl.carousel.min.js"></script>
        <!-- jquery-ui js -->
        <script src="js/jquery-ui.min.js"></script>
        <!-- jquery Counterup js -->
        <script src="js/jquery.counterup.min.js"></script>
        <script src="js/waypoints.min.js"></script> 
        <!-- jquery countdown js -->
        <script src="js/jquery.countdown.min.js"></script>
        <!-- jquery countdown js -->
        <script type="text/javascript" src="venobox/venobox.min.js"></script>
        <!-- jquery Meanmenu js -->
        <script src="js/jquery.meanmenu.js"></script>
        <!-- wow js -->
        <script src="js/wow.min.js"></script>   
        <script>
            new WOW().init();
        </script>
        <!-- scrollUp JS -->        
        <script src="js/jquery.scrollUp.min.js"></script>
        <!-- plugins js -->
        <script src="js/plugins.js"></script>
        <!-- Nivo slider js -->
        <script src="lib/js/jquery.nivo.slider.js" type="text/javascript"></script>
        <script src="lib/home.js" type="text/javascript"></script>
        <!-- main js -->
        <script src="js/main.js"></script>
         <script src="js/global.js"></script>
    <script src="js/scripts.js"></script>

 <script type="text/javascript">
     
function saisie(){

    if((document.getElementById("num").value=='')||(document.getElementById("num").value=='')){alert('veuillez remplir tous les chemps');}
}
 
     

 </script>   

    </body>
</html>
