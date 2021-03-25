<?php

class User {
	private int $user_id;
	private string $username;
	private string $password;

	public function __construct(string $username, string $password, int $user_id = 0) {
		$this->user_id = $user_id;
		$this->username = $username;
		$this->password = $password;
	}

	public function getUserId(): int {
		return $this->user_id;
	}

	public function getUsername(): string {
		return $this->username;
	}

	public function getPassword(): string {
		return $this->password;
	}
}
