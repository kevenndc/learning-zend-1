CREATE SCHEMA IF NOT EXISTS zend_start DEFAULT CHARACTER SET utf8;
USE zend_start;

CREATE TABLE IF NOT EXISTS zend_start.persons (
    id BIGINT UNSIGNED NOT NULL AUTO_INCREMENT,
    name VARCHAR(80) NOT NULL,
    email VARCHAR(60) NOT NULL,
    phone VARCHAR(15) NOT NULL,
    cpf VARCHAR(11) NOT NULL UNIQUE,
    PRIMARY KEY (id),
    INDEX pk_persons_id_idx (id ASC)
) ENGINE = InnoDB;

CREATE TABLE IF NOT EXISTS zend_start.addresses (
    id BIGINT UNSIGNED NOT NULL AUTO_INCREMENT,
    person_id BIGINT UNSIGNED NOT NULL,
    city VARCHAR(50) NULL,
    state CHAR(2) NULL,
    street VARCHAR(80) NULL,
    house_number INT(6) NULL,
    postal_code VARCHAR(8) NULL,
    complement VARCHAR(30) NULL,
    PRIMARY KEY (id),
    INDEX pk_address_id_idx (id ASC),
    CONSTRAINT fk_persons_addresses
        FOREIGN KEY (person_id)
            REFERENCES zend_start.persons (id)
            ON DELETE CASCADE
) ENGINE = InnoDB;

CREATE TABLE IF NOT EXISTS zend_start.employees (
    person_id BIGINT UNSIGNED NOT NULL,
    address_id BIGINT UNSIGNED NULL,
    position VARCHAR(60) NOT NULL,
    PRIMARY KEY (person_id),
    INDEX pfk_employees_id_idx (person_id ASC),
    CONSTRAINT fk_persons_employees
        FOREIGN KEY (person_id)
            REFERENCES zend_start.persons (id)
            ON DELETE CASCADE
            ON UPDATE CASCADE,
    CONSTRAINT fk_addresses_employees
        FOREIGN KEY (address_id)
            REFERENCES zend_start.addresses (id)
            ON DELETE SET NULL
) ENGINE = InnoDB;

CREATE TABLE IF NOT EXISTS zend_start.students (
    code BIGINT UNSIGNED NOT NULL AUTO_INCREMENT,
    person_id BIGINT UNSIGNED NOT NULL,
    address_id BIGINT UNSIGNED NULL,
    gender ENUM('male', 'female', 'other', 'undefined') NOT NULL DEFAULT 'undefined',
    birthdate DATE NULL,
    payment_day INT(2) NULL,
    status ENUM('active', 'inactive') NOT NULL DEFAULT 'inactive',
    note TEXT NULL,
    PRIMARY KEY (code),
    INDEX pfk_student_code_idx (code ASC),
    CONSTRAINT fk_persons_students
        FOREIGN KEY (person_id)
            REFERENCES zend_start.persons (id)
            ON DELETE CASCADE
            ON UPDATE CASCADE,
    CONSTRAINT fk_addresses_students
        FOREIGN KEY (address_id)
            REFERENCES zend_start.addresses (id)
            ON DELETE SET NULL
) ENGINE = InnoDB;

CREATE TABLE IF NOT EXISTS zend_start.payments (
    id BIGINT UNSIGNED NOT NULL AUTO_INCREMENT,
    student_code BIGINT UNSIGNED NULL,
    issue_date DATETIME NOT NULL,
    payment_date DATETIME NULL,
    description VARCHAR(50) NULL,
    status ENUM('paid', 'issued', 'late') DEFAULT 'issued',
    PRIMARY KEY (id),
    INDEX fk_student_code_idx (student_code ASC),
    CONSTRAINT fk_students
        FOREIGN KEY (student_code)
            REFERENCES zend_start.students (code)
            ON DELETE SET NULL
) ENGINE = InnoDB;

CREATE TABLE IF NOT EXISTS zend_start.users (
    employee_id BIGINT UNSIGNED NOT NULL,
    username VARCHAR(20) NOT NULL,
    password VARCHAR(255) NOT NULL,
    INDEX fk_employee_id_idx (employee_id ASC),
    CONSTRAINT fk_employees
        FOREIGN KEY (employee_id)
            REFERENCES zend_start.employees (person_id)
            ON DELETE CASCADE
) ENGINE = InnoDB;

USE zend_start;

ALTER TABLE zend_start.students AUTO_INCREMENT=1000;