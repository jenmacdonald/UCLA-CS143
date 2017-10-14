/* --Violates Movie table's unique primary key by inserting a 2 for id
	 This is erroneous because there is already a tuple with an id of 2
	 Returns an error of "ERROR 1062 (23000): Duplicate entry '2' for key 'PRIMARY' " */
INSERT INTO Movie VALUES (2, 'Fantastic Beasts and Where to Find Them', 2016, 'PG-13', 'Heydey Films');

/* --Violates Movie table's check constraint by inputing an illegal rating of 'HP' for rating 
	 This is erroneous because ratings must either be null, 'G', 'PG', 'PG-13', 'R', 'NC-17' */
INSERT INTO Movie VALUES (1, 'Fantastic Beasts and Where to Find Them', 2016, 'HP', 'Heydey Films');

/* --Violates Actor table's unique primary key by inserting a 1 for id
	 Tis is erroneous because there is already a tuple with an id of 1
	 Returns an error of "ERROR 1062 (23000): Duplicate entry '1' for key 'PRIMARY' " */
INSERT INTO Actor VALUES (1, 'Redmayne', 'Eddie', 'Male', 1982-01-06, NULL);

/* --Violates Actor table's check constraint by inputing an illgal sex of 'Muggle' for sex 
	 This is erroneous because sex must either be null, 'Male', or 'Female' */
INSERT INTO Actor VALUES (2, 'Redmayne', 'Eddie', 'Muggle', 1982-01-06, NULL);

/* --Violates Director table's unique primary key by inserting a 16 for id
	 This is erroneous becuase there is already a tuple with an id of 16
	 Returns an error of "ERROR 1062 (23000): Duplicate entry '16' for key 'PRIMARY' " */
INSERT INTO Director VALUES (16, 'Yates', 'David', 1963-11-30, NULL);

/*--Violates Director table's check constraint by inserting an illegal integer of -1 for id 
	This is erroneour because ids must be not null and an integer greater than 0 */
INSERT INTO Director VALUES (-1, 'Yates', 'David', 1963-11-30, NULL);

/* --Violates MovieGenre table's foreign key by inserting a 1 for mid
	 Erroneous because it is referencing a movie id that does not exist
	 Returns an error of "ERROR 1452 (23000): Cannot add or update a child row: a foreign key 
	 constraint fails ('CS143'.'MovieGenre', CONSTRAINT 'MovieGenre_ibfk_1' FOREIGN KEY ('mid')
	 REFERENCES 'Movie' ('id'))" */
INSERT INTO MovieGenre VALUES (1, 'Action');

/* --Violates MovieDirector table's foreign key by inserting a 1 for mid
	 Erroneous because it is referencing a movie id that does not exist
	 Returns an error of "ERROR 1452 (23000): Cannot add or update a child row: a foreign key 
	 constraint fails ('CS143'.'MovieDirector', CONSTRAINT 'MovieDirector_ibfk_1' FOREIGN KEY ('mid')
	 REFERENCES 'Movie' ('id'))" */
INSERT INTO MovieDirector VALUES (1, 16);

/* --Violates MovieDirector table's foreign key by inserting a 1 for did
	 Erroneous because it is referencing a director id that does not exist 
	 Returns an error of "ERROR 1452 (23000): Cannot add or update a child row: a foreign key 
	 constraint fails ('CS143'.'MovieDirector', CONSTRAINT 'MovieDirector_ibfk_2' FOREIGN KEY ('did')
	 REFERENCES 'Director' ('id'))" */
INSERT INTO MovieDirector VALUES (2, 1);

/* --Violates MovieActor table's foreign key by inserting a 1 for mid 
	 Erroneous because it is referencing a movie id that does not exist
	 Returns an error of "ERROR 1452 (23000): Cannot add or update a child row: a foreign key 
	 constraint fails ('CS143'.'MovieActor', CONSTRAINT 'MovieActor_ibfk_1' FOREIGN KEY ('mid')
	 REFERENCES 'Movie' ('id'))" */
INSERT INTO MovieActor VALUES (1, 19, 'Wizard');

/* --Violates MovieActor table's foreign key by inserting a 2 for aid
	 Erroneous because it is referencing an actor id that does not exist
	 Returns an error of "ERROR 1452 (23000): Cannot add or update a child row: a foreign key 
	 constraint fails ('CS143'.'MovieActor', CONSTRAINT 'MovieActor_ibfk_2' FOREIGN KEY ('aid')
	 REFERENCES 'Actor' ('id'))" */
INSERT INTO MovieActor VALUES (2, 2, 'Wizard');

/* --Violates Review table's foreign key inserting a 1 for mid
	 Erroneous because it is referencing a movie id that does not exist
	 Returns an error of "ERROR 1452 (23000): Cannot add or update a child row: a foreign key 
	 constraint fails ('CS143'.'Review', CONSTRAINT 'Review_ibfk_1' FOREIGN KEY ('mid')
	 REFERENCES 'Movie' ('id'))" */
INSERT INTO Review VALUES ('Roger Ebert', '2016-10-23 23:00:00', 1, 5, 'Magical!');
