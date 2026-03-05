<!DOCTYPE html>
<html lang="en">
<head>
    <title>Mijn resultaat</title>
</head>
<body>

<h2>Temperatuur</h2>

<?php
// Maak een variabele voor de temperatuur
$temperatuur = 14;

// Als de temperatuur hoger is dan 25:
// Toon: "Het is warm."
if ($temperatuur > 25 ){
    echo "<div> het is warm </div>";
}

elseif ($temperatuur >= 15 && $temperatuur <= 25){
    echo "<div> het is lekker weer </div>";
}

else {
      echo "<div> het is koud </div>";
}
    //
// Als de temperatuur tussen 15 en 25 ligt:
// Toon: "Het is lekker weer."
//
// Anders:
// Toon: "Het is koud."

?>
</body>
</html>