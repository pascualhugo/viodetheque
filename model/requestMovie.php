<?php
require_once 'classes/Movie.php';
require_once 'classes/Actor.php';
require_once 'classes/Director.php';

/** return Movie */
function getMovieInformations ($movieId) {
    $queryMovie = "SELECT *
              FROM movie M
              WHERE M.id = :id";
    $requestMovie = SPDO::getInstance()->prepare($queryMovie);
    $requestMovie->bindValue(':id', $movieId);
    $requestMovie->execute();
    $movie = $requestMovie->fetch();
    $moviePersons = getPersonsFromAMovie($movieId);
    var_dump($movie);
    for ($i = 0 ; $i < sizeof($moviePersons); ++$i) {
        $person = transformIntoPerson($moviePersons[$i]);
        if ($person instanceof Director) {
            $director = $person;
        } else {
            $actors[$i] = $person;
        }
    }
    $images = getGalleryImages($movieId);

    return new Movie($movie['id'], $movie['title'], $movie['release_date'], $movie['synopsis'], $movie['rating'], $actors, $director, $images);
}

function transformIntoPerson ($person) {
    if ($person['role'] == 'actor') {
        return new Actor($person['id'], $person['firstname'], $person['lastname'], $person['birth_informations'],
            $person['nationality'], $person['biography'], $person['path']);
    } else {
        return new Director($person['id'], $person['firstname'], $person['lastname'], $person['birth_informations'],
            $person['nationality'], $person['biography'], $person['path']);
    }
}

function getPersonsFromAMovie ($movieId) {
    $queryActors = 'SELECT Per.*, Mhp.role, Pic.path
              FROM movie M JOIN movieHasPerson Mhp
              ON M.id = Mhp.movie_id
              JOIN person Per
              ON Mhp.person_id=Per.id
              JOIN personHasPicture Php
              ON Mhp.person_id = Php.person_id
              JOIN picture Pic
              ON Php.picture_id = Pic.id
              WHERE M.id =:id';
    $requestActors = SPDO::getInstance()->prepare($queryActors);
    $requestActors->bindValue(':id', $movieId);
    $requestActors->execute();
    return $requestActors->fetchAll();
}

function getGalleryImages ($movieId) {
    $query = "SELECT path, legend
              FROM movie M
              JOIN movieHasPicture Mhp
              ON M.id = Mhp.movie_id
              JOIN picture P
              ON Mhp.picture_id = P.id
              WHERE M.id = :id AND role='gallery'";
    $request = SPDO::getInstance()->prepare($query);
    $request->bindValue(':id', $movieId);
    $request->execute();
    return $request->fetchAll();
}