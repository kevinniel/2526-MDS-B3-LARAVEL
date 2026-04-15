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
