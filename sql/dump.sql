CREATE TABLE `avii_desenvweb`.`user`(
	`user_id`	INT 			NOT NULL	AUTO_INCREMENT,
	`username`	VARCHAR(255)	NOT NULL,
	`password`	VARCHAR(255)	NOT NULL,
	
	PRIMARY KEY	(`user_id`)
);

CREATE TABLE `avii_desenvweb`.`deck`(
	`deck_id`	INT 			NOT NULL	AUTO_INCREMENT,
	`user_id`	INT 			NOT NULL,
	`title`		VARCHAR(255)	NOT NULL,
	
	PRIMARY KEY	(`deck_id`),
	FOREIGN KEY	(`user_id`)	REFERENCES	`avii_desenvweb`.`user`	(`user_id`)
);

CREATE TABLE `avii_desenvweb`.`card`(
	`card_id`			INT 			NOT NULL	AUTO_INCREMENT,

	`user_id`			INT 			NOT NULL,
	`deck_id`			INT 			NOT NULL,

	`front`				VARCHAR(255)	NOT NULL,
	`back`				VARCHAR(255)	NOT NULL,

	`repetition_count`	INT 			NOT NULL,
	`time_interval`		INT 			NOT NULL,
	`ease_factor`		REAL 			NOT NULL,
	
	PRIMARY KEY	(`card_id`),

	FOREIGN KEY	(`user_id`)	REFERENCES	`avii_desenvweb`.`user`	(`user_id`),
	FOREIGN KEY	(`deck_id`)	REFERENCES	`avii_desenvweb`.`deck`	(`deck_id`)
);

INSERT INTO
`avii_desenvweb`.`user`	(`username`,	`password`)
VALUES					("felipe",		"060193"),
						("lucas",		"081293"),
						("matheus",		"120400");
