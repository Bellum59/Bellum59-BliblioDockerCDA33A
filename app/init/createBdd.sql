SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";

CREATE TABLE IF NOT EXISTS `article` (
    `id` INT(4) NOT NULL,
    `nom` varchar(255) NOT NULL,
    `description` varchar(255),
    `prix` int(4) NOT NULL,
    `idCategorie` int(4) NOT NULL,
    `imageId` INT(4)
);

ALTER TABLE `article`
ADD CONSTRAINT `PK_idArticle`
PRIMARY KEY(`id`);

CREATE TABLE IF NOT EXISTS `categorie` (
    `id` INT(4) NOT NULL,
    `nom` varchar(255) NOT NULL,
    `imageId` INT(4)
);

ALTER TABLE `categorie`
ADD CONSTRAINT `PK_idCategorie`
PRIMARY KEY(`id`);

ALTER TABLE `article`
ADD CONSTRAINT `FK_articleCategorie`
FOREIGN KEY(`idCategorie`) REFERENCES `categorie`(`id`);

CREATE TABLE IF NOT EXISTS `image` (
    `id` INT(4) NOT NULL,
    `chemin` varchar(255) NOT NULL
);

ALTER TABLE `image`
ADD CONSTRAINT `PK_idImage`
PRIMARY KEY(`id`);

ALTER TABLE `article`
ADD CONSTRAINT `FK_articlePhoto`
FOREIGN KEY(`imageId`) REFERENCES `image`(`id`);

ALTER TABLE `categorie`
ADD CONSTRAINT `FK_categoriePhoto`
FOREIGN KEY (`imageId`) REFERENCES `image`(`id`); 


ALTER TABLE article
MODIFY COLUMN prix FLOAT; 

-- Placeholder
CREATE TABLE  IF NOT EXISTS `membre` (
    `id` INT(4) PRIMARY KEY NOT NULL AUTO_INCREMENT,
    `nom` VARCHAR(255),
    `prenom` VARCHAR(255),
    `email` VARCHAR(255),
    `motDePasse` VARCHAR(255)
);

CREATE TABLE `facture` (
    `id` INT(4) PRIMARY KEY NOT NULL AUTO_INCREMENT,
    `date` DATETIME,
    `idProduit` INT (4) NOT NULL,
    `idMembre` INT (4) NOT NULL,
    `quantite` INT(4),
    `prix` FLOAT(4)
);

ALTER TABLE `facture`
ADD CONSTRAINT `FK_factureMembre`
FOREIGN KEY (`idProduit`) REFERENCES `article`(`id`);

CREATE TABLE `commentaire` (
    `id` INT(4) PRIMARY KEY NOT NULL AUTO_INCREMENT,
    `date` DATETIME,
    `idProduit` INT(4) NOT NULL,
    `idMembre` INT(4) NOT NULL,
    `contenue` VARCHAR(255)
);

ALTER TABLE `commentaire`
ADD CONSTRAINT `FK_commentaireProduit`
FOREIGN KEY (`idProduit`) REFERENCES `article`(`id`);

ALTER TABLE `commentaire`
ADD CONSTRAINT `FK_commentaireMembre`
FOREIGN KEY (`idMembre`) REFERENCES `membre`(`id`);

DROP TABLE IF EXISTS `failed_jobs`;
CREATE TABLE  `failed_jobs` (
  `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT,
  `uuid` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `connection` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `queue` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `payload` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `exception` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `failed_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  PRIMARY KEY (`id`),
  UNIQUE KEY `failed_jobs_uuid_unique` (`uuid`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Structure de la table `migrations`
--

DROP TABLE IF EXISTS `migrations`;
CREATE TABLE  `migrations` (
  `id` int UNSIGNED NOT NULL AUTO_INCREMENT,
  `migration` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `batch` int NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=5 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
--
-- Structure de la table `password_reset_tokens`
--

DROP TABLE IF EXISTS `password_reset_tokens`;
CREATE TABLE  `password_reset_tokens` (
  `email` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `token` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`email`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Structure de la table `personal_access_tokens`
--

DROP TABLE IF EXISTS `personal_access_tokens`;
CREATE TABLE  `personal_access_tokens` (
  `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT,
  `tokenable_type` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `tokenable_id` bigint UNSIGNED NOT NULL,
  `name` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `token` varchar(64) COLLATE utf8mb4_unicode_ci NOT NULL,
  `abilities` text COLLATE utf8mb4_unicode_ci,
  `last_used_at` timestamp NULL DEFAULT NULL,
  `expires_at` timestamp NULL DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `personal_access_tokens_token_unique` (`token`),
  KEY `personal_access_tokens_tokenable_type_tokenable_id_index` (`tokenable_type`,`tokenable_id`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Modification de la structure de la table `users`
--

ALTER TABLE `membre` RENAME `users`;

ALTER TABLE `users` CHANGE COLUMN `nom` `name` VARCHAR(255);
ALTER TABLE `users` CHANGE COLUMN `motDePasse` `password` VARCHAR(255);
ALTER TABLE `users` DROP COLUMN `prenom`;

ALTER TABLE `users` ADD COLUMN `email_verified_at` timestamp NULL DEFAULT NULL;
ALTER TABLE `users` ADD COLUMN `remember_token` VARCHAR(100) DEFAULT NULL;
ALTER TABLE `users` ADD COLUMN `created_at` timestamp NULL DEFAULT NULL;
ALTER TABLE `users` ADD COLUMN `updated_at` timestamp NULL DEFAULT NULL;

COMMIT;