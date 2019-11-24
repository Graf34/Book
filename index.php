<html>
<head>
    <link href="css/style.css" rel="stylesheet">
</head>
<body>
<?php
$name = '';
$text = '';
$host = 'localhost'; // адрес сервера
$database = 'guestbook'; // имя базы данных
$user = 'root'; // имя пользователя
$password = ''; // пароль

if (!empty($_POST)) {//Если POST пустой
    //Подключение к бд
    $link = mysqli_connect($host, $user, $password, $database)
    or die("Ошибка " . mysqli_error($link));
    $name = $_POST['name'];
    $text = $_POST['text'];
    //Добавление сообщение в бд
    $queryCreate = "INSERT INTO `guestbook_table` (id, `name`, `date`, `text`) VALUES (NULL,'$name' , CURRENT_TIMESTAMP,'$text')";
    mysqli_query($link, $queryCreate) or die("Ошибка " . mysqli_error($link));
    $name = '';
    $text = '';
}


$link = mysqli_connect($host, $user, $password, $database)
or die("Ошибка " . mysqli_error($link));
$queryMessage = "SELECT DATE_FORMAT(date,'%d.%m.%Y %h:%i'),name,text FROM guestbook_table";
$resultMessage = mysqli_query($link, $queryMessage) or die("Ошибка " . mysqli_error($link));

$rows = mysqli_num_rows($resultMessage); // количество полученных строк


for ($i = 0; $i < $rows; ++$i) {
    $row = mysqli_fetch_row($resultMessage);
    echo '<div class="message">';

    echo '<p class="date">' . $row[0] . '</p>';
    echo '<p class="name">' . $row[1] . '</p>';

    echo '<p class="text">' . $row[2] . '</p>';
    echo '</div>';
}

?>
<hr/>
<br>
<form action="index.php" method="post">
    <input class="nameform" type="text" placeholder="Имя" name="name">
    <br>
    <textarea name="text" placeholder="Ваше сообщение"></textarea>
    <br>
    <input class="submit" type="submit">
</form>
</body>
</html>