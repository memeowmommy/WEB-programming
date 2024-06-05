<?php
function redirectToHome()
{
    header("Location: /");
    exit();
}

if (false === isset($_POST['email'], $_POST['category'], $_POST['title'], $_POST['description'])) {
    redirectToHome();
}

$email = $_POST['email'];
$category = $_POST['category'];
$title = $_POST['title'];
$description = $_POST['description'];


$sqlBASE = new mysqli('db', 'root', 'helloworld', 'web', 3306);

if (mysqli_connect_errno())
{
    printf("Код ошибки: %s\n", mysqli_connect_error());
    exit;
}
$dot = $sqlBASE->prepare("INSERT INTO ad (email, category, title, description) VALUES (?, ?, ?, ?)");

$dot->bind_param("ssss", $email, $category, $title, $description);
if (!$dot->execute())
{
    printf("Ошибка");
    exit;
}

$dot->close();
$sqlBASE->close();

redirectToHome();