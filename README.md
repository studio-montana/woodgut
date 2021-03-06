# Woodgut

**Carcasse de plugin Wordpress pour gérer les élements Gutenberg spécifiques à un projet.**

Lors de la création d'un projet, vous serez amenés à devoir créer des blocks/plugins/stores Gutenberg spécifiques. Afin de ne pas intégrer ça dans le thème du projet (ce serait une erreur structurelle), ce plugin propose la carcasse de base pour faire ces développements.

**NOTE** : Ce plugin ne reçoit pas de mises à jour une fois installé sur le Wordpress final, il est spécifique à chaque projet.

**Ce plugin nécessite l'installation et l'activation de Woodkit > v2.x.x**

## Context Gutenberg

**Préparation :**

**Il faut absolument que Woodkit soit présent au même niveau que Woodgut (Woodgut dépend de Woodkit via des liens symboliques)**

**Pour un nouveau projet, il faut en général suivre les étapes suivantes pour la préparation :**

* vérifier si le dossier node_modules/ est présent dans ../woodkit/
* sinon, se déplacer dans *$ cd ../woodkit/* puis lancer *$ npm install* afin d'installer les dépendances du projet
* ensuite revenir dans woodgut *$ cd ../woodgut* pour la suite

**Pour ajouter un block :**

*Définition : un block Gutenberg est un élément qui peut s'ajouter dans le contenu*

* Dupliquer le dossier *src/blocks/\_blank\_* au même niveau et le renommer avec 'votre_slug' (Important : nommage en snake_case)
* Dans ce nouveau dossier, faire un rechercher/remplacer global dans ce nouveau dossier sur "\_blank\_" par 'votre_slug'
* Ouvrir webpack.config.js qui est à la racine du projet et ajouter la référence à votre nouveau block comme ceci :
  * {'entry': 'index.jsx', 'name': 'votre_slug', 'path': 'PATH_TO_YOUR_BLOCK_DIR', 'entry': 'index.jsx'},
* Lancez *$ npm run dev* (si webpack est déjà en route, vous devez le redémarrer)
* Commencez à developper
* Pour builder en production : lancez un *$ npm run build*
* Important : Terminez par charger le point d'entrée PHP PATH_TO_YOUR_BLOCK_DIR/index.php de votre module Gutenberg depuis la function **plugins_loaded()** de woodgut.php

**Pour ajouter un plugin :**

*Définition : un plugin Gutenberg est un élément qui s'ajoute à l'interface (sidebar / header / ...)*

* Dupliquer le dossier *src/plugins/\_blank\_* au même niveau et le renommer avec 'votre_slug' (Important : nommage en snake_case)
* Dans ce nouveau dossier, faire un rechercher/remplacer global dans ce nouveau dossier sur "\_blank\_" par 'votre_slug'
* Ouvrir webpack.config.js qui est à la racine du projet et ajouter la référence à votre nouveau block comme ceci :
  * {'entry': 'index.jsx', 'name': 'votre_slug', 'path': 'PATH_TO_YOUR_PLUGIN_DIR', 'entry': 'index.jsx'},
* Lancez *$ npm run dev* (si webpack est déjà en route, vous devez le redémarrer)
* Commencez à developper
* Pour builder en production : lancez un *$ npm run build*
* Important : Terminez par charger le point d'entrée PHP PATH_TO_YOUR_BLOCK_DIR/index.php de votre module Gutenberg depuis la function **plugins_loaded()** de woodgut.php

**Pour ajouter un store :**

*Définition : un store permet de gérer les états des blocks/plugins de façon globale*

* Dupliquer le dossier *src/stores/\_blank\_* au même niveau et le renommer avec 'votre_slug' (Important : nommage en snake_case)
* Dans ce nouveau dossier, faire un rechercher/remplacer global dans ce nouveau dossier sur "\_blank\_" par 'votre_slug'
* Ouvrir webpack.config.js qui est à la racine du projet et ajouter la référence à votre nouveau block comme ceci :
  * {'entry': 'index.jsx', 'name': 'votre_slug', 'path': 'PATH_TO_YOUR_STORE_DIR', 'entry': 'index.jsx'},
* Lancez *$ npm run dev* (si webpack est déjà en route, vous devez le redémarrer)
* Commencez à developper
* Pour builder en production : lancez un *$ npm run build*
* Important : Terminez par charger le point d'entrée PHP PATH_TO_YOUR_BLOCK_DIR/index.php de votre module Gutenberg depuis la function **plugins_loaded()** de woodgut.php

**Les composants/assets Woodkit**

* les composants React proposés par Woodkit sont accessible via *import COMPONENT_NAME from 'wkgcomponents/....'
  * exemple : import WKG_Media_Selector from 'wkgcomponents/media-selector'
* les assets React proposés par Woodkit sont accessible via *import ASSET_NAME  from 'wkgassets/...'*
  * exemple : import WKG_Icons from 'wkgassets/icons'

## Internationalisation

**Mise à jour des fichiers de traductions**

* Placez-vous à la racine du plugin
* Veillez à bien compiler vos modules avec la commande $ npm run build
* Ensuite, faite la commande *$ wp i18n make-pot ./ lang/woodgut.pot* afin de mettre à jour le fichier POT contenant les chaines à traduire
* Ouvrez tous les fichier .po avec Poedit et faite une mise à jour à partir d'un fichier .pot (en sélectionnant celui que nous venons de mettre à jour)
* Faites les traductions avec Poedit puis enregistrez
* Maintenant, mettez à jour les fichier JSON de traduction avec la commande suivante *$ wp i18n make-json lang/ --no-purge*

Pour en savoir plus, visitez : *https://www.seb-c.com/documentations/internationaliser-vos-modules-gutenberg/*
