<?php
$title = "Welcome"
?>
<?php require_once('head.php'); ?>
<body>
<?php
/*initialize email and password from method POST*/
$useremail = cleanup($_POST["email"]);
$userpassword = cleanup($_POST["password"]);
try {
    /*connect to database*/
    $cnx = new PDO("mysql:host=localhost;charset=utf8;dbname=bikeshop", "root", "");
    $interogare = $cnx->prepare("SELECT * from user");
    $interogare->execute();
    $gasit = false;
    /*iteration between all users*/
    foreach ($interogare->fetchAll() as $user) {
        /*if email and password are equal to the variabels from method POST*/
        if (($useremail == $user['email']) && ($userpassword == $user['password'])) {
            $gasit = true;
            /*store in session username, userid and if the user is admin*/
            $_SESSION['username'] = $user['firstname'];
            $_SESSION['userid'] = $user['id_user'];
            if ($user['admin'] == 1)
                $_SESSION['isAdmin'] = true;
            $_SESSION['loggedIn'] = true;
            break;
        }
    }
    if (!$gasit) {
        echo "<h1><span >You</span> are not authorised</h1><br/>";
        echo "<form class=\"centrat\"><input type=button value=\"Try again\"onClick=\"location.href='navigation.php'\"></form></center>";
    }
    $cnx = null;
} catch (PDOException $e) {
    die("Connection error: " . $e->getMessage());
}
?>
<?php require_once('navigation.php'); ?>
<div class="container contact-container">
    <div class="row">
        <div class="col-md-8 col-sm-6 col-xs-12">
            <div>
                <!--if the log in is made successfully  the a message is displayed-->
                <?php if ($_SESSION['loggedIn']) ?>
                <h2>Welcome <strong><?php echo $_SESSION['username']; ?></strong> to your account! </h2>
                <p>Discover and enjoy <strong> Bike Shop </strong>. Life is so much better with a bicycle! </p>
            </div>
            <div class="mt-20">
                <img src="<?php home_url() ?>images/user1.jpg" alt="" style="width: 100%">
            </div>
        </div>
        <div class="col-md-4 col-sm-6 col-xs-12">
            <h2> Contact us </h2>
            <div class="mb-20">
                <div class="contact-label"> EMAIL</div>
                <a href="info@smilebike.com">info@smilebike.com</a>
            </div>
            <div class="mb-20">
                <div class="contact-label"> TELEPHONE</div>
                <a href="tel:+442071933316" title="Call us">+44 20 7193 3316</a>
            </div>
            <div class="mb-20">
                <div class="contact-label"> SKYPE</div>
                <a href="skype:smilebike">smilebike</a>
            </div>
            <div class="contact-address">
                <div class="contact-label"> ADDRESS</div>
                <p>Smile Bike Shop</p>
                <p>Emil Isac, 4</p>
                <p>Cluj-Napoca</p>
                <p>400012</p>
                <p>Romania </p>
            </div>
        </div>
    </div>
</div>
<?php require_once('footer.php'); ?>
</body>
</html>

