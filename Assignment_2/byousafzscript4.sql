-- Braikhna Assignment 2 Script 4

USE byousafzassign2db;

-- Creating a view showing equivalencies for 1st year study courses
CREATE VIEW vStudyYear1 AS
	SELECT outsideCourse.courseName AS 'External Course Name', university.officialName AS 'University Official Name', university.nickName AS 'University NickName', university.city AS City , westernCourse.courseName AS 'Western Course Name'
	FROM equivalent
	INNER JOIN outsideCourse ON equivalent.externalCourseCode = outsideCourse.courseCode AND equivalent.universityid = outsideCourse.universityid
	INNER JOIN university ON equivalent.universityid = university.universityid
	INNER JOIN westernCourse ON equivalent.westernCourseCode = westernCourse.courseNumber
	WHERE outsideCourse.studyYear = 1;

-- Selecting all records
SELECT * FROM vStudyYear1;

-- Selecting records with nickname "U of T"
SELECT * FROM vStudyYear1
	WHERE `University Nickname` = 'UofT'
	ORDER BY `Western Course Name` ASC;

-- Delete university with 'cord' in nickname
SELECT * FROM  university;
DELETE FROM university
	WHERE nickname LIKE '%cord%';
SELECT * FROM university; 

-- Delete universities from Ontario
-- DELETE FROM university WHERE province = 'ON';
-- This results in an error because universities in ON are a foreign key for courses in the outsideCourse table

-- Show records in university table
SELECT * FROM university; 

-- Show all outside courses and the university they are associated with
SELECT outsideCourse.*, university.officialname, university.city, university.province, university.nickname
	FROM outsideCourse
	NATURAL JOIN university;

-- Deleting courses offered by universities in Waterloo
DELETE outsideCourse.* FROM outsideCourse
	NATURAL JOIN university
	WHERE university.city = 'Waterloo';

-- Show all outside courses and the univeresity they are associated with 
SELECT outsideCourse.*, university.officialname, university.city, university.province, university.nickname
	FROM outsideCourse
	NATURAL JOIN university;

-- Showing records in view after deletions
SELECT * FROM vStudyYear1;
