<!DOCTYPE html>
<html lang="zxx">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="">
    <link rel="icon" href="<?php echo base_url('assets/img/basic/favicon.ico'); ?>" type="image/x-icon">
    <title>BrainStorming || Add Player</title>

</head>
<body class="light sidebar-mini sidebar-collapse">

<div id="app">

<div class="has-sidebar-left has-sidebar-tabs">
    <!--#navbar-->
    <div class="container-fluid animatedParent animateOnce">
        <div class="animated fadeInUpShort">
            <div class="row my-3">
                <div class="col-md-8 offset-md-2">
                    <form action="<?php echo base_url('dashboard/insert_player'); ?>" method="post" enctype="multipart/form-data">
                        <div class="card no-b">
                            <div class="card-body">
                                <h5 class="card-title">Add Player</h5>
                                <div class="form-row">
                                    <div class="col-md-8">
                                        <div class="form-group m-0">
                                            <label for="name" class="col-form-label s-12">PLAYER NAME</label>
                                            <input id="name" placeholder="Enter Player Name" class="form-control r-0 light s-12 " type="text" name="player_name">
                                        </div>

                                        <div class="form-row">
                                            <div class="form-group col-md-6 m-0">
                                                <label for="cnic" class="col-form-label s-12"><i class="icon-fingerprint"></i>RANK</label>
                                                <input id="cnic" value="Detective Newbie" class="form-control r-0 light s-12 date-picker" type="text" name="rank">
                                            </div>
                                            <div class="form-group col-md-6 m-0">
                                                <label for="dob" class="col-form-label s-12"><i class="icon-calendar mr-2"></i>RANK LEVEL</label>
                                                <input id="dob" value="Bronze Detective Newbie" class="form-control r-0 light s-12 datePicker" type="text" name="rank_level">
                                            </div>
                                        </div>

                                        <div class="form-group m-0">
                                            <label for="dob" class="col-form-label s-12">GENDER</label>
                                            <br>
                                            <div class="custom-control custom-radio custom-control-inline">
                                                <input type="radio" id="male" name="gender" value="Male" class="custom-control-input">
                                                <label class="custom-control-label" for="male">Male</label>
                                            </div>
                                            <div class="custom-control custom-radio custom-control-inline">
                                                <input type="radio" id="female" name="gender" value="Female" class="custom-control-input">
                                                <label class="custom-control-label" for="female">Female</label>
                                            </div>

                                        </div>
                                    </div>
                                    <div class="col-md-3 offset-md-1">
                                        <input hidden id="file" type="file" name="userFiles"/>
                                        <div class="dropzone dropzone-file-area pt-4 pb-4" id="fileUpload">
                                            <div class="dz-default dz-message">
                                                <span>Drop An Avatar size image of user</span>
                                                <div>You can also click to open file browser</div>
                                            </div>
                                        </div>
                                    </div>

                                </div>

                                <div class="form-row mt-1">
                                  <div class="card-body">
                                      <h5 class="card-title">TYPE</h5>
                                      <div class="form-row">
                                          <div class="form-group col-5 m-0">
                                              <label class="my-1 mr-2" for="inlineFormCustomSelectPref">Select A Player Type</label>
                                              <select name="type" class="custom-select my-1 mr-sm-2 form-control r-0 light s-12" id="inlineFormCustomSelectPref">
                                                  <option selected>Choose...</option>
                                                  <option value="PC">PC</option>
                                                  <option value="NPC">NPC</option>
                                              </select>
                                          </div>
                                      </div>
                                  </div>

                                </div>
                            </div>

                            <hr>
                            <div class="card-body">
                                <button type="submit" class="btn btn-primary btn-lg"><i class="icon-save mr-2"></i>Save Data</button>
                            </div>
                        </div>
                    </form>

                    <?php echo $this->session->flashdata('msgError'); ?>
                </div>
            </div>
    </div>
    </div>
</div>

<!-- Add the sidebar's background. This div must be placed
         immediately after the control sidebar -->
<div class="control-sidebar-bg shadow white fixed"></div>
</div>

</body>
</html>
