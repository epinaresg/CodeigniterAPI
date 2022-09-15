<?php
defined('BASEPATH') or exit('No direct script access allowed');


class UserService
{

	function __construct()
	{
		$this->ci =& get_instance();
		$this->ci->load->model('UserModel');
	}
		
	public function create(array $data) : stdClass 
	{
		$this->ci->load->library('HashLibrary', null, 'HashLibrary');

		$data['password'] = $this->ci->HashLibrary->hashPassword($data['password']);

		return $this->ci->UserModel->create($data);
			
	}
		
	public function byId(string $id) : stdClass|null 
	{
		return $this->ci->UserModel->byId($id);	
	}

}
