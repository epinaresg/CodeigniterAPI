<?php
defined('BASEPATH') or exit('No direct script access allowed');


class AuthService
{

	function __construct()
	{
		$this->ci =& get_instance();
		$this->ci->load->model('UserModel');
		$this->ci->load->library('HashLibrary', null, 'HashLibrary');
	}


	public function login(string $email, string $password) : stdClass|null
	{
		$user = $this->ci->UserModel->byEmail($email);

		if ($user)
			if ($this->ci->HashLibrary->checkHashPassword($password, $user->password))
				return $user;
			
		return null;
	}

}
