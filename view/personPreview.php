<?php
/** @var Movie $data */

echo '<div class="aside-block">
        <aside class="container box">
            <h1>Réalisateur</h1>';

displayPortrait($data->getDirector());

echo '</aside>
    <aside class="container box">
    <h1>Acteurs</h1>
    <div class="galerie">';

for ($i = 0 ; $i < sizeof($data->getActors()) ; $i++) {
    displayPortrait($data->getActors()[$i]);
}

echo '</div>
      </aside>
      </div>';

/** @var Person $person */
function displayPortrait($person) {
    echo '<figure>
          <img src="' . $person->getImage() . '" class="portrait">
          <figcaption>' . $person->getFirstName() . ' ' . $person->getLastName() . '</figcaption>
          </figure>';
}
