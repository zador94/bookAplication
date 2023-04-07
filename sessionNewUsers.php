<?php
session_start();
if (!empty($_REQUEST['login']) && !empty($_REQUEST['password'])) {

    $usersLogin = $_REQUEST['login'];
    $usersPassword = $_REQUEST['password'];

    try {
        $connection = new PDO("mysql:host=localhost;dbname=bookaplicationdatabase", "root", "root");
        $sql = "SELECT * FROM Users";
        $result = $connection->query($sql);
        while ($row = $result->fetch()) {
            if ($row['login'] == $usersLogin && $row['password'] == $usersPassword) {
                $_SESSION['login'] = $usersLogin;
                $_SESSION['password'] = $usersPassword;
                echo "<a href='addBook.php'>Вы авторизованы. Добавить новые книги</a>";
            }
        }

    } catch (PDOException $e) {
        echo 'Ошибка подключения: ' . $e->getMessage();
    }
}