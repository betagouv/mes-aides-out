> Téléservice de test pour l'intégration avec [Mes Aides](mes-aides.gouv.fr)

Le token d'authentification de ce téléservice est à spécifier dans une variable d'environnement.

Par exemple :

```bash
MES_AIDES_CALLBACK_TOKEN=xxxxxxxxxxxxxxxxxxxxxxxxx node app.js
```

# Installation

```bash
npm install
MES_AIDES_CALLBACK_TOKEN=xxxxxxxxxxxxxxxxxxxxxxxxx node app.js
```

Accessible à localhost:3000/

Le préremplissage est possible sur l'endpoint localhost:3000/prefill avec un callback en paramètre.

Par exemple `localhost:3000/prefill?callback=https://mes-aides.gouv.fr/api/situations/via/xxxxxxxxx`


Pour tester ce service, un endpoint `/data` a été créé. Il génère un JSON  à partir des données fournies en query params.

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
http://localhost:3000/prefill/?callback=http://localhost:3000/data%3Fdate_naissance_dem=12/12/1940%26lieu_naissance_dem=Paris
```
Les `?`(`%3F`) et `&`(`%26`) de l'appel à `/data` doivent être URL encode pour fonctionner.
