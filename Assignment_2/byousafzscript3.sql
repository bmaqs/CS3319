-- Braikhna Assignment 2 Script 3
-- Queries 

USE byousafzassign2db;

-- Query 1
SELECT courseName FROM westernCourse;

-- Query 2
SELECT DISTINCT courseCode FROM outsideCourse;

-- Query 3
SELECT * FROM westernCourse ORDER BY courseName ASC;

-- Query 4
SELECT courseNumber, courseName FROM westernCourse WHERE weight = '0.5';

-- Query 5
SELECT courseCode, courseName FROM outsideCourse WHERE universityid IN (SELECT universityid FROM university WHERE officialName = 'University of Toronto');

-- Query 6
SELECT outsideCourse.courseName, university.nickname
	FROM outsideCourse 
	INNER JOIN university 
		ON outsideCourse.universityid = university.universityid
	WHERE courseName like '%Introduction%';

-- Query 7
SELECT outsideCourse.courseName AS 'External Course Name', university.officialName, westernCourse.courseName AS 'Western Course Name', equivalent.decisionDate
	FROM equivalent
	INNER JOIN university 
		ON equivalent.universityid = university.universityid
	INNER JOIN outsideCourse 
		ON equivalent.externalCourseCode = outsideCourse.courseCode AND equivalent.universityid = outsideCourse.universityid
	INNER JOIN westernCourse 
		ON equivalent.westernCourseCode = westernCourse.courseNumber
	WHERE decisionDate <= DATE_SUB(CURDATE(), INTERVAL 5 YEAR);


-- Query 8
SELECT outsideCourse.courseName, university.nickname
	FROM equivalent
	INNER JOIN university
		ON equivalent.universityid = university.universityid
	INNER JOIN outsideCourse
		ON equivalent.externalCourseCode = outsideCourse.courseCode AND equivalent.universityid = outsideCourse.universityid
	WHERE westernCourseCode = 'cs1026';

-- Query 9
SELECT COUNT(externalCourseCode)
	FROM equivalent
	WHERE westernCourseCode = 'cs1026';

-- Query 10
SELECT westernCourse.courseName AS 'Western Course Name', outsideCourse.courseName AS 'External Course Name', university.nickname AS 'University'
	FROM equivalent
	INNER JOIN westernCourse
		ON equivalent.westernCourseCode = westernCourse.courseNumber
	INNER JOIN university
		ON equivalent.universityid = university.universityid
	INNER JOIN outsideCourse
		ON equivalent.externalCourseCode = outsideCourse.courseCode AND equivalent.universityid = outsideCourse.universityid
	WHERE university.city = 'Waterloo';
 
-- Query 11
SELECT officialName
	FROM university
	WHERE universityid NOT IN (SELECT universityid FROM equivalent);

-- Query 12
SELECT westernCourse.courseName, westernCourse.courseNumber
	FROM westernCourse
	INNER JOIN equivalent ON westernCourse.courseNumber = equivalent.westernCourseCode
	INNER JOIN outsideCourse ON equivalent.externalCourseCode = outsideCourse.courseCode AND equivalent.universityid = outsideCourse.universityid
	WHERE outsideCourse.studyYear = 3 OR outsideCourse.studyYear = 4;

-- Query 13
SELECT westernCourse.courseName
	FROM westernCourse
	INNER JOIN equivalent ON westernCourse.courseNumber = equivalent.westernCourseCode
	GROUP BY equivalent.westernCourseCode
	HAVING COUNT(equivalent.externalCourseCode) > 1;

-- Query 14
SELECT westernCourse.courseNumber AS 'Western Course Number', westernCourse.courseName AS 'Western Course Name', westernCourse.weight AS 'Course Weight', outsideCourse.courseName AS 'Other University Course Name', university.officialName AS 'University Name', outsideCourse.weight AS 'Other Course Weight'
	FROM equivalent
	INNER JOIN westernCourse ON equivalent.westernCourseCode = westernCourse.courseNumber
	INNER JOIN outsideCourse ON equivalent.externalCourseCode = outsideCourse.courseCode AND equivalent.universityid = outsideCourse.universityid
	INNER JOIN university ON equivalent.universityid = university.universityid
	WHERE NOT westernCourse.weight = outsideCourse.weight; 
