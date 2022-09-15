<?php
defined('BASEPATH') or exit('No direct script access allowed');


class UserActivityService
{

	function __construct()
	{
		$this->ci =& get_instance();
		$this->ci->load->model('UserActivityModel');
	}
		
	public function getAllByUserId(string $userId) : array 
	{
		return $this->ci->UserActivityModel->getAllByUserId($userId);
			
	}
}
