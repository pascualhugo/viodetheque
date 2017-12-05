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
    <meta name="viewport" content="width=device-width, initial-scale=1.0"/>
    <title>person</title>
    <link rel="stylesheet" type="text/css" href="../css/movie.css">
    <script src="../js/jquery-3.2.1.js"></script>
</head>
<body>
    <?php getBlock('../view/header.php', []) ?>
    <main>
        <?php getBlock('../view/actorDetails.php', $person);?>
        <div class="aside-block">
            <?php getBlock('../view/filmography.php', $person);
             getBlock('../view/faq.php', []); ?>;
        </div>
    </main>
    <?php getBlock('../view/footer.php', []); ?>
    <script src="../js/myscript.js"></script>
    </body>
</html>

