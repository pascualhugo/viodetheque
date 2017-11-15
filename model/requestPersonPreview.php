<?php

function getPersonsPreviewFromAMovie ($movieId) {
    $query = 'SELECT path, legend, role
              FROM movie M
              JOIN movieHasPerson Mhp
              ON M.id = Mhp.movie_id
              JOIN personHasPicture Php
              ON Mhp.person_id = Php.person_id
              JOIN picture P
              ON Php.picture_id = P.id
              WHERE M.id = :id';
    $request = SPDO::getInstance()->prepare($query);
    $request->bindValue(':id', $movieId);
    $request->execute();
    return $request->fetchAll();
}