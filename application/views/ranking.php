<!DOCTYPE html>
<html lang="zxx">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="">
    <link rel="icon" href="<?php echo base_url('assets/img/basic/favicon.ico'); ?>" type="image/x-icon">
    <title>BrainStorming || Ranking</title>

</head>
<body class="light sidebar-mini sidebar-collapse">

<div class="has-sidebar-left">
    <div class="pos-f-t">
    <div class="collapse" id="navbarToggleExternalContent">
        <div class="bg-dark pt-2 pb-2 pl-4 pr-2">
            <div class="search-bar">
                <input class="transparent s-24 text-white b-0 font-weight-lighter w-128 height-50" type="text"
                       placeholder="start typing...">
            </div>
            <a href="#" data-toggle="collapse" data-target="#navbarToggleExternalContent" aria-expanded="false"
               aria-label="Toggle navigation" class="paper-nav-toggle paper-nav-white active "><i></i></a>
        </div>
    </div>
</div>
</div>
<a href="#" data-toggle="push-menu" class="paper-nav-toggle left ml-2 fixed">
    <i></i>
</a>
<div class="has-sidebar-left has-sidebar-tabs">
    <!--#navbar-->
    <div class="container-fluid animatedParent animateOnce">
        <div class="tab-content my-3" id="v-pills-tabContent">
            <div class="tab-pane animated fadeInUpShort show active" id="v-pills-all" role="tabpanel" aria-labelledby="v-pills-all-tab">
                <div class="row my-3">
                    <div class="col-md-12">
                        <div class="card r-0 shadow">
                            <div class="table-responsive">
                                <form>
                                    <table class="table table-striped table-hover r-0">
                                        <thead>
                                        <tr class="no-b">
                                            <th>RANK NO</th>
                                            <th><div class="d-none d-lg-block">RANK TYPE</div></th>
                                            <th><div class="d-none d-lg-block">RANK LEVEL</div></th>
                                            <th><div class="d-none d-lg-block">POINTS</div></th>
                                            <th></th>
                                        </tr>
                                        </thead>

                                        <tbody>
                                        <?php foreach($ranking as $rank){
                                          $number = 1;
                                        ?>
                                        <tr>
                                            <td>
                                              <div style="margin-left: 20px;" class="d-none d-lg-block">
                                                <strong> <?php echo "-"; ?> </strong>
                                              </div>
                                            </td>
                                            <td>
                                              <div class="d-flex">
                                                  <div>
                                                      <div style="margin-top:10px; margin-left: 20px;">
                                                          <strong style="color: black;"><?php echo $rank->rank_type; ?></strong>
                                                      </div>
                                                  </div>
                                              </div>
                                            </td>

                                            <td>
                                              <div class="d-none d-lg-block" style="font-size: 20px;">
                                                <span style="background: <?php echo $rank->color_code; ?>" class="r-3 badge">
                                                  <strong style="color: white;"><?php echo $rank->rank_level; ?></strong>
                                                </span>
                                              </div>
                                            </td>
                                            <td> <div class="d-none d-lg-block"><strong  style="color: black;"><?php echo number_format($rank->rank_points); ?></strong></div></td>
                                        </tr>
                                      <?php } ?>
                                        </tbody>
                                    </table>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>

                <nav class="my-3" aria-label="Page navigation">
                  <?php echo $this->pagination->create_links(); ?>
                </nav>

            </div>

        </div>
    </div>
    <!--Add New Message Fab Button-->
    <a href="#" style="margin-top: 10px;" class="btn-fab btn-fab-md fab-right fab-right-bottom-fixed shadow btn-primary">
      <i class="icon-add" style="margin-top: 20px;"></i></a>
</div>

<!-- Add the sidebar's background. This div must be placed
         immediately after the control sidebar -->
<div class="control-sidebar-bg shadow white fixed"></div>
</div>

</body>
</html>
