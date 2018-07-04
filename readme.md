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
MES_AIDES_CALLBACK_PREFIX= MES_AIDES_CALLBACK_TOKEN=xxxxxxxxxxxxxxxxxxxxxxxxx node app.js
```

Accessible à localhost:3000/

Le préremplissage est possible sur l'endpoint localhost:3000/prefill avec un callback en paramètre.

Par exemple `localhost:3000/prefill?callback=https://mes-aides.gouv.fr/api/situations/via/xxxxxxxxx`
