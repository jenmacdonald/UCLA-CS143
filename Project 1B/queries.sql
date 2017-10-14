/* --Returns the first and last name string of actors in the movie "Die Another Day" */
SELECT CONCAT(Actor.first, " ", Actor.last) 
FROM Actor INNER JOIN MovieActor ON Actor.id=MovieActor.aid INNER JOIN Movie ON MovieActor.mid=Movie.id
WHERE Movie.title="Die Another Day"; 

/* --Returns the number of actors who have acted in multiple movies */
SELECT COUNT(aid)
FROM (SELECT aid
	  FROM MovieActor
	  GROUP BY aid
	  HAVING COUNT(mid)>1) AS A;

/* --Returns the total number of actors who are also directors and who have passed away */
SELECT COUNT(dod)
FROM Actor NATURAL JOIN Director 
WHERE Actor.dod=Director.dod AND dod IS NOT NULL;