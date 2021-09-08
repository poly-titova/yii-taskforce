DROP SCHEMA IF EXISTS `task_force`;

CREATE SCHEMA IF NOT EXISTS `task_force` DEFAULT CHARACTER SET utf8 DEFAULT COLLATE utf8_general_ci;

USE `task_force`;

CREATE TABLE IF NOT EXISTS `task_force`.`cities` (
    `id` INT UNSIGNED NOT NULL AUTO_INCREMENT,
    `city` VARCHAR(45) NULL,
    `lat` VARCHAR(15) NULL,
    `long` VARCHAR(15) NULL,
    PRIMARY KEY (`id`)
);

CREATE TABLE IF NOT EXISTS `task_force`.`categories` (
    `id` INT UNSIGNED NOT NULL AUTO_INCREMENT,
    `name` VARCHAR(45) NULL,
    `icon` VARCHAR(45) NOT NULL,
    PRIMARY KEY (`id`)
);

CREATE TABLE IF NOT EXISTS `task_force`.`users` (
    `id` INT UNSIGNED NOT NULL AUTO_INCREMENT,
    `name` VARCHAR(45) NOT NULL,
    `email` VARCHAR(45) NOT NULL,
    `password` VARCHAR(45) NOT NULL,
    `dt_add` TIMESTAMP DEFAULT CURRENT_TIMESTAMP NOT NULL,
    `last_visit` TIMESTAMP DEFAULT CURRENT_TIMESTAMP NOT NULL,
    `description` VARCHAR(255) DEFAULT NULL,
    `bd` TIMESTAMP DEFAULT CURRENT_TIMESTAMP NOT NULL,
    `address` VARCHAR(255) DEFAULT NULL,
    `phone` VARCHAR(15) DEFAULT NULL,
    `skype` VARCHAR(50) DEFAULT NULL,
    `role` VARCHAR(15) DEFAULT 'executor' NOT NULL,
    `rate` INT DEFAULT NULL, 
    `favorite` INT DEFAULT 0,
    PRIMARY KEY (`id`)
);

CREATE TABLE IF NOT EXISTS `task_force`.`users_categories` (
    `user_id` INT UNSIGNED NOT NULL,
    `category_id` INT UNSIGNED NOT NULL,

    FOREIGN KEY (`user_id`) REFERENCES `users` (`id`),
    FOREIGN KEY (`category_id`) REFERENCES `categories` (`id`)
);

CREATE TABLE IF NOT EXISTS `task_force`.`tasks` (
    `id` INT UNSIGNED NOT NULL AUTO_INCREMENT,
    `executor_id` INT UNSIGNED NOT NULL,
    `customer_id` INT UNSIGNED NOT NULL,
    `dt_add` TIMESTAMP DEFAULT CURRENT_TIMESTAMP NOT NULL,
    `category_id` INT UNSIGNED NOT NULL,
    `description` VARCHAR(255) DEFAULT NULL,
    `status` VARCHAR(15) DEFAULT 'new' NULL,
    `expire` TIMESTAMP DEFAULT CURRENT_TIMESTAMP NOT NULL,
    `name` VARCHAR(45) NOT NULL,
    `address` VARCHAR(255) DEFAULT NULL,
    `budget` INT NOT NULL,
    `lat` VARCHAR(15) DEFAULT NULL,
    `long` VARCHAR(15) DEFAULT NULL,
    `opinions` INT DEFAULT NULL,

    FOREIGN KEY (`executor_id`) REFERENCES `users` (`id`),
    FOREIGN KEY (`customer_id`) REFERENCES `users` (`id`),
    FOREIGN KEY (`category_id`) REFERENCES `categories` (`id`),
    PRIMARY KEY (`id`)
);

CREATE TABLE IF NOT EXISTS `task_force`.`replies` (
    `id` INT UNSIGNED NOT NULL AUTO_INCREMENT,
    `executor_id` INT UNSIGNED NOT NULL,
    `description` VARCHAR(255) DEFAULT NULL,
    `task_id` INT UNSIGNED NOT NULL,
    `dt_add` TIMESTAMP DEFAULT CURRENT_TIMESTAMP NOT NULL,

    FOREIGN KEY (`executor_id`) REFERENCES `users` (`id`),
    FOREIGN KEY (`task_id`) REFERENCES `tasks` (`id`),
    PRIMARY KEY (`id`)
);

CREATE TABLE IF NOT EXISTS `task_force`.`opinions` (
    `id` INT UNSIGNED NOT NULL AUTO_INCREMENT,
    `dt_add` TIMESTAMP DEFAULT CURRENT_TIMESTAMP NOT NULL,
    `rate` INT DEFAULT NULL, 
    `description` VARCHAR(255) DEFAULT NULL,
    `task_id` INT UNSIGNED NOT NULL,
    `user_id` INT UNSIGNED NOT NULL,

    FOREIGN KEY (`task_id`) REFERENCES `tasks` (`id`),
    FOREIGN KEY (`user_id`) REFERENCES `users` (`id`),
    PRIMARY KEY (`id`)
);

CREATE TABLE IF NOT EXISTS `task_force`.`reviews` (
    `id` INT UNSIGNED NOT NULL AUTO_INCREMENT,
    `executor_id` INT UNSIGNED NOT NULL,
    `customer_id` INT UNSIGNED NOT NULL,
    `description` VARCHAR(255) DEFAULT NULL,
    `rate` INT NOT NULL, 

    FOREIGN KEY (`executor_id`) REFERENCES `users` (`id`),
    FOREIGN KEY (`customer_id`) REFERENCES `users` (`id`),
    PRIMARY KEY (`id`, `executor_id`, `customer_id`)
);
