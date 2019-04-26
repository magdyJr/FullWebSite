<?php
include ('sqlconn.php');
session_start();
if($_SERVER['REQUEST_METHOD']=="POST"){
    $name = test_in($_POST['fnam']) . " " . test_in($_POST['lnam']);
    $feed=test_in($_POST['fee']);
    $add = $db->prepare('INSERT INTO feedbacks (name,feedback) VALUES (:n,:f)');
    $add->execute(array(":n"=>$name,":f"=>$feed));
    header("Location:http://localhost/finalproj/pages/about.php?suc=we have got ur feedback.. thanks alot..");

}
?>
<!DOCTYBE html>
<html>
<head>
    <title>ABOUT US - website.com</title>
    <link href="../CSS/bootstrap.min.css" rel="stylesheet">
    <link href="../CSS/font-awesome.min.css" rel="stylesheet">
    <link href="../CSS/style.css" rel="stylesheet">
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
                <a class="navbar-brand" href="../index.php">WEBSITE</a>
            </div>

            <!-- Collect the nav links, forms, and other content for toggling -->
            <div class="collapse navbar-collapse center" id="bs-example-navbar-collapse-1">
                <ul class="nav navbar-nav">

                    <li><a href="../index.php">HOME</a></li>
                    <li><a href="products.php?page=1">PRODUCTS</a></li>
                    <li class="active"><a href="about.php">ABOUT US<span class="sr-only">(current)</span></a></li>
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

                    ?><!-- /.container-fluid -->
    </nav>
</div>
<div style="background-color: #f2f2f2">
    <div class="container" >
        <div style="text-align: center;margin-top: 100px">
            <h1>ABOUT US</h1>
            <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Curabitur finibus turpis vitae lorem elementum placerat.</p>
        </div>
        <h1 style="margin-top: 40px">Cras ac eros vitae quam euismod venenatis</h1>
        <p>Cras ac eros vitae quam euismod venenatis. Morbi vehicula velit vitae tincidunt mattis. Integer luctus imperdiet sapien, vel feugiat ligula vestibulum ac. Quisque nec euismod est, ac placerat mi. Nam pulvinar lacus nec dictum convallis. Vestibulum vel mauris sit amet velit tincidunt bibendum. Donec fringilla libero vitae rhoncus venenatis. Aliquam quam ligula, facilisis eget consequat a, laoreet quis diam. Proin porta sapien venenatis orci ullamcorper, id aliquam mauris finibus. Sed fermentum pretium egestas. Ut vehicula aliquam consequat. Vestibulum tincidunt consectetur elit, id congue velit hendrerit ac. Suspendisse ipsum sem, finibus eleifend sodales quis, vulputate id neque. Duis quis felis ac orci vulputate volutpat ac eu arcu. Morbi fermentum nibh eget leo luctus, non gravida ipsum dictum.</p>
        <hr>

        <h1 style="margin-top: 40px">Lorem ipsum dolor sit amet</h1>
        <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Curabitur finibus turpis vitae lorem elementum placerat. Suspendisse non aliquam tellus, eu bibendum eros. Nulla sed finibus mi, sed egestas dui. Integer et laoreet libero, eu tristique massa. Maecenas et congue lorem, eget blandit nunc. Proin in arcu eget libero pharetra vestibulum lacinia vel nulla. Proin fringilla tincidunt bibendum. Fusce convallis porta feugiat. Quisque venenatis est non blandit viverra. In ullamcorper efficitur risus non tincidunt. Fusce ultrices neque risus, et tincidunt magna iaculis ut.</p>
        <hr>


        <h1 style="margin-top: 40px">Duis vel ex hendrerit</h1>
        <p>Duis vel ex hendrerit, vehicula arcu a, fringilla erat. Proin nec erat id nisl blandit auctor. Nunc rutrum congue nibh vel commodo. Sed feugiat rhoncus diam non consequat. Praesent dapibus commodo sodales. Nunc et posuere massa. Maecenas lobortis pharetra mauris non posuere. Nullam suscipit justo nec sem tincidunt porttitor. Ut dignissim, lorem sed rhoncus mattis, diam orci cursus dui, eu lobortis orci quam non augue.</p>
        <hr>

        <h1 style="margin-top: 40px">Cras vulputate justo in varius semper</h1>
        <p style="margin-bottom: 100px">Cras vulputate justo in varius semper. Cras et laoreet nunc. Quisque quis gravida est, at consequat augue. Donec quis odio vitae turpis placerat euismod. Quisque tristique orci molestie nisl iaculis, sed maximus risus convallis. Praesent eleifend suscipit purus, sed sagittis massa. Quisque et tortor massa. Curabitur interdum turpis nec lorem luctus, sed volutpat ipsum commodo. Praesent facilisis purus in condimentum molestie. Lorem ipsum dolor sit amet, consectetur adipiscing elit. Donec nec tempus libero. Donec ullamcorper, diam a bibendum bibendum, augue justo congue libero, vitae vulputate nisi orci sit amet mi. Quisque quis pretium nisi, pharetra rutrum nulla. Donec vel massa eu libero eleifend finibus.</p>


    </div>
</div>

    <div class="container" >
        <div class="row">
            <div class="features col-md-4">
                <span class="glyphicon glyphicon-briefcase"></span>
                <h4>Best prices</h4>
                <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Non, commodi eligendi suscipit deserunt! Officia reprehenderit possimus, non</p>


            </div>

            <div class="features col-md-4">
                <span class="glyphicon glyphicon-lock"></span>
                <h4>Security</h4>
                <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Non, commodi eligendi suscipit deserunt! Officia reprehenderit possimus, non</p>


            </div>

            <div class="features col-md-4">
                <span class="glyphicon glyphicon-globe"></span>
                <h4>Known from all the world</h4>
                <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Non, commodi eligendi suscipit deserunt! Officia reprehenderit possimus, non</p>


            </div>
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

