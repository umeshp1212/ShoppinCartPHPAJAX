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
            <div class="col-md-8" id="signup_msg">
                <!-- Signup Messgae -->
            </div>
            <div class="col-md-2"></div>
        </div>
        <div class="row">
            <div class="col-md-2"></div>
            <div class="col-md-8">
                <div class="panel panel-primary">
                    <div class="panel-heading">Customer Signup Form <span id="signup_msg"> </span></div>
                    <div class="panel-body">
                       
                        <form method="POST">
                            <div class="row">
                                <div class="col-md-6">
                                    <label for="f_name">First Name</label>
                                    <input type="text" name="f_name" id="f_name" class="form-control">
                                </div>
                                <div class="col-md-6">
                                    <label for="l_name">Last Name</label>
                                    <input type="text" name="l_name" id="l_name" class="form-control">
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-md-6">
                                    <label for="password">Password</label>
                                    <input type="password" name="password" id="password" class="form-control">
                                </div>
                                <div class="col-md-6">
                                    <label for="repassword">Repassword</label>
                                    <input type="password" name="repassword" id="repassword" class="form-control">
                                </div>
                            </div>  
                            <div class="row">
                                <div class="col-md-6">
                                    <label for="email">Email</label>
                                    <input type="email" name="email" id="email" class="form-control">
                                </div>
                                <div class="col-md-6">
                                    <label for="mobile">Mobile</label>
                                    <input type="text" name="mobile" id="mobile" class="form-control">
                                </div>
                            </div>   
                            <div class="row">
                                <div class="col-md-6">
                                    <label for="address1">Address Line 1</label>
                                    <input type="text" name="address1" id="address1" class="form-control">
                                </div>
                                <div class="col-md-6">
                                    <label for="address2">Address Line 2</label>
                                    <input type="text" name="address2" id="address2" class="form-control">
                                </div>
                            </div>   
                            <p><br></p>
                            <div class="row">
                                <div class="col-md-12">
                                    <input style="float:right" type="button" name="signup_button" value="Sign Up" id="signup_button" class="btn btn-success btn-lg">
                                </div>                                          
                            </div>
                        </form>                        
                    </div>
                    <div class="panel-footer">Footer</div>
                </div>
            </div>
            <div class="col-md-2"></div>
        </div>
    </div>
</body>


