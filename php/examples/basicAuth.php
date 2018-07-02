<?php

require __DIR__ . '/../basicAuth.php';

$prefix = @$_ENV['MES_AIDES_API_PREFIX'] ?: 'https://mes-aides.gouv.fr/api/situations/via/';

$queries = array();
parse_str($_SERVER['QUERY_STRING'], $queries);
$token = $queries['code'];

$username = @$_ENV['MES_AIDES_API_USER'] ?: 'localtest';
$password = @$_ENV['MES_AIDES_API_PASSWD'] ?: 'faux-token-local';

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
