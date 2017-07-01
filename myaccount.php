<?php $title = "myaccount"; ?>
<?php require_once('head.php'); ?>
<body>
<?php require_once('navigation.php'); ?>
<?php
try {
    /*connect to database*/
    $cnx = new PDO("mysql:host=localhost;charset=utf8;dbname=bikeshop", "root", "");
    $interogation = $cnx->prepare("SELECT * from user");
    $interogation->execute();
    /*iteration between all users and select the user that has id equal to session id*/
    foreach ($interogation->fetchAll() as $user) {
        if ($user['id_user'] == $_SESSION['userid']) :
            $userDetails = $user;
            break;
        endif;
    }
    $cnx = null;
} catch (PDOException $e) {
    die("Connection error: " . $e->getMessage());
}
?>
<div class="container">
    <h1 class="well">My account</h1>
    <div class="col-lg-12 well">
        <div class="row">
            <form action="userupdate.php" method="post">
                <div class="col-sm-12">
                    <div class="row">
                        <div class="col-sm-6 form-group">
                            <label>First Name</label>
                            <input type="text" class="form-control" required
                                   name="firstname" placeholder="Enter First Name Here.."
                                   value="<?php echo $userDetails['firstname'] ?>">
                        </div>
                        <div class="col-sm-6 form-group">
                            <label>Last Name</label>
                            <input type="text" class="form-control" required
                                   name="lastname" placeholder="Enter Last Name Here.."
                                   value="<?php echo $userDetails['lastname'] ?>">
                        </div>
                    </div>
                    <div class="form-group">
                        <label>Address</label>
                        <textarea rows="3" class="form-control" required
                                  name="address" placeholder="Enter Address Here.."
                        ><?php echo $userDetails['address'] ?></textarea>
                    </div>
                    <div class="row">
                        <div class="col-sm-4 form-group">
                            <label>City</label>
                            <input type="text" placeholder="Enter City Name Here.." class="form-control" required
                                   name="city" value="<?php echo $userDetails['city'] ?>">
                        </div>
                        <div class="col-sm-4 form-group">
                            <label>State</label>
                            <input type="text" placeholder="Enter State Name Here.." class="form-control" required
                                   name="state" value="<?php echo $userDetails['state'] ?>">
                        </div>
                    </div>
                    <div class="form-group">
                        <label>Phone Number</label>
                        <input type="text" placeholder="Enter Phone Number Here.." class="form-control" required
                               name="phone" value="<?php echo $userDetails['phone'] ?>">
                    </div>
                    <div class="form-group">
                        <label>Email Address</label>
                        <input type="email" placeholder="Enter Email Address Here.." class="form-control" required
                               name="useremail" value="<?php echo $userDetails['email'] ?>">
                    </div>
                    <div class="form-group">
                        <label>Pssword</label>
                        <input type="password" placeholder="Enter Password Here.." class="form-control" required
                               name="userpassword" value="<?php echo $userDetails['password'] ?>">
                    </div>
                    <button type="submit" class="btn btn-lg btn-info">Save</button>

                </div>
            </form>
        </div>
    </div>
</div>
<?php require_once('footer.php'); ?>
</body>
</html>

