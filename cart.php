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
                </ul>
            </div>
    </div>
    <p><br></p>
    <p><br></p>
    <p><br></p>
    <div class="container-fluid">
        <div class="row">
            <div class="col-md-2"></div>
            <div class="col-md-8" id="cart_msg">
                <!-- Cart Message -->
            </div>
            <div class="col-md-2"></div>
        </div>
        <div class="row">
            <div class="col-md-2"></div>
            <div class="col-md-8">
                <div class="panel panel-primary">
                    <div class="panel-heading">Cart Checkout</div>
                    <div class="panel-body">
                        <div class="row">
                            <div class="col-md-2"><b>Action</b></div>
                            <div class="col-md-2"><b>Product Image</b></div>
                            <div class="col-md-2"><b>Product Name</b></div>
                            <div class="col-md-2"><b>Product Price</b></div>
                            <div class="col-md-2"><b>Quantity</b></div>
                            <div class="col-md-2"><b>Price in $</b></div>
                        </div>
                        <div id="cart_checkout"></div>
                       <!-- Checkout Product-->
                    </div>
                    <div class="panel-footer">
                    
                    </div>
                </div>
            </div>
            <div class="col-md-2">

            </div>
        </div>
    </div>
</body>