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
["Åsa","Mahmud","Björn","Anna","Jimmy","Anna","Maja","Marta","Gandalf","Fiona"];
$lastNames =
["Öberg","Al Hakim","Gustavsson","Andersson", "Rickardsson","Höglund", "Thunberg", "Pettersson","Grå","Apple"];

$names = array();

// Steg 3 – Skapa 10 namn och spara dessa i en ny array
for ($i = 0; $i < 10; $i++) {
    $name = array(
        "firstname" => $firstNames[rand(0, 9)],
        "lastname" => $lastNames[rand(0, 9)]
    );
    array_push($names, $name);
}
// Steg 4 – Konvertera PHP-arrayen till JSON
$json = json_encode(
    $names, JSON_UNESCAPED_UNICODE | JSON_PRETTY_PRINT);

// Steg 5 – Skicka JSON till klienten
echo $json;

?>
