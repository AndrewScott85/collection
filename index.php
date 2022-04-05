<?php
require_once 'db.php';
require_once 'Sandwich.php';
require_once 'functions.php';
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
<?php
echo displayAllSandwiches(createArrayOfSandwichObjects($sandwichesArray));
?>
</body>
</html>
