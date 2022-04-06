<?php
require_once 'db.php';
require_once 'Sandwich.php';
require_once 'functions.php';
$db = 'sandwiches';
$pdo = connectToDB($db);
$sandwichesArray = fetchAllSandwiches($pdo);
$grains = fetchGrains($pdo);
$breads = fetchBreads($pdo);
$temperatures = fetchTemperatures($pdo);
$ingredients = fetchIngredients($pdo);
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link href="css/normalize.css" rel="stylesheet">
    <link href="css/all.min.css" rel="stylesheet">
    <link href="css/styles.css" rel="stylesheet">
    <title>Sandwiches</title>
</head>
<body>
<div>
<!--    --><?php
//    if (isset($_POST['create'])) {
//        $name = $_POST['name'];
//        $bread = $_POST['bread'];
//        $grain = $_POST['grain'];
//        $temperature = $_POST['temperature'];
//        $image = $_POST['image'];
//        echo $name . ' ' . $bread . ' ' . $grain . ' ' . $temperature . ' ' . $image;
//
//        $sql = "INSERT INTO `sandwiches` (`name`,`bread`, `grain`, `temperature`, `image`)" .
//            "VALUES ('$name', '$bread', '$grain', '$temperature', '$image')";
//        $stmtinsert = connectToDB('sandwiches')->prepare($sql);
//        $results = $stmtinsert->execute();
//        if ($results) {
//            echo ' works';
//        } else {
//            echo 'doesn\'t work';
//        }
//    }
//    ?>
</div>
<div>
    <form action="addSandwich.php" method="post">
        <label for="name" >Name</label>
        <input type="text" name="name" >
        <label for="bread" >Bread Type</label>
        <select name="bread" >
            <?php
            foreach ($breads as $bread) {
                echo '<option value="' . $bread['id'] . '">'
                    . $bread['bread']
                    . '</option>';
            }
            ?>
        </select>
        <label for="grain" >Grain</label>
        <select name="grain">
            <?php
            foreach ($grains as $grain) {
                echo '<option value="' . $grain['id'] . '">'
                    . $grain['grain']
                    . '</option>';
            }
            ?>
        </select>
        <label for="temperature" >Serving Temperature</label>
        <select name="temperature" >
            <?php
            foreach ($temperatures as $temperature) {
                echo '<option value="' . $temperature['id'] . '">'
                    . $temperature['temperature']
                    . '</option>';
            }
            ?>
        </select>
        <label for="ingredient1" >Ingredient 1</label>
        <select name="ingredient1" >
            <option value="-1"></option>
            <?php
            foreach ($ingredients as $ingredient) {
                echo '<option value="' . $ingredient['id'] . '">'
                    . $ingredient['ingredient']
                    . '</option>';
            }
            ?>
        </select>
        <label for="ingredient2" >Ingredient 2</label>
        <select name="ingredient2" >
            <option value="-1"></option>
            <?php
            foreach ($ingredients as $ingredient) {
                echo '<option value="' . $ingredient['id'] . '">'
                    . $ingredient['ingredient']
                    . '</option>';
            }
            ?>
        </select>
        <label for="ingredient3" >Ingredient 3</label>
        <select name="ingredient3" >
            <option value="-1"></option>
            <?php
            foreach ($ingredients as $ingredient) {
                echo '<option value="' . $ingredient['id'] . '">'
                    . $ingredient['ingredient']
                    . '</option>';
            }
            ?>
        </select>
        <label for="ingredient4" >Ingredient 4</label>
        <select name="ingredient4" >
            <option value="-1"></option>
            <?php
            foreach ($ingredients as $ingredient) {
                echo '<option value="' . $ingredient['id'] . '">'
                    . $ingredient['ingredient']
                    . '</option>';
            }
            ?>
        </select>
        <label for="image" >Image</label>
        <input type="text" name="image">
        <input type="submit" name="create" value="ADD">
    </form>
</div>
<div>
    <br><br><br><br><br><br><br><br>
</div>
    <div class="container">
        <?php
        echo displayAllSandwiches(createArrayOfSandwichObjects($sandwichesArray));
        ?>
    </div>

</body>
</html>
