# PHP WordPress Engineer  Technical challenge



## Getting started
## Documentations for the API's
https://documenter.getpostman.com/view/14955059/2sA2rB1P5u

##  Database Tables

CREATE TABLE staff (
    staff_id INT AUTO_INCREMENT PRIMARY KEY,
    staff_name VARCHAR(100) NOT NULL,
    staff_email VARCHAR(100) NOT NULL
);


CREATE TABLE form (
    form_id INT AUTO_INCREMENT PRIMARY KEY,
    form_name VARCHAR(100) NOT NULL
);

CREATE TABLE form_entries (
    id INT AUTO_INCREMENT PRIMARY KEY,
    staff_name VARCHAR(255) NOT NULL,
    staff_email VARCHAR(255) NOT NULL,
    form_name VARCHAR(255) NOT NULL,
    name VARCHAR(255) NOT NULL,
    nin VARCHAR(20) NOT NULL,
    email VARCHAR(255) NOT NULL,
    address VARCHAR(255) NOT NULL,
    submission_date TIMESTAMP DEFAULT CURRENT_TIMESTAMP
);
