<?php

class Card {
	private int $card_id;
	private int $deck_id;

	private string $front;
	private string $back;

	public function __construct(string $front, string $back, int $deck_id = 0, int $card_id = 0) {
		$this->card_id = $card_id;
		$this->deck_id = $deck_id;
		$this->front = $front;
		$this->back = $back;
	}

	public function getCardId(): int {
		return $this->card_id;
	}

	public function getDeckId(): int {
		return $this->deck_id;
	}

	public function getFront(): string {
		return $this->front;
	}

	public function setFront($front): void {
		$this->front = $front;
	}

	public function getBack(): string {
		return $this->back;
	}

	public function setBack($back): void {
		$this->back = $back;
	}
}
