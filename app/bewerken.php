<?php

$connectie = new PDO('mysql:host=mysql_db;dbname=Webapplicatie1', 'root', 'rootpassword');

if (isset($_POST['opslaan'])) {
    $sql = $connectie->prepare("UPDATE menukaart SET titel = :titelph, omschrijving = :omschrijvingph, prijs = :prijsph WHERE id = :idph");
    $sql->bindParam(':titelph', $_POST['titel']);
    $sql->bindParam(':omschrijvingph', $_POST['omschrijving']);
    $sql->bindParam(':prijsph', $_POST['prijs']);
    $sql->bindParam(':idph', $_GET['id']);
    $sql->execute();
}

$sql = $connectie->prepare("SELECT * FROM menukaart WHERE id = :idplaceholder");
$sql->bindParam(':idplaceholder', $_GET['id']);
$sql->execute();
$data = $sql->fetch();

?>
<!DOCTYPE html>
<html lang="nl">
<head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0"/>
    <title>Gerecht Bewerken</title>
    <style>
        * {
            box-sizing: border-box;
            margin: 0;
            padding: 0;
        }

        body {
            font-family: 'Segoe UI', sans-serif;
            background: #f0efeb;
            min-height: 100vh;
        }

        /* ── TOPBAR ── */
        .topbar {
            background: #1a1a2e;
            color: #fff;
            display: flex;
            align-items: center;
            justify-content: space-between;
            padding: 0 2rem;
            height: 52px;
            font-size: 0.85rem;
        }

        .topbar-brand {
            display: flex;
            align-items: center;
            gap: 8px;
            font-weight: 600;
            font-size: 0.9rem;
        }

        .topbar-brand-dot {
            width: 10px;
            height: 10px;
            background: #e8651a;
            border-radius: 50%;
        }

        .topbar-right {
            color: #aaa;
        }

        /* ── PAGE ── */
        .page {
            max-width: 560px;
            margin: 0 auto;
            padding: 2.5rem 1rem 4rem;
        }

        .back-link {
            display: inline-flex;
            align-items: center;
            gap: 6px;
            font-size: 0.82rem;
            color: #555;
            text-decoration: none;
            margin-bottom: 1.4rem;
        }

        .back-link:hover {
            color: #1a1a2e;
        }

        .page-title {
            font-size: 1.6rem;
            font-weight: 700;
            color: #1a1a2e;
            margin-bottom: 0.3rem;
        }

        .page-sub {
            font-size: 0.85rem;
            color: #888;
            margin-bottom: 1.8rem;
        }

        /* ── CARD ── */
        .card {
            background: #fff;
            border-radius: 14px;
            overflow: hidden;
            box-shadow: 0 2px 12px rgba(0,0,0,0.07);
        }

        .card-header {
            background: #1a1a2e;
            color: #fff;
            display: flex;
            align-items: center;
            gap: 12px;
            padding: 1rem 1.4rem;
            font-weight: 600;
            font-size: 0.95rem;
        }

        .card-header-icon {
            width: 34px;
            height: 34px;
            background: #e8651a;
            border-radius: 8px;
            display: flex;
            align-items: center;
            justify-content: center;
            font-size: 1rem;
        }

        .card-body {
            padding: 1.6rem 1.4rem;
            display: flex;
            flex-direction: column;
            gap: 1.2rem;
        }

        /* ── FIELDS ── */
        .field label {
            display: block;
            font-size: 0.72rem;
            font-weight: 700;
            letter-spacing: 0.07em;
            text-transform: uppercase;
            color: #444;
            margin-bottom: 0.4rem;
        }

        .field label .required {
            color: #e8651a;
            margin-left: 2px;
        }

        .field input,
        .field textarea {
            width: 100%;
            border: 1.5px solid #e0e0e0;
            border-radius: 8px;
            padding: 0.6rem 0.85rem;
            font-size: 0.9rem;
            color: #1a1a2e;
            background: #fafafa;
            outline: none;
            transition: border-color 0.2s;
            font-family: inherit;
        }

        .field input:focus,
        .field textarea:focus {
            border-color: #e8651a;
            background: #fff;
        }

        .field textarea {
            resize: vertical;
            min-height: 110px;
        }

        .field-hint {
            font-size: 0.75rem;
            color: #aaa;
            margin-top: 0.3rem;
        }

        /* price input */
        .price-wrap {
            display: flex;
            align-items: center;
            border: 1.5px solid #e0e0e0;
            border-radius: 8px;
            background: #fafafa;
            overflow: hidden;
            transition: border-color 0.2s;
        }

        .price-wrap:focus-within {
            border-color: #e8651a;
            background: #fff;
        }

        .price-prefix {
            padding: 0 0.75rem;
            font-size: 0.9rem;
            color: #888;
            background: #f0f0f0;
            border-right: 1.5px solid #e0e0e0;
            height: 100%;
            display: flex;
            align-items: center;
            align-self: stretch;
        }

        .price-wrap input {
            border: none;
            border-radius: 0;
            background: transparent;
            flex: 1;
        }

        .price-wrap input:focus {
            border: none;
            background: transparent;
        }

        /* ── FOOTER ── */
        .card-footer {
            padding: 1rem 1.4rem;
            border-top: 1px solid #f0f0f0;
            display: flex;
            justify-content: flex-end;
            gap: 0.6rem;
        }

        .btn {