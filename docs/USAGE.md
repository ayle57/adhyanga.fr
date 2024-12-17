# Usage SCSS
src/
├── lib/
│   ├── styles/
│   │   ├── abstracts/           (Variables, mixins, fonctions, etc.)
│   │   │   ├── _variables.scss  (Variables globales)
│   │   │   ├── _mixins.scss     (Mixins réutilisables)
│   │   │   └── _functions.scss  (Fonctions SCSS réutilisables)
│   │   ├── base/                (Styles de base comme les reset ou typographie)
│   │   │   ├── _reset.scss      (Reset CSS ou normalisation des styles)
│   │   │   └── _typography.scss (Typographie globale)
│   │   ├── components/          (Styles pour les composants spécifiques)
│   │   │   ├── _buttons.scss    (Styles pour les boutons)
│   │   │   ├── _cards.scss      (Styles pour les cartes)
│   │   │   └── _modals.scss     (Styles pour les modales)
│   │   ├── layout/              (Styles pour la mise en page globale)
│   │   │   ├── _header.scss     (Styles pour l'en-tête)
│   │   │   ├── _footer.scss     (Styles pour le pied de page)
│   │   │   └── _grid.scss       (Grilles et flexbox pour la mise en page)
│   │   ├── pages/               (Styles spécifiques aux pages)
│   │   │   ├── _home.scss       (Styles spécifiques à la page d'accueil)
│   │   │   └── _about.scss      (Styles spécifiques à la page "À propos")
│   │   ├── themes/              (Thèmes et variantes de styles)
│   │   │   ├── _dark-theme.scss (Styles pour le thème sombre)
│   │   │   └── _light-theme.scss (Styles pour le thème clair)
│   │   ├── vendors/             (Styles pour les bibliothèques externes)
│   │   │   └── _bootstrap.scss  (Exemple d'intégration de Bootstrap)
│   │   └── main.scss            (Fichier principal qui importe tous les autres fichiers SCSS)
├── routes/                      (Pages de l'application)
│   ├── index.svelte
│   └── about.svelte
└── static/                      (Fichiers statiques comme les images)
