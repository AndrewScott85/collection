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
<section class="title">
    <h1>Sandwich Collection</h1>
    <h2>Some sandwiches I've eaten and enjoyed</h2>
</section>
<section class="container">
    <?php
    echo displayAllSandwiches(createArrayOfSandwichObjects($sandwichesArray));
    ?>
</section>
<div class="form">
    <h2 class="formheading">Add a new delicious sandwich below with up to 4 ingredients</h2>
    <form action="addSandwich.php" method="post" enctype="multipart/form-data">
        <label for="name" >Name</label>
        <?php
        if (empty($_POST["name"])) {
            $nameError = "Name is required";
        }
        ?>
        <input type="text" name="name" required>
        <label for="bread" >Bread Type</label>
        <select name="bread" required>
            <?php
            foreach ($breads as $bread) {
                echo '<option value="' . $bread['id'] . '">'
                    . $bread['bread']
                    . '</option>';
            }
            ?>
        </select>
        <label for="grain" >Grain</label>
        <select name="grain" required>
            <?php
            foreach ($grains as $grain) {
                echo '<option value="' . $grain['id'] . '">'
                    . $grain['grain']
                    . '</option>';
            }
            ?>
        </select>
        <label for="temperature" >Serving Temperature</label>
        <select name="temperature" required>
            <?php
            foreach ($temperatures as $temperature) {
                echo '<option value="' . $temperature['id'] . '">'
                    . $temperature['temperature']
                    . '</option>';
            }
            ?>
        </select>
        <label for="ingredient1" >Ingredient 1</label>
        <select id="ingredient1" name="ingredient1" >
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
        <select id="ingredient2" name="ingredient2" >
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
        <select id="ingredient3" name="ingredient3" >
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
        <select id="ingredient4" name="ingredient4" >
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
        <input type="file" name="newFile">
        <input type="submit" value="Upload">
    </form>
</div>
</body>
</html>
