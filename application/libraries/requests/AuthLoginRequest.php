<?php
defined('BASEPATH') or exit('No direct script access allowed');


class AuthLoginRequest
{

	function __construct()
	{
		$this->ci =& get_instance();
		$this->ci->load->library('form_validation');
	}

	public function validate(array $data) : bool
	{

		$config = [
			[
				'field' => 'email',
				'label' => 'Correo electrónico',
				'rules' => 'required|valid_email',
				'errors' => [
					'required' => 'El correo electrónico es requerido.',
					'valid_email' => 'El correo electrónico no es válido.',
				],
			],
			[
				'field' => 'password',
				'label' => 'Contraseña',
				'rules' => 'required',
				'errors' => [
					'required' => 'La contraseña es requerida.',
				],
			],
		];


		$this->ci->form_validation->set_data($data);
		$this->ci->form_validation->set_rules($config);

		if($this->ci->form_validation->run() === TRUE)
			return true;

		return false;
	}

	public function getErrors() : array 
	{
		return $this->ci->form_validation->error_array();
	}

}
