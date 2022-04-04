<?php
require_once 'db.php';

$db = 'sandwiches';
$sandwiches = fetchAllSandwiches(connectToDB($db));

echo '<pre>';
print_r ($sandwiches);
echo '</pre>';