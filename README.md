# PHP WordPress Engineer  Technical challenge



## Getting started
https://documenter.getpostman.com/view/14955059/2sA2rAzhtq



## Engineers table
CREATE TABLE Engineers (
  id INT AUTO_INCREMENT PRIMARY KEY,
  name VARCHAR(255),
  role ENUM('engineer', 'pm')
);

## Projects table 
CREATE TABLE Projects (
  id INT AUTO_INCREMENT PRIMARY KEY,
  name VARCHAR(255),
  status ENUM('awaiting-start', 'in-progress', 'on-hold', 'completed'),
  engineer_id INT,
  FOREIGN KEY (engineer_id) REFERENCES Engineers(id)
);

## Milestones table
CREATE TABLE Milestones (
  id INT AUTO_INCREMENT PRIMARY KEY,
  project_id INT,
  name VARCHAR(255),
  FOREIGN KEY (project_id) REFERENCES Projects(id)
);