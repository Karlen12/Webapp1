<?php

$connection = new PDO('mysql:host=mysql_db;dbname=Webapplicatie1', 'root', 'rootpassword');

if (isset($_GET['zoekenknop'])) {
    $sql = $connection->prepare("SELECT * FROM `menukaart` WHERE omschrijving LIKE :filter OR titel LIKE :filter");
    $sql->bindValue(':filter', '%' . $_GET['zoekveld'] . '%');
    $sql->execute();
    $result = $sql->fetchAll();
} else {
    $sql = $connection->prepare("SELECT * FROM `menukaart`");
    $sql->execute();
    $result = $sql->fetchAll();
}

?>


<!DOCTYPE html>
<html lang="nl">
<head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <meta name="description" content="Ararat — Fine Armenian dining. Ancient flavours reimagined with precision and grace in the heart of Amsterdam." />
    <title>Ararat — Fine Armenian Dining</title>

    <!-- Fonts -->
    <link rel="preconnect" href="https://fonts.googleapis.com" />
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin />
    <link href="https://fonts.googleapis.com/css2?family=Cormorant+Garamond:ital,wght@0,300;0,400;1,300;1,400&family=Jost:wght@300;400;500&display=swap" rel="stylesheet" />

    <!-- Stylesheet -->
    <link rel="stylesheet" href="style.css" />
</head>
<body>

<!-- Accessibility: skip to main -->
<a class="skip-link" href="#main-content">Skip to main content</a>

<!-- ═══ HEADER ═══ -->
<header class="site-header" role="banner" id="site-header">
    <a class="logo" href="#" aria-label="Ararat — homepage">Ararat</a>
    <nav class="primary-nav" aria-label="Primary navigation">
        <a href="#philosophy">Our Story</a>
        <a href="#menu">Menu</a>
        <a href="#experiences">Experiences</a>
        <a href="#ambiance">Ambiance</a>
        <a href="#contact">Contact</a>
    </nav>
</header>

<!-- ═══ MAIN ═══ -->
<main id="main-content" tabindex="-1">

    <!-- HERO -->
    <section class="hero" aria-labelledby="hero-title">
        <div class="hero__visual" aria-hidden="true">
            <img
                    src="https://images.unsplash.com/photo-1414235077428-338989a2e8c0?w=1400&auto=format&fit=crop&q=80"
                    alt="Ararat restaurant — elegant dining room"
                    width="700" height="900"
                    loading="eager"
            />
        </div>
        <div class="hero__content">
            <span class="eyebrow">Amsterdam · Est. 2018</span>
            <h1 class="hero__title" id="hero-title">
                The Soul<br>of <em>Armenian</em><br>Cuisine
            </h1>
            <p class="hero__desc">
                A journey through ancient flavours, reimagined with precision and grace.
                Every dish tells the story of a land shaped by mountain, sea and centuries of tradition.
            </p>
            <a href="#contact" class="btn btn--dark">
                Reserve a Table <span aria-hidden="true">→</span>
            </a>
        </div>
    </section>

    <div class="ornament" aria-hidden="true">· · ·</div>

    <!-- OUR STORY -->
    <section class="philosophy" id="philosophy" aria-labelledby="philosophy-heading">
        <div class="section-inner">
            <div class="philosophy__meta">
                <span class="section-label" aria-hidden="true">Our Philosophy</span>
            </div>
            <div class="philosophy__body">
                <h2 id="philosophy-heading">Where heritage<br>meets craft</h2>
                <p>Armenian cuisine is one of the world's oldest culinary traditions — born in the highlands of the Caucasus, shaped by spice routes and seasonal abundance. At Ararat, we honour that heritage without nostalgia.</p>
                <p>Using heritage grains, wild herbs and seasonal produce, we build dishes that are rooted yet restless. Our kitchen follows no trend — only the season, the supplier, and the dish itself.</p>
                <dl class="philosophy__stats" aria-label="Restaurant at a glance">
                    <div class="stat">
                        <dt class="stat__label">Years of craft</dt>
                        <dd class="stat__number">07</dd>
                    </div>
                    <div class="stat">
                        <dt class="stat__label">Seasonal dishes</dt>
                        <dd class="stat__number">42</dd>
                    </div>
                    <div class="stat">
                        <dt class="stat__label">Covers per night</dt>
                        <dd class="stat__number">60</dd>
                    </div>
                </dl>
            </div>
        </div>
    </section>

    <!-- MENU -->
    <section class="menu-section" id="menu" aria-labelledby="menu-heading">
        <div class="section-inner">
            <div class="menu-section__head">
                <h2 id="menu-heading">From the<br><em>Kitchen</em></h2>
                <a href="#" class="btn btn--outline" aria-label="View full menu">Full Menu <span aria-hidden="true">→</span></a>
            </div>

            <!-- Zoekbalk -->
            <form method="GET" action="#menu" style="margin-bottom: 2rem;">
                <div style="display: flex; gap: 0.5rem; max-width: 460px;">
                    <input
                            type="search"
                            name="zoekveld"
                            placeholder="Zoek een gerecht…"
                            aria-label="Zoek in het menu"
                            autocomplete="off"
                            value="<?php echo isset($_GET['zoekveld']) ? htmlspecialchars($_GET['zoekveld']) : ''; ?>"
                            style="flex: 1; padding: 0.6rem 1rem; border: 1px solid #ccc; font-family: inherit; font-size: 0.95rem; background: transparent;"
                    />
                    <button type="submit" name="zoekenknop" class="btn btn--dark">
                        Zoeken <span aria-hidden="true">→</span>
                    </button>
                    <?php if (isset($_GET['zoekenknop'])): ?>
                        <a href="#menu" class="btn btn--outline">Wissen</a>
                    <?php endif; ?>
                </div>
            </form>

            <!-- Geen resultaten melding -->
            <?php if (isset($_GET['zoekenknop']) && empty($result)): ?>
                ">
                    Niks gevonden  "<?php echo ($_GET['zoekveld']); ?>".
                </p>
            <?php endif; ?>

            <!-- GERECHTEN -->
            <div class="menu-panel active" id="panel-starters" role="tabpanel" aria-labelledby="tab-starters">
                <?php foreach ($result as $menuitem): ?>
                    <article class="menu-item">
                        <p class="menu-item__cat">dishes</p>
                        <h3 class="menu-item__name"><?php echo ($menuitem['titel']); ?></h3>
                        <p class="menu-item__desc"><?php echo ($menuitem['omschrijving']); ?></p>
                        <p class="menu-item__price"><?php echo($menuitem['prijs']); ?></p>
                    </article>
                <?php endforeach; ?>
            </div>

        </div>
    </section>

    <!-- EXPERIENCES -->
    <section class="experiences" id="experiences" aria-labelledby="exp-heading">
        <div class="section-inner">
            <div class="experiences__intro">
                <h2 id="exp-heading">Curated<br>Experiences</h2>
                <a href="#contact" class="btn btn--outline-dark">Enquire <span aria-hidden="true">→</span></a>
            </div>
            <article class="experience-card">
                <div class="experience-card__number" aria-hidden="true">01</div>
                <h3 class="experience-card__title">Private Dining</h3>
                <p class="experience-card__desc