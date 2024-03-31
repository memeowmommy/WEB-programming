<!doctype html>
<html lang="ru">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>2.b</title>
    <style>
        body {
            background-image: url("bg.jpg");
            background-repeat: no-repeat;
            background-size: cover;
            font-size: 32px;
            font-family: "Georgia", serif;
        }
    </style>
</head>

<body>
<h4> 2. Форма. Сессии и Куки </h4>
<?php
$_SESSION['surname'] = !empty($_POST['surname'])
    ? $_POST['surname']
    : '';
$_SESSION['name'] = !empty($_POST['name'])
    ? $_POST['name']
    : '';
$_SESSION['age'] = !empty($_POST['age'])
    ? $_POST['age']
    : '';

echo "<br>"."фамилия: ".$_SESSION['surname'];
echo "<br>"."имя: ".$_SESSION['name'];
echo "<br>"."возраст: ".$_SESSION['age'];
?>
</body>
</html>