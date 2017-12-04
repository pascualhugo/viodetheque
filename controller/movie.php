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
$movie = getMovieInformations($movieId);
?>
<body>
    <?php getBlock('../view/header.php', [])?>
    <main>
        <div>
            <?php
                getBlock('../view/movieDetails.php', $movie);
                getBlock('../view/personPreview.php', $movie);
            ?>
        </div>
        <?php getBlock('../view/gallery.php', $movie);?>
    </main>
    <?php getBlock('../view/footer.php', []);?>
    <script src="../js/jquery-3.2.1.js"></script>
</body>
</html>