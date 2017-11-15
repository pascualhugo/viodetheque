<?php
echo '<aside class="container box">
            <h1>Galerie d\'images</h1>
            <div class="galerie">';

for ($i = 0 ; $i < sizeof($data); $i++) {
    $image = $data[$i];
    echo '<figure>
              <img src="'. $image["path"] . '" class="image-galerie">
              <figcaption>' . $image["legend"] . '</figcaption>
          </figure>';
}
echo '  </div>
        </aside>';