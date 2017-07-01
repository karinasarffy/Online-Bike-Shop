<?php $title = "cart"; ?>
<?php require_once('head.php'); ?>
<body>
<?php require_once('navigation.php'); ?>
<div class="container mt-20">
    <?php
    try {
    /*connect to database*/
    $cnx = new PDO("mysql:host=localhost;charset=utf8;dbname=bikeshop", "root", "");
    /*getting values sended by the POST method*/
    $cartProductTitle = $_POST['title'];
    $cartProductDescription = $_POST['description'];
    $cartProductPrice = $_POST['price'];
    $cartProductID = $_POST['id'];
    ?>
    <!--redirect to checkout page for adding informations to database-->
    <form action="checkout.php" method="post">
        <table id="cart" class="table table-hover table-condensed">
            <thead>
            <tr>
                <th style="width:50%">Product</th>
                <th style="width:10%">Price</th>
                <th style="width:8%">Quantity</th>
                <th style="width:22%" class="text-center">Subtotal</th>
                <th style="width:10%"></th>
            </tr>
            </thead>
            <tbody>
            <tr bgcolor="#f1f1f1">
                <td data-th="Product">
                    <div class="row">
                        <div class="col-sm-2 hidden-xs"><img
                                    src="<?php home_url() ?>images/bike-<?php echo $cartProductID ?>.jpg"
                                    class="img-responsive"/>
                        </div>
                        <div class="col-sm-10">
                            <h4 class="title"><?php echo $cartProductTitle ?> </h4>
                            <p><?php echo $cartProductDescription ?></p>
                        </div>
                    </div>
                </td>
                <td id="prodPrice" data-th="Price" price="<?php echo $cartProductPrice ?>">
                    $ <?php echo $cartProductPrice ?></td>
                <td data-th="Quantity">
                    <input id="cartProdQ" type="number" min="1" class="form-control text-center" value="1"
                           name="quantity">
                </td>
                <td data-th="Subtotal" class="text-center cartQTotal"><?php echo $cartProductPrice ?></td>
                <td class="actions" data-th="">

                </td>
            </tr>
            </tbody>
            <tfoot>
            <tr>
                <td><a href="products.php" class="btn btn-warning"><i class="fa fa-angle-left"></i> Continue
                        Shopping</a></td>
                <td colspan="2" class="hidden-xs"></td>
                <td class="hidden-xs text-center"><strong>Total $ <span
                                class="cartQTotal"><?php echo $cartProductPrice ?></span></strong></td>
                <td>
                    <?php if ($_SESSION['loggedIn']): ?>

                        <fieldset>
                            <input type="hidden" name="id_product" value="<?php echo $cartProductID ?>">
                            <input type="hidden" name="id_user" value="<?php echo $_SESSION['userid'] ?>">
                            <input type="submit" value=" Checkout" class="button">
                        </fieldset>
                    <?php endif; ?>
                </td>
            </tr>
            </tfoot>
        </table>
    </form>
</div>
<?php
$cnx = null;
} catch (PDOException $e) {
    die("Error connection: " . $e->getMessage());
} ?>
</body>
</html>