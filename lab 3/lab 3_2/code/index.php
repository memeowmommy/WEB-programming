<!doctype html>
<html lang="ru">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>2_a</title>
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
<form method="post">
    <h4> 2. Форма. Сессии и Куки </h4>
    <label for="text">
        <textarea name="text_area" rows="10" cols="50"></textarea>
    </label><br>
    <br> <input type="submit">
</form>

<br> <?php
$text = !empty($_POST['text_area'])
    ? $_POST['text_area']
    : '';
$regExp= '/[a-z0-9а-яё.]+/ui';
$matches = [];
$count = preg_match_all($regExp, $text, $matches);
echo 'количество слов: '.$count."<br>";
$len=mb_strlen($text);
echo 'длина строки: '.mb_strlen($text)."<br>";
?>
</body>
</html>