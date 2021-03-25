<?php

class Card {
	private int $card_id;

	private string $front;
	private string $back;

	public function __construct(string $front, string $back, int $card_id = 0) {
		$this->card_id = $card_id;
		$this->front = $front;
		$this->back = $back;
	}

	public function getCardId(): int {
		return $this->card_id;
	}

	public function getFront(): string {
		return $this->front;
	}

	public function getBack(): string {
		return $this->back;
	}
}
