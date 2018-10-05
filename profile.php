<?php 
session_start();
if(!isset($_SESSION["uid"])){
    header("location:index.php");
}
?>
<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title>Della Store</title>
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" type="text/css" media="screen" href="css/bootstrap.min.css" />
    <script src="js/jquery-3.3.1.min.js"></script>
    <script src="js/bootstrap.min.js"></script>
    <script src="main.js"></script>
</head>
<body>
  <div class="navbar navbar-inverse navbar-fixed-top">
    <div class="container-fluid">
        <div class="navbar-header">
            <a href="" class="navbar-brand">Della Store</a>
        </div>
        <ul class="nav navbar-nav">
            <li><a href="#"><span class="glyphicon glyphicon-home"></span> Home</a></li>
            <li><a href="#"><span class="glyphicon glyphicon-modal-window"></span> Products</a></li>
            <li style="width:300px;left:10px;top:10px"><input type="text" name="search" id="search" class="form-control"></li>
            <li style="top:10px;left:20px"><button class="btn btn-primary" id="search_btn">Search</button></li>
        </ul>
        <ul class="nav navbar-nav navbar-right">
            <li><a href="#" id="cart_container" class="dropdown-toggle" data-toggle="dropdown" ><span class="glyphicon glyphicon-shopping-cart"></span>Cart<span class="badge">0</span></a>
                <div class="dropdown-menu" style="width:400px;">
                    <div class="panel panel-success">
                        <div class="panel-heading">
                            <div class="row">
                                <div class="col-md-3 col-sm-3">Sr. No.</div>
                                <div class="col-md-3 col-sm-3">Product Image</div>
                                <div class="col-md-3 col-sm-3">Product Name</div>
                                <div class="col-md-3 col-sm-3">Price</div>
                            </div>
                        </div>  
                        <div class="panel-body">
                            <div id="cart_product">
                                    <!-- Cart Product -->
                            </div>
                        </div>  
                        <div class="panel-footer">

                        </div>  
                    </div>
                </div>
            </li>
            <li><a href="#" class="dropdown-toggle" data-toggle="dropdown" ><span class="glyphicon glyphicon-user"></span><?php echo "Hi," .$_SESSION["name"];?></a>

                <ul class="dropdown-menu">
                   <li><a href="cart.php" style="text-decoration:none;color:blue;"><span class="glyphicon glyphicon-shopping-cart"></span>Cart</a></li>
                   <li class="divider"></li>
                   <li><a href="" style="text-decoration:none;color:blue;">Change Password</a></li>
                   <li class="divider"></li>
                   <li><a href="logout.php" style="text-decoration:none;color:blue;">Logout</a></li>
                </ul>
            </li>            
           
        </ul>
    </div>
  </div>
  <p><br></p>
  <p><br></p>
  <p><br></p>
  <div class="container-fluid">
    <div class="row">
        <div class="col-md-1 col-sm-1">
        </div>
        <div class="col-md-2 col-sm-2">
            <div id="get_category">
            <!-- Sidebar - Category List -->
            </div>
            <div id="get_brand">
            <!-- Sidebar - Brand List -->
            </div>
           
        </div>
        <div class="col-md-8 col-sm-8">
            <div class="row">
                <div class="col-md-12" id="product_msg"></div>
            </div>
            <div class="panel panel-info">
                <div class="panel-heading">Products</div>
                <div class="panel-body">
                    <div id="get_product">
                    <!-- Product Listing -->
                    </div>                   
                </div>
                <div class="panel-footer">&copy; <?php echo date("Y"); ?> Della Concept Store Pvt. Ltd.</div>
            </div>
        </div>
        <div class="col-md-1 col-sm-1">
        </div>
    </div>
   </div>
</body>
</html>



   