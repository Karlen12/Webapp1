<?php
if(isset($_POST['titel'])){
    $connectie = new PDO('mysql:host=mysql_db;dbname=karle', 'root', 'rootpassword');
    $sql = $connectie->prepare("INSERT INTO menukaart (titel, omschrijving, prijs)) VALUES(:titelph, :omschrijvingph,:prijsph" );
        $sql -> bindParam(':titelph', $_POST['titel']);
        $sql -> bindParam(':omschrijvingph', $_POST['omschrijving']);
        $sql -> bindParam (":prijsph", $_POST['prijs']);
        $sql -> execute();

        echo "gerecht toegevoegd";

}
