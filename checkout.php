<?php

    $active='Account';
    include("includes/header.php");

?>
    
    <div id="content">
        <div class="container">
            <div class="col-md-12">
                
               <ul class="breadcrumb">
               
                   <li><a href="index.php">Home</a></li>
                   
                   <li>
                       Register
                   </li>
               
               </ul> 
                
            </div>
            
            <div class="col-md-3">
                
                <?php 
    
                    include("includes/slidebar.php");
    
                ?> 
                
           </div>
           
           
           <div class="col-md-9"><!-- col-md-9 Begin -->
           
           <?php 
           
           if(!isset($_SESSION['customer_email'])){
               
               include("customer/customer_login.php");
               
           }else{
               
               include("payment_options.php");
               
           }
           
           ?>
           
           </div><!-- col-md-9 Finish -->
           
       </div><!-- container Finish -->
   </div><!-- #content Finish -->
   
   <?php 
    
    include("includes/footer.php");
    
    ?>
    
    <script src="js/jquery-331.min.js"></script>
    <script src="js/bootstrap-337.min.js"></script>

</body>

</html>

      
          

