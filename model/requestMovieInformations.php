<?php

function getMovieInformations ($movieId) {
    $queryMovie = 'SELECT title, release_date, synopsis, rating
              FROM movie
              WHERE id =:id';
    $requestMovie = SPDO::getInstance()->prepare($queryMovie);
    $requestMovie->bindValue(':id', $movieId);
    $requestMovie->execute();
    $movieInformations = $requestMovie->fetch();
    $actorsInformations = getActorsFirstAndLastNameFromAMovie($movieId);
    $movieInformations['actors'] = $actorsInformations;
    return $movieInformations;
}

function getActorsFirstAndLastNameFromAMovie ($movieId) {
    $queryActors = 'SELECT firstName, lastName
              FROM movie M JOIN movieHasPerson Mhp
              ON M.id = Mhp.movie_id
              JOIN person P
              ON Mhp.person_id=P.id
              WHERE M.id =:id';
    $requestActors = SPDO::getInstance()->prepare($queryActors);
    $requestActors->bindValue(':id', $movieId);
    $requestActors->execute();
    return $requestActors->fetchAll();
}
