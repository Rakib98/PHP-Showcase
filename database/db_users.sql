DROP DATABASE IF EXISTS db_users;
CREATE DATABASE db_users;
USE db_users;

DROP TABLE IF EXISTS tbl_users;
CREATE TABLE IF NOT EXISTS tbl_users (
  idUsers INT(6) AUTO_INCREMENT NOT NULL,
  firstName VARCHAR(25) NOT NULL,
  lastName VARCHAR(25) NOT NULL,
  email VARCHAR(30) NOT NULL,
  userPassword LONGTEXT NOT NULL,
  PRIMARY KEY (`idUsers`)
) ENGINE=innodb;

/* Password: test123 */
INSERT INTO tbl_users VALUES (1, "Rakib", "Abdur", "admin@admin.com", "$2y$10$5BpUz1.hLTfzjCyifbFsoeVlp2IlPV.VZOpE.UchF2G7S4ciT0xz2");

CREATE TABLE IF NOT EXISTS tbl_error_log (
  idLog INT(6) AUTO_INCREMENT NOT NULL,
  errorType VARCHAR(30) NOT NULL,
  errorDate DATETIME NOT NULL,
  PRIMARY KEY (`idLog`)
) ENGINE=innodb;

INSERT INTO tbl_error_log VALUES (null, "Wrong password", NOW());

CREATE TABLE IF NOT EXISTS tbl_login_info(
  idInfo INT(6) AUTO_INCREMENT NOT NULL,
  userEmail VARCHAR(30) NOT NULL,
  loginDate DATETIME NOT NULL,
  userIP LONGTEXT NOT NULL,
  userBrowser VARCHAR(30) NOT NULL,
  userOS VARCHAR(20) NOT NULL,
  PRIMARY KEY (`idInfo`)
) ENGINE=innodb;

INSERT INTO tbl_login_info VALUES (null, "admin@admin.com", NOW(), "192.168.1.1", "Google Chrome", "Windows 10");

CREATE TABLE IF NOT EXISTS tbl_gallery(
  idGallery int(6) AUTO_INCREMENT NOT NULL PRIMARY KEY,
  imgFullNameGallery LONGTEXT NOT NULL,
  orderGallery LONGTEXT NOT NULL
) ENGINE=innodb;