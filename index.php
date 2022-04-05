<?php
require_once 'db.php';
require_once 'Sandwich.php';
$db = 'sandwiches';
$sandwiches = fetchAllSandwiches(connectToDB($db));

//echo '<pre>';
//print_r ($sandwiches);
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

echo '<pre>';
print_r(createArrayOfSandwichObjects($sandwiches));
echo '</pre>';














//function createArrayOfSandwiches(array $sandwiches): array
//{
//    $sandArray = [];
//    $ingArray = [];
//    foreach ($sandwiches as $sandwich) {
//        $sandwich['ingArray'] = $ingArray;
//        if (!in_array($sandwich['id'], $sandArray)){
//            $ingArray[] = $sandwich['ingredient'];
//            $sandArray[] = $sandwich;
//        }
//        else {
//            $sandwich[$ingArray][] = $sandwich['ingredient'];
//        }
//    }
//    return $sandArray;
//}
//echo '<pre>';
//print_r (createArrayOfSandwiches($sandwiches));
//echo '</pre>';