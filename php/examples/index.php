<?php

require __DIR__ . '/../mock.php';

$mockData = getData();

?>
<html>
    <head>
        <title>Test du préremplissage de formulaire</title>
    </head>
    <body>
        <p>Plusieurs endpoints ont été créés pour illustrer l'intégration d'une librairie de connexion à Mes Aides&nbsp;:</p>
        <ul>
          <li><a href="mock.php">mock.php</a> génère un formulaire pré-rempli à partir d'un ensemble de clés/valeurs figé.</li>
          <li><a href="data.php">data.php</a> génère un payload JSON correspondant à cet ensemble de clés/valeurs.</li>
          <li><a href="localData.php">localData.php</a> génère un formulaire pré-rempli en récupérant les données à partir de <a href="data.php">data.php</a>.</li>
          <li><a href="basicAuth.php">basicAuth.php</a> génère un formulaire pré-rempli à partir du code passé en query param.</li>
        </ul>

        <p>Pour faire fonctionner <a href="localData.php">localData.php</a>, une <strong>seconde</strong> instance du serveur est nécessaire (Le serveur de base est single thread) sur le port 8001.</p>
    </body>
</html>
