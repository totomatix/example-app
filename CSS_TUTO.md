# Tuto pour faire du CSS dans Laravel avec VITE <!-- omit in toc -->

- [Installation de node.js et npm (à faire une seule fois)](#installation-de-nodejs-et-npm-à-faire-une-seule-fois)
- [Installation des dépendances npm (à faire une seul fois)](#installation-des-dépendances-npm-à-faire-une-seul-fois)
- [Ajouter du CSS](#ajouter-du-css)
- [Lier le CSS dans les vues Blade](#lier-le-css-dans-les-vues-blade)
- [Mise à jour du CSS](#mise-à-jour-du-css)


## Installation de node.js et npm (à faire une seule fois)

Dans le terminal :

`su`

`mot de passe habituel`

`curl -fsSL https://deb.nodesource.com/setup_20.x | bash - &&\`

`apt-get install -y nodejs` 

`exit`

## Installation des dépendances npm (à faire une seul fois)

Dans le terminal :

`npm install`

## Ajouter du CSS

Le css doit être placé dans le fichier `app.css` présent dans le dossier `resources/css`.

## Lier le CSS dans les vues Blade

Ajouter le code huivant dans la balise `head` :
`@vite(['resources/css/app.css'])`

## Mise à jour du CSS

Quand le CSS présent dans le fichier app.css est mis à jour il faut lancer la commande suivante dans le terminal pour que les changements apparaissent sur la page :
`npm run build`.



