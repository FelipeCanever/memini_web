CREATE DATABASE `avii_desenvweb`;

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

	`repetition_count`	INT 			NOT NULL	DEFAULT 0,
	`time_interval`		INT 			NOT NULL	DEFAULT 0,
	`ease_factor`		REAL 			NOT NULL	DEFAULT 2.5,
	
	PRIMARY KEY	(`card_id`),

	FOREIGN KEY	(`user_id`)	REFERENCES	`avii_desenvweb`.`user`	(`user_id`),
	FOREIGN KEY	(`deck_id`)	REFERENCES	`avii_desenvweb`.`deck`	(`deck_id`)
);

INSERT INTO
`avii_desenvweb`.`user`	(`username`,	`password`)
VALUES					("felipe",		"060193"),
						("lucas",		"081293"),
						("matheus",		"120400");

INSERT INTO
`avii_desenvweb`.`deck`	(`user_id`,	`title`)

VALUES					(1,			"Latim"),
						(1,			"Francês"),
						(1,			"Nomes científicos"),

						(2,			"Inglês"),
						(2,			"Tabela periódica"),

						(3,			"C++");

INSERT INTO
`avii_desenvweb`.`card`	(`user_id`,	`deck_id`,	`front`,	`back`)

VALUES					(1,			1,			"casa",			"domus"),
						(1,			1,			"família",		"familia"),
						(1,			1,			"homem",		"vir"),
						(1,			1,			"mulher",		"fēmina"),
						(1,			1,			"menino",		"puer"),
						(1,			1,			"menina",		"puella"),
						(1,			1,			"bebê",			"īnfāns"),
						(1,			1,			"cachorro",		"canis"),
						(1,			1,			"gato",			"fēlēs"),
						(1,			1,			"passarinho",	"avis"),

						(1,			2,			"casa",		"maison"),
						(1,			2,			"família",	"famille"),
						(1,			2,			"homem",	"homme"),
						(1,			2,			"mulher",	"femme"),
						(1,			2,			"menino",	"garçon"),
						(1,			2,			"menina",	"fille"),
						(1,			2,			"bebê",		"bébé"),
						(1,			2,			"cachorro",	"chien"),
						(1,			2,			"gato",		"chat"),

						(1,			3,			"ser humano",	"Homo sapiens"),
						(1,			3,			"chimpanzé",	"Pan troglodytes"),
						(1,			3,			"cachorro",		"Canis familiaris"),
						(1,			3,			"gato",			"Felis cattus"),
						(1,			3,			"pardal",		"Passer domesticus"),
						(1,			3,			"barata",		"Periplaneta americana"),
						(1,			3,			"laranjeira",	"Citrus × sinensis"),
						(1,			3,			"champignon",	"Agaricus bisporus"),

						(2,			4,			"casa",		"house"),
						(2,			4,			"família",	"family"),
						(2,			4,			"homem",	"man"),
						(2,			4,			"mulher",	"woman"),
						(2,			4,			"menino",	"boy"),
						(2,			4,			"menina",	"girl"),
						(2,			4,			"bebê",		"baby"),

						(2,			5,			"hidrogênio",	"H"),
						(2,			5,			"hélio",		"He"),
						(2,			5,			"lítio",		"Li"),
						(2,			5,			"berílio",		"Be"),
						(2,			5,			"boro",			"B"),
						(2,			5,			"carbono",		"C"),

						(3,			6,			"função principal",		"int main()"),
						(3,			6,			"incluir biblioteca",	"#include <...>"),
						(3,			6,			"biblioteca de E/S",	"iostream"),
						(3,			6,			"saída",				"std::cout << ...;"),
						(3,			6,			"entrada",				"std::cin >> ...;");
