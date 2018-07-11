> Librairie de connexion à l'API de [mes-aides.gouv.fr](https://mes-aides.gouv.fr)

Un usage basique de la librairie est présenté dans le fichier `exemples\script.php`. Il utilise des paramètres passés en ligne de commande :
`php php_basic/examples/script.php prefix username password token`.
Pour des tests en production `prefix` doit être `https://mes-aides.gouv.fr/api/situations/via/`.
`username` et `password` vous sont fournis sur demande.
`token` correspond au _JWT token_ associé au consentement d'un utilisateur de mes-aides.gouv.fr à partager des informations avec vous.

Des téléservices d'examples peuvent être lancés à partir du dossier contenant ce fichier d'instructions avec la commande suivante `php -S localhost:8000 -t examples`.
Vous aurez alors accès à http:/localhost:8000/index.php, http:/localhost:8000/mock.php et http:/localhost:8000/data.php.

Pour voir fonctionner http:/localhost:8000/localData.php qui préremplit le formulaire à partir d'une API JSON improvisée (http:/localhost:8000/data.php), deux serveurs doivent être lancé en parallèle. Le second serveur doit être lancé avec la commande suivante `php -S localhost:8001 -t examples`.

Enfin pour tester http://localhost:8000/basicAuth.php?code=xxx qui préremplit à partir de mes-aides.gouv.fr il faut utiliser la commande suivante :
export MES_AIDES_API_USER=username; export MES_AIDES_API_PASSWD=token; export MES_AIDES_API_PREFIX=https:/mes-aides.gouv.fr/api/situations/via/; php -d variables_order=EGPCS -S localhost:8000 -t examples

Les valeurs des variables d'environnement sont à ajuster avec les informations qui vous serons communiquées.
