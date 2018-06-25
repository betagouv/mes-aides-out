> Téléservice de test pour l'intégration avec [Mes Aides](mes-aides.gouv.fr)

Le token d'authentification de ce téléservice est à spécifier dans la variable d'environnement `MES_AIDES_CALLBACK_TOKEN`.

Par exemple :

```bash
MES_AIDES_CALLBACK_TOKEN=xxxxxxxxxxxxxxxxxxxxxxxxx node app.js
```

Le prefix du endpoint de récupération de données est quand à lui à spécifier via `MES_AIDES_CALLBACK_PREFIX`.

Par exemple pour tester avec Mes Aides :
```bash
MES_AIDES_CALLBACK_PREFIX=https://mes-aides.gouv.fr/api/sitations/via/
```

# Installation

```bash
npm install
MES_AIDES_CALLBACK_PREFIX=ezeze MES_AIDES_CALLBACK_TOKEN=xxxxxxxxxxxxxxxxxxxxxxxxx node app.js
```

Accessible à localhost:3000/

Le préremplissage est possible sur l'endpoint localhost:3000/prefill avec un callback en paramètre.

Par exemple `localhost:3000/prefill?callback=https://mes-aides.gouv.fr/api/situations/via/xxxxxxxxx`

Pour tester ce service, deux endpoints `/data`, `/secured-data` ont été créés. Il génère un JSON  à partir des données fournies en query params.

Par exemple
```
http://localhost:3000/data?date_naissance_dem=12/12/1940&lieu_naissance_dem=Paris
```
génère
```
{"date_naissance_dem":"12/12/1940","lieu_naissance_dem":"Paris"}
```

Cela permet de tester le remplissage, par exemple avec :
```
http://localhost:3000/prefill/?code=date_naissance_dem=12/12/1940%26lieu_naissance_dem=Paris
```
Les `?`(`%3F`), `=`(`%3D`) et `&`(`%26`) de l'appel à `/data` doivent être URL encode pour fonctionner.

Pour fonctionner il faut spécifier le bon prefix
```
MES_AIDES_CALLBACK_PREFIX=http://localhost:3000/data?
MES_AIDES_CALLBACK_PREFIX=http://localhost:3000/secured-data?
```
