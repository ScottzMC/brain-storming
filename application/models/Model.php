<?php

  class Model extends CI_Model{

    // Login

    function validate($email, $password){
	    	$escape_email = $this->db->escape_str($email);
	      	$escape_password = $this->db->escape_str($password);

	  	  	$this->db->where('email', $escape_email);
	  		//$this->db->where('password', $escape_password);
	      	$query = $this->db->get('users');

	      	if($query->num_rows() > 0){
	        	$result = $query->row_array();
	        	if($this->bcrypt->check_password($escape_password, $result['password'])){
	  		    	return $query->result();
	        	}else{
	          		return array();
	        	}
	      	}else{
	        	return NULL;
	      	}
    	}

    // End of Login

    // Register

    function insert_user($data){
      $escape_data = $this->db->escape_str($data);
      $query = $this->db->insert('users', $escape_data);
      return $query;
    }

    // End of Register

    // Leaderboard

    function record_leaderboard_count() {
       return $this->db->count_all("players");
   }

   function fetch_leaderboard_data($limit, $start){
     $this->db->order_by('points', 'DESC');
      //$this->db->limit(10);
      $query = $this->db->query("SELECT players.id, players.player_name, players.detective_rank, players.detective_rank_level, players.detective_rank_color,
        players.type, players.points, players.avatar, colors.color, colors.color_code FROM players INNER JOIN colors ON players.detective_rank_color
         = colors.color ORDER BY players.points DESC LIMIT $limit");

      if ($query->num_rows() > 0) {
          foreach ($query->result() as $row) {
              $data[] = $row;
          }
          return $data;
      }
      return false;
 }

    // End of Leaderboard

    // Ranking

    function record_ranking_count() {
       return $this->db->count_all("ranking");
   }

   function fetch_ranking_data($limit, $start){
     //$this->db->order_by('rank_points', 'ASC');
      $this->db->limit($limit, $start);
      $query = $this->db->query("SELECT ranking.id, ranking.rank_type, ranking.rank_level, ranking.rank_points, colors.color, colors.color_code FROM ranking INNER JOIN colors ON ranking.rank_color = colors.color");

      if ($query->num_rows() > 0) {
          foreach ($query->result() as $row) {
              $data[] = $row;
          }
          return $data;
      }
      return false;
  }

    // End of Ranking

    // Player Profile

    function fetch_profile_user($id){
      $this->db->where('id', $id);
      $query = $this->db->get('players');
      return $query->result();
    }

    function insert_player_data($data){
      $query = $this->db->insert('players', $data);
      return $query;
    }

    function updatePoints($id, $player_points){
      $query = $this->db->query("UPDATE players SET points = '$player_points' WHERE id = '$id' ");
      return $query;
    }

    function updateDetectiveRank($id, $rank){
      $query = $this->db->query("UPDATE players SET detective_rank = '$rank' WHERE id = '$id' ");
      return $query;
    }

    function updateDetectiveRankLevel($id, $rank_level){
      $query = $this->db->query("UPDATE players SET detective_rank_level = '$rank_level' WHERE id = '$id' ");
      return $query;
    }

    function updateDetectiveRankColor($id, $rank_color){
      $query = $this->db->query("UPDATE players SET detective_rank_color = '$rank_color' WHERE id = '$id' ");
      return $query;
    }

    // End of Player Profile

  }


?>
