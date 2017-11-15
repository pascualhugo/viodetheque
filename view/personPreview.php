<?php

function displayPortrait($image) {
    echo '<figure>
          <img src="' . $image["path"] . '" class="portrait">
          <figcaption>' . $image["legend"] . '</figcaption>
          </figure>';
}

$images = $data;
$actors = [];
for($i = 0 ; $i < sizeof($images); $i++) {
    $image = $images[$i];
    if ($image["role"] == 'actor') {
        array_push($actors, $image);
    } elseif ($image["role"] == 'director') {
        $director = $image;
    }
}

echo '<div class="aside-block">
        <aside class="container box">
            <h1>Réalisateur</h1>';

displayPortrait($director);

echo '</aside>
    <aside class="container box">
    <h1>Acteurs</h1>
    <div class="galerie">';

for ($i = 0 ; $i < sizeof($actors) ; $i++) {
    displayPortrait($images[$i]);
}

echo '</div>
      </aside>
      </div>';
