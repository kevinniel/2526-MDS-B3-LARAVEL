# Installation de laravel : 

## Installer via composer : 

```
composer create-project laravel/laravel my-app
```

## Installer via laravel installer :

```
composer global require laravel/installer
laravel new example-app
```


## Installation des dépendances node

```
npm install
```

## Installation de la base de données

```
php artisan migrate
```

Quand il vous demande de créer un fichier de BDD, dites "oui"

## Mise en place de la clé de cryptage de l'application

```
php artisan key:generate
```

## Lancement du server Laravel

```
composer run dev
```

En cas de bug avec Composer, RDV dans votre fichier `composer.json` et modifiez la ligne : 

```
npx concurrently
    -c \"#93c5fd,#c4b5fd,#fb7185,#fdba74\"
    \"php artisan serve\"
    \"php artisan queue:listen --tries=1 --timeout=0\"
    \"php artisan pail --timeout=0\"
    \"npm run dev\" --names=server,queue,logs,vite --kill-others"
```

Si vous avez une erreur "pail", supprimez la partie `\"php artisan pail --timeout=0\"`

Vous pouvez aussi virer la partie `-c \"#93c5fd,#c4b5fd,#fb7185,#fdba74\"`.

Tout devrait refonctionner par la suite, et vous devriez avoir : 

```
npx concurrently \"php artisan serve\" \"php artisan queue:listen --tries=1 --timeout=0\" \"npm run dev\" --names=server,queue,logs,vite --kill-others"
```

## Mise en place de l'authentification

```
composer require laravel/breeze --dev
php artisan breeze:install
php artisan migrate
npm install
composer run dev
```

Si vous avez une erreur, rendez-vous dans le fichier `/resources/js/app.js` et supprimez la ligne `import './bootstrap';`
