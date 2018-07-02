<?php

require __DIR__ . '/../basicAuth.php';

$prefix = 'http://localhost:8001/data.php';
$username = '';
$password = '';
$token = '';
$result = getData($prefix, $username, $password, $token);

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
