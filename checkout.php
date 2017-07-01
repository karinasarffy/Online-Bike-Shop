<?php $title = "cart"; ?>
<?php require_once('head.php'); ?>
<body>
<?php require_once('navigation.php'); ?>
<div class="container mt-20">
    <?php
    try {
        /*connect to database*/
        $cnx = new PDO("mysql:host=localhost;charset=utf8;dbname=bikeshop", "root", "");
        /*get the informations sent by the method POST*/
        $checkOutIDProduct = $_POST['id_product'];
        $checkOutIDUser = $_POST['id_user'];
        $checkOutQuantity = $_POST['quantity'];
        /*insert into table cart*/
        $statement = $cnx->prepare("INSERT INTO cart (`id_product`, `id_user`, `quantity`) VALUES(?, ?, ?)");
        $statement->execute(array($checkOutIDProduct, $checkOutIDUser, $checkOutQuantity));
        //        $_SESSION['userid'] = $user['id_user'];
        $interogationProduct = $cnx->prepare("SELECT * from product");
        $interogationProduct->execute();
        /*iterate between products and show the product that has id equal with the one sent by the POST method*/
        foreach ($interogationProduct->fetchAll() as $product) {
            if (($checkOutIDProduct == $product['id_product'])) {
            }  ?>
            <div class="mt-20 col-lg-6" >
                <strong><h2>Your order has been received.</h2></strong>
                <h3>Order contains:</h3>
                <div class="panel panel-info">
                    <div class="panel-heading "><h3 class="panel-title">Product:</h3></div>
                    <div class="panel-body"><?php echo $product['title'] ?></div>
                </div>
                    <div class="panel panel-info">
                    <div class="panel-heading"><h3 class="panel-title">Description:</h3></div>
                    <div class="panel-body"> <?php echo $product['description'] ?></div>
                            </div>
                <div class="panel panel-info">
                    <div class="panel-heading" ><h3 class="panel-title">Total amount:</h3></div>
                    <div class="panel-body"> $ <?php echo $product['price'] * $checkOutQuantity?></div>
                </div>
                <h3>Thank you, <span class="text-blue"><?php echo $_SESSION['username'] ?></span>, for your purchase.</h3>
            </div>
        <?php break;   }$cnx = null;
    }
        catch (PDOException $e) {
        die("Connection error: " . $e->getMessage());
    }?>
</div>
<?php require_once('footer.php'); ?>
</body>
</html>


