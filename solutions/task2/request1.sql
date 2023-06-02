# # Использую базу данных MySql

CREATE TABLE phpInterview.goods (
id INT auto_increment NOT NULL,
name VARCHAR(100) NOT NULL,
PRIMARY KEY (id)
)
ENGINE=InnoDB
DEFAULT CHARSET=utf8mb4
COLLATE=utf8mb4_0900_ai_ci;

CREATE TABLE phpInterview.tags
(
    id INT auto_increment NOT NULL,
    name varchar(100) NOT NULL,
    PRIMARY KEY (id)
)
    ENGINE = InnoDB
    DEFAULT CHARSET = utf8mb4
    COLLATE = utf8mb4_0900_ai_ci;

CREATE TABLE phpInterview.goods_tags
(
    id INT auto_increment NOT NULL,
    tag_id INT,
    goods_id INT,
    PRIMARY KEY (id),
    UNIQUE KEY (tag_id, goods_id),
    FOREIGN KEY (goods_id) REFERENCES phpInterview.goods (id),
    FOREIGN KEY (tag_id) REFERENCES phpInterview.tags (id)
)
    ENGINE = InnoDB
    DEFAULT CHARSET = utf8mb4
    COLLATE = utf8mb4_0900_ai_ci;

INSERT INTO phpInterview.goods
    (name)
VALUES ('phone');

INSERT INTO phpInterview.goods
(name)
VALUES ('laptop');

INSERT INTO phpInterview.goods
(name)
VALUES ('car');

INSERT INTO phpInterview.tags
(name)
VALUES('tag1');

INSERT INTO phpInterview.tags
(name)
VALUES('tag2');

INSERT INTO phpInterview.goods_tags
(tag_id, goods_id)
VALUES(1, 2);

INSERT INTO phpInterview.goods_tags
(tag_id, goods_id)
VALUES(2, 3);


SELECT id, name
FROM phpInterview.goods
WHERE id IN (SELECT goods_id FROM phpInterview.goods_tags);