-- Supprimer la DB si elle existe
DROP DATABASE IF EXISTS `i-jurain_arcadia`;

-- Création de la DB avec des données d'exemples (Seeders)
CREATE DATABASE `i-jurain_arcadia`;

-- Utilisation de la base de données
USE `i-jurain_arcadia`;

-- Création des tables
CREATE TABLE `zoo`
(
    `id`          INT AUTO_INCREMENT,
    `name`        VARCHAR(255) NOT NULL,
    `description` TEXT,
    `created_at`  DATETIME DEFAULT CURRENT_TIMESTAMP,
    `updated_at`  DATETIME DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
    PRIMARY KEY (id)
);

CREATE TABLE `users`
(
    `id`                INT PRIMARY KEY AUTO_INCREMENT,
    `zoo_id`            INT          NOT NULL,
    `name`              VARCHAR(255) NOT NULL,
    `email`             VARCHAR(255) NOT NULL UNIQUE,
    `email_verified_at` DATETIME     NULL,
    `password`          VARCHAR(255) NOT NULL,
    `role`              VARCHAR(255) NOT NULL,
    `created_at`        DATETIME DEFAULT CURRENT_TIMESTAMP,
    `updated_at`        DATETIME DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
    FOREIGN KEY (`zoo_id`) REFERENCES `zoo` (`id`)
);

CREATE TABLE `habitats`
(
    `id`          INT PRIMARY KEY AUTO_INCREMENT,
    `zoo_id`      INT          NOT NULL,
    `name`        VARCHAR(255) NOT NULL,
    `description` TEXT,
    `image`       VARCHAR(255),
    `created_at`  DATETIME DEFAULT CURRENT_TIMESTAMP,
    `updated_at`  DATETIME DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
    FOREIGN KEY (`zoo_id`) REFERENCES `zoo` (`id`)
);

CREATE TABLE `services`
(
    `id`          INT PRIMARY KEY AUTO_INCREMENT,
    `zoo_id`      INT          NOT NULL,
    `name`        VARCHAR(255) NOT NULL,
    `description` TEXT,
    `image`       VARCHAR(255),
    `created_at`  DATETIME DEFAULT CURRENT_TIMESTAMP,
    `updated_at`  DATETIME DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
    FOREIGN KEY (`zoo_id`) REFERENCES `zoo` (`id`)
);

CREATE TABLE `reviews`
(
    `id`         INT PRIMARY KEY AUTO_INCREMENT,
    `zoo_id`     INT  NOT NULL,
    `content`    TEXT NOT NULL,
    `status`     ENUM ('validated', 'rejected', 'pending') DEFAULT 'pending',
    `author`     VARCHAR(255),
    `rating`     INT CHECK (`rating` BETWEEN 1 AND 5),
    `created_at` DATETIME                               DEFAULT CURRENT_TIMESTAMP,
    `updated_at` DATETIME                               DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
    FOREIGN KEY (`zoo_id`) REFERENCES `zoo` (`id`)
);

CREATE TABLE `openings`
(
    `id`         INT PRIMARY KEY AUTO_INCREMENT,
    `zoo_id`     INT          NOT NULL,
    `day_open`   VARCHAR(255) NOT NULL,
    `hour_open`  TIME         NOT NULL,
    `hour_close` TIME         NOT NULL,
    `created_at` DATETIME DEFAULT CURRENT_TIMESTAMP,
    `updated_at` DATETIME DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
    FOREIGN KEY (`zoo_id`) REFERENCES `zoo` (`id`)
);

CREATE TABLE `animals`
(
    `id`          INT PRIMARY KEY AUTO_INCREMENT,
    `habitat_id`  INT          NOT NULL,
    `name`        VARCHAR(255) NOT NULL,
    `breed`       VARCHAR(255),
    `image`       VARCHAR(255),
    `description` TEXT,
    `created_at`  DATETIME DEFAULT CURRENT_TIMESTAMP,
    `updated_at`  DATETIME DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
    FOREIGN KEY (`habitat_id`) REFERENCES `habitats` (`id`)
);

CREATE TABLE `foods`
(
    `id`         INT PRIMARY KEY AUTO_INCREMENT,
    `name`       VARCHAR(255) NOT NULL,
    `created_at` DATETIME DEFAULT CURRENT_TIMESTAMP,
    `updated_at` DATETIME DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
);

CREATE TABLE `foods_consum`
(
    `id`         INT PRIMARY KEY AUTO_INCREMENT,
    `animal_id`  INT         NOT NULL,
    `food_id`    INT         NOT NULL,
    `quantity`   INT         NOT NULL,
    `unit`       VARCHAR(10) NOT NULL,
    `user_id`    INT         NOT NULL,
    `created_at` DATETIME DEFAULT CURRENT_TIMESTAMP,
    `updated_at` DATETIME DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
    FOREIGN KEY (`animal_id`) REFERENCES `animals` (`id`),
    FOREIGN KEY (`food_id`) REFERENCES `foods` (`id`),
    FOREIGN KEY (`user_id`) REFERENCES `users` (`id`)
);

CREATE TABLE `veterinarian_reports`
(
    `id`             INT PRIMARY KEY AUTO_INCREMENT,
    `animal_id`      INT NOT NULL,
    `animal_state`   VARCHAR(255),
    `food_consum_id` INT,
    `content`        TEXT,
    `user_id`        INT NOT NULL,
    `created_at`     DATETIME DEFAULT CURRENT_TIMESTAMP,
    `updated_at`     DATETIME DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
    FOREIGN KEY (`animal_id`) REFERENCES `animals` (`id`),
    FOREIGN KEY (`food_consum_id`) REFERENCES `foods_consum` (`id`),
    FOREIGN KEY (`user_id`) REFERENCES `users` (`id`)
);

-- Insertion des données
INSERT INTO zoo (id, name, description)
VALUES (1, 'Arcadia',
        'Bienvenue à Arcadia, un zoo unique en son genre situé tout près de la légendaire forêt de Brocéliande en Bretagne, en France. Fondé en 1960, Arcadia vous invite à un voyage fascinant au cœur de la faune japonaise. Découvrez une diversité exceptionnelle d\'animaux originaires du Japon dans un cadre enchanteur et préservé.');

INSERT INTO users (id, zoo_id, name, email, password, role)
VALUES (1, 1, 'José Admin', 'joseadmin@gmail.com', '123456789aze', 'admin'),
       (2, 1, 'Josette Veterinarian', 'josetteveterinarian@gmail.com', '123456789aze', 'veterinarian'),
       (3, 1, 'Joseph Employee', 'josephemployee@gmail.com', '123456789aze', 'employee');

INSERT INTO habitats (id, zoo_id, name, description, image)
VALUES (1, 1, 'Savane',
        'La savane est une vaste étendue de prairies parsemées d\'arbres clairsemés, caractérisée par un climat saisonnier avec des périodes de pluies et de sécheresses. Elle abrite une grande diversité d\'animaux, tels que les lions, éléphants et antilopes, adaptés à ce milieu ouvert.',
        'savane.jpg'),
       (2, 1, 'Jungle',
        'La jungle est une forêt dense et humide, dominée par une végétation luxuriante, avec un climat tropical chaud et des pluies abondantes. Elle abrite une biodiversité riche, incluant des espèces comme les singes, jaguars et oiseaux exotiques, vivant dans un environnement ombragé et touffu.',
        'jungle.jpg'),
       (3, 1, 'Marais',
        'Les marais sont des zones humides où l\'eau stagnante recouvre le sol, créant un écosystème riche en végétation aquatique comme les roseaux. Ils abritent une faune diversifiée, incluant des oiseaux, amphibiens, et reptiles, adaptés à cet environnement saturé d\'eau.',
        'marais.jpg');

INSERT INTO services (id, zoo_id, name, description, image)
VALUES (1, 1, 'Restauration',
        'Situé au cœur du zoo, offrant une pause gourmande idéale pour toute la famille. Avec un menu varié allant des sandwichs savoureux aux salades fraîches, il y en a pour tous les goûts. Les enfants adoreront les menus thématiques inspirés des animaux du parc, tandis que les adultes pourront se détendre sur la terrasse ombragée. Le Croc\'zoo est l\'endroit parfait pour recharger les batteries avant de poursuivre la découverte des merveilles du zoo.',
        'restaurant-exterior.jpg'),
       (2, 1, 'Visite guidée',
        'Découvrez les merveilles du zoo d\'Arcadia lors d\'une visite guidée enrichissante qui vous plonge au cœur du monde animal. Accompagné d\'un guide expert, explorez les habitats naturels recréés et apprenez des anecdotes fascinantes sur chaque espèce. Les enfants comme les adultes seront émerveillés par la diversité des animaux et les histoires captivantes qui les entourent. Cette aventure éducative et divertissante vous offre une expérience unique, enrichissant votre visite d\'une compréhension plus profonde de la faune et de la flore. Ne manquez pas cette occasion de voir de près des créatures rares et exotiques tout en profitant d\'un moment inoubliable en famille ou entre amis.',
        'zoo-visite-asie.jpg'),
       (3, 1, 'Visite en petit train',
        'Embarquez à bord du petit train touristique du zoo d\'Arcadia pour une visite inoubliable à travers les différents mondes animaliers. Ce voyage confortable vous permet de découvrir les habitats des animaux tout en profitant de commentaires fascinants sur les espèces et leur mode de vie. Idéal pour les familles, le petit train offre une vue panoramique sur les zones les plus emblématiques du parc. Les enfants seront enchantés par cette balade ludique, tandis que les adultes apprécieront le rythme détendu de la visite. Une manière amusante et éducative de parcourir le zoo sans effort !',
        'train-touristique.jpg');

INSERT INTO animals (id, habitat_id, name, breed, image, description)
VALUES (1, 2, 'Loulou et Louloute', 'Macaque', 'macaques.jpg',
        'Petits singes, macaques du Japon dans son onsen dans l\'habitat de la jungle.'),
       (2, 3, 'Tutu', 'Tortue', 'turtle-jp.jpg', 'Tortue du Japon, dans l\'habitat des marais'),
       (3, 1, 'Tori', 'Renard', 'renard.jpg', 'Petit renard du Japon dans l\'habitat de la savane'),
       (4, 2, 'Baloo', 'Ours noir', 'ours-noir-jp.jpg',
        'Ours noir à collier, est un ours japonais dans l\'habitat de la jungle.'),
       (5, 1, 'Panpan', 'Lapin', 'rabbit-jp.jpg', 'Lapin japonais, aux jolies couleurs dans l\'habitat de la savane'),
       (6, 1, 'Bambi', 'Biche', 'biche.jpg', 'Biche japonaise, dans l\'habitat de la savane'),
       (7, 3, 'Kaa', 'Serpent', 'habu-d-okinawa.jpg',
        'Habu d\'Okinawa, ce serpent du Japon dans l\'habitat des marais.'),
       (8, 2, 'Titan', 'Shiba Inu', 'shiba-inu.webp', 'Magnifique Shiba Inu du Japon dans l\'habitat de la jungle.');

INSERT INTO foods (id, name)
VALUES (1, 'Fruits'),
       (2, 'Salade'),
       (3, 'Viande'),
       (4, 'Poisson'),
       (5, 'Écorces'),
       (6, 'Souris'),
       (7, 'Croquettes');

INSERT INTO foods_consum (id, food_id, animal_id, quantity, unit, user_id)
VALUES (1, 1, 1, 750, 'g', 3),
       (2, 2, 2, 600, 'g', 3),
       (3, 3, 3, 370, 'g', 3),
       (4, 4, 4, 1000, 'g', 3),
       (5, 2, 5, 650, 'g', 3),
       (6, 5, 6, 300, 'g', 3),
       (7, 6, 7, 400, 'g', 3),
       (8, 7, 8, 800, 'g', 3);

INSERT INTO veterinarian_reports (id, animal_id, animal_state, food_consum_id, content, user_id)
VALUES (1, 1, 'En bonne santé', 1, 'Le couple de macaques ont été examinés ce matin et présentent un bon état général.',
        2),
       (2, 2, 'À surveiller', 2,
        'Tutu la tortue montre une amélioration significative après son traitement contre l\'infection urinaire.', 2),
       (3, 3, 'À surveiller', 3, 'Tori a une légère inflammation des gencives, mais son état général reste stable.', 2),
       (4, 4, 'En bonne santé', 4, 'Baloo est en bonne santé, avec une carapace solide et une alimentation équilibrée.',
        2),
       (5, 5, 'Signes de vieillesse', 5,
        'Panpan montre des signes de vieillesse, notamment un pelage légèrement terne et une activité réduite, mais reste en bonne santé générale.',
        2),
       (6, 6, 'En bonne santé', 6, 'Bambi est en pleine forme, avec un poids stable et une activité normale.', 2),
       (7, 7, 'En bonne santé', 7,
        'Kaa semble en bonne santé générale, bien hydraté et sans signe de mue problématique.', 2),
       (8, 8, 'En bonne santé', 8,
        'Titan présente un excellent état de santé général, avec une musculature bien développée et des articulations souples.',
        2);

INSERT INTO openings (id, zoo_id, day_open, hour_open, hour_close)
VALUES (1, 1, 'Lundi', '14:00', '18:00'),
       (2, 1, 'Mardi', '11:00', '17:00'),
       (3, 1, 'Mercredi', '10:00', '19:00'),
       (4, 1, 'Jeudi', '14:00', '18:00'),
       (5, 1, 'Vendredi', '10:00', '18:00'),
       (6, 1, 'Samedi', '11:00', '19:00'),
       (7, 1, 'Dimanche', '10:00', '17:00');

INSERT INTO reviews (id, zoo_id, content, status, author, rating)
VALUES (1, 1,
        'Le zoo Arcadia est un véritable bijou caché en Bretagne. La proximité de la forêt de Brocéliande ajoute un charme magique à l\'endroit. Les animaux sont bien soignés, et le personnel est très accueillant. J\'ai particulièrement apprécié l\'enclos des loups, c\'était fascinant de les observer dans un environnement aussi naturel. Un lieu parfait pour une sortie en famille.',
        'pending', 'Alfred Lecoq', 5),
       (2, 1,
        'J\'ai adoré ma visite au zoo Arcadia ! Le parc est bien aménagé et spacieux, ce qui permet aux animaux de vivre dans des habitats qui ressemblent à leur milieu naturel. Les informations fournies sur chaque espèce étaient complètes, et j\'ai appris beaucoup de choses. Petit plus : les sentiers bordés d\'arbres rappellent la forêt de Brocéliande toute proche, c\'est vraiment dépaysant !',
        'pending', 'Brume Sauvage', 4),
       (3, 1,
        'Un peu déçu par ma visite au zoo Arcadia. Les animaux semblaient parfois un peu apathiques, et certains enclos manquaient d\'entretien. Par contre, j\'ai beaucoup aimé la proximité avec la nature environnante, surtout avec la légendaire forêt de Brocéliande. Peut-être que le zoo pourrait bénéficier de quelques rénovations et améliorations.',
        'rejected', 'Toto Zero', 3),
       (4, 1,
        'Un endroit incroyable pour les amoureux de la nature et des animaux ! Le zoo Arcadia met l\'accent sur la conservation et le bien-être animal, ce qui est vraiment appréciable. Les activités pédagogiques pour les enfants sont top, et la proximité avec Brocéliande apporte une touche mystique à la visite. Je recommande à 100 % pour une journée de détente et de découverte.',
        'validated', 'Jane Doe', 4),
       (5, 1,
        'Le zoo est charmant et assez bien entretenu, mais ce qui m\'a le plus marqué, c\'est l\'atmosphère magique des environs. La forêt de Brocéliande toute proche rend la visite encore plus spéciale, presque féerique. Le zoo propose aussi des animations autour de la légende arthurienne, ce qui a beaucoup plu à mes enfants. Une belle expérience à renouveler !',
        'validated', 'Jade Choupi', 5);
