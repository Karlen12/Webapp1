<?php
var_dump($_POST);
if (isset($_POST['opslaan'])) {
    $connectie = new PDO('mysql:host=mysql_db;dbname=Webapplicatie1', 'root', 'rootpassword');
    $sql = $connectie->prepare("INSERT INTO menukaart (titel, omschrijving, prijs)  VALUES (:titelph, :omschrijvingph,:prijsph)");
    $sql->bindParam(':titelph', $_POST['titel']);
    $sql->bindParam(':omschrijvingph', $_POST['omschrijving']);
    $sql->bindParam(":prijsph", $_POST['prijs']);
    $sql->execute();

    echo "gerecht toegevoegd";

}
?>
<!DOCTYPE html>
<html lang="nl">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Nieuw gerecht toevoegen</title>
    <link href="https://fonts.googleapis.com/css2?family=DM+Sans:wght@300;400;500;600&family=DM+Mono:wght@400;500&display=swap"
          rel="stylesheet">
    <style>
        *, *::before, *::after {
            box-sizing: border-box;4[]
            margin: 0;
            padding: 0;
        }

        :root {
            --bg: #f0f0ee;
            --surface: #ffffff;
            --nav: #1a1a2e;
            --accent: #e85d26;
            --accent-light: #fff0ea;
            --text: #1a1a1a;
            --muted: #888;
            --border: #e4e4e0;
            --radius: 10px;
            --shadow: 0 2px 16px rgba(0, 0, 0, 0.08);
        }

        body {
            font-family: 'DM Sans', sans-serif;
            background: var(--bg);
            color: var(--text);
            min-height: 100vh;
        }

        nav {
            background: var(--nav);
            padding: 0 32px;
            height: 52px;
            display: flex;
            align-items: center;
            justify-content: space-between;
        }

        .nav-brand {
            color: #fff;
            font-size: 14px;
            font-weight: 500;
            display: flex;
            align-items: center;
            gap: 8px;
        }

        .nav-link {
            color: rgba(255, 255, 255, 0.6);
            font-size: 13px;
            text-decoration: none;
            transition: color 0.15s;
        }

        .nav-link:hover {
            color: #fff;
        }

        main {
            max-width: 560px;
            margin: 48px auto;
            padding: 0 20px;
        }

        .page-header {
            margin-bottom: 28px;
        }

        .back-link {
            display: inline-flex;
            align-items: center;
            gap: 6px;
            font-size: 13px;
            color: var(--muted);
            text-decoration: none;
            margin-bottom: 16px;
            transition: color 0.15s;
        }

        .back-link:hover {
            color: var(--accent);
        }

        .page-header h1 {
            font-size: 24px;
            font-weight: 600;
        }

        .page-header p {
            color: var(--muted);
            font-size: 14px;
            margin-top: 4px;
        }

        .form-card {
            background: var(--surface);
            border-radius: 14px;
            box-shadow: var(--shadow);
            overflow: hidden;
        }

        .form-card-head {
            background: var(--nav);
            padding: 18px 28px;
            display: flex;
            align-items: center;
            gap: 10px;
        }

        .form-card-head .icon {
            width: 32px;
            height: 32px;
            background: var(--accent);
            border-radius: 8px;
            display: flex;
            align-items: center;
            justify-content: center;
            font-size: 16px;
        }

        .form-card-head h2 {
            color: #fff;
            font-size: 15px;
            font-weight: 600;
        }

        .form-body {
            padding: 28px;
            display: flex;
            flex-direction: column;
            gap: 22px;
        }

        .form-group {
            display: flex;
            flex-direction: column;
            gap: 7px;
        }

        .form-group label {
            font-size: 12px;
            font-weight: 600;
            text-transform: uppercase;
            letter-spacing: 0.06em;
            color: var(--muted);
            display: flex;
            align-items: center;
            gap: 6px;
        }

        .required {
            color: var(--accent);
            font-size: 14px;
            line-height: 1;
        }

        .form-group input,
        .form-group textarea,
        .form-group select {
            font-family: inherit;
            font-size: 14px;
            border: 1.5px solid var(--border);
            border-radius: 8px;
            padding: 11px 14px;
            color: var(--text);
            background: var(--bg);
            transition: border-color 0.18s, box-shadow 0.18s, background 0.18s;
            outline: none;
        }

        .form-group input:focus,
        .form-group textarea:focus,
        .form-group select:focus {
            border-color: var(--accent);
            box-shadow: 0 0 0 3px rgba(232, 93, 38, 0.12);
            background: #fff;
        }

        .form-group textarea {
            resize: vertical;
            min-height: 110px;
        }

        .form-group select {
            appearance: none;
            background-image: url("data:image/svg+xml,%3Csvg xmlns='http://www.w3.org/2000/svg' width='12' height='8' viewBox='0 0 12 8'%3E%3Cpath fill='%23888' d='M6 8L0 0h12z'/%3E%3C/svg%3E");
            background-repeat: no-repeat;
            background-position: right 14px center;
            cursor: pointer;
        }

        .price-wrap {
            position: relative;
        }

        .price-wrap .currency {
            position: absolute;
            left: 14px;
            top: 50%;
            transform: translateY(-50%);
            color: var(--muted);
            font-size: 14px;
            pointer-events: none;
            font-family: 'DM Mono', monospace;
        }

        .price-wrap input {
            padding-left: 28px;
        }

        .hint {
            font-size: 12px;
            color: var(--muted);
            margin-top: 2px;
        }

        .divider {
            border: none;
            border-top: 1px solid var(--border);
            margin: 4px 0;
        }

        .form-actions {
            padding: 20px 28px;
            border-top: 1px solid var(--border);
            display: flex;
            gap: 10px;
            justify-content: flex-end;
            background: #fafaf8;
        }

        .btn-cancel {
            background: none;
            border: 1.5px solid var(--border);
            color: var(--text);
            padding: 10px 20px;
            border-radius: 8px;
            font-family: inherit;
            font-size: 13px;
            font-weight: 500;
            cursor: pointer;
            transition: background 0.15s, border-color 0.15s;
            text-decoration: none;
            display: inline-flex;
            align-items: center;
        }

        .btn-cancel:hover {
            background: var(--bg);
            border-color: #ccc;
        }

        .btn-save {
            background: var(--accent);
            color: #fff;
            border: none;
            padding: 10px 22px;
            border-radius: 8px;
            font-family: inherit;
            font-size: 13px;
            font-weight: 600;
            cursor: pointer;
            display: inline-flex;
            align-items: center;
            gap: 7px;
            transition: background 0.18s, transform 0.12s;
        }

        .btn-save:hover {
            background: #d04e1a;
            transform: translateY(-1px);
        }

        .btn-save:active {
            transform: translateY(0);
        }

        /* Success state */
        .success-banner {
            display: none;
            background: #eafaf1;
            border: 1.5px solid #2ecc71;
            border-radius: 10px;
            padding: 14px 18px;
            font-size: 14px;
            color: #1a6e3c;
            align-items: center;
            gap: 10px;
            margin-bottom: 20px;
            animation: slideUp 0.3s ease;
        }

        .success-banner.show {
            display: flex;
        }

        .error-msg {
            font-size: 12px;
            color: #e74c3c;
            margin-top: 3px;
            display: none;
        }

        .error-msg.show {
            display: block;
        }

        .field-error input,
        .field-error textarea {
            border-color: #e74c3c !important;
            box-shadow: 0 0 0 3px rgba(231, 76, 60, 0.1) !important;
        }

        @keyframes slideUp {
            from {
                opacity: 0;
                transform: translateY(8px);
            }
            to {
                opacity: 1;
                transform: translateY(0);
            }
        }
    </style>
</head>
<body>

<nav>
    <div class="nav-brand">🍽️ Admin Panel</div>
    <a href="#" class="nav-link">Gerechten beheer</a>
</nav>

<main>
    <div class="page-header">
        <a href="#" class="back-link">← Terug naar overzicht</a>
        <h1>Nieuw gerecht</h1>
        <p>Vul de gegevens in om een gerecht toe te voegen aan het menu.</p>
    </div>

    <div class="success-banner" id="success-banner">
        ✓ Gerecht succesvol toegevoegd aan het menu!
    </div>

    <div class="form-card">
        <div class="form-card-head">
            <div class="icon">🍴</div>
            <h2>Gerecht toevoegen</h2>
        </div>

        <div class="form-body">
            <form method="post">

                <div class="form-group" id="group-titel">
                    <label>Titel <span class="required">*</span></label>
                    <input name="titel" type="text" id="input-titel" placeholder="bijv. Grilled Salmon"/>
                    <span class="error-msg" id="err-titel">Vul een titel in.</span>
                </div>

                <div class="form-group" id="group-omschrijving">
                    <label>Omschrijving <span  class="required">*</span></label>
                    <textarea name="omschrijving" id="input-omschrijving" placeholder="Korte omschrijving van het gerecht..."></textarea>
                    <span class="hint">Maximaal 200 tekens aanbevolen.</span>
                    <span class="error-msg" id="err-omschrijving">Vul een omschrijving in.</span>
                </div>


                <div class="form-group" id="group-prijs">
                    <label>Prijs <span class="required">*</span></label>
                    <div class="price-wrap">
                        <span class="currency">€</span>
                        <input name="prijs" type="number" id="input-prijs" placeholder="0.00" min="0" step="0.01"/>
                    </div>
                    <span class="error-msg" id="err-prijs">Vul een geldige prijs in.</span>
                </div>


        </div>

        <div class="form-actions">
            <a href="#" class="btn-cancel" Annuleren</a>
            <button name="opslaan" class="btn-save" type="submit">
                ✓ Gerecht opslaan
            </button>
        </div>
        </form>
    </div>
</main>

<script>
    function clearErrors() {
        ['titel', 'omschrijving', 'prijs'].forEach(f => {
            document.getElementById('group-' + f)?.classList.remove('field-error');
            document.getElementById('err-' + f)?.classList.remove('show');
        });
    }

    function showError(field, msg) {
        document.getElementById('group-' + field).classList.add('field-error');
        const err = document.getElementById('err-' + field);
        err.textContent = msg;
        err.classList.add('show');
    }

    function saveGerecht() {
        clearErrors();
        const titel = document.getElementById('input-titel').value.trim();
        const omschrijving = document.getElementById('input-omschrijving').value.trim();
        const prijs = parseFloat(document.getElementById('input-prijs').value);
        let valid = true;

        if (!titel) {
            showError('titel', 'Vul een titel in.');
            valid = false;
        }
        if (!omschrijving) {
            showError('omschrijving', 'Vul een omschrijving in.');
            valid = false;
        }
        if (isNaN(prijs) || prijs < 0) {
            showError('prijs', 'Vul een geldige prijs in.');
            valid = false;
        }

        if (!valid) return;

        // Success
        document.getElementById('success-banner').classList.add('show');
        document.getElementById('success-banner').textContent = `✓ "${titel}" is succesvol toegevoegd aan het menu!`;
        window.scrollTo({top: 0, behavior: 'smooth'});

        // Reset form
        setTimeout(resetForm, 2500);
    }

    function resetForm() {
        clearErrors();
        document.getElementById('input-titel').value = '';
        document.getElementById('input-omschrijving').value = '';
        document.getElementById('input-prijs').value = '';
        document.getElementById('input-categorie').value = 'Vlees';
        setTimeout(() => document.getElementById('success-banner').classList.remove('show'), 300);
    }

    document.addEventListener('keydown', e => {
        if (e.key === 'Enter' && document.activeElement.tagName !== 'TEXTAREA') saveGerecht();
    });
</script>
</body>
</html>
