<?php
include ('sqlconn.php');
session_start();
if(isset($_SESSION['loggedin'])) {
    if ($_SESSION['loggedin'] == 'true')
        header("Location:http://localhost/finalproj/index.php");
}
else {
    if ($_SERVER['REQUEST_METHOD'] == 'POST'&&isset($_POST['logbtn'])&&$_POST['logbtn']=="t") {
        $user = test_in($_POST['username']);
        $pass = test_in($_POST['pass']);
        if($user!=""&&$pass!=""){
            if(strpos($user,"@")!=false&&strpos($user,".")!=false){
                $substr=explode("@",$user);
                if($substr[0]!=""&&$substr[1]!=""){
                    $substr2=explode(".",$substr[1]);
                    foreach ($substr2 as $value){
                        if($value==""){
                            $error='err=ur email or password maybe wrong';
                            header("Location:http://localhost/finalproj/index.php?$error");
                        }
                    }
                    $check = $db->prepare('SELECT * FROM users');
                    $check->execute();
                    $x=true;
                    foreach ($check as $row) {
                        if($user==$row['email']){
                            if($pass==$row['password']){
                                $_SESSION['loggedin']='true';
                                $_SESSION['id']=$row['id'];
                                $_SESSION['username']=$row['name'];
                                header("Location:http://localhost/finalproj/index.php");
                                $x=false;
                            }
                        }

                    }
                    if($x){
                        $error='err=ur email or password maybe wrong';
                        header("Location:http://localhost/finalproj/index.php?$error");
                    }
                }

            }else{
                $error='err=ur email or password maybe wrong';
                header("Location:http://localhost/finalproj/index.php?$error");
            }

        }else{
            $error='err=ur email or password maybe wrong';
            header("Location:http://localhost/finalproj/index.php?$error");
        }


    }
    else if ($_SERVER['REQUEST_METHOD'] == 'POST'&&isset($_POST['feedbackbtn'])){
        $name = test_in($_POST['fnam']) . " " . test_in($_POST['lnam']);
        $feed=test_in($_POST['fee']);
        $add = $db->prepare('INSERT INTO feedbacks (name,feedback) VALUES (:n,:f)');
        $add->execute(array(":n"=>$name,":f"=>$feed));
        header("Location:http://localhost/finalproj/pages/login.php?suc=we have got ur feedback.. thanks alot..");
    }

}


?>
<!doctybe html>
<html>
<head>
    <title>LOGIN - website.com</title>
    <link href="../CSS/logincss.css" rel="stylesheet">
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
                <li class="active"><a href="login.php">LOGIN<span class="sr-only">(current)</span></a></li>
            </ul>


        </div><!-- /.navbar-collapse -->
    </div><!-- /.container-fluid -->
</nav>

<div class="login-page">
    <div class="form">

        <form class="login-form" name="loginform" method="post" action="">
            <p style="color: red">
                <?php
                    if(isset($_GET['err'])){
                        $rr=$_GET['err'];
                        echo $rr;
                    }
                ?>
            </p>
            <p id="empty"></p>
            <input type="email" placeholder="email" name="username"/>
            <p id="user"></p>
            <input type="password" placeholder="password" name="pass"/>
            <button value="t" name="logbtn" onclick="return logval();">login</button>
            <p class="message">Not registered? <a href="register.php">Create an account</a></p>
        </form>
    </div>
</div>

<?php
include ('temp.php');
?>


<script src="../js/jquery-3.2.1.min.js" ></script>
<script src="../js/bootstrap.min.js"></script>
<script src="../js/loginval.js"></script>
<script src="../js/feedbackval.js"></script>
</body>



</html>