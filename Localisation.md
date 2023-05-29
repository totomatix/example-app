# Ajouter le français sur Laravel

Lancer la commande suivante dans le terminal en tant que root (appuyer sur Entrée sur les pages bleues) :
`apt install php8.1-bcmath`

Ensuite : 
`../composer.phar require --dev laravel-lang/common`

Ensuite : 
`php artisan lang:publish`

Ensuite : 
`php artisan lang:add fr`

Ensuite : 
`php artisan lang:update`

Modifier le fichier *config/app.php* :
Remplacer *en* par *fr* à la ligne 86.

Vous devriez maintenant aavoir les messages d'erreurs de validation en français.