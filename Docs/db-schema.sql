

-- ************************
-- *******DB SCHEMA********
-- ************************

--adverttbl	
CREATE TABLE `adverttbl` (
 `id` int(11) NOT NULL AUTO_INCREMENT,
 `placeholder_1` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
 `placeholder_2` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
 `url` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
 `created_at` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP,
 PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci

--blogtagstbl	

CREATE TABLE `blogtagstbl` (
 `id` int(11) NOT NULL AUTO_INCREMENT,
 `blog_id` int(11) NOT NULL,
 `tags` varchar(100) COLLATE utf8_unicode_ci NOT NULL,
 `created_at` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP,
 PRIMARY KEY (`id`),
 KEY `blog_id` (`blog_id`),
 CONSTRAINT `blogtagstbl_ibfk_1` FOREIGN KEY (`blog_id`) REFERENCES `blogtbl` (`id`) ON DELETE CASCADE
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci

--blogtbl	
CREATE TABLE `blogtbl` (
 `id` int(11) NOT NULL AUTO_INCREMENT,
 `title` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
 `posted_by` varchar(150) COLLATE utf8_unicode_ci NOT NULL,
 `post_time` datetime NOT NULL,
 `description` text COLLATE utf8_unicode_ci NOT NULL,
 `image` text COLLATE utf8_unicode_ci NOT NULL,
 `created_at` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP,
 PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci

--blogviewstbl	
CREATE TABLE `blogviewstbl` (
 `id` int(11) NOT NULL AUTO_INCREMENT,
 `blog_id` int(11) NOT NULL,
 `user_ip` varchar(150) COLLATE utf8_unicode_ci NOT NULL,
 `created_at` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP,
 PRIMARY KEY (`id`),
 KEY `blog_id` (`blog_id`),
 CONSTRAINT `blogviewstbl_ibfk_1` FOREIGN KEY (`blog_id`) REFERENCES `blogtbl` (`id`) ON DELETE CASCADE
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci

--confessionsrstbl	
CREATE TABLE `confessionsrstbl` (
 `id` int(11) NOT NULL AUTO_INCREMENT,
 `confession_id` int(11) NOT NULL,
 `rs_image` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
 `rs_audio` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
 `rs_pdf` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
 `created_at` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP,
 PRIMARY KEY (`id`),
 KEY `confession_id` (`confession_id`),
 CONSTRAINT `confessionsrstbl_ibfk_1` FOREIGN KEY (`confession_id`) REFERENCES `confessionstbl` (`id`) ON DELETE CASCADE
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci

--confessionstbl	
CREATE TABLE `confessionstbl` (
 `id` int(11) NOT NULL AUTO_INCREMENT,
 `title` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
 `posted_by` varchar(150) COLLATE utf8_unicode_ci NOT NULL,
 `post_time` datetime NOT NULL,
 `description` text COLLATE utf8_unicode_ci NOT NULL,
 `image` text COLLATE utf8_unicode_ci NOT NULL,
 `created_at` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP,
 PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci

--confessionviewstbl	
CREATE TABLE `confessionviewstbl` (
 `id` int(11) NOT NULL AUTO_INCREMENT,
 `confession_id` int(11) NOT NULL,
 `user_ip` varchar(150) COLLATE utf8_unicode_ci NOT NULL,
 `created_at` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP,
 PRIMARY KEY (`id`),
 KEY `confession_id` (`confession_id`),
 CONSTRAINT `confessionviewstbl_ibfk_1` FOREIGN KEY (`confession_id`) REFERENCES `confessionstbl` (`id`) ON DELETE CASCADE
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci

--givetbl	
CREATE TABLE `givetbl` (
 `id` int(11) NOT NULL AUTO_INCREMENT,
 `email` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
 `purpose` varchar(100) COLLATE utf8_unicode_ci NOT NULL,
 `amount` decimal(10,2) NOT NULL,
 `created_at` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP,
 PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci

--messagetbl	
CREATE TABLE `messagetbl` (
 `id` int(11) NOT NULL AUTO_INCREMENT,
 `sermon_id` int(11) NOT NULL,
 `title` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
 `sermon_by` varchar(150) COLLATE utf8_unicode_ci NOT NULL,
 `duration` varchar(30) COLLATE utf8_unicode_ci NOT NULL,
 `path` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
 `created_at` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP,
 PRIMARY KEY (`id`),
 KEY `sermon_id` (`sermon_id`),
 CONSTRAINT `messagetbl_ibfk_1` FOREIGN KEY (`sermon_id`) REFERENCES `sermontbl` (`id`) ON DELETE CASCADE
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci

--sermontbl	
CREATE TABLE `sermontbl` (
 `id` int(11) NOT NULL AUTO_INCREMENT,
 `title` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
 `source` varchar(150) COLLATE utf8_unicode_ci NOT NULL,
 `created_at` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP,
 PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci

--usertbl	
CREATE TABLE `usertbl` (
 `id` int(11) NOT NULL AUTO_INCREMENT,
 `username` varchar(150) COLLATE utf8_unicode_ci NOT NULL,
 `password` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
 `email` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
 `phone` varchar(50) COLLATE utf8_unicode_ci NOT NULL,
 `privilege` varchar(50) COLLATE utf8_unicode_ci NOT NULL,
 `created_at` datetime DEFAULT NULL,
 PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci
Open new phpMyAdmin window