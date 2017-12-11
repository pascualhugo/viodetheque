<!DOCTYPE html>
<?php include_once 'getBlock.php';
include_once '../model/requests.php';
if (isset($_GET["movieId"])) {
    $movieId = $_GET["movieId"];
} else {
    $movieId = 1;
}
$movie = getMovieDetails($movieId);
?>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0"/>
    <title>videotheque</title>
    <link rel="stylesheet" type="text/css" href="../css/movie.css"/>
    <script src="../js/jquery-3.2.1.js"></script>
</head>
<body>
    <?php getBlock('../view/header.php', [])?>
    <main>
        <div>
            <?php
                getBlock('../view/movieDetails.php', $movie);
                getBlock('../view/personPreview.php', $movie);
            ?>
        </div>
        <div class="aside-block">
            <?php getBlock('../view/gallery.php', $movie) ?>
            <aside class="box container">
                <?php getBlock('../view/loadFaq.php', [])?>
            </aside>
        </div>
    </main>
    <?php getBlock('../view/footer.php', []); ?>
    <script src="../js/myscript.js"></script>
</body>
</html>

