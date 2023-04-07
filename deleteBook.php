<?php
if (isset($_POST['id'])) {
    try {
        $connection = new PDO("mysql:host=localhost;dbname=bookaplicationdatabase", 'root', 'root');
        $sql = "delete from book where id = :bookId";
        $stmt = $connection->prepare($sql);
        $stmt->bindValue(":bookId", $_POST['id']);
        $stmt->execute();
        header("Location: tableBook.php");
    }
    catch (PDOException $error) {
        $error->getMessage();
    }
}
