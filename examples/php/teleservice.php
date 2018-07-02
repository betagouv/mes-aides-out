<?php

require __DIR__ . '/../../vendor/autoload.php';

use BetaGouv\MesAides\SituationProvider;
use GuzzleHttp\Client;
use GuzzleHttp\Handler\MockHandler;
use GuzzleHttp\HandlerStack;
use GuzzleHttp\Psr7\Response;

$payload = $_COOKIE['payload'];
$body = base64_decode($payload);
setcookie('payload', '', time() - 3600);

$mock = new MockHandler([
    new Response(200, [], $body),
]);

$handler = HandlerStack::create($mock);
$client = new Client(['handler' => $handler]);

$sp = new SituationProvider('foo', 'bar', $client);

$data = $sp->fromToken($token);

?>
<html>
    <head>
        <title></title>
    </head>
    <body>
        <p>Les informations ont été renvoyées : </p>
        <form>
        <?php foreach ($data as $key => $value) : ?>
            <p>
                <label><?php echo $key ?></label>
                <input name="<?php echo $key ?>" value="<?php echo $value ?>">
            </p>
        <?php endforeach; ?>
        </form>
        <a href="index.php">Retour</a>
    </body>
</html>
