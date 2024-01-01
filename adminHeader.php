<?php
   session_start();
   include_once "config/koneksi.php";

?>
       
 <!-- nav -->
 <nav  class="navbar navbar-expand-lg navbar-light px-5" style="background-color: #3B3131;">
    
    <a class="navbar-brand ml-5" href="./index.php">
        <img src="assets/img/logo.png" width="80" height="80" alt="Swiss Collection">
    </a>
    <ul class="navbar-nav mr-auto mt-2 mt-lg-0"></ul>
    
    <div class="user-cart">  
        <?php           
        if(isset($_SESSION['admin'])){
          ?>
          <a href="\web-japanese" style="text-decoration:none;">
            <i class="fa fa-th-large mr-5" style="font-size:30px; color: #ffff; " aria-hidden="true"></i>
         </a> 
          <?php
        } else {
            ?>
            <a href="index.php" style="text-decoration:none; ">
            <i class="fa fa-cutlery" aria-hidden="true" style="color: #FFFFFF"></i>
            </a>

            <?php
        } ?>
    </div>  
</nav>
