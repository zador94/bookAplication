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
<?php
if(isset($_GET['id'])) {
    try {
        $connection = new PDO("mysql:host=localhost;dbname=bookaplicationdatabase", 'root', 'root');
        $sql = "select * from book where id = :bookid";
        $stmt = $connection->prepare($sql);
        $stmt->bindValue(':bookid', $_GET['id']);
        $stmt->execute();
        if($stmt->rowCount() > 0) {
            foreach ($stmt as $row) {
                $bookName = $row['name'];
                $bookAuthor = $row['author'];
                $bookYear = $row['year'];
                $bookDescription = $row['description'];
                $path = $row['path_book'];

                echo "<h1 align='center'>Информация о книге</h1>";
                echo "<img src='$path' height='600' width='500'>";
                echo "<p><b>Название книги:</b> $bookName</p>";
                echo "<p><b>Автор книги книги:</b> $bookAuthor</p>";
                echo "<p><b>Год издания: </b>$bookYear</p>";
                echo "<p><b>Описание:</b> $bookDescription</p>";

            }
        }
    } catch (PDOException $error) {
        $error->getMessage();
    }
}
?>
</body>
</html>























<!--<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
</head>
<body>
<table width="90%">
    <tr>
        <th colspan="5" align="middle">
            <p><h1>Описание книги</h1></p>
        </th>
    </tr>
<?php
/*try {
    $connection = new PDO("mysql:host=localhost;dbname=bookaplicationdatabase", 'root', 'root');
    $sql = "select * from book";
    $result = $connection->query($sql);
    while ($row = $result->fetch()) {
        echo "<tr>";
        $path = $row['path_book'];
        echo "<td align='center'><img src='$path' 'height='400' width='400'></td>";
        echo "<td width='40%' align='left'>" . $row['description'] . "</td>";
        echo "<td align='middle'>".'Название книги: ' . $row['name'] . "<br>"
                . 'Автор книги: ' . $row['author']."<br>"
                . 'Год издания книги: ' . $row['year'].
            "</td>";

        echo "</tr>";
        echo "<tr>";
                echo "<td><a href='tableBook.php'>Вернуться назад</a></td>";
        echo "</tr>";
    }
} catch (PDOException $error) {
    $error->getMessage();
}
*/?>
</table>
</body>
</html>-->