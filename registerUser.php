<?php $title = "Register"; ?>
<?php require_once('head.php'); ?>
<body>
<?php require_once('navigation.php'); ?>
<div class="container">
    <h1 class="well">
        <?php
        /*check if the firstname value exists*/
        if (isset($_REQUEST["firstname"])):
            /*grab and set the values from the form*/
            /*value from the form input is cleaned up before set*/
            $firstname = cleanup($_REQUEST["firstname"]);
            $lastname = cleanup($_REQUEST["lastname"]);
            $address = cleanup($_REQUEST["address"]);
            $city = cleanup($_REQUEST["city"]);
            $state = cleanup($_REQUEST["state"]);
            $phone = cleanup($_REQUEST["phone"]);
            $email = cleanup($_REQUEST["useremail"]);
            $password = cleanup($_REQUEST["userpassword"]);
            try {
                /*connect to the database*/
                $conn = new PDO("mysql:host=localhost;charset=utf8;dbname=bikeshop", "root", "");
                /*add new user to the table user from database*/
                $statement = $conn->prepare("INSERT INTO user (`firstname`, `lastname`, `address`, `city`, `state`, `phone`, `email`, `password`) VALUES(?, ?, ?, ?, ?, ?, ?,?)");
                $statement->execute(array($firstname, $lastname, $address, $city, $state, $phone, $email, $password));
                /*display success message*/
                echo 'User ' . $firstname . ' ' . $lastname . " created successfully";
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