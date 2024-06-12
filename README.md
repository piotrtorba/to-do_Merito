# to-do_Merito
The simplest 'To do list' in PHP and MySQL with password hashing and anti XSS mechanism.

Aby korzystać z aplikacji 'To Do List' w przeglądarce w systemie Windows należy zainstalować oprogramowanie XAMPP, w systemie Linux należy zainstalować serwer MySQL na localhost. W obu systemach na skonfigurowanym już serwerze MySQL należy przepowadzić jednorazowo proces utworzenia bazy danych wykonując 4 poniższe kroki:

1. Ręcznie utworzyć bazę danych o nazwie 'toDOlist' poleceniem:    CREATE DATABASE toDOlist;
2. Użyć bazy danych poleceniem:    USE toDOlist;
3. Utworzyć tabele poleceniem:    CREATE TABLE user(user_id int auto_increment primary key, username varchar(255), password varchar(255));
4. Utworzyć drugą tabele poleceniem:    CREATE TABLE task(user_id varchar(255), task_id int auto_increment primary key, task varchar(255), date varchar(255), time varchar(255);

Do testowania aplikacji lokalnie w przeglądarce należy wejść na adres URL: localhost/signup.php po skopiowaniu wszystkich plików do foldera serwera www (XAMPP dla Windows, Apache dla Linux /var/www/html/).

Autor: Piotr Torba, email: wwx11875@student.warszawa.merito.pl

---------------- English -----------------------------

To use the 'To Do List' application in a browser on Windows you need to install XAMPP software, on Linux you need to install MySQL server on localhost. On both systems, on the already configured MySQL server, you need to go through the process of creating a database once by following the following 4 steps:

1. manually create a database named 'toDOlist' with the command:    CREATE DATABASE toDOlist;
2. Use the database with the command:    USE toDOlist;
3. create tables with the command:    CREATE TABLE user(user_id int auto_increment primary key, username varchar(255), password varchar(255));
4 Create a second table with the command:    CREATE TABLE task(user_id varchar(255), task_id int auto_increment primary key, task varchar(255), date varchar(255), time varchar(255);

To test the application locally in a browser, go to the URL: localhost/signup.php after copying all files to the web server folder (XAMPP for Windows, Apache for Linux /var/www/html/).

Author: Piotr Torba, email: wwx11875@student.warszawa.merito.pl
