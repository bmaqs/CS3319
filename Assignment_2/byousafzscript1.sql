-- Braikhna's Assignment 2 Script 1
-- Creation of Databases and Tables

-- build the database
SHOW DATABASES;
DROP DATABASE IF EXISTS byousafzassign2db;
CREATE DATABASE byousafzassign2db;
USE byousafzassign2db;

-- grant permissions to TA
GRANT USAGE ON *.* TO 'ta'@'localhost';
DROP USER 'ta'@'localhost';
CREATE USER 'ta'@'localhost' IDENTIFIED BY 'cs3319';
GRANT ALL PRIVILEGES ON byousafzassign2db.* TO 'ta'@'localhost';
FLUSH PRIVILEGES;

-- create tables westernCrouse, university, outsideCourse, and equivalent
SHOW TABLES;
CREATE TABLE westernCourse
	(courseNumber CHAR(6) NOT NULL, 
	courseName VARCHAR(50) NOT NULL, 
	weight DECIMAL(2,1) NOT NULL, 
	suffix VARCHAR(3), 
	PRIMARY KEY (courseNumber));
CREATE TABLE university 
	(universityid INTEGER(2) NOT NULL, 
	officialName VARCHAR(50) NOT NULL, 
	city VARCHAR(20) NOT NULL, 
	province CHAR(2) NOT NULL, 
	nickname VARCHAR(20) NOT NULL, 
	PRIMARY KEY (universityid));
CREATE TABLE outsideCourse 
	(courseCode char(10) NOT NULL, 
	courseName VARCHAR(50) NOT NULL, 
	studyYear INTEGER(1) NOT NULL, 
	weight DECIMAL(2,1), 
	universityid INTEGER(2) NOT NULL, 
	FOREIGN KEY (universityid) REFERENCES university (universityid), 
	PRIMARY KEY (courseCode, universityid));
CREATE TABLE equivalent 
	(westernCourseCode CHAR(6) NOT NULL, 
	externalCourseCode char(10) NOT NULL, 
	universityid INTEGER(2) NOT NULL, 
	decisionDate DATE, 
	PRIMARY KEY (westernCourseCode, externalCourseCode, universityid),  
	FOREIGN KEY (externalCourseCode, universityid) REFERENCES outsideCourse (courseCode, universityid) ON DELETE CASCADE, 
	FOREIGN KEY (westernCourseCode) REFERENCES westernCourse (courseNumber) ON DELETE CASCADE);
SHOW TABLES;


