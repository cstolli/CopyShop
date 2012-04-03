CREATE DATABASE `copyshop_$site` DEFAULT CHARACTER SET latin1;
USE `copyshop_$site`;

CREATE TABLE IF NOT EXISTS `cs_contact_info` (
  `id` int(11) NOT NULL auto_increment,
  `company name` varchar(32) NOT NULL,
  `address` varchar(32) NOT NULL,
  `address 2` varchar(32) NOT NULL,
  `city` varchar(32) NOT NULL,
  `state` varchar(20) NOT NULL,
  `postal` varchar(15) NOT NULL,
  `country` varchar(32) NOT NULL,
  `phone` varchar(20) NOT NULL,
  `toll free` varchar(20) NOT NULL,
  `fax` varchar(20) NOT NULL,
  `email` varchar(255) NOT NULL,
  `website` varchar(255) NOT NULL,
  PRIMARY KEY  (`id`)
) ENGINE=MyISAM DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;

CREATE TABLE IF NOT EXISTS `cs_copy` (
  `id` int(11) NOT NULL auto_increment,
  `label` varchar(255) NOT NULL,
  `content` text NOT NULL,
  `scroll` tinyint(1) NOT NULL default '0',
  `print` tinyint(1) NOT NULL default '0',
  `category` int(11) NOT NULL,
  `copy date` datetime NOT NULL,
  `order` int(11) NOT NULL,
  PRIMARY KEY  (`id`),
  FULLTEXT KEY `content` (`content`)
) ENGINE=MyISAM  DEFAULT CHARSET=latin1 COMMENT='2' AUTO_INCREMENT=20 ;
CREATE TABLE IF NOT EXISTS `cs_copy_categories` (
  `id` int(11) NOT NULL auto_increment,
  `name` varchar(32) NOT NULL,
  `description` varchar(255) NOT NULL,
  PRIMARY KEY  (`id`)
) ENGINE=MyISAM  DEFAULT CHARSET=latin1 AUTO_INCREMENT=10 ;

CREATE TABLE IF NOT EXISTS `cs_options` (
  `id` int(11) NOT NULL auto_increment,
  `domain` char(255) NOT NULL,
  `google analytics` tinytext NOT NULL,
  `flickr api key` varchar(32) NOT NULL,
  `blog url` varchar(255) NOT NULL,
  `theme` varchar(255) NOT NULL,
  PRIMARY KEY  (`id`)
) ENGINE=MyISAM DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;
CREATE TABLE IF NOT EXISTS `cs_pages` (
  `id` int(11) NOT NULL auto_increment,
  `title` varchar(255) NOT NULL,
  `description` varchar(255) NOT NULL,
  `keywords` varchar(255) NOT NULL,
  `label` varchar(255) NOT NULL,
  `menu order` int(11) NOT NULL,
  `content` longtext NOT NULL,
  `footer` tinyint(1) NOT NULL default '1',
  `header` tinyint(1) NOT NULL default '1',
  `use template` tinyint(1) NOT NULL default '1',
  `external url` varchar(255) NOT NULL,
  `target` varchar(10) NOT NULL,
  `print` tinyint(1) NOT NULL,
  PRIMARY KEY  (`id`)
) ENGINE=MyISAM  DEFAULT CHARSET=latin1 COMMENT='1' AUTO_INCREMENT=18 ;
CREATE TABLE IF NOT EXISTS `cs_uploads` (
  `id` int(11) NOT NULL auto_increment,
  `filename` varchar(512) NOT NULL COMMENT 'image',
  `mediumsize` varchar(512) NOT NULL COMMENT 'image',
  `thumbnail` varchar(512) NOT NULL COMMENT 'image',
  `category` varchar(256) NOT NULL default '1',
  `ftable` varchar(32) NOT NULL,
  `fid` int(11) NOT NULL,
  PRIMARY KEY  (`id`)
) ENGINE=MyISAM  DEFAULT CHARSET=latin1 AUTO_INCREMENT=246 ;
INSERT INTO `cs_contact_info` (website) VALUES ('$url');
INSERT INTO `cs_pages` (title, label, content, print) VALUES ('$url home page', 'Home', 'This is your home page.', true);
INSERT INTO `cs_options` (domain, theme) values ('$url', '$theme');

CREATE DATABASE IF NOT EXISTS `copyshop_tools` DEFAULT CHARACTER SET latin1;
USE `copyshop_tools`;
CREATE TABLE IF NOT EXISTS `cs_tools_options` (
  `id` int(11) NOT NULL auto_increment,
  `site` char(255) NOT NULL,
  PRIMARY KEY  (`id`)
) ENGINE=MyISAM DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;
CREATE TABLE IF NOT EXISTS `cs_sites` (
  `id` int(11) NOT NULL auto_increment,
  `name` char(255) NOT NULL,
  `domain` char(255) NOT NULL,
  PRIMARY KEY  (`id`)
) ENGINE=MyISAM DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;
INSERT INTO `cs_sites` (name, domain) VALUES ( '$site', '$url');
INSERT INTO `cs_tools_options` (site) VALUES ('$site');