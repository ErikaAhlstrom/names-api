<?php
// Steg 1 – Ange lämpliga HTTP-headers
// bestämmer content type
header("Content-Type: application/json; charset=UTF-8");
// Ger tillåtelse för alla användare att använda APIet
header("Access-Control-Allow-Origin: *");
header("Access-Control-Allow-Methods: GET");
header("Access-Control-Allow-Headers: Origin, X-Requested-With, Content-Type, Accept");
header("Referrer-Policy: no-referrer");

// Steg 2 – Skapa PHP-arrayer (testdata)
$firstNames =
    ["Åsa", "Mahmud", "Björn", "Anna", "Jimmy", "Anna", "Maja", "Marta", "Gandalf", "Fiona"];
$lastNames =
    ["Öberg", "Al Hakim", "Gustavsson", "Andersson", "Rickardsson", "Höglund", "Thunberg", "Pettersson", "Grå", "Apple"];
$gender = ["male", "female", "other"];

$persons = array();

// Steg 3 – Skapa 10 namn och spara dessa i en ny array
for ($i = 0; $i < 10; $i++) {
    $new_fisrt_name = $firstNames[rand(0, 9)];
    $new_last_name = $lastNames[rand(0, 9)];
    $newEmailName = substr(emailFormat($new_fisrt_name), 0, 2) . substr(emailFormat($new_last_name), 0, 3);

    $person = array(
        "firstname" => $new_fisrt_name,
        "lastname" => $new_last_name,
        "age" => rand(1, 100),
        "gender" => $gender[rand(0, 2)],
        "email" => strtolower($newEmailName) . "@example.com"
    );
    array_push($persons, $person);
}
// Steg 4 – Konvertera PHP-arrayen till JSON
$json = json_encode(
    $persons,
    JSON_UNESCAPED_UNICODE | JSON_PRETTY_PRINT
);

// Steg 5 – Skicka JSON till klienten
echo $json;

function emailFormat($string)
{
    $search  = array('/Å/', '/Ä/', '/Ö/','/å/', '/ä/', '/ö/', '/-/', '/ /');
    $replace = array('a', 'a', 'o','a', 'a', 'o', '', '');
    $string = preg_replace($search, $replace, $string);
    $string = strtolower($string);

    return $string;
}
?>

