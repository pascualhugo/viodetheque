<?php
echo '<article class="container box">
                <h1>' . $data["title"] . '</h1>
                <p><strong>Date de sortie</strong> <time>' . $data["release_date"] . '</time></p>
                <ul><strong>Acteurs</strong>';

for($i = 0 ; $i < sizeof($data["actors"]); $i++) {
    $actor = $data["actors"][$i];
    echo '<li>' . $actor['firstName'] . '  ' . $actor['lastName'] . '</li>';
}

echo '</ul>
                <p><strong>Notes spectateurs</strong> ' . $data["rating"] . '/5  <meter value="' . $data["rating"] . '" min="0" max="5"></meter></p>
                <h2>Synopsis</h2>
                <p>' . $data["synopsis"] . '</p>
                </article>';
