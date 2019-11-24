<?php
$host = 'localhost'; // адрес сервера
$database = 'guestbook'; // имя базы данных
$user = 'root'; // имя пользователя
$password = ''; // пароль

//Подключение
$link = mysqli_connect($host, $user, $password);
//Создание базы данных и таблицы
$queryCreateBD = "CREATE DATABASE $database";
$queryCreateTable = "CREATE TABLE `guestbook`.`guestbook_table` ( `id` INT NOT NULL AUTO_INCREMENT , `name` VARCHAR(30) NOT NULL , `date` DATETIME NOT NULL , `text` TEXT NOT NULL , PRIMARY KEY (`id`)) ENGINE = InnoDB;";
mysqli_query($link, $queryCreateBD);
mysqli_query($link, $queryCreateTable);
//Закрыть подключение
mysqli_close($link);
?>