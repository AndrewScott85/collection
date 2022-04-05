<?php

require_once '../functions.php';

use PHPUnit\Framework\TestCase;

class collection extends TestCase
{
    public function testGivenEmptyArrayReturnEmptyString()
    {
        $array = [];

        $result = displayRecords($array);

        $this->assertEquals('', $result);
    }

    public function testGivenValidSandwichReturn()
    {
        $expected = '<section class="sandwichcontainer"><img class="sandwichinfo"><div class="sandwichinfo">
        <h2>Breakfast</h2><img src="images/breakfast.jpg"><p>Bread : Brown roll</p>
        <p>Filled with : Bacon, mushrooms, potato scone</p><p>Served Hot</p>
        </div></section>';

        $records[] =  array(
            'id' => 1,
            'name' => 'Breakfast',
            'artist' => 'Miles Davis',
            'year' => 1959,
            'record_label' => 'Columbia Records',
            'song' => 'Blue in Green',
            'img_name' => 'kindofblue.png'
        );

        $result = displayRecords($records);

        $this->assertEquals($expected, $result);
    }

    public function testGivenStringThrowError()
    {
        $records = 'Barry';

        $this->expectException(TypeError::class);

        $result = displayRecords($records);
    }
}