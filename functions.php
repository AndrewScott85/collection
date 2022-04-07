<?php
require_once 'Sandwich.php';

function createArrayOfSandwichObjects(array $sandwichesDb): array
{
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

function displayAllSandwiches(array $sandwiches): string
{
    $info = '';
    foreach ($sandwiches as $sandwich) {
        $info .=
            '<section class="sandwichcontainer">' .
            '<h2>' . ucfirst($sandwich->getName()) . '</h2>' .
            '<img class="image" src="images/' . $sandwich->getImage() . '" alt="sandwichimage">' .
            '<p>Bread: ' . ucfirst($sandwich->getGrain()) . ' ' . $sandwich->getBread() . '</p>' .
            '<p>Filled with: ' . ucfirst(implode(", ", $sandwich->getIngredients())) . '</p>' .
            '<p>Served: ' . ucfirst($sandwich->getTemperature()) . '</p>' .
            '</section>';
    }
    return $info;
}
