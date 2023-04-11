<?php
if (isset($_POST['submit']) && !empty($_REQUEST['nameBook']) && !empty($_REQUEST['author']) && !empty($_REQUEST['year'])
    && !empty($_REQUEST['description'])) {
    if ($_FILES && $_FILES['cover']['error'] == UPLOAD_ERR_OK) {
        $extension = explode('.', $_FILES['cover']['name']);
        $_FILES['cover']['name'] = $_REQUEST['nameBook'] . '.' . $extension[1];
        $path = 'upload/' . $_FILES['cover']['name'];
        move_uploaded_file($_FILES['cover']['tmp_name'], $path);
        echo 'Фото успешно загружено <br>';
    }

    if ($_FILES && $_FILES['bookFile']['error'] == UPLOAD_ERR_OK) {
        $extension = explode('.', $_FILES['bookFile']['name']);
        $_FILES['bookFile']['name'] = $_REQUEST['nameBook'] . '.' . $extension[1];
        $path = 'bookFile/' . $_FILES['bookFile']['name'];
        move_uploaded_file($_FILES['bookFile']['tmp_name'], $path);
        echo 'Книга успешно загружена <br>';
    }




    try {
        $connection = new PDO("mysql:host=localhost;dbname=bookaplicationdatabase", 'root', 'root');
        echo 'Соединение установлено';
        $nameBook = $_REQUEST['nameBook'];
        $author = $_REQUEST['author'];
        $year = $_REQUEST['year'];
        $description = $_REQUEST['description'];
        $command = "INSERT INTO book (name, author, year, description, path_book) VALUE ('$nameBook', '$author', '$year', '$description', '$path')";
        $sql = $connection->exec($command);
        if ($sql > 0) {
            echo 'Данные успешно добавлены <br>';
        } else {
            echo 'Что-то пошло не так';
        }
    } catch (PDOException $error) {
        $error->getMessage();
    }
}


?>

<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
</head>
<body>
<a href="tableBook.php?name='.$path.'">Посмотреть на полный список книг</a>
</body>
</html>
