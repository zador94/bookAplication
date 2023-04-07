<?php

try {
    $connection = new PDO("mysql:host=localhost;dbname=bookaplicationdatabase", 'root', 'root');
    if ($_SERVER["REQUEST_METHOD"] === "GET" && isset($_GET['id'])) {

        $bookId = $_GET['id'];
        $sql = "select * from book where id = :bookId";
        $stmt = $connection->prepare($sql);
        $stmt->bindValue(":bookId", $bookId);
        $stmt->execute();
        if ($stmt->rowCount() > 0) {
            foreach ($stmt as $row) {
                $bookName = $row['name'];
                $bookAuthor = $row['author'];
                $bookYear = $row['year'];
                $bookDescription = $row['description'];
                $path = $row['path_book'];
            }

            echo "<h3>Обновление информации о книге</h3>
                <form method='post'>
                    <input type='hidden' name='id' value='$bookId' />
                    <p>Название книги:<input type='text' name='name' value='$bookName' /></p>
                    <p>Автор:<input type='text' name='author' value='$bookAuthor' /></p>
                    <p>Год издания:<input type='number' name='year' value='$bookYear' /></p>
                    <p>Описание книги: </p>
                    <textarea name='description' cols='30' rows='10'>$bookDescription</textarea>
                    <p></p>
                    <input type='submit' value='Сохранить' />
            </form>";
        }
    } elseif (isset($_POST["id"]) && isset($_POST["name"]) && isset($_POST["author"]) && isset($_POST["year"])
        && isset($_POST["description"])) {

        $sql = "UPDATE book SET name = :bookName, author = :bookAuthor, year = :yearBook, 
                description = :bookDescription WHERE id = :bookId";
        $stmt = $connection->prepare($sql);
        $stmt->bindValue(":bookId", $_POST["id"]);
        $stmt->bindValue(":bookName", $_POST["name"]);
        $stmt->bindValue(":bookAuthor", $_POST["author"]);
        $stmt->bindValue(":yearBook", $_POST["year"]);
        $stmt->bindValue(":bookDescription", $_POST["description"]);

        $stmt->execute();
        header("Location: tableBook.php");
    } else {
        echo "Некорректные данные";
    }
} catch (PDOException $error) {
    $error->getMessage();
}