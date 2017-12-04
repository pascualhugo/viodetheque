<?php
/** @var Person $data */
echo '<article class="container box">
            <h1>' . $data->getFirstName() . ' ' . $data->getLastName() . '</h1>
            <figure>
                <img src="' . $data->getImage() . '" class="portrait">
            </figure>
            <p><strong>Nationalité</strong> ' . $data->getNationality() . '</p>
            <p><strong>Naissance</strong> ' . $data->getBirthInformations() . '</p>
            <section>
                <h2>Biographie</h2>
                <p>' . $data->getBiography() . '</p>
            </section>
        </article>';
