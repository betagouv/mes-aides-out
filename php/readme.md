> Librairie de connexion à l'API de [mes-aides.gouv.fr](https://mes-aides.gouv.fr)

Le serveur peut être lancé à partir du dossier contenant ce fichier d'instructions avec la commande suivante `php -S localhost:8000 -t examples`.
Vous aurez alors accès à http:/localhost:8000/index.php, http:/localhost:8000/mock.php et http:/localhost:8000/data.php.

Pour voir fonctionner http:/localhost:8000/localData.php qui préremplit le formulaire à partir d'une API JSON improvisée (http:/localhost:8000/data.php), deux serveurs doivent être lancé en parallèle. Le second serveur doit être lancé avec la commande suivante `php -S localhost:8001 -t examples`.

Enfin pour tester http://localhost:8000/basicAuth.php?code=xxx qui préremplit à partir de mes-aides.gouv.fr il faut utiliser la commande suivante :
export MES_AIDES_API_USER=localtest; export MES_AIDES_API_PASSWD=faux-token-local; export MES_AIDES_API_PREFIX=http:/localhost:9000/api/situations/via/; php -d variables_order=EGPCS -S localhost:8000 -t examples/php/examples

Les valeurs des variables d'environnement est à ajuster pour utiliser les informations qui vous serons communiquées.
