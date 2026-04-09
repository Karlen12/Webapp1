<?php
session_start();

// Controleer of gebruiker ingelogd is
if (!isset($_SESSION['ingelogd']) || $_SESSION['ingelogd'] !== true) {
    header('Location: inlog.php');
    exit;
}
?>







<?php

$connexion = new PDO('mysql:host=mysql_db;dbname=Webapplicatie1', 'root', 'rootpassword');

$sql = $connexion->prepare("SELECT * FROM `menukaart`");

$sql->execute();
$result = $sql->fetchAll();



?>


<!DOCTYPE html>
<html lang="nl"><head>
    <meta charset="UTF-8">
    <title>Admin – Gerechten</title>
    <style>
        * { box-sizing: border-box; margin: 0; padding: 0; }

        body {
            font-family: 'Segoe UI', sans-serif;
            background: #f0f2f5;
        }

        header {
            background: #1a1a2e;
            color: #fff;
            padding: 16px 32px;
            display: flex;
            justify-content: space-between;
            align-items: center;
        }

        header h1 { font-size: 1.1rem; }
        header span { font-size: 0.8rem; color: #a0aec0; }

        .container { max-width: 860px; margin: 36px auto; padding: 0 20px; }

        .toolbar {
            display: flex;
            justify-content: space-between;
            align-items: center;
            margin-bottom: 16px;
        }

        .toolbar h2 { font-size: 1.1rem; }

        .btn-add {
            background: #3b5bdb;
            color: #fff;
            border: none;
            padding: 8px 16px;
            border-radius: 6px;
            font-size: 0.85rem;
            cursor: pointer;
        }

        .table-wrapper {
            background: #fff;
            border-radius: 10px;
            overflow: hidden;
            box-shadow: 0 1px 6px rgba(0,0,0,0.08);
        }

        table { width: 100%; border-collapse: collapse; }

        thead { background: #f7f8fa; }

        th {
            text-align: left;
            padding: 12px 16px;
            font-size: 0.75rem;
            text-transform: uppercase;
            letter-spacing: 0.6px;
            color: #8896ab;
        }

        td { padding: 12px 16px; font-size: 0.88rem; border-top: 1px solid #f0f2f5; }

        tr:hover td { background: #fafbfc; }

        .badge {
            padding: 3px 10px;
            border-radius: 20px;
            font-size: 0.75rem;
            font-weight: 600;
        }

        .badge-meat    { background: #fff0f0; color: #c0392b; }
        .badge-veggie  { background: #f0fdf4; color: #16a34a; }
        .badge-fish    { background: #eff6ff; color: #2563eb; }
        .badge-dessert { background: #fffbeb; color: #d97706; }

        .actions { display: flex; gap: 8px; }

        .btn-edit , .btn-del {
            border: none;
            background: none;
            cursor: pointer;
            padding: 5px;
            border-radius: 5px;
            font-size: 1rem;
        }

        .btn-edit:hover { background: #eef2ff; }
        .btn-del:hover  { background: #fff5f5; }
    </style>

</head>
<body>

<header>
    <h1>🍽 Admin Panel</h1>
    <span>Gerechten beheer</span>
</header>

<div class="container">
    <div class="toolbar">
        <h2>Gerechten</h2>
        <a href="add.php" class="btn-add">+ Nieuw gerecht</a>
    </div>

    <div class="table-wrapper">
        <table>
            <thead>
            <tr>
                <th>#</th>
                <th>Naam</th>
                <th>Categorie</th>
                <th>Prijs</th>
                <a >Acties</a>
            </tr>
            </thead>
            <tbody>
            <tr>
                <?php
                foreach ($result as $menuitem) {
                {
                ?>
                <td></td>

                <td><?php echo $menuitem ["titel"] ?></td>
                <td><span class="badge badge-meat">Vlees</span></td>
                <td><?php echo $menuitem ["prijs"]?></td>
                <td><div class="actions"><button class="btn-edit">✏️</button><a href="bewerken.php"></a><button class="btn-del">🗑️</button></div></td>
            </tr>
            <?php
            }
            }
            ?>

            </tbody>
        </table>
    </div>
</div>

</body>
</html>