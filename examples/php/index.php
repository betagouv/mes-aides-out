<?php

$data = array(
    'date_naissance_dem' => '1940-12-12',
    'situationfam_dem' => 'Célibataire',
    'salaire_dem' => 800 * 2,
    'montantRetraite_dem' => 500 * 12,
    'allocations_dem' => 200 * 12
);

setcookie('payload', base64_encode(json_encode($data)));

?>
<html>
    <head>
        <title></title>
    </head>
    <body>
        <p>Les informations suivantes seront envoyées au téléservice : </p>
        <ul>
        <?php foreach ($data as $key => $value) : ?>
            <li><?php echo "{$key} = {$value}" ?></li>
        <?php endforeach; ?>
        </ul>
        <a href="teleservice.php?code=<?php echo md5(rand()) ?>">Accéder au téléservice</a>
    </body>
</html>
