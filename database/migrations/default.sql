CREATE TABLE `users` (
    `id` int(11) unsigned NOT NULL AUTO_INCREMENT,
    `first_name` varchar(255),
    `last_name` varchar(255),
    `email` varchar(255),
    `password` varchar(255),
    `gender` varchar(255),
    `date_of_birth` varchar(255),
PRIMARY KEY (`id`)
);
