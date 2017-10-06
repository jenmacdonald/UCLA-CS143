/* 
--PRIMARY KEY CONSTRAINTS:
--Movie table's id is a unique primary key
--Actor table's id is a unique primary key
--Director table's id is a unique primary key

--REFERENTIAL INTEGRITY CONSTRAINTS:
--MovieGenre table's genre references Movie table's id
--MovieDirector table's mid references Movie table's id
--MovieDirector table's did references Director table's id
--MovieActor table's mid references Movie table's id
--MovieActor table's aid references Actor table's id
--Review table's mid references Movie table's id

--CHECK CONSTRAINTS:
--Movie table's rating must either be null, 'G', 'PG', 'PG-13', 'R', or 'NC-17'
--Actor table's sex must either be null, 'Male', OR 'Female'
--Director table's id must not be null and an integer greater than 0
*/

CREATE TABLE Movie(
	id INT, 
	title VARCHAR(100), 
	year INT, 
	rating VARCHAR(10), 
	company VARCHAR(50), 
	PRIMARY KEY(id),
	CHECK(rating IS NULL OR rating='G' OR rating='PG' OR 
		  rating='PG-13' OR rating='R' OR rating='NC-17')	   
);

CREATE TABLE Actor(
	id INT, 
	last VARCHAR(20), 
	first VARCHAR(20), 
	sex VARCHAR(6), 
	dob DATE, 
	dod DATE, 
	PRIMARY KEY(id),
	CHECK(sex IS NULL OR sex='Male' OR sex='Female')
);


CREATE TABLE Director(
	id INT, 
	last VARCHAR(20), 
	first VARCHAR(20), 
	dob DATE, 
	dod DATE, 
	PRIMARY KEY(id),
	CHECK(id IS NOT NULL AND id>0)
);


CREATE TABLE MovieGenre(
	mid INT, 
	genre VARCHAR(20),
	FOREIGN KEY (mid) references Movie(id)
) ENGINE=INNODB;


CREATE TABLE MovieDirector(
	mid INT, 
	did INT,
	FOREIGN KEY (mid) REFERENCES Movie(id),
	FOREIGN KEY (did) REFERENCES Director(id)
) ENGINE=INNODB;


CREATE TABLE MovieActor(
	mid INT, 
	aid INT, 
	role VARCHAR(50),
	FOREIGN KEY (mid) REFERENCES Movie(id),
	FOREIGN KEY (aid) REFERENCES Actor(id)
) ENGINE=INNODB;


CREATE TABLE Review(
	name VARCHAR(20), 
	time TIMESTAMP, 
	mid INT, 
	rating INT, 
	comment VARCHAR(500),
	FOREIGN KEY (mid) REFERENCES Movie(id)
) ENGINE=INNODB;

CREATE TABLE MaxPersonID(
	id INT
);

CREATE TABLE MaxMovieID(
	id INT
);