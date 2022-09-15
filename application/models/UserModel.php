<?php 
defined('BASEPATH') or exit('No direct script access allowed');

class UserModel extends CI_Model {
	
	public function create(array $data) : stdClass 
	{
		$this->db->insert(
			'users', 
			[
				'first_name' => $data['first_name'],
				'last_name' => $data['last_name'],
				'email' => $data['email'],
				'password' => $data['password'],
			]
		);
		
		return $this->byId($this->db->insert_id());
	}

	public function byId(string $id) : stdClass|null 
	{
		return $this->db->where('id', $id)->get('users')->row();

	}

	public function byEmail(string $email) : stdClass|null 
	{
		return $this->db->where('email', $email)->get('users')->row();

	}

}
