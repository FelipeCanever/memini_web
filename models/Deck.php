<?php

class Deck {
	private int $deck_id;
	
	private string $title;
	private string $description;

	public function __construct(string $title, string $description, int $deck_id = 0) {
		$this->deck_id = $deck_id;
		$this->title = $title;
		$this->description = $description;
	}

	public function getDeckId(): int {
		return $this->deck_id;
	}

	public function getTitle(): string {
		return $this->title;
	}

	public function setTitle($title): void {
		$this->title = $title;
	}

	public function getDescription(): string {
		return $this->description;
	}

	public function setDescription($description): void {
		$this->$description = $description;
	}
}
