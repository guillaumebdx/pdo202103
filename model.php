<?php
require 'connect.php';

function connect(): PDO
{
    return new PDO(DSN, USER, PASSWORD);
}

function createRecipe(array $recipeData): int
{
    $pdo   = new PDO(DSN, USER, PASSWORD);
    $query = 'INSERT INTO recipe (title, type) VALUES (:title, :type)';
    $statement = $pdo->prepare($query);
    $statement->bindValue(':title', $recipeData['title'], PDO::PARAM_STR);
    $statement->bindValue(':type', $recipeData['type'], PDO::PARAM_STR);
    $statement->execute();
    return $pdo->lastInsertId();
}

function findAllRecipe(string $order = 'ASC'): array
{
    $pdo   = connect();
    $query = 'SELECT * FROM recipe ORDER BY id ' . $order;
    $statement = $pdo->query($query);
    return $statement->fetchAll(PDO::FETCH_ASSOC);
}
