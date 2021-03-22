<?php

class Deck {
	private $deck_id;
	private $title;

	public function __construct($deck_id, $title) {
		$this->deck_id = $deck_id;
		$this->title = $title;
	}

	public function getDeckId() {
		return $this->deck_id;
	}

	public function getTitle() {
		return $this->title;
	}
}
