# SQL file for Google App Module

CREATE TABLE `google_app` (
   `google_app_id` mediumint(8) unsigned NOT NULL,
   `course_id` mediumint(8) unsigned NOT NULL,
   `value` VARCHAR( 30 ) NOT NULL ,
   PRIMARY KEY ( `google_app_id` )
); 

# Table for Google App Module Admin Settings

CREATE TABLE  `my_admin_settings` (
  `idx` INT UNIQUE ,
  `flags` VARCHAR( 20 ) NOT NULL ,
  PRIMARY KEY (  `idx` )
) ENGINE = MYISAM ;

INSERT INTO `language_text` VALUES ('en', '_module','google_app','Google App',NOW(),'');
INSERT INTO `language_text` VALUES ('en', '_module','google_app_text','Google App - Details',NOW(),'');

# Execution messages
INSERT INTO `language_text` VALUES ('en', '_msgs','AT_FEEDBACK_ADMIN_SETTINGS_SAVED_SUCCESSFULLY','Desired admin settings have been applied.',NOW(),'');

