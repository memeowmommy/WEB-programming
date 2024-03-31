<!doctype html>
<html lang="ru">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>3</title>
    <style>
        body {
            background-image: url("bg.jpg");
            background-repeat: no-repeat;
            background-size: cover;
            font-size: 28px;
            font-family: "Georgia", serif;
        }
    </style>
</head>

<body>
<h4> 3. Файлы </h4>
    <div id="form">
    <form action="save.php" method="post">
        <label>
            <br>ведите email:
            <input name="email" required type="email" placeholder="ฅ^• ⩊ •^ฅ">
        </label>
        <label>
            <br>выберете категорию:
            <select name="category" required>
                <option value="cats">котики</option>
                <option value="dogs">собачки</option>
                <option value="hamsters">хомячки</option>
            </select>
        </label>
        <label>
            <br>заголовок:
            <input name="title" required type="text" placeholder="𓆝 𓆟 𓆞 𓆝 𓆟">
        </label>
        <label>
            <br>описание:
            <textarea cols="50" rows="5" name="description" placeholder="⋆｡ﾟ☁︎｡⋆｡ ﾟ☾ ﾟ｡⋆"></textarea>
        </label>
        <label>
            <br> <input type="submit" value="отправить">
        </label>
    </form>
</div>
<?php
$categories = ['cats', 'dogs', 'hamsters'];
foreach ($categories as $category)
{
    $fileList = scandir("categories/$category");
    foreach ($fileList as $file)
    {
        if ($file != "." && $file != '..')
        {
            $title = substr($file, 0, strlen($file) - 4);
            $content = file_get_contents("categories/$category/$file");
            echo "<p>$category -> $title -> $content</p>";
        }
    }
}
?>
</body>
</html>