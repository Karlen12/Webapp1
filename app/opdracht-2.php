<?php

// STAP 1: Maak hier een array met je hobby's
// Bijvoorbeeld: ["Gamen", "Voetbal", "Programmeren"]

$hobbys = ["voetballen", "kickboksen", "korfbal"]
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <title>Mijn Hobby's</title>
</head>
<body>


<h2>Hobby's</h2>

<ul>
</ul>

<?php
    foreach ($hobbys as $hobby) {

        echo  "<div>" . $hobby . "</div>";

    }
?>

</body>
</html>