-- YMX SQL Dump Program
-- 
-- DATE : 2015-09-17 14:28:00
-- Vol : 1
DROP TABLE IF EXISTS `hx_access`;
CREATE TABLE `hx_access` (
  `role_id` smallint(6) unsigned NOT NULL,
  `node_id` smallint(6) unsigned NOT NULL,
  KEY `groupId` (`role_id`) USING BTREE,
  KEY `nodeId` (`node_id`) USING BTREE
) COLLATE='utf8_general_ci' ENGINE=MyISAM;
INSERT INTO hx_access ( `role_id`, `node_id` ) VALUES  ('1','55');
INSERT INTO hx_access ( `role_id`, `node_id` ) VALUES  ('1','65');
INSERT INTO hx_access ( `role_id`, `node_id` ) VALUES  ('1','64');
INSERT INTO hx_access ( `role_id`, `node_id` ) VALUES  ('1','63');
INSERT INTO hx_access ( `role_id`, `node_id` ) VALUES  ('1','62');
INSERT INTO hx_access ( `role_id`, `node_id` ) VALUES  ('1','61');
INSERT INTO hx_access ( `role_id`, `node_id` ) VALUES  ('1','60');
INSERT INTO hx_access ( `role_id`, `node_id` ) VALUES  ('1','58');
INSERT INTO hx_access ( `role_id`, `node_id` ) VALUES  ('1','57');
INSERT INTO hx_access ( `role_id`, `node_id` ) VALUES  ('1','54');
INSERT INTO hx_access ( `role_id`, `node_id` ) VALUES  ('1','84');
INSERT INTO hx_access ( `role_id`, `node_id` ) VALUES  ('1','83');
INSERT INTO hx_access ( `role_id`, `node_id` ) VALUES  ('1','82');
INSERT INTO hx_access ( `role_id`, `node_id` ) VALUES  ('1','73');
INSERT INTO hx_access ( `role_id`, `node_id` ) VALUES  ('1','72');
INSERT INTO hx_access ( `role_id`, `node_id` ) VALUES  ('1','71');
INSERT INTO hx_access ( `role_id`, `node_id` ) VALUES  ('1','70');
INSERT INTO hx_access ( `role_id`, `node_id` ) VALUES  ('1','69');
INSERT INTO hx_access ( `role_id`, `node_id` ) VALUES  ('1','68');
INSERT INTO hx_access ( `role_id`, `node_id` ) VALUES  ('1','30');
INSERT INTO hx_access ( `role_id`, `node_id` ) VALUES  ('1','29');
INSERT INTO hx_access ( `role_id`, `node_id` ) VALUES  ('1','28');
INSERT INTO hx_access ( `role_id`, `node_id` ) VALUES  ('1','27');
INSERT INTO hx_access ( `role_id`, `node_id` ) VALUES  ('1','26');
INSERT INTO hx_access ( `role_id`, `node_id` ) VALUES  ('1','25');
INSERT INTO hx_access ( `role_id`, `node_id` ) VALUES  ('1','24');
INSERT INTO hx_access ( `role_id`, `node_id` ) VALUES  ('1','23');
INSERT INTO hx_access ( `role_id`, `node_id` ) VALUES  ('1','22');
INSERT INTO hx_access ( `role_id`, `node_id` ) VALUES  ('1','21');
INSERT INTO hx_access ( `role_id`, `node_id` ) VALUES  ('1','20');
INSERT INTO hx_access ( `role_id`, `node_id` ) VALUES  ('1','17');
INSERT INTO hx_access ( `role_id`, `node_id` ) VALUES  ('1','16');
INSERT INTO hx_access ( `role_id`, `node_id` ) VALUES  ('1','15');
INSERT INTO hx_access ( `role_id`, `node_id` ) VALUES  ('1','14');
INSERT INTO hx_access ( `role_id`, `node_id` ) VALUES  ('1','13');
INSERT INTO hx_access ( `role_id`, `node_id` ) VALUES  ('1','18');
INSERT INTO hx_access ( `role_id`, `node_id` ) VALUES  ('1','12');
INSERT INTO hx_access ( `role_id`, `node_id` ) VALUES  ('1','11');
INSERT INTO hx_access ( `role_id`, `node_id` ) VALUES  ('1','10');
INSERT INTO hx_access ( `role_id`, `node_id` ) VALUES  ('1','9');
INSERT INTO hx_access ( `role_id`, `node_id` ) VALUES  ('1','8');
INSERT INTO hx_access ( `role_id`, `node_id` ) VALUES  ('1','7');
INSERT INTO hx_access ( `role_id`, `node_id` ) VALUES  ('1','5');
INSERT INTO hx_access ( `role_id`, `node_id` ) VALUES  ('1','4');
INSERT INTO hx_access ( `role_id`, `node_id` ) VALUES  ('1','3');
INSERT INTO hx_access ( `role_id`, `node_id` ) VALUES  ('1','2');
INSERT INTO hx_access ( `role_id`, `node_id` ) VALUES  ('1','1');
INSERT INTO hx_access ( `role_id`, `node_id` ) VALUES  ('2','67');
INSERT INTO hx_access ( `role_id`, `node_id` ) VALUES  ('2','66');
INSERT INTO hx_access ( `role_id`, `node_id` ) VALUES  ('2','65');
INSERT INTO hx_access ( `role_id`, `node_id` ) VALUES  ('2','64');
INSERT INTO hx_access ( `role_id`, `node_id` ) VALUES  ('2','63');
INSERT INTO hx_access ( `role_id`, `node_id` ) VALUES  ('2','62');
INSERT INTO hx_access ( `role_id`, `node_id` ) VALUES  ('2','61');
INSERT INTO hx_access ( `role_id`, `node_id` ) VALUES  ('2','60');
INSERT INTO hx_access ( `role_id`, `node_id` ) VALUES  ('2','58');
INSERT INTO hx_access ( `role_id`, `node_id` ) VALUES  ('2','57');
INSERT INTO hx_access ( `role_id`, `node_id` ) VALUES  ('2','54');
INSERT INTO hx_access ( `role_id`, `node_id` ) VALUES  ('2','73');
INSERT INTO hx_access ( `role_id`, `node_id` ) VALUES  ('2','72');
INSERT INTO hx_access ( `role_id`, `node_id` ) VALUES  ('2','71');
INSERT INTO hx_access ( `role_id`, `node_id` ) VALUES  ('2','70');
INSERT INTO hx_access ( `role_id`, `node_id` ) VALUES  ('2','69');
INSERT INTO hx_access ( `role_id`, `node_id` ) VALUES  ('2','68');
INSERT INTO hx_access ( `role_id`, `node_id` ) VALUES  ('2','30');
INSERT INTO hx_access ( `role_id`, `node_id` ) VALUES  ('2','29');
INSERT INTO hx_access ( `role_id`, `node_id` ) VALUES  ('2','28');
INSERT INTO hx_access ( `role_id`, `node_id` ) VALUES  ('2','27');
INSERT INTO hx_access ( `role_id`, `node_id` ) VALUES  ('2','26');
INSERT INTO hx_access ( `role_id`, `node_id` ) VALUES  ('2','25');
INSERT INTO hx_access ( `role_id`, `node_id` ) VALUES  ('2','24');
INSERT INTO hx_access ( `role_id`, `node_id` ) VALUES  ('2','23');
INSERT INTO hx_access ( `role_id`, `node_id` ) VALUES  ('2','22');
INSERT INTO hx_access ( `role_id`, `node_id` ) VALUES  ('2','21');
INSERT INTO hx_access ( `role_id`, `node_id` ) VALUES  ('2','20');
INSERT INTO hx_access ( `role_id`, `node_id` ) VALUES  ('2','53');
INSERT INTO hx_access ( `role_id`, `node_id` ) VALUES  ('2','52');
INSERT INTO hx_access ( `role_id`, `node_id` ) VALUES  ('1','53');
INSERT INTO hx_access ( `role_id`, `node_id` ) VALUES  ('1','52');
INSERT INTO hx_access ( `role_id`, `node_id` ) VALUES  ('1','51');
INSERT INTO hx_access ( `role_id`, `node_id` ) VALUES  ('1','50');
INSERT INTO hx_access ( `role_id`, `node_id` ) VALUES  ('1','49');
INSERT INTO hx_access ( `role_id`, `node_id` ) VALUES  ('1','45');
INSERT INTO hx_access ( `role_id`, `node_id` ) VALUES  ('1','44');
INSERT INTO hx_access ( `role_id`, `node_id` ) VALUES  ('1','43');
INSERT INTO hx_access ( `role_id`, `node_id` ) VALUES  ('1','42');
INSERT INTO hx_access ( `role_id`, `node_id` ) VALUES  ('1','48');
INSERT INTO hx_access ( `role_id`, `node_id` ) VALUES  ('1','47');
INSERT INTO hx_access ( `role_id`, `node_id` ) VALUES  ('1','46');
INSERT INTO hx_access ( `role_id`, `node_id` ) VALUES  ('1','40');
INSERT INTO hx_access ( `role_id`, `node_id` ) VALUES  ('1','39');
INSERT INTO hx_access ( `role_id`, `node_id` ) VALUES  ('1','38');
INSERT INTO hx_access ( `role_id`, `node_id` ) VALUES  ('1','37');
INSERT INTO hx_access ( `role_id`, `node_id` ) VALUES  ('1','36');
INSERT INTO hx_access ( `role_id`, `node_id` ) VALUES  ('1','35');
INSERT INTO hx_access ( `role_id`, `node_id` ) VALUES  ('1','34');
INSERT INTO hx_access ( `role_id`, `node_id` ) VALUES  ('1','33');
INSERT INTO hx_access ( `role_id`, `node_id` ) VALUES  ('1','32');
INSERT INTO hx_access ( `role_id`, `node_id` ) VALUES  ('1','31');
INSERT INTO hx_access ( `role_id`, `node_id` ) VALUES  ('1','19');
INSERT INTO hx_access ( `role_id`, `node_id` ) VALUES  ('2','51');
INSERT INTO hx_access ( `role_id`, `node_id` ) VALUES  ('2','50');
INSERT INTO hx_access ( `role_id`, `node_id` ) VALUES  ('2','49');
INSERT INTO hx_access ( `role_id`, `node_id` ) VALUES  ('2','45');
INSERT INTO hx_access ( `role_id`, `node_id` ) VALUES  ('2','44');
INSERT INTO hx_access ( `role_id`, `node_id` ) VALUES  ('2','43');
INSERT INTO hx_access ( `role_id`, `node_id` ) VALUES  ('2','42');
INSERT INTO hx_access ( `role_id`, `node_id` ) VALUES  ('2','48');
INSERT INTO hx_access ( `role_id`, `node_id` ) VALUES  ('2','47');
INSERT INTO hx_access ( `role_id`, `node_id` ) VALUES  ('2','46');
INSERT INTO hx_access ( `role_id`, `node_id` ) VALUES  ('2','40');
INSERT INTO hx_access ( `role_id`, `node_id` ) VALUES  ('2','39');
INSERT INTO hx_access ( `role_id`, `node_id` ) VALUES  ('2','38');
INSERT INTO hx_access ( `role_id`, `node_id` ) VALUES  ('2','37');
INSERT INTO hx_access ( `role_id`, `node_id` ) VALUES  ('2','36');
INSERT INTO hx_access ( `role_id`, `node_id` ) VALUES  ('2','35');
INSERT INTO hx_access ( `role_id`, `node_id` ) VALUES  ('2','34');
INSERT INTO hx_access ( `role_id`, `node_id` ) VALUES  ('2','33');
INSERT INTO hx_access ( `role_id`, `node_id` ) VALUES  ('2','32');
INSERT INTO hx_access ( `role_id`, `node_id` ) VALUES  ('2','31');
INSERT INTO hx_access ( `role_id`, `node_id` ) VALUES  ('2','19');
INSERT INTO hx_access ( `role_id`, `node_id` ) VALUES  ('7','67');
INSERT INTO hx_access ( `role_id`, `node_id` ) VALUES  ('7','66');
INSERT INTO hx_access ( `role_id`, `node_id` ) VALUES  ('7','65');
INSERT INTO hx_access ( `role_id`, `node_id` ) VALUES  ('7','64');
INSERT INTO hx_access ( `role_id`, `node_id` ) VALUES  ('7','63');
INSERT INTO hx_access ( `role_id`, `node_id` ) VALUES  ('7','62');
INSERT INTO hx_access ( `role_id`, `node_id` ) VALUES  ('7','61');
INSERT INTO hx_access ( `role_id`, `node_id` ) VALUES  ('7','54');
INSERT INTO hx_access ( `role_id`, `node_id` ) VALUES  ('7','73');
INSERT INTO hx_access ( `role_id`, `node_id` ) VALUES  ('7','72');
INSERT INTO hx_access ( `role_id`, `node_id` ) VALUES  ('7','71');
INSERT INTO hx_access ( `role_id`, `node_id` ) VALUES  ('7','70');
INSERT INTO hx_access ( `role_id`, `node_id` ) VALUES  ('7','69');
INSERT INTO hx_access ( `role_id`, `node_id` ) VALUES  ('7','68');
INSERT INTO hx_access ( `role_id`, `node_id` ) VALUES  ('7','30');
INSERT INTO hx_access ( `role_id`, `node_id` ) VALUES  ('7','29');
INSERT INTO hx_access ( `role_id`, `node_id` ) VALUES  ('7','28');
INSERT INTO hx_access ( `role_id`, `node_id` ) VALUES  ('7','27');
INSERT INTO hx_access ( `role_id`, `node_id` ) VALUES  ('7','26');
INSERT INTO hx_access ( `role_id`, `node_id` ) VALUES  ('7','25');
INSERT INTO hx_access ( `role_id`, `node_id` ) VALUES  ('7','24');
INSERT INTO hx_access ( `role_id`, `node_id` ) VALUES  ('7','23');
INSERT INTO hx_access ( `role_id`, `node_id` ) VALUES  ('7','22');
INSERT INTO hx_access ( `role_id`, `node_id` ) VALUES  ('7','21');
INSERT INTO hx_access ( `role_id`, `node_id` ) VALUES  ('7','20');
INSERT INTO hx_access ( `role_id`, `node_id` ) VALUES  ('7','17');
INSERT INTO hx_access ( `role_id`, `node_id` ) VALUES  ('7','16');
INSERT INTO hx_access ( `role_id`, `node_id` ) VALUES  ('7','15');
INSERT INTO hx_access ( `role_id`, `node_id` ) VALUES  ('7','14');
INSERT INTO hx_access ( `role_id`, `node_id` ) VALUES  ('7','13');
INSERT INTO hx_access ( `role_id`, `node_id` ) VALUES  ('7','53');
INSERT INTO hx_access ( `role_id`, `node_id` ) VALUES  ('7','52');
INSERT INTO hx_access ( `role_id`, `node_id` ) VALUES  ('7','51');
INSERT INTO hx_access ( `role_id`, `node_id` ) VALUES  ('7','50');
INSERT INTO hx_access ( `role_id`, `node_id` ) VALUES  ('7','49');
INSERT INTO hx_access ( `role_id`, `node_id` ) VALUES  ('7','45');
INSERT INTO hx_access ( `role_id`, `node_id` ) VALUES  ('7','44');
INSERT INTO hx_access ( `role_id`, `node_id` ) VALUES  ('7','43');
INSERT INTO hx_access ( `role_id`, `node_id` ) VALUES  ('7','42');
INSERT INTO hx_access ( `role_id`, `node_id` ) VALUES  ('7','48');
INSERT INTO hx_access ( `role_id`, `node_id` ) VALUES  ('7','47');
INSERT INTO hx_access ( `role_id`, `node_id` ) VALUES  ('7','46');
INSERT INTO hx_access ( `role_id`, `node_id` ) VALUES  ('7','40');
INSERT INTO hx_access ( `role_id`, `node_id` ) VALUES  ('7','39');
INSERT INTO hx_access ( `role_id`, `node_id` ) VALUES  ('7','38');
INSERT INTO hx_access ( `role_id`, `node_id` ) VALUES  ('7','37');
INSERT INTO hx_access ( `role_id`, `node_id` ) VALUES  ('7','36');
INSERT INTO hx_access ( `role_id`, `node_id` ) VALUES  ('7','35');
INSERT INTO hx_access ( `role_id`, `node_id` ) VALUES  ('7','34');
INSERT INTO hx_access ( `role_id`, `node_id` ) VALUES  ('7','33');
INSERT INTO hx_access ( `role_id`, `node_id` ) VALUES  ('7','32');
INSERT INTO hx_access ( `role_id`, `node_id` ) VALUES  ('7','31');
INSERT INTO hx_access ( `role_id`, `node_id` ) VALUES  ('7','19');
INSERT INTO hx_access ( `role_id`, `node_id` ) VALUES  ('1','56');
INSERT INTO hx_access ( `role_id`, `node_id` ) VALUES  ('1','66');
INSERT INTO hx_access ( `role_id`, `node_id` ) VALUES  ('1','67');
DROP TABLE IF EXISTS `hx_ad`;
CREATE TABLE `hx_ad` (
  `ad_id` bigint(20) NOT NULL AUTO_INCREMENT COMMENT '广告id',
  `ad_name` varchar(255) NOT NULL,
  `ad_content` text,
  `status` int(2) NOT NULL DEFAULT '1' COMMENT '状态，1显示，0不显示',
  `cate_id` int(11) DEFAULT NULL COMMENT '广告位id',
  `sort` int(11) DEFAULT '50' COMMENT '排序',
  `time` int(11) DEFAULT NULL COMMENT '创建时间',
  PRIMARY KEY (`ad_id`),
  KEY `ad_name` (`ad_name`) USING BTREE
) COLLATE='utf8_general_ci' ENGINE=MyISAM;
INSERT INTO hx_ad ( `ad_id`, `ad_name`, `ad_content`, `status`, `cate_id`, `sort`, `time` ) VALUES  ('1','测试测试','测试测试测试测试测试测试测试测试测试测试','1','1','1','1439533953');
INSERT INTO hx_ad ( `ad_id`, `ad_name`, `ad_content`, `status`, `cate_id`, `sort`, `time` ) VALUES  ('3','测试测试','测试测试测试测试测试测试测试测试测试测试','0','1','2','1439533843');
DROP TABLE IF EXISTS `hx_admin`;
CREATE TABLE `hx_admin` (
  `id` int(11) NOT NULL AUTO_INCREMENT COMMENT '后台管理用户',
  `username` varchar(30) CHARACTER SET utf8 NOT NULL,
  `password` char(32) CHARACTER SET utf8 NOT NULL,
  `logintime` int(11) DEFAULT NULL COMMENT '登录时间',
  `loginip` varchar(20) CHARACTER SET utf8 DEFAULT NULL COMMENT '登录ip',
  `sort` int(1) DEFAULT NULL,
  `lock` enum('锁定','开启') DEFAULT '开启' COMMENT '锁定状态1锁定，0：未锁定',
  `time` int(11) DEFAULT NULL COMMENT '创建时间',
  `role_id` int(11) DEFAULT NULL,
  PRIMARY KEY (`id`)
) COLLATE='utf8_general_ci' ENGINE=MyISAM;
INSERT INTO hx_admin ( `id`, `username`, `password`, `logintime`, `loginip`, `sort`, `lock`, `time`, `role_id` ) VALUES  ('1','admin','e10adc3949ba59abbe56e057f20f883e','1442465050','127.0.0.1','0','开启','1437654152','1');
INSERT INTO hx_admin ( `id`, `username`, `password`, `logintime`, `loginip`, `sort`, `lock`, `time`, `role_id` ) VALUES  ('2','zhangxin','e10adc3949ba59abbe56e057f20f883e','','','2','开启','1439298487','1');
INSERT INTO hx_admin ( `id`, `username`, `password`, `logintime`, `loginip`, `sort`, `lock`, `time`, `role_id` ) VALUES  ('3','demo','e10adc3949ba59abbe56e057f20f883e','1439948649','120.131.75.138','50','开启','1439564981','7');
DROP TABLE IF EXISTS `hx_adpos`;
CREATE TABLE `hx_adpos` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(255) CHARACTER SET utf8 DEFAULT NULL COMMENT '广告位名称',
  `sort` int(11) DEFAULT '50' COMMENT '排序',
  `time` int(11) DEFAULT NULL COMMENT '创建时间',
  PRIMARY KEY (`id`)
) COLLATE='utf8_general_ci' ENGINE=MyISAM;
INSERT INTO hx_adpos ( `id`, `name`, `sort`, `time` ) VALUES  ('1','首页','1','1439530851');
DROP TABLE IF EXISTS `hx_article`;
CREATE TABLE `hx_article` (
  `id` int(11) NOT NULL AUTO_INCREMENT COMMENT '分类id',
  `cate_id` int(11) DEFAULT NULL,
  `title` varchar(200) DEFAULT NULL COMMENT '文章标题',
  `desc` varchar(200) DEFAULT NULL COMMENT '描述',
  `content` longtext COMMENT '文章内容',
  `time` int(11) DEFAULT NULL COMMENT '创建时间',
  `del` int(11) DEFAULT '0' COMMENT '0:正常；1：删除',
  `recommend` enum('未推荐','推荐') DEFAULT '未推荐' COMMENT '是否推荐',
  `top` enum('未置顶','置顶') DEFAULT '未置顶' COMMENT '是否置顶',
  `audit` enum('待审核','审核不通过','审核通过') DEFAULT '待审核',
  `sort` int(11) DEFAULT '50',
  `userid` int(11) DEFAULT NULL COMMENT '用户id',
  PRIMARY KEY (`id`)
) COLLATE='utf8_general_ci' ENGINE=MyISAM;
INSERT INTO hx_article ( `id`, `cate_id`, `title`, `desc`, `content`, `time`, `del`, `recommend`, `top`, `audit`, `sort`, `userid` ) VALUES  ('3','3','13245asds','asdsadasdasjk阿喀琉斯讲的是看见','加宽了丹江口撒娇的了卡萨极乐空间了','1422330654','1','未推荐','置顶','待审核','50','1');
INSERT INTO hx_article ( `id`, `cate_id`, `title`, `desc`, `content`, `time`, `del`, `recommend`, `top`, `audit`, `sort`, `userid` ) VALUES  ('4','3','撒大是的撒','啊是的撒大事','大叔大叔大叔','1422499170','1','未推荐','置顶','待审核','50','1');
INSERT INTO hx_article ( `id`, `cate_id`, `title`, `desc`, `content`, `time`, `del`, `recommend`, `top`, `audit`, `sort`, `userid` ) VALUES  ('5','5','测试','','','1439471607','0','推荐','置顶','待审核','50','1');
INSERT INTO hx_article ( `id`, `cate_id`, `title`, `desc`, `content`, `time`, `del`, `recommend`, `top`, `audit`, `sort`, `userid` ) VALUES  ('6','5','啊是的撒大时代','啊是的撒大时代','&lt;p&gt;啊是的撒大时代啊是的撒大时代啊是的撒大时代啊是的撒大时代啊是的撒大时代啊是的撒大时代啊是的撒大时代啊是的撒大时代啊是的撒大时代啊是的撒大时代啊是的撒大时代啊是的撒大时代啊是的撒大时代啊是的撒大时代啊是的撒大时代啊是的撒大时代啊是的撒大时代&lt;/p&gt;','1439476132','0','推荐','置顶','审核不通过','50','1');
INSERT INTO hx_article ( `id`, `cate_id`, `title`, `desc`, `content`, `time`, `del`, `recommend`, `top`, `audit`, `sort`, `userid` ) VALUES  ('7','5','啊是的撒的','啊时代的淡淡的淡淡的淡淡的淡淡的淡淡的','&lt;p&gt;撒大大大大大大大大大大大大大大大&lt;/p&gt;','1439476207','0','推荐','置顶','审核不通过','50','1');
INSERT INTO hx_article ( `id`, `cate_id`, `title`, `desc`, `content`, `time`, `del`, `recommend`, `top`, `audit`, `sort`, `userid` ) VALUES  ('8','5','广告管理','啊是的撒','啊是的撒的撒旦撒旦','1439479445','0','未推荐','未置顶','审核通过','50','1');
DROP TABLE IF EXISTS `hx_cate`;
CREATE TABLE `hx_cate` (
  `id` int(11) NOT NULL AUTO_INCREMENT COMMENT 'id',
  `pid` int(11) DEFAULT NULL,
  `cate` varchar(200) DEFAULT NULL COMMENT '分类名称',
  `sort` int(11) DEFAULT '50',
  PRIMARY KEY (`id`)
) COLLATE='utf8_general_ci' ENGINE=MyISAM;
INSERT INTO hx_cate ( `id`, `pid`, `cate`, `sort` ) VALUES  ('3','0','PHP','50');
INSERT INTO hx_cate ( `id`, `pid`, `cate`, `sort` ) VALUES  ('4','0','js','50');
INSERT INTO hx_cate ( `id`, `pid`, `cate`, `sort` ) VALUES  ('5','0','Mysql','50');
INSERT INTO hx_cate ( `id`, `pid`, `cate`, `sort` ) VALUES  ('6','3','js','50');
INSERT INTO hx_cate ( `id`, `pid`, `cate`, `sort` ) VALUES  ('7','3','mysql','50');
INSERT INTO hx_cate ( `id`, `pid`, `cate`, `sort` ) VALUES  ('8','5','mysql','1');
DROP TABLE IF EXISTS `hx_comments`;
CREATE TABLE `hx_comments` (
  `id` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `url` varchar(255) DEFAULT NULL COMMENT '图片地址',
  `uid` int(11) NOT NULL DEFAULT '0' COMMENT '发表评论的用户id',
  `full_name` varchar(50) DEFAULT NULL COMMENT '评论者昵称',
  `email` varchar(255) DEFAULT NULL COMMENT '评论者邮箱',
  `createtime` datetime NOT NULL DEFAULT '2000-01-01 00:00:00',
  `content` text NOT NULL COMMENT '评论内容',
  `parentid` bigint(20) unsigned NOT NULL DEFAULT '0' COMMENT '被回复的评论id',
  `aid` int(11) DEFAULT NULL COMMENT '评论内容id',
  PRIMARY KEY (`id`),
  KEY `comment_parent` (`parentid`) USING BTREE,
  KEY `createtime` (`createtime`) USING BTREE
) COLLATE='utf8_general_ci' ENGINE=MyISAM;
DROP TABLE IF EXISTS `hx_links`;
CREATE TABLE `hx_links` (
  `id` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `url` varchar(255) NOT NULL COMMENT '友情链接地址',
  `name` varchar(255) NOT NULL COMMENT '友情链接名称',
  `image` varchar(255) DEFAULT NULL COMMENT '友情链接图标',
  `desc` text NOT NULL COMMENT '友情链接描述',
  `status` int(2) NOT NULL DEFAULT '1' COMMENT '1:显示；0：不显示',
  `sort` int(10) NOT NULL DEFAULT '50' COMMENT '排序',
  `time` int(11) DEFAULT NULL COMMENT '创建时间',
  PRIMARY KEY (`id`),
  KEY `link_visible` (`status`) USING BTREE
) COLLATE='utf8_general_ci' ENGINE=MyISAM;
INSERT INTO hx_links ( `id`, `url`, `name`, `image`, `desc`, `status`, `sort`, `time` ) VALUES  ('2','http://www.phpercode.com','百度','/Uploads/link/20150814/20150814203522.jpg','','1','50','1439555722');
INSERT INTO hx_links ( `id`, `url`, `name`, `image`, `desc`, `status`, `sort`, `time` ) VALUES  ('3','http://www.baidu.com','百度','/Uploads/link/20150814/20150814202239.jpg','','1','50','1439554959');
DROP TABLE IF EXISTS `hx_nav`;
CREATE TABLE `hx_nav` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `pid` int(11) NOT NULL,
  `status` int(2) NOT NULL DEFAULT '1' COMMENT '1:显示2：不显示',
  `sort` int(6) DEFAULT '50',
  `time` int(11) DEFAULT NULL COMMENT '创建时间',
  `name` varchar(255) DEFAULT NULL COMMENT '名称',
  PRIMARY KEY (`id`)
) COLLATE='utf8_general_ci' ENGINE=MyISAM;
INSERT INTO hx_nav ( `id`, `pid`, `status`, `sort`, `time`, `name` ) VALUES  ('1','0','1','0','','php');
INSERT INTO hx_nav ( `id`, `pid`, `status`, `sort`, `time`, `name` ) VALUES  ('2','0','1','0','','mysql');
INSERT INTO hx_nav ( `id`, `pid`, `status`, `sort`, `time`, `name` ) VALUES  ('3','0','1','0','','js');
INSERT INTO hx_nav ( `id`, `pid`, `status`, `sort`, `time`, `name` ) VALUES  ('4','0','1','0','','html');
INSERT INTO hx_nav ( `id`, `pid`, `status`, `sort`, `time`, `name` ) VALUES  ('5','4','0','0','1439543283','css');
INSERT INTO hx_nav ( `id`, `pid`, `status`, `sort`, `time`, `name` ) VALUES  ('6','1','1','1','1439542420','thinkphp');
DROP TABLE IF EXISTS `hx_node`;
CREATE TABLE `hx_node` (
  `id` smallint(6) unsigned NOT NULL AUTO_INCREMENT COMMENT '权限ID',
  `name` varchar(20) NOT NULL COMMENT '权限ActionName',
  `title` varchar(50) NOT NULL COMMENT '权限RealName',
  `status` enum('关闭','开启') NOT NULL DEFAULT '开启' COMMENT '开启状态（0、关闭；1、开启）',
  `sort` smallint(6) unsigned DEFAULT NULL COMMENT '排列顺序',
  `pid` smallint(6) unsigned NOT NULL COMMENT '上级ID',
  `level` tinyint(1) unsigned NOT NULL COMMENT '层级（1、控制器；2、方法）',
  `type` enum('否','是') NOT NULL DEFAULT '是' COMMENT '是否设为菜单（0、不是菜单；1、设为菜单）',
  `icon` varchar(255) DEFAULT NULL COMMENT '菜单图标',
  `time` int(11) DEFAULT NULL COMMENT '创建时间',
  PRIMARY KEY (`id`),
  KEY `level` (`level`) USING BTREE,
  KEY `pid` (`pid`) USING BTREE,
  KEY `status` (`status`) USING BTREE,
  KEY `name` (`name`) USING BTREE
) COLLATE='utf8_general_ci' ENGINE=MyISAM;
INSERT INTO hx_node ( `id`, `name`, `title`, `status`, `sort`, `pid`, `level`, `type`, `icon`, `time` ) VALUES  ('1','Default','权限管理','开启','3','0','0','是','list','1439538993');
INSERT INTO hx_node ( `id`, `name`, `title`, `status`, `sort`, `pid`, `level`, `type`, `icon`, `time` ) VALUES  ('2','Admin','管理员管理','开启','1','1','0','是','','1439305985');
INSERT INTO hx_node ( `id`, `name`, `title`, `status`, `sort`, `pid`, `level`, `type`, `icon`, `time` ) VALUES  ('3','index','列表','开启','1','2','0','是','','1439391276');
INSERT INTO hx_node ( `id`, `name`, `title`, `status`, `sort`, `pid`, `level`, `type`, `icon`, `time` ) VALUES  ('4','add','增加','开启','2','2','0','是','','1439303862');
INSERT INTO hx_node ( `id`, `name`, `title`, `status`, `sort`, `pid`, `level`, `type`, `icon`, `time` ) VALUES  ('5','edit','修改','开启','3','2','0','是','','1439305927');
INSERT INTO hx_node ( `id`, `name`, `title`, `status`, `sort`, `pid`, `level`, `type`, `icon`, `time` ) VALUES  ('7','del','删除','开启','4','2','0','是','','1439305947');
INSERT INTO hx_node ( `id`, `name`, `title`, `status`, `sort`, `pid`, `level`, `type`, `icon`, `time` ) VALUES  ('8','Role','角色管理','开启','2','1','0','是','','1439305973');
INSERT INTO hx_node ( `id`, `name`, `title`, `status`, `sort`, `pid`, `level`, `type`, `icon`, `time` ) VALUES  ('9','index','列表','开启','1','8','0','是','','1439306007');
INSERT INTO hx_node ( `id`, `name`, `title`, `status`, `sort`, `pid`, `level`, `type`, `icon`, `time` ) VALUES  ('10','add','增加','开启','2','8','0','是','','1439306028');
INSERT INTO hx_node ( `id`, `name`, `title`, `status`, `sort`, `pid`, `level`, `type`, `icon`, `time` ) VALUES  ('11','edit','修改','开启','3','8','0','是','','1439306043');
INSERT INTO hx_node ( `id`, `name`, `title`, `status`, `sort`, `pid`, `level`, `type`, `icon`, `time` ) VALUES  ('12','del','删除','开启','4','8','0','是','','1439306061');
INSERT INTO hx_node ( `id`, `name`, `title`, `status`, `sort`, `pid`, `level`, `type`, `icon`, `time` ) VALUES  ('13','Node','节点管理','开启','3','1','0','是','','1439306091');
INSERT INTO hx_node ( `id`, `name`, `title`, `status`, `sort`, `pid`, `level`, `type`, `icon`, `time` ) VALUES  ('14','index','列表','开启','1','13','0','是','','1439306160');
INSERT INTO hx_node ( `id`, `name`, `title`, `status`, `sort`, `pid`, `level`, `type`, `icon`, `time` ) VALUES  ('15','add','增加','开启','2','13','0','是','','1439306128');
INSERT INTO hx_node ( `id`, `name`, `title`, `status`, `sort`, `pid`, `level`, `type`, `icon`, `time` ) VALUES  ('16','edit','修改','开启','3','13','0','是','','1439306150');
INSERT INTO hx_node ( `id`, `name`, `title`, `status`, `sort`, `pid`, `level`, `type`, `icon`, `time` ) VALUES  ('17','del','删除','开启','4','13','0','是','','1439306179');
INSERT INTO hx_node ( `id`, `name`, `title`, `status`, `sort`, `pid`, `level`, `type`, `icon`, `time` ) VALUES  ('18','rbac','分配权限','开启','50','8','0','是','','1439391534');
INSERT INTO hx_node ( `id`, `name`, `title`, `status`, `sort`, `pid`, `level`, `type`, `icon`, `time` ) VALUES  ('19','Default','内容管理','开启','1','0','0','是','tasks','1439431735');
INSERT INTO hx_node ( `id`, `name`, `title`, `status`, `sort`, `pid`, `level`, `type`, `icon`, `time` ) VALUES  ('20','Default','广告管理','开启','4','0','0','是','comments','1439539009');
INSERT INTO hx_node ( `id`, `name`, `title`, `status`, `sort`, `pid`, `level`, `type`, `icon`, `time` ) VALUES  ('21','Ad','广告管理','开启','1','20','0','是','','1439393125');
INSERT INTO hx_node ( `id`, `name`, `title`, `status`, `sort`, `pid`, `level`, `type`, `icon`, `time` ) VALUES  ('22','index','列表','开启','1','21','0','是','','1439393150');
INSERT INTO hx_node ( `id`, `name`, `title`, `status`, `sort`, `pid`, `level`, `type`, `icon`, `time` ) VALUES  ('23','add','增加','开启','2','21','0','是','','1439393166');
INSERT INTO hx_node ( `id`, `name`, `title`, `status`, `sort`, `pid`, `level`, `type`, `icon`, `time` ) VALUES  ('24','edit','修改','开启','3','21','0','是','','1439393184');
INSERT INTO hx_node ( `id`, `name`, `title`, `status`, `sort`, `pid`, `level`, `type`, `icon`, `time` ) VALUES  ('25','del','删除','开启','4','21','0','是','','1439393205');
INSERT INTO hx_node ( `id`, `name`, `title`, `status`, `sort`, `pid`, `level`, `type`, `icon`, `time` ) VALUES  ('26','AdPos','广告位','开启','4','20','0','是','comment-alt','1439393264');
INSERT INTO hx_node ( `id`, `name`, `title`, `status`, `sort`, `pid`, `level`, `type`, `icon`, `time` ) VALUES  ('27','index','列表','开启','1','26','0','是','','1439393280');
INSERT INTO hx_node ( `id`, `name`, `title`, `status`, `sort`, `pid`, `level`, `type`, `icon`, `time` ) VALUES  ('28','add','增加','开启','2','26','0','是','','1439393295');
INSERT INTO hx_node ( `id`, `name`, `title`, `status`, `sort`, `pid`, `level`, `type`, `icon`, `time` ) VALUES  ('29','edit','修改','开启','3','26','0','是','','1439393430');
INSERT INTO hx_node ( `id`, `name`, `title`, `status`, `sort`, `pid`, `level`, `type`, `icon`, `time` ) VALUES  ('30','del','删除','开启','4','26','0','是','','1439393446');
INSERT INTO hx_node ( `id`, `name`, `title`, `status`, `sort`, `pid`, `level`, `type`, `icon`, `time` ) VALUES  ('31','Cate','分类管理','开启','0','19','0','是','','1439431054');
INSERT INTO hx_node ( `id`, `name`, `title`, `status`, `sort`, `pid`, `level`, `type`, `icon`, `time` ) VALUES  ('32','index','列表','开启','1','31','0','是','','1439393742');
INSERT INTO hx_node ( `id`, `name`, `title`, `status`, `sort`, `pid`, `level`, `type`, `icon`, `time` ) VALUES  ('33','add','增加','开启','2','31','0','是','','1439393757');
INSERT INTO hx_node ( `id`, `name`, `title`, `status`, `sort`, `pid`, `level`, `type`, `icon`, `time` ) VALUES  ('34','edit','修改','开启','3','31','0','是','','1439393778');
INSERT INTO hx_node ( `id`, `name`, `title`, `status`, `sort`, `pid`, `level`, `type`, `icon`, `time` ) VALUES  ('35','del','删除','开启','4','31','0','是','','1439393793');
INSERT INTO hx_node ( `id`, `name`, `title`, `status`, `sort`, `pid`, `level`, `type`, `icon`, `time` ) VALUES  ('36','Article','文章管理','开启','1','19','0','是','','1439431063');
INSERT INTO hx_node ( `id`, `name`, `title`, `status`, `sort`, `pid`, `level`, `type`, `icon`, `time` ) VALUES  ('37','index','列表','开启','1','36','0','是','','1439430168');
INSERT INTO hx_node ( `id`, `name`, `title`, `status`, `sort`, `pid`, `level`, `type`, `icon`, `time` ) VALUES  ('38','add','增加','开启','2','36','0','否','','1439430207');
INSERT INTO hx_node ( `id`, `name`, `title`, `status`, `sort`, `pid`, `level`, `type`, `icon`, `time` ) VALUES  ('39','edit','修改','开启','3','36','0','是','','1439430247');
INSERT INTO hx_node ( `id`, `name`, `title`, `status`, `sort`, `pid`, `level`, `type`, `icon`, `time` ) VALUES  ('40','del','删除','开启','4','36','0','是','','1439430321');
INSERT INTO hx_node ( `id`, `name`, `title`, `status`, `sort`, `pid`, `level`, `type`, `icon`, `time` ) VALUES  ('42','Recycle','回收站','开启','50','19','0','是','','1439430429');
INSERT INTO hx_node ( `id`, `name`, `title`, `status`, `sort`, `pid`, `level`, `type`, `icon`, `time` ) VALUES  ('43','index','列表','开启','1','42','0','是','','1439430449');
INSERT INTO hx_node ( `id`, `name`, `title`, `status`, `sort`, `pid`, `level`, `type`, `icon`, `time` ) VALUES  ('44','restore','恢复','开启','2','42','0','是','','1439430547');
INSERT INTO hx_node ( `id`, `name`, `title`, `status`, `sort`, `pid`, `level`, `type`, `icon`, `time` ) VALUES  ('45','del','清空','开启','3','42','0','是','','1439430581');
INSERT INTO hx_node ( `id`, `name`, `title`, `status`, `sort`, `pid`, `level`, `type`, `icon`, `time` ) VALUES  ('46','Comment','评论管理','开启','2','19','0','是','','1439431071');
INSERT INTO hx_node ( `id`, `name`, `title`, `status`, `sort`, `pid`, `level`, `type`, `icon`, `time` ) VALUES  ('47','index','列表','开启','1','46','0','是','','1439431110');
INSERT INTO hx_node ( `id`, `name`, `title`, `status`, `sort`, `pid`, `level`, `type`, `icon`, `time` ) VALUES  ('48','del','删除','开启','2','46','0','是','','1439431128');
INSERT INTO hx_node ( `id`, `name`, `title`, `status`, `sort`, `pid`, `level`, `type`, `icon`, `time` ) VALUES  ('49','Default','用户管理','开启','2','0','0','是','user','1439431724');
INSERT INTO hx_node ( `id`, `name`, `title`, `status`, `sort`, `pid`, `level`, `type`, `icon`, `time` ) VALUES  ('50','User','用户管理','开启','1','49','0','是','','1439431474');
INSERT INTO hx_node ( `id`, `name`, `title`, `status`, `sort`, `pid`, `level`, `type`, `icon`, `time` ) VALUES  ('51','index','列表','开启','1','50','0','是','','1439431492');
INSERT INTO hx_node ( `id`, `name`, `title`, `status`, `sort`, `pid`, `level`, `type`, `icon`, `time` ) VALUES  ('52','shield','拉黑','开启','2','50','0','是','','1439431533');
INSERT INTO hx_node ( `id`, `name`, `title`, `status`, `sort`, `pid`, `level`, `type`, `icon`, `time` ) VALUES  ('53','enable','启用','开启','3','50','0','是','','1439431560');
INSERT INTO hx_node ( `id`, `name`, `title`, `status`, `sort`, `pid`, `level`, `type`, `icon`, `time` ) VALUES  ('54','Default','基本设置','开启','10','0','0','是','cogs','1439431606');
INSERT INTO hx_node ( `id`, `name`, `title`, `status`, `sort`, `pid`, `level`, `type`, `icon`, `time` ) VALUES  ('55','Setting','网站设置','开启','4','54','0','是','','1439436673');
INSERT INTO hx_node ( `id`, `name`, `title`, `status`, `sort`, `pid`, `level`, `type`, `icon`, `time` ) VALUES  ('56','index','显示','开启','1','55','0','是','','1439436712');
INSERT INTO hx_node ( `id`, `name`, `title`, `status`, `sort`, `pid`, `level`, `type`, `icon`, `time` ) VALUES  ('57','UserInfo','个人信息','开启','1','54','0','是','','1439437111');
INSERT INTO hx_node ( `id`, `name`, `title`, `status`, `sort`, `pid`, `level`, `type`, `icon`, `time` ) VALUES  ('58','index','修改昵称','开启','1','57','0','是','','1439436858');
INSERT INTO hx_node ( `id`, `name`, `title`, `status`, `sort`, `pid`, `level`, `type`, `icon`, `time` ) VALUES  ('60','pass','修改密码','开启','2','57','0','是','','1439436887');
INSERT INTO hx_node ( `id`, `name`, `title`, `status`, `sort`, `pid`, `level`, `type`, `icon`, `time` ) VALUES  ('61','Link','友情链接','开启','3','54','0','是','','1439436922');
INSERT INTO hx_node ( `id`, `name`, `title`, `status`, `sort`, `pid`, `level`, `type`, `icon`, `time` ) VALUES  ('62','index','列表','开启','1','61','0','是','','1439436945');
INSERT INTO hx_node ( `id`, `name`, `title`, `status`, `sort`, `pid`, `level`, `type`, `icon`, `time` ) VALUES  ('63','add','增加','开启','2','61','0','是','','1439436971');
INSERT INTO hx_node ( `id`, `name`, `title`, `status`, `sort`, `pid`, `level`, `type`, `icon`, `time` ) VALUES  ('64','edit','修改','开启','3','61','0','是','','1439436996');
INSERT INTO hx_node ( `id`, `name`, `title`, `status`, `sort`, `pid`, `level`, `type`, `icon`, `time` ) VALUES  ('65','del','删除','开启','4','61','0','是','','1439437014');
INSERT INTO hx_node ( `id`, `name`, `title`, `status`, `sort`, `pid`, `level`, `type`, `icon`, `time` ) VALUES  ('66','Cahe','缓存管理','开启','5','54','0','是','','1439437059');
INSERT INTO hx_node ( `id`, `name`, `title`, `status`, `sort`, `pid`, `level`, `type`, `icon`, `time` ) VALUES  ('67','index','更新缓存','开启','1','66','0','是','','1439437092');
INSERT INTO hx_node ( `id`, `name`, `title`, `status`, `sort`, `pid`, `level`, `type`, `icon`, `time` ) VALUES  ('68','Default','导航管理','开启','5','0','0','是','group','1439539027');
INSERT INTO hx_node ( `id`, `name`, `title`, `status`, `sort`, `pid`, `level`, `type`, `icon`, `time` ) VALUES  ('69','Nav','导航栏管理','开启','1','68','0','是','','1439441637');
INSERT INTO hx_node ( `id`, `name`, `title`, `status`, `sort`, `pid`, `level`, `type`, `icon`, `time` ) VALUES  ('70','index','列表','开启','1','69','0','是','','1439441658');
INSERT INTO hx_node ( `id`, `name`, `title`, `status`, `sort`, `pid`, `level`, `type`, `icon`, `time` ) VALUES  ('71','add','添加','开启','2','69','0','是','','1439442708');
INSERT INTO hx_node ( `id`, `name`, `title`, `status`, `sort`, `pid`, `level`, `type`, `icon`, `time` ) VALUES  ('72','edit','修改','开启','3','69','0','是','','1439442733');
INSERT INTO hx_node ( `id`, `name`, `title`, `status`, `sort`, `pid`, `level`, `type`, `icon`, `time` ) VALUES  ('73','del','删除','开启','4','69','0','是','','1439442758');
INSERT INTO hx_node ( `id`, `name`, `title`, `status`, `sort`, `pid`, `level`, `type`, `icon`, `time` ) VALUES  ('84','index','备份','开启','1','83','0','否','','1442465726');
INSERT INTO hx_node ( `id`, `name`, `title`, `status`, `sort`, `pid`, `level`, `type`, `icon`, `time` ) VALUES  ('83','BackUp','数据备份','开启','1','82','0','是','','1442465546');
INSERT INTO hx_node ( `id`, `name`, `title`, `status`, `sort`, `pid`, `level`, `type`, `icon`, `time` ) VALUES  ('82','Default','备份管理','开启','6','0','0','是','comments-alt','1442465153');
DROP TABLE IF EXISTS `hx_role`;
CREATE TABLE `hx_role` (
  `id` smallint(6) unsigned NOT NULL AUTO_INCREMENT,
  `name` varchar(20) NOT NULL COMMENT '角色名称',
  `status` enum('关闭','开启') DEFAULT '开启' COMMENT '是否开启0：关闭，1：开启',
  `remark` varchar(255) DEFAULT NULL COMMENT '角色描述',
  `time` int(11) DEFAULT NULL COMMENT '创建时间',
  `sort` int(11) DEFAULT '50' COMMENT '排序',
  PRIMARY KEY (`id`),
  KEY `status` (`status`) USING BTREE
) COLLATE='utf8_general_ci' ENGINE=MyISAM;
INSERT INTO hx_role ( `id`, `name`, `status`, `remark`, `time`, `sort` ) VALUES  ('2','Manger','开启','管理员','1436844915','1');
INSERT INTO hx_role ( `id`, `name`, `status`, `remark`, `time`, `sort` ) VALUES  ('1','Super','开启','超级管理员','1436844915','0');
INSERT INTO hx_role ( `id`, `name`, `status`, `remark`, `time`, `sort` ) VALUES  ('7','demo','开启','demo','1439564845','50');
DROP TABLE IF EXISTS `hx_system`;
CREATE TABLE `hx_system` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(100) DEFAULT NULL COMMENT '网站名称',
  `title` varchar(100) DEFAULT NULL COMMENT '网站标题',
  `domain` varchar(200) DEFAULT NULL COMMENT '网站域名',
  `address` varchar(200) DEFAULT NULL COMMENT '公司地址',
  `phone` varchar(100) DEFAULT NULL COMMENT '公司电话',
  `qq` varchar(50) DEFAULT NULL COMMENT '公司QQ',
  `email` varchar(100) DEFAULT NULL COMMENT '公司email',
  `keyword` varchar(200) DEFAULT NULL COMMENT '网站关键字',
  `desc` varchar(200) DEFAULT NULL COMMENT '网站描述',
  `copyright` varchar(200) DEFAULT NULL COMMENT '底部版权',
  `content` text COMMENT '关于我们',
  PRIMARY KEY (`id`)
) COLLATE='utf8_general_ci' ENGINE=MyISAM;
INSERT INTO hx_system ( `id`, `name`, `title`, `domain`, `address`, `phone`, `qq`, `email`, `keyword`, `desc`, `copyright`, `content` ) VALUES  ('1','嘎嘎时代科技有限公司','嘎嘎时代科技','www.haophper.com','霍营','18600957490','907274532','907274532@qq.com','嘎嘎时代','嘎嘎时代嘎嘎时代嘎嘎时代嘎嘎时代嘎嘎时代嘎嘎时代嘎嘎时代嘎嘎时代嘎嘎时代嘎嘎时代','嘎嘎时代','嘎嘎时代嘎嘎时代嘎嘎时代嘎嘎时代嘎嘎时代嘎嘎时代嘎嘎时代嘎嘎时代嘎嘎时代嘎嘎时代');
DROP TABLE IF EXISTS `hx_users`;
CREATE TABLE `hx_users` (
  `id` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `user_login` varchar(60) NOT NULL DEFAULT '' COMMENT '用户名',
  `user_pass` varchar(64) NOT NULL DEFAULT '' COMMENT '登录密码；hx_password加密',
  `user_nicename` varchar(50) NOT NULL DEFAULT '' COMMENT '用户美名',
  `user_email` varchar(100) NOT NULL DEFAULT '' COMMENT '登录邮箱',
  `user_url` varchar(100) NOT NULL DEFAULT '' COMMENT '用户个人网站',
  `avatar` varchar(255) DEFAULT NULL COMMENT '用户头像，相对于upload/avatar目录',
  `sex` smallint(1) DEFAULT '0' COMMENT '性别；0：保密，1：男；2：女',
  `birthday` int(11) DEFAULT NULL COMMENT '生日',
  `signature` varchar(255) DEFAULT NULL COMMENT '个性签名',
  `last_login_ip` varchar(16) NOT NULL COMMENT '最后登录ip',
  `user_activation_key` varchar(60) NOT NULL DEFAULT '' COMMENT '激活码',
  `user_status` int(11) NOT NULL DEFAULT '1' COMMENT '用户状态 0：禁用； 1：正常 ；2：未验证',
  `score` int(11) NOT NULL DEFAULT '0' COMMENT '用户积分',
  `last_login_time` int(11) DEFAULT NULL,
  `create_time` int(11) DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `user_login_key` (`user_login`) USING BTREE,
  KEY `user_nicename` (`user_nicename`) USING BTREE
) COLLATE='utf8_general_ci' ENGINE=MyISAM;
INSERT INTO hx_users ( `id`, `user_login`, `user_pass`, `user_nicename`, `user_email`, `user_url`, `avatar`, `sex`, `birthday`, `signature`, `last_login_ip`, `user_activation_key`, `user_status`, `score`, `last_login_time`, `create_time` ) VALUES  ('1','haoxuan','123456','haoxuan','907274532@qq.com','','','0','','','127.0.0.1','','1','0','1439514188','1437654152');
