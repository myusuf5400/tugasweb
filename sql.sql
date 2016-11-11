
CREATE TABLE Tag
(
	id_tag               INTEGER AUTO_INCREMENT,
	name_tag             VARCHAR(20) NULL,
	number_images        INTEGER NULL,
	PRIMARY KEY (id_tag)
);



CREATE TABLE User
(
	id_user              INTEGER AUTO_INCREMENT,
	username             VARCHAR(40) NULL,
	password             VARCHAR(40) NULL,
	first_name           VARCHAR(20) NULL,
	last_name            VARCHAR(20) NULL,
	email                VARCHAR(50) NULL,
	url_avatar	     VARCHAR(32) NULL,
	deleted              boolean NULL,
	level                TINYINT NULL,
	timestamp_created    TIMESTAMP NULL,
	timestamp_deleted    TIMESTAMP NULL,
	PRIMARY KEY (id_user)
);



CREATE TABLE Image
(
	id_image             INTEGER AUTO_INCREMENT,
	id_user              INTEGER NULL,
	name_image           VARCHAR(50) NULL,
	description          TEXT NULL,
	url_image	     VARCHAR(32) NULL,
	deleted              boolean NULL,
	timestamp_created    TIMESTAMP NULL,
	timestamp_deleted    TIMESTAMP NULL,
	PRIMARY KEY (id_image),
	FOREIGN KEY R_1 (id_user) REFERENCES User (id_user)
);



CREATE TABLE Tag_Image
(
	id_tag               INTEGER NOT NULL,
	id_image             INTEGER NOT NULL,
	FOREIGN KEY R_5 (id_tag) REFERENCES Tag (id_tag),
	FOREIGN KEY R_9 (id_image) REFERENCES Image (id_image)
);

--
-- Triggers `tag_image`
--
DELIMITER $$
CREATE TRIGGER `count_tag_image` AFTER INSERT ON `tag_image` FOR EACH ROW UPDATE `tag` SET `number_images` = `number_images`+1 WHERE `tag`.`id_tag` = `id_tag`
$$
DELIMITER ;

-- --------------------------------------------------------



CREATE TABLE Category
(
	id_category          INTEGER AUTO_INCREMENT,
	name_category        VARCHAR(20) NULL,
	number_images        INTEGER NULL,
	PRIMARY KEY (id_category)
);



CREATE TABLE Image_Category
(
	id_image             INTEGER NOT NULL,
	id_category          INTEGER NOT NULL,
	FOREIGN KEY R_4 (id_image) REFERENCES Image (id_image),
	FOREIGN KEY R_7 (id_category) REFERENCES Category (id_category)
);

--
-- Triggers `image_category`
--
DELIMITER $$
CREATE TRIGGER `count_image_category` AFTER INSERT ON `image_category` FOR EACH ROW UPDATE `category` SET `number_images` = `number_images`+1 WHERE `category`.`id_category` = `id_category`
$$
DELIMITER ;

-- --------------------------------------------------------




CREATE TABLE Stat
(
	id_stat              INTEGER AUTO_INCREMENT,
	id_image             INTEGER NOT NULL,
	stat                 TINYINT NULL,
	PRIMARY KEY (id_stat),
	FOREIGN KEY R_10 (id_image) REFERENCES Image (id_image)
);



CREATE TABLE Comment
(
	id_comment           INTEGER AUTO_INCREMENT,
	id_image             INTEGER NOT NULL,
	comment              TEXT NULL,
	id_comment_parent    INTEGER NULL,
	deleted              boolean NULL,
	timestamp_created    TIMESTAMP NULL,
	timestamp_deleted    TIMESTAMP NULL,
	PRIMARY KEY (id_comment),
	FOREIGN KEY R_8 (id_image) REFERENCES Image (id_image)
);