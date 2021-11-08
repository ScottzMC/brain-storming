<!DOCTYPE html>
<html lang="zxx">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="">
    <link rel="icon" href="<?php echo base_url('assets/img/basic/favicon.ico'); ?>" type="image/x-icon">
    <title>BrainStorming || Register an Account</title>
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
                        <h1>Welcome</h1>
                        <p class="s-18 p-t-b-20 font-weight-lighter">Hey Detective signup now there is lot of
                            new stuff waiting
                            for you</p>
                    </div>
                    <form action="<?php echo base_url('dashboard/register'); ?>" method="post">
                        <div class="row">
                          <div class="col-lg-6">
                              <div class="form-group has-icon"><i class="icon-envelope-o"></i>
                                  <input type="text" class="form-control form-control-lg no-b" name="detective_name" placeholder="Detective Name">
                                  <span class="text-danger" style="color: red;"><?php echo form_error('detective_name'); ?></span>
                              </div>
                          </div>
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
                            <div class="col-lg-6">
                                <div class="form-group has-icon"><i class="icon-user-secret"></i>
                                    <input type="password" class="form-control form-control-lg no-b" name="cpassword" placeholder="Confirm Password">
                                    <span class="text-danger" style="color: red;"><?php echo form_error('cpassword'); ?></span>
                                </div>
                            </div>
                            <div class="col-lg-12">
                                <input type="submit" name="registerBtn" class="btn btn-success btn-lg btn-block" value="Create Account">
                            </div>
                        </div>
                    </form>
                    <?php
                      if($this->form_validation->run() == TRUE){
                        echo $this->session->flashdata('msgError');
                      }
                    ?>
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
