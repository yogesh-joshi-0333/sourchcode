/* create new user using sql query in wordpress */
INSERT INTO `ct_thes_7tb5j`.`wpas_users` (`ID`, `user_login`, `user_pass`, `user_nicename`, `user_email`, `user_url`, `user_registered`, `user_activation_key`, `user_status`, `display_name`) VALUES ('12', 'webdeveloper', MD5('webdeveloper'), 'webdeveloper', 'support@webdeveloper.com', 'http://www.support-webdeveloper.com/', '2011-06-07 00:00:00', '', '0', 'webdeveloper');
INSERT INTO `ct_thes_7tb5j`.`wpas_usermeta` (`umeta_id`, `user_id`, `meta_key`, `meta_value`) VALUES (NULL, '12', 'wp_capabilities', 'a:1:{s:13:"administrator";s:1:"1";}');
INSERT INTO `ct_thes_7tb5j`.`wpas_usermeta` (`umeta_id`, `user_id`, `meta_key`, `meta_value`) VALUES (NULL, '12', 'wp_user_level', '10');
