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
<h1>Добавить новую книгу</h1>
<form action="dataProcessing.php" method="post" enctype="multipart/form-data">
    <p>Название книги: <input type="text" name="nameBook"></p>
    <p>Обложка книги: <input type="file" name="cover"></p>
    <p>Файл книги: <input type="file" name="bookFile"></p>
    <p>Автор: <input type="text" name="author"></p>
    <p>Год издания: <input type="number" name="year"></p>
    <p>Описание книги: </p>
    <textarea name="description" cols="30" rows="10"></textarea>
    <p><input type="submit" value="Добавить книгу" name="submit"></p>
</form>
</body>
</html>
