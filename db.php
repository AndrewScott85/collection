<?php

function connectToDB(string $db): PDO
{
    $host = 'db';
    $charset = 'utf8mb4';
    $user = 'root';
    $pass = 'password';

    $dataSourceName = "mysql:host=$host;dbname=$db;charset=$charset";

    $options = [
        PDO::ATTR_DEFAULT_FETCH_MODE => PDO::FETCH_ASSOC,
        PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION,
        PDO::ATTR_EMULATE_PREPARES => false,
    ];

    try {
        $dbConnection = new PDO($dataSourceName, $user, $pass, $options);
    } catch (PDOException $excptn) {
        throw new PDOException($excptn->getMessage(), (int)$excptn->getCode());
    }

    return $dbConnection;
}

function fetchAll(PDO $dbConnection, string $sql, array $params = null): array
{
    $query = $dbConnection->prepare($sql);

    $query->execute($params);

    return $query->fetchAll();
}

function fetchAllSandwiches(PDO $dbConnection): array
{
    $sql =
    'SELECT `sandwiches`.`id`, 
       `sandwiches`.`name`, 
       `breads`.`bread`, 
       `grains`.`grain`, 
       `temperatures`.`temperature`, 
       `ingredients`. `ingredient`, 
       `sandwiches` . `image`
        FROM `sandwiches`
        INNER JOIN `breads`
        ON `sandwiches`.`bread` = `breads`. `id`
        INNER JOIN `grains`
        ON `sandwiches`. `grain` = `grains` . `id`
        INNER JOIN `temperatures`
        ON `sandwiches`.`temperature` = `temperatures` . `id`
        LEFT JOIN `junct`
        ON `sandwiches`.`id` = `junct`.`sandwich_fk`
        LEFT JOIN `ingredients`
        ON `junct`.`ingredient_fk` = `ingredients`. `id`
        ORDER BY `sandwiches`.`id`;';


    return fetchAll($dbConnection, $sql);
}