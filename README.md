## Name

**INMOZON**
## Description


## Configuracion previa, usuario y grupo para apache

Suponiendo que por defecto el usuario y el grupo de Apache en Linux es **www-data**

Añadir el usuario logeado (Linux $USER) al grupo www-data para que tenga los permisos de Apache
```
sudo useradd -g www-data $USER
```

Si el usuario existe
```
sudo usermod -a -G www-data $USER
```

Para verificar que esta asignado
```
id $USER
groups $USER
```

##Creacion de un nuevo proyecto en Laravel.

```
cd /PROJECT_NAME_PARENT/FOLDER/  (como /var/www/ o  ~/Projects/)
composer create-project laravel/laravel=7.24.* PROJECT_NAME --prefer-dist
chown -R $USER:www-data ./PROJECT_NAME_FOLDER/
sudo find ./PROJECT_NAME_FOLDER/ -type f -exec chmod 664 {} \;
sudo find ./PROJECT_NAME_FOLDER/ -type d -exec chmod 775 {} \;
```

#####Nota: Para que un editor/IDE pueda modificar los ficheros en localhost, los permisos en localhost tienen que ser 664 (ficheros) y 765 (directorios). En el servidor de produccion 644 y 755

```
sudo chgrp -R www-data ./PROJECT_NAME_FOLDER//storage/ ./PROJECT_NAME_FOLDER//bootstrap/cache/
sudo chmod -R ug+rwx ./PROJECT_NAME_FOLDER//storage/ ./PROJECT_NAME_FOLDER//bootstrap/cache/
```
####Instalar GIT

```
git init
```

####Copiar el **.gitignore** general en el directorio raiz del proyecto ./PROJECT_NAME_FOLDER/

Este gitignore viene con todos los tipos de directorios y archivos que hay que excluir antes de seguir.

```
git config --local user.name "YOUR_REAL_NAME_AND_SURNAME"
git config --local user.email "YOUR_EMAIL_ACCOUNT"
git config --local core.editor vi
git remote add origin https://YOUR_BITBUCKET_USER_NAME_ACCOUNT@bitbucket.org/PROJECT_NAME/PROJECT_NAME.git
git fetch --all
git reset --hard origin/master
git branch test origin/test
git branch hotfixes origin/hotfixes
git branch develop origin/develop
git checkout develop
```

##Crear la base de datos

Arrancar servidor MySQL
```
sudo systemctl start mysql
```

Crear una base de datos con el nombre del proyecto

```
mysql -u root -p
Enter password: 

Welcome to the MySQL monitor.  Commands end with ; or \g.
Your MySQL connection id is 2
Server version: 5.7.31-0ubuntu0.18.04.1 (Ubuntu)

Copyright (c) 2000, 2020, Oracle and/or its affiliates. All rights reserved.

Oracle is a registered trademark of Oracle Corporation and/or its
affiliates. Other names may be trademarks of their respective
owners.

Type 'help;' or '\h' for help. Type '\c' to clear the current input statement.

mysql> **create database DATABASE_NAME;**
Query OK, 1 row affected (0.00 sec)

mysql> **exit**
Bye
```

Si no existe el fichero **.env**, hay que hacer una copia del fichero **.env.example**

```
cp ./PROJECT_NAME_FOLDER/.env.example ./PROJECT_NAME_FOLDER/.env
```
 
En el fichero **.env** configurar los parametros para acceder a la base de datos.

```
DB_DATABASE=PROJECT_NAME
DB_USERNAME=user_name
DB_PASSWORD=password
```

Ahora instalamos el proyecto para que composer genere la carpeta vendor y todas las dependencias.

```
composer install
```

Si no se usa una instalacion inicial, es conveniente ejecutar

```
composer update
composer dump-autoload
php artisan key:generate
php artisan optimize
```

Luego ejecutar las migraciones y los seeders

```
composer dump-autoload
php artisan migrate
php artisan db:seed
```

Si se desea hacer una instalacion limpia solamente de la base de datos (borrar todas las tablas y dejar la base de datos creada de nuevo).

```
php artisan migrate:refresh --seed
```

###Actualizar .gitignore
Es posible que a medida que se vaya actualizando la lista de ficheros que no se desea incluir en el repositorio, nos encontremos con que ya estan incluidos.

Para poder actualizar el repositorio con los nuevas altas en el .gitignore hay que ejecutar estos comandos

**Hay que asegurarse que hemos hecho un commit con TODOS los cambios. Includo el propio .gitignore. Lo ideal es la rama limpia**

```
cd /PROJECT_NAME_FOLDER/
git rm -r --cached
git add .
git commit -m ".gitignore fix"
git push
```

## Installation PHPStorm IDE helper for Laravel

[Documentacion oficial](https://github.com/barryvdh/laravel-ide-helper/blob/master/README.md)

A grosso modo seguir estos pasos

Require this package with composer using the following command:

```bash
composer require --dev barryvdh/laravel-ide-helper
```

This package makes use of [Laravels package auto-discovery mechanism](https://medium.com/@taylorotwell/package-auto-discovery-in-laravel-5-5-ea9e3ab20518), which means if you don't install dev dependencies in production, it also won't be loaded.

If for some reason you want manually control this:
- add the package to the `extra.laravel.dont-discover` key in `composer.json`, e.g.
  ```json
  "extra": {
    "laravel": {
      "dont-discover": [
        "barryvdh/laravel-ide-helper",
      ]
    }
  }
  ```
  If you want to manually load it only in non-production environments, instead you can add this to your `AppServiceProvider` with the `register()` method:
  ```php
  public function register()
  {
      if ($this->app->environment() !== 'production') {
          $this->app->register(\Barryvdh\LaravelIdeHelper\IdeHelperServiceProvider::class);
      }
      // ...
  }
  ```
  
 #####Automatic PHPDoc generation for Laravel Facades
  
  ```bash
  php artisan clear-compiled
  php artisan ide-helper:generate
  # Please make sure to back up your models, before writing the info.  
  php artisan ide-helper:models --write --dir="path/to/models" // optional: --ignore="Post,User"
  php artisan ide-helper:meta
  ```
  
  This will generate the file `_ide_helper.php` which is expected to be additionally parsed by your IDE for autocomplete. You can use the config `filename` to change its name.
  
  You can configure your `composer.json` to do this each time you update your dependencies:
  
  ```js
  "scripts": {
      "post-update-cmd": [
          "Illuminate\\Foundation\\ComposerScripts::postUpdate",
          "@php artisan ide-helper:generate",
          "@php artisan ide-helper:meta"
      ]
  },
  ```
##### Automatic PHPDocs generation for Laravel Fluent methods

If you need PHPDocs support for Fluent methods in migration, for example

```php
$table->string("somestring")->nullable()->index();
```

After publishing vendor, simply change the `include_fluent` line your `config/ide-helper.php` file into:

```php
'include_fluent' => true,
```

Then run `php artisan ide-helper:generate`, you will now see all Fluent methods recognized by your IDE.

##### Auto-completion for factory builders

If you would like the `factory()->create()` and `factory()->make()` methods to return the correct model class,
you can enable custom factory builders with the `include_factory_builders` line your `config/ide-helper.php` file.

```php
'include_factory_builders' => true,
```
