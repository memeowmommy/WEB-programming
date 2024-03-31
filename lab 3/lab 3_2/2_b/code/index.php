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
<form action="2_b.php" method="post">
    <label>
        введите фамилию:
        <input name="surname" type="text" placeholder="фамилия">
    </label>
    <br>
    <label>
        введите имя:
        <input name="name" type="text" placeholder="имя">
    </label>
    <br>
    <label>
        введите возраст:
        <input name="age" type="text" placeholder="возраст">
    </label>
    <br>
    <input type="submit">
</form>
</body>
</html>