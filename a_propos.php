<?php 
require_once __DIR__ . "/lib/start_session.php";
require_once __DIR__ . "/lib/session.php";
require_once __DIR__ . "/lib/config.php";
require_once __DIR__ . "/lib/menu.php"; 
require_once __DIR__ . "/templates/header.php"; 
?>


<div class="about-section">
    <h1>À Propos de MangaTrendz</h1>
    <p>
        <strong>MangaTrendz</strong> est une plateforme dédiée à tous les passionnés de manga et d'anime. Notre mission est de fournir les dernières actualités, critiques, et analyses détaillées sur les séries populaires ainsi que les perles moins connues de l'univers du manga et de l'anime. Que vous soyez un fan invétéré ou un nouveau venu dans le monde du dessin japonais, MangaTrendz est votre guide dans cet univers fascinant.
    </p>
    <h2>L'Évolution du Manga et de l'Anime</h2>
    <p>
        Au cours des dernières années, l'industrie du manga et de l'anime a connu une croissance exponentielle, aussi bien au Japon que sur la scène internationale. En 2020, le marché du manga a généré plus de 600 milliards de yens au Japon, marquant une augmentation de 23% par rapport à l'année précédente. Parallèlement, les plateformes de streaming telles que Netflix et Crunchyroll ont élargi leur catalogue d'anime, rendant ces œuvres accessibles à un public mondial et diversifié. Ces développements témoignent de l'attrait croissant pour ce genre.
    </p>
    <canvas id="mangaChart" width="400" height="400"></canvas>

    <h2>Histoire du Dessin Japonais</h2>
    <p>
        Le dessin japonais, ou manga, a ses racines dans les rouleaux narratifs de l'époque Heian (794-1185). Cependant, c'est dans l'après-guerre que le manga moderne a véritablement pris forme, avec des œuvres pionnières telles que "Astro Boy" de Osamu Tezuka, souvent considéré comme le père du manga moderne. Tezuka a introduit des éléments narratifs et esthétiques qui sont aujourd'hui des standards du genre.
    </p>
    <p>
        Dans les années 1980 et 1990, des séries telles que "Akira" de Katsuhiro Otomo et "Dragon Ball" de Akira Toriyama ont révolutionné le manga et l'anime, poussant les limites de ce que ces médias pouvaient raconter. Leur succès a pavé la voie à une nouvelle génération de créateurs, et a contribué à l'essor mondial du manga et de l'anime.
    </p>
    <p>
        Aujourd'hui, des auteurs comme Eiichiro Oda avec "One Piece" et Hajime Isayama avec "Attack on Titan" continuent de captiver des millions de lecteurs et de spectateurs à travers le monde, prouvant que le manga et l'anime ne sont pas seulement des formes de divertissement, mais aussi de véritables arts narratifs.
    </p>
    <h2>Conclusion</h2>
    <p>
        Chez <strong>MangaTrendz</strong>, nous célébrons cette riche histoire et son évolution constante. Rejoignez-nous pour explorer les profondeurs créatives du manga et de l'anime, et pour partager votre passion avec une communauté de fans tout aussi dévoués.
    </p>
</div>
<script src="./mangaChart.js"></script>
<?php require_once __DIR__ ."/templates/footer.php"; ?>
