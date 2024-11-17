<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Cabinet</title>
    <link rel="stylesheet" href="./css/main.css">
</head>

<body>
<?php require_once "blocks/header.php";?>

    <div class="feedback">
        <div class="container">
            <h2>Cabinet</h2>
            <p>Hello: <?=$_COOKIE['login']?>.</p>


            <form method="post" action="./lib/add-game.php">
                <label>Images</label>
                <input type="text" class="one-line" name="image">

                <label>Subscibers</label>
                <input type="text" class="one-line" name="followers">

                <button type="submit">Accept</button>
            </form>
        </div>
    </div>
    <?php require_once "blocks/footer.php";?>
</body>

</html>