<?php $title = "deleteUser"; ?>
<?php require_once('head.php'); ?>
<body>
<?php require_once('navigation.php'); ?>
<div class="container">
    <?php
    try {
        /*connect to database*/
        $conn = new PDO("mysql:host=localhost;charset=utf8;dbname=bikeshop", "root", "");
        /*delete from table user the user where id_user equals to parameter send by GET method*/
        $sql = "DELETE FROM user WHERE id_user =  :userID";
        $stmt = $conn->prepare($sql);
        $stmt->bindParam(':userID', $_GET['userId'], PDO::PARAM_INT);
        $stmt->execute();
        ?>
        <h1 class="well">
            <!--display success message-->
            <?php echo 'User ' . $_GET['username'] . " deleted successfully"; ?>
        </h1>
        <a href="<?php home_url(); ?>adminpanel.php">Go back to admin panel</a>
        <?php
    } catch (PDOException $e) {
        echo $sql . "<br>" . $e->getMessage();
    }
    $conn = null;
    ?>
</div>
<?php require_once('footer.php'); ?>
</body>
</html>

