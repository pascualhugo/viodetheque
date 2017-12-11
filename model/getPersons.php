<?php
/** return Person
 * @param $personId
 * @return Person
 */
function getPersonDetails($personId)
{
    $queryPerson = 'SELECT Per.*, Pic.path
              FROM person Per 
              JOIN personHasPicture Php
              ON Per.id = Php.person_id
              JOIN picture Pic
              ON Php.picture_id = Pic.id
              WHERE Per.id =:id';
    $requestPerson = SPDO::getInstance()->prepare($queryPerson);
    $requestPerson->bindValue(':id', $personId);
    $requestPerson->execute();
    $person = $requestPerson->fetch();
    $filmography = getFilmography($personId);
    $asActor = [];
    $asDirector = [];
    for ($i = 0; $i < sizeof($filmography); ++$i) {
        $movie = $filmography[$i];
        if ($movie['role'] == 'actor') {
            $asActor[] = $movie;
        } else {
            $asDirector[] = $movie;
        }
    }
    return new Person($person['id'], $person['firstname'], $person['lastname'], $person['birth_informations'],
        $person['nationality'], $person['biography'], $person['path'], $asActor, $asDirector);
}

function getAllActors () {
    $queryMovie = "SELECT DISTINCT *
        FROM person P 
        JOIN movieHasPerson Mhp 
        ON P.id = Mhp.person_id
        WHERE role = 'actor'";
    $requestMovie = SPDO::getInstance()->prepare($queryMovie);
    $requestMovie->execute();
    return $requestMovie->fetch();
}

function getAllDirectors () {
    $queryMovie = "SELECT DISTINCT *
        FROM person P 
        JOIN movieHasPerson Mhp 
        ON P.id = Mhp.person_id
        WHERE role = 'director'";
    $requestMovie = SPDO::getInstance()->prepare($queryMovie);
    $requestMovie->execute();
    return $requestMovie->fetch();
}

function getFilmography($personId)
{
    $queryMovie = 'SELECT M.title, M.release_date, role
            FROM movieHasPerson MhP
            JOIN movie M
            ON MhP.movie_id = M.id
            WHERE MhP.person_id =:id';
    $requestMovies = SPDO::getInstance()->prepare($queryMovie);
    $requestMovies->bindValue(':id', $personId);
    $requestMovies->execute();
    return $requestMovies->fetchAll();
}
