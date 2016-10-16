<?php defined('BASEPATH') OR exit('No direct script access allowed');

class User extends CI_Model {

	function __construct(){
		parent::__construct();
	}

	// Use Password Hash PHP >= 5.5
	function password($p){ return password_hash($p, PASSWORD_DEFAULT); }
	function password_check($p, $uid){
	// Damos por hecho que el user existe.
		$query = $this->db
			->select('password')
			->where('id', $uid)
			->get('user');

		if($query->num_rows() == 1){
			$result = password_verify($p, $query->row()->password);
			if(!$result){
				$this->failed_attempt($uid);
			}
		}
	}

	function failed_attempt($uid, $ip = NULL){
		if(empty($ip)){ $ip = $_SERVER['REMOTE_ADDR']; }
		$this->system->log($uid, 'Failed Login');
		return $this->db
			->set('failed_attempts', 'failed_attempts + 1', FALSE)
			->where('id', $uid)
			->update('user');
	}

}