<?php $title = "products"; ?>
<?php require_once('head.php'); ?>
<body>
<?php require_once('navigation.php'); ?>
<div class="container mt-20">
    <div class="products-container-title">
        Our products
    </div>
    <?php try {
        /*connect to the database*/
        $cnx = new PDO("mysql:host=localhost;charset=utf8;dbname=bikeshop", "root", "");
        $categoryInterrogation = $cnx->prepare("SELECT * from category ");
        $categoryInterrogation->execute();
        foreach ($categoryInterrogation->fetchAll() as $bikecategory) {
            ?>
            <div class="row">
                <div class="col-lg-12">
                    <div class="product-title"><?php echo $bikecategory['type'] ?></div>
                    <div class="row">
                        <?php
                        try {
                            $cnx = new PDO("mysql:host=localhost;charset=utf8;dbname=bikeshop", "root", "");
                            $interrogation = $cnx->prepare("SELECT * from product WHERE id_category=" . $bikecategory['id_category']);
                            $interrogation->execute();
                            /*iterate between results*/
                            foreach ($interrogation->fetchAll() as $product) {
                                ?>
                                <div class="col-sm-4 top_brand_left mb-20">
                                    <div class="hover14 column">
                                        <div class="agile_top_brand_left_grid">
                                            <div class="agile_top_brand_left_grid1">
                                                <figure>
                                                    <div class="snipcart-item block">
                                                        <div class="snipcart-thumb">
                                                            <!--productID is added to the URL so that the user is redirected to produtPage.php with the selected ID-->
                                                            <a href="<?php home_url(); ?>productPage.php?productID=<?php echo $product['id_product'] ?>">
                                                                <img src="<?php home_url() ?>images/bike-<?php echo $product['id_product'] ?>.jpg">
                                                            </a>
                                                            <!--display the product title-->
                                                            <p><?php echo $product['title'] ?></p>
                                                            <!--display product category based on product categoryID-->
                                                            <h4><?php $categoryInt = $cnx->prepare("SELECT type from category WHERE id_category=" . $product['id_category']);
                                                                $categoryInt->execute();
                                                                echo $categoryInt->fetch(PDO::FETCH_ASSOC)['type'];
                                                                ?></h4>
                                                            <h4>$<?php echo $product['price'] ?> </h4>
                                                        </div>
                                                        <div class="snipcart-details top_brand_home_details">
                                                            <!--is user is logged in show Add to cart button with the proprieties -->
                                                            <?php if ($_SESSION['loggedIn']): ?>
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

                                                                        <input type="submit"
                                                                               value="Add to cart"
                                                                               class="button">
                                                                    </fieldset>
                                                                </form>
                                                            <?php else: ?>
                                                                <form action="login.php" method="post">
                                                                    <fieldset>
                                                                        <input type="submit" name="submit"
                                                                               value="Add to cart"
                                                                               class="button">
                                                                    </fieldset>
                                                                </form>
                                                            <?php endif; ?>
                                                        </div>
                                                    </div>
                                                </figure>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <?php
                            }

                            $cnx = null;
                            /*catch exception and display the error*/
                        } catch (PDOException $e) {
                            die("Error connection: " . $e->getMessage());
                        }
                        ?>


                    </div>
                </div>
            </div>
        <?php }
        $cnx = null;
        /*catch exception and display the error*/
    } catch (PDOException $e) {
        die("Error connection: " . $e->getMessage());
    } ?>
</div>

<?php require_once('footer.php'); ?>
</body>
</html>




