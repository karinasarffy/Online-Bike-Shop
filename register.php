<?php $title = "Register"; ?>
<?php require_once('head.php'); ?>
<body>
<?php require_once('navigation.php'); ?>
<div class="container">
    <h1 class="well">Registration Form</h1>
    <div class="col-lg-12 well">
        <div class="row">
            <!--redirect to the page registerUser.php for adding the below informations to the database-->
            <form action="registerUser.php">
                <div class="col-sm-12">
                    <div class="row">
                        <div class="col-sm-6 form-group">
                            <label>First Name</label>
                            <input type="text" placeholder="Enter First Name Here.." class="form-control" required
                                   name="firstname">
                        </div>
                        <div class="col-sm-6 form-group">
                            <label>Last Name</label>
                            <input type="text" placeholder="Enter Last Name Here.." class="form-control" required
                                   name="lastname">
                        </div>
                    </div>
                    <div class="form-group">
                        <label>Address</label>
                        <textarea placeholder="Enter Address Here.." rows="3" class="form-control" required
                                  name="address"></textarea>
                    </div>
                    <div class="row">
                        <div class="col-sm-4 form-group">
                            <label>City</label>
                            <input type="text" placeholder="Enter City Name Here.." class="form-control" required
                                   name="city">
                        </div>
                        <div class="col-sm-4 form-group">
                            <label>State</label>
                            <input type="text" placeholder="Enter State Name Here.." class="form-control" required
                                   name="state">
                        </div>
                    </div>
                    <div class="form-group">
                        <label>Phone Number</label>
                        <input type="text" placeholder="Enter Phone Number Here.." class="form-control" required
                               name="phone">
                    </div>
                    <div class="form-group">
                        <label>Email Address</label>
                        <input type="text" placeholder="Enter Email Address Here.." class="form-control" required
                               name="useremail">
                    </div>
                    <div class="form-group">
                        <label>Pssword</label>
                        <input type="password" placeholder="Enter Password Here.." class="form-control" required
                               name="userpassword">
                    </div>
                    <button type="submit" class="btn btn-lg btn-info">Submit</button>
                </div>
            </form>
        </div>
    </div>
</div>
<?php require_once('footer.php'); ?>
</body>
</html>

