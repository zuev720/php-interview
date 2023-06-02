# # Использую базу данных MySql


CREATE TABLE phpInterview.evaluations
(
    respondent_id INT,
    department_id INT,
    gender        BOOL,
    value         INT,
    PRIMARY KEY (respondent_id),
    UNIQUE KEY (respondent_id, department_id)
)
    ENGINE = InnoDB
    DEFAULT CHARSET = utf8mb4
    COLLATE = utf8mb4_0900_ai_ci;

INSERT INTO phpInterview.evaluations
(respondent_id, department_id, gender, value)
VALUES(1, 1, 0, 3);

INSERT INTO phpInterview.evaluations
(respondent_id, department_id, gender, value)
VALUES(2, 1, 1, 6);

INSERT INTO phpInterview.evaluations
(respondent_id, department_id, gender, value)
VALUES(3, 2, 0, 7);

INSERT INTO phpInterview.evaluations
(respondent_id, department_id, gender, value)
VALUES(4, 3, 1, 4);

INSERT INTO phpInterview.evaluations
(respondent_id, department_id, gender, value)
VALUES(5, 4, 1, 7);

SELECT department_id
FROM phpInterview.evaluations
WHERE gender = 1
  AND value > 5;