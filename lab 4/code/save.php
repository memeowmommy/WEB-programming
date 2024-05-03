<?php
require_once "../vendor/autoload.php";
function redirectToHome()
{
    header('Location: /index.php');
    exit();
}
if (false === isset($_POST['email'], $_POST['category'], $_POST['title'], $_POST['description']))
{
    redirectToHome();
}
$category = $_POST['category'];
$title = $_POST['title'];
$description = $_POST['description'];

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
$spreadsheetId = "13FP9-WmcaCDxwa4le-gdyG5A3Jn5HZSKmxprNfj7fU0";

$range = "Лист1";
$response = $service->spreadsheets_values->get($spreadsheetId, $range);

$body = new Google_Service_Sheets_ValueRange(['values' => [[$title, $description, $category]]]);
$options = array('valueInputOption' => 'RAW');

$service->spreadsheets_values->update($spreadsheetId, 'Лист1!A' . (sizeof($response->getValues()) + 1), $body, $options);
redirectToHome();