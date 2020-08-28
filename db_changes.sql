/* 24th July 2020 By Athul */

ALTER TABLE `sponsors` ADD `email` VARCHAR(255) NOT NULL AFTER `sponsors_id`, ADD `password` VARCHAR(255) NOT NULL AFTER `email`;
ALTER TABLE `sponsors` ADD UNIQUE(`email`);
ALTER TABLE `sponsors` ADD `about` TEXT NULL AFTER `company_name`,
                       ADD `website` VARCHAR(255) NULL AFTER `password`,
                       ADD `facebook_id` VARCHAR(255) NULL AFTER `twitter_id`,
                       ADD `linkedin_id` VARCHAR(255) NULL AFTER `facebook_id`;

/*----- End of 24th July changes -------*/

