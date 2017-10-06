Project 1 Part C: Movie database Website
Movie Database
Contributors: Jennifer MacDonald (604501712)

--------------------------------------------
README for create.sql (duplicate to file in Project 1B)

This is a SQL file that creates a series of tables related to movies using the CREATE TABLE command. The tables are: Movie, Actor, Director, MovieGenre, MovieDirector, MovieActor, Review, MaxPersonID, and MaxMovieID. To enforce data integrity, there are three primary key constraints, six referential integrity constraints, and three CHECK constraints. More information is specified in the create.sql file.

--------------------------------------------

README for load.sql (duplicate to file in Project 1B)

This is a SQL file that loads the given project files for CS143 Project 1B into the tables created in create.sql. It reads fields in the create.sql statements terminated by ",". It also allows the statements to read strings from a query.

--------------------------------------------

README for t1.html

This is an html file that contains Selenium information of a user carrying out a search of “Tom Hanks”. The search returns the results of actors and movies matching that result. 

--------------------------------------------

README for t2.html

This is an html file that contains Selenium information of a user carrying out a SQL submission to the database for an actor Happy Jack (male, born 1994-10-10, still alive), and a director Mary Queen (female, born 1977-02-27, died 2012-12-31). The user then searches for these terms, reviews the relevant pages, and ensures the information is correct.

--------------------------------------------

README for t3.html

This is an html file that contains Selenium information of a user carrying out a SQL submission to the database for a movie CS143 (production company UCLA, 2013, director Mary Queen, actor Happy Jack as “TA”, action & horror, MPAA: G), The user then searches for CS143, reviews the relevant pages, and ensures the information is correct.

--------------------------------------------

README for t4.html

This is an html file that contains Selenium information of a user carrying out a SQL submission to the database to write two reviews for the movie . The first one, review1, left a review of “very good” and a rating of 5. The second one, review2, left a review of “excellent” and a rating of 4. The user then searches for CS143, reviews the relevant pages, and ensures the information is correct.

--------------------------------------------

README for t5.html

This is an html file that contains Selenium information of a user carrying out a search of “santa”. The search returns all actors and movies that contain the key word “santa”.

--------------------------------------------

README for add-actor-or-director.php

This is a php file that creates a form for a user to enter information about an actor or director they would like to enter into the database. The fields are as follows: job type (actor, director; type radio button), first name (type text field), last name (type text field), sex (male, female, other; type radio button), birth date (type dropdown), and death date (type dropdown). If the director radio button is selected, the sex field is disabled to prevent the user from clicking on it since sex is not needed in the Director table. If the actor/director is still alive, there is an option to check a “still alive” checkbox, rendering the death date dropdown disabled. After all the required fields are filled out, the user can click the submit button add the actor/director to the database. If all the fields are valid, an alert will popup to inform the user that the actor/director has been added to the database. If one or more fields are not valid, then an error will print at the bottom of the screen, telling the user what fields need to be fixed.

--------------------------------------------

README for add-actor-to-movie.php

This is a php file that creates a form for a user to enter information about an actor they would like to add to as having acted in a certain movie. The fields are as follows: movie title (type dropdown), actor (type dropdown), and role (type textfield). The movie and actor dropdowns contain the movie titles and actor names queried from the database. The user also adds the role of the actor in that movie. After all the required fields are filled out, the user can click the submit button add the actor to the movie in the database. If all the fields are valid, an alert will popup to inform the user that the actor has been added to the movie in the database. If one or more fields are not valid, then an error will print at the bottom of the screen, telling the user what fields need to be fixed.

--------------------------------------------

README for add-director-to-movie.php

This is a php file that creates a form for a user to enter information about a director they would like to add to as having directed a certain movie. The fields are as follows: movie title (type dropdown) and director (type dropdown). The movie and director dropdowns contain the movie titles and director names queried from the database. After all the required fields are filled out, the user can click the submit button add the director to the movie in the database. If all the fields are valid, an alert will popup to inform the user that the director has been added to the movie in the database. If one or more fields are not valid, then an error will print at the bottom of the screen, telling the user what fields need to be fixed.

--------------------------------------------

README for add-movie-comments.php

This is a php file that creates a form for a user to enter a review of a movie of the user’s choice. The fields are as follows: reviewer name (type text field), movie title (type dropdown), reviewer rating (from 1-5, type dropdown), reviewer comment (type textfield). The user enters their username, selects from the dropdown the movie that they want to review, the rating that they would assign to the movie. and their comments about the movie. After all the required fields are filled out, the user can click the submit button add the review to the database. If all the fields are valid, an alert will popup to inform the user that the review has been added to the movie in the database. If one or more fields are not valid, then an error will print at the bottom of the screen, telling the user what fields need to be fixed.


--------------------------------------------

README for add-movie.php

This is a php file that creates a form for a user to enter information about a movie they would like to enter into the database. The fields are as follows: title (type text field), year(type dropdown), rating(G, PG, PG-13, R, NC-17; type radio button), company(type text field), and genre(type checkbox). After all the required fields are filled out, the user can click the submit button add the movie to the database. If all the fields are valid, an alert will popup to inform the user that the movie has been added to the database. If one or more fields are not valid, then an error will print at the bottom of the screen, telling the user what fields need to be fixed.


--------------------------------------------

README for index.php

This is a php file that allows the user to search for an actor, director, and movie. After a user enters a search into the search field, it will redirect the user to another page (search.php) displaying the results. It also contains links to the forms (add actor, add movie, add movie comments, add actor to movie, and add director to movie), as well as two pages to search for actors/directors or movies.

--------------------------------------------

README for search.php

This is a php file that takes the searched term from the index.php page, and searches each word in the search term against the actors, directors, and movies in the database. If an actor, director, or movie contains all of the terms, then it displays in a column corresponding to that result type. Each instance of the actor, director, or movie is a link to that view page that displays all information relevant to that instance.

--------------------------------------------

README for show-actor-info.php

This is a php file that takes the searched term from the view-actor-or-director-information.php page that is added to the url as the id. The id is then taken and queried to get information about that actor: first name, last name, identification(either actor or actress), sex, birth day, death day, and a table of the movies that he or she was in and their corresponding roles. The movie instances are all links that can be clicked on to be redirected to that movie. 

--------------------------------------------

README for show-director-info.php

This is a php file that takes the searched term from the view-actor-or-director-information.php page that is added to the url as the id. The id is then taken and queried to get information about that director: first name, last name, identification(director), birth day, death day, and a table of the movies that he or she directed and the corresponding year of that movie. The movie instances are all links that can be clicked on to be redirected to that movie. 

--------------------------------------------

README for show-movie-info.php

This is a php file that takes the searched term from the view-movie-information.php page that is added to the url as the id. The id is then taken and queried to get the information about that movie: title, year, MPAA rating, production company, director(s), genre(s), and average rating from reviews of that movie. There is also a table of actors and their corresponding roles in that movie, where the actor names are links to the page of that actor. The page also contains a “add comment” button that will redirect users to the add-movie-comments.php form, and reviews from previous users, including the reviewer name, rating, comments, and date the review was published.

--------------------------------------------

README for view-actor-or-director-information.php

This is a php file that allows the user to search for an actor or director. When the search button is clicked after a valid search is entered, a list of actors and directors matching that searched term will appear in corresponding actor and director columns. The instances themselves are links to the actor or director’s information page.

--------------------------------------------

README for view-movie-information.php

This is a php file that allows the user to search for a movie. When the search button is clicked after a valid search is entered, a list of movies matching that searched term will appear. The instances themselves are links to the movie’s information page.


--------------------------------------------


Note that all the files were created in Mac OS X Yosemite. 