<?php
session_start();

if (isset($_POST['Login'])) {
    if ($_POST['username'] == "admin" && $_POST['password'] == "Karlen") {
        $_SESSION['ingelogd'] = true; // ← dit toevoegen!
        header('Location: admin.php');
        exit;
    } else {
        echo "Je bent niet ingelogd";
    }
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8"/>
    <meta name="viewport" content="width=device-width, initial-scale=1.0"/>
    <title>Ararat — Sign In</title>
    <link href="https://fonts.googleapis.com/css2?family=Cormorant+Garamond:wght@300;400;600;700&family=Jost:wght@300;400;500&display=swap" rel="stylesheet"/>
    <link rel="stylesheet" href="inlog.css"/>
</head>
<body>


<div class="flag-stripes">
    <div></div><div></div><div></div>
</div>

<div class="wrapper">
    <div class="emblem">
        <svg viewBox="0 0 48 48" fill="none" xmlns="http://www.w3.org/2000/svg">
            <circle cx="24" cy="24" r="22" stroke="#b8711a" stroke-width="1"/>
            <circle cx="24" cy="24" r="14" stroke="#b8711a" stroke-width="0.75"/>
            <line x1="24" y1="2"  x2="24" y2="46" stroke="#b8711a" stroke-width="0.75"/>
            <line x1="2"  y1="24" x2="46" y2="24" stroke="#b8711a" stroke-width="0.75"/>
            <line x1="7.5"  y1="7.5"  x2="40.5" y2="40.5" stroke="#b8711a" stroke-width="0.5" opacity="0.5"/>
            <line x1="40.5" y1="7.5"  x2="7.5"  y2="40.5" stroke="#b8711a" stroke-width="0.5" opacity="0.5"/>
            <circle cx="24" cy="24" r="4" fill="#b8711a" opacity="0.85"/>
        </svg>
        <div class="emblem-name">Ararat</div>
    </div>

    <div class="card">
        <div class="corner-bl"></div>

        <h1>Welcome back</h1>
        <p class="subtitle">Sign in to continue</p>

        <form action="#" method="POST">
            <div class="field">
                <label for="username">Username</label>
                <div class="input-wrap">
                    <input type="text" id="username" name="username" placeholder="Enter your username" autocomplete="username" required/>
                    <svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round">
                        <path d="M20 21v-2a4 4 0 0 0-4-4H8a4 4 0 0 0-4 4v2"/><circle cx="12" cy="7" r="4"/>
                    </svg>
                </div>
            </div>

            <div class="field">
                <label for="password">Password</label>
                <div class="input-wrap">
                    <input type="password" id="password" name="password" placeholder="••••••••" autocomplete="current-password" required/>
                    <svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round">
                        <rect x="3" y="11" width="18" height="11" rx="2" ry="2"/><path d="M7 11V7a5 5 0 0 1 10 0v4"/>
                    </svg>
                </div>
            </div>

            <div class="options">
                <label class="remember">
                    <input type="checkbox" name="remember"/> Remember me
                </label>
                <a class="forgot" href="#">Forgot password?</a>
            </div>

            <button type="submit" class="btn" name="Login">Sign In </button>
        </form>
    </div>
</div>

</body>
</html>