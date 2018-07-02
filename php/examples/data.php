<?php

require __DIR__ . '/../src/mock.php';
$data = getData();
$payload = json_encode($data);
header('Content-Type: application/json');
?>
<?php echo $payload ?>
