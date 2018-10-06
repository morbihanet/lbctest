## A propos
### Initialisation

Pour utiliser l'application avec Docker

Se rendre à la racine du projet et taper la ligne de commande suivante

``composer install``

``php -r "file_exists('.env') || copy('.env.example', '.env');"``

Une fois sur la machine, taper dans l'ordre

``docker-compose down && docker-compose run app bash``

``php artisan key:generate``

``php artisan LBC:start``

``exit``

``docker-compose down && docker-compose up -d``

Après se rendre sur un navigateur à l'adresse 0.0.0.0:8080

L'email est ``admin@admin.com``

Le mot de passe est ``1234``

### Tests unitaires

Les tests unitaires se lancent avec Docker

``docker-compose down && docker-compose run app bash``

``php vendor/bin/phpunit``


