<?php defined('BASEPATH') OR exit('No direct script access allowed');

class System extends CI_Model {

	function __construct(){
		parent::__construct();
	}

	function log($uid, $action, $extra = NULL){
		$data = [
			'uid' => $uid,
			'action' => $action,
			'data' => $extra,
			'time' => date("Y-m-d H:i:s"),
			'ip' => $_SERVER['REMOTE_ADDR'],
		];

		$this->db->insert('log', $data);
		return $this->db->insert_id();
	}

	function userid($find){
		$query = $this->db
			->where('id', $find)
			->or_where('user', $find)
			->or_where('email', $find)
			->limit(1)
			->get('user');

		if($query->num_rows() == 1){ return $query->row()->id; }
		return NULL;
	}

	// function load_section($section, )
	function get_buildings(){
		$query = $this->db
			->where('category', 'Buildings')
			->get('game_elements');
		if($query->num_rows()>0){
			foreach($query->result_array() as $b){ $buildings[$b['id']] = $b; }
			return $buildings;
			// return $query->result_array();
		}
	}

	function setting($setting, $value = NULL, $insert = FALSE){
		if(!is_numeric($setting)){ $setting = $this->setting_id($setting, 1); }
		if(!$insert){
			// GET
			$query = $this->db->where('id', $setting)->get('settings');

			if($query->num_rows() == 1){ return $query->row()->value; }
			else{ return FALSE; }

		}else{
			/*// SET
			if($this->setting($setting) === FALSE){
				// INSERT
				$data = ['sid' => $setting, 'value' => $value, 'planetid' => $this->id];
				$this->db->insert('planet_settings', $data);

				return $this->db->insert_id();
			}else{
				// UPDATE
				return $this->db
					->set('value', $value)
					->where('sid', $setting)
					->where('planetid', $this->id)
					->update();
			}*/
		}
	}

	function setting_default($str, $planet = NULL){
		$str = str_replace("*", "%", $str); // Para consulta MySQL
		$query = $this->db
			->like('name', $str);

		// Planet.Resources.Crystal.Amount
	}

	/* function setting_namelike($str){
		$str = str_replace("*", "%", $str); // Para consulta MySQL
		if(substr($str, -1) != "%"){ $str .= "%"; }

		$query = $this->db->like('name', $str)->get('settings');
		if($query->num_rows()>0){
			return array_column()
		}
	} */

	function setting_id($str, $limit = FALSE){
		// Si tiene Asterisco, LIKE
		// Si no, WHERE
		// Pero no reemplazar en un LIKE * con el % porque no va!!

		// $str = str_replace("*", "%", $str);

		// var_dump($str);

		if(is_numeric($str)){ $this->db->where('id', $str); }
		else{
			if(strpos($str, "*") !== FALSE){
				$str = str_replace("*", "", $str);
				$this->db->like('name', $str);
			}else{
				$this->db->where('name', $str);
			}
		}

		// $this->db->like('name', $str)->or_like('id', $str);
		if($limit !== FALSE){ $this->db->limit($limit); }

		$query = $this->db->get('settings');

		if($query->num_rows() == 1){
			return $query->row()->id;
		}elseif($query->num_rows() > 1){
			return array_column($query->result_array(), 'id', 'name');
		}
		return FALSE;
	}

	function setting_identify($str, $comp = "System."){
		return ( ucwords(strtolower(substr($str, 0, strlen($comp)))) == $comp );
	}

	function eval_parse($str){

	}

}