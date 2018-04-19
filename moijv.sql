-- phpMyAdmin SQL Dump
-- version 4.7.4
-- https://www.phpmyadmin.net/
--
-- Hôte : 127.0.0.1
-- Généré le :  mer. 11 avr. 2018 à 09:58
-- Version du serveur :  10.1.26-MariaDB
-- Version de PHP :  7.1.9

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de données :  `moijv`
--

-- --------------------------------------------------------

--
-- Structure de la table `migration_versions`
--

CREATE TABLE `migration_versions` (
  `version` varchar(255) COLLATE utf8_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Déchargement des données de la table `migration_versions`
--

INSERT INTO `migration_versions` (`version`) VALUES
('20180330151953'),
('20180403104320'),
('20180403151747'),
('20180404081548');

-- --------------------------------------------------------

--
-- Structure de la table `product`
--

CREATE TABLE `product` (
  `id` int(11) NOT NULL,
  `owner_id` int(11) DEFAULT NULL,
  `title` varchar(50) COLLATE utf8mb4_unicode_ci NOT NULL,
  `description` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `image` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Déchargement des données de la table `product`
--

INSERT INTO `product` (`id`, `owner_id`, `title`, `description`, `image`) VALUES
(455, 390, 'produit 0', 'Description de mon produit n°0', 'uploads/500x325.png'),
(456, 423, 'produit 1', 'Description de mon produit n°1', 'uploads/500x325.png'),
(457, 377, 'produit 2', 'Description de mon produit n°2', 'uploads/500x325.png'),
(458, 379, 'produit 3', 'Description de mon produit n°3', 'uploads/500x325.png'),
(459, 397, 'produit 4', 'Description de mon produit n°4', 'uploads/500x325.png'),
(460, 396, 'produit 5', 'Description de mon produit n°5', 'uploads/500x325.png'),
(461, 405, 'produit 6', 'Description de mon produit n°6', 'uploads/500x325.png'),
(462, 398, 'produit 7', 'Description de mon produit n°7', 'uploads/500x325.png'),
(463, 394, 'produit 8', 'Description de mon produit n°8', 'uploads/500x325.png'),
(464, 406, 'produit 9', 'Description de mon produit n°9', 'uploads/500x325.png'),
(465, 395, 'produit 10', 'Description de mon produit n°10', 'uploads/500x325.png'),
(466, 403, 'produit 11', 'Description de mon produit n°11', 'uploads/500x325.png'),
(467, 412, 'produit 12', 'Description de mon produit n°12', 'uploads/500x325.png'),
(468, 375, 'produit 13', 'Description de mon produit n°13', 'uploads/500x325.png'),
(469, 386, 'produit 14', 'Description de mon produit n°14', 'uploads/500x325.png'),
(470, 414, 'produit 15', 'Description de mon produit n°15', 'uploads/500x325.png'),
(471, 408, 'produit 16', 'Description de mon produit n°16', 'uploads/500x325.png'),
(472, 367, 'produit 17', 'Description de mon produit n°17', 'uploads/500x325.png'),
(473, 416, 'produit 18', 'Description de mon produit n°18', 'uploads/500x325.png'),
(474, 396, 'produit 19', 'Description de mon produit n°19', 'uploads/500x325.png'),
(475, 387, 'produit 20', 'Description de mon produit n°20', 'uploads/500x325.png'),
(476, 397, 'produit 21', 'Description de mon produit n°21', 'uploads/500x325.png'),
(477, 378, 'produit 22', 'Description de mon produit n°22', 'uploads/500x325.png'),
(478, 399, 'produit 23', 'Description de mon produit n°23', 'uploads/500x325.png'),
(479, 385, 'produit 24', 'Description de mon produit n°24', 'uploads/500x325.png'),
(480, 385, 'produit 25', 'Description de mon produit n°25', 'uploads/500x325.png'),
(481, 409, 'produit 26', 'Description de mon produit n°26', 'uploads/500x325.png'),
(482, 408, 'produit 27', 'Description de mon produit n°27', 'uploads/500x325.png'),
(483, 416, 'produit 28', 'Description de mon produit n°28', 'uploads/500x325.png'),
(484, 391, 'produit 29', 'Description de mon produit n°29', 'uploads/500x325.png'),
(485, 408, 'produit 30', 'Description de mon produit n°30', 'uploads/500x325.png'),
(486, 368, 'produit 31', 'Description de mon produit n°31', 'uploads/500x325.png'),
(487, 396, 'produit 32', 'Description de mon produit n°32', 'uploads/500x325.png'),
(488, 380, 'produit 33', 'Description de mon produit n°33', 'uploads/500x325.png'),
(489, 369, 'produit 34', 'Description de mon produit n°34', 'uploads/500x325.png'),
(490, 414, 'produit 35', 'Description de mon produit n°35', 'uploads/500x325.png'),
(491, 401, 'produit 36', 'Description de mon produit n°36', 'uploads/500x325.png'),
(492, 402, 'produit 37', 'Description de mon produit n°37', 'uploads/500x325.png'),
(493, 410, 'produit 38', 'Description de mon produit n°38', 'uploads/500x325.png'),
(494, 381, 'produit 39', 'Description de mon produit n°39', 'uploads/500x325.png'),
(495, 410, 'produit 40', 'Description de mon produit n°40', 'uploads/500x325.png'),
(496, 418, 'produit 41', 'Description de mon produit n°41', 'uploads/500x325.png'),
(497, 390, 'produit 42', 'Description de mon produit n°42', 'uploads/500x325.png'),
(498, 413, 'produit 43', 'Description de mon produit n°43', 'uploads/500x325.png'),
(499, 393, 'produit 44', 'Description de mon produit n°44', 'uploads/500x325.png'),
(500, 390, 'produit 45', 'Description de mon produit n°45', 'uploads/500x325.png'),
(501, 387, 'produit 46', 'Description de mon produit n°46', 'uploads/500x325.png'),
(502, 414, 'produit 47', 'Description de mon produit n°47', 'uploads/500x325.png'),
(503, 399, 'produit 48', 'Description de mon produit n°48', 'uploads/500x325.png'),
(504, 416, 'produit 49', 'Description de mon produit n°49', 'uploads/500x325.png'),
(505, 394, 'produit 50', 'Description de mon produit n°50', 'uploads/500x325.png'),
(506, 421, 'produit 51', 'Description de mon produit n°51', 'uploads/500x325.png'),
(507, 405, 'produit 52', 'Description de mon produit n°52', 'uploads/500x325.png'),
(508, 393, 'produit 53', 'Description de mon produit n°53', 'uploads/500x325.png'),
(509, 416, 'produit 54', 'Description de mon produit n°54', 'uploads/500x325.png'),
(510, 370, 'produit 55', 'Description de mon produit n°55', 'uploads/500x325.png'),
(511, 381, 'produit 56', 'Description de mon produit n°56', 'uploads/500x325.png'),
(512, 422, 'produit 57', 'Description de mon produit n°57', 'uploads/500x325.png'),
(513, 426, 'produit 58', 'Description de mon produit n°58', 'uploads/500x325.png'),
(514, 408, 'produit 59', 'Description de mon produit n°59', 'uploads/500x325.png'),
(515, 370, 'produit 60', 'Description de mon produit n°60', 'uploads/500x325.png'),
(516, 400, 'produit 61', 'Description de mon produit n°61', 'uploads/500x325.png'),
(517, 401, 'produit 62', 'Description de mon produit n°62', 'uploads/500x325.png'),
(518, 369, 'produit 63', 'Description de mon produit n°63', 'uploads/500x325.png'),
(519, 378, 'produit 64', 'Description de mon produit n°64', 'uploads/500x325.png'),
(520, 377, 'produit 65', 'Description de mon produit n°65', 'uploads/500x325.png'),
(521, 403, 'produit 66', 'Description de mon produit n°66', 'uploads/500x325.png'),
(522, 399, 'produit 67', 'Description de mon produit n°67', 'uploads/500x325.png'),
(523, 387, 'produit 68', 'Description de mon produit n°68', 'uploads/500x325.png'),
(524, 416, 'produit 69', 'Description de mon produit n°69', 'uploads/500x325.png'),
(525, 393, 'produit 70', 'Description de mon produit n°70', 'uploads/500x325.png'),
(526, 385, 'produit 71', 'Description de mon produit n°71', 'uploads/500x325.png'),
(527, 401, 'produit 72', 'Description de mon produit n°72', 'uploads/500x325.png'),
(528, 414, 'produit 73', 'Description de mon produit n°73', 'uploads/500x325.png'),
(529, 426, 'produit 74', 'Description de mon produit n°74', 'uploads/500x325.png'),
(530, 413, 'produit 75', 'Description de mon produit n°75', 'uploads/500x325.png'),
(531, 398, 'produit 76', 'Description de mon produit n°76', 'uploads/500x325.png'),
(532, 408, 'produit 77', 'Description de mon produit n°77', 'uploads/500x325.png'),
(533, 409, 'produit 78', 'Description de mon produit n°78', 'uploads/500x325.png'),
(534, 377, 'produit 79', 'Description de mon produit n°79', 'uploads/500x325.png'),
(535, 372, 'produit 80', 'Description de mon produit n°80', 'uploads/500x325.png'),
(536, 386, 'produit 81', 'Description de mon produit n°81', 'uploads/500x325.png'),
(537, 369, 'produit 82', 'Description de mon produit n°82', 'uploads/500x325.png'),
(538, 380, 'produit 83', 'Description de mon produit n°83', 'uploads/500x325.png'),
(539, 385, 'produit 84', 'Description de mon produit n°84', 'uploads/500x325.png'),
(540, 380, 'produit 85', 'Description de mon produit n°85', 'uploads/500x325.png'),
(541, 387, 'produit 86', 'Description de mon produit n°86', 'uploads/500x325.png'),
(542, 398, 'produit 87', 'Description de mon produit n°87', 'uploads/500x325.png'),
(543, 370, 'produit 88', 'Description de mon produit n°88', 'uploads/500x325.png'),
(544, 415, 'produit 89', 'Description de mon produit n°89', 'uploads/500x325.png'),
(545, 406, 'produit 90', 'Description de mon produit n°90', 'uploads/500x325.png'),
(546, 371, 'produit 91', 'Description de mon produit n°91', 'uploads/500x325.png'),
(547, 370, 'produit 92', 'Description de mon produit n°92', 'uploads/500x325.png'),
(548, 385, 'produit 93', 'Description de mon produit n°93', 'uploads/500x325.png'),
(549, 417, 'produit 94', 'Description de mon produit n°94', 'uploads/500x325.png'),
(550, 417, 'produit 95', 'Description de mon produit n°95', 'uploads/500x325.png'),
(551, 399, 'produit 96', 'Description de mon produit n°96', 'uploads/500x325.png'),
(552, 390, 'produit 97', 'Description de mon produit n°97', 'uploads/500x325.png'),
(553, 409, 'produit 98', 'Description de mon produit n°98', 'uploads/500x325.png'),
(554, 370, 'produit 99', 'Description de mon produit n°99', 'uploads/500x325.png'),
(555, 402, 'produit 100', 'Description de mon produit n°100', 'uploads/500x325.png'),
(556, 425, 'produit 101', 'Description de mon produit n°101', 'uploads/500x325.png'),
(557, 394, 'produit 102', 'Description de mon produit n°102', 'uploads/500x325.png'),
(558, 421, 'produit 103', 'Description de mon produit n°103', 'uploads/500x325.png'),
(559, 404, 'produit 104', 'Description de mon produit n°104', 'uploads/500x325.png'),
(560, 402, 'produit 105', 'Description de mon produit n°105', 'uploads/500x325.png'),
(561, 408, 'produit 106', 'Description de mon produit n°106', 'uploads/500x325.png'),
(562, 391, 'produit 107', 'Description de mon produit n°107', 'uploads/500x325.png'),
(563, 390, 'produit 108', 'Description de mon produit n°108', 'uploads/500x325.png'),
(564, 378, 'produit 109', 'Description de mon produit n°109', 'uploads/500x325.png'),
(565, 414, 'produit 110', 'Description de mon produit n°110', 'uploads/500x325.png'),
(566, 413, 'produit 111', 'Description de mon produit n°111', 'uploads/500x325.png'),
(567, 403, 'produit 112', 'Description de mon produit n°112', 'uploads/500x325.png'),
(568, 399, 'produit 113', 'Description de mon produit n°113', 'uploads/500x325.png'),
(569, 383, 'produit 114', 'Description de mon produit n°114', 'uploads/500x325.png'),
(570, 422, 'produit 115', 'Description de mon produit n°115', 'uploads/500x325.png'),
(571, 397, 'produit 116', 'Description de mon produit n°116', 'uploads/500x325.png'),
(572, 390, 'produit 117', 'Description de mon produit n°117', 'uploads/500x325.png'),
(573, 393, 'produit 118', 'Description de mon produit n°118', 'uploads/500x325.png'),
(574, 393, 'produit 119', 'Description de mon produit n°119', 'uploads/500x325.png'),
(575, 402, 'produit 120', 'Description de mon produit n°120', 'uploads/500x325.png'),
(576, 415, 'produit 121', 'Description de mon produit n°121', 'uploads/500x325.png'),
(577, 414, 'produit 122', 'Description de mon produit n°122', 'uploads/500x325.png'),
(578, 425, 'produit 123', 'Description de mon produit n°123', 'uploads/500x325.png'),
(579, 411, 'produit 124', 'Description de mon produit n°124', 'uploads/500x325.png'),
(580, 384, 'produit 125', 'Description de mon produit n°125', 'uploads/500x325.png'),
(581, 404, 'produit 126', 'Description de mon produit n°126', 'uploads/500x325.png'),
(582, 423, 'produit 127', 'Description de mon produit n°127', 'uploads/500x325.png'),
(583, 385, 'produit 128', 'Description de mon produit n°128', 'uploads/500x325.png'),
(584, 384, 'produit 129', 'Description de mon produit n°129', 'uploads/500x325.png'),
(585, 404, 'produit 130', 'Description de mon produit n°130', 'uploads/500x325.png'),
(586, 388, 'produit 131', 'Description de mon produit n°131', 'uploads/500x325.png'),
(587, 424, 'produit 132', 'Description de mon produit n°132', 'uploads/500x325.png'),
(588, 406, 'produit 133', 'Description de mon produit n°133', 'uploads/500x325.png'),
(589, 419, 'produit 134', 'Description de mon produit n°134', 'uploads/500x325.png'),
(590, 421, 'produit 135', 'Description de mon produit n°135', 'uploads/500x325.png'),
(591, 424, 'produit 136', 'Description de mon produit n°136', 'uploads/500x325.png'),
(592, 395, 'produit 137', 'Description de mon produit n°137', 'uploads/500x325.png'),
(593, 385, 'produit 138', 'Description de mon produit n°138', 'uploads/500x325.png'),
(594, 368, 'produit 139', 'Description de mon produit n°139', 'uploads/500x325.png'),
(595, 420, 'produit 140', 'Description de mon produit n°140', 'uploads/500x325.png'),
(596, 397, 'produit 141', 'Description de mon produit n°141', 'uploads/500x325.png'),
(597, 376, 'produit 142', 'Description de mon produit n°142', 'uploads/500x325.png'),
(598, 374, 'produit 143', 'Description de mon produit n°143', 'uploads/500x325.png'),
(599, 381, 'produit 144', 'Description de mon produit n°144', 'uploads/500x325.png'),
(600, 399, 'produit 145', 'Description de mon produit n°145', 'uploads/500x325.png'),
(601, 413, 'produit 146', 'Description de mon produit n°146', 'uploads/500x325.png'),
(602, 410, 'produit 147', 'Description de mon produit n°147', 'uploads/500x325.png'),
(603, 370, 'produit 148', 'Description de mon produit n°148', 'uploads/500x325.png'),
(604, 406, 'produit 149', 'Description de mon produit n°149', 'uploads/500x325.png'),
(605, 427, 'baskets Nike', 'supers chaussures pour courrir très vite et sauter très haut', 'uploads/b95fe23e36bb087a421257cc946ad5b3.jpeg'),
(606, 427, 'Captain America', 'This is The Suprem Warrior', 'uploads/4df86f9b8ca7b993f1bb70ce7ba434ff.jpeg'),
(607, 427, 'ghfghfhfghfg', 'hfghfghfghfghfghfghfghf', 'uploads/d77d56f21d78ddad08f0fef8559c12ab.jpeg'),
(608, 427, 'Mon Produit', 'coucoucoucocuoucocuocuc', 'uploads/96f0864b6264a94c102bce0fcf132d14.jpeg');

-- --------------------------------------------------------

--
-- Structure de la table `product_tag`
--

CREATE TABLE `product_tag` (
  `product_id` int(11) NOT NULL,
  `tag_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Déchargement des données de la table `product_tag`
--

INSERT INTO `product_tag` (`product_id`, `tag_id`) VALUES
(456, 160),
(457, 140),
(458, 129),
(458, 158),
(459, 133),
(460, 147),
(460, 155),
(461, 122),
(462, 122),
(462, 124),
(463, 133),
(463, 148),
(463, 149),
(464, 124),
(464, 139),
(464, 154),
(465, 141),
(467, 128),
(467, 142),
(467, 148),
(467, 154),
(468, 150),
(469, 155),
(471, 126),
(471, 151),
(472, 131),
(472, 134),
(472, 141),
(472, 147),
(473, 142),
(474, 142),
(474, 153),
(475, 144),
(475, 155),
(476, 146),
(477, 138),
(478, 129),
(478, 134),
(478, 159),
(479, 126),
(479, 145),
(480, 160),
(481, 156),
(481, 159),
(483, 142),
(485, 125),
(485, 144),
(486, 139),
(488, 128),
(488, 156),
(489, 153),
(491, 138),
(491, 146),
(491, 155),
(492, 133),
(492, 146),
(493, 152),
(494, 124),
(494, 150),
(495, 147),
(496, 148),
(496, 153),
(497, 139),
(499, 140),
(500, 149),
(501, 124),
(501, 136),
(502, 134),
(502, 152),
(503, 144),
(506, 126),
(506, 141),
(508, 137),
(509, 127),
(509, 140),
(509, 144),
(509, 146),
(510, 141),
(510, 146),
(510, 149),
(510, 157),
(512, 126),
(512, 138),
(513, 128),
(513, 158),
(516, 132),
(516, 144),
(516, 154),
(518, 138),
(518, 152),
(519, 142),
(519, 149),
(519, 150),
(521, 136),
(521, 153),
(521, 158),
(523, 121),
(524, 126),
(524, 137),
(524, 142),
(525, 138),
(525, 145),
(526, 147),
(527, 138),
(527, 154),
(529, 158),
(530, 121),
(530, 153),
(531, 122),
(531, 129),
(531, 148),
(532, 139),
(532, 154),
(533, 141),
(533, 146),
(534, 122),
(534, 156),
(535, 139),
(536, 157),
(537, 152),
(538, 144),
(539, 126),
(539, 140),
(539, 148),
(540, 144),
(540, 145),
(540, 152),
(540, 160),
(541, 139),
(541, 143),
(542, 146),
(543, 127),
(543, 144),
(544, 133),
(544, 139),
(545, 134),
(547, 132),
(548, 134),
(548, 136),
(548, 157),
(549, 127),
(549, 136),
(550, 122),
(551, 129),
(551, 137),
(551, 142),
(551, 152),
(552, 123),
(552, 143),
(553, 149),
(554, 150),
(555, 121),
(555, 154),
(556, 126),
(556, 146),
(558, 132),
(558, 138),
(558, 140),
(559, 128),
(560, 150),
(561, 126),
(561, 139),
(562, 132),
(562, 142),
(562, 157),
(563, 127),
(563, 151),
(564, 126),
(567, 139),
(567, 153),
(567, 160),
(568, 134),
(568, 156),
(569, 132),
(572, 126),
(572, 139),
(574, 121),
(574, 132),
(574, 152),
(575, 147),
(576, 140),
(576, 153),
(577, 125),
(578, 148),
(579, 155),
(579, 156),
(580, 147),
(582, 137),
(583, 149),
(586, 128),
(586, 141),
(586, 142),
(588, 125),
(588, 133),
(589, 123),
(589, 141),
(589, 158),
(590, 141),
(592, 138),
(593, 121),
(593, 138),
(595, 132),
(595, 149),
(595, 156),
(597, 126),
(598, 142),
(598, 159),
(599, 144),
(599, 146),
(599, 149),
(600, 123),
(601, 130),
(601, 132),
(602, 142),
(603, 124),
(603, 159),
(603, 160),
(604, 152),
(605, 168),
(605, 169),
(605, 170),
(605, 171),
(606, 165),
(606, 166),
(606, 167),
(607, 161),
(607, 164),
(607, 165),
(608, 161),
(608, 162),
(608, 163);

-- --------------------------------------------------------

--
-- Structure de la table `tag`
--

CREATE TABLE `tag` (
  `id` int(11) NOT NULL,
  `name` varchar(30) COLLATE utf8mb4_unicode_ci NOT NULL,
  `slug` varchar(30) COLLATE utf8mb4_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Déchargement des données de la table `tag`
--

INSERT INTO `tag` (`id`, `name`, `slug`) VALUES
(121, 'Tag 0', 'tag-0'),
(122, 'Tag 1', 'tag-1'),
(123, 'Tag 2', 'tag-2'),
(124, 'Tag 3', 'tag-3'),
(125, 'Tag 4', 'tag-4'),
(126, 'Tag 5', 'tag-5'),
(127, 'Tag 6', 'tag-6'),
(128, 'Tag 7', 'tag-7'),
(129, 'Tag 8', 'tag-8'),
(130, 'Tag 9', 'tag-9'),
(131, 'Tag 10', 'tag-10'),
(132, 'Tag 11', 'tag-11'),
(133, 'Tag 12', 'tag-12'),
(134, 'Tag 13', 'tag-13'),
(135, 'Tag 14', 'tag-14'),
(136, 'Tag 15', 'tag-15'),
(137, 'Tag 16', 'tag-16'),
(138, 'Tag 17', 'tag-17'),
(139, 'Tag 18', 'tag-18'),
(140, 'Tag 19', 'tag-19'),
(141, 'Tag 20', 'tag-20'),
(142, 'Tag 21', 'tag-21'),
(143, 'Tag 22', 'tag-22'),
(144, 'Tag 23', 'tag-23'),
(145, 'Tag 24', 'tag-24'),
(146, 'Tag 25', 'tag-25'),
(147, 'Tag 26', 'tag-26'),
(148, 'Tag 27', 'tag-27'),
(149, 'Tag 28', 'tag-28'),
(150, 'Tag 29', 'tag-29'),
(151, 'Tag 30', 'tag-30'),
(152, 'Tag 31', 'tag-31'),
(153, 'Tag 32', 'tag-32'),
(154, 'Tag 33', 'tag-33'),
(155, 'Tag 34', 'tag-34'),
(156, 'Tag 35', 'tag-35'),
(157, 'Tag 36', 'tag-36'),
(158, 'Tag 37', 'tag-37'),
(159, 'Tag 38', 'tag-38'),
(160, 'Tag 39', 'tag-39'),
(161, 'Playstation', 'playstation'),
(162, 'Hello', 'hello'),
(163, 'Test', 'test'),
(164, 'bonjour', 'bonjour'),
(165, 'content', 'content'),
(166, 'Captain-America', 'captain-america'),
(167, ' heros', 'heros'),
(168, 'nike', 'nike'),
(169, ' chaussures', 'chaussures'),
(170, ' noir', 'noir'),
(171, ' baskets_nike', 'baskets-nike');

-- --------------------------------------------------------

--
-- Structure de la table `user`
--

CREATE TABLE `user` (
  `id` int(11) NOT NULL,
  `username` varchar(50) COLLATE utf8mb4_unicode_ci NOT NULL,
  `password` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(100) COLLATE utf8mb4_unicode_ci NOT NULL,
  `register_date` datetime NOT NULL,
  `roles` varchar(100) COLLATE utf8mb4_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Déchargement des données de la table `user`
--

INSERT INTO `user` (`id`, `username`, `password`, `email`, `register_date`, `roles`) VALUES
(367, 'user0', '$2y$10$48QTfzQ9gJ83OgqvFZDwEe.qndJh8Pb/bzoCxcChDtE2aNIn7I76u', 'user0@fake.fr', '2018-04-04 11:59:49', 'ROLE_USER'),
(368, 'user1', '$2y$10$jOz3PxpW5gCQuA7zzXgfn.veoCoybX38g.asOmweDNHPlW0.Eg2q.', 'user1@fake.fr', '2018-04-03 11:59:49', 'ROLE_USER'),
(369, 'user2', '$2y$10$2kfRrIthfFErCdhskbJUwuxP7C9Rx.pnbgVlklhZpq/VoI2hgNfe.', 'user2@fake.fr', '2018-04-02 11:59:50', 'ROLE_USER'),
(370, 'user3', '$2y$10$DQ7TjZEQL39Xf5JLggNgz.YVuNk2ePl0147I6s3Hj8.Gu1X.NnVxy', 'user3@fake.fr', '2018-04-01 11:59:50', 'ROLE_USER'),
(371, 'user4', '$2y$10$HHcGAyzy0Dp8GDtL0y67WurKt6QVZL5JdYeCNN8xHDCEbWrnSzwSm', 'user4@fake.fr', '2018-03-31 11:59:50', 'ROLE_USER'),
(372, 'user5', '$2y$10$vHvXb3A.q88IOTXHWA3pqOUrZMHuKA1e8mQntN7L62f9Hb9y7VWlO', 'user5@fake.fr', '2018-03-30 11:59:50', 'ROLE_USER'),
(373, 'user6', '$2y$10$BplFONPwgaxIqtKbo6dbWOI/CLSa7RKhxf4Dk1EtJw/ldUThahavS', 'user6@fake.fr', '2018-03-29 11:59:50', 'ROLE_USER'),
(374, 'user7', '$2y$10$5AhyQy3TwtCsTX//H6O.4ulcoE1VIkKcDrDB/JR2oLFq5Zoi9CrUK', 'user7@fake.fr', '2018-03-28 11:59:50', 'ROLE_USER'),
(375, 'user8', '$2y$10$wZQ5QO09Lst5QPETCRMeY.ViY3oHXXjtxR03Pia6wITx.1hkKXQ0G', 'user8@fake.fr', '2018-03-27 11:59:50', 'ROLE_USER'),
(376, 'user9', '$2y$10$Jsc1Zak8gpLjy9k/655oH.ybp022rxBojnniV1jy8PktF2ljr.Edm', 'user9@fake.fr', '2018-03-26 11:59:50', 'ROLE_USER'),
(377, 'user10', '$2y$10$fDLfZ5qbyZzS6k1h4j7Zf.qRuBZ7l/pq9pSywVQtnSgMS.nwUj9T.', 'user10@fake.fr', '2018-03-25 11:59:50', 'ROLE_USER'),
(378, 'user11', '$2y$10$WyoZjtROyKxMopKF1ZPuKOXAi9kUBnQStLcW5Edjc.eHkkDdJnI/u', 'user11@fake.fr', '2018-03-24 11:59:50', 'ROLE_USER'),
(379, 'user12', '$2y$10$kg8MsCESmZS8Tv4ceySzfOO3.zmtVtOD/gIqIXo7MMkIl8VqJtHN6', 'user12@fake.fr', '2018-03-23 11:59:50', 'ROLE_USER'),
(380, 'user13', '$2y$10$Vo4O8nKi8ypDn5icamGwhe7TQzEOZSJomg1/Be6YdUpxc2MQa5eDK', 'user13@fake.fr', '2018-03-22 11:59:50', 'ROLE_USER'),
(381, 'user14', '$2y$10$kcped4t..gMlfLvRIu9VSODr6kqKPkRxvUSQ3q3eLdh83VaytU2JS', 'user14@fake.fr', '2018-03-21 11:59:51', 'ROLE_USER'),
(382, 'user15', '$2y$10$vqEN5vjQz5nsPeyxwCZEMuFrZFizAOD89fscnXuB8QPTI75K4bNMK', 'user15@fake.fr', '2018-03-20 11:59:51', 'ROLE_USER'),
(383, 'user16', '$2y$10$ZlQS1fQjB..BbqpFxANqj.VxnaM0aoIsNJJf1.macDj8EfaHU2Bma', 'user16@fake.fr', '2018-03-19 11:59:51', 'ROLE_USER'),
(384, 'user17', '$2y$10$CJvACQG4FSWrcwOGJgnk6uksnMu6ZVQyhL83OWgpp6uVcPxmMzNJS', 'user17@fake.fr', '2018-03-18 11:59:51', 'ROLE_USER'),
(385, 'user18', '$2y$10$zkcOAz0JaDrPBHyfcSt2FullIO2CRate6ttS9VbHfglNDx5SJzcAe', 'user18@fake.fr', '2018-03-17 11:59:51', 'ROLE_USER'),
(386, 'user19', '$2y$10$6BzSqsgkDcn4sAqiYakxuuQoEdAFNm/fAnBhQhCmAmEmwtkhtCSvC', 'user19@fake.fr', '2018-03-16 11:59:51', 'ROLE_USER'),
(387, 'user20', '$2y$10$Entb5esmXyl3nbOI9NmtL.rvCMeWLunFb5gBSeSaQOewNuBADgOwi', 'user20@fake.fr', '2018-03-15 11:59:51', 'ROLE_USER'),
(388, 'user21', '$2y$10$M9nZwdIayrOZyObnXU48Re6da1LvqNRgG9BPluLVzEUKx/8J2hx6C', 'user21@fake.fr', '2018-03-14 11:59:51', 'ROLE_USER'),
(389, 'user22', '$2y$10$h61GkEPhwe5Hgg0KwQ0rAuH8k94x304ymSPl9jJbFXlrtXN97osbG', 'user22@fake.fr', '2018-03-13 11:59:51', 'ROLE_USER'),
(390, 'user23', '$2y$10$fDTQ54a52zneoGM9Hli6TubqN5/fGEbkxGNHsISmWpn8/kgMB8UkK', 'user23@fake.fr', '2018-03-12 11:59:51', 'ROLE_USER'),
(391, 'user24', '$2y$10$NXTlVeyAgdGuH13wLYryD.N7wWRihbALrz3jnTiBpeL7hmr/Yl7Mm', 'user24@fake.fr', '2018-03-11 11:59:51', 'ROLE_USER'),
(392, 'user25', '$2y$10$gc.uco1CYQEQLrkIZveVSe8c.bsUkFK//u5OV9BjzqZRoA4qKCNBe', 'user25@fake.fr', '2018-03-10 11:59:52', 'ROLE_USER'),
(393, 'user26', '$2y$10$My3b1q05H8z6gPc3jdyybOI3wKCkukx7Okl3YPyS/I0319OMNZ/UW', 'user26@fake.fr', '2018-03-09 11:59:52', 'ROLE_USER'),
(394, 'user27', '$2y$10$NSD/HztqjbuIvmryXYjFNOtvdN8VEm8rpC.Kk8iTewQVwOkqdogJW', 'user27@fake.fr', '2018-03-08 11:59:52', 'ROLE_USER'),
(395, 'user28', '$2y$10$dfL1QRF/0bbntEAIVV.cfeqgMomf4L3UPkMTsKy9jUiKCiykvwosq', 'user28@fake.fr', '2018-03-07 11:59:52', 'ROLE_USER'),
(396, 'user29', '$2y$10$bb6qfLlo7q8N01/201e1vexPx97Oh4YLTTw85buYg8CVXt0ES18lS', 'user29@fake.fr', '2018-03-06 11:59:52', 'ROLE_USER'),
(397, 'user30', '$2y$10$O/M/1pDqjCNsmMzI/OC2UuAn/BomhWqUozVBuJC5uj35fQUSiiEoi', 'user30@fake.fr', '2018-03-05 11:59:52', 'ROLE_USER'),
(398, 'user31', '$2y$10$PyB1ueNt7iq.ZrZ1DcOofewINeEx0mFr5J7NPyPBGtEriIfs4kvJG', 'user31@fake.fr', '2018-03-04 11:59:52', 'ROLE_USER'),
(399, 'user32', '$2y$10$qhly9QhqNI1HLQ.rU6evkOZsBtibaEV94zKRoNqn5aP6kcHbcPeEi', 'user32@fake.fr', '2018-03-03 11:59:52', 'ROLE_USER'),
(400, 'user33', '$2y$10$zPj1K4iNqjWoqjDzgC6/be6iUsrXnVJDZN14yH0SPcP.HEO4EYdgW', 'user33@fake.fr', '2018-03-02 11:59:52', 'ROLE_USER'),
(401, 'user34', '$2y$10$hDxKyohvYeN0/nNZc8UbWe7FVoz7KHmi9yU1Yskb.2l5fxJQ12e1W', 'user34@fake.fr', '2018-03-01 11:59:52', 'ROLE_USER'),
(402, 'user35', '$2y$10$0a7tPOv0ecLHS3Le3cXpduTljK4KSo7uDINnyYftB12NCMmORYViq', 'user35@fake.fr', '2018-02-28 11:59:52', 'ROLE_USER'),
(403, 'user36', '$2y$10$GYAh6By891MjawsQJJnZrOyJLNI/Hwajd1Icnc/HqU2JiaBeHAHBa', 'user36@fake.fr', '2018-02-27 11:59:52', 'ROLE_USER'),
(404, 'user37', '$2y$10$WR.RoYKfngngSkuBDRTqiO2DpqobLn9aG1crlYekmmPL4.W0Qn2WK', 'user37@fake.fr', '2018-02-26 11:59:53', 'ROLE_USER'),
(405, 'user38', '$2y$10$cl9mzB1ygoEcaC3wmNXPzOITmK1IX.mCtJIZhS6FQevoW4IMeV6bW', 'user38@fake.fr', '2018-02-25 11:59:53', 'ROLE_USER'),
(406, 'user39', '$2y$10$hMaw9e8dVVoLQ1.cbp3A9.EwrHqU.XKDY1tyQfAwHEkRzYXlUrB8K', 'user39@fake.fr', '2018-02-24 11:59:53', 'ROLE_USER'),
(407, 'user40', '$2y$10$J3n4sWTHjP2a0EwQV1H8be9nzMx8K61tXdgbWmMnSJXQC91X.HSsO', 'user40@fake.fr', '2018-02-23 11:59:53', 'ROLE_USER'),
(408, 'user41', '$2y$10$1Ylq.LiJHhcHGG7uoS0fF.6z8T4tIuTWLC.YRQBjYBlydw1GwsAAK', 'user41@fake.fr', '2018-02-22 11:59:53', 'ROLE_USER'),
(409, 'user42', '$2y$10$J0ZwOF5/fVby/UsvUVtL/eE3dtf/4K2gL9K.ebm0MoNAe3jspkSTa', 'user42@fake.fr', '2018-02-21 11:59:53', 'ROLE_USER'),
(410, 'user43', '$2y$10$8PTrky3mo1GM8hq/qWM1GuBAXeirQ08BuiqaXkh9/Do70tx5ZahPa', 'user43@fake.fr', '2018-02-20 11:59:53', 'ROLE_USER'),
(411, 'user44', '$2y$10$PY5iYY8q97HgDH3E5MaNTuuZsuHOCHJTBxhzYW8ABPdO15Kx9lmjG', 'user44@fake.fr', '2018-02-19 11:59:53', 'ROLE_USER'),
(412, 'user45', '$2y$10$CJxRLJHQZSanfF/zrs3YkeoWB6SksKCN8s/i.pSEugmu635G.DYS.', 'user45@fake.fr', '2018-02-18 11:59:53', 'ROLE_USER'),
(413, 'user46', '$2y$10$f8Bz4rmacYIqmXYBvpUX8uVHHYUJWLxWeiIalvJPc5cFr0wkZrdXi', 'user46@fake.fr', '2018-02-17 11:59:53', 'ROLE_USER'),
(414, 'user47', '$2y$10$yP4J4odtyPUfs2UVqqsjgON.vyu6G9bMlD1e/JGe5WyDHa0XS2pW.', 'user47@fake.fr', '2018-02-16 11:59:53', 'ROLE_USER'),
(415, 'user48', '$2y$10$BHNWrLvAySTyr2c8YoSxCu7xLkTAB62pdWZx4MdOqKL0lTYlrqTqi', 'user48@fake.fr', '2018-02-15 11:59:54', 'ROLE_USER'),
(416, 'user49', '$2y$10$7CeQmFYRrmyNykwRDK9pS.NsCeLg.7YtKQ34JIENiclb8K2EwWLDK', 'user49@fake.fr', '2018-02-14 11:59:54', 'ROLE_USER'),
(417, 'user50', '$2y$10$TA4BZRWWuhsYGTsFxZX.aOAdUgw.xQCgdt7BgVbxp6tkL5.A6nPoG', 'user50@fake.fr', '2018-02-13 11:59:54', 'ROLE_USER'),
(418, 'user51', '$2y$10$kf1VvNP/CPRWjUx3PNIh2eAmvfgr1Rkd86iaCP5X459vctzCViUTS', 'user51@fake.fr', '2018-02-12 11:59:54', 'ROLE_USER'),
(419, 'user52', '$2y$10$fI6aSixu3COMrWm/mThdEOAhdmkdSksx5tTvBmku4I/JiC42hCjdS', 'user52@fake.fr', '2018-02-11 11:59:54', 'ROLE_USER'),
(420, 'user53', '$2y$10$xkWa4HA.2rx2c0txtx43qu4S7jVaYM2HLk1Ak/Zr7x5cRkbnhlecu', 'user53@fake.fr', '2018-02-10 11:59:54', 'ROLE_USER'),
(421, 'user54', '$2y$10$zOzbWZNMcR3k9hfKCcbqAeWUcGZhv0kxHsQGOn0oIlvke7feFemQ2', 'user54@fake.fr', '2018-02-09 11:59:54', 'ROLE_USER'),
(422, 'user55', '$2y$10$QR/ZKRCRxDLpKlDv8qGJg.CL1Plwdotl4TwUC6cjTF6gMR6Fc3ehG', 'user55@fake.fr', '2018-02-08 11:59:54', 'ROLE_USER'),
(423, 'user56', '$2y$10$QIqYLs1YCmCnZovAPsU4DOXPuHo7AdjiVamLNdJoprNkqcR60NrkK', 'user56@fake.fr', '2018-02-07 11:59:54', 'ROLE_USER'),
(424, 'user57', '$2y$10$Pa7/jKhdI4Q5qfXY9xwYQ..wO4GJmZ2tUOEjCdODnvtWNjyatQ81m', 'user57@fake.fr', '2018-02-06 11:59:54', 'ROLE_USER'),
(425, 'user58', '$2y$10$9keqPq0tcmskjWoIb6ZvnuYcHfZKJ0HW.6cv4QEH5h9WCIBhfAL4y', 'user58@fake.fr', '2018-02-05 11:59:54', 'ROLE_USER'),
(426, 'user59', '$2y$10$Ies21mwnkZIE4NtrM.XYCencVo39pDdMaR8pxytM.izoG285pftbG', 'user59@fake.fr', '2018-02-04 11:59:55', 'ROLE_USER'),
(427, 'root', '$2y$10$nhTLQWi5paQRxNIr/7A43.vR/GmoIanlWLlXyBFBaG.AXmp3UH3By', 'admin@mail.fr', '2018-04-04 11:59:55', 'ROLE_USER|ROLE_ADMIN');

--
-- Index pour les tables déchargées
--

--
-- Index pour la table `migration_versions`
--
ALTER TABLE `migration_versions`
  ADD PRIMARY KEY (`version`);

--
-- Index pour la table `product`
--
ALTER TABLE `product`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `UNIQ_D34A04AD2B36786B` (`title`),
  ADD KEY `IDX_D34A04AD7E3C61F9` (`owner_id`);

--
-- Index pour la table `product_tag`
--
ALTER TABLE `product_tag`
  ADD PRIMARY KEY (`product_id`,`tag_id`),
  ADD KEY `IDX_E3A6E39C4584665A` (`product_id`),
  ADD KEY `IDX_E3A6E39CBAD26311` (`tag_id`);

--
-- Index pour la table `tag`
--
ALTER TABLE `tag`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `UNIQ_389B7835E237E06` (`name`),
  ADD UNIQUE KEY `UNIQ_389B783989D9B62` (`slug`);

--
-- Index pour la table `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `UNIQ_8D93D649F85E0677` (`username`),
  ADD UNIQUE KEY `UNIQ_8D93D649E7927C74` (`email`);

--
-- AUTO_INCREMENT pour les tables déchargées
--

--
-- AUTO_INCREMENT pour la table `product`
--
ALTER TABLE `product`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=609;

--
-- AUTO_INCREMENT pour la table `tag`
--
ALTER TABLE `tag`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=172;

--
-- AUTO_INCREMENT pour la table `user`
--
ALTER TABLE `user`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=428;

--
-- Contraintes pour les tables déchargées
--

--
-- Contraintes pour la table `product`
--
ALTER TABLE `product`
  ADD CONSTRAINT `FK_D34A04AD7E3C61F9` FOREIGN KEY (`owner_id`) REFERENCES `user` (`id`);

--
-- Contraintes pour la table `product_tag`
--
ALTER TABLE `product_tag`
  ADD CONSTRAINT `FK_E3A6E39C4584665A` FOREIGN KEY (`product_id`) REFERENCES `product` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `FK_E3A6E39CBAD26311` FOREIGN KEY (`tag_id`) REFERENCES `tag` (`id`) ON DELETE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
