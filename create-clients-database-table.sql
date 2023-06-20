CREATE DATABASE IF NOT EXISTS clients_database;

CREATE TABLE IF NOT EXISTS clients_database.clients
(
    first_name      VARCHAR(64)  NOT NULL,
    last_name       VARCHAR(64)  NOT NULL,
    email           VARCHAR(256) NOT NULL,
    company_name    VARCHAR(256),
    position        VARCHAR(256),
    phone_number_1  VARCHAR(256),
    phone_number_2  VARCHAR(256),
    phone_number_3  VARCHAR(256),
    PRIMARY KEY (email)
);
