<?php $title = "Register"; ?>
<?php require_once('head.php'); ?>
<body>
<?php require_once('navigation.php'); ?>
<div class="container mt-20">
    <div class="col-lg-offset-4 col-lg-4">
        <form class="form" role="form" method="post" action="user.php" accept-charset="UTF-8"
              id="login-nav">
            <div class="form-group">
                <p>You are not logged in</p>
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
                <div class="bottom text-center mt-20">
                    New here?
                    <a href="<?php home_url(); ?>register.php">
                        <b>Sign in</b>
                    </a>
                </div>
            </div>
        </form>
    </div>
</div>
<?php require_once('footer.php'); ?>
</body>
</html>

