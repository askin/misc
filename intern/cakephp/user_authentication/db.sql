DROP TABLE IF EXISTS `users`;

CREATE TABLE `users` (
  `id` INTEGER(10) UNSIGNED NOT NULL AUTO_INCREMENT,
  `username` VARCHAR(20) NOT NULL,
  `password` VARCHAR(40) NOT NULL,
  `email` VARCHAR(40) NULL,
  `created` DATETIME NULL,
  PRIMARY KEY(`id`)
);

INSERT INTO `users` (`id`, `username`, `password`, `email`, `created`) VALUES ('1', 'kelebek', MD5('kelebek'), 'askin@askin.ws', NOW());

/* First, create our posts table: */
CREATE TABLE posts (
    id INT UNSIGNED AUTO_INCREMENT PRIMARY KEY,
    title VARCHAR(50),
    body TEXT,
    created DATETIME DEFAULT NULL,
    modified DATETIME DEFAULT NULL
);

/* Then insert some posts for testing: */
INSERT INTO posts (title,body,created)
    VALUES ('The title', 'This is the post body.', NOW());
INSERT INTO posts (title,body,created)
    VALUES ('A title once again', 'And the post body follows.', NOW());
INSERT INTO posts (title,body,created)
    VALUES ('Title strikes back', 'This is really exciting! Not.', NOW());