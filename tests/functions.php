<?php

require_once '../functions.php';

use PHPUnit\Framework\TestCase;

class functions extends TestCase
{
    public function testDisplayAllSandwiches_GivenEmptyArrayReturnEmptyString()
    {
        $array = [];

        $result = displayAllSandwiches($array);

        $this->assertEquals('', $result);
    }

    public function testDisplayAllSandwiches_GivenValidSandwichReturnValidHTML()
    {
        $expected = '<section class="sandwichcontainer"><h2>Breakfast</h2>' .
            '<img class="image" src="images/breakfast.png" alt="sandwichimage"><p>Bread: Brown roll</p>' .
            '<p>Filled with: Bacon, mushrooms, potato scone</p><p>Served: Hot</p>' .
            '</section>';
        $sandwich = new Sandwich(
             1,
            'breakfast',
            'breakfast.png',
            'roll',
            'brown',
            'hot',
            'bacon, mushrooms, potato scone'
        );
        $sandwiches[] = $sandwich;
        $result = displayAllSandwiches($sandwiches);

        $this->assertEquals($expected, $result);
    }

    public function testDisplayAllSandwiches_GivenStringThrowError()
    {
        $sandwiches = 'Barry';

        $this->expectException(TypeError::class);

        $result = displayAllSandwiches($sandwiches);
    }

    public function testCreateArrayOfSandwichObjects_GivenStringThrowError()
    {
        $sandwiches = 'Barry';

        $this->expectException(TypeError::class);

        $result = createArrayOfSandwichObjects($sandwiches);
    }

    public function testCreateArrayOfSandwichObjects_GivenSandwichesReturnArrayOfObj()
    {
        $sandwiches[] = array (
            'id' => 1,
            'name' => 'breakfast',
            'image' => 'breakfast.png',
            'bread' => 'roll',
            'grain' => 'brown',
            'temperature' => 'hot',
            'ingredient' => 'bacon'
        );

        $result = createArrayOfSandwichObjects($sandwiches);
        $this->assertIsArray($result);
        $this->assertGreaterThan(0, count($result));
    }
}

