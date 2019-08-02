DROP DATABASE reporting;

CREATE DATABASE reporting;

USE reporting;

CREATE TABLE account (
  id INT UNSIGNED NOT NULL AUTO_INCREMENT,
  username VARCHAR(50),
  password VARCHAR(50),
  type VARCHAR(30) NOT NULL DEFAULT 'member',
  is_leader TINYINT(1) NOT NULL DEFAULT 0,
  head_cluster_area VARCHAR(30) DEFAULT NULL,
  cluster_area VARCHAR(30) NOT NULL,
  leader_id INT NOT NULL,
  active TINYINT(1) NOT NULL DEFAULT 1,
  name VARCHAR(100) NOT NULL,
  address VARCHAR(255) NOT NULL,
  birthday DATE NOT NULL,
  contact_number VARCHAR(15),
  gender VARCHAR(10) NOT NULL,
  group_age VARCHAR(10) NOT NULL,
  journey VARCHAR(20) NOT NULL,
  cldp VARCHAR(10),
  PRIMARY KEY (id)
);

-- CREATE ADMIN, CLUSTER HEAD, LEADER
INSERT INTO account(username, password, type, cluster_area, leader_id, name, address, birthday, gender, group_age, journey, is_leader) VALUES
('master', 'master', 'master', 'Angeles', 0, 'Master', 'Master', '1990-03-20', 'Male', 'Men', 'None', 0),
('admin', 'admin', 'admin', 'Malabanias', 0, 'Ptra. Sharon Rose Tiru', 'Church of God Clarkview', '1990-03-20', 'Female', 'Women', 'Leader', 1);

CREATE TABLE report (
  report_id INT UNSIGNED NOT NULL AUTO_INCREMENT,
  leader_id INT NOT NULL,
  is_verified TINYINT(1) NOT NULL DEFAULT 0,
  is_deleted TINYINT(1) NOT NULL DEFAULT 0,
  comment VARCHAR(255),
  date_verified TIMESTAMP NULL,
  type VARCHAR(10) NOT NULL,
  cluster_area VARCHAR(30) NOT NULL,
  date_submitted TIMESTAMP NOT NULL DEFAULT current_timestamp(),
  date_cg TIMESTAMP NOT NULL,
  topic VARCHAR(50) NOT NULL,
  offering FLOAT,
  present VARCHAR(255) NOT NULL,
  consolidation_report TEXT(1000),
  PRIMARY KEY (report_id)
);
