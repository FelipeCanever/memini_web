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
