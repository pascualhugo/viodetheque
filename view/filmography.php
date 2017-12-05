<?php
/** @var Person $data */
echo '<aside class="container box">
    <h1>Filmographie</h1>';
displayMoviesIfPresent($data->getMoviesAsDirector(), 'En tant que réalisateur');
displayMoviesIfPresent($data->getMoviesAsActor(), 'En tant qu\'acteur');
echo '</aside>';
function displayMoviesIfPresent ($movies, $listTitle) {
    if (!empty($movies)) {
        echo '<ul><h2>' . $listTitle . '</h2>';
        for ($i = 0 ; $i < sizeof($movies) ; ++$i) {
            $movie = $movies[$i];
            echo '<li>' . $movie['title'] . ' (' . $movie['release_date'] . ')</li>';
        }
        echo'</ul>';
    }
}

