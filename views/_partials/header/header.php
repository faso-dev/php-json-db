<header>
    <nav class="navbar navbar-gray">
        <div class="container">
            <a
                    target="_blank"
                    class="navbar-brand"
                    href="https://onass.herokuapp.com">ONASS</a>
            <div class="collapse navbar-content" id="navbarNav">
                <ul class="navbar-nav">
                    <li class="nav-item <?= make_active('home') ?>">
                        <a class="nav-link" href="<?= route('home') ?>">Accueil</a>
                    </li>
                    <li class="nav-item <?= make_active('create_sport') ?>">
                        <a class="nav-link" href="<?= route('create_sport') ?>">Inscription</a>
                    </li>
                </ul>
                <form action="<?= route('search_sport') ?>">
                    <input value="<?= query('q') ?? '' ?>" type="text" name="q" placeholder="Tapez vos mots clés">
                </form>
            </div>
        </div>
    </nav>
</header>