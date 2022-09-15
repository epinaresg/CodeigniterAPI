<?php
defined('BASEPATH') or exit('No direct script access allowed');

require_once(APPPATH.'controllers/BaseController.php');

class Auth extends BaseController
{
	
    public function login_post() : void
    {	

		try {

			$this->load->library('requests/AuthLoginRequest', null, 'AuthLoginRequest');
			$this->load->library('resources/AuthLoginResource', null, 'AuthLoginResource');
			$this->load->library('services/AuthService', null, 'AuthService');
			$this->load->library('services/UserService', null, 'UserService');
			

			$data = $this->getData();

			if (!$this->AuthLoginRequest->validate($data))
				$this->response([
					'message' => 'Los datos ingresados no son correctos',
					'errors' => $this->AuthLoginRequest->getErrors(),
				], 422);
			
			$user = $this->AuthService->login($data['email'], $data['password']);
			if (!$user)
				throw new Exception("Las credenciales ingresadas no son validas.", 401);

			$this->response($this->AuthLoginResource->getFormatResponse($user), 200);

		} catch (\Exception $e) {

			$message = $e->getMessage();
			$statusCode = $e->getCode();

			$this->response([
				'message' => $message
			], $statusCode < 200 ? 500 : $statusCode);

		}

    }

	
	
}
