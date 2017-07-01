<?php $title = "Admin Panel"; ?>
<?php require_once('head.php'); ?>
<body>
<?php require_once('navigation.php'); ?>
<div class="container">
    <h1>List of all users</h1>
    <?php
    try {
        /*connect to database*/
        $cnx = new PDO("mysql:host=localhost;charset=utf8;dbname=bikeshop", "root", "");
        $userInterrogation = $cnx->prepare("SELECT * from user ");
        $userInterrogation->execute();
        /*iteration between all users*/
        foreach ($userInterrogation->fetchAll() as $user) {
            /*show user that is not admin*/
            if ($user['admin'] != 1):
                ?>
                <div class="panel">
                    <div class="panel-heading bg-primary"></div>
                    <div class="panel-body bg-info">
                        <div class="row mb-20">
                            <div class="col-lg-8">
                                <div class="row">
                                    <div class="col-sm-4">
                                        <label>First Name: </label>
                                        <?php echo $user['firstname'] ?>
                                    </div>
                                    <div class="col-sm-4">
                                        <label>Last Name: </label>
                                        <?php echo $user['lastname'] ?>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-sm-4">
                                        <label>Street: </label>
                                        <?php echo $user['address'] ?>
                                    </div>
                                    <div class="col-sm-4">
                                        <label>City: </label>
                                        <?php echo $user['city'] ?>
                                    </div>
                                    <div class="col-sm-4">
                                        <label>State: </label>
                                        <?php echo $user['state'] ?>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-sm-4">
                                        <label>Phone: </label>
                                        <?php echo $user['phone'] ?>
                                    </div>
                                    <div class="col-sm-4">
                                        <label>Email: </label>
                                        <?php echo $user['email'] ?>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <a class="pull-right"
                        <!--redirect to deleteuser page by username-->
                        <a href="deleteUser.php?username=<?php echo $user['firstname'] ?>&userId=<?php echo $user['id_user'] ?>">
                            <button type="button" class="btn btn-danger pull-right"><i class="glyphicon glyphicon-trash"></i>
                                Delete user
                            </button>
                        </a>
                    </div>
                </div>
                <?php
            endif;
        }
        $cnx = null;
    } catch (PDOException $e) {
        die("Error connection: " . $e->getMessage());
    }
    ?>
</div>
<?php require_once('footer.php'); ?>
</body>
</html>

