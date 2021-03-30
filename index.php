<?php
require 'model.php';
?>
<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
</head>
<body>
<form action="check.php" method="post">
    <div>
        <label for="title">Entrer un titre</label>
        <input required type="text" name="title" id="title" value="<?= isset($_GET['title']) ? $_GET['title'] : '' ?>">
        <?= isset($_GET['errorTitle']) ? $_GET['errorTitle'] : '' ?>
    </div>
    <div>
        <?php
            $type = '';
            if (isset($_GET['type'])) {
                $type = $_GET['type'];
            }
        ?>
        <label for="type">Type de plat</label>
        <select name="type" id="type">
            <option value="">--- Selectionner un type</option>
            <option value="starter" <?= $type === 'starter' ? 'selected' : '' ?>>Entrée</option>
            <option value="meal" <?= $type === 'meal' ? 'selected' : '' ?>>Plat</option>
            <option value="desert" <?= $type === 'desert' ? 'selected' : '' ?>>Dessert</option>
        </select>
        <?= isset($_GET['errorType']) ? $_GET['errorType'] : ''; ?>
    </div>
    <div>
        <label for="salt">Sel</label>
        <input type="checkbox" name="ingredients[]" value="salt" id="salt">
        <label for="egg">Oeuf</label>
        <input type="checkbox" name="ingredients[]" value="egg" id="egg">
        <label for="flour">Farine</label>
        <input type="checkbox" name="ingredients[]" value="flour" id="flour">
        <label for="sugar">Sugar</label>
        <input type="checkbox" name="ingredients[]" value="sugar" id="sugar">
        <?= isset($_GET['errorIngredients']) ? $_GET['errorIngredients'] : ''; ?>
    </div>
    <button>OK</button>
</form>
<div>
    <ul>
        <?php
        $recipes = findAllRecipe('DESC');
        ?>
        <?php foreach ($recipes as $recipeData) : ?>
            <li>
                id : <?= $recipeData['id'] ?><br>
                title : <?= $recipeData['title'] ?><br>
                type : <?= $recipeData['type'] ?><br>
            </li>
        <?php endforeach; ?>
    </ul>
</div>
</body>
</html>
