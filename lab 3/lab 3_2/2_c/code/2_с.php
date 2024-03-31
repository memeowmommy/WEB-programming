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
$_SESSION['data'] = [];
$_SESSION['data'][] = !empty($_POST['name'])
    ? $_POST['name']
    : '';
$_SESSION['data'][] = !empty($_POST['age'])
    ? $_POST['age']
    : '';
$_SESSION['data'][] = !empty($_POST['card'])
    ? $_POST['card']
    : '';
$_SESSION['data'][] = !empty($_POST['cvc'])
    ? $_POST['cvc']
    : '';
echo '<ul>';
foreach ($_SESSION['data'] as $val)
{
    echo '<li>' . $val . '</li>';
}
echo '</ul>';
?>
</body>
</html>