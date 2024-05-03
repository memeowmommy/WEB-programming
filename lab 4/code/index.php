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
require_once '../vendor/autoload.php';

use Google\Client;
use Google\Service\Drive;
use Google\Service\Sheets\SpreadSheet;

$apiKey = "AIzaSyDAxEBij7Nvjbji2lqRAYiRDj3Ynsr54jM";
$clientId = "729888836529-ts6iu26rp3gs7asgoqp5c1reu6ttnrkv.apps.googleusercontent.com";
$clientSecret = "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";

$client = new Google_Client();
$client->setApplicationName("Krotik");
$client->setScopes([Google_Service_Sheets::SPREADSHEETS]);
$client->setAccessType("offline");
try
{
    $client->setAuthConfig( __DIR__ . "/krotik.json");
}
catch (\Google\Exception $e)
{
    echo "<p>ERROR</p>";
}

$client->useApplicationDefaultCredentials();
$client->addScope('https://www.googleapis.com/auth/spreadsheets');

$service = new Google_Service_Sheets($client);
$spreadsheetId = '13FP9-WmcaCDxwa4le-gdyG5A3Jn5HZSKmxprNfj7fU0';
$range = "Лист1";
$response = $service->spreadsheets_values->get($spreadsheetId, $range);
try {
    for ($i = 1; $i < sizeof($response->getValues()); $i++)
    {
        $valuesInRow = array();
        echo "<div>";
        for ($j = 0; $j < 3; $j++)
        {
            if ($j < sizeof($response->getValues()[$i])) {
                echo "<p>" . $response->getValues()[$i][$j] . "</p>";
            } else
            {
                echo "<p></p>";
            }
        }
        echo "</div>";
    }
} catch (\Google\Service\Exception $e)
{
    echo "ERROR";
}
?>
</body>
</html>