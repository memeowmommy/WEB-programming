<?php
// Подключение к MySQL
$mysqli = new mysqli('db', 'root', 'helloworld', 'web');

if (mysqli_connect_errno()) {
    printf("Подключение к серверу MySQL невозможно. Код ошибки: %s\n", mysqli_connect_error());
    exit;
}
// Обработка формы
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $email = $mysqli->real_escape_string($_POST['email']);
    $title = $mysqli->real_escape_string($_POST['title']);
    $category = $mysqli->real_escape_string($_POST['categories']);
    $description = $mysqli->real_escape_string($_POST['text']);

    $query = "INSERT INTO ad (email, title, description, category) VALUES ('$email', '$title', '$description', '$category')";
    $mysqli->query($query);
}
// посылаем запрос к серверу
$ads = [];
if ($result = $mysqli->query('SELECT * FROM ad ORDER BY created DESC'))
{
    while ($row = $result->fetch_assoc())
    {
        $ads[] = $row;
    }
    $result->close();
}

// Закрытие соединения
$mysqli->close();
?>

<!doctype html>
<html lang="ru">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>5</title>
    <style>
        body {
            background-image: url("bg.jpg");
            background-repeat: no-repeat;
            background-size: cover;
            font-size: 28px;
            font-family: "Georgia", serif;
        }
    </style>
<body>
<h2> 5. MySQL </h2>
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

<div id="table">
    <table>
        <tbody>
        <?php
        $sqlBase = new mysqli('db', 'root', 'helloworld', 'web', 3306);

        if (mysqli_connect_errno()) {
            printf("Код ошибки: %s\n", mysqli_connect_error());
            exit;
        }

        $result = $sqlBase->query("SELECT email, category, title, description FROM web.ad");

        foreach ($sqlBase->query("SELECT * FROM web.ad") as $row)
        {
            $email = $row['email']; $category = $row['category']; $title = $row['title']; $description = $row['description'];
            echo "$title $description $category";
        }
        ?>
        </tbody>
    </table>
</div>
</body>
</html>
