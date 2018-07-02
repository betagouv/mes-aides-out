<?php

require __DIR__ . '/../mock.php';
$result = getData();

?>
<html>
    <head>
        <title></title>
    </head>
    <body>
        <p>Formulaire pré-rempli&nbsp;: </p>
        <form>
        <?php foreach ($result['data'] as $key => $value) : ?>
            <p>
                <label><?php echo $key ?></label>
                <input name="<?php echo $key ?>" value="<?php echo $value ?>">
            </p>
        <?php endforeach; ?>
        </form>
        <a href="index.php">Retour</a>
    </body>
</html>
