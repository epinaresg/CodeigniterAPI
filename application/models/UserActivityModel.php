<?php 
defined('BASEPATH') or exit('No direct script access allowed');

class UserActivityModel extends CI_Model {
	
	public function getAllByUserId(string $userId) : array 
	{
		return $this->db->where('uid', $userId)->get('user_activities')->result();
	}
}
