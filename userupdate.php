<?php $title = "UserUpdate"; ?>
<?php require_once('head.php'); ?>
<body>
<?php require_once('navigation.php'); ?>
<div class="container">
    <h1 class="well">
        <?php
        /*if parameter first name is set in the POST params then store all the values*/
        if (isset($_POST["firstname"])):
            $firstname = cleanup($_POST["firstname"]);
            $lastname = cleanup($_POST["lastname"]);
            $address = cleanup($_POST["address"]);
            $city = cleanup($_POST["city"]);
            $state = cleanup($_POST["state"]);
            $phone = cleanup($_POST["phone"]);
            $email = cleanup($_POST["useremail"]);
            $password = cleanup($_POST["userpassword"]);
            try {
                /*connect to the database*/
                $conn = new PDO("mysql:host=localhost;charset=utf8;dbname=bikeshop", "root", "");
                /*update user with new values*/
                $sql = "UPDATE user SET firstname = :firstname, lastname = :lastname, address = :address, city = :city, state = :state, phone = :phone, email = :email, password = :password WHERE id_user = :userID";
                $stmt = $conn->prepare($sql);
                $stmt->bindParam(':firstname', $firstname, PDO::PARAM_STR);
                $stmt->bindParam(':lastname', $lastname, PDO::PARAM_STR);
                $stmt->bindParam(':address', $address, PDO::PARAM_STR);
                $stmt->bindParam(':city', $city, PDO::PARAM_STR);
                $stmt->bindParam(':state', $state, PDO::PARAM_STR);
                $stmt->bindParam(':phone', $phone, PDO::PARAM_INT);
                $stmt->bindParam(':email', $email, PDO::PARAM_STR);
                $stmt->bindParam(':password', $password, PDO::PARAM_STR);
                $stmt->bindParam(':userID', $_SESSION['userid'], PDO::PARAM_STR);
                $stmt->execute();
                if ($firstname != $_SESSION['username']):
                    $_SESSION['username'] = $firstname;
                endif;
                echo 'User ' . $firstname . ' ' . $lastname . " updated successfully";
            } catch (PDOException $e) {
                echo $sql . "<br>" . $e->getMessage();
            }
            $conn = null;
        endif;
        ?>
    </h1>
</div>
<?php require_once('footer.php'); ?>
</body>
</html>

