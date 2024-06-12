Aby korzystać z aplikacji 'To Do List' w przeglądarce w systemie Windows należy zainstalować oprogramowanie XAMPP, w systemie Linux należy zainstalować serwer MySQL na localhost. W obu systemach na skonfigurowanym już serwerze MySQL należy przepowadzić jednorazowo proces utworzenia bazy danych wykonując 4 poniższe kroki:

1. Ręcznie utworzyć bazę danych o nazwie 'toDOlist' poleceniem:    CREATE DATABASE toDOlist;
2. Użyć bazy danych poleceniem:    USE toDOlist;
3. Utworzyć tabele poleceniem:    CREATE TABLE user(user_id int auto_increment primary key, username varchar(255), password varchar(255));
4. Utworzyć drugą tabele poleceniem:    CREATE TABLE task(user_id varchar(255), task_id int auto_increment primary key, task varchar(255), date varchar(255), time varchar(255);

Do testowania aplikacji lokalnie w przeglądarce należy wejść na adres URL: localhost/signup.php po skopiowaniu wszystkich plików do foldera serwera www (XAMPP dla Windows, Apache dla Linux /var/www/html/).

Autor: Piotr Torba, email: wwx11875@student.warszawa.merito.pl
