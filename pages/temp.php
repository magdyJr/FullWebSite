<div class="end">
    <h1>CONTACT US</h1>
    <p>info@website.com</p>
    <h1>FOLLOW US</h1>
    <a href="http://twitter.com"><i class="fa fa-twitter" aria-hidden="true"></i></a>
    <a href="http://facebook.com"><i class="fa fa-facebook" aria-hidden="true"></i></a>
    <a href="http://dribbble.com"><i class="fa fa-dribbble" aria-hidden="true"></i></a>
    <a href="http://tumblr.com"><i class="fa fa-tumblr" aria-hidden="true"></i></a>
    <br>
    <p>if u want to write us a <span style="cursor: pointer"><a style="font-size: 25px;font-weight: bold" onclick="document.getElementById('hide').style.display='block';window.scrollTo(0,document.body.scrollHeight);">feedback</a></span> .</p>
    <p id="wronggraph"></p>
    <div id="hide" style="display: none">
        <form name="feedbackform" method="post" action="">
            <input name="fnam" type="text" class="resize" placeholder="your first name.." maxlength="20">
            <br><br><br>
            <input name="lnam" type="text" class="resize" placeholder="your last name.." maxlength="20">
            <br><br><br>
            <textarea placeholder="tybe ur feedback .." class="resize" name="fee" style="max-height: 36px;max-width: 225px;min-height: 36px;min-width: 225px;"></textarea>
            <br><br><br>
            <input name="feedbackbtn" type="submit" class="subbtn" onclick="return feeval();">
        </form>
    </div>
    <p id="feedbackgraph" style="color: green"><?php
        if(isset($_GET['suc']))
        {
            $mess=$_GET['suc'];
            echo $mess;
        }
        ?></p>

</div>