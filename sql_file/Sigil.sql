-- phpMyAdmin SQL Dump
-- version 4.1.6
-- http://www.phpmyadmin.net
--
-- Host: localhost
-- Generation Time: 2014-04-20 13:26:30
-- 服务器版本： 5.6.16
-- PHP Version: 5.5.9

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Database: `Sigil`
--

-- --------------------------------------------------------

--
-- 表的结构 `comic_chapters`
--

CREATE TABLE IF NOT EXISTS `comic_chapters` (
  `chapter_id` int(11) NOT NULL AUTO_INCREMENT,
  `chapter_label` varchar(50) COLLATE utf8_unicode_ci NOT NULL COMMENT '章节名称',
  `chapter_cover` varchar(255) COLLATE utf8_unicode_ci NOT NULL COMMENT '章节封面路径',
  PRIMARY KEY (`chapter_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- 表的结构 `comic_main`
--

CREATE TABLE IF NOT EXISTS `comic_main` (
  `comic_id` int(11) NOT NULL AUTO_INCREMENT,
  `comic_name` varchar(50) COLLATE utf8_unicode_ci NOT NULL COMMENT '漫画名称',
  `comic_state` int(11) NOT NULL COMMENT '漫画状态',
  PRIMARY KEY (`comic_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- 表的结构 `comic_pages`
--

CREATE TABLE IF NOT EXISTS `comic_pages` (
  `page_id` int(11) NOT NULL AUTO_INCREMENT,
  `page_comic_id` int(11) NOT NULL,
  `page_chapter_id` int(11) NOT NULL,
  `page_path` varchar(255) COLLATE utf8_unicode_ci NOT NULL COMMENT '漫画页路径',
  PRIMARY KEY (`page_id`),
  KEY `page_comic_id` (`page_comic_id`),
  KEY `page_chapter_id` (`page_chapter_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- 表的结构 `comic_tag`
--

CREATE TABLE IF NOT EXISTS `comic_tag` (
  `tag_id` int(11) NOT NULL AUTO_INCREMENT,
  `tag_label` varchar(10) COLLATE utf8_unicode_ci NOT NULL COMMENT 'tag名称',
  PRIMARY KEY (`tag_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- 表的结构 `comic_terms_swap`
--

CREATE TABLE IF NOT EXISTS `comic_terms_swap` (
  `term_page_id` int(11) NOT NULL,
  `term_tag_id` int(11) NOT NULL,
  KEY `term_page_id` (`term_page_id`),
  KEY `term_tag_id` (`term_tag_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- 限制导出的表
--

--
-- 限制表 `comic_pages`
--
ALTER TABLE `comic_pages`
  ADD CONSTRAINT `comic_pages_ibfk_1` FOREIGN KEY (`page_comic_id`) REFERENCES `comic_main` (`comic_id`),
  ADD CONSTRAINT `comic_pages_ibfk_2` FOREIGN KEY (`page_chapter_id`) REFERENCES `comic_chapters` (`chapter_id`);

--
-- 限制表 `comic_terms_swap`
--
ALTER TABLE `comic_terms_swap`
  ADD CONSTRAINT `comic_terms_swap_ibfk_1` FOREIGN KEY (`term_page_id`) REFERENCES `comic_pages` (`page_id`),
  ADD CONSTRAINT `comic_terms_swap_ibfk_2` FOREIGN KEY (`term_page_id`) REFERENCES `comic_pages` (`page_id`),
  ADD CONSTRAINT `comic_terms_swap_ibfk_3` FOREIGN KEY (`term_tag_id`) REFERENCES `comic_tag` (`tag_id`);

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
