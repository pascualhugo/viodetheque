<?php

/**
 * @param $movie Movie
 */
function createMovie ($movie) {
    $queryCreateMovie = "INSERT INTO 'movie'('title', 'release_date', 'synopsis', 'rating')
                    VALUES (:title,:releaseDate,:synopsis,:rating);";
    $requestCreateMovie = SPDO::getInstance()->prepare($queryCreateMovie);
    $requestCreateMovie->bindValue(':title', $movie->getTitle());
    $requestCreateMovie->bindValue(':releaseDate', $movie->getReleaseDate());
    $requestCreateMovie->bindValue(':synopsis', $movie->getSynopsis());
    $requestCreateMovie->bindValue(':rating', $movie->getRating());
    $createdMovie = $requestCreateMovie->execute();
    $movieId = $createdMovie['id'];
    foreach ($movie->getActors() as $actor) {
        linkActorToMovie($actor, $movieId);
    }
    linkDirectorToMovie($movie->getDirector(), $movieId);
    foreach ($movie->getGallery() as $image) {
        linkImageToMovie($image, $movieId);
    }
}

/**
 * @param $actor Actor
 */
function linkActorToMovie ($actor, $movieId) {
    $queryCreateRelationBetweenActorAndMovie = "INSERT INTO 'movieHasPerson'('movie_id', 'person_id', 'role')
                                                VALUES (:movieId,:personId,'director')";
    $requestCreateRelation = SPDO::getInstance()->prepare($queryCreateRelationBetweenActorAndMovie);
    $requestCreateRelation->bindValue(':personId', $actor->getId());
    $requestCreateRelation->bindValue(':movieId', $movieId);
}

/**
 * @param $director Director
 */
function linkDirectorToMovie ($director, $movieId) {
    $queryCreateRelationBetweenActorAndMovie = "INSERT INTO 'movieHasPerson'('movie_id', 'person_id', 'role')
                                                VALUES (:movieId,:personId,'director')";
    $requestCreateRelation = SPDO::getInstance()->prepare($queryCreateRelationBetweenActorAndMovie);
    $requestCreateRelation->bindValue(':personId', $director->getId());
    $requestCreateRelation->bindValue(':movieId', $movieId);
}

function linkImageToMovie($image, $movieId) {
    $queryCreateRelationBetweenImageAndMovie = "INSERT INTO 'movieHasPicture'('movie_id', 'picture_id', 'role')
                                                VALUES (:movieId,:pictureId,'gallery')";
    $requestCreateRelation = SPDO::getInstance()->prepare($queryCreateRelationBetweenImageAndMovie);
    $requestCreateRelation->bindValue(':personId', $image['id']);
    $requestCreateRelation->bindValue(':movieId', $movieId);
}