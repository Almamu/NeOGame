<?php defined('BASEPATH') OR exit('No direct script access allowed');

class Planet extends CI_Model {

	public $id = NULL;

	function __construct(){
		parent::__construct();
	}

	function name($pid = NULL){
		if(empty($pid)){ $pid = $this->id; } // O Session.
		$query = $this->db->select('name')->where('id', $pid)->get('planet');
		if($query->num_rows() == 1){ return $query->row()->name; }
	}

	function owner($pid = NULL){
		if(empty($pid)){ $pid = $this->id; }
		$query = $this->db->select('userid')->where('id', $pid)->get('planet');
		if($query->num_rows() == 1){ return $query->row()->userid; }
	}

	function is_researching($pid = NULL){
		if(empty($pid)){ $pid = $this->id; }
		// $this->db->where

		return false;
	}

	function fullinfo($pid = NULL){
		if(empty($pid)){ $pid = $this->id; }
		// Nombre Planeta (+ Cantidad Recursos), Nombre jugador, ID Jugador, Escombros (+ Cantidad Recursos) Dirección, Alianza
		$query = $this->db->where('id', $pid)->get('planet');
		if($query->num_rows() != 1){ return array(); }
		
		// Basic Planet Info
		$planet = $query->row();

		$data = [
			"Planet" => [
				"ID" => $pid,
				"Name" => $planet->name,
				"Type" => $planet->type,
				"Skin" => $planet->skin,
				"Position" => [
					"Galaxy" => (int)$planet->galaxy,
					"System" => (int)$planet->system,
					"Planet" => (int)$planet->planet
				],
				"PositionRaw" => [(int)$planet->galaxy, (int)$planet->system, (int)$planet->planet],
				"Destroyed" => (bool)$planet->destroyed,
				"Points" => $planet->points
			]
		];

		$sel = [
			'Planet.Resources.*',
			'Planet.Temperature.*',
			// 'Planet.Buildings.*',
			// 'Planet.Facilities.*',
			// 'Planet.Research.*',
			// 'Planet.Defense.*',
			// 'Planet.Shipyard.*',
		]; 

		foreach($sel as $s){
			$data2 = $this->settings(
				array_keys($this->system->setting_id($s)
			), TRUE);

			$data = array_merge_recursive($data, $data2);
		}
		/* $sel = $this->system->setting_id($sel);
		$data2 = $this->settings(array_keys($sel), TRUE); */
		return $data;
	}

	// Change settings - only ONE value / query
	function setting($setting, $value = NULL, $insert = FALSE){
		$setting = $this->__parse_setting_str($setting);
		if(!is_numeric($setting)){ $setting = $this->system->setting_id($setting, 1); }
		if(!$insert){
			// GET
			$query = $this->db
				->where('settingid', $setting)
				->where('planetid', $this->id)
				->get('planet_settings');

			if($query->num_rows() == 1){ return $query->row()->value; }
			elseif($query->num_rows()>1){

			}
			else{ return FALSE; }

		}else{
			// SET
			if($this->setting($setting) === FALSE){
				// INSERT
				$data = ['settingid' => $setting, 'value' => $value, 'planetid' => $this->id];
				$this->db->insert('planet_settings', $data);

				return $this->db->insert_id();
			}else{
				// UPDATE
				return $this->db
					->set('value', $value)
					->where('settingid', $setting)
					->where('planetid', $this->id)
					->update();
			}
		}
	}

	// Get MULTIPLE IDs
	function settings($settings, $split = FALSE, $pid = NULL){
		if(empty($pid)){ $pid = $this->id; }
		// Luego ya veremos si hacemos update o que.
		if(!is_array($settings)){ $settings = [$settings]; }
		
		$data = array();

		foreach($settings as $setting){
			// Conservo la de texto y guardo la ID num.
			if(!is_numeric($setting)){ $lookup = $this->system->setting_id($setting); }
			else{ $lookup = $setting; }

			$query = $this->db
				->select('value')
				->where('settingid', $lookup)
				->where('planetid', $pid)
				->get('planet_settings');

			if($query->num_rows() == 1){
				if(!$split){ $data[$lookup] = $query->row()->value; }
				else{
					$exp = explode(".", $setting);
					$arr = '';

					for($i = 0; $i < count($exp); $i++){ $arr .= '[$exp[' .$i .']]'; }
					eval('$data' .$arr .' = ' .$query->row()->value .';');
				}
			}
		}

		return $data;
	}

	function last_update($change = FALSE){
		if($change === FALSE){
			$query = $this->db
				->select('last_update')
				->where('id', $this->id)
				->get('planet');
			if($query->num_rows() == 1){ return date("Y-m-d H:i:s", strtotime($query->row()->last_update)); }
			else{ return "0000-00-00"; }
		}else{
			if($change === TRUE){ $change = "now"; }
			return $this->db
				->set('last_update', date("Y-m-d H:i:s", strtotime($change)))
				->where('id', $this->id)
				->update('planet');
		}
	}

	function resources_parse(){
		// Diferencia de hora de last update y ahora.
		// Get System.Calculation.Resources EXCEPTO Max.
		$buildings = $this->system->get_buildings();
		foreach($buildings as $build){
			$s = $this->system->setting_id('System.Calculation.Buildings.');
		}
		/* foreach($this->system->setting_id('System.Calculation.') as $s => $v){
			// Por cada uno, identificar el material
			$f = $this->system->setting($s);
			var_dump($f);
			var_dump($this->functions->eval_parse($this->__eval_str_settings($f)));

		} */
	}

	function __eval_str_settings($str){
		$newstr = $str;
		$exp = explode("%", $str);
		for($i = 1; $i < count($exp); $i+=2){
			$sid = $this->system->setting_id($exp[$i]);
			if($this->system->setting_identify($exp[$i], "System.")){
				$data = $this->system->setting($exp[$i]);
			}elseif($this->system->setting_identify($exp[$i], "Planet.")){
				$data = $this->setting($exp[$i]);
			}
			$newstr = str_replace('%'.$exp[$i].'%', $data, $newstr);
		}

		return $newstr;
	}

	function __parse_setting_str($str){
		$sel = 'Planet.'; // Selector
		if(!is_numeric($str)){
			if(ucwords(strtolower(substr($str, 0, strlen($sel)))) != $sel){ $str = $sel.$str; }
		}
		return $str;
	}

}