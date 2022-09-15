<?php
defined('BASEPATH') or exit('No direct script access allowed');


class UserCreateRequest
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
				'field' => 'first_name',
				'label' => 'Nombre',
				'rules' => 'required',
				'errors' => [
					'required' => 'El nombre es requerido.',
				],
			],
			[
				'field' => 'last_name',
				'label' => 'Apellido',
				'rules' => 'required',
				'errors' => [
					'required' => 'El apellido es requerido.',
				],
			],
			[
				'field' => 'email',
				'label' => 'Correo electrónico',
				'rules' => 'required|valid_email|is_unique[users.email]',
				'errors' => [
					'required' => 'El correo electrónico es requerido.',
					'valid_email' => 'El correo electrónico no es válido.',
					'is_unique' => 'El correo electrónico ya se encuentra registrado.',
				],
			],
			[
				'field' => 'password',
				'label' => 'Contraseña',
				'rules' => 'required|min_length[8]',
				'errors' => [
					'required' => 'La contraseña es requerida.',
					'min_length' => 'La contraseña debe tener una longitud mínima de 8 caracteres.',
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
