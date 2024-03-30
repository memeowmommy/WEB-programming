<!doctype html>
<html lang="ru">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>lab 3.1</title>
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
<?php
//1.a
echo "1. Регулярные выражения" . "<br>";
$regExp = '/a[a-z]{2}b/i';
$str = 'ahb acb aeb aeeb adcb axeb';
$matches= [];
$count = preg_match_all($regExp, $str,$matches);
echo "найдено строк: {$count} <br>";
var_dump($matches);

//1.b
echo "<br><br>";
$regExp = '/[0-9]/';
$str = 'a1b2c3';
function replaceWithCube($matches) {
    $number = (int)$matches[0];
    $cubedNumber = pow($number, 3);
    return $cubedNumber;
    }
$result = preg_replace_callback($regExp, 'replaceWithCube', $str);
echo "новая строка: ". $result."<br>";