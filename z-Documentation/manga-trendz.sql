-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Hôte : 127.0.0.1:3306
-- Généré le : lun. 30 mars 2026 à 13:27
-- Version du serveur : 8.0.31
-- Version de PHP : 8.2.0

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de données : `manga-trendz`
--

-- --------------------------------------------------------

--
-- Structure de la table `articles`
--

DROP TABLE IF EXISTS `articles`;
CREATE TABLE IF NOT EXISTS `articles` (
  `id` int NOT NULL AUTO_INCREMENT,
  `category_id` int NOT NULL,
  `title` varchar(255) NOT NULL,
  `content` text NOT NULL,
  `image` varchar(255) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT CURRENT_TIMESTAMP,
  PRIMARY KEY (`id`),
  KEY `category_id` (`category_id`)
) ENGINE=InnoDB AUTO_INCREMENT=117 DEFAULT CHARSET=utf8mb3;

--
-- Déchargement des données de la table `articles`
--

INSERT INTO `articles` (`id`, `category_id`, `title`, `content`, `image`, `created_at`) VALUES
(1, 1, 'L\'Évolution de Luffy : La Puissance du Gear 5', 'Dans le monde palpitant de \"One Piece\", Monkey D. Luffy, le capitaine audacieux de l\'équipage du Chapeau de Paille, ne cesse de nous surprendre. Luffy, connu pour ses capacités élastiques dues au fruit du démon Gomu Gomu no Mi, a franchi un nouveau seuil dans ses pouvoirs avec l\'introduction du Gear 5.\n\nQu\'est-ce que le Gear 5?\nLe Gear 5 est une transformation que Luffy débloque, poussant ses capacités au-delà des limites préalablement imaginées. Cette forme lui confère non seulement une augmentation significative de force et de vitesse, mais modifie également l\'apparence physique de Luffy, le rendant plus grand et imposant. L\'aspect le plus remarquable de cette transformation est la capacité de Luffy à manipuler librement son corps de manière encore plus créative et puissante que par le passé.\n\nLes Capacités du Gear 5\nDans cette forme, Luffy montre une maîtrise incroyable de son corps élastique. Il peut étirer et gonfler ses membres à des proportions gigantesques, augmentant ainsi la portée et la puissance de ses attaques. De plus, le Gear 5 lui permet de rebondir les attaques ennemies et de se mouvoir à une vitesse fulgurante, rendant ses mouvements presque imprévisibles.\n\nL\'Impact sur l\'Histoire\nL\'introduction du Gear 5 dans l\'arc narratif de \"One Piece\" marque un moment clé, non seulement pour le personnage de Luffy mais aussi pour l\'ensemble de la série. Cette nouvelle forme représente l\'évolution constante de Luffy en tant que combattant et son désir inébranlable de protéger ses amis et d\'atteindre ses objectifs. Le Gear 5 est un symbole de la détermination de Luffy à surmonter tous les obstacles et à se battre contre des adversaires de plus en plus puissants.\n\nConclusion\nLe Gear 5 de Luffy est un ajout spectaculaire à son arsenal déjà impressionnant. Il incarne l\'esprit de \"One Piece\", où la volonté, la détermination et l\'amitié mènent à des pouvoirs inimaginables et des victoires épiques. Alors que Luffy continue son voyage vers le titre de Roi des Pirates, ses fans attendent avec impatience de voir comment le Gear 5 sera utilisé pour affronter les défis futurs.', '1-Luffy.jpeg', '2024-09-01 20:30:42'),
(2, 1, 'Itachi Uchiha : Le Ninja Tourmenté de Konoha\r\n', 'Dans l\'univers de \"Naruto\", peu de personnages suscitent autant d\'émotions contradictoires que Itachi Uchiha. Membre du célèbre clan Uchiha et frère aîné de Sasuke Uchiha, Itachi est un personnage enveloppé de mystère et de tragédie, dont les actions ont eu un impact profond sur l\'histoire de Konoha et sur le parcours de son frère.\r\n\r\nJeunesse et Prodigie\r\nItachi a montré dès son plus jeune âge des signes d\'un talent exceptionnel. Il est rapidement devenu l\'un des ninjas les plus doués de sa génération, excédant toutes les attentes. Itachi était non seulement un prodige dans les arts ninja, mais il possédait également une grande intelligence et une maturité émotionnelle qui le distinguait de ses pairs.\r\n\r\nL\'Anéantissement du Clan Uchiha\r\nL\'événement le plus marquant et controversé de la vie d\'Itachi est sans doute l\'extermination de son propre clan. Cette nuit tragique, où il a massacré presque tous les membres du clan Uchiha, y compris ses parents, a longtemps été considérée comme un acte de trahison impardonnable. Cependant, il est révélé plus tard que ses actions étaient motivées par un désir désespéré de prévenir un coup d\'État qui aurait plongé le village dans une guerre civile, sacrifiant ainsi sa propre réputation pour la paix de Konoha.\r\n\r\nItachi et Akatsuki\r\nAprès le massacre de son clan, Itachi rejoint Akatsuki, une organisation de ninjas renégats. Ses motivations restent mystérieuses pendant une grande partie de la série. Il se révèle être un agent double, travaillant pour le compte de Konoha tout en gardant ses intentions cachées.\r\n\r\nLe Pouvoir d\'Itachi\r\nItachi était un utilisateur exceptionnel du Sharingan, une capacité spéciale de son clan, lui conférant des capacités impressionnantes, comme la copie des techniques de ses adversaires et des genjutsu (illusions) puissants. Son Mangekyō Sharingan, qu\'il a activé après la mort de son meilleur ami, lui a donné accès à des techniques encore plus dévastatrices.\r\n\r\nL\'Héritage d\'Itachi\r\nLa vérité sur les actions d\'Itachi et ses véritables intentions n\'est révélée que post-mortem, changeant radicalement la perception de son personnage. Sa complexité et son sacrifice font de lui l\'un des personnages les plus profonds et les plus aimés de la série \"Naruto\". Il reste un symbole de sacrifice et de douleur cachée, démontrant que les choix les plus difficiles sont parfois faits dans l\'ombre, loin des yeux du monde.\r\n\r\n', '3-Itachi.jpg', '2024-09-01 20:30:42'),
(3, 1, 'Kenshiro de \"Hokuto no Ken\" : L\'Étoile du Nord Incarnée', '\r\nKenshiro, ou Ken comme il est affectueusement connu, est le personnage central de \"Hokuto no Ken\", un manga qui a marqué son époque par son action intense et sa narration dramatique. Située dans un monde post-apocalyptique, l\'histoire de Kenshiro est celle de la survie, de la justice et de la quête incessante de paix dans un monde ravagé par le chaos et la violence.\r\n\r\nL\'Héritier du Hokuto Shinken\r\nKenshiro est le successeur de l\'ancien art martial du Hokuto Shinken, un style de combat mortel qui permet à son utilisateur de cibler et d\'exploiter les points de pression secrets du corps humain. À travers cet art, Ken peut infliger des dégâts internes dévastateurs à ses adversaires, souvent avec des résultats explosifs et spectaculaires.\r\n\r\nUn Monde Ravagé\r\nL\'univers de \"Hokuto no Ken\" est brutal et impitoyable, reflétant une société où les plus forts dominent par la force et la terreur. Ken, avec ses compétences inégalées en Hokuto Shinken, se bat pour protéger les innocents et rétablir l\'ordre dans un monde où les lois et la morale semblent avoir disparu.\r\n\r\nUn Personnage Torturé\r\nKenshiro n\'est pas un héros unidimensionnel. Sa force physique est contrebalancée par une profondeur émotionnelle et une humanité qui le rendent attachant. Il est tourmenté par la perte de son amour, Julia, et par la trahison de son ami et rival, Shin. Cette douleur personnelle alimente sa quête de justice et de vengeance, tout en façonnant son désir de créer un monde meilleur.\r\n\r\nL\'Influence de Kenshiro\r\nKenshiro est devenu un archétype du héros d\'anime et de manga, reconnaissable à son imposante stature, ses cicatrices caractéristiques en forme de sept étoiles, et ses lignes de dialogue mémorables. Sa capacité à rester compatissant dans un monde cruel inspire les personnages autour de lui et les fans du manga.\r\n\r\nConclusion\r\nKenshiro représente l\'idéal du héros silencieux et puissant qui lutte contre les forces oppressives dans un monde sans pitié. Son histoire dans \"Hokuto no Ken\" est une exploration captivante de la résilience humaine, du pouvoir de la justice, et de la quête inébranlable de la paix. À travers Kenshiro, \"Hokuto no Ken\" offre un récit puissant sur la force intérieure et le courage face à l\'adversité.\r\n\r\n', '4-Kenshiro.jpg', '2024-09-01 20:30:42'),
(5, 1, 'L\'Arc final de One Piece approche à grands pas', 'Eiichiro Oda, l\'auteur de \"One Piece\", a confirmé que l\'arc final de la série est en cours. Après plus de 1000 chapitres et une série animée qui continue d\'évoluer, les fans s\'attendent à des combats épiques, des alliances inattendues, et des réponses aux mystères qui entourent le One Piece lui-même.', '5-one_piece.jpg', '2024-09-01 21:24:14'),
(6, 1, 'Le Film Demon Slayer: Kimetsu no Yaiba - La Toison Rouge Bat des Records de Box-Office', 'Le dernier film \"Demon Slayer: Kimetsu no Yaiba - La Toison Rouge\" a pulvérisé tous les records de box-office en devenant le film d\'animation le plus rentable de l\'histoire au Japon.\r\n\r\nSorti en avril 2024, \"La Toison Rouge\" continue de captiver le public avec son animation éblouissante et son intrigue poignante. Avec plus de 50 milliards de yens de recettes au Japon seulement, il surpasse les records précédents détenus par \"Your Name\" et \"Spirited Away\".', '6-Demon_slayer.jpg', '2024-09-01 21:29:50'),
(7, 1, 'Attack on Titan Saison Finale : Le Dernier Combat Contre les Titans', 'Résumé : La saison finale de \"Attack on Titan\" est en cours, et le monde entier suit de près la bataille finale entre les Titans et les derniers membres de l\'escouade de reconnaissance.\r\n\r\nAlors que la série se rapproche de son dénouement, les fans sont en haleine en attendant de voir qui survivra à l\'affrontement final et quelle vérité ultime sera révélée sur le monde des Titans.', '7-SNK.jpg', '2024-09-01 21:29:50'),
(8, 1, 'Chainsaw Man Saison 2 : Première Bande-Annonce Dévoilée !', 'La bande-annonce de la saison 2 de \"Chainsaw Man\" vient d\'être dévoilée, et les fans sont plus excités que jamais pour voir les nouvelles aventures de Denji et son équipe.\r\nMAPPA a révélé la bande-annonce lors de l\'Anime Expo 2024, montrant de nouvelles scènes d\'action, de nouveaux personnages, et des combats plus intenses. La saison 2 est prévue pour l\'automne 2024.', '8-ChainsawMan.jpg', '2024-09-01 21:32:12'),
(9, 1, 'My Hero Academia : Une Nouvelle Collaboration avec Marvel !', '\"My Hero Academia\" annonce une collaboration inattendue avec Marvel Comics, qui verra les héros de l\'univers des Avengers rencontrer ceux de l\'académie U.A.\r\nLa collaboration entre les deux géants de la bande dessinée est prévue pour l\'été 2024 et comportera un crossover unique où les jeunes héros de \"My Hero Academia\" travailleront aux côtés de personnages emblématiques comme Spider-Man, Iron Man, et Captain Marvel.', '9-MHAvsMarvel.jpeg', '2024-09-01 21:33:31'),
(10, 1, 'Jujutsu Kaisen Saison 3 : Date de Sortie et Nouveau Trailer Dévoilés', '\r\nLa troisième saison de \"Jujutsu Kaisen\" a une date de sortie officielle et un nouveau trailer rempli de scènes d\'action et de combats intenses.\r\nPrévue pour janvier 2025, la saison 3 de \"Jujutsu Kaisen\" promet de continuer à explorer les arcs narratifs avec une intensité accrue, notamment avec l\'introduction de nouveaux méchants et la confrontation attendue avec Sukuna.', '10-JJK.jpeg', '2024-09-01 21:34:33'),
(11, 1, 'Dragon Ball Super : Nouveau Chapitre Annoncé pour 2024\r\n', 'Akira Toriyama et Toyotarou ont annoncé un nouveau chapitre pour \"Dragon Ball Super\", qui commencera en décembre 2024.\r\nCe nouveau chapitre s\'intitulera \"Le Retour des Dieux\" et explorera un nouvel ennemi divin qui mettra à l\'épreuve Goku, Vegeta et leurs amis. Le chapitre comprendra également des révélations surprenantes sur le multivers.', '11-DBS.jpg', '2024-09-01 21:35:24'),
(12, 1, 'Spy x Family Saison 2 : Une Comédie D\'espionnage Qui Continue de Fasciner', '\"Spy x Family\" continue de charmer les spectateurs avec sa deuxième saison qui mêle espionnage, comédie et drame familial.\r\n\r\nAnya, Loid et Yor Forger continuent de jongler avec leurs identités secrètes tout en naviguant dans les défis quotidiens de leur vie de famille. La saison 2 a été bien accueillie par les critiques et les fans, consolidant \"Spy x Family\" comme l\'un des meilleurs animes de l\'année.', '12-Spy_x_family.jpg', '2024-09-01 21:37:15'),
(13, 1, 'Naruto Shippuden : Un Nouveau Projet Anime en Célébration des 20 Ans', 'Pour célébrer le 20e anniversaire de \"Naruto\", un nouveau projet d\'anime a été annoncé, promettant de nouvelles aventures dans le monde des ninjas.\r\n\r\nStudio Pierrot travaille sur un projet spécial qui revisitera certaines des scènes les plus emblématiques de la série originale, ainsi que de nouvelles histoires qui n\'ont jamais été adaptées auparavant.', 'naru.webp', '2024-09-01 21:38:02'),
(14, 1, 'Tokyo Revengers Saison 3 : Les Batailles du Climax Débutent', '\"Tokyo Revengers\" entre dans sa troisième saison avec des batailles intenses et des révélations choquantes qui changeront à jamais la vie de Takemichi.\r\nLa saison 3 explore la confrontation ultime entre les gangs rivaux et met en lumière des secrets du passé de plusieurs personnages. Cette nouvelle saison a été acclamée pour son développement de personnage et son intrigue captivante.', '14-TokyoR.jpeg', '2024-09-01 21:39:31'),
(86, 1, 'Jujutsu Kaisen : la saison 3 officiellement en production', 'La saison 3 de Jujutsu Kaisen a été confirmée après le succès massif de l’arc Shibuya. Les fans attendent désormais l’adaptation du Culling Game.', 'jujutsu.jpg', '2026-02-17 02:57:23'),
(87, 1, 'One Piece : l\'arc Egghead bouleverse l\'équilibre du monde', 'L\'arc Egghead marque un tournant majeur dans l\'univers de One Piece avec des révélations cruciales sur le Gouvernement Mondial.', 'onepiece.jpg', '2026-02-17 02:57:23'),
(88, 4, 'Solo Leveling : l\'anime devient un phénomène mondial', 'L\'daptation animée du célèbre webtoon coréen dépasse les attentes et domine les classements de streaming.', 'sololeveling.jpg', '2026-02-17 02:57:23'),
(89, 1, 'Demon Slayer : un nouveau film canon annoncé', 'Le film, premier volet de la trilogie finale, suit l\'armée des pourfendeurs de démons lorsqu\'elle est attirée dans la mystérieuse Forteresse Infinie.\r\n\r\nDans ce lieu aux gravités changeantes et à l\'architecture kaléidoscopique, Tanjiro, Zenitsu et Inosuke affrontent des démons de rang supérieur, tandis que la bataille finale contre Muzan Kibutsuji commence. \r\nDans la Forteresse Infinie, les pourfendeurs se retrouvent séparés après un transport mystérieux. Tanjiro, Zenitsu et Inosuke luttent contre des démons puissants tandis que la confrontation finale avec Muzan approche. Le film se concentre sur le duel épique entre Tanjiro et Akaza, accompagné d\'un flashback révélant la tragédie d\'Akaza. D\'autres combats, notamment celui de Shinobu contre Doma, renforcent l\'intensité dramatique. L\'animation, saluée pour sa qualité visuelle exceptionnelle, accompagne une narration riche en émotions, loyauté et sacrifice.', 'demonslayer.jpg', '2026-02-17 02:57:23'),
(90, 1, 'Blue Lock saison 2 : date et premières images', 'Le phénomène du football japonais revient avec une deuxième saison très attendue.', 'bluelock.jpg', '2026-02-17 02:57:23'),
(91, 1, 'My Hero Academia : la saison finale approche', 'La conclusion de l\'histoire de Deku s’annonce explosive. On aura enfin la conclusion du combat de Deku contre ses ennemis et lui-même.', 'mha.jpg', '2026-02-17 02:57:23'),
(92, 3, 'Chainsaw Man : le film Reze Arc confirmé', 'L’arc Reze sera adapté en film, promettant une animation spectaculaire avec la suite des aventures de Denji a la recherche du démon Pistolet.', 'chainsawman.jpg', '2026-02-17 02:57:23'),
(93, 3, 'Frieren : un succès critique inattendu', 'L\'anime Frieren Beyond Journey\'s End surprend par sa profondeur émotionnelle et sa réalisation soignée.', 'frieren.jpg', '2026-02-17 02:57:23'),
(94, 3, 'Oshi no Ko : saison 2 en production', 'Après une première saison marquante, Oshi no Ko prépare son retour avec un arc encore plus intense.', 'oshinoko.jpg', '2026-02-17 02:57:23'),
(95, 4, 'The Eminence in Shadow : saison 3 envisagée', 'La série isekai déjantée pourrait revenir pour une troisième saison selon les dernières annonces.', 'eminence.jpg', '2026-02-17 02:57:23'),
(96, 1, 'Naruto Shippuden : la fin d’une ère du shonen moderne', 'Diffusé entre 2007 et 2017, Naruto Shippuden a marqué une génération entière. L’évolution de Naruto, les combats emblématiques et la conclusion face à Sasuke ont profondément influencé le shonen moderne.', 'naruto.jpg', '2017-03-23 11:00:00'),
(97, 3, 'Death Note : le thriller psychologique qui a changé l’animation', 'Sorti en 2006, Death Note a redéfini la narration dans l’animation japonaise. Son duel intellectuel entre Light et L reste l’un des plus marquants de l’histoire du medium.', 'deathnote.jpg', '2006-10-04 10:00:00'),
(98, 3, 'Attack on Titan : une révolution sombre et politique', 'Lancé en 2013 en anime, L’Attaque des Titans a bouleversé les codes du shonen avec une narration mature, des thèmes politiques et un final controversé mais puissant.', 'aot.jpg', '2013-04-07 10:00:00'),
(99, 1, 'One Piece : Marineford, l\'arc qui a tout changé', 'L\'arc Marineford (2010) reste l\'un des moments les plus intenses du manga moderne. La mort d\'Ace a marqué durablement les lecteurs.', 'marineford.jpg', '2010-07-01 10:00:00'),
(100, 2, 'Your Name : le film qui a conquis le monde', 'Sorti en 2016, Your Name de Makoto Shinkai est devenu un phénomène mondial et a relancé l’intérêt international pour les films d’animation japonais.', 'yourname.jpg', '2016-08-26 10:00:00'),
(101, 3, 'Tokyo Ghoul : l\'essor du seinen dark', 'Tokyo Ghoul a marqué les années 2010 par son ambiance sombre et son protagoniste torturé. Un tournant majeur pour le seinen moderne.', 'tokyoghoul.jpg', '2014-07-03 10:00:00'),
(102, 4, 'Sword Art Online : l\'explosion du genre isekai', 'Dès 2012, Sword Art Online a popularisé l\'isekai à grande échelle, ouvrant la voie à une décennie de séries dans des mondes virtuels.', 'sao.jpg', '2012-07-08 10:00:00'),
(103, 1, 'Demon Slayer : le phénomène mondial des années 2020', 'Avec le film Mugen Train devenu le plus gros succès du box-office japonais, Demon Slayer s\'est imposé comme un pilier du shonen moderne.', 'demonslayer-era.jpg', '2020-10-16 10:00:00'),
(104, 1, 'Fullmetal Alchemist Brotherhood : l\'adaptation parfaite', 'Diffusée en 2009, cette adaptation fidèle du manga est souvent citée comme l\'une des meilleures séries animées de tous les temps.', 'fma.jpg', '2009-04-05 10:00:00'),
(105, 1, 'Jujutsu Kaisen : le renouveau du shonen nouvelle génération', 'Depuis 2020, Jujutsu Kaisen incarne la nouvelle vague du shonen avec une animation spectaculaire et des arcs narratifs intenses.', 'jujutsu-era.jpg', '2020-10-03 10:00:00'),
(106, 2, 'Fruits Basket : le retour triomphal d\'un classique', 'Le remake de Fruits Basket (2019–2021) a redonné vie à un pilier du shojo des années 2000, avec une adaptation fidèle et émotionnellement puissante.', 'fruitsbasket.jpg', '2019-04-05 10:00:00'),
(107, 2, 'Nana : une œuvre culte toujours intemporelle', 'Même des années après son arrêt, Nana continue d\'influencer le shojo moderne avec ses thèmes adultes et son réalisme émotionnel.', 'nana.jpg', '2006-04-05 10:00:00'),
(108, 2, 'Blue Spring Ride : la renaissance du shojo moderne', 'Sorti en 2014, Blue Spring Ride a marqué un retour à des romances lycéennes plus matures et introspectives.', 'bluespringride.jpg', '2014-07-07 10:00:00'),
(109, 2, 'My Love Story!! : une romance qui casse les codes', 'Cette comédie romantique de 2015 a inversé les standards du shojo en mettant en avant un héros atypique et touchant.', 'mylovestory.jpg', '2015-04-08 10:00:00'),
(110, 2, 'Horimiya : la romance moderne nouvelle génération', 'Horimiya (2021) a modernisé la romance lycéenne avec des personnages plus réalistes et une approche émotionnelle authentique.', 'horimiya.jpg', '2021-01-10 11:00:00'),
(111, 3, 'Vinland Saga : l\'épopée historique violente et mature', 'Adapté en 2019, Vinland Saga a imposé un seinen ambitieux mêlant guerre, philosophie et quête de sens.', 'vinlandsaga.jpg', '2019-07-08 10:00:00'),
(112, 3, 'Berserk : l\'héritage éternel de Miura', 'Berserk reste l\'un des piliers du seinen dark fantasy. Son influence sur l\'industrie du manga est immense.', 'berserk.jpg', '2016-06-24 10:00:00'),
(113, 3, 'Monster : le thriller psychologique d’Urasawa', 'Monster demeure une référence absolue du seinen narratif avec une tension maîtrisée et un antagoniste mythique.', 'monster.jpg', '2004-04-07 10:00:00'),
(114, 4, 'Re:Zero : l\'isekai psychologique nouvelle génération', 'Re:Zero (2016) a renouvelé l\'isekai en y intégrant des éléments psychologiques et un protagoniste vulnérable.', 'rezero.jpg', '2016-04-04 10:00:00'),
(115, 4, 'That Time I Got Reincarnated as a Slime : l\'isekai stratégique', 'Depuis 2018, cette série mêle fantasy, politique et gestion de royaume dans un univers riche et structuré.', 'slime.jpg', '2018-10-02 10:00:00');

-- --------------------------------------------------------

--
-- Structure de la table `categories`
--

DROP TABLE IF EXISTS `categories`;
CREATE TABLE IF NOT EXISTS `categories` (
  `id` int NOT NULL AUTO_INCREMENT,
  `name` varchar(255) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=utf8mb3;

--
-- Déchargement des données de la table `categories`
--

INSERT INTO `categories` (`id`, `name`) VALUES
(1, 'Shonen'),
(2, 'Shojo'),
(3, 'Seinen'),
(4, 'Isekai');

-- --------------------------------------------------------

--
-- Structure de la table `users`
--

DROP TABLE IF EXISTS `users`;
CREATE TABLE IF NOT EXISTS `users` (
  `id` int NOT NULL AUTO_INCREMENT,
  `email` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL,
  `first_name` varchar(255) NOT NULL,
  `last_name` varchar(255) NOT NULL,
  `role` varchar(255) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=6 DEFAULT CHARSET=utf8mb3;

--
-- Déchargement des données de la table `users`
--

INSERT INTO `users` (`id`, `email`, `password`, `first_name`, `last_name`, `role`) VALUES
(4, 'user@test.com', '$2y$10$lEzMI.H26sDsV4PzhAVBveHiTDBrH0BGSaNDAin.89cP8y/baG0vu', 'Test', 'Test', 'user'),
(5, 'admin@test.com', '$2y$10$lEzMI.H26sDsV4PzhAVBveHiTDBrH0BGSaNDAin.89cP8y/baG0vu', 'Admin', 'Admin', 'admin');

--
-- Contraintes pour les tables déchargées
--

--
-- Contraintes pour la table `articles`
--
ALTER TABLE `articles`
  ADD CONSTRAINT `articles_ibfk_1` FOREIGN KEY (`category_id`) REFERENCES `categories` (`id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
