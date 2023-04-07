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
<div>
    <a href="?sort=name">Сортировать по названию</a> |
    <a href="?sort=year">Сортировать по году издания</a> |
    <a href="?sort=author">Сортировка по автору</a> |
    <a href="?sort=id">Сортировка по умолчанию</a> |
</div>
<table border="1">
    <tr>
        <th>ID</th>
        <th>Название</th>
        <th>Автор</th>
        <th>Год издания</th>
        <th>Описание</th>
        <th>Фото</th>
    </tr>
    <?php
    try {
        $connection = new PDO("mysql:host=localhost;dbname=bookaplicationdatabase", 'root', 'root');
        $sort = isset($_GET['sort']) ? $_GET['sort'] : 'id';
        setcookie('sort', $sort);
        $sql = "SELECT * FROM book ORDER BY $sort";
        $result = $connection->query($sql);
        while ($row = $result->fetch()) {
            echo "<tr>";
            echo "<td align='middle'>" . $row['id'] . "</td>";
            echo "<td align='middle'>" . $row['name'] . "</td>";
            echo "<td align='middle'>" . $row['author'] . "</td>";
            echo "<td align='middle'>" . $row['year'] . "</td>";
            echo "<td width='40%' valign='middle'>" . $row['description'] . "</td>";
            $path = $row['path_book'];
            echo "<td align='middle'><img src='$path' 'height='50' width='50'></td>";
            echo "<td ><a href='detailed_description.php?id=" . $row["id"] . "'>Подробное описание</a></td>";
            echo "<td ><a href='updateBook.php?id=" . $row["id"] . "'>Изменить информацию о книге</a></td>";
            echo "<td>
                    <form action='deleteBook.php' method='post'>
                        <input type='hidden' name='id' value='" . $row['id'] . "'/>
                        <input type='submit' value='Удалить книгу'>
                    </form>
                  </td>";
            echo "</tr>";
        }
    } catch (PDOException $error) {
        $error->getMessage();
    }
    ?>
</table>
</body>
</html>
