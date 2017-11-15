<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0"/>
    <title>videotheque</title>
    <link rel="stylesheet" type="text/css" href="../css/index.css"/>
</head>
<?php include_once 'getBlock.php';
include_once '../model/requests.php';
if (isset($_GET["movieId"])) {
    $movieId = $_GET["movieId"];
} else {
    $movieId = 1;
}

?>
<body>
    <?php getBlock('../view/header.php', [])?>
    <main>
        <div>
            <?php
                getBlock('../view/infosfilm.php', getMovieInformations($movieId));
                getBlock('../view/personPreview.php', getPersonsPreviewFromAMovie($movieId));
            ?>
        </div>
        <?php getBlock('../view/gallery.php', getGalleryImages($movieId));?>
    </main>
    <?php getBlock('../view/footer.php', []);?>
</body>
</html>