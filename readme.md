<h1>Simple User Registration using Laravel framework</h1>

## Optimizations

- Pretty Straight forward Multi step User Registration
- Data saved in **Cookie** before Submit, so when user come back he can see filled out data where he left off
- Database normalized 
- Database cred: 
  DB_CONNECTION=mysql;
  DB_HOST=127.0.0.1;
  DB_PORT=3306;
  DB_DATABASE=user-registration;
  DB_USERNAME=root;
  DB_PASSWORD=;

## Follow the steps to run the app in local environment

- Prerequisite (**XAMPP/WAMPP** or any Server in your system , **Composer**, **GIT**)
- Create the database named **user-registration** with type **utf8_general_ci**
- Download/Clone the project first
- Open the console and cd to the root directory of your project
- Run **composer install** or **php composer.phar install**
- Run **php artisan key:generate**
- Run the command in your terminal: **php artisan migrate** 
- Run the command in your terminal: **php artisan serve** 
- Open the browser and hit: **localhost:8000**

//////// OR /////////////////////////
- instead of running **php artisan serve** command just put the project (what you have cloned/downloaded) into **XAMPP/htdocs/** directory (if you have XAMPP installed) 

