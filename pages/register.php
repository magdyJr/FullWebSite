<?php
include ('sqlconn.php');
session_start();
if(isset($_SESSION['loggedin'])) {
    if ($_SESSION['loggedin'] == 'true')
        header("Location:http://localhost/finalproj/index.php");
}
else {
    if ($_SERVER['REQUEST_METHOD'] == 'POST'&&isset($_POST['regbtn'])&&$_POST['regbtn']=="t") {
        if($_POST['fname']==""||$_POST['lname']==""){
            $err = "error=u should submit all the form to register";
            header("Location:http://localhost/finalproj/pages/register.php?$err");
        }
        $name = test_in($_POST['fname']) . " " . test_in($_POST['lname']);
        $email = test_in($_POST['em']);
        $pass = test_in($_POST['pass']);
        $age = test_in($_POST['age']);
        $gender = test_in($_POST['gen']);
        if($name!=""&&$email!=""&&$pass!=""&&$age!=""&&$gender!="")
        {
            if ($gender == "m" || $gender == "f") {
                if (is_numeric($age)){
                    $age=intval($age);
                    if($age>17&&$age<85){
                        if(strpos($email,"@")!=false&&strpos($email,".")!=false) {
                            $substr = explode("@", $email);
                            if ($substr[0] != "" && $substr[1] != "") {
                                $substr2 = explode(".", $substr[1]);
                                foreach ($substr2 as $value) {
                                    if ($value == "") {
                                        $err = "error=this a wrong email";
                                        header("Location:http://localhost/finalproj/pages/register.php?$err");
                                    }
                                }
                                $check = $db->prepare('SELECT * FROM users');
                                $check->execute();
                                foreach ($check as $row) {
                                    if ($email == $row['email']) {
                                        $err = "error1=this email is used from another user";
                                        header("Location:http://localhost/finalproj/pages/register.php?$err");
                                    }
                                }
                                $add = $db->prepare('INSERT INTO users (name,email,password,age,gender) VALUES(:name,:email,:password,:age,:gender)');
                                $add->execute(array(':name' => $name, ':email' => $email, ':password' => $pass, ':age' => $age, ':gender' => $gender));
                                header("Location:http://localhost/finalproj/pages/login.php");
                            }else{
                                $err = "error=this a wrong email";
                                header("Location:http://localhost/finalproj/pages/register.php?$err");
                            }
                        }else{
                            $err = "error=this a wrong email";
                            header("Location:http://localhost/finalproj/pages/register.php?$err");
                        }
                    }
                    else{
                        $err = "error=write ur real age";
                        header("Location:http://localhost/finalproj/pages/register.php?$err");
                    }
                }else{
                    $err = "error=age must be a number";
                    header("Location:http://localhost/finalproj/pages/register.php?$err");
                }
            }
            else{
                $err = "error=u should submit all the form to register";
                header("Location:http://localhost/finalproj/pages/register.php?$err");
            }




        }else{
            $err = "error=u should submit all the form to register";
            header("Location:http://localhost/finalproj/pages/register.php?$err");
        }
    }
    else if ($_SERVER['REQUEST_METHOD'] == 'POST'&&isset($_POST['feedbackbtn'])){
        $name = test_in($_POST['fnam']) . " " . test_in($_POST['lnam']);
        $feed=test_in($_POST['fee']);
        $add = $db->prepare('INSERT INTO feedbacks (name,feedback) VALUES (:n,:f)');
        $add->execute(array(":n"=>$name,":f"=>$feed));
        header("Location:http://localhost/finalproj/pages/register.php?suc=we have got ur feedback.. thanks alot..");
    }
}
?>
<!doctybe html>
<html>
<head>
    <title>REGISTER - website.com</title>
    <link href="https://fonts.googleapis.com/css?family=Abel" rel="stylesheet">
    <link href="../CSS/bootstrap.min.css" rel="stylesheet">
    <link href="../CSS/font-awesome.min.css" rel="stylesheet">
    <link href="../CSS/style.css" rel="stylesheet">
    <link href="../CSS/regcss.css" rel="stylesheet">

    <meta name="viewport" content="width=device-width, initial-scale=1.0">




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
                <li><a href="login.php">LOGIN</a></li>
            </ul>


        </div><!-- /.navbar-collapse -->
    </div><!-- /.container-fluid -->
</nav>

<div class="container formdiv">
    <form name="regform" method="post" action="">
        <p id="empty" style="color: red"><?php
            if(isset($_GET['error'])){
                $mess=$_GET['error'];
                echo $mess;
            }
            else if (isset($_GET['error1'])){
                $mess=$_GET['error1'];
                echo $mess;
            }
            ?></p>
        <label>First Name :</label>
        <br>
        <br>
        <input name="fname" type="text" class="resize" placeholder="your first name.." maxlength="20" required>
        <br>
        <br>

        <label>Last Name :</label>
        <br>
        <br>
        <input name="lname" type="text" class="resize" placeholder="your last name.." maxlength="20" required>
        <br>
        <br>

        <label>Email :</label>
        <br>
        <br>
        <input name="em" type="email" class="resize" placeholder="your mail.."  required>
        <br>
        <p id="em"></p>
        <br>

        <label>Password :</label>
        <br>
        <br>
        <input name="pass" type="password" class="resize" placeholder="tybe ur pass .. "  required>
        <br>
        <br>
        <label>Age :</label>
        <br>
        <p id="age"></p>
        <br>
        <input name="age" type="number" class="resize" required>
        <br>
        <br>

        <label>Gender :</label>
        <br>
        <input type="radio" name="gen" value="f" class="radios"><span style="font-size: 18px">Female</span>
        <br><br>
        <input type="radio" name="gen" value="m" class="radios"><span style="font-size: 18px">Male</span>
        <br>
        <br>

        <button type="submit" value="t" name="regbtn" class="subbtn" onclick="return regval();">Sign Up</button>
    </form>

</div>

<?php
include ('temp.php');
?>


<script src="../js/jquery-3.2.1.min.js" ></script>
<script src="../js/bootstrap.min.js"></script>
<script src="../js/regval.js"></script>
<script src="../js/feedbackval.js"></script>
</body>



</html>


