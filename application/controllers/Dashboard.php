<?php

  class Dashboard extends CI_Controller{

    // Login

    public function login(){
      $this->form_validation->set_rules('email', 'Email ID', 'trim|required|valid_email');
      $this->form_validation->set_rules('password', 'Password', 'trim|required');

      $form_valid = $this->form_validation->run();
      $submit_login = $this->input->post('loginBtn');

      if($this->form_validation->run() == FALSE){
        $this->load->view('menu');
        $this->load->view('login');
        $this->load->view('footer');
			}else if(isset($submit_login)){
        $email = $this->input->post('email');
        $password = $this->input->post('password');

        $uresult = $this->Model->validate($email, $password);
        if(count($uresult) > 0){
          $sess_data = array(
          'login' => TRUE,
          'uid' => $uresult[0]->id,
          'udetective_name' => $uresult[0]->detective_name,
          'uemail' => $uresult[0]->email,
          'status' => $uresult[0]->status
         );

         /*$cookie = array(
          'name'   => 'remember_me_token',
          'value'  => 'asokb0ro04mob00i3',
          'expire' => '720000000',
          'domain' => 'http://localhost/ClientProjects/BrainStorming',
          'path'   => '/'
          );

          set_cookie($cookie);*/
          $this->session->set_userdata($sess_data);
          redirect('dashboard');

          }else{
            $statusMsg = '<span class="text-danger">Wrong Email-ID or Password!</span>';
            $this->session->set_flashdata('msgError', $statusMsg);
            $this->load->view('menu');
            $this->load->view('login');
            $this->load->view('footer');
         }
      }
    }

    public function logout(){
      // destroy session
      $data = array('login' => '', 'uid' => '', 'udetective_name' => '', 'uemail' => '', 'status' => '');
      $this->session->unset_userdata($data);
      $this->session->sess_destroy();
      #delete_cookie('remember_me_token', 'http://localhost/ClientProjects/LizTech', '/');
      redirect('dashboard');
     }

    // End of Login

    // Register

    public function register(){
      $this->form_validation->set_rules('detective_name', 'Detective Name', 'trim|required|min_length[3]|max_length[70]');
      $this->form_validation->set_rules('email', 'Email ID', 'trim|required|valid_email|is_unique[users.email]');
      $this->form_validation->set_rules('password', 'Password', 'trim|required');
      $this->form_validation->set_rules('cpassword', 'Confirm Password', 'trim|required|matches[password]');

      $form_valid = $this->form_validation->run();
			$submit_register = $this->input->post('registerBtn');

      if($form_valid == FALSE){
        $this->load->view('menu');
        $this->load->view('register');
        $this->load->view('footer');
			}else if(isset($submit_register)){
        $email = $this->input->post('email');
				$password = $this->input->post('password');
				$hashed_password = $this->bcrypt->hash_password($password);

        $detective_name = $this->input->post('detective_name');
        $date = date('Y-m-d H:i:s');

        $add_user_array = array(
          'detective_name' => $detective_name,
          'email' => $email,
          'password' => $hashed_password,
          'status' => 'User',
          'created_day' => $date
        );

        $insert_user = $this->Model->insert_user($add_user_array);

        if($insert_user){
          redirect('dashboard/login');
        }else{
            $msgError = '<div class="alert alert-danger>Registration Failed</div>';
            $this->session->set_flashdata('msgError', $msgError);
            $this->load->view('menu');
            $this->load->view('register');
            $this->load->view('footer');
        }

      }
    }

    // End of Register

    // Dashboard

    public function index(){
      $this->load->view('menu');
      $this->load->view('dashboard');
      $this->load->view('footer');
    }

    // End of Dashboard

    // Leaderboard

    public function leaderboard(){
      $config['base_url'] = base_url()."dashboard/leaderboard";
      $total_row = $this->Model->record_leaderboard_count();
      $config['total_rows'] = $total_row;
      $config['per_page'] = 10;
      $config['uri_segment'] = 3;
      $choice = $choice = $config['total_rows']/$config['per_page'];
      $config['num_links'] = round($choice);

      $config['full_tag_open'] = '<ul class="pagination">';
      $config['full_tag_close'] = '</ul>';

      $config['first_tag_open'] = '<li class="page-item">';
      $config['last_tag_open'] = '<li class="page-item">';

      $config['next_tag_open'] = '<li class="page-item"><a class="page-link" href="#">';
      $config['prev_tag_open'] = '<li class="page-item"><a class="page-link" href="#">';

      $config['cur_tag_open'] = '<li class="page-item"><a class="page-link" href="#">';
      $config['cur_tag_close'] = '</a></li>';

      $config['num_tag_open'] = '<li class="page-item"><a class="page-link" href="#">';
      $config['num_tag_close'] = '</a></li>';

      $config['next_tag_close'] = '</a></li>';
      $config['prev_tag_close'] = '</a></li>';

      $config['first_tag_close'] = '</a></li>';
      $config['last_tag_close'] = '</a></li>';

      $this->pagination->initialize($config);

      $page = ($this->uri->segment(3))? $this->uri->segment(3) : 0;

      $data['leaderboard'] = $this->Model->fetch_leaderboard_data($config["per_page"], $page);

      $this->load->view('menu');
      $this->load->view('leaderboard', $data);
      $this->load->view('footer');
    }

    // End of Leaderboard

    // Ranking

    public function ranking(){
      $config['base_url'] = base_url()."dashboard/ranking";
      $total_row = $this->Model->record_ranking_count();
      $config['total_rows'] = $total_row;
      $config['per_page'] = 10;
      $config['uri_segment'] = 3;
      $choice = $choice = $config['total_rows']/$config['per_page'];
      $config['num_links'] = round($choice);

      $config['full_tag_open'] = '<ul class="pagination">';
      $config['full_tag_close'] = '</ul>';

      $config['first_tag_open'] = '<li class="page-item">';
      $config['last_tag_open'] = '<li class="page-item">';

      $config['next_tag_open'] = '<li class="page-item"><a class="page-link" href="#">';
      $config['prev_tag_open'] = '<li class="page-item"><a class="page-link" href="#">';

      $config['cur_tag_open'] = '<li class="page-item"><a class="page-link" href="#">';
      $config['cur_tag_close'] = '</a></li>';

      $config['num_tag_open'] = '<li class="page-item"><a class="page-link" href="#">';
      $config['num_tag_close'] = '</a></li>';

      $config['next_tag_close'] = '</a></li>';
      $config['prev_tag_close'] = '</a></li>';

      $config['first_tag_close'] = '</a></li>';
      $config['last_tag_close'] = '</a></li>';

      $this->pagination->initialize($config);

      $page = ($this->uri->segment(3))? $this->uri->segment(3) : 0;

      $data['ranking'] = $this->Model->fetch_ranking_data($config["per_page"], $page);

      $this->load->view('menu');
      $this->load->view('ranking', $data);
      $this->load->view('footer');
    }

    // End of Ranking

    // Player Profile

    public function profile($id){
      $data['profile'] = $this->Model->fetch_profile_user($id);

      /*$this->form_validation->set_rules('player_name', 'Player Name', 'trim|required|min_length[3]|max_length[70]');
      $this->form_validation->set_rules('detective_rank', 'Detective Rank', 'trim|required');
      $this->form_validation->set_rules('detective_rank_level', 'Detective Rank Level', 'trim|required');
      $this->form_validation->set_rules('activity', 'Normal Activity', 'trim|required');
      $this->form_validation->set_rules('attempts', 'Attempts', 'trim|required');
      $this->form_validation->set_rules('special_attempts', 'Special Attempts', 'trim|required');*/

      $form_valid = $this->form_validation->run();
			$submit_update = $this->input->post('updateBtn');

      /*if($form_valid == FALSE){
        $this->load->view('menu');
        $this->load->view('player_profile', $data);
        $this->load->view('footer'); */
       //if(empty($submit_update) || !isset($submit_update)){
         $this->load->view('menu');
         $this->load->view('player_profile', $data);
         $this->load->view('footer');
      /*}*/ if(isset($submit_update)){
        $this->load->view('menu');
        $this->load->view('player_profile', $data);
        $this->load->view('footer');
        $player_name = $this->input->post('player_name');
        $detective_rank = $this->input->post('detective_rank');
        $detective_rank_level = $this->input->post('detective_rank_level');
        $activity = $this->input->post('activity');
        $special_activity = $this->input->post('special_activity');
        $attempts = $this->input->post('attempts');
        $special_attempts = $this->input->post('special_attempts');

        if($activity == "Detective"){
          $this->detective_points($id, $attempts);
          redirect('dashboard/leaderboard');
        }

        if($activity == "Riddle"){
          $this->riddle_points($id, $attempts);
          redirect('dashboard/leaderboard');
        }

        if($special_activity == "Extra"){
          $this->extra_points($id, $attempts);
          redirect('dashboard/leaderboard');
        }

        if($special_activity == "Super"){
          $this->super_points($id, $attempts);
          redirect('dashboard/leaderboard');
        }
      }
    }

    // Detective Activity

    public function detective_points($id, $attempt){
      $sequel = $this->db->query("SELECT points FROM players WHERE id = '$id' ")->result();
      foreach($sequel as $sql){
        $db_points = $sql->points;
      }

      $points = 100;
      $attempt_point = 30;
      $negative_attempt = 3;
      $negative_point = -10;
      $outcome = $this->input->post('outcome');

      if($attempt < 3 && $outcome == "Won"){
        $won_points = ($db_points + $points) + $attempt_point;
        $this->Model->updatePoints($id, $won_points);
      }else if($attempt > 3 && $outcome == "Won"){
        $loss_points = ($attempt - $negative_attempt) * $negative_point;
        $new_loss_points = ($db_points + $points) + $loss_points;
        $this->Model->updatePoints($id, $new_loss_points);
      }

      if($attempt < 3 && $outcome == "Lose"){
        $lose_points = $db_points + $attempt_point;
        $this->Model->updatePoints($id, $lose_points);
      }else if($attempt > 3 && $outcome == "Lose"){
        $loss_points = ($attempt - $negative_attempt) * $negative_point;
        $new_loss_points = $db_points + $loss_points;
        $this->Model->updatePoints($id, $new_loss_points);
      }

      if($db_points <= 100){
        $this->Model->updateDetectiveRank($id, "Detective Newbie");
        $this->Model->updateDetectiveRankLevel($id, "Bronze Detective Newbie");
        $this->Model->updateDetectiveRankColor($id, "Bronze");

      }else if($db_points <= 500){
        $this->Model->updateDetectiveRank($id, "Detective Newbie");
        $this->Model->updateDetectiveRankLevel($id, "Silver Detective Newbie");
        $this->Model->updateDetectiveRankColor($id, "Silver");

      }else if($db_points <= 1000){
        $this->Model->updateDetectiveRank($id, "Detective Newbie");
        $this->Model->updateDetectiveRankLevel($id, "Gold Detective Newbie");
        $this->Model->updateDetectiveRankColor($id, "Gold");

      }else if($db_points <= 2000){
        $this->Model->updateDetectiveRank($id, "Detective Newbie");
        $this->Model->updateDetectiveRankLevel($id, "Hall of Fame Detective Newbie");
        $this->Model->updateDetectiveRankColor($id, "Hall of Fame");

      }else if($db_points <= 2500){
        $this->Model->updateDetectiveRank($id, "Detective Assistant");
        $this->Model->updateDetectiveRankLevel($id, "Bronze Detective Assistant");
        $this->Model->updateDetectiveRankColor($id, "Bronze");

      }else if($db_points <= 3000){
        $this->Model->updateDetectiveRank($id, "Detective Assistant");
        $this->Model->updateDetectiveRankLevel($id, "Silver Detective Assistant");
        $this->Model->updateDetectiveRankColor($id, "Silver");

      }else if($db_points <= 4000){
        $this->Model->updateDetectiveRank($id, "Detective Assistant");
        $this->Model->updateDetectiveRankLevel($id, "Gold Detective Assistant");
        $this->Model->updateDetectiveRankColor($id, "Gold");

      }else if($db_points <= 6000){
        $this->Model->updateDetectiveRank($id, "Detective Assistant");
        $this->Model->updateDetectiveRankLevel($id, "Hall of Fame Detective Assistant");
        $this->Model->updateDetectiveRankColor($id, "Hall of Fame");

      }else if($db_points <= 6500){
        $this->Model->updateDetectiveRank($id, "Detective Professional");
        $this->Model->updateDetectiveRankLevel($id, "Bronze Detective Professional");
        $this->Model->updateDetectiveRankColor($id, "Bronze");

      }else if($db_points <= 8000){
        $this->Model->updateDetectiveRank($id, "Detective Professional");
        $this->Model->updateDetectiveRankLevel($id, "Silver Detective Professional");
        $this->Model->updateDetectiveRankColor($id, "Silver");

      }else if($db_points <= 10000){
        $this->Model->updateDetectiveRank($id, "Detective Professional");
        $this->Model->updateDetectiveRankLevel($id, "Gold Detective Professional");
        $this->Model->updateDetectiveRankColor($id, "Gold");

      }else if($db_points <= 12000){
        $this->Model->updateDetectiveRank($id, "Detective Professional");
        $this->Model->updateDetectiveRankLevel($id, "Hall of Fame Detective Professional");
        $this->Model->updateDetectiveRankColor($id, "Hall of Fame");

      }else if($db_points <= 13000){
        $this->Model->updateDetectiveRank($id, "Junior Detective");
        $this->Model->updateDetectiveRankLevel($id, "Bronze Junior Detective");
        $this->Model->updateDetectiveRankColor($id, "Bronze");

      }else if($db_points <= 14000){
        $this->Model->updateDetectiveRank($id, "Junior Detective");
        $this->Model->updateDetectiveRankLevel($id, "Silver Junior Detective");
        $this->Model->updateDetectiveRankColor($id, "Silver");

      }else if($db_points <= 16000){
        $this->Model->updateDetectiveRank($id, "Junior Detective");
        $this->Model->updateDetectiveRankLevel($id, "Gold Junior Detective");
        $this->Model->updateDetectiveRankColor($id, "Gold");

      }else if($db_points <= 20000){
        $this->Model->updateDetectiveRank($id, "Junior Detective");
        $this->Model->updateDetectiveRankLevel($id, "Hall of Fame Junior Detective");
        $this->Model->updateDetectiveRankColor($id, "Hall of Fame");

      }else if($db_points <= 21000){
        $this->Model->updateDetectiveRank($id, "Senior Detective");
        $this->Model->updateDetectiveRankLevel($id, "Bronze Senior Detective");
        $this->Model->updateDetectiveRankColor($id, "Bronze");

      }else if($db_points <= 22000){
        $this->Model->updateDetectiveRank($id, "Senior Detective");
        $this->Model->updateDetectiveRankLevel($id, "Silver Senior Detective");
        $this->Model->updateDetectiveRankColor($id, "Silver");

      }else if($db_points <= 24000){
        $this->Model->updateDetectiveRank($id, "Senior Detective");
        $this->Model->updateDetectiveRankLevel($id, "Gold Senior Detective");
        $this->Model->updateDetectiveRankColor($id, "Gold");

      }else if($db_points <= 30000){
        $this->Model->updateDetectiveRank($id, "Senior Detective");
        $this->Model->updateDetectiveRankLevel($id, "Hall of Fame Senior Detective");
        $this->Model->updateDetectiveRankColor($id, "Hall of Fame");

      }else if($db_points <= 35000){
        $this->Model->updateDetectiveRank($id, "Lead Chief Detective");
        $this->Model->updateDetectiveRankLevel($id, "Gold Lead Chief Detective");
        $this->Model->updateDetectiveRankColor($id, "Gold");

      }else if($db_points <= 40000){
        $this->Model->updateDetectiveRank($id, "Lead Chief Detective");
        $this->Model->updateDetectiveRankLevel($id, "Hall of Fame Lead Chief Detective");
        $this->Model->updateDetectiveRankColor($id, "Hall of Fame");

      }else if($db_points <= 50000){
        $this->Model->updateDetectiveRank($id, "Sherlock Holmes");
        $this->Model->updateDetectiveRankLevel($id, "Gold Sherlock Holmes");
        $this->Model->updateDetectiveRankColor($id, "Gold");

      }else if($db_points <= 70000){
        $this->Model->updateDetectiveRank($id, "Sherlock Holmes");
        $this->Model->updateDetectiveRankLevel($id, "Hall of Fame Sherlock Holmes");
        $this->Model->updateDetectiveRankColor($id, "Hall of Fame");

      }else if($db_points <= 100000){
        $this->Model->updateDetectiveRank($id, "Sherlock Holmes");
        $this->Model->updateDetectiveRankLevel($id, "Elite Sherlock Holmes");
        $this->Model->updateDetectiveRankColor($id, "Elite");
      }
    }

    // Riddle Activity

    private function riddle_points($id, $attempt){
      $sequel = $this->db->query("SELECT points FROM players WHERE id = '$id' ")->result();
      foreach($sequel as $sql){
        $db_points = $sql->points;
      }

      $points = 200;
      $attempt_point = 30;
      $negative_attempt = 3;
      $negative_point = -10;
      $outcome = $this->input->post('outcome');

      if($attempt < 3 && $outcome == "Won"){
        $won_points = ($db_points + $points) + $attempt_point;
        $this->Model->updatePoints($id, $won_points);
      }else if($attempt > 3 && $outcome == "Won"){
        $loss_points = ($attempt - $negative_attempt) * $negative_point;
        $new_loss_points = ($db_points + $points) + $loss_points;
        $this->Model->updatePoints($id, $new_loss_points);
      }

      if($attempt < 3 && $outcome == "Lose"){
        $lose_points = $db_points + $attempt_point;
        $this->Model->updatePoints($id, $lose_points);
      }else if($attempt > 3 && $outcome == "Lose"){
        $loss_points = ($attempt - $negative_attempt) * $negative_point;
        $new_loss_points = $db_points + $loss_points;
        $this->Model->updatePoints($id, $new_loss_points);
      }

      if($db_points <= 100){
        $this->Model->updateDetectiveRank($id, "Detective Newbie");
        $this->Model->updateDetectiveRankLevel($id, "Bronze Detective Newbie");
        $this->Model->updateDetectiveRankColor($id, "Bronze");

      }else if($db_points <= 500){
        $this->Model->updateDetectiveRank($id, "Detective Newbie");
        $this->Model->updateDetectiveRankLevel($id, "Silver Detective Newbie");
        $this->Model->updateDetectiveRankColor($id, "Silver");

      }else if($db_points <= 1000){
        $this->Model->updateDetectiveRank($id, "Detective Newbie");
        $this->Model->updateDetectiveRankLevel($id, "Gold Detective Newbie");
        $this->Model->updateDetectiveRankColor($id, "Gold");

      }else if($db_points <= 2000){
        $this->Model->updateDetectiveRank($id, "Detective Newbie");
        $this->Model->updateDetectiveRankLevel($id, "Hall of Fame Detective Newbie");
        $this->Model->updateDetectiveRankColor($id, "Hall of Fame");

      }else if($db_points <= 2500){
        $this->Model->updateDetectiveRank($id, "Detective Assistant");
        $this->Model->updateDetectiveRankLevel($id, "Bronze Detective Assistant");
        $this->Model->updateDetectiveRankColor($id, "Bronze");

      }else if($db_points <= 3000){
        $this->Model->updateDetectiveRank($id, "Detective Assistant");
        $this->Model->updateDetectiveRankLevel($id, "Silver Detective Assistant");
        $this->Model->updateDetectiveRankColor($id, "Silver");

      }else if($db_points <= 4000){
        $this->Model->updateDetectiveRank($id, "Detective Assistant");
        $this->Model->updateDetectiveRankLevel($id, "Gold Detective Assistant");
        $this->Model->updateDetectiveRankColor($id, "Gold");

      }else if($db_points <= 6000){
        $this->Model->updateDetectiveRank($id, "Detective Assistant");
        $this->Model->updateDetectiveRankLevel($id, "Hall of Fame Detective Assistant");
        $this->Model->updateDetectiveRankColor($id, "Hall of Fame");

      }else if($db_points <= 6500){
        $this->Model->updateDetectiveRank($id, "Detective Professional");
        $this->Model->updateDetectiveRankLevel($id, "Bronze Detective Professional");
        $this->Model->updateDetectiveRankColor($id, "Bronze");

      }else if($db_points <= 8000){
        $this->Model->updateDetectiveRank($id, "Detective Professional");
        $this->Model->updateDetectiveRankLevel($id, "Silver Detective Professional");
        $this->Model->updateDetectiveRankColor($id, "Silver");

      }else if($db_points <= 10000){
        $this->Model->updateDetectiveRank($id, "Detective Professional");
        $this->Model->updateDetectiveRankLevel($id, "Gold Detective Professional");
        $this->Model->updateDetectiveRankColor($id, "Gold");

      }else if($db_points <= 12000){
        $this->Model->updateDetectiveRank($id, "Detective Professional");
        $this->Model->updateDetectiveRankLevel($id, "Hall of Fame Detective Professional");
        $this->Model->updateDetectiveRankColor($id, "Hall of Fame");

      }else if($db_points <= 13000){
        $this->Model->updateDetectiveRank($id, "Junior Detective");
        $this->Model->updateDetectiveRankLevel($id, "Bronze Junior Detective");
        $this->Model->updateDetectiveRankColor($id, "Bronze");

      }else if($db_points <= 14000){
        $this->Model->updateDetectiveRank($id, "Junior Detective");
        $this->Model->updateDetectiveRankLevel($id, "Silver Junior Detective");
        $this->Model->updateDetectiveRankColor($id, "Silver");

      }else if($db_points <= 16000){
        $this->Model->updateDetectiveRank($id, "Junior Detective");
        $this->Model->updateDetectiveRankLevel($id, "Gold Junior Detective");
        $this->Model->updateDetectiveRankColor($id, "Gold");

      }else if($db_points <= 20000){
        $this->Model->updateDetectiveRank($id, "Junior Detective");
        $this->Model->updateDetectiveRankLevel($id, "Hall of Fame Junior Detective");
        $this->Model->updateDetectiveRankColor($id, "Hall of Fame");

      }else if($db_points <= 21000){
        $this->Model->updateDetectiveRank($id, "Senior Detective");
        $this->Model->updateDetectiveRankLevel($id, "Bronze Senior Detective");
        $this->Model->updateDetectiveRankColor($id, "Bronze");

      }else if($db_points <= 22000){
        $this->Model->updateDetectiveRank($id, "Senior Detective");
        $this->Model->updateDetectiveRankLevel($id, "Silver Senior Detective");
        $this->Model->updateDetectiveRankColor($id, "Silver");

      }else if($db_points <= 24000){
        $this->Model->updateDetectiveRank($id, "Senior Detective");
        $this->Model->updateDetectiveRankLevel($id, "Gold Senior Detective");
        $this->Model->updateDetectiveRankColor($id, "Gold");

      }else if($db_points <= 30000){
        $this->Model->updateDetectiveRank($id, "Senior Detective");
        $this->Model->updateDetectiveRankLevel($id, "Hall of Fame Senior Detective");
        $this->Model->updateDetectiveRankColor($id, "Hall of Fame");

      }else if($db_points <= 35000){
        $this->Model->updateDetectiveRank($id, "Lead Chief Detective");
        $this->Model->updateDetectiveRankLevel($id, "Gold Lead Chief Detective");
        $this->Model->updateDetectiveRankColor($id, "Gold");

      }else if($db_points <= 40000){
        $this->Model->updateDetectiveRank($id, "Lead Chief Detective");
        $this->Model->updateDetectiveRankLevel($id, "Hall of Fame Lead Chief Detective");
        $this->Model->updateDetectiveRankColor($id, "Hall of Fame");

      }else if($db_points <= 50000){
        $this->Model->updateDetectiveRank($id, "Sherlock Holmes");
        $this->Model->updateDetectiveRankLevel($id, "Gold Sherlock Holmes");
        $this->Model->updateDetectiveRankColor($id, "Gold");

      }else if($db_points <= 70000){
        $this->Model->updateDetectiveRank($id, "Sherlock Holmes");
        $this->Model->updateDetectiveRankLevel($id, "Hall of Fame Sherlock Holmes");
        $this->Model->updateDetectiveRankColor($id, "Hall of Fame");

      }else if($db_points <= 100000){
        $this->Model->updateDetectiveRank($id, "Sherlock Holmes");
        $this->Model->updateDetectiveRankLevel($id, "Elite Sherlock Holmes");
        $this->Model->updateDetectiveRankColor($id, "Elite");
      }
    }

    // Extra Activity

    public function extra_points($id, $attempt){
      $sequel = $this->db->query("SELECT points FROM players WHERE id = '$id' ")->result();
      foreach($sequel as $sql){
        $db_points = $sql->points;
      }

      $points = 500;
      $attempt_point = 50;
      $negative_attempt = 3;
      $negative_point = -50;
      $outcome = $this->input->post('special_outcome');

      if($attempt < 3 && $outcome == "Won"){
        $won_points = ($db_points + $points) + $attempt_point;
        $this->Model->updatePoints($id, $won_points);
      }else if($attempt > 3 && $outcome == "Won"){
        $loss_points = ($attempt - $negative_attempt) * $negative_point;
        $new_loss_points = ($db_points + $points) + $loss_points;
        $this->Model->updatePoints($id, $new_loss_points);
      }

      if($attempt < 3 && $outcome == "Lose"){
        $lose_points = $db_points + $attempt_point;
        $this->Model->updatePoints($id, $lose_points);
      }else if($attempt > 3 && $outcome == "Lose"){
        $loss_points = ($attempt - $negative_attempt) * $negative_point;
        $new_loss_points = $db_points + $loss_points;
        $this->Model->updatePoints($id, $new_loss_points);
      }

      if($db_points <= 100){
        $this->Model->updateDetectiveRank($id, "Detective Newbie");
        $this->Model->updateDetectiveRankLevel($id, "Bronze Detective Newbie");
        $this->Model->updateDetectiveRankColor($id, "Bronze");

      }else if($db_points <= 500){
        $this->Model->updateDetectiveRank($id, "Detective Newbie");
        $this->Model->updateDetectiveRankLevel($id, "Silver Detective Newbie");
        $this->Model->updateDetectiveRankColor($id, "Silver");

      }else if($db_points <= 1000){
        $this->Model->updateDetectiveRank($id, "Detective Newbie");
        $this->Model->updateDetectiveRankLevel($id, "Gold Detective Newbie");
        $this->Model->updateDetectiveRankColor($id, "Gold");

      }else if($db_points <= 2000){
        $this->Model->updateDetectiveRank($id, "Detective Newbie");
        $this->Model->updateDetectiveRankLevel($id, "Hall of Fame Detective Newbie");
        $this->Model->updateDetectiveRankColor($id, "Hall of Fame");

      }else if($db_points <= 2500){
        $this->Model->updateDetectiveRank($id, "Detective Assistant");
        $this->Model->updateDetectiveRankLevel($id, "Bronze Detective Assistant");
        $this->Model->updateDetectiveRankColor($id, "Bronze");

      }else if($db_points <= 3000){
        $this->Model->updateDetectiveRank($id, "Detective Assistant");
        $this->Model->updateDetectiveRankLevel($id, "Silver Detective Assistant");
        $this->Model->updateDetectiveRankColor($id, "Silver");

      }else if($db_points <= 4000){
        $this->Model->updateDetectiveRank($id, "Detective Assistant");
        $this->Model->updateDetectiveRankLevel($id, "Gold Detective Assistant");
        $this->Model->updateDetectiveRankColor($id, "Gold");

      }else if($db_points <= 6000){
        $this->Model->updateDetectiveRank($id, "Detective Assistant");
        $this->Model->updateDetectiveRankLevel($id, "Hall of Fame Detective Assistant");
        $this->Model->updateDetectiveRankColor($id, "Hall of Fame");

      }else if($db_points <= 6500){
        $this->Model->updateDetectiveRank($id, "Detective Professional");
        $this->Model->updateDetectiveRankLevel($id, "Bronze Detective Professional");
        $this->Model->updateDetectiveRankColor($id, "Bronze");

      }else if($db_points <= 8000){
        $this->Model->updateDetectiveRank($id, "Detective Professional");
        $this->Model->updateDetectiveRankLevel($id, "Silver Detective Professional");
        $this->Model->updateDetectiveRankColor($id, "Silver");

      }else if($db_points <= 10000){
        $this->Model->updateDetectiveRank($id, "Detective Professional");
        $this->Model->updateDetectiveRankLevel($id, "Gold Detective Professional");
        $this->Model->updateDetectiveRankColor($id, "Gold");

      }else if($db_points <= 12000){
        $this->Model->updateDetectiveRank($id, "Detective Professional");
        $this->Model->updateDetectiveRankLevel($id, "Hall of Fame Detective Professional");
        $this->Model->updateDetectiveRankColor($id, "Hall of Fame");

      }else if($db_points <= 13000){
        $this->Model->updateDetectiveRank($id, "Junior Detective");
        $this->Model->updateDetectiveRankLevel($id, "Bronze Junior Detective");
        $this->Model->updateDetectiveRankColor($id, "Bronze");

      }else if($db_points <= 14000){
        $this->Model->updateDetectiveRank($id, "Junior Detective");
        $this->Model->updateDetectiveRankLevel($id, "Silver Junior Detective");
        $this->Model->updateDetectiveRankColor($id, "Silver");

      }else if($db_points <= 16000){
        $this->Model->updateDetectiveRank($id, "Junior Detective");
        $this->Model->updateDetectiveRankLevel($id, "Gold Junior Detective");
        $this->Model->updateDetectiveRankColor($id, "Gold");

      }else if($db_points <= 20000){
        $this->Model->updateDetectiveRank($id, "Junior Detective");
        $this->Model->updateDetectiveRankLevel($id, "Hall of Fame Junior Detective");
        $this->Model->updateDetectiveRankColor($id, "Hall of Fame");

      }else if($db_points <= 21000){
        $this->Model->updateDetectiveRank($id, "Senior Detective");
        $this->Model->updateDetectiveRankLevel($id, "Bronze Senior Detective");
        $this->Model->updateDetectiveRankColor($id, "Bronze");

      }else if($db_points <= 22000){
        $this->Model->updateDetectiveRank($id, "Senior Detective");
        $this->Model->updateDetectiveRankLevel($id, "Silver Senior Detective");
        $this->Model->updateDetectiveRankColor($id, "Silver");

      }else if($db_points <= 24000){
        $this->Model->updateDetectiveRank($id, "Senior Detective");
        $this->Model->updateDetectiveRankLevel($id, "Gold Senior Detective");
        $this->Model->updateDetectiveRankColor($id, "Gold");

      }else if($db_points <= 30000){
        $this->Model->updateDetectiveRank($id, "Senior Detective");
        $this->Model->updateDetectiveRankLevel($id, "Hall of Fame Senior Detective");
        $this->Model->updateDetectiveRankColor($id, "Hall of Fame");

      }else if($db_points <= 35000){
        $this->Model->updateDetectiveRank($id, "Lead Chief Detective");
        $this->Model->updateDetectiveRankLevel($id, "Gold Lead Chief Detective");
        $this->Model->updateDetectiveRankColor($id, "Gold");

      }else if($db_points <= 40000){
        $this->Model->updateDetectiveRank($id, "Lead Chief Detective");
        $this->Model->updateDetectiveRankLevel($id, "Hall of Fame Lead Chief Detective");
        $this->Model->updateDetectiveRankColor($id, "Hall of Fame");

      }else if($db_points <= 50000){
        $this->Model->updateDetectiveRank($id, "Sherlock Holmes");
        $this->Model->updateDetectiveRankLevel($id, "Gold Sherlock Holmes");
        $this->Model->updateDetectiveRankColor($id, "Gold");

      }else if($db_points <= 70000){
        $this->Model->updateDetectiveRank($id, "Sherlock Holmes");
        $this->Model->updateDetectiveRankLevel($id, "Hall of Fame Sherlock Holmes");
        $this->Model->updateDetectiveRankColor($id, "Hall of Fame");

      }else if($db_points <= 100000){
        $this->Model->updateDetectiveRank($id, "Sherlock Holmes");
        $this->Model->updateDetectiveRankLevel($id, "Elite Sherlock Holmes");
        $this->Model->updateDetectiveRankColor($id, "Elite");
      }
    }

    // Super Activity

    public function super_points($id, $attempt){
      $sequel = $this->db->query("SELECT points FROM players WHERE id = '$id' ")->result();
      foreach($sequel as $sql){
        $db_points = $sql->points;
      }

      $points = 1000;
      $attempt_point = 100;
      $negative_attempt = 3;
      $negative_point = -50;
      $outcome = $this->input->post('special_outcome');

      if($attempt < 3 && $outcome == "Won"){
        $won_points = ($db_points + $points) + $attempt_point;
        $this->Model->updatePoints($id, $won_points);
      }else if($attempt > 3 && $outcome == "Won"){
        $loss_points = ($attempt - $negative_attempt) * $negative_point;
        $new_loss_points = ($db_points + $points) + $loss_points;
        $this->Model->updatePoints($id, $new_loss_points);
      }

      if($attempt < 3 && $outcome == "Lose"){
        $lose_points = $db_points + $attempt_point;
        $this->Model->updatePoints($id, $lose_points);
      }else if($attempt > 3 && $outcome == "Lose"){
        $loss_points = ($attempt - $negative_attempt) * $negative_point;
        $new_loss_points = $db_points + $loss_points;
        $this->Model->updatePoints($id, $new_loss_points);
      }

      if($db_points <= 100){
        $this->Model->updateDetectiveRank($id, "Detective Newbie");
        $this->Model->updateDetectiveRankLevel($id, "Bronze Detective Newbie");
        $this->Model->updateDetectiveRankColor($id, "Bronze");

      }else if($db_points <= 500){
        $this->Model->updateDetectiveRank($id, "Detective Newbie");
        $this->Model->updateDetectiveRankLevel($id, "Silver Detective Newbie");
        $this->Model->updateDetectiveRankColor($id, "Silver");

      }else if($db_points <= 1000){
        $this->Model->updateDetectiveRank($id, "Detective Newbie");
        $this->Model->updateDetectiveRankLevel($id, "Gold Detective Newbie");
        $this->Model->updateDetectiveRankColor($id, "Gold");

      }else if($db_points <= 2000){
        $this->Model->updateDetectiveRank($id, "Detective Newbie");
        $this->Model->updateDetectiveRankLevel($id, "Hall of Fame Detective Newbie");
        $this->Model->updateDetectiveRankColor($id, "Hall of Fame");

      }else if($db_points <= 2500){
        $this->Model->updateDetectiveRank($id, "Detective Assistant");
        $this->Model->updateDetectiveRankLevel($id, "Bronze Detective Assistant");
        $this->Model->updateDetectiveRankColor($id, "Bronze");

      }else if($db_points <= 3000){
        $this->Model->updateDetectiveRank($id, "Detective Assistant");
        $this->Model->updateDetectiveRankLevel($id, "Silver Detective Assistant");
        $this->Model->updateDetectiveRankColor($id, "Silver");

      }else if($db_points <= 4000){
        $this->Model->updateDetectiveRank($id, "Detective Assistant");
        $this->Model->updateDetectiveRankLevel($id, "Gold Detective Assistant");
        $this->Model->updateDetectiveRankColor($id, "Gold");

      }else if($db_points <= 6000){
        $this->Model->updateDetectiveRank($id, "Detective Assistant");
        $this->Model->updateDetectiveRankLevel($id, "Hall of Fame Detective Assistant");
        $this->Model->updateDetectiveRankColor($id, "Hall of Fame");

      }else if($db_points <= 6500){
        $this->Model->updateDetectiveRank($id, "Detective Professional");
        $this->Model->updateDetectiveRankLevel($id, "Bronze Detective Professional");
        $this->Model->updateDetectiveRankColor($id, "Bronze");

      }else if($db_points <= 8000){
        $this->Model->updateDetectiveRank($id, "Detective Professional");
        $this->Model->updateDetectiveRankLevel($id, "Silver Detective Professional");
        $this->Model->updateDetectiveRankColor($id, "Silver");

      }else if($db_points <= 10000){
        $this->Model->updateDetectiveRank($id, "Detective Professional");
        $this->Model->updateDetectiveRankLevel($id, "Gold Detective Professional");
        $this->Model->updateDetectiveRankColor($id, "Gold");

      }else if($db_points <= 12000){
        $this->Model->updateDetectiveRank($id, "Detective Professional");
        $this->Model->updateDetectiveRankLevel($id, "Hall of Fame Detective Professional");
        $this->Model->updateDetectiveRankColor($id, "Hall of Fame");

      }else if($db_points <= 13000){
        $this->Model->updateDetectiveRank($id, "Junior Detective");
        $this->Model->updateDetectiveRankLevel($id, "Bronze Junior Detective");
        $this->Model->updateDetectiveRankColor($id, "Bronze");

      }else if($db_points <= 14000){
        $this->Model->updateDetectiveRank($id, "Junior Detective");
        $this->Model->updateDetectiveRankLevel($id, "Silver Junior Detective");
        $this->Model->updateDetectiveRankColor($id, "Silver");

      }else if($db_points <= 16000){
        $this->Model->updateDetectiveRank($id, "Junior Detective");
        $this->Model->updateDetectiveRankLevel($id, "Gold Junior Detective");
        $this->Model->updateDetectiveRankColor($id, "Gold");

      }else if($db_points <= 20000){
        $this->Model->updateDetectiveRank($id, "Junior Detective");
        $this->Model->updateDetectiveRankLevel($id, "Hall of Fame Junior Detective");
        $this->Model->updateDetectiveRankColor($id, "Hall of Fame");

      }else if($db_points <= 21000){
        $this->Model->updateDetectiveRank($id, "Senior Detective");
        $this->Model->updateDetectiveRankLevel($id, "Bronze Senior Detective");
        $this->Model->updateDetectiveRankColor($id, "Bronze");

      }else if($db_points <= 22000){
        $this->Model->updateDetectiveRank($id, "Senior Detective");
        $this->Model->updateDetectiveRankLevel($id, "Silver Senior Detective");
        $this->Model->updateDetectiveRankColor($id, "Silver");

      }else if($db_points <= 24000){
        $this->Model->updateDetectiveRank($id, "Senior Detective");
        $this->Model->updateDetectiveRankLevel($id, "Gold Senior Detective");
        $this->Model->updateDetectiveRankColor($id, "Gold");

      }else if($db_points <= 30000){
        $this->Model->updateDetectiveRank($id, "Senior Detective");
        $this->Model->updateDetectiveRankLevel($id, "Hall of Fame Senior Detective");
        $this->Model->updateDetectiveRankColor($id, "Hall of Fame");

      }else if($db_points <= 35000){
        $this->Model->updateDetectiveRank($id, "Lead Chief Detective");
        $this->Model->updateDetectiveRankLevel($id, "Gold Lead Chief Detective");
        $this->Model->updateDetectiveRankColor($id, "Gold");

      }else if($db_points <= 40000){
        $this->Model->updateDetectiveRank($id, "Lead Chief Detective");
        $this->Model->updateDetectiveRankLevel($id, "Hall of Fame Lead Chief Detective");
        $this->Model->updateDetectiveRankColor($id, "Hall of Fame");

      }else if($db_points <= 50000){
        $this->Model->updateDetectiveRank($id, "Sherlock Holmes");
        $this->Model->updateDetectiveRankLevel($id, "Gold Sherlock Holmes");
        $this->Model->updateDetectiveRankColor($id, "Gold");

      }else if($db_points <= 70000){
        $this->Model->updateDetectiveRank($id, "Sherlock Holmes");
        $this->Model->updateDetectiveRankLevel($id, "Hall of Fame Sherlock Holmes");
        $this->Model->updateDetectiveRankColor($id, "Hall of Fame");

      }else if($db_points <= 100000){
        $this->Model->updateDetectiveRank($id, "Sherlock Holmes");
        $this->Model->updateDetectiveRankLevel($id, "Elite Sherlock Holmes");
        $this->Model->updateDetectiveRankColor($id, "Elite");
      }
    }

    public function add_player(){
      $this->load->view('menu');
      $this->load->view('add_player_profile');
      $this->load->view('footer');
    }

    public function insert_player(){
      /*$this->form_validation->set_rules("player_name", "Player Name", "trim|required|min_length[5]|max_length[100]");
      $this->form_validation->set_rules("rank", "Detective Rank", "trim|required|min_length[5]|max_length[100]");
      $this->form_validation->set_rules("rank_level", "Detective Rank Level", "trim|required|min_length[5]|max_length[100]");
      $this->form_validation->set_rules("gender", "Detective Gender", "trim|required|min_length[5]|max_length[100]");
      */
        $files = $_FILES;
        //$images = array();
        $cpt = count($_FILES['userFiles']['name']);
            for($i=0; $i<$cpt; $i++){
            $_FILES['userFiles']['name']= $files['userFiles']['name'][$i];
            $_FILES['userFiles']['type']= $files['userFiles']['type'][$i];
            $_FILES['userFiles']['tmp_name']= $files['userFiles']['tmp_name'][$i];
            $_FILES['userFiles']['error']= $files['userFiles']['error'][$i];
            $_FILES['userFiles']['size']= $files['userFiles']['size'][$i];

            $config = array(
                'upload_path'   => "./uploads/avatar/",
                'allowed_types' => "gif|jpg|png|jpeg",
                'overwrite'     => TRUE,
                'max_size'      => "3000",  // Can be set to particular file size
                //'max_height'    => "768",
                //'max_width'     => "1024"
            );

            $this->load->library('upload', $config);
            $this->upload->initialize($config);

            $this->upload->do_upload('userFiles');
            $fileName = $_FILES['userFiles']['name'];
            //$images[] = $fileName;
        }

        //$fileName = implode(',', $images);

        $player_name = $this->input->post('player_name');
        $rank = $this->input->post('rank');
        $rank_level = $this->input->post('rank_level');
        $rank_color = "Bronze";
        $points = 0;
        $gender = $this->input->post('gender');
        $type = $this->input->post('type');
        $date = date('Y-m-j H:i:s');

        $add_player_array = array(
          'player_name' => $player_name,
          'detective_rank' => $rank,
          'detective_rank_level' => $rank_level,
          'detective_rank_color' => $rank_color,
          'points' => $points,
          'gender' => $gender,
          'type' => $type,
          'avatar' => $fileName,
          'created_day' => $date
        );

        $add_player_data = $this->Model->insert_player_data($add_player_array);

        if($add_player_data){
          redirect('dashboard/leaderboard');
        }else{
          $msgError = '<div class="alert alert-danger>Upload Failed</div>';
          $this->session->set_flashdata('msgError', $msgError);
          $this->load->view('add_player_profile');
      }
    }

    // End of Player Profile
  }

?>
