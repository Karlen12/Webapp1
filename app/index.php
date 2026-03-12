<?php

$connexion = new PDO('mysql:host=mysql_db;dbname=Webapplicatie1', 'root', 'rootpassword');

$sql = $connexion->prepare("SELECT * FROM `menukaart`");

$sql->execute();
$result = $sql->fetchAll();



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

            <!-- Tab navigation -->

            <!-- STARTERS -->
            <div class="menu-panel active" id="panel-starters" role="tabpanel" aria-labelledby="tab-starters">
                <?php
                foreach ($result as $menuitem) {
                    {
                        ?>
                        <article class="menu-item">
                            <p class="menu-item__cat">dishes</p>
                            <h3 class="menu-item__name"><?php echo $menuitem ["titel"] ?> </h3>
                            <p class="menu-item__desc"> <?php echo $menuitem ["omschrijving"] ?></p>
                            <p class="menu-item__price" aria-label="23 euros"><?php echo $menuitem ["prijs"] ?></p>
                        </article>
                        <?php
                    }
                }
                ?>

            </div>


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
                <p class="experience-card__desc">An exclusive room for up to 20 guests. Perfect for celebrations, corporate dinners and intimate gatherings.</p>
            </article>
            <article class="experience-card">
                <div class="experience-card__number" aria-hidden="true">02</div>
                <h3 class="experience-card__title">Chef's Table</h3>
                <p class="experience-card__desc">Six seats at the pass. Watch our team work and enjoy a seasonal tasting menu created that evening.</p>
            </article>
            <article class="experience-card">
                <div class="experience-card__number" aria-hidden="true">03</div>
                <h3 class="experience-card__title">Wine Pairing</h3>
                <p class="experience-card__desc">A curated selection of Armenian and Caucasian wines, paired course by course by our sommelier.</p>
            </article>
        </div>
    </section>

    <!-- AMBIANCE -->
    <section class="ambiance" id="ambiance" aria-labelledby="ambiance-heading">
        <div class="section-inner">
            <div class="ambiance__text">
                <span class="section-label" aria-hidden="true">The Space</span>
                <br><br>
                <h2 id="ambiance-heading">Designed for<br>presence</h2>
                <p>Warm materials, considered light, and the gentle rhythm of the kitchen. Our dining room is a retreat from the pace of the city.</p>
            </div>
            <div aria-hidden="true"></div>
        </div>
        <div class="gallery" role="img" aria-label="Ararat restaurant spaces">
            <div class="gallery__tile"><span class="gallery__tile-label">The Dining Room</span></div>
            <div class="gallery__tile"><span class="gallery__tile-label">The Bar</span></div>
            <div class="gallery__tile"><span class="gallery__tile-label">The Garden</span></div>
            <div class="gallery__tile"><span class="gallery__tile-label">Private Dining</span></div>
            <div class="gallery__tile"><span class="gallery__tile-label">The Kitchen</span></div>
        </div>
    </section>

    <!-- RESERVATION CTA -->
    <section class="reservation-cta" aria-labelledby="cta-heading">
        <span class="eyebrow">Join Us</span>
        <h2 id="cta-heading">Reserve your<br><em>evening</em></h2>
        <p>Lunch Tuesday–Friday &nbsp;·&nbsp; Dinner Tuesday–Sunday</p>
        <a href="#contact" class="btn btn--dark">
            Make a Reservation <span aria-hidden="true">→</span>
        </a>
    </section>

    <!-- CONTACT -->
    <section class="contact" id="contact" aria-labelledby="contact-heading">
        <div class="section-inner">
            <div class="contact__info">
                <h2 id="contact-heading">Get in<br><em>touch</em></h2>
                <address style="font-style:normal;">
                    <div class="contact-detail">
                        <p class="contact-detail__label">Address</p>
                        <p class="contact-detail__value">Keizersgracht 1<br>1015 CN Amsterdam<br>The Netherlands</p>
                    </div>
                    <div class="contact-detail">
                        <p class="contact-detail__label">Phone</p>
                        <p class="contact-detail__value"><a href="tel:+31200000000">+31 20 000 0000</a></p>
                    </div>
                    <div class="contact-detail">
                        <p class="contact-detail__label">Email</p>
                        <p class="contact-detail__value"><a href="mailto:hello@ararat-restaurant.nl">hello@ararat-restaurant.nl</a></p>
                    </div>
                    <div class="contact-detail">
                        <p class="contact-detail__label">Opening Hours</p>
                        <p class="contact-detail__value">
                            Lunch: Tue – Fri, 12:00 – 15:00<br>
                            Dinner: Tue – Sun, 18:00 – 23:00<br>
                            Monday: Closed
                        </p>
                    </div>
                </address>
            </div>

            <div class="contact__form">
                <h3>Make a Reservation</h3>
                <form action="#" method="post" novalidate>
                    <div class="form-row">
                        <div class="form-field">
                            <label for="first-name">First name</label>
                            <input type="text" id="first-name" name="first_name" autocomplete="given-name" placeholder="Marie" required />
                        </div>
                        <div class="form-field">
                            <label for="last-name">Last name</label>
                            <input type="text" id="last-name" name="last_name" autocomplete="family-name" placeholder="Dupont" required />
                        </div>
                    </div>
                    <div class="form-field">
                        <label for="email">Email</label>
                        <input type="email" id="email" name="email" autocomplete="email" placeholder="marie@example.com" required />
                    </div>
                    <div class="form-row">
                        <div class="form-field">
                            <label for="date">Date</label>
                            <input type="date" id="date" name="date" required />
                        </div>
                        <div class="form-field">
                            <label for="time">Time</label>
                            <select id="time" name="time" required>
                                <option value="" disabled selected>Select time</option>
                                <optgroup label="Lunch">
                                    <option>12:00</option><option>12:30</option>
                                    <option>13:00</option><option>13:30</option>
                                </optgroup>
                                <optgroup label="Dinner">
                                    <option>18:00</option><option>18:30</option>
                                    <option>19:00</option><option>19:30</option>
                                    <option>20:00</option><option>20:30</option>
                                    <option>21:00</option>
                                </optgroup>
                            </select>
                        </div>
                    </div>
                    <div class="form-field">
                        <label for="guests">Number of guests</label>
                        <select id="guests" name="guests" required>
                            <option value="" disabled selected>Select guests</option>
                            <option>1</option><option>2</option><option>3</option>
                            <option>4</option><option>5</option><option>6+</option>
                        </select>
                    </div>
                    <div class="form-field">
                        <label for="notes">Special requests</label>
                        <textarea id="notes" name="notes" placeholder="Dietary requirements, celebrations, etc." rows="3"></textarea>
                    </div>
                    <button type="submit" class="btn btn--dark" style="width:100%;justify-content:center;">
                        Confirm Reservation <span aria-hidden="true">→</span>
                    </button>
                </form>
            </div>
        </div>
    </section>

</main>

<!-- ═══ FOOTER ═══ -->
<footer class="site-footer" role="contentinfo">
    <div class="site-footer__grid">
        <div>
            <span class="footer-brand">Ararat</span>
            <p>Fine Armenian dining in the heart of Amsterdam. A table for every occasion.</p>
        </div>
        <nav aria-label="Footer — Explore">
            <h4>Explore</h4>
            <ul>
                <li><a href="#philosophy">Our Story</a></li>
                <li><a href="#menu">Menu</a></li>
                <li><a href="#experiences">Experiences</a></li>
                <li><a href="#ambiance">Ambiance</a></li>
            </ul>
        </nav>
        <nav aria-label="Footer — Visit">
            <h4>Visit</h4>
            <p>Keizersgracht 1<br>1015 CN Amsterdam<br><a href="tel:+31200000000">+31 20 000 0000</a></p>
        </nav>
        <div>
            <h4>Hours</h4>
            <p>Lunch: Tue – Fri<br>12:00 – 15:00<br><br>Dinner: Tue – Sun<br>18:00 – 23:00</p>
        </div>
    </div>
    <div class="site-footer__bottom">
        <span>© 2025 Ararat Restaurant — All rights reserved</span>
        <span>KVK 12345678 · BTW NL123456789B01</span>
    </div>
</footer>

<!-- JavaScript -->
<script src="main.js"></script>

</body>
</html>