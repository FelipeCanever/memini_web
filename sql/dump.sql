START TRANSACTION;

CREATE DATABASE `avii_desenvweb`;

-- Usuário
CREATE TABLE `avii_desenvweb`.`user`(
	`user_id`		INT 					NOT NULL	AUTO_INCREMENT,
	`username`	VARCHAR(255)	NOT NULL,
	`password`	VARCHAR(255)	NOT NULL,
	
	PRIMARY KEY	(`user_id`)
);

-- Baralho
CREATE TABLE `avii_desenvweb`.`deck`(
	`deck_id`			INT 					NOT NULL	AUTO_INCREMENT,
	`user_id`			INT 					NOT NULL,
	`title`				VARCHAR(255)	NOT NULL,
	`description`	VARCHAR(255)	NOT NULL	DEFAULT "",
	
	PRIMARY KEY	(`deck_id`),
	FOREIGN KEY	(`user_id`)	REFERENCES	`avii_desenvweb`.`user`	(`user_id`)
);

-- Carta
CREATE TABLE `avii_desenvweb`.`card`(
	`card_id`						INT 					NOT NULL	AUTO_INCREMENT,

	`user_id`						INT 					NOT NULL,
	`deck_id`						INT 					NOT NULL,

	`front`							VARCHAR(255)	NOT NULL,
	`back`							VARCHAR(255)	NOT NULL,

	`repetition_count`	INT 					NOT NULL	DEFAULT 0,
	`time_interval`			INT 					NOT NULL	DEFAULT 0,
	`ease_factor`				REAL 					NOT NULL	DEFAULT 2.5,
	
	PRIMARY KEY	(`card_id`),

	FOREIGN KEY	(`user_id`)	REFERENCES	`avii_desenvweb`.`user`	(`user_id`),
	FOREIGN KEY	(`deck_id`)	REFERENCES	`avii_desenvweb`.`deck`	(`deck_id`) ON DELETE CASCADE
);

-- Usuários
INSERT INTO
`avii_desenvweb`.`user`	(`username`,	`password`)
VALUES									("felipe",		"060193"),
												("lucas",			"081293"),
												("matheus",		"120400");

-- Baralhos
INSERT INTO
`avii_desenvweb`.`deck`	(`user_id`,	`title`,							`description`)
												-- felipe
VALUES									(1,					"Latim",							"Palavras em latim."),
												(1,					"Francês",						"Palavras em francês."),
												(1,					"Nomes científicos",	""),
												-- lucas
												(2,					"Inglês",							"Palavras em inglês."),
												(2,					"Tabela periódica",		"Elementos da tabela periódica."),
												-- matheus
												(3,					"C++",								"");

-- Cartas
INSERT INTO
`avii_desenvweb`.`card`	(`user_id`,	`deck_id`,	`front`,							`back`)
												-- felipe
												-- Latim
VALUES									(1,					1,					"domus",							"casa"),
												(1,					1,					"familia",						"família"),
												(1,					1,					"vir",								"homem"),
												(1,					1,					"fēmina",							"mulher"),
												(1,					1,					"puer",								"menino"),
												(1,					1,					"puella",							"menina"),
												(1,					1,					"īnfāns",							"bebê"),
												(1,					1,					"canis",							"cachorro"),
												(1,					1,					"fēlēs",							"gato"),
												(1,					1,					"avis",								"passarinho"),
												-- Francês
												(1,					2,					"maison",							"casa"),
												(1,					2,					"famille",						"família"),
												(1,					2,					"homme",							"homem"),
												(1,					2,					"femme",							"mulher"),
												(1,					2,					"garçon",							"menino"),
												(1,					2,					"fille",							"menina"),
												(1,					2,					"bébé",								"bebê"),
												(1,					2,					"chien",							"cachorro"),
												(1,					2,					"chat",								"gato"),
												-- Nomes científicos
												(1,					3,					"ser humano",					"Homo sapiens"),
												(1,					3,					"chimpanzé",					"Pan troglodytes"),
												(1,					3,					"cachorro",						"Canis familiaris"),
												(1,					3,					"gato",								"Felis cattus"),
												(1,					3,					"pardal",							"Passer domesticus"),
												(1,					3,					"barata",							"Periplaneta americana"),
												(1,					3,					"laranjeira",					"Citrus × sinensis"),
												(1,					3,					"champignon",					"Agaricus bisporus"),

												-- lucas
												-- Inglês
												(2,					4,					"house",							"casa"),
												(2,					4,					"family",							"família"),
												(2,					4,					"man",								"homem"),
												(2,					4,					"woman",							"mulher"),
												(2,					4,					"boy",								"menino"),
												(2,					4,					"girl",								"menina"),
												(2,					4,					"baby",								"bebê"),
												-- Tabela periódica
												(2,					5,					"H",									"hidrogênio"),
												(2,					5,					"He",									"hélio"),
												(2,					5,					"Li",									"lítio"),
												(2,					5,					"Be",									"berílio"),
												(2,					5,					"B",									"boro"),
												(2,					5,					"C",									"carbono"),

												-- matheus
												-- C++
												(3,					6,					"função principal",		"int main()"),
												(3,					6,					"incluir biblioteca",	"#include <...>"),
												(3,					6,					"biblioteca de E/S",	"iostream"),
												(3,					6,					"saída",							"std::cout << ...;"),
												(3,					6,					"entrada",						"std::cin >> ...;");

COMMIT;
