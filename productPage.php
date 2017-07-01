<?php $title = "Product Page"; ?>
<?php require_once('head.php'); ?>
<body>
<?php require_once('navigation.php'); ?>
<?php
try {
    /*connect to database*/
    $cnx = new PDO("mysql:host=localhost;charset=utf8;dbname=bikeshop", "root", "");
    /*testing if URL has productID as parameter*/
    if (isset($_GET['productID'])) {
        $productID = $_GET['productID'];
        /*select from database products with id_product equal to productID from the URL*/
        $interogare = $cnx->prepare("SELECT * from product where id_product =" . $productID);
        $interogare->execute();
        /*define product variable with all the details*/
        $product = $interogare->fetch(PDO::FETCH_ASSOC);
        ?>
        <!--show the product based on the product variable-->
        <div class="container mt-20">
            <div class="content-wrapper">
                <div class="item-container">
                    <div class="container">
                        <div class="col-md-12">
                            <div class="product col-md-3 service-image-left">
                                <img id="item-display"
                                     src="<?php home_url() ?>images/bike-<?php echo $productID ?>.jpg"></img>
                            </div>
                            <div class="col-md-7">
                                <div class="product-title"> <?php echo $product['title']; ?></div>
                                <div class="product-desc">
                                    <?php echo $product['description']; ?>
                                </div>
                                <hr>
                                <div class="product-price">
                                    $ <?php echo $product['price']; ?>
                                </div>
                                <hr>
                                <div class="btn-group cart">

                                    <form action="cart.php" method="post">
                                        <fieldset>
                                            <input type="hidden" name="title"
                                                   value="<?php echo $product['title'] ?>">
                                            <input type="hidden" name="price"
                                                   value="<?php echo $product['price'] ?>">
                                            <input type="hidden" name="description"
                                                   value="<?php echo $product['description'] ?>">
                                            <input type="hidden" name="id"
                                                   value="<?php echo $product['id_product'] ?>">

                                            <button type="submit" class="btn btn-success">
                                                Add to cart
                                            </button>
                                        </fieldset>
                                    </form>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="container-fluid">
                    <div class="col-md-12 product-info">
                        <ul id="myTab" class="nav nav-tabs nav_tabs">
                            <li><a href="#service-two" data-toggle="tab">PRODUCT INFO</a></li>
                        </ul>
                        <div id="myTabContent" class="tab-content">
                            <div class="tab-pane fade in active" id="service-one">
                                <section class="container product-info">
                                    <?php echo $product['long_description'] ?>
                                </section>
                            </div>
                            <div class="tab-pane fade" id="service-two">
                                <section class="container">
                                </section>
                            </div>
                            <div class="tab-pane fade" id="service-three">
                            </div>
                        </div>
                        <hr>
                    </div>
                </div>
            </div>
        </div>
    <?php }
    $cnx = null;
    /*catch exception and display the error*/
} catch (PDOException $e) {
    die("Error connection: " . $e->getMessage());
}
?>
<?php require_once('footer.php'); ?>
</body>
</html>