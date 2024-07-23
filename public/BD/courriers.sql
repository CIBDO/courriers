-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Hôte : 127.0.0.1
-- Généré le : lun. 22 juil. 2024 à 17:51
-- Version du serveur : 10.4.28-MariaDB
-- Version de PHP : 8.2.4

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de données : `courriers`
--

-- --------------------------------------------------------

--
-- Structure de la table `bordereau_envois`
--

CREATE TABLE `bordereau_envois` (
  `id_bordereau` bigint(20) UNSIGNED NOT NULL,
  `reference_bordereau` varchar(255) NOT NULL,
  `date_bordereau` date NOT NULL,
  `priorite` enum('Simple','Urgente','Autre') NOT NULL,
  `confidentialite` enum('Oui','Non') NOT NULL,
  `id_courrier` bigint(20) UNSIGNED NOT NULL,
  `designation` varchar(255) NOT NULL,
  `destinateur` varchar(255) NOT NULL,
  `id_disposition` bigint(20) UNSIGNED NOT NULL,
  `id_signataire` bigint(20) UNSIGNED NOT NULL,
  `nbre_piece` int(11) NOT NULL,
  `statut` enum('Envoyé','Rejeté') NOT NULL,
  `charger_courrier` varchar(255) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Structure de la table `courriers`
--

CREATE TABLE `courriers` (
  `id_courrier` bigint(20) UNSIGNED NOT NULL,
  `type_courrier` varchar(255) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Déchargement des données de la table `courriers`
--

INSERT INTO `courriers` (`id_courrier`, `type_courrier`, `created_at`, `updated_at`) VALUES
(1, 'Lettre Circulaire', '2024-03-06 15:46:03', '2024-03-06 15:46:03');

-- --------------------------------------------------------

--
-- Structure de la table `courrier_internes`
--

CREATE TABLE `courrier_internes` (
  `id_courrierinterne` bigint(20) UNSIGNED NOT NULL,
  `reference` varchar(255) NOT NULL,
  `date_creation` date NOT NULL,
  `objet` text NOT NULL,
  `id_expeditaire` bigint(20) UNSIGNED NOT NULL,
  `id_courrier` bigint(20) UNSIGNED NOT NULL,
  `id_destinataire` bigint(20) UNSIGNED NOT NULL,
  `id_personnel` bigint(20) UNSIGNED NOT NULL,
  `id_disposition` bigint(20) UNSIGNED NOT NULL,
  `nbre_piece` int(11) NOT NULL,
  `statut` enum('Envoyé','Rejeté','Traité') NOT NULL,
  `charger_courrier` varchar(255) NOT NULL,
  `observation` text DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Structure de la table `destinataires`
--

CREATE TABLE `destinataires` (
  `id_destinataire` bigint(20) UNSIGNED NOT NULL,
  `nom_destinataire` varchar(255) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Structure de la table `dispositions`
--

CREATE TABLE `dispositions` (
  `id_disposition` bigint(20) UNSIGNED NOT NULL,
  `nom_disposition` varchar(255) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Déchargement des données de la table `dispositions`
--

INSERT INTO `dispositions` (`id_disposition`, `nom_disposition`, `created_at`, `updated_at`) VALUES
(1, 'Prendre des dispositions', '2024-03-06 15:47:16', '2024-03-06 15:47:16'),
(2, 'Pour Attribution', '2024-05-01 16:34:33', '2024-05-01 16:34:33');

-- --------------------------------------------------------

--
-- Structure de la table `expeditaires`
--

CREATE TABLE `expeditaires` (
  `id_expeditaire` bigint(20) UNSIGNED NOT NULL,
  `nom_expeditaire` varchar(255) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Déchargement des données de la table `expeditaires`
--

INSERT INTO `expeditaires` (`id_expeditaire`, `nom_expeditaire`, `created_at`, `updated_at`) VALUES
(1, 'Ministère de l\'Economie et des Finances', '2024-03-06 15:53:12', '2024-03-06 15:53:12');

-- --------------------------------------------------------

--
-- Structure de la table `failed_jobs`
--

CREATE TABLE `failed_jobs` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `uuid` varchar(255) NOT NULL,
  `connection` text NOT NULL,
  `queue` text NOT NULL,
  `payload` longtext NOT NULL,
  `exception` longtext NOT NULL,
  `failed_at` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Structure de la table `imputations`
--

CREATE TABLE `imputations` (
  `id_imputation` bigint(20) UNSIGNED NOT NULL,
  `id_courrier_reception` bigint(20) UNSIGNED NOT NULL,
  `date_imputation` date NOT NULL,
  `id_service` bigint(20) UNSIGNED NOT NULL,
  `id_personnel` bigint(20) UNSIGNED NOT NULL,
  `id_disposition` bigint(20) UNSIGNED NOT NULL,
  `observation` text DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_general_ci;

--
-- Déchargement des données de la table `imputations`
--

INSERT INTO `imputations` (`id_imputation`, `id_courrier_reception`, `date_imputation`, `id_service`, `id_personnel`, `id_disposition`, `observation`, `created_at`, `updated_at`) VALUES
(7, 14, '2024-07-22', 2, 1, 2, 'ML', '2024-07-22 12:35:34', '2024-07-22 12:35:34');

-- --------------------------------------------------------

--
-- Structure de la table `imputation_historys`
--

CREATE TABLE `imputation_historys` (
  `id_imputation_history` bigint(20) UNSIGNED NOT NULL,
  `id_courrier_reception` bigint(20) UNSIGNED NOT NULL,
  `date_imputation` date NOT NULL,
  `origine` varchar(255) NOT NULL,
  `objet` text NOT NULL,
  `id_courrier` bigint(20) UNSIGNED NOT NULL,
  `id_service` bigint(20) UNSIGNED NOT NULL,
  `id_personnel` bigint(20) UNSIGNED NOT NULL,
  `id_disposition` bigint(20) UNSIGNED NOT NULL,
  `observation` text DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_general_ci;

-- --------------------------------------------------------

--
-- Structure de la table `migrations`
--

CREATE TABLE `migrations` (
  `id` int(10) UNSIGNED NOT NULL,
  `migration` varchar(255) NOT NULL,
  `batch` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Déchargement des données de la table `migrations`
--

INSERT INTO `migrations` (`id`, `migration`, `batch`) VALUES
(29, '2014_10_12_000000_create_users_table', 1),
(30, '2014_10_12_100000_create_password_reset_tokens_table', 1),
(31, '2019_08_19_000000_create_failed_jobs_table', 1),
(32, '2019_12_14_000001_create_personal_access_tokens_table', 1),
(33, '2024_02_19_223625_create_services_table', 1),
(34, '2024_02_19_223632_create_profils_table', 1),
(35, '2024_02_19_223639_create_personnels_table', 1),
(36, '2024_02_19_223653_create_signataires_table', 1),
(37, '2024_02_19_223701_create_dispositions_table', 1),
(38, '2024_02_19_223710_create_courriers_table', 1),
(39, '2024_02_19_223718_create_expeditaires_table', 1),
(40, '2024_02_19_223724_create_destinataires_table', 1),
(41, '2024_02_19_223730_create_reception_courriers_table', 1),
(42, '2024_02_19_223737_create_imputations_table', 1),
(43, '2024_02_19_223744_create_bordereau_envois_table', 1),
(44, '2024_02_24_185228_create_permission_tables', 1),
(45, '2024_03_05_080532_create_courrier_internes_table', 1),
(46, '2024_03_15_142514_create_attachments_table', 2);

-- --------------------------------------------------------

--
-- Structure de la table `model_has_permissions`
--

CREATE TABLE `model_has_permissions` (
  `permission_id` bigint(20) UNSIGNED NOT NULL,
  `model_type` varchar(255) NOT NULL,
  `model_id` bigint(20) UNSIGNED NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Structure de la table `model_has_roles`
--

CREATE TABLE `model_has_roles` (
  `role_id` bigint(20) UNSIGNED NOT NULL,
  `model_type` varchar(255) NOT NULL,
  `model_id` bigint(20) UNSIGNED NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Structure de la table `password_reset_tokens`
--

CREATE TABLE `password_reset_tokens` (
  `email` varchar(255) NOT NULL,
  `token` varchar(255) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Structure de la table `permissions`
--

CREATE TABLE `permissions` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) NOT NULL,
  `guard_name` varchar(255) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Structure de la table `personal_access_tokens`
--

CREATE TABLE `personal_access_tokens` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `tokenable_type` varchar(255) NOT NULL,
  `tokenable_id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) NOT NULL,
  `token` varchar(64) NOT NULL,
  `abilities` text DEFAULT NULL,
  `last_used_at` timestamp NULL DEFAULT NULL,
  `expires_at` timestamp NULL DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Structure de la table `personnels`
--

CREATE TABLE `personnels` (
  `id_personnel` bigint(20) UNSIGNED NOT NULL,
  `nom_personnel` varchar(255) NOT NULL,
  `prenom_personnel` varchar(255) NOT NULL,
  `Matricule` varchar(255) NOT NULL,
  `grade` varchar(255) NOT NULL,
  `corps` varchar(255) NOT NULL,
  `id_service` bigint(20) UNSIGNED NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Déchargement des données de la table `personnels`
--

INSERT INTO `personnels` (`id_personnel`, `nom_personnel`, `prenom_personnel`, `Matricule`, `grade`, `corps`, `id_service`, `created_at`, `updated_at`) VALUES
(1, 'KEÏTA', 'Djibril', '0156261X', 'Ingénieur', 'Informatique', 1, '2024-03-06 13:13:49', '2024-03-06 13:13:49');

-- --------------------------------------------------------

--
-- Structure de la table `profils`
--

CREATE TABLE `profils` (
  `id_profil` bigint(20) UNSIGNED NOT NULL,
  `nom_profil` varchar(255) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Structure de la table `reception_courriers`
--

CREATE TABLE `reception_courriers` (
  `id_courrier_reception` bigint(20) UNSIGNED NOT NULL,
  `reference` varchar(255) NOT NULL,
  `bordereau` varchar(250) CHARACTER SET utf8 COLLATE utf8_general_ci NOT NULL,
  `priorite` enum('Simple','Urgente','Autre') NOT NULL,
  `confidentialite` enum('Oui','Non') NOT NULL,
  `date_courrier` date NOT NULL,
  `date_arrivee` date NOT NULL,
  `expeditaire` varchar(255) NOT NULL,
  `id_courrier` bigint(20) UNSIGNED NOT NULL,
  `id_service` bigint(20) UNSIGNED NOT NULL,
  `id_personnel` bigint(20) UNSIGNED NOT NULL,
  `objet_courrier` text NOT NULL,
  `nbre_piece` int(11) NOT NULL,
  `charger_courrier` varchar(255) DEFAULT NULL,
  `statut` enum('Traité','Reçu','en cours de traitement','Rejeté') NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Déchargement des données de la table `reception_courriers`
--

INSERT INTO `reception_courriers` (`id_courrier_reception`, `reference`, `bordereau`, `priorite`, `confidentialite`, `date_courrier`, `date_arrivee`, `expeditaire`, `id_courrier`, `id_service`, `id_personnel`, `objet_courrier`, `nbre_piece`, `charger_courrier`, `statut`, `created_at`, `updated_at`) VALUES
(14, '2024/706', '02/CRF', 'Simple', 'Non', '2024-05-29', '2024-07-22', 'Mairie de la Commune Rurale de Finkolo', 1, 2, 1, 'Copie de la décision portant modification du Budget Primitif 2024', 1, NULL, 'Reçu', '2024-07-22 12:32:45', '2024-07-22 12:32:45');

-- --------------------------------------------------------

--
-- Structure de la table `roles`
--

CREATE TABLE `roles` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) NOT NULL,
  `guard_name` varchar(255) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Structure de la table `role_has_permissions`
--

CREATE TABLE `role_has_permissions` (
  `permission_id` bigint(20) UNSIGNED NOT NULL,
  `role_id` bigint(20) UNSIGNED NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Structure de la table `services`
--

CREATE TABLE `services` (
  `id_service` bigint(20) UNSIGNED NOT NULL,
  `nom_service` varchar(255) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Déchargement des données de la table `services`
--

INSERT INTO `services` (`id_service`, `nom_service`, `created_at`, `updated_at`) VALUES
(1, 'Direction des Finances et du Matériel', '2024-03-06 13:10:49', '2024-03-06 13:10:49'),
(2, 'Trésorier Payeur de Sikasso', '2024-03-07 09:43:31', '2024-03-07 09:43:31');

-- --------------------------------------------------------

--
-- Structure de la table `signataires`
--

CREATE TABLE `signataires` (
  `id_signataire` bigint(20) UNSIGNED NOT NULL,
  `nom` varchar(255) NOT NULL,
  `grade` varchar(255) NOT NULL,
  `fonction` varchar(255) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Déchargement des données de la table `signataires`
--

INSERT INTO `signataires` (`id_signataire`, `nom`, `grade`, `fonction`, `created_at`, `updated_at`) VALUES
(1, 'Moussa KOUYATE', 'Inspecteur de Trésor', 'Le Trésorier Payeur', '2024-03-06 15:48:53', '2024-05-03 14:56:53'),
(2, 'Djibril KEÏTA', 'Ingénieur Information', 'Sous Directeur S.I', '2024-05-03 14:57:56', '2024-05-03 14:57:56');

-- --------------------------------------------------------

--
-- Structure de la table `users`
--

CREATE TABLE `users` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `email_verified_at` timestamp NULL DEFAULT NULL,
  `password` varchar(255) NOT NULL,
  `remember_token` varchar(100) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Déchargement des données de la table `users`
--

INSERT INTO `users` (`id`, `name`, `email`, `email_verified_at`, `password`, `remember_token`, `created_at`, `updated_at`) VALUES
(1, 'Djibril Dramane KEÏTA', 'bdokeita100@gmail.com', NULL, '$2y$12$ML9XhTbLUubP2/N0jUNguuGH/XGg7VXZIlx4.ih/usXRm/v.3NNkm', NULL, '2024-03-05 14:04:38', '2024-05-15 17:06:30');

--
-- Index pour les tables déchargées
--

--
-- Index pour la table `bordereau_envois`
--
ALTER TABLE `bordereau_envois`
  ADD PRIMARY KEY (`id_bordereau`),
  ADD KEY `bordereau_envois_id_courrier_foreign` (`id_courrier`),
  ADD KEY `bordereau_envois_id_disposition_foreign` (`id_disposition`),
  ADD KEY `bordereau_envois_id_signataire_foreign` (`id_signataire`);

--
-- Index pour la table `courriers`
--
ALTER TABLE `courriers`
  ADD PRIMARY KEY (`id_courrier`);

--
-- Index pour la table `courrier_internes`
--
ALTER TABLE `courrier_internes`
  ADD PRIMARY KEY (`id_courrierinterne`),
  ADD KEY `courrier_internes_id_expeditaire_foreign` (`id_expeditaire`),
  ADD KEY `courrier_internes_id_courrier_foreign` (`id_courrier`),
  ADD KEY `courrier_internes_id_destinataire_foreign` (`id_destinataire`),
  ADD KEY `courrier_internes_id_personnel_foreign` (`id_personnel`),
  ADD KEY `courrier_internes_id_disposition_foreign` (`id_disposition`);

--
-- Index pour la table `destinataires`
--
ALTER TABLE `destinataires`
  ADD PRIMARY KEY (`id_destinataire`);

--
-- Index pour la table `dispositions`
--
ALTER TABLE `dispositions`
  ADD PRIMARY KEY (`id_disposition`);

--
-- Index pour la table `expeditaires`
--
ALTER TABLE `expeditaires`
  ADD PRIMARY KEY (`id_expeditaire`);

--
-- Index pour la table `failed_jobs`
--
ALTER TABLE `failed_jobs`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `failed_jobs_uuid_unique` (`uuid`);

--
-- Index pour la table `imputations`
--
ALTER TABLE `imputations`
  ADD PRIMARY KEY (`id_imputation`),
  ADD KEY `fk_imputations_courrier_reception` (`id_courrier_reception`),
  ADD KEY `fk_imputations_service` (`id_service`),
  ADD KEY `fk_imputations_personnel` (`id_personnel`),
  ADD KEY `fk_imputations_disposition` (`id_disposition`);

--
-- Index pour la table `imputation_historys`
--
ALTER TABLE `imputation_historys`
  ADD PRIMARY KEY (`id_imputation_history`),
  ADD KEY `fk_imputation_historys_courrier_reception` (`id_courrier_reception`),
  ADD KEY `fk_imputation_historys_courrier` (`id_courrier`),
  ADD KEY `fk_imputation_historys_service` (`id_service`),
  ADD KEY `fk_imputation_historys_personnel` (`id_personnel`),
  ADD KEY `fk_imputation_historys_disposition` (`id_disposition`);

--
-- Index pour la table `migrations`
--
ALTER TABLE `migrations`
  ADD PRIMARY KEY (`id`);

--
-- Index pour la table `model_has_permissions`
--
ALTER TABLE `model_has_permissions`
  ADD PRIMARY KEY (`permission_id`,`model_id`,`model_type`),
  ADD KEY `model_has_permissions_model_id_model_type_index` (`model_id`,`model_type`);

--
-- Index pour la table `model_has_roles`
--
ALTER TABLE `model_has_roles`
  ADD PRIMARY KEY (`role_id`,`model_id`,`model_type`),
  ADD KEY `model_has_roles_model_id_model_type_index` (`model_id`,`model_type`);

--
-- Index pour la table `password_reset_tokens`
--
ALTER TABLE `password_reset_tokens`
  ADD PRIMARY KEY (`email`);

--
-- Index pour la table `permissions`
--
ALTER TABLE `permissions`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `permissions_name_guard_name_unique` (`name`,`guard_name`);

--
-- Index pour la table `personal_access_tokens`
--
ALTER TABLE `personal_access_tokens`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `personal_access_tokens_token_unique` (`token`),
  ADD KEY `personal_access_tokens_tokenable_type_tokenable_id_index` (`tokenable_type`,`tokenable_id`);

--
-- Index pour la table `personnels`
--
ALTER TABLE `personnels`
  ADD PRIMARY KEY (`id_personnel`),
  ADD KEY `personnels_id_service_foreign` (`id_service`);

--
-- Index pour la table `profils`
--
ALTER TABLE `profils`
  ADD PRIMARY KEY (`id_profil`);

--
-- Index pour la table `reception_courriers`
--
ALTER TABLE `reception_courriers`
  ADD PRIMARY KEY (`id_courrier_reception`),
  ADD KEY `reception_courriers_id_courrier_foreign` (`id_courrier`),
  ADD KEY `reception_courriers_id_service_foreign` (`id_service`),
  ADD KEY `reception_courriers_id_personnel_foreign` (`id_personnel`),
  ADD KEY `reference` (`reference`);

--
-- Index pour la table `roles`
--
ALTER TABLE `roles`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `roles_name_guard_name_unique` (`name`,`guard_name`);

--
-- Index pour la table `role_has_permissions`
--
ALTER TABLE `role_has_permissions`
  ADD PRIMARY KEY (`permission_id`,`role_id`),
  ADD KEY `role_has_permissions_role_id_foreign` (`role_id`);

--
-- Index pour la table `services`
--
ALTER TABLE `services`
  ADD PRIMARY KEY (`id_service`);

--
-- Index pour la table `signataires`
--
ALTER TABLE `signataires`
  ADD PRIMARY KEY (`id_signataire`);

--
-- Index pour la table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `users_email_unique` (`email`);

--
-- AUTO_INCREMENT pour les tables déchargées
--

--
-- AUTO_INCREMENT pour la table `bordereau_envois`
--
ALTER TABLE `bordereau_envois`
  MODIFY `id_bordereau` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT pour la table `courriers`
--
ALTER TABLE `courriers`
  MODIFY `id_courrier` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT pour la table `courrier_internes`
--
ALTER TABLE `courrier_internes`
  MODIFY `id_courrierinterne` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT pour la table `destinataires`
--
ALTER TABLE `destinataires`
  MODIFY `id_destinataire` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT pour la table `dispositions`
--
ALTER TABLE `dispositions`
  MODIFY `id_disposition` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT pour la table `expeditaires`
--
ALTER TABLE `expeditaires`
  MODIFY `id_expeditaire` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT pour la table `failed_jobs`
--
ALTER TABLE `failed_jobs`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT pour la table `imputations`
--
ALTER TABLE `imputations`
  MODIFY `id_imputation` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT pour la table `imputation_historys`
--
ALTER TABLE `imputation_historys`
  MODIFY `id_imputation_history` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT pour la table `migrations`
--
ALTER TABLE `migrations`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=47;

--
-- AUTO_INCREMENT pour la table `permissions`
--
ALTER TABLE `permissions`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT pour la table `personal_access_tokens`
--
ALTER TABLE `personal_access_tokens`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT pour la table `personnels`
--
ALTER TABLE `personnels`
  MODIFY `id_personnel` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT pour la table `profils`
--
ALTER TABLE `profils`
  MODIFY `id_profil` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT pour la table `reception_courriers`
--
ALTER TABLE `reception_courriers`
  MODIFY `id_courrier_reception` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=15;

--
-- AUTO_INCREMENT pour la table `roles`
--
ALTER TABLE `roles`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT pour la table `services`
--
ALTER TABLE `services`
  MODIFY `id_service` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT pour la table `signataires`
--
ALTER TABLE `signataires`
  MODIFY `id_signataire` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT pour la table `users`
--
ALTER TABLE `users`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- Contraintes pour les tables déchargées
--

--
-- Contraintes pour la table `bordereau_envois`
--
ALTER TABLE `bordereau_envois`
  ADD CONSTRAINT `bordereau_envois_id_courrier_foreign` FOREIGN KEY (`id_courrier`) REFERENCES `courriers` (`id_courrier`),
  ADD CONSTRAINT `bordereau_envois_id_disposition_foreign` FOREIGN KEY (`id_disposition`) REFERENCES `dispositions` (`id_disposition`),
  ADD CONSTRAINT `bordereau_envois_id_signataire_foreign` FOREIGN KEY (`id_signataire`) REFERENCES `signataires` (`id_signataire`);

--
-- Contraintes pour la table `courrier_internes`
--
ALTER TABLE `courrier_internes`
  ADD CONSTRAINT `courrier_internes_id_courrier_foreign` FOREIGN KEY (`id_courrier`) REFERENCES `courriers` (`id_courrier`),
  ADD CONSTRAINT `courrier_internes_id_destinataire_foreign` FOREIGN KEY (`id_destinataire`) REFERENCES `destinataires` (`id_destinataire`),
  ADD CONSTRAINT `courrier_internes_id_disposition_foreign` FOREIGN KEY (`id_disposition`) REFERENCES `dispositions` (`id_disposition`),
  ADD CONSTRAINT `courrier_internes_id_expeditaire_foreign` FOREIGN KEY (`id_expeditaire`) REFERENCES `expeditaires` (`id_expeditaire`),
  ADD CONSTRAINT `courrier_internes_id_personnel_foreign` FOREIGN KEY (`id_personnel`) REFERENCES `personnels` (`id_personnel`);

--
-- Contraintes pour la table `imputations`
--
ALTER TABLE `imputations`
  ADD CONSTRAINT `fk_imputations_courrier_reception` FOREIGN KEY (`id_courrier_reception`) REFERENCES `reception_courriers` (`id_courrier_reception`),
  ADD CONSTRAINT `fk_imputations_disposition` FOREIGN KEY (`id_disposition`) REFERENCES `dispositions` (`id_disposition`),
  ADD CONSTRAINT `fk_imputations_personnel` FOREIGN KEY (`id_personnel`) REFERENCES `personnels` (`id_personnel`),
  ADD CONSTRAINT `fk_imputations_service` FOREIGN KEY (`id_service`) REFERENCES `services` (`id_service`);

--
-- Contraintes pour la table `imputation_historys`
--
ALTER TABLE `imputation_historys`
  ADD CONSTRAINT `fk_imputation_historys_courrier` FOREIGN KEY (`id_courrier`) REFERENCES `courriers` (`id_courrier`),
  ADD CONSTRAINT `fk_imputation_historys_courrier_reception` FOREIGN KEY (`id_courrier_reception`) REFERENCES `reception_courriers` (`id_courrier_reception`),
  ADD CONSTRAINT `fk_imputation_historys_disposition` FOREIGN KEY (`id_disposition`) REFERENCES `dispositions` (`id_disposition`),
  ADD CONSTRAINT `fk_imputation_historys_personnel` FOREIGN KEY (`id_personnel`) REFERENCES `personnels` (`id_personnel`),
  ADD CONSTRAINT `fk_imputation_historys_service` FOREIGN KEY (`id_service`) REFERENCES `services` (`id_service`);

--
-- Contraintes pour la table `model_has_permissions`
--
ALTER TABLE `model_has_permissions`
  ADD CONSTRAINT `model_has_permissions_permission_id_foreign` FOREIGN KEY (`permission_id`) REFERENCES `permissions` (`id`) ON DELETE CASCADE;

--
-- Contraintes pour la table `model_has_roles`
--
ALTER TABLE `model_has_roles`
  ADD CONSTRAINT `model_has_roles_role_id_foreign` FOREIGN KEY (`role_id`) REFERENCES `roles` (`id`) ON DELETE CASCADE;

--
-- Contraintes pour la table `personnels`
--
ALTER TABLE `personnels`
  ADD CONSTRAINT `personnels_id_service_foreign` FOREIGN KEY (`id_service`) REFERENCES `services` (`id_service`);

--
-- Contraintes pour la table `reception_courriers`
--
ALTER TABLE `reception_courriers`
  ADD CONSTRAINT `reception_courriers_id_courrier_foreign` FOREIGN KEY (`id_courrier`) REFERENCES `courriers` (`id_courrier`),
  ADD CONSTRAINT `reception_courriers_id_personnel_foreign` FOREIGN KEY (`id_personnel`) REFERENCES `personnels` (`id_personnel`),
  ADD CONSTRAINT `reception_courriers_id_service_foreign` FOREIGN KEY (`id_service`) REFERENCES `services` (`id_service`);

--
-- Contraintes pour la table `role_has_permissions`
--
ALTER TABLE `role_has_permissions`
  ADD CONSTRAINT `role_has_permissions_permission_id_foreign` FOREIGN KEY (`permission_id`) REFERENCES `permissions` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `role_has_permissions_role_id_foreign` FOREIGN KEY (`role_id`) REFERENCES `roles` (`id`) ON DELETE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
