 
-- -- 
-- SELECT * FROM `tasks` WHERE 1;
-- INSERT INTO `tasks` (`dt_add`) VALUES (`2019-07-03`);
-- INSERT INTO `tasks` (`category_id`) VALUES (`3`);
-- INSERT INTO `tasks` (`description`) VALUES (`Nam ultrices, libero non mattis pulvinar, nulla pede ullamcorper augue, a suscipit nulla elit ac nulla. Sed vel enim sit amet nunc viverra dapibus. Nulla suscipit ligula in lacus.Curabitur at ipsum ac tellus semper interdum. Mauris ullamcorper purus sit amet nulla. Quisque arcu libero, rutrum ac, lobortis vel, dapibus at, diam.`);
-- INSERT INTO `tasks` (`expire`) VALUES (`2019-12-07`);
-- INSERT INTO `tasks` (`name`) VALUES (`exploit revolutionary portals`);
-- INSERT INTO `tasks` (`address`) VALUES (`24043 Paget Alley`);
-- INSERT INTO `tasks` (`budget`) VALUES (`2904`);
-- INSERT INTO `tasks` (`lat`) VALUES (`5.623505`);
-- INSERT INTO `tasks` (`long`) VALUES (`10.2544044`);

-- -- 	sql mode
-- -- ONLY_FULL_GROUP_BY,STRICT_TRANS_TABLES,NO_ZERO_IN_DATE,NO_ZERO_DATE,ERROR_FOR_DIVISION_BY_ZERO,NO_ENGINE_SUBSTITUTION

-- ALTER TABLE `tasks` ADD `status` VARCHAR(15) NOT NULL AFTER `description`;

CREATE SCHEMA IF NOT EXISTS `task_force` DEFAULT CHARACTER SET utf8 DEFAULT COLLATE utf8_general_ci;

USE `task_force`;

CREATE TABLE IF NOT EXISTS `task_force`.`categories` (
    `id` INT UNSIGNED NOT NULL AUTO_INCREMENT,
    `name` VARCHAR(45) NULL,
    `icon` VARCHAR(45) NOT NULL,
    PRIMARY KEY (`id`)
);

CREATE TABLE IF NOT EXISTS `task_force`.`cities` (
    `id` INT UNSIGNED NOT NULL AUTO_INCREMENT,
    `city` VARCHAR(45) NULL,
    `lat` VARCHAR(15) NULL,
    `long` VARCHAR(15) NULL,
    PRIMARY KEY (`id`)
);

CREATE TABLE IF NOT EXISTS `task_force`.`opinions` (
    `id` INT UNSIGNED NOT NULL AUTO_INCREMENT,
    `dt_add` TIMESTAMP DEFAULT CURRENT_TIMESTAMP NOT NULL,
    `rate` INT NOT NULL, 
    `description` VARCHAR(255) NULL,
    PRIMARY KEY (`id`)
);

CREATE TABLE IF NOT EXISTS `task_force`.`profiles` (
    `id` INT UNSIGNED NOT NULL AUTO_INCREMENT,
    `address` VARCHAR(255) NULL,
    `bd` INT NOT NULL,
    `about` VARCHAR(255) NULL,
    `phone` VARCHAR(15) NULL,
    `skype` VARCHAR(50) NULL,
    `role` VARCHAR(15) NOT NULL,
    `user_id` INT NOT NULL,
    PRIMARY KEY (`id`)
);

CREATE TABLE IF NOT EXISTS `task_force`.`replies` (
    `id` INT UNSIGNED NOT NULL AUTO_INCREMENT,
    `dt_add` TIMESTAMP DEFAULT CURRENT_TIMESTAMP NOT NULL,
    `rate` INT NOT NULL, 
    `description` VARCHAR(255) NULL,
    PRIMARY KEY (`id`)
);

CREATE TABLE IF NOT EXISTS `task_force`.`tasks` (
    `id` INT UNSIGNED NOT NULL AUTO_INCREMENT,
    `dt_add` TIMESTAMP DEFAULT CURRENT_TIMESTAMP NOT NULL,
    `category_id` INT NOT NULL,
    `description` VARCHAR(255) NULL,
    `status` VARCHAR(15) NULL,
    `expire` TIMESTAMP DEFAULT CURRENT_TIMESTAMP NOT NULL,
    `name` VARCHAR(45) NULL,
    `address` VARCHAR(255) NULL,
    `budget` INT NOT NULL,
    `lat` VARCHAR(15) NULL,
    `long` VARCHAR(15) NULL,
    PRIMARY KEY (`id`)
);

CREATE TABLE IF NOT EXISTS `task_force`.`users` (
    `id` INT UNSIGNED NOT NULL AUTO_INCREMENT,
    `name` VARCHAR(45) NULL,
    `email` VARCHAR(45) NULL,
    `password` VARCHAR(45) NULL,
    `dt_add` TIMESTAMP DEFAULT CURRENT_TIMESTAMP NOT NULL,
    `last_visit` TIMESTAMP DEFAULT CURRENT_TIMESTAMP NOT NULL,
    `reviews` INT NOT NULL,
    `tasks` INT NOT NULL,
    `description` VARCHAR(255) NULL,
    `rate` INT NOT NULL, 
    `spec` VARCHAR(45) NULL,
    `role` VARCHAR(15) NOT NULL,
    PRIMARY KEY (`id`)
);

-- ALTER TABLE `users` ADD `last_visit` TIMESTAMP DEFAULT CURRENT_TIMESTAMP NOT NULL AFTER `dt_add`;
-- ALTER TABLE `users` ADD `reviews` INT NOT NULL AFTER `last_visit`;
-- ALTER TABLE `users` ADD `tasks` INT NOT NULL AFTER `reviews`;
-- ALTER TABLE `users` ADD `description` VARCHAR(255) NULL AFTER `tasks`;
-- ALTER TABLE `users` ADD `rate` INT NOT NULL AFTER `description`;
-- ALTER TABLE `users` ADD `spec` VARCHAR(45) NULL AFTER `rate`;
-- ALTER TABLE `users` ADD `role` VARCHAR(15) NOT NULL AFTER `spec`;
