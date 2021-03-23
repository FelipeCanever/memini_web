<?php

class Deck {
	private $deck_id;
	
	private $title;
	private $description;

	public function __construct($deck_id, $title, $description) {
		$this->deck_id = $deck_id;
		$this->title = $title;
		$this->description = $description;
	}

	public function getDeckId() {
		return $this->deck_id;
	}

	public function getTitle() {
		return $this->title;
	}

	public function getDescription() {
		return $this->description;
	}
}
