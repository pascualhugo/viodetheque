<!DOCTYPE html>
<?php include_once 'getBlock.php';
include_once '../model/requests.php';
if (isset($_GET["personId"])) {
    $personId = $_GET["personId"];
} else {
    $personId = 1;
}
$person = getPersonDetails($personId);
?>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <title>person</title>
    <link rel="stylesheet" type="text/css" href="../css/movie.css">
</head>
<body>
    <?php getBlock('../view/header.php', []) ?>
    <main>
        <?php getBlock('../view/actorDetails.php', $person);
        getBlock('../view/filmography.php', $person);
        ?>
    </main>
    <?php getBlock('../view/footer.php', []); ?>
    <script src="../js/jquery-3.2.1.js"></script>
    </body>
</html>

