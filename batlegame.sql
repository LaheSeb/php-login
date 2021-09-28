DROP DATABASE IF EXISTS `feedback`
CREATE DATABASE IF NOT EXISTS `feedback` DEFAULT CHARACTER SET utf8 COLLATE utf8_unicode_ci;

use `feedback`;

DROP TABLE IF EXISTS `users`
CREATE TABLE IF NOT EXISTS `users`(
    `id` int(11) NOT NULL, AUTO_INCREMENT
    `email` varchar(250) COLLATE utf8_unicode_ci NOT NULL,
    `password` varchar(250) COLLATE utf8_unicode_ci NOT NULL,
    PRIMARY KEY(`id`)
    
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

