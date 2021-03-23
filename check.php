<?php

if ($_SERVER['REQUEST_METHOD'] !== 'POST') {
    die('Forbidden');
}

$title = trim($_POST['title']);

$errors = [];

if (empty($title)) {
    $errors['errorTitle'] = 'Veuillez entrer un titre';
}
if (empty($_POST['type'])) {
    $errors['errorType'] = 'Veuillez sélectionner un type';
}
if (!isset($_POST['ingredients'])) {
    $errors['errorIngredients'] = 'Veuillez choisir au moins 1 ingrédient';
}

if (empty($errors)) {
    //persist DB
    header('Location: success.php');
} else {
    header('Location: index.php?' . http_build_query($errors) . '&' . http_build_query($_POST));
}
var_dump($errors);
