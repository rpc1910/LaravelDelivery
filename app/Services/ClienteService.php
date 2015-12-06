<?php

namespace LaravelDelivery\Services;

use LaravelDelivery\Repositories\ClienteRepository;
use LaravelDelivery\Repositories\UserRepository;

class ClienteService {

	private $clienteRepository;
	private $userRepository;

	public function __construct(ClienteRepository $clienteRepository, UserRepository $userRepository) {
		$this->clienteRepository = $clienteRepository;
		$this->userRepository = $userRepository;
	}

	public function create(array $data) {
		$data['usuario']['password'] = bcrypt('123456');
		$user = $this->userRepository->create($data['usuario']);
		$data['user_id'] = $user->id;
		$this->clienteRepository->create($data);
	}


	public function update(array $data, $id) {
		$this->clienteRepository->update($data, $id);
		$user_id = $this->clienteRepository->find($id, ['user_id'])->user_id;

		// dd($data['usuario']);
		$this->userRepository->update($data['usuario'], $user_id);
	}
}