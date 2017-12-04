<?php
/** @var Movie $data */
echo '<article class="container box">
                <h1>' . $data->getTitle() . '</h1>
                <p><strong>Date de sortie</strong> <time>' . $data->getReleaseDate() . '</time></p>
                <p><strong>Réalisateur</strong> ' . $data->getDirector()->getFirstName() . ' ' . $data->getDirector()->getLastName() . '</p>
                <ul><strong>Acteurs</strong>';

for ($i = 0; $i < sizeof($data->getActors()); $i++) {
    $actor = $data->getActors()[$i];
    echo '<li>' . $actor->getFirstName() . ' ' . $actor->getLastName() . '</li>';
}

echo '</ul>
                <p><strong>Notes spectateurs</strong> ' . $data->getRating() . '/5  <meter value="' . $data->getRating() . '" min="0" max="5"></meter></p>
                <h2>Synopsis</h2>
                <p>' . $data->getSynopsis() . '</p>
                </article>';

