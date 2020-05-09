# Woodgut

**Carcasse de plugin Wordpress pour gérer les élements Gutenberg spécifiques à un projet.**

Lors de la création d'un projet, vous serez amenés à devoir créer des blocks/plugins/stores spécifiques. Afin de ne pas intégrer ça dans le thème du projet (qui serait une erreur structurelle), ce plugin propose la carcasse de base pour faire ces développements.

**Ce plugin nécessite l'installation et l'activation de Woodkit > v2.x.x**

## Context Gutenberg

**Préparation :**

**Il faut absolument que Woodkit soit présent au même niveau que Woodgut (Woodgut dépend de Woodkit via des lien symboliques)**

Avant de commencer, nous allons devoir configurer notre contexte de développement, pas de panique, Wookdit gère beaucoup de choses.
* lancer un $ npm install (le fichier package.json est défini par Woodkit - c'est un lien symbolique)

**Pour ajouter un block :**

*Définition : un block Gutenberg est un élément qui peut s'ajouter dans le contenu*

* Dupliquer le dossier *src/blocks/_blank_* au même niveau et le renommer avec 'votre_slug' (Important : nommage en snake_case)
* Dans ce nouveau dossier, faire un rechercher/remplacer global dans ce nouveau dossier sur "_blank_" par 'votre_slug'
* Ouvrir webpack.config.js qui est à la racine du projet et ajouter la référence à votre nouveau block comme ceci : 
  * {'entry': 'index.jsx', 'name': 'votre_slug', 'path': 'PATH_TO_YOUR_BLOCK_DIR', 'entry': 'index.jsx'},
* Lancez *$ npm run dev* (si webpack est déjà en route, vous devez le redémarrer)
* Commencez à developper
* Pour builder en production : lancez un *$ npm run build*
* Important : Terminez par charger le point d'entrée PHP PATH_TO_YOUR_BLOCK_DIR/index.php de votre module Gutenberg depuis la function **plugins_loaded()** de woodgut.php

**Pour ajouter un plugin :**

*Définition : un plugin Gutenberg est un élément qui s'ajoute à l'interface (sidebar / header / ...)*

* Dupliquer le dossier *src/plugins/_blank_* au même niveau et le renommer avec 'votre_slug' (Important : nommage en snake_case)
* Dans ce nouveau dossier, faire un rechercher/remplacer global dans ce nouveau dossier sur "_blank_" par 'votre_slug'
* Ouvrir webpack.config.js qui est à la racine du projet et ajouter la référence à votre nouveau block comme ceci : 
  * {'entry': 'index.jsx', 'name': 'votre_slug', 'path': 'PATH_TO_YOUR_PLUGIN_DIR', 'entry': 'index.jsx'},
* Lancez *$ npm run dev* (si webpack est déjà en route, vous devez le redémarrer)
* Commencez à developper
* Pour builder en production : lancez un *$ npm run build*
* Important : Terminez par charger le point d'entrée PHP PATH_TO_YOUR_BLOCK_DIR/index.php de votre module Gutenberg depuis la function **plugins_loaded()** de woodgut.php

**Pour ajouter un store :**

*Définition : un store permet de gérer les états des blocks/plugins de façon globale*

* Dupliquer le dossier *src/stores/_blank_* au même niveau et le renommer avec 'votre_slug' (Important : nommage en snake_case)
* Dans ce nouveau dossier, faire un rechercher/remplacer global dans ce nouveau dossier sur "_blank_" par 'votre_slug'
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
