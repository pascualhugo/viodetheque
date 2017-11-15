<?php

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