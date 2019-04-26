<?php
include ('pages/sqlconn.php');
session_start();
if($_SERVER['REQUEST_METHOD']=="POST"){
    $name = test_in($_POST['fnam']) . " " . test_in($_POST['lnam']);
    $feed=test_in($_POST['fee']);
    $add = $db->prepare('INSERT INTO feedbacks (name,feedback) VALUES (:n,:f)');
    $add->execute(array(":n"=>$name,":f"=>$feed));
    header("Location:http://localhost/finalproj/index.php?suc=we have got ur feedback.. thanks alot..");

}


?>


<!DOCTYBE html>
<html>
<head>
    <title>HOME - website.com</title>
    <link href="CSS/bootstrap.min.css" rel="stylesheet">
    <link href="CSS/font-awesome.min.css" rel="stylesheet">
    <link href="CSS/style.css" rel="stylesheet">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://fonts.googleapis.com/css?family=Abel" rel="stylesheet">


</head>
<body>
<div class="topdiv">
    <div class="caption">
        <h1>Welcome To Our Website</h1>
        <p>The Road is in front of you</p>
    </div>


    <nav class="navbar navbar-default">
        <div class="container">
            <!-- Brand and toggle get grouped for better mobile display -->
            <div class="navbar-header">
                <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#bs-example-navbar-collapse-1" aria-expanded="false">
                    <span class="sr-only">Toggle navigation</span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                </button>
                <a class="navbar-brand" href="index.php">WEBSITE</a>
            </div>

            <!-- Collect the nav links, forms, and other content for toggling -->
            <div class="collapse navbar-collapse center" id="bs-example-navbar-collapse-1">
                <ul class="nav navbar-nav">

                    <li class="active"><a href="index.php">HOME<span class="sr-only">(current)</span></a></li>
                    <li><a href="pages/products.php?page=1">PRODUCTS</a></li>
                    <li><a href="pages/about.php">ABOUT US</a></li>
                    <li><button onclick="window.scrollTo(0,document.body.scrollHeight);">CONTACT US</button></li>
                    <?php
                    if(isset($_SESSION['loggedin'])){
                        if($_SESSION['loggedin']=='true'){
                            $username=$_SESSION['username'];
                            echo "<div class=\"btn-group\">
  <button type=\"button\" class=\"btn btn-default dropdown-toggle\" data-toggle=\"dropdown\" aria-haspopup=\"true\" aria-expanded=\"false\">
    <i style='font-size: 26px' class=\"fa fa-user-circle\" aria-hidden=\"true\"></i> <span class=\"caret\"></span>
  </button>
  <ul class=\"dropdown-menu\">
    <li><p style=\"
    margin-left: 20px;
    font-size: 15px;
    font-weight: bold;
    color: #ddc22d;\">Hey $username <i class=\"fa fa-hand-peace-o\" aria-hidden=\"true\"></i></p></li>
    <li><a href=\"pages/update.php\">Update Profile</a></li>
    <li><a href=\"pages/myproducts.php\">My Products</a></li>
    
    <li role=\"separator\" class=\"divider\"></li>
    <li><a href=\"pages/logout.php\">LOGOUT</a></li>
  </ul>
</div></ul></div></div>";
                        }else{echo "<li><a href=\"pages/login.php\">LOGIN</a></li>
    </ul></div></div>";}
                    }else{echo "<li><a href=\"pages/login.php\">LOGIN</a></li>
    </ul></div></div>";}

                    ?><!-- /.container-fluid -->
    </nav>
    </div>
<div style="background-color: #f2f2f2">
<div class="container" >
    <div class="welc">
        <h1>See Our Top Products :</h1>
    </div>
    <div class="row">
        <div class=" proddiv col-md-6">
            <img class="img-responsive" src="images/pic1.jpg" width="250px" height="250px" >
            <h1>Lorem ipsum</h1>
            <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Adipisci dignissimos enim ex recusandae voluptatibus? Aliquam aperiam iusto magni maxime nemo nesciunt non, omnis perferendis placeat quos repellat, similique sit vero!</p>
            <button class="btn btn-success chng-bu" style="text-align: center" ><a href="pages/products.php?page=1" style="text-decoration: none;color: white">See More</a></button>
        </div>
        <div class=" proddiv col-md-6">
            <img class="img-responsive" src="images/pic2.jpg" width="250px" height="250px">
            <h1>Lorem ipsum</h1>
            <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Adipisci dignissimos enim ex recusandae voluptatibus? Aliquam aperiam iusto magni maxime nemo nesciunt non, omnis perferendis placeat quos repellat, similique sit vero!</p>
            <button class="btn btn-success chng-bu" style="text-align: center" ><a href="pages/products.php?page=1" style="text-decoration: none;color: white">See More</a></button>
        </div>
        <div class=" proddiv col-md-6">
            <img class="img-responsive" src="images/pic3.jpg" width="250px" height="250px">
            <h1>Lorem ipsum</h1>
            <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Adipisci dignissimos enim ex recusandae voluptatibus? Aliquam aperiam iusto magni maxime nemo nesciunt non, omnis perferendis placeat quos repellat, similique sit vero!</p>
            <button class="btn btn-success chng-bu" style="text-align: center"><a href="pages/products.php?page=1" style="text-decoration: none;color: white">See More</a></button>
        </div>
    </div>
</div>
</div>

    <div class="container" >
        <div class="row">
        <div class="features col-md-4">
            <span class="glyphicon glyphicon-briefcase"></span>
            <h4>Best prices</h4>
            <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit....</p>

            <button class="btn btn-success chng-bu"><a href="pages/about.php" style="text-decoration: none;color: white">Read More</a></button>
        </div>

        <div class="features col-md-4">
            <span class="glyphicon glyphicon-lock"></span>
            <h4>Security</h4>
            <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit....</p>
            <button class="btn btn-success chng-bu" ><a href="pages/about.php" style="text-decoration: none;color: white">Read More</a></button>

        </div>

        <div class="features col-md-4">
            <span class="glyphicon glyphicon-globe"></span>
            <h4>Known from all the world</h4>
            <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit....</p>
            <button class="btn btn-success chng-bu"><a href="pages/about.php" style="text-decoration: none;color: white">Read More</a></button>

        </div>
        </div>
    </div>


<?php
include ('pages/temp.php');
?>


<script src="js/jquery-3.2.1.min.js" ></script>
<script src="js/bootstrap.min.js"></script>
<script src="js/feedbackval.js"></script>
</body>



</html>

