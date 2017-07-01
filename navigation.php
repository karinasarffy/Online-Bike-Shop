<nav class="navbar navbar-default navbar-inverse" role="navigation">
    <div class="container-fluid">
        <!-- Brand and toggle get grouped for better mobile display -->
        <div class="navbar-header">
            <button type="button" class="navbar-toggle collapsed" data-toggle="collapse"
                    data-target="#bs-example-navbar-collapse-1">
                <span class="sr-only">Toggle navigation</span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
            </button>

        </div>

        <!-- Collect the nav links, forms, and other content for toggling -->
        <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
            <ul class="nav navbar-nav">
                <li <?php
                if (basename($_SERVER['PHP_SELF']) == "index.php") {
                    echo " class=\"active\"";
                }
                ?>><a href="<?php home_url(); ?>index.php">HOME</a></li>
                <li <?php
                if (basename($_SERVER['PHP_SELF']) == "about.php") {
                    echo " class=\"active\"";
                }
                ?>><a href="<?php home_url(); ?>about.php">About</a></li>
                <li <?php
                if (basename($_SERVER['PHP_SELF']) == "products.php") {
                    echo " class=\"active\"";
                }
                ?>><a href="<?php home_url(); ?>products.php">Our Products</a></li>
                <li <?php
                if (basename($_SERVER['PHP_SELF']) == "contact.php") {
                    echo " class=\"active\"";
                }
                ?>><a href="<?php home_url(); ?>contact.php">Contact</a></li>
                <li <?php
                if (basename($_SERVER['PHP_SELF']) == "register.php") {
                    echo " class=\"active\"";
                }
                ?>><a href="<?php home_url(); ?>register.php">Register</a></li>
                <?php if ($_SESSION['isAdmin']): ?>
                    <li <?php
                    if (basename($_SERVER['PHP_SELF']) == "adminpanel.php") {
                        echo " class=\"active\"";
                    }
                    ?>><a href="<?php home_url(); ?>adminpanel.php">Admin Panel</a></li>
                <?php endif; ?>
            </ul>
            <ul class="nav navbar-nav navbar-right">
                <?php if ($_SESSION['loggedIn']): ?>
                    <li><p class="navbar-text">Welcome, <?php echo $_SESSION['username']; ?> </p></li>

                <?php else: ?>
                    <li><p class="navbar-text">You are not logged in </p></li>
                <?php endif; ?>
                <li class="dropdown">
                    <a href="#" class="dropdown-toggle" data-toggle="dropdown">
                        <?php if (!$_SESSION['loggedIn']): ?>
                            <b>Login</b>
                        <?php else: ?>
                            <b>Account</b>

                        <?php endif; ?>
                        <span class="caret"></span></a>
                    <ul id="login-dp" class="dropdown-menu">
                        <li>
                            <div class="row">
                                <div class="col-md-12">
                                    <?php if ($_SESSION['loggedIn']): ?>
                                        <div class="form-group">
                                            <a href="logout.php">
                                                <button type="button" class="btn btn-primary btn-block">
                                                    <span style="color: #FFFFFF">Log out</span>
                                                </button>
                                            </a>
                                        </div>
                                    <?php else: ?>
                                        <form class="form" role="form" method="post" action="user.php"
                                              accept-charset="UTF-8"
                                              id="login-nav">
                                            <div class="form-group">
                                                <label class="sr-only" for="exampleInputEmail2">Email address</label>
                                                <input type="email" class="form-control" id="exampleInputEmail2"
                                                       placeholder="Email address" required name="email">
                                            </div>
                                            <div class="form-group">
                                                <label class="sr-only" for="exampleInputPassword2">Password</label>
                                                <input type="password" class="form-control" id="exampleInputPassword2"
                                                       placeholder="Password" required name="password">
                                            </div>
                                            <div class="form-group">
                                                <button type="submit" class="btn btn-primary btn-block">Sign in</button>
                                            </div>
                                        </form>
                                    <?php endif; ?>
                                </div>
                                <?php if ($_SESSION['loggedIn']): ?>
                                    <div class="bottom text-center">
                                        <a href="<?php home_url(); ?>myaccount.php">
                                            <b>My Account</b>
                                        </a>
                                    </div>
                                <?php else: ?>
                                    <div class="bottom text-center">
                                        New here?
                                        <a href="<?php home_url(); ?>register.php">
                                            <b>Sign in</b>
                                        </a>
                                    </div>
                                <?php endif; ?>
                            </div>
                        </li>
                    </ul>
                </li>
            </ul>
        </div><!-- /.navbar-collapse -->
    </div><!-- /.container-fluid -->
</nav>



