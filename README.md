# ECF Arcadia (EN)
*Illusory application of a Zoo*

## Description of the project
 Welcome to the **Zoo Arcadia** app !

This project was developed as part of my *Développeur web et web mobile - Flutter* training carried out with STUDI, an online training organization.

The application is a full website witch allows :

- [x] visitor to discover animals of fictional zoo, habitats in which the animals are installed, the general condition of the latter, the services that Arcadia offers
as well as schedules and the possibility of leaving a review.
- [x]  And then, as a Zoo professional, to administer the content (create, read, update and delete information about the animals).

## Requirements :
- [PHP](https://www.php.net/downloads.php) 8.2 or higher installed.
- [Composer](https://getcomposer.org/download/) installed. (To manage PHP dependencies)
- Laravel 11 -> telescope (install via Composer if needed)
- Database MySQL
- Database MongoDB
- Node.js and npm (to manage JavaScript dependencies)

## Stack 
1.Frontend :
- HTML: the markup language used to structure content.
- CSS: the styling language that determines the visual appearance.
- JavaScript: used to make the application interactive.

2.Backend :
- Programming language PHP with Laravel
- Database: for storing and managing data. SQL database (MySQL) and NoSQL database (MongoDB)
- Server OVH
## Local installation :

Clone the repository
```shell
git clone https://github.com/Isabelle-RJ/laravel-project-arcadia.git
```
Go to the directory project
```shell
cd laravel-project-arcadia
```
Install all package composer.json:
```shell
composer install
```
Copy .env.example -> create `.env` -> paste content `.env.example` and change lines 22-26.
```shell
cp .env-example .env
```
Change if you need SESSION_DRIVER in `.env`

Start Laravel server in your IDE terminal :
```shell
php artisan key:generate

php artisan migrate

php artisan migrate:fresh --seed

php artisan storage:link
```

```shell
php artisan serve
```
For run vite :
```shell
npm install
npm run dev
```

Install telescope :
```shell
composer require laravel/telescope 
```
```shell
php artisan telescope:install
```
Install Docker : <br>
[Docker](https://docs.docker.com/desktop/setup/install/windows-install/)

Install MongoDB :
```shell
Get file Thread Safe (TS) 
```
[Download here](https://pecl.php.net/package/mongodb)

- Open `php.ini` file and copy/paste "php_mongodb.dll" in `ext` document. And, add `extension=php_mongodb.dll` in your `php.ini` file.

[Laravel Doc](https://laravel.com/docs/11.x)

For sass :
```shell
npm install -D sass-embedded
```

## Create admin account :
Get this command and follow instructions

``` php artisan register:admin ```

### Accounts for testing (Seeders) :
```Admin : joseadmin@gmail.com -- 123456789aze```

```Veterinarian : josetteveterinarian@gmail.com -- 123456789aze```

```Employee : josephemployee@gmail.com -- 123456789aze```

### Author :

[Isabelle Radermecker Jurain](https://github.com/Isabelle-RJ/arcadia-project)
