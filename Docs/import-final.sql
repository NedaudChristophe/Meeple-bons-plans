-- Adminer 4.8.1 MySQL 5.5.5-10.3.34-MariaDB-0ubuntu0.20.04.1 dump

SET NAMES utf8;
SET time_zone = '+00:00';
SET foreign_key_checks = 0;
SET sql_mode = 'NO_AUTO_VALUE_ON_ZERO';

SET NAMES utf8mb4;

DROP TABLE IF EXISTS `article`;
CREATE TABLE `article` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `user_id` int(11) NOT NULL,
  `title` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `image` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `description` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `content` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` date NOT NULL,
  `updated_at` date DEFAULT NULL,
  `slug` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  PRIMARY KEY (`id`),
  KEY `IDX_23A0E66A76ED395` (`user_id`),
  CONSTRAINT `FK_23A0E66A76ED395` FOREIGN KEY (`user_id`) REFERENCES `user` (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

INSERT INTO `article` (`id`, `user_id`, `title`, `image`, `description`, `content`, `created_at`, `updated_at`, `slug`) VALUES
(1,	4,	'Pokémon Épée et Bouclier : Astres Radieux',	'https://www.play-in.com/images/pokemon-astres-radieux.png',	'Les Pokémon Radieux sont des Pokémon chromatiques qui apparaissent dans une toute nouvelle version. Ils possèdent une attaque puissante et le potentiel d\'influer sur les meilleurs decks, mais vous ne pouvez inclure qu\'un seul dans chacun de vos decks !',	'Sortie le 27 mai 2022\r\n\r\n10ème édition de la série Épée et Bouclier, Astres Radieux apporte une toute nouvelle mécanique de jeu : les Pokémon Radieux !\r\n\r\nLes Pokémon Radieux sont des Pokémon chromatiques qui apparaissent dans une toute nouvelle version. Ils possèdent une attaque puissante et le potentiel d\'influer sur les meilleurs decks, mais vous ne pouvez inclure qu\'un seul dans chacun de vos decks !\r\n\r\nCette édition comporte plus de 180 nouvelles cartes dont 3 Pokémon Radieux, 7 Pokémon-VSTAR, 21 Pokémon-V et 2 Pokémon-VMAX.\r\n\r\nComme pour les éditions précédentes, Stars Étincelantes se décline en une série de produits :\r\n\r\nBoosters de 10 cartes\r\nKit d\'avant-première\r\nCoffret Dresseur d\'Élite\r\nTripacks, Portfolio et bien d\'autres...',	'2022-07-27',	NULL,	'pokemon-epee-et-bouclier-astres-radieux'),
(2,	1,	'Pokémon Épée et Bouclier : Origine Perdue',	'https://www.play-in.com/images/logo-Poemon-epee-et-Bouclier-Origine-Perdue.png',	'La 11 ème édition dans la série Épée et Bouclier se nomme Origine Perdue ! Théâtre de l\'intrigue du jeu vidéo Légendes Pokémon : Arceus, la région de Hisui est à nouveau à l\'honneur dans cette édition !',	'La 11 ème édition dans la série Épée et Bouclier se nomme Origine Perdue ! Théâtre de l\'intrigue du jeu vidéo Légendes Pokémon : Arceus, la région de Hisui est à nouveau à l\'honneur dans cette édition !\r\n\r\nOrigine Perdue marque le retour d\'une ancienne mécanique de jeu : la Zone Perdue. Cette zone fonctionne comme une pile de défausse, mais les cartes qui y sont envoyées ne sont plus considérées comme en jeu, et il n\'existe aucun moyen de les récupérer !\r\n\r\nLes cartes qui utilisent cette mécanique sont particulièrement reconnaissables : Une aura ténébreuse se dégage de leur illustration ! C\'est notamment le cas de Giratina-VSTAR !\r\n\r\nVous y découvrirez des Pokémon aussi puissants que rares avec de nouveaux Pokémon-V -VMAX et VSTAR aindi que des Pokémon Radieux !\r\n\r\nCette édition comporte de nombreuses nouvelles cartes dont 3 Pokémon Radieux, 6 Pokémon-VSTAR, 14 Pokémon-V et 1 Pokémon-VMAX.\r\n\r\nComme pour les éditions précédentes, Origine perdue se décline en une série de produits :\r\n\r\nBoosters de 10 cartes\r\nKit d\'avant-première\r\nCoffret Dresseur d\'Élite\r\nTripacks, Portfolio et bien d\'autres...',	'2022-07-27',	NULL,	'pokemon-epee-et-bouclier-origine-perdue'),
(3,	1,	'Qu\'est-ce que le legacy dans le jeu de société ?',	'https://www.ludum.fr/img/cms/bubble/bubbleblog.png',	'Il faut tout d’abord savoir que l’utilisation du mot legacy n’a pas pour origine le monde du jeu, mais le monde de l’entreprise. Il permet d’évoquer des systèmes informatiques, matériels et logiciels en place depuis longtemps dans l’entreprise et donc hérités du passé. On pourrait ainsi le traduire en français : “Système hérité”.',	'Il faut tout d’abord savoir que l’utilisation du mot legacy n’a pas pour origine le monde du jeu, mais le monde de l’entreprise. Il permet d’évoquer des systèmes informatiques, matériels et logiciels en place depuis longtemps dans l’entreprise et donc hérités du passé. On pourrait ainsi le traduire en français : “Système hérité”.\r\n\r\nUne traduction qui permet de bien mieux comprendre ce qu’est le Legacy dans le jeu ! Qui est d’ailleurs utilisé depuis bien longtemps dans le jeu de rôle ou dans les jeux vidéos, où l’on incarne un personnage qui évolue ou progresse au fur et à mesure des parties tout en conservant ses acquis.\r\n\r\nEn bref, des jeux évolutifs où vos choix personnels vous permettront de définir dans quel sens vous souhaitez vous développer… mais sans pouvoir revenir en arrière également. Une erreur de développement pourra ainsi vous suivre et vous pénaliser tout au long de votre partie.\r\n\r\nPour comprendre le principe, transposons cela aux échecs. Un jeu d\'échecs en Legacy vous ferait débuter avec uniquement des pions et le roi. Vous donnant pour seul objectif de défendre votre roi et vous expliquant simplement les déplacements de pions. Puis de parties en parties, le jeu vous proposerait d’ajouter des pièces supplémentaires : les tours, puis les fous, les cavaliers, puis finalement la reine qui finirait de mettre en lumière tout le potentiel stratégique du jeu.\r\n\r\nLegacy : Utilisations dans le jeu de société\r\nSi dans le monde du jeu de société, le Legacy fait sa première apparition en 2011 avec la parution de Risk Legacy (qui est le premier jeu de société à incorporer le mot Legacy dans son nom), il n’a été largement démocratisé qu’à partir de 2015 avec la sortie de Pandemic Legacy Saison 1.',	'2022-07-27',	NULL,	'qu-est-ce-que-le-legacy-dans-le-jeu-de-societe'),
(4,	1,	'Tu Te Mets Combien ? – Test et Avis : Trivial Poursuit pour les nuls !',	'https://www.ludum.fr/img/cms/articles/TTMC_01.jpeg',	'Découvrez notre test et avis sur Tu Te Mets Combien ?, un jeu de quizz sur des thèmes plus surprenants les uns que les autres qui révolutionne complètement le genre, un must-have pour des soirées jeux funs et cultivées !',	'Dans la boîte\r\n\r\nLe matériel se compose de :\r\n\r\nUne boîte qui fait office de rangement et de plateau\r\n540 cartes\r\nUne feuille de règles\r\nLa boîte est très pratique puisqu’elle contient un insert bien pensé qui permet de classer les cartes, de les empêcher de se mélanger en rangeant la boîte (même à la verticale) et il suffit de la déplier pour être prêts à jouer. Ici, pas de mise en place fastidieuse, c’est du très bon matériel ! On vous invite d’ailleurs à lire tout ce qu’il y a écrit sur la boîte, tous les détails... Elle donne un premier aperçu de l’esprit TTMC.\r\n\r\nEt vous ne rêvez pas … C’est un jeu de plateau fourni sans pion et c’est d’ailleurs explicitement écrit en grand sur la boîte, donc pas de mauvaise surprise. Pas de panique, n’importe quel petit objet fera l’affaire !\r\n\r\nLes règles sont simplissimes, une feuille recto-verso suffit à tout expliquer, ça se lit en trois minutes. Exactement ce qu’il faut pour un jeu d’ambiance, c’est top !\r\n\r\nQu\'est-ce qu\'on y fait ?\r\n\r\nTu Te Mets Combien ? (TTMC pour les intimes) est un jeu de culture générale où chaque équipe doit répondre à des questions pour avancer sur le plateau, et le plus cultivé gagne...\r\n\r\nMais plutôt que de le faire de façon très classique à la Trivial Poursuit, il vous propose plutôt de vous évaluer sur des thèmes très variés ; vous ne pourrez avancer sur le plateau que si vous aviez correctement estimé vos connaissances. Entre les thèmes tantôt sérieux et tantôt farfelus, les challenges et les malus, votre progression sur la piste de la connaissance sera semée d’embuches et de surprises pour des parties incroyablement drôles !',	'2022-07-27',	NULL,	'tu-te-mets-combien-test-et-avis-trivial-poursuit-pour-les-nuls');

DROP TABLE IF EXISTS `article_label`;
CREATE TABLE `article_label` (
  `article_id` int(11) NOT NULL,
  `label_id` int(11) NOT NULL,
  PRIMARY KEY (`article_id`,`label_id`),
  KEY `IDX_791022F97294869C` (`article_id`),
  KEY `IDX_791022F933B92F39` (`label_id`),
  CONSTRAINT `FK_791022F933B92F39` FOREIGN KEY (`label_id`) REFERENCES `label` (`id`) ON DELETE CASCADE,
  CONSTRAINT `FK_791022F97294869C` FOREIGN KEY (`article_id`) REFERENCES `article` (`id`) ON DELETE CASCADE
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

INSERT INTO `article_label` (`article_id`, `label_id`) VALUES
(1,	5),
(2,	5),
(3,	3),
(4,	3);

DROP TABLE IF EXISTS `avatar`;
CREATE TABLE `avatar` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `image` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

INSERT INTO `avatar` (`id`, `image`) VALUES
(1,	'https://www.zupimages.net/up/22/31/wgqb.png'),
(2,	'https://www.zupimages.net/up/22/31/95sk.png'),
(3,	'https://www.zupimages.net/up/22/31/nia4.png'),
(4,	'https://www.zupimages.net/up/22/31/4qxm.png'),
(5,	'https://www.zupimages.net/up/22/31/4j97.png'),
(6,	'https://www.zupimages.net/up/22/31/gy42.png'),
(7,	'https://www.zupimages.net/up/22/31/qalq.png'),
(8,	'https://www.zupimages.net/up/22/31/dwyh.png'),
(9,	'https://www.zupimages.net/up/22/31/2vfe.png'),
(10,	'https://www.zupimages.net/up/22/31/qpy7.png'),
(11,	'https://zupimages.net/up/22/31/62qo.png');

DROP TABLE IF EXISTS `badge`;
CREATE TABLE `badge` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `image` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

INSERT INTO `badge` (`id`, `image`) VALUES
(1,	'https://cdn.pixabay.com/photo/2013/07/12/17/01/sheriffs-star-151699_960_720.png'),
(2,	'https://cdn.pixabay.com/photo/2014/05/26/08/08/pirate-354246_960_720.png'),
(3,	'https://cdn.pixabay.com/photo/2015/05/11/21/54/tag-763169_960_720.png'),
(4,	'https://cdn.pixabay.com/photo/2016/02/13/04/44/label-1197365_960_720.png'),
(5,	'https://cdn.pixabay.com/photo/2013/07/12/15/55/laurel-wreath-150577_960_720.png'),
(6,	'https://cdn.pixabay.com/photo/2019/03/22/09/38/unicorn-4072862_960_720.png'),
(7,	'https://cdn.pixabay.com/photo/2016/03/29/20/56/label-1289350_960_720.png'),
(8,	'https://cdn.pixabay.com/photo/2016/11/30/18/14/like-1873541_960_720.png'),
(9,	'https://cdn.pixabay.com/photo/2013/07/12/17/19/diploma-152024_960_720.png'),
(10,	'https://cdn.pixabay.com/photo/2013/07/13/01/21/award-155595_960_720.png');

DROP TABLE IF EXISTS `category`;
CREATE TABLE `category` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `slug` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

INSERT INTO `category` (`id`, `name`, `slug`) VALUES
(1,	'Jeux de société',	'jeux-de-societe'),
(2,	'Jeux de figurines',	'jeux-de-figurines'),
(3,	'Jeux de rôle',	'jeux-de-role');

DROP TABLE IF EXISTS `comment`;
CREATE TABLE `comment` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `deal_id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `comment` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` date NOT NULL,
  `updated_at` date DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `IDX_9474526CF60E2305` (`deal_id`),
  KEY `IDX_9474526CA76ED395` (`user_id`),
  CONSTRAINT `FK_9474526CA76ED395` FOREIGN KEY (`user_id`) REFERENCES `user` (`id`),
  CONSTRAINT `FK_9474526CF60E2305` FOREIGN KEY (`deal_id`) REFERENCES `deal` (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

INSERT INTO `comment` (`id`, `deal_id`, `user_id`, `comment`, `created_at`, `updated_at`) VALUES
(1,	1,	8,	'Génial, merci pour le bon plan !',	'2022-07-27',	'2022-08-04'),
(2,	2,	6,	'Super Promo',	'2022-07-27',	NULL),
(3,	1,	9,	'J\'ai testé et j\'ai pas accroché, le prix est intéressant néanmoins',	'2022-07-27',	'2022-08-04'),
(4,	4,	15,	'Mes enfants sont très contents',	'2022-07-27',	NULL),
(5,	3,	16,	'Je ne vois plus mon mari à cause de cette promotion',	'2022-07-27',	NULL),
(6,	3,	3,	'Super jeu familiale',	'2022-07-27',	NULL),
(7,	3,	10,	'C\'est génial au top',	'2022-07-27',	NULL),
(19,	3,	1,	'Très bon deal merci Claire',	'2022-08-03',	NULL),
(21,	7,	1,	'Excellent',	'2022-08-03',	NULL),
(23,	6,	1,	'Super pour démarrer le JDR',	'2022-08-03',	NULL),
(123,	2,	40,	'Pas encore craqué mais j\'hésite à investir pour le petit dernier...',	'2022-08-03',	NULL),
(127,	16,	1,	'Super cool !',	'2022-08-04',	NULL),
(130,	11,	42,	'Trop cool',	'2022-08-04',	NULL),
(137,	15,	1,	'Super bon plan',	'2022-08-04',	'2022-08-04'),
(141,	1,	53,	'Jeu très sympa en famille',	'2022-08-04',	NULL),
(142,	15,	57,	'Nostalgie, le jeu de mon enfance',	'2022-08-04',	NULL),
(143,	16,	59,	'C\'est une grosse promo !',	'2022-08-04',	NULL),
(144,	16,	60,	'Ca ne compte quand même que pour une....',	'2022-08-04',	NULL),
(150,	16,	68,	'“Bon plan intéressant ! J\'adore D&D”\n',	'2022-08-08',	NULL);

DROP TABLE IF EXISTS `deal`;
CREATE TABLE `deal` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `shop_id` int(11) NOT NULL,
  `type_id` int(11) NOT NULL,
  `game_id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `title` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `description` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `url` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `offer_price` double DEFAULT NULL,
  `shipping_cost` double DEFAULT NULL,
  `promo_code` varchar(50) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `end_deal` date DEFAULT NULL,
  `created_at` date NOT NULL,
  `updated_at` date DEFAULT NULL,
  `status` tinyint(1) NOT NULL,
  PRIMARY KEY (`id`),
  KEY `IDX_E3FEC1164D16C4DD` (`shop_id`),
  KEY `IDX_E3FEC116C54C8C93` (`type_id`),
  KEY `IDX_E3FEC116E48FD905` (`game_id`),
  KEY `IDX_E3FEC116A76ED395` (`user_id`),
  CONSTRAINT `FK_E3FEC1164D16C4DD` FOREIGN KEY (`shop_id`) REFERENCES `shop` (`id`),
  CONSTRAINT `FK_E3FEC116A76ED395` FOREIGN KEY (`user_id`) REFERENCES `user` (`id`),
  CONSTRAINT `FK_E3FEC116C54C8C93` FOREIGN KEY (`type_id`) REFERENCES `type` (`id`),
  CONSTRAINT `FK_E3FEC116E48FD905` FOREIGN KEY (`game_id`) REFERENCES `game` (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

INSERT INTO `deal` (`id`, `shop_id`, `type_id`, `game_id`, `user_id`, `title`, `description`, `url`, `offer_price`, `shipping_cost`, `promo_code`, `end_deal`, `created_at`, `updated_at`, `status`) VALUES
(1,	1,	2,	26,	12,	'Alice\'s Garden',	'Petit jeu \"familial\" paisible, rapide et facile à prendre en main et le solo est agréable également.\r\nLa Reine de coeur n\'est pas contente de son jardin royal ! Aidez Alice et les jardiniers à l\'arranger pour combler les désirs royaux de Sa Majesté. Dans ce jeu de placement, disposez les plantes du jardin de la manière la plus avantageuse possible pour apaiser la colère de votre souveraine.',	'https://cavernedugobelin.com/produit/alices-garden',	15,	NULL,	NULL,	'2022-08-16',	'2022-08-02',	NULL,	1),
(2,	2,	6,	7,	8,	'Jeu des Tout Petits - Little Collect',	'Un jeu sympa pour les tout petits',	'https://cavernedugobelin.com/produit/little-collect',	10,	NULL,	NULL,	'2022-07-10',	'2022-08-02',	NULL,	1),
(3,	1,	4,	16,	10,	'L’Insondable :  Pas un simple remake de BattleStar Galactica',	'L\'Insondable est un jeu d\'alliances secrètes et d\'intrigue. Les joueurs y incarnent des humains luttant pour la survie du navire ou des traîtres oeuvrant pour l\'empêcher d’arriver à bon port.',	'https://www.philibertnet.com/fr/fantasy-flight-games/98938-linsondable-3558380089353.html',	50,	NULL,	NULL,	'2022-07-31',	'2022-08-02',	NULL,	1),
(4,	1,	2,	6,	11,	'Fyfe : Déja en promo !',	'Fyfe est un jeu abstrait où il est important de bien planifier et placer les pièces de bois ainsi que les plateaux au bon moment. Les porte-bonheur donnent aux joueurs des capacités individuelles qu\'ils peuvent utiliser une fois dans le jeu.',	'https://www.philibertnet.com/fr/pegasus/111581-fyfe-3770000282696.html',	20,	NULL,	NULL,	'2022-07-30',	'2022-08-02',	NULL,	0),
(5,	1,	4,	20,	1,	'Promo sur plusieurs boites de Star Wars Legion. Exemple : Pilotes de Swoop',	'Promo sur plusieurs boites de Star Wars Legion à -25% \r\nExemple : Pilotes de Swoop',	'https://www.philibertnet.com/fr/le-collectif-de-l-ombre/111791-star-wars-legion-pilotes-de-swoop-2100000859030.html',	25,	NULL,	NULL,	NULL,	'2022-08-03',	NULL,	1),
(6,	1,	4,	25,	1,	'Un super kit pour débuter le JDR',	'Très bon prix pour ce kit d’initiation de Chroniques oubliées Fantasy',	'https://www.philibertnet.com/fr/initiation-au-jeu-de-role/54538-chroniques-oubliees-boite-d-initiation-3760245550377.html',	25,	1.9,	NULL,	NULL,	'2022-08-03',	NULL,	1),
(7,	1,	2,	1,	1,	'Soldes Cultura sur une sélection de jeux de société',	'Catan, Carcassonne, Les aventuriers du rail... De nombreux classiques en soldes.',	'https://www.cultura.com/jeux-de-societe-puzzles/jeux-de-societe.html',	0,	NULL,	NULL,	NULL,	'2022-08-03',	NULL,	0),
(8,	20,	1,	1,	1,	'-20% sur le deuxième jeu acheté au Donjon.',	'En boutique et pendant 3 semaines, vous bénéficierez d’une remise de -20% sur le deuxième jeu acheté au Donjon.\r\nOffre valable uniquement sur les jeux de sociétés.',	'https://www.facebook.com/LeDonjonDeodatien/posts/588547315979957',	0,	0,	NULL,	NULL,	'2022-08-03',	NULL,	1),
(10,	2,	1,	1,	40,	'deal',	'fefe',	'fefe',	NULL,	NULL,	'',	NULL,	'2022-08-03',	NULL,	0),
(11,	1,	1,	28,	1,	'Une aventure de niveau 2 pour Dungeon Crawl Classics.',	'Dungeon Crawl Classics Lankhmar 12 - Mercy on the Day of the Eel est une aventure de niveau 2 pour Dungeon Crawl Classics, se déroulant à Lankhmar !',	'https://www.philibertnet.com/fr/dungeon-crawl-classics/112353-dungeon-crawl-classics-lankhmar-12-mercy-on-the-day-of-the-eel-9781956449044.html',	5,	1.9,	NULL,	NULL,	'2022-08-03',	NULL,	1),
(12,	1,	1,	1,	40,	'Tout gratuiit chez Philibert trop cool',	'c loffre de l\'ané !!!! !! ta trop de chanc profite de loffr L é trop cool !!!!!!!!!!!!! ! !!',	'https://www.philibertnet.com/fr/',	NULL,	NULL,	'ya pa de cod promo',	NULL,	'2022-08-03',	'2022-08-06',	0),
(13,	4,	3,	36,	1,	'Le coffre ultime pour D&D 5 !',	'Ce coffret contient un exemplaire des trois livres de règles de base, ainsi qu’un écran de Maître du jeu, tous réunis au sein d’un élégant coffret. C’est le cadeau parfait pour tout fan de D&D.',	'https://www.amazon.fr/Dungeons-Dragons-Core-Rulebook-Gift/dp/0786967692',	90,	0,	NULL,	NULL,	'2022-08-03',	NULL,	0),
(14,	21,	4,	37,	15,	'Réveillez le bandit qui est en vous avec cette super offre !!',	'Dans Bad Company, managez votre propre gang et customisez le afin d\'arriver à vos fins ! Un jeu unique et fun par l\'auteur d\'Automania et Trails of Tucana.',	'https://www.ludifolie.com/12416-bad-company.html',	39.9,	NULL,	NULL,	'2022-08-27',	'2022-08-03',	NULL,	1),
(15,	1,	1,	23,	1,	'Heroquest en promo',	'La nouvelle édition d\'Heroquest en promotion.',	'https://www.philibertnet.com/fr/hasbro/103668-heroquest-5010993940479.html',	95,	0,	NULL,	NULL,	'2022-08-03',	NULL,	1),
(16,	1,	1,	36,	1,	'Dungeon & Dragons V5, le coffret',	'Le coffret à moitié prix. Prix de fou !!',	'https://www.philibertnet.com/fr/dungeonsdragons-5/101156-dungeons-dragons-coffret-9780786967698.html',	65,	NULL,	NULL,	NULL,	'2022-08-04',	'2022-08-04',	1),
(25,	5,	1,	24,	1,	'Catan à petit prix',	'Super prix sur Catan, un classique !',	'https://www.espritjeu.com/jeu-de-societe/catane-les-colons-de-catane.html',	15,	6,	'156748-2022',	NULL,	'2022-08-04',	'2022-08-04',	1),
(35,	1,	1,	18,	68,	'Boite amélioration Stormtroopers Impériaux pour Star Wars Légion',	'Boite amélioration Stormtroopers Impériaux pour Star Wars Légion',	'https://c3po.link/QgQbDhu8kA',	9,	3,	NULL,	NULL,	'2022-08-08',	'2022-08-08',	1),
(36,	14,	1,	18,	1,	'test',	'rezaerareaz',	'reazeazrza',	45,	0,	'',	NULL,	'2022-09-12',	NULL,	0);

DROP TABLE IF EXISTS `doctrine_migration_versions`;
CREATE TABLE `doctrine_migration_versions` (
  `version` varchar(191) COLLATE utf8_unicode_ci NOT NULL,
  `executed_at` datetime DEFAULT NULL,
  `execution_time` int(11) DEFAULT NULL,
  PRIMARY KEY (`version`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

INSERT INTO `doctrine_migration_versions` (`version`, `executed_at`, `execution_time`) VALUES
('DoctrineMigrations\\Version20220725144115',	'2022-07-25 16:41:21',	331);

DROP TABLE IF EXISTS `game`;
CREATE TABLE `game` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `category_id` int(11) NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `image` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `description` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` date NOT NULL,
  `updated_at` date DEFAULT NULL,
  `price` double NOT NULL,
  PRIMARY KEY (`id`),
  KEY `IDX_232B318C12469DE2` (`category_id`),
  CONSTRAINT `FK_232B318C12469DE2` FOREIGN KEY (`category_id`) REFERENCES `category` (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

INSERT INTO `game` (`id`, `category_id`, `name`, `image`, `description`, `created_at`, `updated_at`, `price`) VALUES
(1,	1,	'0mlkjh',	'https://i.ibb.co/Z1P27M0/a-default-img.png',	'Bon plan',	'2022-07-26',	'2022-08-07',	25),
(2,	1,	'Sonic – Super Teams',	'https://cdn.1j1ju.com/thumbs/game-lg/medias/1f/c5/7f-sonic-super-teams-cover.jpg',	'DescriptionSonic Super Teams est un jeu de course palpitant au rythme effréné. Choisissez votre équipe et jouez avec les personnages emblématiques de Sonic. Boostez votre équipe avec les anneaux dorés, et utilisez des pics pour piéger et ralentir vos adversaires. Soyez la première équipe à franchir la ligne d’arrivée pour gagner !Sonic Super Teams : Retrouvez Sonic et amis dans une course palpitante !Sonic le hérisson bleu court à la vitesse du son mais ne sera pas forcément le premier. Tout cela va dépendre de votre habilité à bien jouer vos cartes au bon moment. Chaque héros dispose de sa figurine et va avancer suivant les cartes joués de 1 à 6 cases. Chaque joueur disposant d’une main de cartes qui ne sont pas forcément toutes de sa couleur, il va donc falloir gérer au mieux sa main.A vous de jouer les cartes au bon moment pour jeter les adversaires dans les pièges ou les ralentissements et profiter du bon moment pour faire avancer vos coureurs pour passer les pièges, pics et obstacles et gérer le looping et les cases bonus.',	'2022-07-26',	'2022-08-03',	29.9),
(4,	1,	'Savannah Park',	'https://cdn.1j1ju.com/thumbs/game-lg/medias/a0/cb/8b-savannah-park-cover.jpg',	'Le jour se lève sur l’un des plus beaux paradis naturels de l’Afrique. Vous êtes à la tête d’un parc qui abrite quelques-unes des espèces animales les plus fascinantes du monde : un troupeau de zèbres s’est rassemblé dans la savane, des antilopes broutent à l’ombre d’un arbre, et un jeune éléphanteau s’ébroue dans l’eau d’un étang.Vous avez fort à faire. Vous devez rassembler vos animaux entroupeau, leur donner l’accès aux points d’eau, et les préserver des feux de brousse.Ce n’est pas si simple, car chaque animal ne peut se déplacer qu’une seule fois, et ce n’est pas forcément vous qui décidez quand ! Apprenez à connaître la savane, déplacez vos tuiles stratégiquement, et votre parc éclipsera celui de vos concurrents.',	'2022-07-26',	'2022-08-03',	32.9),
(5,	2,	'Warhammer : The Horus Heresy – Char d’Assaut Lourd Kratos',	'https://www.mondes-fantastiques.com/17910-large_default/legiones-astartes-mkvi-tactical-squad.jpg',	'Le Char d’Assaut Lourd Kratos dérive d’un modèle de l’Antique Terra en service lors de l’Unification de la Vieille Terre, révisé suite au traité entre l’Empereur et les Seigneurs de Mars pour servir de fer de lance à la Grande Croisade, de briseur de lignes et de marteau à ennemis. Ce blindé pesant est presque invulnérable au feu adverse, et son avance régulière et inexorable offre un appui indomptable à tout assaut des Legiones Astartes, soutenu par une puissance de feu écrasante.Ce kit plastique permet d’assembler un Char d’Assaut Lourd Kratos, machine de guerre quasi impénétrable hérissée d’armement lourd. On peut doter cet impressionnant véhicule d’une des puissantes armes de tourelle suivantes: le polyvalent obusier Kratos, le fuseur-éclateur antichar ou la brûlante cardanelle volkite. Il dispose aussi d’un autocanon coaxial, d’une paire d’armes de coque: autocanons, bolters lourds, canons laser ou arquebuses volkites. À cela s’ajoute une paire d’armes latérales: bolters lourds, lance-flammes lourds, canons laser ou couleuvrines volkites.Le kit inclut aussi des composants pour améliorer le Char d’Assaut Lourd Kratos avec une arme sur pivot: lanceur Havoc, bolter lourd, lance-flammes lourd, multi-fuseur ou l’une des cinq configurations d’arme combinée (bolter, lance-flammes, fuseur, plasma ou volkite). Il propose en outre un projecteur, une lame de bulldozer et un missile traqueur, plus diverses options cosmétiques, comme des crochets de remorquage et au choix un Space Marine artilleur ou observateur, ou simplement une écoutille fermée.Ce kit comprend 233 composants en plastique, plus une planche de décalcomanies de véhicule des Legiones Astartes contenant 44 marquages et icônes optionnels pour les Légions des Sons of Horus et des Imperial Fists. Cette figurine est fournie non peinte et nécessite assemblage – nous recommandons l’usage de Colle Plastique Citadel et de peintures Citadel.Il vous faut un exemplaire du livre de règles Warhammer: The Horus Heresy – L’Âge des Ténèbres et du Liber Astartes – Livre d’Armées Legiones Astartes Loyalistes ou du Liber Hereticus: Livre d’Armée Legiones Astartes Renégates pour profiter pleinement de cette figurine. Les règles pour utiliser le Char d’Assaut Lourd Kratos lors de vos parties de Warhammer 40,000 sont disponibles en téléchargement gratuit sur le site web de Warhammer Community.',	'2022-07-26',	'2022-08-03',	100),
(6,	1,	'Fyfe',	'https://cdn.1j1ju.com/thumbs/game-lg/medias/e1/31/46-fyfe-cover.jpg',	'Remplissez votre plateau avec des jetons et des tuiles de score, de façon à marquer le plus de points possible. Une partie dure toujours 25 tours exactement. Le joueur ayant accumulé le plus de points de victoire à la fin de la partie est déclaré vainqueur.Dans ce cadre idyllique des mers du sud sur fond de plage paradisiaque et cocotiers, qu’allez vous vraiment trouver en creusant dans le sable? Saurez vous organiser vos découvertes pour réaliser les meilleurs combinaisons, et décrocher la victoire?Dans Fyfe, ce sont les joueurs eux-mêmes qui décident du nombre de points qui seront à gagner sur les différents emplacements de leur plateau ! Posez vos jetons aussi judicieusement que possible de façon à remporter un maximum de points !Une partie se joue en 25 tours de jeu.A chaque tour, les joueurs placent un des jetons de leur réserve (remplie préalablement) sur leur plateau, et une de leurs tuiles de score inutilisées, si aucune tuile ne pointe vers le jeton venant d’être placé. Aidez vous des pouvoirs de vos porte-bonheur, pour vous rapprocher de la victoire.Avec un brin de chance et un jeu astucieux, à chacun de positionner ses pièces pour remplir le maximum d’objectifs. Attention, chaque jeton est une combinaison unique d’une couleur, d’un chiffre, et d’un symbole !Contenu :125 jetons en bois – 5 jetons portes-bonheur en bois – 10 jokers-  20 bonus –  5 points –  5 tuiles Preum’s –  5 plateaux  – 35 porte-bonheur – 75 tuiles scores  -1 sac',	'2022-07-26',	'2022-08-03',	36.9),
(7,	1,	'Little Collect',	'https://cavernedugobelin.com/wp-content/uploads/2022/07/jeu-des-tout-petits-little-collecte.jpg',	'Un jeu de collecte avec des mignons lapins gourmands.\r\n\r\nLes petites lapins sont gourmands et pour pouvoir les approcher, il faudra avant tout récolter carottes et petits pois. Mais attention au renard qui rôde. Qui sera le premier à compléter son plateau? Un premier jeu de collecte à jouer avec papa et maman.\r\n\r\nLe jeu contient 2 plateaux de jeu, 6 lapins, 22 cartes, 6 carottes, 6 petits pois et la règle du jeu.\r\n\r\nLa promesse de vrais moments d’échange et de complicité entre les tout petits et leurs parents.',	'2022-07-26',	NULL,	17.9),
(8,	1,	'Alice Is Missing',	'https://zupimages.net/up/22/31/xo1w.jpg',	'ALICE IS MISSING est une expérience ludique, entre jeu d’enquête et jeu de rôle. Alice Briarwood, une lycéenne de la paisible ville de Silent Falls en Californie du Nord, a disparu. Le jeu se déroule dans le silence. Utilisez votre téléphone portable pour envoyer des textos à votre groupe de joueurs et de joueuses, afin de découvrir des indices, et comprendre ce qui est arrivé à Alice.Durant les 90 minutes de la bande-son originale, c’est à vous et à votre groupe de démêler les fils de l’enquête. Développez progressivement la narration grâce aux événements des cartes individuelles et racontez ensemble, dans un silence plein d’incertitudes, l’histoire de la disparition d’Alice…Les + produits :– Une expérience inédite troublante– Une mécanique qui laisse toute la place à la narration– Une ambiance de série (enquête, ados,dramatique)',	'2022-07-26',	'2022-08-03',	18.9),
(9,	1,	'Glisse Banquise',	'https://cdn.1j1ju.com/thumbs/game-lg/medias/6c/95/48-glisse-banquise-cover.jpg',	'C’est le temps idéal pour jouer sur les icebergs, le vent pousse les morceaux de glace, c’est très rigolo ! Nous nous amusons beaucoup avec nos amis pingouins !Oh non, le soleil se couche déjà et il faut vite rentrer à la maison ! Vite vite vite, sautons d’iceberg en iceberg pour rejoindre tous ensemble la banquise avant que la nuit ne soit complètement tombée.Contenu : 1 plateau Mer, 30 tuiles, 4 pingouins, 6 jetons Morse, 1 sac en tissu',	'2022-07-26',	'2022-08-03',	19.9),
(10,	3,	'Le Seigneur des Anneaux: Le Jeu de Cartes - Les Terres Sauvages du Rhovanion',	'https://cdn.1j1ju.com/thumbs/game-lg/medias/35/a8/5a-le-seigneur-des-anneaux-le-jeu-de-cartes-les-terres-sauvages-du-rhovanion-cover.jpeg',	'Même alors, vous n´auriez pas un chemin sûr. Il n’en est aucun en cette partie du monde. Rappelez-vous que vous vous trouvez au-delà de l’Orée du Désert à présent, et que vous voilà partis pour toutes sortes de distractions, où que vous alliez. Avant d’avoir pu contourner la Forêt Noire par le nord, vous vous trouveriez en plein sur les pentes des Montagnes Grises, et elles sont tout simplement truffées de gobelins, de farfadets et d’orques de la pire sorte. » – Gandalf, Le Hobbit  Une menace inconnue chasse les Gobelins et autres créatures malfaisantes des Montagnes Grises vers les forêts et vallées des Terres Sauvages, mettant en danger les peuples du Rhovanion. Dans Les Terres Sauvages du Rhovanion, les joueurs entament une quête périlleuse qui les mènera des vallées de l’Anduin aux mines des Monts du Fer en passant par la Forêt Noire. En plus de ces scénarios palpitants, cette extension inclut de nouveaux héros et cartes Joueur pour personnaliser davantage le jeu.',	'2022-07-26',	'2022-08-03',	29.95),
(11,	3,	'Marvel Champions : Le Jeu De Cartes – Spider-Ham',	'https://cavernedugobelin.com/wp-content/uploads/2022/07/ffgmc30_box3d_20220525-80x150.png',	'Avec le cochon tout est bon !\r\nPeter était une simple araignée avant d’être mordu par un cochon radioactif, ce qui l’a transformé en porc anthropomorphique doté des capacités spectaculaires d’une araignée et des limitations d’un cochon. Spider-Cochon a dédié sa vie à combattre l’injustice !\r\n\r\nPlus Spider-Cochon est en danger, plus il devient cartoonesque et sa capacité Non-Sens d’Araignée lui fournit des jetons Cartoon chaque fois qu’il subit des dégâts. Spider-Cochon peut dépenser des jetons Cartoon comme s’il s’agissait de ressources Libres mais la plupart de ses meilleures cartes requièrent des jetons Cartoon pour fonctionner. Trouver l’équilibre entre risquer la vie de Spider-Cochon pour générer des jetons Cartoon et récupérer sous forme de Peter Porker est la clé de la réussite. Si les choses tournent mal, topez-là et Captain Américhat entre en jeu pour vous aider. Utilisez une Logique de Cartoon pour vous mettre à l’abri, votre adversaire ne saura jamais si c’est Du Lard ou du Cochon quand vous décocherez votre légendaire PIF ! PAF ! POUF ! BLAM ! VLAN !\r\n\r\nGrâce à l’affinité Justice, faites appel aux personnages Web-Warrior Lady Spider et Spider-Man (Pavitr Prabhakar), déjouez les plans du méchant D’une Manière ou d’Une Autre et si les choses tournent mal, Équilibrez les Chances afin de retourner la partie en votre faveur.\r\n\r\nNécessite une boîte de Marvel Champions : Le jeu de cartes',	'2022-07-26',	NULL,	14.9),
(12,	3,	'Pagan: Le Destin de Roanoke - Au-delà des Palissades',	'https://cdn.1j1ju.com/media/cache/resolve/game/medias/a7/3a/32-pagan-le-destin-de-roanoke-au-dela-des-palissades-cover.jpg',	'Pagan: Le Destin de Roanoke - Au-delà des Palissades est la première extension de Pagan: Le Destin de Roanoke. Pagan est un jeu de cartes asymétrique pour deux joueurs jouant le rôle de la sorcière ou du chasseur de sorcières. La Sorcière tente d\'accomplir un rituel de renaturation avant d\'être démasquée et éliminée par le chasseur de Sorcières. Neuf villageois sont soupçonnés et seul le joueur Sorcière sait qui est la vraie Sorcière. À chaque tour, les joueurs utilisent leurs pions d\'action sur les villageois actifs pour piocher des cartes, jouer des cartes, gagner de l\'influence et gérer la Gloom. De plus, la sorcière peut préparer de puissantes potions, améliorer son familier et lancer des enchantements et des charmes, tandis que le chasseur de sorcières recrute des alliés, revendique des lieux stratégiques et enquête sans pitié sur les villageois.',	'2022-07-26',	'2022-08-03',	23.5),
(13,	3,	'Horreur à Arkham : Le Jeu de Cartes – L’héritage de Dunwich – Campagne',	'https://cdn.1j1ju.com/thumbs/game-lg/medias/e8/80/31-horreur-a-arkham-le-jeu-de-cartes-lheritage-de-dunwich-2022-cover.jpg',	'Horreur à Arkham est de retour à Dunwich :Une présence monstrueuse terrorisait autrefois le village isolé de Dunwich. Cette séquence d’horreur n’a pris fin qu’après que trois professeurs de l’université de Miskatonic – le Dr Henry Armitage, le Dr Francis Morgan et le professeur Warren Price – se soient aventurés à Dunwich, forts de leur savoir occulte qui leur a permis de vaincre la créature. Aujourd’hui, plusieurs mois plus tard, les collègues du Dr Armitage ont disparu, et il craint le pire…La campagne complète dans une seule boite !Retrouvez le tout premier cycle  du jeu Horreur à Arkham avec l’extension de campagne L’héritage de Dunwich. Comme pour les extensions Aux Confins de la Terre, toutes les cartes liées à la campagne et aux scénarios de ce « cycle » se trouvent dans l’extension de campagne. C’est l’occasion idéale pour les nouveaux fans du jeu de découvrir sa toute première campagne complète, et pour les fans de longue date de rattraper les parties qu’ils ont pu manquer.Remarque : les joueurs de longue date d’Horreur à Arkham qui possèdent déjà tous les éléments du cycle original L’Héritage de Dunwich ne trouveront aucune nouvelle carte ou contenu dans cette extension.',	'2022-07-26',	'2022-08-03',	63.9),
(14,	3,	'Marvel Champions : Sinistres Motivations',	'https://cdn.1j1ju.com/thumbs/game-lg/medias/ef/7a/f1-marvel-champions-le-jeu-de-cartes-sinistres-motivations-cover.jpg',	'De grands pouvoirs impliquent de grandes responsabilités. »Dans l’univers Marvel, ces mots revêtent une grande importance car ils constituent le principe directeur de l’un des plus grands héros jamais connus : Spider-Man. Ce héros lanceur de toile et malicieux est adoré par beaucoup, mais il a aussi sa part d’ennemis mortels. Heureusement, Peter Parker n’est pas le seul grimpeur de murs à protéger les rues de New York des méchants et de leurs sinistres projets…Sinistres Motivations : Et si on se faisait une toile, ce soir ?Dans cette extension, vous et vos compagnons d’infortune parcourez les rues et les toits de New York et affrontez une galerie de méchants classiques de Spider-Man, dont Sandman, Venom, Mysterio et les célèbres Sinister Six. Comme pour les extensions précédentes, vous pouvez jouer chacun de ces scénarios individuellement ou dans le cadre d’une campagne plus large, et avec un sinistre déploiement de nouveaux sets de rencontres modulaires.. Sinistres Motivations donne également le coup d’envoi d’une nouvelle vague de héros, à commencer par deux guerriers de la toile emblématiques : Ghost-Spider et Spider-Man (Miles Morales), qui sont tous deux livrés avec des decks entièrement pré-construits et prêts à jouer dès la sortie de la boîte.Pour jouer avec cette extension, vous aurez besoin de la boite de base Marvel Champion',	'2022-07-26',	'2022-08-03',	62.9),
(15,	3,	'Horreur à Arkham : Le Jeu de Cartes – L’Héritage de Dunwich – Extension Investigateurs',	'https://cdn.1j1ju.com/thumbs/game-lg/medias/57/04/e5-horreur-a-arkham-le-jeu-de-cartes-lheritage-de-dunwich-investigateurs-cover.jpg',	'Horreur à Arkham : Evitez Dunwich pour y passer vos vacances !Une présence monstrueuse terrorisait autrefois le village isolé de Dunwich. Cette période d’horreur n’a pris fin qu’après que trois professeurs de l’université de Miskatonic – le Dr Henry Armitage, le Dr Francis Morgan et le professeur Warren Price – se soient aventurés à Dunwich, armés de savoirs ancestraux qui leur ont permis de vaincre la créature. Aujourd’hui, plusieurs mois plus tard, les collègues du Dr Armitage ont disparu, et il craint le pire…Revenez au tout premier cycle de contenu du jeu Horreur à Arkham : Le Jeu de Cartes avec l’extension Investigateurs pour L’Héritage de Dunwich. Comme pour les extensions Confins de la Terre, toutes les cartes de joueur de ce cycle se trouvent dans l’extension Investigateurs.Retrouvez Ashcan Pete et Zoey Samaras Ce sont 5 investigateurs que vous retrouverez dans cette extension ainsi que plus de 200 cartes joueurs qui vous permettrons d’améliorer et de varier vos decks afin de faire face au nombreux dangers des campagnes Horreur à Arkham Le Jeu de Cartes.Remarque : les fans de longue date d’Horreur à Arkham : Le Jeu de Cartes qui possèdent déjà tous les éléments du cycle original de l’Héritage de Dunwich ne trouveront aucune nouvelle carte ou contenu dans cette extension.Le jeu de base Horreur à Arkham : Le Jeu de Cartes est nécessaire pour jouer.',	'2022-07-26',	'2022-08-03',	42.9),
(16,	1,	'L’Insondable',	'https://cdn.1j1ju.com/thumbs/game-lg/medias/5d/b1/45-linsondable-cover.jpg',	'Battlestar Galactica revient… Dans l’univers d’Horreur à Arkham.Nous sommes en 1913. Vous êtes à bord du SS Atlantica, modeste paquebot exploité par la Fairmont Shipping Co., qui fait cap sur Boston, Massachusetts.Au début d’une partie de L’INSONDABLE, chaque joueur reçoit une carte loyauté qu’il garde secrète et qui détermine s’il est fidèle à la cause des humains ou à celle des hybrides.Puisque les loyautés secrètes dissimulent les objectifs et motivations de chacun, personne ne sait à qui faire confiance.Pour les joueurs loyaux envers les humains, le but du jeu est que le SS Atlantica atteigne sa destination, le port de Boston.Pour les traîtres, loyaux envers les Profonds, le but du jeu est d’empê¬cher le SS Atlantica d’achever son périple.Ils atteindront cet objectif si le navire est détruit, envahi par les Profonds, ou si ses ressources essentielles sont épuisées. Ces ressources sont le Carburant, la Nourriture, la Santé Mentale et les Âmes (le nombre de personnes à bord).Si une seule de ces ressources tombe à zéro, les humains perdent la partie.Une partie se déroule en une succession de tours jusqu’à la fin de la partie. Le tour de chaque joueur se découpe en 4 phases.Durant la première, il pioche des cartes Compétence, qu’il pourra utiliser durant son tour ou même, pour certaines cartes, pendant celui des autres joueurs.Pendant la phase Action, un personnage peut se déplacer, attaquer, sauver un passager, utiliser une capacité Action, échanger, ou même révéler qu’il est un traître.La troisième phase est celle du Mythe. La première carte du paquet Mythe est piochée et résolue. On commence par découvrir le problème auquel est confronté le navire. Puis on active le monstre concerné avant de faire progresser le marqueur sur la piste indiquée.Enfin, on passe à la phase Défausse.Pour les traîtres révélés, le tour est légèrement différent. En effet, à son tour, le traître dispose d’une action supplémentaire, celle de vaincre un passager ! Quant aux traîtres non révélés, un joueur peut tenter de les enfermer dans la cale… en espérant que ce ne soit pas une erreur de jugement.',	'2022-07-26',	'2022-08-03',	74.9),
(17,	2,	'Le Trône de Fer – Le Jeu de Figurines : Piqueuses',	'https://cdn.1j1ju.com/thumbs/game/medias/b0/35/01-le-trone-de-fer-le-jeu-de-figurines-piqueuses-cover.jpeg',	'Si dans le sud, la guerre est surtout une affaire d’hommes, les femmes du Peuple Libre ont largement prouvé leur valeur au combat. Les Piqueuses ne sont pas adaptées à l’affrontement direct sur la ligne de front et se montrent bien plus utiles sur les flancs, tant pour lancer leurs assauts que pour protéger des charges ennemies. Leurs armes sont peut-être rudimentaires, mais elles en ont à profusion et sont capables de les lancer avec une précision mortelle. Un général avisé saura exploiter au mieux ce talent.Contenu12 Piqueuses, 1 Matriarche Piqueuse, 1 Carte Unité, 1 Carte Attachement, 1 Plateau de Déplacement.',	'2022-07-26',	'2022-08-03',	32.9),
(18,	2,	'Star Wars Légion : Stormtroopers Impériaux – Extension Amélioration',	'https://cdn.1j1ju.com/thumbs/game-lg/medias/4e/b7/94-star-wars-legion-stormtroopers-imperiaux-cover.jpeg',	'Cette extension pour STAR WARS : LÉGION contient 4 figurines finement sculptées de Stormtroopers, permettant d’améliorer vos unités de Stormtroopers ou de former une unité de troupiers, ainsi que des cartes Amélioration supplémentaires pour votre armée.Contenu4 figurines en plastique, 1 carte Unité, 7 cartes Amélioration, 12 pions divers et 1 feuillet de règles.',	'2022-07-26',	'2022-08-03',	18.9),
(19,	2,	'Runewars: Seigneur Aubépyne',	'https://cdn.1j1ju.com/thumbs/game-lg/medias/92/82/48-runewars-le-jeu-de-figurines-seigneur-aubepyne-cover.jpeg',	'Le Seigneur Aubépyne est l\'un des plus infatigables champions de Terrinoth. En plus d\'accomplir de dangereuses quêtes personelles, il s\'avère un commandant expert et un vétéran de nombreuses batailles. Doté d\'un féroce sens de l\'honneur et d\'un profond désir de protéger le royaume des déprédations de l\'ennemi, Aubépyne incarne la quintessence du Seigneur Daqan.  Cette boîte contient tout ce dont vous avez besoin pour ajouter le Seigneur Aubépyne à votre armée.',	'2022-07-26',	'2022-08-03',	25),
(20,	2,	'Star Wars Légion : Pilotes de Swoop',	'https://cavernedugobelin.com/wp-content/uploads/2022/07/ffswl97_box3d_20220503-600x565.png',	'Les joueurs accélèrent dans les batailles de Star Wars : Légion avec l’extension d’unité Pilotes de Swoop !\r\n\r\nQu’il s’agisse de criminels ou de combattants de la liberté, de nombreux groupes à travers la galaxie considèrent les motos swoop comme les compagnons de champ de bataille parfaits qui rendent leurs forces encore plus mobiles.\r\n\r\nL’unité de soutien de deux Pilotes de Swoop dans cette extension aide les joueurs à mener rapidement leurs forces au cœur du combat où ils peuvent causer le plus de chaos et de destruction avant d’opérer une retraite rapide.\r\n\r\nCapables d’être déployés par l’Alliance rebelle ou des gangs de mercenaires, ces cavaliers ajoutent un nouvel élément rapide et furieux à n’importe quelle armée.\r\n\r\nCette boîte contient 2 figurines , une carte d’unité et 10 cartes d’améliorations.\r\n\r\nFigurines à monter et à peindre.',	'2022-07-26',	NULL,	32.9),
(21,	1,	'Santorini',	'https://www.myludo.fr/img/jeux/1651737391/300/ax/23865.png',	'Santorini est un pur jeu de stratégie très accessible, où vous incarnez un jeune Dieu grec (ou Déesse) en compétition pour apporter la meilleure aide aux citoyens de l\'île dans la construction d\' un beau village au milieu de la mer Egée.',	'2022-07-26',	NULL,	26.9),
(22,	1,	'Splendor',	'https://cdn.1j1ju.com/thumbs/game-lg/medias/11/d0/3f-splendor-cover.jpeg',	'Dans Splendor, vous dirigez une guilde de marchands. A l\'aide de jetons symbolisant des pierres précieuses, vous allez acquérir des développements qui produisent de nouvelles pierres (les bonus). Ces bonus réduisent le coût de vos achats et attirent les nobles mécènes.Chaque tour est rapide : une action et une seule ! Observez vos adversaires, anticipez et réservez les bonnes cartes.Le premier joueur à parvenir à quinze points de prestige en cumulant nobles et développements déclenche la fin de la partie.',	'2022-07-26',	'2022-08-03',	29),
(23,	1,	'HeroQuest',	'https://cdn.1j1ju.com/thumbs/game-lg/medias/1b/9a/e7-heroquest-systeme-de-jeu-cover.jpg',	'Une grande quête vous attend ! JEU D\'AVENTURE IMMERSIF : Le jeu de plateau HeroQuest d\'Avalon Hill est un jeu d\'aventures fantastiques style donjon dans lequel les joueurs doivent travailler en équipe pour combattre des monstres terrifiants et accomplir des quêtes épiques',	'2022-07-26',	'2022-08-03',	150),
(24,	1,	'Catan',	'https://cdn.1j1ju.com/thumbs/game-lg/medias/70/04/b8-catane-le-jeu-de-base-2010-cover.jpeg',	'À vous les joies et les peines de l\'exploration de l\'île de Catane. Construisez vos villes, vos routes, en profitant au mieux des ressources de cette île si accueillante tout en commerçant avec vos voisins. Et ce n\'est pas la présence du seul brigand de l\'île, le terrible chevalier noir, qui va retenir vos ardeurs de colonisateurs. Catane, c\'est plusieurs millions d\'exemplaires vendus à travers le monde et le porte-étendard d\'une nouvelle manière de jouer. Avec ce jeu, les joueurs français ont découvert tout ce qui fait le sel des jeux allemands : une mécanique fluide et bien pensée, des règles simples, des parties courtes pour un jeu de stratégie et la non-élimination des joueurs en cours de partie. Cette nouvelle édition se refait une beauté : nouvelles tuiles, figurines plastiques détaillées, nouvelles cartes et cadre maritime pour assurer le maintien des tuiles.',	'2022-07-26',	'2022-08-03',	36),
(25,	3,	'Chroniques oubliées Fantasy : Boite d\'Initiation',	'https://m.media-amazon.com/images/I/814CBHOQI6S._AC_SX679_.jpg',	'La Boite d\'initiation pour les Chroniques Oubliées vous propose de découvrir le jeu de rôle au travers de 4 scénarios formant une petite campagne.',	'2022-08-03',	'2022-08-03',	39.9),
(26,	1,	'Alice’s Garden',	'https://cf.geekdo-images.com/JhLSvQu1cOBg4Dg5l3BgHw__imagepagezoom/img/flOeIbPOqcYMjw75yaTX55XqDr8=/fit-in/1200x900/filters:no_upscale():strip_icc()/pic5177326.jpg',	'Un jeu qui pique au coeurAlice’s Garden séduit tout de suite par son ambiance bucolique et son matériel original qui vous transportera au pays des merveilles. Vous êtes dans la peau du jardinier royal et votre plateau de jeu est votre parcelle de jardin dans laquelle vous allez devoir faire vos preuves ! A vous d’agencer au mieux les pièces disponibles pour satisfaire les désirs de Sa Majesté :– Les Roses sont les fleurs préférées de la reine, et les jardiniers doivent en prendre particulièrement soin. De larges et somptueux bosquets de rosiers sont plus susceptibles de plaire à votre souveraine que quelques arbustes chétifs et clairsemés, plantés ici et là.– Les Champignons sont réputés pour leurs propriétés magiques, et la Reine en veut toujours à portée de main, même dans les recoins les plus reculés du jardin.– Le soleil doit briller de mille feux sur le jardin. Si un jardin est ombragé par des arbres, ce n’est plus un jardin mais une forêt. Après une marche éreintante, cependant, le promeneur sera certainement heureux de se reposer à l’ombre rafraîchissante d’un arbre…But du jeu !Placez au mieux vos tuiles pour maximiser le nombre de points. Lorsqu’un joueur ne peut plus placer aucune tuile sur son plateau, le jeu se termine à la fin de la manche. Les joueurs ajoutent leurs dernières tuiles sur leurs plateaux et procèdent à l’évaluation finale en remplissant la feuille de score. Le nombre de points est calculé en fonction du placement des différents éléments détaillés ci-dessus. Chaque élément et son placement par rapport aux autres rapporte alors un nombre de points. Celui qui marque le plus de points remporte la partie et sauve sa tête de la colère de la Reine.Contenu : 4 plateaux de jeu– 6 sacs en tissu– 95 tuiles de jeu– Fiches de résultats– 1 Règle du jeu',	'2022-08-03',	'2022-08-03',	23.9),
(27,	1,	'Canvas',	'https://cdn.1j1ju.com/thumbs/game-lg/medias/79/9e/f3-canvas-cover.jpg',	'Canvas, un jeu d\'art en toute transparence ! Dans Canvas, vous incarnez un peintre en compétition dans un concours d’art. Collectionnez des cartes d’art, en en superposant 3 pour créer votre propre œuvre unique. En fonction de la manière dont vous superposerez les cartes, vous révélerez certaines icônes qui seront utilisées en fin de partie. Saurez-vous emporter le premier prix ? Peignez les plus belles toiles pour remporter la compétition Chaque combinaison de cartes crée une illustration unique. Lorsque tous les joueurs auront complété trois toiles, la partie se termine. Une boîte si jolie que vous voudrez et pourrez, l\'accrocher au mur.',	'2022-08-03',	'2022-08-03',	44.9),
(28,	3,	'Dungeon Crawl Classics Lankhmar 12 - Mercy on the Day of the Eel',	'https://goodman-games.com/store/wp-content/uploads/sites/10/2022/01/GMG5226_DCCL_MercyOnTheDayOfTheEel_FrontCover.jpg',	'Dungeon Crawl Classics Lankhmar 12 - Mercy on the Day of the Eel est une aventure de niveau 2 pour Dungeon Crawl Classics, se déroulant à Lankhmar !   Une bande de prétendues légendes des rues a offensé le maître de la Guilde des Voleurs de Lankhmar, et le verdict est sans appel : ce sera la mort ! Cependant, le seigneur du crime propose d\'accorder un sursis si les PJ acceptent d\'entreprendre un travail délicat en son nom : un vol d\'objet qui devra finalement être discrètement  rendu à son propriétaire. Bien sûr, les choses sont rarement aussi simples qu\'elles en ont l\'air dans la Cité des sept cent mille fumées, et cette tâche apparemment aisée, pourrait mener à une aventure périlleuse, au-delà de toute imagination. Qu\'adviendra-t-il de nos héros s\'ils acceptent la pitié le Jour de l\'Anguille ?',	'2022-08-03',	'2022-08-03',	9.9),
(29,	1,	'Terraforming Mars',	'https://cdn.1j1ju.com/thumbs/game-lg/medias/6b/7d/95-terraforming-mars-facing.jpeg',	'Jeu de stratégie pour 1 à 5 joueurs.  Faite grandir votre corporation sur la planète Mars.',	'2022-08-03',	'2022-08-03',	57.9),
(30,	1,	'Spirit Island 3ème Edition',	'https://cdn.1j1ju.com/thumbs/game-lg/medias/fb/ba/e1-spirit-island-cover.jpeg',	'Coopérez avec les autres joueurs pour repousser les envahisseurs. Utiliser vos pouvoir pour défendre votre ile et attaquer les utilisateurs.',	'2022-08-03',	'2022-08-03',	80.9),
(31,	2,	'Pathfinder Battles Deep Cuts - Dragon Rouge gargantuen',	'https://m.media-amazon.com/images/I/71zPjL+rPhL._AC_UL320_.jpg',	'Figurine en résine à peindre',	'2022-08-03',	NULL,	41.95),
(32,	3,	'Flourish',	'https://cdn.1j1ju.com/thumbs/game-lg/medias/f8/50/70-flourish-cover.jpg',	'Flourish est un magnifique jeu de cartes et de construction de jardins dans lequel les joueurs planifient et construisent le jardin de leurs rêves au cours de la saison de culture. Grâce à de superbes images, les joueurs planifient leur jardin tout au long de la partie pour accumuler le plus de points. Ce jeu facile à apprendre offre à la fois des modes de stratégie compétitive et de jeu coopératif, et un nombre de joueurs compris entre 1 et 7 offre un haut niveau d\'accessibilité et de rejouabilité.',	'2022-08-03',	'2022-08-03',	39.5),
(33,	1,	'Figurine à peindre Nazgûl',	'https://www.games-workshop.com/resources/catalog/product/920x950/99121466005_NEWWingedNazgulNEW01.jpg',	'Figurine en kit à monter et à peindre',	'2022-08-03',	'2022-08-03',	52.48),
(34,	1,	'Le Seigneur des Anneaux : Voyages en Terre du Milieu',	'https://cdn.1j1ju.com/thumbs/game-lg/medias/ad/56/bc-le-seigneur-des-anneaux-voyages-en-terre-du-milieu-cover.jpeg',	'Incarnez un héro de la saga Le Seigneur des Anneaux à travers différents scénarios',	'2022-08-03',	'2022-08-03',	89.9),
(35,	2,	'Figurine Fantasy femme guerrière',	'https://m.media-amazon.com/images/I/71D33x4iuLL._AC_SX679_.jpg',	'Kit à peindre',	'2022-08-03',	NULL,	44.83),
(36,	3,	'Dungeons & Dragons V5 : Coffret',	'https://cdn1.philibertnet.com/515356-large_default/dungeons-dragons-coffret.jpg',	'Ce coffret contient un exemplaire des trois livres de règles de base, ainsi qu’un écran de Maître du jeu, tous réunis au sein d’un élégant coffret. C’est le cadeau parfait pour tout fan de D&D.',	'2022-08-03',	NULL,	129.99),
(37,	1,	'Bad Company',	'https://cdn.1j1ju.com/thumbs/game-lg/medias/9a/ef/de-bad-company-cover.jpg',	'Créez votre propre gang et personnalisez-le en fonction de vos projets. Rassemblez des ressources pour réaliser des casses et de l\'argent pour recruter de nouveaux membres de gang. Et assurez-vous d\'échapper à la police ! Un jeu unique et amusant des concepteurs primés d\'Automania et de Trails of Tucana. Bad Company peut accueillir jusqu\'à 6 joueurs avec très peu de temps d\'arrêt. Il comprend également un mode solo où vous essayez de déjouer la police. Chaque joueur dispose d\'un plateau de jeu comprenant 11 membres de gang. Vous pouvez les améliorer en plaçant des cartes qui se chevauchent sur eux. Ainsi, l\'apparence visuelle des membres de votre gang change au fur et à mesure qu\'ils acquièrent des capacités supplémentaires.',	'2022-08-03',	'2022-08-03',	50);

DROP TABLE IF EXISTS `label`;
CREATE TABLE `label` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(100) COLLATE utf8mb4_unicode_ci NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

INSERT INTO `label` (`id`, `name`) VALUES
(1,	'Précommande'),
(2,	'Nouveauté'),
(3,	'Test'),
(4,	'Événement'),
(5,	'Info'),
(6,	'Black Friday');

DROP TABLE IF EXISTS `new_game`;
CREATE TABLE `new_game` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `url` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

INSERT INTO `new_game` (`id`, `name`, `url`) VALUES
(1,	'Warcry',	'https://figurines-wargame.fr/warcry/19503-moisson-rouge-francais-5011921164295.html'),
(2,	'This War of Mine',	'https://www.philibertnet.com/fr/edge/55855-this-war-of-mine-le-jeu-de-plateau-8435407633551.html'),
(3,	'Wingspan',	'https://www.philibertnet.com/fr/matagot/73168-wingspan-3760146644991.html'),
(4,	'Potion Explosion',	'https://www.philibertnet.com/fr/iello/40702-potion-explosion-3760175517914.html'),
(6,	'Naga Raja',	'https://www.philibertnet.com/fr/hurrican-games/74537-naga-raja-7612577021062.html'),
(7,	'Red dead rédemption 2',	'https://www.amazon.fr/Jeux-de-soci%C3%A9t%C3%A9-Dora-Jouets/s?rh=n%3A363587031%2Cp_n_featured_character_browse-bin%3A374083011'),
(11,	'Catan extension',	'catan.com'),
(12,	'Heroquest - extension l\'horreur des glaces',	'https://boutique.lepalaisdemidgard.fr/achat/heroquest/horreur-glace'),
(13,	'Heroquest - extension l\'horreur des glaces',	'https://boutique.lepalaisdemidga'),
(14,	'Heroquest - extension l\'horreur des glaces',	'https://boutique.lepalaisdemidgard.fr/achat/heroquest/horreur-glaces/'),
(15,	'Heroquest - extension l\'horreur des glaces',	'https://boutique.lepalaisdemidgard.fr/achat/heroquest/horreur-glaces/');

DROP TABLE IF EXISTS `review`;
CREATE TABLE `review` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `deal_id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `vote` int(11) NOT NULL,
  PRIMARY KEY (`id`),
  KEY `IDX_794381C6F60E2305` (`deal_id`),
  KEY `IDX_794381C6A76ED395` (`user_id`),
  CONSTRAINT `FK_794381C6A76ED395` FOREIGN KEY (`user_id`) REFERENCES `user` (`id`),
  CONSTRAINT `FK_794381C6F60E2305` FOREIGN KEY (`deal_id`) REFERENCES `deal` (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

INSERT INTO `review` (`id`, `deal_id`, `user_id`, `vote`) VALUES
(1,	2,	12,	1),
(2,	1,	9,	1),
(3,	1,	2,	1),
(4,	1,	4,	-1),
(5,	1,	5,	-1),
(8,	1,	8,	-1),
(9,	3,	7,	1),
(10,	3,	6,	1),
(11,	3,	8,	-1),
(13,	3,	4,	-1),
(19,	11,	42,	-1),
(20,	6,	42,	1),
(22,	1,	1,	1),
(23,	2,	1,	-1),
(24,	3,	1,	1),
(25,	1,	40,	1),
(26,	5,	1,	-1),
(27,	6,	1,	1),
(28,	2,	42,	1),
(29,	11,	1,	-1),
(30,	2,	40,	-1),
(31,	3,	40,	1),
(32,	5,	40,	-1),
(33,	25,	1,	1),
(34,	8,	1,	1),
(35,	15,	1,	1),
(36,	16,	1,	-1),
(37,	5,	43,	-1),
(38,	1,	43,	1),
(39,	3,	43,	1),
(40,	3,	42,	1),
(41,	2,	43,	1),
(42,	1,	42,	-1),
(43,	8,	42,	1),
(44,	3,	44,	1),
(45,	5,	44,	-1),
(46,	2,	44,	1),
(47,	3,	45,	1),
(48,	5,	45,	-1),
(49,	6,	45,	1),
(50,	11,	45,	-1),
(51,	3,	56,	1),
(52,	5,	56,	-1),
(53,	1,	56,	1),
(54,	6,	40,	1),
(55,	8,	40,	-1),
(56,	3,	57,	1),
(57,	11,	57,	-1),
(58,	16,	57,	1),
(59,	15,	57,	1),
(60,	3,	58,	1),
(61,	6,	58,	1),
(62,	15,	58,	1),
(63,	8,	59,	1),
(64,	3,	59,	1),
(65,	15,	59,	1),
(66,	3,	60,	1),
(67,	5,	42,	-1),
(68,	16,	59,	1),
(69,	25,	59,	1),
(70,	5,	59,	-1),
(74,	1,	1,	1),
(75,	16,	40,	-1),
(80,	16,	68,	1),
(81,	35,	1,	-1);

DROP TABLE IF EXISTS `shop`;
CREATE TABLE `shop` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(100) COLLATE utf8mb4_unicode_ci NOT NULL,
  `image` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `description` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `url` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `adress` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` date NOT NULL,
  `updated_at` date DEFAULT NULL,
  `slug` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

INSERT INTO `shop` (`id`, `name`, `image`, `description`, `url`, `adress`, `created_at`, `updated_at`, `slug`) VALUES
(1,	'Philibert',	'https://www.philibertnet.com/img/cms/magasin/magasin_3.jpg',	'Depuis plus de 40 ans, Philibert c\'est le spécialiste du jeu de société.\r\n\r\nSitués au cœur de Strasbourg, nos deux magasins proposent un large catalogue : jeux de société, jeux de rôles, jeux classiques, jeux de cartes, jeux de figurines, etc.\r\n\r\nNotre équipe de Philiboyz&Girlz est là pour vous conseiller la quintessence du jeu de société, pour tous les goûts et pour tous les âges.\r\n\r\nEt on ne s\'arrête pas là ! Que vous soyez en France ou à l\'autre bout du monde, notre boutique en ligne propose plus de 35 000 références à vous faire directement livrer chez vous, et dans les meilleures conditions.\r\n\r\nPhilibert, c\'est une équipe de passionnés, prête à vous transmettre leur passion du jeu.\r\n\r\nEn 2019, Philibert crée le Philibar, un bar à jeux où l\'on peut découvrir les dernières nouveautés autour d\'un verre et d\'une petite restauration.',	'https://www.philibertnet.com/',	'12 rue de la grange 67000 Strasbourg - France',	'1978-01-01',	NULL,	'Philibert'),
(2,	'Play In',	'https://www.play-in.com/images/magasin_playin_annecy.png',	'Playin est une entreprise spécialisée dans la vente de jeux de cartes, jeux de société et accessoires.\r\nPlus de 60 personnes travaillent actuellement dans nos magasins physiques (Paris et Annecy) et pour notre plateforme de vente en ligne.\r\n\r\nCréée en 2008, Playin était d’abord le projet de deux passionnés : Loïs Jacquet et Stéphane Tichadou, joueurs du célèbre jeu de cartes Magic : the Gathering.\r\nIls voulaient avant tout créer un magasin dédié à leur jeu favori.\r\n\r\nIls décidèrent donc d’ouvrir un espace de jeu et un site de vente de cartes, nommé Magic Bazar.',	'https://www.play-in.com/',	'131 avenue de France 75013 - Paris ',	'2008-05-13',	NULL,	'play-In'),
(3,	'Ludum',	'https://www.ludum.fr/img/cms/imgog.png',	'Depuis plusieurs années nous réflechissons à la meilleure façon de démocratiser la pratique du jeux de société dit \"moderne\".\r\n\r\nNous souhaitons pouvoir vous proposer une alternative aux sempiternelles parties de Monopoly ou de Cluedo et ainsi vous faire découvrir certaines pépites ludiques malheureusement trop peu connues. \r\n\r\nLudum.fr est le fruit de cette réflexion. Nos offres d\'abonnements vous permettent de découvrir le plus simplement possible de nouveaux jeux et notre boutique vous permet d\'explorer de nouveaux terrains de jeu.\r\n\r\nL\'ensemble de nos références sont sélectionnées avec soin sur des critères qui nous sont chers en tant que joueurs, parents ou amis. Ainsi nous ne vous proposons que des jeux répondant à nos standards de qualité en terme d\'accessibilité, d\'intérêt ludique ou encore de rejouabilité.',	'https://www.ludum.fr/',	NULL,	'2019-04-01',	NULL,	'ludum'),
(4,	'Cultura',	'https://cdn.cultura.com/media/wysiwyg/SHOPS/ONE/Limoges/limoges.jpg',	'Depuis sa création en 1998, l’histoire de Cultura s’écrit autour d’une conviction : rendre les loisirs culturels et artistiques accessibles au plus grand nombre.\r\n\r\nNotre mission  « Faire vivre et aimer la culture »  : Permettre au plus grand nombre de vivre, avec plaisir, l’expérience de la culture, de la créativité et de l’apprentissage artistique, sources d’émotion, d’épanouissement personnel et d’enrichissement de sa relation à l’autre.',	'https://www.cultura.com/#ae1010',	'30 rue Amédée Gordini 87280 LIMOGES',	'1998-01-12',	'2022-08-04',	'cultura'),
(5,	'Esprit jeu',	'https://www.clemajob.fr/resources/20211028-140648-logo-esprit-jeu.png',	'Esprit Jeu a été créé par des passionnés de jeux de société dits \"modernes\" destinés à un public adulte recherchant des activités de réflexion et/ou de détente à 2 ou à plusieurs.\r\n\r\nLes jeux de société que nous vous proposons sont rarement proposés dans les réseaux de distribution classiques. Fabriqués par des éditeurs spécialisés, en collaboration avec les auteurs du monde du jeu, nos produits vous permettront de découvrir ou redécouvrir le plaisir de jouer et de se retrouver en toute convivialité.\r\n\r\nEsprit Jeu n\'est pas (pour l\'instant) une boutique au sens propre. Nous n\'avons pas de magasin en pas de porte. C\'est un choix délibéré. Le E-commerce est un métier spécifique. Depuis notre création en 2007, nous nous sommes concentrés sur ce métier et nous avons appris à maîtriser tous ses aspects : logistique, offre étendue, qualité du site web etc.\r\n\r\nCet aspect permet de rendre accessible à tous des milliers de références même si vous résidez loin d\'une boutique de jeu traditionnelle  : que vous habitiez les DOM-TOM, l\'île d\'Ouessant ou un hameau de Lozère, vous pourrez profiter du monde fabuleux du jeu de société.',	'https://www.espritjeu.com/',	'15 Rue du Moulin À Poudre Local 406, 76150 Maromme',	'2007-05-15',	NULL,	'esprit-jeu'),
(6,	'Black Book Editions',	'https://www.black-book-editions.fr/contenu/partners/tonyb/image/logo_bbe_contour.png',	'Maison fondée en 2004 par des passionnés, Black Book Éditions est le premier éditeur français de jeux de rôle et d\'aventures. Avec plus de 15 ans d\'activité au compteur, et plus de 1200 références éditées, BBE propose à la fois la version française des plus grands noms du jeu de rôle en version originale (Pathfinder, Starfinder, Shadowrun, L\'Oeil Noir, Savage Worlds, Tails of Equestria – My Little Pony, Dragon Age), et des gammes de création française universellement saluées, qu\'elles soient originales (Chroniques Oubliées, Rôle\'n Play, Pavillon Noir, Capitaine Vaudou) ou sous licence (Terres d\'Arran, Monstres, le jeu de rôle dans l\'univers de Joann Sfar).',	'https://www.black-book-editions.fr/',	NULL,	'2004-05-11',	NULL,	'black-book-editions'),
(7,	'BCD Jeux',	'https://www.bcd-jeux.fr/img/bcd-jeux-logo-1621330377.jpg',	'BCD jeux est naît en 2016 de la passion de deux frères, Benjamin et Nicolas Fort pour le jeu et l\'animation. Au gré des rencontres avec d\'autres personnes habitées par cette même philosophie, ils ont commencé à tester et à partager des jeux régionaux et des jouets artisanaux fabriqués en France. Benjamin et Nicolas, deux jeunes entrepreneurs, ont donc tout naturellement ouvert une boutique dans l\'Aude à Castelnaudary, vitrine de leur vocation pour l\'animation d\'événements locaux par le jeux et le \"bon vivre ensemble\". La boutique s\'est digitalisée pour offrir un service 24h/7j ainsi qu\'une meilleure expérience client avec notamment la mise en place du Click & Collect afin de pouvoir acheter en ligner et venir retirer sa commande en magasin. La boutique en ligne offre également la possibilité de commander partout en France, en Outre-mer et dans les pays francophones. ',	'https://www.bcd-jeux.fr/',	'230 Avenue du Dr Guilhem, 11400 Castelnaudary',	'2016-02-14',	NULL,	'bcd-jeux'),
(8,	'Monsieur Dé',	'https://www.monsieurde.com/img/cms/MONSIEURDE-2POTERIE-LOW.jpg',	'Monsieur Dé, c\'est tout d\'abord une boutique physique située dans le centre historique de Vitré créée en 2015 par un passionné de jeux de société. Ici, pas de Monopoly, Cluedo ou Trivial Pursuit. Les jeux de société « modernes » que vous y trouverez sont rarement proposés dans les réseaux de distribution classiques et vous permettront de découvrir ou redécouvrir le plaisir de jouer ensemble autour d\'une table. Monsieur Dé, c\'est maintenant aussi une boutique en ligne proposant plus de 1500 références qui peuvent être directement livrées chez vous ou même retirées en boutique. Que vous puissiez vous déplacer ou non, en boutique ou par téléphone, nous répondrons à vos questions et prendrons à cœur de vous conseiller et vous guider vers LE jeu qu\'il vous faut, que vous soyez petits ou grands, débutants ou avertis.',	'https://www.monsieurde.com/',	'2 rue de la Poterie, 35500 Vitré',	'2015-12-04',	NULL,	'monsieur-de'),
(9,	'Lucid Box',	'https://www.ludicbox.fr/photos-boutique-ludicbox/20170505_134936.jpg',	'Notre boutique est située au 52 Avenue Stroh à Avesnes sur Helpe (face à Music Center). Nous vous proposons des jeux de sociétés traditionnels de qualité, des jeux de plateau, des jeux de rôles des jeux de figurines et des jeux pour les enfants.\r\n\r\nNotre volonté est de vous proposer les meilleures références dans tous les types de jeux et de vous faire découvrir des univers de jeux que vous ne soupçonnez même pas.\r\n\r\nPour vos commandes par internet, nous nous engageons à vous envoyer vos commandes au plus tard le lendemain de votre paiement sécurisé en ligne et pour la plupart du temps le jour même (si passées avant midi).\r\n\r\nL’ensemble des produits ludiques que nous vous proposons est disponible en stock.\r\n\r\nNotre société créée en 2002 est implantée au coeur de l\'Avesnois, dans le nord de la France.',	'https://www.ludicbox.fr/',	'52 Avenue Stroh - 59440 Avesnes sur Helpe ',	'2002-05-06',	NULL,	'lucid-box'),
(10,	'Ludo Cortex',	'https://www.ludocortex.fr/img/logo.png',	'Le site de vente en ligne de Jeux, jeux de société, jeux de plateau, jeux de rôle, jeux de cartes',	'https://www.ludocortex.fr/',	'3 Boulevard du Lycée 74000 Annecy',	'2006-10-01',	NULL,	'ludo-cortex'),
(11,	'Wavgames',	'https://www.wavgames.fr/img/wavgames-logo-1556200183.jpg',	'SARL au capital de 10 000€, créée en Avril 2013. L\'Entreprise est spécialisée dans la création, vente et personnalisation d\'accessoires de jeu, ainsi que dans le développement de logiciels informatiques. Nous avons pour but de répondre aux besoins des joueurs et de tous les métiers qui tournent autour du jeu, pour des outils de marketing ou les accessoires d\'un jeu spécifique.',	'https://www.wavgames.fr/',	'10B rue du baron de Courcelles 54690 Lay Saint Christophe',	'2013-04-14',	NULL,	'wavgames'),
(12,	'Golden Meeple ',	'https://www.goldenmeeple.be/wp-content/uploads/2019/01/Logo-Golden-Meeple.jpg',	'Le fondateur de Golden Meeple est un véritable passionné des jeux de société. Afin de vivre sa passion jusqu’au bout, il crée Golden Meeple qui voit le jour en 2015. Le but ? Faire découvrir une énorme panel de jeux de société à des prix abordables, grâce à sa boutique en ligne.',	'https://www.goldenmeeple.be/',	'Drève aux Silex 10 1495 Villers-la-Ville Belgique',	'2015-03-02',	NULL,	'golden-meeple '),
(13,	'1001Hobbies',	'https://mfr.1001hobbies.com/img/prestarockettheme/1001hobbies-logo.svg',	'Maquettes, modélisme radiocommandé, jeux et collectors : partageons nos passions !\r\n1001Hobbies est le mégastore en ligne pour les hobbies et passions des grands',	'https://www.1001hobbies.fr/',	'14, Rue Jean-Jacques Rousseau - 93100 Montreuil',	'2011-05-06',	NULL,	'1001hobbies'),
(14,	'La Tanière Lugeek',	'https://1.bp.blogspot.com/-dB-PIrWuy88/XSbxbrqp0rI/AAAAAAAAfkA/PDmvPTfm6xoOq3vWd3lzeKcUjZrkqWNowCKgBGAs/w1200-h630-p-k-no-nu/ltl_yt_intro%2B-%2BCopie.png',	'\r\nVente en ligne de jeux de société, figurines et accessoires\r\nTouche à tout à grosses papattes',	'https://www.latanierelugeek.com/',	'52 Rue Calotte, 82370 Nohic',	'2019-04-15',	NULL,	'la-tanière-lugeek'),
(15,	'Troll 2 Jeux',	'https://www.pagesjaunes.fr/media/agc/resize/413x550/4f/2c/67/00/00/42/c2/16/e4/a8/62bc4f2c67000042c216e4a8/62bc4f2c67000042c216e4a9.jpg',	'Troll2jeux est une boutique de jeux de société, de jeux de cartes à collectionner et évolutifs, de jeux de rôles, et enfin de figurines. L\'objectif et l\'ambition de Troll2jeux est de réunir les joueurs autour d\'une table. Troll2jeux, c’est un antre de passionnés de jeux : Magic, Héroclix, jeux de société, jeux de rôles, jeux de plateau.... Découvrez des jeux de stratégie —Starcraft —des jeux coopératifs —Zombicide, Horreur à Arkham —des jeux de rôles —Advanced Donjons & Dragons —des jeux de deck building —Star Realm. Ouverte même le dimanche, la boutique accueille de nombreux tournois.',	'https://troll2jeux.com/',	'15/17 place d’aligre, 75012 Paris',	'2004-01-10',	NULL,	'troll-2-jeux'),
(16,	'La Poule à Pois',	'https://www.monsieurde.com/modules/ps_banner/img/f6a4e9b599b91fdcdf3f388b0639c380.jpg',	'La Boutique de vente en ligne de jouets en bois et jeux de société, La Poule à Pois, est née de l\'expérience de notre petit magasin de proximité créé en 2011.\r\n\r\nSituée à sa création dans le centre-ville Châteaugiron dans un joli petit local à colombages de 27 m2, puis dans l\'ancienne Pharmacie, le magasin de 160 m2 est depuis 2017 à l\'entrée du centre commercial UNIVER toujours à Châteaugiron à 15 minutes au sud-est de Rennes en Bretagne (35 - Ille et Vilaine) et fait partie du quotidien des clients Castelgironnais et des communes alentours.\r\n\r\nL\'ancienne boutique est devenue une boutique de décoration atypique: L\'Atelier Baroque.\r\n\r\nDepuis 2011, l\'équipe de La Poule à Pois et son univers ludique s\'est agrandit proposant plus de 8000 références dont près de 2000 jeux de société toujours sélectionnés avec autant de passion!\r\n\r\nNous vous proposons de parcourir notre sélection et découvrir des articles originaux pour la Naissance, la Décoration de chambre de bébé, des jeux d\'Eveil & de Découverte, des Jeux d\'imagination, des Loisirs créatifs pour les filles et les garçons, des Jeux de société pour tout âge et des Jeux de plein air. Tout pour trouver le cadeau idéal pour vos idées cadeaux de naissance, d\'anniversaire et de Noël.\r\n\r\nPour le plaisir d\'offrir, découvrez aussi notre sélection de cadeaux originaux pour tous les âges.',	'https://www.lapouleapois.fr/',	'Centre Commercial Univer 7 Rue des Comptoirs 35410 Châteaugiron',	'2015-00-14',	NULL,	'la-poule a-pois'),
(17,	'Passion du Jeu',	'https://www.passiondujeu.fr/wp-content/uploads/2020/11/logo_footer.png',	'Passion du jeu a été créé en octobre 2004 par Nicolas Huet. Tout d’abord implanté 135, rue Nationale à Cholet, le magasin déménage en 2008 sur le parvis de l’église Notre-Dame ou il demeure actuellement.\r\n\r\nRacheté en décembre 2019 par Xavier Jauneault, passion du jeu continue de proposer ses services au grand public ainsi qu’aux professionnels : associations, ludothèques…',	'https://www.passiondujeu.fr/boutique/',	'53, Rue des Vieux Greniers, 49300 Cholet',	'2014-10-12',	NULL,	'passion-du-jeux'),
(18,	'Le Temple du Jeu',	'https://www.letempledujeu.fr/local/cache-vignettes/L400/H301/templeb-0f10c.png',	'Le Temple du Jeu » actuel, d’origine Nantaise (et donc bretonne sans vouloir polémiquer ;) a été fondé en 1995 mais les \"Grands Anciens\" bordelais se rappellent sans doute d’une boutique du même nom par chez eux. Un lien ? Mmm... Presque ! Disons que le phénix a changé de peau et déménagé à Nantes... Depuis 1999, le Temple du Jeu est aussi sur internet et vous livre le plus rapidement possible tous les jeux de vos rêves. A l’heure actuelle, tous vos colis partent du magasin nantais, qui reste la maison-mère même si d’autres boutiques existent maintenant.\r\n\r\n',	'https://www.letempledujeu.fr/',	'4, rue Neuve des Capucins  44000 NANTES',	'1995-02-02',	NULL,	'le-temple-du-jeux'),
(19,	'Donjon Dragon et Miniatures',	'https://static.wixstatic.com/media/513a24_80e5664591b243e7b431bb7dfc949afd~mv2.png/v1/crop/x_80,y_77,w_346,h_392/fill/w_132,h_130,al_c,q_85,usm_0.66_1.00_0.01,enc_auto/Donjons%2C%20Dragons%20%26%20Miniatures.png',	'Bienvenue chez vous ! \r\n\r\nDonjons, Dragons & Miniatures c\'est la boutique pour vos  jeux de rôle, jeux de figurines, jeux de société et wargame.\r\n\r\nNous avons des figurines Reaper Miniatures, Darksword... Des décors Battle Systems, Mantic Games...\r\n​Nous proposons également de la Peinture pour figurines et décors, du matériel de hobby et loisir créatif Greenstuff World, AK Interractive, Army Painter et bien d\'autres choses ! \r\n\r\nNous faisons en sortes de ne proposer à la vente que ce que nous avons en stock donc aucune mauvaise surprise ',	'https://www.dragonminiature.com/',	NULL,	'2020-06-18',	NULL,	'donjon-dragon-et-miniatures'),
(20,	'Donjon Deodatien',	'https://donjon-deodatien.fr/img/logo_donjon.svg',	'Nous sommes une boutique de jeux de société spécialisée !\r\n\r\n\r\n\r\nNous proposons des jeux pour tous les âges à partir de 3 ans. Ce ne sont pas des jouets. Il s\'agit de jeux de société (jeux de plateau, jeux de figurines, jeux d\'ambiance, jeux de rôle, jeux de carte à collectionner, ...) qui ne sont pas trouvable en grande surface\r\n\r\n\r\n\r\nNous proposons une gamme de jeux plus complexe et plus riche en contenu que la moyenne pour satisfaire tous les types de joueurs, qu\'ils soient Novices ou plus Expert\r\n\r\n\r\n\r\nNous proposons également de la peinture, des outils et des accessoires pour les jeux de figurines ou les maquettistes.\r\n\r\n\r\n\r\nNous proposerons de jouer sur place avec des jeux que nous aurons en démonstration. Le prix d\'entrée sera de 2€ + une consommation au choix parmi celles disponibles (sandwichs froids, boissons softs, gâteaux, ...\r\n\r\n\r\n\r\nNous proposerons des événements comme de la découverte de jeux, des ateliers peinture sur figurine, des tournois de jeux et bien d\'autres.',	'https://donjon-deodatien.fr/shop',	'5 Rue Thiers 88100 Saint-Dié-Des-Vosges',	'2004-06-21',	NULL,	'donjon-deodatien'),
(21,	'Ludifolie',	'https://www.ludifolie.com/themes/gmm-ludifolie/assets/img/shop.jpg',	'Fondé en 2009, Ludifolie propose à la vente en ligne des milliers de jeux de société et vous accueille dans sa boutique de Vincennes. Le sérieux du prix, la folie du jeu !\r\n\r\nJeu d\'ambiance, jeu familial, jeu de rôle ou encore jeu de cartes à collectionner : notre équipe de passionnés (avec chacun sa petite spécialité) sélectionne pour vous le meilleur des jeux de société pour débutant et joueur initié. Notre mission ? Vous aider à trouver LE jeu idéal ! Découvrez toutes nos références, dernières nouveautés et complétez votre collection.',	'https://www.ludifolie.com',	'73 rue de Fontenay 94300 Vincennes',	'2022-08-03',	'2022-08-03',	'ludifolie'),
(22,	'Autre',	'https://cdn.discordapp.com/attachments/1004272919905583245/1004287429206867968/a-default-img.png',	'blabla',	'boutique.com',	NULL,	'2022-08-04',	NULL,	'autre');

DROP TABLE IF EXISTS `type`;
CREATE TABLE `type` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(100) COLLATE utf8mb4_unicode_ci NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

INSERT INTO `type` (`id`, `name`) VALUES
(1,	'Offre spéciale'),
(2,	'Solde'),
(3,	'Prime Day'),
(4,	'Promotion'),
(5,	'Un acheté un offert'),
(6,	'Vente flash');

DROP TABLE IF EXISTS `user`;
CREATE TABLE `user` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `avatar_id` int(11) NOT NULL,
  `name` varchar(100) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(180) COLLATE utf8mb4_unicode_ci NOT NULL,
  `password` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `roles` longtext COLLATE utf8mb4_unicode_ci NOT NULL COMMENT '(DC2Type:json)',
  `created_at` date NOT NULL,
  `updated_at` date DEFAULT NULL,
  `is_active` tinyint(1) NOT NULL,
  `slug` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `UNIQ_8D93D649E7927C74` (`email`),
  KEY `IDX_8D93D64986383B10` (`avatar_id`),
  CONSTRAINT `FK_8D93D64986383B10` FOREIGN KEY (`avatar_id`) REFERENCES `avatar` (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

INSERT INTO `user` (`id`, `avatar_id`, `name`, `email`, `password`, `roles`, `created_at`, `updated_at`, `is_active`, `slug`) VALUES
(1,	11,	'admin',	'admin@admin.com',	'$2y$13$faYiooKLfdbrcEU/d18DQ.yRlzUEicWAJdgemAYv3c8d89RRuS4yi',	'[\"ROLE_ADMIN\"]',	'2022-07-25',	'2022-08-02',	1,	'admin'),
(2,	8,	'manager',	'manager@manager.com',	'$2y$13$NFUl9VRpoCZP1isHtjiaW.rLIIBhtKBS6fWJU/VxshmUBDedEFpv2',	'[\"ROLE_MANAGER\"]',	'2022-07-25',	NULL,	1,	'manager'),
(3,	1,	'Adrien Bichon',	'adrien@bichon.com',	'$2y$13$k.u0gDCdi57/vH8X0YJwzOjvVWuQmc8iCF0arnC0bBAWvJNvloCa6',	'[]',	'2022-07-25',	NULL,	1,	'adrien-bichon'),
(4,	5,	'Docteur Aubergine',	'aubergine@mail.com',	'$2y$13$k/in5gWkGSd3EB/7b1oSGOeccAGzuMM9vsRmzkjVNZSc1RolqjSzW',	'[\"ROLE_MANAGER\"]',	'2022-07-25',	NULL,	1,	'docteur-aubergine'),
(5,	3,	'Jean-Michel',	'jm@jm.fr',	'$2y$13$8VK/2ehTIjPZNY3.n8wruOcyYjwqUZnSz7O/PqYsyBqdBqoMwUbV2',	'[]',	'2022-07-25',	NULL,	1,	'jean-michel'),
(6,	2,	'Clara',	'clara@clara.fr',	'$2y$13$6tALiDmX./4QI0lq5Qr/CODq3LZCHtetyzn.N9qyr8XKN1YHrYgWK',	'[]',	'2022-07-25',	NULL,	1,	'clara'),
(7,	4,	'Carole',	'carole@carole.fr',	'$2y$13$xdhc6t62zW7IMG.2bccXoO0sD4U6IGsxlKEe.4zBkmv.FdxQNScNa',	'[\"ROLE_ADMIN\"]',	'2022-07-25',	NULL,	1,	'carole'),
(8,	4,	'Christophe',	'christophe@jaipetelabdd.fr',	'$2y$13$DhULwu2uMLQH/2HL1Id8YuGRkgHyjfd/coxpxPa81mynlr4ka9s7m',	'[\"ROLE_USER\"]',	'2022-07-25',	'2022-07-25',	1,	'christophe'),
(9,	3,	'Julien',	'julien@allezvientonestbien.fr',	'$2y$13$t/QGbaL5dEa4HZX0xdQq1ukGM1ruvLHn/2WrwKdrgwS1REb0d9/lC',	'[\"ROLE_ADMIN\"]',	'2022-07-25',	NULL,	1,	'julien'),
(10,	3,	'Claire',	'claire@commedeleauderoche.fr',	'$2y$13$UbDuyraNYGEFrhqvK/DEk.BIf0bocG8oRgdiPHdaq.yO22Cndgod2',	'[]',	'2022-07-25',	NULL,	1,	'claire'),
(11,	3,	'Laurent',	'laurent@fandetrello.fr',	'$2y$13$7SvB3yVDbMAaxyJH41apUuLXKIS9F2X6PRoMNx2PIJ9YshPnF8av.',	'[]',	'2022-07-25',	NULL,	1,	'laurent'),
(12,	1,	'Camille',	'Camille@tantquecamarche.fr',	'$2y$13$RiH2kF2aapN4uCTmX7ovzOTesm7pnTYybAHOpDPsoWV/HakLCq8eu',	'[\"ROLE_ADMIN\"]',	'2022-07-25',	NULL,	1,	'camille'),
(13,	10,	'Julian Fernandez',	'Julian.fernandez@mail.com',	'$2y$13$YmzXS4DaAzqT6LBBtkYc.O7tuW3bjPXCA8iiFPQFzHWWG3HU0dMcW',	'[\"ROLE_USER\"]',	'2022-07-21',	'2022-07-26',	1,	'julian-fernandez'),
(14,	7,	'Camille el cador',	'camille.pepito@mail.com',	'$2y$13$ue2lWeg3CXRBLZFZP4SILelvIONKr1rPM3j46zGSjrPj/Q9E7KQji',	'[]',	'2022-07-26',	NULL,	1,	'camille-el-cador'),
(15,	3,	'Pepito chocolate',	'pepito@mail.com',	'$2y$13$tWD93xSnciiBUJ8OOLbG8.IguPheC.Yf4J4vGQW1AQdKBnUFubqn2',	'[]',	'2022-07-26',	NULL,	1,	'pepito-chocolate'),
(16,	4,	'Laurent el cador',	'laurent@mail.com',	'$2y$13$sk/yWe300DFraW1SOJBvJeDuOAU39LPYGqgGCcPjEOsWycf/oOTUS',	'[]',	'2022-07-26',	NULL,	1,	'laurent-el-cador'),
(17,	5,	'Vincent',	'vincent@mail.com',	'$2y$13$isBzWQy3Lg7svVit0/W3yuSajjJHgdOTghd4NSzOyrneqmL7prXLu',	'[\"ROLE_ADMIN\"]',	'2022-07-26',	NULL,	1,	'vincent'),
(18,	3,	'azerty',	'azerty@meeple.com',	'$2y$13$3mD3RzzobE/x2hE0fcE5SuqJfutP1Ebck6ZZi1ST3VjvxdtT0wTw6',	'[\"ROLE_USER\"]',	'2022-08-01',	NULL,	1,	'azerty'),
(19,	3,	'qsdf',	'qsdf@qsdf.com',	'$2y$13$.nOqN02I60NHWOyuWFQMr./Vb4Z.nwF33.DIVgGz/PSj/cn/erki2',	'[\"ROLE_USER\"]',	'2022-08-01',	NULL,	1,	'qsdf'),
(22,	3,	'test1',	'test1@test1.com',	'$2y$13$fvjlzhGkgQKEloUIKPB0qOuWtar27sIHojB29KyrIeeGDqStbl0DS',	'[\"ROLE_USER\"]',	'2022-08-01',	NULL,	1,	'test1'),
(23,	3,	'jeanjean',	'jean@coucou.jc',	'$2y$13$9RyAPqa6M3wgAsqx6VSZsumC.V1cWPLnU7eAGC16uekKM9OAMNUk.',	'[\"ROLE_USER\"]',	'2022-08-01',	NULL,	1,	'jeanjean'),
(25,	3,	'souris',	'souris@souris.com',	'$2y$13$DKWdRBBEr1zOks8OI/jxP.tjTDcDrbTK.W/usxZslnzt5v27fDejG',	'[\"ROLE_USER\"]',	'2022-08-01',	NULL,	1,	'souris'),
(28,	3,	'Itaque illum aliqua',	'goxevejy@mailinator.com',	'$2y$13$Ru7UKGxfaE6gDIiZyNhjXO4zXys6Vx3WLg6vrtoPi2BzBouKkvmLy',	'[\"ROLE_USER\"]',	'2022-08-01',	NULL,	1,	'itaque-illum-aliqua'),
(30,	3,	'ouaf',	'ouaf@ouaf.oufa',	'$2y$13$Ly2Idrjd.VE3fWfB4c38E.o6g40VZlwIGTgzZWa1084JJ0WVxDsCi',	'[\"ROLE_USER\"]',	'2022-08-01',	NULL,	1,	'ouaf'),
(31,	3,	'z',	'z@z.z',	'$2y$13$XAl9vlZuMOlVghiQ4K3VPedkN/4rgdj1IoejQTaLWJXPYA2wms/yW',	'[\"ROLE_USER\"]',	'2022-08-01',	NULL,	1,	'z'),
(32,	3,	'pantoufle',	'pantoufle@user.com',	'$2y$13$jaGqorRoLsSRlIPhLWhP5OHvqWm.9hR6iKhccY1bGwMQNxIJHxJuG',	'[\"ROLE_USER\"]',	'2022-08-01',	NULL,	1,	'pantoufle'),
(33,	3,	'lunette',	'lunette@opticien.com',	'$2y$13$5Eb1uoisCnK7F6Rl0elEW.0FHxfznElFmcyWgx/MhpHswBDNRyv5m',	'[\"ROLE_USER\"]',	'2022-08-01',	NULL,	1,	'lunette'),
(34,	3,	'Exercitation volupta',	'nybu@mailinator.com',	'$2y$13$P.lTC7eCdr7VNEDGGyBeZ.j5nBZDS7i.tPG9z/8a.sokP/L3ngnUu',	'[\"ROLE_USER\"]',	'2022-08-01',	NULL,	1,	'exercitation-volupta'),
(39,	2,	'Adrien Bichon',	'toto@bichon.com',	'$2y$13$3a2kRIN.D4anVaEe7cabt.HIrzeKTH6ma1ohKU./KMV61EkhDksJK',	'[\"ROLE_USER\"]',	'2022-08-01',	NULL,	1,	'adrien-bichon'),
(40,	7,	'Bretzel',	'cigogne@alsace.choucroute',	'$2y$13$EvZvD2mYoyzVSr1/gqJcE.tLi.6XxGV3GvoAN2Z7atnZnIDGtn3uS',	'[\"ROLE_USER\"]',	'2022-08-02',	NULL,	1,	'bretzel'),
(41,	1,	'pinceau',	'pinceau@chantier.com',	'$2y$13$SaC894oKOtDaci/2d52QTuYwlFF3oFay1BKPKqSXjSmPpD2iLzD8O',	'[\"ROLE_USER\"]',	'2022-08-03',	NULL,	1,	'pinceau'),
(42,	2,	'GG',	'GG@GG.GG',	'$2y$13$FbrR62sAHAf4h0ekhbBDMuEiPEhnFhPkZfbScrQIWQRS8WG/3c38a',	'[\"ROLE_USER\"]',	'2022-08-04',	NULL,	1,	'gg'),
(43,	1,	'Zlatan',	'zlatan@zlatan.com',	'$2y$13$4c13IkGIn7fosM4dqgOslujkt.iw/Mhxq4MDgnQHwpJKw/VCJZZ0.',	'[\"ROLE_USER\"]',	'2022-08-04',	NULL,	1,	'zlatan'),
(44,	10,	'Manuel',	'manuel@manuel.com',	'$2y$13$Bnn9umlsE24nuB1tWI.TpeesAX.gzCdBLevbOShWxNwQ4pDbmqQwG',	'[\"ROLE_USER\"]',	'2022-08-04',	NULL,	1,	'manuel'),
(45,	7,	'michel',	'michel@michel.com',	'$2y$13$bd/bODHWnYymMfcw5vNPZeMPvLPBMbmgCr.E0YTwh/1UgZlfPPlo6',	'[\"ROLE_USER\"]',	'2022-08-04',	NULL,	1,	'michel'),
(53,	6,	'druss',	'druss@druss',	'$2y$13$k.rmZKuTd.1XiKy8R9U0s.yb7/D63pqNnAijTh9fijgWKnkd9sHYe',	'[\"ROLE_USER\"]',	'2022-08-04',	NULL,	1,	'druss'),
(54,	4,	'paul',	'Paul@paul.paul',	'$2y$13$G.Bwqnh83I81rNyolljrCujinr/hv2YOZOsnFK94VHPgg.8XdHlyG',	'[\"ROLE_USER\"]',	'2022-08-04',	NULL,	1,	'paul'),
(55,	7,	'Aut fugiat magna lau',	'xikopeja@mailinator.com',	'$2y$13$cAMSYluSSt2yzbvoj7ngGeOUAqQlyhzpmKRDWPvfociw/57k2knTG',	'[\"ROLE_USER\"]',	'2022-08-04',	NULL,	1,	'aut-fugiat-magna-lau'),
(56,	8,	'GIllou',	'gilou@gmail.com',	'$2y$13$M0DAZUPz6xH811NgEna.XeC63oxWfxLIl.buVHAL.iHyvEJWESVO2',	'[\"ROLE_USER\"]',	'2022-08-04',	NULL,	1,	'gillou'),
(57,	5,	'mbappe',	'mbappe@mbappe',	'$2y$13$2PJk2/v8pffEerRmuom0ReLYQYLCpbmQ4dJ3akMtQo9KOqJGcQnf6',	'[\"ROLE_USER\"]',	'2022-08-04',	NULL,	1,	'mbappe'),
(58,	9,	'Ronaldo',	'ronaldo@ronaldo.com',	'$2y$13$ZD8cLY3PM7Jjyzv/kh8veeIr7Qy6MWjKJvNAF04ixABHjwUaQS5wa',	'[\"ROLE_USER\"]',	'2022-08-04',	NULL,	1,	'ronaldo'),
(59,	3,	'legolas',	'legolas@lotr.com',	'$2y$13$x8d2/INEV/HdTGWM9qi7Fe1v1Ii5U43WTt/8E4zLfbVATSxF7t76W',	'[\"ROLE_USER\"]',	'2022-08-04',	NULL,	1,	'legolas'),
(60,	4,	'Gimli',	'gimli@lotr.com',	'$2y$13$W03ZyrlOi8f6cqh9nOvYeOb1NoaHGjQMfHHaTgxfb8AKKh2whXf3y',	'[\"ROLE_USER\"]',	'2022-08-04',	NULL,	1,	'gimli'),
(61,	5,	'Autem qui libero ape',	'zilymu@mailinator.com',	'$2y$13$WwkC4ILPusZvVZA516Vmc.HdQHWS41GWoR522rHmoWIjYKwkSZCoK',	'[\"ROLE_USER\"]',	'2022-08-04',	NULL,	1,	'autem-qui-libero-ape'),
(64,	8,	'Jacquie',	'jacquie@il_es_ou_michel.com',	'$2y$13$cy0yZCTLLohzSaU.VDvdS.V2avTg/q/7qca4w0UPuZt6fR6XPKkoe',	'[\"ROLE_ADMIN\"]',	'2022-08-05',	'2022-08-05',	1,	'jacquie'),
(68,	7,	'CurieRed',	'curie@red.com',	'$2y$13$pwrNjGXgz5gd7FrRfXEuVeVPGhGubiwbp3f4f75jYxjlh6Gsdi2iS',	'[\"ROLE_USER\"]',	'2022-08-08',	NULL,	1,	'curiered');

DROP TABLE IF EXISTS `user_badge`;
CREATE TABLE `user_badge` (
  `user_id` int(11) NOT NULL,
  `badge_id` int(11) NOT NULL,
  PRIMARY KEY (`user_id`,`badge_id`),
  KEY `IDX_1C32B345A76ED395` (`user_id`),
  KEY `IDX_1C32B345F7A2C2FC` (`badge_id`),
  CONSTRAINT `FK_1C32B345A76ED395` FOREIGN KEY (`user_id`) REFERENCES `user` (`id`) ON DELETE CASCADE,
  CONSTRAINT `FK_1C32B345F7A2C2FC` FOREIGN KEY (`badge_id`) REFERENCES `badge` (`id`) ON DELETE CASCADE
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

INSERT INTO `user_badge` (`user_id`, `badge_id`) VALUES
(1,	2),
(1,	3),
(1,	4),
(2,	2),
(3,	3),
(4,	1),
(4,	4),
(5,	3),
(5,	5),
(6,	4),
(7,	1),
(7,	7),
(8,	4),
(8,	5),
(9,	2),
(9,	9),
(10,	1),
(10,	7),
(10,	9),
(11,	5),
(11,	6),
(11,	8),
(11,	9),
(12,	1),
(12,	3),
(12,	8),
(64,	3);

-- 2022-09-13 21:48:23