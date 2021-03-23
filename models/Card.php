<?php

class Card {
	private $card_id;

	private $front;
	private $back;

	public function __construct($card_id, $front, $back) {
		$this->card_id = $card_id;
		$this->front = $front;
		$this->back = $back;
	}

	public function getCardId() {
		return $this->card_id;
	}

	public function getFront() {
		return $this->front;
	}

	public function getBack() {
		return $this->back;
	}
}
