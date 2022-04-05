<?php
require_once 'db.php';
require_once 'Sandwich.php';
$db = 'sandwiches';
$sandwichesArray = fetchAllSandwiches(connectToDB($db));

//echo '<pre>';
//print_r ($sandwichesArray);
//echo '</pre>';

function createArrayOfSandwichObjects(array $sandwichesDb): array
{
//    echo '<pre>';
//    print_r($usersDb);
//    echo '</pre>';
    $sandwiches = [];
    $currentId = -1;
    foreach ($sandwichesDb as $sandwich) {
        if ($sandwich['id'] !== $currentId) {
            $sandwichIngredient = $sandwich['ingredient'];
            if ($sandwichIngredient === null) {
                $sandwichIngredient = '';
            }
            $sandwichObj = new Sandwich(
                $sandwich['id'],
                $sandwich['name'],
                $sandwich['image'],
                $sandwich['bread'],
                $sandwich['grain'],
                $sandwich['temperature'],
                $sandwichIngredient
            );
            $currentId = $sandwich['id'];
            $sandwiches[$currentId] = $sandwichObj;
        } else {
            $sandwiches[$currentId]->addIngredient($sandwich['ingredient']);
        }
    }
    return $sandwiches;
}

//echo '<pre>';
//print_r(createArrayOfSandwichObjects($sandwichesArray));
//echo '</pre>';
//

function displayAllSandwiches(array $sandwiches): string
{
    $info = '';
    foreach ($sandwiches as $sandwich) {
        $info .=
            '<section class= "sandwichcontainer">' .
            '<div class="sandwichinfo">' .
            '<h2>' . ucfirst($sandwich->getName()) . '</h2>' .
            '<img src="images/' . $sandwich->getImage() . '">' .
            '<p>Bread : ' . ucfirst($sandwich->getGrain()) . ' ' . $sandwich->getBread() . '</p>' .
            '<p> Filled with : ' . ucfirst(implode(", ", $sandwich->getIngredients())) . '</p>' .
            '<p> Served ' . ucfirst($sandwich->getTemperature()) . '</p>' .
            '</div>' .
            '</section>';

    } return $info;
}

print_r(displayAllSandwiches(createArrayOfSandwichObjects($sandwichesArray)));
