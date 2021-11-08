<!DOCTYPE html>
<html lang="zxx">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="">
    <link rel="icon" href="<?php echo base_url('assets/img/basic/favicon.ico'); ?>" type="image/x-icon">
    <title>BrainStorming || Login to Account</title>
    <!-- CSS -->

</head>
<body class="light sidebar-mini sidebar-collapse">

<div id="app">
<main>
    <div id="primary" class="blue4 p-t-b-100 height-full responsive-phone">
        <div class="container">
            <div class="row">
                <div class="col-lg-6">
                    <img src="<?php echo base_url('assets/img/icon/icon-plane.png'); ?>" alt="Icon">
                </div>
                <div class="col-lg-6 p-t-100">
                    <div class="text-white">
                        <h1>Welcome Back</h1>
                        <p class="s-18 p-t-b-20 font-weight-lighter">Hey Detective welcome back signin now there is lot of
                            new stuff waiting
                            for you</p>
                    </div>
                    <form action="<?php echo base_url('dashboard/login'); ?>" method="post">
                        <div class="row">
                            <div class="col-lg-6">
                                <div class="form-group has-icon"><i class="icon-envelope-o"></i>
                                    <input type="email" class="form-control form-control-lg no-b" name="email" placeholder="Email Address">
                                    <span class="text-danger" style="color: red;"><?php echo form_error('email'); ?></span>
                                </div>
                            </div>
                            <div class="col-lg-6">
                                <div class="form-group has-icon"><i class="icon-user-secret"></i>
                                    <input type="password" class="form-control form-control-lg no-b" name="password" placeholder="Password">
                                    <span class="text-danger" style="color: red;"><?php echo form_error('password'); ?></span>
                                </div>
                            </div>

                            <div class="col-lg-12">
                                <input type="submit" name="loginBtn" class="btn btn-success btn-lg btn-block" value="Let me enter">
                                <p class="forget-pass text-white">Have you forgot your username or password ?</p>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
    <!-- #primary -->
</main>

<!-- Add the sidebar's background. This div must be placed
         immediately after the control sidebar -->
<div class="control-sidebar-bg shadow white fixed"></div>
</div>

</body>
</html>
