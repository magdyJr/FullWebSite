<?php
include ('sqlconn.php');
session_start();
if(isset($_SESSION['loggedin'])) {
    if ($_SESSION['loggedin'] == 'true')
    {
        if ($_SERVER['REQUEST_METHOD']=="GET"){
            if(isset($_GET['id'])){
                $add = $db->prepare('INSERT INTO usersandprod (user_id,prod_id) VALUES (:u,:p)');
                $add->execute(array(":u"=>$_SESSION['id'],":p"=>$_GET['id']));

            }
        }
        else if ($_SERVER['REQUEST_METHOD'] == 'POST'&&isset($_POST['feedbackbtn'])){
            $name = test_in($_POST['fnam']) . " " . test_in($_POST['lnam']);
            $feed=test_in($_POST['fee']);
            $add = $db->prepare('INSERT INTO feedbacks (name,feedback) VALUES (:n,:f)');
            $add->execute(array(":n"=>$name,":f"=>$feed));
            header("Location:http://localhost/finalproj/pages/update.php?suc=we have got ur feedback.. thanks alot..");
        }
        $id=$_SESSION['id'];
        $view=$db->prepare('SELECT prod_id FROM usersandprod WHERE user_id=:id');
        $view->execute(array(":id"=>$id));

    }else {
        header("Location:http://localhost/finalproj/pages/login.php?err=u must login first");

    }
}
else{
    header("Location:http://localhost/finalproj/pages/login.php?err=u must login first");

}

?>
<!doctybe html>
<html>
<head>
    <title>My Products - website.com</title>

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
                <li><a href="products.php?page=1">PRODUCTS</a></li>
                <li><a href="about.php">ABOUT US</a></li>
                <li><button onclick="window.scrollTo(0,document.body.scrollHeight);">CONTACT US</button></li>

                <div class="btn-group">
                    <button type="button" class="btn btn-default dropdown-toggle" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                        <i style='font-size: 26px' class="fa fa-user-circle" aria-hidden="true"></i> <span class="caret"></span>
                    </button>
                    <ul class="dropdown-menu">
                        <?php
                        $username=$_SESSION['username'];
                        ?>
                        <li><p style="
                   margin-left: 20px;
                   font-size: 15px;
                   font-weight: bold;
                   color: #ddc22d;">Hey <?php echo $username?> <i class="fa fa-hand-peace-o" aria-hidden="true"></i></p></li>
                        <li ><a href="update.php">Update Profile</a></li>
                        <li class="active"><a href="myproducts.php">My Products<span class="sr-only">(current)</span></a></li>

                        <li role="separator" class="divider"></li>
                        <li><a href="logout.php">LOGOUT</a></li>
                    </ul>
                </div>
            </ul>
        </div>
    </div>
</nav>

<div class="container" style="height:600px">
    <table class="table table-striped">


        <tr>

            <th>ID</th>
            <th>Ordered Products</th>


        </tr>

        <?php
        foreach ($view as $row)
        {
            $view2=$db->prepare('SELECT head FROM products WHERE id=:id');
            $view2->execute(array(':id'=>$row['prod_id']));

            foreach ($view2 as $row1){
                echo "<tr><td>".$row['prod_id']."</td><td>".$row1['head']."</td></tr>";
            }
//            echo "<tr><td>Email</td><td>".$row['email']."</td><td><button onclick='document.getElementById(\"updated\").name=\"emailup\";document.getElementById(\"update\").style.display=\"block\";' style='font-size:16px;color: #337ab7;;border: 0;background-color: rgba(0, 0, 0, .0001);'><span class='glyphicon glyphicon-edit'></span></button></td></tr>";
//            echo "<tr><td>Password</td><td>".$row['password']."</td><td><button onclick='document.getElementById(\"updated\").name=\"passup\";document.getElementById(\"update\").style.display=\"block\";' style='font-size:16px;color: #337ab7;;border: 0;background-color: rgba(0, 0, 0, .0001);'><span class='glyphicon glyphicon-edit'></span></button></td></tr>";
//            echo "<tr><td>Age</td><td>".$row['age']."</td><td><button onclick='document.getElementById(\"updated\").name=\"ageup\";document.getElementById(\"update\").style.display=\"block\";' style='font-size:16px;color: #337ab7;;border: 0;background-color: rgba(0, 0, 0, .0001);'><span class='glyphicon glyphicon-edit'></span></button></td></tr>";
//            echo "<tr><td>Gender</td><td>".$row['gender']."</td><td></td></tr>";

        }
        ?>


    </table>

</div>


<?php
include ('temp.php');
?>


<script src="../js/jquery-3.2.1.min.js" ></script>
<script src="../js/bootstrap.min.js"></script>
<script src="../js/feedbackval.js"></script>
<script src="../js/update.js"></script>
</body>



</html>