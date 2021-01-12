<?php

session_start();

include("includes/db.php");
include("functions/functions.php");
?>

<?php 

if(isset($_GET['pro_id'])){
    
    $product_id = $_GET['pro_id'];
    
    $get_product = "select * from products where product_id='$product_id'";
    
    $run_product = mysqli_query($con,$get_product);
    
    $row_product = mysqli_fetch_array($run_product);
    
    $p_cat_id = $row_product['p_cat_id'];
    
    $pro_title = $row_product['product_title'];
    
    $pro_price = $row_product['product_price'];
    
    $pro_desc = $row_product['product_desc'];
    
    $pro_img1 = $row_product['product_img1'];
    
    $pro_img2 = $row_product['product_img2'];
    
    $pro_img3 = $row_product['product_img3'];
    
    $get_p_cat = "select * from product_categories where p_cat_id='$p_cat_id'";
    
    $run_p_cat = mysqli_query($con,$get_p_cat);
    
    $row_p_cat = mysqli_fetch_array($run_p_cat);
    
    $p_cat_title = $row_p_cat['p_cat_title'];
    
}

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width-device-width, initial-scale=1">
    <title>M-Dev-Store</title>
    <link rel="stylesheet" href="styles/bootstrap-337.min.css">
    <link rel="stylesheet" href="font-awsome/css/font-awesome.min.css">
    <link rel="stylesheet" href="styles/style.css" type="text/css" media="screen">
</head>
<body>
    
    <div id="top"><!-- Top Begin -->
        
        <div class="container"><!-- container Begin -->
           
           <div class="col-md-6 offer"><!-- col-md-6 offer Begin -->
           
                <a href="#" class="btn btn-success btn-sm">
                    
                     <?php 
                   
                   if(!isset($_SESSION['customer_email'])){
                       
                       echo "Welcome: Guest";
                       
                   }else{
                       
                       echo "Welcome: " . $_SESSION['customer_email'] . "";
                       
                   }
                   
                   ?>
                    
                    
                </a>
                <a href="checkout.php">
                    
                    <?php 
                       
                       $ip_add = getRealIpUser();
                       
                       $select_cart = "select * from cart where ip_add='$ip_add'";
                       
                       $run_cart = mysqli_query($con,$select_cart);
                       
                       $count = mysqli_num_rows($run_cart);
                       
                       ?>
                       
                       You currently have <?php echo $count; ?> item(s) in your cart
                     
                </a>
            

            </div><!-- col-md-6 offer Finish -->
            
            <div class="col-md-6"><!-- col-md-6 Begin -->
                
                <ul class="menu"><!-- cmenu Begin -->
                
                    <li>
                        <a href="customer_register.php">Register</a>
                    </li>    
                    <li>
                        <a href="checkout.php">My Account</a>
                    </li>
                    <li>
                        <a href="cart.php">Go to Cart</a>
                    </li>
                    <li>
                        <a href="checkout.php">
                            
                            <?php 
                           
                           if(!isset($_SESSION['customer_email'])){
                       
                                echo "<a href='checkout.php'> Login </a>";

                               }else{

                                echo " <a href='logout.php'> Log Out </a> ";

                               }
                           
                           ?>
                            
                        </a>
                    </li>
                </ul><!--cmenu Finish -->
            </div>
        </div>
    </div>
    
    <div id="navbar" class="navbar navbar-default">
        
        <div class="container">
            
            <div class="navbar-header">
                
                <a href="#" class="navbar-brand home">
                    
                    <img src="images/ecom-store-logo.png" alt="M-Dev-Store Logo" class="hidden-xs">
                    
                    <img src="images/ecom-store-logo-mobile.png" alt="m-dev-store Mobile" class="visible-xs">
                    
                </a>
                
                <button class="navbar-toggle" data-toggle="collapse" data-target="#navigation">
                
                    <span class="sr-only">Toggle Navigation</span>
                    
                    <i class="fa fa-align-justify"></i>        
                
                </button>
                
                 <button class="navbar-toggle" data-toggle="collapse" data-target="#search">
                
                    <span class="sr-only">Toggle Search</span>
                    
                    <i class="fa fa-search"></i>        
                
                </button>
        
            </div>
            
            <div class="navbar-collapse collapse" id="navigation">
                
                <div class="padding-nav">
                    
                    <ul class="nav navbar-nav left">
                        
                        <li class="<?php if($active=='Home') echo "active"; ?>">
                            
                            <a href="index.php">Home</a>
                        </li>
                        <li class="<?php if($active=='Shop') echo "active"; ?>">
                            <a href="shop.php">Shop</a>
                        </li>
                        
                        <li class="<?php if($active=='Account') echo"active"; ?>">
                           
                           <?php 
                           
                           if(!isset($_SESSION['customer_email'])){
                               
                               echo"<a href='checkout.php'>My Account</a>";
                               
                           }else{
                               
                              echo"<a href='customer/my_account.php?my_orders'>My Account</a>"; 
                               
                           }
                           
                           ?>
                           
                       </li>
                        <li class="<?php if($active=='Cart') echo "active"; ?>">
                            <a href="cart.php">Shopping Cart</a>
                        </li>
                        <li class="<?php if($active=='Contact') echo "active"; ?>">
                            <a href="contact.php">Contact us</a>
                        </li>
                        
                    </ul>
                    
                </div>
                
                <a href="cart.php" class="btn navbar-btn btn-primary right">
                    
                    <i class="fa fa-shopping-cart"></i>
                    
                    <span>
                        
                          <?php 
                       
                       $ip_add = getRealIpUser();
                       
                       $select_cart = "select * from cart where ip_add='$ip_add'";
                       
                       $run_cart = mysqli_query($con,$select_cart);
                       
                       $count = mysqli_num_rows($run_cart);
                       
                       ?>
                       
                       <?php echo $count; ?> item(s) in your cart
                        
                    </span>
                </a>
                
                <div class="navbar-collapse collapse right">
                    
                    <button class="btn btn-primary navbar-btn" type="button" data-toggle="collapse" data-target=#search>
                       
                        <span class="sr-only">Toggle Search</span>
                          
                          <i class="fa fa-search"></i>
                           
                    </button>
                    
                </div>
                
                <div class="collapse clearfix" id="search">
                    
                    <form method="get" action="result.php" class="navbar-form">
                        
                        <div class="input-group">
                            
                           <input type="text" class="form-control" placeholder="search" name="user_query" required>
                           
                            <button type="submit" name="seacrh" value="Search" class="btn btn-primary">
                                
                                <i class="fa fa-search"></i>
                                
                            </button> 
                            
                        </div>
                        
                    </form>
                    
                </div>
                
            </div>
            
        </div>
        
    </div> 