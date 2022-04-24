DROP DATABASE IF EXISTS robicm;
CREATE DATABASE IF NOT EXISTS robicm;
USE espace_pour_membres;
DROP TABLE IF EXISTS utilisateurs;
DROP TABLE IF EXISTS avis;
DROP TABLE IF EXISTS images;

CREATE TABLE IF NOT EXISTS utilisateurs (
  id INT PRIMARY KEY NOT NULL AUTO_INCREMENT,
  name VARCHAR(256) NOT NULL DEFAULT '',
  mdp VARCHAR(256) NOT NULL,
  email VARCHAR(256) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

CREATE TABLE IF NOT EXISTS avis (
  id INT NOT NULL,
  message VARCHAR(256) DEFAULT '',
  note INT
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

CREATE TABLE IF NOT EXISTS images (
  id INT PRIMARY KEY NOT NULL AUTO_INCREMENT,
  nom VARCHAR(100) NOT NULL DEFAULT '',
  taille INT NOT NULL,
  type VARCHAR(20) NOT NULL,
  bin LONGBLOB NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;
