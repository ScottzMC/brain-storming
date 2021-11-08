<!DOCTYPE html>
<html lang="zxx">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="">
    <link rel="icon" href="<?php echo base_url('assets/img/basic/favicon.ico'); ?>" type="image/x-icon">
    <?php foreach($profile as $prof){} ?>
    <title>BrainStorming || <?php echo $prof->player_name; ?></title>

</head>
<body class="light sidebar-mini sidebar-collapse">

<a href="#" data-toggle="push-menu" class="paper-nav-toggle left ml-2 fixed">
    <i></i>
</a>
<div class="has-sidebar-left has-sidebar-tabs">

    <!--#navbar-->
        <header class="white pt-3 relative shadow">
            <div class="container-fluid">
                <div class="row p-t-b-10 ">
                    <div class="col">
                        <div class="pb-3">
                            <div class="image mr-3  float-left">
                                <img class="user_avatar no-b no-p" src="<?php echo base_url('uploads/avatar/'.$prof->avatar); ?>" alt="<?php echo $prof->player_name; ?>">
                            </div>
                            <div>
                                <h6 class="p-t-10"><?php echo $prof->player_name; ?></h6>
                                <strong> <?php echo $prof->detective_rank; ?> </strong>
                            </div>
                        </div>
                    </div>
                </div>

              <div class="row">
                  <ul class="nav nav-material responsive-tab" id="v-pills-tab" role="tablist">
                      <li>
                          <a class="nav-link active" id="v-pills-tab1-tab" data-toggle="pill" href="#v-pills-tab1" role="tab" aria-controls="v-pills-tab1">
                              <i class="icon icon-home2"></i>Home
                          </a>
                      </li>
                      <li>
                          <a class="nav-link" id="v-pills-settings-tab" data-toggle="pill" href="#v-pills-settings" role="tab" aria-controls="v-pills-settings" aria-selected="false"><i class="icon icon-cog"></i>Edit Profile</a>
                      </li>
                  </ul>
              </div>

            </div>
        </header>

        <div class="container-fluid animatedParent animateOnce my-3">
            <div class="animated fadeInUpShort">
           <div class="tab-content" id="v-pills-tabContent">
               <div class="tab-pane fade show active" id="v-pills-tab1" role="tabpanel" aria-labelledby="v-pills-home-tab">
                   <div class="row">
                       <div class="col-md-3">
                           <div class="card ">

                               <ul class="list-group list-group-flush">
                                   <li class="list-group-item"><i class="icon icon-mobile text-primary"></i><strong class="s-12">Phone</strong> <span class="float-right s-12">+91 333470 456 99</span></li>
                                   <li class="list-group-item"><i class="icon icon-mail text-success"></i><strong class="s-12">Email</strong> <span class="float-right s-12">abc@paper.com</span></li>
                                   <li class="list-group-item"><i class="icon icon-address-card-o text-warning"></i><strong class="s-12">Address</strong> <span class="float-right s-12">New York, USA</span></li>
                                   <li class="list-group-item"><i class="icon icon-web text-danger"></i> <strong class="s-12">Website</strong> <span class="float-right s-12">pappertemplate.com</span></li>
                               </ul>
                           </div>
                           <div class="card mt-3 mb-3">
                               <div class="card-header bg-white">
                                   <strong class="card-title">Guardian</strong>

                               </div>
                               <ul class="no-b">
                                   <li class="list-group-item">
                                       <a href="">
                                           <div class="image mr-3  float-left">
                                               <img class="user_avatar" src="<?php echo base_url('assets/img/dummy/u3.png'); ?>" alt="<?php echo $prof->player_name; ?>">
                                           </div>
                                           <h6 class="p-t-10">Alexander Pierce</h6>
                                           <span><i class="icon-mobile-phone"></i>+92 333470963</span>
                                       </a>
                                   </li>
                               </ul>

                               <div class="card-header bg-white">
                                   <strong class="card-title">Siblings</strong>
                               </div>
                               <div>
                                   <ul class="list-group list-group-flush">
                                       <li class="list-group-item">
                                           <div class="image mr-3  float-left">
                                               <img class="user_avatar" src="assets/img/dummy/u1.png" alt="User Image">
                                           </div>
                                           <h6 class="p-t-10">Alexander Pierce</h6>
                                           <span> 4th Grade</span>
                                       </li>
                                       <li class="list-group-item">
                                           <div class="image mr-3  float-left">
                                               <img class="user_avatar" src="assets/img/dummy/u2.png" alt="User Image">
                                           </div>
                                           <h6 class="p-t-10">Alexander Pierce</h6>
                                           <span> 5th Grade</span>
                                       </li>
                                       <li class="list-group-item">
                                           <div class="image mr-3  float-left">
                                               <img class="user_avatar" src="assets/img/dummy/u5.png" alt="User Image">
                                           </div>
                                           <h6 class="p-t-10">Alexander Pierce</h6>
                                           <span> 6th Grade</span>
                                       </li>
                                       <li class="list-group-item">
                                           <div class="image mr-3  float-left">
                                               <img class="user_avatar" src="assets/img/dummy/u4.png" alt="User Image">
                                           </div>
                                           <h6 class="p-t-10">Alexander Pierce</h6>
                                           <span> 10th Grade</span>
                                       </li>
                                   </ul>
                               </div>

                           </div>

                       </div>
                       <div class="col-md-9">

                           <div class="row">
                               <div class="col-lg-4">
                                   <div class="card r-3">
                                       <div class="p-4">
                                           <div class="float-right">
                                               <span class="icon-award text-light-blue s-48"></span>
                                           </div>
                                           <div class="counter-title">Class Position</div>
                                           <h5 class="sc-counter mt-3">5th</h5>
                                       </div>
                                   </div>
                               </div>
                               <div class="col-lg-4">
                                   <div class="card r-3">
                                       <div class="p-4">
                                           <div class="float-right"><span class="icon-stop-watch3 s-48"></span>
                                           </div>
                                           <div class="counter-title ">Absence</div>
                                           <h5 class="sc-counter mt-3">12</h5>
                                       </div>
                                   </div>
                               </div>
                               <div class="col-lg-4">
                                   <div class="white card">
                                       <div class="p-4">
                                           <div class="float-right"><span class="icon-orders s-48"></span>
                                           </div>
                                           <div class="counter-title">Roll Number</div>
                                           <h5 class="sc-counter mt-3">26</h5>
                                       </div>
                                   </div>
                               </div>
                           </div>

                           <div class="row my-3">
                               <!-- bar charts group -->
                               <div class="col-md-12">
                                   <div class="card">
                                       <div class="card-header white">
                                           <h6>Attendance <small>Sessions</small></h6>
                                       </div>
                                       <div class="card-body">
                                           <div id="graphx" class="height-300"></div>
                                       </div>
                                   </div>
                               </div>
                               <!-- /bar charts group -->


                           </div>
                           <div class="row">
                               <div class="col-md-12">
                                   <div class="card">
                                       <div class="card-header white">
                                           <h6>New Followers <span class="badge badge-success r-3">30+</span></h6>
                                       </div>
                                       <div class="card-body">

                                           <ul class="list-inline mt-3">
                                               <li class="list-inline-item ">
                                                   <img src="assets/img/dummy/u13.png" alt="" class="img-responsive w-40px circle mb-3">
                                               </li>
                                               <li class="list-inline-item">
                                                   <img src="assets/img/dummy/u12.png" alt="" class="img-responsive w-40px circle mb-3">
                                               </li>
                                               <li class="list-inline-item">
                                                   <img src="assets/img/dummy/u11.png" alt="" class="img-responsive w-40px circle mb-3">
                                               </li>
                                               <li class="list-inline-item">
                                                   <img src="assets/img/dummy/u10.png" alt="" class="img-responsive w-40px circle mb-3">
                                               </li>
                                               <li class="list-inline-item">
                                                   <img src="assets/img/dummy/u9.png" alt="" class="img-responsive w-40px circle mb-3">
                                               </li>
                                               <li class="list-inline-item">
                                                   <img src="assets/img/dummy/u8.png" alt="" class="img-responsive w-40px circle mb-3">
                                               </li>
                                               <li class="list-inline-item ">
                                                   <img src="assets/img/dummy/u7.png" alt="" class="img-responsive w-40px circle mb-3">
                                               </li>
                                               <li class="list-inline-item">
                                                   <img src="assets/img/dummy/u6.png" alt="" class="img-responsive w-40px circle mb-3">
                                               </li>
                                               <li class="list-inline-item">
                                                   <img src="assets/img/dummy/u5.png" alt="" class="img-responsive w-40px circle mb-3">
                                               </li>
                                               <li class="list-inline-item">
                                                   <img src="assets/img/dummy/u4.png" alt="" class="img-responsive w-40px circle mb-3">
                                               </li>
                                               <li class="list-inline-item">
                                                   <img src="assets/img/dummy/u3.png" alt="" class="img-responsive w-40px circle mb-3">
                                               </li>
                                               <li class="list-inline-item">
                                                   <img src="assets/img/dummy/u2.png" alt="" class="img-responsive w-40px circle mb-3">
                                               </li>
                                           </ul>
                                       </div>
                                   </div>
                               </div>
                           </div>
                       </div>
                   </div>
               </div>

               <div class="tab-pane fade" id="v-pills-settings" role="tabpanel" aria-labelledby="v-pills-settings-tab">
                   <form action="<?php echo base_url('dashboard/profile/'.$prof->id); ?>" method="post" class="form-horizontal">
                       <div class="form-group">
                           <label for="inputNamea" class="col-sm-2 control-label">Player Name</label>

                           <div class="col-sm-10">
                               <input class="form-control" id="inputNamea" placeholder="Player Name" value="<?php echo $prof->player_name; ?>" type="text" name="player_name">
                           </div>
                       </div>
                       <div class="form-group">
                           <label for="inputEmail" class="col-sm-2 control-label">Detective Rank</label>

                           <div class="col-sm-10">
                               <input class="form-control" id="inputEmail" placeholder="Detective Rank" value="<?php echo $prof->detective_rank; ?>" type="text" name="detective_rank">
                           </div>
                       </div>
                       <div class="form-group">
                           <label for="inputName" class="col-sm-2 control-label">Detective Rank Level</label>

                           <div class="col-sm-10">
                               <input class="form-control" id="inputName" placeholder="Detective Rank Level" type="text" name="detective_rank_level" value="<?php echo $prof->detective_rank_level; ?>">
                           </div>
                       </div>

                         <div class="form-group col-md-4">
                             <label for="inputActivity" class="col-form-label">Normal Activity</label>
                               <select class="form-control" name="activity">
                                 <option value="">-- Specify Activity --</option>
                                 <option value="Detective"> Detective </option>
                                 <option value="Riddle"> Riddle </option>
                               </select>
                           </div>

                           <div class="col-sm-10">
                             <input class="form-control" placeholder="Number of Attempts" type="text" name="attempts">
                           </div>

                           <div class="form-group col-md-4">
                               <label for="inputOutcome" class="col-form-label">Outcome</label>
                                 <select class="form-control" name="outcome">
                                   <option value="">-- Specify Outcome --</option>
                                   <option value="Lose"> Lose </option>
                                   <option value="Won"> Won </option>
                                 </select>
                             </div>

                       <div class="form-group">
                           <div class="form-group col-md-4">
                               <label for="inputActivity" class="col-form-label">Special Activity</label>
                               <select class="form-control" name="special_activity">
                                 <option value="">-- Specify Activity --</option>
                                 <option value="Extra"> Extra </option>
                                 <option value="Super"> Super </option>
                               </select>
                           </div>

                           <div class="col-sm-10">
                             <input class="form-control" placeholder="Number of Attempts" type="text" name="special_attempts">
                           </div>
                       </div>

                       <div class="form-group col-md-4">
                           <label for="inputOutcome" class="col-form-label">Outcome</label>
                             <select class="form-control" name="special_outcome">
                               <option value="">-- Specify Outcome --</option>
                               <option value="Lose"> Lose </option>
                               <option value="Won"> Won </option>
                             </select>
                         </div>

                       <div class="form-group">
                           <div class="col-sm-offset-2 col-sm-10">
                               <button type="submit" name="updateBtn" class="btn btn-danger">Submit</button>
                           </div>
                       </div>
                   </form>
                   <?php
                     if($this->form_validation->run() == TRUE){
                       echo $this->session->flashdata('msgSuccess');
                     }
                   ?>
                 </div>
               </div>
           </div>
       </div>
    </div>

</div>

<!-- Add the sidebar's background. This div must be placed
         immediately after the control sidebar -->
<div class="control-sidebar-bg shadow white fixed"></div>
</div>
<!--/#app -->

</body>
</html>
