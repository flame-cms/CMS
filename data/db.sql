-- Adminer 3.6.1 MySQL dump

SET NAMES utf8;
SET foreign_key_checks = 0;
SET time_zone = 'SYSTEM';
SET sql_mode = 'NO_AUTO_VALUE_ON_ZERO';

DROP TABLE IF EXISTS `flame_category`;
CREATE TABLE `flame_category` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `parent_id` int(11) DEFAULT NULL,
  `name` varchar(100) COLLATE utf8_unicode_ci NOT NULL,
  `description` varchar(250) COLLATE utf8_unicode_ci NOT NULL,
  `slug` varchar(100) COLLATE utf8_unicode_ci NOT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `UNIQ_E011A29E5E237E06` (`name`),
  KEY `IDX_E011A29E727ACA70` (`parent_id`),
  CONSTRAINT `FK_E011A29E727ACA70` FOREIGN KEY (`parent_id`) REFERENCES `flame_category` (`id`) ON DELETE SET NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

INSERT INTO `flame_category` (`id`, `parent_id`, `name`, `description`, `slug`) VALUES
(2,	NULL,	'Fusce aliquam vestibulum ipsum',	'desc',	'fusce-aliquam-vestibulum-ipsum');

DROP TABLE IF EXISTS `flame_comment`;
CREATE TABLE `flame_comment` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `post_id` int(11) DEFAULT NULL,
  `name` varchar(75) COLLATE utf8_unicode_ci NOT NULL,
  `email` varchar(100) COLLATE utf8_unicode_ci NOT NULL,
  `web` varchar(100) COLLATE utf8_unicode_ci NOT NULL,
  `content` longtext COLLATE utf8_unicode_ci NOT NULL,
  `created` datetime NOT NULL,
  `publish` tinyint(1) NOT NULL,
  PRIMARY KEY (`id`),
  KEY `IDX_AA930C234B89032C` (`post_id`),
  CONSTRAINT `FK_AA930C234B89032C` FOREIGN KEY (`post_id`) REFERENCES `flame_post` (`id`) ON DELETE CASCADE
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;


DROP TABLE IF EXISTS `flame_image`;
CREATE TABLE `flame_image` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `file` varchar(150) COLLATE utf8_unicode_ci NOT NULL,
  `name` varchar(100) COLLATE utf8_unicode_ci NOT NULL,
  `description` varchar(250) COLLATE utf8_unicode_ci NOT NULL,
  `public` tinyint(1) NOT NULL,
  `category_id` int(11) DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `IDX_3F8203C612469DE2` (`category_id`),
  CONSTRAINT `FK_3F8203C612469DE2` FOREIGN KEY (`category_id`) REFERENCES `flame_image_category` (`id`) ON DELETE SET NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;


DROP TABLE IF EXISTS `flame_image_category`;
CREATE TABLE `flame_image_category` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `slug` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `description` varchar(10000) COLLATE utf8_unicode_ci NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;


DROP TABLE IF EXISTS `flame_link`;
CREATE TABLE `flame_link` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `url` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `description` varchar(500) COLLATE utf8_unicode_ci NOT NULL,
  `public` tinyint(1) NOT NULL,
  `hit` int(11) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

INSERT INTO `flame_link` (`id`, `name`, `url`, `description`, `public`, `hit`) VALUES
(4,	'Github/flame-org/CMS',	'https://github.com/flame-org/CMS',	'Public sources of Flame framework',	1,	4),
(5,	'Github.com/flame-org',	'https://github.com/flame-org',	'Profile of organization which is working Flame framework',	1,	2),
(6,	'JSifalda.name',	'http://jsifalda.name/',	'Online author\'s profile',	1,	4);

DROP TABLE IF EXISTS `flame_menu`;
CREATE TABLE `flame_menu` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `title` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `url` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `priority` int(11) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

INSERT INTO `flame_menu` (`id`, `title`, `url`, `priority`) VALUES
(1,	'Home',	'/',	5),
(2,	'Pellentesque habitant morbi',	'/page/detail/1',	10),
(5,	'Links',	'/link/',	20),
(6,	'Newsreel',	'/newsreel/',	19),
(8,	'Second Page',	'/page/detail/2',	5);

DROP TABLE IF EXISTS `flame_newsreel`;
CREATE TABLE `flame_newsreel` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `title` varchar(100) COLLATE utf8_unicode_ci NOT NULL,
  `content` longtext COLLATE utf8_unicode_ci NOT NULL,
  `date` datetime NOT NULL,
  `hit` int(11) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

INSERT INTO `flame_newsreel` (`id`, `title`, `content`, `date`, `hit`) VALUES
(1,	'Lorem ipsum dolor sit amet',	'<p>Lorem ipsum dolor sit amet, consectetuer adipiscing elit. Sed convallis magna eu sem. Ut enim ad minima veniam, quis nostrum exercitationem ullam corporis suscipit laboriosam, nisi ut aliquid ex ea commodi consequatur? Pellentesque ipsum. Nullam at arcu a est sollicitudin euismod. Cum sociis natoque penatibus et magnis dis parturient montes, nascetur ridiculus mus. Nulla accumsan, elit sit amet varius semper, nulla mauris mollis quam, tempor suscipit diam nulla vel leo. Fusce tellus. Vivamus luctus egestas leo. Integer imperdiet lectus quis justo.</p>',	'2012-08-07 00:00:00',	11);

DROP TABLE IF EXISTS `flame_option`;
CREATE TABLE `flame_option` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(50) COLLATE utf8_unicode_ci NOT NULL,
  `value` varchar(250) COLLATE utf8_unicode_ci NOT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `UNIQ_D3AF94575E237E06` (`name`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

INSERT INTO `flame_option` (`id`, `name`, `value`) VALUES
(1,	'ItemsPerPage',	'1'),
(2,	'Name',	'Flame:CMS'),
(4,	'Menu:NewsreelCount',	'3');

DROP TABLE IF EXISTS `flame_page`;
CREATE TABLE `flame_page` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `user_id` int(11) DEFAULT NULL,
  `name` varchar(100) COLLATE utf8_unicode_ci NOT NULL,
  `slug` varchar(100) COLLATE utf8_unicode_ci NOT NULL,
  `description` varchar(250) COLLATE utf8_unicode_ci NOT NULL,
  `keywords` varchar(250) COLLATE utf8_unicode_ci NOT NULL,
  `content` longtext COLLATE utf8_unicode_ci NOT NULL,
  `created` datetime NOT NULL,
  `hit` int(11) NOT NULL,
  PRIMARY KEY (`id`),
  KEY `IDX_A4304C3EA76ED395` (`user_id`),
  CONSTRAINT `FK_A4304C3EA76ED395` FOREIGN KEY (`user_id`) REFERENCES `flame_user` (`id`) ON DELETE SET NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

INSERT INTO `flame_page` (`id`, `user_id`, `name`, `slug`, `description`, `keywords`, `content`, `created`, `hit`) VALUES
(1,	1,	'Pellentesque habitant morbi',	'pellentesque-habitant-morbi',	'',	'',	'<p>Pellentesque habitant morbi tristique senectus et netus et malesuada fames ac turpis egestas. Donec ipsum massa, ullamcorper in, auctor et, scelerisque sed, est. Aliquam erat volutpat. Duis sapien nunc, commodo et, interdum suscipit, sollicitudin et, dolor. Donec vitae arcu. Nulla non arcu lacinia neque faucibus fringilla. Duis risus. Aliquam in lorem sit amet leo accumsan lacinia. Phasellus faucibus molestie nisl. Integer malesuada. Etiam commodo dui eget wisi. Nam libero tempore, cum soluta nobis est eligendi optio cumque nihil impedit quo minus id quod maxime placeat facere possimus, omnis voluptas assumenda est, omnis dolor repellendus. Integer pellentesque quam vel velit. Class aptent taciti sociosqu ad litora torquent per conubia nostra, per inceptos hymenaeos. Phasellus enim erat, vestibulum vel, aliquam a, posuere eu, velit. Nulla quis diam. Sed convallis magna eu sem. Aenean vel massa quis mauris vehicula lacinia. Duis ante orci, molestie vitae vehicula venenatis, tincidunt ac pede. Class aptent taciti sociosqu ad litora torquent per conubia nostra, per inceptos hymenaeos.</p>\r\n<p>Maecenas ipsum velit, consectetuer eu lobortis ut, dictum at dui. Fusce tellus. Nemo enim ipsam voluptatem quia voluptas sit aspernatur aut odit aut fugit, sed quia consequuntur magni dolores eos qui ratione voluptatem sequi nesciunt. Integer pellentesque quam vel velit. Etiam quis quam. Proin in tellus sit amet nibh dignissim sagittis. Maecenas aliquet accumsan leo. Nullam justo enim, consectetuer nec, ullamcorper ac, vestibulum in, elit. Aenean fermentum risus id tortor. Mauris tincidunt sem sed arcu. Etiam posuere lacus quis dolor. Duis viverra diam non justo. Class aptent taciti sociosqu ad litora torquent per conubia nostra, per inceptos hymenaeos. Nullam sapien sem, ornare ac, nonummy non, lobortis a enim. Praesent dapibus. Mauris tincidunt sem sed arcu. Pellentesque arcu. Ut enim ad minima veniam, quis nostrum exercitationem ullam corporis suscipit laboriosam, nisi ut aliquid ex ea commodi consequatur?</p>\r\n<p>Itaque earum rerum hic tenetur a sapiente delectus, ut aut reiciendis voluptatibus maiores alias consequatur aut perferendis doloribus asperiores repellat. Fusce wisi. Cum sociis natoque penatibus et magnis dis parturient montes, nascetur ridiculus mus. Class aptent taciti sociosqu ad litora torquent per conubia nostra, per inceptos hymenaeos. Suspendisse sagittis ultrices augue. Vivamus luctus egestas leo. Maecenas sollicitudin. Nullam sapien sem, ornare ac, nonummy non, lobortis a enim. Morbi imperdiet, mauris ac auctor dictum, nisl ligula egestas nulla, et sollicitudin sem purus in lacus. Nulla quis diam.</p>\r\n<p>Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Sed vel lectus. Donec odio tempus molestie, porttitor ut, iaculis quis, sem. Aenean vel massa quis mauris vehicula lacinia. Praesent id justo in neque elementum ultrices. Phasellus et lorem id felis nonummy placerat. Phasellus enim erat, vestibulum vel, aliquam a, posuere eu, velit. Ut tempus purus at lorem. Praesent id justo in neque elementum ultrices. Mauris dictum facilisis augue. Nullam feugiat, turpis at pulvinar vulputate, erat libero tristique tellus, nec bibendum odio risus sit amet ante. Fusce dui leo, imperdiet in, aliquam sit amet, feugiat eu, orci. Aenean placerat. Proin mattis lacinia justo.</p>\r\n<p>Duis sapien nunc, commodo et, interdum suscipit, sollicitudin et, dolor. Nulla est. Quisque porta. Phasellus et lorem id felis nonummy placerat. In dapibus augue non sapien. Pellentesque ipsum. Etiam quis quam. Et harum quidem rerum facilis est et expedita distinctio. Integer in sapien. Phasellus rhoncus. Quisque tincidunt scelerisque libero. Donec iaculis gravida nulla. Fusce wisi. Proin mattis lacinia justo. Maecenas libero. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Aenean id metus id velit ullamcorper pulvinar. Sed vel lectus. Donec odio tempus molestie, porttitor ut, iaculis quis, sem.</p>',	'2012-08-08 14:40:13',	55),
(2,	1,	'Second Page',	'second-page',	'Second Page Flame',	'flame,',	'<p>Demo page</p>\r\n<h3>Features</h3>\r\n<ul>\r\n<li>Access control list</li>\r\n<li>Creating / editing posts (categories, tags)</li>\r\n<li>Comments</li>\r\n<li>TimyCME editor</li>\r\n<li>Managing of images</li>\r\n<li>Paginator for posts</li>\r\n<li>Users management</li>\r\n<li>Links management</li>\r\n<li>Newsreel</li>\r\n<li>Pages management</li>\r\n<li>Wordpress posts import</li>\r\n<li>Management of templates for Front part (Twitter Bootstrap for Administration)</li>\r\n</ul>',	'2012-11-05 13:19:47',	34);

DROP TABLE IF EXISTS `flame_post`;
CREATE TABLE `flame_post` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `user_id` int(11) DEFAULT NULL,
  `category_id` int(11) DEFAULT NULL,
  `name` varchar(100) COLLATE utf8_unicode_ci NOT NULL,
  `slug` varchar(100) COLLATE utf8_unicode_ci NOT NULL,
  `description` varchar(250) COLLATE utf8_unicode_ci NOT NULL,
  `keywords` varchar(500) COLLATE utf8_unicode_ci NOT NULL,
  `content` longtext COLLATE utf8_unicode_ci NOT NULL,
  `created` datetime NOT NULL,
  `publish` tinyint(1) NOT NULL,
  `comment` tinyint(1) NOT NULL,
  `hit` int(11) NOT NULL,
  PRIMARY KEY (`id`),
  KEY `IDX_EAB09693A76ED395` (`user_id`),
  KEY `IDX_EAB0969312469DE2` (`category_id`),
  CONSTRAINT `FK_EAB0969312469DE2` FOREIGN KEY (`category_id`) REFERENCES `flame_category` (`id`) ON DELETE SET NULL,
  CONSTRAINT `FK_EAB09693A76ED395` FOREIGN KEY (`user_id`) REFERENCES `flame_user` (`id`) ON DELETE SET NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

INSERT INTO `flame_post` (`id`, `user_id`, `category_id`, `name`, `slug`, `description`, `keywords`, `content`, `created`, `publish`, `comment`, `hit`) VALUES
(1,	1,	NULL,	'Mauris dolor felis',	'mauris-dolor-felis',	'',	'',	'<p>Mauris dolor felis, sagittis at, luctus sed, aliquam non, tellus. Duis condimentum augue id magna semper rutrum. Suspendisse sagittis ultrices augue. Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum. Phasellus et lorem id felis nonummy placerat. Fusce aliquam vestibulum ipsum. Integer in sapien. In convallis. Maecenas ipsum velit, consectetuer eu lobortis ut, dictum at dui. Lorem ipsum dolor sit amet, consectetuer adipiscing elit. Praesent dapibus. Maecenas lorem. Integer vulputate sem a nibh rutrum consequat. Donec ipsum massa, ullamcorper in, auctor et, scelerisque sed, est. Maecenas ipsum velit, consectetuer eu lobortis ut, dictum at dui.</p>\r\n<p>Suspendisse nisl. Morbi leo mi, nonummy eget tristique non, rhoncus non leo. Fusce dui leo, imperdiet in, aliquam sit amet, feugiat eu, orci. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Nunc dapibus tortor vel mi dapibus sollicitudin. Nullam justo enim, consectetuer nec, ullamcorper ac, vestibulum in, elit. Nunc dapibus tortor vel mi dapibus sollicitudin. Etiam commodo dui eget wisi. Donec iaculis gravida nulla. Fusce aliquam vestibulum ipsum. Curabitur ligula sapien, pulvinar a vestibulum quis, facilisis vel sapien. Nam sed tellus id magna elementum tincidunt. Proin mattis lacinia justo. Nullam eget nisl. Etiam dictum tincidunt diam. Pellentesque arcu.</p>\r\n<p>Duis risus. Nullam eget nisl. Aenean fermentum risus id tortor. Quisque tincidunt scelerisque libero. Nunc dapibus tortor vel mi dapibus sollicitudin. Nulla quis diam. Praesent in mauris eu tortor porttitor accumsan. In dapibus augue non sapien. Etiam bibendum elit eget erat. Et harum quidem rerum facilis est et expedita distinctio.</p>\r\n<p>Vestibulum fermentum tortor id mi. Morbi imperdiet, mauris ac auctor dictum, nisl ligula egestas nulla, et sollicitudin sem purus in lacus. Aliquam erat volutpat. Etiam dui sem, fermentum vitae, sagittis id, malesuada in, quam. Maecenas lorem. Nam quis nulla. Integer tempor. Aliquam erat volutpat. Vivamus porttitor turpis ac leo. Pellentesque ipsum. Cras pede libero, dapibus nec, pretium sit amet, tempor quis. Aenean vel massa quis mauris vehicula lacinia. Nullam eget nisl.</p>\r\n<p>Neque porro quisquam est, qui dolorem ipsum quia dolor sit amet, consectetur, adipisci velit, sed quia non numquam eius modi tempora incidunt ut labore et dolore magnam aliquam quaerat voluptatem. Mauris elementum mauris vitae tortor. Class aptent taciti sociosqu ad litora torquent per conubia nostra, per inceptos hymenaeos. Aliquam ante. Vivamus porttitor turpis ac leo. Nullam lectus justo, vulputate eget mollis sed, tempor sed magna. Nullam at arcu a est sollicitudin euismod. Pellentesque pretium lectus id turpis. In rutrum. Praesent vitae arcu tempor neque lacinia pretium. Vivamus ac leo pretium faucibus. Fusce nibh. Duis bibendum, lectus ut viverra rhoncus, dolor nunc faucibus libero, eget facilisis enim ipsum id lacus. Quisque tincidunt scelerisque libero. Pellentesque ipsum. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. In laoreet, magna id viverra tincidunt, sem odio bibendum justo, vel imperdiet sapien wisi sed libero. Fusce dui leo, imperdiet in, aliquam sit amet, feugiat eu, orci. Etiam bibendum elit eget erat. Maecenas aliquet accumsan leo.</p>',	'2012-08-08 14:08:40',	1,	1,	4),
(2,	1,	NULL,	'Donec vitae arcu',	'donec-vitae-arcu',	'',	'',	'<p>Donec vitae arcu. Nulla accumsan, elit sit amet varius semper, nulla mauris mollis quam, tempor suscipit diam nulla vel leo. Aliquam erat volutpat. Nulla quis diam. Aliquam ante. Pellentesque ipsum. Proin pede metus, vulputate nec, fermentum fringilla, vehicula vitae, justo. Etiam ligula pede, sagittis quis, interdum ultricies, scelerisque eu. Etiam dictum tincidunt diam. Vivamus luctus egestas leo. Praesent in mauris eu tortor porttitor accumsan. Proin pede metus, vulputate nec, fermentum fringilla, vehicula vitae, justo. Nulla pulvinar eleifend sem. Integer malesuada. Suspendisse nisl. Duis pulvinar. Aenean vel massa quis mauris vehicula lacinia. Maecenas fermentum, sem in pharetra pellentesque, velit turpis volutpat ante, in pharetra metus odio a lectus. Etiam quis quam.</p>\r\n<p>Duis bibendum, lectus ut viverra rhoncus, dolor nunc faucibus libero, eget facilisis enim ipsum id lacus. Pellentesque arcu. Praesent dapibus. Maecenas fermentum, sem in pharetra pellentesque, velit turpis volutpat ante, in pharetra metus odio a lectus. Fusce dui leo, imperdiet in, aliquam sit amet, feugiat eu, orci. Integer vulputate sem a nibh rutrum consequat. Proin in tellus sit amet nibh dignissim sagittis. Phasellus faucibus molestie nisl. Sed vel lectus. Donec odio tempus molestie, porttitor ut, iaculis quis, sem. Nulla non arcu lacinia neque faucibus fringilla. Nam sed tellus id magna elementum tincidunt. In dapibus augue non sapien. Etiam posuere lacus quis dolor. Vestibulum erat nulla, ullamcorper nec, rutrum non, nonummy ac, erat.</p>\r\n<p>Pellentesque pretium lectus id turpis. Mauris dictum facilisis augue. Cum sociis natoque penatibus et magnis dis parturient montes, nascetur ridiculus mus. Duis sapien nunc, commodo et, interdum suscipit, sollicitudin et, dolor. Nam libero tempore, cum soluta nobis est eligendi optio cumque nihil impedit quo minus id quod maxime placeat facere possimus, omnis voluptas assumenda est, omnis dolor repellendus. Praesent in mauris eu tortor porttitor accumsan. Nulla pulvinar eleifend sem. Etiam commodo dui eget wisi. Aenean vel massa quis mauris vehicula lacinia. Vivamus ac leo pretium faucibus. Aenean fermentum risus id tortor. Phasellus enim erat, vestibulum vel, aliquam a, posuere eu, velit. Mauris metus. Cum sociis natoque penatibus et magnis dis parturient montes, nascetur ridiculus mus. Morbi leo mi, nonummy eget tristique non, rhoncus non leo.</p>\r\n<p>Temporibus autem quibusdam et aut officiis debitis aut rerum necessitatibus saepe eveniet ut et voluptates repudiandae sint et molestiae non recusandae. Cras elementum. Praesent vitae arcu tempor neque lacinia pretium. Aenean placerat. Maecenas lorem. Sed ac dolor sit amet purus malesuada congue. Et harum quidem rerum facilis est et expedita distinctio. Nullam eget nisl. Nulla pulvinar eleifend sem. Praesent vitae arcu tempor neque lacinia pretium. In sem justo, commodo ut, suscipit at, pharetra vitae, orci. Mauris suscipit, ligula sit amet pharetra semper, nibh ante cursus purus, vel sagittis velit mauris vel metus. Fusce dui leo, imperdiet in, aliquam sit amet, feugiat eu, orci. In enim a arcu imperdiet malesuada. Integer rutrum, orci vestibulum ullamcorper ultricies, lacus quam ultricies odio, vitae placerat pede sem sit amet enim.</p>\r\n<p>Temporibus autem quibusdam et aut officiis debitis aut rerum necessitatibus saepe eveniet ut et voluptates repudiandae sint et molestiae non recusandae. Aliquam erat volutpat. Curabitur bibendum justo non orci. Aliquam ante. Phasellus faucibus molestie nisl. Aenean id metus id velit ullamcorper pulvinar. Mauris tincidunt sem sed arcu. Vestibulum fermentum tortor id mi. Class aptent taciti sociosqu ad litora torquent per conubia nostra, per inceptos hymenaeos. Phasellus faucibus molestie nisl. Vivamus luctus egestas leo. Vivamus porttitor turpis ac leo. Fusce aliquam vestibulum ipsum. Nulla non lectus sed nisl molestie malesuada. Nullam lectus justo, vulputate eget mollis sed, tempor sed magna. Aliquam ornare wisi eu metus. Duis ante orci, molestie vitae vehicula venenatis, tincidunt ac pede. Etiam posuere lacus quis dolor.</p>',	'2012-08-08 14:14:36',	1,	1,	9),
(3,	1,	NULL,	'Nunc auctor',	'nunc-auctor',	'',	'',	'<p>Nunc auctor. Etiam sapien elit, consequat eget, tristique non, venenatis quis, ante. Mauris suscipit, ligula sit amet pharetra semper, nibh ante cursus purus, vel sagittis velit mauris vel metus. Nemo enim ipsam voluptatem quia voluptas sit aspernatur aut odit aut fugit, sed quia consequuntur magni dolores eos qui ratione voluptatem sequi nesciunt. Donec ipsum massa, ullamcorper in, auctor et, scelerisque sed, est. Fusce aliquam vestibulum ipsum. Nullam at arcu a est sollicitudin euismod. Aenean vel massa quis mauris vehicula lacinia. Donec iaculis gravida nulla. Nulla non arcu lacinia neque faucibus fringilla. Nulla non lectus sed nisl molestie malesuada. Vivamus ac leo pretium faucibus. Fusce nibh. Nulla non lectus sed nisl molestie malesuada.</p>\r\n<p>Aenean placerat. Mauris metus. Vestibulum erat nulla, ullamcorper nec, rutrum non, nonummy ac, erat. In enim a arcu imperdiet malesuada. Suspendisse nisl. Aliquam id dolor. In convallis. Nunc dapibus tortor vel mi dapibus sollicitudin. Nam quis nulla. Sed ac dolor sit amet purus malesuada congue. In enim a arcu imperdiet malesuada. Integer lacinia. Curabitur bibendum justo non orci. Pellentesque arcu. Etiam sapien elit, consequat eget, tristique non, venenatis quis, ante. Cras elementum. Pellentesque ipsum. Duis bibendum, lectus ut viverra rhoncus, dolor nunc faucibus libero, eget facilisis enim ipsum id lacus.</p>\r\n<p>Maecenas aliquet accumsan leo. Etiam sapien elit, consequat eget, tristique non, venenatis quis, ante. Nulla turpis magna, cursus sit amet, suscipit a, interdum id, felis. Et harum quidem rerum facilis est et expedita distinctio. Pellentesque ipsum. Quis autem vel eum iure reprehenderit qui in ea voluptate velit esse quam nihil molestiae consequatur, vel illum qui dolorem eum fugiat quo voluptas nulla pariatur? Etiam sapien elit, consequat eget, tristique non, venenatis quis, ante. Integer tempor. Aenean placerat. Fusce consectetuer risus a nunc.</p>\r\n<p>Morbi leo mi, nonummy eget tristique non, rhoncus non leo. Vivamus ac leo pretium faucibus. Ut enim ad minima veniam, quis nostrum exercitationem ullam corporis suscipit laboriosam, nisi ut aliquid ex ea commodi consequatur? Aliquam ante. Aliquam erat volutpat. Integer malesuada. In rutrum. Suspendisse nisl. Vestibulum erat nulla, ullamcorper nec, rutrum non, nonummy ac, erat. Duis bibendum, lectus ut viverra rhoncus, dolor nunc faucibus libero, eget facilisis enim ipsum id lacus. Duis ante orci, molestie vitae vehicula venenatis, tincidunt ac pede. Aliquam ornare wisi eu metus. Maecenas ipsum velit, consectetuer eu lobortis ut, dictum at dui. Proin mattis lacinia justo. In convallis. Phasellus rhoncus.</p>\r\n<p>Etiam quis quam. Etiam sapien elit, consequat eget, tristique non, venenatis quis, ante. Mauris metus. Etiam sapien elit, consequat eget, tristique non, venenatis quis, ante. Etiam dictum tincidunt diam. Quis autem vel eum iure reprehenderit qui in ea voluptate velit esse quam nihil molestiae consequatur, vel illum qui dolorem eum fugiat quo voluptas nulla pariatur? In sem justo, commodo ut, suscipit at, pharetra vitae, orci. Duis sapien nunc, commodo et, interdum suscipit, sollicitudin et, dolor. Aliquam in lorem sit amet leo accumsan lacinia. Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum. Curabitur vitae diam non enim vestibulum interdum. Praesent vitae arcu tempor neque lacinia pretium. Vivamus porttitor turpis ac leo. In enim a arcu imperdiet malesuada. Nunc tincidunt ante vitae massa. Nulla pulvinar eleifend sem. Aliquam erat volutpat. Nam quis nulla. Maecenas libero. Fusce suscipit libero eget elit.</p>',	'2012-08-08 14:15:31',	1,	1,	5),
(6,	1,	NULL,	'Nullam dapibus fermentum ipsum',	'nullam-dapibus-fermentum-ipsum',	'',	'',	'<p>Nullam dapibus fermentum ipsum. Suspendisse sagittis ultrices augue. Duis sapien nunc, commodo et, interdum suscipit, sollicitudin et, dolor. Temporibus autem quibusdam et aut officiis debitis aut rerum necessitatibus saepe eveniet ut et voluptates repudiandae sint et molestiae non recusandae. Pellentesque pretium lectus id turpis. Phasellus enim erat, vestibulum vel, aliquam a, posuere eu, velit. Nullam eget nisl. Curabitur bibendum justo non orci. Ut enim ad minima veniam, quis nostrum exercitationem ullam corporis suscipit laboriosam, nisi ut aliquid ex ea commodi consequatur? Duis viverra diam non justo.</p>\r\n<p>Maecenas aliquet accumsan leo. Curabitur bibendum justo non orci. Phasellus faucibus molestie nisl. Nullam lectus justo, vulputate eget mollis sed, tempor sed magna. Cras pede libero, dapibus nec, pretium sit amet, tempor quis. Class aptent taciti sociosqu ad litora torquent per conubia nostra, per inceptos hymenaeos. Fusce tellus. Ut tempus purus at lorem. Fusce wisi. Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum. Maecenas libero. Pellentesque ipsum. Phasellus faucibus molestie nisl. Ut tempus purus at lorem. Temporibus autem quibusdam et aut officiis debitis aut rerum necessitatibus saepe eveniet ut et voluptates repudiandae sint et molestiae non recusandae. Ut enim ad minima veniam, quis nostrum exercitationem ullam corporis suscipit laboriosam, nisi ut aliquid ex ea commodi consequatur? Aliquam ornare wisi eu metus.</p>\r\n<p>Curabitur bibendum justo non orci. Maecenas libero. Vestibulum erat nulla, ullamcorper nec, rutrum non, nonummy ac, erat. Curabitur sagittis hendrerit ante. Pellentesque arcu. Aliquam in lorem sit amet leo accumsan lacinia. Donec ipsum massa, ullamcorper in, auctor et, scelerisque sed, est. Sed elit dui, pellentesque a, faucibus vel, interdum nec, diam. Fusce wisi. Etiam ligula pede, sagittis quis, interdum ultricies, scelerisque eu.</p>\r\n<p>Cum sociis natoque penatibus et magnis dis parturient montes, nascetur ridiculus mus. Integer rutrum, orci vestibulum ullamcorper ultricies, lacus quam ultricies odio, vitae placerat pede sem sit amet enim. Integer lacinia. Integer imperdiet lectus quis justo. Duis risus. Donec quis nibh at felis congue commodo. Sed ut perspiciatis unde omnis iste natus error sit voluptatem accusantium doloremque laudantium, totam rem aperiam, eaque ipsa quae ab illo inventore veritatis et quasi architecto beatae vitae dicta sunt explicabo. Pellentesque sapien. Aenean fermentum risus id tortor. Integer malesuada. Donec ipsum massa, ullamcorper in, auctor et, scelerisque sed, est.</p>\r\n<p>Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Nullam at arcu a est sollicitudin euismod. Pellentesque ipsum. Fusce nibh. Lorem ipsum dolor sit amet, consectetuer adipiscing elit. Aliquam ante. Aliquam erat volutpat. Nullam faucibus mi quis velit. Ut tempus purus at lorem. Nemo enim ipsam voluptatem quia voluptas sit aspernatur aut odit aut fugit, sed quia consequuntur magni dolores eos qui ratione voluptatem sequi nesciunt. Phasellus enim erat, vestibulum vel, aliquam a, posuere eu, velit. Quisque porta. Phasellus enim erat, vestibulum vel, aliquam a, posuere eu, velit.</p>',	'2012-08-08 14:17:27',	1,	0,	10),
(7,	1,	NULL,	'Aliquam ante',	'aliquam-ante',	'',	'',	'<p>Aliquam ante. Nullam dapibus fermentum ipsum. Etiam egestas wisi a erat. Etiam dictum tincidunt diam. Etiam commodo dui eget wisi. Mauris elementum mauris vitae tortor. Nunc tincidunt ante vitae massa. Proin pede metus, vulputate nec, fermentum fringilla, vehicula vitae, justo. Maecenas sollicitudin. Cum sociis natoque penatibus et magnis dis parturient montes, nascetur ridiculus mus. In dapibus augue non sapien.</p>\r\n<p>Nullam sapien sem, ornare ac, nonummy non, lobortis a enim. Ut tempus purus at lorem. Mauris elementum mauris vitae tortor. Etiam dui sem, fermentum vitae, sagittis id, malesuada in, quam. Fusce consectetuer risus a nunc. Fusce wisi. Aliquam in lorem sit amet leo accumsan lacinia. Sed ac dolor sit amet purus malesuada congue. Aenean placerat. Aliquam erat volutpat. Etiam egestas wisi a erat. Aenean placerat. Morbi leo mi, nonummy eget tristique non, rhoncus non leo. Etiam bibendum elit eget erat. Aliquam id dolor. Ut enim ad minima veniam, quis nostrum exercitationem ullam corporis suscipit laboriosam, nisi ut aliquid ex ea commodi consequatur?</p>\r\n<p>Nulla pulvinar eleifend sem. Donec iaculis gravida nulla. Mauris dictum facilisis augue. Fusce tellus odio, dapibus id fermentum quis, suscipit id erat. Lorem ipsum dolor sit amet, consectetuer adipiscing elit. Sed convallis magna eu sem. Nemo enim ipsam voluptatem quia voluptas sit aspernatur aut odit aut fugit, sed quia consequuntur magni dolores eos qui ratione voluptatem sequi nesciunt. Neque porro quisquam est, qui dolorem ipsum quia dolor sit amet, consectetur, adipisci velit, sed quia non numquam eius modi tempora incidunt ut labore et dolore magnam aliquam quaerat voluptatem. Maecenas aliquet accumsan leo. Nulla est. Nullam rhoncus aliquam metus.</p>\r\n<p>Etiam sapien elit, consequat eget, tristique non, venenatis quis, ante. Duis pulvinar. Pellentesque arcu. Etiam egestas wisi a erat. Aliquam erat volutpat. Sed vel lectus. Donec odio tempus molestie, porttitor ut, iaculis quis, sem. Nam libero tempore, cum soluta nobis est eligendi optio cumque nihil impedit quo minus id quod maxime placeat facere possimus, omnis voluptas assumenda est, omnis dolor repellendus. Integer imperdiet lectus quis justo. Etiam egestas wisi a erat. Praesent vitae arcu tempor neque lacinia pretium. Pellentesque pretium lectus id turpis. Nullam lectus justo, vulputate eget mollis sed, tempor sed magna. Nullam eget nisl. Vivamus luctus egestas leo. Nemo enim ipsam voluptatem quia voluptas sit aspernatur aut odit aut fugit, sed quia consequuntur magni dolores eos qui ratione voluptatem sequi nesciunt. Duis ante orci, molestie vitae vehicula venenatis, tincidunt ac pede. Etiam sapien elit, consequat eget, tristique non, venenatis quis, ante. Nunc dapibus tortor vel mi dapibus sollicitudin.</p>\r\n<p>Nam quis nulla. Aliquam erat volutpat. Praesent id justo in neque elementum ultrices. Nullam lectus justo, vulputate eget mollis sed, tempor sed magna. Aliquam erat volutpat. Fusce aliquam vestibulum ipsum. Fusce suscipit libero eget elit. Aliquam in lorem sit amet leo accumsan lacinia. Vivamus ac leo pretium faucibus. Phasellus faucibus molestie nisl. Nullam justo enim, consectetuer nec, ullamcorper ac, vestibulum in, elit. Proin in tellus sit amet nibh dignissim sagittis. Cum sociis natoque penatibus et magnis dis parturient montes, nascetur ridiculus mus. Mauris metus. Nullam at arcu a est sollicitudin euismod. Aliquam in lorem sit amet leo accumsan lacinia. Aenean fermentum risus id tortor. In dapibus augue non sapien. Quisque tincidunt scelerisque libero.</p>',	'2012-08-08 14:18:40',	1,	0,	6);

DROP TABLE IF EXISTS `flame_post_tag`;
CREATE TABLE `flame_post_tag` (
  `post_id` int(11) NOT NULL,
  `tag_id` int(11) NOT NULL,
  PRIMARY KEY (`post_id`,`tag_id`),
  KEY `IDX_BC9381AF4B89032C` (`post_id`),
  KEY `IDX_BC9381AFBAD26311` (`tag_id`),
  CONSTRAINT `FK_BC9381AF4B89032C` FOREIGN KEY (`post_id`) REFERENCES `flame_post` (`id`) ON DELETE CASCADE,
  CONSTRAINT `FK_BC9381AFBAD26311` FOREIGN KEY (`tag_id`) REFERENCES `flame_tag` (`id`) ON DELETE CASCADE
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

INSERT INTO `flame_post_tag` (`post_id`, `tag_id`) VALUES
(1,	2),
(1,	3),
(2,	4),
(2,	5),
(2,	6),
(3,	7),
(3,	8),
(6,	2),
(6,	5),
(6,	7),
(7,	3),
(7,	5),
(7,	12);

DROP TABLE IF EXISTS `flame_tag`;
CREATE TABLE `flame_tag` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(100) COLLATE utf8_unicode_ci NOT NULL,
  `slug` varchar(100) COLLATE utf8_unicode_ci NOT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `UNIQ_E9EB8BF95E237E06` (`name`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

INSERT INTO `flame_tag` (`id`, `name`, `slug`) VALUES
(2,	'dolor',	'dolor'),
(3,	'felis',	'felis'),
(4,	'Donec',	'donec'),
(5,	'vitae',	'vitae'),
(6,	'arcu',	'arcu'),
(7,	'Nunc',	'nunc'),
(8,	'auctor',	'auctor'),
(10,	'scelerisque',	'scelerisque'),
(12,	'Aliquam ante',	'aliquam-ante'),
(14,	'impecto',	'impecto');

DROP TABLE IF EXISTS `flame_user`;
CREATE TABLE `flame_user` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `info_id` int(11) DEFAULT NULL,
  `password` varchar(128) COLLATE utf8_unicode_ci NOT NULL,
  `role` varchar(25) COLLATE utf8_unicode_ci NOT NULL,
  `email` varchar(100) COLLATE utf8_unicode_ci NOT NULL,
  `facebook` varchar(50) COLLATE utf8_unicode_ci DEFAULT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `UNIQ_3DA92C57E7927C74` (`email`),
  UNIQUE KEY `UNIQ_3DA92C575D8BC1F8` (`info_id`),
  CONSTRAINT `FK_3DA92C575D8BC1F8` FOREIGN KEY (`info_id`) REFERENCES `flame_user_info` (`id`) ON DELETE CASCADE
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

INSERT INTO `flame_user` (`id`, `info_id`, `password`, `role`, `email`, `facebook`) VALUES
(1,	NULL,	'$2a$07$8237dee42f4370e9015dbOkJ.dMdxysALY0pC2YtQLfc8NwppXM/i',	'administrator',	'user@demo.com',	NULL);

DROP TABLE IF EXISTS `flame_user_info`;
CREATE TABLE `flame_user_info` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(250) COLLATE utf8_unicode_ci NOT NULL,
  `about` varchar(500) COLLATE utf8_unicode_ci NOT NULL,
  `birthday` date NOT NULL,
  `web` varchar(150) COLLATE utf8_unicode_ci NOT NULL,
  `facebook` varchar(100) COLLATE utf8_unicode_ci NOT NULL,
  `twitter` varchar(100) COLLATE utf8_unicode_ci NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;


-- 2012-11-21 21:34:16
