-- Braikhna Assignment 2 Script 2
-- Insertion and Modification

USE byousafzassign2db;

-- Inserting data into university table using local csv file
SELECT * FROM university;
LOAD DATA LOCAL INFILE 'loaddatafall2020.txt'
INTO TABLE university
FIELDS TERMINATED BY ','
LINES TERMINATED BY '\n';
SELECT * FROM university;

-- Inserting data into westernCourse
SELECT * FROM westernCourse;
INSERT INTO westernCourse VALUES('cs1026', 'Computer Science Fundamentals I', '0.5', 'A/B');
INSERT INTO westernCourse VALUES('cs1027', 'Computer Science Fundamentals II', '0.5', 'A/B');
INSERT INTO westernCourse VALUES('cs2210', 'Algorithms and Data Structures', '1.0', 'A/B');
INSERT INTO westernCourse VALUES('cs3319', 'Databases I', '0.5', 'A/B');
INSERT INTO westernCourse VALUES('cs2120', 'Modern Survival Skills I: Coding Essentials', '0.5', 'A/B');
INSERT INTO westernCourse VALUES('cs4490', 'Thesis', '0.5', 'Z');
INSERT INTO westernCourse VALUES('cs0020', 'Intro to Coding using Pascal and Fortran', '1.0', '');
INSERT INTO westernCourse VALUES('cs3000', 'Data Science for Social Good', '0.5', 'A/B');
SELECT * FROM westernCourse;

-- Adding one fictitous university
SELECT * FROM university;
INSERT INTO university VALUES(12, 'Evergreen University', 'Victoria', 'BC', 'Evergreen');
SELECT * FROM university;

-- Inserting data into outsideCourse
SELECT * FROM outsideCourse;
INSERT INTO outsideCourse VALUES('CompSci022', 'Introduction to Programming', '1', '0.5', '2');
INSERT INTO outsideCourse VALUES('CompSci033', 'Intro to Programming for Med students', '3', '0.5', '2');
INSERT INTO outsideCourse VALUES('CompSci021', 'Packages', '1', '0.5', '2');
INSERT INTO outsideCourse VALUES('CompSci222', 'Introduction to Databases', '2', '1.0', '2');
INSERT INTO outsideCourse VALUES('CompSci023', 'Advanced Programming', '1', '0.5', '2');
INSERT INTO outsideCourse VALUES('CompSci011', 'Intro to Computer Science', '2', '0.5', '4');
INSERT INTO outsideCourse VALUES('CompSci123', 'Using UNIX', '2', '0.5', '4');
INSERT INTO outsideCourse VALUES('CompSci021', 'Intro Programming', '1', '1.0', '66');
INSERT INTO outsideCourse VALUES('CompSci022', 'Advanced Programming', '1', '0.5', '66');
INSERT INTO outsideCourse VALUES('CompSci319', 'Using Databases', '3', '0.5', '66');
INSERT INTO outsideCourse VALUES('CompSci333', 'Graphics', '3', '0.5', '55');
INSERT INTO outsideCourse VALUES('CompSci444', 'Networks', '4', '0.5', '55');
INSERT INTO outsideCourse VALUES('CompSci022', 'Using Packages', '1', '0.5', '77');
INSERT INTO outsideCourse VALUES('CompSci101', 'Introduction to Using Data Structures', '2', '0.5', '77');
INSERT INTO outsideCourse VALUES('CompSci257', 'Intro to Data Science', '2', '0.5', '12');
INSERT INTO outsideCourse VALUES('CompSci481', 'Statistical Programming', '4', '0.5', '12');
SELECT * FROM outsideCourse;

-- Inserting data into equivalent
SELECT * FROM equivalent;
INSERT INTO equivalent VALUES('cs1026', 'CompSci022', '2', '2015-05-12');
INSERT INTO equivalent VALUES('cs1026', 'CompSci033', '2', '2013-01-02');
INSERT INTO equivalent VALUES('cs1026', 'CompSci011', '4', '1997-02-09');
INSERT INTO equivalent VALUES('cs1026', 'CompSci021', '66', '2010-01-12');
INSERT INTO equivalent VALUES('cs1027', 'CompSci023', '2', '2017-06-22');
INSERT INTO equivalent VALUES('cs1027', 'CompSci022', '66', '2019-09-01');
INSERT INTO equivalent VALUES('cs2210', 'CompSci101', '77', '1998-07-12');
INSERT INTO equivalent VALUES('cs3319', 'CompSci222', '2', '1990-09-13');
INSERT INTO equivalent VALUES('cs3319', 'CompSci319', '66', '1987-09-21');
INSERT INTO equivalent VALUES('cs2120', 'CompSci022', '2', '2018-12-10');
INSERT INTO equivalent VALUES('cs0020', 'CompSci022', '2', '1999-09-17');
SELECT * FROM equivalent;

-- Updating date cs0020 was made equal to CompSci022
SELECT * FROM equivalent;
UPDATE equivalent SET decisionDate = '2018-09-19' WHERE westernCourseCode = 'cs0020' AND externalCourseCode = 'CompSci022' AND universityid = 2;
SELECT * FROM equivalent;

-- Updating study year to 1 for each external course starting with "Intro"
SELECT * FROM outsideCourse;
UPDATE outsideCourse SET studyYear = 1 WHERE courseName like 'Intro%';
SELECT * FROM outsideCourse;
 




