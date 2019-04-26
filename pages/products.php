<?php
include ('sqlconn.php');
session_start();
$view=$db->prepare('SELECT * FROM products');
$view->execute();
if($_SERVER['REQUEST_METHOD']=="POST"&&isset($_POST['feedbackbtn'])){
    $name = test_in($_POST['fnam']) . " " . test_in($_POST['lnam']);
    $feed=test_in($_POST['fee']);
    $add = $db->prepare('INSERT INTO feedbacks (name,feedback) VALUES (:n,:f)');
    $add->execute(array(":n"=>$name,":f"=>$feed));
    header("Location:http://localhost/finalproj/pages/products.php?suc=we have got ur feedback.. thanks alot..");

}
?>
<!DOCTYBE html>
<html>
<head>
    <title>PRODUCTS - website.com</title>
    <link href="../CSS/bootstrap.min.css" rel="stylesheet">
    <link href="../CSS/font-awesome.min.css" rel="stylesheet">
    <link href="../CSS/style.css" rel="stylesheet">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://fonts.googleapis.com/css?family=Abel" rel="stylesheet">


</head>
<body>

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
            <a class="navbar-brand" href="../index.php">WEBSITE</a>
        </div>

        <!-- Collect the nav links, forms, and other content for toggling -->
        <div class="collapse navbar-collapse center" id="bs-example-navbar-collapse-1">
            <ul class="nav navbar-nav">

                <li><a href="../index.php">HOME</a></li>
                <li class="active"><a href="products.php?page=1">PRODUCTS<span class="sr-only">(current)</span></a></li>
                <li><a href="about.php">ABOUT US</a></li>
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
    
    <li><a href=\"update.php\">Update Profile</a></li>
    <li><a href=\"myproducts.php\">My Products</a></li>
    
    <li role=\"separator\" class=\"divider\"></li>
    <li><a href=\"logout.php\">LOGOUT</a></li>
  </ul>
</div></ul></div></div>";
                    }else{echo "<li><a href=\"login.php\">LOGIN</a></li>
    </ul></div></div>";}
                }else{echo "<li><a href=\"login.php\">LOGIN</a></li>
    </ul></div></div>";}

                ?>
</nav>


<div class="container" >
    <nav aria-label="...">
        <ul class="pager ">
            <li><a <?php if(isset($_GET['page'])){
                $page=intval($_GET['page']);
                if($page==1){
                    echo "class=\"disabled\"";
                }
                else if($page>1){
                    $page--;
                    echo "href=\"products.php?page=$page\"";
                }

                }?> >Previous</a></li>
            <li><a href="<?php
                if(isset($_GET['page'])){
                    $page=intval($_GET['page']);
                    $page++;
                    echo "products.php?page=$page";
                }
                ?>">Next</a></li>
        </ul>
    </nav>
    <br>
    <hr>

    <div class="row">
        <?php

        $page=intval($_GET['page']);


        $prod_const=($page-1)*4;
        $y=$page*4;
        $i=0;
            foreach ($view as $row){

                if($prod_const==$y){ break;}
                else if($prod_const==$i){
                    echo "  <a href=\"product.php?prod_id=".$row['id']."\" style='text-decoration: none'><div class=\" proddiv col-md-6\">
                    <img class=\"img-responsive img-thumbnail\" src=\"../images/".$row['img']."\" width=\"250px\" height=\"250px\" >
                    <h1>".$row['head']."</h1>
                    <p>".$row['para']."</p>
                    <button class=\"btn btn-success chng-bu\" style=\"text-align: center\" ><a href=\"myproducts.php?id=".$row['id']."\" style=\"text-decoration: none;color: white\">Order</a></button>
                </div></a>";
                    $prod_const++;
                    $i++;
                }
                else{ $i++;}
            }
        ?>



</div>
</div>


<?php
include ('temp.php');
?>


<script src="../js/jquery-3.2.1.min.js" ></script>
<script src="../js/bootstrap.min.js"></script>
<script src="../js/feedbackval.js"></script>
</body>



</html>