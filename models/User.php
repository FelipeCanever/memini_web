<?php

class User {
	private $user_id;
	private $username;

	public function __construct($user_id, $username) {
		$this->user_id = $user_id;
		$this->username = $username;
	}

	public function getUserId() {
		return $this->user_id;
	}

	public function getUsername() {
		return $this->username;
	}
}
