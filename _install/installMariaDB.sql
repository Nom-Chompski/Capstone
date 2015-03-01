CREATE DATABASE IF NOT EXISTS phage_enzyme_tool;

USE phage_enzyme_tool;

CREATE TABLE IF NOT EXISTS genusTable(
	GenusID INT NOT NULL AUTO_INCREMENT primary key,
	Genus VARCHAR(100)
	);

CREATE TABLE IF NOT EXISTS userTable
(
	UserID INTEGER NOT NULL AUTO_INCREMENT primary key,
	EmailAddress VARCHAR(100) NOT NULL,
	Password VARCHAR(128) NOT NULL,
	AuthLevel Int NOT NULL,
	VerificationValue VARCHAR(128),
	IPAddress VARCHAR(15),
	Organization VARCHAR(50),
	Salt VARCHAR(128),
	Active Boolean
);

CREATE TABLE IF NOT EXISTS cutsTable
(
	CutID INTEGER NOT NULL AUTO_INCREMENT primary key,
	PhageID INTEGER,
	EnzymeID INTEGER,
	CutCount INTEGER,
	CutLocations text
);

CREATE TABLE IF NOT EXISTS enzymeTable
(
	EnzymeID INTEGER AUTO_INCREMENT NOT NULL primary key,
	EnzymeName VARCHAR(100),
	CutPattern VARCHAR(50) # do we keep this? 
);

CREATE TABLE IF NOT EXISTS clusterTable
(
	ClusterID INTEGER AUTO_INCREMENT NOT NULL primary key,
	Cluster VARCHAR(3)
	
);

CREATE TABLE IF NOT EXISTS phageTable
(
	PhageID INTEGER AUTO_INCREMENT NOT NULL primary key,
	PhageName VARCHAR(100) NOT NULL UNIQUE,
	GenusID INTEGER,
	ClusterID CHAR(2),
	SubclusterID INTEGER,
	YearFound INTEGER,
	DateFinished DATE,
	Gnome MEDIUMTEXT,
	Updated DATE
);