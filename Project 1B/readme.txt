Project 1 Part B: MySQL database
MySQL Movie Database
Contributors: Jennifer MacDonald (604501712)

--------------------------------------------
README for create.sql

This is a SQL file that creates a series of tables related to movies using the CREATE TABLE command. The tables are: Movie, Actor, Director, MovieGenre, MovieDirector, MovieActor, Review, MaxPersonID, and MaxMovieID. To enforce data integrity, there are three primary key constraints, six referential integrity constraints, and three CHECK constraints. More information is specified in the create.sql file.

--------------------------------------------

README for load.sql

This is a SQL file that loads the given project files for CS143 Project 1B into the tables created in create.sql. It reads fields in the create.sql statements terminated by ",". It also allows the statements to read strings from a query.

--------------------------------------------

README for queries.sql

This is a SQL file that contains three SQL queries. The first query returns the concatenated first and last names of actors in the movie "Die Another Day". The second query returns the number of actors who have acted in multiple movies. The third query returns the total number of actors who are also directors and who have passed away.

--------------------------------------------

README for query.php

This is a PHP file that takes in a correctly typed query from the user and returns the results in a table. The queries can be directed to the CS143 movie database from create.sql and load.sql only.

--------------------------------------------

README for violate.sql

This is a SQL file that containts statements that violate either the primary key constraints, referential integrity constraints, or check constraints.

--------------------------------------------

Note that all the files were created in Mac OS X Yosemite. 