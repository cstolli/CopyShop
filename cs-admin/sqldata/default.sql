-- phpMyAdmin SQL Dump
-- version 3.3.10
-- http://www.phpmyadmin.net
--
-- Host: localhost
-- Generation Time: Feb 14, 2012 at 10:27 AM
-- Server version: 5.0.67
-- PHP Version: 5.2.6

SET SQL_MODE="NO_AUTO_VALUE_ON_ZERO";

--
-- Database: `copyshop_default`
--

-- --------------------------------------------------------

--
-- Table structure for table `cs_contact_info`
--

CREATE TABLE IF NOT EXISTS `cs_contact_info` (
  `id` int(11) NOT NULL auto_increment,
  `company name` varchar(64) NOT NULL,
  `address` varchar(32) default NULL,
  `address 2` varchar(32) default NULL,
  `city` varchar(32) default NULL,
  `state` varchar(20) default NULL,
  `postal` varchar(15) default NULL,
  `country` varchar(32) default NULL,
  `phone` varchar(20) NOT NULL,
  `toll free` varchar(20) default NULL,
  `fax` varchar(20) default NULL,
  `email` varchar(255) NOT NULL,
  `website` varchar(255) NOT NULL,
  `facebook` varchar(256) default NULL,
  `twitter` varchar(256) default NULL,
  `linkedin` varchar(256) default NULL,
  PRIMARY KEY  (`id`)
) ENGINE=MyISAM  DEFAULT CHARSET=latin1 AUTO_INCREMENT=2 ;

--
-- Dumping data for table `cs_contact_info`
--

INSERT INTO `cs_contact_info` (`id`, `company name`, `address`, `address 2`, `city`, `state`, `postal`, `country`, `phone`, `toll free`, `fax`, `email`, `website`, `facebook`, `twitter`, `linkedin`) VALUES
(1, 'Company Name', 'Company Address', '', 'Company City', 'CA', '00001', 'USA', '707.123.1234', '', '', 'info@domain.com', 'www.domainhere.com', '', '', '');

-- --------------------------------------------------------

--
-- Table structure for table `cs_copy`
--

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
) ENGINE=MyISAM  DEFAULT CHARSET=latin1 COMMENT='2' AUTO_INCREMENT=13 ;

--
-- Dumping data for table `cs_copy`
--


-- --------------------------------------------------------

--
-- Table structure for table `cs_copy_categories`
--

CREATE TABLE IF NOT EXISTS `cs_copy_categories` (
  `id` int(11) NOT NULL auto_increment,
  `name` varchar(32) NOT NULL,
  `description` varchar(255) NOT NULL,
  PRIMARY KEY  (`id`)
) ENGINE=MyISAM DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;

--
-- Dumping data for table `cs_copy_categories`
--


-- --------------------------------------------------------

--
-- Table structure for table `cs_links`
--

CREATE TABLE IF NOT EXISTS `cs_links` (
  `id` int(11) NOT NULL auto_increment,
  `name` varchar(256) NOT NULL,
  `description` varchar(255) default NULL,
  `link` varchar(255) NOT NULL,
  `category` int(11) default NULL,
  `print` tinyint(1) NOT NULL default '1',
  PRIMARY KEY  (`id`)
) ENGINE=MyISAM DEFAULT CHARSET=latin1 COMMENT='7' AUTO_INCREMENT=1 ;

--
-- Dumping data for table `cs_links`
--


-- --------------------------------------------------------

--
-- Table structure for table `cs_link_categories`
--

CREATE TABLE IF NOT EXISTS `cs_link_categories` (
  `id` int(11) NOT NULL auto_increment,
  `name` varchar(32) NOT NULL,
  `description` text NOT NULL,
  `print` tinyint(1) NOT NULL default '1',
  PRIMARY KEY  (`id`)
) ENGINE=MyISAM DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;

--
-- Dumping data for table `cs_link_categories`
--


-- --------------------------------------------------------

--
-- Table structure for table `cs_menus`
--

CREATE TABLE IF NOT EXISTS `cs_menus` (
  `id` int(11) NOT NULL auto_increment,
  `name` varchar(256) NOT NULL,
  `orientation` enum('horizontal','vertical') character set latin1 collate latin1_bin NOT NULL default 'horizontal',
  PRIMARY KEY  (`id`)
) ENGINE=MyISAM  DEFAULT CHARSET=latin1 AUTO_INCREMENT=6 ;

--
-- Dumping data for table `cs_menus`
--

INSERT INTO `cs_menus` (`id`, `name`, `orientation`) VALUES
(5, 'Main Navigation', 'horizontal');

-- --------------------------------------------------------

--
-- Table structure for table `cs_menu_items`
--

CREATE TABLE IF NOT EXISTS `cs_menu_items` (
  `id` int(11) NOT NULL auto_increment,
  `menu` int(11) NOT NULL,
  `label` varchar(256) NOT NULL,
  `target` enum('top','blank') NOT NULL default 'top',
  `title` varchar(256) NOT NULL,
  `order` int(11) NOT NULL default '0',
  `href` varchar(256) NOT NULL,
  PRIMARY KEY  (`id`)
) ENGINE=MyISAM  DEFAULT CHARSET=latin1 AUTO_INCREMENT=22 ;

--
-- Dumping data for table `cs_menu_items`
--


-- --------------------------------------------------------

--
-- Table structure for table `cs_options`
--

CREATE TABLE IF NOT EXISTS `cs_options` (
  `id` int(11) NOT NULL auto_increment,
  `domain` char(255) NOT NULL,
  `google analytics` tinytext NOT NULL,
  `flickr api key` varchar(32) NOT NULL,
  `blog url` varchar(255) NOT NULL,
  `theme` varchar(255) NOT NULL,
  PRIMARY KEY  (`id`)
) ENGINE=MyISAM DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;

--
-- Dumping data for table `cs_options`
--


-- --------------------------------------------------------

--
-- Table structure for table `cs_pages`
--

CREATE TABLE IF NOT EXISTS `cs_pages` (
  `id` int(11) NOT NULL auto_increment,
  `label` varchar(256) default NULL,
  `title` varchar(255) NOT NULL,
  `description` varchar(256) default NULL,
  `keywords` varchar(255) default NULL,
  `menu order` int(11) NOT NULL,
  `parent page` int(11) NOT NULL default '0',
  `content` longtext,
  `footer` tinyint(1) NOT NULL default '1',
  `header` tinyint(1) NOT NULL default '1',
  `use template` tinyint(1) NOT NULL default '1',
  `external url` varchar(255) default NULL,
  `target` varchar(10) default NULL,
  `print` tinyint(1) NOT NULL default '0',
  PRIMARY KEY  (`id`)
) ENGINE=MyISAM  DEFAULT CHARSET=latin1 COMMENT='1' AUTO_INCREMENT=53 ;

--
-- Dumping data for table `cs_pages`
--


-- --------------------------------------------------------

--
-- Table structure for table `cs_page_elements`
--

CREATE TABLE IF NOT EXISTS `cs_page_elements` (
  `id` int(11) NOT NULL auto_increment,
  `page` int(11) NOT NULL,
  `type` varchar(32) NOT NULL,
  `width` int(11) default NULL,
  `height` int(11) default NULL,
  `background` varchar(256) default NULL,
  `margins` varchar(256) default NULL,
  `padding` varchar(256) default NULL,
  `border` varchar(256) default NULL,
  `rounded` tinyint(1) NOT NULL default '0',
  `content` text NOT NULL,
  PRIMARY KEY  (`id`)
) ENGINE=MyISAM DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;

--
-- Dumping data for table `cs_page_elements`
--


-- --------------------------------------------------------

--
-- Table structure for table `cs_uploads`
--

CREATE TABLE IF NOT EXISTS `cs_uploads` (
  `id` int(11) NOT NULL auto_increment,
  `filename` varchar(512) NOT NULL COMMENT 'image',
  `mediumsize` varchar(512) NOT NULL COMMENT 'image',
  `thumbnail` varchar(512) NOT NULL COMMENT 'image',
  `category` varchar(256) NOT NULL default '1',
  `ftable` varchar(32) NOT NULL,
  `fid` int(11) NOT NULL,
  `order` int(11) NOT NULL default '0',
  PRIMARY KEY  (`id`)
) ENGINE=MyISAM DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;

--
-- Dumping data for table `cs_uploads`
--


-- --------------------------------------------------------

--
-- Table structure for table `cs_users`
--

CREATE TABLE IF NOT EXISTS `cs_users` (
  `id` int(11) NOT NULL auto_increment,
  `username` varchar(32) NOT NULL,
  `password` varchar(32) NOT NULL,
  `full name` varchar(256) NOT NULL,
  `email` varchar(256) default NULL,
  PRIMARY KEY  (`id`)
) ENGINE=MyISAM  DEFAULT CHARSET=latin1 AUTO_INCREMENT=8 ;

--
-- Dumping data for table `cs_users`
--

INSERT INTO `cs_users` (`id`, `username`, `password`, `full name`, `email`) VALUES
(7, 'admin', 'hello123', 'CopyShop Admin', 'admin@domain.com');
