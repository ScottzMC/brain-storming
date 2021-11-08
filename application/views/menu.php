<link rel="stylesheet" href="<?php echo base_url('assets/css/app.css'); ?>">

<!-- Pre loader -->
<div id="loader" class="loader">
    <div class="plane-container">
        <div class="preloader-wrapper small active">
            <div class="spinner-layer spinner-blue">
                <div class="circle-clipper left">
                    <div class="circle"></div>
                </div><div class="gap-patch">
                <div class="circle"></div>
            </div><div class="circle-clipper right">
                <div class="circle"></div>
            </div>
            </div>

            <div class="spinner-layer spinner-red">
                <div class="circle-clipper left">
                    <div class="circle"></div>
                </div><div class="gap-patch">
                <div class="circle"></div>
            </div><div class="circle-clipper right">
                <div class="circle"></div>
            </div>
            </div>

            <div class="spinner-layer spinner-yellow">
                <div class="circle-clipper left">
                    <div class="circle"></div>
                </div><div class="gap-patch">
                <div class="circle"></div>
            </div><div class="circle-clipper right">
                <div class="circle"></div>
            </div>
            </div>

            <div class="spinner-layer spinner-green">
                <div class="circle-clipper left">
                    <div class="circle"></div>
                </div><div class="gap-patch">
                <div class="circle"></div>
            </div><div class="circle-clipper right">
                <div class="circle"></div>
            </div>
            </div>
        </div>
    </div>
</div>
<div id="app">
<aside class="main-sidebar fixed offcanvas b-r sidebar-tabs" data-toggle='offcanvas'>
    <div class="sidebar">
        <div class="d-flex hv-100 align-items-stretch">
            <div class="indigo text-white">
                <div class="nav mt-5 pt-5 flex-column nav-pills" id="v-pills-tab" role="tablist"
                     aria-orientation="vertical">
                    <a class="nav-link" id="v-pills-home-tab" data-toggle="pill" href="#v-pills-home" role="tab"
                       aria-controls="v-pills-home" aria-selected="true"><i class="icon-inbox2"></i></a>
                    <a class="nav-link blink skin_handle"  href="#"><i class="icon-lightbulb_outline"></i></a>
                    <a href="">
                        <figure class="avatar">
                            <img src="<?php echo base_url('assets/img/dummy/u3.png'); ?>" alt="Admin">
                            <span class="avatar-badge online"></span>
                        </figure>
                    </a>
                </div>
            </div>
            <div class="tab-content flex-grow-1" id="v-pills-tabContent">
                <div class="tab-pane fade show active" id="v-pills-home" role="tabpanel"
                     aria-labelledby="v-pills-home-tab">
                    <div class="relative brand-wrapper sticky b-b">
                        <div class="d-flex justify-content-between align-items-center p-3">
                            <div class="text-xs-center">
                                <span class="font-weight-lighter s-18">Menu</span>
                            </div>
                            <div class="badge badge-danger r-0">Admin Panel</div>
                        </div>
                    </div>
                    <ul class="sidebar-menu">
                        <li class="treeview">
                            <a href="<?php echo base_url('dashboard'); ?>">
                            <i class="icon icon-sailing-boat-water s-24"></i> <span>Dashboard</span>
                            </a>
                        </li>
                        <li class="treeview"><a href="<?php echo base_url('dashboard/leaderboard'); ?>">
                            <i class="icon icon icon-goals-1 s-24"></i>
                            <span>Leaderboard</span>
                        </a>
                        </li>
                        <li class="treeview"><a href="<?php echo base_url('dashboard/ranking'); ?>"><i class="icon icon-goals-1 s-24"></i>Ranking</a></li>
                        <li class="treeview"><a href="#">
                            <i class="icon icon-account_box s-24"></i>
                            <i class=" icon-angle-left  pull-right"></i>
                            <span>Players</span>
                        </a>
                            <ul class="treeview-menu">
                                <li><a href="<?php echo base_url('dashboard/add_player'); ?>"><i class="icon icon-circle-o"></i>Add Players</a>
                                </li>
                                <!--<li><a href="#"><i class="icon icon-add"></i>Delete Player</a>
                                </li>-->
                            </ul>
                        </li>
                        <?php if($this->session->userdata('login')){ $session_detective_name = $this->session->userdata('udetective_name'); ?>
                        <li class="treeview ">
                            <a href="#">
                                <i class="icon icon-account_box s-24"></i> <span>Detective <?php echo $session_detective_name; ?></span>
                            </a>
                        </li>
                        <li class="treeview">
                            <a href="<?php echo base_url('dashboard/logout'); ?>">
                                <i class="icon icon-account_box s-24"></i> <span>Logout</span>
                            </a>
                        </li>
                      <?php }else{ ?>
                        <li class="treeview ">
                            <a href="<?php echo base_url('dashboard/login'); ?>">
                                <i class="icon icon-account_box s-24"></i> <span>Login</span>
                            </a>
                        </li>
                        <li class="treeview">
                            <a href="<?php echo base_url('dashboard/register'); ?>">
                                <i class="icon icon-account_box s-24"></i> <span>Register</span>
                            </a>
                        </li>
                      <?php } ?>
                        <li class="treeview">
                            <a href="#">
                                <i class="icon icon-documents3 s-24"></i> <span>FAQ</span>
                            </a>
                        </li>

                    </ul>
                </div>
                <div class="tab-pane fade" id="v-pills-profile" role="tabpanel" aria-labelledby="v-pills-profile-tab">
                    <div class="relative brand-wrapper sticky b-b p-3">
                        <form>
                            <div class="form-group input-group-sm has-right-icon">
                                <input class="form-control form-control-sm light r-30" placeholder="Search" type="text">
                                <i class="icon-search"></i>
                            </div>
                        </form>
                    </div>

                </div>
            </div>
        </div>
    </div>
</aside>


<a href="#" data-toggle="push-menu" class="paper-nav-toggle left ml-2 fixed">
    <i></i>
</a>
<div class="has-sidebar-left has-sidebar-tabs">
    <!--navbar-->
    <div class="sticky">
        <div class="navbar navbar-expand d-flex justify-content-between bd-navbar white shadow">
            <div class="relative">
                <div class="d-flex">
                    <div class="d-none d-md-block">
                        <h1 class="nav-title">Dashboard</h1>
                    </div>
                </div>
            </div>
            <!--Top Menu Start -->
        </div>
    </div>
    <!--#navbar-->
